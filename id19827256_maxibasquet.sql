-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-12-2022 a las 00:15:40
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19827256_maxibasquet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cualquiera`
--

CREATE TABLE `cualquiera` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `edad` int(10) NOT NULL,
  `edad2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cualquiera`
--

INSERT INTO `cualquiera` (`id`, `name`, `edad`, `edad2`) VALUES
(1, 'Kori', 12, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dat_admin`
--

CREATE TABLE `dat_admin` (
  `id` int(11) NOT NULL,
  `id_registros` int(5) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `am` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pago` int(3) NOT NULL,
  `habilitado` int(1) NOT NULL,
  `cargo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dat_admin`
--

INSERT INTO `dat_admin` (`id`, `id_registros`, `usuario`, `contrasenia`, `ap`, `am`, `nom`, `correo`, `pago`, `habilitado`, `cargo`) VALUES
(1, 0, 'Gordon', '9cf659d7557a42228ec57db166b371c4', 'ORELLANA', 'MEJIA', 'DARWIN JHOEL', 'mankitoporsiempre@gmail.com', 0, 0, 3),
(62, 1, 'samuel', '25d55ad283aa400af464c76d713c07ad', 'condori', 'huanca', 'samuel', 'jesu99332@gmail.com', 350, 1, 1),
(63, 1, 'andrez', '25d55ad283aa400af464c76d713c07ad', 'lopez', 'quispe', 'andrez', 'darwynxd123@gmail.com', 0, 1, 2),
(64, 2, 'juan', '1bbd886460827015e5d605ed44252251', 'reyes', 'condori', 'juan', 'jesu99332@gmail.com', 350, 1, 1),
(65, 3, 'andrez', 'bae5e3208a3c700e3db642b6631e95b9', 'conde', 'lopez', 'andrez', 'darwynxd123@gmail.com', 350, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombreE` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_registros` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombreE`, `categoria`, `logo`, `id_registros`) VALUES
(1, 'Barcelona', '30', 'nBCm7fOgQs_logo.png', 1),
(2, 'Juventus', '30', 'eFqlGBPbI1_logo.png', 2),
(3, 'Boca', '30', 'c2orn6Bt0b_logo.png', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fixture`
--

CREATE TABLE `fixture` (
  `id_partido` int(10) NOT NULL,
  `id_equipo` int(10) NOT NULL,
  `id_mesa` int(10) NOT NULL,
  `round` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fixture`
--

INSERT INTO `fixture` (`id_partido`, `id_equipo`, `id_mesa`, `round`) VALUES
(7, 8, 10, 20),
(42, 22, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id` int(10) NOT NULL,
  `id_partido` int(10) NOT NULL,
  `id_equipo` int(50) NOT NULL,
  `id_jugador` int(10) NOT NULL,
  `nombJ` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `robos` int(20) NOT NULL,
  `asistencia` int(20) NOT NULL,
  `faltasJugador` int(5) NOT NULL,
  `puntuacionTiro` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `id_partido`, `id_equipo`, `id_jugador`, `nombJ`, `robos`, `asistencia`, `faltasJugador`, `puntuacionTiro`) VALUES
(1, 1, 1, 1, 'Andrez', 1, 2, 1, 5),
(2, 1, 2, 3, 'JugadorJ', 1, 1, 3, 4),
(3, 1, 1, 2, 'jugadorB', 2, 2, 1, 4),
(4, 1, 1, 1, 'Andrez', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(11) NOT NULL,
  `nombJ` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apJ` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `amJ` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `paisJ` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `edadJ` int(3) NOT NULL,
  `id_equipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `numJ` int(3) NOT NULL,
  `ci` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `nombJ`, `apJ`, `amJ`, `paisJ`, `fechaNacimiento`, `edadJ`, `id_equipo`, `numJ`, `ci`) VALUES
(1, 'Andrez', 'peres', 'lopez', 'bolivia', '1991-12-10', 31, '1', 2, 12345678),
(2, 'jugadorB', 'apellidoB', 'apellidoB', 'Bolivia', '1988-11-10', 34, '1', 5, 12345678),
(3, 'JugadorJ', 'apellidoPaterno', 'apellidoMaterno', 'bolivia', '1991-11-10', 31, '2', 7, 12345678),
(4, 'jugador', 'apellidouno', 'apellidomat', 'bolivia', '1990-11-10', 32, '2', 3, 12345678),
(5, 'JugadorBoca', 'apellidouno', 'apellodos', 'bolivia', '1990-12-11', 32, '3', 2, 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_registros` int(5) NOT NULL,
  `nombreM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `amM` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ciM` int(10) NOT NULL,
  `celM` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_registros`, `nombreM`, `apM`, `amM`, `ciM`, `celM`) VALUES
(1, 'andrez', 'lopez', 'quispe', 12345678, 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id_partidos` int(11) NOT NULL,
  `id_equipoA` int(10) NOT NULL,
  `id_equipoB` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id_partidos`, `id_equipoA`, `id_equipoB`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_registros` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ci` int(15) NOT NULL,
  `nom` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ap` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `am` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cel` int(20) NOT NULL,
  `cargo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id_registros`, `email`, `ci`, `nom`, `ap`, `am`, `pais`, `ciudad`, `provincia`, `cel`, `cargo`) VALUES
(1, 'jesu99332@gmail.com', 12345678, 'samuel', 'condori', 'huanca', 'AR', 'cochabamba', 'cercado', 78521463, 1),
(2, 'jesu99332@gmail.com', 11111111, 'juan', 'reyes', 'condori', 'AR', 'cochabamba', 'cercado', 78521463, 1),
(3, 'darwynxd123@gmail.com', 22222222, 'andrez', 'conde', 'lopez', 'AR', 'cochabamba', 'cercado', 78521463, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultadofinal`
--

CREATE TABLE `resultadofinal` (
  `id_final` int(100) NOT NULL,
  `id_partidos` int(10) NOT NULL,
  `id_equipo` int(50) NOT NULL,
  `nombreE` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoRobos` int(100) NOT NULL,
  `faltasJugador` int(100) NOT NULL,
  `asistenciaJugador` int(100) NOT NULL,
  `puntoFinal` int(100) NOT NULL,
  `partidoJ` int(10) NOT NULL,
  `partidoP` int(11) NOT NULL,
  `partidoE` int(11) NOT NULL,
  `partidoG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `resultadofinal`
--

INSERT INTO `resultadofinal` (`id_final`, `id_partidos`, `id_equipo`, `nombreE`, `resultadoRobos`, `faltasJugador`, `asistenciaJugador`, `puntoFinal`, `partidoJ`, `partidoP`, `partidoE`, `partidoG`) VALUES
(1, 1, 2, 'Juventus', 0, 0, 0, 0, 1, -3, 0, 0),
(2, 1, 1, 'Barcelona', 1, 1, 2, 5, 1, 0, 0, 3),
(3, 1, 1, 'Barcelona', 3, 2, 4, 9, 1, 0, 0, 3),
(4, 1, 2, 'Juventus', 1, 3, 1, 4, 1, -3, 0, 0),
(5, 1, 1, 'Barcelona', 4, 3, 5, 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `id_torneo` int(11) NOT NULL,
  `nombreC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `f_inscrip` date NOT NULL,
  `f_fin` date NOT NULL,
  `f_preinsc` date NOT NULL,
  `f_prefin` date NOT NULL,
  `descripT` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`id_torneo`, `nombreC`, `categoria`, `fecha_ini`, `fecha_fin`, `f_inscrip`, `f_fin`, `f_preinsc`, `f_prefin`, `descripT`) VALUES
(1, 'Torneo5', '30', '2022-12-18', '2022-12-26', '2022-12-22', '2022-12-22', '2022-12-19', '2022-12-21', 'nuevo torneo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneofinalizado`
--

CREATE TABLE `torneofinalizado` (
  `id` int(11) NOT NULL,
  `id_torneo` int(50) NOT NULL,
  `nombreTorneo` varchar(50) NOT NULL,
  `nombreE` varchar(20) NOT NULL,
  `resultadoRobos` int(10) NOT NULL,
  `faltasJugador` int(10) NOT NULL,
  `asistenciaJugador` int(10) NOT NULL,
  `puntoFinal` int(10) NOT NULL,
  `categoria` varchar(10) NOT NULL,
  `nombreDelegado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneofinalizado`
--

INSERT INTO `torneofinalizado` (`id`, `id_torneo`, `nombreTorneo`, `nombreE`, `resultadoRobos`, `faltasJugador`, `asistenciaJugador`, `puntoFinal`, `categoria`, `nombreDelegado`) VALUES
(1, 14, 'Galacticos', 'Burbuja', 130, 48, 231, 346, '', 'Perito'),
(4, 2, 'San Simon', 'Dinamita', 3, 2, 1, 5, '30', 'Darwyn'),
(5, 1, 'Torneo1', 'RAYITOS', 56, 66, 235, 148, '30', 'Darwyn'),
(12, 1, 'Maxibasquet', 'Futboleros', 7, 2, 12, 741, '30', 'Eddy'),
(13, 1, 'Maxibasquet', 'Futboleros', 7, 2, 12, 741, '30', 'Eddy'),
(14, 1, 'torneo1', 'DeathNote', 18, 81, 31, 30, '30', 'Deyson'),
(15, 1, 'Maxibasquet', 'DEATH', 70, 8, 121, 199, '30', 'Sergio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cualquiera`
--
ALTER TABLE `cualquiera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dat_admin`
--
ALTER TABLE `dat_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `fixture`
--
ALTER TABLE `fixture`
  ADD PRIMARY KEY (`id_partido`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_registros`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id_partidos`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registros`);

--
-- Indices de la tabla `resultadofinal`
--
ALTER TABLE `resultadofinal`
  ADD PRIMARY KEY (`id_final`);

--
-- Indices de la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`id_torneo`);

--
-- Indices de la tabla `torneofinalizado`
--
ALTER TABLE `torneofinalizado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cualquiera`
--
ALTER TABLE `cualquiera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dat_admin`
--
ALTER TABLE `dat_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fixture`
--
ALTER TABLE `fixture`
  MODIFY `id_partido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_registros` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id_partidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `resultadofinal`
--
ALTER TABLE `resultadofinal`
  MODIFY `id_final` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `id_torneo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `torneofinalizado`
--
ALTER TABLE `torneofinalizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
