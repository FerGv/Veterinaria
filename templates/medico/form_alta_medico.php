<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="wrap">
        <form action="alta_medico.php" method="post">
            <h1 class="form__title">Médico</h1>
            <input type="text" name="rfc" placeholder="RFC" required class="form__input" autofocus><br>
            <input type="text" name="nombre" placeholder="Nombre Completo" required class="form__input"><br>
            <input type="text" name="direccion" placeholder="Dirección" required class="form__input"><br>
            <input type="text" name="telefono" placeholder="Teléfono" required class="form__input"><br>
            <input type="email" name="email" placeholder="Correo electrónico" required class="form__input"><br>
            <input type="submit" value="Registrar" class="form__button">
        </form>
    </section>
</body>
</html>