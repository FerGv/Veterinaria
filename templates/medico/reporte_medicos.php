<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $buscar_medicos = "SELECT * FROM medico";
        $resultado = mysqli_query($conexion, $buscar_medicos);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte medicos</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <?php 
        while($medico = mysqli_fetch_assoc($resultado)) {
    ?>
        <div class="card">
            <div class="card--title">
                <h1 class="card--title__name"><?php echo $medico['rfc_medico'] ?></h1>
                <?php if ($_SESSION['tipo'] != 2) { ?>
                    <nav class="card--title__menu">
                        <a href="form_modificar_medico.php?medico=<?php echo $medico['rfc_medico'] ?>" class="card--title__item">Modificar</a>
                        <a href="eliminar_medico.php?medico=<?php echo $medico['rfc_medico'] ?>" class="card--title__item">Eliminar</a>
                    </nav>
                <?php } ?>
            </div>
            <p class="card__data"><?php echo $medico['nombre_medico'] ?></p>
            <p class="card__data"><?php echo $medico['direccion_medico'] ?></p>
            <p class="card__data"><?php echo $medico['telefono_medico'] ?></p>
            <p class="card__data"><?php echo $medico['email_medico'] ?></p>
        </div>
    <?php
        }
        mysqli_close($conexion);
    ?>
</body>
</html>