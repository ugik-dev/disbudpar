-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2019 pada 22.18
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cagarbudaya`
--

CREATE TABLE `cagarbudaya` (
  `id_cagarbudaya` int(20) NOT NULL,
  `id_jenis_cagarbudaya` int(11) NOT NULL,
  `id_kepemilikan_cagarbudaya` int(16) NOT NULL,
  `id_status_penetapan_cagarbudaya` int(16) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file2` varchar(640) NOT NULL,
  `file3` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cagarbudaya`
--

INSERT INTO `cagarbudaya` (`id_cagarbudaya`, `id_jenis_cagarbudaya`, `id_kepemilikan_cagarbudaya`, `id_status_penetapan_cagarbudaya`, `nama`, `alamat`, `file`, `file2`, `file3`, `dokumen`, `lokasi`, `deskripsi`, `id_kabupaten`, `id_user_entry`, `id_user_approv`) VALUES
(4, 1, 2, 2, 'Cagar Budaya 2', '', 'i2ei', '', '', '', '-1.883870, 106.109492', 'adwd', 2, 0, 0),
(5, 3, 2, 1, 'Tikus Emas', 'Jl Lintas Timur', 'e5eb6f66b1f7dd44905b9b1f67111f05.jpg', '37f2a7576816c5345a9887dd48239858.jpg', '06dd90ebb0105c8d0eb5261c7f7ccd36.jpg', 'bdd38185e860e4d9863351d0ec3ddd05.pdf', '-1.889718, 106.171162', 'aejfjfe', 2, 3, 0),
(6, 1, 1, 1, 'Taman Mandara', '', '98872576bf9876943289d557c40c69b9.jpg', '', 'f9600f22f41603e71a54cf0b99ba6e87.JPG', '', '-2.127592, 106.105455', 'dd', 1, 0, 4),
(7, 3, 1, 2, 'Matras', 'Jl Matras Sungailiat2', 'ddd9ec60c3e6b391e23bb2dc8ac50822.jpg', '487278aa0530cc95ce8a8fcb3e8f678a.png', '3e662bc6070af9707bc0a84808297176.jpg', 'bbcc89c8caca9187ac2005371022abff.pdf', '-1.836396, 106.123363', 'eskripsinya paaanaajngg panajang panjangngg sekalisd', 2, 3, 6),
(8, 1, 2, 2, 'Cagar Air Itam', 'Jalan Sudirman', 'dawd', '', '', '', '-2.127592, 106.157726', 'wdadw', 1, 2, 4),
(9, 1, 1, 1, 'Cagar Kota Pkp', 'Jl Kota Pangkalpinang', '7f68aedd8ec7655d0674c86a5f33bbbe.jpg', '', '6c56cb5795ec98f517ba21b789b0e516.jpg', '', '-2.174251, 106.069234', 'wdadw', 1, 0, 4),
(10, 2, 1, 1, 'Cagar Kenanga', '', '23ueua', '', '', '', '-1.915885, 106.119595', 'akdkawd', 2, 0, 0),
(12, 3, 1, 1, 'Cagar A', '', '-', '', '', '', '-', '-', 1, 0, 0),
(16, 1, 1, 1, '23', '', NULL, '', '', '', '1', '1', 2, 3, 0),
(17, 3, 2, 1, '43', 'Jl', NULL, '', '', '', '23', '54', 2, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cagarbudaya_pemugaran`
--

CREATE TABLE `cagarbudaya_pemugaran` (
  `id_pemugaran` int(11) NOT NULL,
  `id_cagarbudaya` int(11) NOT NULL,
  `nama` varchar(62) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `file2` varchar(640) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cagarbudaya_pemugaran`
--

INSERT INTO `cagarbudaya_pemugaran` (`id_pemugaran`, `id_cagarbudaya`, `nama`, `tanggal_kegiatan`, `file`, `file2`, `dokumen`, `deskripsi`, `id_user_entry`, `id_user_approv`, `id_kabupaten`) VALUES
(1, 5, '', '0000-00-00', '12', '', '', '12', 0, 0, 0),
(2, 5, '', '0000-00-00', '23', '', '', '23324', 0, 0, 0),
(3, 5, 'Pemugaran Cagar Budaya duaawd', '2019-12-29', '7ea0e89dc42ec5340785d2b1029fad4c.png', 'ccfb689816626fb1af7822e7b8abd258.png,1b125e8f5ba36df4339df48c07d4e5c0.png', '39914a9204f29cc02ec36b70a7e66fbc.pdf', 'suturut\r\nsut\r\nad', 3, 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_cagarbudaya`
--

CREATE TABLE `data_cagarbudaya` (
  `id_data_cagarbudaya` int(11) NOT NULL,
  `id_cagarbudaya` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `domestik_l` int(11) NOT NULL,
  `domestik_p` int(11) NOT NULL,
  `mancanegara_l` int(11) NOT NULL,
  `mancanegara_p` int(11) NOT NULL,
  `pajak` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_cagarbudaya`
--

INSERT INTO `data_cagarbudaya` (`id_data_cagarbudaya`, `id_cagarbudaya`, `tahun`, `bulan`, `domestik_l`, `domestik_p`, `mancanegara_l`, `mancanegara_p`, `pajak`) VALUES
(394, 7, 2018, 1, 10, 25, 22, 8, 1000000),
(395, 7, 2018, 2, 10, 40, 10, 11, 0),
(396, 7, 2018, 3, 0, 0, 0, 0, 0),
(397, 7, 2018, 4, 0, 0, 0, 0, 0),
(398, 7, 2018, 5, 0, 0, 0, 0, 0),
(399, 7, 2018, 6, 0, 0, 0, 0, 0),
(400, 7, 2018, 7, 0, 0, 0, 0, 0),
(401, 7, 2018, 8, 0, 0, 0, 0, 0),
(402, 7, 2018, 9, 0, 0, 0, 0, 0),
(403, 7, 2018, 10, 0, 0, 0, 0, 0),
(404, 7, 2018, 11, 0, 0, 0, 0, 0),
(405, 7, 2018, 12, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_laporan_kebudayaan`
--

CREATE TABLE `data_laporan_kebudayaan` (
  `id_data` int(11) NOT NULL,
  `id_format` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `value` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_laporan_kebudayaan`
--

INSERT INTO `data_laporan_kebudayaan` (`id_data`, `id_format`, `tahun`, `value`) VALUES
(1, 1, 2018, 12),
(2, 2, 2018, 3),
(3, 3, 2018, 2),
(4, 4, 2018, 5),
(5, 5, 2018, 2),
(6, 6, 2018, 23),
(7, 7, 2018, 3),
(8, 8, 2018, 0),
(9, 9, 2018, 0),
(10, 10, 2018, 0),
(11, 11, 2018, 0),
(12, 12, 2018, 0),
(13, 13, 2018, 0),
(14, 14, 2018, 0),
(15, 15, 2018, 0),
(16, 16, 2018, 0),
(17, 17, 2018, 0),
(18, 18, 2018, 0),
(19, 19, 2018, 0),
(20, 20, 2018, 0),
(21, 21, 2018, 0),
(22, 22, 2018, 0),
(23, 23, 2018, 0),
(24, 24, 2018, 0),
(25, 25, 2018, 0),
(26, 26, 2018, 0),
(27, 27, 2018, 0),
(28, 28, 2018, 0),
(29, 29, 2018, 0),
(30, 30, 2018, 0),
(31, 31, 2018, 0),
(32, 32, 2018, 0),
(33, 33, 2018, 0),
(34, 34, 2018, 0),
(35, 35, 2018, 0),
(36, 36, 2018, 0),
(37, 37, 2018, 0),
(38, 38, 2018, 0),
(39, 39, 2018, 0),
(40, 40, 2018, 0),
(41, 41, 2018, 0),
(42, 42, 2018, 0),
(43, 43, 2018, 0),
(44, 44, 2018, 0),
(45, 45, 2018, 0),
(46, 46, 2018, 0),
(47, 47, 2018, 0),
(48, 48, 2018, 0),
(49, 49, 2018, 0),
(50, 50, 2018, 0),
(51, 51, 2018, 0),
(52, 52, 2018, 0),
(53, 53, 2018, 0),
(54, 54, 2018, 0),
(55, 55, 2018, 0),
(56, 56, 2018, 0),
(57, 57, 2018, 0),
(58, 58, 2018, 0),
(59, 59, 2018, 0),
(60, 60, 2018, 0),
(61, 61, 2018, 0),
(62, 62, 2018, 0),
(63, 63, 2018, 0),
(64, 64, 2018, 0),
(65, 65, 2018, 0),
(66, 66, 2018, 0),
(67, 67, 2018, 0),
(68, 68, 2018, 0),
(69, 69, 2018, 0),
(70, 70, 2018, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_laporan_pariwisata`
--

CREATE TABLE `data_laporan_pariwisata` (
  `id_data` int(11) NOT NULL,
  `id_format` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `value` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_laporan_pariwisata`
--

INSERT INTO `data_laporan_pariwisata` (`id_data`, `id_format`, `tahun`, `value`) VALUES
(2, 1, 2018, 20),
(3, 2, 2018, 2232),
(4, 3, 2018, 3),
(5, 4, 2018, 4),
(6, 5, 2018, 737),
(7, 6, 2018, 47),
(8, 7, 2018, 0),
(9, 8, 2018, 0),
(10, 9, 2018, 0),
(11, 10, 2018, 0),
(12, 11, 2018, 0),
(13, 12, 2018, 0),
(14, 13, 2018, 0),
(15, 14, 2018, 0),
(16, 15, 2018, 0),
(17, 16, 2018, 0),
(18, 17, 2018, 0),
(19, 18, 2018, 0),
(20, 19, 2018, 0),
(21, 20, 2018, 0),
(22, 21, 2018, 0),
(23, 22, 2018, 0),
(24, 23, 2018, 0),
(25, 24, 2018, 0),
(26, 25, 2018, 0),
(27, 26, 2018, 0),
(28, 27, 2018, 0),
(29, 28, 2018, 0),
(30, 29, 2018, 0),
(31, 30, 2018, 0),
(32, 31, 2018, 0),
(33, 32, 2018, 0),
(34, 33, 2018, 0),
(35, 34, 2018, 0),
(36, 35, 2018, 0),
(37, 36, 2018, 0),
(38, 37, 2018, 0),
(39, 38, 2018, 0),
(40, 39, 2018, 0),
(41, 40, 2018, 0),
(42, 41, 2018, 0),
(43, 42, 2018, 0),
(44, 43, 2018, 0),
(45, 44, 2018, 0),
(46, 45, 2018, 0),
(47, 46, 2018, 0),
(48, 47, 2018, 0),
(49, 48, 2018, 0),
(50, 49, 2018, 0),
(51, 50, 2018, 0),
(52, 51, 2018, 0),
(53, 52, 2018, 0),
(54, 53, 2018, 0),
(55, 54, 2018, 0),
(56, 55, 2018, 0),
(57, 56, 2018, 0),
(58, 57, 2018, 0),
(59, 58, 2018, 0),
(60, 59, 2018, 0),
(61, 60, 2018, 0),
(62, 61, 2018, 0),
(63, 62, 2018, 0),
(64, 63, 2018, 0),
(65, 64, 2018, 0),
(66, 65, 2018, 0),
(67, 66, 2018, 0),
(68, 67, 2018, 0),
(69, 68, 2018, 0),
(70, 69, 2018, 0),
(71, 70, 2018, 0),
(72, 71, 2018, 0),
(73, 72, 2018, 0),
(74, 73, 2018, 0),
(75, 74, 2018, 0),
(76, 75, 2018, 0),
(77, 76, 2018, 0),
(78, 77, 2018, 0),
(79, 78, 2018, 0),
(80, 79, 2018, 0),
(81, 80, 2018, 0),
(82, 81, 2018, 0),
(83, 82, 2018, 0),
(84, 83, 2018, 0),
(85, 84, 2018, 0),
(86, 85, 2018, 0),
(87, 86, 2018, 0),
(88, 87, 2018, 0),
(89, 88, 2018, 0),
(90, 89, 2018, 0),
(91, 90, 2018, 0),
(92, 91, 2018, 0),
(93, 92, 2018, 0),
(94, 93, 2018, 0),
(95, 94, 2018, 0),
(96, 95, 2018, 0),
(97, 96, 2018, 0),
(98, 97, 2018, 0),
(99, 98, 2018, 0),
(100, 99, 2018, 0),
(101, 100, 2018, 0),
(102, 101, 2018, 0),
(103, 102, 2018, 0),
(104, 103, 2018, 0),
(105, 104, 2018, 0),
(106, 105, 2018, 0),
(107, 106, 2018, 0),
(108, 107, 2018, 0),
(109, 108, 2018, 0),
(110, 109, 2018, 0),
(111, 110, 2018, 0),
(112, 111, 2018, 0),
(113, 112, 2018, 0),
(114, 113, 2018, 0),
(115, 114, 2018, 0),
(116, 115, 2018, 0),
(117, 116, 2018, 0),
(118, 117, 2018, 0),
(119, 118, 2018, 0),
(120, 119, 2018, 0),
(121, 120, 2018, 0),
(122, 121, 2018, 0),
(123, 122, 2018, 0),
(124, 123, 2018, 0),
(125, 124, 2018, 0),
(126, 125, 2018, 0),
(127, 126, 2018, 0),
(128, 127, 2018, 0),
(129, 128, 2018, 0),
(130, 129, 2018, 0),
(131, 130, 2018, 0),
(132, 131, 2018, 0),
(133, 132, 2018, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_museum`
--

CREATE TABLE `data_museum` (
  `id_data_museum` int(11) NOT NULL,
  `id_museum` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `domestik_l` int(16) NOT NULL,
  `domestik_p` int(11) NOT NULL,
  `mancanegara_l` int(16) NOT NULL,
  `mancanegara_p` int(11) NOT NULL,
  `pajak` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_museum`
--

INSERT INTO `data_museum` (`id_data_museum`, `id_museum`, `tahun`, `bulan`, `domestik_l`, `domestik_p`, `mancanegara_l`, `mancanegara_p`, `pajak`) VALUES
(15, 8, 2018, 1, 12, 16, 18, 1, 32),
(16, 8, 2018, 2, 0, 32, 0, 12, 23),
(17, 8, 2018, 3, 0, 0, 0, 0, 0),
(18, 8, 2018, 4, 0, 0, 0, 0, 0),
(19, 8, 2018, 5, 0, 0, 0, 0, 0),
(20, 8, 2018, 6, 0, 0, 0, 0, 0),
(21, 8, 2018, 7, 0, 0, 0, 0, 0),
(22, 8, 2018, 8, 0, 0, 0, 0, 0),
(23, 8, 2018, 9, 0, 0, 0, 0, 0),
(24, 8, 2018, 10, 0, 0, 0, 0, 0),
(25, 8, 2018, 11, 0, 0, 0, 0, 0),
(26, 8, 2018, 12, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_objek`
--

CREATE TABLE `data_objek` (
  `id_data_objek` int(11) NOT NULL,
  `id_objek` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bulan` int(2) NOT NULL,
  `domestik_l` int(16) NOT NULL,
  `domestik_p` int(11) NOT NULL,
  `mancanegara_l` int(16) NOT NULL,
  `mancanegara_p` int(11) NOT NULL,
  `pajak` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_objek`
--

INSERT INTO `data_objek` (`id_data_objek`, `id_objek`, `tahun`, `bulan`, `domestik_l`, `domestik_p`, `mancanegara_l`, `mancanegara_p`, `pajak`) VALUES
(22, 2, 2018, 1, 34, 12, 11, 22, 0),
(23, 2, 2018, 2, 23, 0, 0, 0, 12),
(24, 2, 2018, 3, 0, 0, 0, 0, 0),
(25, 2, 2018, 4, 0, 0, 0, 0, 0),
(26, 2, 2018, 5, 0, 0, 0, 0, 0),
(27, 2, 2018, 6, 0, 0, 0, 0, 0),
(28, 2, 2018, 7, 0, 0, 0, 0, 0),
(29, 2, 2018, 8, 0, 0, 0, 0, 0),
(30, 2, 2018, 9, 0, 0, 0, 0, 0),
(31, 2, 2018, 10, 0, 0, 0, 0, 0),
(32, 2, 2018, 11, 0, 0, 0, 0, 0),
(33, 2, 2018, 12, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penginapan`
--

CREATE TABLE `data_penginapan` (
  `id_data_penginapan` int(11) NOT NULL,
  `id_penginapan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `domestik_personal_l` int(11) NOT NULL,
  `domestik_personal_p` int(11) NOT NULL,
  `mancanegara_personal_l` int(11) NOT NULL,
  `mancanegara_personal_p` int(11) NOT NULL,
  `domestik_durasi` int(11) NOT NULL,
  `mancanegara_durasi` int(11) NOT NULL,
  `pajak` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_penginapan`
--

INSERT INTO `data_penginapan` (`id_data_penginapan`, `id_penginapan`, `tahun`, `bulan`, `domestik_personal_l`, `domestik_personal_p`, `mancanegara_personal_l`, `mancanegara_personal_p`, `domestik_durasi`, `mancanegara_durasi`, `pajak`) VALUES
(1, 2, 2018, 1, 21, 1, 20, 5, 23, 43, 23),
(2, 2, 2018, 2, 29, 0, 0, 0, 0, 0, 90),
(3, 2, 2018, 3, 0, 0, 0, 0, 0, 0, 100),
(4, 2, 2018, 4, 0, 0, 0, 0, 0, 0, 20),
(5, 2, 2018, 5, 0, 0, 0, 0, 0, 21, 43),
(6, 2, 2018, 6, 0, 0, 0, 0, 0, 1, 20),
(7, 2, 2018, 7, 0, 0, 0, 0, 0, 0, 0),
(8, 2, 2018, 8, 0, 0, 0, 0, 0, 0, 0),
(9, 2, 2018, 9, 0, 0, 0, 0, 0, 0, 0),
(10, 2, 2018, 10, 0, 0, 0, 0, 0, 0, 0),
(11, 2, 2018, 11, 0, 0, 0, 0, 0, 0, 10),
(12, 2, 2018, 12, 3, 0, 0, 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `events`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `events` (
`id` int(11)
,`title` varchar(64)
,`date` date
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `format_laporan_kebudayaan`
--

CREATE TABLE `format_laporan_kebudayaan` (
  `id_format` int(32) NOT NULL,
  `id_elemen` varchar(32) NOT NULL,
  `nama_elemen` varchar(64) NOT NULL,
  `satuan` varchar(12) NOT NULL DEFAULT 'Unit',
  `kewenangan` varchar(64) NOT NULL DEFAULT 'Pusat, Provinsi, Kab/Kota',
  `data_tunggal` varchar(32) NOT NULL DEFAULT 'Data  Tunggal',
  `data_sektoral` varchar(32) NOT NULL DEFAULT 'Data KL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `format_laporan_kebudayaan`
--

INSERT INTO `format_laporan_kebudayaan` (`id_format`, `id_elemen`, `nama_elemen`, `satuan`, `kewenangan`, `data_tunggal`, `data_sektoral`) VALUES
(1, '1', 'Jumlah Sarana Prasarana dan Budaya	', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(2, '1.1', 'Sanggar Kesenian', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(3, '1.2', 'Gedung Kesenian', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(4, '1.3', 'Pusat Kebudayaan / Taman Budaya', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(5, '1.4', 'Museum', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(6, '2', 'Jumlah Pegiat Seni dan Budaya', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(7, '2.1', 'Seni Rupa', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(8, '2.1.1.1', 'Seni Lukis', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(9, '2.1.1.2', 'Jumlah Anggota Seni Lukis', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(10, '2.1.2.1', 'Seni Kriya / Kerajinan Tangan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(11, '2.1.2.2', 'Jumlah Anggota Seni Kriya / Kerajinan Tangan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(12, '2.1.3.1', 'Seni Patung', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(13, '2.1.3.2', 'Jumlah Anggota Seni Patung', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(14, '2.1.4.1', 'Seni Dekorasi', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(15, '2.1.4.2', 'Jumlah Anggota Seni Dekorasi', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(16, '2.1.5.1', 'Seni Reklame', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(17, '2.1.5.2', 'Jumlah Seni Reklame', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(18, '2.2', 'Seni Tari', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(19, '2.2.1.1', 'Tari Klasik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(20, '2.2.1.2', 'JumlahK Anggota Tari Klasik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(21, '2.2.2.1', 'Tari Kreasi Baru', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(22, '2.2.2.2', 'Jumlah Anggota Seni Tari Kreasi Baru', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(23, '2.2.3.1', 'Tari Tradisional', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(24, '2.2.3.2', 'Jumlah Anggota Tari Tradisional', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(25, '2.2.4.1', 'Tari Moderen', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(26, '2.2.4.2', 'Jumlah Anggota Tari Moderen', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(27, '2.3', 'Seni Suara / Vokal', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(28, '2.3.1.1', 'Seni Suara / Vokal', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(29, '2.3.1.2', 'Jumlah Anggota Seni Suara / Vokal', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(30, '2.4', 'Seni Musik Tradisional', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(31, '2.4.1.1', 'Seni Musik Tradisional', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(32, '2.4.1.2', 'Jumlah Anggota Seni Musik Tradisional', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(33, '2.5.1.1', 'Seni Sastra', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(34, '2.5.1.2', 'Jumlah Anggota Seni Sastra', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(35, '2.6', 'Seni Teater / Drama', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(36, '2.6.1.1', 'Seni Teater / Drama', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(37, '2.6.1.2', 'Jumlah Anggota Seni Teater / Drama', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(38, '2.7', 'Pagelaran dan Pameran', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(39, '2.7.1.1', 'Pagelaran', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(40, '2.7.1.2', 'Jumlah Penonton Pagelaran', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(41, '2.7.2.1', 'Pameran', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(42, '2.7.2.2', 'Jumlah Penonton Pameran', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(43, '3', 'Cagar Budaya', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(44, '3.1', 'Cagar Budaya Benda', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(45, '3.1.1', 'Milik Pemerintah', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(46, '3.1.2', 'Milik Swasta', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(47, '3.1.3', 'Jumlah Pengunjung', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(48, '3.2', 'Cagar Budaya Bangunan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(49, '3.2.1', 'Milik Pemerintah', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(50, '3.2.2', 'Milik Swasta', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(51, '3.2.3', 'Jumlah Pengunjung', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(52, '3.3', 'Cagar Budaya Struktur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(53, '3.3.1', 'Milik Pemerintah', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(54, '3.3.2', 'Milik Swasta', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(55, '3.3.3', 'Jumlah Pengunjung', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(56, '3.4', 'Cagar Budaya Situs', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(57, '3.4.1', 'Milik Pemerintah', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(58, '3.4.2', 'Milik Swasta', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(59, '3.4.3', 'Jumlah Pengunjung', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(60, '3.5', 'Penetapan Cagar Budaya', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(61, '3.5.1.1', 'Jumlah Cagar Budaya Milik Pemerintah', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(62, '3.5.1.2', 'Sudah Ditetapkan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(63, '3.5.1.3', 'Belum Ditetapkan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(64, '3.5.2.1', 'Jumlah Cagar Budaya Milik Swasta', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(65, '3.5.2.2', 'Sudah Ditetapkan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(66, '3.5.2.3', 'Belum Ditetapkan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(67, '3.6', 'Pelestarian dan Pemugaran Cagar dan Budaya', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(68, '3.6.1.1', 'Milik Pemerintah', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(69, '3.6.1.2', 'Dipugarkan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL'),
(70, '3.6.1.3', 'Belum Dipugarkan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data  Tunggal', 'Data KL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `format_laporan_pariwisata`
--

CREATE TABLE `format_laporan_pariwisata` (
  `id_format` int(32) NOT NULL,
  `id_elemen` varchar(32) NOT NULL,
  `nama_elemen` varchar(64) NOT NULL,
  `satuan` varchar(12) NOT NULL DEFAULT 'Unit',
  `kewenangan` varchar(64) NOT NULL DEFAULT 'Pusat, Provinsi, Kab/Kota',
  `data_tunggal` varchar(32) NOT NULL DEFAULT 'Data Tunggal',
  `data_sektoral` varchar(32) NOT NULL DEFAULT 'Data Sektoral'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `format_laporan_pariwisata`
--

INSERT INTO `format_laporan_pariwisata` (`id_format`, `id_elemen`, `nama_elemen`, `satuan`, `kewenangan`, `data_tunggal`, `data_sektoral`) VALUES
(1, '1', 'Jumlah Objek Wisata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(2, '1.1', 'Objek Wisata Budaya', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(3, '1.2', 'Objek Wisata Bahari', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(4, '1.3', 'Objek Wisata Cagar Alam', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(5, '1.4', 'Objek Wisata Pertanian', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(6, '1.5', 'Objek Wisata Buru', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(7, '1.6', 'Objek Wisata Alam', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(8, '1.7', 'Objek Wisata Sejarah', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(9, '1.8', 'Objek Wisata Religi', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(10, '1.9', 'Objek Wisata Pendidikan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(11, '1.10', 'Objek Wisata Buatan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(12, '1.11', 'Objek Wisata Belanja', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(13, '1.12', 'Objek Wisata Buatan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(14, '2', 'Jumlah Kunjungan Wisata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(15, '2.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(16, '2.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(17, '3', 'Kunjungan Wisatawan Per Objek Wisata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(18, '3.1', 'Objek Wisata Budaya', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(19, '3.1.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(20, '3.1.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(21, '3.2', 'Objek Wisata Bahari', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(22, '3.2.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(23, '3.2.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(24, '3.3', 'Objek Wisata Cagar Alam', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(25, '3.3.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(26, '3.3.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(27, '3.4', 'Objek Wisata Pertanian', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(28, '3.4.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(29, '3.4.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(30, '3.5', 'Objek Wisata Buru', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(31, '3.5.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(32, '3.5.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(33, '3.6', 'Objek Wisata Alam', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(34, '3.6.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(35, '3.6.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(36, '3.7', 'Objek Wisata Sejarah', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(37, '3.7.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(38, '3.7.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(39, '3.8', 'Objek Wisata Religi', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(40, '3.8.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(41, '3.8.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(42, '3.9', 'Objek Wisata Pendidikan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(43, '3.9.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(44, '3.9.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(45, '3.10', 'Objek Wisata Kuliner', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(46, '3.10.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(47, '3.10.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(48, '3.11', 'Objek Wisata Belanja', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(49, '3.11.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(50, '3.11.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(51, '3.12', 'Objek Wisata Buatan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(52, '3.12.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(53, '3.12.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(54, '4', 'Lama Kunjungan Wisatawan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(55, '4.1', 'Wisatawan Domestik', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(56, '4.2', 'Wisatawan Mancanegara', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(57, '5', 'Jenis Penginapan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(58, '5.1', 'Jumlah Hotel Bintang Lima', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(59, '5.1.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(60, '5.1.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(61, '5.2', 'Jumlah Hotel Bintang Empat', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(62, '5.2.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(63, '5.2.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(64, '5.3', 'Jumlah Hotel Bintang Tiga', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(65, '5.3.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(66, '5.3.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(67, '5.4', 'Jumlah Hotel Bintang Dua', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(68, '5.4.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(69, '5.5', 'Jumlah Hotel Melati', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(70, '5.5.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(71, '5.5.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(72, '5.6', 'Jumlah Motel', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(73, '5.6.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(74, '5.6.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(75, '5.7', 'Jumlah Wisma Tamu', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(76, '5.4.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(77, '5.7.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(78, '5.7.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(79, '5.8', 'Jumlah Kondotel', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(80, '5.8.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(81, '5.8.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(82, '5.9', 'Jumlah Sanitarium', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(83, '5.9.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(84, '5.9.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(85, '5.10', 'Jumlah Bungalow', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(86, '5.10.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(87, '5.10.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(88, '5.11', 'Jumlah Mess', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(89, '5.11.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(90, '5.11.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(91, '5.12', 'Jumlah Home Stay', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(92, '5.12.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(93, '5.12.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(94, '5.13', 'Jumlah Hostel / Asrama', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(95, '5.13.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(96, '5.13.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(97, '5.14', 'Jumlah Guest House', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(98, '5.14.1', 'Jumlah Kamar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(99, '5.14.2', 'Jumlah Tempat Tidur', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(100, '6', 'Biro Wisata dan Agen Perjalanan Wisata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(101, '6.1', 'Jumlah Biro Wisata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(102, '6.2', 'Jumlah Agen Perjalanan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(103, '7', 'Jumlah Pemandu Wisata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(104, '7.1', 'Bersertifikat', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(105, '7.2', 'Tidak Bersertifikat', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(106, '8', 'Jenis Usaha Jasa Makanan / Minuman', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(107, '8.1', 'Jumlah Restoran', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(108, '8.2', 'Jumlah Caferia / Cafe', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(109, '8.3', 'Jumlah Kantin', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(110, '8.4', 'Jumlah Coffe Shop', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(111, '8.5', 'Jumlah Pub / Bar', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(112, '8.6', 'Jumlah Warung Makan / Kedai Makan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(113, '9', 'Kategori Berdasarkan Jenis Makanan', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(114, '9.1', 'American Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(115, '9.2', 'Chinnese Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(116, '9.3', 'Europe Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(117, '9.4', 'Indian Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(118, '9.5', 'Indonesia Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(119, '9.6', 'International Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(120, '9.7', 'Italia Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(121, '9.8', 'Japanese Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(122, '9.9', 'Middle Eastern Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(123, '9.10', 'Sea Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(124, '9.11', 'Thai Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(125, '9.12', 'Vegetarian Food', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(126, '9.13', 'Lain-lain', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(127, '10', 'Pusat Penjualan Cenderamata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(128, '10.1', 'Toko Cenderamata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(129, '10.2', 'Pedagang Cenderamata Non-Toko', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(130, '11', 'Penerimaan Daerah Dari Pariwisata', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(131, '11.1', 'Pajak', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral'),
(132, '11.2', 'Retribusi', 'Unit', 'Pusat, Provinsi, Kab/Kota', 'Data Tunggal', 'Data Sektoral');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j2_senibudaya`
--

CREATE TABLE `j2_senibudaya` (
  `id_j2_senibudaya` int(11) NOT NULL,
  `id_j_senibudaya` int(11) NOT NULL,
  `nama_j2_senibudaya` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `j2_senibudaya`
--

INSERT INTO `j2_senibudaya` (`id_j2_senibudaya`, `id_j_senibudaya`, `nama_j2_senibudaya`) VALUES
(1, 1, 'Seni Lukis'),
(2, 1, 'Seni Kriya / Kerajinan Tangan'),
(3, 1, 'Seni Patung'),
(4, 1, 'Seni Dekorasi'),
(5, 1, 'Seni Reklame'),
(6, 2, 'Tari Klasik'),
(7, 2, 'Tari Kreasi Baru'),
(8, 2, 'Tari Tradisional'),
(9, 2, 'Tari Modern'),
(10, 3, 'Seni Suara / Vokal'),
(11, 4, 'Seni Musik Tradisional'),
(12, 5, 'Seni Sastra'),
(13, 6, 'Seni Teater / Drama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_cagarbudaya`
--

CREATE TABLE `jenis_cagarbudaya` (
  `id_jenis_cagarbudaya` int(11) NOT NULL,
  `nama_jenis_cagarbudaya` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_cagarbudaya`
--

INSERT INTO `jenis_cagarbudaya` (`id_jenis_cagarbudaya`, `nama_jenis_cagarbudaya`) VALUES
(1, 'Benda'),
(2, 'Bangunan'),
(3, 'Struktur'),
(4, 'Situs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pagelaran`
--

CREATE TABLE `jenis_pagelaran` (
  `id_jenis_pagelaran` int(11) NOT NULL,
  `nama_jenis_pagelaran` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pagelaran`
--

INSERT INTO `jenis_pagelaran` (`id_jenis_pagelaran`, `nama_jenis_pagelaran`) VALUES
(1, 'Pagelaran'),
(2, 'Pameran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pajak`
--

CREATE TABLE `jenis_pajak` (
  `id_jenis_pajak` int(11) NOT NULL,
  `nama_jenis_pajak` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pajak`
--

INSERT INTO `jenis_pajak` (`id_jenis_pajak`, `nama_jenis_pajak`) VALUES
(1, 'Pajak Restoran'),
(2, 'Pajak Hotel'),
(3, 'Pajak Hiburan'),
(4, 'Pajak Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_saranaprasarana`
--

CREATE TABLE `jenis_saranaprasarana` (
  `id_jenis_saranaprasarana` int(11) NOT NULL,
  `nama_jenis_saranaprasarana` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_saranaprasarana`
--

INSERT INTO `jenis_saranaprasarana` (`id_jenis_saranaprasarana`, `nama_jenis_saranaprasarana`) VALUES
(1, 'Sanggar Kesenian'),
(2, 'Gedung Kesenian'),
(3, 'Pusat Kebudayaan / Taman Budaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_senibudaya`
--

CREATE TABLE `j_senibudaya` (
  `id_j_senibudaya` int(11) NOT NULL,
  `nama_j_senibudaya` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `j_senibudaya`
--

INSERT INTO `j_senibudaya` (`id_j_senibudaya`, `nama_j_senibudaya`) VALUES
(1, 'Seni Rupa'),
(2, 'Seni Tari / Gerak'),
(3, 'Seni Suara / Vocal'),
(4, 'Seni Musik Tradisional'),
(5, 'Seni Sastra'),
(6, 'Seni Teater / Drama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(64) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `nama_kabupaten`, `lokasi`) VALUES
(1, 'Pangkal Pinang', '-2.119425, 106.112888'),
(2, 'Bangka', '-1.877532, 105.988556'),
(3, 'Bangka Selatan', '-2.761838, 106.353771'),
(4, 'Bangka Tengah', '-2.412205, 106.216301'),
(5, 'Bangka Barat', '-1.906152, 105.475995'),
(6, 'Belitung', '-2.813386, 107.688131'),
(7, 'Belitung Timur', '-2.910842, 108.053467');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepemilikan_cagarbudaya`
--

CREATE TABLE `kepemilikan_cagarbudaya` (
  `id_kepemilikan_cagarbudaya` int(11) NOT NULL,
  `nama_kepemilikan_cagarbudaya` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kepemilikan_cagarbudaya`
--

INSERT INTO `kepemilikan_cagarbudaya` (`id_kepemilikan_cagarbudaya`, `nama_kepemilikan_cagarbudaya`) VALUES
(1, 'Pemerintah'),
(2, 'Swasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `museum`
--

CREATE TABLE `museum` (
  `id_museum` int(11) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `id_kepemilikan_museum` int(11) NOT NULL,
  `id_status_museum` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file2` varchar(640) NOT NULL,
  `file3` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `museum`
--

INSERT INTO `museum` (`id_museum`, `nama`, `id_kepemilikan_museum`, `id_status_museum`, `file`, `file2`, `file3`, `dokumen`, `alamat`, `lokasi`, `deskripsi`, `id_kabupaten`, `id_user_entry`, `id_user_approv`) VALUES
(4, 'museum1', 1, 2, '121', '', '', '', '', '12121', '2121212', 1, 0, 0),
(7, 'ms2', 1, 2, '1212', '', '', '', '', '121223', '1212121', 2, 0, 0),
(8, 'musem timah', 2, 1, '000b4e66b41ff4b9dcda74a9cd0992c1.jpg', '52f9e960190dcfdec712163e944ab7d9.jpg,118afa6fa88b9ecd0f31b9f0279c5e34.jpg', '8ffe078fdf5bce8cf4e489dcb7483dcb.jpg', '8bd9a9205d69dbcdd88f0d466e28622e.pdf', 'tr', '-2.115732,106.1062773', 'sedskripsi \r\nmuseum', 2, 3, 6),
(9, '12', 1, 2, '3', '', '', '', '', '2', '1', 1, 0, 0),
(10, 'Musem Timah', 2, 2, '-', '', '', '', '', '-', '-', 1, 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `museum_kepemilikan`
--

CREATE TABLE `museum_kepemilikan` (
  `id_kepemilikan_museum` int(11) NOT NULL,
  `nama_kepemilikan_museum` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `museum_kepemilikan`
--

INSERT INTO `museum_kepemilikan` (`id_kepemilikan_museum`, `nama_kepemilikan_museum`) VALUES
(1, 'Milik Pemerintah'),
(2, 'Milik Swasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `museum_status`
--

CREATE TABLE `museum_status` (
  `id_status_museum` int(11) NOT NULL,
  `nama_status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `museum_status`
--

INSERT INTO `museum_status` (`id_status_museum`, `nama_status`) VALUES
(1, 'Sudah Registrasi'),
(2, 'Belum Registrasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_biro`
--

CREATE TABLE `pariwisata_biro` (
  `id_biro` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `id_jenis_biro` int(11) NOT NULL,
  `id_sertifikat_biro` int(11) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `file2` varchar(640) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_biro`
--

INSERT INTO `pariwisata_biro` (`id_biro`, `nama`, `id_jenis_biro`, `id_sertifikat_biro`, `lokasi`, `file`, `deskripsi`, `id_kabupaten`, `alamat`, `file2`, `dokumen`, `id_user_entry`, `id_user_approv`) VALUES
(3, 'Biro 2', 2, 1, 'awdaw', '23', 'dawda', 2, 'bobo', '', '', 3, 0),
(4, 'biro kb1', 2, 2, '3eq', '2', 'a3', 1, '', '', '', 0, 0),
(5, 'Bintang Trevel', 1, 2, '-', '-', '-', 1, '', '', '', 0, 0),
(6, 'Trevel Bintang', 1, 2, '-1.687646, 105.482090', '3aabe7066b5ee84a54245968861d93e0.jpg', 'buka setiap hari', 2, 'Pasar Sliat', '940289a5595af0742525eaf544da0cfe.png,80e824e218263c96b7cb980cf108991b.jpg,dd75446da607ec17ecdbfa69ee3f5f5d.jpg,c0aa78467ed2be788f452e04d9ec3ae9.jpg', '0fb3d06ca0f789bfbaa253800aa3f4f2.pdf', 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_item_usaha`
--

CREATE TABLE `pariwisata_item_usaha` (
  `id_item_usaha` int(11) NOT NULL,
  `nama_item_usaha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_item_usaha`
--

INSERT INTO `pariwisata_item_usaha` (`id_item_usaha`, `nama_item_usaha`) VALUES
(1, 'American Food'),
(2, 'Chinnese Food'),
(3, 'Europe Food'),
(4, 'Indonesia Food'),
(5, 'International Food'),
(6, 'Italia Food'),
(7, 'Japanese Food'),
(8, 'Middle Eastern Food'),
(9, 'Sea Food'),
(10, 'Thai Food'),
(11, 'Vegetarian Food'),
(12, 'Cenderamata'),
(13, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_jenis_biro`
--

CREATE TABLE `pariwisata_jenis_biro` (
  `id_jenis_biro` int(11) NOT NULL,
  `nama_jenis_biro` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_jenis_biro`
--

INSERT INTO `pariwisata_jenis_biro` (`id_jenis_biro`, `nama_jenis_biro`) VALUES
(1, 'Biro Wisata'),
(2, 'Agen Perjalanan Wisata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_jenis_objek`
--

CREATE TABLE `pariwisata_jenis_objek` (
  `id_jenis_objek` int(11) NOT NULL,
  `nama_jenis_objek` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_jenis_objek`
--

INSERT INTO `pariwisata_jenis_objek` (`id_jenis_objek`, `nama_jenis_objek`) VALUES
(1, 'Wisata Budaya'),
(2, 'Wisata Bahari'),
(3, 'Wisata  Cagar Alam'),
(4, 'Wisata Pertanian'),
(5, 'Wisata Buru'),
(6, 'Wisata Alam'),
(7, 'Wisata Sejarah'),
(8, 'Wisata Religi'),
(9, 'Wisata Pendidikan'),
(10, 'Wisata Kuliner'),
(11, 'Wisata Belanja'),
(12, 'Wisata Buatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_jenis_penginapan`
--

CREATE TABLE `pariwisata_jenis_penginapan` (
  `id_jenis_penginapan` int(11) NOT NULL,
  `nama_jenis_penginapan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_jenis_penginapan`
--

INSERT INTO `pariwisata_jenis_penginapan` (`id_jenis_penginapan`, `nama_jenis_penginapan`) VALUES
(1, 'Hotel Bintang Lima'),
(2, 'Hotel Bintang Empat'),
(3, 'Hotel Bintang Tiga'),
(4, 'Hotel Bintang Dua'),
(5, 'Hotel Bintang Satu'),
(6, 'Hotel Melati'),
(7, 'Motel'),
(8, 'Wisma'),
(9, 'Kondotel'),
(10, 'Sanitarium / Sanitorium'),
(11, 'Bungalow'),
(12, 'Mess'),
(13, 'Home Stay'),
(14, 'Hostel / Asrama'),
(15, 'Guest House');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_jenis_usaha`
--

CREATE TABLE `pariwisata_jenis_usaha` (
  `id_jenis_usaha` int(11) NOT NULL,
  `nama_jenis_usaha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_jenis_usaha`
--

INSERT INTO `pariwisata_jenis_usaha` (`id_jenis_usaha`, `nama_jenis_usaha`) VALUES
(1, 'Restoran'),
(2, 'Caferia / Cafe'),
(3, 'Kantin'),
(4, 'Coffe Shop'),
(5, 'Pub / Bar'),
(6, 'Warung / Kedai'),
(7, 'Toko Cenderamata'),
(8, 'Pedagang Cenderamata Non-Toko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_objek`
--

CREATE TABLE `pariwisata_objek` (
  `id_objek` int(11) NOT NULL,
  `nama` varchar(64) DEFAULT NULL,
  `id_jenis_objek` int(11) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file2` varchar(640) NOT NULL,
  `file3` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pariwisata_objek`
--

INSERT INTO `pariwisata_objek` (`id_objek`, `nama`, `id_jenis_objek`, `lokasi`, `alamat`, `file`, `file2`, `file3`, `dokumen`, `deskripsi`, `id_kabupaten`, `id_user_entry`, `id_user_approv`) VALUES
(1, 'Pasir Padi', 2, '-2.109175, 106.168747', '', 'fl', '', '', '', 'ds', 1, 0, 0),
(2, 'Batu Bedaun2', 7, '-1.829350, 106.120202', 'Sungailiat', '96382d6bbb7a8bf4522e023ec4ca1636.jpg', 'b4d99ab50519afdb521a076d21351f5e.jpg', '', '760668d31021a7b291f3cd1f0e825e59.pdf', 'sejarah\r\ntentang objek Wisata', 2, 3, 6),
(3, 'Bangka Botanical Garden', 2, '-2.115137, 106.160250', '', '23', '', '', '', '223', 1, 0, 0),
(4, 'Bukit Baru', 1, '-2.113722, 106.101541', '', '223', '', '', '', '23', 1, 0, 0),
(5, 'Pantai Rambak', 6, '-1.870142, 106.161272', 'jL Lintas Timur', '20a8b74904ffcbf2d3f5d8569550c0e4.jpg', '2d5bd0c167c45ac4883f07385a730b2f.jpg,47cc4f6a80fbc9b0c582985b8f9c0741.jpg,8e221e1baa769c916a8d4345639b1236.jpg', '', '', 'iawidi', 2, 3, 0),
(6, 'Parai Tenggiri', 6, '-1.8043515,106.1273229', '', '-', '', '', '', '-', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_penginapan`
--

CREATE TABLE `pariwisata_penginapan` (
  `id_penginapan` int(11) NOT NULL,
  `nama` varchar(16) DEFAULT NULL,
  `id_jenis_penginapan` int(11) NOT NULL,
  `jumlah_kamar` int(11) DEFAULT NULL,
  `jumlah_tempat_tidur` int(11) DEFAULT NULL,
  `lokasi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file2` varchar(255) NOT NULL,
  `file3` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_penginapan`
--

INSERT INTO `pariwisata_penginapan` (`id_penginapan`, `nama`, `id_jenis_penginapan`, `jumlah_kamar`, `jumlah_tempat_tidur`, `lokasi`, `alamat`, `file`, `file2`, `file3`, `dokumen`, `deskripsi`, `id_kabupaten`, `id_user_entry`, `id_user_approv`) VALUES
(1, 'pgn1edit', 3, 4, 5, '7', '', '6', '', '', '', '8', 1, 0, 0),
(2, 'Hotel Kelontong', 3, 40, 90, '-1.870142, 106.161272', 'Jl Sudirman', '4ba857065e5d5fd2631f9b2dce9a32e2.PNG', '13a91a7f30255d2eec5611f59f78f0e7.PNG', '', '5d46ae564e9a4aa2d662dcbedf64e98c.pdf', 'deskripsi hotel', 2, 3, 6),
(3, '201 hotel', 1, 22, 23, 'dawd', '', 'ada', '', '', '', 'dadawd', 1, 0, 0),
(4, 'Puri 56', 1, 30, 50, '-2.1214261,106.1071614', '', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSEhMWFhUWFhoXFxcYGBoWHRcYGxsdFxcWGhkYHSggGBolHRgXITEhJSkrLi4uGB8zODMtNygtLi0BCgoKDg0OGhAQGy0lHyUtLS0tLS0tLS0tLS0rLS0tLS0tLSstLS0tLS0tLS0tLS0tLS0tLS0tKy0tKy0tLS0rLf/AABEIALgBEQMBIgACEQEDEQH/', '', '', '', 'Didiran pada tgl 20 april 2011', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_restoran`
--

CREATE TABLE `pariwisata_restoran` (
  `id_restoran` varchar(4) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `jenis` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_sertifikat_biro`
--

CREATE TABLE `pariwisata_sertifikat_biro` (
  `id_sertifikat_biro` int(11) NOT NULL,
  `nama_sertifikat_biro` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_sertifikat_biro`
--

INSERT INTO `pariwisata_sertifikat_biro` (`id_sertifikat_biro`, `nama_sertifikat_biro`) VALUES
(1, 'Bersertifikat'),
(2, 'Tidak Bersertifikat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pariwisata_usaha`
--

CREATE TABLE `pariwisata_usaha` (
  `id_usaha` int(11) NOT NULL,
  `nama` varchar(64) DEFAULT NULL,
  `id_jenis_usaha` int(11) NOT NULL,
  `id_item_usaha` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `file2` varchar(640) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pariwisata_usaha`
--

INSERT INTO `pariwisata_usaha` (`id_usaha`, `nama`, `id_jenis_usaha`, `id_item_usaha`, `lokasi`, `file`, `deskripsi`, `id_kabupaten`, `alamat`, `file2`, `dokumen`, `id_user_entry`, `id_user_approv`) VALUES
(1, 'usaha1', 3, 4, '5ed', '4ede', '6edw', 2, 'test alamat', '', '', 3, 6),
(2, 'rs2', 1, 2, 'awdaw', '2e', 'awdaw', 1, '', '', '', 0, 0),
(3, '23', 3, 2, '23', '232', '231', 1, '', '', '', 0, 0),
(4, 'Kantin Gembira', 3, 2, '-1.6433761,105.7073097', 'cc104d1c4578e3c8826c413b6962c9af.jpg', 'Lain-lain', 2, 'Pantai Rambak', '8a3de7b99fadad924046db6ba1a5b7b2.jpg,0bf07ebe16307db76d1528a4a379e6fc.jpg', '5c3d80438e96a274fd38265aebb95436.pdf', 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_pariwisata`
--

CREATE TABLE `penerimaan_pariwisata` (
  `no` int(7) NOT NULL,
  `tahun` int(4) NOT NULL,
  `pajak` int(12) NOT NULL,
  `restribusi` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung_cagarbudaya`
--

CREATE TABLE `pengunjung_cagarbudaya` (
  `id_pengunjung` int(11) NOT NULL,
  `id_cagarbudaya` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `domestik` int(11) NOT NULL DEFAULT 0,
  `mancanegara` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung_cagarbudaya`
--

INSERT INTO `pengunjung_cagarbudaya` (`id_pengunjung`, `id_cagarbudaya`, `tahun`, `domestik`, `mancanegara`) VALUES
(2, 4, 2004, 3, 2),
(3, 5, 2005, 2, 3),
(4, 6, 2011, 140, 100),
(5, 6, 2006, 111, 203),
(6, 5, 2001, 222, 111),
(7, 7, 2001, 1, 99),
(8, 5, 2005, 222, 2),
(9, 4, 2000, 22, 222),
(10, 7, 2007, 777, 77),
(11, 6, 2011, 12, 11),
(12, 5, 2011, 12, 89),
(13, 5, 2012, 2, 1),
(14, 5, 20011, 1, 1),
(15, 5, 12, 1, 1),
(16, 5, 232, 232, 232),
(17, 7, 12, 12, 12),
(18, 5, 2001, 2, 2),
(19, 5, 2011, 21, 21),
(20, 4, 2011, 2, 2);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `rec_cagarbudaya`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `rec_cagarbudaya` (
`nomor` bigint(21)
,`tahun` int(4)
,`bulan` int(11)
,`nama_bulan` varchar(12)
,`id_kabupaten` int(11)
,`id_cagarbudaya` int(20)
,`nama` varchar(16)
,`id_data_cagarbudaya` int(11)
,`domestik_l` int(11)
,`domestik_p` int(11)
,`mancanegara_l` int(11)
,`mancanegara_p` int(11)
,`domestik` bigint(12)
,`mancanegara` bigint(12)
,`jumlah` bigint(14)
,`pajak` int(32)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `rec_museum`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `rec_museum` (
`nomor` bigint(21)
,`tahun` int(4)
,`bulan` int(11)
,`nama_bulan` varchar(12)
,`id_kabupaten` int(11)
,`id_museum` int(11)
,`nama` varchar(16)
,`id_data_museum` int(11)
,`domestik_l` int(16)
,`domestik_p` int(11)
,`mancanegara_l` int(16)
,`mancanegara_p` int(11)
,`domestik` bigint(17)
,`mancanegara` bigint(17)
,`jumlah` bigint(19)
,`pajak` int(32)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `rec_objek`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `rec_objek` (
`nomor` bigint(21)
,`tahun` int(4)
,`bulan` int(11)
,`nama_bulan` varchar(12)
,`id_kabupaten` int(11)
,`id_objek` int(11)
,`nama` varchar(64)
,`id_data_objek` int(11)
,`domestik_l` int(16)
,`domestik_p` int(11)
,`mancanegara_l` int(16)
,`mancanegara_p` int(11)
,`domestik` bigint(17)
,`mancanegara` bigint(17)
,`jumlah` bigint(19)
,`pajak` int(32)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `rec_penginapan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `rec_penginapan` (
`nomor` bigint(21)
,`tahun` int(4)
,`bulan` int(11)
,`nama_bulan` varchar(12)
,`id_kabupaten` int(11)
,`id_penginapan` int(11)
,`nama` varchar(16)
,`id_data_penginapan` int(11)
,`domestik_personal_l` int(11)
,`domestik_personal_p` int(11)
,`mancanegara_personal_l` int(11)
,`mancanegara_personal_p` int(11)
,`domestik_personal` bigint(12)
,`mancanegara_personal` bigint(12)
,`jumlah_personal` bigint(14)
,`domestik_durasi` int(11)
,`mancanegara_durasi` int(11)
,`jumlah_durasi` bigint(12)
,`pajak` int(32)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rec_p_biro`
--

CREATE TABLE `rec_p_biro` (
  `no` int(7) NOT NULL,
  `id_biro` varchar(16) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jumlah_pengunjung_domestik` int(7) NOT NULL,
  `jumlah_pengunjung_mancanegara` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rec_p_obyek`
--

CREATE TABLE `rec_p_obyek` (
  `no` int(7) NOT NULL,
  `id_obyek` varchar(16) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jumlah_pengunjung` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rec_p_penginapan`
--

CREATE TABLE `rec_p_penginapan` (
  `no` int(7) NOT NULL,
  `id_penginapan` varchar(16) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jumlah_pengunjung` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rec_usaha_jasa`
--

CREATE TABLE `rec_usaha_jasa` (
  `no` int(7) NOT NULL,
  `id_usaha` varchar(16) NOT NULL,
  `tahun` int(4) NOT NULL,
  `jumlah_pengunjung` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `title_role` varchar(64) NOT NULL,
  `nama_role` varchar(64) NOT NULL,
  `nama_controller` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `title_role`, `nama_role`, `nama_controller`) VALUES
(1, 'Admin', 'admin', 'AdminController'),
(2, 'Operator', 'operator', 'OperatorController'),
(3, 'Pimpinan', 'pimpinan', 'PimpinanController');

-- --------------------------------------------------------

--
-- Struktur dari tabel `senibudaya`
--

CREATE TABLE `senibudaya` (
  `id_senibudaya` int(11) NOT NULL,
  `id_j_senibudaya` int(11) NOT NULL,
  `id_j2_senibudaya` int(11) DEFAULT NULL,
  `nama` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jumlahanggota` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `file2` varchar(640) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `senibudaya`
--

INSERT INTO `senibudaya` (`id_senibudaya`, `id_j_senibudaya`, `id_j2_senibudaya`, `nama`, `alamat`, `jumlahanggota`, `lokasi`, `file`, `file2`, `dokumen`, `deskripsi`, `id_kabupaten`, `id_user_entry`, `id_user_approv`) VALUES
(1, 1, 1, 'taribla', '', 22, 'lok', '900c7780566f15388b1cb2e49b34564d.jpg', '633e9b2dafa67974fdad3a948263b36d.jpg,704552f3fba69fb060dbc199ec0d205d.jpg', '', 'desk', 2, 0, 0),
(2, 1, 2, 'senb2', '', 3, 'nolok', 'nof', '', '', 'nodesk', 1, 0, 0),
(4, 1, 8, 'Kesenian Smada P', 'jl air hitam', 8, '23', 'e1afc9eb98a523db27a0ced8d36ae551.jpg', 'f5af0243642cdbb6636e2972625e4f82.jpg,0fb41652d9828570b94e05ab770e9195.jpg', '', '232', 1, 2, 0),
(5, 2, 8, 'Tari Bedincak', 'di Gedung Sepntu Sedulanh', 200, '-2.123560, 106.109940', '9808a35a0b8c78ac300f329fcde12fd4.jpg', '37f2a7576816c5345a9887dd48239858.jpg,4543bf7dfd1fe1da5c233d1e26e3f02c.jpg,5c725ac03d36de5d329cb739079041ba.jpg', 'ef51833abb7b98bb022a8d07f1a500fc.pdf', 'Desk tentang SEni', 2, 3, 6),
(6, 2, 7, 'TARI KREASI SMAN', '', 80, '-', 'dd2ce5bcc8ac2b71d21c4bb76b1b8a2f.jpg', '183719e68ed7de9722deddef7f030169.png', '', 'Didirikan sejak 2011', 2, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `senibudaya_pagelaranpameran`
--

CREATE TABLE `senibudaya_pagelaranpameran` (
  `id_pagelaran` int(11) NOT NULL,
  `id_jenis_pagelaran` int(11) NOT NULL,
  `id_senibudaya` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `tanggal_kegiatan_end` date NOT NULL,
  `jumlah_penonton` int(4) NOT NULL,
  `file` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `file2` varchar(640) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `senibudaya_pagelaranpameran`
--

INSERT INTO `senibudaya_pagelaranpameran` (`id_pagelaran`, `id_jenis_pagelaran`, `id_senibudaya`, `nama`, `tanggal_kegiatan`, `tanggal_kegiatan_end`, `jumlah_penonton`, `file`, `lokasi`, `deskripsi`, `id_kabupaten`, `alamat`, `file2`, `dokumen`, `id_user_entry`, `id_user_approv`) VALUES
(1, 2, 2, 'Pamera togaci', '3333-03-11', '2019-11-22', 4441, '35ca4de11b25a105382f99244f1d03f6.jpg', '-', 'adawd', 2, 'jl kampung pasir', 'af2024a5a615c72de1e7c408c7252681.jpg,83d2086d0883fe6aa71ed4537110a535.jpg', '', 3, 0),
(2, 1, 6, 'Pameran HUT Sungailiat', '2019-11-12', '2019-12-11', 232222, '3e42db8540ed492042cb1ad6b1a838a6.jpg', '-1.915885, 106.119595', 'Bupati ', 1, 'tamansari', 'c8035cbf7ecdae51a79d7284018c2721.JPG', '82657c2022fd49ebb4716136dd630a4f.pdf', 3, 6),
(3, 1, 5, 'Rekormuri Tari Bedincak ', '2019-11-22', '2019-11-16', 45454544, 'photoCover, PhotoAcara, Dokument', '-', '-', 2, 'Taman Merdeka 2', '', '', 3, 6),
(4, 2, 5, 'Ef\\ven tari bedincak', '2019-11-15', '2019-11-15', 2000, '5a9ade15f7c08d1db16bbec65a2f4434.jpg', '-', '-', 2, '', '8d443ca6e467756778b91d97bbfae256.jpg,c366b720d9747efd8ae489c0bbb0e07e.jpg', '', 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `senibudaya_saranaprasarana`
--

CREATE TABLE `senibudaya_saranaprasarana` (
  `id_saranaprasarana` int(11) NOT NULL,
  `id_jenis_saranaprasarana` varchar(11) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `file` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `file2` varchar(640) NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `id_user_entry` int(11) NOT NULL,
  `id_user_approv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `senibudaya_saranaprasarana`
--

INSERT INTO `senibudaya_saranaprasarana` (`id_saranaprasarana`, `id_jenis_saranaprasarana`, `nama`, `file`, `lokasi`, `deskripsi`, `id_kabupaten`, `alamat`, `file2`, `dokumen`, `id_user_entry`, `id_user_approv`) VALUES
(2, '3', 'Tamansari', '3c7decc5ee63541b2e1b6b5041e52867.jpg', '-1.8587589,106.1142011', 'test desk', 2, 'test alamat', '1dd60e0d5d11186a4171d6ec0f48fb5c.png,c14e92d03237065df85024eb164f63cd.jpg', '', 3, 6),
(3, '2', 'Kolong Biru edit', 'fileedit', 'lokasiedit', 'deskedit', 1, '', '', '', 0, 0),
(5, '3', 'Gedung Serbaguna', 'phohotolasi', '-', '-', 1, '', '', '', 0, 0),
(6, '1', 'Gedung Juang', '406c4ca8092d2291e70326422b502226.jpg', '-1.9011734,106.1079261', 'dekat rsj', 2, 'jl ahmad yani', 'bcb344bdfb45f8cf318ab08acaa70693.png,bf96566808bb4a5e1ac994bfdd912469.jpg', '87f19fd1b8e18d8a96529c257ce25a11.pdf', 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_penetapan_cagarbudaya`
--

CREATE TABLE `status_penetapan_cagarbudaya` (
  `id_status_penetapan_cagarbudaya` int(11) NOT NULL,
  `nama_status_penetapan_cagarbudaya` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_penetapan_cagarbudaya`
--

INSERT INTO `status_penetapan_cagarbudaya` (`id_status_penetapan_cagarbudaya`, `nama_status_penetapan_cagarbudaya`) VALUES
(1, 'Ditetapkan'),
(2, 'Belum Ditetapkan');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stat_cagarbudaya`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stat_cagarbudaya` (
`nomor` bigint(21)
,`tahun` int(4)
,`bulan` int(11)
,`nama_bulan` varchar(12)
,`id_cagarbudaya` int(20)
,`nama` varchar(16)
,`id_kabupaten` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stat_laporan_kebudayaan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stat_laporan_kebudayaan` (
`nomor` bigint(21)
,`id_format` int(32)
,`id_elemen` varchar(32)
,`nama_elemen` varchar(64)
,`satuan` varchar(12)
,`kewenangan` varchar(64)
,`data_tunggal` varchar(32)
,`data_sektoral` varchar(32)
,`tahun` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stat_laporan_pariwisata`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stat_laporan_pariwisata` (
`nomor` bigint(21)
,`id_format` int(32)
,`id_elemen` varchar(32)
,`nama_elemen` varchar(64)
,`satuan` varchar(12)
,`kewenangan` varchar(64)
,`data_tunggal` varchar(32)
,`data_sektoral` varchar(32)
,`tahun` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stat_museum`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stat_museum` (
`nomor` bigint(21)
,`tahun` int(4)
,`bulan` int(11)
,`nama_bulan` varchar(12)
,`id_museum` int(11)
,`nama` varchar(16)
,`id_kabupaten` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stat_objek`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stat_objek` (
`nomor` bigint(21)
,`tahun` int(4)
,`bulan` int(11)
,`nama_bulan` varchar(12)
,`id_objek` int(11)
,`nama` varchar(64)
,`id_kabupaten` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stat_penginapan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stat_penginapan` (
`nomor` bigint(21)
,`tahun` int(4)
,`bulan` int(11)
,`nama_bulan` varchar(12)
,`id_penginapan` int(11)
,`nama` varchar(16)
,`id_kabupaten` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tahun`
--

INSERT INTO `tb_tahun` (`tahun`) VALUES
(2018),
(2019),
(2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(20) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id_kabupaten` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `username`, `password`, `nama`, `photo`, `id_kabupaten`) VALUES
(1, 1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'nama admin', '', 0),
(2, 2, 'operatorpkp', 'c60a5fa4eec7852253f50db2a930184d', 'Husein', '', 1),
(3, 2, 'operatorbangka', 'd1a8e12c84b3a5a0166760330d7021f1', 'ugikdev', 'operatorbangka.jpg', 2),
(4, 3, 'pimpinanpkp', '481cb85f6d73fbd09095c2056564b222', 'Nama Pemimpinpkp', '', 1),
(5, 1, 'admin2', 'c84258e9c39059a89ab77d846ddab909', '', '', NULL),
(6, 3, 'pimpinanbangka', '0007846db0ce6ff68a3af0e356165ec9', 'Muklis', '', 2);

-- --------------------------------------------------------

--
-- Struktur untuk view `events`
--
DROP TABLE IF EXISTS `events`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `events`  AS  select `senibudaya_pagelaranpameran`.`id_pagelaran` AS `id`,`senibudaya_pagelaranpameran`.`nama` AS `title`,`senibudaya_pagelaranpameran`.`tanggal_kegiatan` AS `date` from `senibudaya_pagelaranpameran` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `rec_cagarbudaya`
--
DROP TABLE IF EXISTS `rec_cagarbudaya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rec_cagarbudaya`  AS  select `stat_cagarbudaya`.`nomor` AS `nomor`,`stat_cagarbudaya`.`tahun` AS `tahun`,`stat_cagarbudaya`.`bulan` AS `bulan`,`stat_cagarbudaya`.`nama_bulan` AS `nama_bulan`,`stat_cagarbudaya`.`id_kabupaten` AS `id_kabupaten`,`stat_cagarbudaya`.`id_cagarbudaya` AS `id_cagarbudaya`,`stat_cagarbudaya`.`nama` AS `nama`,`data_cagarbudaya`.`id_data_cagarbudaya` AS `id_data_cagarbudaya`,`data_cagarbudaya`.`domestik_l` AS `domestik_l`,`data_cagarbudaya`.`domestik_p` AS `domestik_p`,`data_cagarbudaya`.`mancanegara_l` AS `mancanegara_l`,`data_cagarbudaya`.`mancanegara_p` AS `mancanegara_p`,`data_cagarbudaya`.`domestik_l` + `data_cagarbudaya`.`domestik_p` AS `domestik`,`data_cagarbudaya`.`mancanegara_l` + `data_cagarbudaya`.`mancanegara_p` AS `mancanegara`,`data_cagarbudaya`.`domestik_l` + `data_cagarbudaya`.`domestik_p` + `data_cagarbudaya`.`mancanegara_l` + `data_cagarbudaya`.`mancanegara_p` AS `jumlah`,`data_cagarbudaya`.`pajak` AS `pajak` from (`stat_cagarbudaya` left join `data_cagarbudaya` on(`stat_cagarbudaya`.`tahun` = `data_cagarbudaya`.`tahun` and `stat_cagarbudaya`.`bulan` = `data_cagarbudaya`.`bulan` and `stat_cagarbudaya`.`id_cagarbudaya` = `data_cagarbudaya`.`id_cagarbudaya`)) order by `stat_cagarbudaya`.`nomor` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `rec_museum`
--
DROP TABLE IF EXISTS `rec_museum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rec_museum`  AS  select `stat_museum`.`nomor` AS `nomor`,`stat_museum`.`tahun` AS `tahun`,`stat_museum`.`bulan` AS `bulan`,`stat_museum`.`nama_bulan` AS `nama_bulan`,`stat_museum`.`id_kabupaten` AS `id_kabupaten`,`stat_museum`.`id_museum` AS `id_museum`,`stat_museum`.`nama` AS `nama`,`data_museum`.`id_data_museum` AS `id_data_museum`,`data_museum`.`domestik_l` AS `domestik_l`,`data_museum`.`domestik_p` AS `domestik_p`,`data_museum`.`mancanegara_l` AS `mancanegara_l`,`data_museum`.`mancanegara_p` AS `mancanegara_p`,`data_museum`.`domestik_l` + `data_museum`.`domestik_p` AS `domestik`,`data_museum`.`mancanegara_l` + `data_museum`.`mancanegara_p` AS `mancanegara`,`data_museum`.`domestik_l` + `data_museum`.`domestik_p` + `data_museum`.`mancanegara_l` + `data_museum`.`mancanegara_p` AS `jumlah`,`data_museum`.`pajak` AS `pajak` from (`stat_museum` left join `data_museum` on(`stat_museum`.`tahun` = `data_museum`.`tahun` and `stat_museum`.`bulan` = `data_museum`.`bulan` and `stat_museum`.`id_museum` = `data_museum`.`id_museum`)) order by `stat_museum`.`nomor` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `rec_objek`
--
DROP TABLE IF EXISTS `rec_objek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rec_objek`  AS  select `stat_objek`.`nomor` AS `nomor`,`stat_objek`.`tahun` AS `tahun`,`stat_objek`.`bulan` AS `bulan`,`stat_objek`.`nama_bulan` AS `nama_bulan`,`stat_objek`.`id_kabupaten` AS `id_kabupaten`,`stat_objek`.`id_objek` AS `id_objek`,`stat_objek`.`nama` AS `nama`,`data_objek`.`id_data_objek` AS `id_data_objek`,`data_objek`.`domestik_l` AS `domestik_l`,`data_objek`.`domestik_p` AS `domestik_p`,`data_objek`.`mancanegara_l` AS `mancanegara_l`,`data_objek`.`mancanegara_p` AS `mancanegara_p`,`data_objek`.`domestik_l` + `data_objek`.`domestik_p` AS `domestik`,`data_objek`.`mancanegara_l` + `data_objek`.`mancanegara_p` AS `mancanegara`,`data_objek`.`domestik_l` + `data_objek`.`domestik_p` + `data_objek`.`mancanegara_l` + `data_objek`.`mancanegara_p` AS `jumlah`,`data_objek`.`pajak` AS `pajak` from (`stat_objek` left join `data_objek` on(`stat_objek`.`tahun` = `data_objek`.`tahun` and `stat_objek`.`bulan` = `data_objek`.`bulan` and `stat_objek`.`id_objek` = `data_objek`.`id_objek`)) order by `stat_objek`.`nomor` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `rec_penginapan`
--
DROP TABLE IF EXISTS `rec_penginapan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rec_penginapan`  AS  select `stat_penginapan`.`nomor` AS `nomor`,`stat_penginapan`.`tahun` AS `tahun`,`stat_penginapan`.`bulan` AS `bulan`,`stat_penginapan`.`nama_bulan` AS `nama_bulan`,`stat_penginapan`.`id_kabupaten` AS `id_kabupaten`,`stat_penginapan`.`id_penginapan` AS `id_penginapan`,`stat_penginapan`.`nama` AS `nama`,`data_penginapan`.`id_data_penginapan` AS `id_data_penginapan`,`data_penginapan`.`domestik_personal_l` AS `domestik_personal_l`,`data_penginapan`.`domestik_personal_p` AS `domestik_personal_p`,`data_penginapan`.`mancanegara_personal_l` AS `mancanegara_personal_l`,`data_penginapan`.`mancanegara_personal_p` AS `mancanegara_personal_p`,`data_penginapan`.`domestik_personal_l` + `data_penginapan`.`domestik_personal_p` AS `domestik_personal`,`data_penginapan`.`mancanegara_personal_l` + `data_penginapan`.`mancanegara_personal_p` AS `mancanegara_personal`,`data_penginapan`.`domestik_personal_l` + `data_penginapan`.`domestik_personal_p` + `data_penginapan`.`mancanegara_personal_l` + `data_penginapan`.`mancanegara_personal_p` AS `jumlah_personal`,`data_penginapan`.`domestik_durasi` AS `domestik_durasi`,`data_penginapan`.`mancanegara_durasi` AS `mancanegara_durasi`,`data_penginapan`.`domestik_durasi` + `data_penginapan`.`mancanegara_durasi` AS `jumlah_durasi`,`data_penginapan`.`pajak` AS `pajak` from (`stat_penginapan` left join `data_penginapan` on(`stat_penginapan`.`tahun` = `data_penginapan`.`tahun` and `stat_penginapan`.`bulan` = `data_penginapan`.`bulan` and `stat_penginapan`.`id_penginapan` = `data_penginapan`.`id_penginapan`)) order by `stat_penginapan`.`nomor` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stat_cagarbudaya`
--
DROP TABLE IF EXISTS `stat_cagarbudaya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stat_cagarbudaya`  AS  select row_number() over ( order by `cagarbudaya`.`id_cagarbudaya`,`tb_tahun`.`tahun`,`tb_bulan`.`id_bulan`) AS `nomor`,`tb_tahun`.`tahun` AS `tahun`,`tb_bulan`.`id_bulan` AS `bulan`,`tb_bulan`.`nama_bulan` AS `nama_bulan`,`cagarbudaya`.`id_cagarbudaya` AS `id_cagarbudaya`,`cagarbudaya`.`nama` AS `nama`,`cagarbudaya`.`id_kabupaten` AS `id_kabupaten` from ((`cagarbudaya` join `tb_tahun`) join `tb_bulan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stat_laporan_kebudayaan`
--
DROP TABLE IF EXISTS `stat_laporan_kebudayaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stat_laporan_kebudayaan`  AS  select row_number() over ( order by `tb_tahun`.`tahun`,`format_laporan_kebudayaan`.`id_format`) AS `nomor`,`format_laporan_kebudayaan`.`id_format` AS `id_format`,`format_laporan_kebudayaan`.`id_elemen` AS `id_elemen`,`format_laporan_kebudayaan`.`nama_elemen` AS `nama_elemen`,`format_laporan_kebudayaan`.`satuan` AS `satuan`,`format_laporan_kebudayaan`.`kewenangan` AS `kewenangan`,`format_laporan_kebudayaan`.`data_tunggal` AS `data_tunggal`,`format_laporan_kebudayaan`.`data_sektoral` AS `data_sektoral`,`tb_tahun`.`tahun` AS `tahun` from (`format_laporan_kebudayaan` join `tb_tahun`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stat_laporan_pariwisata`
--
DROP TABLE IF EXISTS `stat_laporan_pariwisata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stat_laporan_pariwisata`  AS  select row_number() over ( order by `tb_tahun`.`tahun`,`format_laporan_pariwisata`.`id_format`) AS `nomor`,`format_laporan_pariwisata`.`id_format` AS `id_format`,`format_laporan_pariwisata`.`id_elemen` AS `id_elemen`,`format_laporan_pariwisata`.`nama_elemen` AS `nama_elemen`,`format_laporan_pariwisata`.`satuan` AS `satuan`,`format_laporan_pariwisata`.`kewenangan` AS `kewenangan`,`format_laporan_pariwisata`.`data_tunggal` AS `data_tunggal`,`format_laporan_pariwisata`.`data_sektoral` AS `data_sektoral`,`tb_tahun`.`tahun` AS `tahun` from (`format_laporan_pariwisata` join `tb_tahun`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stat_museum`
--
DROP TABLE IF EXISTS `stat_museum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stat_museum`  AS  select row_number() over ( order by `museum`.`id_museum`,`tb_tahun`.`tahun`,`tb_bulan`.`id_bulan`) AS `nomor`,`tb_tahun`.`tahun` AS `tahun`,`tb_bulan`.`id_bulan` AS `bulan`,`tb_bulan`.`nama_bulan` AS `nama_bulan`,`museum`.`id_museum` AS `id_museum`,`museum`.`nama` AS `nama`,`museum`.`id_kabupaten` AS `id_kabupaten` from ((`museum` join `tb_tahun`) join `tb_bulan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stat_objek`
--
DROP TABLE IF EXISTS `stat_objek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stat_objek`  AS  select row_number() over ( order by `pariwisata_objek`.`id_objek`,`tb_tahun`.`tahun`,`tb_bulan`.`id_bulan`) AS `nomor`,`tb_tahun`.`tahun` AS `tahun`,`tb_bulan`.`id_bulan` AS `bulan`,`tb_bulan`.`nama_bulan` AS `nama_bulan`,`pariwisata_objek`.`id_objek` AS `id_objek`,`pariwisata_objek`.`nama` AS `nama`,`pariwisata_objek`.`id_kabupaten` AS `id_kabupaten` from ((`pariwisata_objek` join `tb_tahun`) join `tb_bulan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stat_penginapan`
--
DROP TABLE IF EXISTS `stat_penginapan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stat_penginapan`  AS  select row_number() over ( order by `pariwisata_penginapan`.`id_penginapan`,`tb_tahun`.`tahun`,`tb_bulan`.`id_bulan`) AS `nomor`,`tb_tahun`.`tahun` AS `tahun`,`tb_bulan`.`id_bulan` AS `bulan`,`tb_bulan`.`nama_bulan` AS `nama_bulan`,`pariwisata_penginapan`.`id_penginapan` AS `id_penginapan`,`pariwisata_penginapan`.`nama` AS `nama`,`pariwisata_penginapan`.`id_kabupaten` AS `id_kabupaten` from ((`pariwisata_penginapan` join `tb_tahun`) join `tb_bulan`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cagarbudaya`
--
ALTER TABLE `cagarbudaya`
  ADD PRIMARY KEY (`id_cagarbudaya`),
  ADD KEY `jenis` (`id_jenis_cagarbudaya`),
  ADD KEY `kepemilikan` (`id_kepemilikan_cagarbudaya`),
  ADD KEY `status_penetapan` (`id_status_penetapan_cagarbudaya`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `cagarbudaya_pemugaran`
--
ALTER TABLE `cagarbudaya_pemugaran`
  ADD PRIMARY KEY (`id_pemugaran`),
  ADD KEY `no_id` (`id_cagarbudaya`);

--
-- Indeks untuk tabel `data_cagarbudaya`
--
ALTER TABLE `data_cagarbudaya`
  ADD PRIMARY KEY (`id_data_cagarbudaya`);

--
-- Indeks untuk tabel `data_laporan_kebudayaan`
--
ALTER TABLE `data_laporan_kebudayaan`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `data_laporan_pariwisata`
--
ALTER TABLE `data_laporan_pariwisata`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `data_museum`
--
ALTER TABLE `data_museum`
  ADD PRIMARY KEY (`id_data_museum`);

--
-- Indeks untuk tabel `data_objek`
--
ALTER TABLE `data_objek`
  ADD PRIMARY KEY (`id_data_objek`);

--
-- Indeks untuk tabel `data_penginapan`
--
ALTER TABLE `data_penginapan`
  ADD PRIMARY KEY (`id_data_penginapan`);

--
-- Indeks untuk tabel `format_laporan_kebudayaan`
--
ALTER TABLE `format_laporan_kebudayaan`
  ADD PRIMARY KEY (`id_format`);

--
-- Indeks untuk tabel `format_laporan_pariwisata`
--
ALTER TABLE `format_laporan_pariwisata`
  ADD PRIMARY KEY (`id_format`);

--
-- Indeks untuk tabel `j2_senibudaya`
--
ALTER TABLE `j2_senibudaya`
  ADD PRIMARY KEY (`id_j2_senibudaya`),
  ADD KEY `id_j_senibudaya` (`id_j_senibudaya`);

--
-- Indeks untuk tabel `jenis_cagarbudaya`
--
ALTER TABLE `jenis_cagarbudaya`
  ADD PRIMARY KEY (`id_jenis_cagarbudaya`);

--
-- Indeks untuk tabel `jenis_pagelaran`
--
ALTER TABLE `jenis_pagelaran`
  ADD PRIMARY KEY (`id_jenis_pagelaran`);

--
-- Indeks untuk tabel `jenis_pajak`
--
ALTER TABLE `jenis_pajak`
  ADD PRIMARY KEY (`id_jenis_pajak`);

--
-- Indeks untuk tabel `jenis_saranaprasarana`
--
ALTER TABLE `jenis_saranaprasarana`
  ADD PRIMARY KEY (`id_jenis_saranaprasarana`);

--
-- Indeks untuk tabel `j_senibudaya`
--
ALTER TABLE `j_senibudaya`
  ADD PRIMARY KEY (`id_j_senibudaya`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indeks untuk tabel `kepemilikan_cagarbudaya`
--
ALTER TABLE `kepemilikan_cagarbudaya`
  ADD PRIMARY KEY (`id_kepemilikan_cagarbudaya`);

--
-- Indeks untuk tabel `museum`
--
ALTER TABLE `museum`
  ADD PRIMARY KEY (`id_museum`),
  ADD KEY `id_kepemilikan_museum` (`id_kepemilikan_museum`),
  ADD KEY `id_status_museum` (`id_status_museum`);

--
-- Indeks untuk tabel `museum_kepemilikan`
--
ALTER TABLE `museum_kepemilikan`
  ADD PRIMARY KEY (`id_kepemilikan_museum`);

--
-- Indeks untuk tabel `museum_status`
--
ALTER TABLE `museum_status`
  ADD PRIMARY KEY (`id_status_museum`);

--
-- Indeks untuk tabel `pariwisata_biro`
--
ALTER TABLE `pariwisata_biro`
  ADD PRIMARY KEY (`id_biro`);

--
-- Indeks untuk tabel `pariwisata_item_usaha`
--
ALTER TABLE `pariwisata_item_usaha`
  ADD PRIMARY KEY (`id_item_usaha`);

--
-- Indeks untuk tabel `pariwisata_jenis_biro`
--
ALTER TABLE `pariwisata_jenis_biro`
  ADD PRIMARY KEY (`id_jenis_biro`);

--
-- Indeks untuk tabel `pariwisata_jenis_objek`
--
ALTER TABLE `pariwisata_jenis_objek`
  ADD PRIMARY KEY (`id_jenis_objek`);

--
-- Indeks untuk tabel `pariwisata_jenis_penginapan`
--
ALTER TABLE `pariwisata_jenis_penginapan`
  ADD PRIMARY KEY (`id_jenis_penginapan`);

--
-- Indeks untuk tabel `pariwisata_jenis_usaha`
--
ALTER TABLE `pariwisata_jenis_usaha`
  ADD PRIMARY KEY (`id_jenis_usaha`);

--
-- Indeks untuk tabel `pariwisata_objek`
--
ALTER TABLE `pariwisata_objek`
  ADD PRIMARY KEY (`id_objek`);

--
-- Indeks untuk tabel `pariwisata_penginapan`
--
ALTER TABLE `pariwisata_penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indeks untuk tabel `pariwisata_restoran`
--
ALTER TABLE `pariwisata_restoran`
  ADD PRIMARY KEY (`id_restoran`);

--
-- Indeks untuk tabel `pariwisata_sertifikat_biro`
--
ALTER TABLE `pariwisata_sertifikat_biro`
  ADD PRIMARY KEY (`id_sertifikat_biro`);

--
-- Indeks untuk tabel `pariwisata_usaha`
--
ALTER TABLE `pariwisata_usaha`
  ADD PRIMARY KEY (`id_usaha`);

--
-- Indeks untuk tabel `penerimaan_pariwisata`
--
ALTER TABLE `penerimaan_pariwisata`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `pengunjung_cagarbudaya`
--
ALTER TABLE `pengunjung_cagarbudaya`
  ADD PRIMARY KEY (`id_pengunjung`),
  ADD KEY `id_cagarbudaya` (`id_cagarbudaya`);

--
-- Indeks untuk tabel `rec_p_biro`
--
ALTER TABLE `rec_p_biro`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_biro` (`id_biro`);

--
-- Indeks untuk tabel `rec_p_obyek`
--
ALTER TABLE `rec_p_obyek`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_obyek` (`id_obyek`);

--
-- Indeks untuk tabel `rec_p_penginapan`
--
ALTER TABLE `rec_p_penginapan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_penginapan` (`id_penginapan`);

--
-- Indeks untuk tabel `rec_usaha_jasa`
--
ALTER TABLE `rec_usaha_jasa`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_usaha` (`id_usaha`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `senibudaya`
--
ALTER TABLE `senibudaya`
  ADD PRIMARY KEY (`id_senibudaya`),
  ADD KEY `id_j_senibudaya` (`id_j_senibudaya`),
  ADD KEY `id_j2_senibudaya` (`id_j2_senibudaya`);

--
-- Indeks untuk tabel `senibudaya_pagelaranpameran`
--
ALTER TABLE `senibudaya_pagelaranpameran`
  ADD PRIMARY KEY (`id_pagelaran`);

--
-- Indeks untuk tabel `senibudaya_saranaprasarana`
--
ALTER TABLE `senibudaya_saranaprasarana`
  ADD PRIMARY KEY (`id_saranaprasarana`);

--
-- Indeks untuk tabel `status_penetapan_cagarbudaya`
--
ALTER TABLE `status_penetapan_cagarbudaya`
  ADD PRIMARY KEY (`id_status_penetapan_cagarbudaya`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cagarbudaya`
--
ALTER TABLE `cagarbudaya`
  MODIFY `id_cagarbudaya` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `cagarbudaya_pemugaran`
--
ALTER TABLE `cagarbudaya_pemugaran`
  MODIFY `id_pemugaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_cagarbudaya`
--
ALTER TABLE `data_cagarbudaya`
  MODIFY `id_data_cagarbudaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT untuk tabel `data_laporan_kebudayaan`
--
ALTER TABLE `data_laporan_kebudayaan`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `data_laporan_pariwisata`
--
ALTER TABLE `data_laporan_pariwisata`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `data_museum`
--
ALTER TABLE `data_museum`
  MODIFY `id_data_museum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `data_objek`
--
ALTER TABLE `data_objek`
  MODIFY `id_data_objek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `data_penginapan`
--
ALTER TABLE `data_penginapan`
  MODIFY `id_data_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `format_laporan_kebudayaan`
--
ALTER TABLE `format_laporan_kebudayaan`
  MODIFY `id_format` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `format_laporan_pariwisata`
--
ALTER TABLE `format_laporan_pariwisata`
  MODIFY `id_format` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `j2_senibudaya`
--
ALTER TABLE `j2_senibudaya`
  MODIFY `id_j2_senibudaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jenis_pagelaran`
--
ALTER TABLE `jenis_pagelaran`
  MODIFY `id_jenis_pagelaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_pajak`
--
ALTER TABLE `jenis_pajak`
  MODIFY `id_jenis_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_saranaprasarana`
--
ALTER TABLE `jenis_saranaprasarana`
  MODIFY `id_jenis_saranaprasarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `j_senibudaya`
--
ALTER TABLE `j_senibudaya`
  MODIFY `id_j_senibudaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `museum`
--
ALTER TABLE `museum`
  MODIFY `id_museum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `museum_kepemilikan`
--
ALTER TABLE `museum_kepemilikan`
  MODIFY `id_kepemilikan_museum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `museum_status`
--
ALTER TABLE `museum_status`
  MODIFY `id_status_museum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_biro`
--
ALTER TABLE `pariwisata_biro`
  MODIFY `id_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_item_usaha`
--
ALTER TABLE `pariwisata_item_usaha`
  MODIFY `id_item_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_jenis_biro`
--
ALTER TABLE `pariwisata_jenis_biro`
  MODIFY `id_jenis_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_jenis_objek`
--
ALTER TABLE `pariwisata_jenis_objek`
  MODIFY `id_jenis_objek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_jenis_penginapan`
--
ALTER TABLE `pariwisata_jenis_penginapan`
  MODIFY `id_jenis_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_jenis_usaha`
--
ALTER TABLE `pariwisata_jenis_usaha`
  MODIFY `id_jenis_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_objek`
--
ALTER TABLE `pariwisata_objek`
  MODIFY `id_objek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_penginapan`
--
ALTER TABLE `pariwisata_penginapan`
  MODIFY `id_penginapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_sertifikat_biro`
--
ALTER TABLE `pariwisata_sertifikat_biro`
  MODIFY `id_sertifikat_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pariwisata_usaha`
--
ALTER TABLE `pariwisata_usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengunjung_cagarbudaya`
--
ALTER TABLE `pengunjung_cagarbudaya`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `rec_p_biro`
--
ALTER TABLE `rec_p_biro`
  MODIFY `no` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rec_p_obyek`
--
ALTER TABLE `rec_p_obyek`
  MODIFY `no` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rec_p_penginapan`
--
ALTER TABLE `rec_p_penginapan`
  MODIFY `no` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `senibudaya`
--
ALTER TABLE `senibudaya`
  MODIFY `id_senibudaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `senibudaya_pagelaranpameran`
--
ALTER TABLE `senibudaya_pagelaranpameran`
  MODIFY `id_pagelaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `senibudaya_saranaprasarana`
--
ALTER TABLE `senibudaya_saranaprasarana`
  MODIFY `id_saranaprasarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `status_penetapan_cagarbudaya`
--
ALTER TABLE `status_penetapan_cagarbudaya`
  MODIFY `id_status_penetapan_cagarbudaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cagarbudaya`
--
ALTER TABLE `cagarbudaya`
  ADD CONSTRAINT `cagarbudaya_ibfk_1` FOREIGN KEY (`id_jenis_cagarbudaya`) REFERENCES `jenis_cagarbudaya` (`id_jenis_cagarbudaya`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cagarbudaya_ibfk_2` FOREIGN KEY (`id_kepemilikan_cagarbudaya`) REFERENCES `kepemilikan_cagarbudaya` (`id_kepemilikan_cagarbudaya`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cagarbudaya_ibfk_3` FOREIGN KEY (`id_status_penetapan_cagarbudaya`) REFERENCES `status_penetapan_cagarbudaya` (`id_status_penetapan_cagarbudaya`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cagarbudaya_pemugaran`
--
ALTER TABLE `cagarbudaya_pemugaran`
  ADD CONSTRAINT `cagarbudaya_pemugaran_ibfk_1` FOREIGN KEY (`id_cagarbudaya`) REFERENCES `cagarbudaya` (`id_cagarbudaya`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `j2_senibudaya`
--
ALTER TABLE `j2_senibudaya`
  ADD CONSTRAINT `j2_senibudaya_ibfk_1` FOREIGN KEY (`id_j_senibudaya`) REFERENCES `j_senibudaya` (`id_j_senibudaya`);

--
-- Ketidakleluasaan untuk tabel `pengunjung_cagarbudaya`
--
ALTER TABLE `pengunjung_cagarbudaya`
  ADD CONSTRAINT `pengunjung_cagarbudaya_ibfk_1` FOREIGN KEY (`id_cagarbudaya`) REFERENCES `cagarbudaya` (`id_cagarbudaya`);

--
-- Ketidakleluasaan untuk tabel `senibudaya`
--
ALTER TABLE `senibudaya`
  ADD CONSTRAINT `senibudaya_ibfk_1` FOREIGN KEY (`id_j2_senibudaya`) REFERENCES `j2_senibudaya` (`id_j2_senibudaya`) ON UPDATE CASCADE,
  ADD CONSTRAINT `senibudaya_ibfk_2` FOREIGN KEY (`id_j_senibudaya`) REFERENCES `j_senibudaya` (`id_j_senibudaya`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
