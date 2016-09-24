-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2016 at 08:31 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cds`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE IF NOT EXISTS `app` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `mod_id` int(100) NOT NULL,
  `app_date` date NOT NULL,
  `shirt` int(100) NOT NULL,
  `pant` int(100) NOT NULL,
  `jacket` int(100) NOT NULL,
  `blanket` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shirt` int(11) NOT NULL,
  `pant` int(11) NOT NULL,
  `jacket` int(11) NOT NULL,
  `blanket` int(11) NOT NULL,
  `appdate` date NOT NULL,
  `user_id` int(100) NOT NULL,
  `mod_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `shirt`, `pant`, `jacket`, `blanket`, `appdate`, `user_id`, `mod_id`, `status`) VALUES
(10, 2, 3, 4, 5, '2016-08-01', 8, 10, 'done'),
(11, 6, 6, 6, 6, '2016-08-12', 8, 10, 'done'),
(12, 2, 2, 2, 2, '2016-08-12', 8, 10, 'done'),
(13, 1, 1, 1, 1, '2016-08-12', 1, 10, 'done'),
(14, 1, 1, 1, 1, '2016-08-14', 1, 10, 'done'),
(15, 1, 1, 1, 1, '2016-09-15', 1, 10, 'done'),
(16, 4, 4, 5, 10, '2016-08-19', 5, 11, 'done'),
(17, 1, 1, 1, 1, '2016-08-31', 5, 11, 'done'),
(18, 1, 1, 1, 1, '2016-08-31', 3, 11, 'pending'),
(19, 1, 1, 1, 1, '2016-08-31', 3, 11, 'pending'),
(20, 1, 1, 1, 1, '2016-08-31', 3, 11, 'pending'),
(21, 1, 1, 1, 1, '2016-08-31', 3, 11, 'pending'),
(22, 1, 1, 1, 10, '2016-09-08', 3, 11, 'pending'),
(23, 1, 5, 1, 6, '2016-08-25', 1, 10, 'done'),
(24, 5, 5, 5, 5, '2016-08-31', 8, 10, 'done'),
(25, 3, 1, 1, 1, '2016-08-27', 6, 10, 'pending'),
(29, 1, 1, 1, 1, '2016-09-15', 17, 10, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'abc@abc.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `imgpath` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `dob`, `address`, `district`, `gender`, `phone`, `email`, `pass`, `role`, `imgpath`) VALUES
(1, 'Abdur', 'Rahman', '2016-04-06', 'ramna', 'dhaka', 'male', '01677257730', 'a@b.com', 'a', 'donor', 'images/bmw4.jpg'),
(3, 'sadi', 'niloy', '2016-04-06', 'khan Jahan Ali', 'khulna', 'male', '01721662652', 'b@d.com', 'ab', 'donor', 'images/m1.jpg'),
(4, 'Abdullah', 'Sadi', '2016-05-04', 'agrabad', 'chittagong', 'male', '01677257730', 'abc@abc.com', 'a', 'donor', 'images/bmw1.jpg'),
(5, 'Omor', 'Faruk', '2016-04-06', 'Kotayli', 'khulna', 'male', '01670335446', 'o@m.com', 'a', 'donor', 'images/m2.jpg'),
(6, 'mehedi', 'hasan', '2016-04-06', 'mirpur', 'dhaka', 'male', '01670335446', 'm@h.com', 'a', 'donor', 'images/audi3.jpg'),
(8, 'kaynrat', 'rahee', '2016-04-06', 'nikunjo', 'dhaka', 'male', '01670335446', 'b@c.com', 'xx', 'donor', 'images/audi4.jpg'),
(10, 'abu', 'rayhan', '2016-04-06', 'banani', 'dhaka', 'male', '01670335446', 'md@abu.com', 'a', 'moderator', 'images/bmw3.jpg'),
(11, 'mod', 'mod', '2016-04-06', 'doulatpur', 'khulna', 'male', '01670335446', 'mod@mod.com', 'a', 'moderator', 'images/audi1.jpg'),
(16, 'Mr.', 'admin', '2016-04-06', 'gulshan', 'dhaka', 'male', '01721662652', 'a@a.com', 'a', 'admin', 'images/audi2.jpg'),
(17, 'Asif', 'Mahmuddd', '2016-04-06', 'shantinagar', 'dhaka', 'male', '01677257730', 'a@m.com', 'a', 'donor', 'images/rangerover_20160826210308.jpg'),
(18, '', '', '0000-00-00', '', 'dhaka', 'male', '', '', '', 'donor', 'images/_20160826221738.'),
(19, 'sdacc', 'csdcckl', '2016-04-06', 'sd,nc ,sdc', 'dhaka', 'male', '01677257730', 'aaa@aaa.com', 'a', 'moderator', 'images/rangerover_20160827231842.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
