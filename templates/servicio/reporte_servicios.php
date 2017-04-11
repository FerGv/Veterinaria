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
    <title>Reporte servicios</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <?php 
        while($servicio = mysqli_fetch_assoc($resultado)) {
    ?>
        <div class="card">
            <div class="card--title">
                <h1 class="card--title__name"><?php echo $servicio['clave_servicio'] ?></h1>
                <?php if ($_SESSION['tipo'] != 2) { ?>
                    <nav class="card--title__menu">
                        <a href="form_modificar_servicio.php?servicio=<?php echo $servicio['clave_servicio'] ?>" class="card--title__item">Modificar</a>
                        <a href="eliminar_servicio.php?servicio=<?php echo $servicio['clave_servicio'] ?>" class="card--title__item">Eliminar</a>
                    </nav>
                <?php } ?>
            </div>
            <p class="card__data"><?php echo $servicio['descripcion_servicio'] ?></p>
            <p class="card__data"><?php echo $servicio['precio_servicio'] ?></p>
            <p class="card__data"><?php echo $servicio['tipo_servicio'] ?></p>
            <?php if ($servicio['periodicidad_servicio'] != null) { ?>
                <p class="card__data"><?php echo $servicio['periodicidad_servicio'] ?></p>
            <?php } ?>
        </div>
    <?php
        }
        mysqli_close($conexion);
    ?>
</body>
</html>