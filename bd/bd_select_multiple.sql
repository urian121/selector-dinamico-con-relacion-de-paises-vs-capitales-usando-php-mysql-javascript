-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-09-2024 a las 15:48:24
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_select_multiple`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitales`
--

CREATE TABLE `capitales` (
  `id_capital` int NOT NULL,
  `nombre_capital` varchar(50) DEFAULT NULL,
  `id_pais` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `capitales`
--

INSERT INTO `capitales` (`id_capital`, `nombre_capital`, `id_pais`) VALUES
(1, 'Bogotá', 1),
(2, 'Caracas', 2),
(3, 'Brasilia', 3),
(4, 'Ciudad de México', 4),
(5, 'Lima', 5),
(6, 'Quito', 6),
(7, 'La Paz', 7),
(8, 'Buenos Aires', 8),
(9, 'Santiago', 9),
(10, 'Asunción', 10),
(11, 'Montevideo', 11),
(12, 'San José', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int NOT NULL,
  `nombre_pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `nombre_pais`) VALUES
(1, 'Colombia'),
(2, 'Venezuela'),
(3, 'Brasil'),
(4, 'México'),
(5, 'Perú'),
(6, 'Ecuador'),
(7, 'Bolivia'),
(8, 'Argentina'),
(9, 'Chile'),
(10, 'Paraguay'),
(11, 'Uruguay'),
(12, 'Costa Rica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poblacion_pais`
--

CREATE TABLE `poblacion_pais` (
  `id_pais` int NOT NULL,
  `habitantes` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `poblacion_pais`
--

INSERT INTO `poblacion_pais` (`id_pais`, `habitantes`) VALUES
(1, 50882891),
(2, 28435943),
(3, 212559417),
(4, 126190788),
(5, 32971846),
(6, 17643060),
(7, 11673029),
(8, 45195777),
(9, 19116201),
(10, 7132530),
(11, 3473727),
(12, 5094118);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitales`
--
ALTER TABLE `capitales`
  ADD PRIMARY KEY (`id_capital`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `poblacion_pais`
--
ALTER TABLE `poblacion_pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitales`
--
ALTER TABLE `capitales`
  MODIFY `id_capital` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `poblacion_pais`
--
ALTER TABLE `poblacion_pais`
  ADD CONSTRAINT `fk_pais_poblacion` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
