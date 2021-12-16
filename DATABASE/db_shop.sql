-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 03:04 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `username`, `email`, `password`, `level`) VALUES
(1, 'Jesan Ahmed', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Acer'),
(2, 'Samsung'),
(3, 'Iphone'),
(6, 'Canon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `producttName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Jewelery'),
(4, 'Footwear'),
(5, 'Sports &amp; Fitness'),
(6, 'Software'),
(7, 'Accessories'),
(8, 'Mobile Phone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `customerId`, `productId`, `productName`, `price`, `image`) VALUES
(1, 1, 13, 'Lorem Ipsum is simply', 78000.00, 'uploads/9746a39a2a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'Jisan Ahmed', 'Kachua,Chandpur', 'Chandpur', 'Bangladesh', 3240, '01782479521', 'jisan@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `producttName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `producttName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(2, 'IPHONE', 8, 3, '<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>&nbsp;</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>', 20000.00, 'uploads/678edba326.png', 0),
(3, 'Lorem Ipsum is simply', 7, 6, '<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>&nbsp;</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>', 1700.00, 'uploads/730680f6ca.jpg', 0),
(4, 'ACER', 1, 1, '<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>&nbsp;</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>\r\n<p>Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.Product Details Will be go here.</p>', 38000.00, 'uploads/1f1f1bfef1.jpg', 0),
(5, 'Lorem Ipsum is simply', 7, 6, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 40000.00, 'uploads/854097cf18.jpg', 0),
(6, 'Lorem Ipsum is simply', 7, 1, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 23000.00, 'uploads/64f712cbf1.jpg', 1),
(7, 'Lorem Ipsum is simply', 8, 3, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 460000.00, 'uploads/442e2068d8.jpg', 1),
(11, 'Lorem Ipsum is simply', 7, 1, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 890.00, 'uploads/64a5fb5d3d.jpg', 1),
(12, 'Lorem Ipsum is simply', 8, 2, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 29000.00, 'uploads/5f4342bd6b.jpg', 0),
(13, 'Lorem Ipsum is simply', 8, 3, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 78000.00, 'uploads/9746a39a2a.jpeg', 0),
(14, 'Lorem Ipsum is simply', 2, 1, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 39000.00, 'uploads/95f99fcf58.jpg', 0),
(15, 'Lorem Ipsum is simply', 2, 1, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 40000.00, 'uploads/cb04f1399e.jpg', 0),
(16, 'Lorem Ipsum is simply', 1, 2, '<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>\r\n<p>Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.Lorem Ipsum is simply.</p>', 76000.00, 'uploads/3c34ea20bb.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `customerId`, `productId`, `productName`, `price`, `image`) VALUES
(5, 1, 15, 'Lorem Ipsum is simply', 40000.00, 'uploads/cb04f1399e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
