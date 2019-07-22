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
});
