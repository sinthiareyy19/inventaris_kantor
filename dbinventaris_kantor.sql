-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 01:23 PM
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
-- Database: `dbinventaris_kantor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_brg` char(7) DEFAULT NULL,
  `nama` varchar(45) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status_barang` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_brg`, `nama`, `jumlah`, `keterangan`, `status_barang`, `foto`, `kategori_id`) VALUES
(4, 'A101', 'Laptop Acer Chromebook 714.', '10 Unit', '14 inch with IPS,Multi-touch screen,Resolusi Layar,FHD 1920 x 1080.', 'Baik', 'labtop1.jpg', 1),
(18, 'B102', 'Meja Rapat', '3 Unit', 'Meja Rapat untuk 20 orang warna cokelat', 'Baik', 'meja.jpg', 2),
(33, 'C103', 'Buku Agenda', '20 Buah', 'Buku Agenda Note A4 Isi 100 Lembar', 'Baik', 'buku_agenda.jpg', 3),
(41, 'D104', 'Mobil Avanza', '2 Unit', 'Avanza Mini Bus Berwarna Putih', 'Kurang Baik', 'avanza.jpg', 4),
(44, 'E105', 'Mesin Fotokopi', '2 Unit', 'Mesin Fotocopy Canon iRA 6055 / 6065 / 6075', 'Baik', 'mesin_fotokopi.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_brg`
--

CREATE TABLE `kategori_brg` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_brg`
--

INSERT INTO `kategori_brg` (`id`, `nama`) VALUES
(3, 'Alat Tulis Kantor'),
(1, 'Elektronik'),
(2, 'Furniture'),
(4, 'Kendaraan');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fullname`, `email`, `username`, `password`, `role`, `foto`) VALUES
(1, 'Sinthia Audrey', 'sinthia@gmail', 'admin', '0af3be0c473eac14f958ce48ebfff937dcf1f23e', 'admin', 'sinthia.png'),
(2, 'Salsabilla Bintang', 'salsa@gmail', 'salsa', '23280bddcd2ea82de9d99ceae73e76201b8f64c7', 'staff', 'salsa.png');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` char(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `no_hp` char(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `gender`, `no_hp`, `alamat`) VALUES
(1, '191402001', 'Aditya Rachman', 'L', '082274269967', 'Jl. Merak Jingga No 04'),
(2, '191402002', 'Salsabilla Bintang', 'P', '081234567789', 'Jl. Cempaka Biru No 12'),
(3, '191402115', 'Sinthia Audrey C Sihombing', 'P', '082211035568', 'Jl. Bawang 12 No 4'),
(4, '191402004', 'Anggitiya Gaby', 'P', '089934567899', 'Jl.Anggrek 40'),
(5, '191402112', 'Juliana Simanjuntak', 'P', '081243446781', 'Jl. Merpati Blok C');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_brg`
--

CREATE TABLE `peminjaman_brg` (
  `id` int(11) NOT NULL,
  `no_peminjaman` varchar(15) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_brg`
--

INSERT INTO `peminjaman_brg` (`id`, `no_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `pegawai_id`, `barang_id`, `keterangan`) VALUES
(2, 'A191402001', '2022-10-08', '2022-10-14', 2, 4, 'Pinjam Barang Ini Ya'),
(6, 'B191402002', '2022-09-01', '2022-10-01', 1, 18, 'Barang ini di pinjam di Jalan Kantor Pusat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`),
  ADD KEY `fk_kategori_id` (`kategori_id`) USING BTREE;

--
-- Indexes for table `kategori_brg`
--
ALTER TABLE `kategori_brg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nip`);

--
-- Indexes for table `peminjaman_brg`
--
ALTER TABLE `peminjaman_brg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id` (`pegawai_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kategori_brg`
--
ALTER TABLE `kategori_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman_brg`
--
ALTER TABLE `peminjaman_brg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_brg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_brg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_brg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_barang_kategori_brg1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_brg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `peminjaman_brg`
--
ALTER TABLE `peminjaman_brg`
  ADD CONSTRAINT `peminjaman_brg_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `peminjaman_brg_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
