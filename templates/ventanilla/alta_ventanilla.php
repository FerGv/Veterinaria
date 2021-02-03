<?php
    if (!$_POST) {
        header("Location:../form_login.php");
    }
    elseif ((!$_POST['rfc']) || (!$_POST['nombre']) || (!$_POST['direccion']) || (!$_POST['telefono']) || (!$_POST['email'])) {
        header("Location:form_alta_empleado.php");
    }
    else {
        include("../conexion.php");

        $rfc = $_POST['rfc'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $buscar_empleado = mysqli_query($conexion, "SELECT * FROM empleado WHERE rfc_empleado='$rfc'");
        if (mysqli_num_rows($buscar_empleado) > 0) {
            echo "<script>
                    alert('RFC ya existente');
                    window.history.go(-1);
                </script>";
            exit;
        }

        $crear_empleado = "INSERT INTO empleado VALUES ('$rfc', '$nombre', '$direccion', '$telefono', '$email', 1)";
        $crear_usuario = "INSERT INTO usuario VALUES ('$rfc', 'empleado123', 1)";
        $resultado_empleado = mysqli_query($conexion, $crear_empleado);
        $resultado_usuario = mysqli_query($conexion, $crear_usuario);

        // echo "<script>alert('empleado registrado con éxito.');</script>";
        header("Location:reporte_ventanilla.php");

        mysqli_close($conexion);
    }
?>
