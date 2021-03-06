$(function () {
    $(document).ready(function() {

        var chart;

        var options = {
            chart: {
                renderTo: 'container',
                type: 'spline'
            },
            title: {
                text: 'Параметры пульса'
            },
            subtitle: {
                text: 'с октября 1999 до ноября 2012'
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
                            color: '#606060'
                        }
                    }
                }, {
                    from: 30,
                    to: 56,
                    color: 'rgba(255, 0, 0, 0.1)',
                    label: {
                        text: 'Ниже нормы',
                        style: {
                            color: '#606060'
                        }
                    }
                }, {
                    from: 66,
                    to: 120,
                    color: 'rgba(255, 0, 0, 0.1)',
                    label: {
                        text: 'Выше нормы',
                        style: {
                            color: '#606060'
                        }
                    }
                }]
            },
            tooltip: {
                crosshairs: true,
                useHTML: true,
                formatter: function() {
                    return '' +
                        '<h3>' + this.point.config.tooltip + '</h3>' +
                        Highcharts.dateFormat('%d %b %Y', this.x) +': '+ '<b>' + this.y + ' уд/м </b>';
                }
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
                    },
                    pointInterval: 7 * 24 * 3600 * 1000 * 4,
                    pointStart: Date.UTC(2009, 9, 6, 0, 0, 0)
                }
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'Пульс',
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

        $.getJSON('/charts/loadData.php?chart-pulse=true', function(data) {
            yData = options.series[0].data;
            tooltip = options.series[0].tooltip;

            for (i = 0; i < data.length; i++) {
                yData.push(data[i]);
            }

            var chart = new Highcharts.Chart(options);
        });
    });
});