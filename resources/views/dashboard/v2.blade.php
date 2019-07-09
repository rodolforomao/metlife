@extends('layouts.master')

@section('content')

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
                                    <a href="javascript:void(0)" onClick="openPadraoVida()" class="nav-link">
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
                                            Emprestimos
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" onClick="openSegurosPrevidencias()" class="nav-link">
                                        <i class="nav-icon fa fa-folder-open"></i>
                                        <p>
                                            Seguros e Previdências
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="javascript:void(0)" onClick="openPlano()" class="nav-link">
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
                        <input type="hidden" id="idCliente">
                        <form role="form" id="formDadosCadastrais">
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
                                            <input type="text" class="form-control" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
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
                                            <input type="text" id="dc_celular" class="form-control" placeholder="Celular" name="dc_celular" name="tel" maxlength="15" OnKeyPress="formatar('## #####-####', this)" >
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cônjuge</label>
                                            <input type="text" class="form-control" id="df_conjuje" name="df_conjuje" placeholder="Cônjuge">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Data Nascimento</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input id="data_nascimento_conjugue" name="data_nascimento_conjugue" type="text" data-provide="datepicker" class="datepicker form-control">
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
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaracaodeir" value="1">
                                                <label class="form-check-label">Completa</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaracaodeir" value="2">
                                                <label class="form-check-label">Simplificada</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
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
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Outras Rendas</label>
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="ren_outras_conjugue" name="ren_outras_conjugue" class="form-control" placeholder="Renda Mensal"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Declaração de IR</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaracaodeir_conjugue" value="1">
                                                <label class="form-check-label">Completa</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="declaracaodeir_conjugue" value="2">
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
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input id="patrim_inventario" name="patrim_inventario" class="form-control" placeholder="Inventário"
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
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
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
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
                                                       onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
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
                        <form role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h3>Filho <button type="button" class="btn btn-sm btn-info">+</button></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Idade / Série</label>
                                            <input type="text" class="form-control" id="basico_mensal" placeholder="Idade / Série">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Total de Anos Para Formação</label>
                                            <input type="text" class="form-control" id="basico_anos" placeholder="Total de Anos Para Formação">
                                        </div>
                                    </div> 

                                    <div class="col-sm-12 col-md-4">  
                                        <div class="row">
                                            <div class="col-md-12 border-bottom">
                                                <small>Infantil / Básico (12 anos)</small>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Custo</label>
                                                    <input type="text" class="form-control" id="basico_mensal">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Anos</label>
                                                    <input type="text" class="form-control" id="basico_anos">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="text" class="form-control" id="basico_total">
                                                </div>
                                            </div>                    
                                        </div>
                                    </div>      
                                    <div class="col-sm-12 col-md-4 blue-background">  
                                        <div class="row">
                                            <div class="col-md-12 border-bottom">
                                                <small>Fundamental (3 anos)</small>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Custo</label>
                                                    <input type="text" class="form-control" id="fundamental_mensal">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Anos</label>
                                                    <input type="text" class="form-control" id="fundamental_anos">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="text" class="form-control" id="fundamental_total">
                                                </div>
                                            </div>                    
                                        </div>
                                    </div>   
                                    <div class="col-sm-12 col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 border-bottom">
                                                <small>Superior (4 a 5 anos)</small>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Custo</label>
                                                    <input type="text" class="form-control" id="superior_mensal">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Anos</label>
                                                    <input type="text" class="form-control" id="superior_anos">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <input type="text" class="form-control" id="superior_total">
                                                </div>
                                            </div>                    
                                        </div>  
                                    </div>  
                                    <div class="col-md-12">
                                        <input type="button" value="Remover" class="pull-right btn btn-default"/>
                                    </div>       
                                </div>
                                <br>
                                <div class="row border-top">
                                    <div class="col-md-6">
                                        <label>Total Despesas com Educação</label><br>
                                        <span>R$ 0,00</span>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Maior Periodo para Formação (Anos)</label><br>
                                        <span>0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary">Salvar</button>
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
                                                <input id="pv_moradia" name="pv_moradia" class="form-control" placeholder="Moradia"
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
                                                <input id="pv_servicos" name="pv_servicos" class="form-control" placeholder="Serviços"
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
                                                <input id="pv_transporte" name="pv_transporte" class="form-control" placeholder="Serviços"
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
                                                <input id="pv_saude" name="pv_saude" class="form-control" placeholder="Saúde"
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
                                                <input id="pv_vestuario" name="pv_vestuario" class="form-control" placeholder="Vestuário"
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
                                                <input id="pv_seguro_vida" name="pv_seguro_vida" class="form-control" placeholder="Seguro de Vida/Previdência"
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
                                                <input id="pv_lazer" name="pv_lazer" class="form-control" placeholder="Lazer"
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
                                                <input id="pv_impostos" name="pv_impostos" class="form-control" placeholder="Impostos"
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
                                                <input id="pv_extras" name="pv_extras" class="form-control" placeholder="Extras/Outros"
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
                                Emprestimos
                            </h3>
                        </div>
                        <form role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Descoberto Emprestimo/Financiamento </label>
                                        <input type="text" class="form-control" id="emp_descoberto" placeholder="Descoberto Emprestimo/Financiamento">
                                        <div class="input-group date">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                            </div>
                                            <input id="patrim_acoes" name="patrim_acoes" class="form-control" placeholder="Fundos/Investimentos/Ações"
                                                   onkeydown="FormataMoeda(this, 20, event)" onkeypress="return maskKeyPress(event)" onchange="somaTotalPatriomio()">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Maior Período para Emprestimo/Finan. (Anos)</label> 
                                        <input type="text" class="form-control" id="emp_perido" placeholder="Maior Período para Emprestimo/Finan. (Anos)">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h3>Emprestimos <button type="button" class="btn btn-sm btn-info addDivSeguro">+</button></h3>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Saldo Devedor</label>
                                            <input type="text" class="form-control" id="emp_valor" placeholder="Saldo Devedor">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Possui Seguro</label>
                                            <input type="text" class="form-control" id="emp_num" placeholder="Possui Seguro">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Parcela Mensal</label>
                                            <input type="text" class="form-control" id="emp_valor2" placeholder="Parcela Mensal">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Prazo Residual</label>
                                            <input type="text" class="form-control" id="emp_num2" placeholder="(meses)">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Saldo Devedor Descoberto</label>
                                            <input type="text" class="form-control" id="emp_valor3" placeholder="Saldo Devedor Descoberto">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <input type="button" value="-" class="btn btn-default" style="position: relative;top: 30px;"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 border-top">
                                        <label>Total </label>
                                        <div class="row">
                                            <div class="col-2"><span class="pull-right">R$ 0,00</span></div>
                                            <div class="col-2"><span class="pull-right">0</span></div>
                                            <div class="col-2"><span class="pull-right">R$ 0,00</span></div>
                                            <div class="col-2"><span class="pull-right">0</span></div>
                                            <div class="col-3"><span class="pull-right">R$ 0,00</span></div>
                                        </div>
                                    </div>

                                </div>                  

                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary">Salvar</button>
                            </div>

                        </form>  
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
                        <form role="form">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h3>Principal</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>FGTS <small>Saldo Acum.</small></label>
                                            <input type="text" class="form-control" id="plano_fgts_princial" placeholder="FGTS">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>INSS <small>Rensa Mensal</small></label>
                                            <input type="text" class="form-control" id="plano_inss_princial" placeholder="INSS">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Idade para Aposentadoria</label>
                                            <input type="text" class="form-control" id="idade_aposentadoria_principal" placeholder="Idade para Aposentadoria">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h5>Previdência <button type="button" class="btn btn-sm btn-info">+</button></h5>
                                    </div>
                                </div>
                                <div id="previdencia_principal">        
                                    <div class="row">                       
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Previdência</label>
                                                <input type="text" class="form-control" id="plano_previdencia_principal" placeholder="Previdência">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>PGBL/VGBL</label>
                                                <input type="text" class="form-control" id="plano_pgbl_principal" placeholder="PGBL/VGBL">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Saldo Acumulado R$</label>
                                                <input type="text" class="form-control" id="plano_saldo_principal" placeholder="Saldo Acumulado R$">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Contribuição Anual</label>
                                                <input type="text" class="form-control" id="plano_contribuicao_principal" placeholder="Contribuição Anual">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="button" value="-" class="btn btn-default" style="position: relative;top: 30px;"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row border-top">
                                    <div class="col-md-3">
                                        <label>Total</label>
                                    </div>
                                    <div class="col-md-3 offset-md-2">
                                        <span class="pull-right">R$ 0,00</span>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="pull-right">R$ 0,00</span>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h5>Seguro <button type="button" class="btn btn-sm btn-info">+</button></h5>
                                    </div>
                                </div>
                                <div id="seguro_principal">
                                    <div class="row">                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Seguro de Vida</label>
                                                <input type="text" class="form-control" id="seguro_vida_principal" placeholder="Seguro de Vida">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Capital Segurado</label>
                                                <input type="text" class="form-control" id="capital_segurado_principal" placeholder="Capital Segurado">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Prêmio Mensal</label>
                                                <input type="text" class="form-control" id="premio_mensal_principal" placeholder="Prêmio">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="button" value="-" class="btn btn-default" style="position: relative;top: 30px;"/>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h3>Cônjuge</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>FGTS <small>Saldo Acum.</small></label>
                                            <input type="text" class="form-control" id="plano_fgts_conjuje" placeholder="FGTS">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>INSS <small>Rensa Mensal</small></label>
                                            <input type="text" class="form-control" id="plano_inss_conjuje" placeholder="INSS">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Idade para Aposentadoria</label>
                                            <input type="text" class="form-control" id="idade_aposentadoria_conjuje" placeholder="Idade para Aposentadoria">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h5>Previdência <button type="button" class="btn btn-sm btn-info">+</button></h5>
                                    </div>
                                </div>
                                <div id="previdencia_conjuje">        
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Previdência</label>
                                                <input type="text" class="form-control" id="plano_previdencia_conjuje" placeholder="Previdência">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>PGBL/VGBL</label>
                                                <input type="text" class="form-control" id="plano_pgbl_conjuje" placeholder="PGBL/VGBL">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Saldo Acumulado R$</label>
                                                <input type="text" class="form-control" id="plano_saldo_conjuje" placeholder="Saldo Acumulado R$">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Contribuição Anual</label>
                                                <input type="text" class="form-control" id="plano_contribuicao_conjuje" placeholder="Contribuição Anual">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="button" value="-" class="btn btn-default" style="position: relative;top: 30px;"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row border-top">
                                    <div class="col-md-3">
                                        <label>Total</label>
                                    </div>
                                    <div class="col-md-3 offset-md-2">
                                        <span class="pull-right">R$ 0,00</span>
                                    </div>
                                    <div class="col-md-3">
                                        <span class="pull-right">R$ 0,00</span>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-12 border-bottom">
                                        <h5>Seguro <button type="button" class="btn btn-sm btn-info">+</button></h5>
                                    </div>
                                </div>
                                <div id="seguro_conjuje">                      
                                    <div class="row">                     
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Seguro de Vida</label>
                                                <input type="text" class="form-control" id="seguro_vida_conjuje" placeholder="Seguro de Vida">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Capital Segurado</label>
                                                <input type="text" class="form-control" id="capital_segurado_conjuje" placeholder="Capital Segurado">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Prêmio Mensal</label>
                                                <input type="text" class="form-control" id="premio_mensal_conjuje" placeholder="Prêmio Mensal">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="button" value="-" class="btn btn-default" style="position: relative;top: 30px;"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary">Salvar</button>
                            </div>

                        </form> 

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
                                    <span>Leucenir</span>
                                </div>
                                <div class="col-md-2">
                                    <label>Risco</label><br>
                                    <span>Padrão</span>
                                </div>
                                <div class="col-md-2">
                                    <label>CPF</label><br>
                                    <span>00.000.00-00</span>
                                </div>
                                <div class="col-md-2">
                                    <label>Sexo</label><br>
                                    <span>Feminino</span>
                                </div>
                                <div class="col-md-2">
                                    <label>Nascimento</label><br>
                                    <span>12/02/1993</span>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <table class="table table-hover" style="font-size: 12px;">
                                    <theader>
                                        <tr>
                                            <th style="width: 160px;">Produto</th>
                                            <th>Vigência</th>
                                            <th>Prazo</th>
                                            <th>Capital Segurado</th>
                                            <th>Valor</th>
                                        </tr>
                                    </theader>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Vitalício"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Compra de Capital"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Decrescente"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Temporário"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Doenças Graves"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Internação Hospitalar"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Ad. Invalidez acidental"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Ad. Morte Acidental"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>   

                            <br>

                            <div class="row">
                                <div class="col-md-12 border-bottom">
                                    <h3>Cônjuge</h3>
                                </div>
                                <div class="col-md-4">
                                    <label>Nome</label><br>
                                    <span>Leucenir</span>
                                </div>
                                <div class="col-md-2">
                                    <label>Risco</label><br>
                                    <span>Padrão</span>
                                </div>
                                <div class="col-md-2">
                                    <label>CPF</label><br>
                                    <span>00.000.00-00</span>
                                </div>
                                <div class="col-md-2">
                                    <label>Sexo</label><br>
                                    <span>Feminino</span>
                                </div>
                                <div class="col-md-2">
                                    <label>Nascimento</label><br>
                                    <span>12/02/1993</span>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <table class="table table-hover" style="font-size: 12px;">
                                    <theader>
                                        <tr>
                                            <th style="width: 160px;">Produto</th>
                                            <th>Vigência</th>
                                            <th>Prazo</th>
                                            <th>Capital Segurado</th>
                                            <th>Valor</th>
                                        </tr>
                                    </theader>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Vitalício"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Compra de Capital"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Decrescente"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Temporário"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Doenças Graves"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Internação Hospitalar"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Ad. Invalidez acidental"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" style="font-size: 12px;" value="Ad. Morte Acidental"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                            <td class="yellow-background"><input type="text" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>          
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary">Salvar</button>
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

<script src="/dist/js/cadastro.js"></script>
@stop