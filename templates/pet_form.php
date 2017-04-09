<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:login_form.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
    <form action="alta_mascota.php" method="post">
        <h1 class="form__title">Mascota</h1>
        <input type="text" name="nombre" placeholder="Nombre" required class="form__input"><br>
        <input type="text" name="especie" placeholder="Especie" required class="form__input"><br>
        <input type="text" name="raza" placeholder="Raza" required class="form__input"><br>
        <input type="text" name="color" placeholder="Color" required class="form__input"><br>
        <input type="text" name="tamanio" placeholder="Tamaño" required class="form__input"><br>
        <input type="text" name="senia_particular" placeholder="Seña particular" required class="form__input"><br>
        <div class="fecha">
            <label for="fecha" class="fecha__label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha" required class="fecha__input">
        </div><br>
        <input type="submit" value="Registrar" class="form__submit">
    </form>
</body>
</html>