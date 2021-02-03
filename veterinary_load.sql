-- ---------------------------------------------------------------------
-- Creación de la base de datos
-- ---------------------------------------------------------------------
CREATE DATABASE veterinary;

-- ---------------------------------------------------------------------
-- Cambiar a la base de datos creada
-- ---------------------------------------------------------------------
USE veterinary;

-- ---------------------------------------------------------------------
-- Creación de tablas
-- ---------------------------------------------------------------------
CREATE TABLE cita (
  clave_cita int NOT NULL AUTO_INCREMENT,
  fecha_cita date NOT NULL,
  id_mascota int NOT NULL,
  PRIMARY KEY (clave_cita)
) ENGINE=InnoDB;

CREATE TABLE cliente (
  rfc_cliente varchar(15) NOT NULL,
  nombre_cliente varchar(50) NOT NULL,
  direccion_cliente varchar(50) NOT NULL,
  telefono_cliente varchar(15) NOT NULL,
  email_cliente varchar(30) NOT NULL,
  estado_cliente int NOT NULL,
  PRIMARY KEY (rfc_cliente)
) ENGINE=InnoDB;

CREATE TABLE control_servicio (
  clave_control_servicio int NOT NULL AUTO_INCREMENT,
  fecha_control date NOT NULL,
  id_mascota int NOT NULL,
  rfc_medico varchar(15) NOT NULL,
  PRIMARY KEY (clave_control_servicio)
) ENGINE=InnoDB;

CREATE TABLE control_servicio_servicio (
  clave_control_servicio int NOT NULL,
  clave_servicio int NOT NULL
) ENGINE=InnoDB;

CREATE TABLE empleado (
  rfc_empleado varchar(15) NOT NULL,
  nombre_empleado varchar(50) NOT NULL,
  direccion_empleado varchar(50) NOT NULL,
  telefono_empleado int NOT NULL,
  email_empleado varchar(30) NOT NULL,
  estado_empleado int NOT NULL,
  PRIMARY KEY (rfc_empleado)
) ENGINE=InnoDB;

CREATE TABLE factura (
  clave_factura int NOT NULL AUTO_INCREMENT,
  fecha_factura date NOT NULL,
  hora_factura time NOT NULL,
  clave_control_servicio int NOT NULL,
  PRIMARY KEY (clave_factura)
) ENGINE=InnoDB;

CREATE TABLE historial (
  id_mascota int NOT NULL,
  fechaseg_historial date,
  clave_control_servicio int NOT NULL
) ENGINE=InnoDB;

CREATE TABLE mascota (
  id_mascota int NOT NULL AUTO_INCREMENT,
  nombre_mascota varchar(20) NOT NULL,
  especie_mascota varchar(20) NOT NULL,
  raza_mascota varchar(20) NOT NULL,
  color_mascota varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  tamanio_mascota varchar(10) NOT NULL,
  seniapart_mascota varchar(50) NOT NULL,
  fechanac_mascota date NOT NULL,
  rfc_cliente varchar(15) NOT NULL,
  PRIMARY KEY (id_mascota)
) ENGINE=InnoDB;

CREATE TABLE medico (
  rfc_medico varchar(15) NOT NULL,
  nombre_medico varchar(50) NOT NULL,
  direccion_medico varchar(50) NOT NULL,
  telefono_medico int(11) NOT NULL,
  email_medico varchar(30) NOT NULL,
  estado_medico int NOT NULL,
  PRIMARY KEY (rfc_medico)
) ENGINE=InnoDB;

CREATE TABLE servicio (
  clave_servicio int NOT NULL AUTO_INCREMENT,
  descripcion_servicio text NOT NULL,
  precio_servicio float NOT NULL,
  tipo_servicio varchar(15) NOT NULL,
  periodicidad_servicio date DEFAULT NULL,
  estado_servicio int NOT NULL,
  PRIMARY KEY (clave_servicio)
) ENGINE=InnoDB;

CREATE TABLE usuario (
  nombre_usuario varchar(15) NOT NULL,
  pass_usuario varchar(20) NOT NULL,
  tipo_usuario int NOT NULL,
  PRIMARY KEY (nombre_usuario)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Creación de llaves foráneas
-- ---------------------------------------------------------------------
ALTER TABLE control_servicio
  ADD FOREIGN KEY (id_mascota) REFERENCES mascota (id_mascota) ON UPDATE CASCADE,
  ADD FOREIGN KEY (rfc_medico) REFERENCES medico (rfc_medico) ON UPDATE CASCADE;

ALTER TABLE control_servicio_servicio
  ADD FOREIGN KEY (clave_servicio) REFERENCES servicio (clave_servicio) ON UPDATE CASCADE,
  ADD FOREIGN KEY (clave_control_servicio) REFERENCES control_servicio (clave_control_servicio) ON UPDATE CASCADE;

ALTER TABLE factura
  ADD FOREIGN KEY (clave_control_servicio) REFERENCES control_servicio (clave_control_servicio) ON UPDATE CASCADE;

ALTER TABLE historial
  ADD FOREIGN KEY (id_mascota) REFERENCES mascota (id_mascota) ON UPDATE CASCADE,
  ADD FOREIGN KEY (clave_control_servicio) REFERENCES control_servicio (clave_control_servicio) ON UPDATE CASCADE;

ALTER TABLE mascota
  ADD FOREIGN KEY (rfc_cliente) REFERENCES cliente (rfc_cliente) ON UPDATE CASCADE;

-- ---------------------------------------------------------------------
-- Inserción de datos
-- ---------------------------------------------------------------------
INSERT INTO usuario VALUES ('admin', '123', 0);
