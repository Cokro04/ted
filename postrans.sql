-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2021 pada 14.14
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postrans`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `barang_id` int(11) NOT NULL,
  `kode_barang` varchar(200) NOT NULL,
  `jenis` enum('Pecah Belah','Bukan Pecah Belah') NOT NULL,
  `isi` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `id_barang_masuk` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agen`
--

CREATE TABLE `tbl_agen` (
  `agen_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `pesan` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_agen`
--

INSERT INTO `tbl_agen` (`agen_id`, `id_user`, `name`, `address`, `description`, `pesan`, `created`, `updated`, `kode_pos`) VALUES
(1, 16, 'POS', 'JL', 'Active', 'asdwert', '2021-01-05 19:55:45', '2021-01-30 06:38:36', 78987),
(3, 17, 'AGEN POS SOREANG CINGCIN', 'Jl. Raya Soreang Kopo No.78, Cingcin, Kec. Soreang, Bandung, Jawa Barat ', 'Active', 'dadada', '2021-01-05 20:47:00', '2021-01-23 11:04:13', 40914);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `barang_id` char(7) NOT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jenis` enum('Pecah Belah','Bukan Pecah Belah') NOT NULL,
  `isi` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` varchar(2) NOT NULL,
  `id_outbound` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `id_user`, `jenis`, `isi`, `berat`, `alamat`, `created`, `updated`, `status`, `id_outbound`) VALUES
('BR00001', '17', 'Pecah Belah', 'asasa', '12', 'wweqweweqw', '2021-01-29 12:29:49', '0000-00-00 00:00:00', 'BK', 'Z000001'),
('BR00002', '17', 'Pecah Belah', 'kskfmd', '12', 'sfsf', '2021-01-29 12:35:09', '0000-00-00 00:00:00', 'BK', 'Z000001'),
('BR00003', '16', 'Pecah Belah', 'asdwasdw12345', '211', 'asdwjl1234', '2021-01-29 13:32:28', '2021-01-29 16:04:07', 'BK', 'Z000001'),
('BR00004', '16', 'Bukan Pecah Belah', 'DDASD', '123', 'ASADADADA', '2021-01-29 16:04:58', '2021-01-29 22:07:25', 'BK', 'Z000001'),
('BR00005', '16', 'Pecah Belah', 'h', '12', '1111', '2021-01-30 19:14:23', '2021-01-30 19:45:34', 'BK', 'Z000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_barang_keluar` int(20) NOT NULL,
  `id_pusat` int(200) NOT NULL,
  `id_user` int(200) NOT NULL,
  `tgl_barang_keluar` datetime NOT NULL,
  `keterangan_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_agen` varchar(30) NOT NULL,
  `tgl_barang_masuk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(11) NOT NULL,
  `pos_name` varchar(200) NOT NULL,
  `kode_pos` int(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `pos_name`, `kode_pos`, `alamat`) VALUES
(1, 'POS Soreang', 40911, 'Jl. Raya Soreang - Banjaran, Soreang, Kec. Soreang, Bandung, Jawa Barat'),
(2, 'AGEN POS SOREANG CINGCIN', 40914, 'Jl. Raya Soreang Kopo No.78, Cingcin, Kec. Soreang, Bandung, Jawa Barat ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kode_pos`
--

CREATE TABLE `tbl_kode_pos` (
  `pos_id` int(11) NOT NULL,
  `kabupaten` varchar(200) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kode_pos`
--

INSERT INTO `tbl_kode_pos` (`pos_id`, `kabupaten`, `kode_pos`, `provinsi`) VALUES
(1, 'Bandung', '40191 - 40974', 'Jawa Barat'),
(2, 'Bandung Barat', '40391 - 40567', 'Jawa Barat'),
(3, 'Bekasi', '17211 - 17730', 'Jawa Barat'),
(4, 'Bogor', '16110 - 16969', 'Jawa Barat'),
(5, 'Ciamis', '46211 - 46388', 'Jawa Barat'),
(6, 'Cianjur', '43215 - 43292', 'Jawa Barat'),
(7, 'Cirebon', '45150 - 45652', 'Jawa Barat'),
(8, 'Garut', '44111 - 44193', 'Jawa Barat'),
(9, 'Indramayu', '45211 - 45285', 'Jawa Barat'),
(10, 'Karawang', '41311 - 41386', 'Jawa Barat'),
(11, 'Kuningan', '45511 - 45595', 'Jawa Barat'),
(12, 'Majalengka', '45411 - 45476', 'Jawa Barat'),
(13, 'Pangandaran', '46267 - 46397', 'Jawa Barat'),
(14, 'Purwakarta', '41111 - 41182', 'Jawa Barat'),
(15, 'Subang', '41211 - 41288', 'Jawa Barat'),
(16, 'Sukabumi', '43132 - 43368', 'Jawa Barat'),
(17, 'Sumedang', '45311 - 45393', 'Jawa Barat'),
(18, 'Tasik Malaya', '46153 - 46476', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_outbound`
--

CREATE TABLE `tbl_outbound` (
  `id_outbound` char(7) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `tanggal_cetak` datetime NOT NULL,
  `Tujuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_outbound`
--

INSERT INTO `tbl_outbound` (`id_outbound`, `Nama`, `tanggal_cetak`, `Tujuan`) VALUES
('Z000001', 'kopi luak', '2021-01-30 19:06:58', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setor_barang`
--

CREATE TABLE `tbl_setor_barang` (
  `barang_id` int(11) NOT NULL,
  `kode_barang` varchar(200) NOT NULL,
  `jenis` enum('Pecah Belah','Bukan Pecah Belah') NOT NULL,
  `isi` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `barang_id` varchar(200) NOT NULL,
  `waktu` datetime NOT NULL,
  `informasi` text NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:Admin, 2:Agen, 3:Manajer',
  `id_agen` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `name`, `level`, `id_agen`) VALUES
(1, 992471643, '30e2238080dfce4e3571945b5b46a51072cdf0a7', 'Otang', 1, NULL),
(2, 974369871, '21edae99169878f1f0608bf31d4e8ebfd63d9378', 'Sutarwan S', 2, '3'),
(3, 988440155, 'cc717d0e963c470c373ddb06247afd067e586465', 'Ferry Ferdian', 2, '1'),
(4, 972363919, '286a7b3b83e5dd978ca34064996d204948398a58', 'Teddy Irawan', 3, NULL),
(5, 971362520, '2cd9b1cae0aeebc0b41e8d9134564adee3ffbc8a', 'Daniansyah', 1, NULL),
(11, 970347418, '5fc07895d39bbdffd1f99ceff3bd98fe350fb9c2', 'Iwan Rustiawan', 1, NULL),
(15, 1174038, '76ec911260a543a63269be5a59364049a54902ca', 'teddygideon', 1, NULL),
(16, 10001, '6c447a8fe7677ddc4c4cd2efddcfe650e4e6c706', 'agen1', 2, NULL),
(17, 10002, '6918d3fd8cd96f921bc242f76538d2d6f8078380', 'agen2', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `tbl_agen`
--
ALTER TABLE `tbl_agen`
  ADD PRIMARY KEY (`agen_id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indeks untuk tabel `tbl_kode_pos`
--
ALTER TABLE `tbl_kode_pos`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indeks untuk tabel `tbl_outbound`
--
ALTER TABLE `tbl_outbound`
  ADD PRIMARY KEY (`id_outbound`);

--
-- Indeks untuk tabel `tbl_setor_barang`
--
ALTER TABLE `tbl_setor_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_agen`
--
ALTER TABLE `tbl_agen`
  MODIFY `agen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_barang_keluar` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kode_pos`
--
ALTER TABLE `tbl_kode_pos`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_setor_barang`
--
ALTER TABLE `tbl_setor_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
