-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2012 at 11:13 AM
-- Server version: 5.1.61
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `v0090686_agrouruguay`
--
CREATE DATABASE `v0090686_agrouruguay` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `v0090686_agrouruguay`;

-- --------------------------------------------------------

--
-- Table structure for table `foto_inmueble`
--

CREATE TABLE IF NOT EXISTS `foto_inmueble` (
  `finm_numero` int(11) NOT NULL,
  `inm_codigo` int(11) NOT NULL,
  `finm_title` varchar(150) NOT NULL,
  `finm_url` varchar(1000) NOT NULL,
  `finm_alt` varchar(80) NOT NULL,
  PRIMARY KEY (`finm_numero`),
  KEY `foto_inmueble_fk` (`inm_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_inmueble`
--

INSERT INTO `foto_inmueble` (`finm_numero`, `inm_codigo`, `finm_title`, `finm_url`, `finm_alt`) VALUES
(1, 1, 'Campo 84 has', '../imagenes/fotoinm/FotoInmueble1.JPG', 'Campo 84 has'),
(2, 2, 'Hotel Spa', '../imagenes/fotoinm/FotoInmueble2.jpg', 'Hotel Spa'),
(3, 3, 'Lotes Country', '../imagenes/fotoinm/FotoInmueble3.jpg', 'Lotes Country'),
(4, 4, 'Campo San Javier', '../imagenes/fotoinm/FotoInmueble4.jpg', '45 has.'),
(5, 5, 'Campo 45has.', '../imagenes/fotoinm/FotoInmueble5.jpg', 'Campo 45 has.'),
(6, 6, 'Chacra Soriano 38has.', '../imagenes/fotoinm/FotoInmueble6.jpg', 'Chacra Soriano 38has.'),
(7, 7, 'campo pedid', '../imagenes/fotoinm/FotoInmueble7.jpg', 'campo pedid');

-- --------------------------------------------------------

--
-- Table structure for table `foto_maquinaria`
--

CREATE TABLE IF NOT EXISTS `foto_maquinaria` (
  `fmaq_numero` int(11) NOT NULL,
  `maq_codigo` int(11) NOT NULL,
  `fmaq_title` varchar(150) NOT NULL,
  `fmaq_url` varchar(1000) NOT NULL,
  `fmaq_alt` varchar(80) NOT NULL,
  PRIMARY KEY (`fmaq_numero`),
  KEY `foto_maquina_fk` (`maq_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_maquinaria`
--

INSERT INTO `foto_maquinaria` (`fmaq_numero`, `maq_codigo`, `fmaq_title`, `fmaq_url`, `fmaq_alt`) VALUES
(6, 6, 'Tractor Ferguson1175', '../imagenes/fotomaq/FotoMaquinaria6.jpg', 'Tractor Ferguson1175'),
(7, 7, 'HANOMAG 35', '../imagenes/fotomaq/FotoMaquinaria7.jpg', 'HANOMAG 35'),
(8, 8, 'tractor muestra', '../imagenes/fotomaq/FotoMaquinaria8.jpg', 'Tractor muestra'),
(9, 9, 'MB 911', '../imagenes/fotomaq/FotoMaquinaria9.JPG', 'MB 911/71');

-- --------------------------------------------------------

--
-- Table structure for table `inmueble`
--

CREATE TABLE IF NOT EXISTS `inmueble` (
  `inm_codigo` int(11) NOT NULL,
  `inm_titulo` varchar(150) NOT NULL,
  `inm_descripcion` varchar(10000) NOT NULL,
  PRIMARY KEY (`inm_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inmueble`
--

INSERT INTO `inmueble` (`inm_codigo`, `inm_titulo`, `inm_descripcion`) VALUES
(1, 'Campo Sojero 84 has. - Ca&ntilde;uelas', 'A 800 mts. ruta 205 c/mejoras, casa, galpon, molino, alambrado perimetral, antes ganado ahora SOJA!!OPORTUNIDAD..u$s12.000ha.'),
(2, 'Hotel Spa - Ca&ntilde;uelas', '3 Pisos, 12 Habitaciones por piso, todos en suite Spa, Sauna, Restaurant, Sal&oacute;n de eventos con retroproyector y pantalla. u$s300.000 y ctas.'),
(3, 'Lotes Country Principado de San Vicente', 'Desde 700 m2, ciudad n&aacute;utica en 200 has, 1 House principal en 3 plantas de 900 m2 estilo n&oacute;rdico, 1 house h&iacute;pico, 1 house golf, canales navegables, centro de servicios.u$s45.000'),
(4, 'Campo agricola 45has. San Javier-Rio Negro', 'Ubicado a 3.5km el centro de San Javier, monte alamos criollos y sauces llorones, ca&ntilde;ada, quinta con arboles frutales, camino vecinal de tosca.u$s230.000'),
(5, 'Campo 45 has. San Javier-Rio Negro', 'A 4 km. del centro de San Javier, construccion a reciclar, quintas c/eucaliptus colorados, algarrobos, espinillos, arboles frutales, ca&ntilde;ada..u$s230.000.-'),
(6, 'Chacra 38has. Soriano-Mercedes', 'A 10km. de Mercedes, casa 3 habitaciones, galpon 10x6, pozo c/bomba, chiqueros y gallineros, tubo y manga, tajamar, alambrado a nuevo...u$s430.000.-'),
(7, 'BUSCAMOS CAMPOS POR PEDIDOS CONCRETOS!!!', 'PARA COMPRAR O ARRENDAR, EN URUGUAY Y EN ARGENTINA URGENTE!!! PEDIDOS CONCRETOS!!!');

-- --------------------------------------------------------

--
-- Table structure for table `maquinaria`
--

CREATE TABLE IF NOT EXISTS `maquinaria` (
  `maq_codigo` int(11) NOT NULL,
  `maq_titulo` varchar(150) NOT NULL,
  `maq_descripcion` varchar(10000) NOT NULL,
  PRIMARY KEY (`maq_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maquinaria`
--

INSERT INTO `maquinaria` (`maq_codigo`, `maq_titulo`, `maq_descripcion`) VALUES
(6, 'Tractor Massey Ferguson 1175 Mod.80', 'En Muy buen estado, posee toma de fuerza, levante de tres puntos,y salida de control remoto. u$s14.500'),
(7, 'HANOMAG 35 HP FULL-FULL ORIG -mod.1955', 'Muy buen estado!!! Toma de fuerza  polea y traba en diferencial.u$s6.000.- '),
(8, 'SI TIENE UNA MAQUINARIA EN VENTA!!!', 'CONSULTENOS NOSOTROS SE LA COMERCIALIZAMOS!!!!'),
(9, 'Mercedez Benz 911 Mod. 71 Mot. 1114', 'MOTOR MERCEDES 1114, FURGON CERRADO,3 ASIENTOS , LARGO DE CARGA INTERNO 7,50 MTS\r\nPORTON TRASERO LIBRO  2.40 X2 MTS DE ALTO 2 PTAS LAT, APERT A  AIRE,\r\nCAP DE CARGA 8OOO KGMS  PALOMAS REFORZADAS PARA CARGA\r\n MOTOR MUY BUENO CUB DELANT BUENAS, PINTADO HACE POCO TOTAL$ 26,000 SE ACEPTAN PERMUTAS \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `reg_numero` int(11) NOT NULL AUTO_INCREMENT,
  `reg_fecha` datetime DEFAULT NULL,
  `reg_tipo_aviso` varchar(20) DEFAULT NULL,
  `reg_operacion` varchar(50) DEFAULT NULL,
  `reg_cod_aviso` int(11) DEFAULT NULL,
  `reg_nro_foto` int(11) DEFAULT NULL,
  `reg_titulo_aviso` varchar(20) DEFAULT NULL,
  `reg_descripcion_aviso` varchar(10000) DEFAULT NULL,
  `reg_title_foto` varchar(150) DEFAULT NULL,
  `reg_alt_foto` varchar(80) DEFAULT NULL,
  `reg_url_foto` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`reg_numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`reg_numero`, `reg_fecha`, `reg_tipo_aviso`, `reg_operacion`, `reg_cod_aviso`, `reg_nro_foto`, `reg_titulo_aviso`, `reg_descripcion_aviso`, `reg_title_foto`, `reg_alt_foto`, `reg_url_foto`) VALUES
(9, '2010-06-26 15:01:07', 'Maquinaria', 'Alta', 1, 1, 'Maquinaria 1', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 1', 'Maquinaria 1', 'FotoMaquinaria1.png'),
(10, '2010-06-26 15:01:37', 'Maquinaria', 'Alta', 2, 2, 'Maquinaria 2', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 2', 'Maquinaria 2', 'FotoMaquinaria2.png'),
(11, '2010-06-26 15:01:59', 'Maquinaria', 'Alta', 3, 3, 'Maquinaria 3', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 3', 'Maquinaria 3', 'FotoMaquinaria3.png'),
(12, '2010-06-26 15:02:23', 'Maquinaria', 'Alta', 4, 4, 'Maquinaria 4', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 4', 'Maquinaria 4', 'FotoMaquinaria4.png'),
(13, '2010-06-26 15:04:28', 'Maquinaria', 'Alta', 5, 5, 'Maquinaria 5', '- Descripci&oacute;n breve de la maquinaria a tratar -', 'Maquinaria 5', 'Maquinaria 5', 'FotoMaquinaria5.png'),
(14, '2010-06-26 15:05:56', 'Inmueble', 'Alta', 1, 1, 'Campo 84 has. - Ca&n', 'Alambrado, galp&oacute;n y casa... OPORTUNIDAD...', 'Campo 84 has', 'Campo 84 has', 'FotoInmueble1.jpg'),
(15, '2010-06-26 15:06:45', 'Inmueble', 'Alta', 2, 2, 'Hotel Spa - Ca&ntild', '3 Pisos, 12 Habitaciones por piso, todos en suite Spa, Sauna, Restaurant, Sal&oacute;n de eventos con retroproyector y pantalla', 'Hotel Spa', 'Hotel Spa', 'FotoInmueble2.jpg'),
(16, '2010-06-26 15:07:51', 'Inmueble', 'Alta', 3, 3, 'Lotes Country Princi', 'Desde 700 m2, ciudad n&aacute;utica en 200 has, 1 House principal en 3 plantas de 900 m2 estilo n&oacute;rdico, 1 house h&iacute;pico, 1 house golf, canales navegables, centro de servicios.', 'Lotes Country', 'Lotes Country', 'FotoInmueble3.jpg'),
(17, '2010-06-26 15:09:13', 'Maquinaria', 'Modifica Aviso', 1, 0, 'Maquinaria 1', '- Descripci&oacute;n breve de la maquinaria a tratar -', '', '', ''),
(18, '2010-06-26 15:09:25', 'Maquinaria', 'Modifica Aviso', 2, 0, 'Maquinaria 2', '- Descripci&oacute;n breve de la maquinaria a tratar -', '', '', ''),
(19, '2010-06-26 15:09:39', 'Maquinaria', 'Modifica Aviso', 3, 0, 'Maquinaria 3', '- Descripci&oacute;n breve de la maquinaria a tratar -', '', '', ''),
(20, '2010-06-26 15:09:49', 'Maquinaria', 'Modifica Aviso', 4, 0, 'Maquinaria 4', '- Descripci&oacute;n breve de la maquinaria a tratar -', '', '', ''),
(21, '2010-06-28 12:57:47', 'Inmueble', 'Modifica Aviso', 1, 0, 'Campo Sojero 84 has.', 'A 800 mts. ruta 205 c/mejoras, casa, galpon, molino, alambrado perimetral, antes ganado ahora SOJA!!OPORTUNIDAD...', '', '', ''),
(22, '2010-06-28 12:59:47', 'Inmueble', 'Modifica Foto', 0, 1, '', '', 'Campo 84 has', 'Campo 84 has', 'FotoInmueble1.JPG'),
(23, '2010-06-28 13:00:18', 'Inmueble', 'Modifica Foto', 0, 1, '', '', 'Campo 84 has', 'Campo 84 has', 'FotoInmueble1.JPG'),
(24, '2010-06-28 13:00:49', 'Inmueble', 'Modifica Foto', 0, 1, '', '', 'Campo 84 has', 'Campo 84 has', 'FotoInmueble1.JPG'),
(25, '2010-06-28 13:01:08', 'Inmueble', 'Modifica Foto', 0, 1, '', '', 'Campo 84 has', 'Campo 84 has', 'FotoInmueble1.JPG'),
(26, '2010-06-28 13:01:55', 'Inmueble', 'Modifica Foto', 0, 1, '', '', 'Campo 84 has', 'Campo 84 has', 'FotoInmueble1.JPG'),
(27, '2010-06-28 13:03:11', 'Inmueble', 'Modifica Foto', 0, 1, '', '', 'Campo 84 has', 'Campo 84 has', 'FotoInmueble1.JPG'),
(28, '2010-06-30 12:41:42', 'Inmueble', 'Alta', 4, 4, 'Campo agricola 45has', 'Ubicado a 3.5km el centro de San Javier, monte alamos criollos y sauces llorones, ca&ntilde;ada, quinta con arboles frutales, camino vecinal de tosca.', 'Campo San Javier', 'Campo San Javier', 'FotoInmueble4.jpg'),
(29, '2010-06-30 12:46:58', 'Inmueble', 'Alta', 5, 5, 'Campo 45 has. San Ja', 'A 4 km. del centro de San Javier, construccion a reciclar, quintas c/eucaliptus colorados, algarrobos, espinillos, arboles frutales, ca&ntilde;ada..u$s230.000.-', 'Campo 45has.', 'Campo 45has.', 'FotoInmueble5.jpg'),
(30, '2010-06-30 12:52:07', 'Inmueble', 'Alta', 6, 6, 'Chacra 38has. Sorian', 'A 10km. de Mercedes, casa 3 habitaciones, galpon 10x6, pozo c/bomba, chiqueros y gallineros, tubo y manga, tajamar, alambrado a nuevo...u$s430.000.-', 'Chacra Soriano 38has.', 'Chacra Soriano 38has.', 'FotoInmueble6.jpg'),
(31, '2010-06-30 12:53:41', 'Inmueble', 'Modifica Aviso', 1, 0, 'Campo Sojero 84 has.', 'A 800 mts. ruta 205 c/mejoras, casa, galpon, molino, alambrado perimetral, antes ganado ahora SOJA!!OPORTUNIDAD..u$s12.000ha.', '', '', ''),
(32, '2010-06-30 12:54:26', 'Inmueble', 'Modifica Aviso', 2, 0, 'Hotel Spa - Ca&ntild', '3 Pisos, 12 Habitaciones por piso, todos en suite Spa, Sauna, Restaurant, Sal&oacute;n de eventos con retroproyector y pantalla. u$s300.000 y ctas.', '', '', ''),
(33, '2010-06-30 12:55:06', 'Inmueble', 'Modifica Aviso', 3, 0, 'Lotes Country Princi', 'Desde 700 m2, ciudad n&aacute;utica en 200 has, 1 House principal en 3 plantas de 900 m2 estilo n&oacute;rdico, 1 house h&iacute;pico, 1 house golf, canales navegables, centro de servicios.u$s45.000', '', '', ''),
(34, '2010-06-30 12:56:41', 'Inmueble', 'Modifica Aviso', 4, 0, 'Campo agricola 45has', 'Ubicado a 3.5km el centro de San Javier, monte alamos criollos y sauces llorones, ca&ntilde;ada, quinta con arboles frutales, camino vecinal de tosca.u$s230.000', '', '', ''),
(35, '2010-06-30 13:37:14', 'Maquinaria', 'Alta', 6, 6, 'Tractor Massey Fergu', 'En Muy buen estado, posee toma de fuerza, levante de tres puntos,y salida de control remoto. u$s14.500', 'Tractor Ferguson1175', 'Tractor Ferguson1175', 'FotoMaquinaria6.jpg'),
(36, '2010-06-30 13:37:48', 'Maquinaria', 'Baja', 1, 1, 'Maquinaria 1', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 1', 'Maquinaria 1', '../imagenes/fotomaq/FotoMaquinaria1.png'),
(37, '2010-06-30 13:37:55', 'Maquinaria', 'Baja', 2, 2, 'Maquinaria 2', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 2', 'Maquinaria 2', '../imagenes/fotomaq/FotoMaquinaria2.png'),
(38, '2010-06-30 13:38:03', 'Maquinaria', 'Baja', 3, 3, 'Maquinaria 3', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 3', 'Maquinaria 3', '../imagenes/fotomaq/FotoMaquinaria3.png'),
(39, '2010-06-30 13:38:09', 'Maquinaria', 'Baja', 4, 4, 'Maquinaria 4', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 4', 'Maquinaria 4', '../imagenes/fotomaq/FotoMaquinaria4.png'),
(40, '2010-06-30 13:38:16', 'Maquinaria', 'Baja', 5, 5, 'Maquinaria 5', '- Descripci&amp;oacute;n breve de la maquinaria a tratar -', 'Maquinaria 5', 'Maquinaria 5', '../imagenes/fotomaq/FotoMaquinaria5.png'),
(41, '2010-06-30 13:44:47', 'Maquinaria', 'Alta', 7, 7, 'HANOMAG 35 HP FULL-F', 'Muy buen estado!!! Toma de fuerza  polea y traba en diferencial.u$s6.000.- ', 'HANOMAG 35', 'HANOMAG 35', 'FotoMaquinaria7.jpg'),
(42, '2010-06-30 13:50:21', 'Maquinaria', 'Alta', 8, 8, 'SI TIENE UNA MAQUINA', 'cONSULTENOS NOSOTROS SE LA COMERCIALIZAMOS!!!!', 'tractor muestra', 'tractor muestra', 'FotoMaquinaria8.jpg'),
(43, '2010-06-30 13:51:02', 'Maquinaria', 'Modifica Aviso', 8, 0, 'SI TIENE UNA MAQUINA', 'CONSULTENOS NOSOTROS SE LA COMERCIALIZAMOS!!!!', '', '', ''),
(44, '2010-06-30 13:56:22', 'Inmueble', 'Alta', 7, 7, 'BUSCAMOS CAMPOS POR ', 'PARA COMPRAR O ARRENDAR, EN URUGUAY Y EN ARGENTINA URGENTE!!! PEDIDOS CONCRETOS!!!', 'campo pedid', 'campo pedid', 'FotoInmueble7.jpg'),
(45, '2010-06-30 17:23:22', 'Maquinaria', 'Alta', 9, 9, 'es una prueba', 'prueba', 'foto prueba', 'foto prueba', 'FotoMaquinaria9.jpg'),
(46, '2010-06-30 17:24:24', 'Maquinaria', 'Modifica Aviso', 9, 0, 'es una 2 prueba', 'prueba2', '', '', ''),
(47, '2010-06-30 17:24:59', 'Maquinaria', 'Modifica Foto', 0, 9, '', '', 'foto 2 prueba', 'foto 2 prueba', 'FotoMaquinaria9.jpg'),
(48, '2010-06-30 17:26:03', 'Maquinaria', 'Baja', 9, 9, 'es una 2 prueba', 'prueba2', 'foto 2 prueba', 'foto 2 prueba', '../imagenes/fotomaq/FotoMaquinaria9.jpg'),
(49, '2010-07-19 16:51:30', 'Maquinaria', 'Alta', 9, 9, 'Mercedez Benz 911 Mo', 'MERCEDES BENZ 911  A&Ntilde;O 1971 MODELO LO 48 ,EX COLECTIVO\r\nMOTOR MERCEDES 1114, FURGON CERRADO,3 ASIENTOS , LARGO DE CARGA INTERNO 7,50 MTS\r\nPORTON TRASERO LIBRO  2.40 X2 MTS DE ALTO 2 PUERTAS LATERALES APERTURA A  AIRE\r\nCAPACIDAD DE CARGA 8OOO KGMS  PALOMAS REFORZADAS PARA CARGA\r\n MOTOR MUY BUENO CUBIERTAS DELANTERAS BUENAS, PINTADO HACE POCOS MESES\r\nPRECIO TOTAL$ 26,000 SE ACEPTAN PERMUTAS X AUTOS HASTA 10,000 $ Y EN BUEN ESTADO\r\nTITULAR PAPELES EN REGLA CEDULA Y TITULO \r\n', 'MB 911', 'MB 911', 'FotoMaquinaria9.JPG'),
(50, '2010-07-19 16:54:50', 'Maquinaria', 'Modifica Aviso', 9, 0, 'Mercedez Benz 911 Mo', 'MOTOR MERCEDES 1114, FURGON CERRADO,3 ASIENTOS , LARGO DE CARGA INTERNO 7,50 MTS\r\nPORTON TRASERO LIBRO  2.40 X2 MTS DE ALTO 2 PTAS LAT, APERT A  AIRE,\r\nCAP DE CARGA 8OOO KGMS  PALOMAS REFORZADAS PARA CARGA\r\n MOTOR MUY BUENO CUB DELANT BUENAS, PINTADO HACE POCO TOTAL$ 26,000 SE ACEPTAN PERMUTAS \r\n', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usr_id` varchar(20) NOT NULL,
  `usr_nombre` varchar(50) NOT NULL,
  `usr_password` varchar(50) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`usr_id`, `usr_nombre`, `usr_password`) VALUES
('david', 'German Dosko', 'David2010'),
('mauricio', 'Mauricio Sosa Cabral', 'Mauricio2010'),
('sergio', 'Sergio Sosa Cabral', 'Sergio2010');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_inmueble`
--
ALTER TABLE `foto_inmueble`
  ADD CONSTRAINT `foto_inmueble_fk` FOREIGN KEY (`inm_codigo`) REFERENCES `inmueble` (`inm_codigo`);