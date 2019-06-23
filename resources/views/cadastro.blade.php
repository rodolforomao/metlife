<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MetLife</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="dist/img/favicon.png" type="image/x-icon">   

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">   
    <link rel="stylesheet" href="dist/css/cadastro.css"> 
</head>
<body class="hold-transition">
<div class="wrapper">
  <nav class="row main-header navbar navbar-expand bg-white navbar-light border-bottom">  

    <div class="col">
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.html" class="nav-link">Dasboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Cadastro</a>
        </li>  
        <li class="nav-item d-none d-sm-inline-block">
          <a href="usuario.html" class="nav-link">Usuario</a>
        </li>    
      </ul>
    </div>

    <div class="col center">
      <a href="#"><img src="dist/img/logoMiniMetLife.png" style="width: 30%;"></a>
    </div>

    <div class="col">
      <ul class="navbar-nav ml-auto pull-right">
          <a class="nav-link" href="#">
            <i class="fa fa-sign-out"></i>
          </a>
      </ul>
    </div>

  </nav>

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

          <div class="col-sm-12 col-md-4">
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
                    <a href="javascript:void(0)" onClick="openDadosFamiliares()" class="nav-link">
                      <i class="nav-icon fa fa-users"></i>
                      <p>
                        Dados Familiares
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="javascript:void(0)" onClick="openRendimentos()" class="nav-link">
                      <i class="nav-icon fa fa-dollar"></i>
                      <p>
                        Rendimentos
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="javascript:void(0)" onClick="openPatrimonio()" class="nav-link">
                      <i class="nav-icon fa fa-diamond"></i>
                      <p>
                        Patrimônio
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="javascript:void(0)" onClick="openEducacaoFilhos()" class="nav-link">
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
                    <a href="javascript:void(0)" onClick="openEmprestimos()" class="nav-link">
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

          <div class="col-sm-12 col-md-8" id="dados_cadastrais">
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">
                  Dados Cadastrais
                </h3>
              </div>
              <form role="form" method="post" action="{{url('/cadastro')}}" >
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" class="form-control" name="nome" id="dc_nome_completo" placeholder="Nome Completo">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>CPF</label>
                        <input type="text" class="form-control" name="cpf" id="exampleInputEmail1" placeholder="CPF">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Data Nascimento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                          <input type="text" class="form-control" name="data_nasc" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" im-insert="true">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Sexo</label>
                        <select class="form-control" name="sexo" >
                          <option>Masculino</option>
                          <option>Faminino</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Estado Cívil</label>
                        <select class="form-control" name="estado_civil" >
                          <option>Casado</option>
                          <option>Solteiro</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Endereço Residencial</label>
                        <input type="text" class="form-control" name="endereco" id="dc_endereco_resd" placeholder="Endereço Residencial">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="dc_email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control" name="celular" id="dc_celular" placeholder="Celular">
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

          <div class="col-sm-12 col-md-8 no-display" id="dados_familiares">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Dados Familiares
                </h3>
              </div>
              <form role="form">
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cônjuge</label>
                        <input type="text" class="form-control" name="nome_conjuge" id="df_conjuje" placeholder="Cônjuje">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Data Nascimento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                          <input type="text" class="form-control" name="data_conjuge" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" im-insert="true">
                        </div>
                      </div>
                    </div>                    
                  </div>

                  <div class="row">
                    <div class="col-md-12 border-bottom">
                      <h3>Filho(s) <button type="button" class="btn btn-sm btn-info addDivFilho">+</button></h3>
                    </div>
                  </div>

                  <div class="row" id="familiares_filhos">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Filho</label>
                        <input type="text" class="form-control" name="nome_filho" id="df_filho" placeholder="Filho">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Data Nascimento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>
                          <input type="text" class="form-control" name="data_filho" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" im-insert="true">
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-1">
                       <input type="button" value="-" class="btn btn-default remDivFilho" style="position: relative;top: 30px;"/>
                    </div>                   
                  </div>

                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary">Salvar</button>
                </div>

              </form>
            </div>
          </div>

          <div class="col-sm-12 col-md-8 no-display" id="rendimentos">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Rendimentos
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
                        <label>Rendimento Mensal</label>
                        <input type="text" class="form-control" id="ren_redimento_mensal_principal" placeholder="Nome Completo">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Outras Rendas</label>
                        <input type="text" class="form-control" id="ren_outras_principal" placeholder="Outras Rendas">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Declaração de IR</label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="completa">
                          <label class="form-check-label">Completa</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="simplificada">
                          <label class="form-check-label">Simplificada</label>
                        </div>


                      </div>
                    </div>                    
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12 border-bottom">
                      <h3>Cônjuje</h3>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Rendimento Mensal</label>
                        <input type="text" class="form-control" id="ren_redimento_mensal_conjuje" placeholder="Rendimento Mensal">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Outras Rendas</label>
                        <input type="text" class="form-control" id="ren_outras_conjuje" placeholder="Outras Rendas">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Declaração de IR</label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="completa">
                          <label class="form-check-label">Completa</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="simplificada">
                          <label class="form-check-label">Simplificada</label>
                        </div>

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

          <div class="col-sm-12 col-md-8 no-display" id="patrimonio">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Patrimônio
                </h3>
              </div>
              <form role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Imóveis</label>
                            <input type="text" class="form-control" id="patrim_imoveis" placeholder="Imóveis">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Fundos/Investimentos/Ações</label>
                            <input type="text" class="form-control" id="patrim_acoes" placeholder="Fundos/Investimentos/Ações">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Reservas/Poupança</label>
                            <input type="text" class="form-control" id="patrim_reservas" placeholder="Reservas/Poupança">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Outros <small>(veículos, participações, obras de arte, etc.)</small></label>
                            <input type="text" class="form-control" id="patrim_outros" placeholder="Outros">
                          </div>
                        </div>
                        <div class="col-md-12 border-top">
                            <label>Total </label><span class="pull-right">R$ 0,00</span>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Inventário</label>
                              <input type="text" class="form-control" id="patrim_inventario" placeholder="Inventário">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Emergência <small>(X de renda mensal)</small></label>
                              <input type="text" class="form-control" id="patrim_emergencia" placeholder="Emergência">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Funeral</label>
                              <input type="text" class="form-control" id="patrim_funaral" placeholder="Funeral">
                            </div>
                          </div>                      
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

          <div class="col-sm-12 col-md-8 no-display" id="educacao_filhos">
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

          <div class="col-sm-12 col-md-8 no-display" id="padrao_vida">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Padrão de Vida
                </h3>
              </div>
              <form role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="row">

                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alimentação</label>
                            <input type="text" class="form-control" id="pv_alimentacao" placeholder="Alimentação">
                          </div>
                        </div>      
                         <div class="col-md-12">
                          <div class="form-group">
                            <label>Moradia <small>(Aluguel/Condomínio)</small></label>
                            <input type="text" class="form-control" id="pv_moradia" placeholder="Moradia">
                          </div>
                        </div> 
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Serviços <small>(água, luz, telefone, gás)</small></label>
                            <input type="text" class="form-control" id="pv_servicos" placeholder="Serviços">
                          </div>
                        </div>  
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Transporte <small>(manuenteção,seguro)</small></label>
                            <input type="text" class="form-control" id="pv_transporte" placeholder="Serviços">
                          </div>
                        </div>  
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Saúde <small>(seguro, medicamentos, etc)</small></label>
                            <input type="text" class="form-control" id="pv_saude" placeholder="Serviços">
                          </div>
                        </div>             
                        
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Vestuário</label>
                            <input type="text" class="form-control" id="pv_vestuario" placeholder="Vestuário">
                          </div>
                        </div>      
                         <div class="col-md-12">
                          <div class="form-group">
                            <label>Seguro de Vida/Previdência</label>
                            <input type="text" class="form-control" id="pv_seguro_vida" placeholder="Seguro de Vida/Previdência">
                          </div>
                        </div> 
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Lazer </label>
                            <input type="text" class="form-control" id="pv_lazer" placeholder="Lazer">
                          </div>
                        </div>  
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Impostos <small>(IPTU, IPVA)</small></label>
                            <input type="text" class="form-control" id="pv_impostos" placeholder="Impostos">
                          </div>
                        </div>  
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Extras/Outros </label>
                            <input type="text" class="form-control" id="pv_extras" placeholder="Extras/Outros">
                          </div>
                        </div>  
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

          <div class="col-sm-12 col-md-8 no-display" id="emprestimos">
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
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Valor</label>
                        <input type="text" class="form-control" id="emp_valor" placeholder="Valor">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label>N°</label>
                        <input type="text" class="form-control" id="emp_num" placeholder="Nº">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Valor</label>
                        <input type="text" class="form-control" id="emp_valor2" placeholder="Valor">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label>Nº</label>
                        <input type="text" class="form-control" id="emp_num2" placeholder="Nº">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Valor</label>
                        <input type="text" class="form-control" id="emp_valor3" placeholder="Valor">
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
                          <div class="col-3"><span class="pull-right">R$ 0,00</span></div>
                          <div class="col-1"><span class="pull-right">0</span></div>
                          <div class="col-3"><span class="pull-right">R$ 0,00</span></div>
                          <div class="col-1"><span class="pull-right">0</span></div>
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

          <div class="col-sm-12 col-md-8 no-display" id="seguros_previdencias">
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
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>FGTS <small>Saldo Acum.</small></label>
                        <input type="text" class="form-control" id="plano_fgts_princial" placeholder="FGTS">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>INSS <small>Rensa Mensal</small></label>
                        <input type="text" class="form-control" id="plano_inss_princial" placeholder="INSS">
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
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Idade para Aposentadoria</label>
                        <input type="text" class="form-control" id="idade_aposentadoria_principal" placeholder="Idade para Aposentadoria">
                      </div>
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
                      <h3>Cônjuje</h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>FGTS <small>Saldo Acum.</small></label>
                        <input type="text" class="form-control" id="plano_fgts_conjuje" placeholder="FGTS">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>INSS <small>Rensa Mensal</small></label>
                        <input type="text" class="form-control" id="plano_inss_conjuje" placeholder="INSS">
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
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Idade para Aposentadoria</label>
                        <input type="text" class="form-control" id="idade_aposentadoria_conjuje" placeholder="Idade para Aposentadoria">
                      </div>
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

          <div class="col-sm-12 col-md-8 no-display" id="plano">
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
                        <td><b>Vitalício</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Compra de Capital</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Decrescente</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Temporário</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Doenças Graves</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Internação Hospitalar</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Ad. Invalidez acidental</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Ad. Morte Acidental</b></td>
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
                      <h3>Cônjuje</h3>
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
                        <td><b>Vitalício</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Compra de Capital</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Decrescente</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Temporário</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Doenças Graves</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Internação Hospitalar</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Ad. Invalidez acidental</b></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                        <td class="yellow-background"><input type="text" class="form-control"></td>
                      </tr>
                      <tr>
                        <td><b>Ad. Morte Acidental</b></td>
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> Copyright © <a href="https://www.metlife.com.br/">MetLife </a> 2019.</strong>
    Todos os direitos reservados.
  </footer>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/cadastro.js"></script>
</body>
</html>
