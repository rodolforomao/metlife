@extends('crudgenerator::layouts.master')

@section('content')


<h2 class="page-header">Saldoemprestimo</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Saldoemprestimo    </div>

    <div class="panel-body">
                
        <form action="{{ url('/saldoemprestimos'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


                                    <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
                </div>
            </div>
                                                                                                                                                <div class="form-group">
                <label for="created_at" class="col-sm-3 control-label">Created At</label>
                <div class="col-sm-6">
                    <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
                <div class="col-sm-6">
                    <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}">
                </div>
            </div>
                                                                        <div class="form-group">
                <label for="idcliente" class="col-sm-3 control-label">Idcliente</label>
                <div class="col-sm-2">
                    <input type="number" name="idcliente" id="idcliente" class="form-control" value="{{$model['idcliente'] or ''}}">
                </div>
            </div>
                                                                                    <div class="form-group">
                <label for="descoberto" class="col-sm-3 control-label">Descoberto</label>
                <div class="col-sm-6">
                    <input type="text" name="descoberto" id="descoberto" class="form-control" value="{{$model['descoberto'] or ''}}">
                </div>
            </div>
                                                                                                <div class="form-group">
                <label for="maiorperiodo" class="col-sm-3 control-label">Maiorperiodo</label>
                <div class="col-sm-6">
                    <input type="text" name="maiorperiodo" id="maiorperiodo" class="form-control" value="{{$model['maiorperiodo'] or ''}}">
                </div>
            </div>
                                                            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/saldoemprestimos') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection