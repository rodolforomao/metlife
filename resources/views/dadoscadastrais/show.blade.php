@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Dadoscadastrai</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Dadoscadastrai    </div>

    <div class="panel-body">
                

        <form action="{{ url('/dadoscadastrais') }}" method="POST" class="form-horizontal">


                
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
            <label for="nomecompleto" class="col-sm-3 control-label">Nomecompleto</label>
            <div class="col-sm-6">
                <input type="text" name="nomecompleto" id="nomecompleto" class="form-control" value="{{$model['nomecompleto'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="cpf" class="col-sm-3 control-label">Cpf</label>
            <div class="col-sm-6">
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{$model['cpf'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="datanascimento" class="col-sm-3 control-label">Datanascimento</label>
            <div class="col-sm-6">
                <input type="text" name="datanascimento" id="datanascimento" class="form-control" value="{{$model['datanascimento'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="sexo" class="col-sm-3 control-label">Sexo</label>
            <div class="col-sm-6">
                <input type="text" name="sexo" id="sexo" class="form-control" value="{{$model['sexo'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="estadocivil" class="col-sm-3 control-label">Estadocivil</label>
            <div class="col-sm-6">
                <input type="text" name="estadocivil" id="estadocivil" class="form-control" value="{{$model['estadocivil'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="enderecoresidencial" class="col-sm-3 control-label">Enderecoresidencial</label>
            <div class="col-sm-6">
                <input type="text" name="enderecoresidencial" id="enderecoresidencial" class="form-control" value="{{$model['enderecoresidencial'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
                <input type="text" name="email" id="email" class="form-control" value="{{$model['email'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="celular" class="col-sm-3 control-label">Celular</label>
            <div class="col-sm-6">
                <input type="text" name="celular" id="celular" class="form-control" value="{{$model['celular'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/dadoscadastrais') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection