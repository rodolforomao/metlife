@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">PadraoDeVida {{ $padraodevida->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/padrao-de-vida') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/padrao-de-vida/' . $padraodevida->id . '/edit') }}" title="Edit PadraoDeVida"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('padraodevida' . '/' . $padraodevida->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete PadraoDeVida" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $padraodevida->id }}</td>
                                    </tr>
                                    <tr><th> Moradia </th><td> {{ $padraodevida->moradia }} </td></tr><tr><th> Servicos </th><td> {{ $padraodevida->servicos }} </td></tr><tr><th> Transporte </th><td> {{ $padraodevida->transporte }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
