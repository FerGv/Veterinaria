<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <?php 
        session_start();
        if (!$_SESSION) {
            header("Location:form_login.php");
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
    <?php if ($_SESSION['tipo'] != 2) { ?>
        <a href="form_cliente.php">Registrar cliente</a>
        <a href="form_mascota.php">Registrar mascota</a>
        <a href="form_reporte.php">Consultar clientes</a>
        <br><br>
    <?php } ?>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>