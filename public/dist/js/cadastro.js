$('a.nav-link').click(function () {
    $('a.nav-link').removeClass("active");
    $(this).addClass("active");

});
function openDadosCadastrais() {
    $('#dados_cadastrais').show();
    $('#dados_familiares').hide();
    $('#rendimentos').hide();
    $('#patrimonio').hide();
    $('#educacao_filhos').hide();
    $('#padrao_vida').hide();
    $('#emprestimos').hide();
    $('#seguros_previdencias').hide();
    $('#plano').hide();
}

function openDadosFamiliares() {
    $('#dados_familiares').show();

    $('#dados_cadastrais').hide();
    $('#rendimentos').hide();
    $('#patrimonio').hide();
    $('#educacao_filhos').hide();
    $('#padrao_vida').hide();
    $('#emprestimos').hide();
    $('#seguros_previdencias').hide();
    $('#plano').hide();
}

function openRendimentos() {
    $('#rendimentos').show();

    $('#dados_cadastrais').hide();
    $('#dados_familiares').hide();
    $('#patrimonio').hide();
    $('#educacao_filhos').hide();
    $('#padrao_vida').hide();
    $('#emprestimos').hide();
    $('#seguros_previdencias').hide();
    $('#plano').hide();
}

function openPatrimonio() {
    $('#patrimonio').show();

    $('#dados_cadastrais').hide();
    $('#dados_familiares').hide();
    $('#rendimentos').hide();
    $('#educacao_filhos').hide();
    $('#padrao_vida').hide();
    $('#emprestimos').hide();
    $('#seguros_previdencias').hide();
    $('#plano').hide();
}

function openEducacaoFilhos() {
    $('#educacao_filhos').show();

    $('#dados_cadastrais').hide();
    $('#dados_familiares').hide();
    $('#rendimentos').hide();
    $('#patrimonio').hide();
    $('#padrao_vida').hide();
    $('#emprestimos').hide();
    $('#seguros_previdencias').hide();
    $('#plano').hide();
}

function openPadraoVida() {
    $('#padrao_vida').show();

    $('#dados_cadastrais').hide();
    $('#dados_familiares').hide();
    $('#rendimentos').hide();
    $('#patrimonio').hide();
    $('#educacao_filhos').hide();
    $('#emprestimos').hide();
    $('#seguros_previdencias').hide();
    $('#plano').hide();
}

function openEmprestimos() {
    $('#emprestimos').show();

    $('#dados_cadastrais').hide();
    $('#dados_familiares').hide();
    $('#rendimentos').hide();
    $('#patrimonio').hide();
    $('#educacao_filhos').hide();
    $('#padrao_vida').hide();
    $('#seguros_previdencias').hide();
    $('#plano').hide();
}

function openSegurosPrevidencias() {
    $('#seguros_previdencias').show();

    $('#dados_cadastrais').hide();
    $('#dados_familiares').hide();
    $('#rendimentos').hide();
    $('#patrimonio').hide();
    $('#educacao_filhos').hide();
    $('#padrao_vida').hide();
    $('#emprestimos').hide();
    $('#plano').hide();
}

function openPlano() {
    $('#plano').show();

    $('#dados_cadastrais').hide();
    $('#dados_familiares').hide();
    $('#rendimentos').hide();
    $('#patrimonio').hide();
    $('#educacao_filhos').hide();
    $('#padrao_vida').hide();
    $('#emprestimos').hide();
    $('#seguros_previdencias').hide();


    $("#plano_nome_principal").text($("#dc_nome_completo").val());
    $("#plano_cpf_principal").text($("#cpf").val());
    $("#plano_sexo_principal").text($("#sexo").val());
    $("#plano_nascimento_principal").text($("#data_nascimento").val());

    $("#plano_nome_conjugue").text($("#df_conjuje").val());
    $("#plano_nascimento_conjugue").text($("#data_nascimento_conjugue").val());

}

function formatar(mascara, documento) {
    var i = documento.value.length;
    var saida = mascara.substring(0, 1);
    var texto = mascara.substring(i)

    if (texto.substring(0, 1) != saida) {
        documento.value += texto.substring(0, 1);
    }

}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN": jQuery(`meta[name="csrf-token"]`).attr("content")}
    });

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
                $.notify('Cadastrado com sucesso!', "success");
                $('#patrimonio_menu').click();
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });

    //Patrimonio ---------------------------------------------------------------
    $("#inserePatrimonio").click(function () {
        var formPatrimonio = $("#formPatrimonio").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formPatrimonio.push(idCliente);
        $.ajax({
            type: 'POST',
            url: '/patrimoio/cadastro',
            data: formPatrimonio,
            dataType: 'json',
            success: function (data) {
                var valor = 0;
                $("#valorTotal_patrimonio").text("R$" + valor.toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                $('#educacaoFilhos_menu').click();
                $.notify('Cadastrado com sucesso!', "success");
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });

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
                $.notify('Cadastrado com sucesso!', "success");
                $('#padraoVidaida_menu').click();
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });

    //Padrão de Vida------------------------------------------------------------
    $("#inserePadraoVida").click(function () {
        var formPadraoVida = $("#formPadraoVida").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formPadraoVida.push(idCliente);
        $.ajax({
            type: 'POST',
            url: '/padraoVida/cadastro',
            data: formPadraoVida,
            dataType: 'json',
            success: function (data) {
                $.notify('Cadastrado com sucesso!', "success");
                $('#emprestimos_menu').click();
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
    });

    //Empréstimos --------------------------------------------------------------
    $("#insereEmprestimos").click(function () {
        var formSaldoEmprestimos = $("#formSaldoEmprestimos").serializeArray();
        var idCliente = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        formSaldoEmprestimos.push(idCliente);
        $.ajax({
            type: 'POST',
            url: '/saldoEmprestimos/cadastro',
            data: formSaldoEmprestimos,
            dataType: 'json',
            success: function (data) {
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });

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

    //Seguroa e Previdências ---------------------------------------------------
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

        $.ajax({
            type: 'POST',
            url: '/FGST/cadastro',
            data: formConjugueSeguros,
            dataType: 'json',
            success: function (data) {
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });

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
                }, error: function (data) {
                    $.notify('Falha no cadastro', "warning");
                }
            });
        }
        $.notify('Cadastrado com sucesso!', "success");
        $('#plano_menu').click();
    });

    //Planos  ------------------------------------------------------------------
    $("#inserirPlanos").click(function () {
        var idCliente = new Object();
        var tipoFamiliar = new Object();
        idCliente.name = "idCliente";
        idCliente.value = $("#idCliente").val();
        
        var formPlanoPrincipal = $("#formPlanoPrincipal").serializeArray();
        tipoFamiliar.name = "tipoFamiliar";
        tipoFamiliar.value = "Principal";

        formPlanoPrincipal.push(idCliente);
        formPlanoPrincipal.push(tipoFamiliar);
        $.ajax({
            type: 'POST',
            url: '/planos/cadastro',
            data: formPlanoPrincipal,
            dataType: 'json',
            success: function (data) {
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });

        var formPlanoConjugue = $("#formPlanoConjugue").serializeArray();
        tipoFamiliar.name = "tipoFamiliar";
        tipoFamiliar.value = "Conjugue";

        formPlanoConjugue.push(idCliente);
        formPlanoConjugue.push(tipoFamiliar);
        $.ajax({
            type: 'POST',
            url: '/planos/cadastro',
            data: formPlanoConjugue,
            dataType: 'json',
            success: function (data) {
            }, error: function (data) {
                $.notify('Falha no cadastro', "warning");
            }
        });
        $.notify('Cadastrado com sucesso!', "success");
    });
});


//Dados Familiares--------------------------------------------------------------
var qtdeCampos = 0;
function addCampoFilho() {
    var html = "";
    html += "<div class='row' id='filho" + qtdeCampos + "'>";
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
//PRATIMONIO -------------------------------------------------------------------
function somaTotalPatriomio() {
    var valorImoveis = $("#patrim_imoveis").val();
    var valorFundos = $("#patrim_acoes").val();
    var valorReservas = $("#patrim_reservas").val();
    var valorOutros = $("#patrim_outros").val();

    if (valorImoveis !== "") {
        var custo = valorImoveis;
        var valor = custo.replace(".", "");
        for (i = 0; i <= custo.split(".").length; i++) {
            valor = (valor.replace(".", ""));
        }
        valorImoveis = parseFloat(valor.replace(",", "."));
    } else {
        valorImoveis = 0;
    }
    if (valorFundos !== "") {
        var custo = valorFundos;
        var valor = custo.replace(".", "");
        for (i = 0; i <= custo.split(".").length; i++) {
            valor = (valor.replace(".", ""));
        }
        valorFundos = parseFloat(valor.replace(",", "."));
    } else {
        valorFundos = 0;
    }
    if (valorReservas !== "") {
        var custo = valorReservas;
        var valor = custo.replace(".", "");
        for (i = 0; i <= custo.split(".").length; i++) {
            valor = (valor.replace(".", ""));
        }
        valorReservas = parseFloat(valor.replace(",", "."));
    } else {
        valorReservas = 0;
    }
    if (valorOutros !== "") {
        var custo = valorOutros;
        var valor = custo.replace(".", "");
        for (i = 0; i <= custo.split(".").length; i++) {
            valor = (valor.replace(".", ""));
        }
        valorOutros = parseFloat(valor.replace(",", "."));
    } else {
        valorOutros = 0;
    }

    var valorTotal = valorImoveis + valorFundos + valorReservas + valorOutros;
    $("#valorTotal_patrimonio").text("R$" + valorTotal.toFixed(2).replace(".", ",").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));

}
//EDUCAÇÃO FILHOS --------------------------------------------------------------
var qtdeCamposEducacao = 0;
function addCampoFilhoEducacao() {
    var html = "";
    html += "<div class='row' id='filhoEducacao" + qtdeCamposEducacao + "'>";
    html += "   <div class='col-md-6'>";
    html += "       <div class='form-group'>";
    html += "           <label>Idade / Série</label>";
    html += "           <input type='text' class='form-control' name='idadeserie[]' placeholder='Idade / Série'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-6'>";
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
//EMPRESTIMOS ------------------------------------------------------------------
var qtdeCamposEmprestimo = 0;
function addCampoEmprestimo() {
    var html = "";
    html += "<div class='row' id='emprestimo" + qtdeCamposEmprestimo + "'>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Saldo Devedor</label>";
    html += "           <div class='input-group date'>";
    html += "               <div class='input-group-prepend'>";
    html += "                  <span class='input-group-text'>R$</span>";
    html += "               </div>";
    html += "               <input name='saldo_devedor[]' class='form-control' placeholder='Saldo Devedor'";
    html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Possui Seguro</label>";
    html += "           <input type='text' class='form-control' id='possui_seguro[]' placeholder='Possui Seguro'>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Parcela Mensal</label>";
    html += "           <div class='input-group date'>";
    html += "               <div class='input-group-prepend'>";
    html += "                  <span class='input-group-text'>R$</span>";
    html += "               </div>";
    html += "               <input name='parcela_mensal[]' class='form-control' placeholder='Parcela Mensal'";
    html += "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    html += "           </div>";
    html += "       </div>";
    html += "   </div>";
    html += "   <div class='col-md-2'>";
    html += "       <div class='form-group'>";
    html += "           <label>Prazo Residual</label>";
    html += "           <input type='text' class='form-control' name='prazo_residual[]' placeholder='(meses)'>";
    html += "       </div>";
    html += "   </div>";
    html += "       <div class='col-md-3'>";
    html += "           <div class='form-group'>";
    html += "               <label>Saldo Devedor Descoberto</label>";
    html += "               <input type='text' class='form-control' name='saldo_devedor_emprestimo[]' placeholder='Saldo Devedor Descoberto'>";
    html += "           </div>";
    html += "       </div>";
    html += "   <div class='col-md-1'>";
    html += "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='removerCampoEmprestimo(" + qtdeCamposEmprestimo + ")'/>";
    html += "   </div>";
    html += "</div>";
    $("#formEmprestimos").append(html);
    qtdeCamposEmprestimo++;
}
//------------------------------------------------------------------------------
function removerCampoEmprestimo(id) {
    $("#formEmprestimos")[0].removeChild($("#emprestimo" + id)[0]);
    qtdeCamposEmprestimo--;
}
//SEGURO E PREVIDENCIA ---------------------------------------------------------
var qtdCamposPrevidenciaPrincipal = 0;
function addCampoPrevidenciaPrincipal() {
    var html = "";
    html += "<div class='row' id='previdenciaPrincipal" + qtdCamposPrevidenciaPrincipal + "'>";
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





function troca(str, strsai, strentra) {
    while (str.indexOf(strsai) > -1) {
        str = str.replace(strsai, strentra);
    }
    return str;
}

function FormataMoeda(campo, tammax, teclapres, caracter) {
    if (teclapres == null || teclapres == "undefined") {
        var tecla = -1;
    } else {
        var tecla = teclapres.keyCode;
    }

    if (caracter == null || caracter == "undefined") {
        caracter = ".";
    }

    vr = campo.value;
    if (caracter != "") {
        vr = troca(vr, caracter, "");
    }
    vr = troca(vr, "/", "");
    vr = troca(vr, ",", "");
    vr = troca(vr, ".", "");
    tam = vr.length;
    if (tecla > 0) {
        if (tam < tammax && tecla != 8) {
            tam = vr.length + 1;
        }

        if (tecla == 8) {
            tam = tam - 1;
        }
    }
    if (tecla == -1 || tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105) {
        if (tam <= 2) {
            campo.value = vr;
        }
        if ((tam > 2) && (tam <= 5)) {
            campo.value = vr.substr(0, tam - 2) + ',' + vr.substr(tam - 2, tam);
        }
        if ((tam >= 6) && (tam <= 8)) {
            campo.value = vr.substr(0, tam - 5) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
        }
        if ((tam >= 9) && (tam <= 11)) {
            campo.value = vr.substr(0, tam - 8) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
        }
        if ((tam >= 12) && (tam <= 14)) {
            campo.value = vr.substr(0, tam - 11) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
        }
        if ((tam >= 15) && (tam <= 17)) {
            campo.value = vr.substr(0, tam - 14) + caracter + vr.substr(tam - 14, 3) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + ',' + vr.substr(tam - 2, tam);
        }
    }
}

function maskKeyPress(objEvent) {
    var iKeyCode;
    if (window.event) // IE
    {
        iKeyCode = objEvent.keyCode;
        if (iKeyCode >= 48 && iKeyCode <= 57)
            return true;
        return false;
    } else if (e.which) // Netscape/Firefox/Opera
    {
        iKeyCode = objEvent.which;
        if (iKeyCode >= 48 && iKeyCode <= 57)
            return true;
        return false;
    }


}

function BlockKeybord() {
    if (window.event) // IE
    {
        if ((event.keyCode < 48) || (event.keyCode > 57)) {
            event.returnValue = false;
        }
    } else if (e.which) // Netscape/Firefox/Opera
    {
        if ((event.which < 48) || (event.which > 57)) {
            event.returnValue = false;
        }
    }
}

function stringToNumber(v) {
    v = v.replace(/[^\d-]/g, '');
    ep = v.length - 2;
    x = v.slice(0, ep);
    y = v.slice(-2);
    v = x + '.' + y;
    return v * 1;
}