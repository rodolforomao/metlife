function graf_painel_pie(produto_valor, produto_descricao) {
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
                data: [
                    {name: 'Vitalício', y: 10, z: 38.3},
                    {name: 'Ad. Invalidez', y: 20, z: 19.7},
                    {name: 'Doenças Graves', y: 30, z: 40.6},
                    {name: 'Internação', y: 40, z: 11.5}
                ]
            }]
    });
}