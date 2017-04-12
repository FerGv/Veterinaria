<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $buscar_clientes = "SELECT * FROM cliente";
        $resultado = mysqli_query($conexion, $buscar_clientes);
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
        while($cliente = mysqli_fetch_assoc($resultado)) {
    ?>
        <div class="card">
            <div class="card--title">
                <a href="../mascota/reporte_mascotas.php?cliente=<?php echo $cliente['rfc_cliente'] ?>"><h1 class="card--title__name"><?php echo $cliente['rfc_cliente'] ?></h1></a>
                <?php if ($_SESSION['tipo'] != 2) { ?>
                    <nav class="card--title__menu">
                        <a href="form_modificar_cliente.php?cliente=<?php echo $cliente['rfc_cliente'] ?>" class="card--title__item">Modificar</a>
                        <a href="eliminar_cliente.php?cliente=<?php echo $cliente['rfc_cliente'] ?>" class="card--title__item">Eliminar</a>
                    </nav>
                <?php } ?>
            </div>
            <p class="card__data"><?php echo $cliente['nombre_cliente'] ?></p>
            <p class="card__data"><?php echo $cliente['direccion_cliente'] ?></p>
            <p class="card__data"><?php echo $cliente['telefono_cliente'] ?></p>
            <p class="card__data"><?php echo $cliente['email_cliente'] ?></p>
        </div>
    <?php
        }
        mysqli_close($conexion);
    ?>
</body>
</html>