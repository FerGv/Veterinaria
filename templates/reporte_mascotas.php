<?php 
    session_start();
    if (!$_SESSION) {
        header("Location:form_login.php");
    }
    else {
        include("conexion.php");
        $cliente = $_GET['cliente'];

        if (($_SESSION['tipo'] == 2) && ($cliente != $_SESSION['nombre'])) {
            header("Location:form_login.php");
        }

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
        if (mysqli_num_rows($resultado) == 0) {
            echo "Sin mascotas";
            exit;
        }
        while($mascota = mysqli_fetch_assoc($resultado)) {
    ?>
        <div class="card">
            <div class="card--title">
                <h1 class="card--title__name"><?php echo $mascota['nombre_mascota'] ?></h1>
                <?php if ($_SESSION['tipo'] != 2) { ?>
                    <nav class="card--title__menu">
                        <a href="form_modificar_mascota.php?mascota=<?php echo $mascota['id_mascota'] ?>&cliente=<?php echo $cliente ?>" class="card--title__item">Modificar</a>
                        <a href="eliminar_mascota.php?mascota=<?php echo $mascota['id_mascota'] ?>&cliente=<?php echo $cliente ?>" class="card--title__item">Eliminar</a>
                    </nav>
                <?php } ?>
            </div>
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