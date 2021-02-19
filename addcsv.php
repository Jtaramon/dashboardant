
<?php
require 'conexion.php';

function insertar_datos($fecha, $hora ,$velocidad,$tipo_vehiculo, $sentido_circulacion){
    global $conexion;
    $sentencia = "INSERT INTO vehiculos (fecha, hora, velocidad, tipo_vehiculo, sentido_circulacion) VALUES ('$fecha', '$hora', '$velocidad', '$tipo_vehiculo', '$sentido_circulacion')";
    $ejecutar = mysqli_query($conexion,$sentencia);
    return $ejecutar;
    echo '<script src="js/sweetAlert.js"></script>';
}
?>