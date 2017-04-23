<?php 
    session_start();
    if (!$_SESSION) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $mascota = $_GET['mascota'];
        $cliente = $_GET['cliente'];

        if (($_SESSION['tipo'] == 2) && ($cliente != $_SESSION['nombre'])) {
            header("Location:../form_login.php");
        }

        $buscar_historial = "SELECT fechaseg_historial, fecha_control, nombre_medico, control_servicio.clave_control_servicio AS clave_control_servicio FROM historial, mascota, control_servicio, medico WHERE historial.id_mascota='$mascota' AND historial.id_mascota=mascota.id_mascota AND historial.clave_control_servicio=control_servicio.clave_control_servicio AND control_servicio.rfc_medico=medico.rfc_medico";
        $resultado = mysqli_query($conexion, $buscar_historial);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte mascotas</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <?php 
        if (mysqli_num_rows($resultado) == 0) {
            echo "Sin historial";
            exit;
        }
        while($historial = mysqli_fetch_assoc($resultado)) {
    ?>
        <div class="card">
            <div class="card--title">
                <h1 class="card--title__name"><?php echo $historial['fecha_control'] ?></h1>
                <?php if ($_SESSION['tipo'] != 2) { ?>
                    <nav class="card--title__menu">
                        <a href="form_modificar_historial.php?historial=<?php echo $historial['id_historial'] ?>&cliente=<?php echo $cliente ?>" class="card--title__item">Modificar</a>
                        <a href="eliminar_historial.php?historial=<?php echo $historial['id_historial'] ?>&cliente=<?php echo $cliente ?>" class="card--title__item">Eliminar</a>
                    </nav>
                <?php } ?>
            </div>
            <p class="card__data"><?php echo $historial['nombre_medico'] ?></p>
            <?php 
                $buscar_servicios = "SELECT descripcion_servicio FROM control_servicio_servicio, servicio WHERE control_servicio_servicio.clave_servicio = servicio.clave_servicio AND control_servicio_servicio.clave_control_servicio = '$historial[clave_control_servicio]'";
                $resultado_servicio = mysqli_query($conexion, $buscar_servicios);
                while($servicio = mysqli_fetch_assoc($resultado_servicio)) { 
            ?>
                <p class="card__data"><?php echo $servicio['descripcion_servicio'] ?></p>
            <?php } ?>
            <p class="card__data"><?php echo $historial['fechaseg_historial'] ?></p>
        </div>
    <?php
        }
        mysqli_close($conexion);
    ?>
</body>
</html>