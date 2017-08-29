-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2017 a las 12:14:03
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica_db`
--

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
('Administrador', '1', 1486655463),
('Administrador', '8', 1500552949),
('Medico', '7', 1499346303),
('Super Admin', '4', 1498660419);

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
('/admin/*', 2, NULL, NULL, NULL, 1486655248, 1486655248),
('/barrio/*', 2, NULL, NULL, NULL, 1488469096, 1488469096),
('/cobertura-social/*', 2, NULL, NULL, NULL, 1499341202, 1499341202),
('/condicion/*', 2, NULL, NULL, NULL, 1488804819, 1488804819),
('/contribuyente/*', 2, NULL, NULL, NULL, 1488809592, 1488809592),
('/estado/*', 2, NULL, NULL, NULL, 1499772160, 1499772160),
('/gii/*', 2, NULL, NULL, NULL, 1487773433, 1487773433),
('/historia-clinica/*', 2, NULL, NULL, NULL, 1499690317, 1499690317),
('/localidad/*', 2, NULL, NULL, NULL, 1499341194, 1499341194),
('/localidad/index', 2, NULL, NULL, NULL, 1499346250, 1499346250),
('/medico-derivador/*', 2, NULL, NULL, NULL, 1499772174, 1499772174),
('/paciente/*', 2, NULL, NULL, NULL, 1499341190, 1499341190),
('/perfil/*', 2, NULL, NULL, NULL, 1498828416, 1498828416),
('/site/*', 2, NULL, NULL, NULL, 1486655258, 1486655258),
('/tratamiento/*', 2, NULL, NULL, NULL, 1499091536, 1499091536),
('/turno/*', 2, NULL, NULL, NULL, 1499772167, 1499772167),
('/user/*', 2, NULL, NULL, NULL, 1498652747, 1498652747),
('Administrador', 1, 'Administrador del sistema con todos los permisos', NULL, NULL, 1486655302, 1486655302),
('Medico', 1, NULL, NULL, NULL, 1499346216, 1499346216),
('Super Admin', 1, 'Puede operar completamente el sistema', NULL, NULL, 1487333350, 1487333350);

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
('Administrador', '/admin/*'),
('Administrador', '/barrio/*'),
('Administrador', '/cobertura-social/*'),
('Administrador', '/condicion/*'),
('Administrador', '/contribuyente/*'),
('Administrador', '/estado/*'),
('Administrador', '/historia-clinica/*'),
('Administrador', '/localidad/*'),
('Administrador', '/localidad/index'),
('Medico', '/localidad/index'),
('Administrador', '/medico-derivador/*'),
('Administrador', '/paciente/*'),
('Administrador', '/perfil/*'),
('Administrador', '/site/*'),
('Administrador', '/tratamiento/*'),
('Administrador', '/turno/*'),
('Administrador', '/user/*'),
('Super Admin', 'Administrador');

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
-- Estructura de tabla para la tabla `cobertura_social`
--

CREATE TABLE `cobertura_social` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(350) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Se registraran los datos de las obras sociales, y la opcion sin cobertura para las atenciones particulares'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cobertura_social`
--

INSERT INTO `cobertura_social` (`id`, `descripcion`) VALUES
(1, 'INSTITUTO DE SEGURO DE JUJUY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id`, `descripcion`) VALUES
(1, 'Ginecología'),
(2, 'Cardiología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `descripcion`) VALUES
(1, 'Reservado'),
(2, 'Confirmado'),
(3, 'Finalizado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feriado`
--

CREATE TABLE `feriado` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(450) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `feriado`
--

INSERT INTO `feriado` (`id`, `fecha`, `descripcion`) VALUES
(1, '2016-10-07', 'Día de la Virgen'),
(2, '2016-10-10', 'Día de la diversidad'),
(3, '2016-11-18', 'Auton. Política de Jujuy'),
(4, '2016-11-28', 'Día de la Soberanía Nacional (20/11)'),
(5, '2016-12-08', 'Inmaculada Concepción'),
(6, '2016-12-09', 'Feriado puente turístico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `descripcion` mediumtext COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`id`, `fecha`, `paciente_id`, `perfil_id`, `descripcion`) VALUES
(1, '2017-07-10', 1, 5, 'Presion Alta'),
(2, '2017-07-10', 1, 10, 'Electro cardiograma'),
(3, '2017-07-10', 1, 6, 'Tension'),
(4, '2017-07-11', 3, 11, 'Mod con popup asdas'),
(5, '2017-07-01', 1, 12, 'Alta tension'),
(6, '2017-07-10', 3, 12, 'Modificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_atencion`
--

CREATE TABLE `horario_atencion` (
  `id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `tratamiento_id` int(11) NOT NULL,
  `dia` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `horario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario_atencion`
--

INSERT INTO `horario_atencion` (`id`, `perfil_id`, `tratamiento_id`, `dia`, `horario`, `estado`) VALUES
(1, 5, 1, 'mart.', '14:30', 1),
(3, 5, 1, 'mié.', '09:00', 1),
(4, 6, 2, 'lun.', '12:00', 1),
(5, 6, 1, 'lun.', '13:00', 1),
(6, 10, 1, 'jue.', '18:20', 1),
(7, 6, 1, 'vie.', '09:20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(350) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `descripcion`) VALUES
(1, 'Perico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_derivador`
--

CREATE TABLE `medico_derivador` (
  `id` int(11) NOT NULL,
  `apellido` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(450) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Se registran los datos del medico derivador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medico_derivador`
--

INSERT INTO `medico_derivador` (`id`, `apellido`, `nombre`) VALUES
(1, 'SUAREZ', 'JUAN M.'),
(2, 'CARRILLO', 'MARCOS'),
(3, 'LOPEZ', 'ARNALDO');

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
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `numero_doc` int(11) NOT NULL,
  `apellido` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `domicilio` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `piso` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dpto` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_fijo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(450) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cobertura_social_id` int(11) NOT NULL,
  `localidad_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `tipo_documento`, `numero_doc`, `apellido`, `nombre`, `sexo`, `fecha_nacimiento`, `domicilio`, `num`, `piso`, `dpto`, `telefono_fijo`, `celular`, `email`, `cobertura_social_id`, `localidad_id`, `estado`) VALUES
(1, 'dni', 32452851, 'Suruguay', 'Martin', '', NULL, 'Exodo', '988', '5', 'a', '', '', 'tinchohlj@gmail.com', 1, 1, 1),
(2, 'dni', 52136528, 'Cazon', 'Vilma', '', NULL, 'Las acacias', '52', '1', 'A', '', '', '', 1, 1, 0),
(3, 'dni', 32455281, 'Quiquinte', 'Jorge', '', '1985-11-14', '', '', '', '', '', '', '', 1, NULL, 1),
(4, 'FSDFSDFSD', 30197566, 'QUIQUINTE', 'JORGE RAUL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, NULL, 1),
(5, 'DNI', 30197567, 'QUIQUINTE', 'JORGE RAUL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, NULL, 0),
(6, 'dni', 32452855, 'Sanchez', 'Ana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, NULL, 1),
(7, 'dni', 32452859, 'Sanchez', 'Ana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, NULL, 1),
(8, 'dni', 32585897, 'Casalla', 'Antonio', NULL, NULL, NULL, NULL, NULL, NULL, '4916852', '', '', 1, NULL, 1);

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
  `tipo_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `numero_doc`, `nombre`, `apellido`, `user_id`, `domicilio`, `numero`, `piso`, `dpto`, `telefono`, `celular`, `tipo_usuario`, `especialidad_id`, `estado`) VALUES
(1, NULL, 'Martin Gerardo', 'Suruguay', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 0, 1),
(2, NULL, 'Alan', 'Llanos', 3, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 1),
(3, NULL, 'Jorge  Raul', 'Quiquinte', 4, 'Las acacias', '851', '', '', '4691284', '388512542', 'admin', NULL, 1),
(4, NULL, 'Carlos Enrique', 'Pintor', 5, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, 1),
(5, NULL, 'Manuel', 'Castro', 6, '', '', '', '', '', '', 'medico', NULL, 1),
(6, 55555, 'Hector', 'Cruz', NULL, '', '', '', '', '', '', 'medico', NULL, 1),
(7, 32452851, 'Nombre1 Prueba', 'Apellido2', NULL, 'Exodo', '988', '', '', '4917325', '3885107780', 'medico', NULL, 0),
(8, 32452, 'asdas', 'asdasda', NULL, '', '', '', '', '', '', 'medico', NULL, 1),
(9, 32452858, 'Carlitos', 'Suru', NULL, '', '', '', '', '', '', 'medico', NULL, 1),
(10, 5285123, 'Silvina', 'Saquilan', NULL, '', '', '', '', '', '', 'medico', NULL, 1),
(11, NULL, 'Prueba Nombre', 'Perez', 7, NULL, NULL, NULL, NULL, NULL, NULL, 'medico', NULL, 1),
(12, NULL, 'Orlando', 'Castro', NULL, '', '', '', '', '', '', 'medico', NULL, 1),
(13, NULL, 'Prueba', 'Noma', 8, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Se registra la especialidad o tratamiento medico que se realizan ',
  `modo_preparacion` longtext COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id`, `descripcion`, `modo_preparacion`) VALUES
(1, 'PARATIROIDES', '<ul><li>Preparación uno</li><li>Preparación <strong>dos</strong></li><li>Prueba <strong>tres</strong></li><li>No olvidar <em>traer ropa comoda</em></li></ul>'),
(2, 'ESTRES', '<ol><li>Traer zapatos</li><li>Consultar dudas</li></ol>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `tratamiento_id` int(11) NOT NULL,
  `cobertura_social_id` int(11) NOT NULL,
  `medico_derivador_id` int(11) DEFAULT NULL,
  `medico_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `fecha`, `horario`, `paciente_id`, `tratamiento_id`, `cobertura_social_id`, `medico_derivador_id`, `medico_id`, `estado_id`, `creacion`, `ultima_modificacion`) VALUES
(1, '2017-07-25', '14:30', 1, 1, 1, 1, 5, 2, '2017-07-24 16:10:33', '2017-07-25 11:55:27'),
(2, '2017-07-27', '18:20', 8, 1, 1, 1, 10, 2, '2017-07-26 14:50:52', '2017-07-26 14:51:41');

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
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'k5r0Z5vB1e_y5i5esAX8mLM2Uz6fS39x', '$2y$13$bnH7CyS2FEddHy1zickTXuJ2PBba9JbnJ9gfMCICwWh6BT8ESCyX.', NULL, 'tinchohlj@gmail.com', 10, 1486654905, 1488383191),
(2, 'msuru', 'KbEQzl95t3-R41SRcuqIyYB-sYil4jzt', '$2y$13$2FMOzp3miD5PbT64thIqbuqomX/.ASta5TYF4oSDnGHeEPWAc/zpe', 'pbXW4J2-kY2rzaLaimW-Jdv_ctdRr7HO_1488382074', 'gmsuruguay@gmail.com', 0, 1486989460, 1497883946),
(3, 'allanos', 'IbwuazRucP4WpxF5ptdXzgwwET-FYh_b', '$2y$13$p6kIdcz/m7lUf6OYtGoGwuziodJ9oD.Z3tKJPHBMma4G59NikYs96', NULL, 'alan@email.com', 10, 1487935965, 1487935965),
(4, 'avatar', 'jF0aSFgAzzTDDeESEgbsftVzLWb6A1__', '$2y$13$cr5u2jD.AvLBXcDo1E8/He.s4z33Z.c9mTDdZbrojPbHLl5uPv.hO', NULL, 'jorge@email.com', 10, 1498492172, 1500566538),
(5, 'carlos', 'iTNp7xjulghDy9USbY2kx0IrQPcwSvpG', '$2y$13$TsJ5w/nBZUNCp9mr2ormTuWJe/jy2g1sjwp4xkl4nHt5GM2LOFffS', NULL, 'carlospintor@gmail.com', 10, 1498660486, 1498660519),
(6, 'drcastro', 'A-zwm9AE_jhaDUZrJrqs4uhj6MHBlfmZ', '$2y$13$LM3TcFBGIDopmZVAYqZLYuATwBnN24GpCmSkl6z9RPCSoq5gzB2EO', NULL, 'email@email.com', 10, 1498666011, 1498666011),
(7, 'medico', 'U0ez8jDmbvHL7mYNsdFF3rJlSsLgChwc', '$2y$13$lDtMY1ZWVa3R19baYM/4o.NVbX5xxahikyQ2IaxOAxexQagL49zXq', NULL, 'medico@email.com', 10, 1499346185, 1499346185),
(8, 'prueba', 'zlwM7dHnjJTP98wcw-dMBWOY0mquGBaK', '$2y$13$vr4I0OhsvUbn1qnTWiiGo.LsmSVFAs.5k1q6gLEIaJir1i4lpY1vG', NULL, 'prueba@email.com', 10, 1500552928, 1500553008),
(9, 'operadorpc', 'nUYryBvzC6DfOzchJLu53iWn_8SsdOFt', '$2y$13$W4F9QNpCV0Qye2sdvwpabeR7RilQiru/jlVbNtGWKKbN.4M7aR6.u', NULL, 'op@email.com', 10, 1504019534, 1504019534);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `cobertura_social`
--
ALTER TABLE `cobertura_social`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `feriado`
--
ALTER TABLE `feriado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historia_clinica_perfil1_idx` (`perfil_id`),
  ADD KEY `fk_historia_clinica_paciente1_idx` (`paciente_id`);

--
-- Indices de la tabla `horario_atencion`
--
ALTER TABLE `horario_atencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horario_atencion_perfil1_idx` (`perfil_id`),
  ADD KEY `fk_horario_atencion_tratamiento1_idx` (`tratamiento_id`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medico_derivador`
--
ALTER TABLE `medico_derivador`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paciente_cobertura_social1_idx` (`cobertura_social_id`),
  ADD KEY `fk_paciente_localidad1_idx` (`localidad_id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_idx` (`user_id`),
  ADD KEY `fk_perfil_especialidad1_idx` (`especialidad_id`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_turno_paciente1_idx` (`paciente_id`),
  ADD KEY `fk_turno_cobertura_social1_idx` (`cobertura_social_id`),
  ADD KEY `fk_turno_tratamiento1_idx` (`tratamiento_id`),
  ADD KEY `fk_turno_medico_derivador1_idx` (`medico_derivador_id`),
  ADD KEY `fk_turno_medico1_idx` (`medico_id`),
  ADD KEY `fk_turno_estado1_idx` (`estado_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cobertura_social`
--
ALTER TABLE `cobertura_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `feriado`
--
ALTER TABLE `feriado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `horario_atencion`
--
ALTER TABLE `horario_atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `medico_derivador`
--
ALTER TABLE `medico_derivador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `fk_historia_clinica_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historia_clinica_perfil1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_atencion`
--
ALTER TABLE `horario_atencion`
  ADD CONSTRAINT `fk_horario_atencion_perfil1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_atencion_tratamiento1` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_paciente_cobertura_social1` FOREIGN KEY (`cobertura_social_id`) REFERENCES `cobertura_social` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_localidad1` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `fk_perfil_especialidad1` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `fk_turno_cobertura_social1` FOREIGN KEY (`cobertura_social_id`) REFERENCES `cobertura_social` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_medico1` FOREIGN KEY (`medico_id`) REFERENCES `perfil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_medico_derivador1` FOREIGN KEY (`medico_derivador_id`) REFERENCES `medico_derivador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turno_tratamiento1` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
