-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2022 a las 20:49:05
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_appactiv`
--
CREATE DATABASE IF NOT EXISTS `db_appactiv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_appactiv`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividadad`
--

CREATE TABLE `tbl_actividadad` (
  `id_act` int(6) NOT NULL,
  `Titulo` varchar(30) NOT NULL,
  `descripcion_act` text NOT NULL,
  `imagen_act` text NOT NULL,
  `fechaSub_act` date NOT NULL,
  `tiempoEst_act` int(4) NOT NULL,
  `id_autor` int(4) NOT NULL,
  `tag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_actividadad`
--

INSERT INTO `tbl_actividadad` (`id_act`, `Titulo`, `descripcion_act`, `imagen_act`, `fechaSub_act`, `tiempoEst_act`, `id_autor`, `tag`) VALUES
(9, 'Titulo de prueba', 'Se vienen cositas', 'sombrero.png', '2022-05-09', 50, 1, 2),
(10, 'Titulo de prueba', 'Se vienen cositas', 'sombrero.png', '2022-05-09', 50, 1, 2),
(11, 'Titulo de prueba', 'Se vienen cositas', 'sombrero.png', '2022-05-09', 50, 1, 2),
(12, 'Titulo de prueba', 'Se vienen cositas', 'sombrero.png', '2022-05-09', 50, 1, 2),
(64, 'Cada cara de un color', 'Amb els 8 cubs construir-ne un altre (veure el model) que en les seves cares hi hagin tots els cercles del mateix color i cada cara sigui d’un color diferent.', 'imagen3.jpg', '2022-05-09', 20, 1, 1),
(65, 'Cuadros de sólidos de Platonic', 'Caras: 12 Aristas: 30 Vértices: 20', 'dodecaedro.png', '2022-05-09', 30, 1, 1),
(66, 'Cuadros de Dipyramides', 'Caras: 10 Aristas: 15 Vértices: 7', 'dipiramide.jpg', '2022-05-10', 15, 1, 1),
(67, 'Richi', 'Richi siendo Richi', 'Modo Richi.jpg', '2022-05-10', 40, 3, 2),
(68, 'hola', 'hola', 'cat-gato.gif', '2022-05-11', 1242421, 3, 1),
(69, 'j', 'j', 'cat-gato.gif', '2022-05-11', 6, 3, 2),
(71, 'Taller de informatica', 'Haremos una clase general para introducir a gente mayor al mundo de los ordenadores', 'pc-sobremesa.jpg', '2022-05-11', 120, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_likes`
--

CREATE TABLE `tbl_likes` (
  `id_like` int(11) NOT NULL,
  `id_act` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_likes`
--

INSERT INTO `tbl_likes` (`id_like`, `id_act`, `id_user`) VALUES
(18, 66, 3),
(22, 67, 3),
(29, 66, 1),
(32, 67, 1),
(33, 67, 21),
(34, 65, 21),
(35, 64, 21),
(36, 67, 22),
(37, 66, 22),
(38, 65, 22),
(39, 67, 23),
(40, 66, 23),
(41, 65, 23),
(42, 64, 23),
(43, 12, 23),
(45, 12, 3),
(46, 10, 3),
(47, 68, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_topic`
--

CREATE TABLE `tbl_topic` (
  `id_top` int(2) NOT NULL,
  `topic_top` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_topic`
--

INSERT INTO `tbl_topic` (`id_top`, `topic_top`) VALUES
(1, 'Matemáticas'),
(2, 'Informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usu` int(4) NOT NULL,
  `nombre_usu` text NOT NULL,
  `contraseña_usu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usu`, `nombre_usu`, `contraseña_usu`) VALUES
(1, 'Jorge', '1234'),
(3, 'Sergio', '1234'),
(21, 'Paco', '1234'),
(22, 'Prueba', '1234'),
(23, 'Test', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_actividadad`
--
ALTER TABLE `tbl_actividadad`
  ADD PRIMARY KEY (`id_act`),
  ADD KEY `FK_act_usuario` (`id_autor`),
  ADD KEY `FK_act_topic` (`tag`);

--
-- Indices de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `FK_user_likes` (`id_user`),
  ADD KEY `FK_act_likes` (`id_act`);

--
-- Indices de la tabla `tbl_topic`
--
ALTER TABLE `tbl_topic`
  ADD PRIMARY KEY (`id_top`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_actividadad`
--
ALTER TABLE `tbl_actividadad`
  MODIFY `id_act` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tbl_topic`
--
ALTER TABLE `tbl_topic`
  MODIFY `id_top` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usu` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_actividadad`
--
ALTER TABLE `tbl_actividadad`
  ADD CONSTRAINT `FK_act_topic` FOREIGN KEY (`tag`) REFERENCES `tbl_topic` (`id_top`),
  ADD CONSTRAINT `FK_act_usuario` FOREIGN KEY (`id_autor`) REFERENCES `tbl_usuario` (`id_usu`);

--
-- Filtros para la tabla `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD CONSTRAINT `FK_act_likes` FOREIGN KEY (`id_act`) REFERENCES `tbl_actividadad` (`id_act`),
  ADD CONSTRAINT `FK_user_likes` FOREIGN KEY (`id_user`) REFERENCES `tbl_usuario` (`id_usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
