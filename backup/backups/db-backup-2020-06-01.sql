

CREATE TABLE `ent_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ent_pago VALUES("1","ASOPAMO");
INSERT INTO ent_pago VALUES("2","SERVIMCOOP");
INSERT INTO ent_pago VALUES("3","BANCO AGRARIO");





CREATE TABLE `facturacion` (
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
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO facturacion VALUES("157","15","1100963440","2020-05-31","enero","13000","0","1","miguel mejia","26200");
INSERT INTO facturacion VALUES("158","16","1100963441","2020-05-31","enero","13000","0","1","miguel mejia","13000");
INSERT INTO facturacion VALUES("159","17","1100963440","2020-05-31","enero","13000","0","1","miguel mejia","13000");
INSERT INTO facturacion VALUES("160","15","1100963440","2020-05-31","febrero","13000","13000","2","miguel mejia","26200");
INSERT INTO facturacion VALUES("161","16","1100963441","2020-05-31","febrero","13000","13000","2","miguel mejia","26200");
INSERT INTO facturacion VALUES("162","17","1100963440","2020-05-31","febrero","13000","13000","2","miguel mejia","26200");
INSERT INTO facturacion VALUES("163","15","1100963440","2020-05-31","marzo","13000","0","3","miguel mejia","26200");
INSERT INTO facturacion VALUES("164","16","1100963441","2020-05-31","marzo","13000","0","3","miguel mejia","0");
INSERT INTO facturacion VALUES("165","17","1100963440","2020-05-31","marzo","13000","0","3","miguel mejia","0");
INSERT INTO facturacion VALUES("166","15","1100963440","2020-05-31","abril","13000","0","4","miguel mejia","26200");
INSERT INTO facturacion VALUES("167","16","1100963441","2020-05-31","abril","13000","0","4","miguel mejia","13000");
INSERT INTO facturacion VALUES("168","17","1100963440","2020-05-31","abril","13000","0","4","miguel mejia","13000");
INSERT INTO facturacion VALUES("169","15","1100963440","2020-05-31","mayo","13000","13000","5","miguel mejia","26200");
INSERT INTO facturacion VALUES("170","16","1100963441","2020-05-31","mayo","13000","13000","5","miguel mejia","26200");
INSERT INTO facturacion VALUES("171","17","1100963440","2020-05-31","mayo","13000","13000","5","miguel mejia","26200");





CREATE TABLE `pagos` (
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
  PRIMARY KEY (`id_pagos`),
  KEY `num_factura` (`num_factura`,`id_punto`,`id_entPago`),
  KEY `id_entPago` (`id_entPago`),
  KEY `id_punto` (`id_punto`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`num_factura`) REFERENCES `facturacion` (`numero_fact`),
  CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_entPago`) REFERENCES `ent_pago` (`id`),
  CONSTRAINT `pagos_ibfk_3` FOREIGN KEY (`id_punto`) REFERENCES `puntos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

INSERT INTO pagos VALUES("82","163","15","1","2020-05-31","0","2020-01-31","Miguel","2020-05-31","carrera11#5-48","enero","13000","0","0","0","0","0","13000","1100963440","0","0");
INSERT INTO pagos VALUES("83","164","16","1","2020-05-31","0","2020-01-31","Angel","2020-05-31","carrera11#5-49","enero","13000","0","0","0","0","0","13000","1100963441","0","0");
INSERT INTO pagos VALUES("84","165","17","1","2020-05-31","0","2020-01-31","Miguel","2020-05-31","calle11#5-48","enero","13000","0","0","0","0","0","13000","1100963440","0","0");
INSERT INTO pagos VALUES("85","163","15","1","2020-05-31","1","2020-02-28","Miguel","2020-05-31","carrera11#5-48","febrero","13000","13000","0","0","0","0","26200","1100963440","0","200");
INSERT INTO pagos VALUES("86","164","16","1","2020-05-31","1","2020-02-28","Angel","2020-05-31","carrera11#5-49","febrero","13000","13000","0","0","0","0","26200","1100963441","0","200");
INSERT INTO pagos VALUES("87","165","17","1","2020-05-31","1","2020-02-28","Miguel","2020-05-31","calle11#5-48","febrero","13000","13000","0","0","0","0","26200","1100963440","0","200");
INSERT INTO pagos VALUES("88","163","15","1","2020-05-31","2","2020-03-31","Miguel","2020-05-31","carrera11#5-48","marzo","13000","26200","0","0","0","0","39400","1100963440","0","200");
INSERT INTO pagos VALUES("89","164","16","1","2020-05-31","2","2020-03-31","Angel","2020-05-31","carrera11#5-49","marzo","13000","26200","0","0","0","0","39400","1100963441","0","200");
INSERT INTO pagos VALUES("90","165","17","1","2020-05-31","2","2020-03-31","Miguel","2020-05-31","calle11#5-48","marzo","13000","26200","0","0","0","0","39400","1100963440","0","200");
INSERT INTO pagos VALUES("91","","15","","","0","2020-04-30","Miguel","2020-05-31","carrera11#5-48","abril","13000","0","0","0","0","0","13000","1100963440","0","0");
INSERT INTO pagos VALUES("92","","16","","","0","2020-04-30","Angel","2020-05-31","carrera11#5-49","abril","13000","0","0","0","0","0","13000","1100963441","0","0");
INSERT INTO pagos VALUES("93","","17","","","0","2020-04-30","Miguel","2020-05-31","calle11#5-48","abril","13000","0","0","0","0","0","13000","1100963440","0","0");
INSERT INTO pagos VALUES("94","","15","","","1","2020-05-29","Miguel","2020-05-31","carrera11#5-48","mayo","13000","13000","0","0","0","0","26200","1100963440","0","200");
INSERT INTO pagos VALUES("95","","16","","","1","2020-05-29","Angel","2020-05-31","carrera11#5-49","mayo","13000","13000","0","0","0","0","26200","1100963441","0","200");
INSERT INTO pagos VALUES("96","","17","","","1","2020-05-29","Miguel","2020-05-31","calle11#5-48","mayo","13000","13000","0","0","0","0","26200","1100963440","0","200");
INSERT INTO pagos VALUES("97","","","","","1","2020-05-29","Miguel","2020-05-31","carrera11#5-48","mayo","13000","13000","0","0","0","0","26400","1100963440","0","");
INSERT INTO pagos VALUES("98","","","","","1","2020-05-29","Miguel","2020-05-31","carrera11#5-48","mayo","13000","13000","0","0","0","0","26400","1100963440","0","");
INSERT INTO pagos VALUES("99","","","","","1","2020-05-29","Miguel","2020-05-31","carrera11#5-48","mayo","13000","13000","0","0","0","0","26400","1100963440","0","");
INSERT INTO pagos VALUES("100","","","","","1","2020-05-29","Miguel","2020-05-31","carrera11#5-48","mayo","13000","13000","0","0","0","0","26200","1100963440","0","");





CREATE TABLE `puntos` (
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
  PRIMARY KEY (`id`,`dir`) USING BTREE,
  KEY `doc_suscriptor` (`doc_suscriptor`) USING BTREE,
  KEY `id` (`id`),
  CONSTRAINT `puntos_ibfk_1` FOREIGN KEY (`doc_suscriptor`) REFERENCES `suscriptores` (`doc`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO puntos VALUES("15","carrera11#5-48","1","1100963440","26200","1","0","0","0","0","0","2020-05-31","200");
INSERT INTO puntos VALUES("16","carrera11#5-49","1","1100963441","26200","1","0","0","0","0","0","2020-05-31","200");
INSERT INTO puntos VALUES("17","calle11#5-48","1","1100963440","26200","1","0","0","0","0","0","2020-05-31","200");





CREATE TABLE `suscriptores` (
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

INSERT INTO suscriptores VALUES("1100963440","Miguel","Angel","Mejia","Macias","1","3508737961","Carrera11#5-48");
INSERT INTO suscriptores VALUES("1100963441","Angel","Miguel","Macias","Mejia","1","3508737962","Carrera11#5-49");





CREATE TABLE `usuarios` (
  `documento` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) NOT NULL,
  `tipo` int(2) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`documento`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO usuarios VALUES("1","miguel mejia","","1","mmejia","123");





CREATE TABLE `valores` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  `valor` double(255,0) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO valores VALUES("1","administracion_mes","13000");
INSERT INTO valores VALUES("2","matricula","50000");
INSERT INTO valores VALUES("3","traslado","10000");
INSERT INTO valores VALUES("4","reactivacion","30000");
INSERT INTO valores VALUES("5","multa","200");



