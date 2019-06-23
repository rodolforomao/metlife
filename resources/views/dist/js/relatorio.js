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
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
        ]
    }]
});

Highcharts.chart('graf_necessidades_protecao', {
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
        categories: ['30', '40', '50', '50', '60', '70', '80'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
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
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: R$ {point.y:,.0f} <b>({point.percentage:.1f}%)</b> <br/>',
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
        }
    },
    series: [{
        name: 'Sonho',
        data: [33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000, 33000]
    }, {
        color: {
            pattern: {
                path: 'M 0 0 L 10 10 M 9 - 1 L 11 1 M - 1 9 L 1 11',
                width: 5,
                height: 5
            }
        },
        name: 'Emergêncial',
        data: [29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000, 29000]
    }, {
        color: '#000',
        name: 'Funeral',
        data: [9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000, 9000]
    }, {
        name: 'Educação',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }, {
        name: 'Financiamentos',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }, {
        name: 'Inventário',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }]
});

Highcharts.chart('graf_custo_total_vida', {
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
        categories: ['30', '40', '50', '50', '60', '70', '80'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
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
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: R$ {point.y:,.0f} <b>({point.percentage:.1f}%)</b> <br/>',
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
        data: [4300000, 4200000, 4100000, 4000000, 3900000, 3800000, 3700000, 3600000, 3500000, 3400000, 3300000, 3200000, 3100000, 3000000, 2900000, 2800000, 2700000, 2600000, 2500000]
    }, {
        name: 'Educação',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }, {
        name: 'Financiamentos',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }, {
        name: 'Sonho',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }, {
        name: 'Funeral',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }, {
        name: 'Emergêncial',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }, {
        name: 'Inventário',
        data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
    }]
});

Highcharts.chart('graf_painel', {
    chart: {
        type: 'bar'
    },
    title: {
        text: null
    },
    xAxis: {
        categories: ['Intern. Hospitalar', 'Doenças Graves', 'Ad. Invalidez Acidental', 'Vitalício']
    },
    yAxis: {
        min: 0,
        title: {
            text: null
        }
    },
    legend: {
        enabled: false
    },
    exporting: {
      enabled: false
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Produto',
        data: [5, 5, 29, 100]
    }]
});

Highcharts.chart('graf_painel_pie', {
    chart: {
        type: 'variablepie'
    },
     title: {
        text: 'R$ 359,87 <br/> PRÊMIO',
        align: 'center',
        verticalAlign: 'middle',
        y: 0
    },
    tooltip: {
        headerFormat: '',
        pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
            'R$ <b>{point.y}</b> ({point.z} %)'
    },
    plotOptions: {
        variablepie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> {point.y}; <br/>({point.percentage:.1f}%)'
            }
        }
    },
    exporting: {
      enabled: false
    },
    credits: {
        enabled: false
    },
    series: [{
        minPointSize: 0,
        innerSize: '50%',
        zMin: 0,
        name: 'Produtos',
        data: [{
            name: 'Vitalício',
            y: 136.49,
            z: 38.3
        }, {
            name: 'Ad. Invalidez',
            y: 67.76,
            z: 19.7
        }, {
            name: 'Doenças Graves',
            y: 143.64,
            z: 40.6
        }, {
            name: 'Internação',
            y: 11.98,
            z: 11.5
        }]
    }]
});
