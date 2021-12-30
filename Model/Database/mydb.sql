-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 05:16 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `user_id`, `password`) VALUES
(1, 'Zami', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(8) NOT NULL,
  `car_id` int(8) NOT NULL,
  `customer_id` int(6) UNSIGNED NOT NULL,
  `starts_from` varchar(80) NOT NULL,
  `ends_to` varchar(80) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `total_days` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `car_id`, `customer_id`, `starts_from`, `ends_to`, `start_date`, `start_time`, `total_days`) VALUES
(39, 9, 40, 'A', 'B', '2021-12-31', '11:00:00', 2),
(40, 9, 41, 'B', 'D', '2022-01-01', '01:10:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carID` int(11) NOT NULL,
  `car_name` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `reg_no` varchar(40) NOT NULL,
  `mileage` float NOT NULL,
  `fare` int(11) NOT NULL,
  `booked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carID`, `car_name`, `image`, `reg_no`, `mileage`, `fare`, `booked`) VALUES
(9, 'Lancia', 'lancia.jpg', '23-7184', 10, 6000, 0),
(10, 'Toyota GT-86', 'gt86.jpg', '34-2183', 18, 10000, 0),
(13, 'grey hiace', 'Car-2.jpg', '45-8695', 1233, 5672, 0),
(14, 'mercedez benz', 'Car-3.jpg', '45-8633', 1288, 5609, 0),
(18, 'Noah', 'Car21.jpg', '1234587', 13, 1250, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nid_no` varchar(15) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `address` varchar(80) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `name`, `email`, `nid_no`, `phone_number`, `address`, `reg_date`) VALUES
(40, 'zami', '1234', 'Zami', 'zami@gmail.com', '123456789123', '01777777777', 'abc', '2021-12-30 15:42:13'),
(41, 'John', '1234', 'John', 'John@hotmail.com', '123456789123', '01999999999', '123', '2021-12-30 15:50:57'),
(42, 'Tanzid', '1234', 'Tanzid', 'lethal@yahoo.com', '123456789876', '01666666666', 'DmD', '2021-12-30 16:07:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`carID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
