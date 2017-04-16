<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $clave_control = $_GET['control'];
        $buscar_control = "SELECT * FROM control_servicio WHERE clave_control_servicio='$clave_control'";
        $resultado_control = mysqli_query($conexion, $buscar_control);
        $control = mysqli_fetch_assoc($resultado_control);

        $buscar_servicios = "SELECT * FROM servicio";
        $resultado_servicio = mysqli_query($conexion, $buscar_servicios);

        $buscar_datos = mysqli_query($conexion, "SELECT mascota.rfc_cliente AS rfc_cliente, mascota.nombre_mascota AS nombre_mascota FROM control_servicio JOIN mascota WHERE control_servicio.id_mascota = mascota.id_mascota");
        $datos = mysqli_fetch_assoc($buscar_datos);
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
        <form action="modificar_control.php?control=<?php echo $clave_control ?>" method="post">
            <h1 class="form__title">Consulta</h1>
            <input type="text" name="rfc_cliente" placeholder="RFC cliente" required class="form__input" autofocus value="<?php echo $datos['rfc_cliente'] ?>"><br>
            <input type="text" name="nombre_mascota" placeholder="Nombre mascota" required class="form__input" value="<?php echo $datos['nombre_mascota'] ?>"><br>
            <input type="text" name="rfc_medico" placeholder="RFC médico" required class="form__input" value="<?php echo $control['rfc_medico'] ?>"><br>
            <div class="date">
                <label for="fecha" class="date__label control__label">Fecha</label>
                <input type="date" name="fecha_control" id="fecha" required class="date__input control__input" value="<?php echo $control['fecha_control'] ?>">
            </div><br>
            <div class="service">
            <?php 
                while($servicio = mysqli_fetch_assoc($resultado_servicio)) {
                    $buscar_servicio = mysqli_query($conexion, "SELECT * FROM control_servicio_servicio WHERE clave_servicio='$servicio[clave_servicio]' AND clave_control_servicio='$clave_control'");
            ?>
                <input type="checkbox" name="servicios[]" id="<?php echo "check$servicio[clave_servicio]" ?>" value="<?php echo "$servicio[clave_servicio]" ?>" class="service__checkbox" <?php if (mysqli_num_rows($buscar_servicio) > 0) {echo "checked";} ?>>
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