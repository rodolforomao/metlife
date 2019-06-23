@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Emprestimo</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Emprestimo    </div>

    <div class="panel-body">
                

        <form action="{{ url('/emprestimos') }}" method="POST" class="form-horizontal">


                
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
            <label for="maiorperiodoparaemprestimofinananos" class="col-sm-3 control-label">Maiorperiodoparaemprestimofinananos</label>
            <div class="col-sm-6">
                <input type="text" name="maiorperiodoparaemprestimofinananos" id="maiorperiodoparaemprestimofinananos" class="form-control" value="{{$model['maiorperiodoparaemprestimofinananos'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="emprestimos" class="col-sm-3 control-label">Emprestimos</label>
            <div class="col-sm-6">
                <input type="text" name="emprestimos" id="emprestimos" class="form-control" value="{{$model['emprestimos'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="valor3" class="col-sm-3 control-label">Valor3</label>
            <div class="col-sm-6">
                <input type="text" name="valor3" id="valor3" class="form-control" value="{{$model['valor3'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="descobertoemprestimofinanciamento" class="col-sm-3 control-label">Descobertoemprestimofinanciamento</label>
            <div class="col-sm-6">
                <input type="text" name="descobertoemprestimofinanciamento" id="descobertoemprestimofinanciamento" class="form-control" value="{{$model['descobertoemprestimofinanciamento'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="valor1" class="col-sm-3 control-label">Valor1</label>
            <div class="col-sm-6">
                <input type="text" name="valor1" id="valor1" class="form-control" value="{{$model['valor1'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="n1" class="col-sm-3 control-label">N1</label>
            <div class="col-sm-6">
                <input type="text" name="n1" id="n1" class="form-control" value="{{$model['n1'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="valor2" class="col-sm-3 control-label">Valor2</label>
            <div class="col-sm-6">
                <input type="text" name="valor2" id="valor2" class="form-control" value="{{$model['valor2'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="n2" class="col-sm-3 control-label">N2</label>
            <div class="col-sm-6">
                <input type="text" name="n2" id="n2" class="form-control" value="{{$model['n2'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/emprestimos') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection