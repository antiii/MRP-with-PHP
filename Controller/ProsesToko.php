<?php
include "../Class/ClassToko.php";

$toko = new Toko;

$kode_toko= $_POST['kode_toko'];
$nama_toko= $_POST['nama_toko'];
$alamat_toko= $_POST['alamat_toko'];
$telp_toko= $_POST['telp_toko'];

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$toko->tambahToko($kode_toko,$nama_toko,$alamat_toko,$telp_toko);
	header ("location:../_Pegawai/DataToko.php");
}elseif ($aksi == "hapus") {
	$toko->hapusToko($kode_toko);
	header ("location:../_Pegawai/DataToko.php");
}elseif ($aksi == "update") {
	$toko->updateToko($kode_toko,$nama_toko,$alamat_toko,$telp_toko);
	header ("location:../_Pegawai/DataToko.php");
}

?>