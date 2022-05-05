<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" href="<?= RUTA?>web/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="login">
        <form method="post" action="index.php?comando=login" class="login__form">
            <div class="login__form__emailLogin">
                <input class="inputEmail" type="email" name="email" id="email" placeholder="emai@gmail.com">
            </div>
            <div class="login__form__passwordLogin">
                <input class="inputPassword" type="password" name="password" id="password" placeholder="********">
            </div>
            <div class="login__form__botonLogin">
                <button class="inputBoton" type="submit" name="iniciarSesion">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</body>
</html>