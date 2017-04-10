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
        <a href="form_alta_cliente.php">Registrar cliente</a>
        <a href="form_alta_mascota.php">Registrar mascota</a>
        <a href="reporte_clientes.php">Consultar clientes</a>
    <?php } else {?>
        <a href="reporte_mascotas.php?cliente=<?php echo $_SESSION['nombre']; ?>">Consultar mascotas</a>
        <a href="#">Agendar cita</a>
        <a href="#">Consultar citas</a>
    <?php } ?>
    <br><br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>