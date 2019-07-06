@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Inssprevidenciacliente</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Inssprevidenciacliente    </div>

    <div class="panel-body">
                

        <form action="{{ url('/inssprevidenciaclientes') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="created_at" class="col-sm-3 control-label">Created At</label>
            <div class="col-sm-6">
                <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
            <div class="col-sm-6">
                <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="idCliente" class="col-sm-3 control-label">IdCliente</label>
            <div class="col-sm-6">
                <input type="text" name="idCliente" id="idCliente" class="form-control" value="{{$model['idCliente'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="previdencia" class="col-sm-3 control-label">Previdencia</label>
            <div class="col-sm-6">
                <input type="text" name="previdencia" id="previdencia" class="form-control" value="{{$model['previdencia'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="pgblvgbl" class="col-sm-3 control-label">Pgblvgbl</label>
            <div class="col-sm-6">
                <input type="text" name="pgblvgbl" id="pgblvgbl" class="form-control" value="{{$model['pgblvgbl'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="saldoacumulado" class="col-sm-3 control-label">Saldoacumulado</label>
            <div class="col-sm-6">
                <input type="text" name="saldoacumulado" id="saldoacumulado" class="form-control" value="{{$model['saldoacumulado'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="contribuicaoanual" class="col-sm-3 control-label">Contribuicaoanual</label>
            <div class="col-sm-6">
                <input type="text" name="contribuicaoanual" id="contribuicaoanual" class="form-control" value="{{$model['contribuicaoanual'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/inssprevidenciaclientes') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection