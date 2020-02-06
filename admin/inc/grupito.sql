-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2020 a las 18:29:06
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetallePedido` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,0) NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `introDescripcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `precioOferta` decimal(10,2) NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `introDescripcion`, `descripcion`, `imagen`, `precio`, `precioOferta`, `online`) VALUES
(1, 'Armario colgante con LED', 'Armario colgante con LED de 160 o 240 cm modelo Alamara', 'Este armario está diseñado para estar colocado debajo de la televisión, para guardar lo necesario e incluso decorar.', 'armario.jpg', '399.00', '179.00', 1),
(2, 'Cama Piccione', 'Cama Piccione con un diseño moderno.', 'Cama Piccione con un diseño moderno y acabado en polipiel, disponible en varios tamaños y dos colores.', 'cama.jpg', '799.00', '179.00', 1),
(3, 'URH Hotel Spa Zen Balagares', 'Corvera de Asturias: 1 o 2 noches en habitación doble para 2 personas con desayuno y spa en Hotel.', 'El Hotel URH Zen Balagares 4* se encuentra situado en el municipio de Corvera de Asturias, en el centro del Principado, al lado del embalse de Trasona y a unos 10 minutos de Avilés. Las playas de la costa asturiana se encuentran a unos 15 minutos.', 'spa.jpg', '278.00', '149.00', 1),
(4, 'Iphone 11', 'Este iPhone 11 cuenta con una multitud de funciones y está disponible en varios colores', 'Chip biónico A13 con motor neuronal de tercera generación\r\nPantalla Liquid Retina HD de 6.1 pulgadas con True Tone\r\nCámaras duales de 12MP (Ultra Wide, Wide) con modo vertical, modo nocturno, ajustes automáticos,', 'Iphone.jpg', '809.00', '769.00', 1),
(5, 'Mopa eléctrica con navegación.', 'Detecta los objetos cambiando de dirección.', 'Automática, limpia sola la suciedad\r\nElegante y compacta\r\nAdecuado para cualquier superficie\r\nGiratoria 360º, llegando a todos los rincones.\r\nDiámetro: 23 cm', 'roomba.jpg', '39.90', '9.99', 1),
(6, 'Sandwichera ergonómica', 'Sandwichera grill o corte triangular.', 'Sandwichera grill\r\nPotencia: 750W\r\nFunción grill\r\nSuperficie de recubrimiento antiadherente\r\nLuz indicadora\r\nMango con asa de seguridad\r\nAcabado ergonómico\r\nSandwichera corte triangular\r\nPotencia: 750W\r\nCapacidad: 2 sandwiches', 'sandwichera.jpg', '19.99', '7.99', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetallePedido`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
