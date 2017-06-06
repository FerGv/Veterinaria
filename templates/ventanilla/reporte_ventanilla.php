<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] != 0) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $buscar_empleados = "SELECT * FROM empleado WHERE estado_empleado = 1";
        $resultado = mysqli_query($conexion, $buscar_empleados);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte empleados</title>
    <link rel="stylesheet" href="../../css/animate.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/fonts/styles.css">
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
                                <li><a href="form_alta_cliente.php" class="header--menu__link">Registrar cliente</a></li>
                                <li><a href="reporte_clientes.php" class="header--menu__link">Reporte clientes</a></li>
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
                        <a href="../cita/form_alta_cita.php" class="header--menu__link">Agendar cita</a>
                        <a href="../cita/reporte_citas.php" class="header--menu__link">Consultar citas</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
        <div class="header--title">
            <a href="../bienvenida.php" class="header--title__name">Veterinaria</a>
        </div>
        <div class="header--nav">
           <a href="../logout.php" class="header--nav__link"><i class="icon-logout"></i></a>
        </div>
    </header>
    <section class="wrap animated bounceInRight" id="wrap">
        <h1 class="wrap__title">Empleados</h1>
        <?php 
            if (mysqli_num_rows($resultado) == 0) {
                echo "<h1>Sin empleados</h1>";
            } else {
                while($empleado = mysqli_fetch_assoc($resultado)) {
        ?>
            <div class="card">
                <div class="card--title">
                    <a href="../mascota/reporte_mascotas.php?empleado=<?php echo $empleado['rfc_empleado'] ?>"><h1 class="card--title__name"><?php echo $empleado['nombre_empleado'] ?></h1></a>
                    <?php if ($_SESSION['tipo'] != 2) { ?>
                        <nav class="card--title__menu">
                            <a href="form_modificar_empleado.php?empleado=<?php echo $empleado['rfc_empleado'] ?>" class="card--title__item"><i class="icon-edit"></i></a>
                            <a href="eliminar_empleado.php?empleado=<?php echo $empleado['rfc_empleado'] ?>" onclick="return Confirmar_Eliminar()" class="card--title__item"><i class="icon-delete"></i></a>
                        </nav>
                    <?php } ?>
                </div>
                <p class="card__data"><b>RFC:</b> <?php echo $empleado['rfc_empleado'] ?></p>
                <p class="card__data"><b>Dirección:</b> <?php echo $empleado['direccion_empleado'] ?></p>
                <p class="card__data"><b>Teléfono:</b> <?php echo $empleado['telefono_empleado'] ?></p>
                <p class="card__data"><b>Email:</b> <?php echo $empleado['email_empleado'] ?></p>
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