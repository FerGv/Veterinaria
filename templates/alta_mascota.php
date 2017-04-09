<?php
    if (!$_POST) {
        header("Location:pet_form.php");
    }
    elseif ((!$_POST['nombre']) || (!$_POST['especie']) || (!$_POST['raza']) || (!$_POST['color']) || (!$_POST['tamanio']) || (!$_POST['senia_particular']) || (!$_POST['fecha_nacimiento'])) {
        header("Location:pet_form.php");
    }
    else {
        include("conexion.php");

        $nombre = $_POST['nombre'];
        $especie = $_POST['especie'];
        $raza = $_POST['raza'];
        $color = $_POST['color'];
        $tamanio = $_POST['tamanio'];
        $senia_particular = $_POST['senia_particular'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

        $crear_mascota = "INSERT INTO mascota(nombre_mascota, especie_mascota, raza_mascota, color_mascota, tamanio_mascota, seniapart_mascota, fechanac_mascota, rfc_cliente) VALUES ('$nombre', '$especie', '$raza', '$color', '$tamanio', '$senia_particular', '$fecha_nacimiento', 'fercho456')";
        
        $resultado_mascota = mysqli_query($conexion, $crear_mascota);

        header("Location:bienvenida.php");

        mysqli_close($conexion);
    }
?>