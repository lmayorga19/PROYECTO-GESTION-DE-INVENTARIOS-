-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-03-2022 a las 05:24:21
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `johanstyle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombresClientes` varchar(60) NOT NULL,
  `apellidosClientes` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `correo` varchar(90) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombresClientes`, `apellidosClientes`, `direccion`, `correo`, `telefono`, `documento`, `tipoDocumento`) VALUES
(1234, 'Leslie ', 'Rosa ss', 'calle 12 N50 ', 'leslie19@gmail.com', '3023559460', '1030701152', 'cedula'),
(4567, 'Brian ', 'Morales', 'calle 45b#75-45', 'brianmorales@gmail.com', '3187965845', '1075896745', 'cedula'),
(7412, 'Lady Marcela', 'Morce ', 'calle75#80-95', 'lady04@gmail.com', '3157965400', '1000012938', 'cedula'),
(8521, 'Reina', 'Marces', 'calle5a#75-78', 'reina1201@gmail.com', '3208945645', '1030700152', 'cedula'),
(8912, 'Katia', 'Trucazo', 'calle 75a#75-85', 'tracazo12@gmail.com', '3147556477', '1075987456', 'cedula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `idEntrada` int(11) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `precioTotal` double NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`idEntrada`, `fechaEntrada`, `cantidad`, `precio`, `precioTotal`, `idProveedor`, `idProducto`) VALUES
(1, '2021-08-02', 3, 33.9, 101.7, 8521, 12),
(3, '2021-08-17', 4, 180, 720, 123, 14),
(4, '2021-08-24', 2, 35, 70, 7413, 15),
(5, '2021-08-31', 3, 23, 69, 8912, 16),
(11, '2022-02-11', 2, 3, 2, 123, 12),
(46, '2022-02-11', 234, 324, 324, 7413, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciarsesion`
--

CREATE TABLE `iniciarsesion` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(11) NOT NULL,
  `correo` varchar(11) NOT NULL,
  `clave` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `iniciarsesion`
--

INSERT INTO `iniciarsesion` (`idUsuario`, `usuario`, `correo`, `clave`) VALUES
(1, 'paula20', 'paula20@gma', '0123'),
(2, 'leslie99', 'leslie99@gm', '4567'),
(3, 'maicol24', 'maicol24@gm', '7412'),
(4, 'jhonny75', 'jhonny75@gm', '8520'),
(5, 'laura15', 'laura15@gma', '0012');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(60) NOT NULL,
  `existencia` varchar(60) NOT NULL,
  `marca` varchar(60) NOT NULL,
  `precio` double NOT NULL,
  `ultimoCosto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `existencia`, `marca`, `precio`, `ultimoCosto`) VALUES
(12, 'shampoo', '30', 'marcel france', 33.9, 25),
(13, 'acondicionador', '10', 'marcel france', 23.9, 25),
(14, 'keratina', '10', 'marcel france', 180, 200),
(15, 'aceite de argan', '5', 'marcel france', 35, 40),
(16, 'Gel Brillo ', '5', ' marcel france', 23, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(90) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `tipoDocumento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombres`, `apellidos`, `telefono`, `correo`, `documento`, `tipoDocumento`) VALUES
(123, 'Marcossadsadasd', 'Gomez', '3023756498', 'marcos12@gmail.com', '26700987', 'cedula'),
(4567, 'Laurassssss', 'Moreno', '3185555845', 'laura45@gmail.com', '1072296745', 'cedula'),
(7413, 'Michel', 'Quiroga', '3170705645', 'quiroga35@gmail.com', '1040701152', 'cedula'),
(8521, 'Jhon', 'Peña', '3257965400', 'jhonpeña@gmail.com', '1000013938', 'cedula'),
(8912, 'Paulasss', 'Lasso', '3147856477', 'paula75@gmail.com', '1021219001', 'T.I'),
(8917, 'dsad', 'sadsad', '2312321', 'dasd', '23213', 'xx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `idSalida` int(11) NOT NULL,
  `fechaSalida` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `precioTotal` double NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`idSalida`, `fechaSalida`, `cantidad`, `precio`, `precioTotal`, `idCliente`, `idProducto`) VALUES
(25, '2021-08-20', 2, 35, 70, 1234, 15),
(123, '2021-08-05', 3, 33.9, 101.7, 4567, 12),
(2598, '2021-08-27', 2, 23, 46, 8521, 16),
(4567, '2021-08-06', 4, 23.9, 95.6, 8912, 13),
(8912, '2021-08-13', 5, 180, 900, 7412, 14),
(8915, '2022-02-12', 2, 4000, 20000, 1234, 16),
(8916, '2022-03-02', 2, 22, 213, 4567, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`idEntrada`),
  ADD KEY `idProveedor` (`idProveedor`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `iniciarsesion`
--
ALTER TABLE `iniciarsesion`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`idSalida`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idProducto` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8923;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `idEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `iniciarsesion`
--
ALTER TABLE `iniciarsesion`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8919;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `idSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8918;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`),
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `salida_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
