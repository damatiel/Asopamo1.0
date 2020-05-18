-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-05-2020 a las 02:36:26
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`numero_fact`, `id_punto`, `documento`, `fecha_fact`, `periodo_fact`, `admin_mes`, `saldo_ant`, `id_mes`, `operador`, `total_pagar`) VALUES
(33, 7, 123, '2020-05-17', 'enero', '13000', '0', 1, 'miguel mejia', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pagos`, `num_factura`, `id_punto`, `id_entPago`, `fecha_pago`) VALUES
(15, 33, 7, 3, '2020-05-17 21:33:36'),
(16, 33, 7, 2, '2020-05-17 21:33:42'),
(17, 33, 7, 1, '2020-05-17 21:33:45'),
(18, 33, 7, 1, '2020-05-17 21:33:51'),
(19, 33, 7, 2, '2020-05-17 21:33:54'),
(20, 33, 7, 3, '2020-05-17 21:33:57');

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
  `form_pago` int(2) DEFAULT NULL,
  `fecha_act` date DEFAULT NULL,
  PRIMARY KEY (`id`,`dir`) USING BTREE,
  KEY `doc_suscriptor` (`doc_suscriptor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`id`, `dir`, `estado`, `doc_suscriptor`, `saldo_ant`, `contador`, `descuento`, `form_pago`, `fecha_act`) VALUES
(7, 'calle1#1-1', 1, 123, 0, 0, 0, 0, '2020-05-17');

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
(123, 'Miguel', 'Fabio', 'Lancheros', 'Rodriguez', 1, '1234', 'Carrera 10 # 10 - 10');

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
