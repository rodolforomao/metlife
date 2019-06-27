@extends('layouts.master') 
@section('content')

<!-- login css -->
<link rel="stylesheet" href="/dist/css/login.css"> 

<style>      
    .login-page, .register-page {
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-position: top;
        background-image:url(/dist/img/back.png);
        width: 100%;
        height: 100%;
        box-shadow: inset 0 0 2000px rgba(0, 0, 0, .8);
    }

</style>

<div class="login-page">
    <div class="box-login">      
        <div class="card-login">
            <div class="row align-items-center" style="min-height: 500px;">
                <div class="col-sm-12 col-md-6 border-right"> 
                    <img src="/dist/img/brazilian_color.png" style="width: 100%;">
                </div>
                <div class="col-sm-12 col-md-6">
                    <p class="text-muted">Acesse sua conta</p>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="fa fa-envelope input-group-text"></span> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span> @endif
                            </div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>                           
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="fa fa-lock input-group-text"></span> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> @endif
                            </div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>                            
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                            </div>
                        </div>
                        <div class="row">     
                            <div class="col-12">
                                <a href="#" style="font-size: 12px;">Esqueci minha senha.</a>
                            </div>
                            <div class="col-12 text-muted" style="font-size: 12px;">
                                Não tem uma conta? <a href="{{route('register')}}" >Registre-se</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection