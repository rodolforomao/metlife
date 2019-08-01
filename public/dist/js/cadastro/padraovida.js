$(document).ready(function () {
    //Padrão de Vida------------------------------------------------------------
    $("#inserePadraoVida").click(function () {
        var formPadraoVida = $("#formPadraoVida").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formPadraoVida.push(idCliente);
        $.ajax({
            type: 'POST',
            url: '/padraoVida/cadastro',
            data: formPadraoVida,
            dataType: 'json',
            success: function (data) {
                $("#id_padrao_vida").val(data);
                $.notify('Cadastrado com sucesso!', "success");
                $('#emprestimos_menu').click();
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });

    $("#pv_gerais").change(function () {
        if (this.value !== "") {
            $("#pv_moradia").prop("disabled", true);
            $("#pv_servicos").prop("disabled", true);
            $("#pv_transporte").prop("disabled", true);
            $("#pv_saude").prop("disabled", true);
            $("#pv_vestuario").prop("disabled", true);
            $("#pv_seguro_vida").prop("disabled", true);
            $("#pv_lazer").prop("disabled", true);
            $("#pv_impostos").prop("disabled", true);
            $("#pv_extras").prop("disabled", true);
        } else {
            $("#pv_moradia").prop("disabled", false);
            $("#pv_servicos").prop("disabled", false);
            $("#pv_transporte").prop("disabled", false);
            $("#pv_saude").prop("disabled", false);
            $("#pv_vestuario").prop("disabled", false);
            $("#pv_seguro_vida").prop("disabled", false);
            $("#pv_lazer").prop("disabled", false);
            $("#pv_moradia").prop("disabled", false);
            $("#pv_impostos").prop("disabled", false);
            $("#pv_extras").prop("disabled", false);
        }
    });
});

function somaValorPadraoVida(valor) {
    if (valor !== "") {
        $("#pv_gerais").prop("disabled", true);
        var valorTotal = 0;
        var formPadraoVida = $("#formPadraoVida").serializeArray();
        for (i = 1; i < formPadraoVida.length; i++) {
            if (formPadraoVida[i].value !== "") {
                var _valor = formPadraoVida[i].value;
                var _valor = _valor.replace(".", "");
                for (j = 0; j <= _valor.split(".").length; j++) {
                    _valor = (_valor.replace(".", ""));
                }
                valorTotal += parseFloat(_valor.replace(",", "."));
            } else {
                valorTotal += 0;
            }
        }

        $("#pv_gerais").val("R$" + valorTotal.toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
    } else {
        $("#pv_gerais").prop("disabled", false);
    }
}
