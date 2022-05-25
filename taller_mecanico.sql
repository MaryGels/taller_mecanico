-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2022 a las 00:04:51
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_mecanico`
--
CREATE DATABASE IF NOT EXISTS `taller_mecanico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `taller_mecanico`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(5) NOT NULL COMMENT 'Código de Cliente',
  `nombre` varchar(30) NOT NULL COMMENT 'Nombre del cliente',
  `apellidos` varchar(50) NOT NULL COMMENT 'Apellidos Cliente',
  `direccion` varchar(150) NOT NULL COMMENT 'Dirección del cliente',
  `telefono` int(9) NOT NULL COMMENT ' Telefono de contacto',
  `email` varchar(100) NOT NULL COMMENT 'Email del Cliente',
  `dni` varchar(9) NOT NULL COMMENT 'DNI del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Datos Personales del cliente';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `dni`) VALUES
(1003, 'Pedro', 'Montes Lopez', 'Calle Granada 11', 506981003, 'pemontes@gmail.com', '23500500M'),
(1004, 'Andres', 'Vazquez Lopez', 'Calle Valencia 8', 502451004, 'anvazquez@gmail.com', '13500500J'),
(1005, 'Montse', 'Maceda Leal', 'Avda. Serrano 5', 502781005, 'monaceda@gmail.com', '33500500S'),
(1006, 'Jose', 'Megides Delgado', 'Pasaje Pineda 9', 503981006, 'jomejides@gmail.com', '43500500H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanicos`
--

CREATE TABLE `mecanicos` (
  `id_mecanico` int(5) NOT NULL,
  `nom_mecanico` varchar(15) NOT NULL COMMENT 'Nombre del mecánico',
  `cargo` varchar(15) NOT NULL COMMENT 'Rango del mecánico',
  `experiencia` varchar(15) NOT NULL COMMENT 'Experiencia del empleado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Personal del taller';

--
-- Volcado de datos para la tabla `mecanicos`
--

INSERT INTO `mecanicos` (`id_mecanico`, `nom_mecanico`, `cargo`, `experiencia`) VALUES
(1, 'Enrique Mas', 'Oficial de 1ª', '5 años'),
(2, 'Manuel Leire', 'Oficial de 2ª', '3 años'),
(3, 'Jose Maria Pez', 'Oficial de 2ª', '2 años'),
(4, 'Arturo', 'Oficial de 3ª', '1 años'),
(5, 'Rosa Fuerte', 'Oficial de 2ª', '3 años'),
(6, 'Pepa Grande', 'Oficial de 1ª', '5 años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(5) NOT NULL COMMENT 'Primary Key',
  `nom_servicio` varchar(35) NOT NULL COMMENT ' Nombre del servicio reparación o revisión',
  `id_encargado` int(5) NOT NULL COMMENT 'id pertenece al mecanico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nom_servicio`, `id_encargado`) VALUES
(114, 'Cambio de Aceite', 4),
(115, 'Cambio de Filtros', 3),
(116, 'Disco de freno', 2),
(117, 'Pastillas de freno', 1),
(118, 'Neumáticos', 3),
(119, 'Escobillas', 2),
(120, 'Luces', 3),
(121, 'Auto-Diagnosis', 5),
(122, 'Correa de Distribución', 2),
(123, 'Amortiguadores y muelles', 4),
(124, 'Liquido Hidráulico', 3),
(125, 'Baterías', 3),
(126, 'Alternadores', 5),
(127, 'Motores de Arranque', 6),
(128, 'Bomba de Agua', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serv_realizados`
--

CREATE TABLE `serv_realizados` (
  `id_realizado` int(5) NOT NULL,
  `id_servicio` int(5) NOT NULL COMMENT 'id clave foranea de la tabla servicios',
  `id_vehiculo` int(5) NOT NULL COMMENT 'clave foranea de la tabla vehiculos',
  `fecha_realizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `serv_realizados`
--

INSERT INTO `serv_realizados` (`id_realizado`, `id_servicio`, `id_vehiculo`, `fecha_realizacion`) VALUES
(1, 128, 2032, '2022-04-19'),
(2, 122, 2036, '2022-04-24'),
(3, 128, 2032, '2022-04-19'),
(4, 122, 2036, '2022-04-24'),
(5, 116, 2036, '2022-04-27'),
(6, 120, 2034, '2022-05-02'),
(7, 116, 2036, '2022-04-27'),
(8, 120, 2034, '2022-05-02'),
(9, 118, 2034, '2022-04-27'),
(10, 114, 2033, '2022-04-25'),
(11, 125, 2031, '2022-04-18'),
(12, 118, 2035, '2022-04-19'),
(13, 125, 2031, '2022-04-18'),
(14, 118, 2035, '2022-04-19'),
(15, 119, 2031, '2022-04-20'),
(16, 119, 2031, '2022-04-20'),
(17, 127, 2032, '2022-04-25'),
(18, 123, 2037, '2022-04-27'),
(19, 127, 2032, '2022-04-25'),
(20, 123, 2037, '2022-04-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_form`
--

CREATE TABLE `solicitud_form` (
  `id_sol` int(5) NOT NULL,
  `sol_servicio` varchar(35) NOT NULL COMMENT 'Nombre del Servicio ',
  `sol_vehiculo` varchar(7) NOT NULL COMMENT 'Número de Matricula',
  `sol_email` varchar(100) NOT NULL COMMENT 'Email del cliente que solicita la cita',
  `sol_fecha` date NOT NULL COMMENT 'Fecha de solicitud',
  `sol_fecha_cita` date NOT NULL COMMENT 'fecha de la cita',
  `sol_hora_cita` varchar(7) NOT NULL COMMENT 'hora de la cita'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud_form`
--

INSERT INTO `solicitud_form` (`id_sol`, `sol_servicio`, `sol_vehiculo`, `sol_email`, `sol_fecha`, `sol_fecha_cita`, `sol_hora_cita`) VALUES
(29, 'Cambio de Aceite', '7845CNL', 'pemontes@gmail.com', '2022-05-19', '2022-05-24', '17:00pm'),
(30, 'Motores de Arranque', '2356PTM', 'pemontes@gmail.com', '2022-05-19', '2022-05-23', '10:00am'),
(31, 'Neumáticos', '2356PTM', 'pemontes@gmail.com', '2022-05-19', '2022-05-23', '10:00am'),
(32, 'Disco de freno', '7845CNL', 'pemontes@gmail.com', '2022-05-19', '0000-00-00', '10:00am'),
(38, 'Luces', '2356PTM', 'pemontes@gmail.com', '2022-05-20', '2022-05-23', '11:00am'),
(40, 'Disco de freno', '7865RTC', 'monaceda@gmail.com', '2022-05-20', '2022-06-02', '17:30pm'),
(41, 'Neumáticos', '7865RTC', 'monaceda@gmail.com', '2022-05-20', '2022-06-02', '17:00pm'),
(49, 'Correa de Distribución', '7865RTC', 'monaceda@gmail.com', '2022-05-21', '2022-06-02', '13:00pm'),
(66, 'Bomba de Agua', '7865RTC', 'monaceda@gmail.com', '2022-05-21', '2022-06-02', '18:00pm'),
(69, 'Disco de freno', '1254LHB', 'jomejides@gmail.com', '2022-05-22', '2022-06-03', '13:00pm'),
(70, 'Pastillas de freno', '1287BMV', 'anvazquez@gmail.com', '2022-05-22', '2022-06-05', '12:00am'),
(71, 'Auto-Diagnosis', '4578DSX', 'anvazquez@gmail.com', '2022-05-22', '2022-06-05', '09:00am'),
(72, 'Liquido Hidráulico', '4578DSX', 'anvazquez@gmail.com', '2022-05-22', '2022-06-02', '13:00pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(5) NOT NULL,
  `matricula` varchar(7) NOT NULL COMMENT 'Matricula del vehículo',
  `marca` varchar(25) NOT NULL COMMENT 'Marca del vehículo',
  `modelo` varchar(30) NOT NULL COMMENT 'Marca del vehículo',
  `antiguedad` int(4) NOT NULL COMMENT ' año de fabricacion o venta',
  `combustible` varchar(20) NOT NULL COMMENT 'Combust. del vehículo',
  `id_propietario` int(5) NOT NULL COMMENT 'id viene de la tabla de clientes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Vehículos Revisados en el taller ';

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `matricula`, `marca`, `modelo`, `antiguedad`, `combustible`, `id_propietario`) VALUES
(2031, '4578DSX', 'DACIA', 'monovolumen', 1999, 'gasoil', 1004),
(2032, '1254LHB', 'SEAT', 'Leon sport', 2001, 'gasoil', 1006),
(2033, '7865RTC', 'FORT', 'scort', 2002, 'gasolina', 1005),
(2034, '7845CNL', 'RENAULT', 'Laguna', 1998, 'gasoil', 1003),
(2035, '1287BMV', 'TRIUMPH', 'Tour 500', 2015, 'gasolina', 1004),
(2036, '2356PTM', 'YAMAHA', 'Len 250', 2020, 'gasolina', 1003),
(2037, '3214TQM', 'HONDA', 'Rewob 300', 2019, 'gasolina', 1006);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD PRIMARY KEY (`id_mecanico`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`),
  ADD UNIQUE KEY `nom_servicio_2` (`nom_servicio`),
  ADD UNIQUE KEY `nom_servicio_4` (`nom_servicio`),
  ADD KEY `id_encargado` (`id_encargado`),
  ADD KEY `nom_servicio` (`nom_servicio`),
  ADD KEY `nom_servicio_3` (`nom_servicio`);

--
-- Indices de la tabla `serv_realizados`
--
ALTER TABLE `serv_realizados`
  ADD PRIMARY KEY (`id_realizado`),
  ADD KEY `id_vehiculo_2` (`id_vehiculo`),
  ADD KEY `id_servicio_2` (`id_servicio`),
  ADD KEY `fecha_realizacion` (`fecha_realizacion`);

--
-- Indices de la tabla `solicitud_form`
--
ALTER TABLE `solicitud_form`
  ADD PRIMARY KEY (`id_sol`),
  ADD KEY `sol_servicio` (`sol_servicio`),
  ADD KEY `sol_vehiculo` (`sol_vehiculo`),
  ADD KEY `email` (`sol_email`),
  ADD KEY `sol_servicio_2` (`sol_servicio`),
  ADD KEY `sol_fecha_cita` (`sol_fecha_cita`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `matricula_vehiculo` (`matricula`),
  ADD KEY `id_propietario_2` (`id_propietario`),
  ADD KEY `matricula` (`matricula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Código de Cliente', AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  MODIFY `id_mecanico` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `serv_realizados`
--
ALTER TABLE `serv_realizados`
  MODIFY `id_realizado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `solicitud_form`
--
ALTER TABLE `solicitud_form`
  MODIFY `id_sol` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2038;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`id_encargado`) REFERENCES `mecanicos` (`id_mecanico`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `serv_realizados`
--
ALTER TABLE `serv_realizados`
  ADD CONSTRAINT `serv_realizados_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serv_realizados_ibfk_2` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_form`
--
ALTER TABLE `solicitud_form`
  ADD CONSTRAINT `solicitud_form_ibfk_1` FOREIGN KEY (`sol_servicio`) REFERENCES `servicios` (`nom_servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_form_ibfk_2` FOREIGN KEY (`sol_vehiculo`) REFERENCES `vehiculos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_form_ibfk_3` FOREIGN KEY (`sol_email`) REFERENCES `clientes` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
