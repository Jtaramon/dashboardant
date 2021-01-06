-- Insertar
INSERT INTO `vehiculos` (`id_vehiculo`, `evento`, `tipo_vehiculo`, `velocidad`, `fecha`, `hora`, `via`) VALUES (NULL, 'Ingreso', 'VehÃ­culo Liviano', '60', '4/1/2021', '00:12:00', 'Cuenca');
--Obtener datos 
SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '4/1/2021' AND '6/1/2021';
SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '4/1/2021' AND '6/1/2021' AND via = 'Cuenca';
SELECT id_vehiculo FROM vehiculos WHERE fecha BETWEEN '4/1/2021' AND '6/1/2021' AND via = 'Cuenca' AND tipo_vehiculo = "VehÃ­culo Liviano"