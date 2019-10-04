-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2019 at 06:39 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newscyec_garden`
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
  `plant_id` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `user_id` int(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_image`, `plant_id`, `date_added`, `location`, `comment`, `user_id`) VALUES
(1, 'Rose rose', '3.jpg', '1,2,6,7', '', '', '', 2),
(5, 'Ecapluptus', 'images.jpg', '2', '', '', '', 2),
(9, 'tytryrt', 'images (2).jpg', '10,12', '', '', '', 2),
(10, 'CB', '69297779.jpg', '', '18-09-2019', 'public_html', 'ggsdffdgdsfhsfd', 5);

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

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `user_id`, `album_id`, `timestamp`, `ext`) VALUES
(12, 1, 1, 1393958224, 'jpg'),
(13, 1, 1, 1393960325, 'jpg'),
(14, 1, 1, 1393960363, 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `plant_scientific_name` varchar(255) NOT NULL,
  `number_of_plant` int(10) NOT NULL,
  `plant_image` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `popular_name` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `genera` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `comment` mediumtext NOT NULL,
  `age` int(2) NOT NULL,
  `add_date` varchar(255) NOT NULL,
  `user_id` int(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`plant_id`, `plant_name`, `plant_scientific_name`, `number_of_plant`, `plant_image`, `species`, `popular_name`, `family`, `genera`, `description`, `comment`, `age`, `add_date`, `user_id`) VALUES
(2, 'Jasmine', 'Jasminum', 12, 'chameli.jpg', '', '', '', '', '', '', 0, '', 2),
(11, 'yyry', 'ertret', 54, 'chameli.jpg', 'rtyry', 'ytryr', 'rtyrty', 'rtyrt', 'rtytryyrtyryr yrty', 'ry ryrty rty', 30, '21-09-2019', 2),
(10, 'Lily', 'Lilium', 12, 'rose.jpg', 'dsfg', 'dsg', 'dsfg', 'dfgd', 'Tall, majestic and strikingly-shaped: lilies are a popular choice for bouquets due to their unusual shape and scent. Like roses, lilies are an important cultural and literary device and are known throughout the temperature Northern Hemisphere for their beauty and resilience.\r\n\r\nIf it\'s got Lilium in the name then you know the flower is a \"true lily\"; many flowers which you think share similar characteristics to lilies and even use the term in their common name aren\'t actually part of the same group. Lily of the Valley and the water lily are the most famous examples of this - but the list is long!', 'Superb!', 33, '18-09-2019', 2),
(12, 'tyrtyrt', 'ytryrty', 12, 'images (2).jpg', 'tyrty', 'fdytr', 'tutu', 'utyu', 'rutyuytu', 'tyutyu', 30, '06-09-2019', 2),
(13, 'rterwytrt', 'yeyuerue', 3, '69297779.jpg', 'yrtr', 'rtytre', 'reyre', 'ryryer', 'rtyreyre', 'gfdhdd', 2, '13-09-2019', 2);

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
(4, '3.jpg', ' Ecaluptus', 1),
(5, 'ec4.jpg', ' Ecaluptus', 2),
(6, 'images (1).jpg', 'lilly is super', 2),
(7, 'ec4.jpg', ' Ecaluptus', 2),
(8, '3.jpg', 'ffdgfhg', 2),
(9, 'images.jpg', 'v vgdsgdsgdfsgdsg htryu6eyue', 10);

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
(1, 'mani619cash@gmail.com', 'Umair Ayub', '202cb962ac59075b964b07152d234b70'),
(2, 'cbphptraining1@gmail.com', 'CHANDRA BHUSHAN', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'samsvirdi@hotmail.com', 'sandeep virdi', '1507498ce57d75fdc002525696655153'),
(5, 'cb8022@gmail.com', 'CHANDRA BHUSHAN', 'e10adc3949ba59abbe56e057f20f883e');

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
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plant_gallery`
--
ALTER TABLE `plant_gallery`
  MODIFY `plant_gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
