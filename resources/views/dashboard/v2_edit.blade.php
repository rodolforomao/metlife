@extends('layouts.master')

@section('content')
<?php
//Dados Conjugue ---------------------------------------------------------------
$nome_conjugue = "";
$id_conjugue = "";
$data_nascimento_conjugue = "";
foreach ($dadosFamiliarConjugue as $conjugue) {
    $nome_conjugue = $conjugue->nome;
    $id_conjugue = $conjugue->id;
    $data_nascimento_conjugue = date('d/m/Y', strtotime(($conjugue->datanascimento)));
}

//Dados Filho ------------------------------------------------------------------
$dadosFilho = "";
foreach ($dadosFamiliarFilho as $filho) {
    $dadosFilho .= "<div class='row' id='filho_deleta" . $filho->id . "'>";
    $dadosFilho .= "<input type='hidden' name='id[]' value='" . $filho->id . "'>";
    $dadosFilho .= "    <div class='col-md-6'>";
    $dadosFilho .= "        <div class='form-group'>";
    $dadosFilho .= "            <label>Filho</label>";
    $dadosFilho .= "            <input type='text' class='form-control' name='df_filho[]' placeholder='Filho' value='" . $filho->nome . "'>";
    $dadosFilho .= "        </div>";
    $dadosFilho .= "    </div>";
    $dadosFilho .= "    <div class='col-md-5'>";
    $dadosFilho .= "        <div class='form-group'>";
    $dadosFilho .= "            <label>Data Nascimento</label>";
    $dadosFilho .= "            <div class='input-group'>";
    $dadosFilho .= "                <div class='input-group-prepend'>";
    $dadosFilho .= "                    <span class='input-group-text'><i class='fa fa-calendar'></i></span>";
    $dadosFilho .= "                    <input name='data_nascimento_filho[]' type='text' data-provide='datepicker' class='datepicker form-control' value='" . date('d/m/Y', strtotime(($filho->datanascimento))) . "'>";
    $dadosFilho .= "                </div>";
    $dadosFilho .= "            </div>";
    $dadosFilho .= "        </div>";
    $dadosFilho .= "    </div>";
    $dadosFilho .= "   <div class='col-md-1'>";
    $dadosFilho .= "       <input type='button' value='-' class='btn btn-default' onclick='deletaFilho(" . $filho->id . ")' style='position: relative;top: 30px;'/>";
    $dadosFilho .= "   </div>";
    $dadosFilho .= "</div>";
}

//Dados Rendientos Principal ---------------------------------------------------
$id_rendimento_principal = "";
$rendimento_mensal_principal = "";
$outras_rendas_principal = "";
$declaracao_ir_principal = "";
foreach ($dadosRendimentoPrincipal as $rendimento) {
    $id_rendimento_principal = $rendimento->id;
    $rendimento_mensal_principal = number_format($rendimento->remendimentosmensal, 2, ",", ".");
    $outras_rendas_principal = number_format($rendimento->outrasrendas, 2, ",", ".");
    $declaracao_ir_principal = $rendimento->declaracaodeir;
}

//Dados Rendientos Conjugue -----------------------------------------------------
$id_rendimento_conjugue = "";
$rendimento_mensal_conjugue = "";
$outras_rendas_conjugue = "";
$declaracao_ir_conjugue = "";
foreach ($dadosRendimentoPrincipal as $rendimento) {
    $id_rendimento_conjugue = $rendimento->id;
    $rendimento_mensal_conjugue = number_format($rendimento->remendimentosmensal, 2, ",", ".");
    $outras_rendas_conjugue = number_format($rendimento->outrasrendas, 2, ",", ".");
    $declaracao_ir_conjugue = $rendimento->declaracaodeir;
}

//Dados Patrimonio -------------------------------------------------------------
$id_patrimonio = "";
$imoveis = "";
$fundos = "";
$reservas = "";
$outros = "";
$inventario = "";
$emergencia = "";
$funeral = "";
$valor_total = "0,00";
foreach ($dadosPatrimonio as $patrimonio) {
    $id_patrimonio = $patrimonio->id;
    $imoveis = number_format($patrimonio->imoveis, 2, ",", ".");
    $fundos = number_format($patrimonio->fundos, 2, ",", ".");
    $reservas = number_format($patrimonio->reservas, 2, ",", ".");
    $outros = number_format($patrimonio->outros, 2, ",", ".");
    $inventario = number_format($patrimonio->inventario, 2, ",", ".");
    $emergencia = number_format($patrimonio->emergencia, 2, ",", ".");
    $funeral = number_format($patrimonio->funeral, 2, ",", ".");
    $valor_total = number_format($patrimonio->imoveis + $patrimonio->fundos + $patrimonio->reservas + $patrimonio->outros, 2, ",", ".");
}

//Dados Padrao de Vida ---------------------------------------------------------
$id_padrao_vida = "";
$despezasgerais = "";
$moradia = "";
$servicos = "";
$transporte = "";
$saude = "";
$vestuario = "";
$seguro_vida_previdencia = "";
$lazer = "";
$impostos = "";
$extrasoutros = "";
foreach ($dadosPadraoVida as $padrao_vida) {
    $id_padrao_vida = $padrao_vida->id;
    $despezasgerais = number_format($padrao_vida->despezasgerais, 2, ",", ".");
    $moradia = number_format($padrao_vida->moradia, 2, ",", ".");
    $servicos = number_format($padrao_vida->servicos, 2, ",", ".");
    $transporte = number_format($padrao_vida->transporte, 2, ",", ".");
    $saude = number_format($padrao_vida->saude, 2, ",", ".");
    $vestuario = number_format($padrao_vida->vestuario, 2, ",", ".");
    $lazer = number_format($padrao_vida->lazer, 2, ",", ".");
    $seguro_vida_previdencia = number_format($padrao_vida->seguroDeVidaPrevidencia, 2, ",", ".");
    $impostos = number_format($padrao_vida->impostos, 2, ",", ".");
    $extrasoutros = number_format($padrao_vida->extrasoutros, 2, ",", ".");
}

//Dados Educação ---------------------------------------------------------------
$educacao = "";
foreach ($dadosEducacao as $educacaoFilhos) {
    $educacao .= "<div class='row' id='filhoEducacao_delete" . $educacaoFilhos->id . "'>";
    $educacao .= "   <input type='hidden' name='id[]'  value='" . $educacaoFilhos->id . "'>";
    $educacao .= "   <div class='col-md-4'>";
    $educacao .= "       <div class='form-group'>";
    $educacao .= "           <label>Apelido</label>";
    $educacao .= "           <input type='text' class='form-control' name='apelido[]' placeholder='Apelido' value='" . $educacaoFilhos->apelidofilho . "'>";
    $educacao .= "       </div>";
    $educacao .= "   </div>";
    $educacao .= "   <div class='col-md-4'>";
    $educacao .= "       <div class='form-group'>";
    $educacao .= "           <label>Idade / Série</label>";
    $educacao .= "           <input type='text' class='form-control' name='idadeserie[]' placeholder='Idade / Série' value='" . $educacaoFilhos->idadeserie . "'>";
    $educacao .= "       </div>";
    $educacao .= "   </div>";
    $educacao .= "   <div class='col-md-4'>";
    $educacao .= "       <div class='form-group'>";
    $educacao .= "           <label>Total de Anos Para Formação</label>";
    $educacao .= "           <input type='text' class='form-control' name='total_anos[]' placeholder='Total de Anos Para Formação' value='" . $educacaoFilhos->totaldeanosparaformacao . "'>";
    $educacao .= "       </div>";
    $educacao .= "   </div> ";
    $educacao .= "   <div class='col-sm-12 col-md-4'>";
    $educacao .= "       <div class='row'>";
    $educacao .= "           <div class='col-md-12 border-bottom'>";
    $educacao .= "               <small>Infantil / Básico (12 anos)</small>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Custo</label>";
    $educacao .= "                   <input type='text' class='form-control' name='basico_mensal[]' value='" . $educacaoFilhos->basicocusto . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Anos</label>";
    $educacao .= "                   <input type='text' class='form-control' name='basico_anos[]' value='" . $educacaoFilhos->basicoanos . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Total</label>";
    $educacao .= "                   <input type='text' class='form-control' name='basico_total[]' value='" . $educacaoFilhos->basicototal . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "       </div>";
    $educacao .= "   </div>";
    $educacao .= "   <div class='col-sm-12 col-md-4 blue-background'>";
    $educacao .= "       <div class='row'>";
    $educacao .= "           <div class='col-md-12 border-bottom'>";
    $educacao .= "               <small>Fundamental (3 anos)</small>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Custo</label>";
    $educacao .= "                   <input type='text' class='form-control' name='fundamental_mensal[]' value='" . $educacaoFilhos->fundamentalcusto . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Anos</label>";
    $educacao .= "                   <input type='text' class='form-control' name='fundamental_anos[]' value='" . $educacaoFilhos->fundamentalanos . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Total</label>";
    $educacao .= "                   <input type='text' class='form-control' name='fundamental_total[]' value='" . $educacaoFilhos->fundamentaltotal . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "       </div>";
    $educacao .= "   </div>";
    $educacao .= "   <div class='col-sm-12 col-md-4'>";
    $educacao .= "       <div class='row'>";
    $educacao .= "           <div class='col-md-12 border-bottom'>";
    $educacao .= "               <small>Superior (4 a 5 anos)</small>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Custo</label>";
    $educacao .= "                   <input type='text' class='form-control' name='superior_mensal[]' value='" . $educacaoFilhos->superiorcusto . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Anos</label>";
    $educacao .= "                   <input type='text' class='form-control' name='superior_anos[]' value='" . $educacaoFilhos->superioranos . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "           <div class='col-md-4'>";
    $educacao .= "               <div class='form-group'>";
    $educacao .= "                   <label>Total</label>";
    $educacao .= "                   <input type='text' class='form-control' name='superior_total[]' value='" . $educacaoFilhos->superiortotal . "'>";
    $educacao .= "               </div>";
    $educacao .= "           </div>";
    $educacao .= "       </div>";
    $educacao .= "   </div>";
    $educacao .= "   <div class='col-md-12'>";
    $educacao .= "       <input type='button' value='Remover' class='pull-right btn btn-default' onclick='deletaEducacao(" . $educacaoFilhos->id . ")'/>";
    $educacao .= "   </div>";
    $educacao .= "</div>";
}

//Dados Rendientos Conjugue -----------------------------------------------------
$id_saldo_emprestimos = "";
$descoberto_emprestimo = "";
$maiorperiodo_emprestimo = "";
foreach ($dadosSaldoEmprestimo as $saldo_emprestimo) {
    $id_saldo_emprestimos = $saldo_emprestimo->id;
    $descoberto_emprestimo = number_format($saldo_emprestimo->descoberto, 2, ",", ".");
    $maiorperiodo_emprestimo = $saldo_emprestimo->maiorperiodo;
}

//Dados Rendientos Conjugue ---------------------------------------------------
$emprestimo_html = "";
foreach ($dadosEmprestimos as $emprestimos) {
    $emprestimo_html .= "<div class='row' id='emprestimo_delete" . $emprestimos->id . "'>";
    $emprestimo_html .= "   <input type='hidden' name='id[]' value='" . $emprestimos->id . "'>";
    $emprestimo_html .= "   <div class='col-md-2'>";
    $emprestimo_html .= "       <div class='form-group'>";
    $emprestimo_html .= "           <label>Saldo Devedor</label>";
    $emprestimo_html .= "           <div class='input-group date'>";
    $emprestimo_html .= "               <div class='input-group-prepend'>";
    $emprestimo_html .= "                  <span class='input-group-text'>R$</span>";
    $emprestimo_html .= "               </div>";
    $emprestimo_html .= "               <input name='saldo_devedor[]' class='form-control' placeholder='Saldo Devedor' value='" . $emprestimos->saldodevedor . "'";
    $emprestimo_html .= "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    $emprestimo_html .= "           </div>";
    $emprestimo_html .= "       </div>";
    $emprestimo_html .= "   </div>";
    $emprestimo_html .= "   <div class='col-md-2'>";
    $emprestimo_html .= "       <div class='form-group'>";
    $emprestimo_html .= "           <label>Possui Seguro</label>";
    $emprestimo_html .= "           <input type='text' class='form-control' name='possui_seguro[]' placeholder='Possui Seguro' value='" . $emprestimos->possuiseguro . "'>";
    $emprestimo_html .= "       </div>";
    $emprestimo_html .= "   </div>";
    $emprestimo_html .= "   <div class='col-md-2'>";
    $emprestimo_html .= "       <div class='form-group'>";
    $emprestimo_html .= "           <label>Parcela Mensal</label>";
    $emprestimo_html .= "           <div class='input-group date'>";
    $emprestimo_html .= "               <div class='input-group-prepend'>";
    $emprestimo_html .= "                  <span class='input-group-text'>R$</span>";
    $emprestimo_html .= "               </div>";
    $emprestimo_html .= "               <input name='parcela_mensal[]' class='form-control' placeholder='Parcela Mensal' value='" . $emprestimos->parcelamensal . "'";
    $emprestimo_html .= "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
    $emprestimo_html .= "           </div>";
    $emprestimo_html .= "       </div>";
    $emprestimo_html .= "   </div>";
    $emprestimo_html .= "   <div class='col-md-2'>";
    $emprestimo_html .= "       <div class='form-group'>";
    $emprestimo_html .= "           <label>Prazo Residual</label>";
    $emprestimo_html .= "           <input type='text' class='form-control' name='prazo_residual[]' placeholder='(meses)' value='" . $emprestimos->prazoresidual . "'>";
    $emprestimo_html .= "       </div>";
    $emprestimo_html .= "   </div>";
    $emprestimo_html .= "       <div class='col-md-3'>";
    $emprestimo_html .= "           <div class='form-group'>";
    $emprestimo_html .= "               <label>Saldo Devedor Descoberto</label>";
    $emprestimo_html .= "               <input type='text' class='form-control' name='saldo_devedor_emprestimo[]' placeholder='Saldo Devedor Descoberto' value='" . $emprestimos->saldodevedordescoberto . "'>";
    $emprestimo_html .= "           </div>";
    $emprestimo_html .= "       </div>";
    $emprestimo_html .= "   <div class='col-md-1'>";
    $emprestimo_html .= "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deleteEmprestimo(" . $emprestimos->id . ")'/>";
    $emprestimo_html .= "   </div>";
    $emprestimo_html .= "</div>";
}

//Dados FGTS INSS Principal ----------------------------------------------------
$id_fgts_principal = "";
$fgts_principal = "";
$inss_principal = "";
$idade_aposentadoria_principal = "";
foreach ($dadosFGTS_INSS_principal as $inss_fgts) {
    $id_fgts_principal = $inss_fgts->id;
    $fgts_principal = number_format($inss_fgts->fgts, 2, ",", ".");
    $inss_principal = number_format($inss_fgts->inss, 2, ",", ".");
    $idade_aposentadoria_principal = $inss_fgts->idadeaposentadoria;
}

//Dados FGTS INSS Principal ----------------------------------------------------
$id_fgts_conjugue = "";
$fgts_conjugue = "";
$inss_conjugue = "";
$idade_aposentadoria_conjugue = "";
foreach ($dadosFGTS_INSS_conjugue as $inss_fgts) {
    $id_fgts_conjugue = $inss_fgts->id;
    $fgts_conjugue = number_format($inss_fgts->fgts, 2, ",", ".");
    $inss_conjugue = number_format($inss_fgts->inss, 2, ",", ".");
    $idade_aposentadoria_conjugue = $inss_fgts->idadeaposentadoria;
}

//Dados Educação ---------------------------------------------------------------
$previdencia_principal = "";
$previdencia_conjugue = "";
foreach ($dadosPrevidencia as $previdencia) {
    switch ($previdencia->tipoFamiliar) {
        case "Principal":
            $previdencia_principal .= "<div class='row' id='previdenciaPrincipal_delete" . $previdencia->id . "'>";
            $previdencia_principal .= "   <input type='hidden' name='id[]' value='" . $previdencia->id . "'>";
            $previdencia_principal .= "   <div class='col-md-3'>";
            $previdencia_principal .= "       <div class='form-group'>";
            $previdencia_principal .= "           <label>Previdência</label>";
            $previdencia_principal .= "           <input type='text' class='form-control' name='previdencia[]' placeholder='Previdência' value='" . $previdencia->previdencia . "'>";
            $previdencia_principal .= "       </div>";
            $previdencia_principal .= "   </div>";
            $previdencia_principal .= "   <div class='col-md-2'>";
            $previdencia_principal .= "       <div class='form-group'>";
            $previdencia_principal .= "           <label>PGBL/VGBL</label>";
            $previdencia_principal .= "           <input type='text' class='form-control' name='pglb_vgbl[]' placeholder='PGBL/VGBL' value='" . $previdencia->pgblvgbl . "'>";
            $previdencia_principal .= "       </div>";
            $previdencia_principal .= "   </div>";
            $previdencia_principal .= "   <div class='col-md-3'>";
            $previdencia_principal .= "       <div class='form-group'>";
            $previdencia_principal .= "           <label>Saldo Acumulado R$</label>";
            $previdencia_principal .= "           <div class='input-group date'>";
            $previdencia_principal .= "               <div class='input-group-prepend'>";
            $previdencia_principal .= "                   <span class='input-group-text'>R$</span>";
            $previdencia_principal .= "               </div>";
            $previdencia_principal .= "               <input type='text' class='form-control' name='saldo_acumulado[]' placeholder='Saldo Acumulado R$' value='" . number_format($previdencia->saldoacumulado, 2, ",", ".") . "'";
            $previdencia_principal .= "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
            $previdencia_principal .= "           </div>";
            $previdencia_principal .= "       </div>";
            $previdencia_principal .= "   </div>";
            $previdencia_principal .= "   <div class='col-md-3'>";
            $previdencia_principal .= "       <div class='form-group'>";
            $previdencia_principal .= "           <label>Contribuição Anual</label>";
            $previdencia_principal .= "           <input type='text' class='form-control' name='contribuicao_anual[]' placeholder='Contribuição Anual' value='" . $previdencia->contribuicaoanual . "'>";
            $previdencia_principal .= "       </div>";
            $previdencia_principal .= "   </div>";
            $previdencia_principal .= "   <div class='col-md-1'>";
            $previdencia_principal .= "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deletePrevidenciaPrincipal(" . $previdencia->id . ")'/>";
            $previdencia_principal .= "   </div>";
            $previdencia_principal .= "</div>";
            break;
        case "Conjugue":
            $previdencia_conjugue .= "<div class='row' id='previdenciaConjugue_delete" . $previdencia->id . "'>";
            $previdencia_conjugue .= "   <input type='hidden' name='id[]' value='" . $previdencia->id . "'>";
            $previdencia_conjugue .= "   <div class='col-md-3'>";
            $previdencia_conjugue .= "       <div class='form-group'>";
            $previdencia_conjugue .= "           <label>Previdência</label>";
            $previdencia_conjugue .= "           <input type='text' class='form-control' name='previdencia[]' placeholder='Previdência' value='" . $previdencia->previdencia . "'>";
            $previdencia_conjugue .= "       </div>";
            $previdencia_conjugue .= "   </div>";
            $previdencia_conjugue .= "   <div class='col-md-2'>";
            $previdencia_conjugue .= "       <div class='form-group'>";
            $previdencia_conjugue .= "           <label>PGBL/VGBL</label>";
            $previdencia_conjugue .= "           <input type='text' class='form-control' name='pglb_vgbl[]' placeholder='PGBL/VGBL' value='" . $previdencia->pgblvgbl . "'>";
            $previdencia_conjugue .= "       </div>";
            $previdencia_conjugue .= "   </div>";
            $previdencia_conjugue .= "   <div class='col-md-3'>";
            $previdencia_conjugue .= "       <div class='form-group'>";
            $previdencia_conjugue .= "           <label>Saldo Acumulado R$</label>";
            $previdencia_conjugue .= "           <div class='input-group date'>";
            $previdencia_conjugue .= "               <div class='input-group-prepend'>";
            $previdencia_conjugue .= "                   <span class='input-group-text'>R$</span>";
            $previdencia_conjugue .= "               </div>";
            $previdencia_conjugue .= "               <input type='text' class='form-control' name='saldo_acumulado[]' placeholder='Saldo Acumulado R$' value='" . number_format($previdencia->saldoacumulado, 2, ",", ".") . "'";
            $previdencia_conjugue .= "                   onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)'>";
            $previdencia_conjugue .= "           </div>";
            $previdencia_conjugue .= "       </div>";
            $previdencia_conjugue .= "   </div>";
            $previdencia_conjugue .= "   <div class='col-md-3'>";
            $previdencia_conjugue .= "       <div class='form-group'>";
            $previdencia_conjugue .= "           <label>Contribuição Anual</label>";
            $previdencia_conjugue .= "           <input type='text' class='form-control' name='contribuicao_anual[]' placeholder='Contribuição Anual' value='" . $previdencia->contribuicaoanual . "'>";
            $previdencia_conjugue .= "       </div>";
            $previdencia_conjugue .= "   </div>";
            $previdencia_conjugue .= "   <div class='col-md-1'>";
            $previdencia_conjugue .= "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deletePrevidenciaConjugue(" . $previdencia->id . ")'/>";
            $previdencia_conjugue .= "   </div>";
            $previdencia_conjugue .= "</div>";
            break;
    }
}

//Dados Educação ---------------------------------------------------------------
$seguro_principal = "";
$seguro_conjugue = "";
foreach ($dadosSeguro as $seguro) {
    switch ($seguro->tipoFamiliar) {
        case "Principal":
            $seguro_principal .= "<div class='row' id='seguroPrincipal_delete" . $seguro->id . "'>";
            $seguro_principal .= "   <input type='hidden' name='id[]' value='" . $seguro->id . "'>";
            $seguro_principal .= "   <div class='col-md-4'>";
            $seguro_principal .= "       <div class='form-group'>";
            $seguro_principal .= "           <label>Seguro de Vida</label>";
            $seguro_principal .= "           <input type='text' class='form-control' name='seguro_vida[]' placeholder='Seguro de Vida' value='" . $seguro->segurodevida . "'>";
            $seguro_principal .= "       </div>";
            $seguro_principal .= "   </div>";
            $seguro_principal .= "   <div class='col-md-4'>";
            $seguro_principal .= "       <div class='form-group'>";
            $seguro_principal .= "           <label>Capital Segurado</label>";
            $seguro_principal .= "           <input type='text' class='form-control' name='capital_segurado[]' placeholder='Capital Segurado' value='" . $seguro->capitalsegurado . "'>";
            $seguro_principal .= "       </div>";
            $seguro_principal .= "   </div>";
            $seguro_principal .= "   <div class='col-md-3'>";
            $seguro_principal .= "       <div class='form-group'>";
            $seguro_principal .= "           <label>Prêmio Mensal</label>";
            $seguro_principal .= "           <input type='text' class='form-control' name='premio_mensal[]' placeholder='Prêmio Mensal' value='" . $seguro->premiomensal . "'>";
            $seguro_principal .= "       </div>";
            $seguro_principal .= "   </div>";
            $seguro_principal .= "   <div class='col-md-1'>";
            $seguro_principal .= "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deletaCampoSeguroPrincipal(" . $seguro->id . ")'/>";
            $seguro_principal .= "   </div>";
            $seguro_principal .= "</div>";
            break;
        case "Conjugue":
            $seguro_conjugue .= "<div class='row' id='seguroConjugue_delete" . $seguro->id . "'>";
            $seguro_conjugue .= "   <input type='hidden' name='id[]' value='" . $seguro->id . "'>";
            $seguro_conjugue .= "   <div class='col-md-4'>";
            $seguro_conjugue .= "       <div class='form-group'>";
            $seguro_conjugue .= "           <label>Seguro de Vida</label>";
            $seguro_conjugue .= "           <input type='text' class='form-control' name='seguro_vida[]' placeholder='Seguro de Vida' value='" . $seguro->segurodevida . "'>";
            $seguro_conjugue .= "       </div>";
            $seguro_conjugue .= "   </div>";
            $seguro_conjugue .= "   <div class='col-md-4'>";
            $seguro_conjugue .= "       <div class='form-group'>";
            $seguro_conjugue .= "           <label>Capital Segurado</label>";
            $seguro_conjugue .= "           <input type='text' class='form-control' name='capital_segurado[]' placeholder='Capital Segurado' value='" . $seguro->capitalsegurado . "'>";
            $seguro_conjugue .= "       </div>";
            $seguro_conjugue .= "   </div>";
            $seguro_conjugue .= "   <div class='col-md-3'>";
            $seguro_conjugue .= "       <div class='form-group'>";
            $seguro_conjugue .= "           <label>Prêmio Mensal</label>";
            $seguro_conjugue .= "           <input type='text' class='form-control' name='premio_mensal[]' placeholder='Prêmio Mensal' value='" . $seguro->premiomensal . "'>";
            $seguro_conjugue .= "       </div>";
            $seguro_conjugue .= "   </div>";
            $seguro_conjugue .= "   <div class='col-md-1'>";
            $seguro_conjugue .= "       <input type='button' value='-' class='btn btn-default' style='position: relative;top: 30px;' onclick='deletaCampoSeguroConjugue(" . $seguro->id . ")'/>";
            $seguro_conjugue .= "   </div>";
            $seguro_conjugue .= "</div>";
            break;
    }
}

//Dados Plano de vida ----------------------------------------------------------
$planos_principal = "";
foreach ($dadosPlanosPrincipal as $plano) {
    $planos_principal .= "<tr>";
    $planos_principal .= "  <td>";
    $planos_principal .= "      <input type='text' class='form-control' style='font-size: 12px;' value='" . $plano->descricao . "' disabled='true'>";
    $planos_principal .= "      <input type='hidden' name='id_produto[]' value='" . $plano->idProduto . "'>";
    $planos_principal .= "      <input type='hidden' id='id_vitalicio_principal' name='id[]' value='" . $plano->id . "'>";
    $planos_principal .= "  </td>";
    $planos_principal .= "  <td class='yellow-background'>";
    $planos_principal .= "      <div class='input-group'>";
    $planos_principal .= "          <div class='input-group-prepend'>";
    $planos_principal .= "              <span class='input-group-text'><i class='fa fa-calendar'></i></span>";
    $planos_principal .= "          </div>";
    $planos_principal .= "          <input name='vigencia[]' type='text' data-provide='datepicker' class='datepicker form-control' value='" . ($plano->vigencia !== null ? date('d/m/Y', strtotime(($plano->vigencia))) : "") . "'>";
    $planos_principal .= "      </div>";
    $planos_principal .= "  </td>";
    $planos_principal .= "  <td class='yellow-background'>";
    $planos_principal .= "      <input name='prazo[]' class='form-control' value='" . $plano->prazo . "'>";
    $planos_principal .= "  </td>";
    $planos_principal .= "  <td class='yellow-background'>";
    $planos_principal .= "      <div class='input-group date'>";
    $planos_principal .= "          <div class='input-group-prepend'>";
    $planos_principal .= "              <span class='input-group-text'>R$</span>";
    $planos_principal .= "          </div>";
    $planos_principal .= "          <input name='capital_segurado[]' class='form-control'";
    $planos_principal .= "              onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange='' value='" . ($plano->capital !== null ? number_format($plano->capital, 2, ",", ".") : "") . "'>";
    $planos_principal .= "      </div>";
    $planos_principal .= "  </td>";
    $planos_principal .= "  <td class='yellow-background'>";
    $planos_principal .= "      <div class='input-group date'>";
    $planos_principal .= "          <div class='input-group-prepend'>";
    $planos_principal .= "              <span class='input-group-text'>R$</span>";
    $planos_principal .= "          </div>";
    $planos_principal .= "          <input name='valor[]' class='form-control'";
    $planos_principal .= "              onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange='' value='" . ($plano->valor !== null ? number_format($plano->valor, 2, ",", ".") : "") . "'>";
    $planos_principal .= "      </div>";
    $planos_principal .= "  </td>";
    $planos_principal .= "</tr>";
}
$planos_conjugue = "";
foreach ($dadosPlanoConjugue as $plano) {
    $planos_conjugue .= "<tr>";
    $planos_conjugue .= "  <td>";
    $planos_conjugue .= "      <input type='text' class='form-control' style='font-size: 12px;' value='" . $plano->descricao . "' disabled='true'>";
    $planos_conjugue .= "      <input type='hidden' name='id_produto[]' value='" . $plano->idProduto . "'>";
    $planos_conjugue .= "      <input type='hidden' id='id_vitalicio_conjugue' name='id[]' value='" . $plano->id . "'>";
    $planos_conjugue .= "  </td>";
    $planos_conjugue .= "  <td class='yellow-background'>";
    $planos_conjugue .= "      <div class='input-group'>";
    $planos_conjugue .= "          <div class='input-group-prepend'>";
    $planos_conjugue .= "              <span class='input-group-text'><i class='fa fa-calendar'></i></span>";
    $planos_conjugue .= "          </div>";
    $planos_conjugue .= "          <input name='vigencia[]' type='text' data-provide='datepicker' class='datepicker form-control' value='" . ($plano->vigencia !== null ? date('d/m/Y', strtotime(($plano->vigencia))) : "") . "'>";
    $planos_conjugue .= "      </div>";
    $planos_conjugue .= "  </td>";
    $planos_conjugue .= "  <td class='yellow-background'>";
    $planos_conjugue .= "      <input name='prazo[]' class='form-control' value='" . $plano->prazo . "'>";
    $planos_conjugue .= "  </td>";
    $planos_conjugue .= "  <td class='yellow-background'>";
    $planos_conjugue .= "      <div class='input-group date'>";
    $planos_conjugue .= "          <div class='input-group-prepend'>";
    $planos_conjugue .= "              <span class='input-group-text'>R$</span>";
    $planos_conjugue .= "          </div>";
    $planos_conjugue .= "          <input name='capital_segurado[]' class='form-control'";
    $planos_conjugue .= "              onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange='' value='" . ($plano->capital !== null ? number_format($plano->capital, 2, ",", ".") : "") . "'>";
    $planos_conjugue .= "      </div>";
    $planos_conjugue .= "  </td>";
    $planos_conjugue .= "  <td class='yellow-background'>";
    $planos_conjugue .= "      <div class='input-group date'>";
    $planos_conjugue .= "          <div class='input-group-prepend'>";
    $planos_conjugue .= "              <span class='input-group-text'>R$</span>";
    $planos_conjugue .= "          </div>";
    $planos_conjugue .= "          <input name='valor[]' class='form-control'";
    $planos_conjugue .= "              onkeydown='FormataMoeda(this, 20, event)' onkeypress='return maskKeyPress(event)' onchange='' value='" . ($plano->valor !== null ? number_format($plano->valor, 2, ",", ".") : "") . "'>";
    $planos_conjugue .= "      </div>";
    $planos_conjugue .= "  </td>";
    $planos_conjugue .= "</tr>";
}
?>
<link rel="stylesheet" href="/dist/plugins/notify/notify.css">
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Cadastro
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" onClick="openDadosCadastrais()" class="nav-link active">
                                        <i class="nav-icon fa fa-user"></i>
                                        <p>
                                            Dados Cadastrais
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="dados_familiares_menu" onClick="openDadosFamiliares()" class="nav-link">
                                        <i class="nav-icon fa fa-users"></i>
                                        <p>
                                            Dados Familiares
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="rendimentos_menu" onClick="openRendimentos()" class="nav-link">
                                        <i class="nav-icon fa fa-dollar"></i>
                                        <p>
                                            Rendimentos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)"id="patrimonio_menu" onClick="openPatrimonio()" class="nav-link">
                                        <i class="nav-icon fa fa-diamond"></i>
                                        <p>
                                            Patrimônio
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="educacaoFilhos_menu" onClick="openEducacaoFilhos()" class="nav-link">
                                        <i class="nav-icon fa fa-graduation-cap"></i>
                                        <p>
                                            Educação dos Filhos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="padraoVida_menu" onClick="openPadraoVida()" class="nav-link">
                                        <i class="nav-icon fa fa-check"></i>
                                        <p>
                                            Padrão de Vida
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="emprestimos_menu" onClick="openEmprestimos()" class="nav-link">
                                        <i class="nav-icon fa fa-bookmark"></i>
                                        <p>
                                            Empréstimos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="seguro_previdencia_menu" onClick="openSegurosPrevidencias()" class="nav-link">
                                        <i class="nav-icon fa fa-folder-open"></i>
                                        <p>
                                            Seguros e Previdências
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="plano_menu" onClick="openPlano()" class="nav-link">
                                        <i class="nav-icon fa fa-plus-circle"></i>
                                        <p>
                                            Plano
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <!--Dados Cadastrais-->
                <div class="col-sm-12 col-md-9" id="dados_cadastrais">
                    <div class="card" >
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Cadastrais
                            </h3>
                        </div>
                        <form role="form" id="formDadosCadastrais">
                            <input type="hidden" id="idCliente" name="id" value="{{$dadoscadastrais->id}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nome Completo</label>
                                            <input type="text" class="form-control" id="dc_nome_completo" name="dc_nome_completo" placeholder="Nome Completo" value="{{$dadoscadastrais->nomecompleto}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" value="{{$dadoscadastrais->cpf}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Data Nascimento</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input id="data_nascimento" name="data_nascimento" type="text" data-provide="datepicker" class="datepicker form-control" value="{{date('d/m/Y', strtotime(($dadoscadastrais->datanascimento)))}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select class="form-control" id="sexo" name="sexo">
                                                <option value="">Selecione</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Faminino">Faminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado Cívil</label>
                                            <select class="form-control" id="estadocivil" name="estadocivil">
                                                <option value="">Selecione</option>
                                                <option value="Casado">Casado</option>
                                                <option value="Solteiro">Solteiro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Endereço Residencial</label>
                                            <input type="text" class="form-control" id="dc_endereco_resd" name="dc_endereco_resd" placeholder="Endereço Residencial" value="{{$dadoscadastrais->enderecoresidencial}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="dc_email" name="dc_email" placeholder="Email" value="{{$dadoscadastrais->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Celular</label>
                                            <input type="text" id="dc_celular" class="form-control" placeholder="Celular" name="dc_celular" name="tel" maxlength="15" OnKeyPress="formatar('## #####-####', this)" value="{{$dadoscadastrais->celular}}">
                                            <!--<input type="text" class="form-control"  placeholder="Celular">-->
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="inserirDadosCadastrais">Salvar</button>
                            </div>

                        </form>                
                    </div>
                </div>

                <!--Dados Familiares-->
                <div class="col-sm-12 col-md-9 no-display" id="dados_familiares">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Dados Familiares
                            </h3>
                        </div>
                        <div class="card-body">
                            <form role="form" id="formDadosFamiliares">
                                <input type="hidden" name="id" value="{{$id_conjugue}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cônjuge</label>
                                            <input type="text" class="form-control" id="df_conjuje" name="df_conjuje" placeholder="Cônjuge" value="{{$nome_conjugue}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Data Nascimento</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input value="{{$data_nascimento_conjugue}}" id="data_nascimento_conjugue" name="data_nascimento_conjugue" type="text" data-provide="datepicker" class="datepicker form-control">
                                            </div>
                                        </div>
                                    </div>                    
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h3>Filho(s) <button type="button" class="btn btn-sm btn-info" onclick="addCampoFilho()">+</button></h3>
                                </div>
                            </div>
                            <form role="form" id="formDadosFamiliaresFilhos">
                                <?= $dadosFilho ?>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="insereDadosFamiliares">Salvar</button>
                        </div>

                    </div>
                </div>

                <!--Rendimentos-->
                <div class="col-sm-12 col-md-9 no-display" id="rendimentos">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Rendimentos
                            </h3>
                        </div>
                        <form role="form" id="formRendimento">
                            <input type="hidden" id="id_rendimento_principal" name="id_rendimento_principal" value="{{$id_rendimento_principal}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h3>Principal</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Rendimento Mensal</label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="ren_redimento_mensal_principal" name="ren_redimento_mensal_principal" class="form-control" placeholder="Renda Mensal"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="" value="{{$rendimento_mensal_principal}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Outras Rendas</label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="ren_outras_principal" name="ren_outras_principal" class="form-control" placeholder="Renda Mensal"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="" value="{{$outras_rendas_principal}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Declaração de IR</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaracaodeir" value="1" <?= $declaracao_ir_principal == 1 ? "checked" : ""; ?>>
                                                <label class="form-check-label">Completa</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaracaodeir" value="2" <?= $declaracao_ir_principal == 2 ? "checked" : ""; ?>>
                                                <label class="form-check-label">Simplificada</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <input type="hidden" id="id_rendimento_conjugue" name="id_rendimento_conjugue" value="{{$id_rendimento_conjugue}}">
                                    <div class="col-md-12 border-bottom">
                                        <h3>Cônjuge</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Rendimento Mensal</label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="ren_redimento_mensal_conjugue" name="ren_redimento_mensal_conjugue" class="form-control" placeholder="Renda Mensal"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="" value="{{$rendimento_mensal_conjugue}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Outras Rendas</label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="ren_outras_conjugue" name="ren_outras_conjugue" class="form-control" placeholder="Renda Mensal"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="" value="{{$outras_rendas_conjugue}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Declaração de IR</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaracaodeir_conjugue" value="1" <?= $declaracao_ir_conjugue == 1 ? "checked" : ""; ?>>
                                                <label class="form-check-label">Completa</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaracaodeir_conjugue" value="2" <?= $declaracao_ir_conjugue == 2 ? "checked" : ""; ?>>
                                                <label class="form-check-label">Simplificada</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="inserirRendimentos">Salvar</button>
                            </div>
                        </form>  
                    </div>
                </div>

                <!--Patrimônio-->
                <div class="col-sm-12 col-md-9 no-display" id="patrimonio">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Patrimônio
                            </h3>
                        </div>
                        <form role="form" id="formPatrimonio">
                            <input type="hidden" id="id_patrimonio" name="id" value="{{$id_patrimonio}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Imóveis</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="patrim_imoveis" name="patrim_imoveis" class="form-control" placeholder="Imóveis"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()" value="{{$imoveis}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fundos/Investimentos/Ações</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="patrim_acoes" name="patrim_acoes" class="form-control" placeholder="Fundos/Investimentos/Ações"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()" value="{{$fundos}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reservas/Poupança</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="patrim_reservas" name="patrim_reservas" class="form-control" placeholder="Reservas/Poupança"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()" value="{{$reservas}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Outros <small>(veículos, participações, obras de arte, etc.)</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="patrim_outros" name="patrim_outros" class="form-control" placeholder="Outros"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()" value="{{$outros}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 border-top">
                                        <label>Total </label><span class="pull-right" id="valorTotal_patrimonio">R${{$valor_total}}</span>
                                    </div>

                                </div>
                                <br><br>
                                <div class="row" style="background: #f4f6f9;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Inventário</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="patrim_inventario" name="patrim_inventario" class="form-control" placeholder="Inventário"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()" value="{{$inventario}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Emergência <small>(X de renda mensal)</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="patrim_emergencia" name="patrim_emergencia" class="form-control" placeholder="Emergência"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()" value="{{$emergencia}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Funeral</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="patrim_funaral" name="patrim_funaral" class="form-control" placeholder="Funeral"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()" value="{{$funeral}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="inserePatrimonio">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!--Educação dos Filhos-->
                <div class="col-sm-12 col-md-9 no-display" id="educacao_filhos">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Educação dos Filhos
                            </h3>
                        </div>
                        <form role="form" id="formEducacaoFilhos">
                            <div class="card-header">
                                <h3>Filho <button type="button" class="btn btn-sm btn-info" onclick="addCampoFilhoEducacao()">+</button></h3>
                            </div>
                            <div class="card-body"  id="divEducacaoFilhos">
                                <?= $educacao ?>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="insereEducacaoFilhos">Salvar</button>
                            </div>
                        </form>   
                    </div>
                </div>

                <!--Padrão de Vida-->
                <div class="col-sm-12 col-md-9 no-display" id="padrao_vida">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Padrão de Vida
                            </h3>
                        </div>
                        <form role="form" id="formPadraoVida">
                            <input id="id_padrao_vida" name="id" type="hidden" value="{{$id_padrao_vida}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Despesas Gerais</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_gerais" name="pv_gerais" class="form-control" placeholder="Despesas Gerais" value="{{$despezasgerais}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Moradia <small>(Aluguel/Condomínio)</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_moradia" name="pv_moradia" class="form-control" placeholder="Moradia" value="{{$moradia}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Serviços <small>(água, luz, telefone, gás)</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_servicos" name="pv_servicos" class="form-control" placeholder="Serviços" value="{{$servicos}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Transporte <small>(manuenteção,seguro)</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_transporte" name="pv_transporte" class="form-control" placeholder="Transporte" value="{{$transporte}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Saúde <small>(seguro, medicamentos, etc)</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_saude" name="pv_saude" class="form-control" placeholder="Saúde" value="{{$saude}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Vestuário</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_vestuario" name="pv_vestuario" class="form-control" placeholder="Vestuário" value="{{$vestuario}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Seguro de Vida/Previdência</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_seguro_vida" name="pv_seguro_vida" class="form-control" placeholder="Seguro de Vida/Previdência" value="{{$seguro_vida_previdencia}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Lazer </label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_lazer" name="pv_lazer" class="form-control" placeholder="Lazer" value="{{$lazer}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Impostos <small>(IPTU, IPVA)</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_impostos" name="pv_impostos" class="form-control" placeholder="Impostos" value="{{$impostos}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Extras/Outros </label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_extras" name="pv_extras" class="form-control" placeholder="Extras/Outros" value="{{$extrasoutros}}"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="inserePadraoVida">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!--Emprestimos-->
                <div class="col-sm-12 col-md-9 no-display" id="emprestimos">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Empréstimos
                            </h3>
                        </div>
                        <div class="card-body">
                            <form role="form" id="formSaldoEmprestimos">
                                <input type="hidden" name="id" id="id_emprestimos" value="<?= $id_saldo_emprestimos ?>">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Descoberto Empréstimos/Financiamento </label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="emp_descoberto" name="emp_descoberto" class="form-control" placeholder="Descoberto Empréstimos/Financiamento"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()" value="<?= $descoberto_emprestimo ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Maior Período para Empréstimos/Finan. (Anos)</label>
                                        <input id="emp_perido" name="emp_perido" class="form-control" placeholder="Maior Período para Emprestimo/Finan. (Anos)" value="<?= $maiorperiodo_emprestimo ?>">
                                    </div>
                                </div>
                            </form>
                            <br>
                            <form role="form" id="formEmprestimos">
                                <div class="card-header">
                                    <h3>Empréstimos <button type="button" class="btn btn-sm btn-info addDivSeguro" onclick="addCampoEmprestimo()">+</button></h3>
                                </div>
                                <div class="card-body"  id="divEmprestimos">
                                    <?= $emprestimo_html ?>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="insereEmprestimos">Salvar</button>
                        </div>
                    </div>
                </div>

                <!--Seguros e Previdências-->
                <div class="col-sm-12 col-md-9 no-display" id="seguros_previdencias">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Seguros e Previdências
                            </h3>
                        </div>
                        <div class="card-body">
                            <form role="form" id="formPrincipalSeguros">
                                <input type="hidden" id="id_inss_fgts_principal" name="id" value="<?= $id_fgts_principal ?>">
                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h3>Principal</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>FGTS <small>Saldo Acum.</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" name="fgts" placeholder="FGTS" value="<?= $fgts_principal ?>"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>INSS <small>Rensa Mensal</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" name="inss" placeholder="INSS" value="<?= $inss_principal ?>"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Idade para Aposentadoria</label>
                                            <input type="text" class="form-control" name="idade_aposentadoria" placeholder="Idade para Aposentadoria" value="<?= $idade_aposentadoria_principal ?>">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h5>Previdência <button type="button" class="btn btn-sm btn-info" onclick="addCampoPrevidenciaPrincipal()">+</button></h5>
                                </div>
                            </div>
                            <div>
                                <form role="form" id="formPrevidenciaPrincipal">
                                    <div class="row" id="previdencia_principal">
                                        <?= $previdencia_principal ?>
                                    </div>
                                </form>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h5>Seguro <button type="button" class="btn btn-sm btn-info" onclick="addCampoSeguroPrincipal()">+</button></h5>
                                </div>
                            </div>
                            <div>
                                <form role="form" id="formSeguroPrincipal">
                                    <div class="row" id="seguro_principal">                     
                                        <?= $seguro_principal ?>
                                    </div>
                                </form>
                            </div>

                            <br>
                            <form role="form" id="formConjugueSeguros">
                                <input type="hidden" id="id_inss_fgts_conjugue" name="id" value="<?= $id_fgts_conjugue ?>">
                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h3>Cônjuge</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>FGTS <small>Saldo Acum.</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" name="fgts" placeholder="FGTS" value="<?= $fgts_conjugue ?>"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>INSS <small>Rensa Mensal</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" name="inss" placeholder="INSS" value="<?= $inss_conjugue ?>"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Idade para Aposentadoria</label>
                                            <input type="text" class="form-control" name="idade_aposentadoria" placeholder="Idade para Aposentadoria" value="<?= $idade_aposentadoria_conjugue ?>">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h5>Previdência <button type="button" class="btn btn-sm btn-info" onclick="addCampoPrevidenciaConjugue()">+</button></h5>
                                </div>
                            </div>
                            <div>
                                <form role="form" id="formPrevidenciaConjugue">
                                    <div class="row" id="previdencia_conjugue">   
                                        <?= $previdencia_conjugue ?>
                                    </div>
                                </form>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h5>Seguro <button type="button" class="btn btn-sm btn-info" onclick="addCampoSeguroConjugue()">+</button></h5>
                                </div>
                            </div>
                            <div>
                                <form role="form" id="formSeguroConjugue">
                                    <div class="row" id="seguro_conjugue">                     
                                        <?= $seguro_conjugue ?>

                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="insereSeguroPrevidencia">Salvar</button>
                        </div>
                    </div>
                </div>

                <!--Plano-->
                <div class="col-sm-12 col-md-9 no-display" id="plano">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Plano
                            </h3>
                        </div>              
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h3>Principal</h3>
                                </div>
                                <div class="col-md-4">
                                    <label>Nome</label><br>
                                    <span id="plano_nome_principal"></span>
                                </div>
                                <div class="col-md-2">
                                    <label>Risco</label><br>
                                    <span>Padrão</span>
                                </div>
                                <div class="col-md-2">
                                    <label>CPF</label><br>
                                    <span id="plano_cpf_principal"></span>
                                </div>
                                <div class="col-md-2">
                                    <label>Sexo</label><br>
                                    <span id="plano_sexo_principal"></span>
                                </div>
                                <div class="col-md-2">
                                    <label>Nascimento</label><br>
                                    <span id="plano_nascimento_principal"></span>
                                </div>
                            </div>
                            <br>
                            <form role="form" id="formPlanoPrincipal">
                                <div class="row">
                                    <table class="table table-hover" style="font-size: 12px;">
                                        <thead>
                                            <tr>
                                                <th style="width: 160px;">Produto</th>
                                                <th>Vigência</th>
                                                <th>Prazo</th>
                                                <th>Capital Segurado</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?= $planos_principal ?>
                                        </tbody>
                                    </table>
                                </div>   
                            </form>
                            <br>

                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h3>Cônjuge</h3>
                                </div>
                                <div class="col-md-4">
                                    <label>Nome</label><br>
                                    <span id="plano_nome_conjugue"></span>
                                </div>
                                <div class="col-md-2">
                                    <label>Nascimento</label><br>
                                    <span id="plano_nascimento_conjugue"></span>
                                </div>
                            </div>
                            <br>
                            <form role="form" id="formPlanoConjugue">
                                <div class="row">
                                    <table class="table table-hover" style="font-size: 12px;">
                                        <thead>
                                            <tr>
                                                <th style="width: 160px;">Produto</th>
                                                <th>Vigência</th>
                                                <th>Prazo</th>
                                                <th>Capital Segurado</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?= $planos_conjugue ?>
                                        </tbody>
                                    </table>
                                </div>      
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="inserirPlanos">Salvar</button>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <!-- /.content -->
</div>

@endsection

@section('javascript')

<!-- jQuery -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<script src="/dist/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/dist/plugins/notify/notify.js" type="text/javascript"></script>
<script>
                                        $("#sexo").val("{{$dadoscadastrais->sexo}}");
                                        $("#estadocivil").val("{{$dadoscadastrais->estadocivil}}");
</script>
<script src="/dist/js/cadastro.js"></script>
<script src="/dist/js/cadastro/dadoscadastrais.js"></script>
<script src="/dist/js/cadastro/dadosfamiliares.js"></script>
<script src="/dist/js/cadastro/rendimentos.js"></script>
<script src="/dist/js/cadastro/patrimonio.js"></script>
<script src="/dist/js/cadastro/educacaofilhos.js"></script>
<script src="/dist/js/cadastro/padraovida.js"></script>
<script src="/dist/js/cadastro/emprestimos.js"></script>
<script src="/dist/js/cadastro/segurosprevidencias.js"></script>
<script src="/dist/js/cadastro/planovida.js"></script>

@stop