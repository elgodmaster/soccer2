-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2013 a las 19:19:18
-- Versión del servidor: 5.5.27-log
-- Versión de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `soccer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_category`
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
-- Volcado de datos para la tabla `tbl_category`
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
-- Estructura de tabla para la tabla `tbl_cat_result`
--

CREATE TABLE IF NOT EXISTS `tbl_cat_result` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cat_role`
--

CREATE TABLE IF NOT EXISTS `tbl_cat_role` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_cat_role`
--

INSERT INTO `tbl_cat_role` (`ID`, `NAME`, `DESCRIPTION`, `ACTIVE`) VALUES
(1, 'Delantero', 'Jugador delantero del equipo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_document`
--

CREATE TABLE IF NOT EXISTS `tbl_document` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) DEFAULT NULL,
  `TYPE_DOCUMENT` smallint(6) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_document`
--

INSERT INTO `tbl_document` (`ID`, `NAME`, `TYPE_DOCUMENT`, `DESCRIPTION`) VALUES
(1, 'Foto de Perfil', 1, 'f'),
(2, 'Acta de Nacimiento', 1, 'algo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_document_player`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tbl_document_player`
--

INSERT INTO `tbl_document_player` (`ID_DOCUMENT_PLAYER`, `ID_DOCUMENT`, `ID_PLAYER`, `PATH`, `SIZE`, `NAME`, `DESCRIPTION`, `THUMBNAIL`, `TYPE`, `DELTYPE`, `DELURL`, `STATUS`) VALUES
(1, 1, 1, '/soccer2/files/papito%20%281%29.jpg', 13678, 'papito (1).jpg', 'Foto de perfil', '/soccer2/files/thumbnail/papito%20%281%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=papito%20%281%29.jpg', 0),
(2, 2, 1, '/soccer2/files/Lighthouse.jpg', 561276, 'Lighthouse.jpg', 'Foto Promocional', '/soccer2/files/thumbnail/Lighthouse.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=Lighthouse.jpg', 0),
(3, 1, 2, '/soccer2/files/telerita.%20%281%29.jpg', 8508, 'telerita. (1).jpg', 'fotoPerfil', '/soccer2/files/thumbnail/telerita.%20%281%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=telerita.%20%281%29.jpg', 1),
(4, 1, 1, '/soccer2/files/telerita.%20%282%29.jpg', 8508, 'telerita. (2).jpg', 'telerita..jpg', '/soccer2/files/thumbnail/telerita.%20%282%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=telerita.%20%282%29.jpg', 0),
(5, 1, 1, '/soccer2/files/1353452294_4.png', 1241, '1353452294_4.png', '1353452294_4.png', '/soccer2/files/thumbnail/1353452294_4.png', 'image/png', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=1353452294_4.png', 0),
(6, 2, 1, '/soccer2/files/Quetzal_by_Crippler_struggler.jpg', 81727, 'Quetzal_by_Crippler_struggler.jpg', 'Quetzal_by_Crippler_struggler.jpg', '/soccer2/files/thumbnail/Quetzal_by_Crippler_struggler.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=Quetzal_by_Crippler_struggler.jpg', 0),
(7, 2, 1, '/soccer2/files/602364_3890044460809_1254160810_n.jpg', 40535, '602364_3890044460809_1254160810_n.jpg', '602364_3890044460809_1254160810_n.jpg', '/soccer2/files/thumbnail/602364_3890044460809_1254160810_n.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=602364_3890044460809_1254160810_n.jpg', 0),
(8, 1, 1, '/soccer2/files/qutzal.jpg', 7085, 'qutzal.jpg', 'qutzal.jpg', '/soccer2/files/thumbnail/qutzal.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=qutzal.jpg', 1),
(9, 1, 2, '/soccer2/files/qutzal%20%281%29.jpg', 7085, 'qutzal (1).jpg', 'qutzal.jpg', '/soccer2/files/thumbnail/qutzal%20%281%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=qutzal%20%281%29.jpg', 0),
(10, 1, 3, '/soccer2/files/qutzal%20%282%29.jpg', 7085, 'qutzal (2).jpg', 'fotito', '/soccer2/files/thumbnail/qutzal%20%282%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=qutzal%20%282%29.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_document_team`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_document_team`
--

INSERT INTO `tbl_document_team` (`ID_DOCUMENT_TEAM`, `ID_DOCUMENT`, `ID_TEAM`, `PATH`, `SIZE`, `NAME`, `DESCRIPTION`, `THUMBNAIL`, `TYPE`, `DELTYPE`, `DELURL`, `STATUS`) VALUES
(1, 1, 1, '/soccer2/files/mijita%20%281%29.png', 40791, 'mijita (1).png', 'mijita.png', '/soccer2/files/thumbnail/mijita%20%281%29.png', 'image/png', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=mijita%20%281%29.png', 1),
(2, 1, 1, '/soccer2/files/qutzal%20%284%29.jpg', 7085, 'qutzal (4).jpg', 'qutzal.jpg', '/soccer2/files/thumbnail/qutzal%20%284%29.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=qutzal%20%284%29.jpg', 1),
(3, 1, 1, '/soccer2/files/Jellyfish.jpg', 775702, 'Jellyfish.jpg', 'Jellyfish.jpg', '/soccer2/files/thumbnail/Jellyfish.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=Jellyfish.jpg', 1),
(4, 1, 1, '/soccer2/files/Hydrangeas.jpg', 595284, 'Hydrangeas.jpg', 'Hydrangeas.jpg', '/soccer2/files/thumbnail/Hydrangeas.jpg', 'image/jpeg', 'DELETE', '/soccer2/index.php?r=player/deleteDocument&file=Hydrangeas.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_match_game`
--

CREATE TABLE IF NOT EXISTS `tbl_match_game` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLAY_GROUND_ID` int(11) DEFAULT NULL,
  `VISITOR` int(11) DEFAULT NULL,
  `TOURNAMENT_ID` int(11) DEFAULT NULL,
  `LOCAL` int(11) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  `NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_5` (`VISITOR`),
  KEY `FK_REFERENCE_6` (`TOURNAMENT_ID`),
  KEY `FK_REFERENCE_7` (`LOCAL`),
  KEY `FK_REFERENCE_8` (`PLAY_GROUND_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_match_result`
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_player`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tbl_player`
--

INSERT INTO `tbl_player` (`ID`, `NAME`, `BIRTH`, `PHONE`, `EMAIL`, `ADDRESS`, `FACE_BOOK`, `TWITER`, `GENDER`, `ACTIVE`) VALUES
(1, 'Jose de Jesus Nataren', '2012-12-26', '5526323716', 'Quekzy@love.com', 'cto, e. zapata nte', 'asf', 'asfd', 1, 1),
(2, 'Alberto Ve', '2012-12-03', '5526323716', 'jjjjjjj', 'hhh', 'hhh', 'hh', 1, 1),
(3, 'cachira', '2012-12-03', '123', 'sdfasdf', 'asf', 'asfsaf', 'asdfasfdsdf', 1, 1),
(4, 'Kezito', '2012-12-10', '1234', 'asfdsdf', 'sdf', 'asfsaf', 'asfd', 1, 1),
(5, 'Tontencia Hernandez', '2012-12-10', '1234', 'saf', 'sfd', 'saf', 'asdf', 2, 1),
(6, 'Empollencia Garcia', '2012-12-03', '123', 'asdf', 'asdf', 'asdf', 'asdfasfdsdf', 2, 1),
(7, 'Trolencia Martinez', '2002-12-24', '123', 'sdfasdf', 'fasd', 'sfd', 'asdfasfdsdf', 2, 1),
(8, 'Pola pol', '2007-12-24', '567890', 'hjk', 'hjksadf', 'asfsaf', 'asf', 2, 1),
(9, 'albertana cu', '2005-12-20', '13', 'jh', 'nb', 'o', 'v', 2, 1),
(10, 'Pollo medina', '1998-12-23', '1231', 'j', 'm', 'm', 'sdf', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_player_result`
--

CREATE TABLE IF NOT EXISTS `tbl_player_result` (
  `RESULT_ID` int(11) NOT NULL,
  `PLAYER_ID` int(11) NOT NULL,
  `MATCH_ID` int(11) NOT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `DESCRIPTION` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`RESULT_ID`,`PLAYER_ID`,`MATCH_ID`),
  KEY `FK_REFERENCE_12` (`PLAYER_ID`),
  KEY `FK_REFERENCE_13` (`MATCH_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_play_ground`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_team`
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
-- Volcado de datos para la tabla `tbl_team`
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
-- Estructura de tabla para la tabla `tbl_team_player`
--

CREATE TABLE IF NOT EXISTS `tbl_team_player` (
  `PLAYER_ID` int(11) NOT NULL,
  `TEAM_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `ADD_DATE` date DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  `NUMBER` varchar(100) DEFAULT NULL,
  `ALIAS` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`PLAYER_ID`,`TEAM_ID`),
  KEY `FK_REFERENCE_2` (`TEAM_ID`),
  KEY `FK_REFERENCE_3` (`ROLE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_team_player`
--

INSERT INTO `tbl_team_player` (`PLAYER_ID`, `TEAM_ID`, `ROLE_ID`, `ADD_DATE`, `ACTIVE`, `NUMBER`, `ALIAS`) VALUES
(4, 1, 1, NULL, 1, '12', 'Amorcit'),
(9, 5, 1, NULL, 1, '9999', 'Ata'),
(10, 3, 1, NULL, 0, '1', 'Pollito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tournament`
--

CREATE TABLE IF NOT EXISTS `tbl_tournament` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORY` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(500) DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `ACTIVE` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_REFERENCE_19` (`ID_CATEGORY`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_tournament`
--

INSERT INTO `tbl_tournament` (`ID`, `ID_CATEGORY`, `NAME`, `DESCRIPTION`, `START_DATE`, `END_DATE`, `ACTIVE`) VALUES
(1, 1, 'Torneo Apertura', 'Torneo para principiantes', '2012-01-01', '2012-06-01', 1),
(2, 5, 'Torneo rosa perfumada', 'Torneo de principiantes', '2012-01-01', '2012-12-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tournament_team`
--

CREATE TABLE IF NOT EXISTS `tbl_tournament_team` (
  `ID_TOURNAMENT` int(11) NOT NULL,
  `ID_TEAM` int(11) NOT NULL,
  `ACTIVE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_TOURNAMENT`,`ID_TEAM`),
  KEY `FK_REFERENCE_20` (`ID_TEAM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tournament_team`
--

INSERT INTO `tbl_tournament_team` (`ID_TOURNAMENT`, `ID_TEAM`, `ACTIVE`) VALUES
(1, 1, 1),
(1, 4, 1),
(1, 6, 1),
(1, 7, 1),
(2, 5, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_document_player`
--
ALTER TABLE `tbl_document_player`
  ADD CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`ID_DOCUMENT`) REFERENCES `tbl_document` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_PLAYER`) REFERENCES `tbl_player` (`ID`);

--
-- Filtros para la tabla `tbl_document_team`
--
ALTER TABLE `tbl_document_team`
  ADD CONSTRAINT `FK_REFERENCE_16` FOREIGN KEY (`ID_DOCUMENT`) REFERENCES `tbl_document` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_17` FOREIGN KEY (`ID_TEAM`) REFERENCES `tbl_team` (`ID`);

--
-- Filtros para la tabla `tbl_match_game`
--
ALTER TABLE `tbl_match_game`
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`VISITOR`) REFERENCES `tbl_team` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`TOURNAMENT_ID`) REFERENCES `tbl_tournament` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`LOCAL`) REFERENCES `tbl_team` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`PLAY_GROUND_ID`) REFERENCES `tbl_play_ground` (`ID`);

--
-- Filtros para la tabla `tbl_match_result`
--
ALTER TABLE `tbl_match_result`
  ADD CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`MATCH_ID`) REFERENCES `tbl_match_game` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`RESULT_ID`) REFERENCES `tbl_cat_result` (`ID`);

--
-- Filtros para la tabla `tbl_player_result`
--
ALTER TABLE `tbl_player_result`
  ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`RESULT_ID`) REFERENCES `tbl_cat_result` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`PLAYER_ID`) REFERENCES `tbl_player` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`MATCH_ID`) REFERENCES `tbl_match_game` (`ID`);

--
-- Filtros para la tabla `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `tbl_category` (`ID_CATEGORY`);

--
-- Filtros para la tabla `tbl_team_player`
--
ALTER TABLE `tbl_team_player`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`PLAYER_ID`) REFERENCES `tbl_player` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`TEAM_ID`) REFERENCES `tbl_team` (`ID`),
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ROLE_ID`) REFERENCES `tbl_cat_role` (`ID`);

--
-- Filtros para la tabla `tbl_tournament`
--
ALTER TABLE `tbl_tournament`
  ADD CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`ID_CATEGORY`) REFERENCES `tbl_category` (`ID_CATEGORY`);

--
-- Filtros para la tabla `tbl_tournament_team`
--
ALTER TABLE `tbl_tournament_team`
  ADD CONSTRAINT `FK_REFERENCE_20` FOREIGN KEY (`ID_TEAM`) REFERENCES `tbl_team` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
