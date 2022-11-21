-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2022 pada 14.37
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
('BAKU-001', 'Tepung', 220000, 123, 'Sak', 2, 50, 15, 7, 'SUP-002'),
('BAKU-002', 'Beras', 400000, 3.7, 'Sak', 2, 10, 3, 1, 'SUP-002'),
('BAKU-003', 'Garam', 6000, 7.2, 'Bungkus', 2, 12, 4, 1, 'SUP-002'),
('BAKU-004', 'Penyedap Rasa', 50000, 6.1, 'Bungkus', 2, 20, 6, 2, 'SUP-002'),
('BAKU-005', 'Bumbu Jadi', 35000, 9.8, 'Bungkus', 2, 20, 5, 2, 'SUP-002'),
('BAKU-006', 'Bawang Goreng', 20000, 6.9, 'Bungkus', 2, 10, 5, 1, 'SUP-002'),
('BAKU-007', 'Margarin Putih', 20000, 6.7, 'Bungkus', 2, 10, 4, 1, 'SUP-002'),
('BAKU-008', 'Cabai', 25000, 5.6, 'Kg', 2, 20, 7, 1, 'SUP-002'),
('BAKU-009', 'Ayam', 25000, 11.8, 'Kg', 2, 25, 6, 1, 'SUP-001'),
('BAKU-010', 'Telur', 1600, 1039.1, 'Butir', 1, 300, 219, 120, 'SUP-003'),
('BAKU-011', 'Kubis', 16000, 8.7, 'Kg', 3, 10, 5, 1, 'SUP-002');

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
(16, 'PRODUK-001', 'BAKU-001', 0.4),
(17, 'PRODUK-001', 'BAKU-002', 0.4),
(18, 'PRODUK-001', 'BAKU-003', 0.1),
(19, 'PRODUK-001', 'BAKU-004', 0.1),
(20, 'PRODUK-001', 'BAKU-005', 0.1),
(22, 'PRODUK-001', 'BAKU-008', 0.2),
(23, 'PRODUK-001', 'BAKU-009', 0.5),
(25, 'PRODUK-001', 'BAKU-010', 6),
(53, 'PRODUK-002', 'BAKU-002', 0.6),
(54, 'PRODUK-002', 'BAKU-003', 0.1),
(55, 'PRODUK-002', 'BAKU-004', 0.2),
(56, 'PRODUK-002', 'BAKU-005', 0.1),
(63, 'PRODUK-002', 'BAKU-007', 0.2),
(64, 'PRODUK-002', 'BAKU-008', 0.3),
(65, 'PRODUK-002', 'BAKU-009', 0.8),
(67, 'PRODUK-002', 'BAKU-006', 0.2),
(70, 'PRODUK-002', 'BAKU-010', 8),
(77, 'PRODUK-002', 'BAKU-011', 0.2),
(78, 'PRODUK-001', 'BAKU-006', 0.2),
(79, 'PRODUK-001', 'BAKU-007', 0.2),
(80, 'PRODUK-001', 'BAKU-011', 0.2),
(81, 'PRODUK-002', 'BAKU-001', 0.5);

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

--
-- Dumping data untuk tabel `keranjang_penjualan`
--

INSERT INTO `keranjang_penjualan` (`kode_keranjang1`, `kode_penjualan`, `nama_user`, `nama_toko`, `nama_produk`, `jumlah_penjualan`, `date`, `total_penjualan`) VALUES
(1, 'PJL-00004', 'Renald', 'AGF1', 'Ayam Geprek Jumbo', '6', '2022-03-06', 54000),
(2, 'PJL-00049', 'Renald', 'AGF1', 'Ayam Geprek', '200', '2022-03-06', 1800000);

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
('PJL-00001', 'Ayam Geprek', '2020-01-31', '01', 2020, 'Renald', 'AGF1', 22438, 201942000),
('PJL-00002', 'Ayam Geprek Jumbo', '2020-01-31', '01', 2020, 'Renald', 'AGF1', 12980, 142780000),
('PJL-00003', 'Ayam Geprek', '2020-02-28', '02', 2020, 'Renald', 'AGF1', 19237, 173133000),
('PJL-00004', 'Ayam Geprek Jumbo', '2020-02-28', '02', 2020, 'Renald', 'AGF1', 12137, 133507000),
('PJL-00005', 'Ayam Geprek', '2020-03-31', '03', 2020, 'Renald', 'AGF1', 22840, 205560000),
('PJL-00006', 'Ayam Geprek Jumbo', '2020-03-31', '03', 2020, 'Renald', 'AGF1', 13245, 145695000),
('PJL-00007', 'Ayam Geprek', '2020-04-30', '04', 2020, 'Renald', 'AGF1', 23677, 213093000),
('PJL-00008', 'Ayam Geprek Jumbo', '2020-04-30', '04', 2020, 'Renald', 'AGF1', 13694, 150634000),
('PJL-00009', 'Ayam Geprek', '2020-05-31', '05', 2020, 'Renald', 'AGF1', 23334, 210006000),
('PJL-00010', 'Ayam Geprek Jumbo', '2020-05-31', '05', 2020, 'Renald', 'AGF1', 13700, 150700000),
('PJL-00011', 'Ayam Geprek', '2020-06-30', '06', 2020, 'Renald', 'AGF1', 18636, 167724000),
('PJL-00012', 'Ayam Geprek Jumbo', '2020-06-30', '06', 2020, 'Renald', 'AGF1', 11357, 124927000),
('PJL-00013', 'Ayam Geprek', '2020-07-31', '07', 2020, 'Renald', 'AGF1', 18993, 170937000),
('PJL-00014', 'Ayam Geprek Jumbo', '2020-07-31', '07', 2020, 'Renald', 'AGF1', 11579, 127369000),
('PJL-00015', 'Ayam Geprek', '2020-08-31', '08', 2020, 'Renald', 'AGF1', 20160, 181440000),
('PJL-00016', 'Ayam Geprek Jumbo', '2020-08-31', '08', 2020, 'Renald', 'AGF1', 12109, 133199000),
('PJL-00017', 'Ayam Geprek', '2020-09-30', '09', 2020, 'Renald', 'AGF1', 21348, 192132000),
('PJL-00018', 'Ayam Geprek Jumbo', '2020-09-30', '09', 2020, 'Renald', 'AGF1', 12585, 138435000),
('PJL-00019', 'Ayam Geprek', '2020-10-31', '10', 2020, 'Renald', 'AGF1', 21939, 197451000),
('PJL-00020', 'Ayam Geprek Jumbo', '2020-10-31', '10', 2020, 'Renald', 'AGF1', 13246, 145706000),
('PJL-00021', 'Ayam Geprek', '2020-11-30', '11', 2020, 'Renald', 'AGF1', 21478, 193302000),
('PJL-00022', 'Ayam Geprek Jumbo', '2020-11-30', '11', 2020, 'Renald', 'AGF1', 13194, 145134000),
('PJL-00023', 'Ayam Geprek', '2020-12-31', '12', 2020, 'Renald', 'AGF1', 20583, 185247000),
('PJL-00024', 'Ayam Geprek Jumbo', '2020-12-31', '12', 2020, 'Renald', 'AGF1', 12362, 135982000),
('PJL-00025', 'Ayam Geprek', '2021-01-01', '01', 2021, 'Renald', 'AGF1', 21757, 4617000),
('PJL-00026', 'Ayam Geprek Jumbo', '2021-01-01', '01', 2021, 'Renald', 'AGF1', 12749, 2046000),
('PJL-00027', 'Ayam Geprek', '2021-02-01', '02', 2021, 'Renald', 'AGF1', 20432, 2025000),
('PJL-00028', 'Ayam Geprek Jumbo', '2021-02-01', '02', 2021, 'Renald', 'AGF1', 12369, 3300000),
('PJL-00029', 'Ayam Geprek', '2021-03-08', '03', 2021, 'Renald', 'AGF1', 21245, 4455000),
('PJL-00030', 'Ayam Geprek Jumbo', '2021-03-08', '03', 2021, 'Renald', 'AGF1', 12931, 2200000),
('PJL-00031', 'Ayam Geprek', '2021-04-08', '04', 2021, 'Renald', 'AGF1', 21986, 1989000),
('PJL-00032', 'Ayam Geprek Jumbo', '2021-04-08', '04', 2021, 'Renald', 'AGF1', 12473, 3300000),
('PJL-00033', 'Ayam Geprek', '2021-05-15', '05', 2021, 'Renald', 'AGF1', 21651, 4590000),
('PJL-00034', 'Ayam Geprek Jumbo', '2021-05-15', '05', 2021, 'Renald', 'AGF1', 12935, 2068000),
('PJL-00035', 'Ayam Geprek', '2021-06-15', '06', 2021, 'Renald', 'AGF1', 20871, 2223000),
('PJL-00036', 'Ayam Geprek Jumbo', '2021-06-15', '06', 2021, 'Renald', 'AGF1', 12125, 3300000),
('PJL-00037', 'Ayam Geprek', '2021-07-09', '07', 2021, 'Renald', 'AGF1', 19889, 4725000),
('PJL-00038', 'Ayam Geprek Jumbo', '2021-07-09', '07', 2021, 'Renald', 'AGF1', 12349, 2068000),
('PJL-00039', 'Ayam Geprek', '2021-08-09', '08', 2021, 'Renald', 'AGF1', 20216, 2331000),
('PJL-00040', 'Ayam Geprek Jumbo', '2021-08-09', '08', 2021, 'Renald', 'AGF1', 12483, 3300000),
('PJL-00041', 'Ayam Geprek', '2021-09-02', '09', 2021, 'Renald', 'AGF1', 21567, 4590000),
('PJL-00042', 'Ayam Geprek Jumbo', '2021-09-02', '09', 2021, 'Renald', 'AGF1', 12782, 1892000),
('PJL-00043', 'Ayam Geprek', '2021-10-02', '10', 2021, 'Renald', 'AGF1', 21499, 2385000),
('PJL-00044', 'Ayam Geprek Jumbo', '2021-10-02', '10', 2021, 'Renald', 'AGF1', 12886, 3300000),
('PJL-00045', 'Ayam Geprek', '2021-11-09', '11', 2021, 'Renald', 'AGF1', 20987, 4320000),
('PJL-00046', 'Ayam Geprek Jumbo', '2021-11-09', '11', 2021, 'Renald', 'AGF1', 12581, 2013000),
('PJL-00047', 'Ayam Geprek', '2021-12-09', '12', 2021, 'Renald', 'AGF1', 21225, 2295000),
('PJL-00048', 'Ayam Geprek Jumbo', '2021-12-09', '12', 2021, 'Renald', 'AGF1', 12658, 3300000),
('PJL-00049', 'Ayam Geprek ', '2022-01-31', '01', 2022, 'Renald', 'AGF1', 22438, 201942000),
('PJL-00050', 'Ayam Geprek Jumbo', '2022-01-31', '01', 2022, 'Renald', 'AGF1', 12980, 142780000),
('PJL-00051', 'Ayam Geprek ', '2022-02-28', '02', 2022, 'Renald', 'AGF1', 19237, 173133000),
('PJL-00052', 'Ayam Geprek Jumbo', '2022-02-28', '02', 2022, 'Renald', 'AGF1', 12137, 133507000);

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
('2019PRODUK-001-01', 'PRODUK-001', 'Januari', '01', '2020', 22438, 21768.1, 21693.7),
('2019PRODUK-001-02', 'PRODUK-001', 'Februari', '02', '2020', 19237, 21515, 21769),
('2019PRODUK-001-03', 'PRODUK-001', 'Maret', '03', '2020', 22840, 21647.5, 21515),
('2019PRODUK-001-04', 'PRODUK-001', 'April', '04', '2020', 23677, 21850.5, 21648),
('2019PRODUK-001-05', 'PRODUK-001', 'Mei', '05', '2020', 23334, 21998.9, 21851),
('2019PRODUK-001-06', 'PRODUK-001', 'Juni', '06', '2020', 18636, 21662.6, 21999),
('2019PRODUK-001-07', 'PRODUK-001', 'Juli', '07', '2020', 18993, 21395.6, 21663),
('2019PRODUK-001-08', 'PRODUK-001', 'Agustus', '08', '2020', 20160, 21272, 21396),
('2019PRODUK-001-09', 'PRODUK-001', 'September', '09', '2020', 21348, 21279.6, 21272),
('2019PRODUK-001-10', 'PRODUK-001', 'Oktober', '10', '2020', 21939, 21345.5, 21280),
('2019PRODUK-001-11', 'PRODUK-001', 'November	', '11', '2020', 21478, 21358.8, 21346),
('2019PRODUK-001-12', 'PRODUK-001', 'Desember', '12', '2020', 20583, 21281.2, 21359),
('2019PRODUK-002-01', 'PRODUK-002', 'Januari', '01', '2020', 12980, 12865, 12852.2),
('2019PRODUK-002-02', 'PRODUK-002', 'Februari', '02', '2020', 12137, 12792.2, 12865),
('2019PRODUK-002-03', 'PRODUK-002', 'Maret', '03', '2020', 13245, 12837.5, 12793),
('2019PRODUK-002-04', 'PRODUK-002', 'April', '04', '2020', 13694, 12923.2, 12838),
('2019PRODUK-002-05', 'PRODUK-002', 'Mei', '05', '2020', 13700, 13000.9, 12924),
('2019PRODUK-002-06', 'PRODUK-002', 'Juni', '06', '2020', 11357, 12836.5, 13001),
('2019PRODUK-002-07', 'PRODUK-002', 'Juli', '07', '2020', 11579, 12710.8, 12837),
('2019PRODUK-002-08', 'PRODUK-002', 'Agustus', '08', '2020', 12109, 12650.6, 12711),
('2019PRODUK-002-09', 'PRODUK-002', 'September', '09', '2020', 12585, 12644, 12651),
('2019PRODUK-002-10', 'PRODUK-002', 'Oktober', '10', '2020', 13246, 12704.2, 12644),
('2019PRODUK-002-11', 'PRODUK-002', 'November	', '11', '2020', 13194, 12753.2, 12705),
('2019PRODUK-002-12', 'PRODUK-002', 'Desember', '12', '2020', 12362, 12714.1, 12754),
('2020PRODUK-001-01', 'PRODUK-001', 'Januari', '01', '2021', 21757, 21367, 21323.7),
('2020PRODUK-001-02', 'PRODUK-001', 'Februari', '02', '2021', 20432, 21273.5, 21367),
('2020PRODUK-001-03', 'PRODUK-001', 'Maret', '03', '2021', 21245, 21270.7, 21274),
('2020PRODUK-001-04', 'PRODUK-001', 'April', '04', '2021', 21986, 21342.2, 21271),
('2020PRODUK-001-05', 'PRODUK-001', 'Mei', '05', '2021', 21651, 21373.1, 21343),
('2020PRODUK-001-06', 'PRODUK-001', 'Juni', '06', '2021', 20871, 21322.9, 21374),
('2020PRODUK-001-07', 'PRODUK-001', 'Juli', '07', '2021', 19889, 21179.5, 21323),
('2020PRODUK-001-08', 'PRODUK-001', 'Agustus', '08', '2021', 20216, 21083.2, 21180),
('2020PRODUK-001-09', 'PRODUK-001', 'September', '09', '2021', 21567, 21131.6, 21084),
('2020PRODUK-001-10', 'PRODUK-001', 'Oktober', '10', '2021', 21499, 21168.3, 21132),
('2020PRODUK-001-11', 'PRODUK-001', 'November	', '11', '2021', 20987, 21150.2, 21169),
('2020PRODUK-001-12', 'PRODUK-001', 'Desember', '12', '2021', 21225, 21157.7, 21151),
('2020PRODUK-002-01', 'PRODUK-002', 'Januari', '01', '2021', 12749, 12652.7, 12642),
('2020PRODUK-002-02', 'PRODUK-002', 'Februari', '02', '2021', 12369, 12624.3, 12653),
('2020PRODUK-002-03', 'PRODUK-002', 'Maret', '03', '2021', 12931, 12655, 12625),
('2020PRODUK-002-04', 'PRODUK-002', 'April', '04', '2021', 12743, 12663.8, 12655),
('2020PRODUK-002-05', 'PRODUK-002', 'Mei', '05', '2021', 12935, 12690.9, 12664),
('2020PRODUK-002-06', 'PRODUK-002', 'Juni', '06', '2021', 12125, 12634.3, 12691),
('2020PRODUK-002-07', 'PRODUK-002', 'Juli', '07', '2021', 12349, 12605.8, 12635),
('2020PRODUK-002-08', 'PRODUK-002', 'Agustus', '08', '2021', 12483, 12593.5, 12606),
('2020PRODUK-002-09', 'PRODUK-002', 'September', '09', '2021', 12782, 12612.4, 12594),
('2020PRODUK-002-10', 'PRODUK-002', 'Oktober', '10', '2021', 12886, 12639.8, 12613),
('2020PRODUK-002-11', 'PRODUK-002', 'November	', '11', '2021', 12581, 12633.9, 12640),
('2020PRODUK-002-12', 'PRODUK-002', 'Desember', '12', '2021', 12658, 12636.3, 12634),
('22PRODUK-001-01', 'PRODUK-001', 'Januari', '01', '2022', 22438, 21768.1, 21693.7),
('22PRODUK-001-02', 'PRODUK-001', 'Februari', '02', '2022', 19237, 21515, 21769),
('22PRODUK-002-01', 'PRODUK-002', 'Januari', '01', '2022', 12980, 12865, 12852.2),
('22PRODUK-002-02', 'PRODUK-002', 'Februari', '02', '2022', 12137, 12792.2, 12865);

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
(8, 'PRODUK-001', '2020-06-09-PRODUK-001', '09', '06', 640);

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
('PRODUK-001', 'Ayam Geprek', 100, 9000),
('PRODUK-002', 'Ayam Geprek Jumbo', 70, 11000);

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
('PR-091020-00001-PRODUK-001', 'FAKTUR-PR-0920-10', 'PRODUK-001', '06-03-2022', '03', 703, 0, 0, 703, 0, '2022-03-06');

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
('PR-022820-00001-', '', '28-02-2022', 0, 500, 0, 500);

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
('SUP-001', 'Ayam Potong Akong', 'Jl. Lintas Sumatra', '081212346744'),
('SUP-002', 'Grosir Kertajaya', 'Jl. Mesjid', '081213143243'),
('SUP-003', 'Grosir Telur Alam', 'Jl. Pasa Baru UT', '085234562424');

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
(4, 'PGW-0002', 'Annisa', 'Jl. Kampung melati', '082267737788', 'Admin', 'annisa', '21232f297a57a5a743894a0e4a801fc3', '0808202115004903042020090558aaa.jpg');

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
  MODIFY `kode_keranjang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjang_bom`
--
ALTER TABLE `keranjang_bom`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keranjang_penjualan`
--
ALTER TABLE `keranjang_penjualan`
  MODIFY `kode_keranjang1` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pre_order`
--
ALTER TABLE `pre_order`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
