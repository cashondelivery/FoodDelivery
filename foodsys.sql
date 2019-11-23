-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 12:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(6, 'SET'),
(7, 'CHOICE');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `description` varchar(200) NOT NULL,
  `custid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `location_status` tinyint(1) DEFAULT '0',
  `pay` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `lat`, `lng`, `description`, `custid`, `staffid`, `location_status`, `pay`, `modified_on`) VALUES
(34, 6.423559, 100.284904, 'rumah fadhil', 23, 0, 0, 0, '2019-11-23 08:30:20'),
(35, 6.440617, 100.267395, 'rumah satu', 23, 5, 1, 0, '2019-11-23 08:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `description`, `photo`) VALUES
(14, 7, 'Air Tea O Ais', 1, 'Tea O Ais', 'upload/teao_1573216823.jpg'),
(15, 7, 'Air Sirap', 1, 'Air Sirap', 'upload/sirap_1573217025.jpg'),
(16, 6, 'Set A', 5, 'Nasi Lemak + Ayam Goreng + Sambal + Air Bandung', 'upload/nasilemak_1573219957.jpg'),
(17, 6, 'Set B', 4, 'Nasi Goreng Cina + Air Sirap', 'upload/nasicina_1573221729.png'),
(20, 6, 'Set C', 4, 'Nasi Putih + Ayam Goreng + Air Sirap Limau', 'upload/nasisirap_1573221904.JPG'),
(21, 7, 'Air Milo', 2, 'Air Milo', 'upload/milo_1573217298.jpg'),
(22, 7, 'Air Nescafe', 2, 'Air Nescafe', 'upload/nescafe_1573217198.jpg'),
(23, 6, 'Set D', 6, 'Nasi Briyani + Air Sirap', 'upload/nasibri_1573222011.jpg'),
(24, 7, 'Nasi Ayam', 4, 'Nasi putih + Ayam Goreng', 'upload/nasiayam_1573216394.jpeg'),
(25, 7, 'Nasi Daging', 3.5, 'Nasi putih + Daging Masak Hitam ', 'upload/nasidaging_1573216239.jpg'),
(26, 7, 'Nasi Udang', 4.5, 'Nasi putih + Udang Sambal', 'upload/nasiudang_1573216592.JPG'),
(27, 7, 'Air Kosong', 0.2, 'Ais Kosong || Air Kosong', 'upload/aiskosong_1573217742.jpg'),
(29, 7, 'Spagetti', 3, 'Spagetti', 'upload/spagetti_1573222060.png');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(95, 'fadhillah', 26, '2019-11-20 21:59:02'),
(96, 'fadhillah', 22, '2019-11-22 23:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `custid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `custname` varchar(255) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `custid`, `quantity`, `custname`, `modified_on`) VALUES
(139, 95, 16, 23, 2, 'fadhillah', '2019-11-20 13:59:02'),
(140, 95, 17, 23, 4, 'fadhillah', '2019-11-20 13:59:02'),
(141, 96, 16, 23, 2, 'fadhillah', '2019-11-22 15:19:03'),
(142, 96, 17, 23, 3, 'fadhillah', '2019-11-22 15:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `number`, `address`, `modified_on`) VALUES
(23, 'fadhillah', 'fadhil.der97@gmail.com', 'Fadhillah97', '60195047468', 'Pokok Sena', '2019-11-22 15:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `registeradmin`
--

CREATE TABLE `registeradmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registeradmin`
--

INSERT INTO `registeradmin` (`id`, `name`, `email`, `password`, `number`, `address`, `modified_on`) VALUES
(2, 'fadhil', 'admin@gmail.com', '123', '123', '1123', '2019-09-17 20:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `registerstaff`
--

CREATE TABLE `registerstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registerstaff`
--

INSERT INTO `registerstaff` (`id`, `name`, `email`, `password`, `number`, `address`, `modified_on`) VALUES
(5, 'diel', 'diel@gmail.com', 'diel', '2147483647', 'Kuala Nerang', '2019-11-22 16:55:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `registeradmin`
--
ALTER TABLE `registeradmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `registerstaff`
--
ALTER TABLE `registerstaff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `registeradmin`
--
ALTER TABLE `registeradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registerstaff`
--
ALTER TABLE `registerstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
