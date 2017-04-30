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

                $fecha = date('Y-m-d');
                $obtener_avisos = mysqli_query($conexion, "SELECT nombre_mascota FROM mascota, historial WHERE mascota.rfc_cliente='$_SESSION[nombre]' AND historial.id_mascota=mascota.id_mascota AND fechaseg_historial='$fecha'");
            }
            else {
                $nombre = $_SESSION['nombre'];
            }
        }
    ?>
</head>
<body>
    <header>
        <div class="header--menu">
            <input type="button" value="Menú" onclick="Mostrar_Slider()" class="header--menu__button">
            <div class="header--menu__slider" id="slider" style="left: -300px;">
                <?php if ($_SESSION['tipo'] != 2) { ?>
                    <ul>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Clientes()" value="Clientes">
                            <ul id="funciones_clientes" style="height: 0px">
                                <li><a href="cliente/form_alta_cliente.php" class="header--menu__link">Registrar cliente</a></li>
                                <li><a href="cliente/reporte_clientes.php" class="header--menu__link">Reporte clientes</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Consultas()" value="Consultas">
                            <ul id="funciones_consultas" style="height: 0px">
                                <li><a href="control_servicio/form_alta_control.php" class="header--menu__link">Registrar consulta</a></li>
                                <li><a href="control_servicio/reporte_control.php" class="header--menu__link">Reporte consultas</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Facturas()" value="Facturas">
                            <ul id="funciones_facturas" style="height: 0px">
                                <li><a href="factura/form_alta_factura.php" class="header--menu__link">Registrar factura</a></li>
                                <li><a href="factura/reporte_facturas.php" class="header--menu__link">Reporte facturas</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Mascotas()" value="Mascotas">
                            <ul id="funciones_mascotas" style="height: 0px">
                                <li><a href="mascota/form_alta_mascota.php" class="header--menu__link">Registrar mascota</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Medicos()" value="Médicos">
                            <ul id="funciones_medicos" style="height: 0px">
                                <li><a href="medico/form_alta_medico.php" class="header--menu__link">Registrar médico</a></li>
                                <li><a href="medico/reporte_medicos.php" class="header--menu__link">Reporte medicos</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Servicios()" value="Servicios">
                            <ul id="funciones_servicios" style="height: 0px">
                                <li><a href="servicio/form_alta_servicio.php" class="header--menu__link">Registrar servicio</a></li>
                                <li><a href="servicio/reporte_servicios.php" class="header--menu__link">Reporte servicios</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } else {?>
                <ul>
                    <li class="categoria">
                        <a href="mascota/reporte_mascotas.php?cliente=<?php echo $_SESSION['nombre']; ?>" class="header--menu__link">Consultar mascotas</a>
                    </li>
                    <li class="categoria">
                        <a href="cita/form_alta_cita.php" class="header--menu__link">Agendar cita</a>
                        <a href="cita/reporte_citas.php" class="header--menu__link">Consultar citas</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
        <div class="header--title">
            <a href="bienvenida.php" class="header--title__name">Veterinaria</a>
        </div>
        <div class="header--nav">
           <a href="logout.php" class="header--nav__link">Cerrar Sesión</a>
        </div>
    </header>
    <section class="wrap" id="wrap">
        <section class="contenido"  id="contenido">
            <h1 class="contenido__title"><?php echo "Bienvenido<br>$nombre"; ?></h1>
            <br>
            <?php if ($_SESSION['tipo'] != 2) { ?>
                <a href="cliente/form_alta_cliente.php" class="contenido__link create">Registrar cliente</a>
                <a href="medico/form_alta_medico.php" class="contenido__link create">Registrar médico</a>
                <a href="mascota/form_alta_mascota.php" class="contenido__link create">Registrar mascota</a>
                <a href="servicio/form_alta_servicio.php" class="contenido__link create">Registrar servicio</a>
                <a href="control_servicio/form_alta_control.php" class="contenido__link create">Registrar consulta</a>
                <a href="cliente/reporte_clientes.php" class="contenido__link report">Reporte clientes</a>
                <a href="medico/reporte_medicos.php" class="contenido__link report">Reporte medicos</a>
                <a href="servicio/reporte_servicios.php" class="contenido__link report">Reporte servicios</a>
                <a href="control_servicio/reporte_control.php" class="contenido__link report">Reporte consultas</a>
            <?php } else {
                    if (mysqli_num_rows($obtener_avisos) > 0) { 
                        while($nombre_mascota = mysqli_fetch_assoc($obtener_avisos)) { ?>
                        <div class="notification">
                            <h1 class="notification__title">Avisos:</h1>
                            <p class="notification__item"><b><?php echo $nombre_mascota['nombre_mascota']; ?></b> tiene una cita hoy</p>
                            <br><br>
                        </div>
                    <?php } } ?>
                <a href="mascota/reporte_mascotas.php?cliente=<?php echo $_SESSION['nombre']; ?>" class="contenido__link report">Consultar mascotas</a>
                <a href="cita/form_alta_cita.php" class="contenido__link create">Agendar cita</a>
                <a href="cita/reporte_citas.php" class="contenido__link report">Consultar citas</a>
            <?php } ?>
        </section>
    </section>
    <footer>
        <div class="copy">
            <a href="innovasoft.html">&copy Innovasoft 2017</a>
        </div>
    </footer>

    <script src="../js/funciones.js"></script>
</body>
</html>