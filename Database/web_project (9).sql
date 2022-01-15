-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 10:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userID` int(255) NOT NULL,
  `productID` int(255) NOT NULL,
  `productQuantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userID`, `productID`, `productQuantity`) VALUES
(4, 2, 15),
(4, 3, 8),
(1, 1, 3),
(1, 3, 1),
(1, 6, 4),
(0, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(100) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `received_by` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sent_by`, `received_by`, `message`, `createdAt`) VALUES
(0, 1, 1, 'Hey', '2022-01-12 09:33:49pm');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(14) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_price` int(255) UNSIGNED NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `product_name`, `product_type`, `product_price`, `product_image`) VALUES
(1, 'Iphone 8', 'Electronics', 300, 'Product/mx242ba.jpg'),
(2, 'Echo Dot (3rd Gen, 2018 release) - Smart speaker with Alexa - Charcoal', 'Electronics', 250, 'Product/OIP.jpg'),
(4, 'Rubber Encased Hex Dumbbell', 'Gym', 50, 'Product/919d46mH0cL._AC_SX569_.jpg'),
(5, 'Knife Set TICWELL 19 Pieces', 'Kitchen', 25, 'Product/71CU8m9N+hS._AC_SL1500_.jpg'),
(6, ' Metal Fidget Spinner', 'Toys', 20, 'Product/81L7gXHlMqL._AC_SL1500_.jpg'),
(7, 'Coffee Maker', 'Kitchen', 80, 'Product/61oI19Nex8L._AC_SL1500_.jpg'),
(8, 'Magnetic Exercise Bikes Stationary', 'Sports', 300, 'Product/613kX4SRzDL._AC_SL1500_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `userID` int(11) NOT NULL,
  `Review` text NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Types` text NOT NULL,
  `Address` text NOT NULL,
  `Email` text NOT NULL,
  `MobileNumber` int(11) NOT NULL,
  `Password` text NOT NULL,
  `Birthdate` date NOT NULL,
  `ProfilePicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `FirstName`, `LastName`, `Types`, `Address`, `Email`, `MobileNumber`, `Password`, `Birthdate`, `ProfilePicture`) VALUES
(1, 'Sherif', 'Nagaty', 'auditor', 'Obour city', 'Sherifwael@gmail.com', 1112275122, 'MIU123', '2001-08-07', 'img/blank-profile-picture-973460_1280.png'),
(2, 'Ibrahim', 'mohamed', 'Admin', 'ismalia', 'ibrahim.mo@gmail.com', 1241155632, '111222', '2000-10-10', 'img/03.png'),
(4, 'Monica ', 'Hany', 'HR Partner', 'cairo, egypt', 'Monicahany@gmail.com', 1277199403, '123', '2021-07-28', 'img/images.png'),
(13, 'Mohamed', 'Salah', 'Customer', 'Nasr city', 'MoSalah@hotmail.com', 2147483647, '111', '2012-01-02', 'img/02.png'),
(14, 'Nagaty', 'Khaled', 'Customer', 'Cairo', 'Nagaty@gmail.com', 1002323112, '1212', '1985-07-14', 'img/01.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`productID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
