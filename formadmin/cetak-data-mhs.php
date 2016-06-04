<?php

require '../fpdf/fpdf.php';
include_once '../model/mahasiswa.php';
$pelajar = new mhs();
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Image('../post/logo.jpg', 15, 12, 25);
$pdf->SetFont('Arial','B', 16);
$pdf->Cell(35);
$pdf->Cell(40, 10, 'Universitas Gunadarma');
$pdf->Ln();
$pdf->SetFont('Arial','B', 12);
$pdf->Cell(35);
$pdf->Cell(40, 8, 'SK No.92/Dikti/Kep/1996');
$pdf->Ln();
$pdf->SetFont('Arial','B', 10);
$pdf->Cell(35);
$pdf->Cell(40, 4, 'Fakultas Ilmu Komputer, Teknologi Industri, Ekonomi,');
$pdf->Ln();
$pdf->Cell(35);
$pdf->Cell(40, 8, 'Teknik Sipil & Perencanaan, Psikolog, Sastra');
$pdf->Ln();
$pdf->Ln();
$pdf->SetLineWidth(0.75);
$pdf->Line(10,40,190,40);
$pdf->SetLineWidth(0.25);
$pdf->Line(10,41,190,41);
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(185, 3, 'DATA MAHASISWA', 0, 2, "C");
$pdf->Ln();
$pdf->SetFont('Arial','B', 12);
 
#REGION HEADER
	$pdf->Cell(30,6,'NPM',1,0,'C');
	$pdf->Cell(60,6,'NAMA',1,0,'C');
	$pdf->Cell(60,6,'JURUSAN',1,0,'C');
	$pdf->Cell(30,6,'TANGGAL',1,0,'C');
	$pdf->Ln();
#END REGION

$pdf->SetFont('Arial','', 12);

if (isset($_GET['tanggal'])&&!empty($_GET['tanggal'])&&isset($_GET['d3'])&&isset($_GET['s1'])) {
#REGION data
	$datas=$pelajar->cetakDataJadwal($_GET['tanggal'],'');
	for ($i=0; $i <count($datas) ; $i++) { 
		$pdf->Cell(30,5,$datas[$i][0],1,0,'C');
		$pdf->Cell(60,5,$datas[$i][1],1,0,'L');
		$pdf->Cell(60,5,$datas[$i][2],1,0,'L');
		$pdf->Cell(30,5,$datas[$i][3],1,0,'L');
		$pdf->Ln();
	}
#END REGION
}elseif (isset($_GET['tanggal'])&&!empty($_GET['tanggal'])&&isset($_GET['d3'])) {
	#REGION data
	$datas=$pelajar->cetakDataJadwal($_GET['tanggal'],'D3');
	for ($i=0; $i <count($datas) ; $i++) { 
		$pdf->Cell(30,5,$datas[$i][0],1,0,'C');
		$pdf->Cell(60,5,$datas[$i][1],1,0,'L');
		$pdf->Cell(60,5,$datas[$i][2],1,0,'L');
		$pdf->Cell(30,5,$datas[$i][3],1,0,'L');
		$pdf->Ln();
	}
#END REGION
}elseif (isset($_GET['tanggal'])&&!empty($_GET['tanggal'])&&isset($_GET['s1'])) {
	#REGION data
	$datas=$pelajar->cetakDataJadwal($_GET['tanggal'],'S1');
	for ($i=0; $i <count($datas) ; $i++) { 
		$pdf->Cell(30,5,$datas[$i][0],1,0,'C');
		$pdf->Cell(60,5,$datas[$i][1],1,0,'L');
		$pdf->Cell(60,5,$datas[$i][2],1,0,'L');
		$pdf->Cell(30,5,$datas[$i][3],1,0,'L');
		$pdf->Ln();
	}
#END REGION
}



	



$pdf->Output();



?>