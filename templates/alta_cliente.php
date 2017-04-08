<?php
    if (!$_POST) {
        header("Location:client_form.html");
    }

    include("conexion.php");

    $rfc = $_POST['rfc'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $insertar = "INSERT INTO cliente VALUES ('$rfc', '$nombre', '$direccion', '$telefono', '$email')";

    $resultado = mysqli_query($conexion, $insertar);

    if (!$resultado) {
        echo "Error";
    }
    else {
        echo "Exito";
    }

    mysqli_close($conexion);
?>