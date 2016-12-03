-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2016 at 10:57 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `platipi`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `authid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `token` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`authid`, `userid`, `token`) VALUES
(1, 1, '808173583a2e0f07c8023a3b8e932eaad01e2f68'),
(2, 2, '7738f70164ffbc42445c936783a8ed120b67a017'),
(3, 2, '5503a09502a20e03cc63c3f82a152a5e354eda81'),
(4, 2, '347f109577e9b6726225685940aa1ef3d81e7f34'),
(5, 2, '4f7e1bd8b50d6b04f22b03d39455c4057c693636');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `interestid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `interest` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`interestid`, `userid`, `interest`) VALUES
(1, 2, 'soccer'),
(2, 3, 'soccer'),
(3, 4, 'soccer'),
(4, 5, 'soccer'),
(5, 6, 'dancing'),
(6, 7, 'dancing'),
(7, 8, 'dancing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `password_hash` char(60) NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `queing` tinyint(1) NOT NULL DEFAULT '0',
  `group_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password_hash`, `creation_time`, `bio`, `email`, `first_name`, `queing`, `group_link`) VALUES
(2, '$2y$10$5ypB.hDWCdzP1cv1HTbw8uP6WMOEBvoslYp77mK5wI7ty4qW.QijK', '2016-12-03 19:42:20', NULL, 'bob@gmail.com', 'Bob', 0, ''),
(3, '$2y$10$5ypB.hDWCdzP1cv1HTbw8uP6WMOEBvoslYp77mK5wI7ty4qW.QijK', '2016-12-03 19:42:20', NULL, 'bob@gmail.com', 'Bob', 0, ''),
(4, '$2y$10$5ypB.hDWCdzP1cv1HTbw8uP6WMOEBvoslYp77mK5wI7ty4qW.QijK', '2016-12-03 19:42:20', NULL, 'bob@gmail.com', 'Bob', 0, ''),
(5, '$2y$10$5ypB.hDWCdzP1cv1HTbw8uP6WMOEBvoslYp77mK5wI7ty4qW.QijK', '2016-12-03 19:42:20', NULL, 'bob@gmail.com', 'Bob', 0, ''),
(6, '$2y$10$5ypB.hDWCdzP1cv1HTbw8uP6WMOEBvoslYp77mK5wI7ty4qW.QijK', '2016-12-03 19:42:20', NULL, 'bob@gmail.com', 'Bob', 0, ''),
(7, '$2y$10$5ypB.hDWCdzP1cv1HTbw8uP6WMOEBvoslYp77mK5wI7ty4qW.QijK', '2016-12-03 19:42:20', NULL, 'bob@gmail.com', 'Bob', 0, ''),
(8, '$2y$10$5ypB.hDWCdzP1cv1HTbw8uP6WMOEBvoslYp77mK5wI7ty4qW.QijK', '2016-12-03 19:42:20', NULL, 'bob@gmail.com', 'Bob', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`authid`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`interestid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `authid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `interestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
