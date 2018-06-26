-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2018 at 06:00 AM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_ugabus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `password` text,
  `user_level` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `remember_token` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `username`, `gender`, `date_of_birth`, `email`, `phone`, `mobile`, `password`, `user_level`, `address`, `city`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'akenaa', 'kenedy', 'ken', 'male', '2018-06-15', 'kenedyakenaivan@gmail.com', '256704516144', '0880016077', '$2y$12$3jkNZwJ8kkhs2RwuaEfscu0LiXwRd7Uiea3tzlbwy/C.5qwq0.OXG', '1', 'kitante', 'kampala', 'UlYCZFMrG8OoeFyAchwjzR65QHkqsCvvlLIiysw8VrpQyGpwtQPZt0GXwRVL', '2018-06-15 00:00:00', '2018-06-16 15:38:22'),
(2, 'medi', 'bogere', 'medi', 'male', '2018-06-01', 'mbogore@ugabus.com', '256704516166', '0880023098', '123456', '2', 'bugolobi', 'kampala', NULL, '2018-06-15 17:51:27', '2018-06-15 17:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `agent_address` varchar(45) DEFAULT NULL,
  `agent_city` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `company_hq_address` varchar(45) DEFAULT NULL,
  `company_hq_city` varchar(45) DEFAULT NULL,
  `avatar` text,
  `email` text,
  `password` text,
  `remember_token` text,
  `email_verified_status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `first_name`, `last_name`, `username`, `gender`, `date_of_birth`, `phone`, `mobile`, `agent_address`, `agent_city`, `company`, `company_hq_address`, `company_hq_city`, `avatar`, `email`, `password`, `remember_token`, `email_verified_status`, `created_at`, `updated_at`) VALUES
(1, 'akena', 'kenedy', 'ken', 'male', '2018-06-14', '+256704516144', '0880016000', 'bukoto', 'kampala', 'gaagaa coach', 'arua', 'arua', NULL, 'kenedyakenaivan@gmail.com', NULL, NULL, NULL, '2018-06-14 14:10:59', '2018-06-14 14:10:59'),
(2, 'achire', 'denis', 'denis', 'male', '2018-06-05', '+256789098765', '0880023000', 'ntinda', 'kampala', 'northern express', 'gulu', 'gulu', NULL, 'denisachire@gmail.com', NULL, NULL, NULL, '2018-06-14 14:26:37', '2018-06-14 14:26:37'),
(3, 'sheela', 'namatamba', 'mobi', 'female', '2018-06-14', '+256704516145', '0880016078', NULL, NULL, NULL, NULL, NULL, NULL, 'nsheela@ugabus.com', NULL, NULL, NULL, '2018-06-15 17:36:27', '2018-06-15 17:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `number_of_seats` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_payments`
--

CREATE TABLE `booking_payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `booking_reference_number` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `license_plate_number` varchar(45) DEFAULT NULL,
  `primary_color` varchar(45) DEFAULT NULL,
  `secondary_color` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `make` varchar(45) DEFAULT NULL,
  `image` text,
  `active` int(11) DEFAULT '0',
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `company_id`, `agent_id`, `license_plate_number`, `primary_color`, `secondary_color`, `model`, `make`, `image`, `active`, `created_at`, `updated_at`) VALUES
(7, 2, 1, 'uap 667d', 'white', 'black', 'Road Master', 'Scania', '1529508881gaagaa.jpg', 1, '2018-06-20 15:34:41', '2018-06-20 15:34:41'),
(8, 1, 2, 'uab 669b', 'blue', 'white', 'ml5006', 'mercedes', '1529511466nile.jpeg', 1, '2018-06-20 16:17:46', '2018-06-20 16:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `hq_address` varchar(45) DEFAULT NULL,
  `hq_city` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `hq_address`, `hq_city`, `email`, `phone`, `mobile`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Linq', 'kisenyi', 'kampala', 'support@linq.com', '0790987653', '0087980987', 'http://linqserv.com/', '2018-06-20 10:47:24', '2018-06-20 10:47:24'),
(2, 'GaaGaa Bus', 'dramadi', 'arua', 'support@gaagaabus.com', '0786564321', '0087987654', NULL, '2018-06-20 11:39:02', '2018-06-20 11:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `parks`
--

CREATE TABLE `parks` (
  `id` int(11) NOT NULL,
  `park_name` varchar(45) DEFAULT NULL,
  `park_address` varchar(45) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `long` float DEFAULT NULL,
  `direction_description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parks`
--

INSERT INTO `parks` (`id`, `park_name`, `park_address`, `lat`, `long`, `direction_description`, `created_at`, `updated_at`) VALUES
(1, 'kisenyi', 'kampala', 0.32456, 32.0987, 'Behind owino market', '2018-06-14 00:00:00', '2018-06-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_status` varchar(45) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_amount` double DEFAULT NULL,
  `booking_payment_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 'mobile money', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `review_message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `driver_full_name` varchar(45) DEFAULT NULL,
  `travel_from` varchar(45) DEFAULT NULL,
  `travel_to` varchar(45) DEFAULT NULL,
  `travel_period` int(11) DEFAULT '0',
  `time_of_departure` time DEFAULT NULL,
  `estimated_time_of_arrival` time DEFAULT NULL,
  `unit_seat_price` double DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `monday` int(11) DEFAULT '0',
  `tuesday` int(11) DEFAULT '0',
  `wednesday` int(11) DEFAULT '0',
  `thursday` int(11) DEFAULT '0',
  `friday` int(11) DEFAULT '0',
  `saturday` int(11) DEFAULT '0',
  `sunday` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `bus_id`, `driver_full_name`, `travel_from`, `travel_to`, `travel_period`, `time_of_departure`, `estimated_time_of_arrival`, `unit_seat_price`, `currency`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `created_at`, `updated_at`) VALUES
(5, 7, 'Okecha Joseph', 'kampala', 'juba', 2, '01:00:00', '12:00:00', 120000, 'ugx', 1, 1, 1, 1, 1, 1, 1, '2018-06-20 15:57:44', '2018-06-20 15:57:44'),
(6, 8, 'oyam micheal', 'nairobi', 'kampala', 2, '08:00:00', '11:20:00', 80000, 'ksh', 1, 0, 1, 0, 0, 1, 0, '2018-06-20 16:22:17', '2018-06-20 16:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `avatar` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` text,
  `remember_token` text,
  `email_verified_status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `phone`, `avatar`, `email`, `password`, `remember_token`, `email_verified_status`, `created_at`, `updated_at`) VALUES
(1, 'kenedy', 'ivan', 'male', '+254729907865', NULL, 'kenedyivan@gmail.com', '$2y$12$3jkNZwJ8kkhs2RwuaEfscu0LiXwRd7Uiea3tzlbwy/C.5qwq0.OXG', NULL, 1, '2018-06-15 00:00:00', '2018-06-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_travel _stories`
--

CREATE TABLE `user_travel _stories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text,
  `body` text,
  `verify_status` int(11) DEFAULT NULL,
  `publish_status` int(11) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bookings_users1_idx` (`user_id`),
  ADD KEY `fk_bookings_routes1_idx` (`route_id`),
  ADD KEY `fk_bookings_payment_methods1_idx` (`payment_method_id`);

--
-- Indexes for table `booking_payments`
--
ALTER TABLE `booking_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_booking_payments_bookings1_idx` (`booking_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_buses_agents_idx` (`agent_id`),
  ADD KEY `fk_buses_companies1_idx` (`company_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parks`
--
ALTER TABLE `parks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_booking_payments1_idx` (`booking_payment_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reviews_users1_idx` (`user_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_routes_buses1_idx` (`bus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_travel _stories`
--
ALTER TABLE `user_travel _stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_travel _stories_users1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `parks`
--
ALTER TABLE `parks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_payment_methods1` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bookings_routes1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bookings_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `booking_payments`
--
ALTER TABLE `booking_payments`
  ADD CONSTRAINT `fk_booking_payments_bookings1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `fk_buses_agents` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buses_companies1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_booking_payments1` FOREIGN KEY (`booking_payment_id`) REFERENCES `booking_payments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `fk_routes_buses1` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_travel _stories`
--
ALTER TABLE `user_travel _stories`
  ADD CONSTRAINT `fk_user_travel _stories_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
