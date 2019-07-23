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
});

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