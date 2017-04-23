<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $buscar_facturas = "SELECT * FROM factura";
        $resultado_factura = mysqli_query($conexion, $buscar_facturas);
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
        while($factura = mysqli_fetch_assoc($resultado_factura)) {
    ?>
        <div class="card">
            <div class="card--title">
                <h1 class="card--title__name"><?php echo $factura['clave_factura'] ?></h1>
                <?php if ($_SESSION['tipo'] != 2) { ?>
                    <nav class="card--title__menu">
                        <a href="eliminar_factura.php?factura=<?php echo $factura['clave_factura'] ?>" class="card--title__item">Eliminar</a>
                    </nav>
                <?php } ?>
            </div>
            <p class="card__data"><?php echo $factura['fecha_factura'] ?></p>
            <p class="card__data"><?php echo $factura['hora_factura'] ?></p>
            <p class="card__data"><?php echo $factura['clave_control_servicio'] ?></p>
        </div>
    <?php
        }
        mysqli_close($conexion);
    ?>
</body>
</html>