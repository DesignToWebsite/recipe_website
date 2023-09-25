-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 12:49 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partage_de_recette`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id_recipe` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `recipe` text NOT NULL,
  `author` varchar(300) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id_recipe`, `title`, `recipe`, `author`, `is_enabled`) VALUES
(1, 'Cassoulet', 'etape1: des flageolets, etape2: ...', 'ikram@gmail.com', 1),
(3, 'Couscous', 'etape1: des carottes, etape2: ...', 'zineb@gmail.com', 1),
(4, 'Escalope milanaise', 'etape1: des escalope, etape2: ...', 'mohamed.amine@gmail.com', 1),
(5, 'Salade romaine', 'etape1: des tomatte, etape2: ...', 'zineb@gmail.com', 0),
(6, 'ldslxlds', 'kcxl 555555555555', 'ikram@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`, `age`) VALUES
(1, 'Ikram Essoussi', 'ikram@gmail.com', 'ikram', 17),
(2, 'Zineb Essoussi', 'zineb@gmail.com', 'zineb', 20),
(3, 'mohamed amine Essoussi', 'mohamed.amine@gmail.com', 'mohamed', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id_recipe`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id_recipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
