-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-11-2024 a las 17:01:46
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

create database if not exists `PI1trim`  DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use `PI1trim`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `PI1trim`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `idProducto` int(6) NOT NULL,
  `unidades` int(5) NOT NULL,
  `precio` int(4) NOT NULL,
  `dniCliente` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `idProducto`, `unidades`, `precio`, `dniCliente`) VALUES
('6739fcb4d767f', 12, 1, 25, ''),
('673a265ceb1ad', 10, 2, 305, ''),
('673a265ceb1ad', 11, 1, 300, ''),
('673b5354a8952', 11, 1, 300, '23919104R');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dniCliente` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dniCliente`, `nombre`, `direccion`, `email`, `pwd`) VALUES
('23919104R', 'Alejandro', 'mi casa', 'alejandrolorenzotoledo@gmail.com', '$2y$10$Di4XTUZxvX/2E/aWs4wjceWBQf9R2/R7kvzGc.pBsV90j0DHzKS3a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedidos`
--

CREATE TABLE `lineaspedidos` (
  `idPedido` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `nlinea` int(2) NOT NULL,
  `idProducto` int(6) DEFAULT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `dirEntrega` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nTarjeta` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dniCliente` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(6) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marca` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidades` int(5) NOT NULL,
  `precio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `foto`, `marca`, `categoria`, `unidades`, `precio`) VALUES
(10, 'Figura Anby Demara 1/7', 'zenless-zone-zero-anby-demara-1-7-figure-5 1.png', 'Zenless Zone Zero', 'Videojuegos', 10, 305),
(11, 'Figura Nicole Demara 1/7', 'zenless-zone-zero-nicole-demara-1-7-figure-5 1.png', 'Zenless Zone Zero', 'Videojuegos', 10, 300),
(12, 'Funko Pop! Fortnite: Bombardera Brillante', 'funko bombardera brillante.png', 'Fortnite', 'Videojuegos', 10, 25),
(13, 'Funko Pop! Fortnite: Líder del equipo P.A.N.D.A', 'funko panda.png', 'Fortnite', 'Videojuegos', 10, 25),
(14, 'Funko Pop! Deadpool', 'deadpool.png', 'Marvel', 'Cine', 10, 12),
(15, 'Figura Billy Kid 1/7', 'billykid.png', 'Zenless Zone Zero', 'Videojuegos', 10, 295),
(16, 'Funko Pop! Armin Arlert', 'arminarlert.png', 'Ataque a los Titanes', 'Anime y manga', 10, 22),
(17, 'Funko Pop! Levi', 'levi.png', 'Ataque a los Titanes', 'Anime y manga', 10, 23),
(18, 'Funko Pop! Goku Super Saiyan', 'gokusupersaiyan.png', 'Dragon Ball', 'Anime y manga', 10, 25),
(19, 'Funko Pop! Peter Parker Anti Venom', 'peterparkerantivenom.png', 'Marvel', 'Cine', 10, 23),
(20, 'Funko Pop! Spiderman', 'spiderman.png', 'Marvel', 'Cine', 10, 23);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `idCarrito` (`idCarrito`) USING BTREE;

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dniCliente`);

--
-- Indices de la tabla `lineaspedidos`
--
ALTER TABLE `lineaspedidos`
  ADD PRIMARY KEY (`idPedido`,`nlinea`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
