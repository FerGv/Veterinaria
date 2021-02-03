<?php
    if (!$_POST) {
        header("Location:form_modificar_empleado.php");
    }
    elseif ((!$_POST['rfc']) || (!$_POST['nombre']) || (!$_POST['direccion']) || (!$_POST['telefono']) || (!$_POST['email'])) {
        header("Location:form_modificar_empleado.php");
    }
    else {
        include("../conexion.php");

        $empleado = $_GET['empleado'];
        $rfc = $_POST['rfc'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $modificar_empleado = "UPDATE empleado SET rfc_empleado='$rfc', nombre_empleado='$nombre', direccion_empleado='$direccion', telefono_empleado='$telefono', email_empleado='$email' WHERE rfc_empleado='$empleado'";
        $resultado = mysqli_query($conexion, $modificar_empleado);

        // echo "<script>alert('empleado modificado con éxito.');</script>";
        header("Location:reporte_empleados.php");

        mysqli_close($conexion);
    }
?>
