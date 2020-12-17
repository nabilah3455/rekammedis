-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 01:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jk` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dokter`
--

INSERT INTO `data_dokter` (`id`, `nama`, `jk`) VALUES
(85017009, 'Ghoniyyatul Nabilah', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `data_report`
--

CREATE TABLE `data_report` (
  `id` int(11) NOT NULL,
  `id_rekam_medis` int(5) NOT NULL,
  `catatan` text NOT NULL,
  `catatan_1` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_report`
--

INSERT INTO `data_report` (`id`, `id_rekam_medis`, `catatan`, `catatan_1`) VALUES
(2, 18, 'obat habis, diganti jadi apa?', 'ssss');

-- --------------------------------------------------------

--
-- Table structure for table `data_rujukan`
--

CREATE TABLE `data_rujukan` (
  `id` int(11) NOT NULL,
  `id_rekam_medis` varchar(9) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `nama_rumah_sakit` varchar(100) NOT NULL,
  `dokter` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_rujukan`
--

INSERT INTO `data_rujukan` (`id`, `id_rekam_medis`, `tanggal`, `nama_poli`, `nama_rumah_sakit`, `dokter`) VALUES
(1, '20', '2020-06-01', 'THT', 'RSUD Bogor', 'Ghoniyyatul Nabilah');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_obat`
--

INSERT INTO `kategori_obat` (`id`, `nama_kategori`) VALUES
(1, 'puyer'),
(2, 'Tablet'),
(4, 'Butir'),
(11, 'Kapsul'),
(14, 'saset');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(6) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `kode_obat`, `nama_obat`, `kategori`, `stok`, `satuan`, `tanggal_masuk`) VALUES
(1, 'kd0001', 'Obat Batuk', '1', 10, 'Botol', '2020-05-04'),
(2, 'kd0002', 'obat kjk', '2', 1, 'botol', '2020-05-10'),
(5, 'kd0003', 'obat sakit kepala', '2', 100, 'Butir', '2020-05-10'),
(15, '120000', 'bodrex', '2', 200, 'butir', '2020-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `no_medis` varchar(5) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `umur` int(2) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `no_medis`, `nama_pasien`, `umur`, `alamat`, `tanggal_daftar`) VALUES
(4, 'ps001', 'nabilah saja', 21, 'jakarta', '2020-05-10'),
(7, '1212', 'nabilah', 21, 'depok', '2020-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` int(11) NOT NULL,
  `no_medis` varchar(5) NOT NULL,
  `tensi` varchar(10) DEFAULT NULL,
  `diagnosa` text,
  `terapi` text,
  `dokter` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` enum('antrian','selesai','ambil obat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `no_medis`, `tensi`, `diagnosa`, `terapi`, `dokter`, `tanggal`, `status`) VALUES
(18, 'ps001', '123/33', 'mual', 'mual', NULL, '2020-05-19', 'ambil obat'),
(19, 'ps001', '2/2', 'ooo', 'ooo', NULL, '2020-05-20', 'ambil obat'),
(20, '1212', '1', '1', '1', 'Ghoniyyatul Nabilah', '2020-05-20', 'selesai'),
(21, 'ps001', '2', '2', '2', 'Ghoniyyatul Nabilah', '2020-06-02', 'selesai'),
(22, 'ps001', '5', '5', '5', 'Ghoniyyatul Nabilah', '2020-06-02', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'ryan eriawan', 'ryaneriawan@gmail.com', 'Penguins1.jpg', '$2y$10$8dhCsWFjTtSO7HnjZIyZuOowufDBhww4.AkEkeEBRvvKomSArzuX.', 1, 1, 1587373631),
(27, 'Ghoniyyatul Nabilah', 'nabil@gmail.com', 'Koala1.jpg', '$2y$10$2Fgw6b2PWKaaUeZQwPCSMu6YXyAlcVfaPlbT/wdQYBfhb/eGD17nq', 2, 1, 1588746916);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_report`
--
ALTER TABLE `data_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rujukan`
--
ALTER TABLE `data_rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_report`
--
ALTER TABLE `data_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_rujukan`
--
ALTER TABLE `data_rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
