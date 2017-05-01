<?php
    session_start();
    if (!$_POST) {
        header("Location:../form_login.php");
    }
    elseif ((!$_POST['nombre_mascota']) || (!$_POST['fecha_cita'])) {
        header("Location:form_alta_cita.php");
    }
    else {
        include("../conexion.php");

        $nombre_mascota = $_POST['nombre_mascota'];
        $fecha_cita = $_POST['fecha_cita'];

        $buscar_mascota = mysqli_query($conexion, "SELECT id_mascota FROM mascota WHERE nombre_mascota='$nombre_mascota' AND rfc_cliente='$_SESSION[nombre]'");
        if (mysqli_num_rows($buscar_mascota) == 0) {
            echo "<script>
                    alert('No se encontró la mascota');
                    window.history.go(-1);
                </script>";
            exit;
        }

        $mascota = mysqli_fetch_assoc($buscar_mascota);
        $crear_cita = "INSERT INTO cita(fecha_cita, id_mascota) VALUES ('$fecha_cita', '$mascota[id_mascota]')";
        $resultado_cita = mysqli_query($conexion, $crear_cita);

        echo "<script>alert('Cita registrada con éxito.');</script>";
        header("Location:reporte_citas.php");

        mysqli_close($conexion);
    }
?>