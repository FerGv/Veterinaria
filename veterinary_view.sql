-- ---------------------------------------------------------------------
-- Inserción de datos
-- ---------------------------------------------------------------------
INSERT INTO usuario VALUES ('admin', '123', 0);

-- ---------------------------------------------------------------------
-- Mostrar todas las tablas
-- ---------------------------------------------------------------------
SHOW TABLES;

-- ---------------------------------------------------------------------
-- Mostrar todos los registros de las tablas
-- ---------------------------------------------------------------------
SELECT * FROM cita;
SELECT * FROM cliente;
SELECT * FROM control_servicio;
SELECT * FROM control_servicio_servicio;
SELECT * FROM empleado;
SELECT * FROM factura;
SELECT * FROM historial;
SELECT * FROM mascota;
SELECT * FROM medico;
SELECT * FROM servicio;
SELECT * FROM usuario;

-- ---------------------------------------------------------------------
-- Mostrar la estructura de las tablas
-- ---------------------------------------------------------------------
SHOW COLUMNS FROM cita; 						          -- DESCRIBE cita;
SHOW COLUMNS FROM cliente; 						        -- DESCRIBE cliente;
SHOW COLUMNS FROM control_servicio; 			    -- DESCRIBE control_servicio;
SHOW COLUMNS FROM control_servicio_servicio; 	-- DESCRIBE control_servicio_servicio;
SHOW COLUMNS FROM empleado; 					        -- DESCRIBE empleado;
SHOW COLUMNS FROM factura; 						        -- DESCRIBE factura;
SHOW COLUMNS FROM historial; 					        -- DESCRIBE historial;
SHOW COLUMNS FROM mascota; 						        -- DESCRIBE mascota;
SHOW COLUMNS FROM medico;					 	          -- DESCRIBE medico;
SHOW COLUMNS FROM servicio; 					        -- DESCRIBE servicio;
SHOW COLUMNS FROM usuario; 						        -- DESCRIBE usuario;

-- ---------------------------------------------------------------------
-- Borrar base de datos
-- ---------------------------------------------------------------------
DROP DATABASE veterinary;
