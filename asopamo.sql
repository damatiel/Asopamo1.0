/*
 Navicat Premium Data Transfer

 Source Server         : miguel
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : asopamo

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 07/05/2020 22:05:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for facturacion
-- ----------------------------
DROP TABLE IF EXISTS `facturacion`;
CREATE TABLE `facturacion`  (
  `numero_fact` int(11) NOT NULL,
  `id_punto` int(11) NULL DEFAULT NULL,
  `documento` int(20) NULL DEFAULT NULL,
  `fecha_fact` date NULL DEFAULT NULL,
  `periodo_fact` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `admin_mes` decimal(60, 0) NULL DEFAULT NULL,
  `saldo_ant` decimal(60, 0) NULL DEFAULT NULL,
  `id_mes` int(12) NULL DEFAULT NULL,
  `operador` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_pagar` decimal(60, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`numero_fact`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for meses
-- ----------------------------
DROP TABLE IF EXISTS `meses`;
CREATE TABLE `meses`  (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ult_dia` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for puntos
-- ----------------------------
DROP TABLE IF EXISTS `puntos`;
CREATE TABLE `puntos`  (
  `id` int(11) NOT NULL,
  `dir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` int(2) NULL DEFAULT NULL,
  `doc_sub` int(20) NOT NULL,
  `saldo_ant` int(60) NULL DEFAULT NULL,
  `contador` int(60) NULL DEFAULT NULL,
  `descuento` int(60) NULL DEFAULT NULL,
  `form_pago` int(2) NULL DEFAULT NULL,
  `fecha_act` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `doc_sub`) USING BTREE,
  INDEX `doc_sub`(`doc_sub`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for suscriptores
-- ----------------------------
DROP TABLE IF EXISTS `suscriptores`;
CREATE TABLE `suscriptores`  (
  `doc` int(20) NOT NULL,
  `primer_nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `segundo_nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `primer_ape` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `segundo_ape` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `estado` int(2) NULL DEFAULT NULL,
  `tel` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `direc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`doc`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suscriptores
-- ----------------------------
INSERT INTO `suscriptores` VALUES (1100963440, 'Miguel', 'Angel', 'Mejia', 'macias', 1, '3508737961', 'cr8#5-38');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipo` int(2) NULL DEFAULT NULL,
  `usuario` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'miguel mejia', 1, 'mmejia', '123');

-- ----------------------------
-- Table structure for valores
-- ----------------------------
DROP TABLE IF EXISTS `valores`;
CREATE TABLE `valores`  (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `valor` double(255, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
