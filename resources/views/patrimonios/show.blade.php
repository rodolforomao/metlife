@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Patrimonio</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Patrimonio    </div>

    <div class="panel-body">
                

        <form action="{{ url('/patrimonios') }}" method="POST" class="form-horizontal">


                
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
            <label for="fundos" class="col-sm-3 control-label">Fundos</label>
            <div class="col-sm-6">
                <input type="text" name="fundos" id="fundos" class="form-control" value="{{$model['fundos'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="reservas" class="col-sm-3 control-label">Reservas</label>
            <div class="col-sm-6">
                <input type="text" name="reservas" id="reservas" class="form-control" value="{{$model['reservas'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="inventario" class="col-sm-3 control-label">Inventario</label>
            <div class="col-sm-6">
                <input type="text" name="inventario" id="inventario" class="form-control" value="{{$model['inventario'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="emergencia" class="col-sm-3 control-label">Emergencia</label>
            <div class="col-sm-6">
                <input type="text" name="emergencia" id="emergencia" class="form-control" value="{{$model['emergencia'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="funeral" class="col-sm-3 control-label">Funeral</label>
            <div class="col-sm-6">
                <input type="text" name="funeral" id="funeral" class="form-control" value="{{$model['funeral'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="outros" class="col-sm-3 control-label">Outros</label>
            <div class="col-sm-6">
                <input type="text" name="outros" id="outros" class="form-control" value="{{$model['outros'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="total" class="col-sm-3 control-label">Total</label>
            <div class="col-sm-6">
                <input type="text" name="total" id="total" class="form-control" value="{{$model['total'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="imoveis" class="col-sm-3 control-label">Imoveis</label>
            <div class="col-sm-6">
                <input type="text" name="imoveis" id="imoveis" class="form-control" value="{{$model['imoveis'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/patrimonios') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection