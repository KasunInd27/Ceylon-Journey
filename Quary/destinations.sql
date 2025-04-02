-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 02:09 PM
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
-- Database: `ceylon_journey`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `description`, `image`, `category`) VALUES
(4, 'Unawatuna Beach', 'Unawatuna Beach is a special place hidden on the southwest coast of Sri Lanka. It’s like a secret treasure! This beach has beautiful golden sand and clear blue water that looks like a jewel. The tall palm trees along the coast make it even more magical. People from all over the world come here because it’s like a tropical paradise. Let’s go on a journey to Unawatuna Beach and discover its amazing beauty, fun water activities, colorful sea creatures, and more.', 'hikkaduwa.jpg', 'Beach Side'),
(5, 'Adam’s Peak', 'Adam’s Peak, also known as “Sri Pada”, is a mountain in Sri Lanka that is sacred to Buddhists, Hindus, Christians, and Muslims. It is believed by all four religions that the footprint on the summit of the mountain is the footprint of a holy figure.\r\n\r\nFor Buddhists, it is the footprint of Buddha; for Hindus, it is the footprint of Shiva; for Christians, it is the footprint of Adam; and for Muslims, it is the footprint of Adam after he was expelled from the Garden of Eden.\r\n\r\nNo matter your religious beliefs or reason for visiting, Adam’s Peak is a must-do experience in Sri Lanka.', 'adamspeak.jpg', 'Mountain'),
(6, 'Kabalana Beach', 'Kabalana Beach is a beautiful stretch of golden sand and clear blue water located in the southern coastal town of Ahangama, Sri Lanka. It’s a popular destination for surfers of all levels, as well as swimmers, sunbathers, and those looking for a relaxing beach getaway.\r\n\r\nSurfers are drawn to Kabalana Beach by its consistent waves, which break both left and right. The waves are typically smaller and more mellow than at other surf spots in Sri Lanka, making them ideal for beginners and intermediate surfers. However, there are also some challenging waves for more experienced surfers.\r\n\r\nThe beach is clean and well-maintained, and there are plenty of sunbeds and umbrellas for rent. There are also several restaurants and cafes located along the beach, serving up delicious fresh seafood and other Sri Lankan dishes.', 'kabalanabeach.jpg', 'Beach Side'),
(9, 'Yala National Park', '\r\nYala National Park is the second largest National park in Sri Lanka. The Largest National Park of Sri Lanka is the Wilpattu National Park. Moreover, this is one of the two oldest National Parks in Sri Lanka. Sri Lankan Government separates a large area in South East for the entire park. Total area of the park is 979 square kilometers. However, you have to remember that only 141 square kilometers area open to public.', 'Yala.jpg', NULL),
(10, 'Yala National Park', 'Yala National Park is the second largest National park in Sri Lanka. The Largest National Park of Sri Lanka is the Wilpattu National Park. Moreover, this is one of the two oldest National Parks in Sri Lanka. Sri Lankan Government separates a large area in South East for the entire park. Total area of the park is 979 square kilometers. However, you have to remember that only 141 square kilometers area open to public.', 'create.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
