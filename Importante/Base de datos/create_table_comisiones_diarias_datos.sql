-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla academiadetrading.comisiones_diarias
CREATE TABLE IF NOT EXISTS `comisiones_diarias` (
  `id_comision` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `razon` longtext NOT NULL,
  `pagada` int(11) NOT NULL DEFAULT '0',
  `fecha` datetime,
  `fecha_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_pagado` datetime DEFAULT NULL,
  `estatus` enum('A','L') DEFAULT 'A',
  PRIMARY KEY (`id_comision`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla academiadetrading.comisiones_diarias: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `comisiones_diarias` DISABLE KEYS */;
INSERT INTO `comisiones_diarias` (`id_comision`, `id_usuario`, `cantidad`, `razon`, `pagada`, `fecha`, `fecha_insert`, `fecha_pagado`, `estatus`) VALUES
	(1, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-01-27 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(2, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-01-24 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(3, 1, 25, 'Comision diaria por el monto de 25$', 0, '2018-01-22 17:02:53', '2018-02-10 17:02:53', NULL, 'A'),
	(4, 1, 25, 'Comision diaria por el monto de 25$', 0, '2018-01-23 01:00:00', '2018-02-10 17:02:53', NULL, 'A'),
	(5, 1, 15, 'Comision diaria por el monto de 15$', 0, '2018-01-26 23:02:06', '2018-02-12 23:02:06', NULL, 'A'),
	(6, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-01-29 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(7, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-01-30 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(8, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-01 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(9, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-02 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(10, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-05 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(11, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-06 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(12, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-07 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(13, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-08 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(14, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-09 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(15, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-12 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(16, 1, 10, 'Comision diaria por el monto de 10$', 0, '2018-02-13 15:02:50', '2018-02-09 15:02:50', NULL, 'A'),
	(18, 372, 10, 'Comision diaria por el monto de 10$', 0, '2018-01-26 23:02:06', '2018-02-09 15:02:50', NULL, 'A'),
	(19, 372, 10, 'Comision diaria por el monto de 10$', 0, '2018-01-27 15:02:50', '2018-02-10 15:02:50', NULL, 'A'),
	(20, 372, 10, 'Comision diaria por el monto de 10$', 0, '2018-08-07 15:02:50', '2018-02-16 15:02:50', NULL, 'A'),
	(23, 1, 25, 'Comision diaria por el monto de 25$', 0, '2018-02-14 02:02:03', '2018-02-14 02:02:03', NULL, 'A'),
	(24, 372, 25, 'Comision diaria por el monto de 25$', 0, '2018-02-14 02:02:03', '2018-02-14 02:02:03', NULL, 'A'),
	(25, 1, 30, 'Comision diaria por el monto de 30$', 0, '2018-02-15 05:02:16', '2018-02-15 05:02:16', NULL, 'A'),
	(26, 372, 30, 'Comision diaria por el monto de 30$', 0, '2018-02-15 05:02:16', '2018-02-16 05:02:16', NULL, 'A'),
	(27, 1, 23, 'Comision diaria por el monto de 23$', 0, '2018-02-14 12:02:32', '2018-02-15 12:02:32', NULL, 'A'),
	(28, 372, 23, 'Comision diaria por el monto de 23$', 0, '2018-02-14 12:02:32', '2018-02-15 12:02:32', NULL, 'A'),
	(29, 1, 30, 'Comision diaria por el monto de 30$', 0, '2018-02-16 21:02:38', '2018-02-16 21:02:38', NULL, 'A'),
	(30, 372, 30, 'Comision diaria por el monto de 30$', 0, '2018-02-16 21:02:38', '2018-02-16 21:02:38', NULL, 'A');
/*!40000 ALTER TABLE `comisiones_diarias` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
