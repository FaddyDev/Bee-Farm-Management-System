-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2016 at 10:49 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'Gashdem', '2016-07-03 13:01:57', 'Add User Liutenant'),
(2, 'Liutenant', '2016-09-08 12:25:22', 'Add User munene'),
(3, 'munene', '2016-09-08 16:32:26', 'Add equipment ffff'),
(4, 'Liutenant', '2016-09-10 15:31:31', 'Add equipment m mn  '),
(5, 'Liutenant', '2016-09-10 15:33:54', 'Add equipment kjdksjdkj'),
(6, 'Liutenant', '2016-09-10 15:51:26', 'Add equipment fff'),
(7, 'Liutenant', '2016-09-12 10:20:58', 'Add collection center  murungaru'),
(8, 'Liutenant', '2016-09-13 12:57:12', 'Add User Pato'),
(9, '', '2016-09-13 13:50:06', 'Add collection center  murungaru'),
(10, '', '2016-09-13 13:51:53', 'Add User Njambi'),
(11, 'munene', '2016-09-13 13:59:38', 'Add equipment Protective clothing'),
(12, 'munene', '2016-09-13 14:00:57', 'Add equipment BeeGinnersKit'),
(13, 'munene', '2016-09-13 14:02:05', 'Add equipment Top bar Hive'),
(14, 'munene', '2016-09-27 11:04:02', 'Add equipment slasher'),
(15, 'munene', '2016-09-27 11:43:18', 'Add equipment Top bar Hive'),
(16, 'munene', '2016-09-28 10:56:17', 'Add equipment Nyundo'),
(17, 'munene', '2016-09-28 11:35:07', 'Add equipment Nails'),
(18, 'munene', '2016-09-28 11:37:45', 'Add equipment Anti bee stings'),
(19, 'munene', '2016-09-28 11:40:18', 'Add equipment Bar hive'),
(20, 'munene', '2016-09-28 11:59:52', 'Add equipment Nails'),
(21, 'munene', '2016-10-07 12:12:54', 'Add equipment Bar hive'),
(22, 'munene', '2016-10-07 12:38:35', 'Add collection center  Ndunyu Njeru Flats'),
(23, 'munene', '2016-10-18 09:06:32', 'Add equipment Bar hive'),
(24, 'munene', '2016-10-18 09:44:30', 'Add equipment Bar hive'),
(25, 'munene', '2016-10-18 10:08:42', 'Add equipment bar hive'),
(26, 'munene', '2016-10-18 10:17:42', 'Add equipment bee ginners kit'),
(27, 'munene', '2016-10-18 10:49:56', 'Add equipment Bar hive'),
(28, 'munene', '2016-10-18 11:13:15', 'Add equipment naui'),
(29, 'munene', '2016-10-30 16:06:37', 'Edit User Patopatp'),
(30, 'munene', '2016-10-31 11:34:59', 'Add equipment bar hive'),
(31, 'munene', '2016-10-31 11:41:42', 'Add equipment Bar hive'),
(32, 'munene', '2016-11-02 12:13:39', 'Add equipment klk'),
(33, 'munene', '2016-11-02 12:19:11', 'Add equipment Flower'),
(34, 'munene', '2016-11-02 12:21:41', 'Add equipment Nails'),
(35, 'munene', '2016-11-02 12:23:20', 'Add equipment murungaru'),
(36, 'munene', '2016-11-02 12:25:00', 'Add equipment Bar hive'),
(37, 'munene', '2016-11-02 12:28:52', 'Add equipment Bar hive'),
(38, 'munene', '2016-11-02 15:04:36', 'Add equipment Bar hive'),
(39, 'munene', '2016-11-08 00:08:51', 'Add equipment Bar hive'),
(40, 'munene', '2016-11-08 00:14:19', 'Add equipment Protective clothing');

-- --------------------------------------------------------

--
-- Table structure for table `book_product`
--

CREATE TABLE IF NOT EXISTS `book_product` (
  `product_id` int(20) NOT NULL,
  `product` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `buyer_name` varchar(20) NOT NULL,
  `image` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unitprice` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `tatol` varchar(100) NOT NULL,
  `orderby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collection_center`
--

CREATE TABLE IF NOT EXISTS `collection_center` (
  `center_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `paybill` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection_center`
--

INSERT INTO `collection_center` (`center_id`, `name`, `location`, `phone`, `paybill`) VALUES
(4, 'Ndunyu Njeru Flats', 'Ngunyu Njeru Center', '0719487187', 234514),
(5, 'Ndunyu Njeru Flats', 'Ngunyu Njeru Center', '0719487188', 3254666);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `equipment_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_id`, `name`, `description`, `price`, `quantity`, `owner`, `image`, `date`) VALUES
(2, 'bee hive', 'house bees', 5000, 5, 'brian', '676_t.png', '11/01/2016'),
(3, 'fdg', 'fdg', 0, 0, 'dfg', 'phone2.png', '11/01/2016');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE IF NOT EXISTS `farmer` (
  `farmer_id` int(20) NOT NULL,
  `farmer_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `farmer_name`, `email`, `phone`, `location`, `description`) VALUES
(1, 'mukunya', 'mkuks@gmail.com', '2147483647', 'Nduberi', 'off nduberi road');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(20) NOT NULL,
  `product` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `orderby` varchar(100) NOT NULL,
  `ordertime` varchar(100) NOT NULL,
  `collection_center` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `product`, `quantity`, `orderby`, `ordertime`, `collection_center`) VALUES
(1, 'Bar hive', 4, 'br', '2016', 'Ndunyu Njeru Flats'),
(2, 'Bar hive', 1, 'br', '2016', 'Ndunyu Njeru Flats'),
(3, 'Protective clothing', 3, 'br', '2016', 'Ndunyu Njeru Flats'),
(4, 'Protective clothing', 2, 'br', '2016', 'Ndunyu Njeru Flats'),
(5, 'honey', 2, 'br', '2016', 'Ndunyu Njeru Flats'),
(6, 'Bar hive', 2, 'br', '2016', 'Ndunyu Njeru Flats'),
(7, 'honey', 2, 'br', '2016', 'Ndunyu Njeru Flats'),
(8, 'Bar hive', 1, 'br', '2016-11-12 12:38:39 am', 'Ndunyu Njeru Flats'),
(9, 'Bar hive', 1, 'brian', '2016-11-12 08:38:44 pm', 'Ndunyu Njeru Flats'),
(10, 'hbcvb', 3, 'br', '2016-11-12 10:46:21 pm', 'Ndunyu Njeru Flats');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `quantity`, `owner`, `image`, `location`) VALUES
(2, 'hbcvb', 'dfg', 55, 63, 'cvv', '906_lye_sm.png', 'bhfg'),
(3, 'fgrg', 'sdf', 0, 0, 'sdf', '387_t.png', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(10) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_address` varchar(20) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `phone`, `location`, `description`) VALUES
(13, 'Nyuki Suppliers Ltd', 'Nyukinyuki@gmail.com', '0719487189', 'Naivasha', 'Deals in bulky bee equipment'),
(14, 'brian', 'briam@gfgd', '343434', 'nyeri', 'fgfdrte');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `category`, `password`, `firstname`, `lastname`) VALUES
(3, 'munene', '', 'nesh', 'Dennis', 'Munene'),
(5, 'Njambi', '', 'siz', 'Njabi', 'Mukami'),
(6, 'br', 'Supplier', 'br', 'br', 'br');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'Gashdem', '2016-07-01 08:01:47', '2016-07-03 13:02:05', 1),
(2, 'Gashdem', '2016-07-01 08:19:08', '2016-07-03 13:02:05', 1),
(3, 'Gashdem', '2016-07-01 08:20:46', '2016-07-03 13:02:05', 1),
(4, 'Gashdem', '2016-07-01 09:14:56', '2016-07-03 13:02:05', 1),
(5, 'Gashdem', '2016-07-01 11:22:09', '2016-07-03 13:02:05', 1),
(6, 'Gashdem', '2016-07-03 12:48:28', '2016-07-03 13:02:05', 1),
(7, 'liutenant', '2016-07-03 13:02:17', '2016-09-12 18:31:10', 2),
(8, 'Gashdem', '2016-07-05 15:33:18', '', 1),
(9, 'Liutenant', '2016-09-01 20:56:00', '2016-09-12 18:31:10', 2),
(10, 'Liutenant', '2016-09-01 20:56:01', '2016-09-12 18:31:10', 2),
(11, 'liutenant', '2016-09-01 21:19:16', '2016-09-12 18:31:10', 2),
(12, 'liutenant', '2016-09-01 21:33:34', '2016-09-12 18:31:10', 2),
(13, 'liutenant', '2016-09-05 10:34:26', '2016-09-12 18:31:10', 2),
(14, 'liutenant', '2016-09-05 10:34:25', '2016-09-12 18:31:10', 2),
(15, 'liutenant', '2016-09-05 10:37:12', '2016-09-12 18:31:10', 2),
(16, 'liutenant', '2016-09-05 12:35:25', '2016-09-12 18:31:10', 2),
(17, 'liutenant', '2016-09-05 14:39:54', '2016-09-12 18:31:10', 2),
(18, 'liutenant', '2016-09-05 17:31:40', '2016-09-12 18:31:10', 2),
(19, 'liutenant', '2016-09-06 11:15:23', '2016-09-12 18:31:10', 2),
(20, 'liutenant', '2016-09-06 17:05:24', '2016-09-12 18:31:10', 2),
(21, 'liutenant', '2016-09-06 17:05:24', '2016-09-12 18:31:10', 2),
(22, 'liutenant', '2016-09-06 17:05:25', '2016-09-12 18:31:10', 2),
(23, 'liutenant', '2016-09-07 11:24:23', '2016-09-12 18:31:10', 2),
(24, 'liutenant', '2016-09-07 11:24:24', '2016-09-12 18:31:10', 2),
(25, 'liutenant', '2016-09-07 11:24:24', '2016-09-12 18:31:10', 2),
(26, 'liutenant', '2016-09-07 11:25:36', '2016-09-12 18:31:10', 2),
(27, 'liutenant', '2016-09-07 11:25:37', '2016-09-12 18:31:10', 2),
(28, 'Liutenant', '2016-09-07 14:31:05', '2016-09-12 18:31:10', 2),
(29, 'liutenant', '2016-09-07 14:31:33', '2016-09-12 18:31:10', 2),
(30, 'liutenant', '2016-09-07 14:31:34', '2016-09-12 18:31:10', 2),
(31, 'liutenant', '2016-09-07 14:53:25', '2016-09-12 18:31:10', 2),
(32, 'liutenant', '2016-09-07 15:07:43', '2016-09-12 18:31:10', 2),
(33, 'liutenant', '2016-09-07 20:58:01', '2016-09-12 18:31:10', 2),
(34, 'liutenant', '2016-09-07 20:58:03', '2016-09-12 18:31:10', 2),
(35, 'liutenant', '2016-09-07 21:40:51', '2016-09-12 18:31:10', 2),
(36, 'liutenant', '2016-09-07 21:48:34', '2016-09-12 18:31:10', 2),
(37, 'liutenant', '2016-09-08 12:00:06', '2016-09-12 18:31:10', 2),
(38, 'liutenant', '2016-09-08 12:24:47', '2016-09-12 18:31:10', 2),
(39, 'munene', '2016-09-08 12:25:57', '2016-11-01 14:54:36', 3),
(40, 'liutenant', '2016-09-08 16:48:37', '2016-09-12 18:31:10', 2),
(41, 'liutenant', '2016-09-09 15:01:46', '2016-09-12 18:31:10', 2),
(42, 'munene', '2016-09-09 15:02:11', '2016-11-01 14:54:36', 3),
(43, 'liutenant', '2016-09-09 17:34:49', '2016-09-12 18:31:10', 2),
(44, 'liutenant', '2016-09-09 22:04:44', '2016-09-12 18:31:10', 2),
(45, 'liutenant', '2016-09-09 22:04:55', '2016-09-12 18:31:10', 2),
(46, 'liutenant', '2016-09-09 22:05:33', '2016-09-12 18:31:10', 2),
(47, 'liutenant', '2016-09-10 14:56:54', '2016-09-12 18:31:10', 2),
(48, 'liutenant', '2016-09-10 23:09:48', '2016-09-12 18:31:10', 2),
(49, 'liutenant', '2016-09-10 23:22:09', '2016-09-12 18:31:10', 2),
(50, 'liutenant', '2016-09-10 23:27:13', '2016-09-12 18:31:10', 2),
(51, 'liutenant', '2016-09-10 23:43:57', '2016-09-12 18:31:10', 2),
(52, 'liutenant', '2016-09-11 19:10:10', '2016-09-12 18:31:10', 2),
(53, 'liutenant', '2016-09-12 09:30:12', '2016-09-12 18:31:10', 2),
(54, 'liutenant', '2016-09-12 15:20:02', '2016-09-12 18:31:10', 2),
(55, 'liutenant', '2016-09-12 17:21:39', '2016-09-12 18:31:10', 2),
(56, 'liutenant', '2016-09-12 18:31:16', '', 2),
(57, 'liutenant', '2016-09-12 23:51:09', '', 2),
(58, 'liutenant', '2016-09-12 23:57:31', '', 2),
(59, 'liutenant', '2016-09-13 00:11:29', '', 2),
(60, 'liutenant', '2016-09-13 11:39:54', '', 2),
(61, 'liutenant', '2016-09-13 12:59:03', '', 2),
(62, 'munene', '2016-09-13 13:56:18', '2016-11-01 14:54:36', 3),
(63, 'munene', '2016-09-13 13:57:12', '2016-11-01 14:54:36', 3),
(64, 'munene', '2016-09-13 14:48:58', '2016-11-01 14:54:36', 3),
(65, 'munene', '2016-09-13 16:23:31', '2016-11-01 14:54:36', 3),
(66, 'munene', '2016-09-17 13:27:53', '2016-11-01 14:54:36', 3),
(67, 'munene', '2016-09-17 14:07:36', '2016-11-01 14:54:36', 3),
(68, 'munene', '2016-09-19 09:23:34', '2016-11-01 14:54:36', 3),
(69, 'munene', '2016-09-19 10:48:15', '2016-11-01 14:54:36', 3),
(70, 'munene', '2016-09-19 15:11:53', '2016-11-01 14:54:36', 3),
(71, 'munene', '2016-09-22 11:05:55', '2016-11-01 14:54:36', 3),
(72, 'munene', '2016-09-22 11:05:59', '2016-11-01 14:54:36', 3),
(73, 'munene', '2016-09-23 14:00:42', '2016-11-01 14:54:36', 3),
(74, 'munene', '2016-09-27 10:40:47', '2016-11-01 14:54:36', 3),
(75, 'munene', '2016-09-28 09:12:50', '2016-11-01 14:54:36', 3),
(76, 'munene', '2016-09-28 09:12:52', '2016-11-01 14:54:36', 3),
(77, 'munene', '2016-09-28 10:29:45', '2016-11-01 14:54:36', 3),
(78, 'munene', '2016-09-28 10:32:22', '2016-11-01 14:54:36', 3),
(79, 'munene', '2016-09-28 10:39:22', '2016-11-01 14:54:36', 3),
(80, 'munene', '2016-10-04 16:07:54', '2016-11-01 14:54:36', 3),
(81, 'munene', '2016-10-07 11:09:17', '2016-11-01 14:54:36', 3),
(82, 'munene', '2016-10-07 11:11:36', '2016-11-01 14:54:36', 3),
(83, 'munene', '2016-10-11 10:28:22', '2016-11-01 14:54:36', 3),
(84, 'munene', '2016-10-11 10:43:50', '2016-11-01 14:54:36', 3),
(85, 'munene', '2016-10-11 11:20:01', '2016-11-01 14:54:36', 3),
(86, 'munene', '2016-10-11 12:10:12', '2016-11-01 14:54:36', 3),
(87, 'munene', '2016-10-11 12:10:13', '2016-11-01 14:54:36', 3),
(88, 'munene', '2016-10-11 12:34:18', '2016-11-01 14:54:36', 3),
(89, 'munene', '2016-10-11 18:16:07', '2016-11-01 14:54:36', 3),
(90, 'munene', '2016-10-13 15:59:26', '2016-11-01 14:54:36', 3),
(91, 'munene', '2016-10-13 15:59:27', '2016-11-01 14:54:36', 3),
(92, 'munene', '2016-10-13 15:59:27', '2016-11-01 14:54:36', 3),
(93, 'munene', '2016-10-13 15:59:28', '2016-11-01 14:54:36', 3),
(94, 'munene', '2016-10-13 15:59:28', '2016-11-01 14:54:36', 3),
(95, 'munene', '2016-10-13 15:59:28', '2016-11-01 14:54:36', 3),
(96, 'munene', '2016-10-13 15:59:28', '2016-11-01 14:54:36', 3),
(97, 'munene', '2016-10-13 15:59:28', '2016-11-01 14:54:36', 3),
(98, 'munene', '2016-10-13 15:59:29', '2016-11-01 14:54:36', 3),
(99, 'munene', '2016-10-13 15:59:29', '2016-11-01 14:54:36', 3),
(100, 'munene', '2016-10-13 15:59:29', '2016-11-01 14:54:36', 3),
(101, 'munene', '2016-10-17 15:47:04', '2016-11-01 14:54:36', 3),
(102, 'munene', '2016-10-17 16:28:58', '2016-11-01 14:54:36', 3),
(103, 'munene', '2016-10-17 16:48:46', '2016-11-01 14:54:36', 3),
(104, 'munene', '2016-10-18 08:56:40', '2016-11-01 14:54:36', 3),
(105, 'munene', '2016-10-24 11:50:36', '2016-11-01 14:54:36', 3),
(106, 'munene', '2016-10-24 13:18:11', '2016-11-01 14:54:36', 3),
(107, 'munene', '2016-10-26 13:32:07', '2016-11-01 14:54:36', 3),
(108, 'munene', '2016-10-26 15:12:15', '2016-11-01 14:54:36', 3),
(109, 'munene', '2016-10-26 15:12:16', '2016-11-01 14:54:36', 3),
(110, 'munene', '2016-10-30 14:05:35', '2016-11-01 14:54:36', 3),
(111, 'munene', '2016-11-01 14:47:01', '2016-11-01 14:54:36', 3),
(112, 'munene', '2016-11-01 14:51:46', '2016-11-01 14:54:36', 3),
(113, 'munene', '2016-11-01 14:53:02', '2016-11-01 14:54:36', 3),
(114, 'munene', '2016-11-01 14:54:46', '', 3),
(115, 'munene', '2016-11-03 16:39:56', '', 3),
(116, 'munene', '2016-11-04 09:29:05', '', 3),
(117, 'munene', '2016-11-04 12:29:00', '', 3),
(118, 'munene', '2016-11-06 02:24:15', '', 3),
(119, 'munene', '2016-11-08 00:07:13', '', 3),
(120, 'munene', '2016-11-08 00:38:31', '', 3),
(121, 'br', '2016-11-11 15:52:49', '', 6),
(122, 'brian', '2016-11-12 11:39:39', '', 7),
(123, 'brian', '2016-11-12 12:13:02', '', 7),
(124, 'br', '2016-11-12 12:28:56', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `vieworders`
--

CREATE TABLE IF NOT EXISTS `vieworders` (
  `order_id` int(20) NOT NULL,
  `order_date` date NOT NULL,
  `equipment` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `farmer_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `book_product`
--
ALTER TABLE `book_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `collection_center`
--
ALTER TABLE `collection_center`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `book_product`
--
ALTER TABLE `book_product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collection_center`
--
ALTER TABLE `collection_center`
  MODIFY `center_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farmer_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
