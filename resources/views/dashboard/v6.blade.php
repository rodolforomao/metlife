@extends('layouts.master') 
@section('content')

    <link rel="stylesheet" href="/dist/plugins/datatables/dataTables.bootstrap4.css">
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
                            <li class="breadcrumb-item active">Clientes</li>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-hover table-striped center" style="width: 100%;" id="tableUsuarios">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Cliente</th>
                                                <th>Data de Cadastro</th>
                                                <th>Editar</th>
                                                <th>Relatório</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>          
                </div>
        </section>
    </div>
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <script src="/dist/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/dist/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function () {
            $('#tableUsuarios').dataTable({
                "bProcessing": false,
                "bFilter": true,
                "bInfo": true,
                "bLengthChange": false,
                "bPaginate": true,
                "destroy": true,
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por página",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                    "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sSearch": "Pesquisar: ",
                    "pageLength": 10,
                    "oPaginate": {
                        "sFirst": "Início",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                },
                "sAjaxSource": "{{ url('dashboard/cadastrados') }}",
                "aoColumns": [
                    {data: 'id', "sClass": "text-center"},
                    {data: 'cliente', "sClass": "text-center"},
                    {data: 'dataCadastro', "sClass": "text-center"},
                    {data: 'editar', "sClass": "text-center"},
                    {data: 'relatorio', "sClass": "text-center"}
                ]
            });
        });
    </script>
@endsection