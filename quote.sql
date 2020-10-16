-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 05:11 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quote`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `quoteid` int(255) NOT NULL,
  `customer` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `mail` text NOT NULL,
  `date` date NOT NULL,
  `street1` text NOT NULL,
  `street2` text NOT NULL,
  `city` text NOT NULL,
  `postalcode` int(6) NOT NULL,
  `mobile` int(10) NOT NULL,
  `subgrandtotal` int(255) NOT NULL,
  `subyearlyamount` int(255) NOT NULL,
  `grandtotal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`quoteid`, `customer`, `company`, `mail`, `date`, `street1`, `street2`, `city`, `postalcode`, `mobile`, `subgrandtotal`, `subyearlyamount`, `grandtotal`) VALUES
(84, 'KIran Kavaloor', 'Spring LABS PVT LTD', 'abc@gmail.com', '2020-10-15', '#320/1 KR Puram', '#', 'bangalore', 560036, 2147483647, 0, 0, 0),
(85, 'KIran Kavaloor', 'Spring LABS PVT LTD', 'abc@gmail.com', '2020-10-15', '#320/1 KR Puram', '#', 'bangalore', 560036, 2147483647, 0, 0, 0),
(86, '', '', '', '0000-00-00', '', '', '', 0, 2147483647, 0, 0, 0),
(87, '', '', '', '0000-00-00', '', '', '', 0, 2147483647, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes_details`
--

CREATE TABLE `notes_details` (
  `quoteid` int(255) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes_details`
--

INSERT INTO `notes_details` (`quoteid`, `notes`) VALUES
(52, 'Static Responsive Website'),
(54, 'Static Responsive Website'),
(54, 'Dynamic'),
(56, 'sdfg'),
(58, 'uyt'),
(60, ''),
(63, ''),
(63, ''),
(63, ''),
(63, ''),
(63, ''),
(63, ''),
(66, ''),
(68, 'Static Responsive Website'),
(70, 'Static Responsive Website'),
(72, ''),
(74, ''),
(76, ''),
(78, ''),
(80, ''),
(82, ''),
(84, 'Static Responsive Website'),
(86, '');

-- --------------------------------------------------------

--
-- Table structure for table `servce_details`
--

CREATE TABLE `servce_details` (
  `quoteid` int(255) NOT NULL,
  `service` text NOT NULL,
  `subamount` int(255) NOT NULL,
  `yearlyamount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servce_details`
--

INSERT INTO `servce_details` (`quoteid`, `service`, `subamount`, `yearlyamount`) VALUES
(52, 'Domain Registration ', 10000, 5000),
(54, 'Domain Registration ', 1000, 1000),
(54, 'Static board', 12000, 12000),
(54, 'Domain Registration 22', 1200, 14000),
(56, '', 1558, 1258),
(58, '', 14, 111),
(60, '', 123, 2),
(63, 'afsegersge', -1, -1),
(63, 'afsegersge', -1, -1),
(66, '', 125, 125),
(68, 'Static board', 125, 125),
(70, 'Static board', 125, 125),
(72, '', 125, 125),
(74, '', 125, 125),
(76, '', 125, 125),
(78, '', 125, 125),
(80, '', 125, 125),
(82, '', 125, 125),
(84, 'Domain Registration ', 12000, 12000),
(86, '', 101, 10),
(86, '', 10, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`quoteid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `quoteid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
