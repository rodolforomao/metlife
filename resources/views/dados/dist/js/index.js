Highcharts.chart('graf_situacao_atual', {
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
            pointStart: 35,
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
        line: {
            pointStart: 35,
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
        }
    },
    series: [{
        color: {
            pattern: {
                path: 'M 0 0 L 10 10 M 9 - 1 L 11 1 M - 1 9 L 1 11',
                width: 10,
                height: 10
            }
        },
        name: 'Despesas Fixas',
        data: [
            78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 
            78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 
            78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 
            78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 
            78000, 78000, 78000, 78000, 78000, 78000, 78000
        ]
    }, {
            
        name: 'Renda',
        type: 'line',
        data: [
            78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 78000, 
            78000, 78000, 78000, 78000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
            , 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
        ]
    }]
});

Highcharts.chart('graf_relatorio_gerado', {
    chart: {
        type: 'spline',
        scrollablePlotArea: {
            minWidth: 600,
            height: 240,
            scrollPositionX: 1
        }
    },
    title: {
        text: null
    },
    subtitle: {
        text: null
    },
    xAxis: {
        type: 'datetime',
        labels: {
            overflow: 'justify'
        }
    },
    yAxis: {
        title: {
            text: 'Relatórios Gerados'
        },
        minorGridLineWidth: 0,
        gridLineWidth: 0,
        alternateGridColor: null
    },
    exporting: {
      enabled: false
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        spline: {
            lineWidth: 4,
            states: {
                hover: {
                    lineWidth: 5
                }
            },
            marker: {
                enabled: false
            },
            pointInterval: 3600000, // one hour
            pointStart: Date.UTC(2018, 1, 13, 0, 0, 0)
        }
    },
    series: [{
        name: 'Relatórios',
        data: [
            3.7, 3.3, 3.9, 5.1, 3.5, 3.8, 4.0, 5.0, 6.1, 3.7, 3.3, 6.4,
            6.9, 6.0, 6.8, 4.4, 4.0, 3.8, 5.0, 4.9, 9.2, 9.6, 9.5, 6.3,
            9.5, 10.8, 14.0, 11.5, 10.0, 10.2, 10.3, 9.4, 8.9, 10.6, 10.5, 11.1,
            10.4, 10.7, 11.3, 10.2, 9.6, 10.2, 11.1, 10.8, 13.0, 12.5, 12.5, 11.3,
            10.1
        ]

    }],
    navigation: {
        menuItemStyle: {
            fontSize: '10px'
        }
    }
});