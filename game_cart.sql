-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 09:27 PM
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
-- Database: `gamecart`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `image`, `price`) VALUES
(1, 'NFS HEAT', 'game1.jpg', 250),
(2, 'NEED FOR SPEED THE RUN', 'game2.jpg', 275),
(3, 'Call Of Duty MW3', 'game6.png', 300),
(4, 'Call Of Duty BO II', 'game5.png', 275),
(5, 'Assasins Creed Syndicate', 'game7.png', 275),
(6, 'Assasins Creed Vallhalla', 'game8.png', 275),
(7, 'NEED FOR SPEED Shift', 'game4.png', 275),
(8, 'NEED FOR SPEED No Limits', 'game3.jpg', 275);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `method` varchar(100) NOT NULL,
  `flat` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `total_products` varchar(200) NOT NULL,
  `total_price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `flat`, `city`, `country`, `total_products`, `total_price`) VALUES
(2, 'abc', 9876, 'abc@gmail.com', 'cash on delivery', 'motijheel', 'Dhaka', 'Bangladesh', 'Call Of Duty MW3 (1) , NFS HEAT (1) , Assasins Creed Syndicate (1) ', 825),
(3, 'masud', 234567, 'masuidda@gmail.com', 'credit card', 'uttara', 'Dhaka', 'Bangladesh', 'Call Of Duty MW3 (1) ', 300),
(4, 'ali', 2456543, 'alibhai@gmail.com', 'COD', '25,motijheel', 'Dhaka', 'Bangladesh', 'NEED FOR SPEED THE RUN (1) , NEED FOR SPEED No Limits (1) , NEED FOR SPEED Shift (2) ', 1100),
(5, 'abu', 254323456, 'abu12@gmail.com', 'COD', '25,uttara', 'Dhaka', 'Bangladesh', 'NFS The Run, NFS shift, assasins creed, Assasins Creed Syndicate', 105),
(6, 'alim', 65433456, 'alim12@gmail.com', 'credit card', '25,hatirjheel', 'Dhaka', 'Bangladesh', 'NFS Heat, NFS shift, call of duty mw3, Call Of Duty BO II', 100),
(7, 'abc', 234543, 'abc@gmail.com', 'COD', '25,motijheel', 'Dhaka', 'Bangladesh', 'NFS Heat, NFS shift, call of duty mw3, Call Of Duty BO II', 100),
(9, 'alam', 87578, 'alam12@gmail.com', 'COD', '25,uttara', 'Dhaka', 'Bangladesh', 'NFS Heat, NFS shift, call of duty mw3, assasins creed, Call Of Duty BO II', 130);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProdName` varchar(50) DEFAULT NULL,
  `ProductID` int(11) NOT NULL,
  `Price` double(7,2) DEFAULT NULL,
  `ImageLink` varchar(500) DEFAULT NULL,
  `IsDeleted` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProdName`, `ProductID`, `Price`, `ImageLink`, `IsDeleted`) VALUES
('NFS shift', 134, 25.00, 'game4.png', 1),
('call of duty mw3', 137, 25.00, 'game6.png', 0),
('assasins creed', 139, 25.00, 'game7.png', 0),
('Call Of Duty BO II', 143, 25.00, 'game5.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(3) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `UserType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Password`, `Phone`, `Address`, `UserType`) VALUES
(49, 'ad', 'abc@gmail.com', '3456', '345678', '24 north carolina,USA', 'user'),
(50, 'admin', 'adm111@gmail.com', '123', '0998877660', '24 san francisco,USA', 'admin'),
(51, 'qwe', 'dobo12@gmail.com', '123', '23456787', '56 davidoff,uk', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `ProdName` (`ProdName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
