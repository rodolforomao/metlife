$('a.nav-link').click(function(){
    $('a.nav-link').removeClass("active");
    $(this).addClass("active");

});

function openDadosCadastrais(){
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

function openDadosFamiliares(){
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

function openRendimentos(){
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

function openPatrimonio(){
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

function openEducacaoFilhos(){
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

function openPadraoVida(){
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

function openEmprestimos(){
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

function openSegurosPrevidencias(){
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

function openPlano(){
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

cloneform = $('#familiares_filhos').html();
$(document).on('click','.remDivFilho, .addDivFilho', function(e){
   thisClass = e.target.className;
   thisClass == 'remDivFilho' ?
   ($('.'+thisClass).length > 1 ?
   $(this).closest('.row').prev().add($(this).closest('.row')).remove() : 0) :
   $('#familiares_filhos').append(cloneform);
});
