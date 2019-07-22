$(document).ready(function () {
    //Rendimentos --------------------------------------------------------------
    $("#inserirRendimentos").click(function () {
        var formRendimento = $("#formRendimento").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formRendimento.push(idCliente);
        $.ajax({
            type: 'POST',
            url: '/rendimentos/cadastro',
            data: formRendimento,
            dataType: 'json',
            success: function (data) {
                $("#id_rendimento_principal").val(data.principal);
                if (data.conjugue !== "") {
                    $("#id_rendimento_conjugue").val(data.conjugue);
                }
                $.notify('Cadastrado com sucesso!', "success");
                $('#patrimonio_menu').click();
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });
});
