-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 07:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `id` int(30) NOT NULL,
  `ref` int(30) NOT NULL,
  `room_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `date_in` varchar(32) NOT NULL,
  `date_out` varchar(32) NOT NULL,
  `room` varchar(30) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_in`
--

INSERT INTO `check_in` (`id`, `ref`, `room_id`, `name`, `contact`, `date_in`, `date_out`, `room`, `date_updated`, `exp_date`) VALUES
(43, 166598895, 19, 'Dean', '123456', '30.09.2022.', '03.10.2022.', 'Room 401', '2022-09-30 23:27:34', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `send_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(30) NOT NULL,
  `room` varchar(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `status` int(30) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unvailables'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `category_id`, `status`) VALUES
(1, 'Room 101', 1, 0),
(2, 'Room 102', 1, 0),
(3, 'Room 103', 1, 0),
(4, 'Room 104', 1, 0),
(5, 'Room 105', 1, 0),
(6, 'Room 106', 1, 0),
(7, 'Room 201', 2, 0),
(8, 'Room 202', 2, 0),
(9, 'Room 203', 2, 0),
(10, 'Room 204', 2, 0),
(11, 'Room 205', 2, 0),
(12, 'Room 206', 2, 0),
(13, 'Room 301', 3, 0),
(14, 'Room 302', 3, 0),
(15, 'Room 303', 3, 0),
(16, 'Room 304', 3, 0),
(17, 'Room 305', 3, 0),
(18, 'Room 306', 3, 0),
(19, 'Room 401', 4, 1),
(20, 'Room 402', 4, 0),
(21, 'Room 403', 4, 0),
(22, 'Room 404', 4, 0),
(23, 'Room 405', 4, 0),
(24, 'Room 406', 4, 0),
(25, 'Room 501', 5, 0),
(26, 'Room 502', 5, 0),
(27, 'Room 503', 5, 0),
(28, 'Room 504', 5, 0),
(29, 'Room 505', 5, 0),
(30, 'Room 506', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `cover_img` text NOT NULL,
  `room_size` text NOT NULL,
  `room_view` text NOT NULL,
  `bed_size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `price`, `cover_img`, `room_size`, `room_view`, `bed_size`) VALUES
(1, 'Single Room', 120, 'room_single.jpg', '36 sqm / 385 sqft of elegant luxury', 'Peaceful courtyard or glass cupola views.', '1 single bed'),
(2, 'Twin Room', 200, 'room_twin.jpg', '45 sqm / 485 sqft of picturesque luxury.', 'Mesmerizing views of the Eiffel Tower from airy French windows.', '1 double bed'),
(3, 'Deluxe Room', 350, 'room_deluxe.jpg', '40 sqm / 430 sqft of refined luxury.', 'Views of the hotel garden or surrounding avenues from large French windows.', '1 king-size bed (or 2 twin beds upon request)'),
(4, 'Family Room', 400, 'room_family.jpg', '80 sqm / 860 sqft of ethereal luxury.', 'Spectacular views of the Eiffel Tower and River Seine from two-storey high windows.', '1 king-size bed (or twin beds upon request)'),
(5, 'Suite', 650, 'room_suite.jpg', '120 sqm / 1,290 sqft of transcendent luxury.', 'Unparalleled panoramic views from the Eiffel Tower to Le Grand Palais and Sacré-Coeur.', '1 king-size bed (or twin beds upon request)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(31583, 'Administrator', 'admin', '$2y$10$bw1OJisCjehKM4lBuZiLIO9TFH43tf6wlHP9HCou2n91uYmls1.sG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56280;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
