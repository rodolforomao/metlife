function invalidezDoencaGrave(idade, inss) {
    var count = 85 - idade;
    var array_despesa_inss = [];
    for (var i = 0; i <= count; i++) {
        array_despesa_inss.push(inss);
    }

    Highcharts.chart('graf_invalidez', {
        chart: {
            //height: 500,
            backgroundColor: 'rgba(0,0,0,0)',
            type: 'area'
        },
        title: {
            text: null
        },
        subtitle: {
            text: null
        },
        xAxis: {
            allowDecimals: false,
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
            title: {
                text: null
            },
            labels: {
                formatter: function () {
                    return 'R$ ' + (this.value).toLocaleString('pt-BR'); /// 1000 ;
                }
            }
        },
        tooltip: {
            pointFormat: '<span>{series.name} </span> <b>{point.y:,.0f}</b> <br> Idade <b>{point.x}</b>',
            split: true
        },
        exporting: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            area: {
                pointStart: idade,
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            },
//            line: {
//                pointStart: idade,
//                marker: {
//                    enabled: false,
//                    symbol: 'circle',
//                    radius: 2,
//                    states: {
//                        hover: {
//                            enabled: true
//                        }
//                    }
//                }
//            }
        },
        series: [{
                color: {
                    pattern: {
                        path: 'M 0 0 L 10 10 M 9 - 1 L 11 1 M - 1 9 L 1 11',
                        width: 10,
                        height: 10
                    }
                },
                name: 'INSS',
                data: array_despesa_inss
            },
//            {
//                name: 'Renda',
//                type: 'line',
//                data: [
//                    0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
//                    0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
//                ]
//            }
        ]
    });
}