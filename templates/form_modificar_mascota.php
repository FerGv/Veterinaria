<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:form_login.php");
    }
    else {
        include("conexion.php");
        $id_mascota = $_GET['mascota'];
        $cliente = $_GET['cliente'];
        $buscar_mascota = "SELECT * FROM mascota WHERE id_mascota='$id_mascota' AND rfc_cliente='$cliente'";
        $resultado = mysqli_query($conexion, $buscar_mascota);
        $mascota = mysqli_fetch_assoc($resultado);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="wrap">
        <form action="modificar_mascota.php?mascota=<?php echo $id_mascota ?>&cliente=<?php echo $cliente ?>" method="post">
            <h1 class="form__title">Mascota</h1>
            <input type="text" name="nombre" placeholder="Nombre" required class="form__input" value="<?php echo $mascota['nombre_mascota'] ?>"><br>
            <input type="text" name="especie" placeholder="Especie" required class="form__input" value="<?php echo $mascota['especie_mascota'] ?>"><br>
            <input type="text" name="raza" placeholder="Raza" required class="form__input" value="<?php echo $mascota['raza_mascota'] ?>"><br>
            <input type="text" name="color" placeholder="Color" required class="form__input" value="<?php echo $mascota['color_mascota'] ?>"><br>
            <input type="text" name="tamanio" placeholder="Tamaño" required class="form__input" value="<?php echo $mascota['tamanio_mascota'] ?>"><br>
            <input type="text" name="senia_particular" placeholder="Seña particular" required class="form__input" value="<?php echo $mascota['seniapart_mascota'] ?>"><br>
            <div class="date">
                <label for="fecha" class="date__label">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha" required class="date__input" value="<?php echo $mascota['fechanac_mascota'] ?>">
            </div><br>
            <input type="submit" value="Actualizar" class="form__button">
        </form>
    </section>
</body>
</html>