-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2022 pada 05.40
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnosa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE `tb_detail` (
  `id_det` int(11) NOT NULL,
  `id_pasien` varchar(15) NOT NULL,
  `kd_gejala` varchar(15) NOT NULL,
  `kd_diagnosa` varchar(15) NOT NULL,
  `kd_penyebab` varchar(15) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`id_det`, `id_pasien`, `kd_gejala`, `kd_diagnosa`, `kd_penyebab`, `waktu`) VALUES
(50, '123401PSN', 'G-027', 'D-003', 'PYB-041', '2022-07-10 06:10:52'),
(51, '123401PSN', 'G-031', 'D-003', 'PYB-041', '2022-07-10 06:10:52'),
(52, 'sdwdiwjdl', 'G-001', 'D-001', 'PYB-011', '2022-07-10 08:01:38'),
(53, 'sdwdiwjdl', 'G-013', 'D-001', 'PYB-011', '2022-07-10 08:01:38'),
(56, 'sdwdiwjdl', 'G-001', 'D-001', 'PYB-001', '2022-07-10 08:02:15'),
(57, 'sdwdiwjdl', 'G-009', 'D-001', 'PYB-001', '2022-07-10 08:02:15'),
(58, 'sdwdiwjdl', 'G-016', 'D-002', 'PYB-027', '2022-07-10 08:02:33'),
(59, 'sdwdiwjdl', 'G-020', 'D-002', 'PYB-027', '2022-07-10 08:02:33'),
(60, 'sdwdiwjdl', 'G-027', 'D-003', 'PYB-034', '2022-07-10 08:02:47'),
(61, 'sdwdiwjdl', 'G-030', 'D-003', 'PYB-034', '2022-07-10 08:02:47'),
(62, 'sdwdiwj', 'G-001', 'D-001', 'PYB-004', '2022-07-10 14:13:34'),
(63, 'sdwdiwj', 'G-007', 'D-001', 'PYB-004', '2022-07-10 14:13:34'),
(64, 'sdwdiwj', 'G-009', 'D-001', 'PYB-004', '2022-07-10 14:13:34'),
(69, '1234', 'G-001', 'D-001', 'PYB-006', '2022-07-10 14:37:52'),
(70, '1234', 'G-006', 'D-001', 'PYB-006', '2022-07-10 14:37:52'),
(71, '1234', 'G-009', 'D-001', 'PYB-006', '2022-07-10 14:37:52'),
(72, '1234', 'G-017', 'D-002', 'PYB-019', '2022-07-11 03:36:03'),
(73, '1234', 'G-021', 'D-002', 'PYB-019', '2022-07-11 03:36:03'),
(74, 'psn02', 'G-017', 'D-002', 'PYB-019', '2022-07-11 03:36:37'),
(75, 'psn02', 'G-021', 'D-002', 'PYB-019', '2022-07-11 03:36:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_diagnosa`
--

CREATE TABLE `tb_diagnosa` (
  `kd_diagnosa` varchar(15) NOT NULL,
  `definisi` varchar(300) DEFAULT NULL,
  `kd_sub` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`kd_diagnosa`, `definisi`, `kd_sub`) VALUES
('D-001', 'BERSIHAN JALAN NAPAS TIDAK EFEKTIF', 'SKT-001'),
('D-002', 'POLA NAPAS TIDAK EFEKTIF', 'SKT-001'),
('D-003', 'DIARE', 'SKT-002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `kd_gejala` varchar(15) NOT NULL,
  `ket_gejala` varchar(300) NOT NULL,
  `kd_diagnosa` varchar(15) NOT NULL,
  `kd_jen_gejala` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gejala`
--

INSERT INTO `tb_gejala` (`kd_gejala`, `ket_gejala`, `kd_diagnosa`, `kd_jen_gejala`) VALUES
('G-001', 'BATUK TIDAK EFEKTIF', 'D-001', 'OMY-002'),
('G-002', 'TIDAK MAMPU BATUK', 'D-001', 'OMY-002'),
('G-003', 'SPUTUM BERLEBIH', 'D-001', 'OMY-002'),
('G-004', 'MENGI, WHEEZING DAN/ATAU RNKHI KERING', 'D-001', 'OMY-002'),
('G-005', 'MEKONIUM DIJALAN NAPAS (PADA NEONATUS)', 'D-001', 'OMY-002'),
('G-006', 'DISPNEA', 'D-001', 'SMN-003'),
('G-007', 'SULIT BICARA', 'D-001', 'SMN-003'),
('G-008', 'ORTOPNEA', 'D-001', 'SMN-003'),
('G-009', 'GELISAH', 'D-001', 'OMN-004'),
('G-010', 'SIANOSIS', 'D-001', 'OMN-004'),
('G-011', 'BUNYI NAPAS MENURUN', 'D-001', 'OMN-004'),
('G-012', 'FREKUENSI NAPAS BERUBAH', 'D-001', 'OMN-004'),
('G-013', 'POLA NAPAS BERUBAH', 'D-001', 'OMN-004'),
('G-014', 'DISPNEA', 'D-002', 'SMY-001'),
('G-015', 'PENGGUNAAN OTOT BANTU PERNAPASAN', 'D-002', 'OMY-002'),
('G-016', 'FASE EKSPIRASI MEMANJANG', 'D-002', 'OMY-002'),
('G-017', 'POLA NAPAS ABNORMAL (MIS. TAJIPNEA, BRADIPNEA, HIPERVENTILASI, KUSSMAUL, CHEYNE-STOKES)', 'D-002', 'OMY-002'),
('G-018', 'ORTOPNEA', 'D-002', 'SMN-003'),
('G-019', 'PERNAPASAN PURSED-LIP', 'D-002', 'OMN-004'),
('G-020', 'PERNAPASAN CUPING HIDUNG', 'D-002', 'OMN-004'),
('G-021', 'DIAMETER THORAKS ANTERIOR-POSTERIOR MENINGKAT', 'D-002', 'OMN-004'),
('G-022', 'VENTILASI SEMENIT MENURUN', 'D-002', 'OMN-004'),
('G-023', 'KAPASITAS VITAL MENURUN', 'D-002', 'OMN-004'),
('G-024', 'TEKANAN EKSPIRASI MENURUN', 'D-002', 'OMN-004'),
('G-025', 'TEKANAN INSPIRASI MENURUN', 'D-002', 'OMN-004'),
('G-026', 'EKSKURSI DADA BERUBAH', 'D-002', 'OMN-004'),
('G-027', 'DEFEKASI LEBIH DARI TIGA KALI DALAM 24 JAM', 'D-003', 'OMY-002'),
('G-028', 'FESES LEMBEK ATAU CAIR', 'D-003', 'OMY-002'),
('G-029', 'URGENCY', 'D-003', 'SMN-003'),
('G-030', 'NYERI ATAU KRAM ABDOMEN', 'D-003', 'SMN-003'),
('G-031', 'FREKUENSI PERISTALTIK MENINGKAT', 'D-003', 'OMN-004'),
('G-032', 'BISING USUS HIPERAKTIF', 'D-003', 'OMN-004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_gejala`
--

CREATE TABLE `tb_jenis_gejala` (
  `kd_jen_gejala` varchar(15) NOT NULL,
  `ket_jen_gejala` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_gejala`
--

INSERT INTO `tb_jenis_gejala` (`kd_jen_gejala`, `ket_jen_gejala`) VALUES
('OMN-004', 'OBJEKTIF MINOR'),
('OMY-002', 'OBJEKTIF MAYOR'),
('SMN-003', 'SUBJEKTIF MINOR'),
('SMY-001', 'SUBJEKTIF MAYOR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_penyebab`
--

CREATE TABLE `tb_jenis_penyebab` (
  `kd_jen_penyebab` varchar(15) NOT NULL,
  `ket_jen_penyebab` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_penyebab`
--

INSERT INTO `tb_jenis_penyebab` (`kd_jen_penyebab`, `ket_jen_penyebab`) VALUES
('PFIS-001', 'FISIOLOGIS'),
('PPSIK-003', 'PSIKOLOGIS'),
('PSIT-002', 'SITUASIONAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kd_kat` varchar(15) NOT NULL,
  `ket_kat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kd_kat`, `ket_kat`) VALUES
('KT-001', 'FISIOLOGIS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `no_dmk_pasien` varchar(15) NOT NULL,
  `nama_pasien` varchar(300) NOT NULL,
  `alamat_pasien` varchar(300) NOT NULL,
  `jen_kel_pasien` varchar(1) NOT NULL,
  `usia` varchar(10) NOT NULL,
  `dx_med` varchar(50) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`no_dmk_pasien`, `nama_pasien`, `alamat_pasien`, `jen_kel_pasien`, `usia`, `dx_med`, `keluhan`, `tanggal`) VALUES
('DP-0056', 'admin1', 'DAWUHAN', 'L', '70 tahun', '43231', 'SAKIT PERTUT', '2022-07-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyebab`
--

CREATE TABLE `tb_penyebab` (
  `kd_penyebab` varchar(15) NOT NULL,
  `ket_penyebab` varchar(300) NOT NULL,
  `kd_diagnosa` varchar(15) NOT NULL,
  `kd_jen_penyebab` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penyebab`
--

INSERT INTO `tb_penyebab` (`kd_penyebab`, `ket_penyebab`, `kd_diagnosa`, `kd_jen_penyebab`) VALUES
('PYB-001', 'SPASME JALAN NAFAS', 'D-001', 'PFIS-001'),
('PYB-002', 'HIPERSIKRESI JALAN NAFAS', 'D-001', 'PFIS-001'),
('PYB-003', 'DISFUNGSI NEUROMUSKULER', 'D-001', 'PFIS-001'),
('PYB-004', 'BENDA ASING DALAM JALAN NAFAS', 'D-001', 'PFIS-001'),
('PYB-005', 'ADANYA JALAN NAFAS BUATAN', 'D-001', 'PFIS-001'),
('PYB-006', 'SEKRESI YANG TERTAHAN', 'D-001', 'PFIS-001'),
('PYB-007', 'HIPERPLASIA DINDING JALAN NAFAS', 'D-001', 'PFIS-001'),
('PYB-008', 'PROSES INFEKSI', 'D-001', 'PFIS-001'),
('PYB-009', 'RESPON ALERGI', 'D-001', 'PFIS-001'),
('PYB-010', 'EFEK AGEN FARMAKOLOGIS (MIS. ANASTESI)', 'D-001', 'PFIS-001'),
('PYB-011', 'MEROKOK AKTIF', 'D-001', 'PSIT-002'),
('PYB-012', 'MEROKOK PASIF', 'D-001', 'PSIT-002'),
('PYB-013', 'TERPAJAN POLUTAN', 'D-001', 'PSIT-002'),
('PYB-014', 'DEPRESI PUSAT PERNAPASAN', 'D-002', NULL),
('PYB-015', 'HAMBATAN UPAYA NAPAS (MIS. NYERI SAAT BERNAPAS, KELEMAHAN OTOT PERNAPASAN)', 'D-002', NULL),
('PYB-016', 'DEFORMITAS DINDING DADA', 'D-002', NULL),
('PYB-017', 'DEFORMITAS TULANG DADA', 'D-002', NULL),
('PYB-018', 'GANGGUAN NEUROMUSKULAR', 'D-002', NULL),
('PYB-019', 'GANGGUAN NEUROLOGIS (MIS. ELEKTROENSEFALOGRAM [EEG] POSITIF, CEDERA KEPALA, GANGGUAN KEJANG)', 'D-002', NULL),
('PYB-020', 'IMATURITAS NEUROLOGIS', 'D-002', NULL),
('PYB-021', 'PENURUNAN ENERGI', 'D-002', NULL),
('PYB-022', 'OBESITAS', 'D-002', NULL),
('PYB-023', 'POSISI TUBUH YANG MENGHAMBAT EKSPANSI PARU', 'D-002', NULL),
('PYB-024', 'SINDROM HIPOVENTILASI', 'D-002', NULL),
('PYB-025', 'KERUSAKAN INERVASI DIAFRAGMA(KERUSAKAN SARAF C5 KE ATAS)', 'D-002', NULL),
('PYB-026', 'CEDERA PADA MEDULA SPINALIS', 'D-002', NULL),
('PYB-027', 'EFEK AGEN FARMAKOLOGIS', 'D-002', NULL),
('PYB-028', 'KECEMASAN', 'D-002', NULL),
('PYB-029', 'INFLAMASI GASTROINTESTINAL', 'D-003', 'PFIS-001'),
('PYB-030', 'IRITASI GASTROINTESTINAL', 'D-003', 'PFIS-001'),
('PYB-031', 'PROSES INFEKSI', 'D-003', 'PFIS-001'),
('PYB-032', 'MALABSORPSI', 'D-003', 'PFIS-001'),
('PYB-033', 'KECEMASAN', 'D-003', 'PPSIK-003'),
('PYB-034', 'TINGKAT STRES TINGGI', 'D-003', 'PPSIK-003'),
('PYB-035', 'TERPAPAR KONTAMINAN', 'D-003', 'PSIT-002'),
('PYB-036', 'TERPAPAR TOKSIN', 'D-003', 'PSIT-002'),
('PYB-037', 'PENYALAHGUNAAN LAKSATIF', 'D-003', 'PSIT-002'),
('PYB-038', 'PENYALAHGUNAAN ZAT', 'D-003', 'PSIT-002'),
('PYB-039', 'PROGRAM PENGOBATAN (AGEN TIROID, ANALGESIK, PELUNAK FESES, FEROSULFAT, ANTASIDA, CIMETIDINE DAN ANTIBIOTIK)', 'D-003', 'PSIT-002'),
('PYB-040', 'PERUBAHAN AIR DAN MAKANAN ', 'D-003', 'PSIT-002'),
('PYB-041', 'BAKTERI PADA AIR', 'D-003', 'PSIT-002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub`
--

CREATE TABLE `tb_sub` (
  `kd_sub_kat` varchar(15) NOT NULL,
  `ket_sub` varchar(300) DEFAULT NULL,
  `kd_kat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sub`
--

INSERT INTO `tb_sub` (`kd_sub_kat`, `ket_sub`, `kd_kat`) VALUES
('SKT-001', 'RESPIRASI', 'KT-001'),
('SKT-002', 'NUTRISI DAN CAIRAN', 'KT-001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`id_det`),
  ADD KEY `id_pas` (`id_pasien`,`kd_gejala`),
  ADD KEY `kd_ge` (`kd_gejala`),
  ADD KEY `kd_diagnosa` (`kd_diagnosa`),
  ADD KEY `kd_penyebab` (`kd_penyebab`);

--
-- Indeks untuk tabel `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`kd_diagnosa`),
  ADD KEY `kd_sub` (`kd_sub`);

--
-- Indeks untuk tabel `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`kd_gejala`),
  ADD KEY `kd_diagnosa` (`kd_diagnosa`,`kd_jen_gejala`),
  ADD KEY `kd_jen_gej` (`kd_jen_gejala`);

--
-- Indeks untuk tabel `tb_jenis_gejala`
--
ALTER TABLE `tb_jenis_gejala`
  ADD PRIMARY KEY (`kd_jen_gejala`);

--
-- Indeks untuk tabel `tb_jenis_penyebab`
--
ALTER TABLE `tb_jenis_penyebab`
  ADD PRIMARY KEY (`kd_jen_penyebab`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kd_kat`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`no_dmk_pasien`);

--
-- Indeks untuk tabel `tb_penyebab`
--
ALTER TABLE `tb_penyebab`
  ADD PRIMARY KEY (`kd_penyebab`),
  ADD KEY `kd_diagnosa` (`kd_diagnosa`),
  ADD KEY `kd_jen_penyebab` (`kd_jen_penyebab`);

--
-- Indeks untuk tabel `tb_sub`
--
ALTER TABLE `tb_sub`
  ADD PRIMARY KEY (`kd_sub_kat`),
  ADD KEY `kd_kat` (`kd_kat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `id_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
