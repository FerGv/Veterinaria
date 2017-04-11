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
    <section class="wrap">
        <section class="contenido">
            <h1><?php echo "Bienvenido $nombre"; ?></h1>
            <br>
            <?php if ($_SESSION['tipo'] != 2) { ?>
                <a href="cliente/form_alta_cliente.php">Registrar cliente</a>
                <a href="medico/form_alta_medico.php">Registrar médico</a>
                <a href="mascota/form_alta_mascota.php">Registrar mascota</a>
                <a href="servicio/form_alta_servicio.php">Registrar servicio</a>
                <a href="cliente/reporte_clientes.php">Consultar clientes</a>
                <a href="medico/reporte_medicos.php">Consultar medicos</a>
                <a href="servicio/reporte_servicios.php">Consultar servicios</a>
            <?php } else {?>
                <a href="mascota/reporte_mascotas.php?cliente=<?php echo $_SESSION['nombre']; ?>">Consultar mascotas</a>
                <a href="#">Agendar cita</a>
                <a href="#">Consultar citas</a>
            <?php } ?>
            <br><br>
            <a href="logout.php">Cerrar sesión</a>
        </section>
    </section>
</body>
</html>