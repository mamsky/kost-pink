-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jul 2025 pada 11.34
-- Versi server: 10.6.22-MariaDB
-- Versi PHP: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpmyid_kosan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tagihan` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `jatuh_tempo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id`, `id_user`, `tagihan`, `bulan`, `jatuh_tempo`, `status`) VALUES
(51, 5, '600000', '07-07-2025', '06-08-2025', 'lunas'),
(52, 5, '600000', '06-08-2025', '05-09-2025', 'lunas'),
(53, 5, '600000', '05-09-2025', '05-10-2025', 'lunas'),
(54, 5, '600000', '05-10-2025', '04-11-2025', 'lunas'),
(55, 5, '600000', '04-11-2025', '04-12-2025', 'belum lunas'),
(56, 5, '600000', '04-12-2025', '03-01-2026', 'belum lunas'),
(57, 5, '600000', '03-01-2026', '02-02-2026', 'belum lunas'),
(58, 5, '600000', '02-02-2026', '04-03-2026', 'belum lunas'),
(59, 5, '600000', '04-03-2026', '03-04-2026', 'belum lunas'),
(60, 5, '600000', '03-04-2026', '03-05-2026', 'belum lunas'),
(61, 5, '600000', '03-05-2026', '02-06-2026', 'belum lunas'),
(62, 5, '600000', '02-06-2026', '02-07-2026', 'belum lunas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
