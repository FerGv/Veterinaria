<?php
    session_start();

    if (!$_POST) {
        header("Location:login.html");
    }

    include("conexion.php");

    $rfc = $_POST['rfc'];
    $nombre = $_POST['nombre'];

    $buscar = "SELECT * FROM cliente WHERE rfc_cliente='$rfc' AND nombre_cliente='$nombre'";

    $resultado = mysqli_query($conexion, $buscar);
    $usuario = mysqli_fetch_assoc($resultado);

    if (!$resultado) {
        echo "Error";
    }
    else {
        // while($usuario = mysqli_fetch_assoc($resultado)){
        //     foreach ($usuario as $campo => $valor) {
        //         echo "$campo: $valor <br>";
        //     }
        // }
        $_SESSION['rfc'] = $usuario['rfc_cliente'];
        $_SESSION['nombre'] = $usuario['nombre_cliente'];
        header("Location:bienvenida.php");
    }

    mysqli_close($conexion);
?>