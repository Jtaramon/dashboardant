<?php

session_start();
error_reporting(0);

$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    echo 'Usted no tiene autorizacion';
}

session_destroy();
header("Location:index.php");

?>