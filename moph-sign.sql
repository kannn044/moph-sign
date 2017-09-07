-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2017 at 09:50 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moph-sign`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'กลุ่มพัฒนามาตราฐานและบริการคอมพิวเตอร์'),
(2, 'ฝ่ายบริหารงานทั่วไป'),
(3, 'กลุ่มคอมพิวเตอร์และเครือข่าย'),
(5, 'กลุ่มพัฒนาการบริหารข้อมูล'),
(6, 'กลุ่มบริหารเทคโนโลยีสารสนเทศเพื่อการจัดการ'),
(7, 'กลุ่มผู้อำนวยการ ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `cid` varchar(13) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `inout` varchar(20) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `cid`, `time`, `inout`, `note`) VALUES
(33, '1100400728564', '2017-08-24 06:52:17', 'in', ''),
(34, '1100400728564', '2017-08-24 06:52:38', 'out', ''),
(37, '1269900203174', '2017-08-24 01:29:11', 'in', NULL),
(38, '1269900203174', '2017-08-24 09:40:00', 'out', NULL),
(39, '1100400728564', '2017-09-06 01:29:22', 'in', NULL),
(40, '1100400758564', '2017-06-07 09:55:22', 'out', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'นักวิชาการคอมพิวเตอร์'),
(2, 'นักบริหารงานทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'ข้าราชการ'),
(2, 'พนักงานราชการ'),
(3, 'เจ้าหน้าที่เหมาจ่าย'),
(4, 'เจ้าหน้าที่บริษัท');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `cid` varchar(13) NOT NULL,
  `prename` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `depid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `type` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`cid`, `prename`, `name`, `lname`, `depid`, `pid`, `type`, `status`, `start_date`, `end_date`) VALUES
('1', 'นางสาว', 'วันเพ็ญ', 'เบญจวิกรัย', 2, 1, 1, 1, '0000-00-00', NULL),
('1100400728564', 'นาย', 'ณภัทรวัฒน์', 'สามพวงทอง', 1, 1, 4, 1, '0000-00-00', NULL),
('1269900203174', 'นาย', 'กัญจน์', 'เข็มนาค', 3, 1, 4, 1, '0000-00-00', NULL),
('1509901041302', 'นางสาว', 'ศิรินทร์ญา', 'อนุพงค์', 1, 1, 3, 1, '0000-00-00', NULL),
('2', 'นางสาว', 'สวพร', 'ใบศรี', 1, 2, 1, 1, '0000-00-00', NULL),
('3', 'นางสาว', 'ณัฐกุล', 'ชูสิทธิ์', 1, 1, 2, 1, '0000-00-00', NULL),
('5', 'นาง', 'กนกวรรณ', 'มาป้อง', 1, 1, 1, 1, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_log`
-- (See below for the actual view)
--
CREATE TABLE `view_log` (
`cid` varchar(13)
,`prename` varchar(255)
,`name` varchar(255)
,`lname` varchar(255)
,`date` varchar(10)
,`time_in` varchar(8)
,`time_out` varchar(8)
,`note` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_log`
--
DROP TABLE IF EXISTS `view_log`;
-- in use(#1046 - No database selected)

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
