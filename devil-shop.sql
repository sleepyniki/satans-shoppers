-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 01:13 PM
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
-- Table structure for table `cart-items`
--

CREATE TABLE `cart-items` (
  `id` int(11) NOT NULL,
  `product-id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categories_id`, `categories_name`) VALUES
(1, 'Demons'),
(2, 'Contracts'),
(3, 'Summoning materials'),
(4, 'Collectibles'),
(5, 'Books');

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
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `price`, `name`, `description`, `image`, `categories`) VALUES
(1, 150.00, 'phone call with satan', 'when buying this product you will be given a phone call with the dark lord him self satan! this call i guaranteed to last at least 666 second\'s ', 'phone.png', 'Demons'),
(2, 50.00, 'ticket to hell  ', 'this is a ticket to hell when you say that someone should go to hell this is the gift for them buying this item will send the person straight to hell', 'ticket.png', 'Summoning materials '),
(3, 20.00, 'Summoning my first demon, a children\'s book, for young children', 'what a good way for children to learn how to summon a demon? in this book we will explain how a child can summon there first demon ', 'summoning.png', 'books'),
(4, 20.00, ' I accidentally summoned a demon and I don\'t know what to do, een love romance novel', 'in this book we follow the main protagonist\r\nwho accidentally summons a demon and falls in love with them a trilling story about love danger and demonic drama', 'book.png', 'books'),
(5, 10.00, 'summoning Candles', 'this is a set of summoning Candles ', 'candle.png', 'Summoning materials'),
(6, 70.00, 'Artificial blood ', 'this is a Artificial blood pack for your summoning need ', 'bloodbag.png', 'Summoning materials'),
(7, 66.66, 'Satan\'s contracts booster pack', 'this is a booster pack for your soul contracting needs ', 'satans-contracts-boosterpack-1.png', 'Collectibles'),
(8, 18.99, ' Dante’s Inferno, a travel guide ', 'Dante\'s Inferno. An epic and searing poem, that takes the reader on an intense journey through the darkest pits of hell. As as travel guide', 'inferno.png', 'books'),
(9, 300.00, '3000 year old paper', 'this is a paper from 3000 years ago use it for all your contracting need ', 'paper.png', 'Contracts');

-- --------------------------------------------------------

--
-- Table structure for table `shopping-cart`
--

CREATE TABLE `shopping-cart` (
  `id` int(11) NOT NULL,
  `user-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `streetname` varchar(255) NOT NULL,
  `housenumber` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart-items`
--
ALTER TABLE `cart-items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping-cart`
--
ALTER TABLE `shopping-cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart-items`
--
ALTER TABLE `cart-items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shopping-cart`
--
ALTER TABLE `shopping-cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
