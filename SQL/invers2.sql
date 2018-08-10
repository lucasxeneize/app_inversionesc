-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2018 a las 18:01:21
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
  `sitio_web` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradoras`
--

INSERT INTO `administradoras` (`id`, `rut`, `razon_social`, `nombre_fantasia`, `sitio_web`) VALUES
(32, '2-7', 'RAZOS SOCIAL', 'FANTASIA', ''),
(47, '2-8', 'RAZOS SOCIAL8', 'FANTASIA8', 'www.888.cl');

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradoras`
--
ALTER TABLE `administradoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
