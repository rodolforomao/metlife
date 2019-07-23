@extends('layouts.master') 

@section('content')
<link rel="stylesheet" href="/dist/plugins/datatables/dataTables.bootstrap4.css">
<script language=javascript type="text/javascript">

    function newPopup(){
    jan = window.open('../relatorio/relatorio.html', 'jan', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=100, LEFT=left, WIDTH=800, HEIGHT=500');
    }
</script>

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datagridprincipal" class="table table-condensed table-hover table-striped center" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>IdUser</th>
                                            <th>Nomecompleto</th>
                                            <th>Cpf</th>
                                            <th>Datanascimento</th>
                                            <th>Sexo</th>
                                            <th>Estadocivil</th>
                                            <th>Enderecoresidencial</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th style="width:50px"></th>
                                            <th style="width:50px"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>          
            </div>
            <!--Botão flutuante-->
            <a href="{{ route('v2') }}" class="btn btn-primary floatButton">
                <b><i class="fa fa-plus"></i></b>
            </a>
    </section>
</div> 

<!-- jQuery -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/dist/plugins/datatables/jquery.dataTables.js"></script>
<script src="/dist/plugins/datatables/dataTables.bootstrap4.js"></script>


<script type="text/javascript">
    var theGrid = null;
    $(document).ready(function(){
    theGrid = $('#datagridprincipal').DataTable({
    "processing": true,
            "serverSide": true,
            "ordering": true,
            "responsive": true,
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros)",
                "sSearch": "Pesquisar: ",
                "oPaginate": {
                    "sFirst": "Início",
                    "sPrevious": "Anterior",
                    "sNext": "Próximo",
                    "sLast": "Último"
                }
            },
            "ajax": "{{url('dadoscadastrais/grid')}}",
            "columnDefs": [
            {
            "render": function (data, type, row) {
            return '<a href="{{ url(' / dadoscadastrais') }}/' + row[0] + '">' + data + '</a>';
            },
                    "targets": 1
            },
            {
            "render": function (data, type, row) {
            return '<a href="{{ url(' / dadoscadastrais') }}/' + row[0] + '/edit" class="btn btn-default">Update</a>';
            },
                    "targets": 12                    },
            {
            "render": function (data, type, row) {
            return '<a href="#" onclick="return doDelete(' + row[0] + ')" class="btn btn-danger">Delete</a>';
            },
                    "targets": 12 + 1
            },
            ]
    });
    });
    function doDelete(id) {
    if (confirm('You really want to delete this record?')) {
    $.ajax({ url: '{{ url(' / dadoscadastrais') }}/' + id, type: 'DELETE'}).success(function() {
    theGrid.ajax.reload();
    });
    }
    return false;
    }
</script>
@endsection
