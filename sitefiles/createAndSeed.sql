-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2013 at 09:24 PM
-- Server version: 5.5.30-cll
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `animalsi_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_categories`
--

CREATE TABLE IF NOT EXISTS `animal_categories` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `category` varchar(25) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='ie. Bears, fish, birds, etc' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `animal_categories`
--

INSERT INTO `animal_categories` (`category_id`, `parent_id`, `category`) VALUES
(1, NULL, 'Bears'),
(2, NULL, 'Birds'),
(3, NULL, 'Fish'),
(4, NULL, 'Reptiles'),
(6, NULL, 'Marsupio');

-- --------------------------------------------------------

--
-- Table structure for table `animal_info`
--

CREATE TABLE IF NOT EXISTS `animal_info` (
  `animal_id` int(10) unsigned NOT NULL,
  `about` text NOT NULL,
  `src` varchar(500) DEFAULT NULL,
  UNIQUE KEY `animal_id` (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='HTML information about animal';

--
-- Dumping data for table `animal_info`
--

INSERT INTO `animal_info` (`animal_id`, `about`, `src`) VALUES
(4, '', 'http://farm4.staticflickr.com/3547/3669619196_7a7ae72401_z.jpg?zz=1'),
(5, '', 'http://www.nps.gov/upde/images/20071004132605.jpg'),
(7, '', 'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Dolphin_leap.JPG/1021px-Dolphin_leap.JPG'),
(8, '', 'http://upload.wikimedia.org/wikipedia/commons/1/13/Indian_Garden_Lizard_Calotes_versicolor_W2_IMG_6829.jpg'),
(11, 'Starfish or sea stars are echinoderms belonging to the class Asteroidea. The names &#34;starfish&#34; and &#34;sea star&#34; essentially refer to members of the class Asteroidea. -Wikipedia', 'http://www.tapirback.com/tapirgal/gifts/friends/aquatic/starfish-orange-plastic-f1024a.jpg'),
(13, 'The kangaroo is a marsupial from the family Macropodidae. In common use the term is used to describe the largest species from this family, especially those of the genus Macropus, red kangaroo, antilopine ... Wikipedia', 'http://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Eastern_Grey_Kangaroo_Feeding.jpg/1024px-Eastern_Grey_Kangaroo_Feeding.jpg'),
(14, '', 'http://upload.wikimedia.org/wikipedia/commons/c/c9/Brown_tree_snake_Boiga_irregularis_2_USGS_Photograph.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `animal_list`
--

CREATE TABLE IF NOT EXISTS `animal_list` (
  `animal_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `picture_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`animal_id`),
  KEY `category_id` (`category_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `animal_list`
--

INSERT INTO `animal_list` (`animal_id`, `category_id`, `picture_id`, `name`) VALUES
(4, 1, NULL, 'Grizzly Bear'),
(5, 2, 1, 'Bald Eagle'),
(7, 3, 3, 'Dolphin'),
(8, 4, NULL, 'Lizard'),
(11, 3, NULL, 'Star Fish'),
(13, 6, NULL, 'Kangaroo'),
(14, 4, NULL, 'Snake');

-- --------------------------------------------------------

--
-- Table structure for table `animal_pictures`
--

CREATE TABLE IF NOT EXISTS `animal_pictures` (
  `picture_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `animal_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `src` varchar(500) NOT NULL,
  `title` varchar(25) NOT NULL,
  `caption` varchar(140) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`picture_id`),
  KEY `animal_id` (`animal_id`,`user_id`),
  KEY `animal_id_2` (`animal_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `animal_sightings`
--

CREATE TABLE IF NOT EXISTS `animal_sightings` (
  `sighting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `animal_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sighting_id`),
  KEY `animal_id` (`animal_id`),
  KEY `user_id` (`user_id`),
  KEY `created_on` (`created_on`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `animal_sightings`
--

INSERT INTO `animal_sightings` (`sighting_id`, `animal_id`, `user_id`, `lat`, `lng`, `note`, `created_on`) VALUES
(4, 4, 47, 43.826771, -111.776131, 'It was cool', '2013-03-29 05:21:41'),
(5, 5, 47, 43.826771, -111.776131, 'Wish that were in Yellowstone!', '2013-03-29 05:23:53'),
(8, 7, 47, 43.826790, -111.776123, 'And it was quite the experience!', '2013-03-29 13:45:57'),
(9, 8, 47, 43.826763, -111.776154, 'itty bitty one', '2013-03-29 16:54:26'),
(11, 8, 23, 43.819103, -111.781349, '', '2013-03-29 20:03:15'),
(13, 7, 23, 43.819103, -111.781349, '', '2013-03-29 20:05:40'),
(14, 11, 47, 43.818420, -111.782669, '', '2013-03-29 21:40:01'),
(16, 5, 47, 43.819221, -111.781487, '', '2013-04-01 20:29:37'),
(17, 13, 47, 43.818874, -111.781715, 'hoppin along in Robertson&#39;s Class', '2013-04-01 21:34:20'),
(18, 14, 47, 43.818882, -111.781677, 'Slithering through 210', '2013-04-01 21:42:49'),
(19, 4, 47, 43.817295, -111.784859, 'In the Biddolf', '2013-04-03 17:38:22'),
(21, 4, 23, 43.823055, -111.785278, '', '2013-04-03 20:11:06'),
(22, 7, 23, 43.816650, -111.777054, 'Out of water. :', '2013-04-03 21:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `auth` int(10) unsigned NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='What animal and where did they see it' AUTO_INCREMENT=56 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `auth`, `created_on`) VALUES
(23, 'MJ ', 'LaFond', 'lafondfam@gmail.com', 1, '2013-03-29 20:00:31'),
(24, 'Clifford', 'Solomon', 'cliffordsolomon@gmail.com', 1, '2013-03-29 20:00:39'),
(25, 'Matt', 'Spencer', 'spe08009@byui.edu', 1, '2013-03-29 20:03:52'),
(47, 'Ryan', 'Quinlan', 'apex2060@gmail.com', 1, '2013-04-03 17:37:37'),
(49, 'simon', 'cit336', '336cit@byui.edu', 0, '2013-04-03 19:29:46'),
(54, 'Ryans', 'Quinlan', 'apex2060@gmail.com', 0, '2013-04-03 19:39:51'),
(55, 'paul', 'milsap', 'milsap@zazz.com', 0, '2013-04-03 20:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE IF NOT EXISTS `user_list` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(32) NOT NULL,
  `password` char(150) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_2` (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`user_id`, `username`, `password`) VALUES
(21, 'oldmin', 'eee'),
(23, 'lafondfam', '55df6b882afee6b29f8809551614a2c2ec5e1a80a3392528cc5773a09cd7a896688054d9621cc114fb964c6c97dae9e3fcd7caf7edc183d3cc92af709c773b9d'),
(24, 'cliff', '0678af70b12e5bb45b8f0839aac4e82205f07977eed1ff0f2a24f35c09bbcc0e63bc6ae13c172cec53f7fa9c900bebef7be4ab2cff5fba055125f909a6f57c68'),
(25, 'Matt_Spencer', '8028f51fa0c2c2e3d1a8a9077ecfeab751fae8260033cddf25daddc2a664fe81043bf6f4d56bb88e41da30d3bb6027e34a85ece701ba0240f29208e76d587989'),
(47, 'apex2060', 'f41bc255d5cf76d0bc5c09546ab00b7955b8b523f3fd582b5326953ed73334bb796a6589f2954c89a6318df41824dfd3a00f094423c2acadbdc3fbc0518a36a0'),
(49, 'bund1', 'ada04dd8c5702153673e19a55571de8328f8fdb69086a5ec910d6cd189cb199b499bb7b5e81cbc6636a711c8e38733d43c647a00beb1e6e85724bc2d7fc0bb45'),
(54, 'siteadmin', '31deced7ef9fb6b255a8c93cd0ba4cee1789f750a92569e387f22c46f9a53383ceac6ae884b8bdd124eab5e825895697684de19798642b74de327eba8ce495b6'),
(55, 'jazzutah', '921eecca3a5855c80fe8595889874c1742935dc9b0c5dc4187801e8a52eea8f6a9f449b51332fc332cd66e0bec613b14fcdea2ec1a1d1b51a50288fc4173a299');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_categories`
--
ALTER TABLE `animal_categories`
  ADD CONSTRAINT `animal_categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `animal_categories` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `animal_info`
--
ALTER TABLE `animal_info`
  ADD CONSTRAINT `animal_info_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal_list` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animal_list`
--
ALTER TABLE `animal_list`
  ADD CONSTRAINT `animal_list_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `animal_categories` (`category_id`);

--
-- Constraints for table `animal_pictures`
--
ALTER TABLE `animal_pictures`
  ADD CONSTRAINT `animal_pictures_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal_list` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_pictures_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_list` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animal_sightings`
--
ALTER TABLE `animal_sightings`
  ADD CONSTRAINT `animal_sightings_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_list` (`user_id`),
  ADD CONSTRAINT `animal_sightings_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal_list` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_list` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
