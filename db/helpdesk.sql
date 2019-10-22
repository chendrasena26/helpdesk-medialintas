-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2019 pada 17.40
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `clientcompany`
--

CREATE TABLE `clientcompany` (
  `id_client` int(3) NOT NULL,
  `id_company` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `clientcompany`
--

INSERT INTO `clientcompany` (`id_client`, `id_company`) VALUES
(5, 2),
(8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id_company` int(3) NOT NULL,
  `nama_company` varchar(50) NOT NULL,
  `alamat_company` text NOT NULL,
  `telp_company` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id_company`, `nama_company`, `alamat_company`, `telp_company`) VALUES
(1, 'PT. Sejahtera', 'Jalan Sejahtera 18 Surabaya', '081234567890'),
(2, 'PT. Jaya Sentosa', 'Jalan Aspal No.123 Semarang', '089876543210'),
(3, 'PT. Semut Hitam', 'Jalan Semut No 15 Karanganyar', '089667456332');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'TV'),
(2, 'Kabel'),
(3, 'Repeater'),
(4, 'Router'),
(5, 'Komputer'),
(6, 'Printer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `id_req` int(5) NOT NULL,
  `isi_komplain` text NOT NULL,
  `pengirim_komplain` int(3) NOT NULL,
  `waktu_komplain` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`id_req`, `isi_komplain`, `pengirim_komplain`, `waktu_komplain`) VALUES
(28, 'asdfg', 5, '2019-07-25 16:48:32'),
(28, 'uwu', 5, '2019-07-25 17:36:59'),
(28, 'tenang', 2, '2019-07-25 17:37:46'),
(29, 'kok sebat, kan di rumah saya dilarang merokok', 5, '2019-07-25 18:42:11'),
(30, 'uuu', 5, '2019-07-26 10:10:33'),
(30, 'aaa', 1, '2019-07-26 10:10:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logstatus`
--

CREATE TABLE `logstatus` (
  `id_req` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `logstatus`
--

INSERT INTO `logstatus` (`id_req`, `status`, `tanggal`) VALUES
(27, 1, '2019-07-17 10:45:23'),
(27, 2, '2019-07-17 03:45:49'),
(28, 1, '2019-07-17 10:47:08'),
(28, 2, '2019-07-17 10:47:42'),
(28, 3, '2019-07-17 10:51:58'),
(29, 1, '2019-07-25 18:40:17'),
(29, 2, '2019-07-25 18:40:38'),
(29, 3, '2019-07-25 18:40:56'),
(28, 1, '2019-07-26 09:54:27'),
(28, 2, '2019-07-26 09:56:08'),
(28, 3, '2019-07-26 09:58:41'),
(28, 3, '2019-07-26 09:58:41'),
(30, 1, '2019-07-26 10:09:22'),
(30, 2, '2019-07-26 10:09:48'),
(30, 3, '2019-07-26 10:10:09'),
(31, 1, '2019-08-01 11:29:00'),
(34, 1, '2019-08-15 09:21:48'),
(37, 1, '2019-08-15 09:26:35'),
(31, 2, '2019-08-23 10:15:47'),
(31, 3, '2019-08-23 10:16:56'),
(34, 2, '2019-09-13 11:10:02'),
(38, 1, '2019-09-13 11:12:06'),
(38, 2, '2019-09-13 11:20:41'),
(38, 3, '2019-09-13 11:23:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_req` int(5) NOT NULL,
  `id_pengirim` int(3) NOT NULL,
  `deskripsi_req` text NOT NULL,
  `tanggal_open` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kategori` int(2) NOT NULL,
  `id_subkategori` int(3) NOT NULL,
  `id_operator` int(3) DEFAULT NULL,
  `id_teknisi` int(3) DEFAULT NULL,
  `desc_teknisi` text,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `delete_date` datetime DEFAULT NULL,
  `delete_by` int(3) DEFAULT NULL,
  `is_komplain` tinyint(1) NOT NULL DEFAULT '0',
  `rating` tinyint(1) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_req`, `id_pengirim`, `deskripsi_req`, `tanggal_open`, `id_kategori`, `id_subkategori`, `id_operator`, `id_teknisi`, `desc_teknisi`, `latitude`, `longitude`, `status`, `delete_date`, `delete_by`, `is_komplain`, `rating`, `review`) VALUES
(27, 5, 'keluar kok', '2019-07-17 10:45:23', 1, 1, 1, 2, NULL, '0', '0', 2, '2019-07-17 03:46:52', 1, 0, 0, ''),
(28, 5, 'nyala kok', '2019-07-26 09:54:27', 4, 5, NULL, 2, 'uwu', '-0.6591651462894504', '12.529067968042582', 3, NULL, NULL, 1, 2, 'ssss'),
(29, 5, 'saya siram air', '2019-07-25 18:40:17', 5, 7, 1, 2, 'sebat kuy', '0', '0', 3, NULL, NULL, 1, 2, 'ss'),
(30, 5, 'aaa', '2019-07-26 10:09:22', 4, 6, NULL, 2, 'aa', '0', '0', 3, NULL, NULL, 1, 1, 'meh'),
(31, 5, 'test', '2019-08-01 11:29:00', 4, 5, NULL, 11, 'sebats kuy', '0', '0', 3, NULL, NULL, 0, 0, ''),
(34, 5, 'asdf', '2019-08-15 09:21:48', 6, 8, NULL, 11, NULL, '-7.318100299999999', '112.7271187', 2, NULL, NULL, 0, 0, ''),
(37, 5, 'asas', '2019-08-15 09:26:35', 4, 5, NULL, NULL, NULL, '-7.303728086779487', '112.71577835083009', 1, NULL, NULL, 0, 0, ''),
(38, 5, 'repeater mati gatau kenapa', '2019-09-13 11:12:06', 3, 4, NULL, 2, 'sudah membetulkan router', '-7.320477940964768', '112.69208623786332', 3, NULL, NULL, 0, 4, 'bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE `subkategori` (
  `id_subkategori` int(3) NOT NULL,
  `isi_subkategori` text NOT NULL,
  `id_kategori` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `subkategori`
--

INSERT INTO `subkategori` (`id_subkategori`, `isi_subkategori`, `id_kategori`) VALUES
(1, 'gambar tidak keluar', 1),
(2, 'gambar redup', 1),
(3, 'Kabel tidak berfungsi', 2),
(4, 'Repeater mati', 3),
(5, 'Router tidak menyala', 4),
(6, 'setting router gagal', 4),
(7, 'Komputer tidak mau menyala', 5),
(8, 'Tinta tidak keluar', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `kategori_user` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password_user`, `email_user`, `kategori_user`, `is_deleted`) VALUES
(1, 'Saya Operator', '529ca8050a00180790cf88b63468826a', 'sayaoperator@gmail.com', 2, 0),
(2, 'Saya Teknisi', '4e4d6c332b6fe62a63afe56171fd3725', 'sayateknisi@gmail.com', 3, 0),
(3, 'Admin Helpdesk', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 0),
(4, 'Teknisi Dua', '101a6ec9f938885df0a44f20458d2eb4', 'teknisidua@gmail.com', 3, 1),
(5, 'Saya Client', 'f3c2cefc1f3b082a56f52902484ca511', 'sayaclient@client.com', 4, 0),
(8, 'Client Dua', '7c26cc88ade81d528674cc714656d501', 'clientdua@gmail.com', 4, 0),
(9, 'Operator Dua', 'd41d8cd98f00b204e9800998ecf8427e', 'operatordua@gmail.com', 2, 0),
(11, 'Teknisi Tiga', '0cea6d80ad09f3329a3b7c6d4fed5eb2', 'teknisitiga@aol.com', 3, 0),
(12, 'Operator Tiga', 'ca4dc0e099659eb26c4d983e96347137', 'operatortiga@gmail.com', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `clientcompany`
--
ALTER TABLE `clientcompany`
  ADD KEY `clientcompany_ibfk_1` (`id_client`),
  ADD KEY `clientcompany_ibfk_2` (`id_company`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD KEY `id_req` (`id_req`),
  ADD KEY `pengirim_komplain` (`pengirim_komplain`);

--
-- Indeks untuk tabel `logstatus`
--
ALTER TABLE `logstatus`
  ADD KEY `id_req` (`id_req`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_req`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_operator` (`id_operator`),
  ADD KEY `id_teknisi` (`id_teknisi`),
  ADD KEY `id_subkategori` (`id_subkategori`),
  ADD KEY `delete_by` (`delete_by`),
  ADD KEY `request_ibfk_2` (`id_pengirim`);

--
-- Indeks untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id_subkategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id_req` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id_subkategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `clientcompany`
--
ALTER TABLE `clientcompany`
  ADD CONSTRAINT `clientcompany_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `clientcompany_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD CONSTRAINT `komplain_ibfk_1` FOREIGN KEY (`id_req`) REFERENCES `request` (`id_req`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komplain_ibfk_2` FOREIGN KEY (`pengirim_komplain`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `logstatus`
--
ALTER TABLE `logstatus`
  ADD CONSTRAINT `logstatus_ibfk_1` FOREIGN KEY (`id_req`) REFERENCES `request` (`id_req`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`id_operator`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`id_teknisi`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_5` FOREIGN KEY (`id_subkategori`) REFERENCES `subkategori` (`id_subkategori`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_6` FOREIGN KEY (`delete_by`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subkategori`
--
ALTER TABLE `subkategori`
  ADD CONSTRAINT `subkategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
