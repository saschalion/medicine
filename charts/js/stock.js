$(function () {

    $(document).ready(function() {

        $('.highcharts-range-selector').parent().css('margin-right', '50px');

        var chart;

        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });

        var options = {
            chart: {
                renderTo: 'container'
            },
            title: {
                text: []
            },
            subtitle: {
                text: []
            },
            rangeSelector : {
                buttons : [{
                    type : 'year',
                    count : 1,
                    text : 'Год'
                }, {
                    type : 'month',
                    count : 3,
                    text : '3м'
                }, {
                    type : 'all',
                    count : 1,
                    text : 'Всё'
                }],
                selected : 3,
                inputEnabled : false
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: []
                },
                minorGridLineWidth: 0,
                gridLineWidth: 1,
                alternateGridColor: null,
                max: 120,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }],
                labels: {
                    formatter: function() {
                        return this.value;
                    }
                },
                plotBands: [{
                    from: [],
                    to: [],
                    color: 'rgba(0, 255, 0, 0.1)',
                    label: {
                        text: 'Норма',
                        style: {
                            color: '#000'
                        }
                    }
                }, {
                    from: [],
                    to: [],
                    color: 'rgba(255, 0, 0, 0.1)',
                    label: {
                        text: 'Ниже нормы',
                        style: {
                            color: '#000'
                        }
                    }
                }, {
                    from: [],
                    to: [],
                    dashStyle : 'shortdash',
                    color: 'rgba(255, 0, 0, 0.1)',
                    label: {
                        text: 'Выше нормы',
                        style: {
                            color: '#000'
                        }
                    }
                }]
            },
            tooltip: {
                shared: true,
                formatter: function() {
                    return tooltipTitle + '<b>' + this.y + '</b><br>' + 'за ' + Highcharts.dateFormat('%d.%m.%Y %H:%M', this.x)
                }
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        style: {
                            font: '9px Arial',
                            verticalAlign: 'top'
                        },
                        enabled: true,
                        formatter: function() {
                            return + this.y + '(' + this.point.config.tooltip + ')';
                        }
                    }
                },
                spline: {
                    lineWidth: 4,
                    states: {
                        hover: {
                            lineWidth: 5
                        }
                    },
                    marker: {
                        enabled: true,
                        radius: 5,
                        states: {
                            hover: {
                                enabled: true,
                                symbol: 'circle',
                                radius: 7,
                                lineWidth: 1
                            }
                        }
                    }
                }
            },
            legend: {
                enabled: false
            },
            series: [{
                marker : {
                    enabled : true,
                    radius : 3
                },
                name: [],
                data: [],
                cursor: 'pointer'
            }]
            ,
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        };

        $.urlParam = function(name){
            var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
            return results[1] || 0;
        }


        $.getJSON('/charts/loadData.php', {'patient_id': $.urlParam('patient_id'), 'type': $.urlParam('type')}, function(data) {

            var startNorm = options.yAxis.plotBands[0].from;
            var endNorm = options.yAxis.plotBands[0].to;

            //  Ниже нормы

            var belowStartNorm = options.yAxis.plotBands[1].from;
            var belowEndNorm = options.yAxis.plotBands[1].to;

            //  Выше нормы

            var aboveStartNorm = options.yAxis.plotBands[2].from;
            var aboveEndNorm = options.yAxis.plotBands[2].to;

            startNorm.push(data[0]['startNorm']);
            endNorm.push(data[0]['endNorm']);

            belowStartNorm.push(data[0]['belowStartNorm']);
            belowEndNorm.push(data[0]['belowEndNorm']);

            aboveStartNorm.push(data[0]['aboveStartNorm']);
            aboveEndNorm.push(data[0]['aboveEndNorm']);

            yData = options.series[0].data;

            title = options.title.text;

            axisTitle = options.yAxis.title.text;

            tooltipTitle = options.series[0].name;

            subtitle = options.subtitle.text;

            for (i = 0; i < data.length; i++) {
                yData.push({'x': data[i]['x'] * 1000, 'y': parseInt(data[i]['y']), 'tooltip': data[i]['tooltip']});
            }

            var dataLength = parseInt(yData.length - 1);

            subtitle.push('c ' + '<b>' + Highcharts.dateFormat('%d.%m.%Y', yData[0]['x']) + '</b>' + ' по ' + '<b>' + Highcharts.dateFormat('%d.%m.%Y', yData[dataLength]['x']) + '</b>');

            title.push('Параметры ' + data[0]['title'] + 'а' + ' (' + data[0]['lname'] + ' ' + data[0]['fname'] + ' ' + data[0]['patronymic'] + ')');

            axisTitle.push('Уровень ' + data[0]['title'] + 'a');

            tooltipTitle.push(data[0]['title']);

            var chart = new Highcharts.StockChart(options);
        });
    });
});