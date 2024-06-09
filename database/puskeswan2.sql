-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2024 pada 09.55
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskeswan2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(5) NOT NULL,
  `username` varchar(128) NOT NULL,
  `adminPass` varchar(128) NOT NULL,
  `imageAdmin` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `adminPass`, `imageAdmin`) VALUES
('AD001', 'admin', 'admin123', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_rm`
--

CREATE TABLE `detail_rm` (
  `id_rm` char(11) NOT NULL,
  `diagnosa` varchar(256) NOT NULL,
  `obat` varchar(256) NOT NULL,
  `dosis` varchar(256) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_rm`
--

INSERT INTO `detail_rm` (`id_rm`, `diagnosa`, `obat`, `dosis`, `status`) VALUES
('RM040624001', 'Hamil', 'Vitamin', '1 kali 1 hari', 'Sudah Diperiksa'),
('RM040624002', 'Ga cocok makanan nya', 'Ganti makanan', 'gada', 'Sudah Diperiksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_hewan` char(4) NOT NULL,
  `id_user` char(4) NOT NULL,
  `nama_hewan` varchar(128) NOT NULL,
  `jns_hewan` varchar(128) NOT NULL,
  `jns_klmn` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_hewan`, `id_user`, `nama_hewan`, `jns_hewan`, `jns_klmn`) VALUES
('P003', 'U005', 'Yuka', 'Hamster', 'Betina'),
('P004', 'U005', 'Kattie', 'Anjing', 'Betina'),
('P005', 'U006', 'Odet', 'Kucing', 'Jantan'),
('P006', 'U007', 'Jon', 'Marmut', 'Jantan'),
('P007', 'U008', 'Blacky', 'Kucing', 'Jantan'),
('P008', 'U009', 'Cemong', 'Kucing', 'Betina'),
('P009', 'U010', 'kuning', 'ular', 'khusus'),
('P010', 'U011', 'Jon', 'Monyet', 'Jantan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` char(11) NOT NULL,
  `id_user` varchar(4) NOT NULL,
  `id_hewan` varchar(4) NOT NULL,
  `tgl_sekarang` date NOT NULL,
  `keluhan` varchar(256) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `id_user`, `id_hewan`, `tgl_sekarang`, `keluhan`, `status`) VALUES
('RM040624001', 'U005', 'P003', '2024-06-04', 'Perut membesar', 'Sudah Diperiksa'),
('RM040624002', 'U005', 'P004', '2024-06-04', 'muntah', 'Sudah Diperiksa'),
('RM040624003', 'U007', 'P006', '2024-06-04', 'Mata bengkak', 'Belum Diperiksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(4) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nik`, `alamat`, `email`, `no_telp`, `password`, `image`) VALUES
('U001', 'Virgi', '2147483647', 'Bogor', 'virgi@gmail.com', '2147483647', '$2y$10$MM0iXCGRlTYYR0jPBjSIwelboGNnV6SmoeUebFcfrR3rJofD.ephS', 'default.jpg'),
('U002', 'Ucok', '2147483647', 'Citoh Bogor', 'ucok@gmail.com', '2147483647', '$2y$10$8W8B9cIf9awy/4t3X3hnVeer3MkioNA5IOd10RHpAzCPJZUJVmP76', 'default.jpg'),
('U003', 'Syifa S.M', '2147483647', 'Citoh Bogor', 'syifa2@gmail.com', '2147483647', '$2y$10$BBpFUnLAFW5ntPHMnQIY3uL30MzZ.XQSTFrQW2iBec.kg6TGVZhru', 'default.jpg'),
('U004', 'Cuming', '2147483647', 'Puraseda', 'cuming@gmail.com', '2147483647', '$2y$10$1itrIwvewygz7XCUgwdSiOQLYKgNKrjk/EcuMnKnX3SQzxPKMnf5m', 'default.jpg'),
('U005', 'David', '3201294307030001', 'Ahmad Yani', 'david@gmail.com', '085211010173', '$2y$10$QDctY.1CfjoRWKgb22gj4uHlHNHudnIUsG/GT.fN8B2iCVw7uVzme', 'pro1717146223.png'),
('U006', 'Syifa Salsabil .M', '3201294307030001', 'Ciomas, Bogor', 'syifasalsabil03@gmail.com', '0895403166663', '$2y$10$QuhvQmFXk8KVQsioEyopte3wRIzBz8vDI6.YPdUtqgAw6D4eIU3Lq', 'pro1717153182.png'),
('U007', 'User', '2133892387987919', 'Ciomas-Bogor', 'user@gmail.com', '0895403166663', '$2y$10$/gwQn4BCV/2pWNWd1Ync/e21xIHNxS/paoZylbagSzQUfKr1pGoLa', 'default.jpg'),
('U008', 'Ronal', '3201294307030001', 'Bogor', 'ronal@gmail.com', '085211010173', '$2y$10$PUZZaUjvvkQvTFZM9nTOFuevdqstbVO6vF7AEZmDlYXCMIb88Q1sO', 'default.jpg'),
('U009', 'Nesa Tri Andini', '3201294307030001', 'Bogor', 'nesa@gmail.com', '085211010173', '$2y$10$S.ZrleR8.AWR3I.mwjjyl.reGtzv2ABgx4/l0KSaroW1E0pJ9eFdm', 'default.jpg'),
('U010', 'fadi', '1313293729', 'kota', 'fadi@gmail.com', '083745893828', '$2y$10$ycdWefuujSJk96Uzyyt9Q.mclLnPiat3FpLMnayRo6VyPo5szGk.W', 'default.jpg'),
('U011', 'Rafly', '3212223243412', 'Bogor', 'rafly@gmail.com', '081234567891', '$2y$10$zCRVTNFaivcBQRjPBz/rkOfbjN1W9gLpaFzqKbvEVX6SxJNnusrji', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_rm`
--
ALTER TABLE `detail_rm`
  ADD KEY `id_rm` (`id_rm`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_hewan`),
  ADD KEY `user_id` (`id_user`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_hewan` (`id_hewan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_rm`
--
ALTER TABLE `detail_rm`
  ADD CONSTRAINT `id_rm` FOREIGN KEY (`id_rm`) REFERENCES `rekam_medis` (`id_rm`);

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `id_hewan` FOREIGN KEY (`id_hewan`) REFERENCES `pasien` (`id_hewan`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
