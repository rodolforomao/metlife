<!-- relatorio css -->
<link rel="stylesheet" href="/dist/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/dist/css/style.css">   
<link rel="stylesheet" href="/dist/css/print.css">

<?php
$idade = calculo_idade(date('d/m/Y', strtotime($dadoscadastrais->datanascimento)));

function calculo_idade($data) {
//Data atual
    $dia = date('d');
    $mes = date('m');
    $ano = date('Y');
//Data do aniversário
    $nascimento = explode('/', $data);
    $dianasc = ($nascimento[0]);
    $mesnasc = ($nascimento[1]);
    $anonasc = ($nascimento[2]);
// se for formato do banco, use esse código em vez do de cima!
    /*
      $nascimento = explode('-', $nascimento);
      $dianasc = ($nascimento[2]);
      $mesnasc = ($nascimento[1]);
      $anonasc = ($nascimento[0]);
     */
//Calculando sua idade
    $idade = $ano - $anonasc; // simples, ano- nascimento!
    if ($mes < $mesnasc) { // se o mes é menor, só subtrair da idade
        $idade--;
        return $idade;
    } elseif ($mes == $mesnasc && $dia <= $dianasc) { // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
        $idade--;
        return $idade;
    } else { // ja fez aniversario no ano, tudo certo!
        return $idade;
    }
}

//Tela 1 Situação Atual
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
$disabled_despesas = "";
$disabled_todos = "";
foreach ($dadosPadraoVida as $padrao_vida) {
    $id_padrao_vida = $padrao_vida->id;
    $moradia = $padrao_vida->moradia;
    $servicos = $padrao_vida->servicos;
    $transporte = $padrao_vida->transporte;
    $saude = $padrao_vida->saude;
    $vestuario = $padrao_vida->vestuario;
    $lazer = $padrao_vida->lazer;
    $seguro_vida_previdencia = $padrao_vida->seguroDeVidaPrevidencia;
    $impostos = $padrao_vida->impostos;
    $extrasoutros = $padrao_vida->extrasoutros;

    if ($padrao_vida->despezasgerais == 0) {
        $despezasgerais = $padrao_vida->extrasoutros + $padrao_vida->moradia + $padrao_vida->servicos + $padrao_vida->transporte + $padrao_vida->saude + $padrao_vida->vestuario + $padrao_vida->lazer + $padrao_vida->seguroDeVidaPrevidencia + $padrao_vida->impostos + $padrao_vida->extrasoutros;
    } else {
        $despezasgerais = $padrao_vida->despezasgerais;
    }
    $despezasgerais = $despezasgerais * 12;
}

//Dados Rendientos Principal ---------------------------------------------------
$renda = 0;
foreach ($dadosRendimento as $rendimento) {
    $renda += $rendimento->remendimentosmensal + $rendimento->outrasrendas;
}
//Dados Rendimentos Principal ---------------------------------------------------
$inss = 0;
$fgts = 0;
foreach ($dadosFGTS_INSS as $inss_fgts) {
    $inss = ($inss_fgts->inss + $renda) * 12;
    $fgts = $inss_fgts->fgts;
}

$inventario = "";
$emergencia = 0;
$funeral = 0;
$valor_total_patrimonio = "";
foreach ($dadosPatrimonio as $patrimonio) {
    $inventario = $patrimonio->inventario;
    $emergencia = $patrimonio->emergencia;
    $funeral = $patrimonio->funeral;
    $valor_total_patrimonio = (($patrimonio->imoveis + $patrimonio->fundos + $patrimonio->reservas + $patrimonio->outros) * $inventario) / 100;
}

$saldo_devedor = "";
foreach ($dadosEmprestimos as $emprestimo) {
    $saldo_devedor = $emprestimo->saldodevedor;
    $prazo = intdiv($emprestimo->prazoresidual, 12);
    $mensalidade = ($emprestimo->parcelamensal * 12);
}


//Educação
$custo_educacao = 0;
$anos_educacao = 0;
$custo_educacao_tipo = [];
$total_custo_educacao_tipo = [];
foreach ($dadosEducacao as $educacao) {
    $custo_educacao += $educacao->custo;
    $anos_educacao += $educacao->anos;
    $custo_educacao_tipo[$educacao->idTipoEducacao] = ($educacao->custo * 12) ?: 0;
    $anos_educacao_tipo[$educacao->idTipoEducacao] = $educacao->anos ?: 0;
    $total_custo_educacao_tipo[$educacao->idTipoEducacao] = $educacao->anos * $educacao->custo * 12;
}
$custo_educacao_anual = $custo_educacao * 12;
$custo_educacao_total = $custo_educacao_anual * $anos_educacao;

$seguro_vida = 0;
foreach ($dadosSeguro as $seguro) {
    $seguro_vida = $seguro->segurodevida;
}
?>

<body class="A4">
    <!--Página 1-->
    <section class="landscape">
        <div class="border-blue center">
            <div class="row margin">
                <div class="col-12">
                    <h2>Planejamento Financeiro</h2>
                    <h2><b>{{$dadoscadastrais->nomecompleto}}</b></h2>
                    <h2>Seguro de Vida Individual</h2>
                </div>
            </div>
            <div class="row margin">
                <div class="col align-self-center">
                    <img src="/dist/img/logoCapa.png" style="width: 50%;">
                </div>
            </div>
            <div class="row margin">
                <div class="col-12">
                    <p><b>LC (Life Consultant): Jeromy Souto</b></p>
                    <p><b>Corretora: Souto Martins Corretora de Seguros LTDA</b></p>
                    <p><b>Código SUSEP: 20.2023620.4</b></p>  
                </div>
            </div>        
        </div>  
    </section>  

    <!--Página 2-->
    <section class="landscape">
        <div class="center">
            <div class="row">
                <div class="col-12">
                    <h2>Situação Atual</h2>
                </div>
            </div>
            <div class="row">
                <div class="col align-self-center">
                    <div id="graf_situacao_atual" class="grafico"></div>
                </div>
            </div>      
        </div>  
    </section>  

    <!--Página 3-->
    <section class="landscape">
        <div class="center">
            <div class="row">
                <div class="col-12">
                    <h2>Cenário de Invalidez / Doença Grave</h2>
                </div>
            </div>
            <div class="row">
                <div class="col align-self-center">
                    <div id="graf_invalidez" class="grafico"></div>
                </div>
            </div>      
        </div>  
    </section>  

    <!--Página 4-->
    <section class="landscape">
        <div class="center">
            <div class="row">
                <div class="col-12">
                    <h2>Necessidades de Proteção</h2>
                </div>
            </div>
            <div class="row">
                <div class="col align-self-center">
                    <div id="graf_necessidades_protecao" class="grafico"></div>
                </div>
            </div>      
        </div>  
    </section>  

    <!--Página 5-->
    <section class="landscape">
        <div class="center">
            <div class="row">
                <div class="col-12">
                    <h2>Custo total da vida</h2>
                </div>
            </div>
            <div class="row">
                <div class="col align-self-center">
                    <div id="graf_custo_total_vida" class="grafico"></div>
                </div>
            </div>      
        </div>  
    </section>  

    <!--Página 6-->
    <section class="landscape">
        <div class="center">
            <div class="row">
                <div class="col align-self-center table-responsive">
                    <table class="table table-striped font-table">
                        <thead class="title-table">
                            <tr>
                                <th>Aciole</th>
                                <?php
                                $prazo = (int) ((99 - $idade) / 5);
                                $idade_ = $idade;
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>$idade_</th>";
                                    $idade_ += 5;
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>Despesas Fixas</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$" . number_format($despezasgerais, 2, ".", ",") . "</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Educação</b></td>

                                <?php
                                $x = 0;
                                $totalNecessidade = array();
                                for ($i = 1; $i <= count($custo_educacao_tipo); $i++) {
                                    if ($anos_educacao_tipo[$i] > 0) {
                                        $total = $custo_educacao_tipo[$i];
                                        for ($j = 1; $j <= $anos_educacao_tipo[$i]; $j++) {
                                            if (5 % $j == 0) {
                                                echo "<th>R$" . number_format($total, 2, ".", ",") . "</th>";
                                                $totalNecessidade[$x] = $total;
                                                $x++;
                                            }
                                        }
                                    }
                                }
                                $falta_prazo_educacao = $prazo - count($totalNecessidade);
                                echo $falta_prazo_educacao;
                                for ($i = 0; $i <= $falta_prazo_educacao; $i++) {
                                    echo "<th>R$-</th>";
                                    $totalNecessidade[$x] = 0;
                                    $x++;
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Sonho</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$-</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Inventário</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>" . number_format($inventario, 1, ".", ",") . "%</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Emergêncial</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>" . number_format($emergencia, 0, ".", ",") . "x</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Funeral</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$" . number_format($funeral, 2, ".", ",") . "</th>";
                                }
                                ?>
                            </tr>

                            <tr class="title-table">
                                <td>Total de Necessidades</td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    $totalNecessidade[$i] += $funeral + $despezasgerais;
                                    echo "<th>R$" . number_format($totalNecessidade[$i], 2, ".", ",") . "</th>";
                                }
                                ?>
                            </tr>

                            <tr>
                                <td><b>FGTS</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$" . number_format($fgts, 2, ".", ",") . "</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>INSS</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$-</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Previdência</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$-</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Seguro de Vida</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$" . number_format($seguro_vida, 2, ".", ",") . "</th>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td><b>Patrimônio</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$" . number_format($valor_total_patrimonio, 2, ".", ",") . "</th>";
                                }
                                ?>
                            </tr>

                            <tr class="title-table">
                                <td>Total de Garantias</td>
                                <?php
                                $totalGarantias = $valor_total_patrimonio + $seguro_vida + $fgts;
                                for ($i = 0; $i <= $prazo; $i++) {
                                    echo "<th>R$" . number_format($totalGarantias, 2, ".", ",") . "</th>";
                                }
                                ?>
                            </tr>

                            <tr>
                                <td><b>Necessidades Não Cobertas</b></td>
                                <?php
                                for ($i = 0; $i <= $prazo; $i++) {
                                    $necessidadeNaoCobertas[$i] = $totalNecessidade[$i] - $totalGarantias;
                                    echo "<th>R$" . number_format($necessidadeNaoCobertas[$i], 2, ".", ",") . "</th>";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>      
        </div>  
    </section>  

    <!--Página 7-->
    <section class="landscape">
        <div class="center">
            <div class="row">
                <div class="col-md-4 border-right"> 
                    <img src="/dist/img/logoMini.png" style="width: 50%;">
                </div>
                <div class="col-md-2">  
                    <b>Nome</b>
                </div>
                <div class="col-md-2">  
                    {{$dadoscadastrais->nomecompleto}}
                </div>
                <div class="col-md-1">  
                    <b>Sexo</b>
                </div>
                <div class="col-md-1">  
                    {{$dadoscadastrais->sexo}}
                </div>
            </div>    
            <div class="row">
                <div class="offset-md-4 col-md-2">  
                    <b>Elaborado</b>
                </div>
                <div class="col-md-2">  
                    {{date('d/m/Y', strtotime(($dadoscadastrais->created_at)))}}
                </div>
                <div class="col-md-1">  
                    <b>Idade</b>
                </div>
                <div class="col-md-1">  
                    {{$idade}}
                </div>
                <div class="col-md-1">  
                    <b>Nascimento</b>
                </div>
                <div class="col-md-1">  
                    {{date('d/m/Y', strtotime(($dadoscadastrais->datanascimento)))}}
                </div>
            </div>
            <hr>
            <div class="row">         
                <table class="table table-striped font-table">
                    <thead class="title-table">
                        <tr>
                            <th>Produto</th>
                            <th>Vigência</th>
                            <th>Prazo</th>
                            <th>Capital</th>
                            <th>Segurado</th>
                            <th>Gráfico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rowspan = count($dadosPlanosPrincipal) ?>
                        <?php
                        $i = 0;
                        foreach ($dadosPlanosPrincipal as $plano) {
                            $plano_produto[$i] = $plano->descricao;
                            if ($plano->idProduto == 1) {
                                $plano_prazo[$i] = 99;
                            } else {
                                $plano_prazo[$i] = $plano->prazo == 0 || $plano->prazo == "" ? 0 : $plano->prazo / 12;
                            }
                            ?>
                            <tr>
                                <td><b>{{$plano->descricao}}</b></td>
                                <td>{{$plano->vigencia == "" || $plano->vigencia == "1970-01-01"  ? "" : date('d/m/Y', strtotime(($plano->vigencia)))}}</td>
                                <td>{{$plano->prazo == ""? "" : $plano->prazo / 12}}</td>
                                <td>{{$plano->capitalsegurado == "" ? "" : "R$" . number_format($plano->capitalsegurado, 2, ",", ".")}}</td>
                                <td>{{$plano->valor == "" ? "" : "R$" . number_format($plano->valor, 2, ",", ".")}}</td>
                                <?php if ($i == 0) { ?>
                                    <td rowspan="{{$rowspan}}" style="width: 40%; background: white;"><div id="graf_painel" class="min-grafico"></div></td>
                                <?php } ?>
                            </tr>
                            <?php $i++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>  

            <div class="row">         
                <table class="table table-striped font-table border-table">
                    <thead class="title-table">
                        <tr>
                            <th colspan="5" class="border-table">Cobertutas em caso de:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="line-table">
                            <td class="border-table">
                                <div class="row margin">
                                    <div class="col-12"><b>Morte Qualquer Causa</b></div>
                                    <div class="col-12">Vitalício</div>
                                    <div class="col-6">R$</div><div class="col-6">60.000</div>
                                    <div class="col-6"><b><h4>R$</h4></b></div><div class="col-6"><b><h4>60.000</h4></b></div>
                                </div>
                            </td>
                            <td class="border-table">
                                <div class="row margin">
                                    <div class="col-12"><b>Morte Acidental</b></div>
                                    <div class="col-12">Capital morte acidental</div>
                                    <div class="col-6">R$</div><div class="col-6">-</div>
                                    <div class="col-6"><b><h4>R$</h4></b></div><div class="col-6"><b><h4>60.000</h4></b></div>
                                </div>
                            </td>
                            <td class="border-table">
                                <div class="row margin">
                                    <div class="col-12"><b>Invalidez</b></div>
                                    <div class="col-12">Vitalício</div>
                                    <div class="col-6">R$</div><div class="col-6">500.000</div>
                                    <div class="col-6"><b><h4>R$</h4></b></div><div class="col-6"><b><h4>500.000</h4></b></div>
                                </div>
                            </td>
                            <td class="border-table">
                                <div class="row margin">
                                    <div class="col-12"><b>Doenças Graves</b></div>
                                    <div class="col-12">Vitalício</div>
                                    <div class="col-6">R$</div><div class="col-6">500.000</div>
                                    <div class="col-6"><b><h4>R$</h4></b></div><div class="col-6"><b><h4>500.000</h4></b></div>
                                </div>
                            </td>
                            <td class="border-table">
                                <div class="row margin">
                                    <div class="col-12"><b>Internação Hospitalar</b></div>
                                    <div class="col-12">Vitalício</div>
                                    <div class="col-6">R$</div><div class="col-6">200,00</div>
                                    <div class="col-6"><b><h4>R$</h4></b></div><div class="col-6"><b> <h4>200,00</h4></b></div>
                                </div>
                            </td>
                        </tr>               
                    </tbody>
                </table>
            </div>  
        </div>  
    </section>  

    <!--Página 8-->
    <section class="landscape">
        <div class="center">
            <div class="row">
                <div class="col-md-4 border-right"> 
                    <img src="/dist/img/logoMini.png" style="width: 50%;">
                </div>
                <div class="col-md-2">  
                    <b>Nome</b>
                </div>
                <div class="col-md-2">  
                    {{$dadoscadastrais->nomecompleto}}
                </div>
                <div class="col-md-1">  
                    <b>Sexo</b>
                </div>
                <div class="col-md-1">  
                    {{$dadoscadastrais->sexo}}
                </div>
            </div>    
            <div class="row">
                <div class="offset-md-4 col-md-2">  
                    <b>Elaborado</b>
                </div>
                <div class="col-md-2">  
                    {{date('d/m/Y', strtotime(($dadoscadastrais->created_at)))}}
                </div>
                <div class="col-md-1">  
                    <b>Idade</b>
                </div>
                <div class="col-md-1">  
                    {{$idade}}
                </div>
                <div class="col-md-1">  
                    <b>Nascimento</b>
                </div>
                <div class="col-md-1">  
                    {{date('d/m/Y', strtotime(($dadoscadastrais->datanascimento)))}}
                </div>
            </div>
            <hr>
            <div class="row">       
                <div class="col-md-3">

                </div>
                <div class="col-7">
                    <div id="graf_painel_pie" class="pie-grafico"></div>
                </div>
            </div>  

        </div>  
    </section>              

</body>

<!-- Highcharts -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<script src="/dist/plugins/Highcharts-7.1.2/code/highcharts.js"></script>
<script src="/dist/plugins/Highcharts-7.1.2/code/pattern-fill.js"></script>
<script src="/dist/plugins/Highcharts-7.1.2/code/modules/variable-pie.js"></script>

<script src="/dist/js/relatorio/relatorio.js"></script>
<script src="/dist/js/relatorio/situacao_atual.js"></script>
<script src="/dist/js/relatorio/invalidez_doencagrave.js"></script>
<script src="/dist/js/relatorio/necessidade_protecao.js"></script>
<script src="/dist/js/relatorio/custo_total_vida.js"></script>
<script src="/dist/js/relatorio/graf_painel.js"></script>


<script>
var produto_descricao = [];
var produto_prazo = [];</script>

<?php
for ($i = 0; $i < count($plano_prazo); $i++) {
    echo "<script>produto_prazo.push(" . $plano_prazo[$i] . ")</script>";
}
for ($i = 0; $i < count($plano_produto); $i++) {
    echo "<script>produto_descricao.push('" . $plano_produto[$i] . "')</script>";
}
?>

<script>
    var idade = {{$idade}}

    var despesaFixa = {{$despezasgerais}}
    var renda = {{$renda}};
    situacaoAtual(idade, despesaFixa, renda);
    var inss = {{$inss}}
    invalidezDoencaGrave(idade, inss);
    var inventario = {{$valor_total_patrimonio}}
    var emergencial = {{$emergencia * $renda}}
    var funeral = {{$funeral}}
    var custo_educacao_anual = {{$custo_educacao_anual}}
    var custo_educacao_total = {{$custo_educacao_total}}
    var anos_educacao = {{$anos_educacao}}
    necessidadeProtecao(idade, inventario, emergencial, funeral, custo_educacao_anual, custo_educacao_total, anos_educacao);
    custoTotalVida(idade, despesaFixa, custo_educacao_anual, custo_educacao_total, anos_educacao, funeral, emergencial, funeral);
    graf_painel(produto_prazo, produto_descricao);
</script>
