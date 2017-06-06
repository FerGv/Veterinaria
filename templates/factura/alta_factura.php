<?php
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        require 'fpdf/fpdf.php';

        $control = $_GET['control'];
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $crear_factura = "INSERT INTO factura(fecha_factura, hora_factura, clave_control_servicio) VALUES ('$fecha', '$hora', '$control')";
        $resultado_factura = mysqli_query($conexion, $crear_factura);
        
        $buscar_datos = "SELECT nombre_cliente, nombre_mascota, nombre_medico FROM control_servicio, mascota, cliente, medico WHERE control_servicio.clave_control_servicio = $control AND control_servicio.id_mascota = mascota.id_mascota AND mascota.rfc_cliente = cliente.rfc_cliente AND control_servicio.rfc_medico = medico.rfc_medico";
        $resultado_datos = mysqli_query($conexion, $buscar_datos);
        $datos = mysqli_fetch_assoc($resultado_datos);


        $data_cliente = "Cliente: $datos[nombre_cliente]";
        $data_mascota = "Mascota: $datos[nombre_mascota]";
        $data_medico = "Médico: $datos[nombre_medico]";
        $data_servicios = "Servicios: ";

        $buscar_servicios = "SELECT descripcion_servicio FROM control_servicio_servicio, servicio WHERE control_servicio_servicio.clave_servicio = servicio.clave_servicio AND control_servicio_servicio.clave_control_servicio = $control";
        $resultado_servicio = mysqli_query($conexion, $buscar_servicios);
        while($servicio = mysqli_fetch_assoc($resultado_servicio)) { 
            $data_servicios .= "$servicio[descripcion_servicio], ";
        }

        $data_fecha = "Fecha: $fecha";
        $data_hora = "Hora: $hora";

        $data_cliente = iconv('UTF-8', 'windows-1252', $data_cliente);
        $data_mascota = iconv('UTF-8', 'windows-1252', $data_mascota);
        $data_medico = iconv('UTF-8', 'windows-1252', $data_medico);
        $data_servicios = iconv('UTF-8', 'windows-1252', $data_servicios);

        $pdf = new FPDF();
        $pdf -> AddPage();
        $pdf -> SetFont('Arial', 'I', '15');
        $pdf -> Image('../../img/logo3.png',70,15,80);
        $pdf -> SetY(80);
        $pdf -> MultiCell(190, 20, $data_cliente, 0, 'L', 0);
        $pdf -> MultiCell(190, 20, $data_mascota, 0, 'L', 0);
        $pdf -> MultiCell(190, 20, $data_medico, 0, 'L', 0);
        $pdf -> MultiCell(190, 20, $data_servicios, 0, 'L', 0);
        $pdf -> SetY(230);
        $pdf -> Cell(70, 10, $data_fecha, 0, 1, 'L');
        $pdf -> Cell(70, 10, $data_hora, 0, 0, 'L');
        $pdf -> Image('../../img/qr.jpg',140,200,50);
        $pdf -> Output();

        // echo "<script>alert('Factura registrada con éxito.');</script>";
        // header("Location:reporte_facturas.php");

        mysqli_close($conexion);
    }
?>