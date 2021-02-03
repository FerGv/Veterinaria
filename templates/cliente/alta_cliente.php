<?php
    if (!$_POST) {
        header("Location:../form_login.php");
    }
    elseif ((!$_POST['rfc']) || (!$_POST['nombre']) || (!$_POST['direccion']) || (!$_POST['telefono']) || (!$_POST['email'])) {
        header("Location:form_alta_cliente.php");
    }
    else {
        include("../conexion.php");

        $rfc = $_POST['rfc'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $buscar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE rfc_cliente='$rfc'");
        if (mysqli_num_rows($buscar_cliente) > 0) {
            echo "<script>
                    alert('RFC ya existente');
                    window.history.go(-1);
                </script>";
            exit;
        }

        $crear_cliente = "INSERT INTO cliente VALUES ('$rfc', '$nombre', '$direccion', '$telefono', '$email', 1)";
        $crear_usuario = "INSERT INTO usuario VALUES ('$rfc', 'veterinaria123', 2)";
        $resultado_cliente = mysqli_query($conexion, $crear_cliente);
        $resultado_usuario = mysqli_query($conexion, $crear_usuario);

        // echo "<script>alert('Cliente registrado con éxito.');</script>";
        header("Location:../mascota/form_alta_mascota.php?cliente=$rfc");

        mysqli_close($conexion);
    }
?>
