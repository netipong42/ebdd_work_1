-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 04:17 PM
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
-- Database: `mycompany`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorize`
--

CREATE TABLE `authorize` (
  `user_no` int(11) NOT NULL,
  `module_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_no` varchar(50) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_street` varchar(50) NOT NULL,
  `cust_city` varchar(50) NOT NULL,
  `cust_state` varchar(50) NOT NULL,
  `cust_zip` varchar(10) NOT NULL,
  `ship_to_name` varchar(50) NOT NULL,
  `ship_to_street` varchar(50) NOT NULL,
  `ship_to_city` varchar(50) NOT NULL,
  `ship_to_state` varchar(50) NOT NULL,
  `ship_to_zip` varchar(10) NOT NULL,
  `credit_limit` float NOT NULL,
  `last_revised` date NOT NULL,
  `credit_terms` varchar(50) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_type` varchar(100) NOT NULL,
  `image_data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_no` varchar(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `location` varchar(50) NOT NULL,
  `qty_on_hand` int(11) NOT NULL,
  `reorder_pt` int(11) NOT NULL,
  `sup_no` varchar(50) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_type` varchar(100) NOT NULL,
  `image_data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `sup_no` varchar(50) NOT NULL,
  `sup_company` varchar(50) NOT NULL,
  `sup_contact` varchar(50) NOT NULL,
  `sup_telephone` varchar(50) NOT NULL,
  `sup_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_no` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_type` varchar(100) NOT NULL,
  `image_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorize`
--
ALTER TABLE `authorize`
  ADD PRIMARY KEY (`user_no`,`module_no`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_no`),
  ADD KEY `sup_no` (`sup_no`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sup_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`sup_no`) REFERENCES `suppliers` (`sup_no`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
