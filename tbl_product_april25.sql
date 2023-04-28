-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2023 at 02:16 AM
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
  `year_issued` varchar(255) DEFAULT NULL,
  `warranty_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `dept_id`, `office_id`, `category_id`, `user_name`, `serial_no`, `product_name`, `year_issued`, `warranty_status`, `status`, `remarks`, `date_added`) VALUES
(47, 'OSDS', 'ICT Services', 'Laptop', 'Giselle Sacha G. Dela Cruz', '5CG8478G6N', 'HP ELITEBOOK', '2019', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:51:18'),
(48, 'OSDS', 'ICT Services', 'Printer', 'Giselle Sacha G. Dela Cruz', 'X85Z008513', 'EPSON L3250', '2023', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:53:45'),
(49, 'OSDS', 'ICT Services', 'Laptop', 'Giselle Sacha G. Dela Cruz', 'EBEF7600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:54:56'),
(50, 'OSDS', 'ICT Services', 'Tablet', 'Giselle Sacha G. Dela Cruz', 'HVAORDNS', 'LENOVO TB-X606X', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:56:27'),
(51, 'OSDS', 'ICT Services', 'Laptop', 'Michael A. Ramos', 'EC56600', 'ACER SPIN', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 08:59:06'),
(52, 'OSDS', 'ICT Services', 'Printer', 'Michael A. Ramos', 'X2QL001981', 'EPSON L385', '2017', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:00:40'),
(53, 'OSDS', 'ICT Services', 'Desktop', 'Michael A. Ramos', '99155646', 'PC Desktop Intel Core i3-3240', '2015', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:02:00'),
(54, 'OSDS', 'Front Desk, QR Code', 'Desktop', 'OSDS', 'MB0ZL0-B08', 'Intel Core i3 Neutron Lite Case', '2019', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:05:11'),
(55, 'OSDS', 'Legal Services', 'Desktop', 'Atty. Anna Dominique L. Guison', '89272BGGD', 'PC Desktop Intel Core i3-3240', '2015', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:07:35'),
(56, 'OSDS', 'Legal Services', 'Printer', 'Atty. Anna Dominique L. Guison', 'VGFV191311', 'EPSON L360', '2017', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:08:48'),
(57, 'OSDS', 'Legal Services', 'Laptop', 'Atty. Anna Dominique L. Guison', 'PF2H1MCF', 'Lenovo Ideapad S145-1411L', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', 'FROM SEF', '2023-04-20 09:11:23'),
(58, 'OSDS', 'Legal Services', 'Laptop', 'Atty. Anna Dominique L. Guison', 'E8E17600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:12:44'),
(59, 'OSDS', 'Legal Services', 'Laptop', 'Atty. Anna Dominique L. Guison', '5CG6284JUV', 'HP 245 G5', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', 'Returned to Property and Supply\r\n', '2023-04-20 09:14:06'),
(60, 'OSDS', 'Legal Services', 'Tablet', 'Atty. Anna Dominique L. Guison', 'HVAORDJN', 'LENOVO TB-X606X', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:15:30'),
(61, 'OSDS', 'SDS Proper\r\n', 'Desktop', 'Rolette Canilao', '5GH630QXPX', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:18:10'),
(62, 'OSDS', 'SDS Proper\r\n', 'Printer', 'Rolette Canilao', '8H313490', 'Brother DCP', '2018', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:20:35'),
(63, 'OSDS', 'SDS Proper\r\n', 'Laptop', 'Norma P. Esteban', 'CO2VMNCMRHV2L', 'Macbook', '2018', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:22:39'),
(64, 'OSDS', 'SDS Proper\r\n', 'Desktop', 'Leilani S. Cunanan', '8668320727', 'HP All In One Desktop', '2018', 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of\r\nNorma P. Esteban', '2023-04-20 09:24:26'),
(65, 'OSDS', 'SDS Proper\r\n', 'Laptop', 'Norma P. Esteban', 'N/A', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:56:45'),
(66, 'OSDS', 'SDS Proper\r\n', 'Laptop', 'Rolette Canilao', 'GZQ24', 'Lenovo Ideapad', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:57:54'),
(67, 'OSDS', 'SDS Proper\r\n', 'Printer', 'Jocelynne C. Samson', 'N/A', 'HP Inktank 315', '2023', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 09:59:20'),
(68, 'OSDS', 'ASDS', 'Desktop', 'Lisette Adriano ', '54765VF', 'Intel i3-9100F', '2019', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:02:46'),
(69, 'OSDS', 'ASDS\r\n', 'Printer', 'Lisette Adriano', 'X5DY294719', 'EPSON L3110', '2019', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:05:21'),
(70, 'OSDS', 'ASDS', 'Laptop', 'Leonardo C. Canlas', 'N/A', 'Lenovo Intel i5', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:06:49'),
(71, 'OSDS', 'ASDS\r\n', 'Laptop', 'Lisette Adriano', 'PF2H1SVN', 'Lenovo Ideapad', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:08:34'),
(72, 'OSDS', 'ASDS\r\n', 'Tablet', 'Leonardo C. Canlas', 'HVAORDXZ', 'LENOVO TB-X606X', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:09:33'),
(73, 'OSDS', 'ASDS\r\n', 'Printer', 'BAC', 'VNLD15417', 'Canon Pixma G4010', '2022', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:59:03'),
(74, 'OSDS', 'Administrative Services', 'Desktop', 'William Dionisio', 'MP1AAYNA', 'Lenovo All In One Desktop', '2018', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:11:41'),
(75, 'OSDS', 'Administrative Services', 'Desktop', 'Jamie Rose Labao', 'SGH630QXPQ', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Michelle Mercado', '2023-04-20 10:13:54'),
(76, 'OSDS', 'Administrative Services', 'Printer', 'Jamie Rose Labao', 'VGFK191310', 'EPSON L360', '2017', 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of William Dionisio', '2023-04-20 10:15:31'),
(77, 'OSDS', 'Administrative Services', 'Printer', 'Michelle Mercado', 'X5DYD87288', 'EPSON L3110', '2019', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:51:20'),
(78, 'OSDS', 'Administrative Services', 'Laptop', 'William Dionisio', 'N/A', 'Lenovo i5', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:52:40'),
(79, 'OSDS', 'Administrative Services', 'Projector\r\n', 'William Dionisio', '205684', 'ACER P1185', '2023', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 10:54:39'),
(81, 'OSDS', 'Administrative Services', 'Laptop', 'Michelle Mercado', 'EOC7600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:05:57'),
(82, 'OSDS', 'Administrative Services', 'Laptop', 'Eric San Jose', '5CG6284J15', 'HP 245 G5', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Leonila Antonio', '2023-04-20 11:15:47'),
(83, 'OSDS', 'Property and Supply Section', 'Desktop', 'Antonio Pangan', 'SGH630QXP7', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:23:51'),
(84, 'OSDS', 'Property and Supply Section', 'Desktop', 'Eugene Agapito', 'SGH630QXPI', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:25:03'),
(85, 'OSDS', 'Property and Supply Section', 'Printer', 'Antonio Pangan', 'E74708D7H298057', 'EPSON L385', '2015', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:26:47'),
(86, 'OSDS', 'Property and Supply Section', 'Printer', 'Eugene Agapito', 'E74708D7H298057', 'Brother DCP', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:29:19'),
(87, 'OSDS', 'Property and Supply Section', 'Laptop', 'Antonio Pangan', '2F6600', 'ACER SPIN', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:30:30'),
(88, 'OSDS', 'Property and Supply Section', 'Laptop', 'Eugene Agapito', 'N/A', 'DELL', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:32:01'),
(89, 'OSDS', 'Property and Supply Section', 'Projector\r\n', 'Antonio Pangan', '638400', 'ACER X1123 HP DLP', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:33:11'),
(90, 'OSDS', 'Property and Supply Section', 'Projector\r\n', 'Antonio Pangan', '628400', 'ACER X1123 HP DLP', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:34:14'),
(91, 'OSDS', 'Property and Supply Section', 'Projector\r\n', 'Antonio Pangan', 'A48400', 'ACER X1123 HP DLP', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:35:31'),
(92, 'OSDS', 'Cash', 'Desktop', 'Shiela Erica Tubera', 'SGH630QXPD', 'HP 285 G2', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former Unit of Rowena Sison', '2023-04-20 11:37:05'),
(93, 'OSDS', 'Cash', 'Desktop', 'Alicia Guevarra', 'SGH630QXP8', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:39:46'),
(94, 'OSDS', 'Cash', 'Printer', 'Alicia Guevarra', 'VGFU191316', 'EPSON L360', '2017', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:41:34'),
(95, 'OSDS', 'Cash', 'Printer', 'Shiela Erica Tubera', 'CEB7107690', 'EPSON LX-300', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:42:38'),
(96, 'OSDS', 'Cash', 'Printer', 'Shiela Erica Tubera', 'Q7CY254103', 'EPSON LX310', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 11:45:03'),
(98, 'OSDS', 'Cash', 'Laptop', 'Shiela Erica Tubera', 'F37600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 12:59:12'),
(99, 'OSDS', 'Cash', 'Laptop', 'Alicia Guevarra', '6MX3PG3', 'DELL', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:00:46'),
(100, 'OSDS', 'Records Section', 'Desktop', 'Christelle Leigh Ubalde', 'SGH630QXP4', 'HP 285 G2', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:03:04'),
(101, 'OSDS', 'Records Section', 'Desktop', 'Irish Carpio', 'SGH630QXPZ', 'HP 285 G2', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', 'Former unit of Christelle Leigh Ubalde', '2023-04-20 13:05:37'),
(110, 'OSDS', 'Records Section', 'Laptop', 'Christelle Leigh Ubalde', 'CN66C4R28W', 'HP OFFICE JET 7510', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:28:55'),
(111, 'OSDS', 'Records Section', 'Printer', 'Christelle Leigh Ubalde', 'X2QL001985', 'EPSON L385', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:31:02'),
(112, 'OSDS', 'Records Section', 'Laptop', 'Christelle Leigh Ubalde', '5D7600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:32:10'),
(113, 'OSDS', 'Records Section', 'Tablet', 'Christelle Leigh Ubalde', 'HVAORDJ', 'LENOVO TB-X606X', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:33:27'),
(114, 'OSDS', 'Records Section', 'Laptop', 'Devora Gaye Dalisay', 'H4TTB', 'Lenovo Ideapad', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 13:34:35'),
(128, 'OSDS', 'Accounting', 'Desktop', 'Herald Marson B. Tolentino', 'MP1AAX54', 'Lenovo All In One Desktop', '2018', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:05:04'),
(129, 'OSDS', 'Accounting', 'Tablet', 'Herald Marson B. Tolentino', 'HVAORDT2', 'LENOVO TB-X606X', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:05:56'),
(130, 'OSDS', 'Accounting', 'Desktop', 'Mary Joy Arceo', 'SGH630QXPR', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:06:59'),
(131, 'OSDS', 'Accounting', 'Desktop', 'Ma. Marjorie Grace F. Domingo', 'SGH630QXP9', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:08:16'),
(132, 'OSDS', 'Accounting', 'Desktop', 'Cristina Santos', 'SGH630QXPF', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:09:37'),
(133, 'OSDS', 'Accounting', 'Desktop', 'Maria Arliza Jade Berroy', 'N/A', 'HP 285G2MT Desktop PC', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:11:11'),
(134, 'OSDS', 'Accounting', 'Desktop', 'Catherine Ablaza', 'N/A', 'Powerlogic', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:12:54'),
(135, 'OSDS', 'Accounting', 'Desktop', 'Herald Marson B. Tolentino', 'N/A', 'PC Desktop Intel Core i3', '2015', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 14:50:49'),
(136, 'OSDS', 'Accounting', 'Printer', 'Ma. Marjorie Grace F. Domingo', 'KKHC00657', 'Canon Pixma', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', 'OUT OF CARTRIDGE', '2023-04-20 14:53:17'),
(137, 'OSDS', 'Accounting', 'Printer', 'Accounting', 'CN2C13JJ0T', 'HP Ink Advantage 2515', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:31:04'),
(138, 'OSDS', 'Accounting', 'Printer', 'Mary Joy Arceo', 'X5DY092753', 'EPSON L3110', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:19:08'),
(139, 'OSDS', 'Accounting', 'Printer', 'Cristina Santos', '002022', 'EPSON L385', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:20:09'),
(140, 'OSDS', 'Accounting', 'Printer', 'Maria Arliza Jade Berroy', 'N/A', 'EPSON L3110', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:21:01'),
(141, 'OSDS', 'Accounting', 'Laptop', 'Herald Marson B. Tolentino', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:24:30'),
(142, 'OSDS', 'Accounting', 'Laptop', 'Rozelle', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:25:12'),
(143, 'OSDS', 'Accounting', 'Laptop', 'Guio Maurice Santos', 'N/A', 'Lenovo Ideapad', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:28:09'),
(145, 'OSDS', 'Accounting', 'Laptop', 'Jonathan Chua', '697600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:34:50'),
(146, 'OSDS', 'Accounting', 'Laptop', 'Catherine Ablaza', '4E7600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:35:38'),
(147, 'OSDS', 'Accounting', 'Laptop', 'Mary Joy Arceo', 'DE7600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:36:19'),
(148, 'OSDS', 'Accounting', 'Laptop', 'Ma. Marjorie Grace F. Domingo', 'N/A', 'Lenovo Ideapad', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:37:14'),
(149, 'OSDS', 'Accounting', 'Laptop', 'Cristina Santos', '697600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:38:05'),
(150, 'OSDS', 'Accounting', 'Laptop', 'Sherlie Bautista', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:38:57'),
(151, 'OSDS', 'Accounting', 'Laptop', 'Maria Arliza Jade Berroy', 'P67600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:39:58'),
(152, 'OSDS', 'Accounting', 'Laptop', 'Randcel Christind R. Cruz', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:40:56'),
(153, 'OSDS', 'Accounting', 'Laptop', 'Ria Dela Cruz', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:42:23'),
(154, 'OSDS', 'Accounting', 'Laptop', 'Daryl Christian Francisco', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 15:43:49'),
(155, 'OSDS', 'Accounting', 'Laptop', 'Rosemarie Intal', 'N/A', 'Lenovo Ideapad', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:18:07'),
(156, 'OSDS', 'Accounting', 'Laptop', 'Cristalyn Mercado', 'N/A', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:19:20'),
(157, 'OSDS', 'Accounting', 'Laptop', 'Cristalyn Mercado', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:20:52'),
(158, 'OSDS', 'Accounting', 'Laptop', 'Judy Ann Pagtalunan', 'N/A', 'Lenovo Ideapad', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:22:40'),
(159, 'OSDS', 'Accounting', 'Laptop', 'Vea Dionnela Pangan', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:24:01'),
(160, 'OSDS', 'Accounting', 'Laptop', 'Vea Dionnela Pangan', 'N/A', 'ACER TRAVELMATE P', '2022', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:25:08'),
(161, 'OSDS', 'Accounting', 'Laptop', 'Shiella V. Sebastian', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:25:48'),
(162, 'OSDS', 'Accounting', 'Laptop', 'Shiella V. Sebastian', 'N/A', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:26:29'),
(163, 'OSDS', 'Accounting', 'Laptop', 'Lady Pauline Ycot', 'N/A', 'ACER ASPIRE', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:29:31'),
(164, 'OSDS', 'Budget', 'Desktop', 'Jerrylyn L. Santiago', 'MP1AAXRY', 'Lenovo All In One Desktop', '2018', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:30:49'),
(165, 'OSDS', 'Budget', 'Tablet', 'Jerrylyn L. Santiago', 'HVAORDRO', 'Lenovo TB X606X', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:31:47'),
(166, 'OSDS', 'Budget', 'Desktop', 'Ryan William Guevarra', 'SGH630QXP2', 'HP 285 G2 MT', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:32:58'),
(167, 'OSDS', 'Budget', 'Desktop', 'Dame Dominique R. Salamat', 'SGH630QXPM', 'HP 285 G2 MT', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:34:05'),
(168, 'OSDS', 'Budget', 'Printer', 'Dame Dominique R. Salamat', 'KNLD15283', 'Canon Pixma', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:35:13'),
(169, 'OSDS', 'Budget', 'Laptop', 'Donna Belle Bautista', 'N/A', 'Lenovo Ideapad', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:36:15'),
(170, 'OSDS', 'Budget', 'Laptop', 'Ryan William Guevarra', 'AE7600', 'ACER TRAVELMATE P', '2022', 'UNDER WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:36:56'),
(171, 'OSDS', 'Budget', 'Laptop', 'Dame Dominique R. Salamat', '5CG62841Q', 'HP 245 G5', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:38:00'),
(172, 'OSDS', 'Personnel Section', 'Desktop', 'Ma. Cristina C. Panganiban', 'SGH630QXPN', 'HP 285 G2 MT', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:39:29'),
(173, 'OSDS', 'Personnel Section', 'Desktop', 'Magdalena Lucillo', '408D5C47343', 'Intel Core i3-3240', '2015', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-20 16:41:02'),
(174, 'OSDS', 'Personnel Section', 'Printer', 'Magdalena Lucillo', 'N/A', 'EPSON L3110', '', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:22:09'),
(175, 'OSDS', 'Personnel Section', 'Laptop', 'Magdalena Lucillo', 'N/A', 'ACER Aspire', '2020', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:23:29'),
(176, 'OSDS', 'Personnel Section', 'Tablet', 'Magdalena Lucillo', 'HVAORDV9', 'Lenovo TB-X606X', '2021', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:25:32'),
(177, 'OSDS', 'Personnel Section', 'Desktop', 'Nellisa Antonette Susmirano', 'SGH630QXPO', 'HP 285 G2 MT', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:30:05'),
(178, 'OSDS', 'Personnel Section', 'Desktop', 'Patma Sadaya ', 'SGH630QXPT', 'HP 285 G2 MT', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:31:29'),
(179, 'OSDS', 'Personnel Section', 'Desktop', 'Micah Renielle Cruz', 'SGH630QXPG', 'HP 285 G2 MT', '2016', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:32:18'),
(180, 'OSDS', 'Personnel Section', 'Printer', 'Patma Sadaya ', 'X2QL001128', 'EPSON L385', '2017', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:34:33'),
(181, 'OSDS', 'Personnel Section', 'Printer', 'Jezreel Alcoreza', 'X2QL001136', 'EPSON L385', '2017', 'OUT OF WARRANTY', 'FUNCTIONAL', '', '2023-04-24 09:35:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
