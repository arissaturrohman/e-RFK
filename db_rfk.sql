-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2020 pada 07.37
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rfk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggaran`
--

CREATE TABLE `tb_anggaran` (
  `id` int(11) NOT NULL,
  `anggaran` varchar(50) NOT NULL,
  `realisasi` varchar(50) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggaran`
--

INSERT INTO `tb_anggaran` (`id`, `anggaran`, `realisasi`, `bulan`, `keterangan`, `tahun`) VALUES
(1, '2000000', '1650000', 'januari', 'Murni', '2020'),
(2, '1500000', '500000', 'januari', 'Murni', '2019'),
(3, '2000000', '1800000', 'pebruari', 'Murni', '2020'),
(4, '2000000', '2000000', 'maret', 'Perubahan', '2020'),
(5, '1500000', '950000', 'pebruari', 'murni', '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Arissatur Rohman', 'admin', '$2y$10$pqjTCyVyUxhOItNb2n.uU.JSuohJf95egVgmAso9lHaRiwFUQgycS', 'admin'),
(2, 'Lisnawati', 'user', '$2y$10$ARjiwVMvT9llc2GbH859Ve0NNyP4s1nz0aqDgz6tNSgT2Tevk8YBm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
