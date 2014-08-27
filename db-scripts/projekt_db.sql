-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Aug 2014 um 13:32
-- Server Version: 5.6.16
-- PHP-Version: 5.5.11

create database projekt_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `projekt_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alliances`
--

CREATE TABLE IF NOT EXISTS `alliances` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL COMMENT 'Name der Allianz begrenzt auf 25 Zeichen',
  `Leader_ID` int(9) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`),
  KEY `all_leader_id_fk` (`Leader_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alliance_user`
--

CREATE TABLE IF NOT EXISTS `alliance_user` (
  `User_ID` int(9) NOT NULL,
  `Alliance_ID` int(9) NOT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `Alliance_ID` (`Alliance_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Eindeutige ID',
  `From_ID` int(9) NOT NULL COMMENT 'Sendender User',
  `To_ID` int(9) NOT NULL COMMENT 'Empfangener User',
  `unread` int(1) NOT NULL DEFAULT '1' COMMENT '0 Wenn gelesen 1 wenn nicht gelesen',
  `Title` varchar(25) NOT NULL COMMENT 'Titel der Nachricht Maximal 25 Zeichen',
  `Text` text NOT NULL COMMENT 'Text der Nachricht',
  PRIMARY KEY (`ID`),
  KEY `mes_from_id_fk` (`From_ID`),
  KEY `mes_to_id_fk` (`To_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL COMMENT 'Name der Bezahlmethode',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `payment_orders`
--

CREATE TABLE IF NOT EXISTS `payment_orders` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `User_ID` int(9) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Points` int(10) NOT NULL,
  `Method_ID` int(9) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `pmt_user_ID_fk` (`User_ID`),
  KEY `pmt_method_ID_fk` (`Method_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(9) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL COMMENT 'Benutzername',
  `Email` varchar(250) NOT NULL COMMENT 'Emailadresse',
  `Password` varchar(255) NOT NULL COMMENT 'Gehashtes Passwort',
  `Description` varchar(255) DEFAULT NULL COMMENT 'Nutzerinfos',
  `Points` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`,`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `alliances`
--
ALTER TABLE `alliances`
  ADD CONSTRAINT `all_leader_id_fk` FOREIGN KEY (`Leader_ID`) REFERENCES `user` (`ID`);

--
-- Constraints der Tabelle `alliance_user`
--
ALTER TABLE `alliance_user`
  ADD CONSTRAINT `all_alliance_ID_fk` FOREIGN KEY (`Alliance_ID`) REFERENCES `alliances` (`ID`),
  ADD CONSTRAINT `all_user_id_fk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);

--
-- Constraints der Tabelle `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `mes_to_id_fk` FOREIGN KEY (`To_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `mes_from_id_fk` FOREIGN KEY (`From_ID`) REFERENCES `user` (`ID`);

--
-- Constraints der Tabelle `payment_orders`
--
ALTER TABLE `payment_orders`
  ADD CONSTRAINT `pmt_method_ID_fk` FOREIGN KEY (`Method_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `pmt_user_ID_fk` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
