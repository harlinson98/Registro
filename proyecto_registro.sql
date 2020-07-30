-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2020 a las 23:31:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(1, 'admin', 'Harlinson', '$2y$12$WHo3Ns5YNBHviwBIC/MAz.x3yvQdoTFhxXE9bd0VmadVLteFjLwIe', '0000-00-00 00:00:00', 0),
(2, 'admin', 'Harlinson', '$2y$12$ytv.g0kSGYklZOX3tA7xd.TOsX5W1Fae4ld1yR0F9GQ8zoFDgwj56', '0000-00-00 00:00:00', 0),
(3, 'harlinson', 'harlinson', '$2y$12$ix4C/2MXkOwlJe6EmMTfjeuiOio0TNCGeiI1Im2JbEGA9kjiIDWAq', '0000-00-00 00:00:00', 0),
(4, 'harlinson', 'harlinson', '$2y$12$Q1Saahfs6TL0o/8yxbxFOODAx090/5pfFO9Djarmj7kXDeY6sd7mG', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaevento`
--

CREATE TABLE `categoriaevento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoriaevento`
--

INSERT INTO `categoriaevento` (`id_categoria`, `cat_evento`, `icono`) VALUES
(1, 'Seminario', 'fa-university'),
(2, 'conferencias', 'fa-comment'),
(3, 'Talleres', 'fa-code');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(10) NOT NULL,
  `clave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES
(1, 'Deporte en casa', '2020-04-30', '09:04:20', 3, 1, 'taller01'),
(4, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03'),
(5, 'Emprendimiento Digital', '2016-12-09', '17:00:00', 3, 4, 'taller_04'),
(6, 'cuidados en la familia ', '2016-12-09', '19:00:00', 3, 5, 'taller_05'),
(7, 'litereatura al Dia', '2016-12-09', '10:00:00', 2, 6, 'conf_01'),
(8, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02'),
(9, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03'),
(10, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01'),
(12, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07'),
(13, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08'),
(14, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09'),
(16, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01'),
(17, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03'),
(21, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02'),
(22, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03'),
(26, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08'),
(28, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10'),
(29, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11'),
(30, 'Como crear una tienda online que venda millones en pocos día', '2016-12-10', '10:00:00', 2, 6, 'conf_04'),
(31, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05'),
(32, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06'),
(33, 'Aprende a Programar en una mañana', '2016-12-10', '10:00:00', 1, 3, 'sem_02'),
(34, 'Diseño UI y UX para móviles', '2016-12-10', '17:00:00', 1, 5, 'sem_03'),
(35, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12'),
(36, 'Crea tu propia API', '2016-12-11', '12:00:00', 3, 2, 'taller_13'),
(37, 'JavaScript y jQuery', '2016-12-11', '14:00:00', 3, 3, 'taller_14'),
(38, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_15'),
(39, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16'),
(40, 'Como hacer Marketing en línea', '2016-12-11', '10:00:00', 2, 6, 'conf_07'),
(41, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08'),
(42, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09'),
(43, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04'),
(44, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'rafae', 'Bautista', 'hageyrishs', 'invitado1.jpg'),
(2, 'shari', 'herrera', 'es muy colaborativs', 'invitado2.jpg'),
(3, 'Gregorio', 'zanches', 'Ayuda poco ', 'invitado3.jpg'),
(4, 'Susana', 'Rivera', 'es Astuta. ', 'invitado4.jpg'),
(5, 'Harold', 'Ureña', 'sabe trazar lineas. ', 'invitado5.jpg'),
(6, 'Harlinson', 'Ureña', 'Excelente ingeniero en Tic, dispuesto y motivado por surguir como el Feniz, Disciplina será su Fortaleza, Dios la guianza y proteccion.  ', 'invitado6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `ID_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`ID_regalo`, `nombre_regalo`) VALUES
(1, 'pulsera'),
(2, 'etiqueas'),
(3, ''),
(4, 'plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `ID_Registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registro` varchar(100) NOT NULL,
  `fecha_registrado` datetime NOT NULL,
  `pases_articulo` longtext NOT NULL,
  `talleres_registrado` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`ID_Registrado`, `nombre_registrado`, `apellido_registrado`, `email_registro`, `fecha_registrado`, `pases_articulo`, `talleres_registrado`, `regalo`, `total_pagado`) VALUES
(1, 'harlinson', 'ureña', 'harlenclau@hotmail.com', '2020-05-03 04:05:11', '{\"un_dia\":3,\"pase_completo\":2,\"pase_2dias\":1,\"camisas\":2,\"etiquetas\":2}', '[]', 3, ''),
(2, 'harlinson', 'ureña', 'harlenclau@hotmail.com', '2020-05-03 04:07:43', '{\"un_dia\":3,\"pase_completo\":2,\"pase_2dias\":1,\"camisas\":2,\"etiquetas\":2}', '[]', 3, ''),
(3, 'harlinson', 'ureña', 'harlenclau@hotmail.com', '2020-05-03 04:11:07', '{\"un_dia\":3,\"pase_completo\":2,\"pase_2dias\":1,\"etiquetas\":2}', '[]', 3, ''),
(4, 'harlinson', 'ureña', 'harlenclau@hotmail.com', '2020-05-03 04:12:39', '{\"un_dia\":3,\"pase_completo\":2,\"pase_2dias\":1,\"etiquetas\":2}', '[]', 3, ''),
(5, 'harlinson', 'ureña', 'harlenclau@hotmail.com', '2020-05-03 07:57:44', '{\"un_dia\":3,\"pase_completo\":2,\"pase_2dias\":1,\"etiquetas\":2}', '[]', 3, ''),
(6, 'harlinson', 'ureña', 'harlenclau@hotmail.com', '2020-05-03 08:07:53', '{\"un_dia\":1,\"pase_completo\":2,\"pase_2dias\":3,\"etiquetas\":2}', '[]', 3, ''),
(7, 'harlinson', 'ureña', 'harlinsonc.98@gmail.com', '2020-05-03 08:08:24', '{\"un_dia\":3,\"pase_completo\":2,\"pase_2dias\":1,\"etiquetas\":2}', '[]', 3, ''),
(8, '', '', '', '2020-05-05 22:36:35', '[]', '[]', 3, ''),
(9, '', '', '', '2020-05-05 22:38:36', '[]', '[]', 1, ''),
(10, '', '', '', '2020-05-12 06:17:02', '[]', '[]', 2, ''),
(11, '', '', '', '2020-05-25 00:12:46', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(12, '', '', '', '2020-05-25 00:19:35', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(13, '', '', '', '2020-05-25 00:19:56', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(14, '', '', '', '2020-05-25 00:22:53', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(15, '', '', '', '2020-05-25 04:17:27', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(16, '', '', '', '2020-05-25 04:33:13', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(17, '', '', '', '2020-05-25 04:36:50', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(18, '', '', '', '2020-05-25 04:38:39', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(19, '', '', '', '2020-05-25 05:15:55', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(20, '', '', '', '2020-05-25 05:18:47', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"etiquetas\":1}', '[]', 2, ''),
(21, '', '', '', '2020-05-25 05:46:04', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, ''),
(22, '', '', '', '2020-05-25 05:48:37', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, ''),
(23, '', '', '', '2020-05-25 05:54:09', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, ''),
(24, '', '', '', '2020-05-25 07:35:40', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, ''),
(25, '', '', '', '2020-05-25 07:45:51', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, ''),
(26, '', '', '', '2020-05-25 08:42:25', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, ''),
(27, '', '', '', '2020-05-25 16:12:05', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, ''),
(28, 'Juan Haner', 'Castillo Ureña', 'polhaner@gmail.com', '2020-05-27 05:34:35', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 1, ''),
(29, '', '', '', '2020-05-27 19:35:15', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, ''),
(30, '', '', '', '2020-05-27 20:39:38', '{\"un_dia\":1,\"pase_completo\":1,\"pase_2dias\":1,\"camisas\":1,\"etiquetas\":1}', '[]', 2, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `categoriaevento`
--
ALTER TABLE `categoriaevento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_inv` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`ID_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`ID_Registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoriaevento`
--
ALTER TABLE `categoriaevento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `ID_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `ID_Registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoriaevento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`ID_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
