-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2018 at 07:46 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ugabus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(255) NOT NULL,
  `bus_route_id` int(225) NOT NULL,
  `seats` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `number` varchar(225) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `payment_method` varchar(225) NOT NULL,
  `total_price` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `bus_route_id`, `seats`, `name`, `number`, `email`, `payment_method`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 'Nabuka Joshua', '56753837', NULL, 'visa', 0, '2018-06-12 15:38:01', '2018-06-12 15:38:01'),
(2, 13, 1, 'Nabuka Joshua', '56753837', NULL, 'visa', 0, '2018-06-12 15:39:49', '2018-06-12 15:39:49'),
(3, 25, 1, 'Nabuka Joshua', '56753837', NULL, 'mobile_money', 105000, '2018-06-12 15:42:23', '2018-06-12 15:42:23'),
(4, 17, 5, 'Nabuka Joshua', '+256701432596', 'nabukajoshua@gmail.com', 'visa', 425000, '2018-06-12 15:46:54', '2018-06-12 15:46:54'),
(5, 16, 3, 'Nabuka Joshua', '56753837', NULL, 'mobile_money', 0, '2018-06-13 14:06:30', '2018-06-13 14:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_id` int(10) DEFAULT NULL,
  `busname` varchar(255) NOT NULL,
  `busnumber` varchar(255) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `purchase_year` varchar(50) NOT NULL,
  `cleark_mobile_number` varchar(12) DEFAULT NULL,
  `cleark_email` varchar(255) DEFAULT NULL,
  `bustype` varchar(50) DEFAULT NULL,
  `about_me` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `busdetail_type` varchar(50) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=''Inactive'', 1=''Active'',2=''Blocked''',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=''No'',1=''Yes''',
  `date_updated` datetime NOT NULL,
  `signup_ip` varchar(50) DEFAULT NULL,
  `signup_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `admin_id`, `busname`, `busnumber`, `password`, `purchase_year`, `cleark_mobile_number`, `cleark_email`, `bustype`, `about_me`, `profile_image`, `busdetail_type`, `status`, `is_deleted`, `date_updated`, `signup_ip`, `signup_date`) VALUES
(11, NULL, 'JTOP COACHES', 'UAX 123J', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '256704741443', 'ugabus.com@gmail.com', 'non-ac', 'Travels from Kampala to Jinja', 'busdetail_536080001490790030.jpg', 'busdetail', '1', '0', '2017-07-10 11:07:10', '41.75.169.45', '2017-03-29 07:20:30'),
(17, 53, 'Zim Zum Travels', 'UAZ 100L', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0789288605', 'ronahakiza@gmail.com', 'non-ac', 'new latest bus', 'busdetail_391356001490819305.jpg', 'busdetail', '1', '0', '2017-08-24 10:44:14', '123.201.57.85', '2017-03-29 15:28:25'),
(18, 8, 'JTOP Coaches', 'UAY 111J', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0704863452', 'azaj.00199@gmail.com', 'non-ac', 'Massive and Awesome', 'busdetail_826035001490867739.png', 'busdetail', '1', '0', '2017-04-06 03:43:36', '41.75.168.6', '2017-03-30 04:55:39'),
(19, 8, 'TRINITY COACH', 'XXX', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ugabus.com@gmail.com', 'non-ac', 'For Convenience and Safety, Book Trinity Coach', 'busdetail_297416001492603886.jpg', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 07:11:26'),
(20, 8, 'DREAMLINE  Coach', 'A', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ugabus.com@gmail.com', 'ac', 'The Dream team. \n', 'busdetail_636127001492611577.jpg', 'busdetail', '1', '0', '2017-11-23 03:39:26', '41.75.165.209', '2017-04-19 09:16:12'),
(21, 8, 'MASH POA', 'M', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ronahakiza@gmail.com', 'ac', 'We Lead The Leaders, Mash Poa', 'busdetail_834793001492615317.png', 'busdetail', '1', '0', '2017-08-24 12:38:09', '41.75.165.209', '2017-04-19 10:21:57'),
(22, 8, 'JAGUAR Bus', 'J', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '256784741443', 'ugabus.com@gmail.com', 'ac', 'Confort Guaranteed.', 'busdetail_430897001492617761.jpg', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 11:02:41'),
(23, 8, 'HOMELAND Express', 'H', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ugabus.com@gmail.com', 'ac', 'Homeland, the home of convenient Travel ', 'busdetail_105781001492619777.jpg', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 11:36:17'),
(24, 8, 'GAAGAA Bus', 'UA', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0704741443', 'ronahakiza@gmail.com', 'ac', 'Perfection & Confort', 'busdetail_157035001495036827.jpg', 'busdetail', '1', '0', '2017-09-13 05:19:19', '41.75.166.201', '2017-05-17 11:00:27'),
(25, 8, 'SYBABA Coach', 'UAZ 000L', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ronahakiza@gmail.com', 'ac', 'LUXURY at its best', 'busdetail_622652001498062906.png', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.171.7', '2017-06-21 11:35:06'),
(26, 8, 'BABY COACH', 'U', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ronahakiza@gmail.com', '', 'Fast and Convinient', 'busdetail_415334001499369711.png', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.170.47', '2017-07-06 14:35:11'),
(27, 4, 'PANTHER BUS', 'U', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ronahakiza@gmail.com', 'non-ac', 'Confortable, and Reliable', 'busdetail_426096001507709063.jpg', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.171.86', '2017-10-11 03:04:23'),
(28, 4, 'MODERN COAST BUS', 'U', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ronahakiza@gmail.com', 'non-ac', 'Luxury Express', 'busdetail_587083001508241740.jpg', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.166.98', '2017-10-17 07:02:20'),
(29, 4, 'BUSCAR', 'U', 'd41d8cd98f00b204e9800998ecf8427e', '2017', '0784741443', 'ronahakiza@gmail.com', '', 'Classic and Luxury', 'busdetail_659367001508248053.jpg', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.166.98', '2017-10-17 08:47:33'),
(30, 4, 'BUSCAR', 'UAZ 321K', 'd41d8cd98f00b204e9800998ecf8427e', '2004', '0784741443', 'ronahakiza@gmail.com', 'ac', 'COnfort at its best', 'busdetail_865722001511178589.jpg', 'busdetail', '1', '0', '0000-00-00 00:00:00', '41.75.167.19', '2017-11-20 05:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` int(11) UNSIGNED NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_routesname` varchar(255) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `travelfrom` varchar(255) DEFAULT NULL,
  `travelto` varchar(255) DEFAULT NULL,
  `starting_point` varchar(255) DEFAULT NULL,
  `end_point` varchar(255) DEFAULT NULL,
  `seat_type` varchar(50) DEFAULT NULL,
  `seater_seat` int(10) DEFAULT NULL,
  `sleeper_seat` int(10) DEFAULT NULL,
  `totalseat` int(10) DEFAULT NULL,
  `travel_day` int(10) NOT NULL,
  `Sun` varchar(10) NOT NULL DEFAULT '0',
  `Mon` varchar(10) NOT NULL DEFAULT '0',
  `Tue` varchar(10) NOT NULL DEFAULT '0',
  `Wed` varchar(10) NOT NULL DEFAULT '0',
  `Thu` varchar(10) NOT NULL DEFAULT '0',
  `Fri` varchar(10) NOT NULL DEFAULT '0',
  `Sat` varchar(10) NOT NULL DEFAULT '0',
  `travel_seat_type` varchar(10) DEFAULT NULL,
  `travel_sleeper` varchar(2) DEFAULT NULL,
  `travel_seater` varchar(2) DEFAULT NULL,
  `travel_both` varchar(2) DEFAULT NULL,
  `travaling_days` varchar(50) DEFAULT NULL,
  `time_of_departure` varchar(255) NOT NULL,
  `time_of_arrival` varchar(500) NOT NULL,
  `seat_price` int(11) DEFAULT NULL,
  `price_seater_seat` varchar(255) DEFAULT NULL,
  `price_sleeper_seat` varchar(255) DEFAULT NULL,
  `price_total` varchar(255) DEFAULT NULL,
  `total_bus_seat` int(50) DEFAULT NULL,
  `bus_routes_type` varchar(50) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=''Inactive'', 1=''Active'',2=''Blocked''',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=''No'',1=''Yes''',
  `date_updated` datetime NOT NULL,
  `signup_ip` varchar(50) DEFAULT NULL,
  `signup_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `bus_id`, `bus_routesname`, `phone`, `travelfrom`, `travelto`, `starting_point`, `end_point`, `seat_type`, `seater_seat`, `sleeper_seat`, `totalseat`, `travel_day`, `Sun`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Sat`, `travel_seat_type`, `travel_sleeper`, `travel_seater`, `travel_both`, `travaling_days`, `time_of_departure`, `time_of_arrival`, `seat_price`, `price_seater_seat`, `price_sleeper_seat`, `price_total`, `total_bus_seat`, `bus_routes_type`, `status`, `is_deleted`, `date_updated`, `signup_ip`, `signup_date`) VALUES
(13, 19, '', NULL, 'Kampala', 'Kisoro', 'Trinity Parking yard, Kampala', 'Kisoro Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '01:15 PM', '01:15 PM', NULL, '31000', '', '31000', 0, 'bus_routes', '1', '0', '2018-01-15 04:03:08', '41.75.165.209', '2017-04-19 07:19:25'),
(15, 19, '', NULL, 'Kampala', 'KIGALI', 'Trinity Parking Yard, Kampala', 'Kigali', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '09:00 PM', '06:00 AM', NULL, '40000', '', '40000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 09:06:14'),
(16, 20, '', NULL, 'Kampala', 'Nairobi', 'Namayiba Bus Park, Kampala', 'Nairobi', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '04:00 PM', '05:30 AM', NULL, '65000', '', '65000', 0, 'bus_routes', '1', '0', '2017-08-23 15:35:15', '41.75.165.209', '2017-04-19 09:32:31'),
(17, 20, '', NULL, 'Kampala', 'Nairobi', 'Namayiba Bus Park', 'Nairobi', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '06:00 PM', '06:30 AM', NULL, '85000', '', '85000', 0, 'bus_routes', '1', '0', '2017-08-23 15:32:12', '41.75.165.209', '2017-04-19 09:33:39'),
(18, 20, '', NULL, 'Kampala', 'MOMBASA', 'Namayiba Bus park, Kampala', 'Mombasa', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '06:00 PM', '07:45 AM', NULL, '110000', '', '110000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 09:55:53'),
(19, 20, '', NULL, 'Kampala', 'MALINDI', 'Namayiba Bus park', 'Malindi', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '07:00 PM', NULL, '160000', '', '160000', 0, 'bus_routes', '1', '0', '2017-04-19 11:07:21', '41.75.165.209', '2017-04-19 10:09:57'),
(20, 20, '', NULL, 'Kampala', 'KIITI', 'Namayiba Bus Park', 'Kiiti', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '07:00 PM', NULL, '170000', '', '170000', 0, 'bus_routes', '1', '0', '2017-04-19 11:07:07', '41.75.165.209', '2017-04-19 10:11:26'),
(21, 21, '', NULL, 'Kampala', 'KIGALI', 'Namayiba Bus Park', 'Kigali ', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '09:00 PM', '09:00 PM', NULL, '45000', '', '45000', 0, 'bus_routes', '1', '0', '2017-08-24 12:59:04', '41.75.165.209', '2017-04-19 10:31:37'),
(22, 21, '', NULL, 'Kampala', 'Nairobi', 'Namayiba Bus Park, Kampala', 'Nairobi', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '06:00 PM', '06:30 AM', NULL, '65000', '', '65000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 10:36:37'),
(23, 21, '', NULL, 'Kampala', 'MOMBASA', 'Namayiba Park, Kampala', 'Mombasa', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '07:00 PM', NULL, '120000', '', '120000', 0, 'bus_routes', '1', '0', '2017-04-19 11:06:45', '41.75.165.209', '2017-04-19 10:38:09'),
(24, 21, '', NULL, 'Kampala', 'KISUMU', 'Namayiba Bus Park, Kampala', 'Kisumu', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '07:00 PM', NULL, '50000', '', '50000', 0, 'bus_routes', '1', '0', '2017-04-19 11:06:31', '41.75.165.209', '2017-04-19 10:46:59'),
(25, 22, '', NULL, 'Kampala', 'Kisoro', 'Jaguar Yard, Namirembe rd', 'Kisoro', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '07:00 PM', NULL, '35000', '', '35000', 0, 'bus_routes', '1', '0', '2017-04-19 11:06:13', '41.75.165.209', '2017-04-19 11:05:19'),
(26, 22, '', NULL, 'Kampala', 'GOMA', 'Jaguar Yard, Namirembe rd', 'Goma', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '06:00 PM', '07:15 AM', NULL, '60000', '', '60000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 11:18:08'),
(27, 22, '', NULL, 'Kampala', 'Gisenyi', 'Jaguar Yard, Namirembe rd', 'Gisenyi', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '07:15 AM', NULL, '45000', '', '45000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 11:20:57'),
(28, 23, '', NULL, 'Kampala', 'Gulu', 'Namayiba Bus Terminal', 'Gulu Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '04:30 AM', NULL, '21000', '', '21000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 12:13:53'),
(29, 23, '', NULL, 'Kampala', 'Gulu', 'Namayiba Park Terminal', 'Gulu', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '10:00 PM', '04:15 AM', NULL, '21000', '', '21000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.165.209', '2017-04-19 12:23:03'),
(30, 24, '', NULL, 'Kampala', 'Gulu', 'Kampala', 'Gulu Park', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '04:00 PM', '05:00 AM', NULL, '25000', '', '25000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.166.201', '2017-05-17 11:02:21'),
(31, 24, '', NULL, 'Kampala', 'Gulu', 'Namayiba Park', 'Gulu', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '08:45 PM', '01:15 PM', NULL, '31000', '', '31000', 0, 'bus_routes', '1', '0', '2017-09-13 05:18:16', '41.75.166.201', '2017-05-17 11:03:57'),
(32, 24, '', NULL, 'Kampala', 'Lira', 'Namayiba Bus Park', 'Lira Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '11:00 AM', '11:00 AM', NULL, '31000', '', '31000', 0, 'bus_routes', '1', '0', '2017-10-17 03:03:44', '41.75.171.7', '2017-06-21 11:31:28'),
(33, 25, '', NULL, 'Kampala', 'DAR ES SALAAM', 'Namayiba Bus park', 'Dar Es Salaam', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '03:00 PM', '07:45 AM', NULL, '160000', '', '160000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.171.7', '2017-06-21 11:44:24'),
(34, 26, '', NULL, 'Kampala', 'Kitgum', 'Namayiba Park', 'Kitgum', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '08:00 AM', '03:00 PM', NULL, '25000', '', '25000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.170.47', '2017-07-06 15:44:51'),
(35, 19, '', NULL, 'Kampala', 'Kabale', 'Trinity Bus Terminal', 'KABALE Town enroute to Kisoro', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '08:00 PM', '04:00 AM', NULL, '30000', '', '30000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '155.255.0.106', '2017-08-24 08:49:39'),
(36, 17, '', NULL, 'Kampala', 'Nakapiripirit', 'Kampala', 'Nakapir', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '06:30 AM', '06:15 PM', NULL, '1000', '', '1000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.54', '2017-08-24 10:37:05'),
(37, 19, '', NULL, 'Kampala', 'Butare', 'Trinity Bus Terminal', 'Butare-RWANDA', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '06:00 AM', NULL, '50000', '', '50000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.54', '2017-08-24 12:07:34'),
(38, 19, '', NULL, 'Kampala', 'BUKAVU', 'Trinity Bus Terminal', 'BUKAVU Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '08:15 AM', NULL, '55000', '', '55000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.54', '2017-08-24 12:15:01'),
(39, 19, '', NULL, 'Kampala', 'GOMA', 'Trinity Bus Terminal', 'Goma-Congo', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '07:00 PM', '06:15 AM', NULL, '45000', '', '45000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.54', '2017-08-24 12:26:40'),
(40, 11, '', NULL, 'Kampala', 'Nkonkonjeru', 'Kampala', 'Nkonkonjeru', 'seater', 67, 0, 67, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2:2', 'N', 'Y', 'N', 'Same', '09:45 AM', '09:45 AM', NULL, '500', '', '500', 67, 'bus_routes', '1', '0', '2017-10-17 01:38:55', '41.75.169.126', '2017-09-03 12:18:25'),
(41, 27, '', NULL, 'Kampala', 'Nakuru', 'Namayiba Terminal', 'Nakuru', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '12:00 PM', '12:00 PM', NULL, '60000', '', '60000', 0, 'bus_routes', '1', '0', '2017-10-23 03:57:20', '41.75.171.86', '2017-10-11 03:11:57'),
(43, 22, '', NULL, 'Kampala', 'Kisoro', 'Kisoro Town', 'Kampala', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', '1', '09:00 PM', '04:15 AM', NULL, '41000', '', '41000', 0, 'bus_routes', '1', '0', '2017-12-18 07:10:35', '41.75.166.98', '2017-10-17 06:59:36'),
(46, 22, '', NULL, 'GOMA', 'Kampala', 'GOMA', 'Kampala', 'sleeper', 0, 10, 10, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2:2', 'Y', 'N', 'N', 'Same', '06:00 PM', '04:30 AM', NULL, '', '41000', '41000', 10, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.166.98', '2017-10-17 07:24:24'),
(47, 19, '', NULL, 'Kampala', 'Kabale', 'Kampala', 'Kabale', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '09:00 PM', '03:45 AM', NULL, '30000', '', '30000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.166.98', '2017-10-17 07:41:38'),
(48, 19, '', NULL, 'Kampala', 'Kabale', 'Kampala', 'KABALE Town enroute to Kisoro', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '08:00 PM', '03:15 AM', NULL, '30000', '', '30000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.166.98', '2017-10-17 07:43:00'),
(49, 20, '', NULL, 'Kampala', 'Nakuru', 'Namayiba Park, Kampala', 'Nakuru', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '04:00 PM', '03:00 AM', NULL, '60000', '', '60000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.169.145', '2017-10-23 03:59:40'),
(50, 20, '', NULL, 'Kampala', 'Nakuru', 'Namayiba Bus Park', 'Nakuru Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '08:00 PM', '05:00 AM', NULL, '60000', '', '60000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.169.145', '2017-10-23 04:11:10'),
(51, 28, '', NULL, 'Kampala', 'Nakuru', 'Namayiba Bus Park', 'Nakuru Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '06:00 AM', '04:00 PM', NULL, '65000', '', '65000', 0, 'bus_routes', '1', '0', '2017-11-01 08:58:24', '41.75.164.124', '2017-11-01 08:11:49'),
(52, 23, '', NULL, 'Kampala', 'Kitgum', 'Namayiba Lower Terminal', 'Kitgum', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '10:00 PM', '04:45 AM', NULL, '26000', '', '26000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.164.124', '2017-11-01 08:39:33'),
(53, 24, '', NULL, 'Kampala', 'Lira', 'Namayiba Bus Park', 'Lira Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '10:00 AM', '03:00 PM', NULL, '21000', '', '21000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.81', '2017-11-09 07:35:53'),
(54, 24, '', NULL, 'Kampala', 'Lira', 'Namayiba Bus Park', 'Lira Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '12:00 PM', '07:45 PM', NULL, '21000', '', '21000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.81', '2017-11-09 07:37:54'),
(55, 24, '', NULL, 'Kampala', 'Lira', 'Namayiba Terminal-Kampala', 'Lira Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '03:00 PM', '09:45 PM', NULL, '21000', '', '21000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.81', '2017-11-09 07:40:27'),
(56, 24, '', NULL, 'Kampala', 'Lira', 'Namayiba Park-Kampala', 'Lira Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '10:00 PM', '04:00 AM', NULL, '31000', '', '31000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.81', '2017-11-09 07:45:36'),
(57, 29, '', NULL, 'Kampala', 'Arusha', 'Kampala', 'Arusha', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '03:00 PM', '11:00 AM', NULL, '100000', '', '100000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.167.19', '2017-11-20 05:53:17'),
(58, 29, '', NULL, 'Kampala', 'Nairobi', 'Namayiba terminal Kampala', 'Nairobi', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '06:30 PM', '04:30 AM', NULL, '65000', '', '65000', 0, 'bus_routes', '1', '0', '0000-00-00 00:00:00', '41.75.166.21', '2017-11-23 03:34:17'),
(59, 28, '', NULL, 'Kampala', 'Kisoro', 'Namayiba Park', 'Kisoro Town', 'book ticket without seat', 0, 0, 0, 0, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '3:2', 'N', 'N', 'N', 'Same', '11:30 PM', '11:30 PM', NULL, '51000', '', '51000', 0, 'bus_routes', '1', '0', '2017-12-05 14:19:35', '41.75.168.231', '2017-12-05 14:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'nabukajoshua@gmail.com', '2018-06-12 15:01:34', '2018-06-12 15:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `refrance_id` int(10) NOT NULL DEFAULT '0',
  `reference_code` varchar(20) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '0= ''Sub Admin'' , 1 = ''Super Admin'', 2 = ''Admin'', 3 ="busowner"',
  `mypoints` int(10) NOT NULL DEFAULT '0',
  `rating` varchar(10) DEFAULT NULL,
  `review` text,
  `date_of_birth` date DEFAULT NULL,
  `date_of_birth_points` varchar(10) NOT NULL DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` int(10) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `otp_code` varchar(250) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login_type` varchar(50) DEFAULT NULL,
  `verify_email` enum('0','1') DEFAULT '0',
  `email_verification_code` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `forget_password_request` tinyint(255) DEFAULT NULL,
  `forget_password_code` varchar(255) DEFAULT NULL,
  `email_status` enum('active','Inactive') DEFAULT 'Inactive',
  `newslatterpoints` varchar(250) DEFAULT NULL COMMENT 'If newslatter points is given to client then "yes"',
  `terms_conditions_agree` varchar(50) NOT NULL DEFAULT 'off' COMMENT '"On=Agree,Off=NotAgree"',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `password_reset_code` varchar(255) DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `signup_ip` varchar(50) DEFAULT NULL,
  `signup_date` datetime DEFAULT NULL,
  `device_type` int(11) DEFAULT '0' COMMENT '1-android, 2-ios',
  `device_token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `refrance_id`, `reference_code`, `first_name`, `last_name`, `username`, `password`, `user_type`, `mypoints`, `rating`, `review`, `date_of_birth`, `date_of_birth_points`, `address`, `state`, `city`, `country`, `zip`, `phone_no`, `otp_code`, `company`, `nationality`, `id_number`, `gender`, `email`, `login_type`, `verify_email`, `email_verification_code`, `status`, `forget_password_request`, `forget_password_code`, `email_status`, `newslatterpoints`, `terms_conditions_agree`, `remember_token`, `created_at`, `updated_at`, `is_deleted`, `password_reset_code`, `login_ip`, `signup_ip`, `signup_date`, `device_type`, `device_token`) VALUES
(1, 0, NULL, 'Nabuka', 'Joshua', NULL, '$2y$10$FM71nPEu7/xSIPnTCnfzou6nm/LqUp8ZfJ9HbEwoFWMtx.HmkOFAy', '1', 0, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '+256701432596', NULL, NULL, NULL, NULL, NULL, 'nabukajoshua@gmail.com', NULL, '0', NULL, 1, NULL, NULL, 'Inactive', NULL, 'off', 'XLomAUPhYlwl8610S44u98r2lXrnPR2KXtCteckcUcoUhlrfgS0PrFoZkGEO', '2018-06-03 13:13:05', '2018-06-12 03:57:50', '0', NULL, NULL, NULL, NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
