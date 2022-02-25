-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-02-2022 a las 18:32:50
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulos`
--

CREATE TABLE `Articulos` (
  `id_articulos` int(11) NOT NULL,
  `nombre_articulo` varchar(45) NOT NULL,
  `stock_articulo` int(11) NOT NULL,
  `precio_articulo` int(11) NOT NULL,
  `Procedencias_id_procedencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Articulos`
--

INSERT INTO `Articulos` (`id_articulos`, `nombre_articulo`, `stock_articulo`, `precio_articulo`, `Procedencias_id_procedencia`) VALUES
(7, 'champions Nike Negro 41 Cab', 10, 150000, 1),
(9, 'Champions Nike 36 Dam', 4, 130000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ciudad`
--

CREATE TABLE `Ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Ciudad`
--

INSERT INTO `Ciudad` (`id_ciudad`, `nombre_ciudad`) VALUES
(1, 'zzaccctyr'),
(2, 'caacupe'),
(5, 'atyra'),
(7, 'Gotham City\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_cliente` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ruc_cliente` int(15) NOT NULL,
  `telefono_cliente` int(17) NOT NULL,
  `direccion_cliente` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Ciudad_id_ciudad` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `ruc_cliente`, `telefono_cliente`, `direccion_cliente`, `Ciudad_id_ciudad`, `estado`) VALUES
(15, 'Cliente Frecuente', '-', 0, 0, ' 000000', 5, 1),
(16, 'Bruno ', 'Diaz', 42423, 86754322, 'Mansion Wayne', 7, 1),
(17, 'juan', 'perez', 12211, 54645, ' dfgdf', 5, 1),
(18, 'jesus', 'paez', 1111, 1111, ' dsfsdfdfssdf', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Procedencias`
--

CREATE TABLE `Procedencias` (
  `id_procedencia` int(11) NOT NULL,
  `nombre_procedencia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Procedencias`
--

INSERT INTO `Procedencias` (`id_procedencia`, `nombre_procedencia`) VALUES
(1, 'otro pais'),
(8, 'Nacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedores`
--

CREATE TABLE `Proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ruc_proveedor` text NOT NULL,
  `telefono_proveedor` int(11) NOT NULL,
  `direccion_proveedor` text NOT NULL,
  `Ciudad_id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Proveedores`
--

INSERT INTO `Proveedores` (`id_proveedor`, `nombre_proveedor`, `ruc_proveedor`, `telefono_proveedor`, `direccion_proveedor`, `Ciudad_id_ciudad`) VALUES
(7, 'Nike_PY', '44543232', 4335, 'Francisco Fernandez de la Cruz', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoCompras`
--

CREATE TABLE `tipoCompras` (
  `id_tipoCompra` int(11) NOT NULL,
  `descripcion_tipoCompra` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoCompras`
--

INSERT INTO `tipoCompras` (`id_tipoCompra`, `descripcion_tipoCompra`) VALUES
(6, 'Contado'),
(7, 'Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoPagos`
--

CREATE TABLE `tipoPagos` (
  `id_tipoPago` int(11) NOT NULL,
  `descripcion_tipoPago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoPagos`
--

INSERT INTO `tipoPagos` (`id_tipoPago`, `descripcion_tipoPago`) VALUES
(5, 'Efectivo'),
(6, 'Tarjeta'),
(7, 'moneda'),
(8, 'bit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vendedores`
--

CREATE TABLE `Vendedores` (
  `id_vendedor` int(11) NOT NULL,
  `nombre_vendedor` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_vendedor` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `documento_vendedor` text NOT NULL,
  `telefono_vendedor` int(17) NOT NULL,
  `direccion_vendedor` text NOT NULL,
  `Ciudad_id_ciudad` int(11) NOT NULL,
  `clave` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Vendedores`
--

INSERT INTO `Vendedores` (`id_vendedor`, `nombre_vendedor`, `apellido_vendedor`, `documento_vendedor`, `telefono_vendedor`, `direccion_vendedor`, `Ciudad_id_ciudad`, `clave`, `estado`) VALUES
(1, 'admin', 'as', '23423EDED', 324234, 'QWEQEQW', 1, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VentaDetalles`
--

CREATE TABLE `VentaDetalles` (
  `id_VentaDetalle` int(11) NOT NULL,
  `cantidadVendida` int(11) DEFAULT NULL,
  `ventasCabeceras_id_ventaCabeceras` int(11) NOT NULL,
  `articulos_id_articulos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `VentaDetalles`
--

INSERT INTO `VentaDetalles` (`id_VentaDetalle`, `cantidadVendida`, `ventasCabeceras_id_ventaCabeceras`, `articulos_id_articulos`) VALUES
(59, 1, 78, 9),
(60, 2, 79, 9),
(61, 2, 80, 9),
(62, 1, 81, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VentasCabeceras`
--

CREATE TABLE `VentasCabeceras` (
  `id_ventaCabeceras` int(11) NOT NULL,
  `fecha_ventaCabeceras` datetime NOT NULL DEFAULT current_timestamp(),
  `codigoTransaccion` text NOT NULL,
  `Vendedores_id_vendedor` int(11) NOT NULL,
  `tipoPagos_id_tipoPago` int(11) NOT NULL,
  `tipoCompras_id_tipoCompra` int(11) NOT NULL,
  `Clientes_id_cliente` int(11) NOT NULL,
  `total` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `VentasCabeceras`
--

INSERT INTO `VentasCabeceras` (`id_ventaCabeceras`, `fecha_ventaCabeceras`, `codigoTransaccion`, `Vendedores_id_vendedor`, `tipoPagos_id_tipoPago`, `tipoCompras_id_tipoCompra`, `Clientes_id_cliente`, `total`) VALUES
(78, '2021-11-09 13:14:59', '1', 1, 5, 6, 16, 130000),
(79, '2021-11-09 20:01:54', '2', 1, 5, 6, 16, 260000),
(80, '2021-11-09 20:27:37', '3', 1, 5, 6, 16, 260000),
(81, '2022-02-24 15:37:14', '4', 1, 5, 6, 16, 130000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ventatemp`
--

CREATE TABLE `Ventatemp` (
  `id_ventatemp` int(11) NOT NULL,
  `nombre_ventatemp` varchar(40) NOT NULL,
  `cantidad_ventatemp` int(11) NOT NULL,
  `precio_ventatemp` int(11) NOT NULL,
  `total_ventatemp` int(11) NOT NULL,
  `Vendedores_id_vendedor` int(11) NOT NULL,
  `Articulo_id_articulos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Ventatemp`
--

INSERT INTO `Ventatemp` (`id_ventatemp`, `nombre_ventatemp`, `cantidad_ventatemp`, `precio_ventatemp`, `total_ventatemp`, `Vendedores_id_vendedor`, `Articulo_id_articulos`) VALUES
(139, 'Champions Nike 36 Dam', 1, 130000, 130000, 1, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Articulos`
--
ALTER TABLE `Articulos`
  ADD PRIMARY KEY (`id_articulos`),
  ADD KEY `Procedencias_id_procedencia` (`Procedencias_id_procedencia`);

--
-- Indices de la tabla `Ciudad`
--
ALTER TABLE `Ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `Ciudad_id_ciudad` (`Ciudad_id_ciudad`);

--
-- Indices de la tabla `Procedencias`
--
ALTER TABLE `Procedencias`
  ADD PRIMARY KEY (`id_procedencia`);

--
-- Indices de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `Ciudad_id_ciudad` (`Ciudad_id_ciudad`);

--
-- Indices de la tabla `tipoCompras`
--
ALTER TABLE `tipoCompras`
  ADD PRIMARY KEY (`id_tipoCompra`);

--
-- Indices de la tabla `tipoPagos`
--
ALTER TABLE `tipoPagos`
  ADD PRIMARY KEY (`id_tipoPago`);

--
-- Indices de la tabla `Vendedores`
--
ALTER TABLE `Vendedores`
  ADD PRIMARY KEY (`id_vendedor`),
  ADD KEY `Ciudad_id_ciudad` (`Ciudad_id_ciudad`);

--
-- Indices de la tabla `VentaDetalles`
--
ALTER TABLE `VentaDetalles`
  ADD PRIMARY KEY (`id_VentaDetalle`),
  ADD KEY `fk_VentaDetalles_ventasCabeceras1_idx` (`ventasCabeceras_id_ventaCabeceras`),
  ADD KEY `fk_VentaDetalles_articulos2_idx` (`articulos_id_articulos`);

--
-- Indices de la tabla `VentasCabeceras`
--
ALTER TABLE `VentasCabeceras`
  ADD PRIMARY KEY (`id_ventaCabeceras`),
  ADD KEY `Vendedores_id_vendedor` (`Vendedores_id_vendedor`),
  ADD KEY `tipoPagos_id_tipoPago` (`tipoPagos_id_tipoPago`),
  ADD KEY `tipoCompras_id_tipoCompra` (`tipoCompras_id_tipoCompra`);

--
-- Indices de la tabla `Ventatemp`
--
ALTER TABLE `Ventatemp`
  ADD PRIMARY KEY (`id_ventatemp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Articulos`
--
ALTER TABLE `Articulos`
  MODIFY `id_articulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `Ciudad`
--
ALTER TABLE `Ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `Procedencias`
--
ALTER TABLE `Procedencias`
  MODIFY `id_procedencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipoCompras`
--
ALTER TABLE `tipoCompras`
  MODIFY `id_tipoCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipoPagos`
--
ALTER TABLE `tipoPagos`
  MODIFY `id_tipoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Vendedores`
--
ALTER TABLE `Vendedores`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `VentaDetalles`
--
ALTER TABLE `VentaDetalles`
  MODIFY `id_VentaDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `VentasCabeceras`
--
ALTER TABLE `VentasCabeceras`
  MODIFY `id_ventaCabeceras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `Ventatemp`
--
ALTER TABLE `Ventatemp`
  MODIFY `id_ventatemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Articulos`
--
ALTER TABLE `Articulos`
  ADD CONSTRAINT `Articulos_ibfk_1` FOREIGN KEY (`Procedencias_id_procedencia`) REFERENCES `Procedencias` (`id_procedencia`);

--
-- Filtros para la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD CONSTRAINT `Clientes_ibfk_1` FOREIGN KEY (`Ciudad_id_ciudad`) REFERENCES `Ciudad` (`id_ciudad`);

--
-- Filtros para la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  ADD CONSTRAINT `Proveedores_ibfk_1` FOREIGN KEY (`Ciudad_id_ciudad`) REFERENCES `Ciudad` (`id_ciudad`);

--
-- Filtros para la tabla `Vendedores`
--
ALTER TABLE `Vendedores`
  ADD CONSTRAINT `Vendedores_ibfk_1` FOREIGN KEY (`Ciudad_id_ciudad`) REFERENCES `Ciudad` (`id_ciudad`);

--
-- Filtros para la tabla `VentaDetalles`
--
ALTER TABLE `VentaDetalles`
  ADD CONSTRAINT `fk_VentaDetalles_articulos2` FOREIGN KEY (`articulos_id_articulos`) REFERENCES `Articulos` (`id_articulos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_VentaDetalles_ventasCabeceras1` FOREIGN KEY (`ventasCabeceras_id_ventaCabeceras`) REFERENCES `VentasCabeceras` (`id_ventaCabeceras`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `VentasCabeceras`
--
ALTER TABLE `VentasCabeceras`
  ADD CONSTRAINT `VentasCabeceras_ibfk_1` FOREIGN KEY (`Vendedores_id_vendedor`) REFERENCES `Vendedores` (`id_vendedor`),
  ADD CONSTRAINT `VentasCabeceras_ibfk_2` FOREIGN KEY (`tipoPagos_id_tipoPago`) REFERENCES `tipoPagos` (`id_tipoPago`),
  ADD CONSTRAINT `VentasCabeceras_ibfk_3` FOREIGN KEY (`tipoCompras_id_tipoCompra`) REFERENCES `tipoCompras` (`id_tipoCompra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
