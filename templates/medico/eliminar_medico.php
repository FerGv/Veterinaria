<?php  
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $medico = $_GET['medico'];
        $eliminar_medico = "UPDATE medico SET estado_medico = 0 WHERE rfc_medico='$medico'";
        $eliminar_usuario = "DELETE FROM usuario WHERE nombre_usuario='$medico'";
        $resultado_medico = mysqli_query($conexion, $eliminar_medico);
        $resultado_usuario = mysqli_query($conexion, $eliminar_usuario);

        header("Location:reporte_medicos.php");
    }
?>