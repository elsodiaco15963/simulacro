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
                <i class="fa-solid fa-user"></i>
                <label for="email">Usuario:</label><br><br>
                <input style="font-size: 15px" class="border" type="text" id="email" name="email"><br>

                <i class="fa-solid fa-lock"></i>
                <label for="password">Contraseña:</label></br><br>
                <input style="font-size: 15px" class="border" type="password" id="password" name="password"><br>
                <div class="login-button-container">
                    <button type="submit">Ingresar</button>
                </div>
                <div class="login-a-container">
                    <a href="{{ route('recovery_before') }}" class="styled-link">¿Olvidaste tu contraseña?</a><br><br>
                    <a href="{{ route('register') }}" class="styled-link">¿No tienes Cuenta? Registrate</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll(".styled-link");
            links.forEach(link => {
                link.addEventListener("mouseenter", function() {
                    this.style.color = "#007bff";
                });
                link.addEventListener("mouseleave", function() {
                    this.style.color = "#333";
                });
            });
        });
    </script>
</body>

</html>
