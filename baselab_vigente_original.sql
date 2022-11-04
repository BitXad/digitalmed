# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : 72.52.185.41
# Port     : 3306
# Database : anagabriela_data


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

#
# Structure for the `empresa` table : 
#

CREATE TABLE `empresa` (
  `empresa_id` int(11) NOT NULL AUTO_INCREMENT,
  `dosificacion_id` int(11) DEFAULT NULL,
  `empresa_nombre` varchar(150) DEFAULT NULL,
  `empresa_eslogan` varchar(250) DEFAULT NULL,
  `empresa_direccion` varchar(250) DEFAULT NULL,
  `empresa_telefono` varchar(250) DEFAULT NULL,
  `empresa_imagen` varchar(250) DEFAULT NULL,
  `empresa_zona` varchar(250) DEFAULT NULL,
  `empresa_ubicacion` varchar(250) DEFAULT NULL,
  `empresa_departamento` varchar(250) DEFAULT NULL,
  `empresa_propietario` varchar(250) DEFAULT NULL,
  `empresa_codigo` varchar(250) DEFAULT NULL,
  `empresa_email` varchar(250) DEFAULT NULL,
  `empresa_profesion` varchar(250) DEFAULT NULL,
  `empresa_cargo` varchar(250) DEFAULT NULL,
  `empresa_latitud` varchar(50) DEFAULT NULL,
  `empresa_longitud` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`empresa_id`),
  UNIQUE KEY `empresa_id` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `estado` table : 
#

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  `estado_color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`estado_id`),
  UNIQUE KEY `estado_id` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `extencion` table : 
#

CREATE TABLE `extencion` (
  `extencion_id` int(11) NOT NULL AUTO_INCREMENT,
  `extencion_descripcion` longtext DEFAULT NULL,
  PRIMARY KEY (`extencion_id`),
  UNIQUE KEY `extencion_id` (`extencion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Structure for the `genero` table : 
#

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL AUTO_INCREMENT,
  `genero_nombre` longtext DEFAULT NULL,
  PRIMARY KEY (`genero_id`),
  UNIQUE KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `paciente` table : 
#

CREATE TABLE `paciente` (
  `paciente_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `extencion_id` int(11) DEFAULT NULL,
  `paciente_nombre` varchar(150) DEFAULT NULL,
  `paciente_edad` int(11) DEFAULT NULL,
  `paciente_direccion` varchar(150) DEFAULT NULL,
  `paciente_ci` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`paciente_id`),
  UNIQUE KEY `paciente_id` (`paciente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

#
# Structure for the `prueba` table : 
#

CREATE TABLE `prueba` (
  `prueba_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `tipoprueba_id` int(11) DEFAULT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `prueba_codigo` varchar(50) DEFAULT NULL,
  `prueba_fechasolicitud` datetime DEFAULT NULL,
  `prueba_medicolab` varchar(250) DEFAULT NULL,
  `prueba_fecharecepcion` datetime DEFAULT NULL,
  `prueba_procedencia` varchar(250) DEFAULT NULL,
  `prueba_fechainforme` datetime DEFAULT NULL,
  `prueba_nombreanalisis` text DEFAULT NULL,
  `prueba_descricpion` text DEFAULT NULL,
  `prueba_resultados` text DEFAULT NULL,
  `prueba_observacion` text DEFAULT NULL,
  `prueba_precio` float DEFAULT NULL,
  `prueba_acuenta` float DEFAULT NULL,
  `prueba_fechacuenta` datetime DEFAULT NULL,
  `prueba_saldo` float DEFAULT NULL,
  `prueba_fechasaldo` datetime DEFAULT NULL,
  `prueba_fecharegistro` timestamp NULL DEFAULT current_timestamp(),
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`prueba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_prueba` table : 
#

CREATE TABLE `tipo_prueba` (
  `tipoprueba_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoprueba_descripcion` varchar(150) DEFAULT NULL,
  `tipoprueba_precio` float DEFAULT NULL,
  PRIMARY KEY (`tipoprueba_id`),
  UNIQUE KEY `tipoprueba_id` (`tipoprueba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(50) DEFAULT NULL,
  `usuario_email` varchar(50) DEFAULT NULL,
  `usuario_login` varchar(50) DEFAULT NULL,
  `usuario_clave` varchar(50) DEFAULT NULL,
  `usuario_imagen` varchar(255) DEFAULT NULL,
  `tipousuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for the `empresa` table  (LIMIT 0,500)
#

INSERT INTO `empresa` (`empresa_id`, `dosificacion_id`, `empresa_nombre`, `empresa_eslogan`, `empresa_direccion`, `empresa_telefono`, `empresa_imagen`, `empresa_zona`, `empresa_ubicacion`, `empresa_departamento`, `empresa_propietario`, `empresa_codigo`, `empresa_email`, `empresa_profesion`, `empresa_cargo`, `empresa_latitud`, `empresa_longitud`) VALUES 
  (1,1,'LABORATORIO TEST CENTER','LAS MAS MEJORES PRUEBAS','URUGUAY Nº 461, EDIFICIO FERRARI 2DO PISO','(591)70351037 - (591)60351322','1582753889.png','ZONA CENTRAL','CERCADO - COCHABAMBA','Cochabamba','ANA GABRIELA ORELLANA RODRIGUEZ','rv9JQ0','testcenter@gmail.com','LIC. BIOQUIMICA','PROPIETARIO',NULL,NULL);
COMMIT;

#
# Data for the `estado` table  (LIMIT 0,500)
#

INSERT INTO `estado` (`estado_id`, `estado_descripcion`, `estado_tipo`, `estado_color`) VALUES 
  (1,'ACTIVO',1,'a04040'),
  (2,'INACTIVO',1,'#a3a3a3');
COMMIT;

#
# Data for the `extencion` table  (LIMIT 0,500)
#

INSERT INTO `extencion` (`extencion_id`, `extencion_descripcion`) VALUES 
  (1,'CB'),
  (2,'LP'),
  (3,'SC'),
  (4,'PT'),
  (5,'OR'),
  (6,'BN'),
  (7,'PD'),
  (8,'TR'),
  (9,'SC');
COMMIT;

#
# Data for the `genero` table  (LIMIT 0,500)
#

INSERT INTO `genero` (`genero_id`, `genero_nombre`) VALUES 
  (1,'MASCULINO'),
  (2,'FEMENINO');
COMMIT;

#
# Data for the `paciente` table  (LIMIT 0,500)
#

INSERT INTO `paciente` (`paciente_id`, `estado_id`, `genero_id`, `extencion_id`, `paciente_nombre`, `paciente_edad`, `paciente_direccion`, `paciente_ci`) VALUES 
  (1,1,1,1,'CORNELIO RIOS RELOZ',38,'N/A','5920892'),
  (2,1,1,1,'MARIO CHOQUE GALARZA',38,'N/A','695983923'),
  (3,1,1,1,'ALAN FRANCO QUISPE VASQUEZ',30,'N/A','13193077'),
  (4,1,1,1,'JUAN JOSE PEÑA GONZALES',37,'N/A','6474081'),
  (5,1,1,1,'SUHAYB AHMED ELSAYED, PASAPORTE CE50733',1,NULL,'CE50733'),
  (6,1,1,1,'ABDELRAHMAN AHMED MOHAMED FATHI AHMED, D.N.I. A15805786',30,NULL,'A15805786'),
  (7,1,2,1,'HAGAR EMADELDEN LOTFY ELSAYED, D.N.I. A21191357',26,NULL,'A21191357'),
  (8,1,1,1,'MAX KONRAD VOGGEL',76,NULL,'0'),
  (9,1,2,1,'LIZETH DANIELA QUIRUCHI GONZALES, C.I.: 8791288',27,NULL,'8791288'),
  (10,1,2,1,'BERTHA PANOZO RODRIGUEZ, C.I.2893206',63,NULL,'2893206'),
  (11,1,2,1,'LAURA ALEXIA SUAREZ SOTO, C.I. 6495229',20,'','6495229'),
  (12,1,1,1,'MAX ALEN LOZA CASILLA, C.I.: 6520683',33,'','6520683'),
  (13,1,1,1,'RAMIRO LOPEZ HINOJOSA, C.I.: 7879328 CBBA',34,'','7879328'),
  (14,1,2,1,'MARIA OLIVERA ZURITA, C.I.: 7907733 CBBA',30,'','7907733'),
  (15,1,1,1,'EDILSON LOPEZ OLIVERA C.I.: 12872948 CBBA',8,'','12872948'),
  (16,1,1,1,'MAX KONRAD VOGGEL,  D.N.I.: 12872948',76,'','12872948'),
  (17,1,1,1,'MAX KONRAD VOGGEL,  PASSPORT: A 2871821',76,'','12872948'),
  (18,1,2,1,'CAROLINA ANTEZANA,  PASSPORT: 663189120',55,'','663189120'),
  (19,1,2,1,'NICOLE VILLARROEL ANTEZANA,  PASSPORT: 559150359',20,'','559150359'),
  (20,1,2,1,'CAROLINA STEPHANIE VILLARROEL,  PASSPORT: 553078092',28,'','553078092'),
  (21,1,1,1,'FERNANDO HERNAN VILLARROEL,  PASSPORT: 663189119',56,'','663189119'),
  (22,1,1,1,'SERGIO ANDRE FLORES CLAURE, CI: 8735832',27,'','8735832'),
  (23,1,1,1,'ERNESTO ROJAS GONZALES, C.I.: 5296859',46,'','5296859'),
  (24,1,2,1,'JHENNY ALVAREZ PACO, DNI: 93.103.233',48,'','93.103.233'),
  (25,1,1,1,'JOSE GONZALO CASTRO SOLIS, C.I.: 4432835',43,'','4432835'),
  (26,1,1,1,'WILLY SANDRO MIER CACERES, C.I.: 3804886',49,'','3804886'),
  (27,1,2,1,'HELEN ZURITA GOMEZ, NIE.: Y3039369W',24,'','Y3039369W'),
  (28,1,1,1,'FRANCO SOLIS CONDORI VICTORIA, C.I.: 3808547',45,'','3808547'),
  (29,1,1,1,'NESTOR ROJAS GOMEZ, C.I.: 4408419 CBBA',49,'','4408419'),
  (30,1,2,1,'ERLINDA CHINO HUACANI, C.I.: 8674168 CBBA',27,'','8674168');
COMMIT;

#
# Data for the `prueba` table  (LIMIT 0,500)
#

INSERT INTO `prueba` (`prueba_id`, `usuario_id`, `tipoprueba_id`, `paciente_id`, `prueba_codigo`, `prueba_fechasolicitud`, `prueba_medicolab`, `prueba_fecharecepcion`, `prueba_procedencia`, `prueba_fechainforme`, `prueba_nombreanalisis`, `prueba_descricpion`, `prueba_resultados`, `prueba_observacion`, `prueba_precio`, `prueba_acuenta`, `prueba_fechacuenta`, `prueba_saldo`, `prueba_fechasaldo`, `prueba_fecharegistro`, `estado_id`) VALUES 
  (1,1,2,1,'CRR001','2021-04-30 15:30:11','N/A','0000-00-00 00:00:00','PERU','2021-05-01 12:15:18','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC\r\n','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.\r\n',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-06 15:45:21',NULL),
  (2,1,2,2,'MCG002','2021-04-30 15:35:25','N/A','0000-00-00 00:00:00','PERU','2021-05-01 12:20:22','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 35.8 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-07 15:45:21',NULL),
  (3,1,2,3,'AFQV03','2021-05-05 07:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-05 18:03:23','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 35.8 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-07 15:45:21',NULL),
  (4,1,2,4,'JJPG04','2021-05-07 08:03:18','N/A','0000-00-00 00:00:00','PERU','2021-05-07 18:14:03','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 35.8 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-07 15:45:21',NULL),
  (5,1,2,5,'A.Q.C.','2021-05-07 08:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-08 09:45:15','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-08 15:45:21',NULL),
  (6,1,2,6,'A.Q.C.','2021-05-07 08:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-08 09:45:35','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-08 15:45:21',NULL),
  (7,1,2,7,'A.Q.C.','2021-05-07 08:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-08 09:45:35','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-09 15:45:21',NULL),
  (8,1,2,8,'A.Q.C.','2021-05-06 16:15:23','N/A','0000-00-00 00:00:00','PERU','2021-05-07 16:30:45','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-09 15:45:21',NULL),
  (9,1,2,9,'A.Q.C.','2021-05-06 15:45:13','N/A','0000-00-00 00:00:00','PERU','2021-05-07 18:10:36','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-10 15:45:21',NULL),
  (10,1,2,10,'A.Q.C.','2021-05-07 08:30:15','N/A','0000-00-00 00:00:00','PERU','2021-05-08 10:27:15','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-10 15:45:21',NULL),
  (11,1,2,11,'A.Q.C.','2021-05-10 07:02:25','N/A','0000-00-00 00:00:00','PERU','2021-05-10 17:31:52','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-10 15:45:21',NULL),
  (12,1,2,12,'A.Q.C.','2021-05-10 08:30:26','N/A','0000-00-00 00:00:00','PERU','2021-05-10 16:44:35','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-11 15:45:21',NULL),
  (13,1,2,13,'A.Q.C.','2021-05-10 08:03:25','N/A','0000-00-00 00:00:00','PERU','2021-05-10 18:20:30','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-11 15:45:21',NULL),
  (14,1,2,14,'A.Q.C.','2021-05-10 08:10:15','N/A','0000-00-00 00:00:00','PERU','2021-05-10 18:20:30','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-11 15:45:21',NULL),
  (15,1,2,15,'A.Q.C.','2021-05-10 08:20:10','N/A','0000-00-00 00:00:00','PERU','2021-05-10 18:22:45','PRUEBA COVID-19','PRUEBA EN TIEMPO REAL\r\n=====================\r\nTEMPERATURA CORPORAL: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2\r\nfue detectado y el paciente es considerado con el virus y se presume que es contagioso.\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2\r\nno esta presente en la muestra por el momento.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-12 15:45:21',NULL),
  (16,1,2,16,'A.Q.C.','2021-05-10 08:20:10','N/A','0000-00-00 00:00:00','PERU','2021-05-10 18:22:45','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\n======================================\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19 NOT DETECTED','RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2\nwas detected and the patient is considered with the virus and is presumed to be contagious.\n\nResults NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2\nIt is not present in the sample at the moment.',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-12 15:45:21',NULL),
  (17,1,2,17,'A.Q.C.','2021-05-14 15:07:22','N/A','0000-00-00 00:00:00','PERU','2021-05-14 14:17:36','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-12 15:45:21',NULL),
  (18,1,2,18,'A.Q.C.','2021-05-14 08:17:54','N/A','0000-00-00 00:00:00','PERU','2021-05-17 16:01:21','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-13 15:45:21',NULL),
  (19,1,2,19,'A.Q.C.','2021-05-14 08:22:26','N/A','0000-00-00 00:00:00','PERU','2021-05-17 16:02:15','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-13 15:45:21',NULL),
  (20,1,2,20,'A.Q.C.','2021-05-14 08:25:33','N/A','0000-00-00 00:00:00','PERU','2021-05-17 16:03:48','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-14 15:45:21',NULL),
  (21,1,2,21,'A.Q.C.','2021-05-14 08:29:24','N/A','0000-00-00 00:00:00','PERU','2021-05-17 16:05:27','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-14 15:45:21',NULL),
  (22,1,2,22,'A.Q.C.','2021-05-14 08:41:34','N/A','0000-00-00 00:00:00','PERU','2021-05-17 17:07:33','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-15 15:45:21',NULL),
  (23,1,2,23,'A.Q.C.','2021-05-14 17:30:11','N/A','0000-00-00 00:00:00','PERU','2021-05-14 08:00:05','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.4 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-15 15:45:21',NULL),
  (24,1,2,24,'A.Q.C.','2021-05-14 17:30:11','N/A','0000-00-00 00:00:00','PERU','2021-05-14 08:00:05','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-17 15:45:21',NULL),
  (25,1,2,25,'A.Q.C.','2021-05-14 17:30:11','N/A','0000-00-00 00:00:00','PERU','2021-05-14 08:00:05','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.2 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-17 15:45:21',NULL),
  (26,1,2,26,'A.Q.C.','2021-05-14 17:30:11','N/A','0000-00-00 00:00:00','PERU','2021-05-14 08:00:05','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.8 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-17 15:45:21',NULL),
  (27,1,2,27,'A.Q.C.','2021-05-14 17:30:11','N/A','0000-00-00 00:00:00','PERU','2021-05-14 08:00:05','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-17 15:45:21',NULL),
  (28,1,2,28,'A.Q.C.','2021-05-14 08:07:53','N/A','0000-00-00 00:00:00','PERU','2021-05-14 18:17:54','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.4 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-17 15:45:21',NULL),
  (29,1,2,29,'A.Q.C.','2021-05-15 09:01:25','N/A','0000-00-00 00:00:00','PERU','2021-05-16 12:45:13','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-17 15:45:21',NULL),
  (30,1,2,30,'A.Q.C.','2021-05-16 08:01:22','N/A','0000-00-00 00:00:00','PERU','2021-05-16 16:59:23','PRUEBA/TEST COVID-19','PRUEBA EN TIEMPO REAL / REAL TIME TEST\r\n======================================\r\nTEMPERATURA CORPORAL / BODY TEMPERATURE: 36.5 ºC','PCR-TR COVID-19  NO DETECTADO / NOT DETECTED','Resultado DETECTADO, es considerado como positivo para COVID-19, indica que RNA del SARS-CoV-2 fue detectado y el paciente es considerado con el virus y se presume que es contagioso. (<small> RESULT DETECTED, it is considered positive for COVID-19, indicates that RNA of SARS-CoV-2 was detected and the patient is considered with the virus and is presumed to be contagious.</small>)\r\n\r\nResultados NO DETECTADOS, es considerado como negativo para COVID-19, indica que RNA del SARS-CoV-2 no esta presente en la muestra por el momento. (<small> Results NOT DETECTED, it is considered negative for COVID-19, indicates that RNA of SARS-CoV-2 It is not present in the sample at the moment.</small>).',500,500,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','2021-05-17 15:45:21',NULL);
COMMIT;

#
# Data for the `tipo_prueba` table  (LIMIT 0,500)
#

INSERT INTO `tipo_prueba` (`tipoprueba_id`, `tipoprueba_descripcion`, `tipoprueba_precio`) VALUES 
  (1,'PRUEBA RAPIDA',150),
  (2,'HISOPADO NASOFARINGEO',150),
  (3,'PRUEBA ANTIGENO NASAL',200),
  (4,'PRUEBA DE ELISSA',250),
  (5,'PRUEBA PCR',500);
COMMIT;

#
# Data for the `usuario` table  (LIMIT 0,500)
#

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_email`, `usuario_login`, `usuario_clave`, `usuario_imagen`, `tipousuario_id`) VALUES 
  (1,'Ana Gabriela Orellana R.','superusuario@micorreo.com','super','1b3231655cebb7a1f783eddf27d254ca','1616930453.jpg',1);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;