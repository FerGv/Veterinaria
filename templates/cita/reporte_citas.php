<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] != 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $buscar_citas = "SELECT nombre_mascota,fechaseg_historial FROM mascota, historial WHERE mascota.rfc_cliente='$_SESSION[nombre]' AND historial.id_mascota=mascota.id_mascota ORDER BY fechaseg_historial ASC";
        $resultado = mysqli_query($conexion, $buscar_citas);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte citas</title>
    <link rel="stylesheet" href="../../css/style.css">
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
                                <li><a href="..cliente/form_alta_cliente.php" class="header--menu__link">Registrar cliente</a></li>
                                <li><a href="..cliente/reporte_clientes.php" class="header--menu__link">Reporte clientes</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Consultas()" value="Consultas">
                            <ul id="funciones_consultas" style="height: 0px">
                                <li><a href="../control_servicio/form_alta_control.php" class="header--menu__link">Registrar consulta</a></li>
                                <li><a href="../control_servicio/reporte_control.php" class="header--menu__link">Reporte consultas</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Facturas()" value="Facturas">
                            <ul id="funciones_facturas" style="height: 0px">
                                <li><a href="../factura/form_alta_factura.php" class="header--menu__link">Registrar factura</a></li>
                                <li><a href="../factura/reporte_facturas.php" class="header--menu__link">Reporte facturas</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Mascotas()" value="Mascotas">
                            <ul id="funciones_mascotas" style="height: 0px">
                                <li><a href="../mascota/form_alta_mascota.php" class="header--menu__link">Registrar mascota</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Medicos()" value="Médicos">
                            <ul id="funciones_medicos" style="height: 0px">
                                <li><a href="../medico/form_alta_medico.php" class="header--menu__link">Registrar médico</a></li>
                                <li><a href="../medico/reporte_medicos.php" class="header--menu__link">Reporte medicos</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Servicios()" value="Servicios">
                            <ul id="funciones_servicios" style="height: 0px">
                                <li><a href="../servicio/form_alta_servicio.php" class="header--menu__link">Registrar servicio</a></li>
                                <li><a href="../servicio/reporte_servicios.php" class="header--menu__link">Reporte servicios</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } else {?>
                <ul>
                    <li class="categoria">
                        <a href="../mascota/reporte_mascotas.php?cliente=<?php echo $_SESSION['nombre']; ?>" class="header--menu__link">Consultar mascotas</a>
                    </li>
                    <li class="categoria">
                        <a href="form_alta_cita.php" class="header--menu__link">Agendar cita</a>
                        <a href="reporte_citas.php" class="header--menu__link">Consultar citas</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
        <div class="header--title">
            <a href="../bienvenida.php" class="header--title__name">Veterinaria</a>
        </div>
        <div class="header--nav">
           <a href="../logout.php" class="header--nav__link">Cerrar Sesión</a>
        </div>
    </header>
    <section class="wrap" id="wrap">
        <h1 class="wrap__title">Citas</h1>
        <?php 
            while($cita = mysqli_fetch_assoc($resultado)) {
            $cita_fecha = $cita['fechaseg_historial'];
            $cita_dia = $cita_fecha[8].$cita_fecha[9];
            $cita_mes = $cita_fecha[5].$cita_fecha[6];
            $cita_anio = $cita_fecha[0].$cita_fecha[1].$cita_fecha[2].$cita_fecha[3];
            $hoy = date('Y-m-d');
            $hoy_dia = $hoy[8].$hoy[9];
            $hoy_mes = $hoy[5].$hoy[6];
            $hoy_anio = $hoy[0].$hoy[1].$hoy[2].$hoy[3];
            if ($hoy_anio <= $cita_anio && $hoy_mes <= $cita_mes) {
        ?>
            <div class="card">
                <div class="card--title">
                    <h1 class="card--title__name"><?php echo $cita['nombre_mascota'] ?></h1>
                </div>
                <p class="card__data">Fecha: <?php echo $cita['fechaseg_historial'] ?></p>
            </div>
        <?php
            } }
            mysqli_close($conexion);
        ?>
    </section>
    <footer>
        <div class="copy">
            <a href="../innovasoft.html">&copy Innovasoft 2017</a>
        </div>
    </footer>

    <script src="../../js/funciones.js"></script>
</body>
</html>