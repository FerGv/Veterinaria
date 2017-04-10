<?php
    if (!$_POST) {
        header("Location:form_alta_mascota.php");
    }
    elseif ((!$_POST['nombre']) || (!$_POST['especie']) || (!$_POST['raza']) || (!$_POST['color']) || (!$_POST['tamanio']) || (!$_POST['senia_particular']) || (!$_POST['fecha_nacimiento'])) {
        header("Location:form_alta_mascota.php");
    }
    else {
        include("conexion.php");

        $cliente = $_GET['cliente'];
        $nombre = $_POST['nombre'];
        $especie = $_POST['especie'];
        $raza = $_POST['raza'];
        $color = $_POST['color'];
        $tamanio = $_POST['tamanio'];
        $senia_particular = $_POST['senia_particular'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];

        $buscar_mascota = mysqli_query($conexion, "SELECT * FROM mascota WHERE nombre_mascota='$nombre' AND rfc_cliente='$cliente'");
        if (mysqli_num_rows($buscar_mascota) > 0) {
            echo "<script>
                    alert('Mascota ya existente');
                    window.history.go(-1);
                </script>";
            exit;
        }

        $crear_mascota = "INSERT INTO mascota(nombre_mascota, especie_mascota, raza_mascota, color_mascota, tamanio_mascota, seniapart_mascota, fechanac_mascota, rfc_cliente) VALUES ('$nombre', '$especie', '$raza', '$color', '$tamanio', '$senia_particular', '$fecha_nacimiento', '$cliente')";
        
        $resultado_mascota = mysqli_query($conexion, $crear_mascota);

        echo "<script>alert('Mascota registrada con éxito.');</script>";
        header("Location:reporte_mascotas.php?cliente=$cliente");

        mysqli_close($conexion);
    }
?>