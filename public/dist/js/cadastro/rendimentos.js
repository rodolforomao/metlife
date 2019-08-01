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
                $("#divRendimentosFamiliares").html("");
                if (data.familiares) {
                    for (i = 0; i < data.familiares.length; i++) {
                        var html = "";
                        html += "<div class='row' id='rendimentos_delete" + data.familiares[i].id + "'>";
                        html += "<input type='hidden' value='" + data.familiares[i].id + "' name='id[]'>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Grau de Parentesco</label>";
                        html += "           <select type='text' class='form-control' id='tipoFamiliar" + data.familiares[i].id + "' name='tipoFamiliar[]' placeholder='Grau de Parentesco'>";
                        html += "               <option value=''>Selecione</option>";
                        html += "               <option value='Conjugue'>Conjugue</option>";
                        html += "               <option value='Filho'>Filho</option>";
                        html += "           </select>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <label>Rendimento Mensal</label>";
                        html += "       <div class='input-group date'>";
                        html += "           <div class='input-group-prepend'>";
                        html += "               <span class='input-group-text'>R$</span>";
                        html += "           </div>";
                        html += "           <input name='ren_redimento_mensal[]' class='form-control' placeholder='Renda Mensal' value='" + data.familiares[i].remendimentosmensal + "'";
                        html += "               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <label>Outras Rendas</label>";
                        html += "       <div class='input-group date'>";
                        html += "           <div class='input-group-prepend'>";
                        html += "               <span class='input-group-text'>R$</span>";
                        html += "           </div>";
                        html += "           <input name='ren_outras[]' class='form-control' placeholder='Renda Mensal' value='" + data.familiares[i].outrasrendas + "'";
                        html += "               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-2'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Declaração de IR</label>";
                        html += "           <select name='declaracaodeir[]' id='declaracaodeir" + data.familiares[i].id + "' class='form-control'>";
                        html += "               <option value=''>Selecione</option>";
                        html += "               <option value='1'>Completa</option>";
                        html += "               <option value='2'>Simplificada</option>";
                        html += "           </select>";
                        html += "      </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-1'>";
                        html += "       <label>&nbsp;</label>";
                        html += "       <input type='button' value='-' class='btn btn-default' onclick='deletaRendimentoFamiliar(" + data.familiares[i].id + ")' style='position: relative;top: 30px;'/>";
                        html += "   </div>";
                        html += "</div>";
                        $("#divRendimentosFamiliares").append(html);
                        $("#tipoFamiliar" + data.familiares[i].id).val(data.familiares[i].tipoFamiliar);
                        $("#declaracaodeir" + data.familiares[i].id).val(data.familiares[i].declaracaodeir);
                    }
                }
//                  
                $.notify('Cadastrado com sucesso!', "success");
                $('#patrimonio_menu').click();
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });
});
//Dados Familiares--------------------------------------------------------------
var qtdeCamposRendimentos = 0;
function addCampoRendimentos() {
    var html = "";
    html += "<div class='row' id='rendimentos" + qtdeCamposRendimentos + "'>";
    html += "<input type='hidden' id='id_rendimento" + qtdeCamposRendimentos + "' name='id[]'>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Grau de Parentesco</label>";
    html += "           <select type='text' class='form-control' name='tipoFamiliar[]' placeholder='Grau de Parentesco'>";
    html += "               <option value=''>Selecione</option>";
    html += "               <option value='Conjugue'>Conjugue</option>";
    html += "               <option value='Filho'>Filho</option>";
    html += "           </select>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <label>Rendimento Mensal</label>";
    html += "       <div class='input-group date'>";
    html += "           <div class='input-group-prepend'>";
    html += "               <span class='input-group-text'>R$</span>";
    html += "           </div>";
    html += "           <input name='ren_redimento_mensal[]' class='form-control' placeholder='Renda Mensal'";
    html += "               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <label>Outras Rendas</label>";
    html += "       <div class='input-group date'>";
    html += "           <div class='input-group-prepend'>";
    html += "               <span class='input-group-text'>R$</span>";
    html += "           </div>";
    html += "           <input name='ren_outras[]' class='form-control' placeholder='Renda Mensal'";
    html += "               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Declaração de IR</label>";
    html += "           <select name='declaracaodeir[]' class='form-control'>";
    html += "               <option value=''>Selecione</option>";
    html += "               <option value='1'>Completa</option>";
    html += "               <option value='2'>Simplificada</option>";
    html += "           </select>";
    html += "      </div>";
    html += "   </div>";
    html += "   <div class='col-md-1'>";
    html += "       <label>&nbsp;</label>";
    html += "       <input type='button' value='-' class='btn btn-default' onclick='removerCampoRendimento(" + qtdeCamposRendimentos + ")' style='position: relative;top: 30px;'/>";
    html += "   </div>";
    html += "</div>";
    $("#divRendimentosFamiliares").append(html);
    qtdeCamposRendimentos++;
}
//------------------------------------------------------------------------------
function removerCampoRendimento(id) {
    $("#divRendimentosFamiliares")[0].removeChild($("#rendimentos" + id)[0]);
}
//------------------------------------------------------------------------------
function deletaRendimentoFamiliar(id) {
    $.ajax({
        type: 'POST',
        url: '/rendimentos/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#divRendimentosFamiliares")[0].removeChild($("#rendimentos_delete" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}
