<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $clave_servicio = $_GET['servicio'];
        $buscar_servicio = "SELECT * FROM servicio WHERE clave_servicio='$clave_servicio'";
        $resultado = mysqli_query($conexion, $buscar_servicio);
        $servicio = mysqli_fetch_assoc($resultado);
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
        <form action="modificar_servicio.php?servicio=<?php echo $clave_servicio ?>" method="post">
            <h1 class="form__title">Servicio</h1>
            <input type="text" name="descripcion" placeholder="Descripción" required class="form__input" autofocus value="<?php echo $servicio['descripcion_servicio'] ?>"><br>
            <input type="text" name="precio" placeholder="Precio" required class="form__input" value="<?php echo $servicio['precio_servicio'] ?>"><br>
            <input type="text" name="tipo" placeholder="Tipo" required class="form__input" value="<?php echo $servicio['tipo_servicio'] ?>"><br>
            <div class="date">
                <label for="periodicidad" class="date__label">Periodicidad</label>
                <input type="date" name="periodicidad" id="periodicidad" class="date__input" value="<?php echo $servicio['periodicidad_servicio'] ?>">
            </div><br>
            <input type="submit" value="Registrar" class="form__button">
        </form>
    </section>
</body>
</html>