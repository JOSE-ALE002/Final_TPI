-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2020 a las 21:39:44
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finaltpi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `idAlquiler` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `fechaDevolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `idCalidad` int(11) NOT NULL,
  `calidad` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calidad`
--

INSERT INTO `calidad` (`idCalidad`, `calidad`) VALUES
(1, '144p'),
(2, '240p'),
(3, '360p'),
(4, '480p'),
(5, '720p'),
(6, '1080p');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Acción'),
(2, 'Infantil'),
(3, 'Comedia'),
(4, 'Terror'),
(5, 'Ciencia Ficción'),
(6, 'Aventura'),
(7, 'Suspenso'),
(8, 'Romance'),
(9, 'Fantasía'),
(10, 'Drama'),
(11, 'Animación'),
(12, 'Crimen'),
(13, 'Misterio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `fechaCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idPelicula` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idioma` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `idCalidad` int(11) NOT NULL,
  `precioCompra` decimal(3,2) NOT NULL,
  `precioAlquiler` decimal(3,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idPelicula`, `nombre`, `descripcion`, `idCategoria`, `idioma`, `idCalidad`, `precioCompra`, `precioAlquiler`, `stock`, `imagen`, `disponibilidad`) VALUES
(1, 'Sonic: La pelicula', 'Después de descubrir a un increíblemente veloz erizo azul, un oficial de policía de un pequeño pueblo debe ayudarlo a derrotar a un genio malvado que quiere capturarlo para experimentar con él. Basada en el videojuego.                                   ', 9, 'Español', 5, '9.99', '9.99', 250, 'https://www.cinecalidad.is/wp-content/uploads/2020/04/sonic-the-hedgehog-4k.jpg', 1),
(2, 'Dolittle', '                                                El doctor John Dolittle, que puede hablar con los animales, decide esconderse del mundo. Pero pronto debe embarcarse en una aventura para encontrar una isla legendaria con un joven aprendiz y un equipo de extrañas mascotas.                                    ', 6, 'Italiano', 2, '9.99', '9.99', 120, 'https://www.cinecalidad.is/wp-content/uploads/2020/03/dolittle-4k.jpg', 1),
(3, 'Bad Boys for live', '                                Marcus y Mike deben confrontar cambios de carrera y crisis de edad media, cuando se unen a un equipo de élite recién creado del departamento de policía de Miami para capturar al implacable Armando Armas, líder de un cartel de drogas.\r\nTrilogía Bad Boys                                                                ', 1, 'Ingles', 4, '9.99', '9.99', 150, 'https://www.cinecalidad.is/wp-content/uploads/2020/04/bad-boys-for-life-4k.jpg', 1),
(4, 'Avengers: Endgame', '                Después de la devastadora lucha contra Thanos, el universo queda en ruinas. Con la ayuda de los aliados restantes, los Vengadores se juntan una vez más para intentar revertir las acciones de Thanos y restaurar el balance al universo.\r\nUniverso Marvel                                   ', 5, 'Ingles', 6, '9.99', '9.99', 500, 'https://www.cinecalidad.is/wp-content/uploads/2019/07/avengers-endgame-4k.jpg', 1),
(5, 'Star Wars: El ascenso de Skywalker', 'Los miembros sobrevivientes de la resistencia se enfrentan a la Primera Orden una vez más, y el legendario conflicto entre los Jedi y los Sith alcanza su punto máximo llevando la saga Skywalker a su fin.\r\nSaga Star Wars                    ', 5, 'Frances', 5, '9.99', '9.99', 300, 'https://www.cinecalidad.is/wp-content/uploads/2020/03/star-wars-the-rise-of-skywalker-4k.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int(11) NOT NULL DEFAULT 2,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `email`, `direccion`, `idRol`, `pass`) VALUES
(1, 'Alejandro', 'Ibañez', 'Ale@gmail.com', 'Pacifica', 1, '$2y$10$SB97k5Wn81slpKF9ASmoi.EW6e4erNFBLBf3nav3hdsvk3MGWSaOC'),
(2, 'Gerson', 'Diaz', 'Gerson@gmail.com', 'Pacifica', 2, '$2y$10$x0kpQ4wzD/7IfivLadJxtedGVKJHTlkpRX9PqvR9913Ps4AiVX0p6'),
(3, 'Douglas', 'Cañas', 'Douglas@gmail.com', 'Pacifica', 2, '$2y$10$8vGFV0oSGzRBJpSLMmTzsuZU955voQOpfeG94AC2wXahHWFjxbhK.'),
(4, 'Benjamin', 'Bernal', 'Benja@gmail.com', 'Berlin', 1, '$2y$10$cHWTEbiaxKmk/yHggGv3peH2CwmWSDoE53.MBBjbxSAWsg.Cexb46'),
(5, 'Adolfo', 'Guzman', 'Adolfo@gmail.com', 'Berlin', 2, '$2y$10$FoJ2AOYmD3NZcxxfhOj45OgYploxzjIBSt59zZJsfKbboFziJZSn.'),
(6, 'Pavel', 'Coreas', 'Pavel@gmail.com', 'Pacifica', 2, '$2y$10$vjz8ZO/PVjWq848ogCjSX.O0ifB0kkJDpJHUWNpLYblTjA6oTOrx6'),
(7, 'Marlon', 'Coreas', 'Marlon@gmail.com', 'Estanzuela', 1, '$2y$10$xBKhiexUaCkU/z9OaQIC8e6Hy.aX6/Pzf.wbin4UZPwEIx5/JMk9a'),
(8, 'Alfonso', 'Lemus', 'Lemus@gmail.com', 'Jucuapa', 1, '$2y$10$VdtssLPxsJ4c6OKgpnJhguTq184Lqt.PgjWU0BOOwtJOgAzGZxxXS'),
(9, 'Carlos', 'Ivan', 'Ivan@gmail.com', 'San Miguel', 1, '$2y$10$LsEAqE/9eRijy61xKaKBC.cRijY7Ysep14sILWy7wCGJVQj/roA96'),
(11, 'Jose', 'Cuevas', 'Jose@gmail.com', 'Presita', 2, '$2y$10$LiJ7IC.OIN7BnPGiTdTFweEzmhg3OJIuZR6XrFOAEv8KoJML/pMg6'),
(12, 'Kenia', 'Calderon', 'Keny@gmail.com', 'Santa rosa', 2, '$2y$10$ACXNU/Iztx.uF8UsDT0cg.BCLiaFsk.Y0bjX4pXwkcR3CFjc9A9qC'),
(13, 'Kevin', 'Pineda', 'Pineda@gmail.com', 'Estados unidos', 2, '$2y$10$PNY0v9gpz6nINZseqYxvtOh1IMyRzqjl/jkd7ewdMkMB8nGNaARIa'),
(14, 'Stanley', 'Sanchez', 'Stanley@gmail.com', 'Pacifica', 2, '$2y$10$x4BCOyUMjLfDOCNixhKzQ.Z7HJDYkuVXVk5CEy6wQykFh6zI/qM7S'),
(15, 'Aldair', 'MArin', 'Aldair@gmail.com', 'Presita', 2, '$2y$10$KPsxcnTG7SprhZlkAHIdzeXbKRcYzm5.1o1YHk1ARfPSre8IPbWuq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `idValoracion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `valoracion` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`idAlquiler`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`idCalidad`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idPelicula`),
  ADD KEY `idCalidad` (`idCalidad`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`idValoracion`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `idAlquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `idCalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `idValoracion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `alquileres_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquileres_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`idCalidad`) REFERENCES `calidad` (`idCalidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`idPelicula`) REFERENCES `peliculas` (`idPelicula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
