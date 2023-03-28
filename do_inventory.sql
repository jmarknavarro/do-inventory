-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2023 at 08:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `c_name`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Tablet'),
(4, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dept`
--

CREATE TABLE `tbl_dept` (
  `id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

CREATE TABLE `tbl_office` (
  `id` int(11) NOT NULL,
  `o_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `dept_id` varchar(255) DEFAULT NULL,
  `office_id` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `year_issued` varchar(255) DEFAULT NULL,
  `warranty_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `dept_id`, `office_id`, `category_id`, `user_name`, `serial_no`, `product_name`, `year_issued`, `warranty_status`, `status`, `remarks`) VALUES
(1, 'OSDS', 'Accounting', 'Desktop', 'John Mark Navarro', '12345', 'HP GT250S', '2020', 'UNDER WARRANTY', 'FUNCTIONAL', ''),
(2, 'OSDS', 'Legal Services', 'Laptop', 'Atty. Anna Dominique L. Guison', '5CG6284J4V', 'Lenovo Ideapad', '2021', 'OUT OF WARRANTY', 'NOT FUNCTIONAL', 'Transfer to Sir. Bobot'),
(3, 'OSDS ', 'ICT Services', 'Printer', 'Michael A. Ramos', '5CG6284J21', 'EPSON L369', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', ''),
(4, 'OSDS', 'ICT Services', 'Laptop', 'Giselle Sacha G. Dela Cruz', '5CG6284J3G', 'ACER TRAVELMATE P2', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', ''),
(5, 'OSDS', 'Legal Services', 'Desktop', 'Atty. Anna Dominique L. Guison', '5CG6284J4B', 'HP 285 GT', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', 'Transfer to Ms.Bing ey'),
(6, 'CID', 'ALS', 'Laptop', 'Anna Leily De Guzman', '5CG6284J0K', 'ACER TRAVELMATE P2', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', ''),
(7, 'CID', 'DIS', 'Laptop', 'Marco Rhonel Eusebio', '5CG6284JMF', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', ''),
(8, 'SGOD', 'SHN', 'Laptop', 'Cirilo Cabral', '5CG6284JT2', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', ''),
(9, 'SGOD', 'SHN ', 'Laptop', 'Joseph Rommel De Leon', '5CG6284JLV', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', ''),
(10, 'SGOD', 'HRD', 'Laptop', 'Bernadette B. Robles', '5CG6284J2P', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', ''),
(22, 'OSDS', 'Records Section', 'Tablet', 'Christelle Leigh Ubalde', 'HVAORDJ', 'Lenovo TB - X606X', '2023', 'osds-2', 'osds-2', ''),
(23, 'OSDS', 'ICT Services', 'Tablet', 'Giselle Sacha Dela Cruz', 'HVAORDNS', 'Lenovo TB-X606X', '2023', 'cid-3', 'osds-2', ''),
(24, 'OSDS', 'Legal Services', 'Tablet', 'Atty. Anna Dominique Guison', 'HVAORDJN', 'Lenovo TB-X606X', '2023', 'cid-3', 'osds-2', ''),
(25, 'CID', 'Accounting', 'Tablet', 'Fatima Punongbayan', 'HVAORDSZ', 'Lenovo TB-X606X', '2023', 'cid-3', 'osds-2', ''),
(26, 'SGOD', 'Accounting', 'Tablet', 'Cynthia Briones', 'HVAORDWZ', 'Lenovo TB-X606X', '2021', 'cid-3', 'osds-2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_office`
--
ALTER TABLE `tbl_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_office`
--
ALTER TABLE `tbl_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
