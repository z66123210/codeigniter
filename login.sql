-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 06:04 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `planeID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `id`, `planeID`) VALUES
(81, 2, 1012);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `planeID` int(10) NOT NULL,
  `airline` varchar(20) NOT NULL,
  `depDate` int(10) NOT NULL,
  `arriveDate` int(10) NOT NULL,
  `departFrom` varchar(20) NOT NULL,
  `arriveTo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`planeID`, `airline`, `depDate`, `arriveDate`, `departFrom`, `arriveTo`) VALUES
(1000, 'AirAsia', 1, 3, 'Taipei', 'Tokyo'),
(1001, 'Scoot', 4, 5, 'Taipei', 'Sydney'),
(1002, 'Eva_Air', 1, 5, 'Sydney', 'Taipei'),
(1003, 'Eva_Air', 2, 5, 'Tokyo', 'Taipei'),
(1004, 'Eva_Air', 3, 5, 'Sydney', 'Tokyo'),
(1005, 'Eva_Air', 4, 5, 'Shanghai', 'Taipei'),
(1006, 'Airasia', 1, 4, 'Tokyo', 'Shanghai'),
(1007, 'Airasia', 2, 4, 'Tokyo', 'Sydney'),
(1008, 'Airasia', 3, 4, 'Taipei', 'Shanghai'),
(1009, 'Scoot', 1, 3, 'Shanghai', 'Taipei'),
(1010, 'Scoot', 1, 3, 'Tokyo', 'Shanghai'),
(1011, 'Cebu_Pacific', 2, 3, 'Tokyo', 'Sydney'),
(1012, 'Cebu_Pacific', 1, 2, 'Tokyo', 'Taipei');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_name`, `user_email`, `user_password`) VALUES
(1, '66123210', '66123210@gmail.com', '0000'),
(2, '1111', '1111@gmail.com', '1111'),
(3, '333', '333@gmial.com', '333'),
(4, 'test', 'test@email.com', 'test'),
(5, 'Apple', 'Apple@gmail.com', 'Bigapple'),
(6, '9999', '9999@hotmail.com', '9999'),
(7, '8888', '8888@gmail.com', '8888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `id` (`id`),
  ADD KEY `planeID` (`planeID`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`planeID`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `planeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_login` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`planeID`) REFERENCES `timetable` (`planeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
