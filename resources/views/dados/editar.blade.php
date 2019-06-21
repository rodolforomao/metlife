@extends('master')
@section('content')
<div class="container">
  <form method="post" action="{{action('DadosCadasrtaisController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="PATCH">
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Atualizar Dados</label>
        <div class="col-sm-10">
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$dados->nome}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Nome" name="nome">
        </div>
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$dados->cpf}}</label>
        <div class="col-sm-10">
            <input type="number" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="CPF" name="cpf">
        </div>
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$dados->data_nasc}}</label>
        <div class="col-sm-10">
            <input type="date" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Data de Nascimento" name="data_nasc">
        </div>
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$dados->sexo}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Sexo" name="sexo">
        </div>
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$dados->estado_civil}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Estado Civil" name="estado_civil">
        </div>
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$dados->endereco}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Endereço" name="endereco">
        </div>
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$dados->email}}</label>
        <div class="col-sm-10">
            <input type="email" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Email" name="email">
        </div>
        <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$dados->celular}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Celular" name="celular">
        </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Atualizar Dados</button>
    </div>
  </form>
</div>
@endsection