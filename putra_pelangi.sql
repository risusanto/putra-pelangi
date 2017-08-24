-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 24 Agu 2017 pada 13.49
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
  `telepon` varchar(20) DEFAULT '-',
  `pembuat` varchar(64) DEFAULT NULL,
  `no_polisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id_bus`, `nama`, `kapasitas`, `telepon`, `pembuat`, `no_polisi`) VALUES
(5, 'Amin', 39, '09098', NULL, 'BG 1996 LH');

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
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keberangkatan`
--

INSERT INTO `keberangkatan` (`id_keberangkatan`, `id_rute`, `waktu`, `tanggal`, `id_bus`, `status`) VALUES
(9, 3, '10.00 WIB (Pagi)', '2017-08-04', 5, 3),
(10, 1, '10.00 WIB (Pagi)', '2017-08-03', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` bigint(20) NOT NULL,
  `tanggal_pembayaran` varchar(20) DEFAULT NULL,
  `id_pesanan` bigint(20) DEFAULT NULL,
  `pelanggan` varchar(255) DEFAULT NULL,
  `jumlah_pembayaran` bigint(20) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_tiket`
--

CREATE TABLE `log_tiket` (
  `id_log` bigint(20) NOT NULL,
  `id_keberangkatan` bigint(20) DEFAULT NULL,
  `pelanggan` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_rute` int(6) DEFAULT NULL,
  `kursi` int(6) DEFAULT NULL,
  `id_pesanan` bigint(20) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_tiket`
--

INSERT INTO `log_tiket` (`id_log`, `id_keberangkatan`, `pelanggan`, `status`, `id_rute`, `kursi`, `id_pesanan`, `atas_nama`) VALUES
(4, 9, 'pelanggan@pelanggan.com', 3, 3, 3, 6, 'ari1'),
(5, 9, 'pelanggan@pelanggan.com', 3, 3, 4, 6, 'ari2'),
(8, 9, 'pelanggan@pelanggan.com', 3, 1, 5, 8, 'sa'),
(9, 9, 'pelanggan@pelanggan.com', 3, 1, 10, 8, 'sasa'),
(14, 9, 'admin', 3, 1, 15, 12, 'ad'),
(15, 9, 'admin', 3, 1, 16, 12, 'asdm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` bigint(20) NOT NULL,
  `pelanggan` varchar(255) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text,
  `status` int(1) DEFAULT '1',
  `pesanan` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`email`, `nama`, `telepon`, `alamat`, `status`, `pesanan`) VALUES
('082280940094', 'Ausanto', 'risusanto@outlook.co', 'ksakskak', 1, '0'),
('admin', NULL, NULL, NULL, 1, '0'),
('pelanggan@pelanggan.com', 'Ari Susanto', '082280940094', 'Layo', 1, '0ayAUiaG3dqkQsdr0e995kkR48eEg0lkZAvXabTd5A0ivgUXjdosVX2njwJSGetFPkKXutdSjwOIdAJLIKQo9A--'),
('risusanto@outlook.com', 'Ari Susanto', NULL, 'palembang', 1, '.VmswKcrWz2y3LcVD7IrxYnmUbIca1KCDqaxwmdDhO17yN~.vnywMKJ6QK3ew.VfYAqs3uY43F.nHVhptq2w2w--');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` bigint(20) NOT NULL,
  `pelanggan` varchar(255) DEFAULT NULL,
  `id_keberangkatan` bigint(20) DEFAULT NULL,
  `status` int(1) DEFAULT '3',
  `status_pembayaran` varchar(36) DEFAULT 'belum dibayar',
  `batas_waktu` varchar(255) DEFAULT NULL,
  `id_rute` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `pelanggan`, `id_keberangkatan`, `status`, `status_pembayaran`, `batas_waktu`, `id_rute`) VALUES
(6, 'pelanggan@pelanggan.com', 9, 1, 'belum dibayar', '25-08-2017 12:45:20', 1),
(8, 'pelanggan@pelanggan.com', 9, 1, 'LUNAS', '25-08-2017 12:55:55', 1),
(10, NULL, 9, 3, 'belum dibayar', NULL, 1),
(12, 'admin', 9, 1, 'LUNAS', '25-08-2017 07:44:20', 1),
(13, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(14, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(15, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(16, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(17, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(18, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(19, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(20, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(21, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(22, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(23, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(24, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(25, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(26, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(27, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(28, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(29, 'admin', 9, 3, 'belum dibayar', NULL, 1),
(30, 'admin', 9, 3, 'belum dibayar', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilihan_rute`
--

CREATE TABLE `pilihan_rute` (
  `id` bigint(20) NOT NULL,
  `id_keberangkatan` bigint(20) DEFAULT NULL,
  `id_rute` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pilihan_rute`
--

INSERT INTO `pilihan_rute` (`id`, `id_keberangkatan`, `id_rute`) VALUES
(3, NULL, 1),
(4, 9, 3),
(5, 9, 1),
(6, 10, 1),
(7, 10, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id` tinyint(1) NOT NULL,
  `rekening` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id`, `rekening`) VALUES
(1, '07829879727 a.n Bambang (BNI)');

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
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `biaya` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `rute`, `asal`, `tujuan`, `biaya`) VALUES
(1, 'Palembang - Medan', 'Palembang', 'Medan', 500000),
(3, 'Palembang - Jambi', 'Palembang', 'Jambi', 200000);

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
('082280940094', '5c06181e1485af4fc4051d2c5aa0caba', 3),
('admin', '21232f297a57a5a743894a0e4a801fc3', 2),
('direktur', '4fbfd324f5ffcdff5dbf6f019b02eca8', 1),
('pelanggan@pelanggan.com', '098f6bcd4621d373cade4e832627b4f6', 3),
('risusanto@outlook.com', '7f207a77ce16ce0b2cf9476cdfd9a451', 3);

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
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `fkpesanan` (`id_pesanan`),
  ADD KEY `fkpelanggan` (`pelanggan`);

--
-- Indexes for table `log_tiket`
--
ALTER TABLE `log_tiket`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_id_keberangkatan` (`id_keberangkatan`),
  ADD KEY `fk_pelanggan` (`pelanggan`),
  ADD KEY `fk_id_rute` (`id_rute`),
  ADD KEY `fk_id_pesanan` (`id_pesanan`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `fk_pelanggaan_notifikasi` (`pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_pelangganpesanan` (`pelanggan`),
  ADD KEY `fk_keberangkatan` (`id_keberangkatan`);

--
-- Indexes for table `pilihan_rute`
--
ALTER TABLE `pilihan_rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keberangkatanrute` (`id_keberangkatan`),
  ADD KEY `pilihanrute` (`id_rute`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_bus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `id_keberangkatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log_tiket`
--
ALTER TABLE `log_tiket`
  MODIFY `id_log` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pilihan_rute`
--
ALTER TABLE `pilihan_rute`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Ketidakleluasaan untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `fkpelanggan` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkpesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_tiket`
--
ALTER TABLE `log_tiket`
  ADD CONSTRAINT `fk_id_keberangkatan` FOREIGN KEY (`id_keberangkatan`) REFERENCES `keberangkatan` (`id_keberangkatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_rute` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `fk_pelanggaan_notifikasi` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_keberangkatan` FOREIGN KEY (`id_keberangkatan`) REFERENCES `keberangkatan` (`id_keberangkatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pelangganpesanan` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pilihan_rute`
--
ALTER TABLE `pilihan_rute`
  ADD CONSTRAINT `keberangkatanrute` FOREIGN KEY (`id_keberangkatan`) REFERENCES `keberangkatan` (`id_keberangkatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pilihanrute` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_idrole` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
