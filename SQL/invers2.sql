-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2018 a las 21:10:57
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `invers2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradoras`
--

CREATE TABLE `administradoras` (
  `id` int(11) NOT NULL,
  `rut` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `razon_social` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_fantasia` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sitio_web` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradoras`
--

INSERT INTO `administradoras` (`id`, `rut`, `razon_social`, `nombre_fantasia`, `sitio_web`) VALUES
(32, '96634320-6', 'SCOTIA ADMINISTRADORA GENERAL DE FONDOS CHILE S.A.', 'SCOTIA', 'https://www.scotiabankchile.cl/Personas/Inversiones'),
(47, '96667040-1', 'SANTANDER ASSET MANAGEMENT S.A. ADMINISTRADORA GENERAL DE FONDOS', 'SANTANDER ASSET', 'https://www.santander.cl/inversiones/index.asp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentos`
--

CREATE TABLE `instrumentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `id_administradora` int(11) NOT NULL,
  `serie` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instrumentos`
--

INSERT INTO `instrumentos` (`id`, `nombre`, `id_administradora`, `serie`) VALUES
(6, 'Prioridad Serie C', 32, 'C'),
(7, 'Accionario Nacionales', 32, 'A'),
(8, 'SANTANDER A', 47, 'A'),
(9, 'ACCIONES MID CAP CHILE', 47, 'UNIVERSAL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradoras`
--
ALTER TABLE `administradoras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rut` (`rut`);

--
-- Indices de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instrumentos_administradoras` (`id_administradora`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradoras`
--
ALTER TABLE `administradoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `instrumentos`
--
ALTER TABLE `instrumentos`
  ADD CONSTRAINT `instrumentos_administradoras` FOREIGN KEY (`id_administradora`) REFERENCES `administradoras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
