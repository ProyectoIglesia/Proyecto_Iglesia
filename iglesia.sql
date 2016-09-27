-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2016 a las 02:34:14
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
-- Estructura de tabla para la tabla `asignaciones_del_curso`
--

CREATE TABLE `asignaciones_del_curso` (
  `cod_asig` int(11) NOT NULL,
  `cod_cur` int(11) NOT NULL,
  `cod_hor` int(11) NOT NULL,
  `ci_lid` int(11) NOT NULL,
  `fec_ini_cur` date NOT NULL,
  `fec_fin_cur` date NOT NULL,
  `can_est` int(11) NOT NULL,
  `disponibilidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`cod_aud`, `fecha`, `hora`, `accion`, `datos`, `usuario`) VALUES
(0, '2016-07-08', '05:05:32', 'Eliminar', '23919228', ''),
(0, '2016-07-08', '05:05:39', 'Eliminar', '23919228', ''),
(0, '2016-07-08', '05:05:42', 'Eliminar', '23919228', ''),
(0, '2016-07-08', '05:06:01', 'Eliminar', '23919228', ''),
(0, '2016-07-08', '05:39:51', 'Inserta', '25314781, Maria Guadalupe, Escalante Barrios,\r\nola K ase, 04164444930', ''),
(0, '2016-07-08', '05:44:58', 'Inserta', '26425627, Vanessa Andreina, Velasquez Lopez,\r\ncania de azucar, 04124406648', ''),
(0, '2016-07-08', '05:59:51', 'Eliminar', '26425627', ''),
(0, '2016-07-08', '05:59:56', 'Eliminar', '25314781', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `cod_cur` int(11) NOT NULL,
  `nom_cur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `ci_est` int(11) NOT NULL,
  `nom_est` varchar(100) NOT NULL,
  `ape_est` varchar(100) NOT NULL,
  `niv_cap_dest` int(1) NOT NULL,
  `mod_cd_1` int(1) NOT NULL,
  `mod_cd_2` int(1) NOT NULL,
  `corr_est` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`ci_est`, `nom_est`, `ape_est`, `niv_cap_dest`, `mod_cd_1`, `mod_cd_2`, `corr_est`) VALUES
(213213, 'qwas', 'dasd', 3, 5, 6, 'wqeqwewq@qwr.com'),
(1234567, 'estudiante', 'uno', 2, 3, 4, 'estudianteuno@gmail.com'),
(123654987, 'Eduardo Jose', 'Camacho Hernandez', 1, 1, 2, 'solopacomercio@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `cod_hor` int(11) NOT NULL,
  `ci_tra` int(11) NOT NULL,
  `disponivilidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `ci_est` int(11) NOT NULL,
  `nom_est` text NOT NULL,
  `ape_est` text NOT NULL,
  `niv_cap_des` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `cod_not` int(11) NOT NULL,
  `cod_pla` int(11) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion`
--

CREATE TABLE `planificacion` (
  `cod_pla` int(11) NOT NULL,
  `cod_asig` int(11) NOT NULL,
  `nom_act_pla` text NOT NULL,
  `por_act_pla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `ci_pro` int(11) NOT NULL,
  `nom_pro` varchar(100) NOT NULL,
  `ape_pro` varchar(100) NOT NULL,
  `tel_pro` varchar(12) NOT NULL,
  `corr_pro` varchar(150) NOT NULL,
  `car_pro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`ci_pro`, `nom_pro`, `ape_pro`, `tel_pro`, `corr_pro`, `car_pro`) VALUES
(123456, 'Andrea', 'Camacho', '123456789', 'trabajador1@gmail.com', 'PCDN2M4'),
(123456789, 'Cesar', 'Galipoli', '0416123456', 'cesar@gmail.com', 'PCDN2M3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usu` int(10) NOT NULL,
  `nom_usu` varchar(50) NOT NULL,
  `cont_usu` varchar(50) NOT NULL,
  `niv_usu` int(11) NOT NULL,
  `ps_usu` varchar(100) NOT NULL,
  `rps_usu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usu`, `nom_usu`, `cont_usu`, `niv_usu`, `ps_usu`, `rps_usu`) VALUES
(1, 'admin', '23790951', 255, 'edad', '22'),
(39, 'Admin2', '23790951', 10, 'Profesor Favorito', '22'),
(40, 'estudiante1', '23790951', 1, 'Profesor Favorito', '22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_estudiantes`
--

CREATE TABLE `usuarios_estudiantes` (
  `nom_usu` varchar(50) NOT NULL,
  `ci_est` int(11) NOT NULL,
  `cont_usu` varchar(100) NOT NULL,
  `niv_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_trabajador`
--

CREATE TABLE `usuarios_trabajador` (
  `nom_usu` varchar(50) NOT NULL,
  `ci_tra` int(11) NOT NULL,
  `cont_usu` varchar(100) NOT NULL,
  `niv_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaciones_del_curso`
--
ALTER TABLE `asignaciones_del_curso`
  ADD PRIMARY KEY (`cod_asig`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_cur`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`ci_est`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cod_hor`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`ci_est`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`cod_not`);

--
-- Indices de la tabla `planificacion`
--
ALTER TABLE `planificacion`
  ADD PRIMARY KEY (`cod_pla`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`ci_pro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usu`),
  ADD UNIQUE KEY `nom_usu` (`nom_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
