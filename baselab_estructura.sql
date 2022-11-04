# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : baselab


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

#
# Structure for the `categoria_egreso` table : 
#

CREATE TABLE `categoria_egreso` (
  `id_categr` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_categr` varchar(50) NOT NULL,
  `descrip_categr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categr`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Structure for the `categoria_ingreso` table : 
#

CREATE TABLE `categoria_ingreso` (
  `id_cating` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_cating` varchar(50) NOT NULL,
  `descrip_cating` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cating`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `ci_session` table : 
#

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for the `dosificacion` table : 
#

CREATE TABLE `dosificacion` (
  `dosificacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `dosificacion_fechahora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dosificacion_nitemisor` bigint(20) DEFAULT NULL,
  `dosificacion_autorizacion` varchar(30) DEFAULT NULL,
  `dosificacion_llave` varchar(250) DEFAULT NULL,
  `dosificacion_fechalimite` date DEFAULT NULL,
  `dosificacion_numfact` int(11) DEFAULT NULL,
  `dosificacion_leyenda1` varchar(250) DEFAULT NULL,
  `dosificacion_leyenda2` varchar(250) DEFAULT NULL,
  `dosificacion_leyenda3` varchar(250) DEFAULT NULL,
  `dosificacion_leyenda4` varchar(250) DEFAULT NULL,
  `dosificacion_leyenda5` varchar(250) DEFAULT NULL,
  `dosificacion_sucursal` varchar(50) DEFAULT NULL,
  `dosificacion_sfc` varchar(20) DEFAULT NULL,
  `dosificacion_actividad` varchar(250) DEFAULT NULL,
  `dosificasion_actividadsec` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`dosificacion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `egresos` table : 
#

CREATE TABLE `egresos` (
  `egreso_id` int(11) NOT NULL AUTO_INCREMENT,
  `egreso_numero` int(11) NOT NULL,
  `usuario_id` varchar(55) NOT NULL,
  `egreso_categoria` text NOT NULL,
  `egreso_nombre` varchar(150) DEFAULT NULL,
  `egreso_monto` float DEFAULT NULL,
  `egreso_moneda` varchar(10) DEFAULT NULL,
  `egreso_concepto` varchar(250) DEFAULT NULL,
  `egreso_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `egreso_tc` double DEFAULT NULL,
  PRIMARY KEY (`egreso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=821 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Structure for the `estado` table : 
#

CREATE TABLE `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_descripcion` varchar(50) DEFAULT NULL,
  `estado_tipo` int(11) DEFAULT NULL,
  `estado_color` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`estado_id`),
  UNIQUE KEY `estado_id` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Structure for the `extencion` table : 
#

CREATE TABLE `extencion` (
  `extencion_id` int(11) NOT NULL AUTO_INCREMENT,
  `extencion_descripcion` longtext DEFAULT NULL,
  PRIMARY KEY (`extencion_id`),
  UNIQUE KEY `extencion_id` (`extencion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Structure for the `factura` table : 
#

CREATE TABLE `factura` (
  `factura_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `factura_fechaventa` date DEFAULT NULL,
  `factura_fecha` date DEFAULT NULL,
  `factura_hora` time DEFAULT NULL,
  `factura_subtotal` float DEFAULT NULL,
  `factura_ice` float DEFAULT NULL,
  `factura_exento` float DEFAULT NULL,
  `factura_descuento` float DEFAULT NULL,
  `factura_total` float DEFAULT NULL,
  `factura_numero` float DEFAULT NULL,
  `factura_autorizacion` varchar(30) DEFAULT NULL,
  `factura_llave` varchar(250) DEFAULT NULL,
  `factura_fechalimite` date DEFAULT NULL,
  `factura_codigocontrol` varchar(50) DEFAULT NULL,
  `factura_leyenda1` varchar(250) DEFAULT NULL,
  `factura_leyenda2` varchar(250) DEFAULT NULL,
  `factura_nit` bigint(20) DEFAULT NULL,
  `factura_razonsocial` varchar(150) DEFAULT NULL,
  `factura_nitemisor` bigint(20) DEFAULT NULL,
  `factura_sucursal` varchar(150) DEFAULT NULL,
  `factura_sfc` varchar(20) DEFAULT NULL,
  `factura_actividad` varchar(250) DEFAULT NULL,
  `cuota_id` int(11) DEFAULT NULL,
  `credito_id` int(11) DEFAULT NULL,
  `ingreso_id` int(11) DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipotrans_id` int(11) DEFAULT NULL,
  `factura_efectivo` float DEFAULT NULL,
  `factura_cambio` float DEFAULT NULL,
  PRIMARY KEY (`factura_id`),
  KEY `venta_id` (`venta_id`,`estado_id`),
  KEY `factura_fk` (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=623 DEFAULT CHARSET=latin1;

#
# Structure for the `genero` table : 
#

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL AUTO_INCREMENT,
  `genero_nombre` longtext DEFAULT NULL,
  PRIMARY KEY (`genero_id`),
  UNIQUE KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Structure for the `ingresos` table : 
#

CREATE TABLE `ingresos` (
  `ingreso_id` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso_numero` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ingreso_categoria` text NOT NULL,
  `ingreso_nombre` varchar(150) DEFAULT NULL,
  `ingreso_monto` float DEFAULT NULL,
  `ingreso_moneda` varchar(10) DEFAULT NULL,
  `ingreso_concepto` varchar(250) DEFAULT NULL,
  `ingreso_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ingreso_tc` float DEFAULT NULL,
  PRIMARY KEY (`ingreso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

#
# Structure for the `licencia` table : 
#

CREATE TABLE `licencia` (
  `licencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `licencia_fechaactivacion` date DEFAULT NULL,
  `licencia_fechalimite` date DEFAULT NULL,
  `licencia_llave` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`licencia_id`),
  UNIQUE KEY `licencia_id` (`licencia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `moneda` table : 
#

CREATE TABLE `moneda` (
  `moneda_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `moneda_descripcion` varchar(50) DEFAULT NULL,
  `moneda_tc` float DEFAULT NULL,
  PRIMARY KEY (`moneda_id`)
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
  `paciente_codigo` varchar(20) DEFAULT NULL,
  `paciente_ci` varchar(20) DEFAULT NULL,
  `paciente_celular` varchar(50) DEFAULT NULL,
  `paciente_telefono` varchar(50) DEFAULT NULL,
  `paciente_nit` varchar(30) DEFAULT NULL,
  `paciente_razon` varchar(250) DEFAULT NULL,
  `paciente_foto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`paciente_id`),
  UNIQUE KEY `paciente_id` (`paciente_id`),
  KEY `fk_estado_paciente` (`estado_id`),
  KEY `fk_extencion_ci` (`extencion_id`),
  KEY `fk_genero_paciente` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Structure for the `parametros` table : 
#

CREATE TABLE `parametros` (
  `parametro_id` int(11) NOT NULL AUTO_INCREMENT,
  `parametro_numrecegr` int(11) DEFAULT NULL,
  `parametro_numrecing` int(11) DEFAULT NULL,
  `parametro_copiasfact` int(11) DEFAULT NULL,
  `parametro_tipoimpresora` varchar(20) DEFAULT NULL,
  `parametro_numcuotas` int(11) DEFAULT NULL,
  `parametro_montomax` float(9,3) DEFAULT NULL,
  `parametro_diasgracia` int(11) DEFAULT NULL,
  `parametro_diapago` int(11) DEFAULT NULL,
  `parametro_periododias` int(11) DEFAULT NULL,
  `parametro_interes` int(11) DEFAULT NULL,
  `parametro_tituldoc` varchar(150) NOT NULL,
  `parametro_mostrarcategoria` int(11) DEFAULT NULL,
  `parametro_diagnostico` varchar(50) DEFAULT NULL,
  `parametro_solucion` varchar(50) DEFAULT NULL,
  `parametro_modoventas` int(11) DEFAULT NULL,
  `parametro_imprimircomanda` int(11) DEFAULT NULL,
  `parametro_anchoboton` int(11) DEFAULT NULL,
  `parametro_altoboton` int(11) DEFAULT NULL,
  `parametro_colorboton` varchar(30) DEFAULT NULL,
  `parametro_anchoimagen` int(11) DEFAULT NULL,
  `parametro_altoimagen` int(11) DEFAULT NULL,
  `parametro_formaimagen` varchar(20) DEFAULT NULL,
  `parametro_modulorestaurante` int(11) DEFAULT NULL,
  `parametro_permisocredito` int(11) DEFAULT NULL,
  `parametro_agruparitems` int(11) DEFAULT NULL,
  `parametro_diasvenc` int(11) DEFAULT 0,
  `parametro_anchofactura` float DEFAULT NULL,
  `parametro_altofactura` float(9,3) DEFAULT NULL,
  `parametro_margenfactura` float(9,3) DEFAULT NULL,
  `parametro_imagenreal` int(11) DEFAULT NULL,
  `parametro_diasentrega` int(11) DEFAULT NULL,
  `parametro_notaentrega` int(11) DEFAULT NULL,
  `parametro_segservicio` int(11) DEFAULT NULL,
  `parametro_apikey` varchar(250) DEFAULT NULL,
  `parametro_serviciofact` int(11) DEFAULT NULL,
  `parametro_sucursales` int(11) DEFAULT NULL,
  `parametro_logomonitor` varchar(150) DEFAULT NULL,
  `parametro_fondomonitor` varchar(150) DEFAULT NULL,
  `parametro_cantidadproductos` float DEFAULT NULL,
  `parametro_datosboton` int(11) DEFAULT NULL,
  `moneda_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`parametro_id`),
  UNIQUE KEY `parametro_id` (`parametro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `estado_id` int(11) DEFAULT NULL,
  `prueba_fecharegistro` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`prueba_id`),
  UNIQUE KEY `prueba_id` (`prueba_id`),
  KEY `fk_prueba_paciente` (`paciente_id`),
  KEY `fk_prueba_usuario` (`usuario_id`),
  KEY `fk_tipo_prueba` (`tipoprueba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

#
# Structure for the `rol_usuario` table : 
#

CREATE TABLE `rol_usuario` (
  `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `rolusuario_asignado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rol_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1345 DEFAULT CHARSET=latin1;

#
# Structure for the `tipo_prueba` table : 
#

CREATE TABLE `tipo_prueba` (
  `tipoprueba_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoprueba_descripcion` varchar(150) DEFAULT NULL,
  `tipoprueba_precio` float DEFAULT NULL,
  PRIMARY KEY (`tipoprueba_id`),
  UNIQUE KEY `tipoprueba_id` (`tipoprueba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Structure for the `tipo_usuario` table : 
#

CREATE TABLE `tipo_usuario` (
  `tipousuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario_descripcion` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`tipousuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `tipousuario_id` int(11) DEFAULT NULL,
  `usuario_nombre` varchar(150) DEFAULT NULL,
  `usuario_email` varchar(250) DEFAULT NULL,
  `usuario_login` varchar(50) DEFAULT NULL,
  `usuario_clave` varchar(50) DEFAULT NULL,
  `usuario_imagen` varchar(250) DEFAULT NULL,
  `parametro_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;