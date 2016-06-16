-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2016 a las 16:49:22
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `viveros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Id_tipocliente` int(11) NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `RFC` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono1` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono2` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Fax` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Web` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `Id_contacto` int(11) NOT NULL,
  `Id_cliente` int(11) NOT NULL,
  `Id_tipocontacto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(10) NOT NULL,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Puesto` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono1` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Extension1` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono2` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Extension2` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `Celular` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Fec_Nac` date NOT NULL,
  `Facebook` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Twitter` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Skype` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_contacto`),
  KEY `Id_contacto` (`Id_contacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE IF NOT EXISTS `direcciones` (
  `Id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `Id_cliente` int(11) NOT NULL,
  `Id_tipodireccion` int(11) NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  `Calle` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Colonia` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Ciudad` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Municipio` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `CP` int(11) NOT NULL,
  `Nota` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinasclientes`
--

CREATE TABLE IF NOT EXISTS `maquinasclientes` (
  `Id_MaquinaC` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` int(11) NOT NULL,
  `Descripcion` int(11) NOT NULL,
  `c1` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `c2` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `c3` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `c4` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `c5` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`Id_MaquinaC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_tipousuario`
--

CREATE TABLE IF NOT EXISTS `permisos_tipousuario` (
  `Id_tipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_perfil` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `mnuCatalogos` bit(1) DEFAULT NULL,
  `mnuCatalogoClientes` bit(1) DEFAULT NULL,
  `frmClientes_A` bit(1) DEFAULT NULL,
  `frmClientes_B` bit(1) DEFAULT NULL,
  `frmClientes_C` bit(1) DEFAULT NULL,
  `mnuCatalogoContactos` bit(1) DEFAULT NULL,
  `frmContactos_A` bit(1) DEFAULT NULL,
  `frmContactos_B` bit(1) DEFAULT NULL,
  `frmContactos_C` bit(1) DEFAULT NULL,
  `mnuCatalogoDirecciones` bit(1) DEFAULT NULL,
  `frmDirecciones_A` bit(1) DEFAULT NULL,
  `frmDirecciones_B` bit(1) DEFAULT NULL,
  `frmDirecciones_C` bit(1) DEFAULT NULL,
  `mnuCatalogoMaquinasCliente` bit(1) DEFAULT NULL,
  `frmMaquinasCliente_A` bit(1) DEFAULT NULL,
  `frmMaquinasCliente_B` bit(1) DEFAULT NULL,
  `frmMaquinasCliente_C` bit(1) DEFAULT NULL,
  `mnuCatalogoProcesos` bit(1) DEFAULT NULL,
  `frmProcesos_A` bit(1) DEFAULT NULL,
  `frmProcesos_B` bit(1) DEFAULT NULL,
  `frmProcesos_C` bit(1) DEFAULT NULL,
  `mnuCatalogoArticulos` bit(1) DEFAULT NULL,
  `frmArticulos_A` bit(1) DEFAULT NULL,
  `frmArticulos_B` bit(1) DEFAULT NULL,
  `frmArticulos_C` bit(1) DEFAULT NULL,
  `mnuCatalogoUsuarios` bit(1) DEFAULT NULL,
  `frmUsuarios_A` bit(1) DEFAULT NULL,
  `frmUsuarios_B` bit(1) DEFAULT NULL,
  `frmUsuarios_C` bit(1) DEFAULT NULL,
  `mnuPlaneacion` bit(1) DEFAULT NULL,
  `frmPlaneacion_C` bit(1) DEFAULT NULL,
  `mnuOrdenes` bit(1) DEFAULT NULL,
  `frmOrdenes_A` bit(1) DEFAULT NULL,
  `frmOrdenes_B` bit(1) DEFAULT NULL,
  `frmOrdenes_C` bit(1) DEFAULT NULL,
  `mnuProduccion` bit(1) DEFAULT NULL,
  `mnuDiseno` bit(1) DEFAULT NULL,
  `mnuCorte` bit(1) DEFAULT NULL,
  `mnuDoblado` bit(1) DEFAULT NULL,
  `mnuArmado` bit(1) DEFAULT NULL,
  `mnuAhulado` bit(1) DEFAULT NULL,
  `mnuRouter` bit(1) DEFAULT NULL,
  `mnuEntregas` bit(1) DEFAULT NULL,
  `mnuMonitor` bit(1) DEFAULT NULL,
  PRIMARY KEY (`Id_tipousuario`),
  KEY `Id_tipousuario` (`Id_tipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `permisos_tipousuario`
--

INSERT INTO `permisos_tipousuario` (`Id_tipousuario`, `Nombre_perfil`, `mnuCatalogos`, `mnuCatalogoClientes`, `frmClientes_A`, `frmClientes_B`, `frmClientes_C`, `mnuCatalogoContactos`, `frmContactos_A`, `frmContactos_B`, `frmContactos_C`, `mnuCatalogoDirecciones`, `frmDirecciones_A`, `frmDirecciones_B`, `frmDirecciones_C`, `mnuCatalogoMaquinasCliente`, `frmMaquinasCliente_A`, `frmMaquinasCliente_B`, `frmMaquinasCliente_C`, `mnuCatalogoProcesos`, `frmProcesos_A`, `frmProcesos_B`, `frmProcesos_C`, `mnuCatalogoArticulos`, `frmArticulos_A`, `frmArticulos_B`, `frmArticulos_C`, `mnuCatalogoUsuarios`, `frmUsuarios_A`, `frmUsuarios_B`, `frmUsuarios_C`, `mnuPlaneacion`, `frmPlaneacion_C`, `mnuOrdenes`, `frmOrdenes_A`, `frmOrdenes_B`, `frmOrdenes_C`, `mnuProduccion`, `mnuDiseno`, `mnuCorte`, `mnuDoblado`, `mnuArmado`, `mnuAhulado`, `mnuRouter`, `mnuEntregas`, `mnuMonitor`) VALUES
(10, 'Administrador', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1'),
(11, 'Planeador', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'0', b'0', b'0', b'0', b'1', b'1', b'1', b'1', b'1', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1'),
(12, 'Supervisor', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1', b'1'),
(13, 'Diseño', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'1'),
(14, 'Corte', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'1'),
(15, 'Doblado', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'1'),
(16, 'Router', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'1'),
(17, 'Armado', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1'),
(18, 'Ahulado', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'1'),
(19, 'Entrega', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'1', b'1'),
(20, 'Recepcion', b'1', b'1', b'1', b'0', b'1', b'1', b'1', b'0', b'1', b'1', b'1', b'0', b'1', b'1', b'1', b'0', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1'),
(22, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_clientes`
--

CREATE TABLE IF NOT EXISTS `tipos_clientes` (
  `Id_tipocliente` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`Id_tipocliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_contactos`
--

CREATE TABLE IF NOT EXISTS `tipos_contactos` (
  `Id_tipocontacto` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`Id_tipocontacto`),
  UNIQUE KEY `Id_tipocontacto` (`Id_tipocontacto`),
  KEY `Id_tipocontacto_2` (`Id_tipocontacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tipos_contactos`
--

INSERT INTO `tipos_contactos` (`Id_tipocontacto`, `Descripcion`, `Id_estatus`) VALUES
(10, 'COMERCIAL', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_direccion`
--

CREATE TABLE IF NOT EXISTS `tipos_direccion` (
  `Id_tipodireccion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`Id_tipodireccion`),
  UNIQUE KEY `Id_tipodireccion` (`Id_tipodireccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tipos_direccion`
--

INSERT INTO `tipos_direccion` (`Id_tipodireccion`, `Descripcion`, `Id_estatus`) VALUES
(10, 'COMERCIAL', 0),
(11, 'FISCAL', 0),
(12, 'ENTREGA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_estatus`
--

CREATE TABLE IF NOT EXISTS `tipos_estatus` (
  `Id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_estatus`),
  UNIQUE KEY `Id_Estatus` (`Id_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_estatus`
--

INSERT INTO `tipos_estatus` (`Id_estatus`, `Descripcion`) VALUES
(10, 'ACTIVO'),
(20, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

CREATE TABLE IF NOT EXISTS `tipos_usuarios` (
  `Id_tipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_tipousuario`),
  KEY `Id_tipousuario` (`Id_tipousuario`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`Id_tipousuario`, `Descripcion`) VALUES
(10, 'Administrador'),
(11, 'Planeador'),
(12, 'Supervisor'),
(13, 'Diseño'),
(14, 'Corte'),
(15, 'Doblado'),
(16, 'Router'),
(17, 'Armado'),
(18, 'Ahulado'),
(19, 'Entrega'),
(20, 'Recepcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Usuario` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Password` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Id_tipousuario` int(11) NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`Id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Descripcion`, `Usuario`, `Password`, `Id_tipousuario`, `Id_estatus`) VALUES
(10, 'Administrador', 'admin', '654321', 10, 1),
(11, 'Planeador', 'planeador', '123456', 11, 1),
(12, 'Supervisor', 'supervisor', '123456', 12, 1),
(13, 'Isabel', 'isabel', '123456', 13, 1),
(14, 'Elena', 'elena', '123456', 13, 1),
(15, 'Edgar', 'edgar', '123456', 13, 1),
(16, 'Yaneli', 'yaneli', '123456', 13, 1),
(17, 'Manuel', 'manuel', '123456', 13, 1),
(18, 'Cortador1', 'cortador1', '123456', 14, 1),
(19, 'Cortador2', 'cortador2', '123456', 14, 1),
(20, 'Doblador1', 'doblador1', '145236', 0, 0),
(21, 'Doblador2', 'doblador2', '123456', 15, 1),
(22, 'Doblador3', 'doblador3', '123456', 15, 1),
(23, 'Doblador4', 'doblador4', '123456', 15, 1),
(24, 'Doblador5', 'doblador5', '123456', 15, 1),
(25, 'Doblador6', 'doblador6', '123456', 15, 1),
(26, 'Router1', 'router1', '123456', 16, 1),
(27, 'Router2', 'router2', '123456', 16, 1),
(28, 'Armador1', 'armador1', '123456', 17, 1),
(29, 'Armador2', 'armador2', '123456', 17, 1),
(30, 'Armador3', 'armador3', '123456', 17, 1),
(31, 'Ahulador1', 'ahulador1', '123456', 18, 1),
(32, 'Ahulador2', 'ahulador2', '123456', 18, 1),
(33, 'Entregas', 'entregas', '456789', 19, 1),
(34, 'Secretaria1', 'secre1', '123456', 20, 1),
(35, 'Secretaria2', 'secre2', '123456', 20, 1),
(36, 'David', 'david', '123456', 13, 1),
(37, 'Roberto', 'roberto', '123456', 13, 1),
(38, 'Miguel', 'miguel', '123456', 13, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  ADD CONSTRAINT `Perfiles` FOREIGN KEY (`Id_tipousuario`) REFERENCES `permisos_tipousuario` (`Id_tipousuario`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
