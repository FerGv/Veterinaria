<?php  
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:form_login.php");
    }
    else {
        include("conexion.php");
        $id_mascota = $_GET['mascota'];
        $cliente = $_GET['cliente'];
        $eliminar_mascota = "DELETE FROM mascota WHERE id_mascota='$id_mascota' AND rfc_cliente='$cliente'";
        $resultado =  mysqli_query($conexion, $eliminar_mascota);

        if (!$resultado) {
            echo "Error";
        }
        else {
            header("Location:reporte_mascotas.php?cliente=$cliente");
        }
    }
?>