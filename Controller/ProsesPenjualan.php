<?php
include "../Class/ClassPenjualan.php";

$penjualan = new Penjualan;


$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$ambil_tahun = date('Y');
	$date = $_GET['date'];
	$bulan = substr($date, 5, 2);
	$bulan = $bulan;
	$tahun = $ambil_tahun;
	$penjualan->tambahPenjualan($date,$bulan,$tahun);
	header("location:../_Pegawai/DataPenjualan.php");
	
}elseif ($aksi == "tambahkeranjang") {
	$kode_penjualan = $_POST['kode_penjualan'];
	$date = $_POST['date'];
	$nama_user = $_POST['nama_user'];
	$nama_toko = $_POST['nama_toko'];
	$nama_produk = $_POST['nama_produk'];
	$jumlah_penjualan = $_POST['jumlah_penjualan'];
	$total_penjualan= $_POST['total_penjualan'];

	$kode_keranjang="";
	if($kode_keranjang == null){
		$kode_keranjang ="";
		}
	
	else{
		$kode_keranjang = $_GET['kode_keranjang'];
	}
	
	
	$penjualan->tambahKeranjangPenjualan($kode_keranjang,$kode_penjualan,$date,$nama_user,$nama_toko,$nama_produk,$jumlah_penjualan,$total_penjualan);
	header('location:../_Pegawai/InputPenjualan.php');

}elseif ($aksi == "hapus") {
	$date= $_GET['date'];

	$penjualan->KeranjangHapus($date);
	header('location:../_Pegawai/InputPenjualan.php');
}

?>