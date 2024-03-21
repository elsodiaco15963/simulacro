<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/style_login.css') }}">
        <script src="https://kit.fontawesome.com/ddbd74d450.js" crossorigin="anonymous"></script>
        <title>Registro</title>
    </head>
    <body>
        <div class="register-container">
            <img src="{{ asset('assets/image/code.png') }}">
            <form method="POST" action="{{ route('store_user') }}">
            @csrf
            <div class="register-input-container">
                <label for="name">Nombres:</label><br>
                <input type="text" id="name" name="name" required><br>

                <label for="last_name">Apellidos:</label><br>
                <input type="text" id="last_name" name="last_name" required><br>

                <label for="dni">Documento (DNI):</label><br>
                <input type="number" id="dni" name="dni" required><br>

                <label for="email">Correo:</label><br>
                <input type="email" id="email" name="email" required><br>

                <label for="password">Contraseña:</label><br>
                <input type="password" id="password" name="password" required><br>

                <label for="re_password">Confirmar Contraseña:</label><br>
                <input type="password" id="re_password" name="re_password" required pattern=".{6,}" oninput="checkPasswordMatch();" title="Las contraseñas deben coincidir" ><br>
                <small id="passwordError" style="color: red;"></small><br>

                <label for="clave" title="Necesario para recuperar contraseña">Clave de recuperacion:</label><br>
                <input type="password" id="clave" name="clave" required><br>

                <label for="re_clave">Confirmar Clave:</label><br>
                <input type="password" id="re_clave" name="re_clave" required oninput="validarClaves()"><br>
                <small id="claveError" style="color: red;"></small><br>

                <div class="register-button-container">
                    <button type="submit">Registrar</button>
                </div>
            </div>
            </form>
        </div>

        <script>
            function checkPasswordMatch() {
                var password = document.getElementById("password").value;
                var re_password = document.getElementById("re_password").value;
                var passwordError = document.getElementById("passwordError");

                if (password !== re_password) {
                    passwordError.textContent = "Las contraseñas no coinciden";
                } else {
                    passwordError.textContent = "";
                }
            }
            function validarClaves() {
                var clave = document.getElementById("clave").value;
                var re_clave = document.getElementById("re_clave").value;
                var claveError = document.getElementById("claveError");

                if (clave !== re_clave) {
                    claveError.textContent = "Las claves no coinciden";
                } else {
                    claveError.textContent = "";
                }
            }
        </script>
    </body>
</html>
