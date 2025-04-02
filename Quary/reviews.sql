-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 01:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `reviewType` varchar(10) NOT NULL,
  `rating` int(5) NOT NULL,
  `descrip` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `email`, `reviewType`, `rating`, `descrip`, `date`) VALUES
(7, 'kasun@gmai', 'Vehicle', 9, 'Offroad vehical is very Powefull.', '2024-10-01'),
(8, 'izuru@gmai', 'Hotel', 6, 'kaesuykcbjhfcqia', '2024-10-16'),
(10, 'anuga@gmai', 'Vehicle', 8, 'new vehical is very confotable', '2024-10-02'),
(16, 'kasun1@gma', 'Vehicle', 9, 'hiuhskfwu8did', '2024-10-30'),
(17, 'madhawadiy', 'Hotel', 8, 'Clean room facilty Avalable.', '2024-10-08'),
(19, 'madhushi@g', 'Vehicle', 10, 'nice vehical', '2024-10-31'),
(21, 'anuga@gmai', 'Hotel', 8, 'taste foods and drinks.it is very smart', '2024-10-14'),
(22, 'wasntha@gm', 'Vehicle', 8, 'gooo good', '2024-10-07'),
(23, 'Sadun@gmai', 'Tour Guide', 5, 'guid is very khnowlegable.', '2024-10-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
