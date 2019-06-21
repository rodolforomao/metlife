@extends('master')
@section('content')
<div class="container">
    <form method="post" action="{{url('dados/add')}}">
        <div class="form-group row">
            {{csrf_field()}}
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Nome"
                    name="nome">
            </div>
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">CPF</label>
            <div class="col-sm-10">
                <input type="number" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="CPF"
                    name="cpf">
            </div>
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Data de Nascimento</label>
            <div class="col-sm-10">
                <input type="date" class="form-control form-control-lg" id="lgFormGroupInput"
                    placeholder="Data de Nascimento" name="data_nasc">
            </div>
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Sexo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Sexo"
                    name="sexo">
            </div>
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Estado Civil</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Estado Civil"
                    name="estado_civil">
            </div>
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Endereço</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Endereço"
                    name="endereco">
            </div>
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Email"
                    name="email">
            </div>
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Celular</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Celular"
                    name="celular">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2"></div>
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection