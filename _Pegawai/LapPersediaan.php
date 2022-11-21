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
$pdf->Cell(25.5,0.7,"Laporan Persediaan",0,10,'C');
$pdf->ln(1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(4,0.7,"Di cetak pada : ".date("d-m-Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Kode  ', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Bahan Baku', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Persediaan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Satuan', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
	

	$query = mysqli_query($con,"select * from bahanbaku");
		



while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['kode_bahan_baku'],1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama_bahan_baku'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['jumlah_bahan_baku'], 1, 0,'C');

	$pdf->Cell(2, 0.8, $lihat['satuan'], 1, 1,'C');
	$no++;
}

$pdf->Output("laporan_persediaan.pdf","I");

?>

