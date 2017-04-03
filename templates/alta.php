<?php
    if (!$_POST) {
        header("Location:create_form.html");
    }

    include("conexion.php");

    $rfc = $_POST['rfc'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];

    $insertar = "INSERT INTO cliente VALUES ('$rfc', '$nombre', '$apellido_p', '$apellido_m', '$edad')";

    $resultado = mysqli_query($conexion, $insertar);

    if (!$resultado) {
        echo "Error";
    }
    else {
        echo "Exito";
    }

    mysqli_close($conexion);
?>