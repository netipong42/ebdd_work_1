-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 07:25 AM
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
  `credit_terms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_no`, `cust_name`, `cust_street`, `cust_city`, `cust_state`, `cust_zip`, `ship_to_name`, `ship_to_street`, `ship_to_city`, `ship_to_state`, `ship_to_zip`, `credit_limit`, `last_revised`, `credit_terms`) VALUES
('1', '11', '11', '11', '11', '11', '11', '11', '11', '11', '11', 11, '2021-12-07', '11'),
('2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', 2, '2021-12-06', '2');

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
  `sup_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_no`, `item_name`, `price`, `location`, `qty_on_hand`, `reorder_pt`, `sup_no`) VALUES
('12', '12', 12, '12', 12, 12, 1),
('123', '123', 123, '123', 123, 123, 1),
('23123', '1231', 32123, '123', 123, 3212, 1),
('444', '44', 44, '44', 44, 44, 1);

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

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sup_no`, `sup_company`, `sup_contact`, `sup_telephone`, `sup_email`) VALUES
('1', '1', '1', '1', '1'),
('2', '2', '2', '2', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_no`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_no`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`sup_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
