<?php
include "../Class/ClassPembelian.php";
include "../Class/ClassMRP.php";

$pembelian = new Pembelian;
$mrp = new Mrp;

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$kode_supplier = $_GET['kode_supplier'];
	$pembelian->TambahPembelian($kode_supplier);

	header('location:../_Pegawai/DataPembelian.php');
}elseif ($aksi == "hapus") {
	$kode_keranjang = $_GET['kode_keranjang'];
	$pembelian->HapusKeranjangPembelian($kode_keranjang);
	header('location:../_Pegawai/TambahPembelian.php');
}elseif ($aksi == "tambahkeranjang") {
	$nama_bahan_baku = $_POST['nama_bahan_baku'];
	$jumlah = $_POST['lotsize'];
	$hari_sampai = $_POST['hari_sampai'];
	$pembelian->TambahKeranjangPembelian($nama_bahan_baku,$jumlah,$hari_sampai);
	header('location:../_Pegawai/TambahPembelian.php');
}
elseif ($aksi == "konfirmasi") {
	$kode_pembelian =  $_GET['kode_pembelian'];
	$mrp->tambahMRP($kode_produk);
	$pembelian->TerimaPesanan($kode_pembelian);
	header("location:../_Pegawai/KonfirmasiPesanBB.php");
}
?>