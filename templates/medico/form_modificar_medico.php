<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $rfc_medico = $_GET['medico'];
        $buscar_medico = "SELECT * FROM medico WHERE rfc_medico='$rfc_medico'";
        $resultado = mysqli_query($conexion, $buscar_medico);
        $medico = mysqli_fetch_assoc($resultado);
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
        <form action="modificar_medico.php?medico=<?php echo $rfc_medico ?>" method="post">
            <h1 class="form__title">Médico</h1>
            <input type="text" name="rfc" placeholder="RFC" required class="form__input" autofocus value="<?php echo $medico['rfc_medico'] ?>"><br>
            <input type="text" name="nombre" placeholder="Nombre Completo" required class="form__input" value="<?php echo $medico['nombre_medico'] ?>"><br>
            <input type="text" name="direccion" placeholder="Dirección" required class="form__input" value="<?php echo $medico['direccion_medico'] ?>"><br>
            <input type="text" name="telefono" placeholder="Teléfono" required class="form__input" value="<?php echo $medico['telefono_medico'] ?>"><br>
            <input type="email" name="email" placeholder="Correo electrónico" required class="form__input" value="<?php echo $medico['email_medico'] ?>"><br>
            <input type="submit" value="Registrar" class="form__button">
        </form>
    </section>
</body>
</html>