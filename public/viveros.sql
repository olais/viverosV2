-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2016 a las 05:55:59
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
  `Id_contacto` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

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
  `Id_MaquinaC` int(11) NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `Descripcion` int(11) NOT NULL,
  `c1` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `c2` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `c3` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `c4` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `c5` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_tipousuario`
--

CREATE TABLE IF NOT EXISTS `permisos_tipousuario` (
  `Id_tipousuario` int(11) NOT NULL,
  `Nombre_perfil` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `mnuCatalogos` bit(1) NOT NULL,
  `mnuCatalogoclientes` bit(1) NOT NULL,
  `mnuArticulos` bit(1) NOT NULL,
  `mnuMaquinascliente` bit(1) NOT NULL,
  `mnuOrdenes` bit(1) NOT NULL,
  `mnuPlaneacion` bit(1) NOT NULL,
  `mnuProduccion` bit(1) NOT NULL,
  `mnuDiseno` bit(1) NOT NULL,
  `mnuCorte` bit(1) NOT NULL,
  `mnuDoblado` bit(1) NOT NULL,
  `mnuArmado` bit(1) NOT NULL,
  `mnuAhulado` bit(1) NOT NULL,
  `mnuRouter` bit(1) NOT NULL,
  `mnuEntregas` bit(1) NOT NULL,
  `mnuUsuarios` bit(1) NOT NULL,
  `mnuMonitor` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_clientes`
--

CREATE TABLE IF NOT EXISTS `tipos_clientes` (
  `Id_tipocliente` int(11) NOT NULL,
  `Descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_contactos`
--

CREATE TABLE IF NOT EXISTS `tipos_contactos` (
  `Id_tipocontacto` int(11) NOT NULL,
  `Descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  UNIQUE KEY `Id_tipocontacto` (`Id_tipocontacto`),
  KEY `Id_tipocontacto_2` (`Id_tipocontacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
  `Id_tipodireccion` int(11) NOT NULL,
  `Descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`Id_tipodireccion`),
  UNIQUE KEY `Id_tipodireccion` (`Id_tipodireccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=21 ;

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
  `Id_tipousuario` int(11) NOT NULL,
  `Descripcion` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Usuario` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Password` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Id_tipousuario` int(11) NOT NULL,
  `Id_estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
