<?php
include "../Class/ClassMRProduk.php";

$mrpproduk = new MRPProduk;

$kode_produk = $_POST['kode_produk'];

$mrpproduk->tambahMRPProduk($kode_produk);
?>