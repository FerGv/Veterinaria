<?php 
    session_start();
    if (!$_SESSION || $_SESSION['tipo'] == 2) {
        header("Location:form_login.php");
    }
    else {
        include("conexion.php");
        $rfc_cliente = $_GET['cliente'];
        $buscar_cliente = "SELECT * FROM cliente WHERE rfc_cliente='$rfc_cliente'";
        $resultado = mysqli_query($conexion, $buscar_cliente);
        $cliente = mysqli_fetch_assoc($resultado);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <form action="modificar_cliente.php?cliente=<?php echo $rfc_cliente ?>" method="post">
        <h1 class="form__title">Cliente</h1>
        <input type="text" name="rfc" placeholder="RFC" required class="form__input" autofocus value="<?php echo $cliente['rfc_cliente'] ?>"><br>
        <input type="text" name="nombre" placeholder="Nombre Completo" required class="form__input" value="<?php echo $cliente['nombre_cliente'] ?>"><br>
        <input type="text" name="direccion" placeholder="Dirección" required class="form__input" value="<?php echo $cliente['direccion_cliente'] ?>"><br>
        <input type="text" name="telefono" placeholder="Teléfono" required class="form__input" value="<?php echo $cliente['telefono_cliente'] ?>"><br>
        <input type="email" name="email" placeholder="Correo electrónico" required class="form__input" value="<?php echo $cliente['email_cliente'] ?>"><br>
        <input type="submit" value="Registrar" class="form__submit">
    </form>
</body>
</html>