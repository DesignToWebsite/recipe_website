-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 07:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `review` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `recipe_id`, `comment`, `review`, `created_at`) VALUES
(2, 2, 1, 'greate', 5, '2023-02-09'),
(4, 2, 1, 'greate', 5, '2023-02-09'),
(5, 2, 1, 'greate', 5, '2023-02-09'),
(6, 2, 1, 'greate', 5, '2023-02-09'),
(7, 2, 1, 'greate', 5, '2023-02-09'),
(8, 2, 1, 'NONE', 0, '2023-02-09'),
(9, 2, 1, 'ammmmmae', 3, '2023-02-10'),
(10, 2, 1, 'eyyyye', 0, '2023-02-10'),
(11, 2, 3, 'greate', 5, '2023-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `contact_me`
--

CREATE TABLE `contact_me` (
  `id_contact` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `message` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_me`
--

INSERT INTO `contact_me` (`id_contact`, `email`, `message`) VALUES
(1, 'ikram@gmail.com', 'hello i need help'),
(2, 'zineb.zineb.zouzou@gmail.com', 'hgqshd dkscjksd');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id_recipe`, `title`, `recipe`, `author`, `is_enabled`) VALUES
(1, 'Cassoulet', 'etape1: des flageolets, etape2: ...', 'ikram@gmail.com', 1),
(3, 'Couscous', '       **** etape1: des carottes, etape2: ...        ', 'zineb@gmail.com', 1),
(4, 'Escalope milanaise', 'etape1: des escalope, etape2: ...', 'mohamed.amine@gmail.com', 1),
(5, 'Salade romaine', 'etape1: des tomatte, etape2: ...', 'zineb@gmail.com', 0),
(6, 'ldslxlds', 'kcxl 555555555555', 'ikram@gmail.com', 1),
(9, 'Cassoulet780', 'jjhlsdfikscv', 'zineb@gmail.com', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `contact_me`
--
ALTER TABLE `contact_me`
  ADD PRIMARY KEY (`id_contact`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_me`
--
ALTER TABLE `contact_me`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id_recipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id_recipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
