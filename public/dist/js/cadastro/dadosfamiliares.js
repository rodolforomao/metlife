$(document).ready(function () {
    //Dados Familiares----------------------------------------------------------
    $("#insereDadosFamiliares").click(function () {
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();

        var tipoFamiliar = new Object();
        tipoFamiliar.name = "tipoFamiliar";
        tipoFamiliar.value = "Conjugue";
        //Conjugue--------------------------------------------------------------
        var formDadosFamiliares = $("#formDadosFamiliares").serializeArray();
        formDadosFamiliares.push(idCliente);
        formDadosFamiliares.push(tipoFamiliar);

        $.ajax({
            type: 'POST',
            url: '/dadosFamiliares/cadastro',
            data: formDadosFamiliares,
            dataType: 'json',
            success: function (data) {
                $("#idFamiliarConjugue").val(data);
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
        //Filhos--------------------------------------------------------------
        var formDadosFamiliaresFilhos = $("#formDadosFamiliaresFilhos").serializeArray();
        tipoFamiliar.name = "tipoFamiliar";
        tipoFamiliar.value = "Filho";
        formDadosFamiliaresFilhos.push(idCliente);
        formDadosFamiliaresFilhos.push(tipoFamiliar);
        if (formDadosFamiliaresFilhos.length > 2) {
            $.ajax({
                type: 'POST',
                url: '/dadosFamiliares/cadastro',
                data: formDadosFamiliaresFilhos,
                dataType: 'json',
                success: function (data) {
                    $.notify('Cadastrado com sucesso!', "success");
                    var html = "";
                    for (i = 0; i < data.length; i++) {
                        html += "<div class='row' id='filho_deleta" + data[i].id + "'>";
                        html += "<input type='hidden' name='id[]' value='" + data[i].id + "'>";
                        html += "   <div class='col-md-6'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Filho</label>";
                        html += "           <input type='text' class='form-control' name='df_filho[]' placeholder='Filho' value='" + data[i].df_filho + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-5'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Data Nascimento</label>";
                        html += "           <div class='input-group'>";
                        html += "               <div class='input-group-prepend'>";
                        html += "                   <span class='input-group-text'><i class='fa fa-calendar'></i></span>";
                        html += "                   <input name='data_nascimento_filho[]' type='text' data-provide='datepicker' class='datepicker form-control' value='" + data[i].data_nascimento_filho + "'>";
                        html += "               </div>";
                        html += "           </div>";
                        html += "       </div>";
                        html += "   </div> ";
                        html += "   <div class='col-md-1'>";
                        html += "       <input type='button' value='-' class='btn btn-default' onclick='deletaFilho(" + data[i].id + ")' style='position: relative;top: 30px;'/>";
                        html += "   </div>";
                        html += "</div>";
                    }
                    $("#formDadosFamiliaresFilhos").html(html);
                    $('#rendimentos_menu').click();
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        } else {
            $.notify('Cadastrado com sucesso!', "success");
            $('#rendimentos_menu').click();
        }

    });
});
//Dados Familiares--------------------------------------------------------------
var qtdeCampos = 0;
function addCampoFilho() {
    var html = "";
    html += "<div class='row' id='filho" + qtdeCampos + "'>";
    html += "<input type='hidden' id='idFilho_" + qtdeCampos + "' name='id[]'>";
    html += "   <div class='col-md-6'>";
    html += "       <div class='form-group'>";
    html += "           <label>Filho</label>";
    html += "           <input type='text' class='form-control' name='df_filho[]' placeholder='Filho'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-5'>";
    html += "       <div class='form-group'>";
    html += "           <label>Data Nascimento</label>";
    html += "           <div class='input-group'>";
    html += "               <div class='input-group-prepend'>";
    html += "                   <span class='input-group-text'><i class='fa fa-calendar'></i></span>";
    html += "                   <input name='data_nascimento_filho[]' type='text' data-provide='datepicker' class='datepicker form-control'>";
    html += "               </div>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div> ";
    html += "   <div class='col-md-1'>";
    html += "       <input type='button' value='-' class='btn btn-default' onclick='removerCampoFilho(" + qtdeCampos + ")' style='position: relative;top: 30px;'/>";
    html += "   </div>";
    html += "</div>";
    $("#formDadosFamiliaresFilhos").append(html);
    qtdeCampos++;
}
//------------------------------------------------------------------------------
function removerCampoFilho(id) {
    $("#formDadosFamiliaresFilhos")[0].removeChild($("#filho" + id)[0]);
    qtdeCampos--;
}
//------------------------------------------------------------------------------
function deletaFilho(id) {
    $.ajax({
        type: 'POST',
        url: '/dadosFamiliares/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#formDadosFamiliaresFilhos")[0].removeChild($("#filho_deleta" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}

