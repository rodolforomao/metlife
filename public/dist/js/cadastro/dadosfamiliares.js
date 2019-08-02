$(document).ready(function () {
    dadosFamiliares ="";
    //Dados Familiares----------------------------------------------------------
    $("#insereDadosFamiliares").click(function () {
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();

        var formDadosFamiliares = $("#formDadosFamiliares").serializeArray();
        formDadosFamiliares.push(idCliente);
        if (formDadosFamiliares.length > 2) {
            $.ajax({
                type: 'POST',
                url: '/dadosFamiliares/cadastro',
                data: formDadosFamiliares,
                dataType: 'json',
                success: function (data) {
                    $.notify('Cadastrado com sucesso!', "success");
                    $("#formDadosFamiliares").html("");

                    dadosFamiliares = "";
                    var html = "";
                    for (i = 0; i < data.length; i++) {
                        dadosFamiliares += "    <option value='" + data[i].id + "'>" + data[i].df_nome + "</option>";
                        html = "";
                        html += "<div class='row' id='filho_deleta" + data[i].id + "'>";
                        html += "<input type='hidden' name='id[]' value='" + data[i].id + "'>";
                        html += "   <div class='col-md-4'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Grau de Parentesco</label>";
                        html += "           <select type='text' class='form-control' id='tipo_familiar" + i + "' name='tipoFamiliar[]' placeholder='Grau de Parentesco'>";
                        html += "               <option value=''>Selecione</option>";
                        html += "               <option value='1'>Conjugue</option>";
                        html += "               <option value='2'>Filho</option>";
                        html += "           </select>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-4'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Nome</label>";
                        html += "           <input type='text' class='form-control' name='df_nome[]' placeholder='Nome' value='" + data[i].df_nome + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Data Nascimento</label>";
                        html += "           <div class='input-group'>";
                        html += "               <div class='input-group-prepend'>";
                        html += "                   <span class='input-group-text'><i class='fa fa-calendar'></i></span>";
                        html += "                   <input name='data_nascimento[]' type='text' data-provide='datepicker' class='datepicker form-control' value='" + data[i].data_nascimento + "'>";
                        html += "               </div>";
                        html += "           </div>";
                        html += "       </div>";
                        html += "   </div> ";
                        html += "   <div class='col-md-1'>";
                        html += "       <label>&nbsp;</label>";
                        html += "       <input type='button' value='-' class='btn btn-default' onclick='deletaFamiliar(" + data[i].id + ")' style='position: relative;top: 30px;'/>";
                        html += "   </div>";
                        html += "</div>";
                        $("#formDadosFamiliares").append(html);
                        $("#tipo_familiar" + i).val(data[i].tipoFamiliar);
                    }
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
function addCampoFamiliar() {
    var html = "";
    html += "<div class='row' id='filho" + qtdeCampos + "'>";
    html += "<input type='hidden' id='idFilho_" + qtdeCampos + "' name='id[]'>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Grau de Parentesco</label>";
    html += "           <select type='text' class='form-control' name='tipoFamiliar[]' placeholder='Grau de Parentesco'>";
    html += "               <option value=''>Selecione</option>";
    html += "               <option value='1'>Conjugue</option>";
    html += "               <option value='2'>Filho</option>";
    html += "           </select>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Nome</label>";
    html += "           <input type='text' class='form-control' name='df_nome[]' placeholder='Nome'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Data Nascimento</label>";
    html += "           <div class='input-group'>";
    html += "               <div class='input-group-prepend'>";
    html += "                   <span class='input-group-text'><i class='fa fa-calendar'></i></span>";
    html += "                   <input name='data_nascimento[]' type='text' data-provide='datepicker' class='datepicker form-control'>";
    html += "               </div>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div> ";
    html += "   <div class='col-md-1'>";
    html += "       <label>&nbsp;</label>";
    html += "       <input type='button' value='-' class='btn btn-default' onclick='removerCampoFilho(" + qtdeCampos + ")' style='position: relative;top: 30px;'/>";
    html += "   </div>";
    html += "</div>";
    $("#formDadosFamiliares").append(html);
    qtdeCampos++;
}
//------------------------------------------------------------------------------
function removerCampoFilho(id) {
    $("#formDadosFamiliaresFilhos")[0].removeChild($("#filho" + id)[0]);
    qtdeCampos--;
}
//------------------------------------------------------------------------------
function deletaFamiliar(id) {
    $.ajax({
        type: 'POST',
        url: '/dadosFamiliares/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#formDadosFamiliares")[0].removeChild($("#filho_deleta" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}

