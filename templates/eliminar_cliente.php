<?php  
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:form_login.php");
    }
    else {
        include("conexion.php");
        $cliente = $_GET['cliente'];
        // $eliminar_mascotas = "DELETE FROM mascota WHERE rfc_cliente='$cliente'";
        $eliminar_cliente = "DELETE FROM cliente WHERE rfc_cliente='$cliente'";
        $eliminar_usuario = "DELETE FROM usuario WHERE nombre_usuario='$cliente'";
        // $resultado_mascotas = mysqli_query($conexion, $eliminar_mascotas);
        $resultado_cliente = mysqli_query($conexion, $eliminar_cliente);
        $resultado_usuario = mysqli_query($conexion, $eliminar_usuario);

        header("Location:reporte_clientes.php");
    }
?>