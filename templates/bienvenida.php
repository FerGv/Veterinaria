<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <?php 
        session_start();
        if (!$_SESSION) {
            header("Location:login.html");
        }
    ?>
</head>
<body>
    <h1><?php echo "Bienvenido $_SESSION[nombre]"; ?></h1>
    <br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>