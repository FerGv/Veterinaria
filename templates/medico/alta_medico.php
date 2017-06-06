<?php
    if (!$_POST) {
        header("Location:../form_login.php");
    }
    elseif ((!$_POST['rfc']) || (!$_POST['nombre']) || (!$_POST['direccion']) || (!$_POST['telefono']) || (!$_POST['email'])) {
        header("Location:form_alta_medico.php");
    }
    else {
        include("../conexion.php");

        $rfc = $_POST['rfc'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $buscar_medico = mysqli_query($conexion, "SELECT * FROM medico WHERE rfc_medico='$rfc'");
        if (mysqli_num_rows($buscar_medico) > 0) {
            echo "<script>
                    alert('RFC ya existente');
                    window.history.go(-1);
                </script>";
            exit;
        }

        $crear_medico = "INSERT INTO medico VALUES ('$rfc', '$nombre', '$direccion', $telefono, '$email', 1)";
        $crear_usuario = "INSERT INTO usuario VALUES ('$rfc', 'veterinaria123', 2)";
        $resultado_medico = mysqli_query($conexion, $crear_medico);
        $resultado_usuario = mysqli_query($conexion, $crear_usuario);

        echo "<script>alert('Médico registrado con éxito.');</script>";
        header("Location:reporte_medicos.php");

        mysqli_close($conexion);
    }
?>