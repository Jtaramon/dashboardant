<?php
//-------------------------------------------------TIPO VEHICULO------------------------------------------
// total de vehiculos
$sqlCA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND via = 'Catamayo'";
$totalCA = $mysqli->query($sqlCA);
$vlCA = mysqli_num_rows($totalCA);
// FIN total de vehiculos

// Vehiculos Livianos
$sql1CA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND via = 'Catamayo' AND tipo_vehiculo = 'Vehículo Liviano'";
$total1CA = $mysqli->query($sql1CA);
$vl1CA = mysqli_num_rows($total1CA);
// FIN vehiculos Ingresan

// Vehiculos Medianos
$sql2CA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND via = 'Catamayo' AND tipo_vehiculo = 'Vehículo Mediano'";
$total2CA = $mysqli->query($sql2CA);
$vl2CA = mysqli_num_rows($total2CA);
// FIN vehiculos Salida

// Vehiculos Medianos
$sql3CA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND via = 'Catamayo' AND tipo_vehiculo = 'Vehículo Pesado'";
$total3CA = $mysqli->query($sql3CA);
$vl3CA = mysqli_num_rows($total3CA);
// FIN vehiculos Salida
//-------------------------------------------------Evento VEHICULO------------------------------------------
// total de vehiculos INGRESA
$sql4CA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND via = 'Catamayo' AND evento = 'Ingreso'";
$total4CA = $mysqli->query($sql4CA);
$vl4CA = mysqli_num_rows($total4CA);
// FIN total de vehiculos
// total de vehiculos Salen
$sql5CA = "SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '$fecha_antes' AND '$fecha_actual' AND via = 'Catamayo' AND evento = 'Salida'";
$total5CA = $mysqli->query($sql5CA);
$vl5CA = mysqli_num_rows($total5CA);
// FIN total de vehiculos
?>