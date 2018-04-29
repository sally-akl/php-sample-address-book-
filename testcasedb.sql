-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2016 at 12:38 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcasedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_addressbook`
--

CREATE TABLE `case_addressbook` (
  `id` int(11) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `zip_city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_addressbook`
--

INSERT INTO `case_addressbook` (`id`, `first_name`, `last_name`, `street_name`, `zip_city_id`) VALUES
(5, 'sally', 'akl', 'street1', 1),
(8, 'samy', 'hosam', 'street1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `case_cities`
--

CREATE TABLE `case_cities` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_cities`
--

INSERT INTO `case_cities` (`id`, `title`) VALUES
(1, 'city1');

-- --------------------------------------------------------

--
-- Table structure for table `case_zips`
--

CREATE TABLE `case_zips` (
  `id` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_zips`
--

INSERT INTO `case_zips` (`id`, `zip_code`, `city_id`) VALUES
(1, 'MA 02201', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_addressbook`
--
ALTER TABLE `case_addressbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_cities`
--
ALTER TABLE `case_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_zips`
--
ALTER TABLE `case_zips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_addressbook`
--
ALTER TABLE `case_addressbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `case_cities`
--
ALTER TABLE `case_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `case_zips`
--
ALTER TABLE `case_zips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
