-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para actas
CREATE DATABASE IF NOT EXISTS `actas` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `actas`;

-- Volcando estructura para tabla actas.actas
CREATE TABLE IF NOT EXISTS `actas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `creador_id` int NOT NULL,
  `asunto` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_creacion` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `responsable_id` int NOT NULL,
  `orden_del_dia` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `descripcion_hechos` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__usuarios` (`creador_id`),
  CONSTRAINT `FK__usuarios` FOREIGN KEY (`creador_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Volcando datos para la tabla actas.actas: ~1 rows (aproximadamente)
DELETE FROM `actas`;
INSERT INTO `actas` (`id`, `creador_id`, `asunto`, `fecha_creacion`, `hora_inicio`, `hora_final`, `responsable_id`, `orden_del_dia`, `descripcion_hechos`) VALUES
	(1, 1, 'AAAAAAAAAAAAA', '12/12/2022', '18:44:20', '18:44:43', 1, '2', 'qwdasdasd'),
	(6, 1, 'Itaque autem incidun', '2022-12-20', '09:28:00', '16:32:00', 11, 'Sit laboriosam dolo', 'Error voluptatum qui');

-- Volcando estructura para tabla actas.asistentes
CREATE TABLE IF NOT EXISTS `asistentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `acta_id` int NOT NULL,
  `asistente_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__actas` (`acta_id`),
  KEY `FK__usuarios2` (`asistente_id`),
  CONSTRAINT `FK__actas` FOREIGN KEY (`acta_id`) REFERENCES `actas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__usuarios2` FOREIGN KEY (`asistente_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Volcando datos para la tabla actas.asistentes: ~2 rows (aproximadamente)
DELETE FROM `asistentes`;
INSERT INTO `asistentes` (`id`, `acta_id`, `asistente_id`) VALUES
	(3, 1, 1),
	(4, 1, 1),
	(5, 1, 11);

-- Volcando estructura para tabla actas.compromisos
CREATE TABLE IF NOT EXISTS `compromisos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `acta_id` int NOT NULL,
  `responsable_id` int NOT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__actas_compromisos` (`acta_id`),
  KEY `FK__usuarios_compromisos` (`responsable_id`),
  CONSTRAINT `FK__actas_compromisos` FOREIGN KEY (`acta_id`) REFERENCES `actas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__usuarios_compromisos` FOREIGN KEY (`responsable_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Volcando datos para la tabla actas.compromisos: ~2 rows (aproximadamente)
DELETE FROM `compromisos`;
INSERT INTO `compromisos` (`id`, `acta_id`, `responsable_id`, `descripcion`, `fecha_inicio`, `fecha_final`) VALUES
	(1, 1, 1, 'sfawdfsdf', '2022-12-20', '2022-12-20'),
	(2, 1, 1, 'Similique omnis cons', '1998-04-23', '1995-05-15'),
	(3, 1, 1, ' asasdasd', '2022-12-20', '2022-12-20');

-- Volcando estructura para tabla actas.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nombres` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `apellidos` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `identificacion` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tipo_id` int DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Volcando datos para la tabla actas.usuarios: ~2 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`id`, `username`, `password`, `nombres`, `apellidos`, `identificacion`, `tipo_id`, `tipo`) VALUES
	(1, 'hcuadradocarvajal@correo.unicordoba.edu.co', '$2y$10$OODe5ocPBtbI6K6QKOqgb.Okx5GIl/4jfD1WkC/s594dHROkTuEJ6', 'HERNEY JOSE', 'CUADRADO CARVAJAL', '123', 2, 'A'),
	(11, 'juanjocuadradop@gmail.com', '$2y$10$OODe5ocPBtbI6K6QKOqgb.Okx5GIl/4jfD1WkC/s594dHROkTuEJ6', 'GLEINER', 'DIAZ MORENO', '49', 2, 'I');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
