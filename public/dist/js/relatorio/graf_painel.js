function graf_painel(plano_prazo, produto_descricao) {

    Highcharts.chart('graf_painel', {
        chart: {
            type: 'bar'
        },
        title: {
            text: null
        },
        xAxis: {
            categories: produto_descricao
        },
        yAxis: {
            min: 0,
            max: 99,
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
                data: plano_prazo
            }]
    });
}