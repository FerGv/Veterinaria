<?php  
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $servicio = $_GET['servicio'];
        $eliminar_servicio = "UPDATE servicio SET estado_servicio = 0 WHERE clave_servicio='$servicio'";
        $resultado_servicio = mysqli_query($conexion, $eliminar_servicio);

        header("Location:reporte_servicios.php");
    }
?>