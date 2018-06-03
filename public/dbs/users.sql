-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2018 at 06:31 PM
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
(1, 0, NULL, 'Nabuka', 'Joshua', NULL, '$2y$10$EF7t15vUlGkR/E9eSf7XJetLoWz4O48KIiocjWIpvnAzf9b6XF9hS', '1', 0, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '+256701432596', NULL, NULL, NULL, NULL, NULL, 'nabukajoshua@gmail.com', NULL, '0', NULL, 1, NULL, NULL, 'Inactive', NULL, 'off', '5tAYtwCaQVBXlnnL9lfGHJp5MeX9twomvXD9tsl2nOgwzqv2yNLN56I0tHQ2', '2018-06-03 13:13:05', '2018-06-03 13:13:35', '0', NULL, NULL, NULL, NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
