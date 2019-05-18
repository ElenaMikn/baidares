-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2019 at 02:54 PM
-- Server version: 10.3.12-MariaDB-log
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elen_test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventorius`
--

CREATE TABLE `inventorius` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `kaina` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=4096 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorius`
--

INSERT INTO `inventorius` (`id`, `pavadinimas`, `kaina`) VALUES
(1, 'Kirvis', '2.00'),
(2, 'Pjūklas', '4.00'),
(3, 'Hermetiškas maisas', '1.50'),
(4, 'Katilas', '3.00'),
(5, 'Hermetiskas deklas telefonui', '1.50'),
(6, 'Palapine', '4.00'),
(7, 'Grotelės', '1.00'),
(8, 'Iešmas', '1.00'),
(9, 'Turistinis kilimelis', '1.50');

-- --------------------------------------------------------

--
-- Table structure for table `klientas`
--

CREATE TABLE `klientas` (
  `id` int(11) NOT NULL,
  `vardas` varchar(255) DEFAULT NULL,
  `pavarde` varchar(255) DEFAULT NULL,
  `tel_numeris` varchar(255) DEFAULT NULL,
  `e-pastas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klientas`
--

INSERT INTO `klientas` (`id`, `vardas`, `pavarde`, `tel_numeris`, `e-pastas`) VALUES
(1, 'Antanas', 'Pertraitis', '+37069923953', 'antanas.p@gmail.com'),
(2, 'Elena', 'Stasiunine', '+37069995874', 'elena.m@gmail.com'),
(3, 'UAB Bite', 'UAB Bite', '+37069923953', 'info@bite.lt'),
(4, 'Jonas', 'Velycka', '+37069923257', 'Jonas.v@gmail.com'),
(5, 'Donatas', 'Morkunas', '+37069923326', 'donatas.m@gmail.com'),
(19, '', '', '', ''),
(24, 'Ernestas', 'MikneviÄius', '+37067640891', 'ernestas.m@gmail.com'),
(25, 'Ernestas', 'MikneviÄius', '+37067640891', 'ernestas.m@gmail.com'),
(26, '', '', '', ''),
(27, '', '', '', ''),
(28, 'Elena', 'Mikneviciene', '+37068571268', 'elena.markovskaja@gmail.com'),
(29, 'Elena', 'Dainaraviciene', '868534789', ''),
(30, '', '', '', ''),
(31, '', '', '', ''),
(32, '', '', '', ''),
(33, '', '', '', ''),
(34, 'Mykolas', 'Zagzin', '+370236984', 'zagzi@gmail.ocm'),
(35, '', '', '', ''),
(36, '', '', '', ''),
(37, '', '', '', ''),
(38, '', '', '', ''),
(39, '', '', '', ''),
(40, '0', '0', '', ''),
(41, 'marija', 'marija', '+37066666', 'marija@viko.lt'),
(42, '', '', '', ''),
(43, '', '', '', ''),
(44, 'mus kankina destytoja', 'atsiusk pagalba', 'SOS', 'is17b'),
(45, 'SOS', '911/112', '96', 'alpha siera siera');

-- --------------------------------------------------------

--
-- Table structure for table `maistas`
--

CREATE TABLE `maistas` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) DEFAULT NULL,
  `kaina` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maistas`
--

INSERT INTO `maistas` (`id`, `pavadinimas`, `kaina`) VALUES
(1, 'Kibinas su kiauliena', '3'),
(2, 'Kibinas su aviena', '4'),
(3, 'Kibinas su vištiena', '2');

-- --------------------------------------------------------

--
-- Table structure for table `marsrutas`
--

CREATE TABLE `marsrutas` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ilgis_km` int(11) DEFAULT NULL,
  `kaina` int(11) DEFAULT NULL,
  `plaukimo_laikas` int(11) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marsrutas`
--

INSERT INTO `marsrutas` (`id`, `pavadinimas`, `ilgis_km`, `kaina`, `plaukimo_laikas`) VALUES
(1, 'Žeimena', 10, 16, 6),
(2, 'Kiauna', 12, 17, 6),
(3, 'Lakaja', 14, 19, 7),
(4, 'Būka ir ežerais', 24, 32, 10),
(5, 'Žeimena ir ežerais', 29, 37, 14),
(6, 'Aiseta, Kiauna', 25, 35, 12);

-- --------------------------------------------------------

--
-- Table structure for table `nakvyne`
--

CREATE TABLE `nakvyne` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vieta_gps` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tel_numeris` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `kaina` float DEFAULT NULL,
  `marsruto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nakvyne`
--

INSERT INTO `nakvyne` (`id`, `pavadinimas`, `vieta_gps`, `tel_numeris`, `kaina`, `marsruto_id`) VALUES
(1, 'Pas Petrą', '55.2481, 25.9898', '+37061234567', 20, 4),
(2, 'Miško nameliai', '55.1720, 25.9861', '+37065412363', 15, 6),
(3, 'Prie ežero', '55.3055, 25.8866', '+37098256569', 22, 5),
(4, ' Privati stovyklaviete', '55.2755, 26.0541', '+37023569514', 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymas`
--

CREATE TABLE `uzsakymas` (
  `id` int(11) NOT NULL,
  `marsruto_id` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `nakvynes_id` int(11) DEFAULT NULL,
  `kiekis` int(11) DEFAULT NULL,
  `klientas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1260 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uzsakymas`
--

INSERT INTO `uzsakymas` (`id`, `marsruto_id`, `data`, `nakvynes_id`, `kiekis`, `klientas_id`) VALUES
(1, 5, '2017-06-15', 3, 18, 3),
(2, 1, '2017-06-17', NULL, 1, 1),
(3, 1, '2017-06-22', NULL, 5, 1),
(5, 3, '2017-07-06', 4, 4, 5),
(6, 5, '2017-07-06', 3, 4, 1),
(7, 5, '2017-07-06', 3, 18, 2),
(8, 4, '2017-08-15', 1, 4, 1),
(9, 6, '2017-08-16', 1, 4, 1),
(10, 5, '2018-03-24', 3, 4, 1),
(11, 3, '2018-04-10', 4, 2, 1),
(12, 3, '2018-04-10', 4, 2, 1),
(13, 2, '2018-06-29', NULL, 3, 1),
(14, 6, '0000-00-00', 2, 22, 2),
(15, 1, '0000-00-00', NULL, 12, 4),
(16, 1, '2018-04-28', 1, 5, 1),
(17, 1, '2018-05-30', 1, 4, 1),
(20, 3, '2018-06-15', 1, 30, 1),
(21, 1, '2018-05-30', 1, 3, 1),
(22, 2, '2018-05-30', 1, 3, 1),
(39, 6, '2019-01-26', 2, 4, 28),
(40, 3, '2018-06-16', 4, 6, 29),
(45, 6, '2018-07-11', NULL, 2, 34),
(46, 1, '2018-12-14', NULL, 2, 35),
(52, 2, '2018-12-28', NULL, 2, 41),
(53, 1, '2019-05-12', NULL, 1, 42),
(54, 1, '2019-05-12', NULL, 1, 43),
(56, 1, '2019-05-13', NULL, 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakytas_inventorius`
--

CREATE TABLE `uzsakytas_inventorius` (
  `uzsakymo_id` int(11) NOT NULL,
  `inventoriaus_id` int(11) NOT NULL,
  `kiekis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uzsakytas_inventorius`
--

INSERT INTO `uzsakytas_inventorius` (`uzsakymo_id`, `inventoriaus_id`, `kiekis`) VALUES
(7, 3, '6'),
(7, 5, '10'),
(40, 1, '0'),
(40, 2, '1'),
(40, 4, '0'),
(40, 5, '0'),
(45, 1, '1'),
(45, 5, '2'),
(53, 1, '2'),
(54, 1, '2'),
(56, 1, '1'),
(56, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `uzsakytas_maistas`
--

CREATE TABLE `uzsakytas_maistas` (
  `uzsakymo_id` int(11) NOT NULL,
  `maisto_id` int(11) NOT NULL,
  `kiekis` int(11) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=3276 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uzsakytas_maistas`
--

INSERT INTO `uzsakytas_maistas` (`uzsakymo_id`, `maisto_id`, `kiekis`) VALUES
(7, 1, 10),
(7, 2, 10),
(7, 3, 12),
(40, 1, 2),
(40, 3, 2),
(45, 1, 1),
(45, 2, 1),
(46, 1, 1),
(46, 3, 1),
(52, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventorius`
--
ALTER TABLE `inventorius`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klientas`
--
ALTER TABLE `klientas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maistas`
--
ALTER TABLE `maistas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marsrutas`
--
ALTER TABLE `marsrutas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nakvyne`
--
ALTER TABLE `nakvyne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_nakvyne_marsrutas_id` (`marsruto_id`);

--
-- Indexes for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_uzsakymas_klientas_id` (`klientas_id`),
  ADD KEY `FK_uzsakymas_marsrutas_id` (`marsruto_id`),
  ADD KEY `FK_uzsakymas_nakvyne_id` (`nakvynes_id`);

--
-- Indexes for table `uzsakytas_inventorius`
--
ALTER TABLE `uzsakytas_inventorius`
  ADD PRIMARY KEY (`uzsakymo_id`,`inventoriaus_id`),
  ADD KEY `FK_uzsakytas_inventorius_inventorius_id` (`inventoriaus_id`);

--
-- Indexes for table `uzsakytas_maistas`
--
ALTER TABLE `uzsakytas_maistas`
  ADD PRIMARY KEY (`uzsakymo_id`,`maisto_id`),
  ADD KEY `FK_uzsakytas_maistas_maistas_id` (`maisto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventorius`
--
ALTER TABLE `inventorius`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `klientas`
--
ALTER TABLE `klientas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `maistas`
--
ALTER TABLE `maistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marsrutas`
--
ALTER TABLE `marsrutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nakvyne`
--
ALTER TABLE `nakvyne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nakvyne`
--
ALTER TABLE `nakvyne`
  ADD CONSTRAINT `FK_nakvyne_marsrutas_id` FOREIGN KEY (`marsruto_id`) REFERENCES `marsrutas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD CONSTRAINT `FK_uzsakymas_kientas_id` FOREIGN KEY (`klientas_id`) REFERENCES `klientas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_uzsakymas_marsrutas_id` FOREIGN KEY (`marsruto_id`) REFERENCES `marsrutas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_uzsakymas_nakvyne_id` FOREIGN KEY (`nakvynes_id`) REFERENCES `nakvyne` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uzsakytas_inventorius`
--
ALTER TABLE `uzsakytas_inventorius`
  ADD CONSTRAINT `FK_uzsakytas_inventorius_inventorius_id` FOREIGN KEY (`inventoriaus_id`) REFERENCES `inventorius` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_uzsakytas_inventorius_uzsakymas_id` FOREIGN KEY (`uzsakymo_id`) REFERENCES `uzsakymas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uzsakytas_maistas`
--
ALTER TABLE `uzsakytas_maistas`
  ADD CONSTRAINT `FK_uzsakytas_maistas_maistas_id` FOREIGN KEY (`maisto_id`) REFERENCES `maistas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_uzsakytas_maistas_uzsakymas_id` FOREIGN KEY (`uzsakymo_id`) REFERENCES `uzsakymas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
