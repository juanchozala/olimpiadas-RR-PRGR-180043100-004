-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2024 a las 15:34:10
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
-- Base de datos: `deportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `nombre`, `descripcion`) VALUES
(1, 'futbol', ''),
(2, 'rugby\r\n', ''),
(3, 'volley', ''),
(4, 'natacion', ''),
(5, 'ciclismo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `id_categorias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `imagen`, `id_categorias`) VALUES
(19, 'BOLSA DE HERRAMIENTAS', 0.00, NULL, '1723822929_BOLSA DE HERRAMIENTAS.jpg', 5),
(20, 'MASCARILLA PARA HACER DEPORTE ', 0.00, NULL, '1723823007_MASCARILLA PARA HACER DEPORTE.jpg', 5),
(21, 'MAILLOT Y COULOTTE', 0.00, NULL, '1723823055_MAILLOT Y COULOTTE X-TIGER.jpg', 5),
(22, 'CUBEIRTA DE SILLIN CON GEL', 0.00, NULL, '1723823096_CUBIERTA DE SILLÍN CON GEL.jpg', 5),
(23, 'Espinilleras Predator 20 League', 0.00, NULL, '1723823560_Espinilleras Predator 20 League.jpeg', 1),
(25, 'BOTINES ADIDAS ', 0.00, NULL, '1724034968_botines.webp', 1),
(26, 'Medias de Futbol Floyd GO ', 0.00, NULL, '1724035700_media.webp', 1),
(27, 'Guante Arquero Attrakt ', 0.00, NULL, '1724035812_guantes.webp', 1),
(28, 'pelota de volley', 0.00, NULL, '1724036120_volley.avif', 3),
(29, 'rodillera', 0.00, NULL, '1724036181_rodilllera.jpeg', 3),
(30, 'manga', 0.00, NULL, '1724036228_mangas.jpg', 3),
(31, 'zapatillas volley', 0.00, NULL, '1724036303_zapatilas.jpeg', 3),
(32, 'casco', 0.00, NULL, '1724036390_casco.jpg', 2),
(33, 'botines', 0.00, NULL, '1724036836_botines.webp', 2),
(34, 'casco rug', 0.00, NULL, '1724036959_casco.jpeg', 2),
(36, 'pechera', 0.00, NULL, '1724037079_pechera.jpeg', 2),
(42, 'lentes', 0.00, NULL, '1724043422_lentes.webp', 4),
(43, 'bañador', 0.00, NULL, '1724043521_bañador.webp', 4),
(44, 'gorra', 0.00, NULL, '1724043590_gorra.jpeg', 4),
(45, 'traje de baño', 0.00, NULL, '1724043676_traje de baño.webp', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
