-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2025 a las 19:50:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cod_zombies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zombies`
--

CREATE TABLE `zombies` (
  `id` int(11) NOT NULL,
  `Zombies_tipo` varchar(300) NOT NULL,
  `Damage` int(200) NOT NULL,
  `Damage_type` varchar(300) NOT NULL,
  `Salud` int(200) NOT NULL,
  `Velocidad` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zombies`
--

INSERT INTO `zombies` (`id`, `Zombies_tipo`, `Damage`, `Damage_type`, `Salud`, `Velocidad`) VALUES
(1, 'Basico', 20, 'Normal', 100, 15),
(2, 'Explosivo', 70, 'Explosivo', 20, 25),
(3, 'Cabronazo', 30, 'basico', 150, 18),
(4, 'Fuego', 25, 'fuego', 120, 15),
(5, 'Escupidor', 15, 'Distancia', 80, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `zombies`
--
ALTER TABLE `zombies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `zombies`
--
ALTER TABLE `zombies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
