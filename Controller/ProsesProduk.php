<?php
include "../Class/ClassProduk.php";
include "../Class/ClassMRP.php";
include "../Class/ClassMRProduk.php";

$mrpproduk = new MRPProduk;
$Produk = new Produk;
$mrp = new Mrp;


$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$kode_produk = $_POST['kode_produk'];
	$nama_produk= $_POST['nama_produk'];
	$harga_produk= $_POST['harga_produk'];
	$banyak_produksi= $_POST['banyak_produksi'];
	$Produk->tambahProduk($kode_produk,$nama_produk,$banyak_produksi,$harga_produk);
	header ("location:../_Pegawai/DataProduk.php");
}elseif ($aksi == "hapus") {
	$Produk->hapusProduk($kode_produk);
	$mrp->tambahMRP($kode_produk);
	header("Location:../_Pegawai/DataProduk.php");
}elseif ($aksi == "update") {
	$kode_produk = $_POST['kode_produk'];
	$nama_produk= $_POST['nama_produk'];
	$harga_produk= $_POST['harga_produk'];
	$banyak_produksi= $_POST['banyak_produksi'];
	$Produk->updateProduk($kode_produk,$nama_produk,$harga_produk,$banyak_produksi);	
 	header("Location:../_Pegawai/DataProduk.php");
}

?>


