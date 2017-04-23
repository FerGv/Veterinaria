<?php  
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        
        //TODO Eliminar control

        header("Location:reporte_control.php");
    }
?>