-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 09:29 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_kbm` int(5) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `keterangan` enum('Hadir','Tanpa Keterangan','Ijin','Sakit') NOT NULL,
  `waktu_absen` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_kbm`, `kode_siswa`, `keterangan`, `waktu_absen`) VALUES
(8, 2, 'MSC001', 'Tanpa Keterangan', '2019-06-22 13:36:06'),
(9, 2, 'MSC002', 'Hadir', '2019-06-22 13:36:07'),
(10, 2, 'MSC003', 'Ijin', '2019-06-22 13:36:07'),
(14, 3, 'MSC001', 'Tanpa Keterangan', '2019-07-07 01:04:48'),
(15, 3, 'MSC002', 'Ijin', '2019-07-07 01:04:48'),
(16, 3, 'MSC003', 'Tanpa Keterangan', '2019-07-07 01:04:48'),
(17, 3, 'MSC008', 'Sakit', '2019-07-07 01:04:48'),
(22, 2, 'MSC008', 'Sakit', '2019-06-22 13:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `spp` int(11) NOT NULL,
  `cicilan` int(11) NOT NULL,
  `pendaftaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`spp`, `cicilan`, `pendaftaran`) VALUES
(100000, 50000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_pendaftaran`
--

CREATE TABLE `biaya_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `invoice` varchar(6) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran_spp`
--

CREATE TABLE `detail_pembayaran_spp` (
  `id_detail` int(11) NOT NULL,
  `id_pembayaran_spp` int(11) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembayaran_spp`
--

INSERT INTO `detail_pembayaran_spp` (`id_detail`, `id_pembayaran_spp`, `bulan`, `tahun`) VALUES
(1, 2, 1, 2019),
(2, 2, 2, 2019),
(3, 2, 3, 2019),
(4, 2, 4, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `group_siswa`
--

CREATE TABLE `group_siswa` (
  `kode_group` varchar(6) NOT NULL,
  `nama_group` varchar(20) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_siswa`
--

INSERT INTO `group_siswa` (`kode_group`, `nama_group`, `kode_tentor`) VALUES
('', 'beri', 'TR022'),
('003', 'beri', 'TR022'),
('123EA', 'Grup Ea', 'T00213'),
('2', 'Jerapah', 'T0011'),
('3', 'Gajah', 'T00100');

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
  `hari_ke` int(1) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_slesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `minggu_ke`, `kode_group`, `id_mapel_tentor`, `hari`, `hari_ke`, `jam_mulai`, `jam_slesai`) VALUES
(1, 1, '2', 15, 'Minggu', 7, '15:00:00', '17:00:00'),
(2, 1, '2', 14, 'Sabtu', 6, '22:00:00', '23:00:00'),
(3, 2, '2', 14, 'Minggu', 7, '16:00:00', '17:00:00'),
(4, 1, '123EA', 15, 'Rabu', 3, '15:00:00', '16:00:00'),
(5, 4, '2', 16, 'Rabu', 3, '10:00:00', '11:00:00'),
(6, 4, '3', 19, 'Rabu', 3, '10:00:00', '11:00:00'),
(7, 2, '2', 16, 'Senin', 1, '10:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(2) NOT NULL,
  `nama_jenjang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`) VALUES
(1, 'SD'),
(2, 'SMA'),
(3, 'SMP');

-- --------------------------------------------------------

--
-- Table structure for table `kbm`
--

CREATE TABLE `kbm` (
  `id_kbm` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kbm`
--

INSERT INTO `kbm` (`id_kbm`, `id_jadwal`, `tanggal`, `pengumuman`) VALUES
(1, 2, '2019-06-01', 'Pengumuman'),
(2, 2, '2019-07-06', 'PengumumanPengumuman'),
(3, 2, '2019-07-07', 'Pengumuman Gaess'),
(4, 1, '2019-07-07', ''),
(5, 5, '2019-07-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_kbm`
--

CREATE TABLE `lampiran_kbm` (
  `id_lampiran` int(8) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `id_kbm` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lampiran_kbm`
--

INSERT INTO `lampiran_kbm` (`id_lampiran`, `lampiran`, `caption`, `id_kbm`) VALUES
(1, 'P2_Layout.pdf', 'LAYOUT', 1),
(2, 'P3_Widget.pdf', 'WIDGET', 1),
(3, 'P4_Selection Widget.pdf', 'Belajar Selection Widget', 1),
(4, 'P5_Menu.pdf', 'Membuat Menu', 1),
(5, 'P4_Selection Widget.pdf', 'materi widget', 1),
(6, 'P7_Webkit.pdf', 'materi webkit', 1),
(7, '2D 1N SURABAYA - BROMO MIDNIGHT TOUR.docx', 'Materi 1', 1),
(8, 'LOGO POLITEKNIK NEGERI  JEMBER.png', 'Logo Polije', 3);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id_laporan` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `tipe` enum('Spp','Cicilan','Pendaftaran','Gaji') NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan`, `id_parent`, `tipe`, `tanggal`, `nominal`) VALUES
(1, 2, 'Spp', '2019-06-25', 400000),
(2, 4, 'Cicilan', '2019-06-25', 2000000),
(3, 2, 'Gaji', '2019-06-25', 1000000),
(4, 8, 'Pendaftaran', '2019-06-25', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(3) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `id_jenjang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mata_pelajaran`, `id_jenjang`) VALUES
(1, 'Bahasa Indonesia-SD', 1),
(3, 'Bahasa Inggris - SMA', 2),
(4, 'Matematika-SD', 1),
(7, 'Bahasa Inggris - SD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapel_tentor`
--

CREATE TABLE `mapel_tentor` (
  `id_mapel_tentor` int(5) NOT NULL,
  `id_mapel` int(3) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_tentor`
--

INSERT INTO `mapel_tentor` (`id_mapel_tentor`, `id_mapel`, `kode_tentor`) VALUES
(14, 1, 'T00213'),
(15, 3, 'T00213'),
(16, 4, 'T00100'),
(17, 5, 'T00100'),
(18, 6, 'T00100'),
(19, 7, 'TR022');

-- --------------------------------------------------------

--
-- Table structure for table `msg_req_perubahan_jadwal`
--

CREATE TABLE `msg_req_perubahan_jadwal` (
  `id_msg` int(11) NOT NULL,
  `id_req` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mapel`
--

CREATE TABLE `nilai_mapel` (
  `id_nilai_mapel` int(6) NOT NULL,
  `id_nilai` int(6) DEFAULT NULL,
  `id_mapel` int(3) DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_mapel`
--

INSERT INTO `nilai_mapel` (`id_nilai_mapel`, `id_nilai`, `id_mapel`, `nilai`, `catatan`) VALUES
(1, 1, 3, 100, 'sip'),
(2, 1, 1, 100, 'sip'),
(3, 1, 4, 90, 'sipdah'),
(4, 2, 3, 80, 'sop'),
(5, 2, 1, 90, 'ass'),
(6, 2, 4, 100, 'mantab'),
(7, 3, 3, 100, 'wow'),
(8, 3, 1, 100, 'soso'),
(9, 3, 4, 100, 'sip'),
(10, 4, 1, 90, 'tingkatkan lagi'),
(11, 4, 3, 100, ''),
(12, 4, 4, 100, ''),
(13, 5, 1, 10, ''),
(14, 5, 3, 20, ''),
(15, 5, 4, 13, ''),
(16, 6, 1, 100, ''),
(17, 6, 3, 100, ''),
(18, 6, 4, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_nilai` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `sikap` double NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL,
  `tanggal_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_nilai`, `kode_siswa`, `sikap`, `bulan`, `tahun`, `kode_tentor`, `tanggal_penilaian`) VALUES
(1, 'MSC003', 95, 5, 2019, 'T00100', '2019-05-29'),
(2, 'MSC002', 95, 5, 2019, 'T00100', '2019-05-29'),
(3, 'MSC001', 95, 5, 2019, 'T00100', '2019-05-29'),
(4, 'MSC003', 85, 5, 2019, 'T00100', '2019-05-29'),
(5, 'MSC002', 75, 5, 2019, 'T00100', '2019-05-29'),
(6, 'MSC001', 95, 5, 2019, 'T00100', '2019-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(3) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `nama_ortu`, `no_hp`, `foto`, `username`, `password`) VALUES
(1, 'Sucipto', '0823125422', 'default_ortu.png', '', ''),
(2, 'Susanto', '0875422345', 'default_ortu.png', '', ''),
(3, 'Supardi', '0542345', 'default_ortu.png', '', ''),
(4, 'Asih', '94836587365', 'default_ortu.png', '', ''),
(5, 'manis', '0987675624', 'default_ortu.png', '', ''),
(6, 'Indah Dwi Wahyuni', '081358050152', 'default_ortu.png', '', ''),
(7, 'Indah Dwi Wahyuni', '081358050152', 'default_ortu.png', '', ''),
(8, 'Indah Dwi Wahyuni', '081358050152', 'default_ortu.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_cicilan`
--

CREATE TABLE `pembayaran_cicilan` (
  `id_pembayaran_cicilan` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `tahun` int(4) NOT NULL,
  `cicilan_ke` int(1) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_cicilan`
--

INSERT INTO `pembayaran_cicilan` (`id_pembayaran_cicilan`, `kode_siswa`, `tahun`, `cicilan_ke`, `nominal`, `tanggal_bayar`) VALUES
(1, 'MSC002', 2019, 1, 100000, '2019-06-24'),
(2, 'MSC002', 2019, 2, 200000, '2019-06-25'),
(3, 'MSC002', 2019, 3, 1000000, '2019-06-25'),
(4, 'MSC002', 2019, 4, 2000000, '2019-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_gaji`
--

CREATE TABLE `pembayaran_gaji` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_tentor` varchar(6) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_gaji`
--

INSERT INTO `pembayaran_gaji` (`id_pembayaran`, `kode_tentor`, `bulan`, `tahun`, `nominal`, `tanggal_bayar`) VALUES
(1, 'T00100', 3, 2019, 1500000, '2019-06-25'),
(2, 'TR022', 2, 2019, 1000000, '2019-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `id_pembayaran_spp` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `req_perubahan_jadwal`
--

CREATE TABLE `req_perubahan_jadwal` (
  `id_req` int(11) NOT NULL,
  `id_jadwal` int(5) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `ke_hari` varchar(8) NOT NULL,
  `ke_minggu` int(1) NOT NULL,
  `ke_jam` time NOT NULL,
  `status` enum('Menunggu','Diterima','Ditolak','Berakhir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_perubahan_jadwal`
--

INSERT INTO `req_perubahan_jadwal` (`id_req`, `id_jadwal`, `kode_siswa`, `ke_hari`, `ke_minggu`, `ke_jam`, `status`) VALUES
(1, 1, 'MSC005', 'Minggu', 1, '15:00:00', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `kode_siswa` varchar(6) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `kelas` int(2) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kode_group` varchar(6) NOT NULL,
  `id_ortu` int(3) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `cicilan` int(11) NOT NULL,
  `awal_spp` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `kode_siswa`, `nama_siswa`, `kelas`, `tgl_lahir`, `jk`, `alamat`, `foto`, `no_hp`, `kode_group`, `id_ortu`, `tgl_daftar`, `cicilan`, `awal_spp`) VALUES
(1, '', 'Dini', 0, '1997-12-31', 'Perempuan', 'Situbondo', 'default_siswa.png', '9329486342', '3', 4, '2017-01-01', 0, '0'),
(2, 'MSC001', 'David Setya', 11, '2019-04-05', 'Laki Laki', 'Bondowoso', 'default_siswa.png', '0823138643', '2', 1, '2019-05-21', 0, '05-2018'),
(3, 'MSC002', 'David Setya', 12, '2019-05-15', 'Laki Laki', 'Maesan', 'default_siswa.png', '08231374', '2', 2, '2019-05-21', 6000000, '0'),
(4, 'MSC003', 'Indri Nur', 0, '2019-05-22', 'Perempuan', 'Situbondo', 'default_siswa.png', '086432234', '2', 3, '2019-05-22', 0, '0'),
(5, 'msc005', 'danu', 0, '1998-02-03', 'Laki Laki', 'jember', 'default_siswa.png', '089786427', '003', 5, '2019-05-29', 0, '0'),
(6, 'MSC006', 'Muhammad', 11, '1999-03-10', 'Laki Laki', 'Maesan, Bondowoso', 'default_siswa.png', '081216938489', '3', 6, '1987-02-12', 0, '0'),
(7, 'MSC007', 'Muhammad Fathan', 11, '1999-03-10', 'Laki Laki', 'Maesan, Bondowoso', 'default_siswa.png', '081216938489', '3', 7, '1987-02-12', 0, '0'),
(8, 'MSC008', 'Muhammad Fathan Ridlo', 11, '1999-03-10', 'Laki Laki', 'Maesan', 'default_siswa.png', '081216938489', '2', 8, '2019-01-12', 0, '0');

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
-- Dumping data for table `tentor`
--

INSERT INTO `tentor` (`kode_tentor`, `nama_tentor`, `jk`, `alamat`, `no_hp`, `pendidikan_terakhir`, `gaji`, `foto`) VALUES
('T00100', 'Fathan', 'Laki Laki', 'Bondowoso, Maesan', '081216938489', 'S2', 3000000, ''),
('T00213', 'Tejo', 'Perempuan', 'Jember', '873246873246', 'S2', 100000, ''),
('TR022', 'kiki', 'Perempuan', 'jember', '098723567', 's1', 1000000, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `hak_akses` enum('Admin','Tentor','Siswa','Orang Tua','Owner') NOT NULL,
  `id_child` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_pengguna`, `hak_akses`, `id_child`) VALUES
(1, 'fathan', 'c31573e9fd10409dca20572ae7ad69f9', 'M Fathan', 'Tentor', 'T00100'),
(2, 'david', '$2y$10$r83G5LUQLX6nfrNV6UhmOuMenM7FQaXgurRrsY87PahaPxY49N3pW', 'David Setya', 'Siswa', '3'),
(3, 'admin', 'admin', 'admin', 'Admin', '1'),
(4, 'siswa', 'siswa', 'siswa', 'Siswa', '1'),
(5, 'tentor', 'tentor', 'tentor', 'Tentor', 'T00100'),
(6, 'ortu', 'ortu', 'ortu', 'Orang Tua', '1'),
(7, 'owner', 'owner', 'owner', 'Owner', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `detail_pembayaran_spp`
--
ALTER TABLE `detail_pembayaran_spp`
  ADD PRIMARY KEY (`id_detail`);

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
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan`);

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
-- Indexes for table `msg_req_perubahan_jadwal`
--
ALTER TABLE `msg_req_perubahan_jadwal`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD PRIMARY KEY (`id_nilai_mapel`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `pembayaran_cicilan`
--
ALTER TABLE `pembayaran_cicilan`
  ADD PRIMARY KEY (`id_pembayaran_cicilan`);

--
-- Indexes for table `pembayaran_gaji`
--
ALTER TABLE `pembayaran_gaji`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`id_pembayaran_spp`);

--
-- Indexes for table `req_perubahan_jadwal`
--
ALTER TABLE `req_perubahan_jadwal`
  ADD PRIMARY KEY (`id_req`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `kode_siswa` (`kode_siswa`);

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`kode_tentor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `biaya_pendaftaran`
--
ALTER TABLE `biaya_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pembayaran_spp`
--
ALTER TABLE `detail_pembayaran_spp`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kbm`
--
ALTER TABLE `kbm`
  MODIFY `id_kbm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lampiran_kbm`
--
ALTER TABLE `lampiran_kbm`
  MODIFY `id_lampiran` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mapel_tentor`
--
ALTER TABLE `mapel_tentor`
  MODIFY `id_mapel_tentor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `msg_req_perubahan_jadwal`
--
ALTER TABLE `msg_req_perubahan_jadwal`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  MODIFY `id_nilai_mapel` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran_cicilan`
--
ALTER TABLE `pembayaran_cicilan`
  MODIFY `id_pembayaran_cicilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran_gaji`
--
ALTER TABLE `pembayaran_gaji`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `id_pembayaran_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `req_perubahan_jadwal`
--
ALTER TABLE `req_perubahan_jadwal`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
