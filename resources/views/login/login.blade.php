<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/style_login.css') }}">
        <script src="https://kit.fontawesome.com/ddbd74d450.js" crossorigin="anonymous"></script>
        <title>Inicio Sesion</title>
    </head>
    <body>
        <div class="login-container">
            <img src="{{ asset('assets/image/code.png') }}">
            <form action="{{ route('autenticacion') }}" method="post">
            @csrf
            <div class="login-input-container">
                <label for="email">Usuario:</label><br>
                <input type="text" id="email" name="email"><br>

                <label for="password">Contraseña:</label></br>
                <input type="password" id="password" name="password"><br>
                <div class="login-button-container">
                    <button type="submit">Ingresar</button>
                </div>
                <div class="login-a-container">
                    <a href="{{ route('recovery_before')}}">¿Olvidaste tu contraseña?</a><br>
                    <a href="{{ route('register')}}">¿No tienes Cuenta? Registrate</a>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>
