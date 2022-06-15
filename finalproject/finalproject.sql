-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 10:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_supplier` char(10) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `satuan` varchar(20) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `harga_satuan` varchar(20) DEFAULT NULL,
  `sub_total` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `id_supplier`, `kategori`, `satuan`, `stock`, `harga_satuan`, `sub_total`) VALUES
(7, 'B004', 'Printer', '1', 'Elektronik', 'Buah', 40, '950000', '47500000'),
(9, '23', 'mesin jahit', 'niaga host', 'mesin', 'satuab', 20, '12000', '600000');

-- --------------------------------------------------------

--
-- Table structure for table `brg_keluar`
--

CREATE TABLE `brg_keluar` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `customer` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brg_keluar`
--

INSERT INTO `brg_keluar` (`id`, `id_transaksi`, `tanggal`, `kode_barang`, `nama_barang`, `customer`, `jumlah`, `satuan`) VALUES
(1, 'T001', '2022-06-14', 'B003', 'Buku Tulis', 'PT. Makmur', 40, 'Lusin'),
(2, 'm124', '0000-00-00', '23', 'mesin jahit', 'tres', 20, 'satuab'),
(3, 'm125', '0000-00-00', '23', 'mesin jahit', 'tres', 10, 'satuab'),
(4, 'w213', '0000-00-00', 'B004', 'Printer', 'tres', 10, 'Buah'),
(6, 'm126', '0000-00-00', '23', 'mesin jahit', 'tres', 1, 'satuab');

--
-- Triggers `brg_keluar`
--
DELIMITER $$
CREATE TRIGGER `pengurangan_stok` AFTER INSERT ON `brg_keluar` FOR EACH ROW BEGIN
	UPDATE barang
	SET stock = stock - NEW.jumlah
	WHERE barang.kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brg_masuk`
--

INSERT INTO `brg_masuk` (`id`, `id_transaksi`, `tanggal`, `kode_barang`, `nama_barang`, `supplier`, `jumlah`, `satuan`) VALUES
(1, 'M001', '2022-06-14', 'B002', 'Mesin Cuci', 'PT. Sejahtera', 50, 'Buah'),
(2, 'm127', '0000-00-00', '23', 'mesin jahit', 'niaga hoster', 1, 'satuab');

--
-- Triggers `brg_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `brg_masuk` FOR EACH ROW BEGIN
	UPDATE barang
	SET stock = stock + NEW.jumlah
	WHERE barang.kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_penerima` int(11) NOT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_penerima`, `nama_penerima`, `alamat`, `telepon`) VALUES
(123, 'tresna', 'tabanan', '782'),
(124, 'tres', 'tabanan', '098');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(1, 'tresnaaaa', 'tabanan', '123456'),
(2, '', 'bajera', '098');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'vina', '$2y$10$/iG3Nek6QNbBzpeYxAkp1uDelA5r4DevZAPQrXMC681Aa/yYzpMUy'),
(6, 'kelompok2', '$2y$10$Bfygg.hL.WLOOQ0bF.wGUONpFl6TM/Rj6s2mK6dMPOp0Na7Oi4q..'),
(7, 'guest', '$2y$10$nh33./R9Z4Wn3uzAA.agFOcxaPAVfYqh/ngYw9Gf/k3TWzmBPqlYS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
