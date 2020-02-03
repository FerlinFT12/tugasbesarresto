-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2020 at 03:21 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

DROP TABLE IF EXISTS `bahan_baku`;
CREATE TABLE IF NOT EXISTS `bahan_baku` (
  `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bahanbaku` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_bahanbaku`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahanbaku`, `nama_bahanbaku`, `stok`, `id`) VALUES
(7, 'Garam', 500, 1),
(8, 'Beras', 50, 1),
(9, 'Kecap', 20, 1),
(10, 'Masako', 30, 1),
(11, 'Bawang Merah', 3, 1),
(12, 'Cabai', 10, 1),
(13, 'Telor', 5, 3),
(14, 'Beras Merah', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

DROP TABLE IF EXISTS `detail_pesanan`;
CREATE TABLE IF NOT EXISTS `detail_pesanan` (
  `id_detailpesanan` int(11) NOT NULL AUTO_INCREMENT,
  `no_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id_detailpesanan`),
  KEY `id_menu` (`id_menu`),
  KEY `no_pesanan` (`no_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detailpesanan`, `no_pesanan`, `id_menu`, `jumlah`, `total_harga`) VALUES
(278, 1, 10, 2, 80000),
(279, 1, 13, 2, 20000),
(281, 1, 12, 1, 8000),
(284, 2, 9, 2, 30000),
(285, 2, 14, 2, 10000),
(288, 3, 9, 2, 30000),
(289, 3, 9, 2, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

DROP TABLE IF EXISTS `kuesioner`;
CREATE TABLE IF NOT EXISTS `kuesioner` (
  `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT,
  `no_pembayaran` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_kuesioner`),
  KEY `id` (`id`),
  KEY `no_pembayaran` (`no_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

DROP TABLE IF EXISTS `meja`;
CREATE TABLE IF NOT EXISTS `meja` (
  `id_meja` int(11) NOT NULL AUTO_INCREMENT,
  `no_meja` varchar(11) NOT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `jenis_menu`, `id`) VALUES
(9, 'Ayam Geprek', 15000, 'Ayam', 1),
(10, 'Cumi Cumi Saus Tiram', 40000, 'Seafood', 1),
(11, 'Ayam Panggang ', 25000, 'Ayam', 1),
(12, 'Sop Buntut ', 8000, 'Sup', 1),
(13, 'Jus Alpukat ', 10000, 'Seafood', 1),
(14, 'Kopi Hitam ', 5000, 'Seafood', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `bagian`) VALUES
(1, 'andri', 'andri123', 'pelayan'),
(2, 'rudiansyaht', 'rudi1234567890', 'koki'),
(3, 'jinggasurya', 'putihkelabu', 'pantry'),
(4, 'heriansyahp', 'heriansyahputra', 'kasir'),
(5, 'rinirina','rinisurina', 'cs');


-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `no_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `no_pesanan` int(11) NOT NULL,
  `waktu_bayar` timestamp NOT NULL,
  `bayar` int(11) NOT NULL,
  PRIMARY KEY (`no_pembayaran`),
  KEY `no_pesanan` (`no_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no_pembayaran`, `no_pesanan`, `waktu_bayar`, `bayar`) VALUES
(18, 1, '2020-02-02 18:10:20', 108000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
  `no_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_meja` int(11) NOT NULL,
  `waktu_pesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_pelanggan` varchar(50) NOT NULL,
  PRIMARY KEY (`no_pesanan`),
  KEY `id_meja` (`id_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `id_meja`, `waktu_pesanan`, `nama_pelanggan`) VALUES
(1, 2, '2020-02-02 18:03:38', 'Andri'),
(2, 1, '2020-02-02 18:05:01', 'Sandi'),
(3, 3, '2020-02-02 18:07:43', 'Devi');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

DROP TABLE IF EXISTS `resep`;
CREATE TABLE IF NOT EXISTS `resep` (
  `id_menu` int(11) NOT NULL,
  `id_bahanbaku` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  KEY `id_menu` (`id_menu`),
  KEY `id_bahanbaku` (`id_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`);

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`);

--
-- Constraints for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD CONSTRAINT `kuesioner_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `kuesioner_ibfk_2` FOREIGN KEY (`no_pembayaran`) REFERENCES `pembayaran` (`no_pembayaran`) ON DELETE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`id`) REFERENCES `pegawai` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`no_pesanan`) REFERENCES `pesanan` (`no_pesanan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`) ON DELETE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE,
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id_bahanbaku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
