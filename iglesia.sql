-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2016 a las 17:56:33
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iglesia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `cod_aud` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `accion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `datos` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `ci_est` int(11) NOT NULL,
  `nom_est` varchar(100) NOT NULL,
  `ape_est` varchar(100) NOT NULL,
  `dir_est` text NOT NULL,
  `tel_est` varchar(12) NOT NULL,
  `fec_nac_est` date NOT NULL,
  `corr_est` varchar(100) NOT NULL,
  `ultimo_nivel_aprobado` enum('0','1','2','3') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`ci_est`, `nom_est`, `ape_est`, `dir_est`, `tel_est`, `fec_nac_est`, `corr_est`, `ultimo_nivel_aprobado`) VALUES
(23790951, 'Eduardo', 'Camacho', 'Av. Aragua', '04120426295', '1994-07-29', 'solopacomercio@gmail.com', '0'),
(23790952, 'Eduardos', 'Camachos', 'Av. Aragua2', '04120426296', '1986-12-31', 'solopacomercio2@gmail.com', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `cod_inscripcion` int(11) NOT NULL,
  `ci_est` int(11) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  `trimestre` enum('trimestre_1','trimestre_2','trimestre_3') COLLATE utf8_unicode_ci NOT NULL,
  `ci_lider` int(11) NOT NULL,
  `fech_inicio` date NOT NULL,
  `fech_final` date NOT NULL,
  `estatus_nivel` enum('En_curso','Abierto','Cerrado') COLLATE utf8_unicode_ci NOT NULL,
  `horario` enum('horario 1','horario 2') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lideres`
--

CREATE TABLE `lideres` (
  `ci_lider` int(11) NOT NULL,
  `nom_lider` varchar(100) NOT NULL,
  `ape_lider` varchar(100) NOT NULL,
  `fec_nac_lider` date NOT NULL,
  `dir_lider` text NOT NULL,
  `tel_lider` varchar(12) NOT NULL,
  `corr_lider` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lideres`
--

INSERT INTO `lideres` (`ci_lider`, `nom_lider`, `ape_lider`, `fec_nac_lider`, `dir_lider`, `tel_lider`, `corr_lider`) VALUES
(237909265, 'Lider', 'Uno', '2016-10-20', 'Av. Aragua', '04120426296', 'solopacomercio@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `cod_nivel` int(11) NOT NULL,
  `trimestre` enum('Nivel_1','Nivel_2','Nivel_3') NOT NULL,
  `ci_lider` int(11) NOT NULL,
  `cantidad_estudiantes` int(11) NOT NULL,
  `fech_inicio` date NOT NULL,
  `fech_final` date NOT NULL,
  `estatus_nivel` enum('En_curso','Abierto','Cerrado') NOT NULL,
  `horario` enum('Horario 1','Horario 2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`cod_nivel`, `trimestre`, `ci_lider`, `cantidad_estudiantes`, `fech_inicio`, `fech_final`, `estatus_nivel`, `horario`) VALUES
(9, 'Nivel_1', 23790953, 0, '2016-10-05', '2016-10-27', 'Abierto', 'Horario 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_evaluaciones`
--

CREATE TABLE `notas_evaluaciones` (
  `cod_nota` int(11) NOT NULL,
  `asignatura` enum('modulo_1','modulo_2','modulo_3','modulo_4','modulo_5','modulo_6') NOT NULL,
  `ci_est` int(11) NOT NULL,
  `ci_lider` int(11) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  `evaluacion` enum('evaluacion_1','evaluacion_2','evaluacion_3','evaluacion_4','evaluacion_5','evaluacion_6','evaluacion_7','evaluacion_8','evaluacion_9','evaluacion_10') NOT NULL,
  `nota` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas_evaluaciones`
--

INSERT INTO `notas_evaluaciones` (`cod_nota`, `asignatura`, `ci_est`, `ci_lider`, `cod_nivel`, `evaluacion`, `nota`, `fecha`) VALUES
(1, 'modulo_1', 23790951, 23790953, 1, 'evaluacion_1', 89, '2016-10-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_totales`
--

CREATE TABLE `notas_totales` (
  `cod_nota` int(11) NOT NULL,
  `total_materia1` int(11) NOT NULL,
  `total_materia2` int(11) NOT NULL,
  `total_materias` int(11) NOT NULL,
  `tareas_entregadas` int(11) NOT NULL,
  `ci_est` int(11) NOT NULL,
  `ci_lid` int(11) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  `estatus` enum('Aprobado','Reprobado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `cod_tarea` int(11) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  `ci_est` int(11) NOT NULL,
  `ci_lider` int(11) NOT NULL,
  `semana` varchar(20) NOT NULL,
  `tareas_entregadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usu` int(10) NOT NULL,
  `nom_usu` varchar(50) NOT NULL,
  `cont_usu` varchar(50) NOT NULL,
  `niv_usu` enum('administrador','estudiante','lider') NOT NULL DEFAULT 'estudiante',
  `ps_usu` varchar(100) NOT NULL,
  `rps_usu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usu`, `nom_usu`, `cont_usu`, `niv_usu`, `ps_usu`, `rps_usu`) VALUES
(1, 'Eduardo', '23790951', 'administrador', 'Nombre de tu Mascota', 'linda'),
(2, 'Eduardos', '23790951', 'estudiante', '', ''),
(3, 'Eduardoss', '23790951', 'lider', '', ''),
(4, 'lideruno', '23790951', 'lider', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_estudiantes`
--

CREATE TABLE `usuarios_estudiantes` (
  `nom_usu` varchar(50) NOT NULL,
  `ci_est` int(11) NOT NULL,
  `cont_usu` varchar(100) NOT NULL,
  `niv_usu` enum('administrador','estudiante','profesor') NOT NULL DEFAULT 'estudiante'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_estudiantes`
--

INSERT INTO `usuarios_estudiantes` (`nom_usu`, `ci_est`, `cont_usu`, `niv_usu`) VALUES
('Eduardo', 23790951, '23790951', 'estudiante'),
('Eduardos', 23790952, '23790951', 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_lideres`
--

CREATE TABLE `usuarios_lideres` (
  `nom_usu` varchar(50) NOT NULL,
  `ci_lider` int(11) NOT NULL,
  `cont_usu` varchar(100) NOT NULL,
  `niv_usu` enum('administrador','estudiante','lider') NOT NULL DEFAULT 'lider'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_lideres`
--

INSERT INTO `usuarios_lideres` (`nom_usu`, `ci_lider`, `cont_usu`, `niv_usu`) VALUES
('Eduardoss', 23790953, '23790951', 'lider'),
('lideruno', 237909265, '23790951', 'lider');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD UNIQUE KEY `cod_aud` (`cod_aud`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`ci_est`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`cod_inscripcion`);

--
-- Indices de la tabla `lideres`
--
ALTER TABLE `lideres`
  ADD PRIMARY KEY (`ci_lider`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`cod_nivel`);

--
-- Indices de la tabla `notas_evaluaciones`
--
ALTER TABLE `notas_evaluaciones`
  ADD PRIMARY KEY (`cod_nota`);

--
-- Indices de la tabla `notas_totales`
--
ALTER TABLE `notas_totales`
  ADD PRIMARY KEY (`cod_nota`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`cod_tarea`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usu`),
  ADD UNIQUE KEY `nom_usu` (`nom_usu`),
  ADD KEY `niv_usu` (`niv_usu`);

--
-- Indices de la tabla `usuarios_estudiantes`
--
ALTER TABLE `usuarios_estudiantes`
  ADD PRIMARY KEY (`ci_est`),
  ADD KEY `nom_usu` (`nom_usu`),
  ADD KEY `niv_usu` (`niv_usu`);

--
-- Indices de la tabla `usuarios_lideres`
--
ALTER TABLE `usuarios_lideres`
  ADD PRIMARY KEY (`ci_lider`),
  ADD KEY `nom_usu` (`nom_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `cod_aud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `cod_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `cod_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `notas_evaluaciones`
--
ALTER TABLE `notas_evaluaciones`
  MODIFY `cod_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `notas_totales`
--
ALTER TABLE `notas_totales`
  MODIFY `cod_nota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `cod_tarea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
