-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2021 pada 12.03
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris_rpla_03_akbarnamatangguhdipantara`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `newkodesupplier` () RETURNS VARCHAR(8) CHARSET utf8mb4 BEGIN
DECLARE kode_lama varchar(8) DEFAULT 'SPR001';
DECLARE ambil_angka varchar(3) DEFAULT '000';
DECLARE kode_baru varchar(8) DEFAULT 'SPR000';
SELECT MAX(id_supplier) INTO kode_lama FROM supplier;
SET ambil_angka = SUBSTR(kode_lama, 4, 3);
SET ambil_angka = LPAD(ambil_angka + 1, 3, 0);
SET kode_baru = CONCAT('SPR', ambil_angka);
RETURN kode_baru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(8) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `spesifikasi` text NOT NULL,
  `lokasi` char(4) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `sumber_dana` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `spesifikasi`, `lokasi`, `kondisi`, `jumlah_barang`, `sumber_dana`) VALUES
('BRG10001', 'Kursi Siswa', 'Bantalan Merah Alluminium', 'R001', 'Baik', 0, 'S001'),
('BRG10002', 'Kursi Lipat Siswa', 'Kursi Lipat merk Informa Bantalan Hitam', 'R002', 'Baik', 0, 'S001'),
('BRG20001', 'Laptop Acer Aspire E1-471', 'Acer Aspire E1-471 Core i3 RAM 4GB, HDD 500GB', 'R002', 'Baik', 0, 'S002'),
('BRG20002', 'Laptop Lenovo E550', 'Laptop Lenovo E550 Intel Core i7, RAM 8GB HDD 1TB', 'R002', 'Baik', 0, 'S003'),
('BRG20003', 'PC Rakitan i7', 'Intel Core i7 RAM 16 GB SSD 512GB', 'R001', 'Baik', 0, 'S004'),
('BRG20004', 'Camera DSLR D60', 'DSLR Canon D60', 'R005', 'Baik', 0, 'S003'),
('BRG30001', 'Lightning set', 'Stand light tronik 2 lightning tronik 2 100watt', 'R005', 'Baik', 0, 'S005'),
('BRG30002', 'Tripod Kamera', 'Takara Tripod', 'R005', 'Baik', 0, 'S002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang` char(8) NOT NULL,
  `tgl_barang` date NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `supplier` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang`, `tgl_barang`, `jml_keluar`, `supplier`) VALUES
('BRG20001', '2017-11-06', 3, 'SPR005'),
('BRG10001', '2020-11-03', 16, 'SPR001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang` char(8) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `supplier` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang`, `tgl_masuk`, `jml_masuk`, `supplier`) VALUES
('BRG10001', '2007-08-03', 36, 'SPR001'),
('BRG10002', '2017-08-01', 36, 'SPR002'),
('BRG20001', '2013-07-09', 30, 'SPR004'),
('BRG20002', '2014-03-08', 23, 'SPR003'),
('BRG20003', '2020-11-10', 12, 'SPR004'),
('BRG20004', '2014-04-13', 16, 'SPR005'),
('BRG30001', '2018-04-06', 2, 'SPR005'),
('BRG30002', '2018-04-06', 4, 'SPR005'),
('BRG00008', '2021-11-06', 10, 'JayaToko'),
('BRG00008', '2021-11-06', 11, 'JayaWaru'),
('BRG00029', '2021-11-06', 100, 'MaduraJa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `id_level` char(3) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama`, `keterangan`) VALUES
('U01', 'Administrator', ''),
('U02', 'Manajemen', ''),
('U03', 'Peminjam', ''),
('U04', 'Tangguh', 'Mantap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` char(4) NOT NULL,
  `nama_lokasi` varchar(225) NOT NULL,
  `penanggung_jawab` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `penanggung_jawab`, `keterangan`) VALUES
('R001', 'Lab RPL 1', 'Satria Ade Putra', 'Lantai 3'),
('R002', 'Lab RPL 2', 'Satria Ade Putra', 'Lantai 3'),
('R003', 'Lab TKJ 1', 'Supriyadi', 'Lantai 2 Gedung D'),
('R004', 'Lab TKJ 2', 'Supriyadi', 'Lantai 2 Gedung D'),
('R005', 'Lab Multimedia', 'Bayu Setiawan', 'Gedung Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id_pinjam` int(11) NOT NULL,
  `peminjam` char(8) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `barang_pinjam` char(8) NOT NULL,
  `jml_pinjam` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kondisi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id_pinjam`, `peminjam`, `tgl_pinjam`, `barang_pinjam`, `jml_pinjam`, `tgl_kembali`, `kondisi`) VALUES
(1, 'USR20001', '2021-06-09', 'BRG20002', 1, '2021-06-23', 'Baik'),
(2, 'USR00002', '2021-06-09', 'BRG20002', 1, '2021-06-09', 'Baik'),
(3, 'USR20004', '2021-08-05', 'BRG20004', 3, '2021-08-21', 'Baik'),
(4, 'USR20004', '2021-08-05', 'BRG30002', 3, '2021-08-05', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_barang` char(8) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `total_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_barang`, `jml_masuk`, `jml_keluar`, `total_barang`) VALUES
('BRG10001', 100, 0, 100),
('BRG10002', 100, 16, 84),
('BRG20001', 100, 3, 97),
('BRG20002', 100, 0, 100),
('BRG20003', 100, 0, 100),
('BRG20004', 100, 0, 100),
('BRG30001', 100, 0, 100),
('BRG30002', 100, 0, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `id_sumber` char(4) NOT NULL,
  `nama_sumber` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sumber_dana`
--

INSERT INTO `sumber_dana` (`id_sumber`, `nama_sumber`, `keterangan`) VALUES
('S001', 'Komite 07/09', 'Bantuan Komite 2007/2009'),
('S002', 'Komite 13', 'Bantuan Komite 2013'),
('S003', 'Sed t-vet', 'Bantuan Kerja sama Indonesia Jerman'),
('S004', 'BOPD 2020', 'Bantuan Provinsi Jawa Barat 2020'),
('S005', 'BOSDA 2018', 'Bantuan Operasional Sekolah Daerah Jawa Barat 2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(8) NOT NULL,
  `nama_supplier` varchar(225) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telp_supplier` varchar(14) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `foto`) VALUES
('SPR001', 'INFORMA', 'Mal Metropolitan, Jl. KH. Noer Ali No.1,', '0812-9604-6051', 'informa.jpg'),
('SPR002', 'Mitrakantor.com', 'Jl. I Gusti Ngurah Rai No.20,', '(021) 22862086', 'mitrakantor.jpg'),
('SPR003', 'bhinneka.com', 'Jl. Gn. Sahari No.73C, RT.9/RW.7,', '(021) 29292828', 'bhinneka.jpg'),
('SPR004', 'World Computer', 'Harco Mangga Dua Plaza B3/1', '(021) 6125266', 'worldcomputer.jpg'),
('SPR005', 'Anekafoto Metro Atom', 'Metro Atom Plaza Jalan Samanhudi Blok AKS No. 19', '(021) 3455544', 'anekafoto.jpg'),
('SPR006', 'Tangguh', 'Rumah', '087771121232', 'Screenshot (5).png'),
('SPR007', 'asdf', 'asdf', '234234', 'Screenshot (9).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(8) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
('USR00001', 'Nana Sukmana', 'admin', 'nanasumakna', 'U01'),
('USR00002', 'Deden Deendi', 'toolman=RPL', 'dedendeendi', 'U02'),
('USR00003', 'Ilham Kamil', 'toolman=MM', 'ilhamkamil', 'U02'),
('USR00004', 'Abdul Rahman', 'toolman=TKJ', 'abdulrahman', 'U02'),
('USR20001', 'Dzaki', 'dzaki', 'dzaki', 'U03'),
('USR20002', 'Sulthan', 'Sultan', 'sulthan', 'U03'),
('USR20003', 'Fahru', 'fahru', 'fahru', 'U03'),
('USR20004', 'Akwan', 'akwan', 'akwan', 'U03'),
('kodebaru', 'Ipsum enim perferend', 'jecyfeq', '$2y$10$CHOXfP0keq69LrpAwu/D7OHKaycP1e1.KP9pEOErnUN6.aVMX27Ly', 'U03'),
('USR20005', 'Tangguh', 'tangguh', '$2y$10$1NVUGW9KaW4p91Fw9LTfCeYvC303WkFfRij3tN8Ew6I457Pf4JE6e', 'U03'),
('USR20006', 'Abram', 'abram', '$2y$10$R6ktvlvosCNLhzhjMAfoju/Vk6vBB1Wts6320c8U8PrImrSHZbmde', 'U03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
