-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2024 a las 04:32:41
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
-- Base de datos: `inventario_escolar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `id_activo` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipo_activo` varchar(255) DEFAULT NULL,
  `marca_modelo` varchar(255) DEFAULT NULL,
  `numero_serie` varchar(255) DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `costo_adquisicion` decimal(10,2) DEFAULT NULL,
  `estado_actual` varchar(255) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `activos`
--

INSERT INTO `activos` (`id_activo`, `descripcion`, `tipo_activo`, `marca_modelo`, `numero_serie`, `fecha_adquisicion`, `costo_adquisicion`, `estado_actual`, `id_ubicacion`, `id_persona`) VALUES
(1, 'Laptop HP', 'Equipo electrónico', 'HP Pavilion', 'ABC123', '2022-01-01', 800.00, 'Nuevo', 1, 1),
(2, 'Proyector Epson', 'Equipo electrónico', 'Epson PowerLite', 'DEF456', '2022-02-15', 1200.00, 'Nuevo', 2, 2),
(3, 'Mesa de conferencia', 'Mobiliario', 'IKEA Table', '', '2021-10-20', 300.00, 'Usado', 3, 3),
(4, 'Silla de oficina', 'Mobiliario', 'Office Chair', '', '2022-03-10', 150.00, 'Usado', 1, 4),
(5, 'Teléfono IP', 'Equipo electrónico', 'Cisco IP Phone', 'GHI789', '2021-12-05', 200.00, 'Reparación', 2, 5),
(6, 'Impresora multifuncional', 'Equipo electrónico', 'HP OfficeJet', 'JKL012', '2021-09-30', 400.00, 'Usado', 3, 6),
(7, 'Pizarra blanca', 'Material didáctico', 'Standard Whiteboard', '', '2022-04-25', 50.00, 'Nuevo', 1, 7),
(8, 'Balón de baloncesto', 'Equipo deportivo', 'Wilson Basketball', 'MNO345', '2021-11-20', 30.00, 'Usado', 2, 8),
(9, 'Escritorio de oficina', 'Mobiliario', 'Office Desk', '', '2022-02-28', 200.00, 'Nuevo', 3, 9),
(10, 'Calculadora científica', 'Material didáctico', 'Casio Scientific Calculator', 'PQR678', '2022-03-15', 20.00, 'Nuevo', 1, 10),
(11, 'Micrófono', 'Equipo electrónico', 'Shure Microphone', 'STU901', '2021-08-10', 100.00, 'Reparación', 2, 11),
(12, 'Banco para laboratorio', 'Mobiliario', 'Lab Bench', '', '2021-07-20', 150.00, 'Usado', 3, 12),
(13, 'Teclado USB', 'Equipo electrónico', 'Logitech Keyboard', 'VWX234', '2022-01-30', 30.00, 'Nuevo', 1, 13),
(14, 'Silla plegable', 'Mobiliario', 'Folding Chair', '', '2021-06-15', 10.00, 'Usado', 2, 14),
(15, 'Bata de laboratorio', 'Material didáctico', 'Lab Coat', 'YZA567', '2021-10-01', 25.00, 'Reparación', 3, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre_completo`, `cargo`, `departamento`) VALUES
(1, 'María García', 'Docente', 'Matemáticas'),
(2, 'Juan Pérez', 'Administrativo', 'Secretaría'),
(3, 'Pedro López', 'Mantenimiento', 'Mantenimiento'),
(4, 'Ana Rodríguez', 'Docente', 'Ciencias'),
(5, 'Luisa Martínez', 'Administrativo', 'Dirección'),
(6, 'Javier Gómez', 'Mantenimiento', 'Mantenimiento'),
(7, 'Carmen Sánchez', 'Docente', 'Historia'),
(8, 'Manuel Vargas', 'Administrativo', 'Secretaría'),
(9, 'Laura Torres', 'Mantenimiento', 'Mantenimiento'),
(10, 'Daniel Ruiz', 'Docente', 'Matemáticas'),
(11, 'Sofía Pérez', 'Administrativo', 'Dirección'),
(12, 'Carlos Núñez', 'Mantenimiento', 'Mantenimiento'),
(13, 'Patricia Flores', 'Docente', 'Ciencias'),
(14, 'Ricardo González', 'Administrativo', 'Secretaría'),
(15, 'Elena Martínez', 'Mantenimiento', 'Mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id_ubicacion` int(11) NOT NULL,
  `descripcion_ubicacion` varchar(255) DEFAULT NULL,
  `edificio` varchar(255) DEFAULT NULL,
  `piso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id_ubicacion`, `descripcion_ubicacion`, `edificio`, `piso`) VALUES
(1, 'Salón 101', 'Edificio A', '1'),
(2, 'Salón 202', 'Edificio A', '2'),
(3, 'Salón 301', 'Edificio A', '3'),
(4, 'Oficina de Dirección', 'Edificio Principal', '2'),
(5, 'Sala de Profesores', 'Edificio Principal', '1'),
(6, 'Biblioteca', 'Edificio Principal', '2'),
(7, 'Laboratorio de Ciencias', 'Edificio B', '1'),
(8, 'Gimnasio', 'Edificio C', ''),
(9, 'Patio de Recreo', 'Área Deportiva', ''),
(10, 'Cafetería', 'Edificio Principal', '1'),
(11, 'Baños', 'Edificio Principal', '1'),
(12, 'Sala de Computación', 'Edificio B', '2'),
(13, 'Cancha de Baloncesto', 'Área Deportiva', ''),
(14, 'Estacionamiento', 'Área de Estacionamiento', ''),
(15, 'Laboratorio de Química', 'Edificio B', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`id_activo`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `id_activo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
