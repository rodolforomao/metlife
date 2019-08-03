$(document).ready(function () {
    //Educação filhos ----------------------------------------------------------
    $("#insereEducacaoFilhos").click(function () {
        var formEducacaoFilhos = $("#formEducacaoFilhos").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formEducacaoFilhos.push(idCliente);
        $.ajax({
            type: 'POST',
            url: '/educacao_filhos/cadastro',
            data: formEducacaoFilhos,
            dataType: 'json',
            success: function (data) {
                $("#divEducacaoFilhos").html("");
                for (i = 0; i < data.length; i++) {
                    var html = "";
                    html += "<div class='row' id='filhoEducacao_delete" + i + "'>";
                    html += "   <div class='col-md-3'>";
                    html += "       <div class='form-group'>";
                    html += "           <label>Idade / Série</label>";
                    html += "           <select type='text' class='form-control' id='tipo_familiar_educacao" + i + "' name='tipoFamiliar[]' placeholder='Grau de Parentesco'>";
                    html += "               <option value=''>Selecione</option>";
                    html += dadosFamiliares;
                    html += "           </select>";
                    html += "       </div>";
                    html += "   </div>";
                    html += "   <div class='col-md-12'>";
                    html += "       <table class='table table-hover' style='font-size: 12px;'>";
                    html += "           <thead>";
                    html += "               <tr>";
                    html += "                   <th style='width: 160px;'>Ensino</th>";
                    html += "                   <th>Custo</th>";
                    html += "                   <th>Anos</th>";
                    html += "                   <th>Total</th>";
                    html += "               </tr>";
                    html += "           </thead>";
                    html += "           <tbody>";
                    for (j = 1; j <= 5; j++) {
                        html += "               <tr>";
                        html += "                   <td>";
                        html += "                       <input type='text' class='form-control' style='font-size: 12px;' value='" + data[i][j].ensino + "' disabled='true'>";
                        html += "                       <input type='hidden' value='" + data[i][j].id + "' name='id" + j + "[]'>";
                        html += "                   </td>";
                        html += "                   <td class='yellow-background'>";
                        html += "                       <div class='input-group date'>";
                        html += "                           <div class='input-group-prepend'>";
                        html += "                               <span class='input-group-text'>R$</span>";
                        html += "                           </div>";
                        html += "                           <input name='custo" + j + "[]' value='" + data[i][j].custo + "' class='form-control'";
                        html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
                        html += "                       </div>";
                        html += "                   </td>";
                        html += "                   <td class='yellow-background'>";
                        html += "                       <input name='anos" + j + "[]' value='" + data[i][j].anos + "' class='form-control'>";
                        html += "                   </td>"
                        html += "                   <td class='yellow-background'>";
                        html += "                       <div class='input-group date'>";
                        html += "                           <div class='input-group-prepend'>";
                        html += "                               <span class='input-group-text'>R$</span>";
                        html += "                           </div>";
                        html += "                           <input name='total" + j + "[]' class='form-control' value='" + data[i][j].total + "'";
                        html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
                        html += "                       </div>";
                        html += "                   </td>";
                        html += "               </tr>";
                        var tipoFamiliar = (data[i][j].tipoFamiliar);
                        var apelido = (data[i][j].apelido);
                        var idadeserie = (data[i][j].idadeserie);
                    }
                    html += "           </tbody>";
                    html += "       </table>";
                    html += "   </div>";
                    html += "   <div class='col-md-12'>";
                    html += "       <input type='button' value='Remover' class='pull-right btn btn-default' onclick='deletaEducacao(" + data[i].id + ")'/>";
                    html += "   </div>";
                    html += "</div>";
                    $("#divEducacaoFilhos").append(html);
                    $("#tipo_familiar_educacao" + i).val(tipoFamiliar);
                }
                $.notify('Cadastrado com sucesso!', "success");
                $('#padraoVida_menu').click();
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });
});
//EDUCAÇÃO FILHOS --------------------------------------------------------------
var qtdeCamposEducacao = 0;
function addCampoFilhoEducacao() {
    var html = "";
    html += "<div class='row' id='filhoEducacao" + qtdeCamposEducacao + "'>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Familiar</label>";
    html += "           <select type='text' class='form-control' id='tipo_familiar_educacao" + qtdeCamposEducacao + "' name='tipoFamiliar[]' placeholder='Grau de Parentesco'>";
    html += "               <option value=''>Selecione</option>";
    html += dadosFamiliares;
    html += "           </select>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-12'>";
    html += "       <table class='table table-hover' style='font-size: 12px;'>";
    html += "           <thead>";
    html += "               <tr>";
    html += "                   <th style='width: 160px;'>Ensino</th>";
    html += "                   <th>Custo</th>";
    html += "                   <th>Anos</th>";
    html += "                   <th>Total</th>";
    html += "               </tr>";
    html += "           </thead>";
    html += "           <tbody>";
    html += "               <tr>";
    html += "                   <td>";
    html += "                       <input type='text' class='form-control' style='font-size: 12px;' value='Básico' disabled='true'>";
    html += "                       <input type='hidden' name='id1[]'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='custo1[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <input name='anos1[]' class='form-control'>";
    html += "                   </td>"
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='total1[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "               </tr>";
    html += "               <tr>";
    html += "                   <td>";
    html += "                       <input type='text' class='form-control' style='font-size: 12px;' value='Infantil' disabled='true'>";
    html += "                       <input type='hidden' name='id2[]'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='custo2[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <input name='anos2[]' class='form-control'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='total2[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "               </tr>";
    html += "               <tr>";
    html += "                   <td>";
    html += "                       <input type='text' class='form-control' style='font-size: 12px;' value='Fundamental' disabled='true'>";
    html += "                       <input type='hidden' name='id3[]'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='custo3[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <input name='anos3[]' class='form-control'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='total3[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "               </tr>";
    html += "               <tr>";
    html += "                   <td>";
    html += "                       <input type='text' class='form-control' style='font-size: 12px;' value='Médio' disabled='true'>";
    html += "                       <input type='hidden' name='id4[]'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='custo4[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <input name='anos4[]' class='form-control'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='total4[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "               </tr>";
    html += "               <tr>";
    html += "                   <td>";
    html += "                       <input type='text' class='form-control' style='font-size: 12px;' value='Superio' disabled='true'>";
    html += "                       <input type='hidden' name='id5[]'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='custo5[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <input name='anos5[]' class='form-control'>";
    html += "                   </td>";
    html += "                   <td class='yellow-background'>";
    html += "                       <div class='input-group date'>";
    html += "                           <div class='input-group-prepend'>";
    html += "                               <span class='input-group-text'>R$</span>";
    html += "                           </div>";
    html += "                           <input name='total5[]' class='form-control'";
    html += "                               onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange=''>";
    html += "                       </div>";
    html += "                   </td>";
    html += "               </tr>";
    html += "           </tbody>";
    html += "       </table>";
    html += "   </div>";
    html += "   <div class='col-md-12'>";
    html += "       <input type='button' value='Remover' class='pull-right btn btn-default' onclick='removerCampoFilhoEducacao(" + qtdeCamposEducacao + ")'/>";
    html += "   </div>";
    html += "</div>";
    $("#divEducacaoFilhos").append(html);
    qtdeCamposEducacao++;
}
//------------------------------------------------------------------------------
function removerCampoFilhoEducacao(id) {
    $("#divEducacaoFilhos")[0].removeChild($("#filhoEducacao" + id)[0]);
}
//------------------------------------------------------------------------------
function deletaEducacao(id) {
    $.ajax({
        type: 'POST',
        url: '/educacao_filhos/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#divEducacaoFilhos")[0].removeChild($("#filhoEducacao_delete" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}