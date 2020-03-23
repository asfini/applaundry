-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 11:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `sub_total` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_paket`, `qty`, `sub_total`, `keterangan`) VALUES
(5, 'TR001', 1, 5, 20000, ''),
(6, 'TR001', 2, 10, 50000, ''),
(7, 'TR002', 1, 5, 20000, ''),
(8, 'TR003', 2, 3, 15000, ''),
(9, 'TR004', 2, 3, 15000, ''),
(10, 'TR005', 2, 4, 20000, ''),
(11, 'TR006', 1, 5, 20000, ''),
(12, 'TR006', 2, 5, 25000, ''),
(13, 'TR007', 1, 3, 12000, ''),
(14, 'TR008', 1, 1, 4000, ''),
(15, 'TR008', 2, 2, 10000, ''),
(16, 'TR009', 1, 2, 8000, ''),
(17, 'TR010', 1, 5, 20000, ''),
(18, 'TR011', 1, 5, 20000, ''),
(19, 'TR012', 2, 5, 25000, ''),
(20, 'TR013', 1, 10, 40000, ''),
(21, 'TR014', 1, 10, 40000, ''),
(22, 'TR014', 2, 5, 25000, '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(1, 'Jelly', 'Labuh Baru', 'perempuan', '08129850945'),
(2, 'Asfini', 'Arengka', 'perempuan', '08121243434');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `nama`, `alamat`, `tlp`) VALUES
(1, 'Erpeel Laundry Cab Rumbai', 'Jl. Yos Sudarso', '081310101010'),
(2, 'Erpeel Laundry Cab Arengka', 'Jl. Soekarno Hatta', '081310101011');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(1, 1, 'kiloan', 'kiloan', 4000),
(2, 1, 'selimut', 'selimut', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_bayar` date NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dibayar` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`) VALUES
('TR001', 1, 'INV/TR001', 1, '2020-03-09', '2020-03-12', '2020-03-09', 58000, 5000, 7000, 'diambil', 'bayar', 1),
('TR002', 1, 'INV/TR002', 1, '2020-03-09', '2020-03-12', '2020-03-09', 18000, 0, 2000, 'diambil', 'bayar', 1),
('TR003', 1, 'INV/TR003', 1, '2020-03-09', '2020-03-12', '2020-03-09', 13500, 0, 1500, 'diambil', 'bayar', 1),
('TR004', 1, 'INV/TR004', 1, '2020-03-09', '2020-03-12', '2020-03-09', 13500, 0, 1500, 'diambil', 'bayar', 1),
('TR005', 1, 'INV/TR005', 2, '2020-03-09', '2020-03-12', '2020-03-09', 18000, 0, 2000, 'diambil', 'bayar', 1),
('TR006', 1, 'INV/TR006', 1, '2020-03-09', '2020-03-12', '2020-03-09', 40500, 0, 4500, 'diambil', 'bayar', 1),
('TR007', 1, 'INV/TR007', 1, '2020-03-09', '2020-03-12', '2020-03-09', 10800, 0, 1200, 'diambil', 'bayar', 1),
('TR008', 1, 'INV/TR008', 1, '2020-03-09', '2020-03-12', '2020-03-09', 12600, 0, 1400, 'diambil', 'bayar', 1),
('TR009', 1, 'INV/TR009', 2, '2020-03-09', '2020-03-12', '2020-03-09', 7200, 0, 800, 'diambil', 'bayar', 1),
('TR010', 1, 'INV/TR010', 2, '2020-03-18', '2020-03-21', '2020-03-18', 18000, 0, 2000, 'diambil', 'bayar', 1),
('TR011', 1, 'INV/TR011', 1, '2020-03-20', '2020-03-23', '2020-03-20', 18000, 0, 2000, 'diambil', 'bayar', 1),
('TR012', 1, 'INV/TR012', 1, '2020-03-20', '2020-03-23', '2020-03-20', 22500, 0, 2500, 'diambil', 'bayar', 1),
('TR013', 1, '', 1, '2020-03-20', '2020-03-23', '0000-00-00', 0, 0, 0, 'baru', 'belum dibayar', 1),
('TR014', 1, '', 1, '2020-03-23', '2020-03-26', '0000-00-00', 0, 0, 0, 'baru', 'belum dibayar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `level` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `id_outlet`, `level`) VALUES
(1, 'Jelly Asfini', 'admin', 'admin', 1, 'admin'),
(2, 'Kasir', 'kasir', 'kasir', 1, 'kasir'),
(3, 'waiter', 'owner', 'owner', 1, 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
