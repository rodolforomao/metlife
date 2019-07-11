@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Insssegurocliente</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Insssegurocliente    </div>

    <div class="panel-body">
                

        <form action="{{ url('/inssseguroclientes') }}" method="POST" class="form-horizontal">


                
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
            <label for="tipoFamiliar" class="col-sm-3 control-label">TipoFamiliar</label>
            <div class="col-sm-6">
                <input type="text" name="tipoFamiliar" id="tipoFamiliar" class="form-control" value="{{$model['tipoFamiliar'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="segurodevida" class="col-sm-3 control-label">Segurodevida</label>
            <div class="col-sm-6">
                <input type="text" name="segurodevida" id="segurodevida" class="form-control" value="{{$model['segurodevida'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="capitalsegurado" class="col-sm-3 control-label">Capitalsegurado</label>
            <div class="col-sm-6">
                <input type="text" name="capitalsegurado" id="capitalsegurado" class="form-control" value="{{$model['capitalsegurado'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="premiomensal" class="col-sm-3 control-label">Premiomensal</label>
            <div class="col-sm-6">
                <input type="text" name="premiomensal" id="premiomensal" class="form-control" value="{{$model['premiomensal'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/inssseguroclientes') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection