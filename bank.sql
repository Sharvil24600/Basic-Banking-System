-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 02:23 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'Dhruv', 'Yash', 100, '2021-06-06 10:02:24'),
(2, 'Kishan', 'Priyank', 200, '2021-06-06 12:13:43'),
(3, 'Vidit', 'Hemil', 1000, '2021-06-06 20:30:19'),
(4, 'Samarth', 'Meet', 500, '2021-06-06 21:52:43'),
(5, 'Varshil', 'Vidit', 700, '2021-06-07 17:53:35'),
(6, 'Varshil', 'Priyank', 200, '2021-06-08 22:45:57'),
(7, 'Samarth', 'Kishan', 600, '2021-06-09 12:54:27'),
(8, 'Hemil', 'Samarth', 1000, '2021-06-09 13:01:04'),
(9, 'Meet', 'Vidit', 700, '2021-06-09 13:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Dhruv', 'dhruv@gmail.com', 49900),
(2, 'Yash', 'yash@gmail.com', 40100),
(3, 'Priyank', 'priyank@gmail.com', 30400),
(4, 'Samarth', 'samarth@gmail.com', 59900),
(5, 'Kishan', 'kishan@gmail.com', 40400),
(6, 'Yugam', 'yugam@gmail.com', 20000),
(7, 'Hemil', 'hemil@gmail.com', 50000),
(8, 'Vidit', 'vidit@gmail.com', 50400),
(9, 'Varshil', 'varshil@gmail.com', 29100),
(10, 'Meet', 'meet@gmail.com', 9800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
