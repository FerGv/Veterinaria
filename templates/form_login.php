<?php 
    session_start();
    if (@$_SESSION['nombre']) {
        header("Location:bienvenida.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h1 class="form__title">Iniciar Sesión</h1>
        <input type="text" name="nombre" placeholder="Nombre" required class="form__input" autofocus>
        <div class="password">
            <input type="password" name="pass" id="pass" placeholder="Contraseña" required class="password__input">
            <input type="button" value="Ver" onclick="Mostrar_Pass()" class="password__button">
        </div><br>     
        <input type="submit" value="Ingresar" class="form__submit">        
    </form>

    <script src="../js/funciones.js"></script>
</body>
</html>