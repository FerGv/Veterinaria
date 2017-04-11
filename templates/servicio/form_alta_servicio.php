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
        <form action="alta_servicio.php" method="post">
            <h1 class="form__title">Servicio</h1>
            <input type="text" name="descripcion" placeholder="Descripción" required class="form__input" autofocus><br>
            <input type="text" name="precio" placeholder="Precio" required class="form__input"><br>
            <input type="text" name="tipo" placeholder="Tipo" required class="form__input"><br>
            <div class="date">
                <label for="periodicidad" class="date__label">Periodicidad</label>
                <input type="date" name="periodicidad" id="periodicidad" class="date__input">
            </div><br>
            <input type="submit" value="Registrar" class="form__button">
        </form>
    </section>
</body>
</html>