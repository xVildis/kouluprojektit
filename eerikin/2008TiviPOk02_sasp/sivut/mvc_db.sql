-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: magnesium:3306
-- Generation Time: 29.01.2020 klo 10:30
-- Palvelimen versio: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db1908a_leena`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `gameID` int(10) NOT NULL AUTO_INCREMENT,
  `gameName` varchar(50) NOT NULL,
  `singlePlayer` tinyint(1) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`gameID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vedos taulusta `games`
--

INSERT INTO `games` (`gameID`, `gameName`, `singlePlayer`, `time`) VALUES
(1, 'CS GO', 0, '2020-01-20 15:15:00'),
(2, 'Fortnite', 0, '2020-01-09 18:00:00');

-- --------------------------------------------------------

--
-- Rakenne taululle `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `playerID` int(10) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `current_character` varchar(15) NOT NULL,
  `money` decimal(10,0) NOT NULL,
  `lastLogin` date NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `teamID` int(10) DEFAULT NULL,
  PRIMARY KEY (`playerID`),
  KEY `teamID` (`teamID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Vedos taulusta `players`
--

INSERT INTO `players` (`playerID`, `nickname`, `password`, `email`, `current_character`, `money`, `lastLogin`, `banned`, `teamID`) VALUES
(1, 'Kunto', 'passu', 'hessu@outo.net', 'hirviÃ¶', '100', '2020-01-21', 0, 1),
(2, 'Armas', 'armain', 'armas@gmail.com', 'olio', '500', '2020-01-22', 0, NULL),
(4, 'Pelle', 'peloton', 'ilari@gmail.com', 'keiju', '500', '2020-01-22', 0, NULL),
(5, 'Eriel', 'eriel', 'erile@gmail.com', 'keiju', '500', '2020-01-28', 0, NULL);

-- --------------------------------------------------------

--
-- Rakenne taululle `playersgames`
--

CREATE TABLE IF NOT EXISTS `playersgames` (
  `playerGamesID` int(10) NOT NULL AUTO_INCREMENT,
  `playerID` int(10) NOT NULL,
  `gameID` int(10) NOT NULL,
  `points` int(6) NOT NULL,
  PRIMARY KEY (`playerGamesID`),
  KEY `playerID` (`playerID`,`gameID`),
  KEY `gameID` (`gameID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vedos taulusta `playersgames`
--

INSERT INTO `playersgames` (`playerGamesID`, `playerID`, `gameID`, `points`) VALUES
(1, 1, 2, 100);

-- --------------------------------------------------------

--
-- Rakenne taululle `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `teamID` int(10) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(50) NOT NULL,
  PRIMARY KEY (`teamID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Vedos taulusta `teams`
--

INSERT INTO `teams` (`teamID`, `teamName`) VALUES
(1, 'Tappara'),
(2, 'PassiAlmat');

-- --------------------------------------------------------

--
-- Rakenne taululle `teamsgames`
--

CREATE TABLE IF NOT EXISTS `teamsgames` (
  `teamGamesID` int(10) NOT NULL AUTO_INCREMENT,
  `teamID` int(10) NOT NULL,
  `gameID` int(10) NOT NULL,
  `placement` int(3) NOT NULL,
  PRIMARY KEY (`teamGamesID`),
  KEY `teamID` (`teamID`),
  KEY `gameID` (`gameID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Vedos taulusta `teamsgames`
--

INSERT INTO `teamsgames` (`teamGamesID`, `teamID`, `gameID`, `placement`) VALUES
(1, 1, 1, 2);

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `teams` (`teamID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Rajoitteet taululle `playersgames`
--
ALTER TABLE `playersgames`
  ADD CONSTRAINT `playersgames_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `games` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playersgames_ibfk_1` FOREIGN KEY (`playerID`) REFERENCES `players` (`playerID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Rajoitteet taululle `teamsgames`
--
ALTER TABLE `teamsgames`
  ADD CONSTRAINT `teamsgames_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `games` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teamsgames_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `teams` (`teamID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;