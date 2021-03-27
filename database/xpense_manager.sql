-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2021 at 05:35 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpense_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `person_name` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `user_plan_id` int(255) NOT NULL,
  `amount` int(255) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`person_name`, `p_id`, `user_id`, `user_plan_id`, `amount`) VALUES
('Vaibhav', 1, 1, 1, 1000),
('Shivam', 2, 1, 1, 500),
('Vaibhav', 4, 1, 2, 0),
('Yash', 5, 1, 2, 0),
('Shivam', 6, 1, 2, 0),
('Sachivesh', 7, 2, 1, 0),
('Mohanish', 8, 2, 1, 0),
('Sumegh', 9, 2, 1, 0),
('Samvid', 10, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `user_id` int(255) NOT NULL,
  `planTitle` varchar(255) NOT NULL,
  `plan_from` date NOT NULL,
  `plan_to` date NOT NULL,
  `initial_budget` varchar(255) NOT NULL,
  `people_num` int(255) NOT NULL,
  `user_plan_id` int(255) NOT NULL,
  `plan_id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`user_id`, `planTitle`, `plan_from`, `plan_to`, `initial_budget`, `people_num`, `user_plan_id`, `plan_id`) VALUES
(1, 'Trip to Goa', '2021-02-04', '2021-02-10', '4000', 2, 1, 1),
(1, 'Back to campus', '2021-02-04', '2021-02-19', '5000', 3, 2, 6),
(2, 'Trip to Mumbai', '2021-02-03', '2021-02-19', '10000', 4, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`) VALUES
(1, 'Vaibhav Anuragi', 'vaibhaverma132@gmail.com', '1fe8f1a73f581bdc992d342e89fb8bd4', '9871530819'),
(2, 'Sachivesh Anuragi', 'sachivesh61099@gmail.com', '1fe8f1a73f581bdc992d342e89fb8bd4', '9113530070');

-- --------------------------------------------------------

--
-- Table structure for table `xpense`
--

DROP TABLE IF EXISTS `xpense`;
CREATE TABLE IF NOT EXISTS `xpense` (
  `xTitle` varchar(255) NOT NULL,
  `xp_date` date NOT NULL,
  `amount_spent` int(11) NOT NULL,
  `xpense_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `user_plan_id` int(255) NOT NULL,
  `bill` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`xpense_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xpense`
--

INSERT INTO `xpense` (`xTitle`, `xp_date`, `amount_spent`, `xpense_id`, `user_id`, `user_plan_id`, `bill`) VALUES
('Domino\'s', '2021-02-03', 1000, 3, 1, 1, NULL),
('Burger King', '2021-02-03', 500, 6, 1, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
