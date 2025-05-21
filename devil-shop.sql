-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2025 at 07:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devil-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `price`, `name`, `description`, `image`, `category_id`) VALUES
(1, 150.00, 'Phone Call with Satan', 'When buying this product you will be given a phone call with the Dark Lord himself, Satan! This call is guaranteed to last at least 666 seconds.', 'phone.png', 1),
(2, 50.00, 'Ticket to Hell', 'This is a ticket to Hell. When you say that someone should go to hell, this is the gift for them. Buying this item will send the person straight to Hell.', 'ticket.png', 2),
(3, 20.00, 'Summoning my first demon, a book for young children', 'What is a good way for children to learn how to summon a demon? In this book we will explain how a child can summon their first demon.', 'summoning.png', 5),
(4, 20.00, ' I accidentally summoned a demon and I don\'t know what to do, a romance novel', 'A thrilling story about love danger and demonic drama.\r\nIn this book follow the story of Alex Nilesson who accidentally summoned a demon and fell in love with them.', 'book.png', 5),
(5, 10.00, 'Summoning Candles', 'This is a just set of summoning candles, nothing special.', 'candle.png', 3),
(6, 70.00, 'Artificial Blood', 'This is an artificial blood pack for summoning demons with specific dietary constraints.', 'bloodbag.png', 3),
(7, 66.66, 'Satan\'s Contracts™ Booster Pack', 'Collect all of the contracts made by Satan throughout history with this standard 5 card booster pack.', 'satans-contracts-boosterpack-1.png', 4),
(8, 18.99, ' Dante’s Inferno, A Travel Guide', 'An epic describing Dante Alighieri\'s journey through the levels of Hell.', 'inferno.png', 5),
(9, 300.00, '3000 Year Old Paper', 'A 3000 year old paper perfect for your contracting needs.', 'paper.png', 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
