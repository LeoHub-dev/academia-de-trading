-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:33060
-- Tiempo de generación: 08-02-2018 a las 05:23:05
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academiadetrading`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisiones_diarias`
--

CREATE TABLE `comisiones_diarias` (
  `id_comision` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `razon` longtext NOT NULL,
  `pagada` int(11) NOT NULL DEFAULT '0',
  `fecha` datetime,
  `fecha_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_pagado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comisiones_diarias`
--
ALTER TABLE `comisiones_diarias`
  ADD PRIMARY KEY (`id_comision`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comisiones_diarias`
--
ALTER TABLE `comisiones_diarias`
  MODIFY `id_comision` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
