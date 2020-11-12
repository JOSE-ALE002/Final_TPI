-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2020 a las 07:19:52
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
(9, 'Carlos', 'Ivan', 'Ivan@gmail.com', 'San Miguel', 1, '$2y$10$LsEAqE/9eRijy61xKaKBC.cRijY7Ysep14sILWy7wCGJVQj/roA96');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
