-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2020 pada 03.28
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_pesanan_index` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `jumlah_pesanan` varchar(10) NOT NULL,
  `jumlah_harga` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_pesan`, `id_pesanan_index`, `id_masakan`, `jumlah_pesanan`, `jumlah_harga`, `keterangan`) VALUES
(1, 9, 1, '2', '', ''),
(2, 18, 1, '2', '', ''),
(3, 17, 3, '3', '', ''),
(4, 17, 1, '1', '', ''),
(5, 18, 3, '1', '', 'pedes'),
(6, 18, 7, '3', '30000', ''),
(7, 12, 7, '2', '20000', 'pedes'),
(8, 15, 3, '1', '10000', ''),
(9, 14, 1, '2', '16000', ''),
(10, 20, 3, '2', '20000', ''),
(11, 20, 1, '3', '24000', ''),
(12, 19, 7, '2', '20000', ''),
(13, 19, 3, '1', '10000', ''),
(14, 13, 7, '2', '20000', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'kasir'),
(3, 'waiter'),
(4, 'owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `status_masakan` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_masakan`) VALUES
(1, 'Roti', '8000', '1'),
(2, 'basir', '8000', '0'),
(3, 'geprek', '10000', '1'),
(4, 'Ayam', '8000', '0'),
(7, 'Ikan bakar', '10000', '1'),
(8, 'Roti Bakar', '15000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` varchar(50) NOT NULL,
  `kapasitas` varchar(50) NOT NULL,
  `status_meja` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`, `kapasitas`, `status_meja`) VALUES
(1, '1', '4', 0),
(2, '2', '4', 1),
(3, '3', '4', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `id_meja` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pesanan` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `customer`, `id_meja`, `tanggal`, `id_user`, `status_pesanan`) VALUES
(2, 'Rohmad', '1', '2020-01-21', 1, '1'),
(3, 'de gea', '1', '0000-00-00', 1, '1'),
(4, 'dimas ari yanto', '3', '2020-01-21', 1, '0'),
(5, 'yefta kurnanto', '2', '2020-01-22', 1, '0'),
(6, 'karin', '2', '2020-01-22', 1, '0'),
(7, 'karin', '2', '2020-01-22', 1, '0'),
(8, 'basir', '1', '2020-01-22', 1, '0'),
(9, 'basir', '1', '2020-01-22', 1, '1'),
(10, 'basir', '1', '2020-01-22', 1, '0'),
(11, 'basir', '1', '2020-01-22', 1, '0'),
(12, 'basir', '1', '2020-01-22', 1, '0'),
(13, 'basir', '1', '2020-01-22', 1, '0'),
(14, 'basir', '1', '2020-01-22', 1, '1'),
(15, 'basir', '1', '2020-01-22', 1, '1'),
(16, 'Rotio', '1', '2020-01-22', 1, '1'),
(17, 'dimas ari yanto', '1', '2020-01-22', 1, '1'),
(18, 'Rotio', '2', '2020-01-22', 1, '1'),
(19, 'de gea', '1', '2020-01-26', 1, '1'),
(20, 'karin', '1', '2020-01-26', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pesanan_index2` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `harga` varchar(50) NOT NULL,
  `total_bayar` varchar(40) NOT NULL,
  `kembalian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_pesanan_index2`, `tanggal_transaksi`, `harga`, `total_bayar`, `kembalian`) VALUES
(1, 1, 15, '2020-01-25', '10000', '12000', '2000'),
(2, 1, 14, '2020-01-26', '8000', '10000', '2000'),
(3, 1, 20, '2020-01-26', '44000', '40000', '-4000'),
(4, 1, 19, '2020-01-26', '30000', '30000', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'admin', '$2y$10$nNzLUDJ.18JeiDT9o3ukUO.FS3uJDfrowU1wEOEqaDJUknIcCljKm', 'administrator', 1),
(2, 'kasir', '$2y$10$uQRsvJJLcM5oXxha2PWBvel2GBmUt.QCCLADcT6dV.Gqn8Wo.0LUa', 'Dicky Saputra', 2),
(3, 'waiter', '$2y$10$5FkEvHvdp1RKtwqTDd3lpOyL.MtB329k9o23x11qcWKzcL.YArVUq', 'Yefta pascal', 3),
(4, 'owner', '$2y$10$/pOyG6rBkmYNh0VrI0/Um.hSKRKuymjNHqT7FOADt5rfe9.hX832C', 'Dicky54putra', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_order` (`id_pesanan_index`),
  ADD KEY `id_masakan` (`id_masakan`),
  ADD KEY `id_order_2` (`id_pesanan_index`),
  ADD KEY `id_order_3` (`id_pesanan_index`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pesan` (`id_pesanan_index2`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
