-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2023 a las 03:06:14
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdesteticagalindo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomusuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `nombre`, `email`, `nomusuario`, `contrasena`) VALUES
(1, 'Jaqueline Galindo Huitron', 'jaqueline@gmail.com', 'jaqgh', '25d55ad283aa400af464c76d713c07ad'),
(2, 'sofia Herrera Gomez', 'sofia@gmail.com', 'soft99', '25d55ad283aa400af464c76d713c07ad'),
(3, 'Angela Carmona Lara', 'agelacl@gmail.com', 'angela30', 'ad1523c157cc0002f2068d3e50ee7120');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `tel` int(10) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomnegocio` varchar(100) NOT NULL,
  `tproducto` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `apellidos`, `tel`, `direccion`, `email`, `nomnegocio`, `tproducto`, `login_id`) VALUES
(1, 'Maria', 'Guerrero Luna', 2147483647, 'Francisco 2301', 'mariagl@gmail.com', 'Star Blue', 'Extensiones', 1),
(2, 'Laura', 'Herrera Estrada', 2147483647, 'Revolucion 5894', 'laurahe@gmail.com', 'Loreal', 'shampoo', 1),
(3, 'Joel', 'Campos Rivera', 2147483647, 'Ponciano 2147', 'joelcampr@gmail.com', 'Fructis', 'Acoondicionador', 1),
(4, 'Julia', 'Flores Allende', 2147483647, 'Pavorreal 3258', 'juliaflor@gmail.com', 'El Vive', 'Mascarilla Capilar', 2),
(5, 'Martha', 'Galvan Aguilar', 2147483647, 'Aztecas 8541', 'marthaga@gmail.com', 'Olaplex', 'Uñas Postizas', 2),
(6, 'Raul', 'Martinez Diaz', 2147483647, 'Colima 8521', 'raulmd@gmail.com', 'Revita', 'Gelish', 2),
(7, 'Samuel', 'Villa Rivera', 2147483647, 'Pablo Lopez 2028', 'samuelvr@gmail.com', 'Pantene', 'Shampoo', 3),
(8, 'Sofia', 'Herrera Olivas', 2147483647, 'Minatitlan 3584', 'sofiaho@gmail.com', 'Fructis', 'Tratamiento Capilar', 3),
(9, 'Ana', 'Romero Avila', 2147483647, 'Granjero 5214', 'anara@gmail.com', 'Glitter', 'Extensiones', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_proveedor_1` (`login_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `FK_proveedor_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
