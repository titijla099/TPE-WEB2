-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2023 a las 00:49:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_oneshine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Shampoos'),
(2, 'Siliconas'),
(3, 'Desengrasantes'),
(4, 'Ceras'),
(5, 'Kits de lavado'),
(6, 'Microfibras'),
(7, 'Pads aplicadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(110) NOT NULL,
  `cantidad` varchar(15) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `cantidad`, `descripcion`, `precio`, `id_categoria`) VALUES
(1, 'Deep Shine Shampoo Banana', '500ml', 'Shampoo PH neutro, fragancia banana', 1100, 1),
(2, 'Deep Shine Shampoo Frutilla', '500ml', 'Shampoo PH neutro, fragancia frutilla', 1100, 1),
(3, 'Snow Foam Shampoo', '500ml', 'Shampoo PH neutro, apto para FOAM', 1400, 1),
(4, 'Drunk Silicone Black Edition', '500ml', 'Silicona para exteriores negra', 5300, 2),
(5, 'Drunk Silicone Extra Brillo', '500ml', 'Silicona para exteriores transparente', 5000, 2),
(6, 'Strong Iron Descontaminant', '500ml', 'Lava motor y desengrasante', 2000, 3),
(7, 'Bug Remover Cleaner', '500ml', 'Removedor de insectos', 1700, 3),
(8, 'All purpose Cleaner', '500ml', 'Desengrasante apto para cualquier propósito ', 1900, 3),
(9, 'Crystal Glass Cleaner', '500ml', 'Limpia Vidrios', 1200, 3),
(10, 'Tussi Shine Quick Detailer', '500ml', 'Cera rápida para aplicación con vehículo húmedo o seco', 2600, 4),
(11, 'Kit de lavado Básico', '4u', 'Deep Shine Shampoo + Strong Iron Descontaminant + Drunk Silicone Extra Brillo', 7300, 5),
(12, 'Kit de lavado Intermedio', '6u', 'Deep Shine Shampoo + Strong Iron Descontaminant + Drunk Silicone Extra Brillo + Tussi Shine Quick Detailer', 9500, 5),
(13, 'Kit de lavado Avanzado', '8u', 'Snow Foam Shampoo + Strong Iron Descontaminant + Drunk Silicone Black Edition + All Purpose Cleaner + Milk Shine Interior Conditioner', 13000, 5),
(14, 'Kit de lavado Premium', '12u', 'Snow Foam Shampoo + Strong Iron Descontaminant + Drunk Silicone Black Edition + All Purpose Cleaner + Milk Shine Interior Conditioner + Crystal Glass Cleaner + Tussi Shine', 16500, 5),
(15, 'Microfibra 40 x 60 cm - Doble acción', '1u', 'Paño de microfibra 40 m x 60 cm -  Doble acción - Laffitte', 5000, 6),
(16, 'Microfibra 60 m x 40 cm - Alta densidad', '1u', 'Paño de microfibra 60 m x 40 cm - Alta densidad - Laffitte', 3000, 6),
(17, 'Pad aplicador circular', '1u', 'Pad aplicador circular de poliespuma Laffitte, ideal interiores', 500, 7),
(18, 'Pad Aplicador cóncavo', '1u', 'Pad Aplicador silicona cóncava de poliespuma, ideal neumáticos', 1000, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
