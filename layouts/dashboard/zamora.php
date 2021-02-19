<?php
//-------------------------------------------------TIPO VEHICULO------------------------------------------
// total de vehiculos
$sqlZA = "SELECT id_vehiculo FROM vehiculos";
$sqlZA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Zamora%'";
$totalZA = $mysqli->query($sqlZA);
$vlZA = mysqli_num_rows($totalZA);
// FIN total de vehiculos

// Vehiculos Livianos
$sql1ZA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Zamora%' AND tipo_vehiculo = 'Liviano'";
$total1ZA = $mysqli->query($sql1ZA);
$vl1ZA = mysqli_num_rows($total1ZA);
// FIN vehiculos Ingresan

// Vehiculos Medianos
$sql2ZA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Zamora%' AND tipo_vehiculo = 'Mediano'";
$total2ZA = $mysqli->query($sql2ZA);
$vl2ZA = mysqli_num_rows($total2ZA);
// FIN vehiculos Salida

// Vehiculos Medianos
$sql3ZA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Zamora%' AND tipo_vehiculo = 'Pesado'";
$total3ZA = $mysqli->query($sql3ZA);
$vl3ZA = mysqli_num_rows($total3ZA);
// FIN vehiculos Salida
//-------------------------------------------------Evento VEHICULO------------------------------------------
// total de vehiculos INGRESA
$sql4ZA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion = 'Zamora - Loja'";
$total4ZA = $mysqli->query($sql4ZA);
$vl4ZA = mysqli_num_rows($total4ZA);
// FIN total de vehiculos
// total de vehiculos Salen
$sql5ZA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion = 'Loja - Zamora'";
$total5ZA = $mysqli->query($sql5ZA);
$vl5ZA = mysqli_num_rows($total5ZA);
// FIN total de vehiculos
?>