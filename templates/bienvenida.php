<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="../css/style.css">
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
            <h1 class="contenido__title"><?php echo "Bienvenido $nombre"; ?></h1>
            <br>
            <?php if ($_SESSION['tipo'] != 2) { ?>
                <a href="cliente/form_alta_cliente.php" class="contenido__link create">Registrar cliente</a>
                <a href="medico/form_alta_medico.php" class="contenido__link create">Registrar médico</a>
                <a href="mascota/form_alta_mascota.php" class="contenido__link create">Registrar mascota</a>
                <a href="servicio/form_alta_servicio.php" class="contenido__link create">Registrar servicio</a>
                <a href="cliente/reporte_clientes.php" class="contenido__link report">Consultar clientes</a>
                <a href="medico/reporte_medicos.php" class="contenido__link report">Consultar medicos</a>
                <a href="servicio/reporte_servicios.php" class="contenido__link report">Consultar servicios</a>
            <?php } else {?>
                <a href="mascota/reporte_mascotas.php?cliente=<?php echo $_SESSION['nombre']; ?>" class="contenido__link report">Consultar mascotas</a>
                <a href="#" class="contenido__link">Agendar cita</a>
                <a href="#" class="contenido__link report">Consultar citas</a>
            <?php } ?>
            <br><br>
            <a href="logout.php" class="contenido__link logout">Cerrar sesión</a>
        </section>
    </section>
</body>
</html>