-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2017 a las 00:22:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `rfc_cliente` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_cliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_cliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_cliente` int(11) NOT NULL,
  `email_cliente` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rfc_cliente`, `nombre_cliente`, `direccion_cliente`, `telefono_cliente`, `email_cliente`) VALUES
('1234', 'abc1', 'abc1', 1234, 'fer@correo.com'),
('dsafsd', 'safsd', 'asafssad', 122312, 'fer@correo.com'),
('fer123', 'fer', 'calle', 123, 'fer@correo.com'),
('fer456', 'Fer', 'Calle No. Col. Del. Ciudad CP', 123, 'fer@correo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_servicio`
--

CREATE TABLE `control_servicio` (
  `clave_control_servicio` int(11) NOT NULL,
  `fecha_control` date NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `rfc_medico` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_servicio_servicio`
--

CREATE TABLE `control_servicio_servicio` (
  `clave_control_servicio` int(11) NOT NULL,
  `clave_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `clave_factura` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `hora_factura` time NOT NULL,
  `clave_control_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_mascota` int(11) NOT NULL,
  `fechaseg_historial` date NOT NULL,
  `clave_control_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL,
  `nombre_mascota` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `especie_mascota` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `raza_mascota` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color_mascota` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanio_mascota` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `seniapart_mascota` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fechanac_mascota` date NOT NULL,
  `rfc_cliente` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id_mascota`, `nombre_mascota`, `especie_mascota`, `raza_mascota`, `color_mascota`, `tamanio_mascota`, `seniapart_mascota`, `fechanac_mascota`, `rfc_cliente`) VALUES
(15, 'abc1', 'abc1', 'abc1', 'abc1', 'abc1', 'abc1', '2017-04-25', '1234'),
(16, 'ferchito', 'perro', 'perro', 'cafe', 'grande', 'tatuaje', '2017-01-08', 'fer123'),
(17, 'admin', 'a', 'a', 'a', 'a', 'a', '2017-04-19', 'fer456'),
(18, 'asds', 'das', 'dsafa', 'asd', 'sadfds', 'sadfs', '2017-04-24', 'dsafsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `rfc_medico` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_medico` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_medico` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_medico` int(11) NOT NULL,
  `email_medico` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `clave_servicio` int(11) NOT NULL,
  `descripcion_servicio` text COLLATE utf8_unicode_ci NOT NULL,
  `precio_servicio` float NOT NULL,
  `tipo_servicio` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `periodicidad_servicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`clave_servicio`, `descripcion_servicio`, `precio_servicio`, `tipo_servicio`, `periodicidad_servicio`) VALUES
(6, 'v1', 1, 'vacuna', '2017-04-27'),
(7, 'v2', 1, 'vacuna', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pass_usuario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `pass_usuario`, `tipo_usuario`) VALUES
('43543', 'veterinaria123', 2),
('admin', '123', 0),
('dsafsd', 'veterinaria123', 2),
('fer123', 'veterinaria123', 2),
('fer456', 'veterinaria123', 2),
('VET001', 'empleado_1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rfc_cliente`);

--
-- Indices de la tabla `control_servicio`
--
ALTER TABLE `control_servicio`
  ADD PRIMARY KEY (`clave_control_servicio`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `rfc_medico` (`rfc_medico`);

--
-- Indices de la tabla `control_servicio_servicio`
--
ALTER TABLE `control_servicio_servicio`
  ADD KEY `clave_servicio` (`clave_servicio`),
  ADD KEY `clave_control_servicio` (`clave_control_servicio`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`clave_factura`),
  ADD KEY `clave_control_servicio` (`clave_control_servicio`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `clave_control_servicio` (`clave_control_servicio`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `id_usuario` (`rfc_cliente`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`rfc_medico`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`clave_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `control_servicio`
--
ALTER TABLE `control_servicio`
  MODIFY `clave_control_servicio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `clave_factura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `clave_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control_servicio`
--
ALTER TABLE `control_servicio`
  ADD CONSTRAINT `control_servicio_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON UPDATE CASCADE,
  ADD CONSTRAINT `control_servicio_ibfk_2` FOREIGN KEY (`rfc_medico`) REFERENCES `medico` (`rfc_medico`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `control_servicio_servicio`
--
ALTER TABLE `control_servicio_servicio`
  ADD CONSTRAINT `control_servicio_servicio_ibfk_1` FOREIGN KEY (`clave_servicio`) REFERENCES `servicio` (`clave_servicio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `control_servicio_servicio_ibfk_2` FOREIGN KEY (`clave_control_servicio`) REFERENCES `control_servicio` (`clave_control_servicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`clave_control_servicio`) REFERENCES `control_servicio` (`clave_control_servicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`) ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`clave_control_servicio`) REFERENCES `control_servicio` (`clave_control_servicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`rfc_cliente`) REFERENCES `cliente` (`rfc_cliente`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
