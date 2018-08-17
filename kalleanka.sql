-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 02 aug 2018 kl 11:42
-- Serverversion: 10.1.34-MariaDB
-- PHP-version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `kalleanka`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `highscore`
--

CREATE TABLE `highscore` (
  `Id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Score` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `highscore`
--

INSERT INTO `highscore` (`Id`, `Name`, `Score`) VALUES
(0, 'Kalle Anka', 1),
(1, 'Musse Pigg', 2),
(2, 'Mimmi Pigg', 3),
(3, 'Kajsa Anka', 4),
(4, 'Janne Långben', 5),
(5, 'Knatte Anka', 6),
(6, 'Fnatte Anka', 7),
(7, 'Tjatte Anka', 8),
(8, 'Pluto Långben', 9),
(9, 'Joakim von Anka', 10),
(10, 'Svarte Petter', 11),
(11, 'Alexander Lukas', 12),
(38, 'asfas', 7);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `highscore`
--
ALTER TABLE `highscore`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `highscore`
--
ALTER TABLE `highscore`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
