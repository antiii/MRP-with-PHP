<?php
class Peramalan{
	public $id;
	public $kode_produk;
	public $tahun;
	public $bulan;
	public $jumlah;
	public $smoothing;
	public $peramalan;
	
	function __construct(){	
		$this->con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $this->con; 
	}

	function TampilBulanProduk($kode_produk){
		$query = mysqli_query($this->con, "SELECT bulan from peramalan_penjualan WHERE kode_produk = '$kode_produk'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['bulan'] = $m['bulan'];
			$i++;
		}
		if(mysqli_num_rows($query)!==0){
			return $data;
		} 
	}
	
	function TampilHasil($kode_produk,$tahun,$bulan){
		$query = mysqli_query($this->con, "SELECT * FROM peramalan_penjualan WHERE tahun='$tahun' and kode_produk='$kode_produk' and bulan='$bulan'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['tahun'] = $m['tahun'];
			$data[$i]['bulan'] = $m['bulan'];
			$data[$i]['peramalan'] = $m['peramalan'];
			$data[$i]['jumlah'] = $m['jumlah'];
			$i++;
		}
		if(mysqli_num_rows($query)!==0){
			return $data;
		} 
	}
	
	

	
	function TampilTahun(){
		$query = mysqli_query($this->con, "SELECT DISTINCT tahun from peramalan_penjualan");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['tahun'] = $m['tahun'];
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilBulan(){
		$query = mysqli_query($this->con, "SELECT DISTINCT bulan from peramalan_penjualan");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['bulan'] = $m['bulan'];
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
//INPUT DATA PENJUALAN KE DATABASE
	function tambahPeramalan($kode_produk,$tahun){
		
		$Januari 	= $_POST['jan'];
		$Februari	= $_POST['feb'];
		$Maret 		= $_POST['mar'];
		$April 		= $_POST['apr'];
		$Mei		= $_POST['mei'];
		$Juni 		= $_POST['jun'];
		$Juli 		= $_POST['jul'];
		$Agustus	= $_POST['agt'];
		$September 	= $_POST['sep'];
		$Oktober 	= $_POST['okt'];
		$November	= $_POST['nov'];
		$Desember 	= $_POST['des'];
		
		$Jumlah1	= $_POST['jumlah1'];
		$Jumlah2	= $_POST['jumlah2'];
		$Jumlah3	= $_POST['jumlah3'];
		$Jumlah4	= $_POST['jumlah4'];
		$Jumlah5	= $_POST['jumlah5'];
		$Jumlah6	= $_POST['jumlah6'];
		$Jumlah7	= $_POST['jumlah7'];
		$Jumlah8	= $_POST['jumlah8'];
		$Jumlah9	= $_POST['jumlah9'];
		$Jumlah10	= $_POST['jumlah10'];
		$Jumlah11	= $_POST['jumlah11'];
		$Jumlah12	= $_POST['jumlah12'];	
		
		$ID1 = $tahun . $kode_produk. "-01" ;
		$ID2 = $tahun . $kode_produk . "-02";
		$ID3 = $tahun . $kode_produk . "-03";
		$ID4 = $tahun . $kode_produk ."-04";
		$ID5 = $tahun . $kode_produk . "-05";
		$ID6 = $tahun . $kode_produk ."-06";
		$ID7 = $tahun . $kode_produk ."-07";
		$ID8 = $tahun . $kode_produk ."-08";
		$ID9 = $tahun . $kode_produk ."-09";
		$ID10 = $tahun . $kode_produk . "-10";
		$ID11 = $tahun . $kode_produk ."-11";
		$ID12 = $tahun . $kode_produk ."-12";
		
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID1','$kode_produk','$tahun','$Januari','01','$Jumlah1')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID2','$kode_produk','$tahun','$Februari','02','$Jumlah2')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID3','$kode_produk','$tahun','$Maret','03','$Jumlah3')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID4','$kode_produk','$tahun','$April','04','$Jumlah4')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID5','$kode_produk','$tahun','$Mei','05','$Jumlah5')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID6','$kode_produk','$tahun','$Juni','06','$Jumlah6')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID7','$kode_produk','$tahun','$Juli','07','$Jumlah7')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID8','$kode_produk','$tahun','$Agustus','08','$Jumlah8')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID9','$kode_produk','$tahun','$September','09','$Jumlah9')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID10','$kode_produk','$tahun','$Oktober','10','$Jumlah10')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID11','$kode_produk','$tahun','$November','11','$Jumlah11')");
		mysqli_query($this->con, "INSERT INTO peramalan_penjualan(ID,kode_produk,tahun,bulan,bulan_angka,jumlah)VALUES('$ID12','$kode_produk','$tahun','$Desember','12','$Jumlah12')");
		
        //start whitebox smoothing
		for ($i=0; $i<7; $i++) //1
		{
			$j = $tahun . $kode_produk. "-0" . $i; //2
			$data = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$j' and kode_produk='$kode_produk';");
			while($d = mysqli_fetch_array($data)){ //3
				$demand = $d['jumlah']; //4
				$temp += $demand; 
			}//5
		} 
			$rata = round(($temp/6),1); //6
			mysqli_query($this->con, "UPDATE peramalan_penjualan SET peramalan='$rata' WHERE ID ='$ID1' and kode_produk='$kode_produk'");
			
            //Menghitung Smoothing data ke 1
		for ($i=0; $i<=1; $i++) //7
		{
			$j = $tahun . $kode_produk.  "-0" . $i; //8
			$data = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$j' and kode_produk='$kode_produk';");
			while($d = mysqli_fetch_array($data)){//9
				$demand = $d['jumlah']; //10
			} 
			$level = round(((0.1*$demand)+(0.9*$rata)), 1); //11
			mysqli_query($this->con, "UPDATE peramalan_penjualan SET smoothing='$level' WHERE ID ='$ID1' and kode_produk='$kode_produk'");
		} //12
		
        //smoothing smoothing data ke 2, 3, 4 dst
		for ($i=1; $i<13; $i++)  //13
		{
			if ($i < 10) { //14
				$temporary = $i - 1;
				$j = $tahun . $kode_produk.  "-0" . $i; 
				$k = $tahun . $kode_produk. "-0" . $temporary; //15 
				$data = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$j'
                 and kode_produk='$kode_produk';");  
				while($d = mysqli_fetch_array($data)){ //16
					$demand = $d['jumlah'];   //17
				} //18
				$data1 = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$k' and kode_produk='$kode_produk';");
				while($d1 = mysqli_fetch_array($data1)){ //19
					$rata = $d1['smoothing']; //20
				}
				$level = round(((0.1*$demand)+(0.9*$rata)), 1); //21
				mysqli_query($this->con, "UPDATE peramalan_penjualan SET smoothing='$level' WHERE ID ='$j' and kode_produk='$kode_produk'");
			} //22
			if ($i ==10){ //23
				$temporary = $i - 1;
				$j = $tahun . $kode_produk.  "-" . $i; 
				$k = $tahun . $kode_produk."-0" . $temporary; //24
				$data = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$j' and kode_produk='$kode_produk';");
				while($d = mysqli_fetch_array($data)){ //25
					$demand = $d['jumlah'];  //26
				} //27
				$data1 = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$k' and kode_produk='$kode_produk';");
				while($d1 = mysqli_fetch_array($data1)){  //28
					$rata = $d1['smoothing']; //29
				}
				$level = round(((0.1*$demand)+(0.9*$rata)), 1); //30
				mysqli_query($this->con, "UPDATE peramalan_penjualan SET smoothing='$level' WHERE ID ='$j' and kode_produk='$kode_produk'");
			}
			else { //31
				$temporary = $i - 1;
				$j = $tahun . $kode_produk.  "-" . $i; 
				$k = $tahun . $kode_produk. "-" . $temporary; //32
				$data = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$j' and kode_produk='$kode_produk';");
				while($d = mysqli_fetch_array($data)){  //33
					$demand = $d['jumlah'];  //34
				}  //35
				$data1 = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$k' and kode_produk='$kode_produk';");
				while($d1 = mysqli_fetch_array($data1)){  //36
					$rata = $d1['smoothing'];  //37
				}
				$level = round(((0.1*$demand)+(0.9*$rata)), 1);  //38
				mysqli_query($this->con, "UPDATE peramalan_penjualan SET smoothing='$level' WHERE ID ='$j' and kode_produk='$kode_produk'");
			} //39
		} //40

		for ($i=1; $i<13; $i++)  //41
		{
			if ($i < 9) {  //42
				$temporary = $i + 1;
				$j = $tahun . $kode_produk.  "-0" . $i; 
				$k = $tahun . $kode_produk.  "-0" . $temporary; //43
				$data = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$j' and kode_produk='$kode_produk';");
				while($d = mysqli_fetch_array($data)){  //44
					$demand = ceil($d['smoothing']);  //45
				}
				mysqli_query($this->con, "UPDATE peramalan_penjualan SET peramalan='$demand' WHERE ID ='$k' and 
                kode_produk='$kode_produk'"); //46
			}  //47
			
			if ($i == 9) {  //48
				$temporary = $i + 1;
				$j = $tahun . $kode_produk.  "-0" . $i; 
				$k = $tahun . $kode_produk.  "-" . $temporary; //49
				$data = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$j' and kode_produk='$kode_produk';");
				while($d = mysqli_fetch_array($data)){  //50
					$demand = ceil($d['smoothing']);  //51
				}
				mysqli_query($this->con, "UPDATE peramalan_penjualan SET peramalan='$demand' WHERE ID ='$k' 
                and kode_produk='$kode_produk'"); //52
			}  //53
			else {
				$temporary = $i + 1;
				$j = $tahun . $kode_produk.  "-" . $i; 
				$k = $tahun .  $kode_produk."-" . $temporary; //54
				$data = mysqli_query($this->con,"select * from peramalan_penjualan where ID='$j' and kode_produk='$kode_produk';");
				while($d = mysqli_fetch_array($data)){  //55
					$demand = ceil($d['smoothing']); //56
				}
				mysqli_query($this->con, "UPDATE peramalan_penjualan SET peramalan='$demand' WHERE ID ='$k'
                 and kode_produk='$kode_produk'");  //57
			}
		} //58

	} //59
}
?>