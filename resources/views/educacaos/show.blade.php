@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Educacao</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Educacao    </div>

    <div class="panel-body">
                

        <form action="{{ url('/educacaos') }}" method="POST" class="form-horizontal">


                
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
            <label for="idadeserie" class="col-sm-3 control-label">Idadeserie</label>
            <div class="col-sm-6">
                <input type="text" name="idadeserie" id="idadeserie" class="form-control" value="{{$model['idadeserie'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="totaldeanosparaformacao" class="col-sm-3 control-label">Totaldeanosparaformacao</label>
            <div class="col-sm-6">
                <input type="text" name="totaldeanosparaformacao" id="totaldeanosparaformacao" class="form-control" value="{{$model['totaldeanosparaformacao'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="basico" class="col-sm-3 control-label">Basico</label>
            <div class="col-sm-6">
                <input type="text" name="basico" id="basico" class="form-control" value="{{$model['basico'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="custo2" class="col-sm-3 control-label">Custo2</label>
            <div class="col-sm-6">
                <input type="text" name="custo2" id="custo2" class="form-control" value="{{$model['custo2'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="anos2" class="col-sm-3 control-label">Anos2</label>
            <div class="col-sm-6">
                <input type="text" name="anos2" id="anos2" class="form-control" value="{{$model['anos2'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="total2" class="col-sm-3 control-label">Total2</label>
            <div class="col-sm-6">
                <input type="text" name="total2" id="total2" class="form-control" value="{{$model['total2'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="fundamental3anos" class="col-sm-3 control-label">Fundamental3anos</label>
            <div class="col-sm-6">
                <input type="text" name="fundamental3anos" id="fundamental3anos" class="form-control" value="{{$model['fundamental3anos'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="filho" class="col-sm-3 control-label">Filho</label>
            <div class="col-sm-6">
                <input type="text" name="filho" id="filho" class="form-control" value="{{$model['filho'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="custo3" class="col-sm-3 control-label">Custo3</label>
            <div class="col-sm-6">
                <input type="text" name="custo3" id="custo3" class="form-control" value="{{$model['custo3'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="anos3" class="col-sm-3 control-label">Anos3</label>
            <div class="col-sm-6">
                <input type="text" name="anos3" id="anos3" class="form-control" value="{{$model['anos3'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="total3" class="col-sm-3 control-label">Total3</label>
            <div class="col-sm-6">
                <input type="text" name="total3" id="total3" class="form-control" value="{{$model['total3'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="superior4a5anos" class="col-sm-3 control-label">Superior4a5anos</label>
            <div class="col-sm-6">
                <input type="text" name="superior4a5anos" id="superior4a5anos" class="form-control" value="{{$model['superior4a5anos'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="custo4" class="col-sm-3 control-label">Custo4</label>
            <div class="col-sm-6">
                <input type="text" name="custo4" id="custo4" class="form-control" value="{{$model['custo4'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="anos4" class="col-sm-3 control-label">Anos4</label>
            <div class="col-sm-6">
                <input type="text" name="anos4" id="anos4" class="form-control" value="{{$model['anos4'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="total4" class="col-sm-3 control-label">Total4</label>
            <div class="col-sm-6">
                <input type="text" name="total4" id="total4" class="form-control" value="{{$model['total4'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="infantil" class="col-sm-3 control-label">Infantil</label>
            <div class="col-sm-6">
                <input type="text" name="infantil" id="infantil" class="form-control" value="{{$model['infantil'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="custo1" class="col-sm-3 control-label">Custo1</label>
            <div class="col-sm-6">
                <input type="text" name="custo1" id="custo1" class="form-control" value="{{$model['custo1'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="anos1" class="col-sm-3 control-label">Anos1</label>
            <div class="col-sm-6">
                <input type="text" name="anos1" id="anos1" class="form-control" value="{{$model['anos1'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="total1" class="col-sm-3 control-label">Total1</label>
            <div class="col-sm-6">
                <input type="text" name="total1" id="total1" class="form-control" value="{{$model['total1'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/educacaos') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection