<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $buscar_servicios = "SELECT * FROM servicio";
        $resultado = mysqli_query($conexion, $buscar_servicios);
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
        <form action="alta_control.php" method="post">
            <h1 class="form__title">Consulta</h1>
            <input type="text" name="rfc_cliente" placeholder="RFC cliente" required class="form__input" autofocus><br>
            <input type="text" name="nombre_mascota" placeholder="Nombre mascota" required class="form__input"><br>
            <input type="text" name="rfc_medico" placeholder="RFC médico" required class="form__input"><br>
            <div class="date">
                <label for="fecha" class="date__label control__label">Fecha</label>
                <input type="date" name="fecha_control" id="fecha" required class="date__input control__input">
            </div><br>
            <div class="service">
            <?php 
                while($servicio = mysqli_fetch_assoc($resultado)) {
            ?>
                <input type="checkbox" name="servicios[]" id="<?php echo "check$servicio[clave_servicio]" ?>" value="<?php echo "$servicio[clave_servicio]" ?>" class="service__checkbox">
                <label for="<?php echo "check$servicio[clave_servicio]" ?>" class="service__label"><?php echo $servicio['descripcion_servicio'] ?></label>
            <?php
                }
                mysqli_close($conexion);
            ?></div><br>
            <input type="submit" value="Registrar" class="form__button">
        </form>
    </section>
</body>
</html>