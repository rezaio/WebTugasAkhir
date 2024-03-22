-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2024 pada 03.47
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deperkasa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_minuman`
--

CREATE TABLE `data_minuman` (
  `id_minuman` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_minuman`
--

INSERT INTO `data_minuman` (`id_minuman`, `nama`, `harga`, `jumlah`, `tanggal`) VALUES
(20, 'Air mineral', '5.000', 2, '2023-09-19'),
(21, 'aqua', '5.000', 2, '2023-09-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_harian`
--

CREATE TABLE `kelas_harian` (
  `id_kh` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `harga` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_harian`
--

INSERT INTO `kelas_harian` (`id_kh`, `nama`, `no_telp`, `tanggal`, `waktu`, `kelas`, `harga`) VALUES
(41, 'reza', '085379918877', '2023-08-19', '18:51:05', 'gym', '25.000'),
(42, 'ahoy', '085379916605', '2023-09-26', '18:55:00', 'gym', '25.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan_member`
--

CREATE TABLE `kunjungan_member` (
  `id_km` int(4) NOT NULL,
  `id_registrasi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan_member`
--

INSERT INTO `kunjungan_member` (`id_km`, `id_registrasi`, `tanggal`, `waktu`) VALUES
(4, 0, '2023-08-19', '12:06:09'),
(14, 6, '2023-09-07', '10:47:07'),
(29, 8, '2023-09-19', '11:59:26'),
(30, 10, '2023-09-19', '12:02:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `id_registrasi` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(2) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tipe_member` enum('1bulan','3bulan','6bulan','grub','pelatih') NOT NULL,
  `no_member` int(4) NOT NULL,
  `tgl_aktivasi` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `pelatih` varchar(30) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `usia`, `no_ktp`, `no_telp`, `tipe_member`, `no_member`, `tgl_aktivasi`, `tgl_berakhir`, `pelatih`, `harga`) VALUES
(7, 'reza ok', 'wiyono', 'pringsewu', '2002-03-24', 20, '1809765478927364', '085379918805', '1bulan', 1002, '2023-07-19', '2023-08-19', 'taufik', '250.000'),
(8, 'putri ', 'labuhan ratu', 'bandar lampung', '2002-02-15', 20, '1809765478927364', '085379918805', '3bulan', 1004, '2023-09-15', '2023-11-15', '', '600.000'),
(9, 'tasya', 'labuhan dalam', 'pesawaran', '2000-10-15', 23, '1809765478927364', '085379913423', '1bulan', 1001, '2023-06-15', '2023-07-15', '', '250.000'),
(10, 'sheila', 'labuhan dalam', 'bandar lampung', '2000-02-19', 23, '1809765478927364', '085379918805', '1bulan', 1005, '2023-09-19', '2023-10-19', '', '250.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `jabatan`, `role`) VALUES
(9, 'super admin', '$2y$10$9AD8XNzjcGHpgBwuebmGrOmrOCNY11mZbZtwkmAUkL4DRA5JseH0W', 'manager@gmail.com', 'Manager', 'user'),
(10, 'admin', '$2y$10$GlIRoftw6wdusSK9hVV3Cuo/ghM50Addk/QEscOgltZBu9p/dK5G6', 'admin@gmail.com', 'Resepsionis', 'admin'),
(17, 'fikri', '$2y$10$AGr7p20KvJN3Ctp9c0Gq5u9mM1qXZnyf3ikHFKzsVCuQ1Ytylqzwm', 'fikri@gmail.com', 'Resepsionis', 'admin'),
(18, 'hidayati', '$2y$10$ghjKgv6HMcooBStVLwSzVeRCiha2/SOsTHBlZTLK7N2jj28cODCqe', 'hidayati@gmail.com', 'Manager', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_minuman`
--
ALTER TABLE `data_minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indeks untuk tabel `kelas_harian`
--
ALTER TABLE `kelas_harian`
  ADD PRIMARY KEY (`id_kh`);

--
-- Indeks untuk tabel `kunjungan_member`
--
ALTER TABLE `kunjungan_member`
  ADD PRIMARY KEY (`id_km`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_minuman`
--
ALTER TABLE `data_minuman`
  MODIFY `id_minuman` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kelas_harian`
--
ALTER TABLE `kelas_harian`
  MODIFY `id_kh` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `kunjungan_member`
--
ALTER TABLE `kunjungan_member`
  MODIFY `id_km` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
