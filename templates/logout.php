<?php 
    session_start();
    if ($_SESSION['nombre']) {
        session_destroy();
        header("Location:../index.html");
    }
    else {
        header("Location:login.html");
    }
?>