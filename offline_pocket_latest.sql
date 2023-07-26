-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 10:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offline_pocket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'ziqo', 'admin@google.com', '1234'),
(2, 'amir', 'amirfirdaus@gmail.com', '1234'),
(3, 'sayang', 'yow@gmail.com', '1234'),
(4, 'haziq', 'haziq@gmail.com', 'ziq123');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account_table`
--

CREATE TABLE `bank_account_table` (
  `account_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_account_table`
--

INSERT INTO `bank_account_table` (`account_id`, `username`, `password`, `balance`) VALUES
(1, 'user', 'pass', 11904.26);

-- --------------------------------------------------------

--
-- Table structure for table `gamedata`
--

CREATE TABLE `gamedata` (
  `id` int(10) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `gameType` varchar(20) NOT NULL,
  `gameImage` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gameBanner` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nameIngameCurrency` varchar(50) NOT NULL,
  `ingameCurrency1` varchar(100) DEFAULT NULL,
  `realCurrency1` decimal(10,2) DEFAULT NULL,
  `ingameCurrency2` varchar(100) DEFAULT NULL,
  `realCurrency2` decimal(10,2) DEFAULT NULL,
  `ingameCurrency3` varchar(100) DEFAULT NULL,
  `realCurrency3` decimal(10,2) DEFAULT NULL,
  `ingameCurrency4` varchar(100) DEFAULT NULL,
  `realCurrency4` decimal(10,2) DEFAULT NULL,
  `ingameCurrency5` varchar(100) DEFAULT NULL,
  `realCurrency5` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gamedata`
--

INSERT INTO `gamedata` (`id`, `gameName`, `gameType`, `gameImage`, `gameBanner`, `nameIngameCurrency`, `ingameCurrency1`, `realCurrency1`, `ingameCurrency2`, `realCurrency2`, `ingameCurrency3`, `realCurrency3`, `ingameCurrency4`, `realCurrency4`, `ingameCurrency5`, `realCurrency5`) VALUES
(123, 'PUBG Mobile', 'MOBILE', 'pocketImage/sementara/pubg.jpg', 'pocketImage/sementara/PubgBanner.jpg', 'UC', '100', 10.00, '500', 47.90, '1000', 95.70, '2000', 180.90, '4000', 350.60),
(124, 'Mobile Legend', 'MOBILE', 'pocketImage/sementara/ml.jpg', 'pocketImage/sementara/MobileBanner.jpg', 'Diamond', '13 + 1', 2.85, '127 + 13', 10.20, '383 + 46', 28.53, '633 + 83', 59.62, '1252 +194', 95.09),
(125, 'Roblox', 'PC', 'pocketImage/sementara/roblox.jpg', 'pocketImage/sementara/robloxbanner.jpg', 'Robux', '80', 4.99, '160', 9.98, '240', 14.96, '320', 19.80, 'Gold week', 39.90),
(126, 'Genshin Impact', 'PC', 'pocketImage/sementara/genshin.jpg', 'pocketImage/sementara/GenshinBanner.jpg', 'Primogem', '2500', 30.99, '5000', 58.98, '7000', 150.90, '10000', 302.46, '20000', 598.88),
(128, 'Call Of Duty', 'CONSOLE', 'pocketImage/sementara/cod.jpg', 'pocketImage/sementara/warzonebanner.jpg', 'CP', '1200', 19.22, '4000', 60.12, '5000', 70.33, '12000', 159.77, '15000', 180.90),
(129, 'Fate Grand/order', 'CONSOLE', 'pocketImage/sementara/fgo.jpg', 'pocketImage/sementara/fgobanner.jpe', 'Saints Quartz JP', '1', 4.99, '10', 25.99, '15', 30.99, '30', 59.92, 'Weekly Bonus', 19.99);

-- --------------------------------------------------------

--
-- Table structure for table `gametransaction`
--

CREATE TABLE `gametransaction` (
  `transactionID` int(11) NOT NULL,
  `user_id` int(70) NOT NULL,
  `gameID` varchar(10) NOT NULL,
  `gameName` varchar(50) NOT NULL,
  `gameType` varchar(50) NOT NULL,
  `userID` varchar(10) NOT NULL,
  `userServer` varchar(50) NOT NULL,
  `realCurrency` decimal(10,2) NOT NULL,
  `inGameCurrency` varchar(50) NOT NULL,
  `paymentType` varchar(10) NOT NULL,
  `userEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gametransaction`
--

INSERT INTO `gametransaction` (`transactionID`, `user_id`, `gameID`, `gameName`, `gameType`, `userID`, `userServer`, `realCurrency`, `inGameCurrency`, `paymentType`, `userEmail`) VALUES
(28, 0, '125', 'Roblox', '', '1223122', 'Asia', 19.80, 'Robux  320', 'Online Ban', 'maisabah@fmail.comd'),
(29, 0, '125', 'Roblox', '', '122212', 'Asia', 19.80, 'Robux  320', 'Online Ban', ''),
(30, 0, '125', 'Roblox', '', '1212312', 'China', 9.98, 'Robux  160', '', ''),
(31, 0, '125', 'Roblox', '', '123123', 'North America', 14.96, 'Robux  240', 'Online Ban', ''),
(32, 0, '125', 'Roblox', '', '3453456', 'Asia', 19.80, 'Robux  320', 'Online Ban', ''),
(33, 0, '125', 'Roblox', '', '456325342', 'South America', 19.80, 'Robux  320', 'Online Ban', ''),
(34, 0, '125', 'Roblox', '', '234234324', 'China', 9.98, 'Robux  160', 'Online Ban', ''),
(35, 0, '129', 'Fate Grand/order', 'CONSOLE', '123123', '', 30.99, 'Saints Quartz JP  15', 'Online Ban', ''),
(36, 0, '129', 'Fate Grand/order', 'CONSOLE', '12312321', 'Asia', 4.99, 'Saints Quartz JP  1', 'Online Ban', ''),
(37, 0, '129', 'Fate Grand/order', 'CONSOLE', '2352343', 'Europe', 25.99, 'Saints Quartz JP  10', 'Online Ban', '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `user_id` int(70) NOT NULL,
  `transactionID` int(11) NOT NULL,
  `status_approval` varchar(255) DEFAULT NULL,
  `status_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`user_id`, `transactionID`, `status_approval`, `status_admin`) VALUES
(101, 27, 'paid', 'Approved'),
(103, 29, 'cancelled', 'No evaluation'),
(103, 30, 'cancelled', 'No evaluation'),
(103, 31, 'paid', 'No evaluation'),
(104, 32, 'paid', 'No evaluation'),
(103, 36, 'paid', 'No evaluation'),
(103, 37, 'paid', 'No evaluation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(70) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_email`, `user_password`) VALUES
(103, 'm', 'm@m.com', 'm'),
(104, 'm', 'mm@m', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_account_table`
--
ALTER TABLE `bank_account_table`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `gamedata`
--
ALTER TABLE `gamedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gametransaction`
--
ALTER TABLE `gametransaction`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gamedata`
--
ALTER TABLE `gamedata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `gametransaction`
--
ALTER TABLE `gametransaction`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
