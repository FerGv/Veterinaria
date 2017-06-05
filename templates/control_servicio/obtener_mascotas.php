<?php
    if (!$_POST):
        header("Location:../form_login.php");
    else:
        include("../conexion.php");

        $cliente = $_POST['rfc_cliente'];
        $buscar_mascotas = "SELECT id_mascota, nombre_mascota FROM mascota WHERE rfc_cliente = '$cliente'";
        $resultado_mascotas = mysqli_query($conexion, $buscar_mascotas);

        $mascotas = "<option>Seleccione una mascota</option>";
        while($mascota = mysqli_fetch_assoc($resultado_mascotas)):
            $mascotas .= "<option value='$mascota[id_mascota]'>$mascota[nombre_mascota]</option>";
        endwhile;

        echo $mascotas;
    endif;
?>