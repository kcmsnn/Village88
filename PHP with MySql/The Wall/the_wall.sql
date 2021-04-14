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
-- Database: `the_wall`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `messages_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `users_id`, `messages_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'adssadsadsadsadsa', '2021-04-14 17:13:18', '2021-04-14 17:13:18'),
(12, 2, 2, 'booooooom', '2021-04-14 19:06:12', '2021-04-14 19:06:12'),
(13, 2, 2, 'Lets go!', '2021-04-14 19:07:02', '2021-04-14 19:07:02'),
(14, 2, 3, 'baragadag', '2021-04-14 19:40:54', '2021-04-14 19:40:54'),
(15, 2, 3, 'dagul', '2021-04-14 19:52:39', '2021-04-14 19:52:39'),
(16, 2, 3, 'dagul', '2021-04-14 19:54:18', '2021-04-14 19:54:18'),
(17, 2, 3, 'sadasdsadsadsadajhgnaslkjnfsadlkjfnalksndjf', '2021-04-14 19:54:40', '2021-04-14 19:54:40'),
(18, 2, 1, 'sadasdsadsadsadajhgnaslkjnfsadlkjfnalksndjf', '2021-04-14 19:55:50', '2021-04-14 19:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `salt`, `created_at`, `updated_at`) VALUES
(1, 'KHARL PERRY', 'CAMSON', 'kcmsn.ccna@gmail.com', '88674ffb0150e2bf0f8efdd590a150bd', '7c2f4f923ea1a14fac1a235582178d5b17f6f1556ef9', '2021-04-14 13:57:11', '2021-04-14 13:57:11'),
(2, 'jea', 'huet', 'jea@huet.com', '543af33454cc56556fe2fcc4b46019de', 'b12e6841eeae78f70c29ef53c41ecf7ebc99ce0bd036', '2021-04-14 15:39:36', '2021-04-14 15:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `wall_messages`
--

CREATE TABLE `wall_messages` (
  `messages_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wall_messages`
--

INSERT INTO `wall_messages` (`messages_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'abudalabashka', '2021-04-14 17:58:33', '2021-04-14 17:58:33'),
(2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-04-14 18:07:59', '2021-04-14 18:07:59'),
(3, 2, 'Meow Meow Meow', '2021-04-14 18:22:04', '2021-04-14 18:22:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `fk_comments_users1_idx` (`users_id`),
  ADD KEY `fk_comments_messages1_idx` (`messages_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wall_messages`
--
ALTER TABLE `wall_messages`
  ADD PRIMARY KEY (`messages_id`),
  ADD KEY `fk_messages_user_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wall_messages`
--
ALTER TABLE `wall_messages`
  MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
