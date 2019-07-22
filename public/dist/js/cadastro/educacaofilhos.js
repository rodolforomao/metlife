$(document).ready(function () {
    //Educação filhos ----------------------------------------------------------
    $("#insereEducacaoFilhos").click(function () {
        var formEducacaoFilhos = $("#formEducacaoFilhos").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formEducacaoFilhos.push(idCliente);
        console.log(formEducacaoFilhos);
        $.ajax({
            type: 'POST',
            url: '/educacao_filhos/cadastro',
            data: formEducacaoFilhos,
            dataType: 'json',
            success: function (data) {
                var html = "";
                for (i = 0; i < data.length; i++) {
                    html += "<div class='row' id='filhoEducacao_delete" + data[i].id + "'>";
                    html += "   <input type='hidden' name='id[]'  value='" + data[i].id + "'>";
                    html += "   <div class='col-md-4'>";
                    html += "       <div class='form-group'>";
                    html += "           <label>Apelido</label>";
                    html += "           <input type='text' class='form-control' name='apelido[]' placeholder='Apelido' value='" + data[i].apelido + "'>";
                    html += "       </div>";
                    html += "   </div>";
                    html += "   <div class='col-md-4'>";
                    html += "       <div class='form-group'>";
                    html += "           <label>Idade / Série</label>";
                    html += "           <input type='text' class='form-control' name='idadeserie[]' placeholder='Idade / Série' value='" + data[i].idadeserie + "'>";
                    html += "       </div>";
                    html += "   </div>";
                    html += "   <div class='col-md-4'>";
                    html += "       <div class='form-group'>";
                    html += "           <label>Total de Anos Para Formação</label>";
                    html += "           <input type='text' class='form-control' name='total_anos[]' placeholder='Total de Anos Para Formação' value='" + data[i].total_anos + "'>";
                    html += "       </div>";
                    html += "   </div> ";
                    html += "   <div class='col-sm-12 col-md-4'>";
                    html += "       <div class='row'>";
                    html += "           <div class='col-md-12 border-bottom'>";
                    html += "               <small>Infantil / Básico (12 anos)</small>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Custo</label>";
                    html += "                   <input type='text' class='form-control' name='basico_mensal[]' value='" + data[i].basico_mensal + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Anos</label>";
                    html += "                   <input type='text' class='form-control' name='basico_anos[]' value='" + data[i].basico_anos + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Total</label>";
                    html += "                   <input type='text' class='form-control' name='basico_total[]' value='" + data[i].basico_total + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "       </div>";
                    html += "   </div>";
                    html += "   <div class='col-sm-12 col-md-4 blue-background'>";
                    html += "       <div class='row'>";
                    html += "           <div class='col-md-12 border-bottom'>";
                    html += "               <small>Fundamental (3 anos)</small>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Custo</label>";
                    html += "                   <input type='text' class='form-control' name='fundamental_mensal[]' value='" + data[i].fundamental_mensal + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Anos</label>";
                    html += "                   <input type='text' class='form-control' name='fundamental_anos[]' value='" + data[i].fundamental_anos + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Total</label>";
                    html += "                   <input type='text' class='form-control' name='fundamental_total[]' value='" + data[i].fundamental_total + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "       </div>";
                    html += "   </div>";
                    html += "   <div class='col-sm-12 col-md-4'>";
                    html += "       <div class='row'>";
                    html += "           <div class='col-md-12 border-bottom'>";
                    html += "               <small>Superior (4 a 5 anos)</small>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Custo</label>";
                    html += "                   <input type='text' class='form-control' name='superior_mensal[]' value='" + data[i].superior_total + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Anos</label>";
                    html += "                   <input type='text' class='form-control' name='superior_anos[]' value='" + data[i].superior_total + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "           <div class='col-md-4'>";
                    html += "               <div class='form-group'>";
                    html += "                   <label>Total</label>";
                    html += "                   <input type='text' class='form-control' name='superior_total[]' value='" + data[i].superior_total + "'>";
                    html += "               </div>";
                    html += "           </div>";
                    html += "       </div>";
                    html += "   </div>";
                    html += "   <div class='col-md-12'>";
                    html += "       <input type='button' value='Remover' class='pull-right btn btn-default' onclick='deletaEducacao(" + data[i].id + ")'/>";
                    html += "   </div>";
                    html += "</div>";
                }
                $("#divEducacaoFilhos").html(html);
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
    html += "   <input type='hidden' name='id[]'>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Apelido</label>";
    html += "           <input type='text' class='form-control' name='apelido[]' placeholder='Apelido'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Idade / Série</label>";
    html += "           <input type='text' class='form-control' name='idadeserie[]' placeholder='Idade / Série'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Total de Anos Para Formação</label>";
    html += "           <input type='text' class='form-control' name='total_anos[]' placeholder='Total de Anos Para Formação'>";
    html += "       </div>";
    html += "   </div> ";
    html += "   <div class='col-sm-12 col-md-4'>";
    html += "       <div class='row'>";
    html += "           <div class='col-md-12 border-bottom'>";
    html += "               <small>Infantil / Básico (12 anos)</small>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Custo</label>";
    html += "                   <input type='text' class='form-control' name='basico_mensal[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Anos</label>";
    html += "                   <input type='text' class='form-control' name='basico_anos[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Total</label>";
    html += "                   <input type='text' class='form-control' name='basico_total[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-sm-12 col-md-4 blue-background'>";
    html += "       <div class='row'>";
    html += "           <div class='col-md-12 border-bottom'>";
    html += "               <small>Fundamental (3 anos)</small>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Custo</label>";
    html += "                   <input type='text' class='form-control' name='fundamental_mensal[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Anos</label>";
    html += "                   <input type='text' class='form-control' name='fundamental_anos[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Total</label>";
    html += "                   <input type='text' class='form-control' name='fundamental_total[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-sm-12 col-md-4'>";
    html += "       <div class='row'>";
    html += "           <div class='col-md-12 border-bottom'>";
    html += "               <small>Superior (4 a 5 anos)</small>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Custo</label>";
    html += "                   <input type='text' class='form-control' name='superior_mensal[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Anos</label>";
    html += "                   <input type='text' class='form-control' name='superior_anos[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "           <div class='col-md-4'>";
    html += "               <div class='form-group'>";
    html += "                   <label>Total</label>";
    html += "                   <input type='text' class='form-control' name='superior_total[]'>";
    html += "               </div>";
    html += "           </div>";
    html += "       </div>";
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
    qtdeCamposEducacao--;
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