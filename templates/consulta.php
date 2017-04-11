<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>prueba</title>
</head>
<body>
    <?php 
        session_start();
        include("conexion.php");
        $obtener_nombre = "SELECT * FROM mascota JOIN cliente WHERE cliente.rfc_cliente = mascota.rfc_cliente";
        $resultado = mysqli_query($conexion, $obtener_nombre);
        while($usuario = mysqli_fetch_assoc($resultado)) {
            foreach ($usuario as $key => $value) {
                echo "$key: $value <br>";
            }
            echo "<br>";
        }
    ?>
</body>
</html>