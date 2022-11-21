<?php
include "../Class/ClassProduk.php";
include "../Class/ClassMRP.php";
include "../Class/ClassMRProduk.php";

$produk = new Produk;
$mrp = new Mrp;


$kode_bahan_baku = $_POST['kode_bahan_baku'];
$kode_produk = $_POST['kode_produk'];
$jumlah_penggunaan = $_POST['jumlah_penggunaan'];

$kode_bahan_baku =$kode_bahan_baku;
$kode_produk = $kode_produk;
$jumlah_penggunaan = $jumlah_penggunaan;


$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$produk->tambahBom($kode_produk,$kode_bahan_baku,$jumlah_penggunaan);
}elseif ($aksi == "manage") {
	$kode_produk=$_GET['kode_produk'];	
	$produk->tambahManageProduk($kode_bahan_baku,$kode_produk,$jumlah_penggunaan);
	$mrp->tambahMRP($kode_produk);
	header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");
}elseif ($aksi == "hapus") {
	$no=$_GET['no'];	
	$produk->hapusTampungBom($no);
}elseif ($aksi == "simpan") {
	$no=$_GET['no'];	
	$produk->SimpanBom($no);
	$mrp->tambahMRP($kode_produk);
}elseif ($aksi == "hapusbom") {
	$no=$_GET['no'];	
	$produk->hapusBom($no);
	$mrp->tambahMRP($kode_produk);
}elseif ($aksi == "batal") {
	$kode_produk=$_GET['kode_produk'];	
	$produk->hapusManageProduk($kode_produk);
}elseif ($aksi == "update") {
	$produk->updateBom($kode_produk,$kode_bahan_baku,$jumlah_penggunaan);
	$mrp->tambahMRP($kode_produk);
	header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");
}

?>