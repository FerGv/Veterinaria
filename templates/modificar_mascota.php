<?php
    if (!$_POST) {
        header("Location:form_modificar_mascota.php");
    }
    elseif ((!$_POST['nombre']) || (!$_POST['especie']) || (!$_POST['raza']) || (!$_POST['color']) || (!$_POST['tamanio']) || (!$_POST['senia_particular']) || (!$_POST['fecha_nacimiento'])) {
        header("Location:form_modificar_mascota.php");
    }
    else {
        include("conexion.php");

        $id_mascota = $_GET['mascota'];
        $cliente = $_GET['cliente'];
        $nombre = $_POST['nombre'];
        $especie = $_POST['especie'];
        $raza = $_POST['raza'];
        $color = $_POST['color'];
        $tamanio = $_POST['tamanio'];
        $senia_particular = $_POST['senia_particular'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

        $modificar_mascota = "UPDATE mascota SET nombre_mascota='$nombre', especie_mascota='$especie', raza_mascota='$raza', color_mascota='$color', tamanio_mascota='$tamanio', seniapart_mascota='$senia_particular', fechanac_mascota='$fecha_nacimiento' WHERE id_mascota='$id_mascota' AND rfc_cliente='$cliente'";
        $resultado = mysqli_query($conexion, $modificar_mascota);

        echo "<script>alert('Mascota modificada con éxito.');</script>";
        header("Location:reporte_mascotas.php?cliente=$cliente");

        mysqli_close($conexion);
    }
?>