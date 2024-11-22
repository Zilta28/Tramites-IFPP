-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2023 a las 04:05:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro_social`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceptacion`
--

CREATE TABLE `aceptacion` (
  `Id_ss` int(11) NOT NULL,
  `directivo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `escuela` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `prestatario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `carrera` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `horas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aceptacion`
--

INSERT INTO `aceptacion` (`Id_ss`, `directivo`, `cargo`, `escuela`, `prestatario`, `carrera`, `matricula`, `horas`) VALUES
(1, 'Juan', 'sdf', 'fsdf', 'dsf', 'gdf', 'sde323', 320),
(2, 'JUANA', 'DIRECTORA', 'UAEH', 'YAEL', 'CC', '24757', 544),
(3, '1', '1', '1', 'LIZ', '1', '1', 3),
(4, 'MARIANA', 'DIRCETKS', 'JHDKJSHFJS', 'FSDFSDFSDFDS', 'SDFSDFSD', '545754sd', 200),
(5, 'LIC. SHEILA RUBI FERNANDEZ RAMOS', 'COORDINADOR/A DE SERVICIO PROFESIONALES O PRÁCTICAS PROFESIONALES DE TU ESCUELA', 'UNIVERSIDAD AUTÓNOMA DEL ESTADO DE HIDALGO / INSTITUTO DE CIENCIAS BÁSICAS E INGENIERÍA', 'DIANA IVETH CRUZ GARCIA', 'LICENCIATURA EN CIENCIAS COMPUTACIONALES', '24757', 480);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aceptacion`
--
ALTER TABLE `aceptacion`
  ADD PRIMARY KEY (`Id_ss`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aceptacion`
--
ALTER TABLE `aceptacion`
  MODIFY `Id_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
