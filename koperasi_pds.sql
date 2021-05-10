-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2013 at 11:23 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koperasi_pds`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `noanggota` char(10) NOT NULL,
  `namaanggota` varchar(50) NOT NULL,
  `jk` char(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` char(30) NOT NULL,
  `noidentitas` char(30) NOT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`noanggota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`noanggota`, `namaanggota`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `hp`, `noidentitas`, `pwd`) VALUES
('A001', 'Asep Setiawan', 'L', 'Bandung', '1979-08-05', 'Cimuncang', '089657241465', '12345678910', '4b2770de9b8e1d12df1be94c096cfc29'),
('A006', 'saja', 'L', 's', '2012-07-01', 's', '08777484848', '3261584', '4b2770de9b8e1d12df1be94c096cfc29'),
('A005', 'Raji', 'L', 'a', '2012-07-01', 'a', '0813234235', '12345678', '4b2770de9b8e1d12df1be94c096cfc29'),
('A009', 'Udin', 'L', 'Pandeglang', '2012-07-01', 'Cimuncang Sidomuncul - Serang', '0254', '12345', '4b2770de9b8e1d12df1be94c096cfc29'),
('A011', 'PIKSI', 'L', 'Serang', '2012-07-18', 'Serang', '0812111222', '123456', 'eb77462907d3ba4aa318421e3da4f77b'),
('A002', 'Tes Dulu', 'L', 'Serang', '2012-03-01', 'tes', '08777333444', '09238782349', '4b2770de9b8e1d12df1be94c096cfc29');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpan`
--

CREATE TABLE IF NOT EXISTS `jenis_simpan` (
  `id_jenis` char(2) NOT NULL,
  `jenis_simpanan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_simpan`
--

INSERT INTO `jenis_simpan` (`id_jenis`, `jenis_simpanan`, `jumlah`) VALUES
('01', 'Simpanan Pokok', 50000),
('02', 'Simpanan Wajib', 30000),
('03', 'Simpanan Sukarela', 0),
('04', 'tes', 20000),
('05', 'Tes', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE IF NOT EXISTS `pengambilan` (
  `id_ambil` char(10) NOT NULL,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ambil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_detail`
--

CREATE TABLE IF NOT EXISTS `pinjaman_detail` (
  `id_pinjam` char(10) NOT NULL,
  `cicilan` smallint(6) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `bunga` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_pinjam`,`cicilan`),
  KEY `id_pinjam` (`id_pinjam`,`cicilan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman_detail`
--

INSERT INTO `pinjaman_detail` (`id_pinjam`, `cicilan`, `angsuran`, `bunga`, `tgl_bayar`, `jumlah_bayar`) VALUES
('P0001', 1, 833333, 125000, '2012-07-05', 960000),
('P0001', 6, 833333, 125000, '2012-07-25', 960000),
('P0001', 3, 833333, 125000, '2012-08-02', 658500),
('P0001', 4, 833333, 125000, '0000-00-00', 0),
('P0001', 5, 833333, 125000, '0000-00-00', 0),
('P0001', 2, 833333, 125000, '2012-07-05', 658500),
('P0002', 1, 416667, 20833, '2012-07-26', 450000),
('P0002', 7, 416667, 20833, '0000-00-00', 0),
('P0002', 8, 416667, 20833, '0000-00-00', 0),
('P0002', 9, 416667, 20833, '0000-00-00', 0),
('P0002', 2, 416667, 20833, '2012-07-27', 450000),
('P0002', 10, 416667, 20833, '0000-00-00', 0),
('P0002', 11, 416667, 20833, '0000-00-00', 0),
('P0002', 12, 416667, 20833, '0000-00-00', 0),
('P0002', 13, 416667, 20833, '0000-00-00', 0),
('P0002', 14, 416667, 20833, '0000-00-00', 0),
('P0002', 15, 416667, 20833, '0000-00-00', 0),
('P0002', 16, 416667, 20833, '0000-00-00', 0),
('P0002', 17, 416667, 20833, '0000-00-00', 0),
('P0002', 18, 416667, 20833, '0000-00-00', 0),
('P0002', 19, 416667, 20833, '0000-00-00', 0),
('P0002', 20, 416667, 20833, '0000-00-00', 0),
('P0002', 21, 416667, 20833, '0000-00-00', 0),
('P0002', 22, 416667, 20833, '0000-00-00', 0),
('P0002', 23, 416667, 20833, '0000-00-00', 0),
('P0002', 24, 416667, 20833, '0000-00-00', 0),
('P0002', 5, 416667, 20833, '0000-00-00', 0),
('P0002', 4, 416667, 20833, '0000-00-00', 0),
('P0002', 6, 416667, 20833, '0000-00-00', 0),
('P0002', 3, 416667, 20833, '2012-08-04', 450000),
('P0003', 1, 1333333, 66667, '0000-00-00', 0),
('P0003', 2, 1333333, 66667, '0000-00-00', 0),
('P0003', 3, 1333333, 66667, '0000-00-00', 0),
('P0003', 5, 1333333, 66667, '0000-00-00', 0),
('P0003', 6, 1333333, 66667, '0000-00-00', 0),
('P0003', 4, 1333333, 66667, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_header`
--

CREATE TABLE IF NOT EXISTS `pinjaman_header` (
  `id_pinjam` char(10) NOT NULL,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lama` smallint(6) NOT NULL,
  `bunga` smallint(6) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman_header`
--

INSERT INTO `pinjaman_header` (`id_pinjam`, `tgl`, `noanggota`, `jumlah`, `lama`, `bunga`, `user_id`) VALUES
('P0001', '2012-07-25', 'A001', 5000000, 6, 15, 'admin'),
('P0002', '2012-07-26', 'A001', 10000000, 24, 5, ''),
('P0003', '2012-07-29', 'A001', 8000000, 6, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE IF NOT EXISTS `simpanan` (
  `id_simpanan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `noanggota` char(10) NOT NULL,
  `id_jenis` char(2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id_simpanan`),
  KEY `noanggota` (`noanggota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `tgl`, `noanggota`, `id_jenis`, `jumlah`, `user_id`) VALUES
(1, '2012-07-25', 'A001', '01', 50000, 'admin'),
(2, '2012-07-25', 'A001', '02', 30000, 'admin'),
(6, '2012-07-25', 'A001', '03', 60000, 'admin'),
(7, '2012-07-26', 'A001', '03', 60000, ''),
(8, '2012-07-27', 'A001', '03', 100000, 'admin'),
(9, '2012-07-28', 'A001', '03', 100000, 'admin'),
(10, '2012-08-02', 'A001', '03', 80000, ''),
(11, '2012-08-02', 'A001', '03', 70000, ''),
(12, '2012-08-03', 'A001', '03', 70000, ''),
(13, '2013-03-09', 'A001', '01', 50000, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3'),
('piksi', 'eb77462907d3ba4aa318421e3da4f77b'),
('saya', '20c1a26a55039b30866c9d0aa51953ca');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
