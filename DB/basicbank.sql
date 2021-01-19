-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 04:32 PM
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
-- Database: `basicbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `TransId` int(25) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `fan` int(25) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `lan` int(25) NOT NULL,
  `amount` int(20) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`TransId`, `fname`, `fan`, `lname`, `lan`, `amount`, `Date`) VALUES
(7, 'Rahul Kishore', 200110, 'Rohit Kumar', 200112, 500, '2021-01-11 16:50:10'),
(8, 'Piyush Kumar', 200111, 'Rohit Kumar', 200112, 1500, '2021-01-11 16:50:10'),
(9, 'Piyush Kumar', 200111, 'Rahul Kishore', 200110, 1400, '2021-01-11 16:50:10'),
(10, 'Abhishek Rathod', 200115, 'Aniket', 200114, 199600, '2021-01-11 16:50:10'),
(11, 'Abhishek Rathod', 200115, 'Aniket', 200114, 100, '2021-01-11 16:50:10'),
(12, 'Rahul Kishore', 200110, 'Piyush Kumar', 200111, 100, '2021-01-11 16:50:10'),
(13, 'Rahul Kishore', 200110, 'Piyush Kumar', 200111, 20, '2021-01-11 16:50:10'),
(14, 'Piyush Kumar', 200111, 'Rahul Kishore', 200110, 500, '2021-01-11 16:55:33'),
(15, 'Rahul Kishore', 200110, 'Abhishek Rathod', 200115, 200, '2021-01-11 19:03:33'),
(16, 'Rahul Kishore', 200110, 'Rahul Kishore', 200110, 400, '2021-01-11 19:04:23'),
(17, 'Rahul Kishore', 200110, 'Rohit Kumar', 200112, 200, '2021-01-11 19:36:07'),
(18, 'Aniket', 200114, 'Raj Raja', 200113, 200, '2021-01-11 19:41:14'),
(19, 'Rohit Kumar', 200112, 'Abhishek Rathod', 200115, 2000, '2021-01-11 19:48:27'),
(20, 'Piyush Kumar', 200111, 'Abhishek Rathod', 200115, 500, '2021-01-11 19:54:10'),
(21, 'Abhishek Rathod', 200115, 'Aniket', 200114, 5000, '2021-01-11 20:02:35'),
(22, 'Aniket', 200114, 'Piyush Kumar', 200111, 200, '2021-01-11 21:55:02'),
(23, 'Rahul Kishore', 200110, 'Aniket', 200114, 100, '2021-01-11 22:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `AccountNo` int(20) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `DOB` date NOT NULL DEFAULT current_timestamp(),
  `Address` text NOT NULL DEFAULT 'Netaji Subhash Engineering College, Kolkata',
  `CurrentBalance` decimal(35,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`AccountNo`, `Name`, `Email`, `Mobile`, `DOB`, `Address`, `CurrentBalance`) VALUES
(200110, 'Rahul Kishore', 'rkgorai@gmail.com', '8877765987', '2021-01-08', 'Netaji Subhash Engineering College, Kolkata', '880.00'),
(200111, 'Piyush Kumar', 'piyush@gmail.com', '9191919191', '2021-01-08', 'Netaji Subhash Engineering College, Kolkata', '720.00'),
(200112, 'Rohit Kumar', 'rohit@gmail.com', '9191919192', '2021-01-08', 'Netaji Subhash Engineering College, Kolkata', '19200.00'),
(200113, 'Raj Raja', 'raj@gmail.com', '9797979797', '2021-01-08', 'Netaji Subhash Engineering College, Kolkata', '2200.00'),
(200114, 'Aniket', 'ak@gmail.com', '9888888888', '2021-01-08', 'Netaji Subhash Engineering College, Kolkata', '5200.00'),
(200115, 'Abhishek Rathod', 'ar@gmail.com', '9087654321', '2021-01-08', 'Netaji Subhash Engineering College, Kolkata', '197200.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`TransId`),
  ADD KEY `fan` (`fan`),
  ADD KEY `lan` (`lan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`AccountNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `TransId` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `AccountNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
