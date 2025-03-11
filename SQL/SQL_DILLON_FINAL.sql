-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2025 a las 07:59:54
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
-- Base de datos: `final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `usuario_id`, `producto_id`, `cantidad`) VALUES
(47, 25, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concentracion`
--

CREATE TABLE `concentracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `concentracion`
--

INSERT INTO `concentracion` (`id`, `nombre`) VALUES
(1, 'Eau de Parfum'),
(2, 'Eau de Toilette'),
(3, 'Colonia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia_olfativa`
--

CREATE TABLE `familia_olfativa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `familia_olfativa`
--

INSERT INTO `familia_olfativa` (`id`, `nombre`) VALUES
(1, 'Florar'),
(2, 'Aromatico'),
(3, 'Amaderado'),
(4, 'Especiado'),
(5, 'Citrica'),
(6, 'Oriental'),
(7, 'Acuático');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Unisex');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'Chanel'),
(2, 'Dior'),
(3, 'Gucci'),
(4, 'Yves Saint Laurent'),
(5, 'Versace'),
(6, 'Lancome'),
(7, 'Tom Ford'),
(8, 'Paco Rabanne'),
(9, 'Dolce y Gabbana'),
(10, 'Hermes'),
(11, 'Jo Malone'),
(12, 'Calvin Klein'),
(13, 'Giorgio Armani'),
(14, 'Marc Jacobs'),
(15, 'Jean Paul Gaultier'),
(16, 'Chloe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `familia_olfativa_id` int(11) NOT NULL,
  `concentracion_id` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `imagen` text DEFAULT 'https://fakeimg.pl/200x200'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `marca_id`, `genero_id`, `familia_olfativa_id`, `concentracion_id`, `capacidad`, `imagen`) VALUES
(1, 'Chanel N°5', 'El clásico perfume floral y atemporal.', 120.00, 15, 1, 2, 1, 1, 100, './public/imagenes/perfumes/chanelN5.webp'),
(2, 'Dior Sauvage', 'Perfume fresco y amaderado con notas de bergamota.', 95.00, 30, 2, 1, 2, 2, 100, './public/imagenes/perfumes/DiorSauvage.webp'),
(3, 'Gucci Bloom', 'Fragancia floral inspirada en un jardín de flores blancas.', 85.00, 20, 3, 2, 1, 1, 75, './public/imagenes/perfumes/GucciBloom.webp'),
(4, 'Bleu de Chanel', 'Un perfume fresco y enérgico para el hombre moderno.', 105.00, 18, 4, 1, 3, 1, 100, './public/imagenes/perfumes/BleudeChanel.webp'),
(5, 'Yves Saint Laurent Libre', 'Un perfume audaz y floral con lavanda y flor de naranjo.', 110.00, 25, 5, 2, 1, 1, 90, './public/imagenes/perfumes/YvesSaintLaurentLibre.webp'),
(6, 'Versace Eros', 'Una fragancia apasionada y fresca con notas de menta y limón.', 80.00, 22, 6, 1, 2, 2, 100, './public/imagenes/perfumes/VersaceEros.webp'),
(7, 'Lancome La Vie Est Belle', 'Un perfume dulce y empoderante con notas de vainilla y jazmín.', 100.00, 16, 7, 2, 1, 1, 75, './public/imagenes/perfumes/LancomeLaVieEstBelle.webp'),
(8, 'Tom Ford Oud Wood', 'Una fragancia exótica y lujosa con notas de oud y especias.', 150.00, 10, 8, 3, 3, 1, 50, './public/imagenes/perfumes/TomFordOudWood.webp'),
(9, 'Paco Rabanne 1 Million', 'Una fragancia vibrante y sensual con notas de canela y cuero.', 95.00, 40, 9, 1, 4, 2, 100, './public/imagenes/perfumes/PacoRabanne1Million.webp'),
(10, 'Dior J\'adore', 'Un perfume elegante y femenino con notas de frutas y flores.', 130.00, 12, 2, 2, 1, 1, 100, './public/imagenes/perfumes/DiorJadore.webp'),
(11, 'Dolce & Gabbana Light Blue', 'Fragancia fresca con cítricos y notas amaderadas.', 85.00, 28, 9, 2, 5, 2, 100, './public/imagenes/perfumes/Dolce&GabbanaLightBlue.webp'),
(12, 'Hermes Terre d\'Hermes', 'Una fragancia sofisticada con notas de tierra y cítricos.', 120.00, 15, 10, 1, 3, 2, 100, './public/imagenes/perfumes/HermesTerred.webp'),
(13, 'Jo Malone Peony & Blush Suede', 'Un perfume delicado y floral con peonía y manzana roja.', 105.00, 12, 11, 3, 1, 3, 100, './public/imagenes/perfumes/JoMalonePeony&BlushSuede.webp'),
(14, 'Calvin Klein Euphoria', 'Una fragancia cálida y seductora con granada y orquídea.', 75.00, 35, 12, 2, 6, 1, 100, './public/imagenes/perfumes/CalvinKleinEuphoria.webp'),
(15, 'Giorgio Armani Acqua di Gio', 'Un perfume acuático y fresco con cítricos y notas marinas.', 90.00, 50, 13, 1, 7, 2, 100, './public/imagenes/perfumes/GiorgioArmaniAcquadiGio.webp'),
(16, 'Marc Jacobs Daisy', 'Una fragancia alegre y ligera con flores y frutas frescas.', 85.00, 25, 14, 2, 1, 2, 100, './public/imagenes/perfumes/MarcJacobsDaisy.webp'),
(17, 'Jean Paul Gaultier Le Male', 'Una fragancia vibrante con notas de lavanda, menta y vainilla.', 100.00, 22, 15, 1, 2, 2, 100, './public/imagenes/perfumes/JeanPaulGaultierLeMale.webp'),
(18, 'Chloe Eau de Parfum', 'Perfume fresco y floral con notas de rosa y peonía.', 95.00, 18, 16, 2, 1, 1, 75, './public/imagenes/perfumes/ChloeEaudeParfum.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `ultimo_acceso` timestamp NULL DEFAULT NULL,
  `rol` enum('admin','cliente') DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `telefono`, `direccion`, `password`, `fecha_creacion`, `ultimo_acceso`, `rol`) VALUES
(25, 'leonardo', 'leoUser@gmail.com', '123123123', '123123123', '$2y$10$6ZT2.BewGHlJqcB0JNXlQe/irBvDQTLb1ENp.C1r5m5sca/Ev43je', '2025-03-08 06:45:54', NULL, 'cliente'),
(26, 'Leonardo', 'leoAdmin@gmail.com', '123123123', '123123123', '$2y$10$B5UJ/4/Y3ymKyLde.ikyMOylLHQX4gwoN3vjtfPKPukC.IeI.RF6W', '2025-03-08 06:47:01', NULL, 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `concentracion`
--
ALTER TABLE `concentracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familia_olfativa`
--
ALTER TABLE `familia_olfativa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `familia_olfativa_id` (`familia_olfativa_id`),
  ADD KEY `concentracion_id` (`concentracion_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `concentracion`
--
ALTER TABLE `concentracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `familia_olfativa`
--
ALTER TABLE `familia_olfativa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`familia_olfativa_id`) REFERENCES `familia_olfativa` (`id`),
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`concentracion_id`) REFERENCES `concentracion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
