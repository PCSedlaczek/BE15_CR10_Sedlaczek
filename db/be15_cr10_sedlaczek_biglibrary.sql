-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 06:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be15_cr10_sedlaczek_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be15_cr10_sedlaczek_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be15_cr10_sedlaczek_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `type` enum('Paperback','Hardcover','Audiobook','eBook','eAudio','CD','DVD','CD-ROM','Magazine') DEFAULT NULL,
  `ISBN` varchar(13) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `subtitle` varchar(50) DEFAULT NULL,
  `series` varchar(50) DEFAULT NULL,
  `part` int(3) DEFAULT NULL,
  `author_first_name` varchar(35) DEFAULT NULL,
  `author_last_name` varchar(35) DEFAULT NULL,
  `publisher_name` varchar(50) DEFAULT NULL,
  `publisher_city` varchar(45) DEFAULT NULL,
  `edition_date` date DEFAULT NULL,
  `edition_year` year(4) DEFAULT NULL,
  `publish_year` year(4) DEFAULT NULL,
  `pages` int(6) DEFAULT NULL,
  `length` time DEFAULT NULL,
  `version` enum('Unabridged','Abridged','Adapted') DEFAULT NULL,
  `narrator` varchar(50) DEFAULT NULL,
  `genre` set('Fiction','Children','Middle Grade','Young Adult','Fantasy','Adventure','Magic','Coming of Age','Asian','Folklore','Nonfiction','Psychology','Memoir','Animals','Self Help','Programming') DEFAULT NULL,
  `language` enum('English','French','German','Spanish','Irish') DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `image` varchar(17) DEFAULT NULL,
  `status` enum('Available','Borrowed','In Transit','Reserved','Missing') DEFAULT 'Available',
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `ISBN`, `title`, `subtitle`, `series`, `part`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_city`, `edition_date`, `edition_year`, `publish_year`, `pages`, `length`, `version`, `narrator`, `genre`, `language`, `description`, `image`, `status`, `due_date`) VALUES
(1, 'eBook', '9781781100219', 'Harry Potter and the Philosopher\'s Stone', NULL, 'Harry Potter', 1, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-12-08', 2015, 1997, 353, NULL, NULL, NULL, 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781100219.jpg', 'Available', NULL),
(2, 'eBook', '9781781100226', 'Harry Potter and the Chamber of Secrets', NULL, 'Harry Potter', 2, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-12-08', 2015, 1998, 357, NULL, NULL, NULL, 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781100226.jpg', 'Available', NULL),
(3, 'eBook', '9781781100233', 'Harry Potter and the Prisoner of Azkaban', NULL, 'Harry Potter', 3, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-12-08', 2015, 1999, 435, NULL, NULL, NULL, 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781100233.jpg', 'Available', NULL),
(4, 'eBook', '9781781105672', 'Harry Potter and the Goblet of Fire', NULL, 'Harry Potter', 4, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-12-08', 2015, 2000, 734, NULL, NULL, NULL, 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781105672.jpg', 'Available', NULL),
(5, 'eBook', '9781781100240', 'Harry Potter and the Order of the Phoenix', NULL, 'Harry Potter', 5, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-12-08', 2015, 2003, 901, NULL, NULL, NULL, 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781100240.jpg', 'Available', NULL),
(6, 'eBook', '9781781100257', 'Harry Potter and the Half-Blood Prince', NULL, 'Harry Potter', 6, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-12-08', 2015, 2005, 672, NULL, NULL, NULL, 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781100257.jpg', 'Available', NULL),
(7, 'eBook', '9781781100264', 'Harry Potter and the Deathly Hallows', NULL, 'Harry Potter', 7, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-12-08', 2015, 2007, 784, NULL, NULL, NULL, 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781100264.jpg', 'Available', NULL),
(8, 'Audiobook', '9781781102367', 'Harry Potter and the Philosopher\'s Stone', NULL, 'Harry Potter', 1, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-11-20', 2015, 1997, NULL, '09:33:00', 'Unabridged', 'Stephen Fry', 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781102367.jpg', 'Available', NULL),
(9, 'Audiobook', '9781781102374', 'Harry Potter and the Chamber of Secrets', NULL, 'Harry Potter', 2, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-11-20', 2015, 1998, NULL, '11:05:00', 'Unabridged', 'Stephen Fry', 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781102374.jpg', 'Available', NULL),
(10, 'Audiobook', '9781781102381', 'Harry Potter and the Prisoner of Azkaban', NULL, 'Harry Potter', 3, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-11-20', 2015, 1999, NULL, '13:10:00', 'Unabridged', 'Stephen Fry', 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781102381.jpg', 'Available', NULL),
(11, 'Audiobook', '9781781102398', 'Harry Potter and the Goblet of Fire', NULL, 'Harry Potter', 4, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-11-20', 2015, 2000, NULL, '22:17:00', 'Unabridged', 'Stephen Fry', 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781102398.jpg', 'Available', NULL),
(12, 'Audiobook', '9781781102404', 'Harry Potter and the Order of the Phoenix', NULL, 'Harry Potter', 5, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-11-20', 2015, 2003, NULL, '30:18:00', 'Unabridged', 'Stephen Fry', 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781102404.jpg', 'Available', NULL),
(13, 'Audiobook', '9781781102411', 'Harry Potter and the Half-Blood Prince', NULL, 'Harry Potter', 6, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-11-20', 2015, 2005, NULL, '21:27:00', 'Unabridged', 'Stephen Fry', 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781102411.jpg', 'Available', NULL),
(14, 'Audiobook', '9781781102428', 'Harry Potter and the Deathly Hallows', NULL, 'Harry Potter', 7, 'Joanne K.', 'Rowling', 'Pottermore Publishing', 'London', '2015-11-20', 2015, 2007, NULL, '24:00:00', 'Unabridged', 'Stephen Fry', 'Fiction,Young Adult,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9781781102428.jpg', 'Available', NULL),
(15, 'eBook', '9780316052603', 'Where the Mountain Meets the Moon', NULL, 'Moon Trilogy', 1, 'Grace', 'Lin', 'Little, Brown Books for Young Readers', 'New York', '2009-07-01', 2009, 2009, 288, NULL, NULL, NULL, 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9780316052603.jpg', 'Available', NULL),
(16, 'eBook', '9780316215534', 'Starry River of the Sky', NULL, 'Moon Trilogy', 2, 'Grace', 'Lin', 'Little, Brown Books for Young Readers', 'New York', '2012-10-02', 2012, 2012, 304, NULL, NULL, NULL, 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9780316215534.jpg', 'Available', NULL),
(17, 'eBook', '9780316317696', 'When the Sea Turned to Silver', NULL, 'Moon Trilogy', 3, 'Grace', 'Lin', 'Little, Brown Books for Young Readers', 'New York', '2016-10-04', 2016, 2016, 368, NULL, NULL, NULL, 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9780316317696.jpg', 'Available', NULL),
(18, 'Paperback', '9780316038638', 'Where the Mountain Meets the Moon', NULL, 'Moon Trilogy', 1, 'Grace', 'Lin', 'Little, Brown Books for Young Readers', 'New York', '2012-04-12', 2012, 2009, 320, NULL, NULL, NULL, 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9780316038638.jpg', 'Available', NULL),
(19, 'Paperback', '9780316125970', 'Starry River of the Sky', NULL, 'Moon Trilogy', 2, 'Grace', 'Lin', 'Little, Brown Books for Young Readers', 'New York', '2014-02-11', 2014, 2012, 320, NULL, NULL, NULL, 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9780316125970.jpg', 'Available', NULL),
(20, 'Paperback', '9780316125949', 'When the Sea Turned to Silver', NULL, 'Moon Trilogy', 3, 'Grace', 'Lin', 'Little, Brown Books for Young Readers', 'New York', '2017-09-05', 2017, 2016, 400, NULL, NULL, NULL, 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9780316125949.jpg', 'Available', NULL),
(21, 'Audiobook', '9781549187247', 'Where the Mountain Meets the Moon', NULL, 'Moon Trilogy', 1, 'Grace', 'Lin', 'Hachette Audio', 'New York', '2020-06-16', 2020, 2009, NULL, '04:58:00', 'Unabridged', 'Janet Song', 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9781549187247.jpg', 'Available', NULL),
(22, 'Audiobook', '9781619691476', 'Starry River of the Sky', NULL, 'Moon Trilogy', 2, 'Grace', 'Lin', 'Hachette Audio', 'New York', '2012-10-02', 2012, 2012, NULL, '05:25:00', 'Unabridged', 'Kim Mai Guest', 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9781619691476.jpg', 'Available', NULL),
(23, 'Audiobook', '9781478912545', 'When the Sea Turned to Silver', NULL, 'Moon Trilogy', 3, 'Grace', 'Lin', 'Hachette Audio', 'New York', '2016-10-04', 2016, 2016, NULL, '07:37:00', 'Unabridged', 'Kim Mai Guest', 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Asian,Folklore', 'English', NULL, '9781478912545.jpg', 'Available', NULL),
(24, 'Paperback', '9780956868480', 'Iron Knights', 'Putting the Evil back into Medieval', NULL, NULL, 'Robin', 'Bennett', 'Monster Books', 'Henley-on-Thames', '2020-10-01', 2020, 2013, 230, NULL, NULL, NULL, 'Fiction,Middle Grade,Fantasy,Adventure,Magic,Coming of Age', 'English', NULL, '9780956868480.jpg', 'Available', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
