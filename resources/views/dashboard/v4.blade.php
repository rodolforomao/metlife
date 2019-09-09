@extends('layouts.master') 
@section('content')
    <!-- Date Picker -->
    <link rel="stylesheet" href="/dist/plugins/datepicker/datepicker3.css">

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div> -->
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">AB Fone</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex p-0 no-border">
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Clientes</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Cadastro</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <table id="" class="table table-condensed table-hover table-striped center" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Nome</th>
                                                            <th>Telefone</th>
                                                            <th style="width:50px"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Gabriel Omami</td>
                                                            <td>(61) 9999-9999</td>
                                                            <td> <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Gabriel Omami</td>
                                                            <td>(61) 9999-9999</td>
                                                            <td> <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Gabriel Omami</td>
                                                            <td>(61) 9999-9999</td>
                                                            <td> <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Gabriel Omami</td>
                                                            <td>(61) 9999-9999</td>
                                                            <td> <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Gabriel Omami</td>
                                                            <td>(61) 9999-9999</td>
                                                            <td> <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Gabriel Omami</td>
                                                            <td>(61) 9999-9999</td>
                                                            <td> <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button></td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Gabriel Omami</td>
                                                            <td>(61) 9999-9999</td>
                                                           <td> <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="graf_ligacoes" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_2">

                                        <div class="row" style="background: #f4f6f9;padding: 15px 20px; margin-bottom: 10px;">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nome</label>
                                                    <input type="text" class="form-control" id="" placeholder="Nome">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Telefone</label>
                                                    <input type="text" class="form-control" id="" placeholder="Telefone">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Indicação</label>
                                                    <input type="text" class="form-control" id="" placeholder="Indicação">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary btn-sm btn-block" style="margin-top: 35px;">Salvar</button>
                                            </div>
                                        </div>
                                        <table id="" class="table table-condensed table-hover table-striped center" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nome</th>
                                                    <th>Telefone</th>
                                                    <th>Indicação</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Gabriel Omami</td>
                                                    <td>(61) 9999-9999</td>
                                                    <td>Anna Carolina</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button>
                                                            <button class="btn btn-default btn-sm"><i class="fa fa-close"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Maria Antônia</td>
                                                    <td>(61) 9999-9999</td>
                                                    <td>Anna Carolina</td>
                                                    <td>
                                                        <div class="btn-group">
                                                             <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button>
                                                            <button class="btn btn-default btn-sm"><i class="fa fa-close"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>João Silva</td>
                                                    <td>(61) 9999-9999</td>
                                                    <td>Anna Carolina</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-default btn-sm" id="datepicker"><i class="fa fa-calendar"></i></button>
                                                            <button class="btn btn-default btn-sm"><i class="fa fa-close"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 

    <!-- jQuery -->
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/dist/plugins/Highcharts-7.1.2/code/Highcharts.js"></script>

    <!-- datepicker -->
    <script src="/dist/plugins/datepicker/bootstrap-datepicker.js"></script>

    </body>
    </html>

    <script type="text/javascript">

        $( "#datepicker" ).datepicker({
            showOn: "button",
            buttonText: "datepicker"
        });

       // Build the chart
        Highcharts.chart('graf_ligacoes', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: null
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            credits: {
                        enabled: false
                    },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Atendida',
                    y: 45.41,
                    sliced: true,
                    selected: true,
                    color: '#28a745'
                }, {
                    name: 'Remarcados',
                    y: 15.84
                }, {
                    name: 'Não Marcados',
                    y: 11.88
                }, {
                    name: 'Não Atendida',
                    y: 11.84
                }, {
                    name: 'Potencial',
                    y: 8.65
                }, {
                    name: 'Idiotas',
                    y: 3.5
                }]
            }]
        });
    </script>

@endsection