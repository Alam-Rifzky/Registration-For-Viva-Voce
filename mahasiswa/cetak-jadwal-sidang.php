<?php

require '../fpdf/fpdf.php';
include_once '../model/mahasiswa.php';
$pelajar = new mhs();
$pdf=new FPDF();
$pdf->AddPage();
if (isset($_GET['npm'])&&!empty($_GET['npm'])) {
	include_once '../model/sidang.php';
	include_once '../model/mahasiswa.php';
	include_once '../model/dokumen.php';
	$siswa = new mhs();
	$dok = new dokumen;
    $siswa->selectSatuRecord($_GET['npm']);
	$sidang= new sidang();
	$dok->ambilDataValidD3($_GET['npm']);
	$sidang->cariJadwal($_GET['npm']);

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
$pdf->Cell(185, 3, 'Jadwal Sidang Sementara', 0, 2, "C");
$pdf->Ln();
$pdf->Cell(185, 3, 'Penulisan Ilmiah / Kerja Praktek', 0, 2, "C");
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','', 12);
$pdf->Cell(185,5,'Telah terima berkas permohonan ujian sidang Penulisan Ilmiah / Kerja Praktek dari : ',0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(10);
$pdf->Cell(30,5,'Nama',0,0,'L');
$pdf->Cell(2);
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(30,5,$siswa->getNama(),0,1,'L');
$pdf->Ln();

$pdf->Cell(10);
$pdf->Cell(30,5,'N.P.M',0,0,'L');
$pdf->Cell(2);
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(30,5,$_GET['npm'],0,1,'L');
$pdf->Ln();

$pdf->Cell(10);
$pdf->Cell(30,5,'Jurusan',0,0,'L');
$pdf->Cell(2);
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(30,5,$siswa->getJurusan(),0,1,'L');
$pdf->Ln();

$pdf->Cell(10);
$pdf->Cell(30,5,'D. Pembimbing',0,0,'L');
$pdf->Cell(2);
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(30,5,$dok->getNamaDospem(),0,1,'L');
$pdf->Ln();

$pdf->Cell(10);
$pdf->Cell(30,5,'Judul Penulisan',0,0,'L');
$pdf->Cell(2);
$pdf->Cell(5,5,':',0,0,'L');
$pdf->MultiCell(120,5,$dok->getJudulPenulisan());
$pdf->Ln();


$pdf->Cell(185,5,'Dijadwalkan untuk melakukan sidang Penulisan Ilmiah atau Kerja Praktek',0,0,'L');
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(10);
$pdf->Cell(30,5,'Tanggal',0,0,'L');
$pdf->Cell(2);
$pdf->Cell(5,5,':',0,0,'L');
$pdf->Cell(30,5,$sidang->getTglSidang(),0,1,'L');
$pdf->Ln();

if (preg_match('/D3/',$siswa->getJurusan())) {
	$pdf->SetFont('Arial','', 10);
$pdf->Cell(10);
$pdf->Cell(30,5,'Gedung & Urutan',0,0,'L');
$pdf->SetFont('Arial','', 12);
$pdf->Cell(2);
$pdf->Cell(5,5,':',0,0,'L');

	$pdf->Cell(30,5,'Kampus Kenari' . ' / ' . $sidang->getQueue(),0,1,'L');
}else{
$pdf->Cell(10);
$pdf->Cell(30,5,'Ruang & Waktu',0,0,'L');
$pdf->Cell(2);
$pdf->Cell(5,5,':',0,0,'L');
	$pdf->Cell(30,5,$sidang->getGedung() . ' / '.$sidang->getWaktu().' - '.$sidang->getQueue() ,0,1,'L');
}

$pdf->Ln();

$pdf->Output();

}else{
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
$pdf->Cell(185, 3, 'Jadwal Sidang Sementara', 0, 2, "C");
$pdf->Ln();
$pdf->Cell(185, 3, 'Penulisan Ilmiah / Kerja Praktek', 0, 2, "C");
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','', 12);
$pdf->Cell(185,5,'Anda Belum Terdaftar di Sistem Kami',0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Output();
}
?>