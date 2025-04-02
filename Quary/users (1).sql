-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 07:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(5) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Contact_Number` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Full_Name`, `Username`, `Country`, `Contact_Number`, `Email`, `Password`, `Role`) VALUES
(1, 'Devon Conway', 'D_Conway', 'New Zealand', '2354678409', 'devon@gmail.com', 'DevonC34', 'user'),
(2, 'Matt Henry', 'Matt@55', 'Australia', '12234567', 'mhenry@gmail.com', 'Matt55', 'user'),
(4, 'Rohith Sharma', 'Rohith_15', 'India', '1237655954', 'rohithsharma@gmail.com', 'Rohith27', 'user'),
(17, 'Shehan Viboothi', 'shehan@12', 'Sri Lanka', '0712435686', 'shehanp@gmail.com', 'Shehan12', 'user'),
(18, 'Amasha', 'sanwarani', 'Sri Lanka', '0721375645276', 'amasha@gmail.com', 'Amasha12', 'user'),
(19, 'Kasun', 'Kasun@12', 'Sri Lanka', '071553588', 'kasun@gmail.com', 'Kasun@0927', 'user'),
(20, 'Admin', 'Admin1', 'Sri Lanka', '0767276999', 'admin1@gmail.com', 'admin1', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
