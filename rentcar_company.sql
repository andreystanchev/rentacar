-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 05:34 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar_company`
--
CREATE DATABASE IF NOT EXISTS `rentcar_company` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rentcar_company`;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `model` varchar(25) NOT NULL,
  `reg_num` varchar(10) NOT NULL,
  `horse_powers` smallint(6) NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `reg_num`, `horse_powers`, `color`) VALUES
(1, 'Volvo', '140', 'VT 1433 HF', 180, 'white'),
(2, 'Volvo', 'C70', 'HD 2213 OP', 110, 'black'),
(3, 'BMW', '3200 CS coupe', 'KD 9103 FO', 250, 'gray'),
(4, 'Toyota', 'Tundra', 'QU 1103 DP', 420, 'black'),
(5, 'Opel', 'Astra', 'VT 1233 ST', 80, 'lime'),
(6, 'Citroen', 'C3', 'CA 0167 KL', 60, 'yellow'),
(7, 'Peugeot', '309', 'GB 6165', 450, 'orange'),
(8, 'Seat', 'Ibisa', 'IJ 1101 WE', 190, 'purple'),
(9, 'Seat', 'Leon', 'JI 1813 BN', 150, 'maroon'),
(10, 'Citroen', 'C4', 'BN 2583 NZ', 100, 'white'),
(11, 'Bentley', 'Mulsanne', 'EU 2030 TR', 230, 'black'),
(13, 'BMW', 'E87', 'sf 1261 PP', 115, 'black'),
(14, 'BMW', 'M5', 'GD 3211 HP', 507, 'black'),
(15, 'Toyota', 'Corolla', 'GB 7653 P', 97, 'purple'),
(16, 'Opel', 'Tigra', 'GH 3215 P', 125, 'lime'),
(17, 'Peugeot', '206', 'VT 5431 HP', 75, 'orange'),
(18, 'Bentley', 'Azure', 'YT 7654 H', 389, 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `age` int(11) NOT NULL,
  `license_category` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `age`, `license_category`) VALUES
(1, 'Petar', 'Petrov', 20, 'B'),
(2, 'Galin', 'Svetlozarov', 20, 'B'),
(3, 'Momchil', 'Vasilev', 24, 'C+E'),
(4, 'Ibrahim', 'Mustakovich', 66, 'B'),
(5, 'Ivan', 'Petkov', 36, 'B'),
(6, 'Rumen', 'Hristov', 18, 'D'),
(7, 'Iliqn', 'Vasilareas', 21, 'B'),
(8, 'Teodor', 'Radev', 23, 'B'),
(9, 'Evgeni', 'Andreev', 28, 'B, C'),
(10, 'Nikolay', 'Tsankov', 20, 'B'),
(11, 'Ivan', 'Pavlov', 50, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `clients_cars`
--

CREATE TABLE `clients_cars` (
  `clients_id` int(11) NOT NULL,
  `cars_id` int(11) NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients_cars`
--

INSERT INTO `clients_cars` (`clients_id`, `cars_id`, `rent_date`, `return_date`) VALUES
(1, 1, '2017-10-02', '2017-10-06'),
(1, 13, '2017-10-09', '2017-10-12'),
(2, 2, '2017-10-20', '2017-10-25'),
(2, 14, '2017-10-20', '2017-10-21'),
(3, 3, '2017-10-04', '2017-10-08'),
(3, 15, '2017-10-17', '2017-10-20'),
(4, 16, '2017-10-01', '2017-10-05'),
(5, 5, '2017-10-12', '2017-10-16'),
(5, 17, '2017-10-07', '2017-10-12'),
(6, 18, '2017-10-28', '2017-10-29'),
(7, 10, '2017-10-15', '2017-10-18'),
(8, 8, '2017-10-17', '2017-10-21'),
(9, 7, '2017-10-13', '2017-10-16'),
(10, 6, '2017-10-24', '2017-10-26'),
(10, 11, '2017-10-17', '2017-10-22'),
(11, 4, '2017-10-25', '2017-10-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_cars`
--
ALTER TABLE `clients_cars`
  ADD PRIMARY KEY (`clients_id`,`cars_id`),
  ADD KEY `cars_id` (`cars_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients_cars`
--
ALTER TABLE `clients_cars`
  ADD CONSTRAINT `clients_cars_ibfk_1` FOREIGN KEY (`cars_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `clients_cars_ibfk_2` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
