<?php 
    session_start();
    if ($_SESSION['nombre']) {
        session_destroy();
        header("Location:form_login.html");
    }
    else {
        header("Location:form_login.php");
    }
?>