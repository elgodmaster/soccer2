-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2013 at 12:41 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.4-14+deb7u4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `ID_CATEGORY` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) DEFAULT NULL,
  `DESCRIPTION` varchar(300) DEFAULT NULL,
  `MAX_YEAR` int(11) NOT NULL,
  `MIN_YEAR` int(11) NOT NULL,
  `ACTIVE` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORY`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`ID_CATEGORY`, `NAME`, `DESCRIPTION`, `MAX_YEAR`, `MIN_YEAR`, `ACTIVE`) VALUES
(1, 'Varonil Infantil', 'Equipo infantil de 5 a 10 años', 10, 5, 1),
(2, 'Varonil Junior', 'Categoria de 11 a 15 años', 15, 11, 1),
(3, 'Varonil Juvenil', 'Solo jugadores de  16 a 20 años', 20, 16, 1),
(4, 'Varonil Libre', 'Jugadores de 21 años en adelante.', 60, 21, 1),
(5, 'Femenil infantil', 'Jugadores Mujeres de 5 a 10 años', 10, 5, 1),
(6, 'Femenil Junior', 'Jugadores Mujeres de 11 a 15 años', 15, 11, 1),
(7, 'Femenil Juvenil', 'Jugadores Mujeres de 16 a 20 años', 20, 16, 1),
(8, 'Femenil Libre', 'Jugadores Mujeres de 21 años en adelante.', 50, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat_result`
--

CREATE TABLE IF NOT EXISTS `tbl_cat_result` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `TYPE_RESULT` int(11) NOT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_cat_result`
--

INSERT INTO `tbl_cat_result` (`ID`, `NAME`, `DESCRIPTION`, `TYPE_RESULT`, `ACTIVE`) VALUES
(1, 'Resultado Final', 'Resultado de el encuentro entre los dos Equipos', 3, 1),
(2, 'Numero de Faltas', 'Numero de faltas cometidas en el encuentro', 3, 1),
(3, 'Goles del Jugador', 'Numero de goles que realiza el judador', 2, 1),
(4, 'Numero de Faltas Equipo', 'Numero de faltas que ha realizado el equipo en el torneo', 1, 1),
(5, 'Tiros Esquina', 'Tiros de esquina a favor por cada equipo', 3, 1),
(6, 'Tarjetas amarillas', 'Numero de tarjetas amarillas asignadas a cada equipo', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat_role`
--

CREATE TABLE IF NOT EXISTS `tbl_cat_role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_cat_role`
--

INSERT INTO `tbl_cat_role` (`ID`, `NAME`, `DESCRIPTION`, `ACTIVE`) VALUES
(1, 'Delantero', 'Jugador delantero del equipo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE IF NOT EXISTS `tbl_document` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) DEFAULT NULL,
  `TYPE_DOCUMENT` smallint(6) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`ID`, `NAME`, `TYPE_DOCUMENT`, `DESCRIPTION`) VALUES
(1, 'Foto de Perfil', 1, 'f'),
(2, 'Acta de Nacimiento', 1, 'algo'),
(4, 'Registro de Jugador', 1, 'A short Description, another description'),
(5, 'Registro del Equipo', 1, 'Hoja rosa del registro del equipo'),
(6, 'CURP', 2, 'CURP DEL JUGADOR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_player`
--

CREATE TABLE IF NOT EXISTS `tbl_document_player` (
  `ID_DOCUMENT_PLAYER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DOCUMENT` int(11) DEFAULT NULL,
  `ID_PLAYER` int(11) DEFAULT NULL,
  `PATH` varchar(300) DEFAULT NULL,
  `SIZE` int(11) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `THUMBNAIL` varchar(300) DEFAULT NULL,
  `TYPE` varchar(100) DEFAULT NULL,
  `DELTYPE` varchar(300) DEFAULT NULL,
  `DELURL` varchar(300) DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_DOCUMENT_PLAYER`),
  KEY `FK_REFERENCE_14` (`ID_DOCUMENT`),
  KEY `FK_REFERENCE_15` (`ID_PLAYER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tbl_document_player`
--

INSERT INTO `tbl_document_player` (`ID_DOCUMENT_PLAYER`, `ID_DOCUMENT`, `ID_PLAYER`, `PATH`, `SIZE`, `NAME`, `DESCRIPTION`, `THUMBNAIL`, `TYPE`, `DELTYPE`, `DELURL`, `STATUS`) VALUES
(1, 1, 1, '/soccer2/files/papito%20%281%29.jpg', 13678, 'papito (1).jpg', 'Foto de perfil', '/soccer2/files/thumbnail/papito%20%281%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=papito%20%281%29.jpg', 0),
(2, 2, 1, '/soccer2/files/Lighthouse.jpg', 561276, 'Lighthouse.jpg', 'Foto Promocional', '/soccer2/files/thumbnail/Lighthouse.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=Lighthouse.jpg', 0),
(3, 1, 2, '/soccer2/files/telerita.%20%281%29.jpg', 8508, 'telerita. (1).jpg', 'fotoPerfil', '/soccer2/files/thumbnail/telerita.%20%281%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=telerita.%20%281%29.jpg', 0),
(4, 1, 1, '/soccer2/files/telerita.%20%282%29.jpg', 8508, 'telerita. (2).jpg', 'telerita..jpg', '/soccer2/files/thumbnail/telerita.%20%282%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=telerita.%20%282%29.jpg', 0),
(5, 1, 1, '/soccer2/files/1353452294_4.png', 1241, '1353452294_4.png', '1353452294_4.png', '/soccer2/files/thumbnail/1353452294_4.png', 'image/png', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=1353452294_4.png', 0),
(6, 2, 1, '/soccer2/files/Quetzal_by_Crippler_struggler.jpg', 81727, 'Quetzal_by_Crippler_struggler.jpg', 'Quetzal_by_Crippler_struggler.jpg', '/soccer2/files/thumbnail/Quetzal_by_Crippler_struggler.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=Quetzal_by_Crippler_struggler.jpg', 0),
(7, 2, 1, '/soccer2/files/602364_3890044460809_1254160810_n.jpg', 40535, '602364_3890044460809_1254160810_n.jpg', '602364_3890044460809_1254160810_n.jpg', '/soccer2/files/thumbnail/602364_3890044460809_1254160810_n.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=602364_3890044460809_1254160810_n.jpg', 0),
(8, 1, 1, '/soccer2/files/qutzal.jpg', 7085, 'qutzal.jpg', 'qutzal.jpg', '/soccer2/files/thumbnail/qutzal.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=qutzal.jpg', 1),
(9, 1, 2, '/soccer2/files/qutzal%20%281%29.jpg', 7085, 'qutzal (1).jpg', 'qutzal.jpg', '/soccer2/files/thumbnail/qutzal%20%281%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=qutzal%20%281%29.jpg', 0),
(10, 1, 3, '/soccer2/files/qutzal%20%282%29.jpg', 7085, 'qutzal (2).jpg', 'fotito', '/soccer2/files/thumbnail/qutzal%20%282%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=qutzal%20%282%29.jpg', 1),
(11, 1, 1, '/soccer2/uploads/players/1/920fba9c93e47540a55a8df2fdaaf79e.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', 'puto el que se ria', '/soccer2/uploads/players/1/thumbs/920fba9c93e47540a55a8df2fdaaf79e.png', 'image/png', 'POST', '/soccer2/index.php?r=player/upload&_method=delete&file=920fba9c93e47540a55a8df2fdaaf79e.png', 0),
(12, 1, 3, '/soccer2/uploads/players/3/ed1410f38479e51e7bd59b082fe05a53.jpeg', 14583, 'carrito .some.some.jpeg', 'rrrrrrrrrrrrrrrrrrrrrr', '/soccer2/uploads/players/3/thumbs/ed1410f38479e51e7bd59b082fe05a53.jpeg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/upload&_method=delete&file=ed1410f38479e51e7bd59b082fe05a53.jpeg', 1),
(13, 1, 3, '/soccer2/uploads/players/3/d88472c106aa3257ea15b7ea3a4afc44.png', 1808, 'defaultFile.png', '777777777', '/soccer2/uploads/players/3/thumbs/d88472c106aa3257ea15b7ea3a4afc44.png', 'image/png', 'DELETE', '/soccer2/index.php?r=player/upload&_method=delete&file=d88472c106aa3257ea15b7ea3a4afc44.png', 1),
(14, 1, 4, '/soccer2/uploads/players/4/da2714e8e3010871df05d759fce4708e.png', 1808, 'defaultFile.png', 'hhhhh', '/soccer2/uploads/players/4/thumbs/da2714e8e3010871df05d759fce4708e.png', 'image/png', 'DELETE', '/soccer2/index.php?r=player/upload&_method=delete&file=da2714e8e3010871df05d759fce4708e.png', 1),
(15, 1, 4, '/soccer2/uploads/players/4/d0c4a48bb44465067efea1ca00a8c28d.jpeg', 14583, 'carrito .some.some.jpeg', 'some', '/soccer2/uploads/players/4/thumbs/d0c4a48bb44465067efea1ca00a8c28d.jpeg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/upload&_method=delete&file=d0c4a48bb44465067efea1ca00a8c28d.jpeg', 1),
(16, 1, 4, '/soccer2/uploads/players/4/d5c4e612c2053db243037a028e535938.png', 1808, 'defaultFile.png', 'asdfas', '/soccer2/uploads/players/4/thumbs/d5c4e612c2053db243037a028e535938.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=4&_method=delete&file=d5c4e612c2053db243037a028e535938.png', 1),
(17, 1, 4, '/soccer2/uploads/players/4/58e699f37eb73cea2a61925d11925552.png', 1808, 'defaultFile.png', '', '/soccer2/uploads/players/4/thumbs/58e699f37eb73cea2a61925d11925552.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=4&_method=delete&file=58e699f37eb73cea2a61925d11925552.png', 1),
(18, 1, 1, '/soccer2/uploads/players/1/01a20049b559cb18e8c439a734fab1be.png', 48658, 'Screenshot from 2013-05-27 12:54:50.png', '', '/soccer2/uploads/players/1/thumbs/01a20049b559cb18e8c439a734fab1be.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=01a20049b559cb18e8c439a734fab1be.png', 0),
(19, 1, 1, '/soccer2/uploads/players/1/e285341ddc17625dd00453726041edc3.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', '', '/soccer2/uploads/players/1/thumbs/e285341ddc17625dd00453726041edc3.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=e285341ddc17625dd00453726041edc3.png', 0),
(20, 1, 1, '/soccer2/uploads/players/1/152669afa43f3c3a1ef51bf42c50b3bb.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', '', '/soccer2/uploads/players/1/thumbs/152669afa43f3c3a1ef51bf42c50b3bb.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=152669afa43f3c3a1ef51bf42c50b3bb.png', 0),
(21, 1, 1, '/soccer2/uploads/players/1/44806bed0c5082ad85762ca27c06aab6.png', 1808, 'defaultFile.png', '', '/soccer2/uploads/players/1/thumbs/44806bed0c5082ad85762ca27c06aab6.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=44806bed0c5082ad85762ca27c06aab6.png', 0),
(22, 1, 1, '/soccer2/uploads/players/1/a6ae5d7a1dac60ebd36e88a87f2ac5b2.png', 1808, 'defaultFile.png', '', '/soccer2/uploads/players/1/thumbs/a6ae5d7a1dac60ebd36e88a87f2ac5b2.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=a6ae5d7a1dac60ebd36e88a87f2ac5b2.png', 0),
(23, 1, 1, '/soccer2/uploads/players/1/210d859cecaa61fbca343322884565c4.jpeg', 14583, 'carrito .some.some.jpeg', '', '/soccer2/uploads/players/1/thumbs/210d859cecaa61fbca343322884565c4.jpeg', 'image/jpeg', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=210d859cecaa61fbca343322884565c4.jpeg', 0),
(24, 1, 1, '/soccer2/uploads/players/1/bf6370297fabb530243226f0f4de19cd.png', 1808, 'defaultFile.png', '', '/soccer2/uploads/players/1/thumbs/bf6370297fabb530243226f0f4de19cd.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=bf6370297fabb530243226f0f4de19cd.png', 0),
(25, 1, 6, '/soccer2/uploads/players/6/5150af44a13d381c5392faf09e4e3a0b.png', 1808, 'defaultFile.png', 'oooooo', '/soccer2/uploads/players/6/thumbs/5150af44a13d381c5392faf09e4e3a0b.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=6&_method=delete&file=5150af44a13d381c5392faf09e4e3a0b.png', 1),
(26, 1, 6, '/soccer2/uploads/players/6/fd7e8cdbbdb01995b12e11a5ad3699c5.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', '', '/soccer2/uploads/players/6/thumbs/fd7e8cdbbdb01995b12e11a5ad3699c5.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=6&_method=delete&file=fd7e8cdbbdb01995b12e11a5ad3699c5.png', 1),
(27, 1, 6, '/soccer2/uploads/players/6/193efe242ae40d608ec9547044d2f324.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', 'test', '/soccer2/uploads/players/6/thumbs/193efe242ae40d608ec9547044d2f324.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=6&_method=delete&file=193efe242ae40d608ec9547044d2f324.png', 1),
(28, 1, 6, '/soccer2/uploads/players/6/f0a0ad9bef6befed691959742e35617d.jpeg', 14583, 'carrito .some.some.jpeg', 'zzzzzzzz', '/soccer2/uploads/players/6/thumbs/f0a0ad9bef6befed691959742e35617d.jpeg', 'image/jpeg', 'POST', '/soccer2/index.php?r=player/uploadTest&id=6&_method=delete&file=f0a0ad9bef6befed691959742e35617d.jpeg', 1),
(29, 1, 6, '/soccer2/uploads/players/6/e661586ded2806273c50d40036917e79.png', 1808, 'defaultFile.png', '', '/soccer2/uploads/players/6/thumbs/e661586ded2806273c50d40036917e79.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=6&_method=delete&file=e661586ded2806273c50d40036917e79.png', 0),
(30, 1, 7, '/soccer2/uploads/players/7/daf7c6a0888d990d04f2fcb44122b7a2.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', 'Wue pasa tronco', '/soccer2/uploads/players/7/thumbs/daf7c6a0888d990d04f2fcb44122b7a2.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=7&_method=delete&file=daf7c6a0888d990d04f2fcb44122b7a2.png', 0),
(31, 1, 7, '/soccer2/uploads/players/7/5b35dfbcb4fb0136ae947c022065ad97.xcf', 168957, 'templateCredencial.xcf', 'sadfsdfsdaf', '/soccer2/uploads/default/defaultFile.png', 'image/x-xcf', 'POST', '/soccer2/index.php?r=player/uploadTest&id=7&_method=delete&file=5b35dfbcb4fb0136ae947c022065ad97.xcf', 1),
(32, 1, 7, '/soccer2/uploads/players/7/8ceb63e410d3b521537313bc238974e4.png', 1808, 'defaultFile.png', 'asdfsadf', '/soccer2/uploads/players/7/thumbs/8ceb63e410d3b521537313bc238974e4.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=7&_method=delete&file=8ceb63e410d3b521537313bc238974e4.png', 0),
(33, 1, 7, '/soccer2/uploads/players/7/e4f48c8c242465610b802b5519a1eb26.png', 26325, 'Screenshot from 2013-05-28 01:22:19.png', 'sfgsagds', '/soccer2/uploads/players/7/thumbs/e4f48c8c242465610b802b5519a1eb26.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=7&_method=delete&file=e4f48c8c242465610b802b5519a1eb26.png', 1),
(34, 1, 8, '/soccer2/uploads/players/8/c103d362b7c1a87fed8106345333ccf0.png', 34658, 'templateCredencial.png', 'sdaasdfasgsafsadfas', '/soccer2/uploads/players/8/thumbs/c103d362b7c1a87fed8106345333ccf0.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=8&_method=delete&file=c103d362b7c1a87fed8106345333ccf0.png&idDocumentPlayer=', 1),
(35, 1, 8, '/soccer2/uploads/players/8/228bf7fda289ae8605507e9d89d7469b.xcf', 168957, 'templateCredencial.xcf', 'asfsdafasfd', '/soccer2/uploads/default/defaultFile.png', 'image/x-xcf', 'POST', '/soccer2/index.php?r=player/uploadTest&id=8&_method=delete&file=228bf7fda289ae8605507e9d89d7469b.xcf&idDocumentPlayer=', 0),
(36, 1, 1, '/soccer2/uploads/players/1/14763033876bde416c0f41a16a3b8dc9.png', 11405, 'text-file-icon.png', 'my foto', '/soccer2/uploads/players/1/thumbs/14763033876bde416c0f41a16a3b8dc9.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=14763033876bde416c0f41a16a3b8dc9.png', 0),
(37, 1, 1, '/soccer2/uploads/players/1/dcdbfadd2a9528cbe9243f5f6c26ed77.xcf', 17499, 'text-file-icon.xcf', 'Another text', '/soccer2/uploads/default/defaultFile.png', 'image/x-xcf', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=dcdbfadd2a9528cbe9243f5f6c26ed77.xcf', 0),
(38, 1, 2, '/soccer2/uploads/players/2/22c4b4c021ebf19612cafcbe07e52d75.png', 1808, 'defaultFile.png', 'Archivo de Prueba', '/soccer2/uploads/players/2/thumbs/22c4b4c021ebf19612cafcbe07e52d75.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=22c4b4c021ebf19612cafcbe07e52d75.png', 0),
(39, 1, 2, '/soccer2/uploads/players/2/3c6275e989af486c019d4d8ed8191262.jpeg', 14583, 'carrito .some.some.jpeg', 'xoxos', '/soccer2/uploads/players/2/thumbs/3c6275e989af486c019d4d8ed8191262.jpeg', 'image/jpeg', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=3c6275e989af486c019d4d8ed8191262.jpeg', 0),
(40, 1, 2, '/soccer2/uploads/players/2/3f85a08b8d2d391729112d3154928d05.png', 1808, 'defaultFile.png', 'asdfasfasdf', '/soccer2/uploads/players/2/thumbs/3f85a08b8d2d391729112d3154928d05.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=3f85a08b8d2d391729112d3154928d05.png', 0),
(41, 1, 2, '/soccer2/uploads/players/2/009a3cfc529a25fdacc3ae17726c1cd6.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', 'wdgdsgf', '/soccer2/uploads/players/2/thumbs/009a3cfc529a25fdacc3ae17726c1cd6.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=009a3cfc529a25fdacc3ae17726c1cd6.png', 0),
(42, 1, 2, '/soccer2/uploads/players/2/d98e74e5a4aea6b89ed06a1b01a6505b.png', 115452, 'Screenshot from 2013-05-27 12:20:01.png', '', '/soccer2/uploads/players/2/thumbs/d98e74e5a4aea6b89ed06a1b01a6505b.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=d98e74e5a4aea6b89ed06a1b01a6505b.png', 0),
(43, 2, 2, '/soccer2/uploads/players/2/78194550ff4fe1be1920d364f4a834f4.png', 1808, 'defaultFile.png', 'asfasdfasdf', '/soccer2/uploads/players/2/thumbs/78194550ff4fe1be1920d364f4a834f4.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=78194550ff4fe1be1920d364f4a834f4.png', 0),
(44, 4, 2, '/soccer2/uploads/players/2/b5d82776e47a48f991e0d66a0e30e503.jpeg', 14583, 'carrito .some.some.jpeg', 'Foto de mi primer carrito', '/soccer2/uploads/players/2/thumbs/b5d82776e47a48f991e0d66a0e30e503.jpeg', 'image/jpeg', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=b5d82776e47a48f991e0d66a0e30e503.jpeg', 0),
(45, 5, 2, '/soccer2/uploads/players/2/2b0d12c437207a757fc0b6169f6ef3de.png', 1808, 'defaultFile.png', 'sfasfa', '/soccer2/uploads/players/2/thumbs/2b0d12c437207a757fc0b6169f6ef3de.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=2b0d12c437207a757fc0b6169f6ef3de.png', 0),
(46, 1, 2, '/soccer2/uploads/players/2/21dd4e969fe6085fffb640973fcca337.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', 'so so', '/soccer2/uploads/players/2/thumbs/21dd4e969fe6085fffb640973fcca337.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=21dd4e969fe6085fffb640973fcca337.png', 0),
(47, 1, 2, '/soccer2/uploads/players/2/bb44f7a6dff5d6effbf2bd4298e49776.png', 114482, 'Screenshot from 2013-05-27 12:17:41.png', 'Wue pasa tronco', '/soccer2/uploads/players/2/thumbs/bb44f7a6dff5d6effbf2bd4298e49776.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=bb44f7a6dff5d6effbf2bd4298e49776.png', 0),
(48, 1, 2, '/soccer2/uploads/players/2/a4ec4337183b8e775b12c5bd69293d04.xcf', 17499, 'text-file-icon.xcf', 'HELPME ME', '/soccer2/uploads/default/defaultFile.png', 'image/x-xcf', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=a4ec4337183b8e775b12c5bd69293d04.xcf', 0),
(49, 1, 2, '/soccer2/uploads/players/2/f895de4faf039cb03741786962c81200.jpeg', 14583, 'carrito .some.some.jpeg', 'examl', '/soccer2/uploads/players/2/thumbs/f895de4faf039cb03741786962c81200.jpeg', 'image/jpeg', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=f895de4faf039cb03741786962c81200.jpeg', 0),
(50, 1, 2, '/soccer2/uploads/players/2/60c02badec74561b07cf83d36249c5d6.png', 18629, 'Screenshot from 2013-05-28 01:22:31.png', 'help me me', '/soccer2/uploads/players/2/thumbs/60c02badec74561b07cf83d36249c5d6.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=60c02badec74561b07cf83d36249c5d6.png', 0),
(51, 1, 2, '/soccer2/uploads/players/2/40ce428d93fb2726eaafabca655c102a.png', 114669, 'Screenshot from 2013-05-27 12:18:23.png', 'pick out', '/soccer2/uploads/players/2/thumbs/40ce428d93fb2726eaafabca655c102a.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=40ce428d93fb2726eaafabca655c102a.png', 1),
(52, 1, 2, '/soccer2/uploads/players/2/8d075572e7e9add75ed931dd90ee0fbc.png', 18629, 'Screenshot from 2013-05-28 01:22:31.png', '', '/soccer2/uploads/players/2/thumbs/8d075572e7e9add75ed931dd90ee0fbc.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=2&_method=delete&file=8d075572e7e9add75ed931dd90ee0fbc.png', 0),
(53, 1, 12, '/soccer2/uploads/players/12/bbc8a7452729d3891ab45c6c9698a6b1.jpeg', 14583, 'carrito .some.some.jpeg', 'test', '/soccer2/uploads/players/12/thumbs/bbc8a7452729d3891ab45c6c9698a6b1.jpeg', 'image/jpeg', 'POST', '/soccer2/index.php?r=player/uploadTest&id=12&_method=delete&file=bbc8a7452729d3891ab45c6c9698a6b1.jpeg', 1),
(54, 1, 12, '/soccer2/uploads/players/12/982fc89cb715d671709cd36857521f67.png', 1808, 'defaultFile.png', 'another test', '/soccer2/uploads/players/12/thumbs/982fc89cb715d671709cd36857521f67.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=12&_method=delete&file=982fc89cb715d671709cd36857521f67.png', 1),
(55, 1, 1, '/soccer2/uploads/players/1/683d668eedd4ac66d94e1f782b480e2c.jpeg', 14583, 'carrito .some.some.jpeg', 'some aslkdfjl', '/soccer2/uploads/players/1/thumbs/683d668eedd4ac66d94e1f782b480e2c.jpeg', 'image/jpeg', 'POST', '/soccer2/index.php?r=player/uploadTest&id=1&_method=delete&file=683d668eedd4ac66d94e1f782b480e2c.jpeg', 1),
(56, 2, 3, '/soccer2/uploads/players/3/387465c9d51bb292c7b0aee22d8b9818.png', 40791, 'bb.png', 'la bebeita', '/soccer2/uploads/players/3/thumbs/387465c9d51bb292c7b0aee22d8b9818.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=3&_method=delete&file=387465c9d51bb292c7b0aee22d8b9818.png', 1),
(57, 1, 3, '/soccer2/uploads/players/3/d08062df6d24f8a4dbb455cb1d6c3007.png', 40791, 'bb.png', 'My baby', '/soccer2/uploads/players/3/thumbs/d08062df6d24f8a4dbb455cb1d6c3007.png', 'image/png', 'POST', '/soccer2/index.php?r=player/uploadTest&id=3&_method=delete&file=d08062df6d24f8a4dbb455cb1d6c3007.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_team`
--

CREATE TABLE IF NOT EXISTS `tbl_document_team` (
  `ID_DOCUMENT_TEAM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DOCUMENT` int(11) DEFAULT NULL,
  `ID_TEAM` int(11) DEFAULT NULL,
  `PATH` varchar(300) DEFAULT NULL,
  `SIZE` int(11) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `THUMBNAIL` varchar(300) DEFAULT NULL,
  `TYPE` varchar(100) DEFAULT NULL,
  `DELTYPE` varchar(300) DEFAULT NULL,
  `DELURL` varchar(300) DEFAULT NULL,
  `STATUS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_DOCUMENT_TEAM`),
  KEY `FK_REFERENCE_16` (`ID_DOCUMENT`),
  KEY `FK_REFERENCE_17` (`ID_TEAM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_document_team`
--

INSERT INTO `tbl_document_team` (`ID_DOCUMENT_TEAM`, `ID_DOCUMENT`, `ID_TEAM`, `PATH`, `SIZE`, `NAME`, `DESCRIPTION`, `THUMBNAIL`, `TYPE`, `DELTYPE`, `DELURL`, `STATUS`) VALUES
(1, 1, 1, '/soccer2/files/mijita%20%281%29.png', 40791, 'mijita (1).png', 'mijita.png', '/soccer2/files/thumbnail/mijita%20%281%29.png', 'image/png', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=mijita%20%281%29.png', 1),
(2, 1, 1, '/soccer2/files/qutzal%20%284%29.jpg', 7085, 'qutzal (4).jpg', 'qutzal.jpg', '/soccer2/files/thumbnail/qutzal%20%284%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=qutzal%20%284%29.jpg', 1),
(3, 1, 1, '/soccer2/files/Jellyfish.jpg', 775702, 'Jellyfish.jpg', 'Jellyfish.jpg', '/soccer2/files/thumbnail/Jellyfish.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=Jellyfish.jpg', 1),
(4, 1, 1, '/soccer2/files/Hydrangeas.jpg', 595284, 'Hydrangeas.jpg', 'Hydrangeas.jpg', '/soccer2/files/thumbnail/Hydrangeas.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=Hydrangeas.jpg', 1),
(5, 1, 3, '/soccer2/uploads/teams/3/1ec9861884925b8eed163bf9fb62bced.png', 40791, 'bb.png', 'my baby fox', '/soccer2/uploads/teams/3/thumbs/1ec9861884925b8eed163bf9fb62bced.png', 'image/png', 'POST', '/soccer2/index.php?r=team/uploadTest&id=3&_method=delete&file=1ec9861884925b8eed163bf9fb62bced.png', 0),
(6, 1, 3, '/soccer2/uploads/teams/3/d039f4a412ec896398b821c7c876827a.png', 40791, 'bb.png', 'baby love', '/soccer2/uploads/teams/3/thumbs/d039f4a412ec896398b821c7c876827a.png', 'image/png', 'POST', '/soccer2/index.php?r=team/uploadDocument&id=3&_method=delete&file=d039f4a412ec896398b821c7c876827a.png', 0),
(7, 1, 3, '/soccer2/uploads/teams/3/f9bf921768f467e5bec1b6bd3d3506c9.jpeg', 14583, 'carrito .some.some.jpeg', 'my car', '/soccer2/uploads/teams/3/thumbs/f9bf921768f467e5bec1b6bd3d3506c9.jpeg', 'image/jpeg', 'POST', '/soccer2/index.php?r=team/uploadDocument&id=3&_method=delete&file=f9bf921768f467e5bec1b6bd3d3506c9.jpeg', 0),
(8, 1, 3, '/soccer2/uploads/teams/3/26c496737576a1c0f661a2991ba335cd.png', 40791, 'bb.png', 'fa', '/soccer2/uploads/teams/3/thumbs/26c496737576a1c0f661a2991ba335cd.png', 'image/png', 'POST', '/soccer2/index.php?r=team/uploadDocument&id=3&_method=delete&file=26c496737576a1c0f661a2991ba335cd.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_match_game`
--

CREATE TABLE IF NOT EXISTS `tbl_match_game` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLAY_GROUND_ID` int(11) DEFAULT NULL,
  `VISITOR` int(11) DEFAULT NULL,
  `TOURNAMENT_ID` int(11) DEFAULT NULL,
  `LOCAL` int(11) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL,
  `GROUP` int(10) unsigned DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  `NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_5` (`VISITOR`),
  KEY `FK_REFERENCE_6` (`TOURNAMENT_ID`),
  KEY `FK_REFERENCE_7` (`LOCAL`),
  KEY `FK_REFERENCE_8` (`PLAY_GROUND_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `tbl_match_game`
--

INSERT INTO `tbl_match_game` (`ID`, `PLAY_GROUND_ID`, `VISITOR`, `TOURNAMENT_ID`, `LOCAL`, `TIME`, `GROUP`, `ACTIVE`, `NAME`) VALUES
(73, 1, 4, 1, 1, '2013-07-12 00:00:00', 1, NULL, '1'),
(74, 1, 7, 1, 6, '2013-07-19 00:00:00', 1, NULL, '2'),
(75, 1, 6, 1, 4, '0000-00-00 00:00:00', 2, NULL, '3'),
(76, 1, 1, 1, 7, '0000-00-00 00:00:00', 2, NULL, '4'),
(77, 1, 6, 1, 1, '0000-00-00 00:00:00', 3, NULL, '5'),
(78, 1, 7, 1, 4, '0000-00-00 00:00:00', 3, NULL, '6'),
(79, 1, 7, 1, 1, '0000-00-00 00:00:00', 4, NULL, '7'),
(80, 1, 4, 1, 6, '0000-00-00 00:00:00', 4, NULL, '8'),
(81, 2, 1, 1, 4, '0000-00-00 00:00:00', 5, NULL, '9'),
(82, 2, 6, 1, 7, '0000-00-00 00:00:00', 5, NULL, '10'),
(83, 2, 1, 1, 6, '0000-00-00 00:00:00', 6, NULL, '11'),
(84, 2, 4, 1, 7, '2013-07-20 00:00:00', 6, NULL, '12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_match_result`
--

CREATE TABLE IF NOT EXISTS `tbl_match_result` (
  `RESULT_ID` int(11) NOT NULL,
  `MATCH_ID` int(11) NOT NULL,
  `TOTAL_LOCAL` int(11) DEFAULT NULL,
  `TOTAL_VISITOR` int(11) DEFAULT NULL,
  `COMMENT` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`RESULT_ID`,`MATCH_ID`),
  KEY `FK_REFERENCE_10` (`MATCH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_match_result`
--

INSERT INTO `tbl_match_result` (`RESULT_ID`, `MATCH_ID`, `TOTAL_LOCAL`, `TOTAL_VISITOR`, `COMMENT`) VALUES
(1, 73, 7, 999, 'zzzzzzz'),
(1, 74, 1, 2, 'xxxxx'),
(2, 73, 1, 1, 'Te vale madre we'),
(2, 74, 3, 4, 'yyyy'),
(5, 73, 999, 0, 'Te vale madre we '),
(5, 74, 5, 6, 'zzzz'),
(6, 73, 1, 2, 'Partido muy limpio'),
(6, 74, 66, 77, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_player`
--

CREATE TABLE IF NOT EXISTS `tbl_player` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `BIRTH` date DEFAULT NULL,
  `PHONE` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(300) DEFAULT NULL,
  `FACE_BOOK` varchar(50) DEFAULT NULL,
  `TWITER` varchar(50) DEFAULT NULL,
  `GENDER` smallint(6) DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_player`
--

INSERT INTO `tbl_player` (`ID`, `NAME`, `BIRTH`, `PHONE`, `EMAIL`, `ADDRESS`, `FACE_BOOK`, `TWITER`, `GENDER`, `ACTIVE`) VALUES
(1, 'Jose de Jesus Nataren', '2012-12-26', '5526323716', 'Quekzy@love.com', 'cto, e. zapata nte', 'asf', 'asfd', 1, 1),
(2, 'Telerita Nataren Ramirez', '2012-12-17', '5526323716', 'jjjjjjj', 'hhh', 'hhh', 'hh', 1, 1),
(3, 'cachira', '2012-12-03', '123', 'sdfasdf', 'asf', 'asfsaf', 'asdfasfdsdf', 1, 1),
(4, 'Kezito', '2012-12-10', '1234', 'asfdsdf', 'sdf', 'asfsaf', 'asfd', 1, 1),
(5, 'Tontencia Hernandez', '2012-12-10', '1234', 'saf', 'sfd', 'saf', 'asdf', 2, 1),
(6, 'Empollencia Garcia', '2012-12-03', '123', 'asdf', 'asdf', 'asdf', 'asdfasfdsdf', 2, 1),
(7, 'Trolencia Martinez', '2002-12-24', '123', 'sdfasdf', 'fasd', 'sfd', 'asdfasfdsdf', 2, 1),
(8, 'Pola pol', '2007-12-24', '567890', 'hjk', 'hjksadf', 'asfsaf', 'asf', 2, 1),
(9, 'albertana cu', '2005-12-20', '13', 'jh', 'nb', 'o', 'v', 2, 1),
(10, 'Pollo medina', '1998-12-23', '1231', 'j', 'm', 'm', 'sdf', 1, 1),
(11, 'Otro jugador mas', '1980-07-14', '2345346845', 'jjnataren@hotmail.com', 'case me vale verga', 'es naco', 'menos', 1, 1),
(12, 'Angelica Hernanez Garcia', '1984-08-27', 'asdf', 'sadfsaf', 'sadf', 'asdf', 'asdfsdf', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_player_result`
--

CREATE TABLE IF NOT EXISTS `tbl_player_result` (
  `RESULT_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `MATCH_ID` int(11) NOT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `COMMENT` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`RESULT_ID`,`PLAYER_ID`,`MATCH_ID`),
  KEY `FK_REFERENCE_12` (`PLAYER_ID`),
  KEY `FK_REFERENCE_13` (`MATCH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_play_ground`
--

CREATE TABLE IF NOT EXISTS `tbl_play_ground` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(30) DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  `MAP_STRING` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_play_ground`
--

INSERT INTO `tbl_play_ground` (`ID`, `NAME`, `DESCRIPTION`, `ADDRESS`, `PHONE_NUMBER`, `ACTIVE`, `MAP_STRING`) VALUES
(1, 'Cancha Coca Cola', 'test', 'test', '55564485', 1, 'data'),
(2, 'Cancha numero 2', 'La numero 2', 'wherever', '4561321879', 1, '1223465798213');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE IF NOT EXISTS `tbl_team` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORY` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `CREATION_DATE` date DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_18` (`ID_CATEGORY`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`ID`, `ID_CATEGORY`, `NAME`, `ADDRESS`, `DESCRIPTION`, `EMAIL`, `CREATION_DATE`, `ACTIVE`) VALUES
(1, 1, 'Real Maiz', 'cto. E. Zapata Norte', 'Equpo muy conflictivo', 'realmaiz@soccer2.com', '0000-00-00', 1),
(3, 2, 'NECAXA', 'Por mi chante', 'Super Rayos del Necaxa', 'jjnataren@necaxa.com', '2012-12-19', 1),
(4, 1, 'America', 'algo', 'algo', 'algo', '2012-12-24', 1),
(5, 5, 'Pink Necaxa', 'asdf', 'sf', 'asdf', '2012-12-24', 1),
(6, 1, 'SAN ISIDRO', 'sf', 'asf', 'asdf', '2013-05-22', 1),
(7, 1, 'los reyes', 'saf', 'sdf', 'saf', '2013-05-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team_player`
--

CREATE TABLE IF NOT EXISTS `tbl_team_player` (
  `PLAYER_ID` int(11) NOT NULL,
  `TEAM_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `ADD_DATE` date DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  `NUMBER` int(100) NOT NULL DEFAULT '0',
  `ALIAS` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PLAYER_ID`,`TEAM_ID`),
  UNIQUE KEY `TEAM_ID` (`TEAM_ID`,`NUMBER`),
  UNIQUE KEY `PLAYER_ID` (`PLAYER_ID`),
  KEY `FK_REFERENCE_2` (`TEAM_ID`),
  KEY `FK_REFERENCE_3` (`ROLE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team_player`
--

INSERT INTO `tbl_team_player` (`PLAYER_ID`, `TEAM_ID`, `ROLE_ID`, `ADD_DATE`, `ACTIVE`, `NUMBER`, `ALIAS`) VALUES
(4, 1, 1, NULL, 1, 12, 'Amorcit'),
(9, 1, 1, NULL, 1, 9999, 'Ata'),
(10, 1, 1, '2013-07-01', 1, 6666, 'ffffff'),
(11, 4, 1, '2013-07-09', 1, 1111, 'eeeeeee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tournament`
--

CREATE TABLE IF NOT EXISTS `tbl_tournament` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORY` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(500) DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `BASES` varchar(500) DEFAULT NULL,
  `RULES` varchar(500) DEFAULT NULL,
  `PROMO` varchar(500) DEFAULT NULL,
  `STATUS` tinyint(4) NOT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_19` (`ID_CATEGORY`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_tournament`
--

INSERT INTO `tbl_tournament` (`ID`, `ID_CATEGORY`, `NAME`, `DESCRIPTION`, `START_DATE`, `END_DATE`, `BASES`, `RULES`, `PROMO`, `STATUS`, `ACTIVE`) VALUES
(1, 5, 'Torneo Apertura', 'Torneo para principiantes', '2012-01-01', '2012-06-01', NULL, NULL, NULL, 0, 1),
(2, 5, 'Torneo rosa perfumada', 'Torneo de principiantes', '2012-01-01', '2012-12-01', NULL, NULL, NULL, 0, 1),
(3, 1, 'VERANO 2013', 'Torne de juvenil', '2013-09-09', '2013-09-17', NULL, NULL, NULL, 0, 1),
(4, 1, 'zzzzz', 'sadf', '2013-09-04', '2013-09-26', NULL, NULL, NULL, 0, 1),
(5, 1, 'asf', 'asdf', '2013-09-04', '2013-10-01', 'zzzz', 'sadfasf', 'zzz', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tournament_team`
--

CREATE TABLE IF NOT EXISTS `tbl_tournament_team` (
  `ID_TOURNAMENT` int(11) NOT NULL,
  `ID_TEAM` int(11) NOT NULL,
  `ACTIVE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_TOURNAMENT`,`ID_TEAM`),
  KEY `FK_REFERENCE_20` (`ID_TEAM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tournament_team`
--

INSERT INTO `tbl_tournament_team` (`ID_TOURNAMENT`, `ID_TEAM`, `ACTIVE`) VALUES
(1, 1, 1),
(1, 4, 1),
(1, 6, 1),
(1, 7, 1),
(2, 5, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_document_player`
--
ALTER TABLE `tbl_document_player`
  ADD CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`ID_DOCUMENT`) REFERENCES `tbl_document` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_PLAYER`) REFERENCES `tbl_player` (`ID`);

--
-- Constraints for table `tbl_document_team`
--
ALTER TABLE `tbl_document_team`
  ADD CONSTRAINT `FK_REFERENCE_16` FOREIGN KEY (`ID_DOCUMENT`) REFERENCES `tbl_document` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_17` FOREIGN KEY (`ID_TEAM`) REFERENCES `tbl_team` (`ID`);

--
-- Constraints for table `tbl_match_game`
--
ALTER TABLE `tbl_match_game`
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`VISITOR`) REFERENCES `tbl_team` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`TOURNAMENT_ID`) REFERENCES `tbl_tournament` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`LOCAL`) REFERENCES `tbl_team` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`PLAY_GROUND_ID`) REFERENCES `tbl_play_ground` (`ID`);

--
-- Constraints for table `tbl_match_result`
--
ALTER TABLE `tbl_match_result`
  ADD CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`MATCH_ID`) REFERENCES `tbl_match_game` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`RESULT_ID`) REFERENCES `tbl_cat_result` (`ID`);

--
-- Constraints for table `tbl_player_result`
--
ALTER TABLE `tbl_player_result`
  ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`RESULT_ID`) REFERENCES `tbl_cat_result` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`PLAYER_ID`) REFERENCES `tbl_player` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`MATCH_ID`) REFERENCES `tbl_match_game` (`ID`);

--
-- Constraints for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `tbl_category` (`ID_CATEGORY`);

--
-- Constraints for table `tbl_team_player`
--
ALTER TABLE `tbl_team_player`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`PLAYER_ID`) REFERENCES `tbl_player` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`TEAM_ID`) REFERENCES `tbl_team` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ROLE_ID`) REFERENCES `tbl_cat_role` (`ID`);

--
-- Constraints for table `tbl_tournament`
--
ALTER TABLE `tbl_tournament`
  ADD CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `tbl_category` (`ID_CATEGORY`);

--
-- Constraints for table `tbl_tournament_team`
--
ALTER TABLE `tbl_tournament_team`
  ADD CONSTRAINT `FK_REFERENCE_20` FOREIGN KEY (`ID_TEAM`) REFERENCES `tbl_team` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
