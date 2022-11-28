-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221125.2e001c186a
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 06:29:14
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

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
  `id_roles` int(11) NOT NULL,
  `nombre_rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `nombre_rol`) VALUES
(1, 'usuario'),
(2, 'administrador'),
(3, 'empresarial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `nombre`, `descripcion`, `creado_en`, `id_usuario`) VALUES
(1, 'ssss', 'dddddd', '2022-11-23 23:19:48', 1),
(2, 'yunior', 'acosta', '2022-11-23 23:23:23', 1),
(3, 'gleyvert', 'lagos', '2022-11-23 23:39:07', 1),
(11, 'yuliana ', 'pereira', '2022-11-24 00:32:04', 1),
(12, 'adsad', 'asdasasd', '2022-11-24 00:32:09', 1),
(15, 'exportar base de datos', 'reemplazarla en el proyecto y subir los cabios con git', '2022-11-25 19:03:39', 7),
(16, 'cambios con git', 'git ass .\r\ngit commit -m \"nombre de leso\"\r\ngit push origin main', '2022-11-25 19:04:41', 7),
(17, 'roles', 'agregar tabla roles\r\nagregar columla rol_id\r\nagregar tres roles administrador, usuario y empresarial', '2022-11-25 22:33:59', 7);

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
(1, 'gleyvert', 'lagos', 'gleyvertlagos@gmail.com', 30, '$2y$10$ururTPUJIAUJ11nQkAmPeeFwOuAT2DnZwDiXw/zk7fQCni5cYopha', 0, 0),
(2, 'yunior4', 'diaz', 'yunior4@gmail.com', 27, '$2y$10$KUcF5GTNd6Wj13ZBFNRUIOZLvmuSOQV938hJ7JzldidS6ifWwthMG', 3, 0),
(6, 'gleyvert', 'lagossssss', 'yunior@gmail.com', 27, '$2y$10$l5P0v5W1pgJeA3W8ADE2QeMewFgLsVwn5lBB6gufX3ChySB6C8Qgq', 3, 0),
(7, 'yuliana', 'pereira', 'yuliana@gmail.com', 21, '$2y$10$crGUMzDGwh6q71Ds2tYE9OJLwn7ZXvuB8llOCXMoGZs67NILsw2jm', 1, 0),
(8, 'glenda', 'gomez', 'glenda@gmail.com', 2232, '$2y$10$Lnr0LroSFDboAMKc3zJQKuySOYf4czXQh9udy94gllbFuCJbr7uim', 4, 0),
(9, 'yunior', 'diaz', 'yunior2@gmail.com', 27, '$2y$10$OS7hY8foVKnInC3bhspjTuZvAjkPm9umvYN7Wi4X44meRoHzI8ahu', 1, 0),
(22, 'gleyvert', 'lagos', 'yunior@gmail.com', 49, '$2y$10$qNYe./3D9RCyODo/DJvEhu5aGvOUk1Mv7lDnpxBCpg3kx5n5iAKnm', 4, 0),
(29, 'gleyvert', 'lagos', 'gleyvertprueba@gmail.com', 30, '$2y$10$HXVghda1VFhmGnGKVtMFW.TaFhoBlSjIi0oXUGcQVuXhJj0y8QnOa', 4, 0),
(30, 'gleyvert', 'lagos', 'gley@gmail.com', 23, '$2y$10$YLRHGZtjAX8iNaZEEiQI0.Puoum2pZWGPJRJvRjdY1qROgYbmzsQW', 6, 0),
(31, 'gleyvert', 'lagos', 'yunior3@gmail.com', 27, '$2y$10$e6TJQerPxUMvhI4YbVSYP.pc7/EjvgtB.vO41itZaO/PBHwkD.CJG', 0, 0),
(32, 'gleyvert', 'lagos', 'yunior5@gmail.com', 30, '$2y$10$ZH/hy/y4vg0Sz/un0QR7Fua0V9Wsb0lxiBAbDmupU/j4Cea9Zx31G', 8, 0),
(33, 'yuli', 'pereira', 'yulianachan@gmail.com', 30, '$2y$10$0TNe6kZF9qtbYdQsUp.Zke.Y15iaErxt.KhoF4kL6b4jbiYvhnoDO', 1, 0),
(34, 'evert', 'lagos', 'evert@gmail.com', 55, '$2y$10$IF3Zo59PsaHekTqF5fIL.erPlcFANcBjUVYEnqQYot1HUs/KffUvC', 4, 3);

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
  ADD PRIMARY KEY (`id_roles`);

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
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
