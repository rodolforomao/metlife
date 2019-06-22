@extends('layouts/app')
@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
                <th>Estado Civil</th>
                <th>Endereço</th>
                <th>E-mail</th>
                <th>Celular</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dados as $dado)
            <tr>
                <td>{{$dado['id']}}</td>
                <td>{{$dado['nome']}}</td>
                <td>{{$dado['cpf']}}</td>
                <td>{{$dado['dat_nasc']}}</td>
                <td>{{$dado['sexo']}}</td>
                <td>{{$dado['estado_civil']}}</td>
                <td>{{$dado['endereco']}}</td>
                <td>{{$dado['email']}}</td>
                <td>{{$dado['celular']}}</td>
                <td><a href="{{action('DadosCadastraisController@edit', $dado['id'])}}" class="btn btn-warning">Editar</a></td>
        <td><a href="{{action('DadosCadastraisController@destroy', $dado['id'])}}" class="btn btn-danger">Apagar</a></td>
      </tr>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection