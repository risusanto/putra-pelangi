-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 12 Jul 2017 pada 14.27
-- Versi Server: 5.7.17-log
-- PHP Version: 7.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putra_pelangi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kapasitas` int(4) DEFAULT NULL,
  `tahun` varchar(8) DEFAULT NULL,
  `pembuat` varchar(64) DEFAULT NULL,
  `no_polisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `nama`, `kapasitas`, `tahun`, `pembuat`, `no_polisi`) VALUES
(2, 'Bus Ijo cok', 35, '2011', 'Marfuah', 'BG 1996 LH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `id_keberangkatan` bigint(20) NOT NULL,
  `id_rute` int(6) DEFAULT NULL,
  `waktu` varchar(20) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `id_bus` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keberangkatan`
--

INSERT INTO `keberangkatan` (`id_keberangkatan`, `id_rute`, `waktu`, `tanggal`, `id_bus`, `status`) VALUES
(1, 1, '18.00 AM', '2017-18-07', 2, NULL),
(2, 4, '13.00 WIB', '2017-07-13', 2, NULL),
(3, 3, '13.00 WIB', '2017-07-20', 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_tiket`
--

CREATE TABLE `log_tiket` (
  `id_log` bigint(20) NOT NULL,
  `id_keberangkatan` bigint(20) DEFAULT NULL,
  `pelanggan` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_rute` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_tiket`
--

INSERT INTO `log_tiket` (`id_log`, `id_keberangkatan`, `pelanggan`, `status`, `id_rute`) VALUES
(1, 1, 'admin', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(2) NOT NULL,
  `role` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'direktur'),
(2, 'admin'),
(3, 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(6) NOT NULL,
  `rute` text,
  `biaya` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `rute`, `biaya`) VALUES
(1, 'Palembang - Medan', 300000),
(3, 'Palembang - Jambi', 200000),
(4, 'Palembang - Lampung', 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_role` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `id_role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 2),
('direktur', '4fbfd324f5ffcdff5dbf6f019b02eca8', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indexes for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`id_keberangkatan`),
  ADD KEY `fk_idrute` (`id_rute`),
  ADD KEY `fk_id_bus` (`id_bus`);

--
-- Indexes for table `log_tiket`
--
ALTER TABLE `log_tiket`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_id_keberangkatan` (`id_keberangkatan`),
  ADD KEY `fk_pelanggan` (`pelanggan`),
  ADD KEY `fk_id_rute` (`id_rute`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_idrole` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `id_keberangkatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `log_tiket`
--
ALTER TABLE `log_tiket`
  MODIFY `id_log` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD CONSTRAINT `fk_id_bus` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idrute` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_tiket`
--
ALTER TABLE `log_tiket`
  ADD CONSTRAINT `fk_id_keberangkatan` FOREIGN KEY (`id_keberangkatan`) REFERENCES `keberangkatan` (`id_keberangkatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_rute` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_idrole` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
