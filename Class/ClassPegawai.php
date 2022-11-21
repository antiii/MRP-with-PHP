<?php
class Pegawai{
	public $kode_user;
	public $nama_user;
	public $username;
	public $password;
	public $alamat;
	public $foto;
	public $id;
	public $jabatan;
	public $no_hp;
	

	function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
	
	function TampilSemua(){
		$query = mysqli_query($this->con, "SELECT * from user  ORDER BY id");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_user'] = $m['kode_user'];
			$data[$i]['nama_user'] = $m['nama_user'];
			$data[$i]['alamat'] = $m['alamat'];
			$data[$i]['no_hp'] = $m['no_hp'];
			$data[$i]['foto'] = $m['foto'];
	
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function tambahPegawai($username,$password,$nama_user,$alamat,$jabatan,$kode_user,$no_hp,$foto){
	$password_hashing = md5($_POST['password']);
	$tmp = $_FILES['foto']['tmp_name'];
	
	$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	// Set path folder tempat menyimpan fotonya
	$path = "../images/".$fotobaru;
	// Proses upload


	if(array($ekstensi_diperbolehkan === true)){
	if(move_uploaded_file($tmp, $path)){
		
		  $query = "INSERT INTO user(kode_user,nama_user,alamat,no_hp,jabatan,username,password,foto)
								VALUES('$kode_user','$nama_user','$alamat','$no_hp','$jabatan', '$username','$password_hashing',  '$fotobaru')";
		  $sql = mysqli_query($this->con, $query); 
		
		if($sql){ 
		header("location:../_Pemilik/DataPegawai.php"); 
		}else{
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='../_Pemilik/DataPegawai.php'>Kembali Ke Form</a>";
		}
	}
		
		
	}
	else{
	echo "Maaf, file yang diupload harus berekstensi jpeg, jpg atau png.";
	echo "<br><a href='../pemilik/DataPegawai.php'>Kembali Ke Form</a>";
	}
	}
	
	function updatePegawai($kode_user,$nama_user,$username,$alamat){

	 $query = mysqli_query($this->con, "UPDATE user SET nama_user='$nama_user',
														  username='$username',
														   alamat='$alamat'
														
	 												  WHERE
	 												  	  kode_user='$kode_user'");
	}	
	
	function hapusPegawai($kode_user){
	include "koneksi.php";
	$kode_pesanan1 = mysqli_query($this->con, "SELECT kode_user FROM user WHERE kode_user = '$kode_user'");
			while($m = mysqli_fetch_array($kode_pesanan1)){
				  $kode_user=$m['kode_user'];

			$query = mysqli_query($this->con, "DELETE FROM user WHERE kode_user = '$kode_user'");   
			}	
	}
}
?>