-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 05:33 AM
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
-- Database: `openrecipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `videoId` varchar(500) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `videoName` varchar(1000) NOT NULL,
  `videoLink` varchar(1000) NOT NULL,
  `ingredients` varchar(1000) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `event` varchar(1000) NOT NULL,
  `viewCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`videoId`, `dateAdded`, `videoName`, `videoLink`, `ingredients`, `country`, `category`, `event`, `viewCount`) VALUES
('6552eb45-1ab8-11ef-890c-624c58d5222b', '2024-05-25 17:01:14', 'nasi goreng', 'nasi.com', 'rice', 'indonesia', 'main course', 'sarapan sehat', 12),
('65536330-1ab8-11ef-890c-624c58d5222b', '2024-05-25 17:01:14', 'rendang', 'rendang.com', 'meat', 'indonesia', 'main course', 'bangga lokal', 1500),
('bff86257-1ab8-11ef-890c-624c58d5222b', '2024-05-25 17:03:46', 'es campur', 'escampur.com', 'fruit', 'indonesia', 'beverages', 'bangga lokal', 125),
('bff8dca2-1ab8-11ef-890c-624c58d5222b', '2024-05-25 17:03:46', 'cheese pizza', 'cheesepizza.org', 'flour', 'united states', 'main course', 'sarapan sehat', 504),
('f201013e-1ab7-11ef-890c-624c58d5222b', '2024-05-27 16:58:01', 'nasi bakar mantap', 'nasibakar.co.id', 'rice', 'indonesia', 'main course', 'sarapan sehat', 25);

--
-- Triggers `video`
--
DELIMITER $$
CREATE TRIGGER `random video uuid` BEFORE INSERT ON `video` FOR EACH ROW SET NEW.videoId = UUID()
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`videoId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
