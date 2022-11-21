<?php
class Porel{
	public $ID_mrp;
	public $kode_bahan_baku;
	public $rop;
	public $tanggal;
	public $bulan;
	public $status;
	
	function __construct(){	
		$this->con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $this->con; 
	}
	

	function TampilSemuaData($kode_bahan_baku){
		$tanggal = date('d-m-Y');
		$query = mysqli_query($this->con, "SELECT * from porel WHERE tanggal = '$tanggal' AND kode_bahan_baku = '$kode_bahan_baku'");
		$i = 0;
		while($n = mysqli_fetch_array($query)){
			$data[$i]['ID_mrp'] = $n['ID_mrp'];
			$data[$i]['tanggal'] = $n['tanggal'];
			$data[$i]['kode_bahan_baku'] = $n['kode_bahan_baku'];
			$data[$i]['status'] = $n['status'];
		
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilSemuaPorel(){
		$query = mysqli_query($this->con, "SELECT * from porel INNER JOIN bahanbaku ON bahanbaku.kode_bahan_baku = porel.kode_bahan_baku");
		$i = 0;
		while($n = mysqli_fetch_array($query)){
			
			$data[$i]['satuan'] = $n['satuan'];
			$data[$i]['nama_bahan_baku'] = $n['nama_bahan_baku'];
			$data[$i]['bulan']= $n['bulan'];
			$data[$i]['lotsize']= $n['lotsize'];
			$data[$i]['status'] = $n['status'];
			$data[$i]['tanggal']= $n['tanggal'];
			
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	
	}
	


?>
