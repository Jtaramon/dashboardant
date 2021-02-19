<?php
//-------------------------------------------------TIPO VEHICULO------------------------------------------
// total de vehiculos
$sql = "SELECT id_vehiculo FROM vehiculos";
$sql = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Cuenca%' ";
$total = $mysqli->query($sql);
$vl = mysqli_num_rows($total);
// FIN total de vehiculos

// Vehiculos Livianos
$sql1 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Cuenca%'  AND tipo_vehiculo = 'Liviano'";
$total1 = $mysqli->query($sql1);
$vl1 = mysqli_num_rows($total1);
// FIN vehiculos Ingresan

// Vehiculos Medianos
$sql2 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Cuenca%'  AND tipo_vehiculo = 'Mediano'";
$total2 = $mysqli->query($sql2);
$vl2 = mysqli_num_rows($total2);
// FIN vehiculos Salida

// Vehiculos Medianos
$sql3 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion LIKE '%Cuenca%'  AND tipo_vehiculo = 'Pesado'";
$total3 = $mysqli->query($sql3);
$vl3 = mysqli_num_rows($total3);
// FIN vehiculos Salida
//-------------------------------------------------Evento VEHICULO------------------------------------------
// total de vehiculos INGRESA
$sql4 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion = 'Cuenca - Loja' ";
$total4 = $mysqli->query($sql4);
$vl4 = mysqli_num_rows($total4);
// FIN total de vehiculos
// total de vehiculos Salen
$sql5 = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND sentido_circulacion = 'Loja - Cuenca' ";
$total5 = $mysqli->query($sql5);
$vl5 = mysqli_num_rows($total5);
// FIN total de vehiculos
?>