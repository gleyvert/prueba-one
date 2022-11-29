-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2022 a las 22:14:29
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_prueba_one`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre`) VALUES
(1, 'maturin'),
(2, 'upata'),
(3, 'caracas'),
(4, 'san cristobal'),
(5, 'margarita'),
(6, 'barcelona'),
(7, 'anaco'),
(8, 'cumana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'usuario'),
(2, 'administrador'),
(3, 'empresarial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_tareas`
--

CREATE TABLE `status_tareas` (
  `id_status` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `status_tareas`
--

INSERT INTO `status_tareas` (`id_status`, `nombre`) VALUES
(1, 'pendiente'),
(2, 'en_curso'),
(3, 'realizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `nombre`, `descripcion`, `creado_en`, `id_usuario`, `id_status`) VALUES
(1, 'ssss', 'dddddd', '2022-11-23 23:19:48', 1, 0),
(2, 'yunior', 'acosta', '2022-11-23 23:23:23', 1, 0),
(3, 'gleyvert', 'lagos', '2022-11-23 23:39:07', 1, 0),
(11, 'yuliana ', 'pereira', '2022-11-24 00:32:04', 1, 0),
(12, 'adsad', 'asdasasd', '2022-11-24 00:32:09', 1, 0),
(15, 'exportar base de datos', 'reemplazarla en el proyecto y subir los cabios con git', '2022-11-25 19:03:39', 7, 2),
(16, 'cambios con git', 'git ass .\r\ngit commit -m \"nombre de leso\"\r\ngit push origin main', '2022-11-25 19:04:41', 7, 2),
(18, 'estatus de tareas ', 'si esta pendiente en curso o realizada.', '2022-11-28 23:59:34', 7, 3),
(19, 'enviar correo', 'cuando se registre una tarea y cuando se registre el usuario.', '2022-11-29 00:00:40', 7, 3),
(21, 'corregir los errores', 'seguir estudiando para futuros proyectos', '2022-11-29 19:47:37', 7, 1),
(22, 'mi tarea de ahora es seguir programando', 'la vida te da sorpresas sorpresas te da la vida hay dios', '2022-11-29 19:51:20', 16, 1),
(24, 'hola que tal como estas', 'la vida loca loca', '2022-11-29 19:58:43', 16, 3),
(25, 'la milagrosa', 'manana comer pollo a la broster otra vez', '2022-11-29 20:00:42', 16, 1),
(32, 'hola soy yunior', 'soy programador', '2022-11-29 20:24:44', 17, 1),
(33, 'crud ', 'con javascript con ajax con php y mysql', '2022-11-29 20:29:34', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `edad`, `password`, `id_ciudad`, `id_rol`) VALUES
(6, 'gleyvert', 'lagossssss', 'yunior@gmail.com', 27, '$2y$10$l5P0v5W1pgJeA3W8ADE2QeMewFgLsVwn5lBB6gufX3ChySB6C8Qgq', 3, 0),
(7, 'yuliana', 'pereira', 'yuliana@gmail.com', 21, '$2y$10$qX0E43DSYaJTXm4.QGZdEO.dHYExfQkTdm3V3PTidP4rK/Tzxn.16', 0, 3),
(8, 'glenda', 'gomez', 'glenda@gmail.com', 2232, '$2y$10$Lnr0LroSFDboAMKc3zJQKuySOYf4czXQh9udy94gllbFuCJbr7uim', 4, 0),
(9, 'yunior', 'diaz', 'yunior2@gmail.com', 27, '$2y$10$OS7hY8foVKnInC3bhspjTuZvAjkPm9umvYN7Wi4X44meRoHzI8ahu', 1, 0),
(10, 'yunior', 'diaz', 'yunior6@gmail.com', 27, '$2y$10$azs.r123FfPtO9QSp3pZc.424uMgcJUMUtel25.qKm92ESJhM9Tt6', 1, 0),
(11, 'eduardo', 'diaz', 'eduardo@gmail.com', 27, '$2y$10$tlNZzzmCJ.pLzhn7n6wn4uhubOemHIdlGuUEtheVk/D2Rk1zCF7.C', 8, 3),
(16, 'gleyvert', 'lagos', 'gleyvertlagos@gmail.com', 30, '$2y$10$v1tK9ZIMjrrTOLAruFEz2elg9R81.812SZ6V2btp22b.HNc/x81wG', 3, 3),
(17, 'yunior ', 'diaz', 'yuniordiaz1@gmail.com', 27, '$2y$10$OZFhc589jo3duXLIzaC2Y.iXJf9/eI7EoHZFr9spvGq2De0OJ7Feu', 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `status_tareas`
--
ALTER TABLE `status_tareas`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `status_tareas`
--
ALTER TABLE `status_tareas`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
