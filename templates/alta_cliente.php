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

    if ($resultado = mysqli_query($conexion, "SELECT * FROM cliente WHERE rfc_cliente='$rfc'")) {
        echo "<script>
                alert('Usuario ya existente');
                window.history.go(-1);
            </script>";
        exit;
    }

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