-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2022 pada 17.48
-- Versi server: 10.1.38-MariaDB
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
-- Database: `geprekf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahanbaku`
--

CREATE TABLE `bahanbaku` (
  `kode_bahan_baku` varchar(10) NOT NULL,
  `nama_bahan_baku` varchar(255) NOT NULL,
  `harga_bahan_baku` int(11) NOT NULL,
  `jumlah_bahan_baku` float NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `lead_time` int(11) NOT NULL,
  `lotsize` int(11) DEFAULT NULL,
  `rop` int(11) DEFAULT NULL,
  `safety_stock` int(11) DEFAULT NULL,
  `kode_supplier` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahanbaku`
--

INSERT INTO `bahanbaku` (`kode_bahan_baku`, `nama_bahan_baku`, `harga_bahan_baku`, `jumlah_bahan_baku`, `satuan`, `lead_time`, `lotsize`, `rop`, `safety_stock`, `kode_supplier`) VALUES
('BAKU-001', 'Tepung', 220000, 120, 'Kg', 2, 50, 28, 7, 'SUP-002'),
('BAKU-002', 'Beras', 400000, 2.3, 'Kg', 2, 10, 3, 1, 'SUP-002'),
('BAKU-003', 'Garam', 6000, 6.9, 'Kg', 2, 12, 4, 1, 'SUP-002'),
('BAKU-004', 'Penyedap Rasa', 50000, 5.7, 'Kg', 2, 20, 3, 2, 'SUP-002'),
('BAKU-005', 'Bumbu Jadi', 35000, 9.5, 'Kg', 2, 20, 5, 2, 'SUP-002'),
('BAKU-006', 'Tomat', 20000, 6.3, 'Kg', 2, 10, 6, 1, 'SUP-002'),
('BAKU-007', 'Selada', 20000, 6.1, 'Kg', 2, 10, 4, 1, 'SUP-002'),
('BAKU-008', 'Cabai', 25000, 4.8, 'Kg', 2, 20, 6, 1, 'SUP-002'),
('BAKU-009', 'Ayam', 25000, 9.9, 'Kg', 2, 25, 49, 1, 'SUP-001'),
('BAKU-010', 'Telur', 1600, 10, 'Kg', 1, 3, 5, 2, 'SUP-003'),
('BAKU-011', 'Kubis', 16000, 8.1, 'Kg', 3, 10, 5, 1, 'SUP-002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bom`
--

CREATE TABLE `bom` (
  `no` int(11) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `kode_bahan_baku` varchar(10) NOT NULL,
  `jumlah_penggunaan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bom`
--

INSERT INTO `bom` (`no`, `kode_produk`, `kode_bahan_baku`, `jumlah_penggunaan`) VALUES
(16, 'PRODUK-001', 'BAKU-001', 5),
(17, 'PRODUK-001', 'BAKU-002', 0.1),
(18, 'PRODUK-001', 'BAKU-003', 0.1),
(19, 'PRODUK-001', 'BAKU-004', 0.2),
(20, 'PRODUK-001', 'BAKU-005', 0.5),
(22, 'PRODUK-001', 'BAKU-008', 1),
(23, 'PRODUK-001', 'BAKU-009', 12.5),
(25, 'PRODUK-001', 'BAKU-010', 1),
(54, 'PRODUK-002', 'BAKU-003', 0.1),
(55, 'PRODUK-002', 'BAKU-004', 0.1),
(56, 'PRODUK-002', 'BAKU-005', 0.5),
(64, 'PRODUK-002', 'BAKU-008', 1),
(65, 'PRODUK-002', 'BAKU-009', 8.75),
(67, 'PRODUK-002', 'BAKU-006', 1),
(70, 'PRODUK-002', 'BAKU-010', 1),
(78, 'PRODUK-001', 'BAKU-006', 1),
(79, 'PRODUK-001', 'BAKU-007', 1),
(80, 'PRODUK-001', 'BAKU-011', 1),
(81, 'PRODUK-002', 'BAKU-001', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `kode_keranjang` int(10) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `kode_bahan_baku` varchar(255) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `hari_sampai` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`kode_keranjang`, `kode_supplier`, `kode_bahan_baku`, `jumlah`, `hari_sampai`) VALUES
(1, 'SUP-001', 'BAKU-009', '25', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_bom`
--

CREATE TABLE `keranjang_bom` (
  `no` int(11) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `kode_bahan_baku` varchar(10) NOT NULL,
  `jumlah_penggunaan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang_bom`
--

INSERT INTO `keranjang_bom` (`no`, `kode_produk`, `kode_bahan_baku`, `jumlah_penggunaan`) VALUES
(1, 'PRODUK-001', 'BAKU-011', 2.1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_penjualan`
--

CREATE TABLE `keranjang_penjualan` (
  `kode_keranjang1` int(10) NOT NULL,
  `kode_penjualan` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `jumlah_penjualan` varchar(10) NOT NULL,
  `date` date DEFAULT NULL,
  `total_penjualan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` varchar(50) NOT NULL,
  `kode_faktur` varchar(50) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `kode_bahan_baku` varchar(10) NOT NULL,
  `pb_date` varchar(10) NOT NULL,
  `pb_date_tiba` varchar(25) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` int(11) NOT NULL,
  `pb_jumlah` varchar(10) NOT NULL,
  `pb_status` varchar(10) NOT NULL,
  `pb_porel` int(11) NOT NULL,
  `pb_laporan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `kode_faktur`, `kode_supplier`, `kode_bahan_baku`, `pb_date`, `pb_date_tiba`, `bulan`, `tahun`, `pb_jumlah`, `pb_status`, `pb_porel`, `pb_laporan`) VALUES
('PB-00001', 'FAKTUR-0620-01', 'SUP-003', 'BAKU-010', '03-01-2022', '04-01-2022', '01', 2022, '300', 'berhasil', 0, '2022-01-03'),
('PB-00002', 'FAKTUR-0620-02', 'SUP-001', 'BAKU-006', '06-01-2022', '08-01-2022', '01', 2022, '10', 'berhasil', 1, '2022-01-06'),
('PB-00003', 'FAKTUR-0620-02', 'SUP-001', 'BAKU-008', '06-01-2022', '08-01-2022', '01', 2022, '20', 'berhasil', 1, '2022-01-06'),
('PB-00004', 'FAKTUR-0620-02', 'SUP-001', 'BAKU-007', '06-01-2022', '08-01-2022', '01', 2022, '12', 'berhasil', 0, '2022-01-06'),
('PB-00005', 'FAKTUR-0620-03', 'SUP-002', 'BAKU-001', '06-01-2022', '08-01-2022', '01', 2022, '50', 'berhasil', 1, '2022-01-06'),
('PB-00006', 'FAKTUR-0620-04', 'SUP-003', 'BAKU-010', '06-01-2022', '07-01-2022', '01', 2022, '300', 'berhasil', 1, '2022-01-06'),
('PB-00007', 'FAKTUR-0620-05', 'SUP-003', 'BAKU-010', '01-01-2022', '08-01-2022', '01', 2022, '900', 'berhasil', 0, '2022-01-01'),
('PB-00008', 'FAKTUR-0620-06', 'SUP-002', 'BAKU-001', '01-01-2022', '11-01-2022', '01', 2022, '8', 'berhasil', 0, '2022-01-01'),
('PB-00009', 'FAKTUR-0620-07', 'SUP-002', 'BAKU-001', '01-01-2022', '09-01-2022', '01', 2022, '10', 'berhasil', 0, '2022-01-01'),
('PB-00010', 'FAKTUR-0820-08', 'SUP-002', 'BAKU-001', '24-01-2022', '26-01-2022', '01', 2022, '50', 'berhasil', 1, '2022-01-24'),
('PB-00011', 'FAKTUR-0920-09', 'SUP-002', 'BAKU-001', '06-02-2022', '06-02-2022', '02', 2022, '50', 'berhasil', 1, '2022-02-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `jumlah_penjualan` int(11) NOT NULL,
  `total_penjualan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `nama_produk`, `date`, `bulan`, `tahun`, `nama_user`, `nama_toko`, `jumlah_penjualan`, `total_penjualan`) VALUES
('PJL-00001', 'Ayam Geprek', '2020-01-31', '01', 2020, 'Renald', 'AGF1', 3794, 49322000),
('PJL-00002', 'Ayam Geprek Jumbo', '2020-01-31', '01', 2020, 'Renald', 'AGF1', 2100, 31500000),
('PJL-00003', 'Ayam Geprek', '2020-02-28', '02', 2020, 'Renald', 'AGF1', 3890, 50570000),
('PJL-00004', 'Ayam Geprek Jumbo', '2020-02-28', '02', 2020, 'Renald', 'AGF1', 1950, 29250000),
('PJL-00005', 'Ayam Geprek', '2020-03-31', '03', 2020, 'Renald', 'AGF1', 3872, 50336000),
('PJL-00006', 'Ayam Geprek Jumbo', '2020-03-31', '03', 2020, 'Renald', 'AGF1', 2250, 33750000),
('PJL-00007', 'Ayam Geprek', '2020-04-30', '04', 2020, 'Renald', 'AGF1', 3505, 45565000),
('PJL-00008', 'Ayam Geprek Jumbo', '2020-04-30', '04', 2020, 'Renald', 'AGF1', 2300, 34500000),
('PJL-00009', 'Ayam Geprek', '2020-05-31', '05', 2020, 'Renald', 'AGF1', 3612, 46956000),
('PJL-00010', 'Ayam Geprek Jumbo', '2020-05-31', '05', 2020, 'Renald', 'AGF1', 1800, 27000000),
('PJL-00011', 'Ayam Geprek', '2020-06-30', '06', 2020, 'Renald', 'AGF1', 3880, 50440000),
('PJL-00012', 'Ayam Geprek Jumbo', '2020-06-30', '06', 2020, 'Renald', 'AGF1', 1450, 21750000),
('PJL-00013', 'Ayam Geprek', '2020-07-31', '07', 2020, 'Renald', 'AGF1', 3734, 48542000),
('PJL-00014', 'Ayam Geprek Jumbo', '2020-07-31', '07', 2020, 'Renald', 'AGF1', 2008, 30120000),
('PJL-00015', 'Ayam Geprek', '2020-08-31', '08', 2020, 'Renald', 'AGF1', 3795, 49335000),
('PJL-00016', 'Ayam Geprek Jumbo', '2020-08-31', '08', 2020, 'Renald', 'AGF1', 1960, 29400000),
('PJL-00017', 'Ayam Geprek', '2020-09-30', '09', 2020, 'Renald', 'AGF1', 3820, 49660000),
('PJL-00018', 'Ayam Geprek Jumbo', '2020-09-30', '09', 2020, 'Renald', 'AGF1', 2000, 30000000),
('PJL-00019', 'Ayam Geprek', '2020-10-31', '10', 2020, 'Renald', 'AGF1', 3644, 47372000),
('PJL-00020', 'Ayam Geprek Jumbo', '2020-10-31', '10', 2020, 'Renald', 'AGF1', 2080, 31200000),
('PJL-00021', 'Ayam Geprek', '2020-11-30', '11', 2020, 'Renald', 'AGF1', 3782, 49166000),
('PJL-00022', 'Ayam Geprek Jumbo', '2020-11-30', '11', 2020, 'Renald', 'AGF1', 1970, 29550000),
('PJL-00023', 'Ayam Geprek', '2020-12-31', '12', 2020, 'Renald', 'AGF1', 3812, 49556000),
('PJL-00024', 'Ayam Geprek Jumbo', '2020-12-31', '12', 2020, 'Renald', 'AGF1', 2120, 31800000),
('PJL-00025', 'Ayam Geprek', '2021-01-01', '01', 2021, 'Renald', 'AGF1', 3604, 46852000),
('PJL-00026', 'Ayam Geprek Jumbo', '2021-01-01', '01', 2021, 'Renald', 'AGF1', 1938, 29070000),
('PJL-00027', 'Ayam Geprek', '2021-02-01', '02', 2021, 'Renald', 'AGF1', 3692, 47996000),
('PJL-00028', 'Ayam Geprek Jumbo', '2021-02-01', '02', 2021, 'Renald', 'AGF1', 2005, 30075000),
('PJL-00029', 'Ayam Geprek', '2021-03-08', '03', 2021, 'Renald', 'AGF1', 3820, 49660000),
('PJL-00030', 'Ayam Geprek Jumbo', '2021-03-08', '03', 2021, 'Renald', 'AGF1', 1995, 29925000),
('PJL-00031', 'Ayam Geprek', '2021-04-08', '04', 2021, 'Renald', 'AGF1', 3765, 48945000),
('PJL-00032', 'Ayam Geprek Jumbo', '2021-04-08', '04', 2021, 'Renald', 'AGF1', 2138, 32070000),
('PJL-00033', 'Ayam Geprek', '2021-05-15', '05', 2021, 'Renald', 'AGF1', 3662, 47606000),
('PJL-00034', 'Ayam Geprek Jumbo', '2021-05-15', '05', 2021, 'Renald', 'AGF1', 1980, 29700000),
('PJL-00035', 'Ayam Geprek', '2021-06-15', '06', 2021, 'Renald', 'AGF1', 3680, 47840000),
('PJL-00036', 'Ayam Geprek Jumbo', '2021-06-15', '06', 2021, 'Renald', 'AGF1', 1865, 27975000),
('PJL-00037', 'Ayam Geprek', '2021-07-09', '07', 2021, 'Renald', 'AGF1', 3794, 49322000),
('PJL-00038', 'Ayam Geprek Jumbo', '2021-07-09', '07', 2021, 'Renald', 'AGF1', 1941, 29115000),
('PJL-00039', 'Ayam Geprek', '2021-08-09', '08', 2021, 'Renald', 'AGF1', 3765, 48945000),
('PJL-00040', 'Ayam Geprek Jumbo', '2021-08-09', '08', 2021, 'Renald', 'AGF1', 1977, 29655000),
('PJL-00041', 'Ayam Geprek', '2021-09-02', '09', 2021, 'Renald', 'AGF1', 3620, 47060000),
('PJL-00042', 'Ayam Geprek Jumbo', '2021-09-02', '09', 2021, 'Renald', 'AGF1', 1880, 28200000),
('PJL-00043', 'Ayam Geprek', '2021-10-02', '10', 2021, 'Renald', 'AGF1', 3744, 48672000),
('PJL-00044', 'Ayam Geprek Jumbo', '2021-10-02', '10', 2021, 'Renald', 'AGF1', 1994, 29910000),
('PJL-00045', 'Ayam Geprek', '2021-11-09', '11', 2021, 'Renald', 'AGF1', 3682, 47866000),
('PJL-00046', 'Ayam Geprek Jumbo', '2021-11-09', '11', 2021, 'Renald', 'AGF1', 1983, 29745000),
('PJL-00047', 'Ayam Geprek', '2021-12-09', '12', 2021, 'Renald', 'AGF1', 3843, 49959000),
('PJL-00048', 'Ayam Geprek Jumbo', '2021-12-09', '12', 2021, 'Renald', 'AGF1', 2039, 30585000),
('PJL-00049', 'Ayam Geprek ', '2022-01-31', '01', 2022, 'Renald', 'AGF1', 3638, 47294000),
('PJL-00050', 'Ayam Geprek Jumbo', '2022-01-31', '01', 2022, 'Renald', 'AGF1', 2080, 31200000),
('PJL-00051', 'Ayam Geprek ', '2022-02-28', '02', 2022, 'Renald', 'AGF1', 3737, 48581000),
('PJL-00052', 'Ayam Geprek Jumbo', '2022-02-28', '02', 2022, 'Renald', 'AGF1', 2137, 32055000),
('PJL-00053', 'Ayam Geprek', '2022-03-17', '03', 2022, 'Renald', 'AGF1', 2080, 27040000),
('PJL-00054', 'Ayam Geprek', '2022-03-17', '03', 2022, 'Renald', 'AGF1', 1885, 24505000),
('PJL-00055', 'Ayam Geprek', '2022-04-08', '04', 2022, 'Annisa', 'AGF1', 127, 1905000),
('PJL-00056', 'Ayam Geprek Saja', '2022-04-08', '04', 2022, 'Annisa', 'AGF1', 63, 756000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan_penjualan`
--

CREATE TABLE `peramalan_penjualan` (
  `ID` varchar(255) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `bulan_angka` varchar(12) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `jumlah` double NOT NULL,
  `smoothing` double NOT NULL,
  `peramalan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peramalan_penjualan`
--

INSERT INTO `peramalan_penjualan` (`ID`, `kode_produk`, `bulan`, `bulan_angka`, `tahun`, `jumlah`, `smoothing`, `peramalan`) VALUES
('2019PRODUK-001-01', 'PRODUK-001', 'Januari', '01', '2021', 3794, 3765.8, 3759),
('2019PRODUK-001-02', 'PRODUK-001', 'Februari', '02', '2021', 3890, 3790.7, 3766),
('2019PRODUK-001-03', 'PRODUK-001', 'Maret', '03', '2021', 3872, 3806.9, 3791),
('2019PRODUK-001-04', 'PRODUK-001', 'April', '04', '2021', 3505, 3746.5, 3807),
('2019PRODUK-001-05', 'PRODUK-001', 'Mei', '05', '2021', 3612, 3719.6, 3747),
('2019PRODUK-001-06', 'PRODUK-001', 'Juni', '06', '2021', 3880, 3751.7, 3719),
('2019PRODUK-001-07', 'PRODUK-001', 'Juli', '07', '2021', 3734, 3748.2, 3752),
('2019PRODUK-001-08', 'PRODUK-001', 'Agustus', '08', '2021', 3795, 3757.5, 3748),
('2019PRODUK-001-09', 'PRODUK-001', 'September', '09', '2021', 3820, 3770, 3757),
('2019PRODUK-001-10', 'PRODUK-001', 'Oktober', '10', '2021', 3644, 3744.8, 3770),
('2019PRODUK-001-11', 'PRODUK-001', 'November	', '11', '2021', 3782, 3752.2, 3745),
('2019PRODUK-001-12', 'PRODUK-001', 'Desember', '12', '2021', 3812, 3764.2, 3752),
('2019PRODUK-002-01', 'PRODUK-002', 'Januari', '01', '2021', 2100, 1987.5, 1975),
('2019PRODUK-002-02', 'PRODUK-002', 'Februari', '02', '2021', 1950, 1983.7, 1988),
('2019PRODUK-002-03', 'PRODUK-002', 'Maret', '03', '2021', 2250, 2010.38, 1984),
('2019PRODUK-002-04', 'PRODUK-002', 'April', '04', '2021', 2300, 2039.34, 2011),
('2019PRODUK-002-05', 'PRODUK-002', 'Mei', '05', '2021', 1800, 2015.41, 2040),
('2019PRODUK-002-06', 'PRODUK-002', 'Juni', '06', '2021', 1450, 1958.87, 2016),
('2019PRODUK-002-07', 'PRODUK-002', 'Juli', '07', '2021', 2008, 1963.78, 1959),
('2019PRODUK-002-08', 'PRODUK-002', 'Agustus', '08', '2021', 1960, 1963.4, 1964),
('2019PRODUK-002-09', 'PRODUK-002', 'September', '09', '2021', 2000, 1967.06, 1964),
('2019PRODUK-002-10', 'PRODUK-002', 'Oktober', '10', '2021', 2080, 1978.35, 1968),
('2019PRODUK-002-11', 'PRODUK-002', 'November	', '11', '2021', 1970, 1977.52, 1979),
('2019PRODUK-002-12', 'PRODUK-002', 'Desember', '12', '2021', 2120, 1991.77, 1978),
('2020PRODUK-001-01', 'PRODUK-001', 'Januari', '01', '2022', 3604, 3698.87, 3723),
('2020PRODUK-001-02', 'PRODUK-001', 'Februari', '02', '2022', 3692, 3697.49, 3699),
('2020PRODUK-001-03', 'PRODUK-001', 'Maret', '03', '2022', 3820, 3721.99, 3697),
('2020PRODUK-001-04', 'PRODUK-001', 'April', '04', '2022', 3765, 3730.6, 3722),
('2020PRODUK-001-05', 'PRODUK-001', 'Mei', '05', '2022', 3662, 3716.88, 3731),
('2020PRODUK-001-06', 'PRODUK-001', 'Juni', '06', '2022', 3680, 3709.5, 3717),
('2020PRODUK-001-07', 'PRODUK-001', 'Juli', '07', '2022', 3794, 3726.4, 3709),
('2020PRODUK-001-08', 'PRODUK-001', 'Agustus', '08', '2022', 3765, 3734.12, 3736),
('2020PRODUK-001-09', 'PRODUK-001', 'September', '09', '2022', 3620, 3711.3, 3734),
('2020PRODUK-001-10', 'PRODUK-001', 'Oktober', '10', '2022', 3744, 3717.84, 3711),
('2020PRODUK-001-11', 'PRODUK-001', 'November	', '11', '2022', 3682, 3710.67, 3718),
('2020PRODUK-001-12', 'PRODUK-001', 'Desember', '12', '2022', 3843, 3737.14, 3711),
('2020PRODUK-002-01', 'PRODUK-002', 'Januari', '01', '2022', 1938, 1981.95, 1987),
('2020PRODUK-002-02', 'PRODUK-002', 'Februari', '02', '2022', 2005, 1984.26, 1982),
('2020PRODUK-002-03', 'PRODUK-002', 'Maret', '03', '2022', 1995, 1985.33, 1985),
('2020PRODUK-002-04', 'PRODUK-002', 'April', '04', '2022', 2138, 2000.6, 1986),
('2020PRODUK-002-05', 'PRODUK-002', 'Mei', '05', '2022', 1980, 1998.54, 2001),
('2020PRODUK-002-06', 'PRODUK-002', 'Juni', '06', '2022', 1865, 1985.19, 1999),
('2020PRODUK-002-07', 'PRODUK-002', 'Juli', '07', '2022', 1941, 1980.77, 1985),
('2020PRODUK-002-08', 'PRODUK-002', 'Agustus', '08', '2022', 1977, 1980.39, 1981),
('2020PRODUK-002-09', 'PRODUK-002', 'September', '09', '2022', 1880, 1970.35, 1980),
('2020PRODUK-002-10', 'PRODUK-002', 'Oktober', '10', '2022', 1994, 1972.72, 1971),
('2020PRODUK-002-11', 'PRODUK-002', 'November	', '11', '2022', 1983, 1973.75, 1973),
('2020PRODUK-002-12', 'PRODUK-002', 'Desember', '12', '2022', 2039, 1980.28, 1974);

-- --------------------------------------------------------

--
-- Struktur dari tabel `porel`
--

CREATE TABLE `porel` (
  `ID_mrp` varchar(20) NOT NULL,
  `kode_bahan_baku` varchar(10) NOT NULL,
  `rop` varchar(10) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `porel`
--

INSERT INTO `porel` (`ID_mrp`, `kode_bahan_baku`, `rop`, `tanggal`, `bulan`, `status`, `tgl`) VALUES
('BAKU-001-28', 'BAKU-001', '28', '28-04-2022', '04', '0', '28'),
('BAKU-005-25', 'BAKU-005', '5', '25-04-2022', '04', '0', '25'),
('BAKU-006-19', 'BAKU-006', '6', '19-04-2022', '04', '0', '19'),
('BAKU-006-24', 'BAKU-006', '6', '24-04-2022', '04', '0', '24'),
('BAKU-006-28', 'BAKU-006', '6', '28-04-2022', '04', '0', '28'),
('BAKU-007-21', 'BAKU-007', '4', '21-04-2022', '04', '0', '21'),
('BAKU-007-30', 'BAKU-007', '4', '30-04-2022', '04', '0', '30'),
('BAKU-008-19', 'BAKU-008', '6', '19-04-2022', '04', '0', '19'),
('BAKU-008-27', 'BAKU-008', '6', '27-04-2022', '04', '0', '27'),
('BAKU-009-18', 'BAKU-009', '49', '18-04-2022', '04', '0', '18'),
('BAKU-009-19', 'BAKU-009', '49', '19-04-2022', '04', '0', '19'),
('BAKU-009-20', 'BAKU-009', '49', '20-04-2022', '04', '0', '20'),
('BAKU-009-21', 'BAKU-009', '49', '21-04-2022', '04', '0', '21'),
('BAKU-009-22', 'BAKU-009', '49', '22-04-2022', '04', '0', '22'),
('BAKU-009-23', 'BAKU-009', '49', '23-04-2022', '04', '0', '23'),
('BAKU-009-24', 'BAKU-009', '49', '24-04-2022', '04', '0', '24'),
('BAKU-009-25', 'BAKU-009', '49', '25-04-2022', '04', '0', '25'),
('BAKU-009-26', 'BAKU-009', '49', '26-04-2022', '04', '0', '26'),
('BAKU-009-27', 'BAKU-009', '49', '27-04-2022', '04', '0', '27'),
('BAKU-009-28', 'BAKU-009', '49', '28-04-2022', '04', '0', '28'),
('BAKU-009-30', 'BAKU-009', '49', '30-04-2022', '04', '0', '30'),
('BAKU-010-22', 'BAKU-010', '5', '22-04-2022', '04', '0', '22'),
('BAKU-010-23', 'BAKU-010', '5', '23-04-2022', '04', '0', '23'),
('BAKU-010-24', 'BAKU-010', '5', '24-04-2022', '04', '0', '24'),
('BAKU-010-26', 'BAKU-010', '5', '26-04-2022', '04', '0', '26'),
('BAKU-010-27', 'BAKU-010', '5', '27-04-2022', '04', '0', '27'),
('BAKU-010-28', 'BAKU-010', '5', '28-04-2022', '04', '0', '28'),
('BAKU-010-30', 'BAKU-010', '5', '30-04-2022', '04', '0', '30'),
('BAKU-011-22', 'BAKU-011', '5', '22-04-2022', '04', '0', '22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pre_order`
--

CREATE TABLE `pre_order` (
  `kode` int(11) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `faktur` varchar(25) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `bln` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pre_order`
--

INSERT INTO `pre_order` (`kode`, `kode_produk`, `faktur`, `tgl`, `bln`, `jumlah`) VALUES
(8, 'PRODUK-001', '2022-03-09-PRODUK-001', '09', '03', 640),
(9, 'PRODUK-001', '2022-03-08-PRODUK-001', '08', '03', 230),
(10, 'PRODUK-001', '2022-04-10-PRODUK-001', '10', '04', 1230);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pre_order_bb`
--

CREATE TABLE `pre_order_bb` (
  `kode_SR` int(11) NOT NULL,
  `kode_bahan_baku` varchar(10) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `bln` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pre_order_bb`
--

INSERT INTO `pre_order_bb` (`kode_SR`, `kode_bahan_baku`, `tanggal`, `bln`, `jumlah`, `status`) VALUES
(2, 'BAKU-010', '08', '06', 900, 1),
(4, 'BAKU-001', '09', '06', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `banyak_produksi` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `banyak_produksi`, `harga_produk`) VALUES
('PRODUK-001', 'Ayam Geprek', 100, 15000),
('PRODUK-002', 'Ayam Geprek Saja', 70, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `kode_produksi` varchar(250) NOT NULL,
  `kode_faktur_produksi` varchar(50) NOT NULL,
  `kode_produk` varchar(25) NOT NULL,
  `produksi_tgl` varchar(20) NOT NULL,
  `produksi_bulan` varchar(13) NOT NULL,
  `produksi_ramal` int(11) NOT NULL,
  `produksi_tambahan` int(11) NOT NULL,
  `produksi_sr` int(11) NOT NULL,
  `produksi_total` int(11) NOT NULL,
  `produksi_jual` int(11) NOT NULL,
  `produksi_laporan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`kode_produksi`, `kode_faktur_produksi`, `kode_produk`, `produksi_tgl`, `produksi_bulan`, `produksi_ramal`, `produksi_tambahan`, `produksi_sr`, `produksi_total`, `produksi_jual`, `produksi_laporan`) VALUES
('PR-040822-00001-PRODUK-001', 'FAKTUR-PR-0422-08', 'PRODUK-001', '08-04-2022', '04', 125, 50, 0, 175, -127, '2022-04-08'),
('PR-040822-00001-PRODUK-002', 'FAKTUR-PR-0422-08', 'PRODUK-002', '08-04-2022', '04', 67, 20, 0, 87, -63, '2022-04-08'),
('PR-060120-00001-PRODUK-001', 'FAKTUR-PR-0620-01', 'PRODUK-001', '01-02-2022', '02', 713, 640, 0, 640, -573, '2022-02-01'),
('PR-060120-00001-PRODUK-002', 'FAKTUR-PR-0620-01', 'PRODUK-002', '01-02-2022', '02', 424, 420, 0, 420, -372, '2022-02-01'),
('PR-060220-00001-PRODUK-001', 'FAKTUR-PR-0620-02', 'PRODUK-001', '02-02-2022', '02', 713, 640, 0, 640, -580, '2022-02-02'),
('PR-060220-00001-PRODUK-002', 'FAKTUR-PR-0620-02', 'PRODUK-002', '02-02-2022', '02', 424, 420, 0, 420, -368, '2022-02-02'),
('PR-060320-00001-PRODUK-001', 'FAKTUR-PR-0620-03', 'PRODUK-001', '03-02-2022', '02', 713, 640, 0, 640, -567, '2022-02-03'),
('PR-060320-00001-PRODUK-002', 'FAKTUR-PR-0620-03', 'PRODUK-002', '03-02-2022', '02', 424, 420, 0, 420, -381, '2022-02-03'),
('PR-060420-00001-PRODUK-001', 'FAKTUR-PR-0620-04', 'PRODUK-001', '04-02-2022', '02', 713, 640, 0, 640, -591, '2022-02-04'),
('PR-060420-00001-PRODUK-002', 'FAKTUR-PR-0620-04', 'PRODUK-002', '04-02-2022', '02', 424, 420, 0, 420, -377, '2022-02-04'),
('PR-060520-00001-PRODUK-001', 'FAKTUR-PR-0620-05', 'PRODUK-001', '05-02-2022', '02', 713, 640, 0, 640, -556, '2022-02-05'),
('PR-060520-00001-PRODUK-002', 'FAKTUR-PR-0620-05', 'PRODUK-002', '05-02-2022', '02', 424, 420, 0, 420, -392, '2022-02-05'),
('PR-060620-00001-PRODUK-001', 'FAKTUR-PR-0620-06', 'PRODUK-001', '06-02-2022', '02', 713, 640, 0, 640, -599, '2022-02-06'),
('PR-060620-00001-PRODUK-002', 'FAKTUR-PR-0620-06', 'PRODUK-002', '06-02-2022', '02', 424, 420, 0, 420, -387, '2022-02-06'),
('PR-060720-00001-PRODUK-001', 'FAKTUR-PR-0620-07', 'PRODUK-001', '07-02-2022', '02', 713, 640, 0, 640, -573, '2022-02-07'),
('PR-060720-00001-PRODUK-002', 'FAKTUR-PR-0620-07', 'PRODUK-002', '07-02-2022', '02', 424, 420, 0, 420, -381, '2022-02-07'),
('PR-081820-00001-PRODUK-001', 'FAKTUR-PR-0820-18', 'PRODUK-001', '18-02-2022', '02', 684, 0, 0, 684, 0, '2022-02-18'),
('PR-081820-00001-PRODUK-002', 'FAKTUR-PR-0820-18', 'PRODUK-002', '18-02-2022', '02', 407, 0, 0, 407, -90, '2022-02-18'),
('PR-091020-00001-PRODUK-001', 'FAKTUR-PR-0920-10', 'PRODUK-001', '06-03-2022', '03', 703, 0, 0, 703, -433, '2022-03-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi_temp`
--

CREATE TABLE `produksi_temp` (
  `kode_produksi` varchar(250) NOT NULL,
  `kode_produk` varchar(25) NOT NULL,
  `produksi_tgl` varchar(20) NOT NULL,
  `produksi_ramal` int(11) NOT NULL,
  `produksi_tambahan` int(11) NOT NULL,
  `produksi_sr` int(11) NOT NULL,
  `produksi_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi_temp`
--

INSERT INTO `produksi_temp` (`kode_produksi`, `kode_produk`, `produksi_tgl`, `produksi_ramal`, `produksi_tambahan`, `produksi_sr`, `produksi_total`) VALUES
('PR-022820-00001-', '', '28-02-2022', 0, 500, 0, 500),
('PR-030720-00001-', '', '07-03-2022', 0, 210, 0, 210),
('PR-030920-00001-', '', '09-03-2022', 0, 300, 0, 300),
('PR-040420-00001-Produk', 'Produk', '04-04-2022', 0, 350, 0, 350),
('PR-040520-00001-', '', '05-04-2022', 0, 120, 0, 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat_supplier` varchar(255) NOT NULL,
  `telp_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`) VALUES
('SUP-001', 'Ayam Potong Alam', 'Jl. Lintas Sumatra, kamp melati', '081212346744'),
('SUP-002', 'Grosir Kertajaya', 'Pasar Ujung Tanjung', '081213143243'),
('SUP-003', 'Toko Mulia Harian', 'Jl. Pasar Baru UT', '085234562424');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `kode_toko` varchar(255) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` varchar(255) NOT NULL,
  `telp_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`kode_toko`, `nama_toko`, `alamat_toko`, `telp_toko`) VALUES
('TOKO-001', 'AGF1', 'Jl. Kampung Melati', 4545353),
('TOKO-002', 'AGF2', 'Ujung Tanjung', 876567896);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `kode_user` varchar(255) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `kode_user`, `nama_user`, `alamat`, `no_hp`, `jabatan`, `username`, `password`, `foto`) VALUES
(1, 'ADM', 'Sukijo', 'Jl. Limbungan', '081275919791', 'Admin', 'sukijo', '21232f297a57a5a743894a0e4a801fc3', '18032020172144aaa.jpg'),
(2, 'PGW-0001', 'Renald', 'Jl. Limbungan', '081213448761', 'Manufaktur', 'renald', '21232f297a57a5a743894a0e4a801fc3', '18032020172144aaa.jpg'),
(4, 'PGW-0002', 'Annisa', 'Jl. Kampung melati', '082267737788', 'Kasir', 'annisa', '21232f297a57a5a743894a0e4a801fc3', '0808202115004903042020090558aaa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahanbaku`
--
ALTER TABLE `bahanbaku`
  ADD PRIMARY KEY (`kode_bahan_baku`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indeks untuk tabel `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`no`) USING BTREE,
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `kode_bahan_baku` (`kode_bahan_baku`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`kode_keranjang`),
  ADD KEY `kode_supplier` (`kode_supplier`),
  ADD KEY `kode_bahan_baku` (`kode_bahan_baku`);

--
-- Indeks untuk tabel `keranjang_bom`
--
ALTER TABLE `keranjang_bom`
  ADD PRIMARY KEY (`no`) USING BTREE,
  ADD KEY `kode_bahan_baku` (`kode_bahan_baku`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `keranjang_penjualan`
--
ALTER TABLE `keranjang_penjualan`
  ADD PRIMARY KEY (`kode_keranjang1`),
  ADD KEY `kode_penjualan` (`kode_penjualan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `kode_supplier` (`kode_supplier`),
  ADD KEY `kode_bahan_baku` (`kode_bahan_baku`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indeks untuk tabel `peramalan_penjualan`
--
ALTER TABLE `peramalan_penjualan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `porel`
--
ALTER TABLE `porel`
  ADD PRIMARY KEY (`ID_mrp`);

--
-- Indeks untuk tabel `pre_order`
--
ALTER TABLE `pre_order`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `pre_order_bb`
--
ALTER TABLE `pre_order_bb`
  ADD PRIMARY KEY (`kode_SR`),
  ADD KEY `kode_bahan_baku` (`kode_bahan_baku`),
  ADD KEY `kode_bahan_baku_2` (`kode_bahan_baku`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`kode_produksi`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `produksi_temp`
--
ALTER TABLE `produksi_temp`
  ADD PRIMARY KEY (`kode_produksi`),
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `kode_produk_2` (`kode_produk`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`kode_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bom`
--
ALTER TABLE `bom`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `kode_keranjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keranjang_bom`
--
ALTER TABLE `keranjang_bom`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keranjang_penjualan`
--
ALTER TABLE `keranjang_penjualan`
  MODIFY `kode_keranjang1` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pre_order`
--
ALTER TABLE `pre_order`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pre_order_bb`
--
ALTER TABLE `pre_order_bb`
  MODIFY `kode_SR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahanbaku`
--
ALTER TABLE `bahanbaku`
  ADD CONSTRAINT `bahanbaku_ibfk_1` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `bom`
--
ALTER TABLE `bom`
  ADD CONSTRAINT `bom_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kode_bahan_baku`) REFERENCES `bahanbaku` (`kode_bahan_baku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peramalan_penjualan`
--
ALTER TABLE `peramalan_penjualan`
  ADD CONSTRAINT `peramalan_penjualan_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
