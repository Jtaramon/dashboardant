<?php
//-------------------------------------------------TIPO VEHICULO------------------------------------------
// total de vehiculos
$sqla = "SELECT id_vehiculo FROM vehiculos";
$sqla = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Malacatos%'";
$totala = $mysqli->query($sqla);
$vlMA = mysqli_num_rows($totala);
// FIN total de vehiculos

// Vehiculos Livianos
$sql1a = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Malacatos%' AND tipo_vehiculo = 'Liviano'";
$total1a = $mysqli->query($sql1a);
$vl1MA = mysqli_num_rows($total1a);
// FIN vehiculos Ingresan

// Vehiculos Medianos
$sql2a = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Malacatos%' AND tipo_vehiculo = 'Mediano'";
$total2a = $mysqli->query($sql2a);
$vl2MA = mysqli_num_rows($total2a);
// FIN vehiculos Salida

// Vehiculos Medianos
$sql3a = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Malacatos%' AND tipo_vehiculo = 'Pesado'";
$total3a = $mysqli->query($sql3a);
$vl3MA = mysqli_num_rows($total3a);
// FIN vehiculos Salida
//-------------------------------------------------Evento VEHICULO------------------------------------------
// total de vehiculos INGRESA
$sql4a = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion = 'Malacatos - Loja'";
$total4a = $mysqli->query($sql4a);
$vl4MA = mysqli_num_rows($total4a);
// FIN total de vehiculos
// total de vehiculos Salen
$sql5a = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion = 'Loja - Malacatos'";
$total5a = $mysqli->query($sql5a);
$vl5MA = mysqli_num_rows($total5a);
// FIN total de vehiculos
?>