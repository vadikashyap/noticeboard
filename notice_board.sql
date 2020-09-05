-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 06:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notice_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(15) NOT NULL,
  `branch` varchar(15) NOT NULL,
  `erno` int(16) NOT NULL,
  `status` varchar(15) NOT NULL,
  `submit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `username`, `password`, `email`, `mobile`, `branch`, `erno`, `status`, `submit`) VALUES
(1, 'demo', 'demo', 'dwqlk@gmail.com', 78412, 'Computer', 9865, 'Student', ''),
(3, 'abc', 'abc', 'dwqlk@gmail.com', 2147483647, 'Computer', 894615265, 'Student', ''),
(4, 'vadi', 'vadi', 'vadi@gmail.com', 2147483647, 'Civil', 2147483647, 'Admin', ''),
(5, 'jai', 'jai', 'jai@gmail.com', 77777777, 'Computer', 741085296, 'sadkj', ''),
(6, 'dev', 'dev', 'dev@gmail.com', 778787588, 'Computer', 741852, 'Teacher', ''),
(7, 'aaa', 'aaa', 'aa@gmail.com', 2147483647, 'Electrical', 2147483647, 'Student', ''),
(8, 'zzz', 'zzz', 'demo@gmail.com', 2147483647, 'Electrical', 2147483647, 'Teacher', ''),
(9, 'jadeja', 'jadeja', 'asdaf@gmail.com', 2147483647, 'Electrical', 9865230, 'Teacher', ''),
(11, 'teach', 'TEACH', 'FJKLAX21212@GMAIL.COM', 2147483647, 'Mechanical', 36480, 'Teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `notice` mediumtext NOT NULL,
  `photo` varchar(500) NOT NULL,
  `branch` varchar(15) NOT NULL,
  `teachername` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `submit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `subject`, `notice`, `photo`, `branch`, `teachername`, `date`, `submit`) VALUES
(1, 'demo', 'demokfmd\r\nf[fdl;f d fdlf f\r\nf,fdlvfvfdvkfmfv  \r\nfflflf\r\nfvlfmdflfd\r\nfdmfkmvfmvdfmk', '20180809_003651.jpg', 'Computer', 'vadi', '2020-01-21', ''),
(5, 'update', 'poklkkkkkkkk kkkkkkkkkkk ddddddddd\r\nodksodmcsdsl cjl lkc lds ckl dkc lksd cls dsddslkkds', '', 'Admin', 'vadi', '2020-01-23', ''),
(7, 'aaaaaaadd', 'skdnsalkcnlkjds cjsd jc jds jsd j  sdjl ds\r\nfdp kdff  kfdm lfd ds\r\nvkpfsdvkvdf m vjd kl dk kds7\r\nc\r\nsd[lcjsd clm', '', 'Computer', 'dev', '2020-01-26', ''),
(11, 'eeeeee', 'fsadcsadcffc d cds c sd csda\r\nhkmgmhhgnhgnhgn\r\n', '', 'Computer', 'dev', '2020-02-13', ''),
(13, 'adsdfdhh', 'jkcvs,d,vnmvnnv dskns \r\n ssk pskv\r\ndpdcs[\r\n\r\n', 'demo2.jpg', 'Electrical', 'zzz', '2020-01-26', ''),
(17, 'chek photo', 'sdndnndndnnnnnnn\r\nphoto', '', 'Admin', 'vadi', '2020-02-14', ''),
(18, 'aa', 'aa', 'http://[::1]/Dev-Notice/upload/IMG_20170110_225543.jpg', 'Admin', 'vadi', '2020-02-14', ''),
(19, 'check file', 'photo with file', 'http://[::1]/Dev-Notice/upload/20180809_003651.jpg', 'Admin', 'vadi', '2020-02-14', ''),
(20, 'testtttttttttttttttt', 'jsdckjc sc hs ', 'http://[::1]/Dev-Notice/upload/15.jpg', 'Admin', 'vadi', '2020-02-21', ''),
(21, 'mech dem', 'odjnc dsjc cds cjsd\r\ncsdj cds ckds cjsd c s\r\nnsd dks', 'Silver_Jewellery_Pendants_PD056ag_1.jpg', 'Mechanical', 'teach', '2020-02-23', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
