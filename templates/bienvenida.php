<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <?php 
        session_start();
        if (!$_SESSION) {
            header("Location:login.html");
        }
        else {
            include("conexion.php");
            if ($_SESSION['tipo'] == 2) {
                $obtener_nombre = "SELECT * FROM cliente WHERE rfc_cliente='$_SESSION[nombre]'";
                $resultado = mysqli_query($conexion, $obtener_nombre);
                $usuario = mysqli_fetch_assoc($resultado);
                $nombre = $usuario['nombre_cliente'];
            }
            else {
                $nombre = $_SESSION['nombre'];
            }
        }
    ?>
</head>
<body>
    <h1><?php echo "Bienvenido $nombre"; ?></h1>
    <br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>