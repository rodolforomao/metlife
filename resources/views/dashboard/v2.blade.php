@extends('layouts.master')

@section('content')
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
                                            Educação
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
                            <input type="hidden" id="idCliente" name="id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nome Completo</label>
                                            <input type="text" class="form-control" id="dc_nome_completo" name="dc_nome_completo" placeholder="Nome Completo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Data Nascimento</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input id="data_nascimento" name="data_nascimento" type="text" data-provide="datepicker" class="datepicker form-control">
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
                                            <input type="text" class="form-control" id="dc_endereco_resd" name="dc_endereco_resd" placeholder="Endereço Residencial">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="dc_email" name="dc_email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Celular</label>
                                            <input type="text" id="dc_celular" class="form-control" placeholder="Celular" name="dc_celular" name="tel" maxlength="14" OnKeyPress="formatar('## # ####-####', this)" >
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
                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h3>Familiar(es) <button type="button" class="btn btn-sm btn-info" onclick="addCampoFamiliar()">+</button></h3>
                                </div>
                            </div>
                            <form role="form" id="formDadosFamiliares">

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
                            <input type="hidden" id="id_rendimento_principal" name="id_rendimento_principal">
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
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Outras Rendas</label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="ren_outras_principal" name="ren_outras_principal" class="form-control" placeholder="Renda Mensal"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Declaração de IR</label>
                                            <select name='declaracaodeir_principal' class='form-control'>
                                                <option value=''>Selecione</option>
                                                <option value='1'>Completa</option>
                                                <option value='2'>Simplificada</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <h3 class="col-md-12 border-bottom">
                                        Familiar(es)<button type="button" class="btn btn-sm btn-info addDivSeguro" onclick="addCampoRendimentos()">+</button>
                                    </h3>
                                    <div class="card-body"  id="divRendimentosFamiliares">

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
                            <input type="hidden" id="id_patrimonio" name="id">
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
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
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
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
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
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
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
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 border-top">
                                        <label>Total </label><span class="pull-right" id="valorTotal_patrimonio">R$ 0,00</span>
                                    </div>

                                </div>
                                <br><br>
                                <div class="row" style="background: #f4f6f9;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Inventário</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                <input id="patrim_inventario" name="patrim_inventario" class="form-control" placeholder="Inventário"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Emergência <small>(X de renda mensal)</small></label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">(X)</span>
                                                </div>
                                                <input id="patrim_emergencia" name="patrim_emergencia" class="form-control" placeholder="Emergência">
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
                                                <input id="patrim_funaral" name="patrim_funaral" class="form-control" placeholder="Funeral" value="10.000,00"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
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

                <!--Educação-->
                <div class="col-sm-12 col-md-9 no-display" id="educacao_filhos">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Educação <button type="button" class="btn btn-sm btn-info" onclick="addCampoFilhoEducacao()">+</button>
                            </h3>
                        </div>
                        <form role="form" id="formEducacaoFilhos">
                            <div class="card-body"  id="divEducacaoFilhos">

                            </div>
                        </form>   
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="insereEducacaoFilhos">Salvar</button>
                        </div>
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
                            <input id="id_padrao_vida" name="id" type="hidden">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Despesas Gerais</label>
                                            <div class="input-group date">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="pv_gerais" name="pv_gerais" class="form-control" placeholder="Despesas Gerais"
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
                                                <input id="pv_moradia" name="pv_moradia" class="form-control" placeholder="Moradia" onchange="somaValorPadraoVida(this.value)"
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
                                                <input id="pv_servicos" name="pv_servicos" class="form-control" placeholder="Serviços" onchange="somaValorPadraoVida(this.value)"
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
                                                <input id="pv_transporte" name="pv_transporte" class="form-control" placeholder="Serviços" onchange="somaValorPadraoVida(this.value)"
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
                                                <input id="pv_saude" name="pv_saude" class="form-control" placeholder="Saúde" onchange="somaValorPadraoVida(this.value)"
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
                                                <input id="pv_vestuario" name="pv_vestuario" class="form-control" placeholder="Vestuário" onchange="somaValorPadraoVida(this.value)"
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
                                                <input id="pv_seguro_vida" name="pv_seguro_vida" class="form-control" placeholder="Seguro de Vida/Previdência" onchange="somaValorPadraoVida(this.value)"
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
                                                <input id="pv_lazer" name="pv_lazer" class="form-control" placeholder="Lazer" onchange="somaValorPadraoVida(this.value)"
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
                                                <input id="pv_impostos" name="pv_impostos" class="form-control" placeholder="Impostos" onchange="somaValorPadraoVida(this.value)"
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
                                                <input id="pv_extras" name="pv_extras" class="form-control" placeholder="Extras/Outros" onchange="somaValorPadraoVida(this.value)"
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
                                <input type="hidden" name="id" id="id_emprestimos">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Descoberto Empréstimos/Financiamento </label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="emp_descoberto" name="emp_descoberto" class="form-control" placeholder="Descoberto Empréstimos/Financiamento"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Maior Período para Empréstimos/Finan. (Anos)</label> 
                                        <input id="emp_perido" name="emp_perido" class="form-control" placeholder="Maior Período para Empréstimos/Finan. (Anos)">
                                    </div>
                                </div>
                            </form>
                            <br>
                            <form role="form" id="formEmprestimos">
                                <div class="card-header">
                                    <h3>Empréstimos <button type="button" class="btn btn-sm btn-info addDivSeguro" onclick="addCampoEmprestimo()">+</button></h3>
                                </div>
                                <div class="card-body"  id="divEmprestimos">
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
                                <input type="hidden" id="id_inss_fgts_principal" name="id">
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
                                                <input type="text" class="form-control" name="fgts" placeholder="FGTS"
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
                                                <input type="text" class="form-control" name="inss" placeholder="INSS"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Idade para Aposentadoria</label>
                                            <input type="text" class="form-control" name="idade_aposentadoria" placeholder="Idade para Aposentadoria">
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

                                    </div>
                                </form>
                            </div>

                            <br>
                            <form role="form" id="formConjugueSeguros">
                                <input type="hidden" id="id_inss_fgts_conjugue" name="id">
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
                                                <input type="text" class="form-control" name="fgts" placeholder="FGTS"
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
                                                <input type="text" class="form-control" name="inss" placeholder="INSS"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Idade para Aposentadoria</label>
                                            <input type="text" class="form-control" name="idade_aposentadoria" placeholder="Idade para Aposentadoria">
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
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Vitalício" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="1">
                                                    <input type="hidden" id="id_vitalicio_principal" name="id[]">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input type="text" data-provide="datepicker" class="datepicker form-control" disabled="true">
                                                        <input name="vigencia[]" type="hidden">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Compra de Capital" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="2">
                                                    <input type="hidden" id="id_capital_principal" name="id[]">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Decrescente" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="3">
                                                    <input type="hidden" name="id[]" id="id_decrescente_principal">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Temporário" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="4">
                                                    <input type="hidden" name="id[]" id="id_temporario_principal">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Doenças Graves" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="5">
                                                    <input type="hidden" name="id[]" id="id_doencas_principal">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Internação Hospitalar" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="6">
                                                    <input type="hidden" name="id[]" id="id_internacao_principal">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Ad. Invalidez acidental" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="7">
                                                    <input type="hidden" name="id[]" id="id_invalidez_principal">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Ad. Morte Acidental" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="8">
                                                    <input type="hidden" name="id[]" id="id_morte_principal">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
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
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Vitalício" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="1">
                                                    <input type="hidden" id="id_vitalicio_conjugue" name="id[]">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input type="text" data-provide="datepicker" class="datepicker form-control" disabled="true">
                                                        <input name="vigencia[]" type="hidden">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Compra de Capital" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="2">
                                                    <input type="hidden" id="id_capital_conjugue" name="id[]">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Decrescente" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="3">
                                                    <input type="hidden" name="id[]" id="id_decrescente_conjugue">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Temporário" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="4">
                                                    <input type="hidden" name="id[]" id="id_temporario_conjugue">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Doenças Graves" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="5">
                                                    <input type="hidden" name="id[]" id="id_doencas_conjugue">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Internação Hospitalar" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="6">
                                                    <input type="hidden" name="id[]" id="id_internacao_conjugue">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Ad. Invalidez acidental" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="7">
                                                    <input type="hidden" name="id[]" id="id_invalidez_principal">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" style="font-size: 12px;" value="Ad. Morte Acidental" disabled="true">
                                                    <input type="hidden" name="id_produto[]" value="8">
                                                    <input type="hidden" name="id[]" id="id_morte_principal">
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        <input name="vigencia[]" type="text" data-provide="datepicker" class="datepicker form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <input name="prazo[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="capital_segurado[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                                <td class="yellow-background">
                                                    <div class="input-group date">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">R$</span>
                                                        </div>
                                                        <input name="valor[]" class="form-control"
                                                               onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                                    </div>
                                                </td>
                                            </tr>
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