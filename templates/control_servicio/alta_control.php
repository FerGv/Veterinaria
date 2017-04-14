<?php
    if (!$_POST) {
        header("Location:../form_login.php");
    }
    elseif ((!$_POST['rfc_cliente']) || (!$_POST['nombre_mascota']) || (!$_POST['rfc_medico']) || (!$_POST['fecha_control'])) {
        header("Location:form_alta_control.php");
    }
    else {
        include("../conexion.php");

        $rfc_cliente = $_POST['rfc_cliente'];
        $nombre_mascota = $_POST['nombre_mascota'];
        $rfc_medico = $_POST['rfc_medico'];
        $fecha_control = $_POST['fecha_control'];
        $servicios = $_POST['servicios'];

        var_dump($servicios);

        // $buscar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE rfc_cliente='$rfc'");
        // if (mysqli_num_rows($buscar_cliente) > 0) {
        //     echo "<script>
        //             alert('RFC ya existente');
        //             window.history.go(-1);
        //         </script>";
        //     exit;
        // }

        // $crear_cliente = "INSERT INTO cliente VALUES ('$rfc', '$nombre', '$direccion', '$telefono', '$email')";
        // $crear_usuario = "INSERT INTO usuario VALUES ('$rfc', 'veterinaria123', 2)";
        // $resultado_cliente = mysqli_query($conexion, $crear_cliente);
        // $resultado_usuario = mysqli_query($conexion, $crear_usuario);

        // echo "<script>alert('Cliente registrado con éxito.');</script>";
        // header("Location:../mascota/form_alta_mascota.php?cliente=$rfc");

        // mysqli_close($conexion);
    }
?>