-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2023 at 05:29 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat`(IN `cid` INT)
SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'motorolla'),
(5, 'LG'),
(6, 'Cloth Brand'),
(7, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(1, 85, '::1', 28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronics'),
(2, 'Ladies Wears'),
(3, 'Mens Wear'),
(4, 'Kids Wear'),
(5, 'Furnitures'),
(6, 'Home Appliances'),
(7, 'Electronics Gadgets'),
(8, 'Foods');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE IF NOT EXISTS `email_info` (
  `email_id` int(100) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(3, 'admin@gmail.com'),
(4, 'puneethreddy951@gmail.com'),
(5, 'puneethreddy@gmail.com'),
(6, 'buruko9489@gmail.com'),
(7, '123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`, `time`) VALUES
(90, 30, 87, 3, 'TRANSID-63B6D13B57A67', 'Completed', '2023-01-05'),
(91, 30, 1, 1, 'TRANSID-63B6DD4F0570C', 'Completed', '2023-01-05'),
(92, 30, 3, 1, 'TRANSID-63B6DD4F0570C', 'Completed', '2023-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE IF NOT EXISTS `orders_info` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`, `product_id`) VALUES
(1, 30, 'Frederick Razo', 'razofrederick8@gmail.com', '#1 schultz st. brgy.123', 'Alaminos', 'Philippines', 485167, 'none', '00000', '12/22', 1, 15, 0, 0),
(2, 30, 'Frederick Razo', 'razofrederick8@gmail.com', '#1 schultz st. brgy.123', 'Alaminos', 'pH', 215445, 'none', '00000', '12/22', 2, 35000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
  `order_pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL,
  `sellerid` int(32) NOT NULL,
  PRIMARY KEY (`order_pro_id`),
  KEY `order_products` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`, `sellerid`) VALUES
(151, 1, 87, 3, 45, 21),
(152, 2, 1, 1, 5000, 22),
(153, 2, 3, 1, 30000, 22);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `sellerid` int(32) NOT NULL,
  `stock` int(32) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `sellerid`, `stock`) VALUES
(1, 1, 2, 'Samsung galaxy s7 edge', 5000, 'Samsung galaxy s7 edge', 'image/product07.png', 'samsung mobile electronics', 22, 998),
(3, 1, 3, 'iPad air 2', 30000, 'ipad apple brand', 'image/da4371ffa192a115f922b1c0dff88193.png', 'apple ipad tablet', 22, 999),
(5, 1, 2, 'iPad 2', 10000, 'samsung ipad', 'image/iPad-air.png', 'ipad tablet samsung', 22, 1000),
(6, 1, 1, 'samsung Laptop r series', 35000, 'samsung Black combination Laptop', 'image/laptop_PNG5939.png', 'samsung laptop ', 22, 1000),
(7, 1, 1, 'Laptop Pavillion', 50000, 'Laptop Hp Pavillion', 'image/laptop_PNG5930.png', 'Laptop Hp Pavillion', 22, 1000),
(8, 1, 4, 'Sony', 40000, 'Sony Mobile', 'image/530201353846AM_635_sony_xperia_z.png', 'sony mobile', 22, 1000),
(9, 1, 3, 'iPhone New', 12000, 'iphone', 'image/iphone-hd-png-iphone-apple-png-file-550.png', 'iphone apple mobile', 22, 1000),
(10, 2, 6, 'Red Ladies dress', 1000, 'red dress for girls', 'image/red dress.jpg', 'red dress ', 24, 1000),
(12, 2, 6, 'Ladies Casual Cloths', 1500, 'ladies casual summer two colors pleted', 'image/7475-ladies-casual-dresses-summer-two-colors-pleated.jpg', 'girl dress cloths casual', 24, 1000),
(13, 2, 6, 'SpringAutumnDress', 1200, 'girls dress', 'image/Spring-Autumn-Winter-Young-Ladies-Casual-Wool-Dress-Women-s-One-Piece-Dresse-Dating-Clothes-Medium.jpg_640x640.jpg', 'girl dress', 24, 1000),
(15, 2, 6, 'Formal Look', 1500, 'girl dress', 'image/shutterstock_203611819.jpg', 'image/ladies wears dress girl', 24, 1000),
(16, 3, 6, 'Sweter for men', 600, '2012-Winter-Sweater-for-Men-for-better-outlook', 'image/2012-Winter-Sweater-for-Men-for-better-outlook.jpg', 'black sweter cloth winter', 24, 1000),
(17, 3, 6, 'Gents formal', 1000, 'gents formal look', 'image/gents-formal-250x250.jpg', 'gents wear cloths', 24, 1000),
(22, 4, 6, 'Yellow T shirt ', 1300, 'yello t shirt with pant', 'image/1.0x0.jpg', 'kids yellow t shirt', 24, 1000),
(32, 5, 0, 'Book Shelf', 2500, 'book shelf', 'image/furniture-book-shelf-250x250.jpg', 'book shelf furniture', 23, 1000),
(33, 6, 2, 'Refrigerator', 35000, 'Refrigerator', 'image/CT_WM_BTS-BTC-AppliancesHome_20150723.jpg', 'refrigerator samsung', 23, 1000),
(34, 6, 4, 'Emergency Light', 1000, 'Emergency Light', 'image/emergency light.JPG', 'emergency light', 23, 1000),
(39, 6, 5, 'Mixer Grinder', 2500, 'Mixer Grinder', 'image/singer-mixer-grinder-mg-46-medium_4bfa018096c25dec7ba0af40662856ef.jpg', 'Mixer Grinder', 23, 1000),
(40, 2, 6, 'Formal girls dress', 3000, 'Formal girls dress', 'image/girl-walking.jpg', 'ladies', 24, 1000),
(50, 3, 6, 'boys shirts', 350, 'shirts', 'image/pm1.JPG', 'suit boys shirts', 24, 1000),
(51, 3, 6, 'boys shirts', 270, 'shirts', 'image/pm2.JPG', 'suit boys shirts', 24, 1000),
(52, 3, 6, 'boys shirts', 453, 'shirts', 'image/pm3.JPG', 'suit boys shirts', 24, 1000),
(56, 3, 6, 'boys shirts', 299, 'shirts', 'image/pm7.JPG', 'suit boys shirts', 24, 1000),
(58, 3, 6, 'boys shirts', 350, 'shirts', 'image/pm9.JPG', 'suit boys shirts', 24, 1000),
(59, 3, 6, 'boys shirts', 855, 'shirts', 'image/a2.JPG', 'suit boys shirts', 24, 1000),
(60, 3, 6, 'boys shirts', 150, 'shirts', 'image/pm11.JPG', 'suit boys shirts', 24, 1000),
(61, 3, 6, 'boys shirts', 215, 'shirts', 'image/pm12.JPG', 'suit boys shirts', 24, 1000),
(62, 3, 6, 'boys shirts', 299, 'shirts', 'image/pm13.JPG', 'suit boys shirts', 24, 1000),
(63, 3, 6, 'boys Jeans Pant', 550, 'Pants', 'image/pt1.JPG', 'boys Jeans Pant', 24, 1000),
(64, 3, 6, 'boys Jeans Pant', 460, 'pants', 'image/pt2.JPG', 'boys Jeans Pant', 24, 1000),
(65, 3, 6, 'boys Jeans Pant', 470, 'pants', 'image/pt3.JPG', 'boys Jeans Pant', 24, 1000),
(66, 3, 6, 'boys Jeans Pant', 480, 'pants', 'image/pt4.JPG', 'boys Jeans Pant', 24, 1000),
(67, 3, 6, 'boys Jeans Pant', 360, 'pants', 'image/pt5.JPG', 'boys Jeans Pant', 24, 1000),
(68, 3, 6, 'boys Jeans Pant', 550, 'pants', 'image/pt6.JPG', 'boys Jeans Pant', 24, 1000),
(69, 3, 6, 'boys Jeans Pant', 390, 'pants', 'image/pt7.JPG', 'boys Jeans Pant', 24, 1000),
(70, 3, 6, 'boys Jeans Pant', 399, 'pants', 'image/pt8.JPG', 'boys Jeans Pant', 24, 1000),
(71, 1, 2, 'Samsung galaxy s7', 5000, 'Samsung galaxy s7', 'image/product07.png', 'samsung mobile electronics', 22, 1000),
(72, 7, 2, 'sony Headphones', 3500, 'sony Headphones', 'image/product02.png', 'sony Headphones electronics gadgets', 22, 1000),
(73, 7, 2, 'samsung Headphones', 3500, 'samsung Headphones', 'image/product05.png', 'samsung Headphones electronics gadgets', 22, 1000),
(74, 1, 1, 'HP i5 laptop', 5500, 'HP i5 laptop', 'image/product01.png', 'HP i5 laptop electronics', 22, 1000),
(75, 1, 1, 'HP i7 laptop 8gb ram', 5500, 'HP i7 laptop 8gb ram', 'image/product03.png', 'HP i7 laptop 8gb ram electronics', 22, 1000),
(76, 1, 5, 'sony note 6gb ram', 4500, 'sony note 6gb ram', 'image/product04.png', 'sony note 6gb ram mobile electronics', 22, 1000),
(77, 1, 4, 'MSV laptop 16gb ram NVIDEA Graphics', 5499, 'MSV laptop 16gb ram', 'image/product06.png', 'MSV laptop 16gb ram NVIDEA Graphics electronics', 22, 1000),
(78, 1, 5, 'dell laptop 8gb ram intel integerated Graphics', 4579, 'dell laptop 8gb ram intel integerated Graphics', 'image/product08.png', 'dell laptop 8gb ram intel integerated Graphics electronics', 22, 1000),
(79, 7, 2, 'camera with 3D pixels', 2569, 'camera with 3D pixels', 'image/product09.png', 'camera with 3D pixels camera electronics gadgets', 22, 1000),
(87, 8, 7, 'Apas', 5, 'Apas are oblong-shaped biscuits that are topped with sugar. Apas biscuits are a part of Filipino cuisine.', 'image/Apas.jpg', 'Apas', 21, 997),
(88, 8, 7, 'Butter Toast', 5, 'Buttered toast is a twice-baked bread common in the Philippines. It is a crustless bread smothered with butter, sprinkled with sugar (or topped with garlic), cut into squares, and toasted until golden.', 'image/Butter Toast.jpg', 'Butter Toast', 21, 1000),
(89, 8, 7, 'Cookies Haba', 5, 'A cookie is a baked or cooked  in oval shape. It always best in snack or dessert that is typically small, flat and sweet. It usually contains flour, sugar, egg, and some type of oil, fat, or butter.', 'image/cookies haba.jpg', 'Cookies Haba', 21, 1000),
(90, 8, 7, 'Otap', 5, 'Otap (sometimes spelled utap) is an oval-shaped puff pastry cookie from the Philippines. It usually consists of a combination of flour, shortening, coconut, and sugar.', 'image/Otap.jpg', 'Otap', 21, 1000),
(91, 8, 7, 'Ogoy', 5, 'Ugoy-ugoy, also spelled ogoy-ogoy, are Filipino layered biscuits. They are typically rectangular or ribbon-like in shape and are topped with granulated sugar.', 'image/ogoy.jpg', 'ogoy', 21, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `name`, `description`, `location`, `profileImage`) VALUES
(23, 'Jenna', '202cb962ac59075b964b07152d234b70', 'Furniture and Appliances Shop', 'Furniture for our comfortable lives, for storage, sitting on and, for relaxation and appliances help you perform household chores with ease', 'Bagyo Yung may signal City Philippines', 'ph.png'),
(22, 'kyla', '202cb962ac59075b964b07152d234b70', 'Electronics Shop', 'A retail establishment used for the selling electronic products such as  telephones and personal computers.', 'GTA San Andreas Alaminos Laguna', 'dl.png'),
(21, 'Frederick', '202cb962ac59075b964b07152d234b70', 'Pisano Shop', '', 'Brgy. Pook, Rizal, Laguna', 'logo2.png'),
(24, 'Berna', '202cb962ac59075b964b07152d234b70', 'Berna Clothing Shop', 'What you wear is how you present yourself to the world, especially today, when human contacts are so quick. Fashion is instant language', 'SaDiMatagpuangLugar St. SPC Laguna', 'da.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(30, 'Frederick', 'Razo', 'razofrederick8@gmail.com', '202cb962ac59075b964b07152d234b70', '0910943884', '#1 schultz st. brgy.123', 'Alaminos');

--
-- Triggers `user_info`
--
DROP TRIGGER IF EXISTS `after_user_info_insert`;
DELIMITER //
CREATE TRIGGER `after_user_info_insert` AFTER INSERT ON `user_info`
 FOR EACH ROW BEGIN 
INSERT INTO user_info_backup VALUES(new.user_id,new.first_name,new.last_name,new.email,new.password,new.mobile,new.address1,new.address2);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_backup`
--

CREATE TABLE IF NOT EXISTS `user_info_backup` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user_info_backup`
--

INSERT INTO `user_info_backup` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(30, 'Frederick', 'Razo', 'razofrederick8@gmail.com', '202cb962ac59075b964b07152d234b70', '0910943884', '#1 schultz st. brgy.123', 'Alaminos');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`order_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
