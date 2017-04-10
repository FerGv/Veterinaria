<?php 
    session_start();
    if (!$_SESSION) {
        header("Location:form_login.php");
    }
    else {
        include("conexion.php");
        $cliente = $_GET['cliente'];
        $buscar_mascotas = "SELECT * FROM mascota WHERE rfc_cliente='$cliente'";
        $resultado = mysqli_query($conexion, $buscar_mascotas);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte mascotas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
        while($mascota = mysqli_fetch_assoc($resultado)) {
    ?>
        <div class="card">
            <h1 class="card__title"><?php echo $mascota['nombre_mascota'] ?></h1>
            <p class="card__data"><?php echo $mascota['especie_mascota'] ?></p>
            <p class="card__data"><?php echo $mascota['raza_mascota'] ?></p>
            <p class="card__data"><?php echo $mascota['color_mascota'] ?></p>
            <p class="card__data"><?php echo $mascota['tamanio_mascota'] ?></p>
            <p class="card__data"><?php echo $mascota['seniapart_mascota'] ?></p>
            <p class="card__data"><?php echo $mascota['fechanac_mascota'] ?></p>
        </div>
    <?php
        }
        mysqli_close($conexion);
    ?>
</body>
</html>