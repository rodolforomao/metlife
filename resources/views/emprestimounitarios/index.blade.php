@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">{{ ucfirst('emprestimounitarios') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('emprestimounitarios') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="thegrid">
              <thead>
                <tr>
                                        <th>Id</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Idcliente</th>
                                        <th>Saldodevedor</th>
                                        <th>Possuiseguro</th>
                                        <th>Parcelamensal</th>
                                        <th>Prazoresidual</th>
                                        <th>Saldodevedordescoberto</th>
                                        <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <a href="{{url('emprestimounitarios/create')}}" class="btn btn-primary" role="button">Add emprestimounitario</a>
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
                "ajax": "{{url('emprestimounitarios/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/emprestimounitarios') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/emprestimounitarios') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 9                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 9+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/emprestimounitarios') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection