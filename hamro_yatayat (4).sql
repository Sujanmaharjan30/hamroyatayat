-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 01:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamro_yatayat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `fullname`) VALUES
(1, 'hamroyatayat@gmail.com', '$2y$10$/Hda35Ac81E9FtoLqCBQr.LWW5gVEZF/l/Kubl7XFsnSDjsfUZETC', 'Sujan Maharjan');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `location_from` varchar(255) NOT NULL,
  `location_to` varchar(20) NOT NULL,
  `d_shift` varchar(20) NOT NULL,
  `d_date` date NOT NULL,
  `d_time` time NOT NULL,
  `seats` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Bus` varchar(50) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `approve_date` datetime DEFAULT current_timestamp(),
  `bus_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `u_id`, `username`, `phone`, `location_from`, `location_to`, `d_shift`, `d_date`, `d_time`, `seats`, `image_path`, `status`, `Bus`, `totalprice`, `approve_date`, `bus_id`) VALUES
(55, 7, 'sunil', 0, 'kathmandu', 'mustang', 'morning', '2024-04-29', '05:38:00', 'D13,D14,D15,D16,D17,D18,D19,D20', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(56, 7, 'sunil', 0, 'kathmandu', 'mustang', 'morning', '2024-04-29', '05:38:00', 'D1,D2,D3,D4,D5,D6,D7,D8', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(57, 7, 'sunil', 0, 'kathmandu', 'mustang', 'morning', '2024-04-29', '05:38:00', 'D1,D2,D3,D4,D5,D6,D7,D8', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(58, 7, 'sunil', 0, 'kathmandu', 'mustang', 'morning', '2024-04-29', '05:38:00', 'D1,D5,D9', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(59, 7, 'sunil', 0, 'kathmandu', 'mustang', 'morning', '2024-04-29', '05:38:00', 'D1,D2,D3,D4,D5,D6,D7,D8', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(60, 7, 'sunil', 0, 'kathmandu', 'mustang', 'morning', '2024-04-29', '05:38:00', 'D1,D2,D3,D4,D5', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(61, 7, 'sunil', 0, 'kathmandu', 'mustang', 'morning', '2024-04-29', '05:38:00', 'D21,D22,D23,D24,D25', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(62, 7, 'sunil', 0, 'kathmandu', 'mustang', 'morning', '2024-04-29', '05:38:00', 'D1,D2,D3,D4,D5,D6,D7,D8', '../uploads/20440.jpg', 'cancel', '', 0, '2024-06-13 12:47:40', 0),
(63, 7, 'sunil', 0, 'kathmandu', 'pokhara', 'morning', '2024-04-30', '07:06:00', 'D1,D2,D3,D4,D5,D6,D7,D8', '../uploads/20440.jpg', 'confirm', '', 0, '2024-06-13 12:47:40', 0),
(64, 7, 'sunil', 0, 'kathmandu', 'pokhara', 'morning', '2024-04-30', '07:06:00', 'D9,D10,D11,D12,D13,D14,D15,D16', '../uploads/20440.jpg', 'confirm', '', 0, '2024-06-13 12:47:40', 0),
(65, 1, '', 0, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D1,D2', '../uploads/20440.jpg', 'confirm', '', 0, '2024-06-13 12:47:40', 0),
(66, 7, 'sunil', 9857463210, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D3,D4', '../uploads/20440.jpg', 'cancel', '', 0, '2024-06-13 12:47:40', 0),
(67, 13, 'hari', 0, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D5,D6,D7,D8', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(68, 14, 'rijan', 0, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D17,D18,D24', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(69, 17, 'dipesh1', 0, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D9,D10,D11,D12', '../uploads/sjf.png', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(71, 17, 'dipesh1', 3435435435, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D19,D20,D21,D22,D23', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(72, 17, '<br />\r\n<b>Warning</', 0, 'kathmandu', 'pokhara', '', '2024-05-02', '06:00:00', 'D1,D2,D3,D4', '../uploads/lfu.png', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(73, 17, 'dipesh1', 0, 'kathmandu', 'pokhara', 'morning', '2024-05-02', '06:00:00', 'D1,D2,D3,D4', '../uploads/lfu.png', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(74, 17, 'dipesh1', 3435435435, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D13,D14', '../uploads/priority.png', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(75, 7, 'sunil', 0, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D25', '../uploads/20440.jpg', 'confirm', '', 0, '2024-06-13 12:47:40', 0),
(76, 7, 'sunil', 0, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D16', '../uploads/20440.jpg', 'cancel', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(77, 7, 'sunil', 0, 'kathmandu', 'pokhara', 'morning', '2024-05-02', '06:00:00', 'D26,D31', '../uploads/20440.jpg', 'confirm', '', 0, '2024-06-13 12:47:40', 0),
(79, 1, 'sujan', 0, 'kathmandu', 'pokhara', 'morning', '2024-05-02', '06:00:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(80, 1, 'sujan', 0, 'kathmandu', 'pokhara', 'morning', '2024-05-02', '06:00:00', 'D1,D2', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(81, 7, 'sunil', 0, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D15', '../uploads/round.png', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(82, 13, 'hari', 0, 'kathmandu', 'pokhara', 'night', '2024-05-02', '06:00:00', 'D2,D28', '../uploads/20440.jpg', 'Pending', '', 0, '2024-06-13 12:47:40', 0),
(83, 18, 'samundra', 9875632410, 'kathmandu', 'pokhara', 'morning', '2024-05-02', '06:00:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(84, 18, 'samundra', 0, 'kathmandu', 'pokhara', 'morning', '2024-05-02', '06:00:00', 'D3,D4,D7,D8,D11', '../uploads/20440.jpg', 'Pending', 'Luxury', 0, '2024-06-13 12:47:40', 0),
(85, 18, 'samundra', 9875632410, 'kathmandu', 'pokhara', 'morning', '2024-05-02', '06:00:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'confirm', 'Luxury', 0, '2024-06-13 12:47:40', 0),
(86, 18, 'samundra', 9875632410, 'kathmandu', 'pokhara', 'morning', '2024-05-02', '06:00:00', 'D1,D2', '../uploads/20440.jpg', 'confirm', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(87, 18, 'samundra', 9875632410, 'kathmandu', 'pokhara', 'morning', '2024-05-03', '10:00:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'completed', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(88, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D1,D2', '../uploads/20440.jpg', 'completed', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(89, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D1,D6', '../uploads/20440.jpg', 'confirm', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(90, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D9,D10', '../uploads/20440.jpg', 'confirm', 'Luxury', 0, '2024-06-13 12:47:40', 0),
(91, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D1,D2', '../uploads/20440.jpg', 'confirm', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(92, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D3,D4', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(93, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'night', '2024-05-10', '05:00:00', 'D1,D2', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(94, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'night', '2024-05-10', '05:00:00', 'D5,D6', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(95, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D1,D2', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(96, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D1,D2', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(97, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'night', '2024-05-10', '05:00:00', 'D1,D2', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(98, 18, 'samundra', 9875632410, 'kathmandu', 'biratnagar', 'night', '2024-05-10', '05:00:00', 'D1,D2', '../uploads/20440.jpg', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(99, 19, 'ram', 9852301470, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D13,D14,D17,D18', '../uploads/20440.jpg', 'cancel', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(100, 19, 'ram', 9852301470, 'kathmandu', 'biratnagar', 'night', '2024-05-10', '05:00:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'cancel', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(101, 19, 'ram', 9852301470, 'kathmandu', 'biratnagar', 'night', '2024-05-10', '05:00:00', 'D1,D2', '../uploads/20440.jpg', 'cancel', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(102, 19, 'ram', 9852301470, 'kathmandu', 'biratnagar', 'night', '2024-05-10', '05:00:00', 'D9,D10,D13,D14', '../uploads/20440.jpg', 'cancel', 'Luxury', 0, '2024-06-13 12:47:40', 0),
(103, 19, 'ram', 9852301470, 'kathmandu', 'biratnagar', 'night', '2024-05-10', '05:00:00', 'D1,D2,D3,D4', '../uploads/20440.jpg', 'cancel', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(104, 19, 'ram', 9852301470, 'kathmandu', 'biratnagar', 'morning', '2024-05-10', '05:00:00', 'D1,D2,D3,D4', '../uploads/lfu.png', 'cancel', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(105, 19, 'ram', 9852301470, 'Mustang', 'kathmandu', 'morning', '2024-05-09', '05:00:00', 'D1,D2,D3,D4', '../uploads/fcfs.png', 'cancel', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(106, 19, 'ram', 9852301470, 'Mustang', 'kathmandu', 'morning', '2024-05-09', '05:00:00', 'D5,D6,D7,D8', '../uploads/fcfs.png', 'cancel', 'Tourist', 8000, '2024-06-13 12:47:40', 0),
(107, 19, 'ram', 9852301470, 'Pokhara', 'Morang', 'night', '2024-05-11', '15:00:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'cancel', 'Tourist', 8000, '2024-06-13 12:47:40', 0),
(108, 19, 'ram', 9852301470, 'Mustang', 'kathmandu', 'morning', '2024-05-09', '05:00:00', 'D9,D10,D13,D14', '../uploads/20440.jpg', 'confirm', 'Tourist', 8000, '2024-06-13 12:47:40', 0),
(109, 19, 'ram', 9852301470, 'kathmandu', 'pokhara', 'morning', '2024-05-11', '07:06:00', 'D1,D2', '../uploads/20440.jpg', 'completed', 'Tourist', 4000, '2024-06-13 12:47:40', 0),
(110, 19, 'ram', 9852301470, 'Pokhara', 'Kathmandu', 'night', '2024-05-09', '14:00:00', 'D1,D2', '../uploads/20440.jpg', 'Pending', 'Tourist', 4000, '2024-06-13 12:47:40', 0),
(111, 19, 'ram', 9852301470, 'kathmandu', 'Morang', 'morning', '2024-05-09', '11:30:00', 'D11,D12', '../uploads/20440.jpg', 'Pending', 'Tourist', 5000, '2024-06-13 12:47:40', 0),
(112, 19, 'ram', 9852301470, 'kathmandu', 'Morang', 'morning', '2024-05-09', '11:30:00', 'D15,D16', '../uploads/20440.jpg', 'cancel', 'Tourist', 5000, '2024-06-13 12:47:40', 0),
(113, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'cancel', 'Tourist', 8000, '2024-06-13 12:47:40', 0),
(114, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D3,D4,D7,D8', '../uploads/20440.jpg', 'request', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(115, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D11', '../uploads/20440.jpg', 'cancel', 'Tourist', 1600, '2024-06-13 12:47:40', 0),
(116, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D15,D16', '../uploads/20440.jpg', 'cancel', 'Luxury', 5000, '2024-06-13 12:47:40', 0),
(117, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D9,D10', '../uploads/20440.jpg', 'cancel', 'Micro', 3200, '2024-06-13 12:47:40', 0),
(118, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D19,D20', '../uploads/20440.jpg', 'cancel', 'Luxury', 5000, '2024-06-13 12:47:40', 0),
(119, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D12,D16', '../uploads/20440.jpg', 'cancel', 'Luxury', 5000, '2024-06-13 12:47:40', 0),
(120, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D29,D30,D31,D32,D33', '../uploads/20440.jpg', 'cancel', 'Luxury', 12500, '2024-06-13 12:47:40', 0),
(121, 19, 'ram', 9852301470, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', '', '../uploads/sjf.png', 'Pending', 'Tourist', 0, '2024-06-13 12:47:40', 0),
(122, 1, 'sujan', 0, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D11,D12', '../uploads/20440.jpg', 'Pending', 'Luxury', 5000, '2024-06-13 12:47:40', 0),
(123, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D13,D14', '../uploads/20440.jpg', 'cancel', 'Tourist', 4000, '2024-06-13 12:47:40', 0),
(124, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-05-27', '05:38:00', 'D15,D16', '../uploads/20440.jpg', 'cancel', 'Luxury', 5000, '2024-06-13 12:47:40', 0),
(125, 20, 'rosij', 9856302147, 'Pokhara', 'Morang', 'night', '2024-05-30', '15:00:00', 'D15,D16', '../uploads/20440.jpg', 'cancel', 'Tourist', 4000, '2024-06-13 12:47:40', 0),
(126, 20, 'rosij', 9856302147, 'Pokhara', 'Morang', 'night', '2024-05-30', '15:00:00', 'D3,D4', '../uploads/20440.jpg', 'cancel', 'Luxury', 5000, '2024-06-13 12:47:40', 0),
(127, 20, 'rosij', 9856302147, 'Pokhara', 'Morang', 'night', '2024-05-30', '15:00:00', 'D1,D2,D6,D11,D12', '../uploads/20440.jpg', 'cancel', 'Luxury', 12500, '2024-06-13 12:47:40', 0),
(128, 20, 'rosij', 9856302147, 'Pokhara', 'Morang', 'night', '2024-05-30', '15:00:00', 'D1,D2,D7,D12', '../uploads/20440.jpg', 'cancel', 'Tourist', 8000, '2024-06-13 12:47:40', 0),
(129, 20, 'rosij', 9856302147, 'kathmandu', 'Morang', 'morning', '2024-05-29', '11:30:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'cancel', 'Tourist', 8000, '2024-06-13 12:47:40', 0),
(130, 20, 'rosij', 9856302147, 'kathmandu', 'Morang', 'morning', '2024-05-29', '11:30:00', 'D1,D2,D3,D4,D8,D12', '../uploads/20440.jpg', 'cancel', 'Luxury', 15000, '2024-06-13 12:47:40', 0),
(131, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D1,D6,D13', '../uploads/20440.jpg', 'cancel', 'Tourist', 6000, '2024-06-13 12:47:40', 0),
(132, 20, 'rosij', 9856302147, 'kathmandu', 'pokhara', 'morning', '2024-06-19', '07:06:00', 'D1,D6,D9', '../uploads/20440.jpg', 'cancel', 'Tourist', 6000, '2024-06-13 12:47:40', 0),
(133, 20, 'rosij', 9856302147, 'kathmandu', 'Morang', 'morning', '2024-06-21', '11:30:00', 'D1,D2,D6,D9', '../uploads/20440.jpg', 'cancel', 'Tourist', 8000, '2024-06-13 13:06:29', 0),
(134, 20, 'rosij', 9856302147, 'kathmandu', 'Morang', 'morning', '2024-06-21', '11:30:00', 'D1,D2,D5,D6', '../uploads/20440.jpg', 'cancel', 'Tourist', 8000, '2024-06-13 13:15:04', 0),
(135, 20, 'rosij', 9856302147, 'kathmandu', 'pokhara', 'morning', '2024-06-19', '07:06:00', 'D1,D2', '../uploads/20440.jpg', 'request', 'Tourist', 4000, '2024-06-13 13:19:11', 0),
(136, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D1,D6,D10,D14', '../uploads/20440.jpg', 'request', 'Tourist', 8000, '2024-06-13 13:26:43', 0),
(137, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D3,D4,D7,D8', '../uploads/20440.jpg', 'request', 'Tourist', 8000, '2024-06-13 13:45:50', 0),
(138, 20, 'rosij', 9856302147, 'kathmandu', 'Morang', 'morning', '2024-06-21', '11:30:00', 'D1,D2,D9', '../uploads/20440.jpg', 'request', 'Tourist', 6000, '2024-06-13 13:52:28', 0),
(139, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D15,D16,D20', '../uploads/20440.jpg', 'request', 'Tourist', 6000, '2024-06-13 14:01:51', 0),
(140, 20, 'rosij', 9856302147, 'kathmandu', 'Morang', 'morning', '2024-06-21', '11:30:00', 'D4,D7,D8', '../uploads/20440.jpg', 'request', 'Tourist', 6000, '2024-06-13 14:16:12', 0),
(141, 20, 'rosij', 9856302147, 'kathmandu', 'pokhara', 'morning', '2024-06-19', '07:06:00', 'D5,D10', '../uploads/20440.jpg', 'request', 'Tourist', 4000, '2024-06-13 14:19:37', 0),
(142, 20, 'rosij', 9856302147, 'kathmandu', 'pokhara', 'morning', '2024-06-19', '07:06:00', 'D9,D13,D14', '../uploads/20440.jpg', 'request', 'Tourist', 6000, '2024-06-13 14:22:01', 0),
(143, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D9,D13', '../uploads/20440.jpg', 'request', 'Tourist', 4000, '2024-06-13 14:27:02', 0),
(144, 20, 'rosij', 9856302147, 'kathmandu', 'pokhara', 'morning', '2024-06-19', '07:06:00', 'D6,D7,D11', '../uploads/20440.jpg', 'request', 'Tourist', 6000, '2024-06-13 14:33:14', 0),
(145, 20, 'rosij', 9856302147, 'kathmandu', 'Morang', 'morning', '2024-06-21', '11:30:00', 'D5,D6', '../uploads/20440.jpg', 'confirm', 'Tourist', 4000, '2024-06-13 14:41:06', 0),
(146, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D2,D5', '../uploads/20440.jpg', 'confirm', 'Tourist', 4000, '2024-06-13 14:45:34', 0),
(147, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D17', '../uploads/20440.jpg', 'request', 'Tourist', 2000, '2024-06-13 14:49:29', 0),
(148, 20, 'rosij', 9856302147, 'kathmandu', 'pokhara', 'morning', '2024-06-19', '07:06:00', 'D17,D22', '../uploads/20440.jpg', 'request', 'Tourist', 4000, '2024-06-13 14:52:36', 0),
(149, 1, 'sujan', 0, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D11,D12', '../uploads/20440.jpg', 'Pending', 'Luxury', 5000, '2024-06-13 21:09:03', 0),
(150, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D18', '../uploads/20440.jpg', 'request', 'Tourist', 2000, '2024-06-13 21:09:38', 0),
(151, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D22', '../uploads/20440.jpg', 'cancel', 'Tourist', 2000, '2024-06-13 21:17:35', 0),
(152, 20, 'rosij', 9856302147, 'kathmandu', 'lalitpur', 'night', '2024-06-14', '15:40:00', 'D1,D2,D3,D4', '../uploads/20440.jpg', 'pending', 'Tourist', 8000, '2024-06-14 14:38:40', 0),
(153, 20, 'rosij', 9856302147, 'kathmandu', 'lalitpur', 'night', '2024-06-14', '15:40:00', 'D5,D6,D7,D8', '../uploads/20440.jpg', 'confirm', 'Tourist', 8000, '2024-06-14 14:41:03', 0),
(154, 20, 'rosij', 9856302147, 'kathmandu', 'lalitpur', 'night', '2024-06-14', '15:40:00', 'D9,D10,D11,D12', '../uploads/20440.jpg', 'cancel', 'Tourist', 8000, '2024-06-14 14:49:54', 20),
(155, 20, 'rosij', 9856302147, 'Pokhara', 'kathmandu', 'night', '2024-06-14', '18:43:00', 'D1,D2,D3,D4', '../uploads/20440.jpg', 'confirm', 'Tourist', 8000, '2024-06-14 15:00:30', 21),
(156, 20, 'rosij', 9856302147, 'Mustang', 'kathmandu', 'morning', '2024-06-22', '05:00:00', 'D1,D2,D3,D4', '../uploads/20440.jpg', 'request', 'Tourist', 8000, '2024-06-14 15:23:17', 18),
(157, 20, 'rosij', 9856302147, 'kathmandu', 'pokhara', 'night', '2024-06-14', '16:46:00', 'D1,D2,D3,D4', '../uploads/20440.jpg', 'request', 'Tourist', 8000, '2024-06-14 15:45:10', 22),
(158, 20, 'rosij', 9856302147, 'Pokhara', 'lumbini', 'night', '2024-06-14', '17:06:00', 'D1', '../uploads/20440.jpg', 'confirm', 'Tourist', 2000, '2024-06-14 16:04:50', 23),
(159, 20, 'rosij', 9856302147, 'kathmandu', 'mustang', 'morning', '2024-06-18', '05:38:00', 'D1,D6', '../uploads/20440.jpg', 'Pending', 'Tourist', 4000, '2024-06-14 16:19:07', 10);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `d_id` int(11) NOT NULL,
  `location_from` varchar(20) NOT NULL,
  `location_to` varchar(20) NOT NULL,
  `d_date` date NOT NULL,
  `d_time` time NOT NULL,
  `d_shift` varchar(20) NOT NULL,
  `d_busno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`d_id`, `location_from`, `location_to`, `d_date`, `d_time`, `d_shift`, `d_busno`) VALUES
(10, 'kathmandu', 'mustang', '2024-06-18', '05:38:00', 'morning', 2222),
(11, 'kathmandu', 'pokhara', '2024-06-19', '07:06:00', 'morning', 3333),
(12, 'kathmandu', 'Morang', '2024-06-21', '11:30:00', 'morning', 2597),
(14, 'kathmandu', 'pokhara', '2024-06-16', '06:00:00', 'night', 7777),
(15, 'kathmandu', 'pokhara', '2024-06-20', '10:00:00', 'morning', 8792),
(16, 'Pokhara', 'Kathmandu', '2024-06-15', '14:00:00', 'night', 7254),
(17, 'Pokhara', 'Morang', '2024-06-17', '15:00:00', 'night', 3657),
(18, 'Mustang', 'kathmandu', '2024-06-22', '05:00:00', 'morning', 7820),
(19, 'kathmandu', 'biratnagar', '2024-06-21', '05:00:00', 'night', 7820),
(20, 'kathmandu', 'lalitpur', '2024-06-14', '15:40:00', 'night', 1222),
(21, 'Pokhara', 'kathmandu', '2024-06-14', '18:43:00', 'night', 1223),
(22, 'kathmandu', 'pokhara', '2024-06-14', '16:46:00', 'night', 3333),
(23, 'Pokhara', 'lumbini', '2024-06-14', '17:06:00', 'night', 122);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `password`) VALUES
(1, 'sujan', 0, 'sujanmaharjan517@gmail.com', '$2y$10$0iR66IjIebhMx0xjJ4sK0eFrKp6Xpw9lB8ajwjZ/eX6FfjtRRT8dy'),
(2, 'dhiran', 0, 'dhiran@gmail.com', '$2y$10$Ojvz0FedSzpu9quS1mQaFOOzVIc5Qj1Vm/pzle5NOrK.xSHeE52fy'),
(3, 'rohan', 0, 'rohan@gmail.com', '$2y$10$FNK1v5XQW6Bp0XKtlCIL7ecLyhIs8AJeVMTX8a.c5PTqSs3B8iuUG'),
(4, 'riyaz', 0, 'riyaz2@gmail.com', '$2y$10$QIAZetEiiWXGPQZPc6uNmeAAGzHrGO13h0B12qcKOsfpByBioaK7C'),
(5, 'kelvin', 0, 'kelvin@gmail.com', '$2y$10$7SFNt6esARwtzBS9NFT.JOhTYGBIOeKV1O.pat.5z1k1YcbkJTHIq'),
(6, 'rajesh', 0, 'rajesh@gmail.com', '$2y$10$V4YwvU//vsa0IZOhhG7waOeLpNszQqFqSF7XzWiBD2Tl/R/rdX4f.'),
(7, 'sunil', 0, 'sunil@gmail.com', '$2y$10$s/CAsF44WLKh6TEoCwJ5sudAvJsK0V0bmjCQfapo9X1AA5TkFi9Ke'),
(8, 'aman', 0, 'aman@gmail.com', '$2y$10$MmJ0pKBf.saJdq61u19uBu8brJEs7yVLi86ZZ.awKKCG2bNnRj27a'),
(11, 'ujjwal', 0, 'ujjwal@gmail.com', '$2y$10$14Zld//X4D0h.EZDFQoyievS.epGzMKsZzIY6DxPzBI4faBNBnub.'),
(13, 'hari', 9856743210, 'hari@gmail.com', '$2y$10$12Ef67zCdfR54HeDJw8CL.uMVg4ZhY6.sJe8bp7.1AeB5DYIpD/RK'),
(14, 'rijan', 9863251470, 'rijan@gmail.com', '$2y$10$XJW4e6Tq/GVnNdeIIgX/7ujbzb9JNiV/YhOIWXJyXaljRRUdjnVxO'),
(15, 'sandesh', 0, 'sandesh@gmail.com', '$2y$10$VAl7KvwYXGqcHXzoalKztuWs8ZjwUawTG8dbS/P9ysJisKBQs5QlO'),
(16, 'satish', 0, 'satish2222@gmail.com', '$2y$10$6n7/impIH2p8OL4WDmKko.QvKzF7U9JvufKtFuHZ7SmRGrgjTqcg.'),
(17, 'dipesh1', 3435435435, 'dipesh@test.com', '$2y$10$eOmom1hGn0FKe/kqxKRe1uB6CJJuNO84GqLIE3rajgxnvjbeWxZSC'),
(18, 'samundra', 9875632410, 'samundra@gmail.com', '$2y$10$tGCDRHu9SpiXMrKqMj032e0enNxse9pkRAJ1/Qd5JqU.YezfKzg76'),
(19, 'ram', 9852301470, 'ram@gmail.com', '$2y$10$1jlNjQCYxU/bAjrsuZgdXuLz5XkDszxaCvtLLDDIfkFqobqu4Hd86'),
(20, 'rosij', 9856302147, 'rosij@gmail.com', '$2y$10$8XBX98aA2DkLfPHYn0wC/eEQMdOjC.LK78UdTxXbfBDrTQEHfM1Xy'),
(21, 'sujan1', 9865320147, 'sujan@gmail.com', '$2y$10$7SOsUrWlobpVJwQjtN.y8uTh.Bil1p4pJ71Rxgg.yuJXLrYZRtkZO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bookings_users` (`u_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_users` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
