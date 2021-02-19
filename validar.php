<?php

session_start();
require_once 'conexion.php';

    $user = $_POST['usuario'];
    $_SESSION['usuario'] = $user;
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM users WHERE username='$user' and password='$pass'";
    $result = mysqli_query($conexion, $sql);
    
    $rows = mysqli_num_rows($result);

    if ($rows>0) {
        header("location:dashboard.php");    
    }else{
        echo "Error en la autentificación";
    }

    mysqli_free_result($result);
    mysqli_close($conexion);
    
?>