-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2020 pada 17.51
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saftaferti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `nama_bahan_baku` varchar(200) NOT NULL,
  `suplier` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `kebutuhan` int(11) NOT NULL COMMENT '+ 5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bahan_baku`
--

CREATE TABLE `data_bahan_baku` (
  `id_bb` int(11) NOT NULL,
  `id_ket_bb` int(11) NOT NULL,
  `nama_bb` varchar(200) NOT NULL,
  `jenis` varchar(150) NOT NULL DEFAULT 'Material',
  `qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_bahan_baku`
--

INSERT INTO `data_bahan_baku` (`id_bb`, `id_ket_bb`, `nama_bb`, `jenis`, `qty`) VALUES
(1, 1, 'Base Motor', 'Material', 4),
(2, 1, 'Belt', 'Material', 1),
(3, 1, 'Cover Kanan Dinding 1500x146x525', 'Material', 1),
(4, 1, 'Cover Kiri Dinding 2174x150x620', 'Material', 1),
(5, 1, 'Cover Tail Pulley', 'Material', 1),
(6, 1, 'Cover Kanan Plat  950x200x750', 'Material', 1),
(7, 1, 'Cover Kiri Plat 950x200x750', 'Material', 1),
(8, 1, 'Right Hopper Support', 'Material', 4),
(9, 1, 'Left Hopper Support', 'Material', 4),
(10, 1, 'Hopper', 'Material', 1),
(11, 1, 'Carrier Support Plat', 'Material', 5),
(12, 1, 'RS80 Chain', 'Material', 49),
(13, 1, 'Sproket Holder', 'Material', 2),
(14, 1, 'RS80 Sproket Z35', 'Material', 1),
(15, 1, 'RS80 Sproket Z18', 'Material', 1),
(16, 1, 'Sumimoto Motor Cyclo', 'Material', 1),
(17, 1, 'Casing Full Pelontar type 2', 'Material', 6),
(18, 1, 'Baut Panhead M4x8 (SS)', 'Material', 4),
(19, 1, 'Cover Dinding Kiri Corong', 'Material', 12),
(20, 1, 'Cover Dinding Kanan Flet', 'Material', 4),
(21, 1, 'Fan Shaft', 'Material', 2),
(22, 1, 'Spacer', 'Material', 4),
(23, 1, 'Arcs', 'Material', 2),
(24, 1, 'Baut Panhead M3 x10(SS)', 'Material', 6),
(25, 1, 'Mur M3 (stainless steel) Nylon', 'Material', 1),
(26, 1, 'Motor DC 12 V', 'Material', 2),
(27, 1, 'Adjuster Guide 1', 'Material', 1),
(28, 1, 'Adjuster Guide 2', 'Material', 1),
(29, 1, 'Mur M5 (stainless steel)', 'Material', 1),
(32, 1, 'Plain Washer M16', 'Dpurchase', 33),
(33, 1, 'Plain Washer M20', 'Dpurchase', 56),
(34, 1, 'Plain Washer M12', 'Dpurchase', 76),
(35, 1, 'Mur M20', 'Dpurchase', 28),
(36, 1, 'Mur M12', 'Dpurchase', 2),
(37, 1, 'Mur M10', 'Dpurchase', 36),
(38, 1, 'Mur M16', 'Dpurchase', 12),
(39, 1, 'Countersunk Screw M8x40', 'Dpurchase', 2),
(40, 1, 'Baut Hexa M20x60', 'Dpurchase', 16),
(41, 1, 'Baut Hexa M12x120', 'Dpurchase', 2),
(42, 1, 'Baut Hexa M10x25', 'Dpurchase', 24),
(43, 1, 'Baut Hexa M10x50', 'Dpurchase', 4),
(44, 1, 'Baut Hexa M16x60', 'Dpurchase', 2),
(45, 1, 'Baut Hexa M12x30', 'Dpurchase', 12),
(46, 1, 'Baut Hexa M20x35', 'Dpurchase', 8),
(47, 1, 'Baut Hexa M10x30', 'Dpurchase', 1),
(48, 1, 'Baut Anchor M16x150', 'Dpurchase', 1),
(49, 1, 'Anchor Base Plate', 'Dpurchase', 1),
(50, 1, 'Sproket Cover', 'Consumable', 1),
(51, 1, 'Lem Alteco', 'Consumable', 1),
(63, 2, 'Rangka kaki', 'Material', 1),
(64, 2, 'Oring seal M6', 'Material', 12),
(65, 2, 'Clamping 1', 'Material', 2),
(66, 2, 'Clamping 2', 'Material', 1),
(67, 2, 'Motor DC 12 V', 'Material', 1),
(68, 2, 'Dosing', 'Material', 1),
(69, 2, 'O Ring M4', 'Material', 4),
(70, 2, 'Casing Full Pelontar type 2', 'Material', 1),
(71, 2, 'Cover Dinding Kiri Corong', 'Material', 1),
(72, 2, 'Cover Dinding Kanan Flet', 'Material', 1),
(73, 2, 'Fan Shaft', 'Material', 1),
(74, 2, 'Spacer', 'Material', 3),
(75, 2, 'Arcs', 'Material', 1),
(76, 2, 'Motor DC 12 V', 'Material', 1),
(77, 2, 'Adjuster Guide 1', 'Material', 1),
(78, 2, 'Adjuster Guide 2', 'Material', 1),
(79, 2, 'Sprue/Input Gate', 'Material', 1),
(80, 2, 'Shaft', 'Material', 1),
(81, 2, 'Acrilyc Penutup Cover Dinding kiri', 'Material', 1),
(82, 2, 'Blade', 'Material', 4),
(83, 2, 'O Ring M4', 'Material', 8),
(84, 2, 'O Ring M4', 'Material', 4),
(85, 2, 'Plastic Drum', 'Dpurchase', 1),
(86, 2, 'Baut Hexagon M6X25 (SS)', 'Dpurchase', 12),
(87, 2, 'Mur M6', 'Dpurchase', 12),
(88, 2, 'Ring M6 (Stainless Steel)', 'Dpurchase', 12),
(89, 2, 'Cutting Sticker Logo', 'Dpurchase', 1),
(90, 2, 'Lis Karet', 'Dpurchase', 1.6),
(91, 2, 'Baut Contersunk M4x12', 'Dpurchase', 8),
(92, 2, 'Headless M5x10', 'Dpurchase', 1),
(93, 2, 'Capasitor 100 nf (hijau)', 'Dpurchase', 2),
(94, 2, 'Kabel AWG 2x2 length=0.15 m', 'Dpurchase', 1),
(95, 2, 'Baut Contersunk M4x8', 'Dpurchase', 5),
(96, 2, 'Socket antar kabel 2 pin', 'Dpurchase', 1),
(97, 2, 'Baut Contersunk M3x10', 'Dpurchase', 2),
(98, 2, 'Snap ring OD 30', 'Dpurchase', 6),
(99, 2, 'Baut Hexagon M4x10 ss', 'Dpurchase', 4),
(100, 2, 'Ring M4 SS', 'Dpurchase', 4),
(101, 2, 'Baut Panhead M4x8 (SS)', 'Dpurchase', 8),
(102, 2, 'Baut Panhead M3 x10(SS)', 'Dpurchase', 8),
(103, 2, 'Mur M3 (stainless steel) Nylon', 'Dpurchase', 8),
(104, 2, 'Mur M5 (stainless steel)', 'Dpurchase', 3),
(105, 2, 'Bearing', 'Dpurchase', 1),
(106, 2, 'Oring seal 12.7x1.5', 'Dpurchase', 1),
(107, 2, 'Baut Inbus M5x10 (kunci L)', 'Dpurchase', 3),
(108, 2, 'Baut Countersink M3x8', 'Dpurchase', 2),
(109, 2, 'Baut Countersink M3x8', 'Dpurchase', 2),
(110, 2, 'Capasitor 100 nf (hijau)', 'Dpurchase', 2),
(111, 2, 'Baut Headless M3x6', 'Dpurchase', 2),
(112, 2, 'Kabel AWG 2x2 length=0.15 m', 'Dpurchase', 1),
(113, 2, 'Conector cb 4pin', 'Dpurchase', 1),
(114, 2, 'Rivet Nut M4', 'Dpurchase', 4),
(115, 2, 'Kabel AWG 2x2 length=0.15 m', 'Dpurchase', 2),
(116, 2, 'Socket antar kabel 2 pin', 'Dpurchase', 1),
(117, 2, 'Rivet Nut M4', 'Dpurchase', 4),
(118, 2, 'Baut Panhead M4x10 SS', 'Dpurchase', 4),
(119, 2, 'Thinner Literan', 'Consumable', 0.3),
(120, 2, 'Silicon Seal (clear 732)', 'Consumable', 0.1),
(121, 2, 'Cat Putih (top Colour 222 - 0001)', 'Consumable', 0.1),
(122, 2, 'Vernish (danagloss 442-0099)', 'Consumable', 0.2),
(123, 2, 'Thinner (spider)', 'Consumable', 0.2),
(124, 2, 'PP Primer (pacigloss PGP 6 - 05000)', 'Consumable', 0.2),
(125, 2, 'Cat Tosca (top Colour 222 - 1317)', 'Consumable', 0.1),
(126, 2, 'Sabun cuci', 'Consumable', 0.1),
(127, 2, 'Ampelas Grit 400', 'Consumable', 0.1),
(128, 2, 'Sikaflex - 221', 'Consumable', 0.1),
(129, 2, 'Lakban Kertas', 'Consumable', 0.2),
(130, 2, 'Lakban Bening', 'Consumable', 0.2),
(131, 2, 'Pelastik Bubble', 'Consumable', 0.05),
(132, 2, 'Lem Alteco', 'Consumable', 0.1),
(133, 2, 'Timah Solder', 'Consumable', 0.05),
(134, 2, 'Silicon Seal (clear 732)', 'Consumable', 0.025),
(135, 2, 'Thinner Literan', 'Consumable', 0.3),
(136, 2, 'Silicon Seal (clear 732)', 'Consumable', 0.1),
(190, 2, 'Corong', 'Material', 1),
(191, 1, 'Parallel Key', 'Material', 1),
(192, 3, 'Rangka kaki', 'Material', 1),
(193, 3, 'Oring seal M6', 'Material', 12),
(194, 3, 'Clamping 1', 'Material', 2),
(195, 3, 'Clamping 2', 'Material', 1),
(196, 3, 'Motor DC 12 V', 'Material', 1),
(197, 3, 'Dosing', 'Material', 1),
(198, 3, 'O Ring M4', 'Material', 4),
(199, 3, 'Casing Full Pelontar type 2', 'Material', 1),
(200, 3, 'Cover Dinding Kiri Corong', 'Material', 1),
(201, 3, 'Cover Dinding Kanan Flet', 'Material', 1),
(202, 3, 'Fan Shaft', 'Material', 1),
(203, 3, 'Spacer', 'Material', 3),
(204, 3, 'Arcs', 'Material', 1),
(205, 3, 'Motor DC 12 V', 'Material', 1),
(206, 3, 'Adjuster Guide 1', 'Material', 1),
(207, 3, 'Adjuster Guide 2', 'Material', 1),
(208, 3, 'Sprue/Input Gate', 'Material', 1),
(209, 3, 'Shaft', 'Material', 1),
(210, 3, 'Acrilyc Penutup Cover Dinding kiri', 'Material', 1),
(211, 3, 'Blade', 'Material', 4),
(212, 3, 'O Ring M4', 'Material', 8),
(213, 3, 'O Ring M4', 'Material', 4),
(214, 3, 'Plastic Drum', 'Dpurchase', 1),
(215, 3, 'Baut Hexagon M6X25 (SS)', 'Dpurchase', 12),
(216, 3, 'Mur M6', 'Dpurchase', 12),
(217, 3, 'Ring M6 (Stainless Steel)', 'Dpurchase', 12),
(218, 3, 'Cutting Sticker Logo', 'Dpurchase', 1),
(219, 3, 'Lis Karet', 'Dpurchase', 1),
(220, 3, 'Baut Contersunk M4x12', 'Dpurchase', 8),
(221, 3, 'Headless M5x10', 'Dpurchase', 1),
(222, 3, 'Capasitor 100 nf (hijau)', 'Dpurchase', 2),
(223, 3, 'Kabel AWG 2x2 length=0.15 m', 'Dpurchase', 1),
(224, 3, 'Baut Contersunk M4x8', 'Dpurchase', 5),
(225, 3, 'Socket antar kabel 2 pin', 'Dpurchase', 1),
(226, 3, 'Baut Contersunk M3x10', 'Dpurchase', 2),
(227, 3, 'Snap ring OD 30', 'Dpurchase', 6),
(228, 3, 'Baut Hexagon M4x10 ss', 'Dpurchase', 4),
(229, 3, 'Ring M4 SS', 'Dpurchase', 4),
(230, 3, 'Baut Panhead M4x8 (SS)', 'Dpurchase', 8),
(231, 3, 'Baut Panhead M3 x10(SS)', 'Dpurchase', 8),
(232, 3, 'Mur M3 (stainless steel) Nylon', 'Dpurchase', 8),
(233, 3, 'Mur M5 (stainless steel)', 'Dpurchase', 3),
(234, 3, 'Bearing', 'Dpurchase', 1),
(235, 3, 'Oring seal 12.7x1.5', 'Dpurchase', 1),
(236, 3, 'Baut Inbus M5x10 (kunci L)', 'Dpurchase', 3),
(237, 3, 'Baut Countersink M3x8', 'Dpurchase', 2),
(238, 3, 'Baut Countersink M3x8', 'Dpurchase', 2),
(239, 3, 'Capasitor 100 nf (hijau)', 'Dpurchase', 2),
(240, 3, 'Baut Headless M3x6', 'Dpurchase', 2),
(241, 3, 'Kabel AWG 2x2 length=0.15 m', 'Dpurchase', 1),
(242, 3, 'Conector cb 4pin', 'Dpurchase', 1),
(243, 3, 'Rivet Nut M4', 'Dpurchase', 4),
(244, 3, 'Kabel AWG 2x2 length=0.15 m', 'Dpurchase', 2),
(245, 3, 'Socket antar kabel 2 pin', 'Dpurchase', 1),
(246, 3, 'Rivet Nut M4', 'Dpurchase', 4),
(247, 3, 'Baut Panhead M4x10 SS', 'Dpurchase', 4),
(248, 3, 'Thinner Literan', 'Consumable', 0.1),
(249, 3, 'Silicon Seal (clear 732)', 'Consumable', 0.1),
(250, 3, 'Cat Putih (top Colour 222 - 0001)', 'Consumable', 0.05),
(251, 3, 'Vernish (danagloss 442-0099)', 'Consumable', 0.05),
(252, 3, 'Thinner (spider)', 'Consumable', 0.055),
(253, 3, 'PP Primer (pacigloss PGP 6 - 05000)', 'Consumable', 0.05),
(254, 3, 'Cat Tosca (top Colour 222 - 1317)', 'Consumable', 0.05),
(255, 3, 'Sabun cuci', 'Consumable', 0.1),
(256, 3, 'Ampelas Grit 400', 'Consumable', 0.1),
(257, 3, 'Sikaflex - 221', 'Consumable', 0.04),
(258, 3, 'Lakban Kertas', 'Consumable', 0.04),
(259, 3, 'Lakban Bening', 'Consumable', 0.05),
(260, 3, 'Pelastik Bubble', 'Consumable', 0.03),
(261, 3, 'Lem Alteco', 'Consumable', 0.1),
(262, 3, 'Timah Solder', 'Consumable', 0.05),
(263, 3, 'Silicon Seal (clear 732)', 'Consumable', 0.025),
(264, 3, 'Thinner Literan', 'Consumable', 0.1),
(265, 3, 'Silicon Seal (clear 732)', 'Consumable', 0.1),
(319, 3, 'Corong', 'Material', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Personal'),
(2, 'Company');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_bahan_baku`
--

CREATE TABLE `ket_bahan_baku` (
  `id_ket_bb` int(11) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ket_bahan_baku`
--

INSERT INTO `ket_bahan_baku` (`id_ket_bb`, `keterangan`) VALUES
(1, 'Conveyor'),
(2, 'Fish Feeder'),
(3, 'Fish Feeder Mini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Marketing'),
(2, 'Ppc'),
(3, 'Produksi'),
(4, 'Administrator'),
(5, 'Operasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_kategori` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `username`, `password`, `id_kategori`) VALUES
(1, 'iqbal', 'Jl. Suryani dalam 2 no.101A/83 RT02/RW02\r\nKelurahan warung muncang, Kecamatan Bandung kulon', '083820509091', 'iqbal123', '$2y$10$qzeVkS0kPlcNJTV.WY3q5OoFXZ/24OSwWl474Tr57nZtpZw7FqHl2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nomor_pesanan` varchar(255) NOT NULL,
  `no_pembayaran` varchar(255) NOT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nomor_pesanan`, `no_pembayaran`, `bukti`, `status`) VALUES
(1, 'T001', 'AC2401', 'file_1578312091.jpg', 1),
(2, 'T002', 'AC2402', 'file_1579190609.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nomor_pesanan` varchar(255) NOT NULL,
  `gunchart` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `id_proses` int(11) NOT NULL,
  `id_status_pesan` int(11) DEFAULT NULL,
  `hitung_waktu` int(11) DEFAULT NULL,
  `lama_whelding` int(11) DEFAULT NULL,
  `lama_mashining` int(11) DEFAULT NULL,
  `total_pembayaran` varchar(255) DEFAULT NULL,
  `start_pemesanan` date DEFAULT NULL,
  `delivery_pemesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `nomor_pesanan`, `gunchart`, `id_kategori`, `nama_produk`, `qty`, `tgl_pesan`, `id_proses`, `id_status_pesan`, `hitung_waktu`, `lama_whelding`, `lama_mashining`, `total_pembayaran`, `start_pemesanan`, `delivery_pemesanan`) VALUES
(1, 1, 'T001', NULL, 1, 'Conveyor', 30, '2020-01-06', 5, 2, 7, 5, 5, '750000', NULL, NULL),
(2, 1, 'T002', NULL, 1, 'Fish Feeder', 20, '2020-01-16', 6, 2, 5, 4, 2, '450000', '2020-01-16', '2020-01-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_bayar`
--

CREATE TABLE `status_bayar` (
  `id_status_bayar` int(11) NOT NULL,
  `nama_status_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_bayar`
--

INSERT INTO `status_bayar` (`id_status_bayar`, `nama_status_bayar`) VALUES
(1, 'Belum Dibayar'),
(2, 'Sudah Dibayar'),
(3, 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pesan`
--

CREATE TABLE `status_pesan` (
  `id_status_pesan` int(11) NOT NULL,
  `nama_status_pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pesan`
--

INSERT INTO `status_pesan` (`id_status_pesan`, `nama_status_pesan`) VALUES
(1, 'Menunggu'),
(2, 'Diproses'),
(3, 'Ditolak'),
(4, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_proses`
--

CREATE TABLE `status_proses` (
  `id_proses` int(11) NOT NULL,
  `nama_status_proses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_proses`
--

INSERT INTO `status_proses` (`id_proses`, `nama_status_proses`) VALUES
(1, 'Order Bahan Baku'),
(2, 'Quality Control'),
(3, 'Whelding'),
(4, 'Mashining'),
(5, 'Delivery'),
(6, 'Finished'),
(7, 'Menunggu Pembayaran'),
(8, 'Packing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` text,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `milestone` tinyint(1) NOT NULL DEFAULT '0',
  `ordinal` int(11) DEFAULT NULL,
  `ordinal_priority` datetime DEFAULT NULL,
  `complete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`id`, `order_id`, `name`, `start`, `end`, `parent_id`, `milestone`, `ordinal`, `ordinal_priority`, `complete`) VALUES
(4, 1, 'Order Patch', '2020-01-14 00:00:00', '2020-01-20 00:00:00', NULL, 0, 1, '2020-01-06 12:37:15', 100),
(6, 1, 'pay', '2020-01-18 00:00:00', '2020-01-21 00:00:00', NULL, 0, 3, '2020-01-06 13:05:52', 0),
(7, 2, 'Order Bahan Baku', '2020-01-17 00:00:00', '2020-01-20 00:00:00', NULL, 0, 4, '2020-01-16 16:13:31', 0),
(8, 2, 'Menunggu Konfirmasi Order BB', '2020-01-16 00:00:00', '2020-01-17 00:00:00', NULL, 0, 5, '2020-01-16 16:14:06', 100),
(9, 2, 'QC', '2020-01-20 00:00:00', '2020-01-22 00:00:00', NULL, 0, 6, '2020-01-16 16:18:21', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_level`) VALUES
(1, 'admin', '$2y$10$8USFhi3RWWDu5NFFk0xzfOR3eTmHhenMtlp87mHRMlSxvavhJQprW', 4),
(2, 'marketing', '$2y$10$8USFhi3RWWDu5NFFk0xzfOR3eTmHhenMtlp87mHRMlSxvavhJQprW', 1),
(3, 'pcc', '$2y$10$8USFhi3RWWDu5NFFk0xzfOR3eTmHhenMtlp87mHRMlSxvavhJQprW', 2),
(4, 'produksi', '$2y$10$8USFhi3RWWDu5NFFk0xzfOR3eTmHhenMtlp87mHRMlSxvavhJQprW', 3),
(5, 'operasional', '$2y$10$P05SLl.iN1gYUK08ih7nieKG9qzdnlZqr0HpYAfGfb6Q.6s07KzDq', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`),
  ADD KEY `bahan_baku_ibfk_1` (`id_pesanan`);

--
-- Indeks untuk tabel `data_bahan_baku`
--
ALTER TABLE `data_bahan_baku`
  ADD PRIMARY KEY (`id_bb`),
  ADD KEY `id_ket_bb` (`id_ket_bb`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ket_bahan_baku`
--
ALTER TABLE `ket_bahan_baku`
  ADD PRIMARY KEY (`id_ket_bb`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_proses` (`id_proses`),
  ADD KEY `pesanan_ibfk_3` (`id_pelanggan`),
  ADD KEY `pesanan_ibfk_4` (`id_status_pesan`);

--
-- Indeks untuk tabel `status_bayar`
--
ALTER TABLE `status_bayar`
  ADD PRIMARY KEY (`id_status_bayar`);

--
-- Indeks untuk tabel `status_pesan`
--
ALTER TABLE `status_pesan`
  ADD PRIMARY KEY (`id_status_pesan`);

--
-- Indeks untuk tabel `status_proses`
--
ALTER TABLE `status_proses`
  ADD PRIMARY KEY (`id_proses`);

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_bahan_baku`
--
ALTER TABLE `data_bahan_baku`
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ket_bahan_baku`
--
ALTER TABLE `ket_bahan_baku`
  MODIFY `id_ket_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_bayar`
--
ALTER TABLE `status_bayar`
  MODIFY `id_status_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status_pesan`
--
ALTER TABLE `status_pesan`
  MODIFY `id_status_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_proses`
--
ALTER TABLE `status_proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_bahan_baku`
--
ALTER TABLE `data_bahan_baku`
  ADD CONSTRAINT `data_bahan_baku_ibfk_1` FOREIGN KEY (`id_ket_bb`) REFERENCES `ket_bahan_baku` (`id_ket_bb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_proses`) REFERENCES `status_proses` (`id_proses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_4` FOREIGN KEY (`id_status_pesan`) REFERENCES `status_pesan` (`id_status_pesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
