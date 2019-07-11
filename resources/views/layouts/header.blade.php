<style>
    
@media (max-width: 767px) {
    .navbar-nav {
        display: inline !important;
    }
}

</style>
<nav class="row main-header navbar navbar-expand bg-white navbar-light border-bottom">  
    <div class="col">
        <ul class="navbar-nav">
            <li class="nav-item d-sm-inline-block">
              <a href="{{ route('home') }}" class="nav-link">Usuários</a>
            </li>  
            <li class="nav-item d-sm-inline-block">
              <a href="{{ route('v2') }}" class="nav-link">Cadastro</a>
            </li>               
        </ul>
    </div>
    <div class="col center">
        <img src="/dist/img/logoMiniMetLife.png" style="width: 150px;">
    </div>
    <div class="col">
        <ul class="navbar-nav ml-auto pull-right">
            <span style="top: 8px; position: relative;">{{auth()->user()->name!=null ? auth()->user()->name : "Administrator"}} </span>
            <a class="nav-link" href="{{ route('logout') }}">
                <i class="fa fa-sign-out"></i>
            </a>
        </ul>
    </div>
</nav>