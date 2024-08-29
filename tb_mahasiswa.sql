-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2024 pada 20.10
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa_uc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nim` int(8) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nama`, `nim`, `tanggal_lahir`, `jurusan`, `alamat`, `email`, `no_telp`, `foto`) VALUES
(1, 'Wilfredo Alexander Sutanto', 20416028, '1998-01-03', 'Teknik Komputer', 'Surabaya', 'dm.fredo018@gmail.co', '081336015757', '0'),
(2, 'Kevin Alexander Sutanto', 20416029, '2000-05-26', 'Manajemen Perhotelan', 'Taman Pondok Indah', 'kevina@gmail.com', '081336015757', '0'),
(3, 'Himawan Budi Sutanto', 20416030, '2024-07-13', 'Manajemen Bisnis', 'Taman Pondok Indah', 'uc.fredo018@gmail.co', '081336015757', '0'),
(4, 'Lina Novi', 20416100, '2024-07-13', 'Manajemen Bisnis', 'Taman Pondok Indah', 'budi@gmail.com', '081336015757', 'Screenshot_2023-08-21_132441.png'),
(5, 'Yafet Hartono Indra Sayektii', 12345678, '2024-07-14', 'Manajemen Bisnis', 'Taman Pondok Indah', 'lina@gmail.com', '081336015757', 'Screenshot_2023-06-27_075645.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
