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

 Date: 31/05/2020 17:49:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ent_pago
-- ----------------------------
DROP TABLE IF EXISTS `ent_pago`;
CREATE TABLE `ent_pago`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ent_pago
-- ----------------------------
INSERT INTO `ent_pago` VALUES (1, 'ASOPAMO');
INSERT INTO `ent_pago` VALUES (2, 'SERVIMCOOP');
INSERT INTO `ent_pago` VALUES (3, 'BANCO AGRARIO');

-- ----------------------------
-- Table structure for facturacion
-- ----------------------------
DROP TABLE IF EXISTS `facturacion`;
CREATE TABLE `facturacion`  (
  `numero_fact` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE = InnoDB AUTO_INCREMENT = 172 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facturacion
-- ----------------------------
INSERT INTO `facturacion` VALUES (157, 15, 1100963440, '2020-05-31', 'enero', 13000, 0, 1, 'miguel mejia', 26200);
INSERT INTO `facturacion` VALUES (158, 16, 1100963441, '2020-05-31', 'enero', 13000, 0, 1, 'miguel mejia', 13000);
INSERT INTO `facturacion` VALUES (159, 17, 1100963440, '2020-05-31', 'enero', 13000, 0, 1, 'miguel mejia', 13000);
INSERT INTO `facturacion` VALUES (160, 15, 1100963440, '2020-05-31', 'febrero', 13000, 13000, 2, 'miguel mejia', 26200);
INSERT INTO `facturacion` VALUES (161, 16, 1100963441, '2020-05-31', 'febrero', 13000, 13000, 2, 'miguel mejia', 26200);
INSERT INTO `facturacion` VALUES (162, 17, 1100963440, '2020-05-31', 'febrero', 13000, 13000, 2, 'miguel mejia', 26200);
INSERT INTO `facturacion` VALUES (163, 15, 1100963440, '2020-05-31', 'marzo', 13000, 0, 3, 'miguel mejia', 26200);
INSERT INTO `facturacion` VALUES (164, 16, 1100963441, '2020-05-31', 'marzo', 13000, 0, 3, 'miguel mejia', 0);
INSERT INTO `facturacion` VALUES (165, 17, 1100963440, '2020-05-31', 'marzo', 13000, 0, 3, 'miguel mejia', 0);
INSERT INTO `facturacion` VALUES (166, 15, 1100963440, '2020-05-31', 'abril', 13000, 0, 4, 'miguel mejia', 26200);
INSERT INTO `facturacion` VALUES (167, 16, 1100963441, '2020-05-31', 'abril', 13000, 0, 4, 'miguel mejia', 13000);
INSERT INTO `facturacion` VALUES (168, 17, 1100963440, '2020-05-31', 'abril', 13000, 0, 4, 'miguel mejia', 13000);
INSERT INTO `facturacion` VALUES (169, 15, 1100963440, '2020-05-31', 'mayo', 13000, 13000, 5, 'miguel mejia', 26200);
INSERT INTO `facturacion` VALUES (170, 16, 1100963441, '2020-05-31', 'mayo', 13000, 13000, 5, 'miguel mejia', 26200);
INSERT INTO `facturacion` VALUES (171, 17, 1100963440, '2020-05-31', 'mayo', 13000, 13000, 5, 'miguel mejia', 26200);

-- ----------------------------
-- Table structure for pagos
-- ----------------------------
DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos`  (
  `id_pagos` int(11) NOT NULL AUTO_INCREMENT,
  `num_factura` int(11) NULL DEFAULT NULL,
  `id_punto` int(11) NULL DEFAULT NULL,
  `id_entPago` int(11) NULL DEFAULT NULL,
  `fecha_pago` date NULL DEFAULT NULL,
  `atrasos` int(11) NULL DEFAULT NULL,
  `fecha_limite` date NULL DEFAULT NULL,
  `nom_suscriptor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_factura` date NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `periodo_fact` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `admin_mes` int(12) NULL DEFAULT NULL,
  `saldo_anterior` int(12) NULL DEFAULT NULL,
  `descuento` int(12) NULL DEFAULT NULL,
  `traslado` int(12) NULL DEFAULT NULL,
  `reactivacion` int(12) NULL DEFAULT NULL,
  `matricula` int(12) NULL DEFAULT NULL,
  `total` int(12) NULL DEFAULT NULL,
  `documento` int(12) NULL DEFAULT NULL,
  `estado` int(11) NULL DEFAULT NULL,
  `multa` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pagos`) USING BTREE,
  INDEX `num_factura`(`num_factura`, `id_punto`, `id_entPago`) USING BTREE,
  INDEX `id_entPago`(`id_entPago`) USING BTREE,
  INDEX `id_punto`(`id_punto`) USING BTREE,
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`num_factura`) REFERENCES `facturacion` (`numero_fact`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_entPago`) REFERENCES `ent_pago` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pagos_ibfk_3` FOREIGN KEY (`id_punto`) REFERENCES `puntos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 101 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pagos
-- ----------------------------
INSERT INTO `pagos` VALUES (82, 163, 15, 1, '2020-05-31', 0, '2020-01-31', 'Miguel', '2020-05-31', 'carrera11#5-48', 'enero', 13000, 0, 0, 0, 0, 0, 13000, 1100963440, 0, 0);
INSERT INTO `pagos` VALUES (83, 164, 16, 1, '2020-05-31', 0, '2020-01-31', 'Angel', '2020-05-31', 'carrera11#5-49', 'enero', 13000, 0, 0, 0, 0, 0, 13000, 1100963441, 0, 0);
INSERT INTO `pagos` VALUES (84, 165, 17, 1, '2020-05-31', 0, '2020-01-31', 'Miguel', '2020-05-31', 'calle11#5-48', 'enero', 13000, 0, 0, 0, 0, 0, 13000, 1100963440, 0, 0);
INSERT INTO `pagos` VALUES (85, 163, 15, 1, '2020-05-31', 1, '2020-02-28', 'Miguel', '2020-05-31', 'carrera11#5-48', 'febrero', 13000, 13000, 0, 0, 0, 0, 26200, 1100963440, 0, 200);
INSERT INTO `pagos` VALUES (86, 164, 16, 1, '2020-05-31', 1, '2020-02-28', 'Angel', '2020-05-31', 'carrera11#5-49', 'febrero', 13000, 13000, 0, 0, 0, 0, 26200, 1100963441, 0, 200);
INSERT INTO `pagos` VALUES (87, 165, 17, 1, '2020-05-31', 1, '2020-02-28', 'Miguel', '2020-05-31', 'calle11#5-48', 'febrero', 13000, 13000, 0, 0, 0, 0, 26200, 1100963440, 0, 200);
INSERT INTO `pagos` VALUES (88, 163, 15, 1, '2020-05-31', 2, '2020-03-31', 'Miguel', '2020-05-31', 'carrera11#5-48', 'marzo', 13000, 26200, 0, 0, 0, 0, 39400, 1100963440, 0, 200);
INSERT INTO `pagos` VALUES (89, 164, 16, 1, '2020-05-31', 2, '2020-03-31', 'Angel', '2020-05-31', 'carrera11#5-49', 'marzo', 13000, 26200, 0, 0, 0, 0, 39400, 1100963441, 0, 200);
INSERT INTO `pagos` VALUES (90, 165, 17, 1, '2020-05-31', 2, '2020-03-31', 'Miguel', '2020-05-31', 'calle11#5-48', 'marzo', 13000, 26200, 0, 0, 0, 0, 39400, 1100963440, 0, 200);
INSERT INTO `pagos` VALUES (91, NULL, 15, NULL, NULL, 0, '2020-04-30', 'Miguel', '2020-05-31', 'carrera11#5-48', 'abril', 13000, 0, 0, 0, 0, 0, 13000, 1100963440, 0, 0);
INSERT INTO `pagos` VALUES (92, NULL, 16, NULL, NULL, 0, '2020-04-30', 'Angel', '2020-05-31', 'carrera11#5-49', 'abril', 13000, 0, 0, 0, 0, 0, 13000, 1100963441, 0, 0);
INSERT INTO `pagos` VALUES (93, NULL, 17, NULL, NULL, 0, '2020-04-30', 'Miguel', '2020-05-31', 'calle11#5-48', 'abril', 13000, 0, 0, 0, 0, 0, 13000, 1100963440, 0, 0);
INSERT INTO `pagos` VALUES (94, NULL, 15, NULL, NULL, 1, '2020-05-29', 'Miguel', '2020-05-31', 'carrera11#5-48', 'mayo', 13000, 13000, 0, 0, 0, 0, 26200, 1100963440, 0, 200);
INSERT INTO `pagos` VALUES (95, NULL, 16, NULL, NULL, 1, '2020-05-29', 'Angel', '2020-05-31', 'carrera11#5-49', 'mayo', 13000, 13000, 0, 0, 0, 0, 26200, 1100963441, 0, 200);
INSERT INTO `pagos` VALUES (96, NULL, 17, NULL, NULL, 1, '2020-05-29', 'Miguel', '2020-05-31', 'calle11#5-48', 'mayo', 13000, 13000, 0, 0, 0, 0, 26200, 1100963440, 0, 200);
INSERT INTO `pagos` VALUES (97, NULL, NULL, NULL, NULL, 1, '2020-05-29', 'Miguel', '2020-05-31', 'carrera11#5-48', 'mayo', 13000, 13000, 0, 0, 0, 0, 26400, 1100963440, 0, NULL);
INSERT INTO `pagos` VALUES (98, NULL, NULL, NULL, NULL, 1, '2020-05-29', 'Miguel', '2020-05-31', 'carrera11#5-48', 'mayo', 13000, 13000, 0, 0, 0, 0, 26400, 1100963440, 0, NULL);
INSERT INTO `pagos` VALUES (99, NULL, NULL, NULL, NULL, 1, '2020-05-29', 'Miguel', '2020-05-31', 'carrera11#5-48', 'mayo', 13000, 13000, 0, 0, 0, 0, 26400, 1100963440, 0, NULL);
INSERT INTO `pagos` VALUES (100, NULL, NULL, NULL, NULL, 1, '2020-05-29', 'Miguel', '2020-05-31', 'carrera11#5-48', 'mayo', 13000, 13000, 0, 0, 0, 0, 26200, 1100963440, 0, NULL);

-- ----------------------------
-- Table structure for puntos
-- ----------------------------
DROP TABLE IF EXISTS `puntos`;
CREATE TABLE `puntos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` int(2) NULL DEFAULT NULL,
  `doc_suscriptor` int(20) NULL DEFAULT NULL,
  `saldo_ant` int(60) NULL DEFAULT NULL,
  `contador` int(60) NULL DEFAULT NULL,
  `descuento` int(60) NULL DEFAULT NULL,
  `matricula` int(11) NULL DEFAULT NULL,
  `traslado` int(11) NULL DEFAULT NULL,
  `reactivacion` int(11) NULL DEFAULT NULL,
  `form_pago` int(2) NULL DEFAULT NULL,
  `fecha_act` date NULL DEFAULT NULL,
  `multa` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `dir`) USING BTREE,
  INDEX `doc_suscriptor`(`doc_suscriptor`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  CONSTRAINT `puntos_ibfk_1` FOREIGN KEY (`doc_suscriptor`) REFERENCES `suscriptores` (`doc`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of puntos
-- ----------------------------
INSERT INTO `puntos` VALUES (15, 'carrera11#5-48', 1, 1100963440, 26200, 1, 0, 0, 0, 0, 0, '2020-05-31', 200);
INSERT INTO `puntos` VALUES (16, 'carrera11#5-49', 1, 1100963441, 26200, 1, 0, 0, 0, 0, 0, '2020-05-31', 200);
INSERT INTO `puntos` VALUES (17, 'calle11#5-48', 1, 1100963440, 26200, 1, 0, 0, 0, 0, 0, '2020-05-31', 200);

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
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suscriptores
-- ----------------------------
INSERT INTO `suscriptores` VALUES (1100963440, 'Miguel', 'Angel', 'Mejia', 'Macias', 1, '3508737961', 'Carrera11#5-48');
INSERT INTO `suscriptores` VALUES (1100963441, 'Angel', 'Miguel', 'Macias', 'Mejia', 1, '3508737962', 'Carrera11#5-49');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `documento` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `apellidos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipo` int(2) NULL DEFAULT NULL,
  `usuario` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`documento`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'miguel mejia', '', 1, 'mmejia', '123');

-- ----------------------------
-- Table structure for valores
-- ----------------------------
DROP TABLE IF EXISTS `valores`;
CREATE TABLE `valores`  (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `valor` double(255, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of valores
-- ----------------------------
INSERT INTO `valores` VALUES (1, 'administracion_mes', 13000);
INSERT INTO `valores` VALUES (2, 'matricula', 50000);
INSERT INTO `valores` VALUES (3, 'traslado', 10000);
INSERT INTO `valores` VALUES (4, 'reactivacion', 30000);
INSERT INTO `valores` VALUES (5, 'multa', 200);

SET FOREIGN_KEY_CHECKS = 1;
