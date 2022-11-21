<?php
include "../Class/ClassPeramalan.php";

$peramalan = new Peramalan;

$kode_produk = $_POST['kode_produk'];

$tahun = $_POST['tahun'];

$peramalan->tambahPeramalan($kode_produk,$tahun);
	header('location:../_Pegawai/DetailPeramalan.php');
?>