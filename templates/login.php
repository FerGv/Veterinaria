<?php
    session_start();

    if (!$_POST) {
        header("Location:login.html");
    }

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
        // while($usuario = mysqli_fetch_assoc($resultado)){
        //     foreach ($usuario as $campo => $valor) {
        //         echo "$campo: $valor <br>";
        //     }
        // }
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['id'] = $usuario['id_usuario'];
        $_SESSION['nombre'] = $usuario['nombre_usuario'];
        header("Location:bienvenida.php");
    }

    mysqli_close($conexion);
?>