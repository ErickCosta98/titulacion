-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.18-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para titulacion
CREATE DATABASE IF NOT EXISTS `titulacion` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `titulacion`;

-- Volcando estructura para tabla titulacion.antecedente
CREATE TABLE IF NOT EXISTS `antecedente` (
  `id_antecedente` int(11) NOT NULL AUTO_INCREMENT,
  `institucion_procedencia` int(11) DEFAULT NULL,
  `id_tipoAntecedente` int(11) DEFAULT NULL,
  `id_entidad_federativa` int(11) DEFAULT NULL,
  `fecha_inicio` varchar(50) DEFAULT NULL,
  `fecha_termino` varchar(50) DEFAULT NULL,
  `no_cedula` varchar(50) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_antecedente`),
  KEY `FK_antecedente_antecedente` (`id_tipoAntecedente`),
  KEY `FK_antecedente_entidad_federativa` (`id_entidad_federativa`),
  KEY `FK_antecedente_persona` (`id_persona`),
  CONSTRAINT `FK_antecedente_antecedente` FOREIGN KEY (`id_tipoAntecedente`) REFERENCES `antecedente` (`id_antecedente`),
  CONSTRAINT `FK_antecedente_entidad_federativa` FOREIGN KEY (`id_entidad_federativa`) REFERENCES `entidad_federativa` (`id_entidad`),
  CONSTRAINT `FK_antecedente_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.antecedente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `antecedente` DISABLE KEYS */;
INSERT INTO `antecedente` (`id_antecedente`, `institucion_procedencia`, `id_tipoAntecedente`, `id_entidad_federativa`, `fecha_inicio`, `fecha_termino`, `no_cedula`, `id_persona`) VALUES
	(1, 0, 1, 1, '2021-08-06', '2021-08-13', 'a', 1),
	(2, 0, 2, 2, '2010-02-01', '2021-08-05', '', 4);
/*!40000 ALTER TABLE `antecedente` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.autorizacion
CREATE TABLE IF NOT EXISTS `autorizacion` (
  `id_autorizacion` int(11) NOT NULL AUTO_INCREMENT,
  `autorizacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_autorizacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.autorizacion: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `autorizacion` DISABLE KEYS */;
INSERT INTO `autorizacion` (`id_autorizacion`, `autorizacion`) VALUES
	(1, 'RVOE FEDERAL'),
	(2, 'RVOE ESTATAL'),
	(3, 'AUTORIZACIÓN FEDERAL'),
	(4, 'AUTORIZACIÓN ESTATAL');
/*!40000 ALTER TABLE `autorizacion` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.cargo_firmantes
CREATE TABLE IF NOT EXISTS `cargo_firmantes` (
  `id_cargo` int(11) NOT NULL,
  `cargo_firmante` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.cargo_firmantes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cargo_firmantes` DISABLE KEYS */;
INSERT INTO `cargo_firmantes` (`id_cargo`, `cargo_firmante`) VALUES
	(1, 'SECRETARIO DE EDUCACIÓN PÚBLICA'),
	(2, 'DIRECTOR'),
	(3, 'SUBDIRECTOR');
/*!40000 ALTER TABLE `cargo_firmantes` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.carrera
CREATE TABLE IF NOT EXISTS `carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `Cve_carrera` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_terminacion` date DEFAULT NULL,
  `id_autorizacion_reconocimiento` int(11) DEFAULT NULL,
  `autorizacion_reconocimiento` varchar(50) DEFAULT NULL,
  `numero_rvoe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.carrera: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.entidad_federativa
CREATE TABLE IF NOT EXISTS `entidad_federativa` (
  `id_entidad` int(11) NOT NULL AUTO_INCREMENT,
  `entidad_federativa` varchar(50) DEFAULT NULL,
  `c_entidad_abr` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_entidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.entidad_federativa: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `entidad_federativa` DISABLE KEYS */;
INSERT INTO `entidad_federativa` (`id_entidad`, `entidad_federativa`, `c_entidad_abr`) VALUES
	(1, 'AGUASCALIENTES', 'AGS'),
	(2, 'BAJA CALIFORNIA', 'BC   '),
	(3, 'BAJA CALIFORNIA SUR', 'BCS  '),
	(4, 'CAMPECHE', 'CAMP ');
/*!40000 ALTER TABLE `entidad_federativa` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.estandar
CREATE TABLE IF NOT EXISTS `estandar` (
  `id_estandar` int(11) NOT NULL AUTO_INCREMENT,
  `folio_control` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_estandar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.estandar: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estandar` DISABLE KEYS */;
/*!40000 ALTER TABLE `estandar` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.estudio_antecedente
CREATE TABLE IF NOT EXISTS `estudio_antecedente` (
  `id_tipo_estudio_antecedente` int(11) NOT NULL,
  `tipo_estudio_antecedente` varchar(50) DEFAULT NULL,
  `tipo_educativo_antecedente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_estudio_antecedente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.estudio_antecedente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `estudio_antecedente` DISABLE KEYS */;
INSERT INTO `estudio_antecedente` (`id_tipo_estudio_antecedente`, `tipo_estudio_antecedente`, `tipo_educativo_antecedente`) VALUES
	(1, 'Maestría', 'EDUCACIÓN SUPERIOR'),
	(2, 'LICENCIATURA', 'EDUCACIÓN SUPERIOR');
/*!40000 ALTER TABLE `estudio_antecedente` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.expedicion
CREATE TABLE IF NOT EXISTS `expedicion` (
  `id_expedicion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_expedicion` date DEFAULT NULL,
  `id_modalidad_titulacion` int(11) DEFAULT NULL,
  `modalidad` varchar(50) DEFAULT NULL,
  `fecha_examen_profesional` date DEFAULT NULL,
  `fecha_execion_examen_profesional` date DEFAULT NULL,
  `cumplio_servicio_social` int(11) DEFAULT NULL,
  `id_fundamento_legal_servicio_social` int(11) DEFAULT NULL,
  `fundamento_legal_servicio_social` varchar(50) DEFAULT NULL,
  `id_entidad_federativa` int(11) DEFAULT NULL,
  `id_estandar` int(11) DEFAULT NULL,
  `id_profesionista` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_expedicion`),
  KEY `FK_expedicion_entidad_federativa` (`id_entidad_federativa`),
  KEY `FK_expedicion_estandar` (`id_estandar`),
  KEY `FK_expedicion_profesionista` (`id_profesionista`),
  CONSTRAINT `FK_expedicion_entidad_federativa` FOREIGN KEY (`id_entidad_federativa`) REFERENCES `entidad_federativa` (`id_entidad`),
  CONSTRAINT `FK_expedicion_estandar` FOREIGN KEY (`id_estandar`) REFERENCES `estandar` (`id_estandar`),
  CONSTRAINT `FK_expedicion_profesionista` FOREIGN KEY (`id_profesionista`) REFERENCES `profesionista` (`id_profesionista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.expedicion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `expedicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `expedicion` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.fundamento_legal_servicio_social
CREATE TABLE IF NOT EXISTS `fundamento_legal_servicio_social` (
  `id_fundamento_legal` int(11) NOT NULL AUTO_INCREMENT,
  `fundamento_legal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_fundamento_legal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.fundamento_legal_servicio_social: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `fundamento_legal_servicio_social` DISABLE KEYS */;
INSERT INTO `fundamento_legal_servicio_social` (`id_fundamento_legal`, `fundamento_legal`) VALUES
	(1, 'ART. 52 LRART. 5 CONST'),
	(2, 'ART. 55 LRART. 5 CONST'),
	(3, 'ART. 91 RLRART. 5 CONST');
/*!40000 ALTER TABLE `fundamento_legal_servicio_social` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.institucion
CREATE TABLE IF NOT EXISTS `institucion` (
  `id_institución` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_institución`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.institucion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `institucion` DISABLE KEYS */;
/*!40000 ALTER TABLE `institucion` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.modalidad_titulacion
CREATE TABLE IF NOT EXISTS `modalidad_titulacion` (
  `id_modalidad` int(11) NOT NULL,
  `modalidad` varchar(50) DEFAULT NULL,
  `tipo_modalidad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_modalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.modalidad_titulacion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `modalidad_titulacion` DISABLE KEYS */;
INSERT INTO `modalidad_titulacion` (`id_modalidad`, `modalidad`, `tipo_modalidad`) VALUES
	(1, 'POR TESIS', 'ACTA DE EXAMEN'),
	(2, 'POR PROMEDIO', 'CONSTANCIA DE EXENCIÓN');
/*!40000 ALTER TABLE `modalidad_titulacion` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.motivos_cancelacion
CREATE TABLE IF NOT EXISTS `motivos_cancelacion` (
  `id_motivo` int(11) NOT NULL,
  `descripcion_cancelacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_motivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.motivos_cancelacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `motivos_cancelacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `motivos_cancelacion` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `curp` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `correo_electronico` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.persona: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id_persona`, `curp`, `nombre`, `primer_apellido`, `segundo_apellido`, `correo_electronico`, `estado`) VALUES
	(1, 'lolhcs970710', 'hector', 'lopez', 'lopez', 'hector_1@gmail.com', 'Activo'),
	(2, 'a', 'a', 'a', 'a', 'a', 'Activo'),
	(3, 'IIGA931214HCSNRN09', 'VALENTIN', 'ENTZIN', 'GIRON', 'VALIENTE23@GAMIL.COM', 'Activo'),
	(4, 'OTMA201220', 'TOMAS', 'GOMEZ', 'LOPEZ', 'MAY200@GMAIL.COM', 'Activo');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla titulacion.responsable
CREATE TABLE IF NOT EXISTS `responsable` (
  `id_responsable` int(11) NOT NULL AUTO_INCREMENT,
  `abr_titulo` varchar(250) DEFAULT NULL,
  `sello` longtext DEFAULT NULL,
  `certificado_responsable` varchar(250) DEFAULT NULL,
  `no_certificado` varchar(250) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `id_cargo`  int(11) DEFAULT NULL,
  PRIMARY KEY (`id_responsable`),
  KEY `FK_responsable_persona` (`id_persona`),
  CONSTRAINT `FK_responsable_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla titulacion.responsable: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `responsable` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
