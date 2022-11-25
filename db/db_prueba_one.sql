-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2022 a las 18:17:20
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
(13, 'tener un gato nuevo lala', 'tengo que tener un gato nuevo porq me gustan lo animales', '2022-11-24 16:57:57', 7);

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
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `edad`, `password`) VALUES
(1, 'gleyvert', 'lagos', 'gleyvertlagos@gmail.com', 30, '$2y$10$ururTPUJIAUJ11nQkAmPeeFwOuAT2DnZwDiXw/zk7fQCni5cYopha'),
(2, 'gleyvert', 'lagos', 'gleyvertlagos@gmail.com', 30, '$2y$10$He0hBB1xGdGTs795QsEkHuY2ZHfCm5WT3CmaB1ZUAVtE3yAx9Er.u'),
(3, 'gleyvert', 'lagos', 'gleyvertlagos@gmail.com', 30, '$2y$10$jZdPXAJOtQFy.xre/b3ImO9Hr/vhKLHOM6zn7OnpMO4KP.xoYkCpu'),
(4, 'gleyvert', 'lagos', 'gleyvertlagos@gmail.com', 30, '$2y$10$NXShRPN2jjQ.AliebNn5HeSLPJN0fKwbTjTkLE98MgB4wv9xj1A3a'),
(5, 'gleyvert', 'lagos', 'gleyvertlagos@gmail.com', 30, '$2y$10$Pg/EJwQKhSmdVZj1g2zhyO3wcCW/y2Y0/2mPm3jGYw40F/6n7qOhi'),
(6, 'gleyvert', 'lagos', 'yunior@gmail.com', 27, '$2y$10$bTZv/YZogwW0Ax2YEIFurOvZx0Prl2rCOdL67eIULhRPuo/UbnUy6'),
(7, 'yuliana', 'pereira', 'yuliana@gmail.com', 21, '$2y$10$qX0E43DSYaJTXm4.QGZdEO.dHYExfQkTdm3V3PTidP4rK/Tzxn.16');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
