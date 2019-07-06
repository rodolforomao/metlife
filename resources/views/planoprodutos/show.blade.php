@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Planoproduto</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Planoproduto    </div>

    <div class="panel-body">
                

        <form action="{{ url('/planoprodutos') }}" method="POST" class="form-horizontal">


                
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
            <label for="idproduto" class="col-sm-3 control-label">Idproduto</label>
            <div class="col-sm-6">
                <input type="text" name="idproduto" id="idproduto" class="form-control" value="{{$model['idproduto'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="vigencia" class="col-sm-3 control-label">Vigencia</label>
            <div class="col-sm-6">
                <input type="text" name="vigencia" id="vigencia" class="form-control" value="{{$model['vigencia'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="prazo" class="col-sm-3 control-label">Prazo</label>
            <div class="col-sm-6">
                <input type="text" name="prazo" id="prazo" class="form-control" value="{{$model['prazo'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="capital" class="col-sm-3 control-label">Capital</label>
            <div class="col-sm-6">
                <input type="text" name="capital" id="capital" class="form-control" value="{{$model['capital'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="segurado" class="col-sm-3 control-label">Segurado</label>
            <div class="col-sm-6">
                <input type="text" name="segurado" id="segurado" class="form-control" value="{{$model['segurado'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="valor" class="col-sm-3 control-label">Valor</label>
            <div class="col-sm-6">
                <input type="text" name="valor" id="valor" class="form-control" value="{{$model['valor'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/planoprodutos') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection