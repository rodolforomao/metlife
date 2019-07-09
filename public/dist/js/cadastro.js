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
                $("#idCliente").val(data);
                $('#dados_familiares_menu').click();
            }, error: function (data) {
                console.log(data);
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
                console.log(data);
            }
        });
        //Filhos--------------------------------------------------------------
        var formDadosFamiliaresFilhos = $("#formDadosFamiliaresFilhos").serializeArray();
        tipoFamiliar.name = "tipoFamiliar";
        tipoFamiliar.value = "Filho";
        formDadosFamiliaresFilhos.push(idCliente);
        formDadosFamiliaresFilhos.push(tipoFamiliar);
        $.ajax({
            type: 'POST',
            url: '/dadosFamiliares/cadastro',
            data: formDadosFamiliaresFilhos,
            dataType: 'json',
            success: function (data) {
                $('#rendimentos_menu').click();
            }, error: function (data) {
                console.log(data);
            }
        });
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
                $('#patrimonio_menu').click();
            }, error: function (data) {
                console.log(data);
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
            }, error: function (data) {
                console.log(data);
            }
        });
    });

    //Padrão de Vida------------------------------------------------------------
    $("#inserePadraoVida").click(function () {
        var formPadraoVida = $("#formPadraoVida").serializeArray();
        $.ajax({
            type: 'POST',
            url: '/padraoVida/cadastro',
            data: formPadraoVida,
            dataType: 'json',
            success: function (data) {
                $('#formPadraoVida').each(function () {
                    this.reset();
                });
                $('#emprestimos_menu').click();
            }, error: function (data) {
                console.log(data);
            }
        });
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