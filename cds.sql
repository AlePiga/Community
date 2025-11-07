-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 07, 2025 alle 18:14
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `community`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cds`
--

CREATE TABLE `cds` (
  `ID` int(11) NOT NULL,
  `Album` varchar(865) NOT NULL,
  `Interprete` varchar(52) NOT NULL,
  `Anno` smallint(4) NOT NULL,
  `Paese` varchar(56) NOT NULL,
  `Rating` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cds`
--

INSERT INTO `cds` (`ID`, `Album`, `Interprete`, `Anno`, `Paese`, `Rating`) VALUES
(1, 'ONE PATTERN', 'P-MODEL', 1986, 'Giappone', 5),
(2, 'Yeezus', 'Kanye West', 2013, 'Stati Uniti', 5),
(3, 'Atom Heart Mother', 'Pink Floyd', 1970, 'Regno Unito', 5),
(4, 'Aja', 'Steely Dan', 1977, 'Stati Uniti', 5),
(5, 'Donda (Deluxe)', 'Kanye West', 2021, 'Stati Uniti', 4),
(6, 'I LAY DOWN MY LIFE FOR YOU (DIRECTOR\'S CUT)', 'JPEGMAFIA', 2025, 'Stati Uniti', 5),
(7, 'In Rainbows', 'Radiohead', 2007, 'Regno Unito', 3);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cds`
--
ALTER TABLE `cds`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
