<?php

include 'model/sidang.php';
include 'model/mahasiswa.php';
include 'model/dokumen.php';
//include 'model/posts.php';

$siswa=new mhs();
$sidang = new sidang();
$doc = new dokumen();

//if ($sidang->cariJumlahMhs('2015-12-31')<20) {
//	echo "kurang dari 20<br>";

//	echo $sidang->cariJumlahMhs('2015-12-31');
//}
//echo $siswa->cekDir('coba/');
//echo $siswa->deleteFolderAndContent('coba/');
//$hitung = 26;
//
//$path='files/17111197/algoritma_DANDC.pdf';
//header("Content-disposition:attachment;filename=$path");
//readfile($path);
//$doc->bacaPDF($path);
$siswa->deleteFolderAndContent('cobaLagi/');
//"Rifzky;cool;classy";

//$data=explode( ";",$arr);

//echo $id."<br>";

#$siswa->selectSatuRecord('36111197');
#if (preg_match('/D3/', $siswa->getFakultas())) {
#	echo "D3";
#}else{
#	echo "S1";
#}
#echo $siswa->getFakultas();


#if ($sidang->insertData('16111195')) {
#	echo "success!";
#}


function generateIdSidang($hitung,$tanggal){
	$datas=array();

	$id=$hitung-(25*(intval($hitung/25)));
	
	$date = strtotime("+".intval($hitung/25)." day", strtotime($tanggal));
	$tanggalHasil= date("Y-m-d", $date);
	array_push($datas,$id,$tanggalHasil);
	return $datas;
}

$tanggal="2015-10-26";
//jumlahFile('D:/data/');

function jumlahFile($directory){
$filecount=0;
#$files=glob($directory."*"); //default
$files=glob($directory."*.{accdb,rar}",GLOB_BRACE);
if ($files) {
		$filecount=count($files);
	}
	echo "there were ". $filecount . " files";
}




?>


