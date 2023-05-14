-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2023 at 06:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblemp`
--

CREATE TABLE `tblemp` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mid_add` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblemp`
--

INSERT INTO `tblemp` (`id`, `first_name`, `mid_add`, `last_name`, `contact_num`, `email_add`, `address`) VALUES
(1, 'Mark Nikko', 'Gonzales', 'Tabelisma', '0912457898', 'nikko@email.com', 'Panis ang Capas Tarlac'),
(3, 'Rey Pogi', 'Marco', 'Irang', '0912457898', 'reypogi@email.com', 'Hello World');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblemp`
--
ALTER TABLE `tblemp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblemp`
--
ALTER TABLE `tblemp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
