-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 12:58 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `kode_angsuran` int(11) NOT NULL,
  `nomor_faktur` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`kode_angsuran`, `nomor_faktur`, `angsuran_ke`, `bayar`, `tanggal`) VALUES
(4, 'PJ1625666262', 1, 'Rp 184.237', '2021-07-08'),
(5, 'PJ1625666262', 2, 'Rp 184.237', '2021-07-08'),
(6, 'PJ1625666262', 3, 'Rp 184.237', '2021-07-08'),
(7, 'PJ1625666262', 4, 'Rp 184.237', '2021-07-08'),
(8, 'PJ1625666262', 5, 'Rp 184.237', '2021-07-08'),
(9, 'PJ1625666262', 6, 'Rp 184.237', '2021-07-08'),
(10, 'PJ1625666262', 7, 'Rp 184.237', '2021-07-08'),
(11, 'PJ1625666262', 8, 'Rp 184.237', '2021-07-08'),
(12, 'PJ1625666262', 9, 'Rp 184.237', '2021-07-08'),
(22, 'PJ1625682839', 1, 'Rp 310.250', '2021-07-08'),
(23, 'PJ1625682839', 2, 'Rp 310.250', '2021-07-08'),
(24, 'PJ1625682839', 3, 'Rp 310.250', '2021-07-08'),
(25, 'PJ1625682839', 4, 'Rp 310.250', '2021-07-08'),
(26, 'PJ1625666262', 10, 'Rp 184.237', '2021-07-08'),
(27, 'PJ1625839668', 1, 'Rp 148.000', '2021-07-09'),
(28, 'PJ1625839865', 1, 'Rp 850.000', '2021-07-09'),
(29, 'PJ1626168072', 1, 'Rp 230.000', '2021-07-14'),
(30, 'PJ1627004751', 1, 'Rp 113.000', '2021-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_kode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barang_nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_bahan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga_asli` int(11) NOT NULL DEFAULT 0,
  `biaya_produksi` int(11) NOT NULL,
  `biaya_tukang` int(11) NOT NULL,
  `biaya_distribusi` int(11) NOT NULL,
  `biaya_lainlain` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_kode`, `barang_nama`, `jenis_bahan`, `type_barang`, `harga_asli`, `biaya_produksi`, `biaya_tukang`, `biaya_distribusi`, `biaya_lainlain`, `keuntungan`, `foto`, `stok`) VALUES
('Lemari001', 'Lemari', 'kayu', '2 Pintu 150x170', 600000, 250000, 100000, 30000, 100000, 200000, 'ea9a23103f0b0ee9c0ec78c0241cae38.jpg', 8),
('Lemari002', 'lemari', 'kayu', 'lemari 3 pintu', 700000, 500000, 100000, 30000, 100000, 200000, '10dead6c061aaa7ecac77000c9087eb7.jpg', 1),
('sprd001', 'Seprimbad', 'Amerika', 'No.1', 2000000, 0, 0, 0, 0, 400000, '15b0aab2a373574c552b6a3d2f0a1a67.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `nomor_faktur` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`nomor_faktur`, `barang_kode`, `harga`, `jumlah`, `sub_total`) VALUES
('PJ1625191713', 'br01', 84054, 1, 84054),
('PJ1625556294', 'br24', 241000, 1, 241000),
('PJ1625666262', 'br24', 741000, 1, 741000),
('PJ1625682839', 'br24', 1241000, 1, 1241000),
('PJ1625839516', 'Lemari001', 1280000, 1, 1280000),
('PJ1625839610', 'sprd001', 2400000, 1, 2400000),
('PJ1625839668', 'Lemari001', 1780000, 1, 1780000),
('PJ1625839865', 'sprd001', 3400000, 1, 3400000),
('PJ1626168022', 'sprd001', 2400000, 1, 2400000),
('PJ1626168072', 'sprd001', 2900000, 1, 2900000),
('PJ1627004552', 'Lemari002', 1630000, 1, 1630000),
('PJ1627004751', 'Lemari002', 2130000, 1, 2130000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL,
  `nama_pembayaran` varchar(110) NOT NULL,
  `tambah_harga` int(11) NOT NULL,
  `lama_angsuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis_pembayaran`, `nama_pembayaran`, `tambah_harga`, `lama_angsuran`) VALUES
(1, 'Cash', 0, 0),
(2, 'Kredit Bulanan', 500000, 10),
(3, 'Kredit Musiman', 1000000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `kode_pembelian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi_pembelian`
--

INSERT INTO `transaksi_pembelian` (`kode_pembelian`, `nama_barang`, `jenis_barang`, `type_barang`, `harga`, `jumlah`, `total`, `tanggal`) VALUES
('kdp0001', 'Avian', 'Cat ', 'Cat Kayu', 50000, 5, 250000, '2021-07-05'),
('kdp0002', 'Avian', 'Cat', 'Cat Besii', 30000, 10, 300000, '2021-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `nomor_faktur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL COMMENT '1 = cash, 2= kredit bulanan, 3 = kredit musiman',
  `nama_pembeli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_pembeli` text COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `foto_ktp` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`nomor_faktur`, `id_jenis_pembayaran`, `nama_pembeli`, `alamat_pembeli`, `no_telp`, `foto_ktp`, `total`, `tanggal`) VALUES
('PJ1625191713', 1, 'Nofita', 'Banyuwangi', '084862746', 'PJ1625556796.jpg', 84054, '2021-06-01'),
('PJ1625666262', 2, 'deni', 'jember', '08918124821', 'PJ1625556796.jpg', 736946, '2021-07-07'),
('PJ1625682839', 3, 'deni', 'jember', '08918124821', 'PJ1625682839.jpg', 1241000, '2021-07-08'),
('PJ1625839516', 1, 'riski', 'Jatirejo', '08465859000', 'PJ1625839516.JPG', 1280000, '2021-07-09'),
('PJ1625839610', 1, 'kiki', 'purwoharjo', '08747439494', 'PJ1625839610.JPG', 2400000, '2021-07-09'),
('PJ1625839668', 2, 'rini', 'dungrejo', '085678786678', 'PJ1625839668.JPG', 1480000, '2021-07-09'),
('PJ1625839865', 3, 'Nofita', 'Sumberasri', '085823885205', 'PJ1625839865.JPG', 3400000, '2021-07-09'),
('PJ1626168022', 1, 'nofita', 'banyuwangi', '085764353321', 'PJ1626168022.JPG', 2400000, '2021-07-13'),
('PJ1626168072', 2, 'nofita okta', 'banyuwangi', '08534687767', 'PJ1626168072.JPG', 2300000, '2021-07-13'),
('PJ1627004552', 1, 'nofita', 'banyuwangi', '085846464646', 'PJ1627004552.JPG', 1630000, '2021-07-23'),
('PJ1627004751', 2, 'ayu', 'purwoharjo', '086789123987', 'PJ1627004751.JPG', 1130000, '2021-07-23');

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
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`kode_angsuran`),
  ADD KEY `nomor_faktur` (`nomor_faktur`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_kode`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD UNIQUE KEY `nomor_faktur` (`nomor_faktur`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`nomor_faktur`),
  ADD KEY `id_jenis_pembayaran` (`id_jenis_pembayaran`);

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
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `kode_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran` FOREIGN KEY (`nomor_faktur`) REFERENCES `transaksi_penjualan` (`nomor_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD CONSTRAINT `transaksi_penjualan_ibfk_1` FOREIGN KEY (`id_jenis_pembayaran`) REFERENCES `jenis_pembayaran` (`id_jenis_pembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
