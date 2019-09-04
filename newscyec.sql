-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2019 at 08:11 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newscyec`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `user_id`, `timestamp`, `name`, `description`) VALUES
(1, 1, 1393956611, 'Girls', 'The beautiful girls.        '),
(2, 4, 1565824908, 'My favourite', 'Add al my fav plants.');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_image` varchar(255) NOT NULL,
  `plant_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_image`, `plant_id`) VALUES
(8, 'Acacia leptostachya', 'ac1.jpg', ''),
(7, 'Eremophila', 'er1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ext` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `plant_scientific_name` varchar(255) NOT NULL,
  `number_of_plant` int(10) NOT NULL,
  `plant_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`plant_id`, `plant_name`, `plant_scientific_name`, `number_of_plant`, `plant_image`) VALUES
(9, 'Eucalyptus erythrocorys', 'Helmet nut gum', 4, 'ec1.jpg'),
(10, 'Acacia genistifolia', 'Mediterranean genus', 1, 'Aca.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plant_gallery`
--

CREATE TABLE `plant_gallery` (
  `plant_gallery_id` int(11) NOT NULL,
  `plant_gallery_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `plant_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant_gallery`
--

INSERT INTO `plant_gallery` (`plant_gallery_id`, `plant_gallery_image`, `description`, `plant_id`) VALUES
(5, 'ec2.jpg', ' Eucalyptus leucoxylon:-Eucalyptus leucoxylon is a medium-sized tree which reaches 10-30 metres in height. The bark is retained on the lower trunk but the upper trunk and branches are smooth-barked and cream to grey in colour. . The adult leaves are lance-shaped to about 200 mm long. The flowers are usually seen in autumn and winter and may be white, cream, pink or red.', 9),
(7, 'ec3.jpg', '   Eucalyptus globulus:-one of the most widely cultivated of Australia native trees. It can be found in parks and gardens in many parts of Australia and is well established overseas (eg. Algeria, Brazil, France, India, Spain and Portugal). ', 9),
(8, 'ec4.jpg', '   Eucalyptus globulus:-one of the most widely cultivated of Australia\'s native trees. It can be found in parks and gardens in many parts of Australia and is well established overseas (eg. Algeria, Brazil, France, India, Spain and Portugal). ', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `password`) VALUES
(4, 'samsvirdi@hotmail.com', 'sandeep virdi', '1507498ce57d75fdc002525696655153'),
(5, 'samsvirdi@gmail.com', 'sandeep', '824a67f29e97b8798a9df7f00189f3e1'),
(6, 'laura@ymail.com', 'laura antochi', '680e89809965ec41e64dc7e447f175ab'),
(7, 'nancy@ymail.com', 'nancy', '824a67f29e97b8798a9df7f00189f3e1'),
(8, 'nancy12@gmail.com', 'nancy', 'ae5a9661cb88c901b43e502d29128490');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `plant_gallery`
--
ALTER TABLE `plant_gallery`
  ADD PRIMARY KEY (`plant_gallery_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plant_gallery`
--
ALTER TABLE `plant_gallery`
  MODIFY `plant_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
