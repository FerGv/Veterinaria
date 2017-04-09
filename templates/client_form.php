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
    <form action="alta_cliente.php" method="post">
        <h1 class="form__title">Cliente</h1>
        <input type="text" name="rfc" placeholder="RFC" required class="form__input" autofocus><br>
        <input type="text" name="nombre" placeholder="Nombre Completo" required class="form__input"><br>
        <input type="text" name="direccion" placeholder="Dirección" required class="form__input"><br>
        <input type="text" name="telefono" placeholder="Teléfono" required class="form__input"><br>
        <input type="email" name="email" placeholder="Correo electrónico" required class="form__input"><br>
        <input type="submit" value="Registrar" class="form__submit">
    </form>
</body>
</html>