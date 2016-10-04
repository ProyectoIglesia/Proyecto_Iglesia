-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2016 a las 01:30:38
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `cod_nivel` int(11) NOT NULL,
  `trimestre` enum('trimestre_1','trimestre_2','trimestre_3') NOT NULL,
  `ci_lider` int(11) NOT NULL,
  `cantidad_estudiantes` int(11) NOT NULL,
  `fech_inicio` date NOT NULL,
  `fech_final` date NOT NULL,
  `estatus_nivel` enum('En_curso','Abierto','Cerrado') NOT NULL,
  `horario` enum('horario 1','horario 2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_totales`
--

CREATE TABLE `notas_totales` (
  `cod_nota` int(11) NOT NULL,
  `total_materia1` float NOT NULL,
  `total_materia2` float NOT NULL,
  `total_materias` float NOT NULL,
  `tareas_entregadas_total` int(11) NOT NULL,
  `ci_est` int(11) NOT NULL,
  `ci_lider` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_estudiantes`
--

CREATE TABLE `usuarios_estudiantes` (
  `nom_usu` varchar(50) NOT NULL,
  `ci_est` int(11) NOT NULL,
  `cont_usu` varchar(100) NOT NULL,
  `niv_usu` enum('administrador','estudiante','lider') NOT NULL DEFAULT 'estudiante'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `cod_inscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `cod_nivel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notas_evaluaciones`
--
ALTER TABLE `notas_evaluaciones`
  MODIFY `cod_nota` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `cod_usu` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
