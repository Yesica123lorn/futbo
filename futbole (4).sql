-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2023 a las 12:50:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbole`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `equipo` text NOT NULL,
  `posicion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `equipo`, `posicion`) VALUES
(3, 'manuel', 'bucaramanga', 'lateral'),
(4, 'alejandro', 'millonarios', 'volante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion`
--

CREATE TABLE `programacion` (
  `id` int(2) NOT NULL,
  `equipo` varchar(20) NOT NULL,
  `equipos` varchar(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`id`, `equipo`, `equipos`, `fecha`) VALUES
(3, 'millonarios', 'tolima', '0000-00-00'),
(4, 'quindio', 'millonarios', '0000-00-00'),
(6, 'bucaramanga', 'quindio', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_equipo`
--

CREATE TABLE `registro_equipo` (
  `id` int(19) NOT NULL,
  `nombre_equipo` varchar(20) NOT NULL,
  `departamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_equipo`
--

INSERT INTO `registro_equipo` (`id`, `nombre_equipo`, `departamento`) VALUES
(3, 'chico', 'chico'),
(5, 'tolima', 'tolima'),
(7, 'milllonarios', 'cundinamarca'),
(8, 'bucaramanga', 'bucaramanga'),
(9, 'quindio', 'quindio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_use`
--

CREATE TABLE `tipo_use` (
  `id_tipo_use` int(20) NOT NULL,
  `id_use` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_use`
--

INSERT INTO `tipo_use` (`id_tipo_use`, `id_use`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` int(10) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `usuario` varchar(39) NOT NULL,
  `contraseña` text NOT NULL,
  `id_tipo_use` int(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `nombre`, `usuario`, `contraseña`, `id_tipo_use`) VALUES
(133, 'mas', 'masm', '123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_equipo`
--
ALTER TABLE `registro_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_use`
--
ALTER TABLE `tipo_use`
  ADD PRIMARY KEY (`id_tipo_use`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `id_tipo_use` (`id_tipo_use`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `programacion`
--
ALTER TABLE `programacion`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registro_equipo`
--
ALTER TABLE `registro_equipo`
  MODIFY `id` int(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_use`
--
ALTER TABLE `tipo_use`
  MODIFY `id_tipo_use` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `documento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333777112;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_use`) REFERENCES `tipo_use` (`id_tipo_use`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
