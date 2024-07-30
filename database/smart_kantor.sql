-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 03:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_kantor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(80) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, 'Lasmiyati', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_sdm'),
(2, 'R. Trisandi Hendrawan', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'ka_departemen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(45) NOT NULL,
  `nilai_utility` double NOT NULL,
  `hasil_alternatif` double NOT NULL,
  `ket_alternatif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `nama_alternatif`, `nilai_utility`, `hasil_alternatif`, `ket_alternatif`) VALUES
(1, 'Bank Nagari Cabang Koto Baru', 0, 70, 'Tidak Layak'),
(2, 'Bank BRI KCP UNIT Koto Baru', 0, 84, 'Layak'),
(3, 'Bank BNI KCP Koto Baru', 0, 82, 'Layak'),
(4, 'Bank Syariah Indonesia KCP Pulau Punjung', 0, 78, 'Dipertimbangkan'),
(5, 'Bank Mandiri Koto Baru', 0, 66, 'Tidak Layak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif_kriteria`
--

CREATE TABLE `tbl_alternatif_kriteria` (
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_alternatif_kriteria` double NOT NULL,
  `bobot_alternatif_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_alternatif_kriteria`
--

INSERT INTO `tbl_alternatif_kriteria` (`id_alternatif`, `id_kriteria`, `nilai_alternatif_kriteria`, `bobot_alternatif_kriteria`) VALUES
(1, 1, 80, 8),
(1, 2, 80, 16),
(1, 3, 60, 12),
(1, 4, 60, 18),
(1, 5, 80, 16),
(2, 1, 80, 8),
(2, 2, 100, 20),
(2, 3, 60, 12),
(2, 4, 80, 24),
(2, 5, 100, 20),
(3, 1, 80, 8),
(3, 2, 100, 20),
(3, 3, 100, 20),
(3, 4, 60, 18),
(3, 5, 80, 16),
(4, 1, 60, 6),
(4, 2, 60, 12),
(4, 3, 100, 20),
(4, 4, 80, 24),
(4, 5, 80, 16),
(5, 1, 80, 8),
(5, 2, 80, 16),
(5, 3, 60, 12),
(5, 4, 60, 18),
(5, 5, 60, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(45) NOT NULL,
  `bobot_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`) VALUES
(1, 'Lingkungan Luar Kantor', 0.1),
(2, 'Ruang Terbuka Hijau', 0.2),
(3, 'Lingkungan Dalam Kantor', 0.2),
(4, 'Kondisi Fisik Gedung', 0.3),
(5, 'Fasilitas Toilet', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(45) NOT NULL,
  `nilai_sub_kriteria` double NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_sub_kriteria`
--

INSERT INTO `tbl_sub_kriteria` (`id_sub_kriteria`, `nama_sub_kriteria`, `nilai_sub_kriteria`, `id_kriteria`) VALUES
(1, 'Sangat Baik', 100, 1),
(2, 'Baik', 80, 1),
(3, 'Cukup', 60, 1),
(4, 'Kurang', 40, 1),
(5, 'Tidak Baik', 20, 1),
(6, 'Sangat Baik', 100, 2),
(7, 'Baik', 80, 2),
(8, 'Cukup', 60, 2),
(9, 'Kurang', 40, 2),
(10, 'Tidak Baik', 20, 2),
(11, 'Sangat Baik', 100, 3),
(12, 'Baik', 80, 3),
(13, 'Cukup', 60, 3),
(14, 'Kurang', 40, 3),
(15, 'Tidak Baik', 20, 3),
(16, 'Sangat Baik', 100, 4),
(17, 'Baik', 80, 4),
(18, 'Cukup', 60, 4),
(19, 'Kurang', 40, 4),
(20, 'Tidak Baik', 20, 4),
(21, 'Sangat Baik', 100, 5),
(22, 'Baik', 80, 5),
(23, 'Cukup', 60, 5),
(24, 'Kurang', 40, 5),
(25, 'Tidak Baik', 20, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tbl_alternatif_kriteria`
--
ALTER TABLE `tbl_alternatif_kriteria`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
