-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-05-2020 a las 21:27:57
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

DROP TABLE IF EXISTS `meses`;
CREATE TABLE IF NOT EXISTS `meses` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `ult_dia` date DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
