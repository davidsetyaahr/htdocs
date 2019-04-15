-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 11:17 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msc`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_siswa`
--

CREATE TABLE `group_siswa` (
  `kode_group` varchar(6) NOT NULL,
  `nama_group` varchar(20) NOT NULL,
  `id_tentor` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(5) NOT NULL,
  `minggu_ke` int(1) NOT NULL,
  `kode_group` varchar(6) NOT NULL,
  `id_mapel_tentor` int(5) NOT NULL,
  `hari` varchar(8) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_slesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(2) NOT NULL,
  `nama_jenjang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kbm`
--

CREATE TABLE `kbm` (
  `id_kbm` int(6) NOT NULL,
  `kode_group` varchar(6) NOT NULL,
  `id_mapel_tentor` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `rating_tentor` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_kbm`
--

CREATE TABLE `lampiran_kbm` (
  `id_lampiran` int(8) NOT NULL,
  `id_kbm` int(6) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(3) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `id_jenjang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel_tentor`
--

CREATE TABLE `mapel_tentor` (
  `id_mapel_tentor` int(5) NOT NULL,
  `id_mapel` int(3) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_nilai` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `sikap` double NOT NULL,
  `kehadiran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(3) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kode_siswa` varchar(6) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kode_group` varchar(6) NOT NULL,
  `id_ortu` int(3) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tentor`
--

CREATE TABLE `tentor` (
  `kode_tentor` varchar(6) NOT NULL,
  `nama_tentor` varchar(30) NOT NULL,
  `jk` enum('Laki Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `gaji` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_siswa`
--
ALTER TABLE `group_siswa`
  ADD PRIMARY KEY (`kode_group`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `kbm`
--
ALTER TABLE `kbm`
  ADD PRIMARY KEY (`id_kbm`);

--
-- Indexes for table `lampiran_kbm`
--
ALTER TABLE `lampiran_kbm`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mapel_tentor`
--
ALTER TABLE `mapel_tentor`
  ADD PRIMARY KEY (`id_mapel_tentor`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode_siswa`);

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`kode_tentor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kbm`
--
ALTER TABLE `kbm`
  MODIFY `id_kbm` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lampiran_kbm`
--
ALTER TABLE `lampiran_kbm`
  MODIFY `id_lampiran` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel_tentor`
--
ALTER TABLE `mapel_tentor`
  MODIFY `id_mapel_tentor` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
