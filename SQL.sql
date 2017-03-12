-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2017 at 09:10 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `promo` float NOT NULL,
  `number_left` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `add_date`, `category`, `price`, `promo`, `number_left`) VALUES
(54, 'Chaussettes', 'Une belle paire de chaussettes rayÃ©es bien assorties', '2017-03-12 18:20:27', 'VÃªtements', 5, 0, 50),
(55, 'Chaussures', 'Les chaussures sont comme Ã§a et tout', '2017-03-12 18:22:03', 'Accessoires', 70, 20, 30),
(58, 'T-shirt', 'Un bout de tissus avec des trous pour les bras et la tÃªte.', '2017-03-12 18:44:12', 'VÃªtements', 10, 0, 40),
(61, 'Chapeau', 'Le truc sur la tÃªte', '2017-03-12 20:42:41', 'Accessoires', 20, 0, 16),
(62, 'Carte cadeau', 'Pour ne jamais se tromper', '2017-03-12 20:43:50', 'Autre', 15, 5, 100),
(63, 'Chemise', 'Rouge Ã  carreaux boutonnÃ©e jusqu''en haut #hipster', '2017-03-12 20:49:56', 'VÃªtements', 40, 20, 0),
(64, 'Manteau', 'Davantage d''actualitÃ© que le bob', '2017-03-12 20:51:08', 'VÃªtements', 70, 0, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
