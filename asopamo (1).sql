-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-06-2020 a las 01:18:00
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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `ent_pago`
--

INSERT INTO `ent_pago` (`id`, `Nombre`) VALUES
(1, 'ASOPAMO'),
(2, 'SERVIMCOOP'),
(3, 'BANCO AGRARIO');

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
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`numero_fact`, `id_punto`, `documento`, `fecha_fact`, `periodo_fact`, `admin_mes`, `saldo_ant`, `id_mes`, `operador`, `total_pagar`) VALUES
(198, 15, 1100963440, '2020-06-02', 'enero', '13000', '0', 1, 'miguel mejia', '0'),
(199, 16, 1100963441, '2020-06-02', 'enero', '13000', '0', 1, 'miguel mejia', '17000'),
(200, 17, 1100963440, '2020-06-02', 'enero', '13000', '0', 1, 'miguel mejia', '13000'),
(201, 18, 1100963440, '2020-06-02', 'enero', '13000', '0', 1, 'miguel mejia', '13000'),
(202, 19, 1100963441, '2020-06-02', 'enero', '13000', '0', 1, 'miguel mejia', '13000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pagos` int(11) NOT NULL AUTO_INCREMENT,
  `num_factura` int(11) DEFAULT NULL,
  `id_punto` int(11) DEFAULT NULL,
  `id_entPago` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `atrasos` int(11) DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `nom_suscriptor` varchar(255) DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `periodo_fact` varchar(225) DEFAULT NULL,
  `admin_mes` int(12) DEFAULT NULL,
  `saldo_anterior` int(12) DEFAULT NULL,
  `descuento` int(12) DEFAULT NULL,
  `traslado` int(12) DEFAULT NULL,
  `reactivacion` int(12) DEFAULT NULL,
  `matricula` int(12) DEFAULT NULL,
  `total` int(12) DEFAULT NULL,
  `documento` int(12) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `multa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pagos`) USING BTREE,
  KEY `num_factura` (`num_factura`,`id_punto`,`id_entPago`) USING BTREE,
  KEY `id_entPago` (`id_entPago`) USING BTREE,
  KEY `id_punto` (`id_punto`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pagos`, `num_factura`, `id_punto`, `id_entPago`, `fecha_pago`, `atrasos`, `fecha_limite`, `nom_suscriptor`, `fecha_factura`, `direccion`, `periodo_fact`, `admin_mes`, `saldo_anterior`, `descuento`, `traslado`, `reactivacion`, `matricula`, `total`, `documento`, `estado`, `multa`) VALUES
(141, 198, 15, 1, '2020-06-02', 0, '2020-01-31', 'Miguel Angel Mejia Macias', '2020-06-02', 'carrera11#5-48', 'enero', 13000, 0, 0, 0, 0, 0, 13000, 1100963440, 0, 0),
(142, NULL, 16, NULL, NULL, 0, '2020-01-31', 'Angel Miguel Macias Mejia', '2020-06-02', 'carrera11#5-49', 'enero', 13000, 0, 0, 0, 0, 0, 13000, 1100963441, 0, 0),
(143, NULL, 17, NULL, NULL, 0, '2020-01-31', 'Miguel Angel Mejia Macias', '2020-06-02', 'calle11#5-48', 'enero', 13000, 0, 0, 0, 0, 0, 13000, 1100963440, 0, 0),
(144, NULL, 18, NULL, NULL, 0, '2020-01-31', 'Miguel Angel Mejia Macias', '2020-06-02', 'calle1#2-3', 'enero', 13000, 0, 0, 0, 0, 0, 13000, 1100963440, 0, 0),
(145, NULL, 19, NULL, NULL, 0, '2020-01-31', 'Angel Miguel Macias Mejia', '2020-06-02', 'calle2b#3-46', 'enero', 13000, 0, 0, 0, 0, 0, 13000, 1100963441, 0, 0);

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
  `multa` int(11) DEFAULT NULL,
  `indicaciones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`dir`) USING BTREE,
  KEY `doc_suscriptor` (`doc_suscriptor`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`id`, `dir`, `estado`, `doc_suscriptor`, `saldo_ant`, `contador`, `descuento`, `matricula`, `traslado`, `reactivacion`, `form_pago`, `fecha_act`, `multa`, `indicaciones`) VALUES
(15, 'carrera11#5-48', 2, 1100963441, 0, 0, 0, 0, 0, 0, 0, '2020-05-31', 0, NULL),
(16, 'carrera11#5-49', 2, 1100963441, 13000, 0, 6000, 0, 10000, 0, 0, '2020-05-31', 0, NULL),
(17, 'calle11#5-48', 2, 1100963440, 13000, 0, 0, 0, 0, 0, 0, '2020-05-31', 0, NULL),
(18, 'calle1#2-3', 2, 1100963440, 13000, 0, 0, 0, 0, 0, 0, '2020-06-01', 0, NULL),
(19, 'calle2b#3-46', 2, 1100963441, 13000, 0, 0, 0, 0, 0, 0, '2020-06-02', 0, NULL),
(20, 'calle6b#4-46', 1, 1100963442, 0, 0, 0, 0, 0, 0, 0, '2020-06-02', 0, ''),
(21, 'carrera4#3b-45', 1, 1100963442, 0, 0, 0, 0, 0, 0, 0, '2020-06-02', 0, ''),
(22, 'calle4#2-1', 1, 1100963442, 0, 0, 0, 0, 0, 0, 0, '2020-06-02', 0, 'barrio la esperenza');

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
(1100963440, 'Miguel', 'Angel', 'Mejia', 'Macias', 1, '3508737961', 'Carrera11#5-48'),
(1100963441, 'Angel', 'Miguel', 'Macias', 'Mejia', 1, '3508737962', 'Carrera11#5-49'),
(1100963442, 'Miguel', 'Julian', 'Mejia', 'Perez', 1, '3166086171', 'Carrera5b#5-67');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `documento` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) NOT NULL,
  `tipo` int(2) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`documento`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`documento`, `nombre`, `apellidos`, `tipo`, `usuario`, `pass`) VALUES
(1, 'miguel mejia', '', 1, 'mmejia', '123');

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
(4, 'reactivacion', 30000),
(5, 'multa', 200);

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
