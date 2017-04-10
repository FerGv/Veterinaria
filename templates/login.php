<?php
    session_start();

    if (!$_POST) {
        header("Location:form_login.php");
    }
    elseif ((!$_POST['nombre']) || (!$_POST['pass'])) {
        header("Location:form_login.php");
    }
    else {
        include("conexion.php");

        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];

        $buscar = "SELECT * FROM usuario WHERE nombre_usuario='$nombre' AND pass_usuario='$pass'";

        $resultado = mysqli_query($conexion, $buscar);

        if (mysqli_num_rows($resultado) == 0) {
            echo "<script>
                    alert('Datos incorrectos');
                    window.history.go(-1);
                </script>";
            exit;
        }
        else {
            $usuario = mysqli_fetch_assoc($resultado);
            $_SESSION['nombre'] = $usuario['nombre_usuario'];
            $_SESSION['tipo'] = $usuario['tipo_usuario'];
            header("Location:bienvenida.php");
        }

        mysqli_close($conexion);
    }
?>