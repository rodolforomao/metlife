@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Dadosfamiliare</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Dadosfamiliare    </div>

    <div class="panel-body">
                

        <form action="{{ url('/dadosfamiliares') }}" method="POST" class="form-horizontal">


                
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
            <label for="nome" class="col-sm-3 control-label">Nome</label>
            <div class="col-sm-6">
                <input type="text" name="nome" id="nome" class="form-control" value="{{$model['nome'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="datanascimento" class="col-sm-3 control-label">Datanascimento</label>
            <div class="col-sm-6">
                <input type="text" name="datanascimento" id="datanascimento" class="form-control" value="{{$model['datanascimento'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/dadosfamiliares') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection