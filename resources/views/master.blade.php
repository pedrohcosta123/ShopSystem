<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-left">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('home')}}">Home</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div style="margin-left: 40%">
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Sair 
                            </a>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="main">
    <div class="menu menu-open">
        <ul>
            <li class="visible-xs"><a href="{{ route('logout')}}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Sair</a>
            </li>
            <ul>
                <li class='active'><a>Venda</a></li>

            </ul>
            <ul>
                <li class='active'><a>Cadastro de Clientes</a></li>

            </ul>
            <ul>
                <li class='active'><a href="{{route('estoque')}}">Estoque</a></li>

            </ul>
            <ul>
                <li class='active'><a href="{{route('categoria')}}">Categorias</a></li>

            </ul> 
            <ul>
                <li class='active' onclick="abrir()">
                    <a>Administração <span style="margin-left: 50%; padding-left: 1%" class="caret"></span></a>
                </li>
                <div id="1" style="display:none" >
                    <li>
                        <a href="{{route('perfiluser')}}">Usuários</a>
                    </li>

                    <li>
                        <a href="{{route('perfil')}}">Perfil</a>
                    </li>                    
                    
                </div>
            </ul>
        </ul>
    </div>
    <div class="content">
        
        @yield('content')

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    function abrir(){
        var id = document.getElementById('1');

        if(id.style.display == 'block'){
            id.style.display = 'none';
        }
        else{
            id.style.display = 'block';
        }

    };
</script>
</body>
</html>
