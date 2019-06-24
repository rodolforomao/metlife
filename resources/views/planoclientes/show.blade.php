@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Planocliente</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Planocliente    </div>

    <div class="panel-body">
                

        <form action="{{ url('/planoclientes') }}" method="POST" class="form-horizontal">


                
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
            <label for="idUser" class="col-sm-3 control-label">IdUser</label>
            <div class="col-sm-6">
                <input type="text" name="idUser" id="idUser" class="form-control" value="{{$model['idUser'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="nome" class="col-sm-3 control-label">Nome</label>
            <div class="col-sm-6">
                <input type="text" name="nome" id="nome" class="form-control" value="{{$model['nome'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="risco" class="col-sm-3 control-label">Risco</label>
            <div class="col-sm-6">
                <input type="text" name="risco" id="risco" class="form-control" value="{{$model['risco'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="cpf" class="col-sm-3 control-label">Cpf</label>
            <div class="col-sm-6">
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{$model['cpf'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="sexo" class="col-sm-3 control-label">Sexo</label>
            <div class="col-sm-6">
                <input type="text" name="sexo" id="sexo" class="form-control" value="{{$model['sexo'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="nascimento" class="col-sm-3 control-label">Nascimento</label>
            <div class="col-sm-6">
                <input type="text" name="nascimento" id="nascimento" class="form-control" value="{{$model['nascimento'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/planoclientes') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection