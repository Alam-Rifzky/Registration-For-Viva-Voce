<?php
require 'fpdf/fpdf.php';
$nama='nanin';
$npm='12345678';
$jurusan='Sistem Informasi';
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
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(185, 3, 'Jadwal Sidang Semetara', 0, 2, "C");
$pdf->Ln();
$pdf->Cell(185, 8, 'Penulisan Ilmiah / Kerja Praktek', 0, 2, "C");
$pdf->Ln();
$pdf->SetFont('Arial','', 12);
$pdf->Cell(185, 4, 'Telah terima berkas permohonan ujian sidang Penulisan Ilmiah / Kerja Praktek dari : ', 0, 2, "L");
$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(20, 4, 'Nama : ', 0, 0, 'L');
$pdf->Cell(80, 4, $nama, 0, 2, 'L');
$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(20, 4, 'N.P.M : ', 0, 0, 'L');
$pdf->Cell(80, 4, $npm, 0, 2, 'L');
$pdf->Ln();
$pdf->Cell(20);
$pdf->Cell(30, 4, 'Jurusan : ', 0, 0, "L");
$pdf->Cell(80, 4, $jurusan, 0, 0, 'L');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B', 12);
$pdf->Cell(185, 4, 'Dijadwalkan untuk sidang', 0, 2, "L");
$pdf->Ln();
$pdf->SetFont('Arial','B', 12);
$pdf->Cell(185, 4, 'Tanggal :', 0, 2, "L");
$pdf->Ln();
$pdf->SetFont('Arial','B', 12);
$pdf->Cell(185, 4, 'Ruang & Waktu :', 0, 2, "L");
$pdf->Ln();
$pdf->SetFont('Arial','B', 12);
$pdf->Cell(185, 4, 'Gedung 2 Lantai 2 Depok.', 0, 2, "L");




$pdf->Output();

?>