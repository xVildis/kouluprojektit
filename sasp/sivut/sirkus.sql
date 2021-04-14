-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24.09.2020 klo 13:21
-- Palvelimen versio: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirkus`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `esitys`
--

CREATE TABLE `esitys` (
  `esitysID` int(11) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `esityspaikka` varchar(50) NOT NULL,
  `kaupunki` varchar(50) NOT NULL,
  `pvm` date NOT NULL,
  `paikat` int(11) NOT NULL,
  `vapaitapaikkoja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `esitys`
--

INSERT INTO `esitys` (`esitysID`, `nimi`, `esityspaikka`, `kaupunki`, `pvm`, `paikat`, `vapaitapaikkoja`) VALUES
(1, 'Sorin-sirkus', 'Sorin aukio', 'Tampere', '2021-11-19', 100, 100),
(2, 'Zombie-juhla', 'Särkänniemi', 'Tampere', '2021-10-20', 100, 90);

-- --------------------------------------------------------

--
-- Rakenne taululle `tilaaja`
--

CREATE TABLE `tilaaja` (
  `tilaajaID` int(11) NOT NULL,
  `sposti` varchar(150) NOT NULL,
  `puhelin` varchar(20) NOT NULL,
  `paikkojenlkm` int(11) NOT NULL,
  `esitysID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `tilaaja`
--

INSERT INTO `tilaaja` (`tilaajaID`, `sposti`, `puhelin`, `paikkojenlkm`, `esitysID`) VALUES
(1, 'testi.testaaja@gmail.com', '+358 50 123 1234', 10, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `esitys`
--
ALTER TABLE `esitys`
  ADD PRIMARY KEY (`esitysID`);

--
-- Indexes for table `tilaaja`
--
ALTER TABLE `tilaaja`
  ADD PRIMARY KEY (`tilaajaID`),
  ADD KEY `esitysID` (`esitysID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `esitys`
--
ALTER TABLE `esitys`
  MODIFY `esitysID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tilaaja`
--
ALTER TABLE `tilaaja`
  MODIFY `tilaajaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `tilaaja`
--
ALTER TABLE `tilaaja`
  ADD CONSTRAINT `tilaaja_ibfk_1` FOREIGN KEY (`esitysID`) REFERENCES `esitys` (`esitysID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
