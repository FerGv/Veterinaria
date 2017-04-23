<?php
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");

        $control = $_GET['control'];
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        // $buscar_cliente = mysqli_query($conexion, "SELECT * FROM cliente WHERE rfc_cliente='$rfc'");
        // if (mysqli_num_rows($buscar_cliente) > 0) {
        //     echo "<script>
        //             alert('RFC ya existente');
        //             window.history.go(-1);
        //         </script>";
        //     exit;
        // }

        $crear_factura = "INSERT INTO factura(fecha_factura, hora_factura, clave_control_servicio) VALUES ('$fecha', '$hora', '$control')";
        $resultado_factura = mysqli_query($conexion, $crear_factura);

        echo "<script>alert('Factura registrada con éxito.');</script>";
        header("Location:reporte_facturas.php");

        mysqli_close($conexion);
    }
?>