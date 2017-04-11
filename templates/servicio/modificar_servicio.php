<?php
    if (!$_POST) {
        header("Location:form_modificar_servicio.php");
    }
    elseif ((!$_POST['descripcion']) || (!$_POST['precio']) || (!$_POST['tipo'])) {
        header("Location:form_modificar_servicio.php");
    }
    else {
        include("../conexion.php");

        $servicio = $_GET['servicio'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        if ($_POST['periodicidad']) {
            $periodicidad = $_POST['periodicidad'];
        }
        else {
            $periodicidad = null;
        }

        if ($periodicidad = $_POST['periodicidad']) {
            $modificar_servicio = "UPDATE servicio SET descripcion_servicio='$descripcion', precio_servicio='$precio', tipo_servicio='$tipo', periodicidad_servicio='$periodicidad' WHERE clave_servicio='$servicio'";
        }
        else {
            $modificar_servicio = "UPDATE servicio SET descripcion_servicio='$descripcion', precio_servicio='$precio', tipo_servicio='$tipo' WHERE clave_servicio='$servicio'";
        }
        
        $resultado = mysqli_query($conexion, $modificar_servicio);

        echo "<script>alert('Servicio modificado con éxito.');</script>";
        header("Location:reporte_servicios.php");

        mysqli_close($conexion);
    }
?>