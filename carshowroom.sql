-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 03:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carshowroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(128) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Sara', 'sara@gmail.com', 'adminadmin');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(128) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(128) NOT NULL,
  `regnum` varchar(255) NOT NULL,
  `price` int(128) NOT NULL,
  `car_image` text NOT NULL,
  `quantity` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `brand`, `model`, `year`, `regnum`, `price`, `car_image`, `quantity`) VALUES
(4, 'McLaren', 'MC480', 2021, 'DA4545', 1500000, '-mclaren-.jpg', 52),
(19, 'Buggati', 'Divo', 2022, 'CA1451', 1300000, 'Divo.jpg', 3),
(20, 'Nissan', 'GTR5', 2020, 'AB1213', 1000000, 'nissan-gtr.png', 2),
(22, 'Toyota', 'Corrola', 2020, 'SA1212', 10000, 'Corrola.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `comp_id` int(128) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comp` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`comp_id`, `name`, `email`, `phone`, `comp`, `feedback`) VALUES
(1, 'Nahiyan', 'nahiyan@gmail.com', '01976973020', 'Hello', 'Solved'),
(2, 'Zaion', 'zaion@gmail.com', '122354', 'Helllo', 'Solved'),
(3, 'Zaion', 'zaion@gmail.com', '122354', 'Thanks', 'Solved');

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `exp_id` int(128) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`exp_id`, `name`, `email`, `phone`, `location`) VALUES
(1, 'Faiaz', 'faiaz@gmail.com', '12344678', 'Dhanmondi');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_id` int(128) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Phone_No` int(128) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Pay_Mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_id`, `Full_Name`, `email`, `Phone_No`, `Address`, `Pay_Mode`) VALUES
(44, 'Faiaz', 'faiaz@gmail.com', 12344678, 'WRRA', 'COD'),
(45, 'Faiaz', 'faiaz@gmail.com', 12344678, 'WRRA', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(128) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(128) NOT NULL,
  `quantity` int(128) NOT NULL,
  `buyer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `brand`, `model`, `year`, `quantity`, `buyer`) VALUES
(1, 'BMW', 'X7', 2020, 2, 'rafi@gmail.com'),
(2, 'Toyota', 'Corrola', 2022, 3, 'NAhiyan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(128) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password_hash`) VALUES
(1, 'Rafi', 'alrafiahmed3@gmail.com', '$2y$10$CKUvtS7/wPkrPTakWk4nGeFq4ZkadG3Nu5ovk2JaWVBAaPl/FiNVi'),
(4, 'Moinul', 'moinul@gmail.com', '$2y$10$bT/2LxT6RzQxQE3vzJTe9O1XdLpTnmLmr8EZQujeerBi7vK3UoYnO'),
(6, 'Zaion', 'zaion@gmail.com', '$2y$10$6plNKRzkPK8PymyRvP6U1.9SA3K9xC2.RJB3SFULKxHXSMDw87iki'),
(7, 'Elora', 'elora@gmail.com', '$2y$10$P1OMJ1lmv6J13UeDsDmRoe.1UZ4Wzo2qH6rLma/6kFj.wb273Hgze'),
(8, 'Sanzana', 'sanzana@gmail.com', '$2y$10$8yp13BWBvyroWMU3tDdZ9uDlJRySmj/HUwj1aFLDAzwKvK3JUlc5S'),
(9, 'Samiha', 'samiha@gmail.com', '$2y$10$PwEdM0o69CQXztQ9lt3q1.OiJ7s3jjVWcOPOTrC3f4J/Y0O9W8kFW');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(128) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` int(128) NOT NULL,
  `quantity` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `item_name`, `price`, `quantity`) VALUES
(44, 'McLaren MC480 2021', 1500000, 1),
(44, 'Toyota Corrola 2022', 10000, 1),
(45, 'McLaren MC480 2021', 1500000, 1),
(45, 'Toyota Corrola 2022', 10000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `regnum` (`regnum`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`exp_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `comp_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `exp_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
