-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2019 at 07:04 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalgarden`
--

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genera`
--

CREATE TABLE `genera` (
  `gen_id` int(50) NOT NULL,
  `f_id` int(11) NOT NULL,
  `gen_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `g_id` int(20) NOT NULL,
  `u_id` int(11) NOT NULL,
  `g_name` varchar(30) NOT NULL,
  `g_datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `g_comments` varchar(200) NOT NULL,
  `g_location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupPhoto`
--

CREATE TABLE `groupPhoto` (
  `gp_id` int(20) NOT NULL,
  `g_id` int(11) NOT NULL,
  `gp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ph_url` varchar(200) NOT NULL,
  `ph_comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `ph_id` int(200) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ph_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ph_comments` varchar(200) NOT NULL,
  `ph_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`ph_id`, `p_id`, `ph_date`, `ph_comments`, `ph_url`) VALUES
(1, 1, '2019-08-09 04:28:07', 'test', 'Images/Pic9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `p_id` int(20) NOT NULL,
  `u_id` int(10) NOT NULL,
  `p_age` int(50) DEFAULT NULL COMMENT 'years',
  `p_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_comments` text DEFAULT NULL,
  `f_id` int(20) NOT NULL,
  `g_id` int(20) NOT NULL,
  `s_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Pot`
--

CREATE TABLE `groupPlant` (
  `po_id` int(20) NOT NULL,
  `g_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `specie` (
  `s_id` int(50) NOT NULL,
  `gen_id` int(11) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `f_id` int(11) NOT NULL,
  `s_caredetails` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_pwd` varchar(30) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_joindate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `genera`
--
ALTER TABLE `genera`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `groupPhoto`
--
ALTER TABLE `groupPhoto`
  ADD PRIMARY KEY (`gp_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `Pot`
--
ALTER TABLE `groupPlant`
  ADD PRIMARY KEY (`po_id`);


--
-- Indexes for table `species`
--
ALTER TABLE `specie`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genera`
--
ALTER TABLE `genera`
  MODIFY `gen_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `g_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupPhoto`
--
ALTER TABLE `groupPhoto`
  MODIFY `gp_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `ph_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plant`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pot`
--
ALTER TABLE `groupPlant`
  MODIFY `po_id` int(20) NOT NULL AUTO_INCREMENT;

--
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `specie`
  MODIFY `s_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
