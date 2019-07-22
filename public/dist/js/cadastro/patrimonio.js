$(document).ready(function () {
    //Patrimonio ---------------------------------------------------------------
    $("#inserePatrimonio").click(function () {
        var formPatrimonio = $("#formPatrimonio").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formPatrimonio.push(idCliente);
        $.ajax({
            type: 'POST',
            url: '/patrimoio/cadastro',
            data: formPatrimonio,
            dataType: 'json',
            success: function (data) {
                $('#id_patrimonio').val(data);
                $('#educacaoFilhos_menu').click();
                $.notify('Cadastrado com sucesso!', "success");
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });
});

//PRATIMONIO -------------------------------------------------------------------
function somaTotalPatriomio() {
    var valorImoveis = $("#patrim_imoveis").val();
    var valorFundos = $("#patrim_acoes").val();
    var valorReservas = $("#patrim_reservas").val();
    var valorOutros = $("#patrim_outros").val();

    if (valorImoveis !== "") {
        var custo = valorImoveis;
        var valor = custo.replace(".", "");
        for (i = 0; i <= custo.split(".").length; i++) {
            valor = (valor.replace(".", ""));
        }
        valorImoveis = parseFloat(valor.replace(",", "."));
    } else {
        valorImoveis = 0;
    }
    if (valorFundos !== "") {
        var custo = valorFundos;
        var valor = custo.replace(".", "");
        for (i = 0; i <= custo.split(".").length; i++) {
            valor = (valor.replace(".", ""));
        }
        valorFundos = parseFloat(valor.replace(",", "."));
    } else {
        valorFundos = 0;
    }
    if (valorReservas !== "") {
        var custo = valorReservas;
        var valor = custo.replace(".", "");
        for (i = 0; i <= custo.split(".").length; i++) {
            valor = (valor.replace(".", ""));
        }
        valorReservas = parseFloat(valor.replace(",", "."));
    } else {
        valorReservas = 0;
    }
    if (valorOutros !== "") {
        var custo = valorOutros;
        var valor = custo.replace(".", "");
        for (i = 0; i <= custo.split(".").length; i++) {
            valor = (valor.replace(".", ""));
        }
        valorOutros = parseFloat(valor.replace(",", "."));
    } else {
        valorOutros = 0;
    }

    var valorTotal = valorImoveis + valorFundos + valorReservas + valorOutros;
    $("#valorTotal_patrimonio").text("R$" + valorTotal.toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

}