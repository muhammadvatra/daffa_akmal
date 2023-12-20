-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2023 pada 05.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joki1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi_pembeli`
--

CREATE TABLE `koleksi_pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nickgame` varchar(255) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `koleksi_pembeli`
--

INSERT INTO `koleksi_pembeli` (`id_pembeli`, `nama`, `email`, `nickgame`, `nomor_telepon`) VALUES
(1, 'gs', 'gdg@gmail.com', 'sd', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderjoki`
--

CREATE TABLE `orderjoki` (
  `id_order` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `paket_harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orderjoki`
--

INSERT INTO `orderjoki` (`id_order`, `id_pembeli`, `paket_harga`) VALUES
(1, 1, 'paket3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `koleksi_pembeli`
--
ALTER TABLE `koleksi_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `orderjoki`
--
ALTER TABLE `orderjoki`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `koleksi_pembeli`
--
ALTER TABLE `koleksi_pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orderjoki`
--
ALTER TABLE `orderjoki`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orderjoki`
--
ALTER TABLE `orderjoki`
  ADD CONSTRAINT `orderjoki_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `koleksi_pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
