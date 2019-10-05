function custoTotalVida(idade, despesaFixa, custo_educacao_anual, custo_educacao_total, anos_educacao, funeral, emergencial, inventario) {
    if (idade < 50) {
        var prazo = 50;
    } else {
        var prazo = (99 - idade);
    }

    var array_despesaGeral = [];
    var array_funeral = [];
    var array_inventario = [];
    var array_emergencial = [];
    var despesaFixaTotal = despesaFixa * prazo;
    for (var i = 0; i < prazo; i++) {
        array_despesaGeral.push(despesaFixaTotal);
        array_inventario.push(inventario);
        array_emergencial.push(emergencial);
        array_funeral.push(funeral);
        despesaFixaTotal = despesaFixaTotal - despesaFixa;
    }

    var array_educacao = [];
    for (var i = 0; i <= anos_educacao; i++) {
        array_educacao.push(custo_educacao_total);
        custo_educacao_total = custo_educacao_total - custo_educacao_anual;
    }
    var falta_prazo_educacao = prazo - array_educacao.length;
    for (var i = 0; i < falta_prazo_educacao; i++) {
        array_educacao.push(0);
    }
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
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: R$ {point.y:,.0f} <br/>',
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
                color: {
                    pattern: {
                        path: 'M 0 0 L 10 10 M 9 - 1 L 11 1 M - 1 9 L 1 11',
                        width: 10,
                        height: 10
                    }
                },
                name: 'Despesas Fixas',
                data: array_despesaGeral
            }, {
                name: 'Educação',
                data: array_educacao
            }, {
                name: 'Financiamentos',
                data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
            }, {
                name: 'Sonho',
                data: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null]
            }, {
                name: 'Funeral',
                data: array_funeral
            }, {
                name: 'Emergêncial',
                data: array_emergencial
            }, {
                name: 'Inventário',
                data: array_inventario
            }]
    });
}