<?php
    if (!$_POST) {
        header("Location:../form_login.php");
    }
    elseif ((!$_POST['descripcion']) || (!$_POST['precio']) || (!$_POST['tipo'])) {
        header("Location:form_alta_servicio.php");
    }
    else {
        include("../conexion.php");

        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];

        $buscar_servicio = mysqli_query($conexion, "SELECT * FROM servicio WHERE descripcion_servicio='$descripcion'");
        if (mysqli_num_rows($buscar_servicio) > 0) {
            echo "<script>
                    alert('Servicio ya existente');
                    window.history.go(-1);
                </script>";
            exit;
        }

        if ($periodicidad = $_POST['periodicidad']) {
            $crear_servicio = "INSERT INTO servicio(descripcion_servicio, precio_servicio, tipo_servicio, periodicidad_servicio, estado_servicio) VALUES ('$descripcion', $precio, '$tipo', '$periodicidad', 1)";
        }
        else {
            $crear_servicio = "INSERT INTO servicio(descripcion_servicio, precio_servicio, tipo_servicio, estado_servicio) VALUES ('$descripcion', $precio, '$tipo', 1)";
        }
        
        $resultado_servicio = mysqli_query($conexion, $crear_servicio);

        echo "<script>alert('Servicio registrado con éxito.');</script>";
        header("Location:reporte_servicios.php");

        mysqli_close($conexion);
    }
?>