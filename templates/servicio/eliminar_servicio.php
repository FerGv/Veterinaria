<?php  
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $servicio = $_GET['servicio'];
        $eliminar_servicio = "DELETE FROM servicio WHERE clave_servicio='$servicio'";
        $resultado_servicio = mysqli_query($conexion, $eliminar_servicio);

        header("Location:reporte_servicios.php");
    }
?>