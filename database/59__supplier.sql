-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 06:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `59. supplier`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE IF NOT EXISTS `harga` (
`id_harga` int(5) NOT NULL,
  `id_mat` varchar(10) NOT NULL,
  `harga` double NOT NULL,
  `note` varchar(30) NOT NULL,
  `date_up` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `id_mat`, `harga`, `note`, `date_up`) VALUES
(1, 'MAT0002', 10000000, 'harga baru', '2016-05-14'),
(2, 'MAT0002', 20000, 'harga baru', '2016-05-14'),
(3, 'MAT0013', 107000, '-', '2016-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id_mat` varchar(7) NOT NULL,
  `id_supp` varchar(7) NOT NULL,
  `nm_mat` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id_mat`, `id_supp`, `nm_mat`, `satuan`, `keyword`) VALUES
('MAT0001', 'SUP001', 'Tiang listrik', 'Batang', 'tiang 9/200'),
('MAT0002', 'SUP002', 'Batu pengaman PLN', 'Buah', 'batu'),
('MAT0003', 'SUP003', 'Cyber Lock', 'Buah', 'Cyber, gembok, pln'),
('MAT0004', 'SUP002', 'Kanal UNP 150', 'Batang', 'kanal, unp'),
('MAT0005', 'SUP005', 'Pipa Air 2 1/2" x 1.6 mm - 6 M (1.2mm)', 'Batang', 'Pipa galvanize, pipa pvc'),
('MAT0006', 'SUP003', 'SOON-T 1000 W', 'Buah', 'lampu soon pju'),
('MAT0007', 'SUP002', 'BSN 1000 L 02', 'Buah', 'lampu pju soon'),
('MAT0008', 'SUP003', 'SN 56', 'Buah', 'LAMPU PJU'),
('MAT0009', 'SUP002', 'SN-58', 'Buah', 'Lampu PJU'),
('MAT0010', 'SUP002', 'CP 32 ETC28 2', 'Buah 2', 'Lampu Pju 2'),
('MAT0011', 'SUP006', 'SON-T 150 W', 'Buah', 'Lampu Pju'),
('MAT0012', 'SUP006', 'Lampu Soon Philips', 'Buah', 'Lampu Pju'),
('MAT0013', 'SUP005', 'Pipa Air 1 1/2" x 1.6 mm - 6 M (1.2mm)', 'Batang', 'Pipa galvanize, pipa pvc');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(4) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `folder` varchar(30) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `parent` int(4) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `urut` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `title`, `folder`, `link`, `level`, `parent`, `icon`, `urut`) VALUES
(1, 'Material', '#', '#', 'HRD', 0, 'glyphicon glyphicon-shopping-cart', 1),
(3, 'Supplier', 'supplier', 'supplier', 'HRD', 7, 'glyphicon glyphicon-menu-down', 2),
(4, 'Data Material', 'material', 'material', 'DIVISI', 1, 'glyphicon glyphicon-send', 1),
(7, 'Master', 'Master', '#', 'HRD', 0, 'glyphicon glyphicon-link', 1),
(8, 'menu', 'menu', 'menu', 'HRD', 7, 'glyphicon glyphicon-paperclip', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supp` varchar(6) NOT NULL,
  `nm_supp` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `rek` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supp`, `nm_supp`, `alamat`, `telp`, `fax`, `rek`, `email`, `date_input`) VALUES
('SUP001', 'PT. Tonggak Ampuh', 'Gunung Putri Bogor Jawa Barat', '085715887704', '02159309136', '155- Bank Mandiri', 'savedokumen@gmail.com', '2016-08-02'),
('SUP002', 'PT. Alum Central Mandiri', 'Balaraja Tangerang Banten Indonesia', '085715887704', '02159309136', '155- Bank Mandiri', 'admin@bandarsip.com', '2016-08-23'),
('SUP003', 'PT. Intisiar Solusindo', 'Jakarta Indonesia', '085715887704', '02159309136', '155-000064283-8 Bank mandiri', 'hendriyulianto1992@gmail.com', '2016-08-23'),
('SUP004', 'PT.  Soll Marina Properti Indonesia', 'JL. Tali Raya NO. 35 Kota Bambu Selatan  Pal Merah Jakarta', '085715887704', '02159309136', 'Bank Bukopin 100502461', 'hendriyulianto1992@gmail.com', '2016-08-23'),
('SUP005', 'Depo Baja - Cipondoh', 'Cipondh Tangerang', '021 22260777', '021 22260777', '-', '-', '2016-08-23'),
('SUP006', 'PT.  Putra Cahaya sejati', 'Jl. Gunung sahari raya No. 41 Gunung sahari ', '021-5902758', '021-59302758', '155-000064283-8 Bank mandiri', 'savedokumen@gmail.com', '2016-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(9) NOT NULL,
  `nm_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `date_reg` date NOT NULL,
  `password` varchar(150) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nm_lengkap`, `email`, `telp`, `level`, `date_reg`, `password`) VALUES
(201383087, 'Hendri Y', 'hendrimamang@gmail.com3', '085715887703', 'HRD', '2014-05-01', '202cb962ac59075b964b07152d234b70'),
(201383088, 'Richard', 'admin@ivendor.co.id', '0215902758', 'DIVISI', '2015-07-24', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
 ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
 ADD PRIMARY KEY (`id_mat`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
MODIFY `id_harga` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
