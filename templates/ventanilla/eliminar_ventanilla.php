<?php  
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $empleado = $_GET['empleado'];
        $eliminar_empleado = "UPDATE empleado SET estado_empleado = 0 WHERE rfc_empleado='$empleado'";
        $eliminar_usuario = "DELETE FROM usuario WHERE nombre_usuario='$empleado'";
        $resultado_empleado = mysqli_query($conexion, $eliminar_empleado);
        $resultado_usuario = mysqli_query($conexion, $eliminar_usuario);

        header("Location:reporte_empleados.php");
    }
?>