-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 16, 2023 at 04:45 AM
-- Server version: 5.7.36
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `do_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `c_name`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept`
--

DROP TABLE IF EXISTS `tbl_dept`;
CREATE TABLE IF NOT EXISTS `tbl_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_dept`
--

INSERT INTO `tbl_dept` (`id`, `d_name`) VALUES
(1, 'All'),
(2, 'OSDS'),
(3, 'CID'),
(4, 'SGOD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_office`
--

DROP TABLE IF EXISTS `tbl_office`;
CREATE TABLE IF NOT EXISTS `tbl_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_office`
--

INSERT INTO `tbl_office` (`id`, `o_name`) VALUES
(1, 'Accounting'),
(2, 'Administrative Services'),
(3, 'Budget'),
(4, 'Cash'),
(5, 'Legal Services'),
(6, 'SHN'),
(7, 'Personnel Section'),
(8, 'Property and Supply Section'),
(9, 'Records Section'),
(10, 'ICT Services'),
(11, 'LRDMS'),
(12, 'Commission on Audit (COA)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `office_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `category_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `product_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `year_issued` varchar(255) COLLATE utf8_bin NOT NULL,
  `warranty_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `dept_id`, `office_id`, `category_id`, `user_name`, `product_name`, `year_issued`, `warranty_status`, `status`) VALUES
(1, 'OSDS', 'ICT Services', 'Desktop', 'Giselle Sacha G. Dela Cruz', 'HP 285 GT', '2019', 'OUT OF WARRANTY', 'FUNCTIONAL'),
(2, 'OSDS', 'Legal Services', 'Laptop', 'Atty. Anna Dominique L. Guison', 'Lenovo Ideapad', '2021', 'OUT OF WARRANTY', 'NOT FUNCTIONAL'),
(3, 'OSDS ', 'ICT Services', 'Printer', 'Michael A. Ramos', 'EPSON L369', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL'),
(4, 'OSDS', 'ICT Services', 'Laptop', 'Giselle Sacha G. Dela Cruz', 'ACER TRAVELMATE P2', '2022', 'UNDER WARRANTY', 'FUNCTIONAL'),
(5, 'OSDS', 'Legal Services', 'Desktop', 'Atty. Anna Dominique L. Guison', 'HP 285 GT', '2022', 'UNDER WARRANTY', 'FUNCTIONAL'),
(6, 'CID', 'ALS', 'Laptop', 'Anna Leily De Guzman', 'ACER TRAVELMATE P2', '2022', 'UNDER WARRANTY', 'FUNCTIONAL'),
(7, 'CID', 'DIS', 'Laptop', 'Marco Rhonel Eusebio', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL'),
(8, 'SGOD', 'SHN', 'Laptop', 'Cirilo Cabral', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL'),
(9, 'SGOD', 'SHN ', 'Laptop', 'Joseph Rommel De Leon', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL'),
(10, 'SGOD', 'HRD', 'Laptop', 'Bernadette B. Robles', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
