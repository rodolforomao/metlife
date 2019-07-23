$(document).ready(function () {
    //Planos  ------------------------------------------------------------------
    $("#inserirPlanos").click(function () {
        var idCliente = new Object();
        var tipoFamiliar = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        tipoFamiliar.name = "tipoFamiliar";

        var formPlanoPrincipal = $("#formPlanoPrincipal").serializeArray();
        tipoFamiliar.value = "Principal";

        formPlanoPrincipal.push(idCliente);
        formPlanoPrincipal.push(tipoFamiliar);
        $.ajax({
            type: 'POST',
            url: '/planos/cadastro',
            data: formPlanoPrincipal,
            dataType: 'json',
            success: function (data) {
                for (i = 0; i < data.length; i++) {
                    var id = parseInt(data[i].id);
                    var id_produto = parseInt(data[i].id_produto);
                    switch (id_produto) {
                        case 1:
                            $("#id_vitalicio_principal").val(id);
                            break;
                        case 2:
                            $("#id_capital_principal").val(id);
                            break;
                        case 3:
                            $("#id_decrescente_principal").val(id);
                            break;
                        case 4:
                            $("#id_temporario_principal").val(id);
                            break;
                        case 5:
                            $("#id_doencas_principal").val(id);
                            break;
                        case 6:
                            $("#id_internacao_principal").val(id);
                            break;
                        case 7:
                            $("#id_invalidez_principal").val(id);
                            break;
                        case 8:
                            $("#id_morte_principal").val(id);
                            break;
                    }
                }
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
        var formPlanoConjugue = $("#formPlanoConjugue").serializeArray();
        tipoFamiliar.value = "Conjugue";

        formPlanoConjugue.push(idCliente);
        formPlanoConjugue.push(tipoFamiliar);
        $.ajax({
            type: 'POST',
            url: '/planos/cadastro',
            data: formPlanoConjugue,
            dataType: 'json',
            success: function (data) {
                if (data !== false) {
                    for (i = 0; i < data.length; i++) {
                        var id = parseInt(data[i].id);
                        var id_produto = parseInt(data[i].id_produto);
                        switch (id_produto) {
                            case 1:
                                $("#id_vitalicio_conjugue").val(id);
                                break;
                            case 2:
                                $("#id_capital_conjugue").val(id);
                                break;
                            case 3:
                                $("#id_decrescente_conjugue").val(id);
                                break;
                            case 4:
                                $("#id_temporario_conjugue").val(id);
                                break;
                            case 5:
                                $("#id_doencas_conjugue").val(id);
                                break;
                            case 6:
                                $("#id_internacao_conjugue").val(id);
                                break;
                            case 7:
                                $("#id_invalidez_conjugue").val(id);
                                break;
                            case 8:
                                $("#id_morte_conjugue").val(id);
                                break;
                        }
                    }
                }
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
        $.notify('Cadastrado com sucesso!', "success");
    });
});
