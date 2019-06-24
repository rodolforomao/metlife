@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Conjugefilho</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Conjugefilho    </div>

    <div class="panel-body">
                

        <form action="{{ url('/conjugefilhos') }}" method="POST" class="form-horizontal">


                
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
            <label for="idconjuge" class="col-sm-3 control-label">Idconjuge</label>
            <div class="col-sm-6">
                <input type="text" name="idconjuge" id="idconjuge" class="form-control" value="{{$model['idconjuge'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="filho" class="col-sm-3 control-label">Filho</label>
            <div class="col-sm-6">
                <input type="text" name="filho" id="filho" class="form-control" value="{{$model['filho'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/conjugefilhos') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection