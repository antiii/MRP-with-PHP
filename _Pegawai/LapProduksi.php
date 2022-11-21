<?php
include '../Controller/koneksi.php';
require('../assets/pdf/fpdf.php');

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
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Produksi",0,10,'C');
$pdf->ln(1);


				
	if (isset($_GET['tanggal'])){
$tanggal=$_GET['tanggal'];
$tgl_awal = substr($tanggal, 0, 10);
$tgl_akhir = substr($tanggal, 10, 20);
	
	}else{
		$tanggal = "";
	}






$pdf->SetFont('Arial','B',10);
$pdf->Cell(4,0.7,"Di cetak pada : ".date("d-m-Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Kode Produksi ', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Tanggal ', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Pre Order (pcs)', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Total', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Sisa', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
	if (isset($_GET['tanggal'])){
				$query=mysqli_query($con, "select * from produksi WHERE produksi_laporan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'");
				
			}else{
				$query = mysqli_query($con,"select * from produksi");
			}
		



while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['kode_produksi'],1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['produksi_tgl'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['produksi_sr'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['produksi_total'], 1, 0,'C');
	$pdf->Cell(2, 0.8, abs($lihat['produksi_jual']), 1, 1,'C');
	$no++;
}

$pdf->Output("laporan_produksi.pdf","I");

?>

