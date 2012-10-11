$(function () {
    $(document).ready(function() {

        var chart;

        var options = {
            chart: {
                renderTo: 'container'
            },
            title: {
                text: 'Параметры пульса'
            },
            subtitle: {
                text: []
            },
            rangeSelector : {
                selected : 1
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Пульс'
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
                        return this.value +' уд/мин';
                    }
                },
                plotBands: [{
                    from: 56,
                    to: 66,
                    color: 'rgba(0, 255, 0, 0.1)',
                    label: {
                        text: 'Норма',
                        style: {
                            color: '#000'
                        }
                    }
                }, {
                    from: 30,
                    to: 56,
                    color: 'rgba(255, 0, 0, 0.1)',
                    label: {
                        text: 'Ниже нормы',
                        style: {
                            color: '#000'
                        }
                    }
                }, {
                    from: 66,
                    to: 120,
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
            plotOptions: {
                series: {
                    dataLabels: {
                        style: {
                            font: 'bold 9px Arial',
                            verticalAlign: 'top'
                        },
                        enabled: true,
                        formatter: function() {
                            return + this.y + ' (' + this.point.config.tooltip + ')';
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
                name: 'Пульс',
                data: [],
                cursor: 'pointer',
                tooltip: {
                    formatter: function() {
                        return + this.y + ' (' + this.point.config.tooltip + ')';
                    },
                    valueDecimals: 0
                }
            }]
            ,
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        };

        $.getJSON('loadData.php?stock=true', function(data) {
            yData = options.series[0].data;

            subtitle = options.subtitle.text;

            for (i = 0; i < data.length; i++) {
                yData.push(data[i]);
            }

            var dataLength = parseFloat(data.length - 1);

            subtitle.push('c ' + Highcharts.dateFormat('%d %b %Y', data[0]['x']) + ' по ' + Highcharts.dateFormat('%d %b %Y', data[dataLength]['x']));

            var chart = new Highcharts.StockChart(options);
        });
    });
});