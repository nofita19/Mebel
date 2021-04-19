-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 02:31 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mebel`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_kode` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `barang_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_bahan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga_asli` int(11) NOT NULL DEFAULT 0,
  `biaya_produksi` int(11) NOT NULL,
  `biaya_tukang` int(11) NOT NULL,
  `biaya_distribusi` int(11) NOT NULL,
  `biaya_lainlain` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `harga_tunai` int(20) NOT NULL,
  `harga_kredit_bulananan` int(20) NOT NULL,
  `harga_kredit_musiman` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_kode`, `barang_nama`, `jenis_bahan`, `type barang`, `harga_asli`, `biaya_produksi`, `biaya_tukang`, `biaya_distribusi`, `biaya_lainlain`, `keuntungan`, `harga_tunai`, `harga_kredit_bulananan`, `harga_kredit_musiman`) VALUES
('MAS10', 'Maspion', 'KAT1', 'Maspion Kipas Baru', 82, 0, 0, 0, 0, 0, 120000, 100000, 0),
('PHIL001', 'Philip Lampu', 'LAMP', 'Philip 12watt', 8, 0, 0, 0, 0, 0, 80000, 0, 0),
('SAM100', 'Samsung TV', 'TV', 'TV 52inc', 72, 0, 0, 0, 0, 0, 6200000, 6100000, 6000000),
('SAM2100', 'Samsung 2100', 'KAT1', 'Samsung Kipas', 26, 0, 0, 0, 0, 0, 210000, 200000, 180000),
('TOS10', 'Toshiba 21', 'TV', '', 91, 0, 0, 0, 0, 0, 1600000, 1500000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_detailtransaksi` int(11) NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `angsuran_ke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_bayar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_detailtransaksi`, `id_transaksi`, `angsuran_ke`, `total_bayar`, `tanggal`) VALUES
(48, 'RETP1466610553', '120000', '120000', '2016-06-22 15:58:25'),
(49, 'RETP1466610553', '12000', '12000', '2016-06-22 15:58:25'),
(50, 'TRX001', '100000', '100000', '2016-06-26 14:26:52'),
(51, 'TRX001', '70000', '70000', '2016-06-26 14:26:52'),
(52, 'TRX001', '750000', '3000000', '2016-06-26 14:26:53'),
(54, 'RETP1466951903', '750000', '750000', '2016-06-26 14:38:23'),
(55, 'RETP1467027787', '120000', '120000', '2016-06-27 11:43:07'),
(56, 'RETP1466951256', '750000', '750000', '2016-06-30 08:56:09'),
(58, 'RETP1466951903', '750000', '750000', '2016-06-30 08:57:36'),
(59, 'RETP1467027787', '120000', '120000', '2016-06-30 08:58:02'),
(61, 'RETP1467277500', '120000', '120000', '2016-06-30 09:05:31'),
(62, 'RETP1467277695', '6200000', '6200000', '2016-06-30 09:08:15'),
(63, 'RETP1467277695', '6200000', '6200000', '2016-06-30 09:08:52'),
(64, 'RETP1467277877', '6200000', '6200000', '2016-06-30 09:11:17'),
(66, 'RETP1467277877', '6200000', '6200000', '2016-06-30 09:18:58'),
(67, 'TRX0012', '120000', '120000', '2016-06-30 15:40:58'),
(68, 'TRX0012', '320000', '3200000', '2016-06-30 15:40:58'),
(69, 'TRX123', '23328', '256608', '2016-06-30 17:26:21'),
(70, 'RETP1474810256', '210000', '210000', '2016-09-25 13:30:56'),
(71, 'RETP1474810256', '120000', '120000', '2016-09-25 13:30:56'),
(72, 'RETP1474810333', '210000', '210000', '2016-09-25 13:32:13'),
(73, 'RETP1474810333', '120000', '120000', '2016-09-25 13:32:13'),
(74, 'RETP1474810385', '210000', '210000', '2016-09-25 13:33:05'),
(75, 'RETP1474810385', '120000', '120000', '2016-09-25 13:33:05'),
(77, 'RETP1474810569', '210000', '210000', '2016-09-25 13:37:47'),
(78, 'RETP1474810569', '120000', '120000', '2016-09-25 13:37:47'),
(79, 'RETP1474810256', '210000', '210000', '2016-09-25 13:41:09'),
(80, 'RETP1474810256', '120000', '120000', '2016-09-25 13:41:09'),
(82, 'RETP1474811008', '100000', '100000', '2016-09-25 13:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_transaksi`
--

CREATE TABLE `pembelian_transaksi` (
  `id_pembelian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pembelian_transaksi`
--

INSERT INTO `pembelian_transaksi` (`id_pembelian`, `kode_barang`, `nama_barang`, `jenis_barang`, `type_barang`, `harga`, `jumlah`, `total`, `tanggal`) VALUES
('TRX001', '', '', '', '', 0, 0, 0, '2016-06-26 14:26:52'),
('TRX0012', '', '', '', '', 0, 0, 0, '2016-06-30 15:40:58'),
('TRX123', '', '', '', '', 0, 0, 0, '2016-06-30 17:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_transaksi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_pembayaran` tinyint(1) NOT NULL COMMENT '1 = cash, 2= kredit bulanan, 3 = kredit musiman',
  `nama_pembeli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_pembeli` text COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `foto_ktp` int(11) NOT NULL,
  `jumlah_barang` int(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `dp` int(11) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_kode`),
  ADD UNIQUE KEY `id` (`barang_kode`),
  ADD KEY `id_2` (`barang_kode`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_detailtransaksi`);

--
-- Indexes for table `pembelian_transaksi`
--
ALTER TABLE `pembelian_transaksi`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD UNIQUE KEY `id` (`id_pembelian`),
  ADD KEY `id_2` (`id_pembelian`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id` (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_detailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
