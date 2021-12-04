-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 02:13:33
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_brandi_lucio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categorias_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categorias_id`, `nombre`) VALUES
(1, 'vestir'),
(2, 'todoterreno'),
(3, 'diarios'),
(4, 'deportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `productos_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `categorias_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `precio` varchar(25) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen_descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`productos_id`, `usuario_id`, `categorias_id`, `nombre`, `descripcion`, `precio`, `texto`, `imagen`, `imagen_descripcion`) VALUES
(1, 1, 1, 'zapatos', 'Formales. Hechos a mano con detalles de terminación y materiales de excelente calidad', '$20.000', 'Zapatos de cuero de la más alta calidad', 'Zapatos2.gif', 'zapato vestir marrón'),
(2, 2, 3, 'Sandalias', 'Frescas. Ideales para el verano, cómodas y frescas para usar durante todo el día', '$ 8.000', 'Las sandalias más frescas para el verano', 'Sandalias-m.gif', 'sandalias color marrón'),
(3, 2, 2, 'Botas', 'Resistentes. Para usar encualquier terreno, abrigadas, impermeables y con mucho estilo', '$18.000', 'El mejor calzado todo terreno, abrigadas e impermeables', 'Botas2.gif', 'botas de cuero marrones'),
(4, 2, 4, 'Zapatillas', 'Urbanas.  Variedad de materiales en tela y cuero. Diferentes colores. Diseño para todos los momentos del día', '$12.000', 'La forma más cómoda de vestrir', 'Zapatillas.gif', 'zapatillas de lona aziles'),
(5, 2, 3, 'Nauticos', 'Cómodos. Diferentes modelos de tela y cuero, distintas variedades de suelas y colores', '$ 8.000', 'Distinguidos y cómodos a la vez', 'Nauticos.gif', 'nauticos marrones con suela blanca'),
(6, 1, 2, 'Botas mujer', 'Variedad. Las mejores botas para la oficina y el after office, confeccionadas en varios colores', '$19.000', 'Elegancia para todos los días', 'Botasmujer2.gif', 'botas cortas rojas de mujer'),
(7, 1, 3, 'Zuecos', 'Elegantes. Confortables y cómodos a la vez, los elegidos a la hora de caminar por la ciudad', '$ 8.000', 'Un estilo diferente de vestir', 'Zuecos.gif', 'zuecos de goma color marrón'),
(8, 2, 1, 'Mocasines', 'Distintos. Mocasines para destacarse con elegancia y originalidad', '$21.000', 'Unicos e irrepetibles', 'Mocasines.png', 'mocasines de mujer dos colores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `roles_id` tinyint(3) UNSIGNED NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='						';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `roles_id`, `email`, `password`, `apellido`, `nombre`) VALUES
(1, 1, 'carlitos@gmail.com', '$2y$10$jajUnkmNW78fh640jQy4GO7BEO0NP.KU3LRZXCh8kX4DJxAkSbW2', 'Tevez', 'Carlos'),
(2, 1, 'riky@gmail.com', '$2y$10$jajUnkmNW78fh640jQy4GO7BEO0NP.KU3LRZXCh8kX4DJxAkSbW2', 'Sarkany', 'Ricardo'),
(3, 2, 'pedro@gmail.com', '$2y$10$jajUnkmNW78fh640jQy4GO7BEO0NP.KU3LRZXCh8kX4DJxAkSbW2', 'Picapiedras', 'Pedro'),
(4, 2, 'pablo@gmail.com', '$2y$10$jajUnkmNW78fh640jQy4GO7BEO0NP.KU3LRZXCh8kX4DJxAkSbW2', 'Picaporte', 'Pablo'),
(5, 1, 'pipo@pipi.com', '$2y$10$jajUnkmNW78fh640jQy4GO7BEO0NP.KU3LRZXCh8kX4DJxAkSbW2', 'pipo', 'chipollati');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categorias_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`productos_id`),
  ADD KEY `fk_productos_usuarios_1_idx` (`usuario_id`),
  ADD KEY `fk_productos_categorias1_idx` (`categorias_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuario_roles_1_idx` (`roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categorias_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `productos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`categorias_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_usuarios_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_roles_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
