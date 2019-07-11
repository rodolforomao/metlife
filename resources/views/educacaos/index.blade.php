@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">{{ ucfirst('educacaos') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('educacaos') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>IdCliente</th>
                                        <th>Apelidofilho</th>
                                        <th>Idadeserie</th>
                                        <th>Totaldeanosparaformacao</th>
                                        <th>Basico</th>
                                        <th>Custo2</th>
                                        <th>Anos2</th>
                                        <th>Total2</th>
                                        <th>Fundamental3anos</th>
                                        <th>Custo3</th>
                                        <th>Anos3</th>
                                        <th>Total3</th>
                                        <th>Superior4a5anos</th>
                                        <th>Custo4</th>
                                        <th>Anos4</th>
                                        <th>Total4</th>
                                        <th>Infantil</th>
                                        <th>Custo1</th>
                                        <th>Anos1</th>
                                        <th>Total1</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <a href="{{url('educacaos/create')}}" class="btn btn-primary" role="button">Add educacao</a>
    </div>
</div>




@endsection



@section('scripts')
    <script type="text/javascript">
        var theGrid = null;
        $(document).ready(function(){
            theGrid = $('#thegrid').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "responsive": true,
                "ajax": "{{url('educacaos/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/educacaos') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/educacaos') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 23                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 23+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/educacaos') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection