@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Emprestimounitario</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Emprestimounitario    </div>

    <div class="panel-body">
                

        <form action="{{ url('/emprestimounitarios') }}" method="POST" class="form-horizontal">


                
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
            <label for="idcliente" class="col-sm-3 control-label">Idcliente</label>
            <div class="col-sm-6">
                <input type="text" name="idcliente" id="idcliente" class="form-control" value="{{$model['idcliente'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="saldodevedor" class="col-sm-3 control-label">Saldodevedor</label>
            <div class="col-sm-6">
                <input type="text" name="saldodevedor" id="saldodevedor" class="form-control" value="{{$model['saldodevedor'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="possuiseguro" class="col-sm-3 control-label">Possuiseguro</label>
            <div class="col-sm-6">
                <input type="text" name="possuiseguro" id="possuiseguro" class="form-control" value="{{$model['possuiseguro'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="parcelamensal" class="col-sm-3 control-label">Parcelamensal</label>
            <div class="col-sm-6">
                <input type="text" name="parcelamensal" id="parcelamensal" class="form-control" value="{{$model['parcelamensal'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="prazoresidual" class="col-sm-3 control-label">Prazoresidual</label>
            <div class="col-sm-6">
                <input type="text" name="prazoresidual" id="prazoresidual" class="form-control" value="{{$model['prazoresidual'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="saldodevedordescoberto" class="col-sm-3 control-label">Saldodevedordescoberto</label>
            <div class="col-sm-6">
                <input type="text" name="saldodevedordescoberto" id="saldodevedordescoberto" class="form-control" value="{{$model['saldodevedordescoberto'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/emprestimounitarios') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection