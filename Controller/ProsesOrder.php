<?php

include "../Class/ClassPreOrder.php";
$preorder = new PreOrder;

$tgl = $_POST['name'];
$jmlh = $_POST['jmlh'];
$kode_produk = $_POST['kode_produk'];

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$preorder->inputSR($tgl,$kode_produk,$jmlh);
	header ("location:../_Pegawai/Schedule_input.php");
}elseif ($aksi == "hapus") {
	$kode= $_GET['kode'];
	$preorder->hapusSR($kode);
	header ("location:../_Pegawai/Schedule_input.php");
}elseif ($aksi == "update") {
	$kode= $_POST['kode'];
	$tgl = $_POST['name'];
	$jumlah = $_POST['jumlah'];
	$kode_produk = $_POST['kode_produk'];
	$preorder->editSR($kode_produk,$kode,$jumlah,$tgl);
 	header ("location:../_Pegawai/Schedule_input.php");
}
?>

	
			
					
			