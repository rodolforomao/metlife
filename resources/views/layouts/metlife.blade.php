<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Metlife</title>
</head>
<body>
    <aside class="navbar-aside">
        <div class="card">
            <div class="card-header">
                <h6>Cadastro</h6>
            </div>
            <div class="card-body">
                <div class="list-group"> 
                    <a href="#" class="list-group-item list-group-item-action active">Dados Cadastrais</a>
                    <a href="#" class="list-group-item list-group-item-action">Dados Familiares</a>
                    <a href="#" class="list-group-item list-group-item-action">Rendimentos</a>
                    <a href="#" class="list-group-item list-group-item-action">Patrimônio</a>
                    <a href="#" class="list-group-item list-group-item-action">Educação dos Filhos</a>
                    <a href="#" class="list-group-item list-group-item-action">Padrão de Vida</a>
                    <a href="#" class="list-group-item list-group-item-action">Empréstrimos</a>
                    <a href="#" class="list-group-item list-group-item-action">Seguros e Previdências</a>
                    <a href="#" class="list-group-item list-group-item-action">Plano</a>
                </div>
            </div>
        </div>
    </aside>
        @hasSection('body')
            @yield('body')
        @endif
        
        <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>