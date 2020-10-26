-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2020 a las 16:15:53
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test-autofact`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `id_formulario` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `p1` text NOT NULL,
  `p2` varchar(50) NOT NULL,
  `p3` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`id_formulario`, `correo`, `p1`, `p2`, `p3`, `fecha`) VALUES
(1, 'sebastian.andres.aracena@gmail.com', 'bal bala', 'bien', '5', '2020-10-26 00:00:42'),
(7, 'sebastian.andres.aracena@gmail.com', 'aadasd asdasdsasdasda ', 'SI', '4', '2020-10-26 00:56:47'),
(8, 'sebastian.andres.aracena@gmail.com', 'aadasd asdasdsasdasda ', 'SI', '4', '2020-10-26 00:56:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `password`, `tipo`, `fecha`) VALUES
('admin@autofact.cl', '4441e5d70b3657900fa57e66db407e0b', 'admin', '2020-10-25 00:00:00'),
('sebastian.andres.aracena@gmail.com', '1906c2268667fd33471e4b589e64cbbf', 'usuario', '2020-10-25 00:00:00'),
('supersbx00@gmail.com', '98b01be2d96e5eafef66db258107caf4', 'usuario', '2020-10-25 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_formulario`),
  ADD KEY `correo_usuario` (`correo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `test`
--
ALTER TABLE `test`
  MODIFY `id_formulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `correo_usuario` FOREIGN KEY (`correo`) REFERENCES `usuario` (`correo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
