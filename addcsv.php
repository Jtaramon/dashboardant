
<?php
require 'conexion.php';

function insertar_datos($evento, $tipo_vehiculo, $velocidad, $fecha, $hora){
    global $conexion;
    $sentencia = "INSERT INTO vehiculos (evento, tipo_vehiculo, velocidad, fecha, hora) VALUES ('$evento', '$tipo_vehiculo', $velocidad, '$fecha', '$hora')";
    $ejecutar = mysqli_query($conexion,$sentencia);
    return $ejecutar;
    echo '<script src="js/sweetAlert.js"></script>';
}
?>