<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Inicio</title>
    <script src="https://kit.fontawesome.com/ddbd74d450.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="menu_side" id="menuSide">
        <div class="menu_side_part1">
            <div class="hamburguer" onclick="toggleMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="hamburguer2">
                <img src="{{ asset('assets/image/code_logo.png') }}" alt="si">
            </div>
            <div class="option" title="Inicio">
                <a href="{{ route('start') }}">
                    <i class="fa-solid fa-house "></i></br>
                    <p class="option2">Inicio</p>
                    <h4 id="calendario">Inicio</h4>
                </a>
            </div>
            
        </div>
        <div class="menu_side_part2">
            <div class="option" title="Cerrar Sesion">
                <a href="{{ route('logout') }}">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <h4>Cerrar Sesión</h4>
                </a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="section_1">
            <p class="welcome">Bienvenido &nbsp;</p>
            <p>
                @if (auth()->check())
                    {{ auth()->user()->name }}
                    {{ auth()->user()->last_name }}
                @endif
            </p>
        </div>
        <div class="section_2">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/submenu.js') }}"></script>
</body>
</html>
