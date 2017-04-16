<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $buscar_controles = "SELECT * FROM control_servicio";
        $resultado_control = mysqli_query($conexion, $buscar_controles);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte clientes</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <?php 
        while($control = mysqli_fetch_assoc($resultado_control)) {
    ?>
        <div class="card">
            <div class="card--title">
                <h1 class="card--title__name"><?php echo $control['clave_control_servicio'] ?></h1>
                <?php if ($_SESSION['tipo'] != 2) { ?>
                    <nav class="card--title__menu">
                        <a href="form_modificar_control.php?control=<?php echo $control['clave_control_servicio'] ?>" class="card--title__item">Modificar</a>
                        <a href="eliminar_control.php?control=<?php echo $control['clave_control_servicio'] ?>" class="card--title__item">Eliminar</a>
                    </nav>
                <?php } ?>
            </div>
            <p class="card__data"><?php echo $control['fecha_control'] ?></p>

            <?php 
                $buscar_mascota = mysqli_query($conexion, "SELECT mascota.nombre_mascota AS nombre_mascota FROM control_servicio JOIN mascota WHERE control_servicio.id_mascota = mascota.id_mascota"); 
                $mascota = mysqli_fetch_assoc($buscar_mascota);
            ?>
            <p class="card__data"><?php echo $mascota['nombre_mascota'] ?></p>

            <?php 
                $buscar_medico = mysqli_query($conexion, "SELECT medico.nombre_medico AS nombre_medico FROM control_servicio JOIN medico WHERE control_servicio.rfc_medico = medico.rfc_medico"); 
                $medico = mysqli_fetch_assoc($buscar_medico);
            ?>
            <p class="card__data"><?php echo $medico['nombre_medico'] ?></p>

            <?php 
                $buscar_servicios = "SELECT servicio.descripcion_servicio AS descripcion_servicio FROM control_servicio_servicio JOIN servicio WHERE control_servicio_servicio.clave_servicio = servicio.clave_servicio AND control_servicio_servicio.clave_control_servicio = '$control[clave_control_servicio]'";
                $resultado_servicio = mysqli_query($conexion, $buscar_servicios);
                while($servicio = mysqli_fetch_assoc($resultado_servicio)) { 
            ?>
                <p class="card__data"><?php echo $servicio['descripcion_servicio'] ?></p>
            <?php } ?>
        </div>
    <?php
        }
        mysqli_close($conexion);
    ?>
</body>
</html>