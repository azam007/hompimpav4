-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2017 at 10:03 AM
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
-- Database: `hompimpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `piket`
--

CREATE TABLE `piket` (
  `id` int(11) NOT NULL,
  `tugas` varchar(40) NOT NULL,
  `orang` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piket`
--

INSERT INTO `piket` (`id`, `tugas`, `orang`, `status`) VALUES
(6, 'Area 1', 2, 1),
(7, 'Area 2', 2, 1),
(8, 'Area 3', 2, 1),
(9, 'Area 4', 2, 1),
(10, 'Area 5', 2, 1),
(11, 'WC 1', 1, 0),
(12, 'WC 2', 1, 0),
(13, 'WC 3', 1, 0),
(14, 'WC 4', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id`, `name`, `status`) VALUES
(38, 'Ahsan', 1),
(39, 'Andre', 1),
(40, 'New Ahsan', 1),
(41, 'Qois', 1),
(42, 'Ridwan', 1),
(43, 'Muis', 1),
(44, 'Umar', 1),
(45, 'Azam', 0),
(46, 'Firman', 1),
(47, 'Yoko', 1),
(48, 'Ali', 0),
(49, 'Iqbar', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `piket`
--
ALTER TABLE `piket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `piket`
--
ALTER TABLE `piket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
