-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2017 a las 15:29:23
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ifd_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta`
--

CREATE TABLE `acta` (
  `id` int(11) NOT NULL,
  `nro_permiso` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro` int(11) DEFAULT NULL,
  `folio` int(11) DEFAULT NULL,
  `nota` decimal(6,2) DEFAULT NULL,
  `asistencia` bit(1) DEFAULT NULL,
  `condicion_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fecha_examen` date DEFAULT NULL,
  `resolucion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acta`
--

INSERT INTO `acta` (`id`, `nro_permiso`, `libro`, `folio`, `nota`, `asistencia`, `condicion_id`, `alumno_id`, `materia_id`, `fecha_examen`, `resolucion`) VALUES
(1, '5', 1, 5, '6.00', b'1', 1, 1, 1, '2015-11-14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `tipo_doc` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cuil` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_civil` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nacionalidad` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento_id` int(11) DEFAULT NULL,
  `domicilio` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nro` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `localidad_id` int(11) DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `titulo_secundario_id` int(11) NOT NULL,
  `colegio_secundario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `tipo_doc`, `numero`, `cuil`, `apellido`, `nombre`, `sexo`, `estado_civil`, `nacionalidad`, `fecha_nacimiento`, `lugar_nacimiento_id`, `domicilio`, `nro`, `localidad_id`, `telefono`, `celular`, `email`, `fecha_baja`, `user_id`, `titulo_secundario_id`, `colegio_secundario_id`) VALUES
(1, 'dni', '32452851', '20-3', 'SURUGUAY', 'MARTIN', '', '', 'ARGENTINA', '1985-11-14', NULL, 'CDAD EXODO', '988', 1, '4917325', '3885107780', 'tinchohlj@gmail.com', NULL, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('ADMINISTRADOR', '1', 1504054122),
('ALUMNO', '3', 1508535857),
('PRECEPTOR', '2', 1508365239);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/acta/*', 2, NULL, NULL, NULL, 1507163378, 1507163378),
('/admin/*', 2, NULL, NULL, NULL, 1504053920, 1504053920),
('/admin/user/restringir-acceso', 2, NULL, NULL, NULL, 1508856879, 1508856879),
('/alumno/*', 2, NULL, NULL, NULL, 1504553174, 1504553174),
('/alumno/actualizar', 2, NULL, NULL, NULL, 1509015636, 1509015636),
('/alumno/index', 2, NULL, NULL, NULL, 1508537858, 1508537858),
('/alumno/inscribir-materia', 2, NULL, NULL, NULL, 1508932043, 1508932043),
('/alumno/legajo', 2, NULL, NULL, NULL, 1508537799, 1508537799),
('/alumno/listar-materia', 2, NULL, NULL, NULL, 1504735722, 1504735722),
('/alumno/update', 2, NULL, NULL, NULL, 1509015001, 1509015001),
('/alumno/ver-inscripciones', 2, NULL, NULL, NULL, 1509026194, 1509026194),
('/autoridades/*', 2, NULL, NULL, NULL, 1506372081, 1506372081),
('/calendario-academico/*', 2, NULL, NULL, NULL, 1508449910, 1508449910),
('/carrera/*', 2, NULL, NULL, NULL, 1504655216, 1504655216),
('/colegio-secundario/*', 2, NULL, NULL, NULL, 1507838292, 1507838292),
('/condicion/*', 2, NULL, NULL, NULL, 1504738816, 1504738816),
('/correlatividad/*', 2, NULL, NULL, NULL, 1507076807, 1507076807),
('/correlatividad/add', 2, NULL, NULL, NULL, 1505262091, 1505262091),
('/correlatividad/create', 2, NULL, NULL, NULL, 1507163409, 1507163409),
('/correlatividad/delete', 2, NULL, NULL, NULL, 1507163409, 1507163409),
('/correlatividad/index', 2, NULL, NULL, NULL, 1507163409, 1507163409),
('/correlatividad/update', 2, NULL, NULL, NULL, 1507163409, 1507163409),
('/correlatividad/view', 2, NULL, NULL, NULL, 1507163409, 1507163409),
('/cursada/*', 2, NULL, NULL, NULL, 1507321584, 1507321584),
('/docente/*', 2, NULL, NULL, NULL, 1504213029, 1504213029),
('/historia-academica/*', 2, NULL, NULL, NULL, 1505265060, 1505265060),
('/inscripcion/*', 2, NULL, NULL, NULL, 1504564372, 1504564372),
('/localidad/*', 2, NULL, NULL, NULL, 1504724176, 1504724176),
('/materia/*', 2, NULL, NULL, NULL, 1504704371, 1504704371),
('/sede/*', 2, NULL, NULL, NULL, 1508356774, 1508356774),
('/site/*', 2, NULL, NULL, NULL, 1504053903, 1504053903),
('/site/index', 2, NULL, NULL, NULL, 1508931749, 1508931749),
('/site/restringir-acceso', 2, NULL, NULL, NULL, 1508856602, 1508856602),
('/titulo-docente/*', 2, NULL, NULL, NULL, 1504213044, 1504213044),
('/titulo-secundario/*', 2, NULL, NULL, NULL, 1507838286, 1507838286),
('/titulo/*', 2, NULL, NULL, NULL, 1504213034, 1504213034),
('/user/*', 2, NULL, NULL, NULL, 1504053887, 1504053887),
('ADMINISTRADOR', 1, NULL, NULL, NULL, 1504053832, 1504053832),
('ALUMNO', 1, NULL, NULL, NULL, 1508528050, 1508528050),
('PRECEPTOR', 1, NULL, NULL, NULL, 1508364227, 1508364227),
('Super Admin', 1, NULL, NULL, NULL, 1504053820, 1504053820);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('ADMINISTRADOR', '/acta/*'),
('ADMINISTRADOR', '/admin/*'),
('ADMINISTRADOR', '/admin/user/restringir-acceso'),
('ADMINISTRADOR', '/alumno/*'),
('PRECEPTOR', '/alumno/*'),
('ALUMNO', '/alumno/actualizar'),
('ALUMNO', '/alumno/index'),
('ALUMNO', '/alumno/inscribir-materia'),
('ALUMNO', '/alumno/legajo'),
('ADMINISTRADOR', '/alumno/listar-materia'),
('ALUMNO', '/alumno/listar-materia'),
('ALUMNO', '/alumno/ver-inscripciones'),
('ADMINISTRADOR', '/autoridades/*'),
('ADMINISTRADOR', '/calendario-academico/*'),
('ADMINISTRADOR', '/carrera/*'),
('ADMINISTRADOR', '/colegio-secundario/*'),
('ADMINISTRADOR', '/condicion/*'),
('ADMINISTRADOR', '/correlatividad/*'),
('ADMINISTRADOR', '/correlatividad/add'),
('ADMINISTRADOR', '/correlatividad/create'),
('ADMINISTRADOR', '/correlatividad/delete'),
('ADMINISTRADOR', '/correlatividad/index'),
('ADMINISTRADOR', '/correlatividad/update'),
('ADMINISTRADOR', '/correlatividad/view'),
('ADMINISTRADOR', '/cursada/*'),
('ADMINISTRADOR', '/docente/*'),
('ADMINISTRADOR', '/historia-academica/*'),
('ADMINISTRADOR', '/inscripcion/*'),
('ADMINISTRADOR', '/localidad/*'),
('ADMINISTRADOR', '/materia/*'),
('ADMINISTRADOR', '/sede/*'),
('ADMINISTRADOR', '/site/*'),
('ALUMNO', '/site/index'),
('ADMINISTRADOR', '/site/restringir-acceso'),
('ADMINISTRADOR', '/titulo-docente/*'),
('ADMINISTRADOR', '/titulo-secundario/*'),
('ADMINISTRADOR', '/titulo/*'),
('ADMINISTRADOR', '/user/*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoridades`
--

CREATE TABLE `autoridades` (
  `id` int(11) NOT NULL,
  `rector` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `secretario_academico` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vice_rector` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autoridades`
--

INSERT INTO `autoridades` (`id`, `rector`, `secretario_academico`, `vice_rector`) VALUES
(1, 'Profesor Perez Arnaldo', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario_academico`
--

CREATE TABLE `calendario_academico` (
  `id` int(11) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `tipo_inscripcion` set('EXAMEN','CURSADA','PREINSCRIPCION') COLLATE utf8_spanish_ci NOT NULL,
  `actividad` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calendario_academico`
--

INSERT INTO `calendario_academico` (`id`, `fecha_desde`, `fecha_hasta`, `tipo_inscripcion`, `actividad`) VALUES
(1, '2017-02-01', '2017-03-01', 'PREINSCRIPCION', 'PRESCRIPCIÓN A CARRERAS'),
(2, '2017-07-10', '2017-07-14', 'EXAMEN', 'TURNO DE EXAMENES\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` tinyint(1) NOT NULL,
  `cohorte` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `validez_nacional` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad_materias` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad_horas` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nro_resolucion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sede_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `descripcion`, `duracion`, `cohorte`, `validez_nacional`, `cantidad_materias`, `cantidad_horas`, `nro_resolucion`, `sede_id`) VALUES
(1, 'PROFESORADO DE INGLES', 5, '', '', '', '', '', 1),
(2, 'INFORMATICA', 3, '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_secundario`
--

CREATE TABLE `colegio_secundario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `colegio_secundario`
--

INSERT INTO `colegio_secundario` (`id`, `descripcion`) VALUES
(1, 'ESC. DE EDUCACION TECNICA ING. LUIS MICHAUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE `condicion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `condicion`
--

INSERT INTO `condicion` (`id`, `descripcion`) VALUES
(1, 'LIBRE'),
(2, 'PROMOCION'),
(3, 'REGULAR'),
(4, 'EQUIVALENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlatividad`
--

CREATE TABLE `correlatividad` (
  `id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `materia_id_correlativa` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `correlatividad`
--

INSERT INTO `correlatividad` (`id`, `materia_id`, `materia_id_correlativa`, `tipo`) VALUES
(1, 2, 1, 'r'),
(2, 2, 5, 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursada`
--

CREATE TABLE `cursada` (
  `id` int(11) NOT NULL,
  `fecha_inscripcion` date DEFAULT NULL,
  `condicion_id` int(11) DEFAULT NULL,
  `alumno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `nota` decimal(6,2) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursada`
--

INSERT INTO `cursada` (`id`, `fecha_inscripcion`, `condicion_id`, `alumno_id`, `materia_id`, `fecha_cierre`, `nota`, `fecha_vencimiento`) VALUES
(1, '2017-03-01', NULL, 1, 1, NULL, NULL, NULL),
(2, '2017-02-01', NULL, 1, 4, NULL, NULL, NULL),
(25, '2017-10-30', NULL, 1, 5, NULL, NULL, NULL),
(26, '2017-10-30', NULL, 1, 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `nro_legajo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_doc` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cuil` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_civil` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nacionalidad` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento_id` int(11) DEFAULT NULL,
  `domicilio` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nro` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `localidad_id` int(11) DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ubicacion_legajo` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sede_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `nro_legajo`, `tipo_doc`, `numero`, `cuil`, `apellido`, `nombre`, `sexo`, `estado_civil`, `nacionalidad`, `fecha_nacimiento`, `lugar_nacimiento_id`, `domicilio`, `nro`, `localidad_id`, `telefono`, `celular`, `email`, `fecha_baja`, `user_id`, `ubicacion_legajo`, `sede_id`) VALUES
(1, '', 'dni', '32452851', '', 'suru', 'asdas', '', '', 'ARGENTINA', '1985-11-14', NULL, '', '', NULL, '', '', '', NULL, NULL, 'EL CARMEN', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `nro_legajo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alumno_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `nro_libreta` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `observacion` longtext COLLATE utf8_spanish_ci,
  `fotocopia_dni` bit(1) DEFAULT NULL,
  `certificado_nacimiento` bit(1) DEFAULT NULL,
  `titulo_secundario` bit(1) DEFAULT NULL,
  `certificado_visual` bit(1) DEFAULT NULL,
  `certificado_auditivo` bit(1) DEFAULT NULL,
  `certificado_foniatrico` bit(1) DEFAULT NULL,
  `foto` bit(1) DEFAULT NULL,
  `constancia_cuil` bit(1) DEFAULT NULL,
  `planilla_prontuarial` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `nro_legajo`, `alumno_id`, `carrera_id`, `nro_libreta`, `fecha`, `observacion`, `fotocopia_dni`, `certificado_nacimiento`, `titulo_secundario`, `certificado_visual`, `certificado_auditivo`, `certificado_foniatrico`, `foto`, `constancia_cuil`, `planilla_prontuarial`) VALUES
(1, 'LS1234', 1, 2, 1234, '2017-10-12', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(2, '8521', 1, 1, 852, '2017-03-03', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_examen`
--

CREATE TABLE `inscripcion_examen` (
  `id` int(11) NOT NULL,
  `fecha_inscripcion` date DEFAULT NULL,
  `fecha_examen` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `condicion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `descripcion`) VALUES
(1, 'PERICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `anio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) DEFAULT NULL COMMENT 'Cuando el valor es 1 esta ocupado',
  `condicion_id` int(11) NOT NULL,
  `condicion_examen_libre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `descripcion`, `carrera_id`, `anio`, `periodo`, `estado`, `condicion_id`, `condicion_examen_libre`) VALUES
(1, 'FONETICA', 1, '1', '1° C', b'0', 2, '1'),
(2, 'LINGUISTICA', 1, '2', '2° C', b'0', 2, '1'),
(3, 'TECNICAS DIGITALES', 2, '1', 'ANUAL', b'0', 2, '2'),
(4, 'PROGRAMACION', 2, '2', '2° C', b'0', 3, '2'),
(5, 'HISTORIA INGLESA', 1, '1', '1° C', b'0', 2, '2'),
(6, 'SONIDO INGLES', 1, '1', '1° C', b'0', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_asignada`
--

CREATE TABLE `materia_asignada` (
  `id` int(11) NOT NULL,
  `fecha_alta` date NOT NULL,
  `docente_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fecha_baja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1486648886),
('m140602_111327_create_menu_table', 1486648913),
('m160312_050000_create_user', 1486648914),
('m140506_102106_rbac_init', 1486649227);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `numero_doc` int(11) DEFAULT NULL,
  `nombre` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `domicilio` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `piso` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dpto` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `especialidad_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `numero_doc`, `nombre`, `apellido`, `user_id`, `domicilio`, `numero`, `piso`, `dpto`, `telefono`, `celular`, `especialidad_id`, `estado`) VALUES
(1, NULL, 'Admin', 'Sistema', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 'MAURICIO', 'CASAS', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, NULL, 'MARTIN', 'SURUGUAY', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reinscripcion`
--

CREATE TABLE `reinscripcion` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `cue` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `secretario_academico` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rector` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vice_rector` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `cue`, `descripcion`, `secretario_academico`, `rector`, `vice_rector`, `direccion`, `localidad`, `logo`) VALUES
(1, '', 'INSTITUTO SUPERIOR', NULL, NULL, NULL, '', 'PERICO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(345) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `descripcion`) VALUES
(1, 'Alumno'),
(2, 'Docente\r\n'),
(3, 'Preceptor'),
(4, 'Secretario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE `titulo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `titulo`
--

INSERT INTO `titulo` (`id`, `descripcion`) VALUES
(1, 'TECNICO MECANICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_docente`
--

CREATE TABLE `titulo_docente` (
  `id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `titulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_secundario`
--

CREATE TABLE `titulo_secundario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `titulo_secundario`
--

INSERT INTO `titulo_secundario` (`id`, `descripcion`) VALUES
(1, 'TECNICO MECANICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `tipo_usuario_id`, `role`) VALUES
(1, 'useradmin', 'VCGuLzttqkOAmyUS5W-ABa15JukLPW5i', '$2y$13$STLbND1geUxRNdXZB1oCx.oKqpC4kpnkqZRwbH0BPuYyN2XN5TGZm', NULL, 'tinchohlj@gmail.com', 10, 1504053628, 1504053628, 0, 'ADMINISTRADOR'),
(2, 'preceptor', 'XsJjchI16BorfxLs43UBaGJruoQzBqxe', '$2y$13$CTQOhl6K73YErpyd12LMpO2thY33YcSo7giPUopRBhEbhJwuTBqp2', NULL, 'prece@email.com', 10, 1508365239, 1508367229, 0, 'PRECEPTOR'),
(3, 'alumno', 'ap_7NeCFDHkPjjwE6-xrFyYq8xeAvbWK', '$2y$13$XF4nPn.tAE8kEJfGPZt/gedFvcFin6wo/L3lhtZQ8u5lOx7pQ7hnu', NULL, 'alumno@gmail.com', 10, 1508535857, 1508535857, 0, 'ALUMNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sede`
--

CREATE TABLE `usuario_sede` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta`
--
ALTER TABLE `acta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_acta_condicion1_idx` (`condicion_id`),
  ADD KEY `fk_acta_alumno1_idx` (`alumno_id`),
  ADD KEY `fk_acta_materia1_idx` (`materia_id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_localidad_id` (`localidad_id`),
  ADD KEY `fk_lugar_nacimiento_id` (`lugar_nacimiento_id`),
  ADD KEY `fk_alumno_titulo_secundario1_idx` (`titulo_secundario_id`),
  ADD KEY `fk_alumno_colegio_secundario1_idx` (`colegio_secundario_id`);

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `autoridades`
--
ALTER TABLE `autoridades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendario_academico`
--
ALTER TABLE `calendario_academico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carrera_sede1_idx` (`sede_id`);

--
-- Indices de la tabla `colegio_secundario`
--
ALTER TABLE `colegio_secundario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `condicion`
--
ALTER TABLE `condicion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correlatividad`
--
ALTER TABLE `correlatividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_correlatividad_materia1_idx` (`materia_id`),
  ADD KEY `fk_correlatividad_materia2_idx` (`materia_id_correlativa`);

--
-- Indices de la tabla `cursada`
--
ALTER TABLE `cursada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cursada_condicion1_idx` (`condicion_id`),
  ADD KEY `fk_cursada_alumno1_idx` (`alumno_id`),
  ADD KEY `fk_cursada_materia1_idx` (`materia_id`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docente_localidad_id` (`localidad_id`),
  ADD KEY `fk_docente_lugar_nacimiento_id` (`lugar_nacimiento_id`),
  ADD KEY `fk_docente_sede1_idx` (`sede_id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscripcion_alumno1_idx` (`alumno_id`),
  ADD KEY `fk_inscripcion_carrera1_idx` (`carrera_id`);

--
-- Indices de la tabla `inscripcion_examen`
--
ALTER TABLE `inscripcion_examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscripcion_examen_materia1_idx` (`materia_id`),
  ADD KEY `fk_inscripcion_examen_alumno1_idx` (`alumno_id`),
  ADD KEY `fk_inscripcion_examen_condicion1_idx` (`condicion_id`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materia_carrera1_idx` (`carrera_id`),
  ADD KEY `fk_materia_condicion1_idx` (`condicion_id`);

--
-- Indices de la tabla `materia_asignada`
--
ALTER TABLE `materia_asignada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materia_asignada_docente1_idx` (`docente_id`),
  ADD KEY `fk_materia_asignada_materia1_idx` (`materia_id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_idx` (`user_id`),
  ADD KEY `fk_perfil_especialidad1_idx` (`especialidad_id`);

--
-- Indices de la tabla `reinscripcion`
--
ALTER TABLE `reinscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reinscripcion_carrera1_idx` (`carrera_id`),
  ADD KEY `fk_reinscripcion_alumno1_idx` (`alumno_id`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `titulo_docente`
--
ALTER TABLE `titulo_docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_titulo_docente_docente1_idx` (`docente_id`),
  ADD KEY `fk_titulo_docente_titulo1_idx` (`titulo_id`);

--
-- Indices de la tabla `titulo_secundario`
--
ALTER TABLE `titulo_secundario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_tipo_usuario1_idx` (`tipo_usuario_id`);

--
-- Indices de la tabla `usuario_sede`
--
ALTER TABLE `usuario_sede`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_sede_user1_idx` (`user_id`),
  ADD KEY `fk_usuario_sede_sede1_idx` (`sede_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta`
--
ALTER TABLE `acta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `autoridades`
--
ALTER TABLE `autoridades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `calendario_academico`
--
ALTER TABLE `calendario_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `colegio_secundario`
--
ALTER TABLE `colegio_secundario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `condicion`
--
ALTER TABLE `condicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `correlatividad`
--
ALTER TABLE `correlatividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cursada`
--
ALTER TABLE `cursada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `inscripcion_examen`
--
ALTER TABLE `inscripcion_examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `materia_asignada`
--
ALTER TABLE `materia_asignada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `reinscripcion`
--
ALTER TABLE `reinscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `titulo_docente`
--
ALTER TABLE `titulo_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `titulo_secundario`
--
ALTER TABLE `titulo_secundario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario_sede`
--
ALTER TABLE `usuario_sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acta`
--
ALTER TABLE `acta`
  ADD CONSTRAINT `fk_acta_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acta_condicion1` FOREIGN KEY (`condicion_id`) REFERENCES `condicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_acta_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_colegio_secundario1` FOREIGN KEY (`colegio_secundario_id`) REFERENCES `colegio_secundario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_localidad1` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_localidad2` FOREIGN KEY (`lugar_nacimiento_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_titulo_secundario1` FOREIGN KEY (`titulo_secundario_id`) REFERENCES `titulo_secundario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `fk_carrera_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `correlatividad`
--
ALTER TABLE `correlatividad`
  ADD CONSTRAINT `fk_correlatividad_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_correlatividad_materia2` FOREIGN KEY (`materia_id_correlativa`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursada`
--
ALTER TABLE `cursada`
  ADD CONSTRAINT `fk_cursada_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cursada_condicion1` FOREIGN KEY (`condicion_id`) REFERENCES `condicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cursada_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_localidad1` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docente_localidad2` FOREIGN KEY (`lugar_nacimiento_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docente_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscripcion_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion_examen`
--
ALTER TABLE `inscripcion_examen`
  ADD CONSTRAINT `fk_inscripcion_examen_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_examen_condicion1` FOREIGN KEY (`condicion_id`) REFERENCES `condicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_examen_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_materia_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materia_condicion1` FOREIGN KEY (`condicion_id`) REFERENCES `condicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia_asignada`
--
ALTER TABLE `materia_asignada`
  ADD CONSTRAINT `fk_materia_asignada_docente1` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_materia_asignada_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `reinscripcion`
--
ALTER TABLE `reinscripcion`
  ADD CONSTRAINT `fk_reinscripcion_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reinscripcion_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `titulo_docente`
--
ALTER TABLE `titulo_docente`
  ADD CONSTRAINT `fk_titulo_docente_docente1` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_titulo_docente_titulo1` FOREIGN KEY (`titulo_id`) REFERENCES `titulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_sede`
--
ALTER TABLE `usuario_sede`
  ADD CONSTRAINT `fk_usuario_sede_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_sede_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
