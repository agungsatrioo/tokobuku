-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 09:36 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(254) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `noisbn` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga_pokok` int(50) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `ppn` int(50) NOT NULL,
  `diskon` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `harga_jual`, `ppn`, `diskon`) VALUES
(1, 'The Meanings', '151612-019187', 'Erick Halfling', 'British Book Publishing', 2016, 100, 45997, 46509, 10, 0),
(2, 'The Meanings 2', '151612-013389', 'Erick Halfling', 'British Book Publishing', 2017, 100, 46998, 48509, 10, 0),
(3, 'Cinta Suci', '181281', 'Radi Sativa', 'Citakarya', 1998, 22, 3333, 4444, 0, 10),
(4, 'Unbelieved', '213-9089', 'Hendrick Litaay', 'Nusamedia', 2012, 122, 56754, 58907, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE IF NOT EXISTS `distributor` (
  `id_distributor` int(254) NOT NULL,
  `nama_distributor` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(1, 'Hend', 'Juans', '22343'),
(2, 'Kenna', 'Cikalong', '45454'),
(3, 'Miing', 'Jl. Maginda', '092332442');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int(254) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`) VALUES
(1, 'Ganang', 'Jegar Raya', '43435454', 2, 'ganangan.air', '0d61130a6dd5eea85c2c5facfe1c15a7', 1),
(2, 'Babamnhg', 'aaaaaaaa', '343454354', 78, 'ciciak', '035a764ed7b5dd4125e3c6698a986a4a', 1),
(3, 'Admin', 'ea', '1', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2),
(4, 'Kiki', 'Cijaura Barat', '099894435', 0, 'kiki.situra', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE IF NOT EXISTS `pasok` (
  `id_pasok` int(254) NOT NULL,
  `id_distributor` int(254) NOT NULL,
  `id_buku` int(254) NOT NULL,
  `jumlah` int(254) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(1, 2, 1, 99, '2017-09-07'),
(2, 1, 2, 76, '2017-02-15'),
(3, 1, 1, 99, '2016-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(254) NOT NULL,
  `id_buku` int(254) NOT NULL,
  `id_kasir` int(254) NOT NULL,
  `jumlah` int(254) NOT NULL,
  `total` int(254) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_buku`, `id_kasir`, `jumlah`, `total`, `tanggal`) VALUES
(2, 1, 1, 7, 88876, '2017-02-15'),
(6, 1, 3, 0, 0, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`), ADD KEY `id_distributor` (`id_distributor`), ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`), ADD KEY `id_buku` (`id_buku`), ADD KEY `id_kasir` (`id_kasir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(254) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(254) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(254) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(254) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(254) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasok`
--
ALTER TABLE `pasok`
ADD CONSTRAINT `pasok_ibfk_1` FOREIGN KEY (`id_distributor`) REFERENCES `distributor` (`id_distributor`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pasok_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
