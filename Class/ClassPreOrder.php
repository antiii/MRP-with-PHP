<?php
class PreOrder{
	public $id_perhitungan;
	public $kode_bahan_baku;
	public $kode_produk;
	public $kode;
	public $tgl;
	public $faktur;
	public $bln;
	public $jumlah; 
	public $jmlh;

	function __construct(){	
		$this->con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $this->con; 
	}

	function TampilSemua(){
		$tanggal = date('d-m-Y');
		$query = mysqli_query($this->con, "SELECT * from pre_order");
		$i = 0;
		while($n = mysqli_fetch_array($query)){
			$data[$i]['kode'] = $n['kode'];
			$data[$i]['tgl'] = $n['tgl'];
			$data[$i]['kode_produk'] = $n['kode_produk'];
			$data[$i]['jumlah'] = $n['jumlah'];
			$data[$i]['bln'] = $n['bln'];
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilSatuData($kode){
		$query = mysqli_query($this->con, "SELECT * FROM pre_order WHERE kode = '$kode'");
		$m = mysqli_fetch_object($query);
		$this->kode = $m->kode;
		$this->tgl= $m->tgl;
		$this->kode_produk = $m->kode_produk;
		$this->jumlah= $m->jumlah;
		
	}
	

function inputSR($tgl,$kode_produk,$jmlh){
		$tgl_skrg = date('Y-m-d');
		
		if($tgl <= $tgl_skrg){
		?> 
				<script type="text/javascript">
						alert("Tanggal tidak sesuai");
						window.location = "../_Pegawai/Schedule_input.php";							
				</script>	
				<?php
			exit;		
		}
		
	
		
		
		
				$sr =(int) array();

				$sr_tgl = (int) substr($tgl, 8, 2);
				
				$sr_bln = (int) substr($tgl, 5, 2);
				
				if ($sr_tgl < 10){
					$final_tgl= "0".$sr_tgl;
				}
				else{
					$final_tgl = $sr_tgl;
				}
				
				if ($sr_bln < 10){
					$final_bln = "0".$sr_bln;
				}
				else{
					$final_bln = $sr_bln;
				}
				
				$final = $tgl."-".$kode_produk; 
				$sql = "INSERT INTO pre_order(faktur,tgl,bln,jumlah,kode_produk) VALUES('$final','$final_tgl','$final_bln','$jmlh','$kode_produk')";  
                mysqli_query($this->con, $sql);
						
	include '../Controller/ProsesMRP.php'; 

	
		}
	

function editSR($kode_produk,$kode,$jumlah,$tgl){
	$query = mysqli_query($this->con, "UPDATE pre_order SET jumlah = '$jumlah' WHERE kode = '$kode'");   
				
	include '../Controller/ProsesMRP.php';						
}

function hapusSR($kode){
	$query = mysqli_query($this->con, "DELETE FROM pre_order WHERE kode = '$kode'");   
	header("Location:../_Pegawai/Schedule_input.php");					
	include '../Controller/ProsesMRP.php'; 
	}	
}
	


?>
