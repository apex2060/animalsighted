-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2013 at 07:28 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='ie. Bears, fish, birds, etc' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `animal_categories`
--

INSERT INTO `animal_categories` (`category_id`, `parent_id`, `category`) VALUES
(1, NULL, 'Bears'),
(2, NULL, 'Birds'),
(3, NULL, 'Fish'),
(4, NULL, 'Reptiles');

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
(5, '', 'http://www.nps.gov/upde/images/20071004132605.jpg'),
(7, '', 'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Dolphin_leap.JPG/1021px-Dolphin_leap.JPG'),
(8, '', 'http://upload.wikimedia.org/wikipedia/commons/1/13/Indian_Garden_Lizard_Calotes_versicolor_W2_IMG_6829.jpg'),
(11, 'Starfish or sea stars are echinoderms belonging to the class Asteroidea. The names &#34;starfish&#34; and &#34;sea star&#34; essentially refer to members of the class Asteroidea. -Wikipedia', 'http://upload.wikimedia.org/wikipedia/commons/4/4e/Starfish.JPG'),
(12, '', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Longtail_salamander_eurycea_longicauda.jpg/1024px-Longtail_salamander_eurycea_longicauda.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `animal_list`
--

INSERT INTO `animal_list` (`animal_id`, `category_id`, `picture_id`, `name`) VALUES
(4, 1, NULL, 'Grizzly Bear'),
(5, 2, 1, 'Bald Eagle'),
(7, 3, 3, 'Dolphin'),
(8, 4, NULL, 'Lizard'),
(11, 3, NULL, 'Star Fish'),
(12, 4, NULL, 'Salamander');

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

--
-- Dumping data for table `animal_pictures`
--

INSERT INTO `animal_pictures` (`picture_id`, `animal_id`, `user_id`, `src`, `title`, `caption`, `created_on`) VALUES
(1, 5, 21, 'http://www.nps.gov/upde/images/20071004132605.jpg', 'A neat bird', 'NPS', '2013-03-29 05:34:41'),
(3, 7, 21, 'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Dolphin_leap.JPG/1021px-Dolphin_leap.JPG', '', '', '2013-03-29 13:59:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `animal_sightings`
--

INSERT INTO `animal_sightings` (`sighting_id`, `animal_id`, `user_id`, `lat`, `lng`, `note`, `created_on`) VALUES
(4, 4, 21, 43.826771, -111.776131, 'It was cool', '2013-03-29 05:21:41'),
(5, 5, 21, 43.826771, -111.776131, 'Wish that were in Yellowstone!', '2013-03-29 05:23:53'),
(8, 7, 21, 43.826790, -111.776123, 'And it was quite the experience!', '2013-03-29 13:45:57'),
(9, 8, 21, 43.826763, -111.776154, 'itty bitty one', '2013-03-29 16:54:26'),
(11, 8, 23, 43.819103, -111.781349, '', '2013-03-29 20:03:15'),
(13, 7, 23, 43.819103, -111.781349, '', '2013-03-29 20:05:40'),
(14, 11, 21, 43.818420, -111.782669, '', '2013-03-29 21:40:01'),
(15, 12, 21, 43.818398, -111.782677, '', '2013-03-29 21:41:58');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='What animal and where did they see it' AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `auth`, `created_on`) VALUES
(21, 'Ryan', 'Quinlan', 'apex2060@gmail.com', 1, '2013-03-25 13:18:42'),
(22, 'Simon', 'cit336', 'bun11003@yahoo.com', 1, '2013-03-25 20:25:08'),
(23, 'MJ ', 'LaFond', 'lafondfam@gmail.com', 1, '2013-03-29 20:00:31'),
(24, 'Clifford', 'Solomon', 'cliffordsolomon@gmail.com', 1, '2013-03-29 20:00:39'),
(25, 'Matt', 'Spencer', 'spe08009@byui.edu', 0, '2013-03-29 20:03:52'),
(28, 'Simon', 'bund1', 'bund1@yahoo.com', 0, '2013-03-29 20:15:56');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`user_id`, `username`, `password`) VALUES
(21, 'apex2060', 'f41bc255d5cf76d0bc5c09546ab00b7955b8b523f3fd582b5326953ed73334bbd8d55dbdf3fe21287c7e4e8eff8cbc43e34f447ae138599f29a970b72e702162'),
(22, 'bun11', '241e1a59b9716a22e1b6b55414c84893f3a38982a12a6f8a49cc040a0ec7c33fa35b9f43c426fb6ea35a6665292be44690c2da4ef522d80c0064d47f1f6fe71f'),
(23, 'lafondfam', '55df6b882afee6b29f8809551614a2c2ec5e1a80a3392528cc5773a09cd7a896688054d9621cc114fb964c6c97dae9e3fcd7caf7edc183d3cc92af709c773b9d'),
(24, 'cliff', '0678af70b12e5bb45b8f0839aac4e82205f07977eed1ff0f2a24f35c09bbcc0e63bc6ae13c172cec53f7fa9c900bebef7be4ab2cff5fba055125f909a6f57c68'),
(25, 'Matt_Spencer', '8028f51fa0c2c2e3d1a8a9077ecfeab751fae8260033cddf25daddc2a664fe81043bf6f4d56bb88e41da30d3bb6027e34a85ece701ba0240f29208e76d587989'),
(28, 'bund1', 'ada04dd8c5702153673e19a55571de8328f8fdb69086a5ec910d6cd189cb199b3a3fc8b6844f3edbae11c28cee594ae5c18441c4826af1177cddf8aa73b6fb1e');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE IF NOT EXISTS `user_permissions` (
  `permission_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`permission_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `animal_sightings_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal_list` (`animal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_sightings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_list` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_list` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_list` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
