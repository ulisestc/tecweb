<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar sesión - NeoWork</title>
</head>
<body>
    <form id="login-form">
        <h2>Iniciar sesión</h2>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required />
        <br />
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required />
        <br />
        <button type="submit">Entrar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>

    <!-- Lógica del Frontend -->
    <script src="login.js"></script>

</body>
</html>


