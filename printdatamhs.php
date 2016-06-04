<?php 
require 'fpdf/fpdf.php';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Image('logo.jpg', 10, 6, 30);
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
$pdf->Ln();






$pdf->Output();
?>