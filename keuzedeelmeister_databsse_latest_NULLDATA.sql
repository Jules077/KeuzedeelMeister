-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 02:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuzedeelmeister`
--

-- --------------------------------------------------------

--
-- Table structure for table `kz_docenten`
--

CREATE TABLE `kz_docenten` (
  `docent_id` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) DEFAULT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `tussenvoegsel` varchar(255) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kz_keuzedelen`
--

CREATE TABLE `kz_keuzedelen` (
  `keuzedeel_ID` int(5) NOT NULL,
  `keuzedeel_info_url` varchar(255) DEFAULT NULL,
  `keuzedeel_info` varchar(255) DEFAULT NULL,
  `keuzedeelNummer` varchar(25) NOT NULL,
  `versie` varchar(20) NOT NULL,
  `docent` varchar(55) NOT NULL,
  `plaatsen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kz_klas`
--

CREATE TABLE `kz_klas` (
  `klas_naam` varchar(255) NOT NULL,
  `opleiding_crebo` int(11) DEFAULT NULL,
  `start_kiezen` datetime NOT NULL,
  `eind_kiezen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kz_opleiding`
--

CREATE TABLE `kz_opleiding` (
  `opleiding_ID` int(11) NOT NULL,
  `crebo` varchar(11) NOT NULL,
  `opleiding_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kz_opleiding_keuzedelen_junction`
--

CREATE TABLE `kz_opleiding_keuzedelen_junction` (
  `id` int(11) NOT NULL,
  `keuzedeel_nummer` varchar(11) DEFAULT NULL,
  `opleiding_crebo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kz_resultaten`
--

CREATE TABLE `kz_resultaten` (
  `resultaat_id` int(11) NOT NULL,
  `studenten_nummer` int(11) DEFAULT NULL,
  `keuzedeel_nummer` varchar(11) DEFAULT NULL,
  `prioriteit` int(11) DEFAULT NULL,
  `gekozen_op` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kz_studenten`
--

CREATE TABLE `kz_studenten` (
  `studenten_nummer` int(11) NOT NULL,
  `voornaam` varchar(255) DEFAULT NULL,
  `tussenvoegsel` varchar(255) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `geboorte` date DEFAULT NULL,
  `klas_naam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kz_docenten`
--
ALTER TABLE `kz_docenten`
  ADD PRIMARY KEY (`docent_id`);

--
-- Indexes for table `kz_keuzedelen`
--
ALTER TABLE `kz_keuzedelen`
  ADD PRIMARY KEY (`keuzedeel_ID`);

--
-- Indexes for table `kz_klas`
--
ALTER TABLE `kz_klas`
  ADD PRIMARY KEY (`klas_naam`),
  ADD KEY `opleiding_crebo` (`opleiding_crebo`),
  ADD KEY `klas_naam` (`klas_naam`);

--
-- Indexes for table `kz_opleiding`
--
ALTER TABLE `kz_opleiding`
  ADD PRIMARY KEY (`opleiding_ID`);

--
-- Indexes for table `kz_opleiding_keuzedelen_junction`
--
ALTER TABLE `kz_opleiding_keuzedelen_junction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keuzedeel_nummer` (`keuzedeel_nummer`),
  ADD KEY `opleiding_crebo` (`opleiding_crebo`);

--
-- Indexes for table `kz_resultaten`
--
ALTER TABLE `kz_resultaten`
  ADD PRIMARY KEY (`resultaat_id`),
  ADD KEY `studenten_nummer` (`studenten_nummer`);

--
-- Indexes for table `kz_studenten`
--
ALTER TABLE `kz_studenten`
  ADD PRIMARY KEY (`studenten_nummer`),
  ADD KEY `klas_naam` (`klas_naam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kz_docenten`
--
ALTER TABLE `kz_docenten`
  MODIFY `docent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kz_keuzedelen`
--
ALTER TABLE `kz_keuzedelen`
  MODIFY `keuzedeel_ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kz_opleiding_keuzedelen_junction`
--
ALTER TABLE `kz_opleiding_keuzedelen_junction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kz_resultaten`
--
ALTER TABLE `kz_resultaten`
  MODIFY `resultaat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kz_studenten`
--
ALTER TABLE `kz_studenten`
  MODIFY `studenten_nummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kz_resultaten`
--
ALTER TABLE `kz_resultaten`
  ADD CONSTRAINT `kz_resultaten_ibfk_1` FOREIGN KEY (`studenten_nummer`) REFERENCES `kz_studenten` (`studenten_nummer`) ON UPDATE CASCADE;

--
-- Constraints for table `kz_studenten`
--
ALTER TABLE `kz_studenten`
  ADD CONSTRAINT `kz_studenten_ibfk_1` FOREIGN KEY (`klas_naam`) REFERENCES `kz_klas` (`klas_naam`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
