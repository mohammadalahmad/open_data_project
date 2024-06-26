-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 03:27 PM
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
-- Database: `open_data_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bekannte_personen`
--

CREATE TABLE `bekannte_personen` (
  `id` int(11) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `beruf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bekannte_personen`
--

INSERT INTO `bekannte_personen` (`id`, `vorname`, `nachname`, `beruf`) VALUES
(1, 'Blasius', 'Hueber', 'Kartograf und Landvermesser'),
(2, 'Franz', 'Weber', 'Orgelbauer'),
(3, 'Ernst', 'Spiegl', 'Landschaftsmaler'),
(4, 'Vinzenz', 'Gasser', 'Theologe, Philosoph, Politiker und Fürstbischof'),
(5, 'Andreas', 'Hueber', 'Rokokobaumeister in Nordtirol'),
(6, 'Anna', 'Hensler', 'Schriftstellerin'),
(7, 'Herta', 'Maria Witzemann', 'Innenarchitektin und Möbelentwerferin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bekannte_personen`
--
ALTER TABLE `bekannte_personen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bekannte_personen`
--
ALTER TABLE `bekannte_personen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
