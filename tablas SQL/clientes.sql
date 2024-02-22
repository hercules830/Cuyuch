-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2024 a las 19:38:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t1_enero`
--

CREATE TABLE `t1_enero` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t1_enero`
--

INSERT INTO `t1_enero` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t2_febrero`
--

CREATE TABLE `t2_febrero` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t2_febrero`
--

INSERT INTO `t2_febrero` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t3_marzo`
--

CREATE TABLE `t3_marzo` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t3_marzo`
--

INSERT INTO `t3_marzo` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '800', 'HNL 1,200.00', '', '', '', '#5', '', '0000-00-00', '', '', 'Dulce Gómez'),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t4_abril`
--

CREATE TABLE `t4_abril` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t4_abril`
--

INSERT INTO `t4_abril` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t5_mayo`
--

CREATE TABLE `t5_mayo` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t5_mayo`
--

INSERT INTO `t5_mayo` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '800', 'HNL 1,200.00', '', '', '', '#5', '', '0000-00-00', '', '', 'Dulce Gómez'),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '800', 'HNL 1,200.00', '', '', '', '#5', '', '0000-00-00', '', '', 'Dulce Gómez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t6_junio`
--

CREATE TABLE `t6_junio` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t6_junio`
--

INSERT INTO `t6_junio` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t7_julio`
--

CREATE TABLE `t7_julio` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t7_julio`
--

INSERT INTO `t7_julio` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t8_agosto`
--

CREATE TABLE `t8_agosto` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t8_agosto`
--

INSERT INTO `t8_agosto` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t9_septiembre`
--

CREATE TABLE `t9_septiembre` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t9_septiembre`
--

INSERT INTO `t9_septiembre` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t10_octubre`
--

CREATE TABLE `t10_octubre` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t10_octubre`
--

INSERT INTO `t10_octubre` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t11_noviembre`
--

CREATE TABLE `t11_noviembre` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t11_noviembre`
--

INSERT INTO `t11_noviembre` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t12_diciembre`
--

CREATE TABLE `t12_diciembre` (
  `Id` int(11) NOT NULL,
  `Estado` varchar(255) DEFAULT NULL,
  `Año` int(11) DEFAULT NULL,
  `Programa` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Responsable` varchar(255) DEFAULT NULL,
  `Instituto` varchar(255) DEFAULT NULL,
  `Cédula` varchar(20) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Celular1` varchar(20) DEFAULT NULL,
  `Celular2` varchar(20) DEFAULT NULL,
  `Ingreso` date DEFAULT NULL,
  `Horario` varchar(255) DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL,
  `Matrícula` varchar(255) DEFAULT NULL,
  `Mensualidad` varchar(255) DEFAULT NULL,
  `Factura` varchar(255) DEFAULT NULL,
  `Promo` varchar(255) DEFAULT NULL,
  `Descuento` varchar(255) DEFAULT NULL,
  `Grupo` varchar(255) DEFAULT NULL,
  `Membresía` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL,
  `Cupón` varchar(255) DEFAULT NULL,
  `Agente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t12_diciembre`
--

INSERT INTO `t12_diciembre` (`Id`, `Estado`, `Año`, `Programa`, `Nombre`, `Responsable`, `Instituto`, `Cédula`, `Nacimiento`, `Dirección`, `Email`, `Celular1`, `Celular2`, `Ingreso`, `Horario`, `Entrada`, `Salida`, `Matrícula`, `Mensualidad`, `Factura`, `Promo`, `Descuento`, `Grupo`, `Membresía`, `Fecha`, `Ticket`, `Cupón`, `Agente`) VALUES
(1, 'Activo', 2020, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(2, 'Activo', 2021, 'Ballet', 'Michael Cuyuch', 'Heydi', 'La salle', '0501-1986-09676', '1986-05-02', '0 Calle Peatonal', 'vegachild3@yahoo.com', '252525', '262626', '2021-03-15', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(3, 'Activo', 2019, 'Ballet', 'Brayan Josue Henriquez Espinoza', 'Andrea', 'La salle', '0501-1995-09686', '1995-07-11', '0 Calle Peatonal', 'musicabjhe831@gmail.com', '52525', '252525', '2020-05-12', 'Lun-Mier-Vie', '10:00:00', '11:00:00', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t1_enero`
--
ALTER TABLE `t1_enero`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t2_febrero`
--
ALTER TABLE `t2_febrero`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t3_marzo`
--
ALTER TABLE `t3_marzo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t4_abril`
--
ALTER TABLE `t4_abril`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t5_mayo`
--
ALTER TABLE `t5_mayo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t6_junio`
--
ALTER TABLE `t6_junio`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t7_julio`
--
ALTER TABLE `t7_julio`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t8_agosto`
--
ALTER TABLE `t8_agosto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t9_septiembre`
--
ALTER TABLE `t9_septiembre`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t10_octubre`
--
ALTER TABLE `t10_octubre`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t11_noviembre`
--
ALTER TABLE `t11_noviembre`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `t12_diciembre`
--
ALTER TABLE `t12_diciembre`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t1_enero`
--
ALTER TABLE `t1_enero`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t2_febrero`
--
ALTER TABLE `t2_febrero`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t3_marzo`
--
ALTER TABLE `t3_marzo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t4_abril`
--
ALTER TABLE `t4_abril`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t5_mayo`
--
ALTER TABLE `t5_mayo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t6_junio`
--
ALTER TABLE `t6_junio`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t7_julio`
--
ALTER TABLE `t7_julio`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t8_agosto`
--
ALTER TABLE `t8_agosto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t9_septiembre`
--
ALTER TABLE `t9_septiembre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t10_octubre`
--
ALTER TABLE `t10_octubre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t11_noviembre`
--
ALTER TABLE `t11_noviembre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t12_diciembre`
--
ALTER TABLE `t12_diciembre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
