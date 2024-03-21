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
    <div class="recovery-container">
        <img src="{{ asset('assets/image/code.png') }}">
        <form method="POST" action="{{ route('recovery_user', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div class="recovery-input-container">
                <i class="fa-solid fa-lock-open"></i>
                <label for="password">Nueva Contraseña:</label><br><br>
                <input style="font-size: 20px" class="border" type="password" id="password" name="password"
                    required><br>

                <i class="fa-solid fa-unlock-keyhole"></i>
                <label for="re_password">Confirmar Contraseña:</label><br><br>
                <input style="font-size: 20px" class="border" type="password" id="re_password" name="re_password"
                    required pattern=".{6,}" oninput="checkPasswordMatch();"
                    title="Las contraseñas deben coincidir"><br>
                <small id="passwordError" style="color: red;"></small><br><br>

                <div class="recovery-button-container">
                    <button type="submit">Guardar</button>
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
    </script>
</body>

</html>
