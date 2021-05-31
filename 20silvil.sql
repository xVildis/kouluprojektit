-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2021 at 08:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20silvil`
--

-- --------------------------------------------------------

--
-- Table structure for table `d9_games`
--

CREATE TABLE `d9_games` (
  `gameid` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `company` varchar(60) NOT NULL,
  `release` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d9_games`
--

INSERT INTO `d9_games` (`gameid`, `name`, `company`, `release`) VALUES
(2, 'Fallout 3', 'Bethesda Game Studios', 2008),
(3, 'The Elder Scrolls III: Morrowind', 'Bethesda Game Studios', 2002),
(4, 'Fallout 76', 'Bethesda Game Studios', 2018),
(5, 'The Elder Scrolls IV: Oblivion', 'Bethesda Game Studios', 2006),
(6, 'The Elder Scrolls V: Skyrim', 'Bethesda Game Studios', 2011),
(7, 'Assassin\'s Creed', 'Ubisoft', 2007),
(8, 'Assassin\'s Creed II', 'Ubisoft', 2009),
(9, 'Assassin\'s Creed: Brotherhood', 'Ubisoft', 2010),
(10, 'Assassin\'s Creed: Revelations', 'Ubisoft', 2011),
(11, 'Assassin\'s Creed III', 'Ubisoft', 2012),
(12, 'Assassin\'s Creed IV: Black Flag', 'Ubisoft', 2013),
(13, 'Grand Theft Auto III', 'Rockstar Games', 2001),
(14, 'Max Payne', 'Remedy Entertainment', 2002),
(15, 'Grand Theft Auto: Vice City', 'Rockstar Games', 2002),
(16, 'Grand Theft Auto: San Andreas', 'Rockstar Games', 2004);

-- --------------------------------------------------------

--
-- Table structure for table `d14_characters`
--

CREATE TABLE `d14_characters` (
  `charId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `raceId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `stats` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`stats`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `h10_osallistujat`
--

CREATE TABLE `h10_osallistujat` (
  `osallistujaID` int(11) NOT NULL,
  `etunimi` varchar(50) NOT NULL,
  `sukunimi` varchar(50) NOT NULL,
  `paikkakunta` varchar(50) NOT NULL,
  `tapahtumaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h10_osallistujat`
--

INSERT INTO `h10_osallistujat` (`osallistujaID`, `etunimi`, `sukunimi`, `paikkakunta`, `tapahtumaID`) VALUES
(1, 'Aku', 'Ankka', 'Tampere', 2),
(8, 'Samu', 'Sirkka', 'Helsinki', 2),
(9, 'Jaska', 'Jokunen', 'Janakkala', 2),
(10, 'Roope', 'Ankka', 'Akaa', 2),
(11, 'Garri', 'Gasparov', 'Moskova', 3),
(12, 'Magnus', 'Carlsen', 'Oslo', 3),
(13, 'Nybäck', 'Tomi', 'Helsinki', 3);

-- --------------------------------------------------------

--
-- Table structure for table `h10_tapahtumat`
--

CREATE TABLE `h10_tapahtumat` (
  `tapahtumaID` int(11) NOT NULL,
  `nimi` varchar(50) NOT NULL,
  `paivays` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h10_tapahtumat`
--

INSERT INTO `h10_tapahtumat` (`tapahtumaID`, `nimi`, `paivays`) VALUES
(1, 'Kevätjuhla', '2021-05-30'),
(2, 'Lan-tapahtuma 2021', '2021-03-21'),
(3, 'Vappu', '2021-05-01'),
(7, 'Ystävänpäivä', '2020-02-14'),
(8, 'Mennyt jo', '2020-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `h11_characters`
--

CREATE TABLE `h11_characters` (
  `charID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `wisdom` int(11) NOT NULL,
  `charisma` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `hitpoints` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `raceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h11_characters`
--

INSERT INTO `h11_characters` (`charID`, `name`, `level`, `strength`, `dexterity`, `wisdom`, `charisma`, `intelligence`, `hitpoints`, `classID`, `raceID`) VALUES
(1, 'das', 10, 100, 30, 0, 100, 0, 1000, 3, 1),
(2, 'testi', 12, 10, 20, 100, 50, 70, 150, 2, 2),
(4, 'Eerikki', 3, 3, 3, 3, 3, 3, 3, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `h11_class`
--

CREATE TABLE `h11_class` (
  `classID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h11_class`
--

INSERT INTO `h11_class` (`classID`, `name`) VALUES
(1, 'bard'),
(2, 'wizard'),
(3, 'warrior'),
(4, 'thief');

-- --------------------------------------------------------

--
-- Table structure for table `h11_race`
--

CREATE TABLE `h11_race` (
  `raceID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `h11_race`
--

INSERT INTO `h11_race` (`raceID`, `name`) VALUES
(1, 'human'),
(2, 'elf'),
(3, 'dwarf');

-- --------------------------------------------------------

--
-- Table structure for table `mvc1_games`
--

CREATE TABLE `mvc1_games` (
  `gameID` int(10) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `singlePlayer` tinyint(1) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mvc1_games`
--

INSERT INTO `mvc1_games` (`gameID`, `gameName`, `singlePlayer`, `time`) VALUES
(1, 'CS GO', 0, '2020-01-20 15:15:00'),
(2, 'Fortnite', 0, '2020-01-09 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mvc1_players`
--

CREATE TABLE `mvc1_players` (
  `playerID` int(10) NOT NULL,
  `nickname` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `current_character` varchar(15) NOT NULL,
  `money` decimal(10,0) NOT NULL,
  `lastLogin` date NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `teamID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mvc1_players`
--

INSERT INTO `mvc1_players` (`playerID`, `nickname`, `password`, `email`, `current_character`, `money`, `lastLogin`, `banned`, `teamID`) VALUES
(1, 'Kunto', 'passu', 'hessu@outo.net', 'hirviö', '100', '2020-01-21', 0, 1),
(2, 'Armas', 'armain', 'armas@gmail.com', 'olio', '500', '2020-01-22', 0, NULL),
(4, 'Pelle', 'peloton', 'ilari@gmail.com', 'keiju', '500', '2020-01-22', 0, NULL),
(12, 'vildis', '$2y$10$/hzxzNwn9hUp6oAmIsnhkuZqOyPBBQ91LIhMcAn2T8DkzYlu6rehK', 'vildis@email.com', 'hirviö', '0', '2021-04-07', 0, NULL),
(13, 'asd', '$2y$10$FnKP0wUWH3aAMvuej9.PSup5YUyYUq4eDOZZDPQRDNAp7.XGi9liy', 'asd@asd.a', 'hirviö', '0', '2021-04-12', 0, NULL),
(14, '20silvil', '$2y$10$13sCui.oZotoxix6hYac4eJWFsbTirw32YRrU9Mg2t9vrEXurCWoi', 'vildis@mail.com', 'hirviö', '0', '2021-05-05', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mvc1_playersgames`
--

CREATE TABLE `mvc1_playersgames` (
  `playerGamesID` int(10) NOT NULL,
  `playerID` int(10) NOT NULL,
  `gameID` int(10) NOT NULL,
  `points` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mvc1_playersgames`
--

INSERT INTO `mvc1_playersgames` (`playerGamesID`, `playerID`, `gameID`, `points`) VALUES
(1, 1, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `mvc1_teams`
--

CREATE TABLE `mvc1_teams` (
  `teamID` int(10) NOT NULL,
  `teamName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mvc1_teams`
--

INSERT INTO `mvc1_teams` (`teamID`, `teamName`) VALUES
(1, 'Tappara'),
(2, 'PassiAlmat');

-- --------------------------------------------------------

--
-- Table structure for table `mvc1_teamsgames`
--

CREATE TABLE `mvc1_teamsgames` (
  `teamGamesID` int(10) NOT NULL,
  `teamID` int(10) NOT NULL,
  `gameID` int(10) NOT NULL,
  `placement` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mvc1_teamsgames`
--

INSERT INTO `mvc1_teamsgames` (`teamGamesID`, `teamID`, `gameID`, `placement`) VALUES
(1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mvc2_articles`
--

CREATE TABLE `mvc2_articles` (
  `articleId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `creationDate` datetime NOT NULL,
  `deletionDate` datetime NOT NULL,
  `creatorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mvc2_articles`
--

INSERT INTO `mvc2_articles` (`articleId`, `title`, `content`, `creationDate`, `deletionDate`, `creatorId`) VALUES
(1, 'testi', '<h1>asdads</h1>\r\n<p>mrororororororororororo</p>', '2021-04-12 10:46:16', '2021-04-26 10:46:16', 1),
(2, 'testi', '<h1>dasdasasdasdasd</h1>\r\n<p>bsadbasbz<bdsz</p>', '2021-04-13 13:47:30', '2021-04-27 10:46:16', 1),
(16, 'testi', 'moikka', '2021-04-14 10:04:24', '2021-04-14 10:04:24', 2),
(18, '4564556', '3315351', '2021-04-19 10:04:47', '2021-05-03 10:05:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mvc2_users`
--

CREATE TABLE `mvc2_users` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mvc2_users`
--

INSERT INTO `mvc2_users` (`userId`, `username`, `email`, `password`) VALUES
(1, 'asd', 'asd@asd.com', '$2y$10$jGlZS.RlmYnRlLXVHyVnmepVTyelwWmjDiAkIq6T16cDKrPM1CP4u'),
(2, '20silvil', 'viljami.sillanpaa@edu.tampere.fi', '$2y$10$9RgFe/SdqbzaWZCge0t1LecQcKbl86AzVt72p8pHfx6izPp5NhZLG'),
(3, 'testi', 'testi@email.com', '$2y$10$x0mg5WAGuQ8EpHwosxc.R.o1odzWFm5oUxyCc6FiPKQeICL63PdPu');

-- --------------------------------------------------------

--
-- Table structure for table `sql1_managers`
--

CREATE TABLE `sql1_managers` (
  `managerid` int(11) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `hiredate` date NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sql1_managers`
--

INSERT INTO `sql1_managers` (`managerid`, `lastname`, `firstname`, `hiredate`, `phone`, `email`) VALUES
(1, 'Jouni', 'Moro', '2010-07-25', '0458412324', 'moro.jouni@testi.com\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sql1_musicstyles`
--

CREATE TABLE `sql1_musicstyles` (
  `styleid` int(11) NOT NULL,
  `style` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sql1_musicstyles`
--

INSERT INTO `sql1_musicstyles` (`styleid`, `style`) VALUES
(1, 'Rock'),
(2, 'Heavy'),
(3, 'Rap'),
(4, 'HipHop');

-- --------------------------------------------------------

--
-- Table structure for table `sql1_performers`
--

CREATE TABLE `sql1_performers` (
  `performerid` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `performername` varchar(50) NOT NULL,
  `managerid` int(11) NOT NULL,
  `styleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sql1_performers`
--

INSERT INTO `sql1_performers` (`performerid`, `lastname`, `firstname`, `performername`, `managerid`, `styleid`) VALUES
(1, 'Jokunen', 'Joku', 'JokuJoku', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sql1_tourlocations`
--

CREATE TABLE `sql1_tourlocations` (
  `tourlocationid` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `postaladdress` varchar(50) NOT NULL,
  `postcity` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sql1_tourlocations`
--

INSERT INTO `sql1_tourlocations` (`tourlocationid`, `address`, `postaladdress`, `postcity`, `phone`) VALUES
(1, 'Jokukatu 5', '33470', 'Ylöjärvi', '045123456789');

-- --------------------------------------------------------

--
-- Table structure for table `sql1_tours`
--

CREATE TABLE `sql1_tours` (
  `tourid` int(11) NOT NULL,
  `startingdate` date NOT NULL,
  `startingtime` time NOT NULL,
  `performerid` int(11) NOT NULL,
  `tourlocationid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `urheilu_posts`
--

CREATE TABLE `urheilu_posts` (
  `postId` int(11) NOT NULL,
  `creatorId` int(11) NOT NULL,
  `sport` int(11) NOT NULL,
  `intensity` int(11) NOT NULL,
  `kcal` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `urheilu_users`
--

CREATE TABLE `urheilu_users` (
  `userId` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `registerDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vier_juttu`
--

CREATE TABLE `vier_juttu` (
  `jid` int(6) NOT NULL,
  `otsikko` varchar(100) DEFAULT NULL,
  `kpl` text DEFAULT NULL,
  `poistamispvm` date NOT NULL,
  `lisayspvm` date DEFAULT NULL,
  `kid` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vier_juttu`
--

INSERT INTO `vier_juttu` (`jid`, `otsikko`, `kpl`, `poistamispvm`, `lisayspvm`, `kid`) VALUES
(3, '5', '11sdasdsadasdsasdsdaczxczc123312', '2021-04-21', '2021-05-05', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vier_kayttaja`
--

CREATE TABLE `vier_kayttaja` (
  `kid` int(6) NOT NULL,
  `sukunimi` varchar(30) DEFAULT NULL,
  `etunimi` varchar(30) DEFAULT NULL,
  `ktunnus` varchar(30) DEFAULT NULL,
  `salasana` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vier_kayttaja`
--

INSERT INTO `vier_kayttaja` (`kid`, `sukunimi`, `etunimi`, `ktunnus`, `salasana`) VALUES
(5, 'ab', 'ab', '20silvil', 'd999e819c6473876ef8cd19ac90f4fc2');

-- --------------------------------------------------------

--
-- Table structure for table `vuokraus_account_types`
--

CREATE TABLE `vuokraus_account_types` (
  `typeId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vuokraus_account_types`
--

INSERT INTO `vuokraus_account_types` (`typeId`, `name`) VALUES
(1, 'admin'),
(2, 'opiskelija'),
(3, 'vuokranantaja');

-- --------------------------------------------------------

--
-- Table structure for table `vuokraus_house_listings`
--

CREATE TABLE `vuokraus_house_listings` (
  `houseId` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `address` varchar(127) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `price` float NOT NULL,
  `size` float NOT NULL,
  `extra` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`extra`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vuokraus_users`
--

CREATE TABLE `vuokraus_users` (
  `userId` int(11) NOT NULL,
  `typeId` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(512) NOT NULL,
  `phonenum` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d9_games`
--
ALTER TABLE `d9_games`
  ADD PRIMARY KEY (`gameid`);

--
-- Indexes for table `d14_characters`
--
ALTER TABLE `d14_characters`
  ADD PRIMARY KEY (`charId`);

--
-- Indexes for table `h10_osallistujat`
--
ALTER TABLE `h10_osallistujat`
  ADD PRIMARY KEY (`osallistujaID`),
  ADD KEY `tapahtumaID` (`tapahtumaID`);

--
-- Indexes for table `h10_tapahtumat`
--
ALTER TABLE `h10_tapahtumat`
  ADD PRIMARY KEY (`tapahtumaID`);

--
-- Indexes for table `h11_characters`
--
ALTER TABLE `h11_characters`
  ADD PRIMARY KEY (`charID`),
  ADD KEY `classID` (`classID`),
  ADD KEY `raceID` (`raceID`);

--
-- Indexes for table `h11_class`
--
ALTER TABLE `h11_class`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `h11_race`
--
ALTER TABLE `h11_race`
  ADD PRIMARY KEY (`raceID`);

--
-- Indexes for table `mvc1_games`
--
ALTER TABLE `mvc1_games`
  ADD PRIMARY KEY (`gameID`);

--
-- Indexes for table `mvc1_players`
--
ALTER TABLE `mvc1_players`
  ADD PRIMARY KEY (`playerID`),
  ADD KEY `teamID` (`teamID`);

--
-- Indexes for table `mvc1_playersgames`
--
ALTER TABLE `mvc1_playersgames`
  ADD PRIMARY KEY (`playerGamesID`),
  ADD KEY `playerID` (`playerID`,`gameID`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `mvc1_teams`
--
ALTER TABLE `mvc1_teams`
  ADD PRIMARY KEY (`teamID`);

--
-- Indexes for table `mvc1_teamsgames`
--
ALTER TABLE `mvc1_teamsgames`
  ADD PRIMARY KEY (`teamGamesID`),
  ADD KEY `teamID` (`teamID`),
  ADD KEY `gameID` (`gameID`);

--
-- Indexes for table `mvc2_articles`
--
ALTER TABLE `mvc2_articles`
  ADD PRIMARY KEY (`articleId`),
  ADD KEY `creatorId` (`creatorId`);

--
-- Indexes for table `mvc2_users`
--
ALTER TABLE `mvc2_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `sql1_managers`
--
ALTER TABLE `sql1_managers`
  ADD PRIMARY KEY (`managerid`);

--
-- Indexes for table `sql1_musicstyles`
--
ALTER TABLE `sql1_musicstyles`
  ADD PRIMARY KEY (`styleid`);

--
-- Indexes for table `sql1_performers`
--
ALTER TABLE `sql1_performers`
  ADD PRIMARY KEY (`performerid`),
  ADD KEY `managerid` (`managerid`),
  ADD KEY `styleid` (`styleid`);

--
-- Indexes for table `sql1_tourlocations`
--
ALTER TABLE `sql1_tourlocations`
  ADD PRIMARY KEY (`tourlocationid`);

--
-- Indexes for table `sql1_tours`
--
ALTER TABLE `sql1_tours`
  ADD PRIMARY KEY (`tourid`),
  ADD KEY `performerid` (`performerid`),
  ADD KEY `tourlocationid` (`tourlocationid`);

--
-- Indexes for table `urheilu_posts`
--
ALTER TABLE `urheilu_posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `urheilu_users`
--
ALTER TABLE `urheilu_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `vier_juttu`
--
ALTER TABLE `vier_juttu`
  ADD PRIMARY KEY (`jid`),
  ADD KEY `vieras` (`kid`);

--
-- Indexes for table `vier_kayttaja`
--
ALTER TABLE `vier_kayttaja`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `vuokraus_account_types`
--
ALTER TABLE `vuokraus_account_types`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `vuokraus_house_listings`
--
ALTER TABLE `vuokraus_house_listings`
  ADD PRIMARY KEY (`houseId`);

--
-- Indexes for table `vuokraus_users`
--
ALTER TABLE `vuokraus_users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `typeId` (`typeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d9_games`
--
ALTER TABLE `d9_games`
  MODIFY `gameid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `d14_characters`
--
ALTER TABLE `d14_characters`
  MODIFY `charId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `h10_osallistujat`
--
ALTER TABLE `h10_osallistujat`
  MODIFY `osallistujaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `h10_tapahtumat`
--
ALTER TABLE `h10_tapahtumat`
  MODIFY `tapahtumaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `h11_characters`
--
ALTER TABLE `h11_characters`
  MODIFY `charID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `h11_class`
--
ALTER TABLE `h11_class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `h11_race`
--
ALTER TABLE `h11_race`
  MODIFY `raceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mvc1_games`
--
ALTER TABLE `mvc1_games`
  MODIFY `gameID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mvc1_players`
--
ALTER TABLE `mvc1_players`
  MODIFY `playerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mvc1_playersgames`
--
ALTER TABLE `mvc1_playersgames`
  MODIFY `playerGamesID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mvc1_teams`
--
ALTER TABLE `mvc1_teams`
  MODIFY `teamID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mvc1_teamsgames`
--
ALTER TABLE `mvc1_teamsgames`
  MODIFY `teamGamesID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mvc2_articles`
--
ALTER TABLE `mvc2_articles`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mvc2_users`
--
ALTER TABLE `mvc2_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sql1_managers`
--
ALTER TABLE `sql1_managers`
  MODIFY `managerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sql1_musicstyles`
--
ALTER TABLE `sql1_musicstyles`
  MODIFY `styleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sql1_performers`
--
ALTER TABLE `sql1_performers`
  MODIFY `performerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sql1_tourlocations`
--
ALTER TABLE `sql1_tourlocations`
  MODIFY `tourlocationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sql1_tours`
--
ALTER TABLE `sql1_tours`
  MODIFY `tourid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `urheilu_posts`
--
ALTER TABLE `urheilu_posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `urheilu_users`
--
ALTER TABLE `urheilu_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vier_juttu`
--
ALTER TABLE `vier_juttu`
  MODIFY `jid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vier_kayttaja`
--
ALTER TABLE `vier_kayttaja`
  MODIFY `kid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vuokraus_account_types`
--
ALTER TABLE `vuokraus_account_types`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vuokraus_house_listings`
--
ALTER TABLE `vuokraus_house_listings`
  MODIFY `houseId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vuokraus_users`
--
ALTER TABLE `vuokraus_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `h10_osallistujat`
--
ALTER TABLE `h10_osallistujat`
  ADD CONSTRAINT `h10_osallistujat_ibfk_1` FOREIGN KEY (`tapahtumaID`) REFERENCES `h10_tapahtumat` (`tapahtumaID`);

--
-- Constraints for table `h11_characters`
--
ALTER TABLE `h11_characters`
  ADD CONSTRAINT `h11_characters_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `h11_class` (`classID`),
  ADD CONSTRAINT `h11_characters_ibfk_2` FOREIGN KEY (`raceID`) REFERENCES `h11_race` (`raceID`);

--
-- Constraints for table `mvc1_players`
--
ALTER TABLE `mvc1_players`
  ADD CONSTRAINT `mvc1_players_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `mvc1_teams` (`teamID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mvc1_playersgames`
--
ALTER TABLE `mvc1_playersgames`
  ADD CONSTRAINT `mvc1_playersgames_ibfk_1` FOREIGN KEY (`playerID`) REFERENCES `mvc1_players` (`playerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `mvc1_playersgames_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `mvc1_games` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mvc1_teamsgames`
--
ALTER TABLE `mvc1_teamsgames`
  ADD CONSTRAINT `mvc1_teamsgames_ibfk_1` FOREIGN KEY (`teamID`) REFERENCES `mvc1_teams` (`teamID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `mvc1_teamsgames_ibfk_2` FOREIGN KEY (`gameID`) REFERENCES `mvc1_games` (`gameID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mvc2_articles`
--
ALTER TABLE `mvc2_articles`
  ADD CONSTRAINT `mvc2_articles_ibfk_1` FOREIGN KEY (`creatorId`) REFERENCES `mvc2_users` (`userId`);

--
-- Constraints for table `sql1_performers`
--
ALTER TABLE `sql1_performers`
  ADD CONSTRAINT `sql1_performers_ibfk_1` FOREIGN KEY (`managerid`) REFERENCES `sql1_managers` (`managerid`),
  ADD CONSTRAINT `sql1_performers_ibfk_2` FOREIGN KEY (`styleid`) REFERENCES `sql1_musicstyles` (`styleid`);

--
-- Constraints for table `sql1_tours`
--
ALTER TABLE `sql1_tours`
  ADD CONSTRAINT `sql1_tours_ibfk_1` FOREIGN KEY (`tourlocationid`) REFERENCES `sql1_tourlocations` (`tourlocationid`);

--
-- Constraints for table `vier_juttu`
--
ALTER TABLE `vier_juttu`
  ADD CONSTRAINT `vieras` FOREIGN KEY (`kid`) REFERENCES `vier_kayttaja` (`kid`);

--
-- Constraints for table `vuokraus_users`
--
ALTER TABLE `vuokraus_users`
  ADD CONSTRAINT `vuokraus_users_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `vuokraus_account_types` (`typeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
