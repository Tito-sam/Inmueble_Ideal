-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2024 a las 22:20:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmueblecasa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `precio` bigint(20) NOT NULL,
  `tamaño` int(5) NOT NULL,
  `ciudad` varchar(40) NOT NULL,
  `barrio` varchar(40) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `tipo`, `categoria`, `precio`, `tamaño`, `ciudad`, `barrio`, `foto`) VALUES
(2, 'Apartamento', 'Venta', 100000000, 30, 'Bogota', 'Restrepo', 'Views/imgs/9e35ace0ab8b421096135a0ca3db0c33.png'),
(4, 'Aparta Estudio', 'Venta', 150000000, 35, 'Manizales', 'Enea', 'Views/imgs/b5722d88e36bdc0c88f04479ac237b84.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_sol` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_inm` int(11) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_sol`, `fecha`, `id_inm`, `id_user`) VALUES
(5, '2024-07-23', 4, 11111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(15) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `telefono`, `correo`, `clave`, `rol`) VALUES
(11111, 'Samuel', 'Mendez', 2, 'sam@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Usuario'),
(12345, 'Admin', 'Inmuebles', 0, 'admin@ejemplo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Inmobiliaria');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_sol`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_inm` (`id_inm`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_sol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_inm`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
