-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 11:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuorodos5`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED DEFAULT NULL,
  `pav` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nuorodos`
--

CREATE TABLE `nuorodos` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `nuoroda` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `pav` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nuorodos`
--

INSERT INTO `nuorodos` (`id`, `data`, `nuoroda`, `pav`) VALUES
(1, '2023-09-04 09:11:55', 'https://developer.mozilla.org/en-US/docs/Learn/CSS/Building_blocks/Selectors/Selectors_Tasks', 'Css selektoriai, testas - 5 užduotys, (angl.k)'),
(2, '2023-09-04 09:26:16', 'http://howtocodeinhtml.com/chapter0.html', 'Html, css - pažintis, principai, 13 - žingsnių');

-- --------------------------------------------------------

--
-- Table structure for table `nuorodos_kategorijos`
--

CREATE TABLE `nuorodos_kategorijos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nuorodos` int(10) UNSIGNED NOT NULL,
  `id_kategorijos` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nuorodos`
--
ALTER TABLE `nuorodos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nuorodos_kategorijos`
--
ALTER TABLE `nuorodos_kategorijos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategorijos` (`id_kategorijos`),
  ADD KEY `id_nuorodos` (`id_nuorodos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorijos`
--
ALTER TABLE `kategorijos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nuorodos`
--
ALTER TABLE `nuorodos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nuorodos_kategorijos`
--
ALTER TABLE `nuorodos_kategorijos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nuorodos_kategorijos`
--
ALTER TABLE `nuorodos_kategorijos`
  ADD CONSTRAINT `nuorodos_kategorijos_ibfk_1` FOREIGN KEY (`id_kategorijos`) REFERENCES `kategorijos` (`id`),
  ADD CONSTRAINT `nuorodos_kategorijos_ibfk_2` FOREIGN KEY (`id_nuorodos`) REFERENCES `nuorodos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
