-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 02:02 PM
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

--
-- Dumping data for table `kz_docenten`
--

INSERT INTO `kz_docenten` (`docent_id`, `gebruikersnaam`, `naam`, `tussenvoegsel`, `achternaam`, `wachtwoord`, `email`) VALUES
(1, 'Bluetodark', 'Jules', NULL, 'Zwarts', 'Welkom1337', 'jzwarts70@gmail.com'),
(2, 'Mufinella', 'NULL', 'Nari', 'fmjLX3HG', 'shaylee66@zieme.net', NULL),
(3, 'Muire', 'NULL', 'Nariko', 't4EZeXAT', 'emelie51@adams.org', NULL),
(4, 'Mureil', 'NULL', 'Nat', 'wU4zWCHL', 'francis01@hotmail.com', NULL),
(5, 'Murial', 'NULL', 'Nata', 'ZjEq9N8D', 'esperanza.hermiston@yahoo.com', NULL),
(6, 'Muriel', 'NULL', 'Natala', 'H9Bqrepd', 'antwon.gleichner@batz.com', NULL),
(7, 'Murielle', 'NULL', 'Natalee', '2Rc8AfXG', 'sidney.kerluke@vonrueden.com', NULL),
(8, 'Myra', 'NULL', 'Natalie', 'dsNb4QMC', 'feeney.allie@jerde.com', NULL),
(9, 'Myrah', 'NULL', 'Natalina', 'WCn4GNR5', 'joanie94@medhurst.net', NULL),
(10, 'Myranda', 'NULL', 'Nataline', 'J4YdWhHA', 'breitenberg.cicero@gmail.com', NULL),
(11, 'Myriam', 'NULL', 'Natalya', 's2wYy8zE', 'freda.larson@oconnell.net', NULL),
(12, 'Myrilla', 'NULL', 'Natasha', '4EkKG8MV', 'ypollich@conroy.com', NULL),
(13, 'Myrle', 'NULL', 'Natassia', 'c5M79hT4', 'qschamberger@hotmail.com', NULL),
(14, 'Myrlene', 'NULL', 'Nathalia', 'qv6w3mhW', 'fwisozk@hotmail.com', NULL),
(15, 'Myrna', 'NULL', 'Nathalie', 'MNL6nq5d', 'claud.beatty@crist.com', NULL),
(16, 'Myrta', 'NULL', 'Natividad', 'jbSNx8cH', 'upton.carrie@yahoo.com', NULL),
(17, 'Myrtia', 'NULL', 'Natka', 'ZR49WgmE', 'rkuhn@kozey.com', NULL),
(18, 'Myrtice', 'NULL', 'Natty', 'mxzeuJ6V', 'dandre.glover@hotmail.com', NULL),
(19, 'Myrtie', 'NULL', 'Neala', '2CmwhEyW', 'runolfsdottir.sandra@hotmail.com', NULL),
(20, 'Myrtle', 'NULL', 'Neda', 'mNVFq3WL', 'schultz.anderson@hotmail.com', NULL),
(21, 'Nada', 'NULL', 'Nedda', 'HpPAyzG7', 'raynor.abby@hotmail.com', NULL),
(22, 'Nadean', 'NULL', 'Nedi', 'AZtmR9GB', 'geraldine37@yundt.com', NULL),
(23, 'Nadeen', 'NULL', 'Neely', 'LEVpQ9w5', 'lucie.schaefer@brakus.com', NULL),
(24, 'Nadia', 'NULL', 'Neila', 'Z2BzNKwg', 'chomenick@yahoo.com', NULL),
(25, 'Nadine', 'NULL', 'Neile', 'AuY3GbF2', 'murphy.lang@yahoo.com', NULL),
(26, 'Nadiya', 'NULL', 'Neilla', 'keWudB4j', 'feeney.kaitlyn@nolan.com', NULL),
(27, 'Nady', 'NULL', 'Neille', 'BwMh7yxu', 'amarquardt@ledner.biz', NULL),
(28, 'Nadya', 'NULL', 'Nelia', 'pHkeR8mE', 'gerhold.colby@windler.org', NULL),
(29, 'Nalani', 'NULL', 'Nelie', 'Yq2DxcSz', 'nmonahan@harber.com', NULL),
(30, 'Nan', 'NULL', 'Nell', 'zMCVEH6y', 'myra.aufderhar@von.com', NULL),
(31, 'Nana', 'NULL', 'Nelle', 'PN5Kv6rU', 'ernesto.little@yahoo.com', NULL),
(32, 'Nananne', 'NULL', 'Nelli', '6SQq7mct', 'lwitting@roob.com', NULL),
(33, 'Nance', 'NULL', 'Nellie', 'av4BJkyW', 'mclaughlin.kasey@gmail.com', NULL),
(34, 'Nancee', 'NULL', 'Nelly', 'NA7cer3Q', 'fmetz@gmail.com', NULL),
(35, 'Nancey', 'NULL', 'Nerissa', 'ByRFJb2d', 'aglae.jacobson@hotmail.com', NULL),
(36, 'Nanci', 'NULL', 'Nerita', '8sTGWex3', 'connelly.berta@gmail.com', NULL),
(37, 'Nancie', 'NULL', 'Nert', 'AEhRX6jV', 'hartmann.khalil@yahoo.com', NULL),
(38, 'Nancy', 'NULL', 'Nerta', 'ymcsCL2t', 'reinger.gianni@lynch.com', NULL),
(39, 'Nanete', 'NULL', 'Nerte', 'sRKwnB94', 'grant.neha@yahoo.com', NULL),
(40, 'Nanette', 'NULL', 'Nerti', 'a37pVetc', 'obernier@abbott.com', NULL),
(41, 'Nani', 'NULL', 'Nertie', 'ZeRCQB4g', 'kayden40@gmail.com', NULL),
(42, 'Nanice', 'NULL', 'Nerty', 'gns4ABE6', 'oswaldo30@gmail.com', NULL),
(43, 'Nanine', 'NULL', 'Nessa', 'Ad2QZFaY', 'kenneth.gulgowski@crona.com', NULL),
(44, 'Nannette', 'NULL', 'Nessi', 'taZg7JSL', 'adell54@yahoo.com', NULL),
(45, 'Nanni', 'NULL', 'Nessie', '58tFDVBA', 'daryl.hansen@gmail.com', NULL),
(46, 'Nannie', 'NULL', 'Nessy', '8cUezCNS', 'lina.beer@fritsch.com', NULL),
(47, 'Nanny', 'NULL', 'Nesta', 'PXrz64ha', 'schneider.kareem@pollich.com', NULL),
(48, 'Nanon', 'NULL', 'Netta', 'm7963tKg', 'claud.jacobs@gmail.com', NULL),
(49, 'Naoma', 'NULL', 'Netti', 'D2VpyH5g', 'teresa82@reichert.com', NULL),
(50, 'Naomi', 'NULL', 'Nettie', 'mj7J9qUK', 'wkautzer@nader.net', NULL),
(51, 'Nara', 'NULL', 'Nettle', 'f86kg3PF', 'njacobson@yahoo.com', NULL),
(52, '', '', '', '', '', NULL),
(53, '', '', '', '', '', NULL),
(54, '', '', '', '', '', NULL),
(55, '', '', '', '', '', NULL),
(56, '', '', '', '', '', NULL),
(57, '', '', '', '', '', NULL),
(58, '', '', '', '', '', NULL),
(59, '', '', '', '', '', NULL),
(60, '', '', '', '', '', NULL),
(61, '', '', '', '', '', NULL),
(62, '', '', '', '', '', NULL),
(63, '', '', '', '', '', NULL),
(64, '', '', '', '', '', NULL),
(65, '', '', '', '', '', NULL),
(66, '', '', '', '', '', NULL),
(67, '', '', '', '', '', NULL),
(68, '', '', '', '', '', NULL),
(69, '', '', '', '', '', NULL),
(70, '', '', '', '', '', NULL),
(71, '', '', '', '', '', NULL),
(72, '', '', '', '', '', NULL),
(73, '', '', '', '', '', NULL),
(74, '', '', '', '', '', NULL),
(75, '', '', '', '', '', NULL),
(76, '', '', '', '', '', NULL),
(77, '', '', '', '', '', NULL),
(78, '', '', '', '', '', NULL),
(79, '', '', '', '', '', NULL),
(80, '', '', '', '', '', NULL),
(81, '', '', '', '', '', NULL),
(82, '', '', '', '', '', NULL),
(83, '', '', '', '', '', NULL),
(84, '', '', '', '', '', NULL),
(85, '', '', '', '', '', NULL);

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

--
-- Dumping data for table `kz_keuzedelen`
--

INSERT INTO `kz_keuzedelen` (`keuzedeel_ID`, `keuzedeel_info_url`, `keuzedeel_info`, `keuzedeelNummer`, `versie`, `docent`, `plaatsen`) VALUES
(323, 'https://www.s-bb.nl/fdcfds', 'Agile game productie', 'K0717', '', '', 0),
(326, 'https://www.s-bb.nl/', 'Basis programmeren van games', 'K0788', '', '', 0),
(327, 'https://www.s-bb.nl/', 'Belevingsgericht werken', 'K0790', '', '', 0),
(329, 'https://www.s-bb.nl/', 'Digitaal produceren 3D object', 'K0355', '', '', 25),
(334, 'https://www.s-bb.nl/', 'Duits A1/A2 in het beroepsonderwijs', 'K0959', '', '', 0),
(336, 'https://www.s-bb.nl/', 'Duits B1/B2 in het beroepsonderwijs', 'K0961', '', '', 0),
(337, 'https://www.s-bb.nl/', 'Duits in de beroepscontext A2', 'K0025', '', '', 0),
(338, 'https://www.s-bb.nl/', 'Duits in de beroepscontext B1', 'K0026', '', '', 0),
(339, 'https://www.s-bb.nl/', 'Duurzaamheid in het beroep D', 'K0031', '', '', 0),
(340, 'https://www.s-bb.nl/', 'Embedded Design', 'K0481', '', '', 0),
(341, 'https://www.s-bb.nl/', 'Engels in de beroepscontext B2', 'K0036', '', '', 0),
(342, 'https://www.s-bb.nl/', 'Engineering huis- en gebouwautomatisering', 'K0804', '', '', 0),
(343, 'https://www.s-bb.nl/', 'Frans A1/A2 in het beroepsonderwijs', 'K0985', '', '', 0),
(344, 'https://www.s-bb.nl/', 'Frans A2/B1 in het beroepsonderwijs', 'K0986', '', '', 0),
(345, 'https://www.s-bb.nl/', 'Frans B1/B2 in het beroepsonderwijs', 'K0987', '', '', 0),
(346, 'https://www.s-bb.nl/', 'Frans in de beroepscontext A2', 'K0039', '1', 'test', 16),
(347, 'https://www.s-bb.nl/', 'Frans in de beroepscontext B1', 'K0040', '2', 'Kalsbeek', 0),
(348, 'https://www.s-bb.nl/', 'Fries in de beroepscontext A2', 'K0509', '', '', 0),
(349, 'https://www.s-bb.nl/', 'Fries in de beroepscontext B1', 'K0510', '', '', 0),
(350, 'https://www.s-bb.nl/', 'Frontend development', 'K0722', '', '', 0),
(351, 'https://www.s-bb.nl/', 'Geo-ICT', 'K0044', '', '', 0),
(352, 'https://www.s-bb.nl/', 'Grafisch ontwerp voor webdevelopment', 'K0767', '', '', 0),
(355, 'https://www.s-bb.nl/', 'Interaction design', 'K0529', '', '', 0),
(356, 'https://www.s-bb.nl/', 'Interactive instruction development', 'K1098', '', '', 0),
(357, 'https://www.s-bb.nl/', 'Internationaal I: overbruggen (interculturele) diversiteit', 'K0210', '', '', 0),
(359, 'https://www.s-bb.nl/', 'Invloed en medezeggenschap in organisaties (IMO)', 'K1122', '', '', 0),
(360, 'https://www.s-bb.nl/', 'Klantcontact en verkoop', 'K0059', '', '', 0),
(361, 'https://www.s-bb.nl/', 'Lean en creatief', 'K0512', '', '', 0),
(362, 'https://www.s-bb.nl/', 'Mediabeheer', 'K0496', '', '', 0),
(363, 'https://www.s-bb.nl/', 'Mobile application development', 'K0497', '', '', 0),
(364, 'https://www.s-bb.nl/', 'Ondernemend gedrag (geschikt voor niveau 3 en 4)', 'K0072', '', '', 0),
(365, 'https://www.s-bb.nl/', 'Ondernemerschap mbo', 'K0165', '', '', 0),
(366, 'https://www.s-bb.nl/', 'Online marketing en het toepassen van e-commerce', 'K0519', '', '', 0),
(367, 'https://www.s-bb.nl/', 'Ori?ntatie blockchain', 'K1105', '', '', 0),
(368, 'https://www.s-bb.nl/', 'Ori?ntatie op ondernemerschap', 'K0080', '', '', 0),
(369, 'https://www.s-bb.nl/', 'Persoonlijk profileren', 'K0877', '', '', 0),
(370, 'https://www.s-bb.nl/', 'Praktijkonderzoek', 'K0927', '', '', 0),
(371, 'https://www.s-bb.nl/', 'Praktijkopleider', 'K0087', '', '', 0),
(372, 'https://www.s-bb.nl/', 'Programmeren van microcontrollers', 'K0730', '', '', 0);

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

--
-- Dumping data for table `kz_klas`
--

INSERT INTO `kz_klas` (`klas_naam`, `opleiding_crebo`, `start_kiezen`, `eind_kiezen`) VALUES
('IC.18AO.A', 18364, '2022-04-14 10:54:13', '2022-04-14 10:54:13'),
('IC.18AO.B', 18363, '2022-06-22 10:54:13', '2022-05-15 10:54:13'),
('IC.18AO.E', 12345, '2022-05-24 11:57:00', '2022-05-30 11:56:00'),
('IC.18AO.K', 123, '2022-06-02 08:12:53', '2022-06-02 08:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `kz_opleiding`
--

CREATE TABLE `kz_opleiding` (
  `opleiding_ID` int(11) NOT NULL,
  `crebo` varchar(11) NOT NULL,
  `opleiding_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kz_opleiding`
--

INSERT INTO `kz_opleiding` (`opleiding_ID`, `crebo`, `opleiding_naam`) VALUES
(1, '12345', 'Applicatieont'),
(2, '18363', 'ICT Helpdesk'),
(3, '18364', 'Software Developer');

-- --------------------------------------------------------

--
-- Table structure for table `kz_opleiding_keuzedelen_junction`
--

CREATE TABLE `kz_opleiding_keuzedelen_junction` (
  `id` int(11) NOT NULL,
  `keuzedeel_nummer` varchar(11) DEFAULT NULL,
  `opleiding_crebo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kz_opleiding_keuzedelen_junction`
--

INSERT INTO `kz_opleiding_keuzedelen_junction` (`id`, `keuzedeel_nummer`, `opleiding_crebo`) VALUES
(1, 'K0040', 12345),
(2, 'K0039', 12345),
(3, 'K0355', 12345);

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

--
-- Dumping data for table `kz_resultaten`
--

INSERT INTO `kz_resultaten` (`resultaat_id`, `studenten_nummer`, `keuzedeel_nummer`, `prioriteit`, `gekozen_op`) VALUES
(11112, 79199, 'K0355', 1, '2022-04-25 09:10:26'),
(11113, 79199, 'K0040', 2, '2022-04-25 09:18:45'),
(11122, 81739, 'K0039', 1, '2022-05-24 09:57:09'),
(11123, 81739, 'K0040', 2, '2022-05-24 09:57:09');

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
-- Dumping data for table `kz_studenten`
--

INSERT INTO `kz_studenten` (`studenten_nummer`, `voornaam`, `tussenvoegsel`, `achternaam`, `geboorte`, `klas_naam`) VALUES
(11111, 'Jules rood', NULL, 'Zwartsdddd', '2002-05-05', 'IC.18AO.B'),
(11112, 'Ruben', '', 'Rutjens', '0000-00-00', 'IC.18AO.A'),
(79197, 'Pieter', '', 'Imojean', '0000-00-00', 'IC.18AO.E'),
(79198, 'Hans', 'NULL', 'Ina', '0000-00-00', 'IC.18AO.E'),
(79199, 'Fey', 'NULL', 'Indira', '0000-00-00', 'IC.18AO.E'),
(79200, 'Fiann', 'NULL', 'Ines', '0000-00-00', 'IC.18AO.E'),
(79201, 'Fianna', 'NULL', 'Inesita', '0000-00-00', 'IC.18AO.E'),
(79202, 'Fidela', 'NULL', 'Inessa', '0000-00-00', 'IC.18AO.E'),
(79205, 'Fifi', 'NULL', 'Ingaberg', '0000-00-00', 'IC.18AO.E'),
(79206, 'Fifine', 'NULL', 'Ingaborg', '0000-00-00', 'IC.18AO.E'),
(79207, 'Filia', 'NULL', 'Inge', '0000-00-00', 'IC.18AO.E'),
(79211, 'Fiona', 'NULL', 'Ingrid', '0000-00-00', 'IC.18AO.E'),
(79213, 'Fionnula', 'NULL', 'Inna', '0000-00-00', 'IC.18AO.E'),
(79214, 'Fiorenze', 'NULL', 'Iolande', '0000-00-00', 'IC.18AO.E'),
(79215, 'Fleur', 'NULL', 'Iolanthe', '0000-00-00', 'IC.18AO.E'),
(79216, 'Fleurette', 'NULL', 'Iona', '0000-00-00', 'IC.18AO.E'),
(79217, 'Flo', 'NULL', 'Iormina', '0000-00-00', 'IC.18AO.E'),
(79218, 'Flor', 'NULL', 'Ira', '0000-00-00', 'IC.18AO.E'),
(79219, 'Flora', 'NULL', 'Irena', '0000-00-00', 'IC.18AO.E'),
(79220, 'Florance', 'NULL', 'Irene', '0000-00-00', 'IC.18AO.E'),
(79221, 'Flore', 'NULL', 'Irina', '0000-00-00', 'IC.18AO.E'),
(79222, 'Florella', 'NULL', 'Iris', '0000-00-00', 'IC.18AO.E'),
(79223, 'Florence', 'NULL', 'Irita', '0000-00-00', 'IC.18AO.E'),
(79224, 'Florencia', 'NULL', 'Irma', '0000-00-00', 'IC.18AO.E'),
(79225, 'Florentia', 'NULL', 'Isa', '0000-00-00', 'IC.18AO.E'),
(79226, 'Florenza', 'NULL', 'Isabel', '0000-00-00', 'IC.18AO.E'),
(79227, 'Florette', 'NULL', 'Isabelita', '0000-00-00', 'IC.18AO.E'),
(79228, 'Flori', 'NULL', 'Isabella', '0000-00-00', 'IC.18AO.E'),
(79229, 'Floria', 'NULL', 'Isabelle', '0000-00-00', 'IC.18AO.E'),
(79230, 'Florida', 'NULL', 'Isadora', '0000-00-00', 'IC.18AO.E'),
(79231, 'Florie', 'NULL', 'Isahella', '0000-00-00', 'IC.18AO.E'),
(79232, 'Florina', 'NULL', 'Iseabal', '0000-00-00', 'IC.18AO.E'),
(79233, 'Florinda', 'NULL', 'Isidora', '0000-00-00', 'IC.18AO.E'),
(79234, 'Floris', 'NULL', 'Isis', '0000-00-00', 'IC.18AO.E'),
(79235, 'Florri', 'NULL', 'Isobel', '0000-00-00', 'IC.18AO.E'),
(79236, 'Florrie', 'NULL', 'Issi', '0000-00-00', 'IC.18AO.E'),
(79237, 'Florry', 'NULL', 'Issie', '0000-00-00', 'IC.18AO.E'),
(79238, 'Flory', 'NULL', 'Issy', '0000-00-00', 'IC.18AO.E'),
(79239, 'Flossi', 'NULL', 'Ivett', '0000-00-00', 'IC.18AO.E'),
(79240, 'Flossie', 'NULL', 'Ivette', '0000-00-00', 'IC.18AO.E'),
(79241, 'Flossy', 'NULL', 'Ivie', '0000-00-00', 'IC.18AO.E'),
(79242, 'Flss', 'NULL', 'Ivonne', '0000-00-00', 'IC.18AO.E'),
(79243, 'Fran', 'NULL', 'Ivory', '0000-00-00', 'IC.18AO.E'),
(79244, 'Francene', 'NULL', 'Ivy', '0000-00-00', 'IC.18AO.E'),
(79245, 'Frances', 'NULL', 'Izabel', '0000-00-00', 'IC.18AO.E'),
(81739, 'Jules', NULL, 'Zwarts', '2002-05-04', 'IC.18AO.E');

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
  MODIFY `docent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `kz_keuzedelen`
--
ALTER TABLE `kz_keuzedelen`
  MODIFY `keuzedeel_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;

--
-- AUTO_INCREMENT for table `kz_opleiding_keuzedelen_junction`
--
ALTER TABLE `kz_opleiding_keuzedelen_junction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kz_resultaten`
--
ALTER TABLE `kz_resultaten`
  MODIFY `resultaat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11124;

--
-- AUTO_INCREMENT for table `kz_studenten`
--
ALTER TABLE `kz_studenten`
  MODIFY `studenten_nummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81740;

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
