-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2020 a las 07:02:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `facturacion` (
  `numero_fact` int(11) NOT NULL,
  `id_punto` int(11) DEFAULT NULL,
  `documento` int(20) DEFAULT NULL,
  `fecha_fact` date DEFAULT NULL,
  `periodo_fact` varchar(50) DEFAULT NULL,
  `admin_mes` decimal(60,0) DEFAULT NULL,
  `saldo_ant` decimal(60,0) DEFAULT NULL,
  `id_mes` int(12) DEFAULT NULL,
  `operador` varchar(255) DEFAULT NULL,
  `total_pagar` decimal(60,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `ult_dia` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos`
--

CREATE TABLE `puntos` (
  `id` int(11) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `estado` int(2) DEFAULT NULL,
  `doc_suscriptor` int(20) DEFAULT NULL,
  `saldo_ant` int(60) DEFAULT NULL,
  `contador` int(60) DEFAULT NULL,
  `descuento` int(60) DEFAULT NULL,
  `form_pago` int(2) DEFAULT NULL,
  `fecha_act` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `puntos`
--

INSERT INTO `puntos` (`id`, `dir`, `estado`, `doc_suscriptor`, `saldo_ant`, `contador`, `descuento`, `form_pago`, `fecha_act`) VALUES
(3, 'calle1#2-3', 1, 1100963440, NULL, NULL, NULL, NULL, '2020-05-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `doc` int(20) NOT NULL,
  `primer_nom` varchar(50) DEFAULT NULL,
  `segundo_nom` varchar(50) DEFAULT NULL,
  `primer_ape` varchar(50) DEFAULT NULL,
  `segundo_ape` varchar(50) DEFAULT NULL,
  `estado` int(2) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `direc` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`doc`, `primer_nom`, `segundo_nom`, `primer_ape`, `segundo_ape`, `estado`, `tel`, `direc`) VALUES
(1100964440, 'Miguel', 'Angel', 'Mejia', 'Macias', 1, '3508737961', 'cr4#5-38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
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

CREATE TABLE `valores` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  `valor` double(255,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`numero_fact`) USING BTREE,
  ADD KEY `id_punto` (`id_punto`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `puntos`
--
ALTER TABLE `puntos`
  ADD PRIMARY KEY (`id`,`dir`) USING BTREE,
  ADD KEY `doc_suscriptor` (`doc_suscriptor`) USING BTREE;

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`doc`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puntos`
--
ALTER TABLE `puntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
