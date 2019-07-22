$(document).ready(function () {
    //Dados Cadastrais----------------------------------------------------------
    $("#inserirDadosCadastrais").click(function () {
        var formDadosCadastrais = $("#formDadosCadastrais").serializeArray();
        $.ajax({
            type: 'POST',
            url: '/dadosCadastrais/cadastro',
            data: formDadosCadastrais,
            dataType: 'json',
            success: function (data) {
                $.notify('Cadastrado com sucesso!', "success");
                $("#idCliente").val(data);
                $('#dados_familiares_menu').click();
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });
});



