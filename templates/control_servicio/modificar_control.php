<?php
    if (!$_POST) {
        header("Location:form_modificar_control.php");
    }
    elseif ((!$_POST['rfc_cliente']) || (!$_POST['nombre_mascota']) || (!$_POST['rfc_medico']) || (!$_POST['fecha_seguimiento']) || (!$_POST['servicios'])) {
        header("Location:form_modificar_control.php");
    }
    else {
        include("../conexion.php");

        $clave_control = $_GET['control'];
        $rfc_cliente = $_POST['rfc_cliente'];
        $nombre_mascota = $_POST['nombre_mascota'];
        $rfc_medico = $_POST['rfc_medico'];
        $fecha_seguimiento = $_POST['fecha_seguimiento'];
        $servicios = $_POST['servicios'];

        $buscar_mascota = mysqli_query($conexion, "SELECT id_mascota FROM mascota WHERE nombre_mascota='$nombre_mascota' AND rfc_cliente='$rfc_cliente'");
        $mascota = mysqli_fetch_assoc($buscar_mascota);

        if (mysqli_num_rows($buscar_mascota) == 0) {
            echo "<script>
                    alert('Datos incorrectos');
                    window.history.go(-1);
                </script>";
            exit;
        }

        $modificar_control = "UPDATE control_servicio SET id_mascota='$mascota[id_mascota]', rfc_medico='$rfc_medico' WHERE clave_control_servicio='$clave_control'";
        $resultado = mysqli_query($conexion, $modificar_control);


        $borrar_servicios = mysqli_query($conexion, "DELETE FROM control_servicio_servicio WHERE clave_control_servicio='$clave_control'");

        foreach ($servicios as $clave_servicio) {
            // $buscar_servicio = mysqli_query($conexion, "SELECT * FROM control_servicio_servicio WHERE clave_servicio='$clave_servicio' AND clave_control_servicio='$clave_control'");

            // if (mysqli_num_rows($buscar_servicio) == 0) {
                $crear_servicio = mysqli_query($conexion, "INSERT INTO control_servicio_servicio VALUES ('$clave_control', '$clave_servicio')");
            // }
        }

        $modificar_historial = mysqli_query($conexion, "UPDATE historial SET id_mascota='$mascota[id_mascota]', fechaseg_historial='$fecha_seguimiento' WHERE clave_control_servicio='$clave_control'");

        echo "<script>alert('Consulta modificada con éxito.');</script>";
        header("Location:reporte_control.php");

        mysqli_close($conexion);
    }
?>