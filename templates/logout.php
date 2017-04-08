<?php 
    session_start();
    if ($_SESSION['rfc']) {
        session_destroy();
        header("Location:../index.html");
    }
?>