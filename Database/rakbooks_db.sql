-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2025 at 07:20 PM
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
-- Database: `rakbooks_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `number`, `password`, `gender`, `address`) VALUES
(3, 'James Bond', 'jamesbond007@gmail.com', 551234567, '$2y$10$x2KunZhPibZObENgASIDAuDzlb9xOcVrIFtpuOt9T48f2LCMjYk/.', 'male', 'Dubai'),
(4, 'Muhammad Sarfaraz', 'destroyer24601@gmail.com', 2147483647, '$2y$10$cbmLzyV7Ds82p9b7yS6qL.crdXaFpkxIxAp686NLz.V04MxJNMtPe', 'male', 'Al Ain'),
(5, 'Testing admin', 'testingadmin@gmail.com', 12345678, '$2y$10$Mf1EpP63OljyE13j5x6FdeyT0RVcJF1ZKyPW3uQJw8rWwept.dw/S', 'other', 'RAK');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `number`, `gender`, `password`, `address`) VALUES
(2, 'Dave', '456@gmail.com', '551234', 'male', '$2y$10$O3R74SIcMEV0egTm7zXjPe3uGYH0TG9Wx1G4SuSdu.ebXBp9xOiSy', 'Abu Dhabi'),
(3, 'Testing', 'testing123@gmail.com', '987345678', 'other', '$2y$10$AL65QdRYlapS78Vgup3XLe72rhKGIOjoBPbFVX02JtAIX4Lnprseq', 'Sharjah');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `book_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `book_id`, `email`, `name`, `address`, `payment_method`, `order_status`) VALUES
(5, '9781610392501', 'testing123@gmail.com', 'Testing 5', 'Nyadat, Al Ain', 'Credit Card', 'Order Received'),
(6, '9781786330895', 'testing123@gmail.com', 'Testing 5', 'Nyadat, Al Ain', 'Credit Card', 'Order in Process'),
(7, '9780553103540', 'testing123@gmail.com', 'Muhammad Sarfaraz', 'MBZ City, Abu Dhabi', 'Cash on Delivery', 'Out for Delivery'),
(8, '9781802944976', 'testing123@gmail.com', 'Muhammad Sarfaraz', 'MBZ City, Abu Dhabi', 'Cash on Delivery', 'Order Completed'),
(9, '9780743273565', 'testing123@gmail.com', 'Muhammad Sarfaraz', 'Al Salamat, Al Ain', 'Cash on Delivery', 'Order Received'),
(10, '9780547928227', 'testing123@gmail.com', 'Muhammad Sarfaraz', 'Al Salamat, Al Ain', 'Cash on Delivery', 'Order Received'),
(11, '9781893224544', 'testing123@gmail.com', 'Muhammad Sarfaraz', 'Al Nahda, Sharjah', 'Credit Card', 'Order Received');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
