<?php
    if (!$_POST) {
        header("Location:form_modificar_medico.php");
    }
    elseif ((!$_POST['rfc']) || (!$_POST['nombre']) || (!$_POST['direccion']) || (!$_POST['telefono']) || (!$_POST['email'])) {
        header("Location:form_modificar_medico.php");
    }
    else {
        include("../conexion.php");

        $medico = $_GET['medico'];
        $rfc = $_POST['rfc'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $modificar_medico = "UPDATE medico SET rfc_medico='$rfc', nombre_medico='$nombre', direccion_medico='$direccion', telefono_medico='$telefono', email_medico='$email' WHERE rfc_medico='$medico'";
        $resultado = mysqli_query($conexion, $modificar_medico);

        echo "<script>alert('Mascota modificada con éxito.');</script>";
        header("Location:reporte_medicos.php");

        mysqli_close($conexion);
    }
?>