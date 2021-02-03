<?php
    session_start();
    if (!$_POST) {
        header("Location:../form_login.php");
    }
    elseif ((!$_POST['id_mascota']) || (!$_POST['fecha_cita'])) {
        header("Location:form_alta_cita.php");
    }
    else {
        include("../conexion.php");

        $id_mascota = $_POST['id_mascota'];
        $fecha_cita = $_POST['fecha_cita'];

        $crear_cita = "INSERT INTO cita(fecha_cita, id_mascota) VALUES ('$fecha_cita', $id_mascota)";
        $resultado_cita = mysqli_query($conexion, $crear_cita);

        // echo "<script>alert('Cita registrada con éxito.');</script>";
        header("Location:reporte_citas.php");

        mysqli_close($conexion);
    }
?>
