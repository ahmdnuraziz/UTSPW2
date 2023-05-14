-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 03:46 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_helm_custom`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kg` int(11) NOT NULL,
  `nama_kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kg`, `nama_kategori`) VALUES
(3, 'Helm Slimhead'),
(4, 'Helm Fullface'),
(5, 'Helm Minihead');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_psn` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pesanan` varchar(45) NOT NULL,
  `alamat_pesanan` varchar(45) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_psn`, `tanggal`, `nama_pesanan`, `alamat_pesanan`, `no_hp`, `email`, `jumlah_pesanan`, `deskripsi`, `produk_id`) VALUES
(10, '2023-05-13', 'aze', 'jln', '0000', 'qwe', 2, 'cccccccccccc', 5);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga_jual` double NOT NULL,
  `harga_beli` double NOT NULL,
  `stok` int(11) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori_produk_id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga_jual`, `harga_beli`, `stok`, `min_stok`, `deskripsi`, `kategori_produk_id`, `gambar`) VALUES
(2, '01', 'Slimhead carbon kevlar SPREAD TOW 12K ORIBINAL .', 1200000, 1000000, 10, 1, 'Helm slimhead dengan motif kotak-kotak mengkilat yang elegan ketika dililat.', 3, 'helm1.png'),
(5, '42aec100', 'Fullface custom full black.', 800000, 700000, 10, 1, 'Helm dengan desaign fullface yang membuat anda aman dari benturan dan menutupi wajah anda.', 4, 'helm2.png'),
(6, '8cd19924', 'Slimhead biru dengan corak api pink.', 650000, 500000, 10, 1, 'Helm slimhead dengan warna biru ditambah dengan corak api berwarna pink menambah kesan lebih elegan dan mencolok.', 3, 'helm3.png'),
(7, 'ff3fb863', 'Yoko custom japan model.', 500000, 400000, 10, 1, 'Helm Minihead dengan model japan ditambah motif merah yang sangat keren karena perpaduan warnanya', 5, 'helm4.png'),
(8, '73c4d9ca', 'Bigsize everoak for size XL- XXL', 650000, 500000, 10, 1, 'Helm slimhead yang dikhususkan untuk yang memiliki ukuran kepala xl dan xxl dengan warna biru ditambah motih letthering yang sangat padu.', 3, 'helm5.png'),
(9, 'f91d0a8c', 'Fullface motorcross offroad.', 1200000, 1000000, 10, 1, 'Helm fullface ini sangat cocok untuk andan yang suka offroad karena helm ini memang di desaign untuk anda penggemar motor trail offroad.', 4, 'helm6.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kg`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_psn`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_psn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
