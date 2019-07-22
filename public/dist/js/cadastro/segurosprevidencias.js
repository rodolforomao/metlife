$(document).ready(function () {
    //Seguro e Previdências ---------------------------------------------------
    $("#insereSeguroPrevidencia").click(function () {
        var idCliente = new Object();
        var tipoFamiliar = new Object();

        //PRINCIPAL ------------------------------------------------------------
        var formPrincipalSeguros = $("#formPrincipalSeguros").serializeArray();

        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();

        tipoFamiliar.name = "tipoFamiliar";
        tipoFamiliar.value = "Principal";

        formPrincipalSeguros.push(idCliente);
        formPrincipalSeguros.push(tipoFamiliar);

        $.ajax({
            type: 'POST',
            url: '/FGST/cadastro',
            data: formPrincipalSeguros,
            dataType: 'json',
            success: function (data) {
                $("#id_inss_fgts_principal").val(data);
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });

        var formPrevidenciaPrincipal = $("#formPrevidenciaPrincipal").serializeArray();
        if (formPrevidenciaPrincipal.length > 0) {
            idCliente.name = "idCliente";
            idCliente.value = $("#idCliente").val();

            tipoFamiliar.name = "tipoFamiliar";
            tipoFamiliar.value = "Principal";

            formPrevidenciaPrincipal.push(idCliente);
            formPrevidenciaPrincipal.push(tipoFamiliar);

            $.ajax({
                type: 'POST',
                url: '/previdencia/cadastro',
                data: formPrevidenciaPrincipal,
                dataType: 'json',
                success: function (data) {
                    var html = "";
                    for (i = 0; i < data.length; i++) {
                        html += "<div class='row' id='previdenciaPrincipal_delete" + data[i].id + "'>";
                        html += "   <input type='hidden' name='id[]' value='" + data[i].id + "'>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Previdência</label>";
                        html += "           <input type='text' class='form-control' name='previdencia[]' placeholder='Previdência' value='" + data[i].previdencia + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-2'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>PGBL/VGBL</label>";
                        html += "           <input type='text' class='form-control' name='pglb_vgbl[]' placeholder='PGBL/VGBL' value='" + data[i].pglb_vgbl + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Saldo Acumulado R$</label>";
                        html += "           <div class='input-group date'>";
                        html += "               <div class='input-group-prepend'>";
                        html += "                   <span class='input-group-text'>R$</span>";
                        html += "               </div>";
                        html += "               <input type='text' class='form-control' name='saldo_acumulado[]' placeholder='Saldo Acumulado R$' value='" + data[i].saldo_acumulado + "'";
                        html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
                        html += "           </div>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Contribuição Anual</label>";
                        html += "           <input type='text' class='form-control' name='contribuicao_anual[]' placeholder='Contribuição Anual' value='" + data[i].contribuicao_anual + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-1'>";
                        html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deletePrevidenciaPrincipal(" + data[i].id + ")'/>";
                        html += "   </div>";
                        html += "</div>";
                    }
                    $("#previdencia_principal").html(html);
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        }

        var formSeguroPrincipal = $("#formSeguroPrincipal").serializeArray();
        if (formSeguroPrincipal.length > 0) {
            idCliente.name = "idCliente";
            idCliente.value = $("#idCliente").val();

            tipoFamiliar.name = "tipoFamiliar";
            tipoFamiliar.value = "Principal";

            formSeguroPrincipal.push(idCliente);
            formSeguroPrincipal.push(tipoFamiliar);

            $.ajax({
                type: 'POST',
                url: '/seguros/cadastro',
                data: formSeguroPrincipal,
                dataType: 'json',
                success: function (data) {
                    var html = "";
                    for (i = 0; i < data.length; i++) {
                        html += "<div class='row' id='seguroPrincipal_delete" + data[i].id + "'>";
                        html += "   <input type='hidden' name='id[]' value='" + data[i].id + "'>";
                        html += "   <div class='col-md-4'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Seguro de Vida</label>";
                        html += "           <input type='text' class='form-control' name='seguro_vida[]' placeholder='Seguro de Vida' value='" + data[i].seguro_vida + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-4'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Capital Segurado</label>";
                        html += "           <input type='text' class='form-control' name='capital_segurado[]' placeholder='Capital Segurado' value='" + data[i].capital_segurado + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Prêmio Mensal</label>";
                        html += "           <input type='text' class='form-control' name='premio_mensal[]' placeholder='Prêmio Mensal' value='" + data[i].premio_mensal + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-1'>";
                        html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deletaCampoSeguroPrincipal(" + data[i].id + ")'/>";
                        html += "   </div>";
                        html += "</div>";
                    }
                    $("#seguro_principal").html(html);
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        }

        //CONJUGUE -------------------------------------------------------------

        var formConjugueSeguros = $("#formConjugueSeguros").serializeArray();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();

        tipoFamiliar.name = "tipoFamiliar";
        tipoFamiliar.value = "Conjugue";

        formConjugueSeguros.push(idCliente);
        formConjugueSeguros.push(tipoFamiliar);

        if (formConjugueSeguros[1].value !== "") {
            $.ajax({
                type: 'POST',
                url: '/FGST/cadastro',
                data: formConjugueSeguros,
                dataType: 'json',
                success: function (data) {
                    $("#id_inss_fgts_conjugue").val(data);
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        }


        var formPrevidenciaConjugue = $("#formPrevidenciaConjugue").serializeArray();
        if (formPrevidenciaConjugue.length > 0) {
            idCliente.name = "idCliente";
            idCliente.value = $("#idCliente").val();

            tipoFamiliar.name = "tipoFamiliar";
            tipoFamiliar.value = "Conjugue";

            formPrevidenciaConjugue.push(idCliente);
            formPrevidenciaConjugue.push(tipoFamiliar);

            $.ajax({
                type: 'POST',
                url: '/previdencia/cadastro',
                data: formPrevidenciaConjugue,
                dataType: 'json',
                success: function (data) {
                    var html = "";
                    for (i = 0; i < data.length; i++) {
                        html += "<div class='row' id='previdenciaConjugue_delete" + data[i].id + "'>";
                        html += "   <input type='hidden' name='id[]' value='" + data[i].id + "'>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Previdência</label>";
                        html += "           <input type='text' class='form-control' name='previdencia[]' placeholder='Previdência' value='" + data[i].previdencia + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-2'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>PGBL/VGBL</label>";
                        html += "           <input type='text' class='form-control' name='pglb_vgbl[]' placeholder='PGBL/VGBL' value='" + data[i].pglb_vgbl + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Saldo Acumulado R$</label>";
                        html += "           <div class='input-group date'>";
                        html += "               <div class='input-group-prepend'>";
                        html += "                   <span class='input-group-text'>R$</span>";
                        html += "               </div>";
                        html += "               <input type='text' class='form-control' name='saldo_acumulado[]' placeholder='Saldo Acumulado R$' value='" + data[i].saldo_acumulado + "'";
                        html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
                        html += "           </div>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Contribuição Anual</label>";
                        html += "           <input type='text' class='form-control' name='contribuicao_anual[]' placeholder='Contribuição Anual' value='" + data[i].contribuicao_anual + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-1'>";
                        html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deletePrevidenciaConjugue(" + data[i].id + ")'/>";
                        html += "   </div>";
                        html += "</div>";
                    }
                    $("#previdencia_conjugue").html(html);
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        }

        var formSeguroConjugue = $("#formSeguroConjugue").serializeArray();
        if (formSeguroConjugue.length > 0) {
            idCliente.name = "idCliente";
            idCliente.value = $("#idCliente").val();

            tipoFamiliar.name = "tipoFamiliar";
            tipoFamiliar.value = "Conjugue";

            formSeguroConjugue.push(idCliente);
            formSeguroConjugue.push(tipoFamiliar);

            $.ajax({
                type: 'POST',
                url: '/seguros/cadastro',
                data: formSeguroConjugue,
                dataType: 'json',
                success: function (data) {
                    var html = "";
                    for (i = 0; i < data.length; i++) {
                        html += "<div class='row' id='seguroConjugue_delete" + data[i].id + "'>";
                        html += "   <input type='hidden' name='id[]' value='" + data[i].id + "'>";
                        html += "   <div class='col-md-4'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Seguro de Vida</label>";
                        html += "           <input type='text' class='form-control' name='seguro_vida[]' placeholder='Seguro de Vida' value='" + data[i].seguro_vida + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-4'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Capital Segurado</label>";
                        html += "           <input type='text' class='form-control' name='capital_segurado[]' placeholder='Capital Segurado' value='" + data[i].capital_segurado + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-3'>";
                        html += "       <div class='form-group'>";
                        html += "           <label>Prêmio Mensal</label>";
                        html += "           <input type='text' class='form-control' name='premio_mensal[]' placeholder='Prêmio Mensal' value='" + data[i].premio_mensal + "'>";
                        html += "       </div>";
                        html += "   </div>";
                        html += "   <div class='col-md-1'>";
                        html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deletaCampoSeguroConjugue(" + data[i].id + ")'/>";
                        html += "   </div>";
                        html += "</div>";
                    }
                    $("#seguro_conjugue").html(html);
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        }
        $.notify('Cadastrado com sucesso!', "success");
        $('#plano_menu').click();
    });
});

///SEGURO E PREVIDENCIA ---------------------------------------------------------
var qtdCamposPrevidenciaPrincipal = 0;
function addCampoPrevidenciaPrincipal() {
    var html = "";
    html += "<div class='row' id='previdenciaPrincipal" + qtdCamposPrevidenciaPrincipal + "'>";
    html += "   <input type='hidden' name='id[]'>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Previdência</label>";
    html += "           <input type='text' class='form-control' name='previdencia[]' placeholder='Previdência'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>PGBL/VGBL</label>";
    html += "           <input type='text' class='form-control' name='pglb_vgbl[]' placeholder='PGBL/VGBL'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Saldo Acumulado R$</label>";
    html += "           <div class='input-group date'>";
    html += "               <div class='input-group-prepend'>";
    html += "                   <span class='input-group-text'>R$</span>";
    html += "               </div>";
    html += "               <input type='text' class='form-control' name='saldo_acumulado[]' placeholder='Saldo Acumulado R$'";
    html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Contribuição Anual</label>";
    html += "           <input type='text' class='form-control' name='contribuicao_anual[]' placeholder='Contribuição Anual'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-1'>";
    html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='removerCampoPrevidenciaPrincipal(" + qtdCamposPrevidenciaPrincipal + ")'/>";
    html += "   </div>";
    html += "</div>";
    $("#previdencia_principal").append(html);
    qtdCamposPrevidenciaPrincipal++;
}
//------------------------------------------------------------------------------
function removerCampoPrevidenciaPrincipal(id) {
    $("#previdencia_principal")[0].removeChild($("#previdenciaPrincipal" + id)[0]);
    qtdCamposPrevidenciaPrincipal--;
}

//------------------------------------------------------------------------------
var qtdCamposPrevidenciaConjugue = 0;
function addCampoPrevidenciaConjugue() {
    var html = "";
    html += "<div class='row' id='previdenciaConjugue" + qtdCamposPrevidenciaConjugue + "'>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Previdência</label>";
    html += "           <input type='text' class='form-control' name='previdencia[]' placeholder='Previdência'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>PGBL/VGBL</label>";
    html += "           <input type='text' class='form-control' name='pglb_vgbl[]' placeholder='PGBL/VGBL'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Saldo Acumulado R$</label>";
    html += "           <div class='input-group date'>";
    html += "               <div class='input-group-prepend'>";
    html += "                   <span class='input-group-text'>R$</span>";
    html += "               </div>";
    html += "               <input type='text' class='form-control' name='saldo_acumulado[]' placeholder='Saldo Acumulado R$'";
    html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Contribuição Anual</label>";
    html += "           <input type='text' class='form-control' name='contribuicao_anual[]' placeholder='Contribuição Anual'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-1'>";
    html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='removerCampoPrevidenciaConjugue(" + qtdCamposPrevidenciaConjugue + ")'/>";
    html += "   </div>";
    html += "</div>";
    $("#previdencia_conjugue").append(html);
    qtdCamposPrevidenciaConjugue++;
}
//------------------------------------------------------------------------------
function removerCampoPrevidenciaConjugue(id) {
    $("#previdencia_conjugue")[0].removeChild($("#previdenciaConjugue" + id)[0]);
    qtdCamposPrevidenciaConjugue--;
}
//------------------------------------------------------------------------------

var qtdCamposSeguroPrincipal = 0;
function addCampoSeguroPrincipal() {
    var html = "";
    html += "<div class='row' id='seguroPrincipal" + qtdCamposSeguroPrincipal + "'>";
    html += "   <input type='hidden' name='id[]'>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Seguro de Vida</label>";
    html += "           <input type='text' class='form-control' name='seguro_vida[]' placeholder='Seguro de Vida'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Capital Segurado</label>";
    html += "           <input type='text' class='form-control' name='capital_segurado[]' placeholder='Capital Segurado'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Prêmio Mensal</label>";
    html += "           <input type='text' class='form-control' name='premio_mensal[]' placeholder='Prêmio Mensal'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-1'>";
    html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='removerCampoSeguroPrincipal(" + qtdCamposSeguroPrincipal + ")'/>";
    html += "   </div>";
    html += "</div>";
    $("#seguro_principal").append(html);
    qtdCamposSeguroPrincipal++;
}
//------------------------------------------------------------------------------
function removerCampoSeguroPrincipal(id) {
    $("#seguro_principal")[0].removeChild($("#seguroPrincipal" + id)[0]);
    qtdCamposSeguroPrincipal--;
}
//------------------------------------------------------------------------------

var qtdCamposSeguroConjugue = 0;
function addCampoSeguroConjugue() {
    var html = "";
    html += "<div class='row' id='seguroConjugue" + qtdCamposSeguroConjugue + "'>";
    html += "   <input type='hidden' name='id[]'>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Seguro de Vida</label>";
    html += "           <input type='text' class='form-control' name='seguro_vida[]' placeholder='Seguro de Vida'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-4'>";
    html += "       <div class='form-group'>";
    html += "           <label>Capital Segurado</label>";
    html += "           <input type='text' class='form-control' name='capital_segurado[]' placeholder='Capital Segurado'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-3'>";
    html += "       <div class='form-group'>";
    html += "           <label>Prêmio Mensal</label>";
    html += "           <input type='text' class='form-control' name='premio_mensal[]' placeholder='Prêmio Mensal'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-1'>";
    html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='removerCampoSeguroConjugue(" + qtdCamposSeguroConjugue + ")'/>";
    html += "   </div>";
    html += "</div>";
    $("#seguro_conjugue").append(html);
    qtdCamposSeguroConjugue++;
}
//------------------------------------------------------------------------------
function removerCampoSeguroConjugue(id) {
    $("#seguro_conjugue")[0].removeChild($("#seguroConjugue" + id)[0]);
    qtdCamposSeguroConjugue--;
}

//------------------------------------------------------------------------------
function deletePrevidenciaPrincipal(id) {
    $.ajax({
        type: 'POST',
        url: '/previdencia/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#previdencia_principal")[0].removeChild($("#previdenciaPrincipal_delete" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}
//------------------------------------------------------------------------------
function deletePrevidenciaConjugue(id) {
    $.ajax({
        type: 'POST',
        url: '/previdencia/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#previdencia_conjugue")[0].removeChild($("#previdenciaConjugue_delete" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}

//------------------------------------------------------------------------------
function deletaCampoSeguroPrincipal(id) {
    $.ajax({
        type: 'POST',
        url: '/seguros/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#seguro_principal")[0].removeChild($("#seguroPrincipal_delete" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}
//------------------------------------------------------------------------------
function deletaCampoSeguroConjugue(id) {
    $.ajax({
        type: 'POST',
        url: '/seguros/excluir',
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            $("#seguro_conjugue")[0].removeChild($("#seguroConjugue_delete" + id)[0]);
            $.notify('Excluído com sucesso!', "success");
        }, error: function (data) {
            $.notify('Falha no cadastro', "warning");
        }
    });
}