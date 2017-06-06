<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:../form_login.php");
    }
    else {
        include("../conexion.php");
        $clave_control = $_GET['control'];
        $cita = $_GET['cita'];
        $buscar_control = "SELECT * FROM control_servicio WHERE clave_control_servicio='$clave_control'";
        $resultado_control = mysqli_query($conexion, $buscar_control);
        $control = mysqli_fetch_assoc($resultado_control);

        $buscar_servicios = "SELECT * FROM servicio";
        $resultado_servicio = mysqli_query($conexion, $buscar_servicios);

        $buscar_mascota = mysqli_query($conexion, "SELECT * FROM control_servicio, mascota WHERE clave_control_servicio = '$clave_control' AND mascota.id_mascota = control_servicio.id_mascota"); 
        $mascota = mysqli_fetch_assoc($buscar_mascota);

        $buscar_historial = mysqli_query($conexion, "SELECT fechaseg_historial AS fecha_seg FROM historial,control_servicio WHERE historial.clave_control_servicio = '$clave_control'"); 
        $historial = mysqli_fetch_assoc($buscar_historial);

        $buscar_clientes = "SELECT rfc_cliente FROM cliente WHERE estado_cliente = 1";
        $resultado_clientes = mysqli_query($conexion, $buscar_clientes);
        $buscar_medicos = "SELECT rfc_medico FROM medico WHERE estado_medico = 1";
        $resultado_medicos = mysqli_query($conexion, $buscar_medicos);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
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
                                <li><a href="../cliente/form_alta_cliente.php" class="header--menu__link">Registrar cliente</a></li>
                                <li><a href="../cliente/reporte_clientes.php" class="header--menu__link">Reporte clientes</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <input type="button" class="header--menu__link" onclick="Mostrar_Consultas()" value="Consultas">
                            <ul id="funciones_consultas" style="height: 0px">
                                <li><a href="form_alta_control.php" class="header--menu__link">Registrar consulta</a></li>
                                <li><a href="reporte_control.php" class="header--menu__link">Reporte consultas</a></li>
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
        <form action="modificar_control.php?control=<?php echo $clave_control ?>&cita=<?php echo $cita ?>" method="post">
            <h1 class="form__title">Consulta</h1>

            <select required class="form__input" id="combo_clientes" name="rfc_cliente">
                <?php 
                    echo "<option>Seleccione un cliente</option>";
                    echo "<option value="$mascota[rfc_cliente]" selected>$mascota[rfc_cliente]</option>";
                    while($cliente = mysqli_fetch_assoc($resultado_clientes)): 
                ?>
                        <option value="<?php echo $cliente['rfc_cliente'] ?>"><?php echo $cliente['rfc_cliente'] ?></option>
                <?php endwhile; ?>
            </select>
            <select required class="form__input" id="combo_mascotas" name="nombre_mascota">
                <?php 
                    echo "<option>Seleccione una mascota</option>";
                    echo "<option value="$mascota[id_mascota]" selected>$mascota[nombre_mascota]</option>";
                ?>
            </select>
            <select required class="form__input" name="rfc_medico">
                <?php 
                    echo "<option>Seleccione un medico</option>";
                    echo "<option value="$control[rfc_medico]" selected>$control[rfc_medico]</option>";
                    while($medico = mysqli_fetch_assoc($resultado_medicos)): 
                ?>
                        <option value="<?php echo $medico['rfc_medico'] ?>"><?php echo $medico['rfc_medico'] ?></option>
                <?php endwhile; ?>
            </select>
            <div class="date">
                <label for="fecha" class="date__label control__label">Próxima consulta</label>
                <input type="date" name="fecha_seguimiento" id="fecha" class="date__input control__input" value="<?php echo $historial['fecha_seg'] ?>">
            </div><br>
            <div class="service">
            <?php 
                while($servicio = mysqli_fetch_assoc($resultado_servicio)) {
                    $buscar_servicio = mysqli_query($conexion, "SELECT * FROM control_servicio_servicio WHERE clave_servicio='$servicio[clave_servicio]' AND clave_control_servicio='$clave_control'");
            ?>
                <input type="checkbox" name="servicios[]" id="<?php echo "check$servicio[clave_servicio]" ?>" value="<?php echo "$servicio[clave_servicio]" ?>" class="service__checkbox" <?php if (mysqli_num_rows($buscar_servicio) > 0) {echo "checked";} ?>>
                <label for="<?php echo "check$servicio[clave_servicio]" ?>" class="service__label"><?php echo $servicio['descripcion_servicio'] ?></label>
            <?php
                }
                mysqli_close($conexion);
            ?></div><br>
            <input type="submit" value="Registrar" class="form__button">
        </form>
    </section>
    <footer>
        <div class="copy">
            <a href="../innovasoft.html">&copy Innovasoft 2017</a>
        </div>
    </footer>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/funciones.js"></script>
    <script>
        $(document).ready(function(){
            $("#combo_clientes").change(function () {
                $("#combo_clientes option:selected").each(function () {
                    var rfc_cliente = $(this).val();
                    $.post("obtener_mascotas.php", { rfc_cliente: rfc_cliente }, function(data){
                        $("#combo_mascotas").html(data);
                    });            
                });
            })
        });

        var fecha = document.getElementById('fecha_seguimiento');
        fecha.addEventListener('change', ValidarAnterior);

        function ValidarAnterior(){
            var fecha_hoy = new Date();
            var fecha_array = fecha.value.split('-');
            var fecha_formateada = new Date(fecha_array[0], fecha_array[1] - 1, fecha_array[2]);
            if (fecha_formateada < fecha_hoy) {
                alert("No puedes seleccionar una fecha anterior al día de hoy");
                fecha.onfocus();
                return false;
            }
        }
    </script>
</body>
</html>