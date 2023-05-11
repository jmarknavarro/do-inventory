-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2023 at 06:45 AM
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
(4, 'Printer'),
(5, 'Projector\r\n');

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
  `dept_id` varchar(11) NOT NULL,
  `o_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_office`
--

INSERT INTO `tbl_office` (`id`, `dept_id`, `o_name`) VALUES
(1, 'OSDS', 'Accounting'),
(2, 'OSDS', 'Administrative Services'),
(3, 'OSDS', 'Budget'),
(4, 'OSDS', 'Cash'),
(5, 'OSDS', 'Legal Services'),
(6, 'SGOD', 'School Health and Nutrition (SHN)'),
(7, 'OSDS', 'Personnel Section'),
(8, 'OSDS', 'Property and Supply Section'),
(9, 'OSDS', 'Records Section'),
(10, 'OSDS', 'ICT Services'),
(11, 'CID', 'Learning Resources Management and Development System (LRMDS)'),
(12, 'OSDS', 'Commission on Audit (COA)'),
(15, 'OSDS', 'SDS'),
(16, 'OSDS', 'ASDS\r\n'),
(17, 'CID', 'Alternative Learning System (ALS)'),
(18, 'CID', 'PSDS'),
(19, 'OSDS', 'Administrative Services (AO II)'),
(20, 'SGOD', 'School Management, Monitoring & Evaluation (SMME)'),
(21, 'SGOD', 'Youth Formation'),
(22, 'SGOD', 'Disaster Risk Reduction and Management (DRRM)'),
(23, 'SGOD', 'Education Supervisor (ES)'),
(24, 'SGOD', 'Education Facilities (EF)\n'),
(25, 'SGOD', 'Social Mobilization and Networking (SOCMOB)'),
(26, 'SGOD', 'Human Resource Development (HRD)'),
(27, 'SGOD', 'Planning'),
(28, 'SGOD', 'Research'),
(29, 'SGOD', 'CHIEF-SGOD'),
(30, 'CID', 'CHIEF-CID'),
(31, 'CID', 'Instructional Management'),
(32, 'CID', 'District Instructional Supervision (DIS)'),
(34, 'CID', 'CID');

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
  `serial_no` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `year_issued` year(4) DEFAULT NULL,
  `warranty_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `is_archive` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `dept_id`, `office_id`, `category_id`, `user_name`, `serial_no`, `product_name`, `year_issued`, `warranty_status`, `status`, `remarks`, `date_added`, `is_archive`) VALUES
(47, 'OSDS', 'ICT Services', 'Laptop', 'Giselle Sacha G. Dela Cruz', '5CG8478G6N', 'HP ELITEBOOK', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:51:18', 0),
(48, 'OSDS', 'ICT Services', 'Printer', 'Giselle Sacha G. Dela Cruz', 'X85Z008513', 'EPSON L3250', 2023, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:53:45', 0),
(49, 'OSDS', 'ICT Services', 'Laptop', 'Giselle Sacha G. Dela Cruz', 'EBEF7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:54:56', 0),
(50, 'OSDS', 'ICT Services', 'Tablet', 'Giselle Sacha G. Dela Cruz', 'HVAORDNS', 'LENOVO TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:56:27', 0),
(51, 'OSDS', 'ICT Services', 'Laptop', 'Michael A. Ramos', 'EC56600', 'ACER SPIN', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:59:06', 0),
(52, 'OSDS', 'ICT Services', 'Printer', 'Michael A. Ramos', 'X2QL001981', 'EPSON L385', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:00:40', 0),
(53, 'OSDS', 'ICT Services', 'Desktop', 'Michael A. Ramos', '99155646', 'PC Desktop Intel Core i3-3240', 2015, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:02:00', 0),
(54, 'OSDS', 'ICT Services', 'Desktop', 'OSDS', 'MB0ZL0-B08', 'Intel Core i3 Neutron Lite Case', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:05:11', 0),
(55, 'OSDS', 'Legal Services', 'Desktop', 'Atty. Anna Dominique L. Guison', '89272BGGD', 'PC Desktop Intel Core i3-3240', 2015, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:07:35', 0),
(56, 'OSDS', 'Legal Services', 'Printer', 'Atty. Anna Dominique L. Guison', 'VGFV191311', 'EPSON L360', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:08:48', 0),
(57, 'OSDS', 'Legal Services', 'Laptop', 'Atty. Anna Dominique L. Guison', 'PF2H1MCF', 'Lenovo Ideapad S145-1411L', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', 'FROM SEF', '2023-04-20 09:11:23', 0),
(58, 'OSDS', 'Legal Services', 'Laptop', 'Atty. Anna Dominique L. Guison', 'E8E17600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:12:44', 0),
(59, 'OSDS', 'Legal Services', 'Laptop', 'Atty. Anna Dominique L. Guison', '5CG6284JUV', 'HP 245 G5', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Returned to Property and Supply\r\n', '2023-04-20 09:14:06', 0),
(60, 'OSDS', 'Legal Services', 'Tablet', 'Atty. Anna Dominique L. Guison', 'HVAORDJN', 'LENOVO TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:15:30', 0),
(61, 'OSDS', 'SDS', 'Desktop', 'Rolette Canilao', '5GH630QXPX', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:18:10', 0),
(62, 'OSDS', 'SDS', 'Printer', 'Rolette Canilao', '8H313490', 'Brother DCP', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:20:35', 0),
(63, 'OSDS', 'SDS', 'Laptop', 'Norma P. Esteban', 'CO2VMNCMRHV2L', 'Macbook', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:22:39', 0),
(64, 'OSDS', 'SDS', 'Desktop', 'Leilani S. Cunanan', '8668320727', 'HP All In One Desktop', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of\r\nNorma P. Esteban', '2023-04-20 09:24:26', 0),
(65, 'OSDS', 'SDS', 'Laptop', 'Norma P. Esteban', 'N/A', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:56:45', 0),
(66, 'OSDS', 'SDS', 'Laptop', 'Rolette Canilao', 'GZQ24', 'Lenovo Ideapad', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:57:54', 0),
(67, 'OSDS', 'SDS', 'Printer', 'Jocelynne C. Samson', 'N/A', 'HP Inktank 315', 2023, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:59:20', 0),
(68, 'OSDS', 'ASDS', 'Desktop', 'Lisette Adriano ', '54765VF', 'Intel i3-9100F', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:02:46', 0),
(69, 'OSDS', 'ASDS\r\n', 'Printer', 'Lisette Adriano', 'X5DY294719', 'EPSON L3110', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:05:21', 0),
(70, 'OSDS', 'ASDS', 'Laptop', 'Leonardo C. Canlas', 'N/A', 'Lenovo Intel i5', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:06:49', 0),
(71, 'OSDS', 'ASDS\r\n', 'Laptop', 'Lisette Adriano', 'PF2H1SVN', 'Lenovo Ideapad', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:08:34', 0),
(72, 'OSDS', 'ASDS\r\n', 'Tablet', 'Leonardo C. Canlas', 'HVAORDXZ', 'LENOVO TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:09:33', 0),
(73, 'OSDS', 'ASDS\r\n', 'Printer', 'BAC', 'VNLD15417', 'Canon Pixma G4010', 2022, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:59:03', 0),
(74, 'OSDS', 'Administrative Services', 'Desktop', 'William Dionisio', 'MP1AAYNA', 'Lenovo All In One Desktop', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:11:41', 0),
(75, 'OSDS', 'Administrative Services', 'Desktop', 'Jamie Rose Labao', 'SGH630QXPQ', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Michelle Mercado', '2023-04-20 10:13:54', 0),
(76, 'OSDS', 'Administrative Services', 'Printer', 'Jamie Rose Labao', 'VGFK191310', 'EPSON L360', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of William Dionisio', '2023-04-20 10:15:31', 0),
(77, 'OSDS', 'Administrative Services', 'Printer', 'Michelle Mercado', 'X5DYD87288', 'EPSON L3110', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:51:20', 0),
(78, 'OSDS', 'Administrative Services', 'Laptop', 'William Dionisio', 'N/A', 'Lenovo i5', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:52:40', 0),
(79, 'OSDS', 'Administrative Services', 'Projector\r\n', 'William Dionisio', '205684', 'ACER P1185', 2023, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:54:39', 0),
(81, 'OSDS', 'Administrative Services', 'Laptop', 'Michelle Mercado', 'EOC7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:05:57', 0),
(82, 'OSDS', 'Administrative Services', 'Laptop', 'Eric San Jose', '5CG6284J15', 'HP 245 G5', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Leonila Antonio', '2023-04-20 11:15:47', 0),
(83, 'OSDS', 'Property and Supply Section', 'Desktop', 'Antonio Pangan', 'SGH630QXP7', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:23:51', 0),
(84, 'OSDS', 'Property and Supply Section', 'Desktop', 'Eugene Agapito', 'SGH630QXPI', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:25:03', 0),
(85, 'OSDS', 'Property and Supply Section', 'Printer', 'Antonio Pangan', 'E74708D7H298057', 'EPSON L385', 2015, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:26:47', 0),
(86, 'OSDS', 'Property and Supply Section', 'Printer', 'Eugene Agapito', 'E74708D7H298057', 'Brother DCP', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:29:19', 0),
(87, 'OSDS', 'Property and Supply Section', 'Laptop', 'Antonio Pangan', '2F6600', 'ACER SPIN', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:30:30', 0),
(88, 'OSDS', 'Property and Supply Section', 'Laptop', 'Eugene Agapito', 'N/A', 'DELL', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:32:01', 0),
(89, 'OSDS', 'Property and Supply Section', 'Projector\r\n', 'Antonio Pangan', '638400', 'ACER X1123 HP DLP', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:33:11', 0),
(90, 'OSDS', 'Property and Supply Section', 'Projector\r\n', 'Antonio Pangan', '628400', 'ACER X1123 HP DLP', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:34:14', 0),
(91, 'OSDS', 'Property and Supply Section', 'Projector\r\n', 'Antonio Pangan', 'A48400', 'ACER X1123 HP DLP', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:35:31', 0),
(92, 'OSDS', 'Cash', 'Desktop', 'Shiela Erica Tubera', 'SGH630QXPD', 'HP 285 G2', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Rowena Sison', '2023-04-20 11:37:05', 0),
(93, 'OSDS', 'Cash', 'Desktop', 'Alicia Guevarra', 'SGH630QXP8', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:39:46', 0),
(94, 'OSDS', 'Cash', 'Printer', 'Alicia Guevarra', 'VGFU191316', 'EPSON L360', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:41:34', 0),
(95, 'OSDS', 'Cash', 'Printer', 'Shiela Erica Tubera', 'CEB7107690', 'EPSON LX-300', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:42:38', 0),
(96, 'OSDS', 'Cash', 'Printer', 'Shiela Erica Tubera', 'Q7CY254103', 'EPSON LX310', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:45:03', 0),
(98, 'OSDS', 'Cash', 'Laptop', 'Shiela Erica Tubera', 'F37600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 12:59:12', 0),
(99, 'OSDS', 'Cash', 'Laptop', 'Alicia Guevarra', '6MX3PG3', 'DELL', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:00:46', 0),
(100, 'OSDS', 'Records Section', 'Desktop', 'Christelle Leigh Ubalde', 'SGH630QXP4', 'HP 285 G2', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:03:04', 0),
(101, 'OSDS', 'Records Section', 'Desktop', 'Irish Carpio', 'SGH630QXPZ', 'HP 285 G2', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former unit of Christelle Leigh Ubalde', '2023-04-20 13:05:37', 0),
(110, 'OSDS', 'Records Section', 'Laptop', 'Christelle Leigh Ubalde', 'CN66C4R28W', 'HP OFFICE JET 7510', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:28:55', 0),
(111, 'OSDS', 'Records Section', 'Printer', 'Christelle Leigh Ubalde', 'X2QL001985', 'EPSON L385', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:31:02', 0),
(112, 'OSDS', 'Records Section', 'Laptop', 'Christelle Leigh Ubalde', '5D7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:32:10', 0),
(113, 'OSDS', 'Records Section', 'Tablet', 'Christelle Leigh Ubalde', 'HVAORDJ', 'LENOVO TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:33:27', 0),
(114, 'OSDS', 'Records Section', 'Laptop', 'Devora Gaye Dalisay', 'H4TTB', 'Lenovo Ideapad', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:34:35', 0),
(128, 'OSDS', 'Accounting', 'Desktop', 'Herald Marson B. Tolentino', 'MP1AAX54', 'Lenovo All In One Desktop', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:05:04', 0),
(129, 'OSDS', 'Accounting', 'Tablet', 'Herald Marson B. Tolentino', 'HVAORDT2', 'LENOVO TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:05:56', 0),
(130, 'OSDS', 'Accounting', 'Desktop', 'Mary Joy Arceo', 'SGH630QXPR', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:06:59', 0),
(131, 'OSDS', 'Accounting', 'Desktop', 'Ma. Marjorie Grace F. Domingo', 'SGH630QXP9', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:08:16', 0),
(132, 'OSDS', 'Accounting', 'Desktop', 'Cristina Santos', 'SGH630QXPF', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:09:37', 0),
(133, 'OSDS', 'Accounting', 'Desktop', 'Maria Arliza Jade Berroy', 'N/A', 'HP 285G2MT Desktop PC', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:11:11', 0),
(134, 'OSDS', 'Accounting', 'Desktop', 'Catherine Ablaza', 'N/A', 'Powerlogic', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:12:54', 0),
(135, 'OSDS', 'Accounting', 'Desktop', 'Herald Marson B. Tolentino', 'N/A', 'PC Desktop Intel Core i3', 2015, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:50:49', 0),
(136, 'OSDS', 'Accounting', 'Printer', 'Ma. Marjorie Grace F. Domingo', 'KKHC00657', 'Canon Pixma', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', 'OUT OF CARTRIDGE', '2023-04-20 14:53:17', 0),
(137, 'OSDS', 'Accounting', 'Printer', 'Accounting', 'CN2C13JJ0T', 'HP Ink Advantage 2515', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:31:04', 0),
(138, 'OSDS', 'Accounting', 'Printer', 'Mary Joy Arceo', 'X5DY092753', 'EPSON L3110', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:19:08', 0),
(139, 'OSDS', 'Accounting', 'Printer', 'Cristina Santos', '002022', 'EPSON L385', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:20:09', 0),
(140, 'OSDS', 'Accounting', 'Printer', 'Maria Arliza Jade Berroy', 'N/A', 'EPSON L3110', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:21:01', 0),
(141, 'OSDS', 'Accounting', 'Laptop', 'Herald Marson B. Tolentino', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:24:30', 0),
(142, 'OSDS', 'Accounting', 'Laptop', 'Rozelle', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:25:12', 0),
(143, 'OSDS', 'Accounting', 'Laptop', 'Guio Maurice Santos', 'N/A', 'Lenovo Ideapad', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:28:09', 0),
(145, 'OSDS', 'Accounting', 'Laptop', 'Jonathan Chua', '697600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:34:50', 0),
(146, 'OSDS', 'Accounting', 'Laptop', 'Catherine Ablaza', '4E7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:35:38', 0),
(147, 'OSDS', 'Accounting', 'Laptop', 'Mary Joy Arceo', 'DE7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:36:19', 0),
(148, 'OSDS', 'Accounting', 'Laptop', 'Ma. Marjorie Grace F. Domingo', 'N/A', 'Lenovo Ideapad', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:37:14', 0),
(149, 'OSDS', 'Accounting', 'Laptop', 'Cristina Santos', '697600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:38:05', 0),
(150, 'OSDS', 'Accounting', 'Laptop', 'Sherlie Bautista', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:38:57', 0),
(151, 'OSDS', 'Accounting', 'Laptop', 'Maria Arliza Jade Berroy', 'P67600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:39:58', 0),
(152, 'OSDS', 'Accounting', 'Laptop', 'Randcel Christind R. Cruz', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:40:56', 0),
(153, 'OSDS', 'Accounting', 'Laptop', 'Ria Dela Cruz', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:42:23', 0),
(154, 'OSDS', 'Accounting', 'Laptop', 'Daryl Christian Francisco', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:43:49', 0),
(155, 'OSDS', 'Accounting', 'Laptop', 'Rosemarie Intal', 'N/A', 'Lenovo Ideapad', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:18:07', 0),
(156, 'OSDS', 'Accounting', 'Laptop', 'Cristalyn Mercado', 'N/A', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:19:20', 0),
(157, 'OSDS', 'Accounting', 'Laptop', 'Cristalyn Mercado', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:20:52', 0),
(158, 'OSDS', 'Accounting', 'Laptop', 'Judy Ann Pagtalunan', 'N/A', 'Lenovo Ideapad', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:22:40', 0),
(159, 'OSDS', 'Accounting', 'Laptop', 'Vea Dionnela Pangan', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:24:01', 0),
(160, 'OSDS', 'Accounting', 'Laptop', 'Vea Dionnela Pangan', 'N/A', 'ACER TRAVELMATE P', 2022, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:25:08', 0),
(161, 'OSDS', 'Accounting', 'Laptop', 'Shiella V. Sebastian', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:25:48', 0),
(162, 'OSDS', 'Accounting', 'Laptop', 'Shiella V. Sebastian', 'N/A', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:26:29', 0),
(163, 'OSDS', 'Accounting', 'Laptop', 'Lady Pauline Ycot', 'N/A', 'ACER ASPIRE', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:29:31', 0),
(164, 'OSDS', 'Budget', 'Desktop', 'Jerrylyn L. Santiago', 'MP1AAXRY', 'Lenovo All In One Desktop', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:30:49', 0),
(165, 'OSDS', 'Budget', 'Tablet', 'Jerrylyn L. Santiago', 'HVAORDRO', 'Lenovo TB X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:31:47', 0),
(166, 'OSDS', 'Budget', 'Desktop', 'Ryan William Guevarra', 'SGH630QXP2', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:32:58', 0),
(167, 'OSDS', 'Budget', 'Desktop', 'Dame Dominique R. Salamat', 'SGH630QXPM', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:34:05', 0),
(168, 'OSDS', 'Budget', 'Printer', 'Dame Dominique R. Salamat', 'KNLD15283', 'Canon Pixma', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:35:13', 0),
(169, 'OSDS', 'Budget', 'Laptop', 'Donna Belle Bautista', 'N/A', 'Lenovo Ideapad', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:36:15', 0),
(170, 'OSDS', 'Budget', 'Laptop', 'Ryan William Guevarra', 'AE7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:36:56', 0),
(171, 'OSDS', 'Budget', 'Laptop', 'Dame Dominique R. Salamat', '5CG62841Q', 'HP 245 G5', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:38:00', 0),
(172, 'OSDS', 'Personnel Section', 'Desktop', 'Ma. Cristina C. Panganiban', 'SGH630QXPN', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:39:29', 0),
(173, 'OSDS', 'Personnel Section', 'Desktop', 'Magdalena Lucillo', '408D5C47343', 'Intel Core i3-3240', 2015, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:41:02', 0),
(174, 'OSDS', 'Personnel Section', 'Printer', 'Magdalena Lucillo', 'N/A', 'EPSON L3110', NULL, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:22:09', 0),
(175, 'OSDS', 'Personnel Section', 'Laptop', 'Magdalena Lucillo', 'N/A', 'ACER Aspire', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:23:29', 0),
(176, 'OSDS', 'Personnel Section', 'Tablet', 'Magdalena Lucillo', 'HVAORDV9', 'Lenovo TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:25:32', 0),
(177, 'OSDS', 'Personnel Section', 'Desktop', 'Nellisa Antonette Susmirano', 'SGH630QXPO', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:30:05', 0),
(178, 'OSDS', 'Personnel Section', 'Desktop', 'Patma Sadaya ', 'SGH630QXPT', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:31:29', 0),
(179, 'OSDS', 'Personnel Section', 'Desktop', 'Micah Renielle Cruz', 'SGH630QXPG', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:32:18', 0),
(180, 'OSDS', 'Personnel Section', 'Printer', 'Patma Sadaya ', 'X2QL001128', 'EPSON L385', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:34:33', 0),
(181, 'OSDS', 'Personnel Section', 'Printer', 'Jezreel Alcoreza', 'X2QL001136', 'EPSON L385', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:35:34', 0),
(182, 'OSDS', 'Personnel Section', 'Printer', 'Cristina Panganiban', 'VGFK191312', 'EPSON L360', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Micah Renniel Cruz', '2023-04-28 09:40:44', 0),
(183, 'OSDS', 'Personnel Section', 'Laptop', 'Patma Sadaya ', '667600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-28 09:43:29', 0),
(184, 'OSDS', 'Personnel Section', 'Laptop', 'Maria Iraida Ramos', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-28 10:09:49', 0),
(185, 'OSDS', 'Personnel Section', 'Laptop', 'Jezreel Alcoreza', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-28 10:11:15', 0),
(186, 'OSDS', 'Personnel Section', 'Laptop', 'Jamie Rose Labao', '057600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-28 10:12:23', 0),
(187, 'OSDS', 'Personnel Section', 'Laptop', 'Cristina Panganiban', '4C7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-28 10:46:52', 0),
(188, 'OSDS', 'Personnel Section', 'Laptop', 'Apple Salazar', 'D27600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-28 10:48:21', 0),
(192, 'OSDS', 'Personnel Section', 'Laptop', 'Paolo Lester Caballero', '4E7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:09:25', 0),
(193, 'OSDS', 'Personnel Section', 'Laptop', 'Justine Erth Perez', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:10:37', 0),
(194, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Charmaine Aniciete', '5A7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:13:56', 0),
(195, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Jane Bulaong', '343400', 'ACER Aspire', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:14:57', 0),
(196, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Ma. Therese Carpio', 'AB623400', 'ACER Aspire', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:16:57', 0),
(197, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Aimee Clavio', 'OAA13400', 'ACER Aspire', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:18:04', 0),
(198, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Abegail Don', 'N/A', 'ACER Aspire', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:19:50', 0),
(199, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Eleonor C. Manabat', 'N/A', 'ACER Aspire', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:25:29', 0),
(200, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Eden Elizabeth Morante', 'N/A', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:26:38', 0),
(201, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Renestel Pulumbarit', 'N/A', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:27:27', 0),
(202, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Jaymee Santiago', 'N/A', 'ACER Aspire', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:29:19', 0),
(203, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Maria Evangeline Santos', '089D3400', 'ACER Aspire', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:30:20', 0),
(204, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Sheena Mae Valencia`', '887600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:35:32', 0),
(205, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Junwell Cabigao', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:36:27', 0),
(206, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Maria Kristina Manaligod', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:39:47', 0),
(207, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'James Paul Cawaling', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:40:47', 0),
(208, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Marielle Posillo', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:41:52', 0),
(209, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Ronie Hernandez', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:42:35', 0),
(210, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Mary Carmina Yaya', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:43:35', 0),
(211, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Pauline Mae Borlongan', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:44:44', 0),
(212, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Joathalia Santos', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:45:37', 0),
(213, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Wilma DC Santiago', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:46:31', 0),
(214, 'OSDS', 'Administrative Services (AO II)', 'Laptop', 'Sherlie Bautista', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 08:47:09', 0),
(215, 'SGOD', 'School Management, Monitoring & Evaluation (SMME)', 'Desktop', 'Joselito E. Salamat', 'SGH630QXPP', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 09:08:59', 0),
(216, 'SGOD', 'School Management, Monitoring & Evaluation (SMME)', 'Desktop', 'Antonio Isidro', 'N/A', 'Desktop PC Intel i3', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 09:23:51', 0),
(217, 'SGOD', 'School Management, Monitoring & Evaluation (SMME)', 'Printer', 'Joselito E. Salamat', 'X2QL002852', 'EPSON L385', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 09:27:54', 0),
(218, 'SGOD', 'School Management, Monitoring & Evaluation (SMME)', 'Printer', 'Antonio Isidro', 'N/A', 'EPSON L360', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 09:29:16', 0),
(219, 'SGOD', 'School Management, Monitoring & Evaluation (SMME)', 'Laptop', 'Antonio Isidro', 'H4RK7', 'Lenovo Ideapad 3', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 09:32:50', 0),
(220, 'SGOD', 'School Management, Monitoring & Evaluation (SMME)', 'Laptop', 'Joselito E. Salamat', '806600', 'ACER Spin', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 09:34:15', 0),
(221, 'SGOD', 'Disaster Risk Reduction and Management (DRRM)', 'Desktop', 'Mary Grace June San Pedro', 'SGH630QXPC', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 09:38:50', 0),
(225, 'SGOD', 'Disaster Risk Reduction and Management (DRRM)', 'Laptop', 'Mary Grace June San Pedro', 'N/A', 'ACER Spin', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:09:55', 0),
(226, 'SGOD', 'Disaster Risk Reduction and Management (DRRM)', 'Laptop', 'Mary Grace June San Pedro', 'B7QBC367902301', 'ASUS N455', 2015, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:12:41', 0),
(227, 'SGOD', 'Youth Formation\r\n', 'Desktop', 'Rochie Batislaong', 'SGH630QXPL', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Anne Hazel Robles', '2023-05-09 11:17:08', 0),
(228, 'SGOD', 'Youth Formation\r\n', 'Laptop', 'Arlene Bongola', '94LRG63', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:18:24', 0),
(229, 'SGOD', 'Youth Formation\r\n', 'Laptop', 'Rochie Batislaong', '386600', 'ACER Spin', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:19:48', 0),
(230, 'SGOD', 'Education Supervisor (ES)', 'Printer', 'Armando Illescas', 'N/A', 'Canon G4010', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:28:54', 0),
(231, 'SGOD', 'Education Supervisor (ES)', 'Laptop', 'Armando Illescas', '8E7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:29:49', 0),
(232, 'SGOD', 'EF\r\n', 'Printer', 'Angelina Alcaraz', 'X50YP88545', 'EPSON L3210', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:33:35', 0),
(233, 'SGOD', 'EF\r\n', 'Laptop', 'Angelina Alcaraz', 'N/A', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:34:33', 0),
(234, 'SGOD', 'EF\r\n', 'Tablet', 'Angelina Alcaraz', 'HVAORDLX', 'Lenovo TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:35:42', 0),
(235, 'SGOD', 'School Health and Nutrition (SHN)', 'Desktop', 'Dr. Irmingardo R. Antonio', 'N/A', 'Samsung Desktop Computer', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:38:07', 0),
(236, 'SGOD', 'School Health and Nutrition (SHN)', 'Printer', 'Dr. Irmingardo R. Antonio', 'X2QLQO1992', 'EPSON L385', 2017, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:39:19', 0),
(237, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Dr. Irmingardo R. Antonio', 'C37600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:40:40', 0),
(238, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Gerald Angelo Avendano', 'N/A', 'ACER Spin', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:42:06', 0),
(239, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Anna Syra Lacson', '8D7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 11:44:04', 0),
(240, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Cirio Cabral', '6A7600', 'ACER TRAVELMATE P', 2022, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 13:03:40', 0),
(241, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Joseph Rommel De Leon', 'F97600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 13:23:58', 0),
(242, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Myzhael Joseph Dela Cruz', '897600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '\r\n', '2023-05-09 13:26:32', 0),
(243, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Renato Navarette Jr.', '887600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 13:30:47', 0),
(244, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Marian Pascual', '997600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 13:31:50', 0),
(245, 'SGOD', 'School Health and Nutrition (SHN)', 'Laptop', 'Lester Pe', '627600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 13:37:00', 0),
(246, 'SGOD', 'Social Mobilization and Networking (SOCMOB)', 'Desktop', 'Shella Buenaventura', 'SGH630QXP6', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 13:40:46', 0),
(247, 'SGOD', 'School Health and Nutrition (SHN)', 'Printer', 'Cynthia Briones', 'X2QL001109', 'EPSON L385', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Shella Buenaventura', '2023-05-09 13:56:38', 0),
(248, 'SGOD', 'Social Mobilization and Networking (SOCMOB)', 'Printer', 'Danilo Fajardo', 'N/A', 'EPSON L3110', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 13:58:37', 0),
(249, 'SGOD', 'Social Mobilization and Networking (SOCMOB)', 'Laptop', 'Shella Buenaventura', 'E77600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 13:59:50', 0),
(250, 'SGOD', 'Social Mobilization and Networking (SOCMOB)', 'Laptop', 'Danilo Fajardo', 'H245H', 'Lenovo Ideapad 3', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:01:10', 0),
(251, 'SGOD', 'Research', 'Laptop', 'Leonila Antonio', 'H2AYM', 'Lenovo Ideapad 3', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:05:34', 0),
(252, 'SGOD', 'Research', 'Printer', 'Leonila Antonio', '800262', 'EPSON EBX41', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:07:48', 0),
(253, 'SGOD', 'Human Resource Development (HRD)', 'Printer', 'Jerrylyn Santiago', 'X50Y088545', 'EPSON L3110', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:11:32', 0),
(254, 'SGOD', 'Human Resource Development (HRD)', 'Laptop', 'Bernadette B. Robles', '5E7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:15:45', 0),
(255, 'SGOD', 'Human Resource Development (HRD)', 'Laptop', 'Jerrylyn Santiago', '7C7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:16:32', 0),
(256, 'SGOD', 'Planning', 'Desktop', 'Aurora H. De Leon', 'KMQKC27604N93', 'Intel Core i5 - 9400', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:18:04', 0),
(257, 'SGOD', 'Planning', 'Printer', 'Aurora H. De Leon', 'X2QL001108', 'EPSON L385', 2015, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:19:15', 0),
(258, 'SGOD', 'Planning', 'Laptop', 'Aurora H. De Leon', '5D6600', 'ACER Spin', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:20:04', 0),
(259, 'SGOD', 'Planning', 'Tablet', 'Aurora H. De Leon', 'HVAORDJS', 'Lenovo TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:21:23', 0),
(260, 'SGOD', 'CHIEF-SGOD', 'Desktop', 'Cynthia Briones', 'K6MQKCC2763152E8', 'Intel Core i3 3.7Ghz', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:23:01', 0),
(261, 'SGOD', 'School Health and Nutrition (SHN)', 'Printer', 'Shella Buenaventura', 'N/A', 'EPSON L3110', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Cynthia Briones', '2023-05-09 14:26:41', 0),
(262, 'SGOD', 'CHIEF-SGOD', 'Laptop', 'Cynthia Briones', 'N/A', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:46:46', 0),
(263, 'SGOD', 'CHIEF-SGOD', 'Tablet', 'Cynthia Briones', 'HVAORDWZ', 'Lenovo TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:48:14', 0),
(264, 'SGOD', 'CHIEF-SGOD', 'Projector\r\n', 'Cynthia Briones', 'N/A', 'ACER P1276', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:48:56', 0),
(265, 'CID', 'CHIEF-CID', 'Desktop', 'Fatima M. Punongbayan', 'V6MDKCZ6Q43L3C', 'Intel Core i3 - 9100', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:59:55', 0),
(266, 'CID', 'CHIEF-CID', 'Desktop', 'Fatima M. Punongbayan', 'V6MDKCZ6Q43L3C', 'Intel Core i3 - 9100', 2019, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 14:59:55', 0),
(267, 'CID', 'CHIEF- CID', 'Printer', 'Fatima M. Punongbayan', 'XSOYO88509', 'EPSON L3110', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:01:23', 0),
(268, 'CID', 'CHIEF-CID', 'Laptop', 'Fatima M. Punongbayan', 'N/A', 'ACER Spin', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:02:34', 0),
(269, 'CID', 'CHIEF-CID', 'Tablet', 'Fatima M. Punongbayan', 'HVAORDSZ', 'Lenovo TB-X606X', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:03:55', 0),
(270, 'CID', 'CHIEF-CID', 'Projector\r\n', 'Fatima M. Punongbayan', '985400', 'ACER P1185', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:04:51', 0),
(271, 'CID', 'CHIEF-CID', 'Laptop', 'Czarina Laderas', '6E7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:08:16', 0),
(272, 'CID', 'CHIEF-CID', 'Laptop', 'Czarina Laderas', '6E7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:08:16', 0),
(273, 'CID', 'CHIEF-CID', 'Laptop', 'Czarina Laderas', 'N/A', 'Lenovo Ideapad ', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:09:14', 0),
(274, 'CID', 'Instructional Management', 'Desktop', 'Teresa R. Manlapaz', 'N/A', 'HP 285 G2 MT', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:48:02', 0),
(275, 'CID', 'Instructional Management', 'Laptop', 'Jocelyn Canlas', '057600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:49:00', 0),
(276, 'CID', 'Instructional Management', 'Laptop', 'Edna Diaz', '8B7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:49:46', 0),
(277, 'CID', 'Instructional Management', 'Laptop', 'Teresa R. Manlapaz', 'N/A', 'Lenovo I5', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:50:35', 0),
(278, 'CID', 'Instructional Management', 'Laptop', 'Benjamin Raymundo', 'FA7600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:51:36', 0),
(279, 'CID', 'Instructional Management', 'Laptop', 'Rodrigo Roxas', 'N/A', 'Lenovo I5', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:52:22', 0),
(280, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Desktop', 'Arnelia R. Trajano', 'N/A', 'Samsung Desktop Computer', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', 'Returned to Property and Supply Section', '2023-05-09 15:54:39', 0),
(281, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Projector\r\n', 'Arnelia Trajano', 'N/A', 'ACER', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:56:25', 0),
(282, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Desktop', 'Anna Leily De Guzman', 'SGH630QXPH', 'HP 285 G2 MT', 2016, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-09 15:59:08', 0),
(283, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Desktop', 'Rosita Lalic', 'SGH630QXPJ', 'HP 285 G2 MT', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 16:00:21', 0),
(284, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Printer', 'Arnelia Trajano', '402815', 'Fuji Xerox Documenter S2110', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 16:01:48', 0),
(285, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Printer', 'Arnelia Trajano', 'KMBT65809', 'Canon G20', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 16:02:46', 0),
(286, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Printer', 'Anna Leily De Guzman', 'X5QJQ88509', 'EPSON L3110', 2018, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 16:03:50', 0),
(287, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Laptop', 'Arnelia Trajano', 'H2B20', 'Lenovo Ideapad ', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 16:04:33', 0),
(288, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Printer', 'Rosita Lalic', 'N/A', 'N/A', 0000, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-09 16:06:08', 0),
(289, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Laptop', 'Anna Leily De Guzman', 'NXVU3SP0012021EC647600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:31:07', 0),
(290, 'CID', 'Learning Resources Management and Development System (LRMDS)', 'Laptop', 'Rosita Lalic', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:31:52', 0),
(291, 'CID', 'Alternative Learning System (ALS)', 'Desktop', 'Mylene Ramos', 'SGH630QXP5', 'HP 285 GT M2', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:32:56', 0),
(292, 'CID', 'Alternative Learning System (ALS)', 'Desktop', 'Jojit Javier', 'SGH630QXPS', 'HP 285 GT M2', 2016, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:34:08', 0),
(293, 'CID', 'Alternative Learning System (ALS)', 'Printer', 'Mylene Ramos', 'N/A', 'HP 415', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:34:42', 0),
(294, 'CID', 'Alternative Learning System (ALS)', 'Printer', 'Jojit Javier', 'CNAU7MOND', 'HP 415', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:36:37', 0),
(295, 'CID', 'Alternative Learning System (ALS)', 'Laptop', 'Salvador Lozano', 'N/A', 'ACER Spin', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:37:44', 0),
(296, 'CID', 'Alternative Learning System (ALS)', 'Laptop', 'Mylene Ramos', 'EB76600', 'ACER Spin', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:38:36', 0),
(297, 'CID', 'Alternative Learning System (ALS)', 'Laptop', 'Jojit Javier', '5D6600', 'ACER Spin', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:39:28', 0),
(298, 'CID', 'Alternative Learning System (ALS)', 'Projector\r\n', 'Mylene Ramos', 'MRJR811007211004065910', 'ACER X122GAHDLP PROJECTOR', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:40:49', 0),
(299, 'CID', 'District Instructional Supervision (DIS)\r\n', 'Laptop', 'Benilda Agustin', '877600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:44:02', 0),
(300, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Dulce Marcelo Camaya', 'H49SQ', 'Lenovo Ideapad 3', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:45:19', 0),
(301, 'OSDS', 'Accounting', 'Printer', 'Ma. Marjorie Grace F. Domingo	', 'CN2AJD15M', 'HP Ink Tank 315', 2023, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:51:35', 0),
(302, 'OSDS', 'Accounting', 'Printer', 'Mary Joy Arceo', 'CN2C99MOVJ', 'HP Ink Tank Wireless 415', 2023, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 08:53:36', 0),
(303, 'OSDS', 'Accounting', 'Laptop', 'Rufina Mendoza', 'H47VG', 'Lenovo Ideapad', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:08:44', 0),
(304, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Cristina S. Castillo', 'H4XQK', 'Lenovo Ideapad 3', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:26:56', 0),
(305, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Rommel Cabe Cruz', 'H7SUJ', 'Lenovo Ideapad 3', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:29:13', 0),
(306, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Nora Lising', 'N/A', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:29:55', 0),
(307, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Nora Lising', 'H474D', 'Lenovo Ideapad 3', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '\r\n', '2023-05-10 09:31:14', 0),
(308, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Melandro Pascual', 'E57600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:32:53', 0),
(309, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Marco Rhonel Eusebio', 'E37600', 'ACER TRAVELMATE P', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:34:00', 0),
(310, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Dennis Robles', 'N/A', 'Lenovo Ideapad', 2020, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:34:47', 0),
(311, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Genesis Tolentino', 'N/A', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:35:56', 0),
(312, 'CID', 'District Instructional Supervision (DIS)', 'Laptop', 'Lourdes Villena', 'GLX3P63', 'Dell', 2021, 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:36:43', 0),
(313, 'CID', 'CID', 'Desktop', 'CID', 'N/A', 'CPU Neutron', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:44:07', 0),
(314, 'CID', 'CID', 'Desktop', 'CID', '535F91', 'CPU Neutron', 2022, 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-05-10 09:44:43', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dept`
--
ALTER TABLE `tbl_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_office`
--
ALTER TABLE `tbl_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
