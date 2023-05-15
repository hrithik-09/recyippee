-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 07:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recyippee`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `sno` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `tag` varchar(40) NOT NULL,
  `instruction` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`sno`, `id`, `name`, `description`, `ingredients`, `category`, `tag`, `instruction`, `timestamp`) VALUES
(2, 5, 'Chicken', 'faw,.faew', 'chicken', 'Non-Veg', ' Indian', 'nmefmn kerafkjn jkfnkn', '2023-05-15 18:03:09'),
(6, 5, 'Mastani Spicy', 'A popular dessert beverage from Pune. It is a thick milkshake made with a blend of milk, ice cream, and dry fruits', 'Milk\r\nIce cream (typically vanilla or mango-flavored)\r\nDry fruits\r\nSaffron strands\r\nFresh fruits (optional)\r\nRose syrup (optional)', 'Veg', ' Indian', 'Saffron strands are added to enhance the flavor and give it a beautiful golden hue. Mastani can be customized with the addition of fresh fruits or topped with a drizzle of rose syrup for a delightful indulgence.', '2023-05-15 22:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Gender` varchar(11) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `Email`, `Gender`, `Phone`, `password`, `dob`, `timestamp`) VALUES
(5, 'Hrithik', ' Ranjan', 'ranjan.hrithik09@gmail.com', 'male', 8871016261, '$2y$10$Q8//C2rOMvSiY3FQqAjfd.qAaKYGMs4/hpCg2owAZHwuQpCLUfOFa', '2002-08-09', '2023-05-15 15:19:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `sno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
