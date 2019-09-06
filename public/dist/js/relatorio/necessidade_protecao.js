function necessidadeProtecao(idade, inventario, emergencial, funeral, custo_educacao_anual, custo_educacao_total, anos_educacao) {
    var count = 85 - idade;
    var array_despesa_inventario = [];
    var array_despesa_emergencial = [];
    var array_despesa_funeral = [];
    var array_educacao = [];

    for (var i = 0; i <= count; i++) {
        array_despesa_inventario.push(inventario);
        array_despesa_emergencial.push(emergencial);
        array_despesa_funeral.push(funeral);

    }

    for (var i = 0; i <= anos_educacao; i++) {
        array_educacao.push(custo_educacao_total);
        custo_educacao_total = custo_educacao_total - custo_educacao_anual;
    }
    var falta_prazo_educacao = count - array_educacao.length;
    for (var i = 0; i < falta_prazo_educacao; i++) {
        array_educacao.push(0);
    }
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
            }
        },
        series: [{
                name: 'Sonho',
                data: []
            }, {
                color: {
                    pattern: {
                        path: 'M 0 0 L 10 10 M 9 - 1 L 11 1 M - 1 9 L 1 11',
                        width: 5,
                        height: 5
                    }
                },
                name: 'Emergêncial',
                data: array_despesa_emergencial
            }, {
                color: '#000',
                name: 'Funeral',
                data: array_despesa_funeral
            }, {
                name: 'Educação',
                data: array_educacao
            }, {
                name: 'Financiamentos',
                data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
            }, {
                name: 'Inventário',
                data: array_despesa_inventario
            }]
    });
}
