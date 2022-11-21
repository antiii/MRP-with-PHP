<?php
include '../Controller/koneksi.php';
require('../assets/pdf/fpdf.php');


//--------------------------------------------------------------------------------------PRINT HALAMAN PEMBELIAN BAHAN BAKU
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);

$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Ayam Geprek Family',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Kampung Melati',0,'L');
$pdf->SetX(4);

$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);



if (isset($_GET['kode'])){
$kode=$_GET['kode'];
$tgl_awal = substr($kode, 0, 10);
$tgl_akhir = substr($kode, 10, 20);
	
	//ambil supplier
$ambil_supplier = strpos($kode, "SUP"); 
if($ambil_supplier == NULL){
	$supplier = '';
}
else{
	$supplier = substr($kode, $ambil_supplier, 7);
}

//ambil bahanbaku
$ambil_bahanbaku = strpos($kode, "A");  
if($ambil_bahanbaku == NULL){
	$bahanbaku = '';
}
else{
	$bahanbaku = substr($kode, $ambil_bahanbaku, 5);
}

//Filtering
$bd_sup='';
if($supplier!=''){
$bd_sup= "AND pembelian.kode_supplier='".$supplier."'";
}
					
$bd_bb='';
if($bahanbaku!=''){
$bd_bb = "AND pembelian.kode_bahan_baku='".$bahanbaku."'";
}
					
$bd_tgl = '';


if($tgl_akhir!=null && $tgl_akhir!=null){
$bd_tgl = "AND pembelian.pb_laporan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'";
}

	}else{
		$kode = "";
	}


$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Pembelian",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d-m-Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Faktur', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Supplier', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Bahan Baku', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Jumlah Pembelian', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Status', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;

if (isset($_GET['kode'])){
	
				$query=mysqli_query($con, "SELECT * FROM pembelian INNER JOIN supplier ON pembelian.kode_supplier = supplier.kode_supplier INNER JOIN bahanbaku ON pembelian.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE pembelian.kode_faktur = pembelian.kode_faktur ".$bd_sup." ".$bd_bb." ".$bd_tgl." ");
				
			}else{
				$query=mysqli_query($con, "SELECT * FROM pembelian INNER JOIN supplier ON pembelian.kode_supplier = supplier.kode_supplier INNER JOIN bahanbaku ON pembelian.kode_bahan_baku = bahanbaku.kode_bahan_baku");
			}

while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['kode_faktur'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nama_supplier'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nama_bahan_baku'],1, 0, 'C');
	
	$pdf->Cell(5, 0.8, $lihat['pb_jumlah'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['pb_date'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['pb_status'], 1, 1,'C');
	$no++;
}

$pdf->Output("laporan_pembelian.pdf","I");

?>

