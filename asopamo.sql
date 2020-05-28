-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-05-2020 a las 01:04:37
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asopamo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ent_pago`
--

DROP TABLE IF EXISTS `ent_pago`;
CREATE TABLE IF NOT EXISTS `ent_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ent_pago`
--

INSERT INTO `ent_pago` (`id`, `Nombre`) VALUES
(1, 'ASOPAMO'),
(2, 'SERVIMCOOP'),
(3, 'BANCOLOMBIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

DROP TABLE IF EXISTS `facturacion`;
CREATE TABLE IF NOT EXISTS `facturacion` (
  `numero_fact` int(11) NOT NULL AUTO_INCREMENT,
  `id_punto` int(11) DEFAULT NULL,
  `documento` int(20) DEFAULT NULL,
  `fecha_fact` date DEFAULT NULL,
  `periodo_fact` varchar(50) DEFAULT NULL,
  `admin_mes` decimal(60,0) DEFAULT NULL,
  `saldo_ant` decimal(60,0) DEFAULT NULL,
  `id_mes` int(12) DEFAULT NULL,
  `operador` varchar(255) DEFAULT NULL,
  `total_pagar` decimal(60,0) DEFAULT NULL,
  PRIMARY KEY (`numero_fact`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`numero_fact`, `id_punto`, `documento`, `fecha_fact`, `periodo_fact`, `admin_mes`, `saldo_ant`, `id_mes`, `operador`, `total_pagar`) VALUES
(80, 12, 1100963440, '2020-05-26', 'enero', '13000', '0', 1, 'miguel mejia', '13000'),
(81, 13, 1100962873, '2020-05-26', 'enero', '13000', '0', 1, 'miguel mejia', '0'),
(82, 12, 1100963440, '2020-05-26', 'febrero', '13000', '13000', 2, 'miguel mejia', '26000'),
(83, 13, 1100962873, '2020-05-26', 'febrero', '13000', '0', 2, 'miguel mejia', '0'),
(84, 12, 1100963440, '2020-05-26', 'marzo', '13000', '26000', 3, 'miguel mejia', '39000'),
(85, 13, 1100962873, '2020-05-26', 'marzo', '13000', '0', 3, 'miguel mejia', '13000'),
(86, 14, 1100963440, '2020-05-26', 'marzo', '13000', '0', 3, 'miguel mejia', '13000'),
(87, 13, 1100962873, '2020-05-26', 'abril', '13000', '0', 4, 'miguel mejia', '0'),
(88, 14, 1100963440, '2020-05-26', 'abril', '13000', '0', 4, 'miguel mejia', '0'),
(89, 13, 1100962873, '2020-05-26', 'mayo', '13000', '0', 5, 'miguel mejia', '0'),
(90, 14, 1100963440, '2020-05-26', 'mayo', '13000', '0', 5, 'miguel mejia', '0'),
(94, 13, 1100962873, '2020-05-27', 'junio', '13000', '0', 6, 'miguel mejia', '0'),
(95, 14, 1100963440, '2020-05-27', 'junio', '13000', '0', 6, 'miguel mejia', '0'),
(96, 13, 1100962873, '2020-05-27', 'julio', '13000', '0', 7, 'miguel mejia', '13000'),
(97, 14, 1100963440, '2020-05-27', 'julio', '13000', '0', 7, 'miguel mejia', '13000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pagos` int(11) NOT NULL AUTO_INCREMENT,
  `num_factura` int(11) NOT NULL,
  `id_punto` int(11) NOT NULL,
  `id_entPago` int(11) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  PRIMARY KEY (`id_pagos`),
  KEY `num_factura` (`num_factura`,`id_punto`,`id_entPago`),
  KEY `id_entPago` (`id_entPago`),
  KEY `id_punto` (`id_punto`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pagos`, `num_factura`, `id_punto`, `id_entPago`, `fecha_pago`) VALUES
(28, 81, 13, 1, '2020-05-26 23:22:13'),
(29, 83, 13, 1, '2020-05-26 23:23:23'),
(30, 87, 13, 2, '2020-05-26 23:30:25'),
(31, 88, 14, 1, '2020-05-26 23:30:34'),
(32, 89, 13, 2, '2020-05-27 19:46:27'),
(33, 90, 14, 1, '2020-05-27 19:46:37'),
(34, 94, 13, 1, '2020-05-27 19:50:01'),
(35, 95, 14, 2, '2020-05-27 19:50:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

DROP TABLE IF EXISTS `puntos`;
CREATE TABLE IF NOT EXISTS `puntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dir` varchar(255) NOT NULL,
  `estado` int(2) DEFAULT NULL,
  `doc_suscriptor` int(20) DEFAULT NULL,
  `saldo_ant` int(60) DEFAULT NULL,
  `contador` int(60) DEFAULT NULL,
  `descuento` int(60) DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `traslado` int(11) DEFAULT NULL,
  `reactivacion` int(11) DEFAULT NULL,
  `form_pago` int(2) DEFAULT NULL,
  `fecha_act` date DEFAULT NULL,
  PRIMARY KEY (`id`,`dir`) USING BTREE,
  KEY `doc_suscriptor` (`doc_suscriptor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`id`, `dir`, `estado`, `doc_suscriptor`, `saldo_ant`, `contador`, `descuento`, `matricula`, `traslado`, `reactivacion`, `form_pago`, `fecha_act`) VALUES
(12, 'carrera11#5-48', 1, 1100963440, 39000, 2, 0, 0, 0, 0, 0, '2020-05-26'),
(13, 'carrera4#2-38', 2, 1100962873, 13000, 0, 0, 0, 0, 0, 0, '2020-05-26'),
(14, 'calle13#45-35', 2, 1100963440, 13000, 0, 0, 0, 0, 0, 0, '2020-05-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

DROP TABLE IF EXISTS `suscriptores`;
CREATE TABLE IF NOT EXISTS `suscriptores` (
  `doc` int(20) NOT NULL,
  `primer_nom` varchar(50) DEFAULT NULL,
  `segundo_nom` varchar(50) DEFAULT NULL,
  `primer_ape` varchar(50) DEFAULT NULL,
  `segundo_ape` varchar(50) DEFAULT NULL,
  `estado` int(2) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `direc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`doc`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`doc`, `primer_nom`, `segundo_nom`, `primer_ape`, `segundo_ape`, `estado`, `tel`, `direc`) VALUES
(1100962873, 'Mayra', 'Alejandra', 'Rojas', 'Lozano', 1, '3144464993', 'Carrera4#2-34'),
(1100963440, 'Miguel', 'Angel', 'Mejia', 'Macias', 1, '3508737961', 'CARRERA 11#5-46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `tipo`, `usuario`, `pass`) VALUES
(1, 'miguel mejia', 1, 'mmejia', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores`
--

DROP TABLE IF EXISTS `valores`;
CREATE TABLE IF NOT EXISTS `valores` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  `valor` double(255,0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `valores`
--

INSERT INTO `valores` (`id`, `concepto`, `valor`) VALUES
(1, 'administracion_mes', 13000),
(2, 'matricula', 50000),
(3, 'traslado', 10000),
(4, 'reactivacion', 30000);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`num_factura`) REFERENCES `facturacion` (`numero_fact`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_entPago`) REFERENCES `ent_pago` (`id`),
  ADD CONSTRAINT `pagos_ibfk_3` FOREIGN KEY (`id_punto`) REFERENCES `puntos` (`id`);

--
-- Filtros para la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD CONSTRAINT `puntos_ibfk_1` FOREIGN KEY (`doc_suscriptor`) REFERENCES `suscriptores` (`doc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
