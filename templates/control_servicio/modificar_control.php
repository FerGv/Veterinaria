<?php
    if (!$_POST) {
        header("Location:form_modificar_cliente.php");
    }
    elseif ((!$_POST['rfc']) || (!$_POST['nombre']) || (!$_POST['direccion']) || (!$_POST['telefono']) || (!$_POST['email'])) {
        header("Location:form_modificar_cliente.php");
    }
    else {
        include("../conexion.php");

        $cliente = $_GET['cliente'];
        $rfc = $_POST['rfc'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $modificar_cliente = "UPDATE cliente SET rfc_cliente='$rfc', nombre_cliente='$nombre', direccion_cliente='$direccion', telefono_cliente='$telefono', email_cliente='$email' WHERE rfc_cliente='$cliente'";
        $resultado = mysqli_query($conexion, $modificar_cliente);

        echo "<script>alert('Mascota modificada con éxito.');</script>";
        header("Location:reporte_clientes.php");

        mysqli_close($conexion);
    }
?>