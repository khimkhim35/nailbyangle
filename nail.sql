-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 09:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nail`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `styles_id` int(11) NOT NULL,
  `booking_name` varchar(150) NOT NULL,
  `booking_phone` varchar(15) NOT NULL,
  `booking_email` varchar(45) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `users_id`, `services_id`, `styles_id`, `booking_name`, `booking_phone`, `booking_email`, `booking_date`, `booking_time`, `booking_status`) VALUES
(1, 2, 1, 1, 'ทดลอง สมาชิก', '7894561230', 'member@gmail.com', '2567-12-07', '15:00:00', 4),
(2, 2, 1, 1, 'ทดลอง สมาชิก', '7894561230', 'member@gmail.com', '2567-12-21', '21:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `info_detail` text NOT NULL,
  `date_create` date NOT NULL,
  `info_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `users_id`, `topic`, `info_detail`, `date_create`, `info_image`) VALUES
(1, 1, 'สมัครสมาชิกฟรี', 'หากท่านสมัครสมาชิกในตอนนี้ ฟรี อะไรก็ไม่รู้', '2567-12-06', 'S__9879699.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `bookings_id` int(11) NOT NULL,
  `date_payment` date NOT NULL,
  `moneys` int(5) NOT NULL,
  `slipt_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `bookings_id`, `date_payment`, `moneys`, `slipt_image`) VALUES
(1, 1, '2567-12-06', 100, 'S__9879699.jpg'),
(2, 2, '2567-12-21', 100, 'S__9879699.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `ser_name` varchar(255) NOT NULL,
  `ser_detail` text NOT NULL,
  `ser_price` int(5) NOT NULL,
  `ser_deposit` int(5) NOT NULL,
  `ser_style` tinyint(1) NOT NULL,
  `ser_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `ser_name`, `ser_detail`, `ser_price`, `ser_deposit`, `ser_style`, `ser_image`) VALUES
(1, 'ต่อเล็บ', 'ต่อเล็บ วาดรูป', 200, 100, 1, 'S__9879699.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `sty_name` varchar(255) NOT NULL,
  `sty_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `sty_name`, `sty_image`) VALUES
(1, 'ลายเล็บคริสต์มาส', 'christmas-nail-ideas_(6).jpg'),
(2, 'คริสต์มาสน่ารักๆ', 'S__30441487.jpg'),
(3, 'แดงแรงฤทธิ์', 'S__30441488.jpg'),
(4, 'ดาวประกายแสง', 'S__30441489.jpg'),
(5, 'ดาวจรัสแสง', 'S__30441490.jpg'),
(6, 'ดอกไม้ตรีมม่วงลาเวนเดอร์', '03BF1624-7524-4469-B287-BEB487E992E7.jpg'),
(7, 'ท้องฟ้าสดใส', 'B4D36E60-1674-4F77-9F77-594D7DD0FED5.jpg'),
(8, 'sadจังเลยฮะ', 'B6E0836F-6954-4D9D-B659-58A76D0E44FB.jpg'),
(9, 'รายการ์ตูน', 'A05CE500-8BAA-4596-A5C1-36CF835C21FF.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `role`) VALUES
(1, 'admin', 'admin', 'ทดลอง', 'ผู้ดูแลระบบ', 'admin@gmail.com', '0123456789', 1),
(2, 'member', 'member', 'ทดลอง', 'สมาชิก', 'member@gmail.com', '7894561230', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
