<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Inventario de Equipos informáticos de FIMACA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
	<!-- Icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('FIMACA') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro de Usuarios') }}</a>
                                </li>
                            @endif
                        @else
							<a class="nav-link" href="/home">{{ __('Inicio') }}</a>
							<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Registros') }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">									
										<a class="dropdown-item" href="{{ route('InventariosRegister') }}">{{ __('Inventarios') }}</a>
										<a class="dropdown-item" href="{{ route('MarcasRegister') }}">{{ __('Marcas') }}</a>
										<a class="dropdown-item" href="{{ route('TiposRegister') }}">{{ __('Tipos') }}</a>
										<a class="dropdown-item" href="{{ route('UbicacionesRegister') }}">{{ __('Ubicaciones o Departamentos') }}</a>
										@if( Auth::user()->administrator == 'Sí' )
											<a class="dropdown-item" href="{{ route('register') }}">{{ __('Usuarios') }}</a>
										@endif
                                </div>
                            </li>
							<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Listas') }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a id="" class="nav-link" href="{{ route('InventariosList') }}" role="button">{{ __('Inventarios') }}</a>
										<a id="" class="nav-link" href="{{ route('MarcasList') }}" role="button">{{ __('Marcas') }}</a>
										<a id="" class="nav-link" href="{{ route('TiposList') }}" role="button">{{ __('Tipos') }}</a>
										<a id="" class="nav-link" href="{{ route('UbicacionesList') }}" role="button">{{ __('Ubicaciones o Departamentos') }}</a>
										@if(Auth::user()->administrator == 'Sí')
											<a id="" class="nav-link" href="{{ route('UsersList') }}" role="button">{{ __('Usuarios') }}</a>
										@endif
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a id="" class="nav-link" href="{{ route('PasswordChange') }}" role="button">{{ __('Cambiar Contraseña') }}</a>
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Desconectarme') }}
                                    </a>
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
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>