-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 06:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afghanwh`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `cust_name` varchar(32) NOT NULL,
  `cust_email` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `cust_name`, `cust_email`, `message`, `comment_date`, `news_id`, `pro_id`) VALUES
(1, 'afdsjk', 'fjakdfj@gmail.com', 'k\r\nakjfkadfjad', '2019-10-27 07:00:00', 21, NULL),
(2, 'jkajfdkadjfkad f', 'akfjadkfjadkfjakdf@gmail.com', 'akjfkajdfadf\r\nadfjkadfjakd', '2019-10-27 06:19:48', 21, NULL),
(3, 'jafaksjk', 'jfkadjf@gmail.com', 'jfadkfjadkfj', '2019-10-27 06:29:34', NULL, 42),
(4, 'fadfjkd fd ', 'ak@gmail.com', 'kajdf ia dfadf ad', '2019-10-27 16:52:42', NULL, 43),
(5, 'ali', 'ali@gmail.com', 'message', '2019-10-27 16:53:21', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(32) NOT NULL,
  `contact_email` varchar(32) NOT NULL,
  `contact_message` text NOT NULL,
  `cont_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_email`, `contact_message`, `cont_flag`) VALUES
(1, 'Hadi', 'hadi.kpu@gmail.com', 'Hi dear eng!\r\nHow you prove our page', 1),
(2, 'ali reza', 'alireza@gmail.com', 'how are you', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `cont_id` int(11) NOT NULL,
  `cont_name` varchar(255) NOT NULL,
  `location` varchar(32) NOT NULL,
  `project_id` varchar(32) DEFAULT NULL,
  `value` double NOT NULL,
  `donar` varchar(32) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `cont_photo` varchar(64) NOT NULL,
  `descriptions` text NOT NULL,
  `contract_type` varchar(32) NOT NULL,
  `view_count` int(11) DEFAULT '0',
  `company_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(32) NOT NULL,
  `file_path` varchar(64) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_path`, `news_id`, `pro_id`, `contract_id`) VALUES
(13, '983631_512772332105087_619976454', 'img/news/983631_512772332105087_619976454_n.jpg', 20, NULL, NULL),
(14, '1.png', 'img/news/1.png', 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(32) NOT NULL,
  `news_content` text NOT NULL,
  `news_date` varchar(32) NOT NULL,
  `news_category` varchar(32) NOT NULL,
  `news_view` int(11) NOT NULL DEFAULT '0',
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_content`, `news_date`, `news_category`, `news_view`, `author`) VALUES
(20, 'New Sort title News', 'There are some details about the News ... There are some details about the News ... There are some details about the News ... There are some details about the News ... There are some details about the News ... There are some details about the News ... There are some details about the News ... There are some details about the News ... There are some details about the News ... There are some details about the News ... There are some details about the News ... ', '10/25/2019', 'industry', 10, 0),
(21, 'Example', 'Details about title', '10/25/2019', 'company', 7, 54);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pro_id` int(11) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_location` varchar(32) NOT NULL,
  `pro_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pro_file` varchar(256) DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pro_id`, `pro_title`, `pro_desc`, `pro_location`, `pro_date`, `pro_file`, `publish`, `user_id`) VALUES
(42, 'Jobs', 'Jobe descriptions', 'Kabul', '2019-10-26 17:56:35', 'img/products/1.png', 1, 54),
(43, 'News post', 'detials', 'Herat', '2019-10-26 17:50:17', 'img/products/Click (5).jpg', 1, 54),
(44, 'something else', 'adfjkdsf', 'Bamian', '2019-10-26 18:05:08', 'img/products/blg12.jpg', 0, 49),
(45, 'new post', 'adfkjadkfjadkf adkfj adkfja d', 'Maidan Wardak', '2019-10-26 18:29:10', 'img/products/983631_512772332105087_619976454_n.jpg', 1, 54),
(46, 'New post title', 'adfkjadkfjadkf adkfj adkfja ', 'Maidan Wardak', '2019-10-26 18:34:05', 'img/products/solid1.jpg', 0, 54);

-- --------------------------------------------------------

--
-- Table structure for table `replys`
--

CREATE TABLE `replys` (
  `reply_id` int(11) NOT NULL,
  `reply_name` varchar(32) NOT NULL,
  `reply_message` text NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `history` varchar(255) NOT NULL,
  `slider_photo` varchar(255) NOT NULL,
  `flag` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `history`, `slider_photo`, `flag`) VALUES
(21, 'Your history is here', 'img/slider/solid5.jpg', 1),
(22, 'Your product is belong to your business', 'img/slider/solid2.jpg', 0),
(23, 'ghjgkhlj;k', 'img/slider/1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `subs_id` int(11) NOT NULL,
  `subs_email` varchar(32) NOT NULL,
  `subs_date` varchar(32) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subs_id`, `subs_email`, `subs_date`, `flag`) VALUES
(13, 'hadi.kpu@gmail.com', '2019-06-22 | 01:31:37pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `comment_id` int(11) NOT NULL,
  `cust_name` varchar(32) NOT NULL,
  `cust_email` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pro_id` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `user_photo` varchar(64) DEFAULT NULL,
  `user_type` enum('admin','member','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_photo`, `user_type`) VALUES
(49, 'Lalajan', 'info@lalajanict.com', '9ad2bc36c2e27fe5a4c9815263eaf8b1', 'img/users/man4.jpg', 'admin'),
(54, 'Hadi Mohseni', 'hadi.kpu@gmail.com', '4026c86301f8d76fbe307cdee22f30be', 'img/users/hadi.PNG', 'member'),
(64, 'Mahdi', 'mahdi@gmail.com', '6267437a1732f140951ade25a7d68a0b', 'img/users/aliakbar.jpg', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `replys`
--
ALTER TABLE `replys`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subs_id`),
  ADD UNIQUE KEY `subs_email` (`subs_email`),
  ADD UNIQUE KEY `subs_email_2` (`subs_email`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `cont_id` (`pro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `replys`
--
ALTER TABLE `replys`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `projects` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `files_ibfk_3` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`cont_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replys`
--
ALTER TABLE `replys`
  ADD CONSTRAINT `replys_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `test` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replys_ibfk_2` FOREIGN KEY (`com_id`) REFERENCES `test` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `contracts` (`cont_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `projects` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_3` FOREIGN KEY (`pro_id`) REFERENCES `projects` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_ibfk_4` FOREIGN KEY (`pro_id`) REFERENCES `projects` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
