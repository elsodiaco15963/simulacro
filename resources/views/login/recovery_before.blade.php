<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/style_login.css') }}">
        <script src="https://kit.fontawesome.com/ddbd74d450.js" crossorigin="anonymous"></script>
        <title>Recuperar</title>
    </head>
    <body>
        <div class="recovery-before-container">
            <img src="{{ asset('assets/image/code.png') }}">
            <form method="POST" action="{{ route('verify') }}">
            @csrf
            <div class="recovery-before-input-container">
                <label for="email">Correo:</label><br>
                <input type="email" id="email" name="email" required><br>

                <label for="clave" title="Necesario para recuperar contraseña">Clave:</label><br>
                <input type="password" id="clave" name="clave" required><br>

                <div class="recovery-before-button-container">
                    <button type="submit">Verificar</button>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>
