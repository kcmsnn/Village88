-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 02:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'KHARL PERRY', 'CAMSON', 'kcmsn.ccna@gmail.com', '2662942959914d7204a77c30afba6fd0', '1dbbe3445f7283b7993a61d397265198c6d9f7726985', '2021-04-14 11:18:19', '2021-04-14 11:18:19'),
(2, 'red', 'blue', 'red@blue.com', '727bc3942161b05735fd490f0b114c1f', '99a6f1d76df1794e6ba52dc0ae09d46af080c96b0a70', '2021-04-14 11:28:47', '2021-04-14 11:28:47'),
(3, 'wwww', 'qqqqq', 'wwww@qqqq.com', '890897114e41f5969a8109670eee9807', '2ecb92dc11578f4fd10a09c29425f1a8f1fe4217006a', '2021-04-14 11:32:25', '2021-04-14 11:32:25'),
(4, 'jea', 'huet', 'jea@huet.com', 'bc055e04897e05c5d8a2d6ffb53d1f82', '74fab18cdfc5566f13ca81f6dbe512879b2f4de71840', '2021-04-14 11:37:23', '2021-04-14 11:37:23'),
(5, 'abc', 'def', 'abc@def.com', 'e89060a45b51a68d8b6acc32cc2f7c93', '12d444b951ed43956a29fde2c9d184a4c62b1e4b34c4', '2021-04-14 11:57:01', '2021-04-14 11:57:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
