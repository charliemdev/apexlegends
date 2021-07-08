-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 04:56 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1865077`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `real_name` varchar(50) NOT NULL,
  `tactical` varchar(50) NOT NULL,
  `passive` varchar(50) NOT NULL,
  `ultimate` varchar(50) NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `description`, `real_name`, `tactical`, `passive`, `ultimate`, `gender_id`, `type_id`) VALUES
(1, 'Bangalore', 'Professional Soldier', 'Anita Williams', 'Smoke Launcher', 'Double Time', 'Rolling Thunder', 2, 1),
(2, 'Bloodhound', 'Technological Tracker', 'Unknown', 'Eye of the Allfather', 'Tracker', 'Beast of the Hunt', 3, 2),
(3, 'Caustic', 'Toxic Trapper', 'Alexander Maxwell Nox', 'Nox Gas Trap', ' Nox Vision', 'Nox Gas Grenade', 1, 3),
(4, 'Crypto', 'Surveillance Expert', 'Tae Joon Park', 'Surveillance Drone', 'Neurolink', 'Drone EMP', 1, 2),
(5, 'Gibraltar', 'Shielded Fortress', 'Makoa Gibraltar', 'Dome of Protection', 'Gun Shield', 'Defensive Bombardment', 1, 3),
(6, 'Lifeline', 'Combat Medic', 'Ajay Che', 'D.O.C Heal Drone', 'Combat Medic', 'Care Package', 2, 4),
(7, 'Mirage', 'Holographic Trickster', 'Elliott Witt', 'Psyche Out', 'Encore!', 'Vanishing Act', 1, 1),
(8, 'Octane', 'High-Speed Devil', 'Octavio Silva', 'Stim', 'Swift Mend', 'Launch Pad', 1, 1),
(9, 'Pathfinder', 'Forward Scout', 'MRVN', 'Grappling Hook', 'Insider Knowledge', 'Zipline Gun', 1, 4),
(10, 'Wattson', 'Static Defender', 'Natalie Paquette', 'Perimeter Security', 'Spark of Genius', 'Interception Pylon', 2, 3),
(11, 'Wraith', 'Interdimensional Skirmisher', 'Renee Blasey', 'Into the Void', 'Voices from the Void', 'Dimensional Rift', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Non-Binary');

-- --------------------------------------------------------

--
-- Table structure for table `legend_type`
--

CREATE TABLE `legend_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `legend_type`
--

INSERT INTO `legend_type` (`id`, `type`) VALUES
(1, 'Offensive'),
(2, 'Recon'),
(3, 'Defensive'),
(4, 'Support');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gender_id` (`gender_id`),
  ADD KEY `fk_type_id` (`type_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legend_type`
--
ALTER TABLE `legend_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `legend_type`
--
ALTER TABLE `legend_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `fk_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `fk_type_id` FOREIGN KEY (`type_id`) REFERENCES `legend_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
