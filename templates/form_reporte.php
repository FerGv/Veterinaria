<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:form_login.php");
    }
    else {
        include("conexion.php");
        $buscar_clientes = "SELECT * FROM cliente";
        $resultado = mysqli_query($conexion, $buscar_clientes);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte clientes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
        while($cliente = mysqli_fetch_assoc($resultado)){
            // foreach ($usuario as $campo => $valor) {
            //     echo "$campo: $valor <br>";
            // }
    ?>
    <div class="card">
        <a href="cliente.php?<?php echo $cliente['rfc_cliente'] ?>"><h1 class="card__title"><?php echo $cliente['rfc_cliente'] ?></h1></a>
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