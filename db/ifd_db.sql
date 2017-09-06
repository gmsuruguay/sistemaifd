-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2017 a las 00:39:37
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
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
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
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nro_legajo`, `tipo_doc`, `numero`, `cuil`, `apellido`, `nombre`, `sexo`, `estado_civil`, `nacionalidad`, `fecha_nacimiento`, `lugar_nacimiento_id`, `domicilio`, `nro`, `localidad_id`, `telefono`, `celular`, `email`, `fecha_baja`, `user_id`) VALUES
(1, '', 'dni', '52452863', '20-4', 'RODRIGUEZ', 'CONI', '', '', 'ARGENTINA', '1985-11-14', 2, '', '', 1, '', '', '', NULL, NULL),
(2, '', 'dni', '32452851', '20-3', 'SURUGUAY', 'LEILA', '', '', 'ARGENTINA', '2017-08-03', 1, '', '', NULL, '', '', '', NULL, NULL);

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
('Administrador', '1', 1504054122);

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
('/admin/*', 2, NULL, NULL, NULL, 1504053920, 1504053920),
('/alumno/*', 2, NULL, NULL, NULL, 1504553174, 1504553174),
('/carrera/*', 2, NULL, NULL, NULL, 1504655216, 1504655216),
('/docente/*', 2, NULL, NULL, NULL, 1504213029, 1504213029),
('/inscripcion/*', 2, NULL, NULL, NULL, 1504564372, 1504564372),
('/site/*', 2, NULL, NULL, NULL, 1504053903, 1504053903),
('/titulo-docente/*', 2, NULL, NULL, NULL, 1504213044, 1504213044),
('/titulo/*', 2, NULL, NULL, NULL, 1504213034, 1504213034),
('/user/*', 2, NULL, NULL, NULL, 1504053887, 1504053887),
('Administrador', 1, NULL, NULL, NULL, 1504053832, 1504053832),
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
('Administrador', '/admin/*'),
('Administrador', '/alumno/*'),
('Administrador', '/docente/*'),
('Administrador', '/inscripcion/*'),
('Administrador', '/site/*'),
('Administrador', '/titulo-docente/*'),
('Administrador', '/titulo/*'),
('Administrador', '/user/*');

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
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` tinyint(1) NOT NULL,
  `anio_inicio` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `descripcion`, `duracion`, `anio_inicio`) VALUES
(1, 'Profesorado de Ingles', 5, '2010'),
(2, 'Tecnico en Comercio', 3, '2009');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

CREATE TABLE `condicion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlatividad`
--

CREATE TABLE `correlatividad` (
  `materia_id` int(11) NOT NULL,
  `materia_id_correlativa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `nro_legajo`, `tipo_doc`, `numero`, `cuil`, `apellido`, `nombre`, `sexo`, `estado_civil`, `nacionalidad`, `fecha_nacimiento`, `lugar_nacimiento_id`, `domicilio`, `nro`, `localidad_id`, `telefono`, `celular`, `email`, `fecha_baja`, `user_id`) VALUES
(1, '', 'dni', '32452851', '', 'Suruguay', 'Martin', '', '', 'ARGENTINA', '1985-11-14', NULL, '', '', NULL, '', '', 'tinchohlj@gmail.com', NULL, NULL),
(2, '', 'dni', '32452820', '20-3', 'Castillo', 'Azucena', 'F', 'DIVORCIADO', 'ARGENTINA', '1961-12-21', 1, '23 de Agosto', '527', 1, '', '155136584', 'azuhlj@gmail.com', NULL, NULL),
(3, '', 'dni', '3245285', '', 'Castillo', 'Marcelo', '', '', 'ARGENTINA', '1985-11-14', NULL, '', '', NULL, '', '', '', NULL, NULL),
(4, '', 'dni', '45826258', '20-4', 'Sosa', 'David Angie', '', '', 'ARGENTINA', '1985-12-14', NULL, '', '', NULL, '', '', '', NULL, NULL),
(5, '', 'dni', '32108792', '27-8', 'Cruz', 'Natalia L', '', '', 'ARGENTINA', '1986-09-04', NULL, '', '', NULL, '', '', '', NULL, NULL),
(6, '', 'dni', '32452858', '', 'Castillo', 'Luis', '', '', 'ARGENTINA', '1952-08-23', NULL, '', '', NULL, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `nro_libreta` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `observacion` longtext COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `alumno_id`, `carrera_id`, `nro_libreta`, `fecha`, `observacion`) VALUES
(1, 2, 1, 1234, '2017-09-05', ''),
(2, 2, 2, 4567, '2017-09-05', ''),
(3, 1, 1, 5289, '2017-09-05', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_materia`
--

CREATE TABLE `inscripcion_materia` (
  `id` int(11) NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `nota` decimal(6,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nro_acta` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
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
(1, 'PERICO'),
(2, 'EL CARMEN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `anio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) DEFAULT NULL COMMENT 'Cuando el valor es 1 esta ocupado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, NULL, 'Martin Gerardo', 'Suruguay', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

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
(1, 'Profesor de Matematicas'),
(2, 'Tecnico en Informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_docente`
--

CREATE TABLE `titulo_docente` (
  `id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `titulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `titulo_docente`
--

INSERT INTO `titulo_docente` (`id`, `docente_id`, `titulo_id`) VALUES
(3, 5, 2),
(4, 6, 1),
(5, 6, 2),
(6, 5, 2),
(7, 5, 2),
(9, 4, 1),
(10, 1, 1);

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
  `tipo_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `tipo_usuario_id`) VALUES
(1, 'useradmin', 'VCGuLzttqkOAmyUS5W-ABa15JukLPW5i', '$2y$13$STLbND1geUxRNdXZB1oCx.oKqpC4kpnkqZRwbH0BPuYyN2XN5TGZm', NULL, 'tinchohlj@gmail.com', 10, 1504053628, 1504053628, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_localidad_id` (`localidad_id`),
  ADD KEY `fk_lugar_nacimiento_id` (`lugar_nacimiento_id`);

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
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
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
  ADD KEY `fk_correlatividad_materia1_idx` (`materia_id`),
  ADD KEY `fk_correlatividad_materia2_idx` (`materia_id_correlativa`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docente_localidad_id` (`localidad_id`),
  ADD KEY `fk_docente_lugar_nacimiento_id` (`lugar_nacimiento_id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscripcion_alumno1_idx` (`alumno_id`),
  ADD KEY `fk_inscripcion_carrera1_idx` (`carrera_id`);

--
-- Indices de la tabla `inscripcion_materia`
--
ALTER TABLE `inscripcion_materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscripcion_materia_alumno1_idx` (`alumno_id`),
  ADD KEY `fk_inscripcion_materia_condicion1_idx` (`condicion_id`),
  ADD KEY `fk_inscripcion_materia_materia1_idx` (`materia_id`);

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
  ADD KEY `fk_materia_carrera1_idx` (`carrera_id`);

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
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_tipo_usuario1_idx` (`tipo_usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `condicion`
--
ALTER TABLE `condicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `inscripcion_materia`
--
ALTER TABLE `inscripcion_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reinscripcion`
--
ALTER TABLE `reinscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `titulo_docente`
--
ALTER TABLE `titulo_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_localidad1` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_localidad2` FOREIGN KEY (`lugar_nacimiento_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `correlatividad`
--
ALTER TABLE `correlatividad`
  ADD CONSTRAINT `fk_correlatividad_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_correlatividad_materia2` FOREIGN KEY (`materia_id_correlativa`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_localidad1` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docente_localidad2` FOREIGN KEY (`lugar_nacimiento_id`) REFERENCES `localidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscripcion_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion_materia`
--
ALTER TABLE `inscripcion_materia`
  ADD CONSTRAINT `fk_inscripcion_materia_alumno1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_materia_condicion1` FOREIGN KEY (`condicion_id`) REFERENCES `condicion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_materia_materia1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_materia_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
