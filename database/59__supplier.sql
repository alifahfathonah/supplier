-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 12:04 PM
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
-- Table structure for table `datafile`
--

CREATE TABLE IF NOT EXISTS `datafile` (
`kode_file` int(5) NOT NULL,
  `id_mat` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `datafile`
--

INSERT INTO `datafile` (`kode_file`, `id_mat`, `nama_file`, `gambar`) VALUES
(6, 'MAT0002', 'SURAT PERINTAH KERJA', 'MAT0002_HENDRI KP. GEBANG BARU.JPG');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `id_mat`, `harga`, `note`, `date_up`) VALUES
(3, 'MAT0013', 107000, '-', '2016-08-25'),
(4, 'MAT0005', 50000, 'Harga Lama', '2016-05-12'),
(6, 'MAT0001', 6000, '6000 Per Meter', '2014-03-07'),
(7, 'MAT0002', 146000000, 'Harga / Unit', '2012-06-21'),
(8, 'MAT0004', 41000000, 'Harga / Unit', '2012-06-21'),
(9, 'MAT0010', 24000000, 'Harga / Unit', '2012-06-21'),
(10, 'MAT0003', 110000000, 'Harga Termasuk PPN 10%', '2012-11-25'),
(11, 'MAT0006', 135300000, 'Harga Termasuk PPN 10%', '2012-12-26'),
(12, 'MAT0011', 14000000, 'Harga / Segmen 3.000.000', '2012-08-03'),
(13, 'MAT0012', 25000000, 'Belum Termasuk PPN 10%', '2012-10-29'),
(14, 'MAT0008', 43000000, 'Harga Belum Termasuk PPN 10%', '2012-10-29'),
(15, 'MAT0007', 2175195, 'Harga Termasuk PPN 10%', '2015-03-23'),
(16, 'MAT0014', 451000, 'Panjang Pipa 6 Mtr / Batang', '2016-08-12'),
(17, 'MAT0015', 248000, 'Panjang Pipa 6 Mtr / Batang', '2016-08-25'),
(18, 'MAT0016', 168000, 'Panjang Pipa 6 Mtr / Batang', '2016-08-25'),
(19, 'MAT0017', 375000, 'Per batang', '2016-08-25'),
(20, 'MAT0018', 230000, 'harga per batang', '2016-08-25'),
(21, 'MAT0019', 158000, 'Harga / Unit', '2016-08-25'),
(22, 'MAT0020', 608000, 'Harga / Unit', '2016-08-25'),
(23, 'MAT0021', 89000, 'Harga / Batang', '2016-08-25'),
(24, 'MAT0022', 46000, 'Per batang', '2016-08-25'),
(25, 'MAT0023', 88000, 'Per batang', '2016-08-25'),
(26, 'MAT0009', 42500, 'Per batang', '2016-08-25');

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
('MAT0001', 'SUP003', 'Kabel SR (NFA2x 4x10 mm2) 1 Hasbel 1000 Meter', 'Hasbel', 'Harga / Meter 6000'),
('MAT0002', 'SUP006', 'Trafo Distribusi 1250 KVA/20 KV_0.4 DYN 5 MERK Schneider Indonesia', 'Unit', 'Trafo'),
('MAT0003', 'SUP002', 'Trafo 630 KVA', 'Unit', 'Trafo, merk trafindo'),
('MAT0004', 'SUP006', 'Outgooing Cubicle Type QM Merk Schneider', 'Unit', 'mamang'),
('MAT0005', 'SUP005', 'Pipa Air 2 1/2" x 1.6 mm - 6 M (1.2mm)', 'Batang', 'Pipa galvanize, pipa pvc'),
('MAT0006', 'SUP002', 'Trafo 1000 Kva', 'Unit', 'Trafoo 1000 kva'),
('MAT0007', 'SUP004', 'Vendor Selection System (Self Ratting)', 'Unit', 'D&B Laporan Keuangan PLN '),
('MAT0008', 'SUP006', 'Outgooing Cubicle Type PFA/C430 Merk Schneider', 'Unit', 'Kubikel out Going'),
('MAT0009', 'SUP005', 'Siku 50 x 50 x 4 mm 6 Meter (45/2.3) 6.8 kG', 'Batang', 'Besi Siku'),
('MAT0010', 'SUP006', 'Incoming Cubicle Type IM Merk Schneider ', 'Unit', 'Kubikel IM'),
('MAT0011', 'SUP007', 'Jasa Sertifikasi Ketenagalistrikan SLO TM 20 KV', 'Segmen', 'SLO'),
('MAT0012', 'SUP006', 'Incoming Cubicle Type IS/C410 Merk Schneider ', 'Unit', 'Kubikel'),
('MAT0013', 'SUP005', 'Pipa Air 1 1/2" x 1.6 mm - 6 M (1.2mm)', 'Batang', 'Pipa galvanize, pipa pvc'),
('MAT0014', 'SUP005', 'Pipa Besi 5 inc 2.3 mm', 'Batang', 'Pipa 6 Meter / Unit'),
('MAT0015', 'SUP005', 'Pipa Besi 4 Inc 1.6 mm', 'Batang', 'Pipa Besi'),
('MAT0016', 'SUP005', 'Pipa Besi 3 Inc 1.6 mm', 'Batang', 'Pipa besi'),
('MAT0017', 'SUP005', 'UNP 120 x 55 x 7 mm - (6m) 50 Kg', 'Batang', 'Kanal UNP'),
('MAT0018', 'SUP005', 'UNP 100 x 55 x 5 mm - (6m) 36 Kg', 'Batang', 'Kanal UNP'),
('MAT0019', 'SUP005', 'UNP 80 x 45 x 5 mm - (6m) 25 KG', 'Batang', 'Kanal UNP'),
('MAT0020', 'SUP005', 'UNP 150 x 75 x 6.5 mm - (6m) 78 Kg', 'Batang', 'Kanal UNP'),
('MAT0021', 'SUP005', 'Siku 50 x 50 x 5 mm 6 Meter EQTF (48/4.6) 15 kG', 'Batang', 'Besi Siku'),
('MAT0022', 'SUP005', 'Beton 10 mm - 12 Meter RS (Tol 0.5 mm)', 'Batang', 'Besi behel'),
('MAT0023', 'SUP005', 'Strip 5/50 - 6 Meter', 'Batang', 'Besi Strip');

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
  `marketing` varchar(50) NOT NULL,
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

INSERT INTO `supplier` (`id_supp`, `nm_supp`, `marketing`, `alamat`, `telp`, `fax`, `rek`, `email`, `date_input`) VALUES
('SUP001', 'PT. Tonggak Ampuh', 'Bpk. Bowo Lelono', 'Jl. Kapten Piere Tendean No. 82 Jakarta / Jl. Mayor Oking Jaya Atmaja Gunung Putri Bogor Jakarta Cibinong - Bogor', '021-7900232', '021-7900230', '-', 'tapusat@idola.net.id', '2016-08-02'),
('SUP002', 'PT. Trafindo Prima Perkasa', '', 'Factory I :  Jl. Siliwangi RT. 04/04 Kel. Alam Jaya Kec. Jatiuwung Tangerang', '021-5903801', '021-5900601', 'Bank BCA Kcu : Gajah Mada : 012.301.028.8 (IDR) Ba', 'www.trafoindonesia.com', '2016-08-23'),
('SUP003', 'PT. Alum Central Mandiri Lestari', '', 'Jl. Raya Serang KM. 25.5 Desa Kaluwung No. 08 Kel. Cisereh Kec. Tigaraksa Tangerang (Kawasan Industri Kav. benua Permai Lestari RT. 10/04)', '021-5953482', '021-5953483', 'Bank BCA : Cabang Green Garden : 253.301.1667', '-', '2016-08-23'),
('SUP004', 'PT. D&B Indonesia', 'Bpk Vidi', 'Jl. Jendral Sudirman Kav. 33A Jakarta 10220 - Indonesia ', '021 57900979', '021-57900938', '(IDR) Bank Mandiri - 104-000-3000-994  (USD) 104-0', 'www.dnb.co.id', '2016-08-23'),
('SUP005', 'Depo Baja - Cipondoh', 'Ibu Yovi', 'Cipondh Tangerang', '021 22260777', '021 22260777', '-', '-', '2016-08-23'),
('SUP006', 'CV. Vircho Jaya Abadi', 'Ibu Sari Dewi', 'Jl. Pengasinan Raya No. 02 No. 86 Rawa Lumbu Bekasi', '021 8646328', '021 864328', 'Bank Permata : 0701292154', 'vircho_ja@hotmail.com', '2016-08-24'),
('SUP007', 'PT. Central Energi Positive', '', 'Jl. KH A Dahlan No. 4C Jakarta Timur 13140', '021 8580406', '021 58916105', 'Bank Bca : 342.3124888', 'centerpos888@yahoo.com', '2016-08-25');

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
(201383087, 'Hendri Y', 'hendrimamang@gmail.com3', '085715887703', 'ADMIN', '2014-05-01', '202cb962ac59075b964b07152d234b70'),
(201383088, 'Richard', 'admin@ivendor.co.id', '0215902758', 'DIVISI', '2015-07-24', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datafile`
--
ALTER TABLE `datafile`
 ADD PRIMARY KEY (`kode_file`);

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
-- AUTO_INCREMENT for table `datafile`
--
ALTER TABLE `datafile`
MODIFY `kode_file` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
MODIFY `id_harga` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
