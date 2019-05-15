-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2019 pada 04.51
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_profile_ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `nama_level`) VALUES
(1, 'pakar'),
(2, 'user_b'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_contact` char(20) NOT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_level` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_password`, `user_level`) VALUES
(1, 'Naufal', 'naufal@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(2, 'Daria', 'email2@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '2'),
(3, 'Jhon', 'email3@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '3'),
(4, 'setyanto', 'mail@gmail.com', '', '7ef6156c32f427d713144f67e2ef14d2', '1'),
(5, 'hamid', 'mail9@gmail.com', '0894561', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(6, 'asep', 'mail12@gmail.com', '08945614', '123456', '1'),
(7, 'asep12', 'mail9@gmail.com', '08945614', '123456', '1'),
(8, 'asep123', 'mail9@gmail.com', '08945614', '123456', '1'),
(9, 'hamid56', 'mail9@gmail.com', '08945614', '123456', '1'),
(10, 'naufal', 'mail122@gmail.com', '08945614111', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(11, 'user B aja', 'userb@gmail.com', '1985555', 'e10adc3949ba59abbe56e057f20f883e', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
