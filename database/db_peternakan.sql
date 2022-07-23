-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2022 pada 06.42
-- Versi server: 5.7.21-log
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peternakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nm_desa` varchar(65) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `id_kecamatan`, `nm_desa`, `deleted`) VALUES
(1, 1, 'Indralaya Indah', 0),
(2, 3, 'Kaliwulu', 0),
(3, 4, 'Wotgali', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hewan`
--

CREATE TABLE `hewan` (
  `id_hewan` int(11) NOT NULL,
  `nm_hewan` varchar(60) NOT NULL,
  `klasifikasi` varchar(60) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hewan`
--

INSERT INTO `hewan` (`id_hewan`, `nm_hewan`, `klasifikasi`, `deleted`) VALUES
(1, 'Sapi Perah', 'Sapi Perah', 0),
(2, 'Sapi Potong', 'Sapi Potong', 0),
(3, 'Kerbau', '', 0),
(4, 'Kambing', '', 0),
(5, 'Domba', '', 0),
(6, 'Kuda', '', 0),
(7, 'Babi', '', 0),
(8, 'Ayam Buras', 'Ayam Buras', 0),
(9, 'Ayam Pedaging', 'Ayam Pedaging', 0),
(10, 'Ayam Petelur', 'Ayam Petelur', 0),
(11, 'Itik', '', 0),
(12, 'ok  wkwk', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nm_kecamatan` varchar(65) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nm_kecamatan`, `deleted`) VALUES
(1, 'Indralaya', 0),
(2, 'Indralaya Utara', 0),
(3, 'Tanjung Batu', 1),
(4, 'Plered', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nm_pegawai` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `nip`, `nm_pegawai`, `jabatan`, `bidang`, `deleted`, `id_desa`) VALUES
(2, '62c3cc0de76dd', '2022002', 'Bayu Pratama', 'IT Support', 'Programmer Java', 1, 2),
(3, '62c3cea438ad9', '2022001', 'Rizky', 'Akuntasi', 'Keuangan', 0, 1),
(4, '62c4652c36640', '2022002', 'Kristianto', 'Programmer', 'IT', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_ternak`
--

CREATE TABLE `pemilik_ternak` (
  `id_pemilik` int(11) NOT NULL,
  `nm_pemilik` varchar(60) NOT NULL,
  `umur` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik_ternak`
--

INSERT INTO `pemilik_ternak` (`id_pemilik`, `nm_pemilik`, `umur`, `nik`, `hp`, `alamat`, `pekerjaan`, `deleted`, `id_desa`) VALUES
(1, 'Kristianto, S.Kom', 22, '08923740328', '08937483798', 'Jl. Jend. Sudirman Kav. 44-46, Jakarta 10210', 'GO Dev', 0, 1),
(2, 'Ikhlasul Amal, S.Kom', 22, '93857934', '234980349', 'Plaza Mandiri, Jl. Gatot Subroto, Jakarta 12190', 'Java Dev', 0, 2),
(4, 'Firky Firdaus Sammar', 23, '092374830', '0809324893', 'Jl. Kinatagama Palembang', 'Game Dev', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `populasi`
--

CREATE TABLE `populasi` (
  `id_populasi` varchar(50) NOT NULL,
  `nm_populasi` varchar(100) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `file` varchar(60) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `is_final` int(11) NOT NULL,
  `admin_acc` int(11) NOT NULL,
  `kep_bidang_acc` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `status_kepemilikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `populasi`
--

INSERT INTO `populasi` (`id_populasi`, `nm_populasi`, `id_desa`, `file`, `bulan`, `tahun`, `is_final`, `admin_acc`, `kep_bidang_acc`, `id_pemilik`, `status_kepemilikan`) VALUES
('62c453513dd1b', 'Populasi Desa Indralaya Indah Januari 2022', 1, '62c453513dd1b.pdf', 'Januari', '2022', 0, 1, 1, 0, ''),
('62c45ab52fc4c', 'Populasi Desa Indralaya Indah Februari2022', 1, 'default.png', 'Juli', '2004', 0, 1, 1, 0, ''),
('62c46593d1bfe', 'Populasi Desa Kaliwulu Januari 2022', 2, 'default.png', 'Januari', '2003', 0, 1, 1, 0, ''),
('62c4d76d647a8', 'Populasi data Ternak Indralaya Indah 2022', 1, 'default.png', 'Januari', '2020', 0, 1, 2, 0, ''),
('62c4e2529274d', 'Agung', 2, 'default.png', 'Februari', '2002', 0, 1, 1, 0, ''),
('62c66fa3338f3', 'Populasi hewan milik Kris', 1, 'default.png', 'Juli', '2022', 0, 1, 1, 1, 'Pribadi'),
('62c67c560e2be', 'Populasi Hewan Gaduan Test', 2, 'default.png', 'Juli', '2022', 0, 1, 1, 2, 'Gaduan'),
('62cbe641e8892', 'Populasi Desa Indralaya Indah Januari 2022', 2, 'default.png', 'Juli', '2022', 0, 0, 0, 2, 'Gaduan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `populasi_detail`
--

CREATE TABLE `populasi_detail` (
  `id_detail` int(11) NOT NULL,
  `id_populasi` varchar(60) NOT NULL,
  `umur_hewan` varchar(40) NOT NULL,
  `jk_hewan` varchar(20) NOT NULL,
  `hewan_1` int(11) NOT NULL,
  `hewan_2` int(11) NOT NULL,
  `hewan_3` int(11) NOT NULL,
  `hewan_4` int(11) NOT NULL,
  `hewan_5` int(11) NOT NULL,
  `hewan_6` int(11) NOT NULL,
  `hewan_7` int(11) NOT NULL,
  `hewan_8` int(11) NOT NULL,
  `hewan_9` int(11) NOT NULL,
  `hewan_10` int(11) NOT NULL,
  `hewan_11` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `populasi_detail`
--

INSERT INTO `populasi_detail` (`id_detail`, `id_populasi`, `umur_hewan`, `jk_hewan`, `hewan_1`, `hewan_2`, `hewan_3`, `hewan_4`, `hewan_5`, `hewan_6`, `hewan_7`, `hewan_8`, `hewan_9`, `hewan_10`, `hewan_11`) VALUES
(7, '62c453513dd1b', 'Anak 0-1 Tahun', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '62c453513dd1b', 'Dara 1-2 Tahun', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, '62c453513dd1b', 'Dewasa > 2 Tahun', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '62c45ab52fc4c', 'Anak 0-1 Tahun', '', 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0),
(11, '62c45ab52fc4c', 'Dara 1-2 Tahun', '', 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(12, '62c45ab52fc4c', 'Dewasa > 2 Tahun', '', 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1),
(13, '62c46593d1bfe', 'Anak 0-1 Tahun', '', 1, 4, 3, 4, 3, 7, 1, 10, 0, 100, 0),
(14, '62c46593d1bfe', 'Dara 1-2 Tahun', '', 2, 1, 2, 2, 16, 1, 12, 6, 10, 10, 0),
(15, '62c46593d1bfe', 'Dewasa > 2 Tahun', '', 3, 1, 2, 2, 16, 2, 2, 23, 0, 0, 200),
(16, '62c4d76d647a8', 'Anak 0-1 Tahun', '', 1, 2, 4, 0, 11, 0, 0, 0, 0, 16, 0),
(17, '62c4d76d647a8', 'Dara 1-2 Tahun', '', 2, 0, 0, 10, 0, 12, 0, 14, 0, 0, 0),
(18, '62c4d76d647a8', 'Dewasa > 2 Tahun', '', 3, 0, 0, 0, 0, 0, 13, 0, 15, 0, 187),
(19, '62c4e2529274d', 'Anak 0-1 Tahun', '', 1, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(20, '62c4e2529274d', 'Dara 1-2 Tahun', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, '62c4e2529274d', 'Dewasa > 2 Tahun', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, '62c66fa3338f3', 'Anak 0-1 Tahun', 'Jantan', 1, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0),
(23, '62c66fa3338f3', 'Anak 0-1 Tahun', 'Betina', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(24, '62c66fa3338f3', 'Dara 1-2 Tahun', 'Jantan', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
(25, '62c66fa3338f3', 'Dara 1-2 Tahun', 'Betina', 0, 0, 0, 0, 0, 2, 0, 0, 0, 2, 0),
(26, '62c66fa3338f3', 'Dewasa > 2 Tahun', 'Jantan', 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0),
(27, '62c66fa3338f3', 'Dewasa > 2 Tahun', 'Betina', 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0),
(28, '62c67c560e2be', 'Anak 0-1 Tahun', 'Jantan', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3),
(29, '62c67c560e2be', 'Anak 0-1 Tahun', 'Betina', 0, 3, 0, 0, 0, 0, 0, 0, 0, 3, 0),
(30, '62c67c560e2be', 'Dara 1-2 Tahun', 'Jantan', 0, 0, 3, 0, 0, 0, 0, 0, 3, 0, 0),
(31, '62c67c560e2be', 'Dara 1-2 Tahun', 'Betina', 0, 0, 0, 5, 0, 0, 0, 3, 0, 0, 0),
(32, '62c67c560e2be', 'Dewasa > 2 Tahun', 'Jantan', 0, 0, 0, 0, 4, 0, 3, 0, 0, 0, 0),
(33, '62c67c560e2be', 'Dewasa > 2 Tahun', 'Betina', 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0),
(34, '62cbe641e8892', 'Anak 0-1 Tahun', 'Jantan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, '62cbe641e8892', 'Anak 0-1 Tahun', 'Betina', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, '62cbe641e8892', 'Dara 1-2 Tahun', 'Jantan', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(37, '62cbe641e8892', 'Dara 1-2 Tahun', 'Betina', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, '62cbe641e8892', 'Dewasa > 2 Tahun', 'Jantan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, '62cbe641e8892', 'Dewasa > 2 Tahun', 'Betina', 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `id_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_user`, `level`, `foto`, `id_desa`) VALUES
('62b8556487642', 'manda', '$2y$10$Yu1ziUFIrjktqeBPpLtfiO5mWh9XXdhdwHIpYT8ThaGTXl13NJa1q', 'Manda Alamanda', 'Administrator', '1.jpg', 0),
('62c3a2a66ee68', 'kepala_dinas', '$2y$10$ZiZ51NocTX3mRk/ZUWW/puKNci4B8Zkq43JzJXpaUwd/CKWrkZjPG', 'Kristianto, M.Kom', 'Kepala Dinas', '1.jpg', 0),
('62c3a2c3986eb', 'kepala_bidang', '$2y$10$zhXf8HZ6YBvF16cO44OgKOJhY5DzUZpA3AD23IN8wj9An4W4ph.6S', 'dr. Ikhlasul Amal, M.Kom', 'Kepala Bidang', '1.jpg', 0),
('62c3cea438ad9', '2022001', '$2y$10$Fftsdk6koBSJxfoSTlTRDeFYLsiiOCikvIwcrof0aHJ7hRCUsBfc6', 'Rizky', 'Pegawai', '840018941.JPG', 1),
('62c4652c36640', '2022002', '$2y$10$hCzQLsEeazepp1C/82JsHOVpkawZCvg.eyQ/os5eiXBIYNCtIEcpq', 'Kristianto', 'Pegawai', '1.jpg', 2),
('62c527a3ae39b', 'cickesambi', '$2y$10$yTIXKivTu9A1ypzlJ9B8UOOrtEcSFjReO0IFW1ZKPMLaSVtW16Zsq', 'manda', 'Kepala Dinas', '1.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vaksin`
--

CREATE TABLE `vaksin` (
  `id_vaksin` int(11) NOT NULL,
  `id_hewan` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `jenis_vaksin` varchar(50) NOT NULL,
  `dokter` varchar(60) NOT NULL,
  `tgl_vaksin` date NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vaksin`
--

INSERT INTO `vaksin` (`id_vaksin`, `id_hewan`, `id_pemilik`, `jenis_vaksin`, `dokter`, `tgl_vaksin`, `keterangan`, `deleted`) VALUES
(1, 1, 1, 'Vaksin Sapi', 'Dr. Rizky Firdaus', '2022-07-05', 'Sukses dong vaksinnya', 0),
(2, 5, 2, 'Vaksin Domba', 'Dr. Ikhlasul', '2022-07-05', 'mantap gan', 0),
(3, 2, 1, 'Vaksin Sehat Sapi', 'Dr. Amal', '2022-07-05', 'enak nih sate', 0),
(4, 5, 2, 'ss', 'ss', '2022-07-05', 'ss', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `hewan`
--
ALTER TABLE `hewan`
  ADD PRIMARY KEY (`id_hewan`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pemilik_ternak`
--
ALTER TABLE `pemilik_ternak`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indeks untuk tabel `populasi`
--
ALTER TABLE `populasi`
  ADD PRIMARY KEY (`id_populasi`);

--
-- Indeks untuk tabel `populasi_detail`
--
ALTER TABLE `populasi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hewan`
--
ALTER TABLE `hewan`
  MODIFY `id_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemilik_ternak`
--
ALTER TABLE `pemilik_ternak`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `populasi_detail`
--
ALTER TABLE `populasi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `id_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
