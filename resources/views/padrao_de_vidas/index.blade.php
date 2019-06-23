@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">{{ ucfirst('padrao_de_vidas') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('padrao_de_vidas') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Moradia</th>
                                        <th>Servicos</th>
                                        <th>Transporte</th>
                                        <th>Saude</th>
                                        <th>Vestuario</th>
                                        <th>SeguroDeVidaPrevidencia</th>
                                        <th>Lazer</th>
                                        <th>Alimentacao</th>
                                        <th>Impostos</th>
                                        <th>Extrasoutros</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <a href="{{url('padrao_de_vidas/create')}}" class="btn btn-primary" role="button">Add padrao_de_vida</a>
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
                "ajax": "{{url('padrao_de_vidas/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/padrao_de_vidas') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/padrao_de_vidas') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 13                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 13+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/padrao_de_vidas') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection