-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2025 pada 22.36
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
-- Database: `koperasi desa kalegen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Mauldevelopment', 'c93ccd78b2076528346216b3b2f701e6'),
(2, 'Khotib474', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'BUMDESHarapanMaju', '01c353bcb5b32fe5161ed691830e5ca7'),
(4, 'Maulanjay', 'cb518fc1c422e169f009457240ce5b48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beranda`
--

CREATE TABLE `beranda` (
  `id` int(11) NOT NULL,
  `Kalimat_1` text NOT NULL,
  `foto` text NOT NULL,
  `Foto_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `beranda`
--

INSERT INTO `beranda` (`id`, `Kalimat_1`, `foto`, `Foto_2`) VALUES
(1, 'Selamat Datang', 'BUMDES HARAPAN MAJU KALEGEN', '<p><img src=\"../gambar/47d1e990583c9c67424d369f3414728e.jpg\" style=\"width: 720px;\"><br></p>'),
(3, 'BUMDES Harapan Maju Kalegen', 'Merupakan salah satu koperasi yang dikelola oleh Desa Kalegen, yang bertempat di Dusun Kalegen, komplek Pasar Kalegen. Pada BUMDES Kalegen menyediakan layanan simpanan/tabungan dan pinjaman', '<p><br><img src=\"../gambar/fc221309746013ac554571fbd180e1c8.50\" style=\"width: 780px;\"></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `Alamat` varchar(225) NOT NULL,
  `NIK` int(20) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `token_ganti_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `nama_lengkap`, `Alamat`, `NIK`, `email`, `password`, `token_ganti_password`) VALUES
(8, 'Maul', 'wonosobo', 2147483647, 'mauluddinkhotib474@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', ''),
(9, 'khotib', 'wonosobo', 2147483647, 'mauluddinmudzakkir67782@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `Tanggal` date NOT NULL,
  `Pinjaman` int(11) NOT NULL,
  `Bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id`, `nama_lengkap`, `Tanggal`, `Pinjaman`, `Bukti`) VALUES
(2, 'khotib', '2024-08-14', 10000, '<p>not</p>'),
(4, 'Maul', '2024-08-15', 100000, '<p>-</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpan`
--

CREATE TABLE `simpan` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `Tanggal` date NOT NULL,
  `Simpanan` int(11) NOT NULL,
  `Bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `simpan`
--

INSERT INTO `simpan` (`id`, `nama_lengkap`, `Tanggal`, `Simpanan`, `Bukti`) VALUES
(4, 'Maul', '2024-08-14', 10000000, '<p><img src=\"../gambar/5ef059938ba799aaa845e1c2e8a762bd.50\" style=\"width: 780px;\"><br></p>'),
(5, 'Khotib', '2024-08-08', 20000000, '<p>nop</p>'),
(6, 'Maul', '2024-08-15', 2147483647, '<p>tidak ada</p>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `beranda`
--
ALTER TABLE `beranda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `simpan`
--
ALTER TABLE `simpan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `beranda`
--
ALTER TABLE `beranda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `simpan`
--
ALTER TABLE `simpan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
