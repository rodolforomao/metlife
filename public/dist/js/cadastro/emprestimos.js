$(document).ready(function () {
    //Empréstimos --------------------------------------------------------------
    $("#insereEmprestimos").click(function () {
        var formSaldoEmprestimos = $("#formSaldoEmprestimos").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formSaldoEmprestimos.push(idCliente);
        if (formSaldoEmprestimos.length > 2) {
            $.ajax({
                type: 'POST',
                url: '/saldoEmprestimos/cadastro',
                data: formSaldoEmprestimos,
                dataType: 'json',
                success: function (data) {
                    $("#id_emprestimos").val(data);
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        }
        var formEmprestimos = $("#formEmprestimos").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formEmprestimos.push(idCliente);
        if (formEmprestimos.length > 2) {
            $.ajax({
                type: 'POST',
                url: '/emprestimos/cadastro',
                data: formEmprestimos,
                dataType: 'json',
                success: function (data) {
                    var html = "";
                    for (i = 0; i < data.length; i++) {
                        html += "<div class='row' id='emprestimo_delete" + data[i].id + "'>";
                        html += "   <input type='hidden' name='id[]' value='" + data[i].id + "'>";
                        html += "   <div class='col-md-2'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Saldo Devedor</label>";
                        html += "           <div class='input-group date'>";
                        html += "               <div class='input-group-prepend'>";
                        html += "                  <span class='input-group-text'>R$</span>";
                        html += "               </div>";
                        html += "               <input name='saldo_devedor[]' class='form-control' placeholder='Saldo Devedor' value='" + data[i].saldo_devedor + "'";
                        html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
                        html += "           </div>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-2'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Possui Seguro</label>";
                        html += "           <input type='text' class='form-control' name='possui_seguro[]' placeholder='Possui Seguro' value='" + data[i].possui_seguro + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-2'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Parcela Mensal</label>";
                        html += "           <div class='input-group date'>";
                        html += "               <div class='input-group-prepend'>";
                        html += "                  <span class='input-group-text'>R$</span>";
                        html += "               </div>";
                        html += "               <input name='parcela_mensal[]' class='form-control' placeholder='Parcela Mensal' value='" + data[i].parcela_mensal + "'";
                        html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
                        html += "           </div>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-2'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Prazo Residual</label>";
                        html += "           <input type='text' class='form-control' name='prazo_residual[]' placeholder='(meses)' value='" + data[i].prazo_residual + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "       <div class='col-md-3'>";
                        html += "           <div class='form-group'>";
                        html += "               <label>Saldo Devedor Descoberto</label>";
                        html += "               <input type='text' class='form-control' name='saldo_devedor_emprestimo[]' placeholder='Saldo Devedor Descoberto' value='" + data[i].saldo_devedor_emprestimo + "'>";
                        html += "           </div>";
                        html += "       </div>";
                        html += "   <div class='col-md-1'>";
                        html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deleteEmprestimo(" + data[i].id + ")'/>";
                        html += "   </div>";
                        html += "</div>";
                    }
                    $("#divEmprestimos").html(html);
                    $.notify('Cadastrado com sucesso!', "success");
                    $('#seguro_previdencia_menu').click();
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        } else {
            $.notify('Cadastrado com sucesso!', "success");
            $('#seguro_previdencia_menu').click();
        }
    });
});
//EMPRESTIMOS ------------------------------------------------------------------
var qtdeCamposEmprestimo = 0;
function addCampoEmprestimo() {
    $("#emp_descoberto").prop("disabled", true);
    $("#emp_perido").prop("disabled", true);
    var html = "";
    html += "<div class='row' id='emprestimo" + qtdeCamposEmprestimo + "'>";
    html += "   <input type='hidden' name='id[]'>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Saldo Devedor</label>";
    html += "           <div class='input-group date'>";
    html += "               <div class='input-group-prepend'>";
    html += "                  <span class='input-group-text'>R$</span>";
    html += "               </div>";
    html += "               <input name='saldo_devedor[]' class='form-control' placeholder='Saldo Devedor' onchange='somaDescobertoEmprestimo()'";
    html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Possui Seguro</label>";
    html += "           <select class='form-control' name='possui_seguro[]'>";
    html += "               <option value=''>Selecione</option>";
    html += "               <option value='1'>Sim</option>";
    html += "               <option value='2'>Não</option>";
    html += "           <select>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Parcela Mensal</label>";
    html += "           <div class='input-group date'>";
    html += "               <div class='input-group-prepend'>";
    html += "                  <span class='input-group-text'>R$</span>";
    html += "               </div>";
    html += "               <input id='parcela_mensal_" + qtdeCamposEmprestimo + "' name='parcela_mensal[]' class='form-control' placeholder='Parcela Mensal' onchange='somaSaldoDevedor(" + qtdeCamposEmprestimo + ")'";
    html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Prazo Residual</label>";
    html += "           <input id='prazo_residual_" + qtdeCamposEmprestimo + "' type='text' class='form-control' name='prazo_residual[]' placeholder='(meses)' onchange='somaPeriodo(),somaSaldoDevedor(" + qtdeCamposEmprestimo + ")'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "               <label>Saldo Devedor Descoberto</label>";
    html += "           <div class='input-group date'>";
    html += "               <div class='input-group-prepend'>";
    html += "                  <span class='input-group-text'>R$</span>";
    html += "               </div>";
    html += "               <input id='saldo_devedor_emprestimo" + qtdeCamposEmprestimo + "' name='saldo_devedor_emprestimo[]' class='form-control' placeholder='Saldo Devedor Descoberto'";
    html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-1'>";
    html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='removerCampoEmprestimo(" + qtdeCamposEmprestimo + ")'/>";
    html += "   </div>";
    html += "</div>";
    $("#divEmprestimos").append(html);
    qtdeCamposEmprestimo++;
}
//------------------------------------------------------------------------------
function removerCampoEmprestimo(id) {
    $("#divEmprestimos")[0].removeChild($("#emprestimo" + id)[0]);
    var formEmprestimos = $("#formEmprestimos").serializeArray();
    if (formEmprestimos.length == 0) {
        $("#emp_descoberto").prop("disabled", false);
        $("#emp_perido").prop("disabled", false);
    }
    somaDescobertoEmprestimo();
    somaPeriodo();
}
//------------------------------------------------------------------------------
function deleteEmprestimo(id) {
    $.ajax({
        type: 'POST',
        url: '/emprestimos/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#divEmprestimos")[0].removeChild($("#emprestimo_delete" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}
//------------------------------------------------------------------------------
function somaDescobertoEmprestimo() {
    var totalSaldoDevedor = 0;
    var formEmprestimos = $("#formEmprestimos").serializeArray();
    for (i = 1; i < formEmprestimos.length; i++) {
        if (formEmprestimos[i].name == "saldo_devedor[]") {
            if (formEmprestimos[i].value !== "") {
                var _valor = formEmprestimos[i].value;
                var _valor = _valor.replace(".", "");
                for (j = 0; j <= _valor.split(".").length; j++) {
                    _valor = (_valor.replace(".", ""));
                }
                totalSaldoDevedor += parseFloat(_valor.replace(",", "."));
            } else {
                totalSaldoDevedor += 0;
            }
        }
    }
    $("#emp_descoberto").val(totalSaldoDevedor.toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
}
//------------------------------------------------------------------------------
function somaPeriodo() {
    var totalPeriodo = 0;
    var formEmprestimos = $("#formEmprestimos").serializeArray();
    for (i = 1; i < formEmprestimos.length; i++) {
        if (formEmprestimos[i].name == "prazo_residual[]") {
            if (formEmprestimos[i].value !== "") {
                totalPeriodo += parseInt(formEmprestimos[i].value);
            } else {
                totalPeriodo += 0;
            }
        }
    }
    $("#emp_perido").val(totalPeriodo);
}
//------------------------------------------------------------------------------
function somaSaldoDevedor(id) {
    var parcela = $("#parcela_mensal_" + id).val();
    var prazo = $("#prazo_residual_" + id).val();
    var _parcela = parcela.replace(".", "");
    if (_parcela !== "") {
        for (j = 0; j <= _parcela.split(".").length; j++) {
            _parcela = (_parcela.replace(".", ""));
        }
    } else {
        _parcela = 0;
    }
    if (prazo == "") {
        prazo = 0;
    }
    parcela = parseFloat(_parcela.replace(",", "."));
    var saldoDevedor = prazo * parcela;
    $("#saldo_devedor_emprestimo" + id).val(saldoDevedor.toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
}