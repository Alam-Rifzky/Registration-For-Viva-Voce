<?php
session_start();
if ($_SESSION['login']) {
include 'model/mahasiswa.php';
include 'model/dokumen.php';
include 'model/login.php';
$sesi = new login();
$sesi->aktifkanSesi($_SESSION['login']);
$mahasiswa= new mhs();
?>


<html>
<head>
	<title>Pendaftaran Sidang PI D3</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/daftarsidang/style.css">
</head>
<body>

<?php
$doc= new dokumen();
$doc->define($sesi->getID());

@$namafile = $_FILES['suratacc']['name'];
@$namafile2 = $_FILES['nilaidospem']['name'];
@$namafile3 = $_FILES['ijazah']['name'];
@$namafile4 = $_FILES['buktibk']['name'];


@$tmp_name = $_FILES['suratacc']['tmp_name'];
@$tmp_name2 = $_FILES['nilaidospem']['tmp_name'];
@$tmp_name3 = $_FILES['ijazah']['tmp_name'];
@$tmp_name4 = $_FILES['buktibk']['tmp_name'];

if (isset($namafile)&&isset($namafile2)&&isset($namafile3)&&isset($namafile4)) {
	if(!empty($namafile)&&!empty($namafile2)&&!empty($namafile3)&&!empty($namafile4)){
	//$location = 'files/';


		if(move_uploaded_file($tmp_name, $doc->getFolder().'/'.$namafile)){
			echo "<script language='javascript'>";
            echo "alert('File-1 berhasil di upload');";
            echo '</script>';
		}else{belumDaftar()}
		if(move_uploaded_file($tmp_name2, $doc->getFolder().'/'.$namafile2)){
			echo "<script language='javascript'>";
            echo "alert('File-2 berhasil di upload');";
            echo '</script>';
		}else{belumDaftar()}
		if(move_uploaded_file($tmp_name3, $doc->getFolder().'/'.$namafile3)){
			echo "<script language='javascript'>";
            echo "alert('File-3 berhasil di upload');";
            echo '</script>';
		}else{belumDaftar()}
		if(move_uploaded_file($tmp_name4, $doc->getFolder().'/'.$namafile4)){
			echo "<script language='javascript'>";
            echo "alert('File-4 berhasil di upload');";
            echo '</script>';
		}else{belumDaftar()}

	}else{
		echo "input file!";
	}
}

	function belumDaftar(){
			echo "<script language='javascript'>";
            echo "alert('Anda tidak memiliki folder pada sistem, silahkan hubungi petugas!');";
            echo '</script>';
	}
?>



	<div id="judul" class="well"><h2 style="text-align:center">Pendaftaran Sidang PI Untuk D3</h2></div>
<div id="form">
	<form action="daftar-sidang.php" method="POST" enctype="multipart/form-data">
		<div id="judulForm"><h2>Unggah Berkas</h2></div>
<table>
<tr><td>Surat ACC :</td><td><input type="file" name="suratacc"></td></tr>
<tr><td>Nilai Dosen Pembimbing :</td><td><input type="file" name="nilaidospem"></td></tr>
<tr><td>Ijazah SMA:</td><td><input type="file" name="ijazah"></td></tr>
<tr><td>Bukti Bebas Keuangan :</td><td><input type="file" name="buktibk"></td></tr>
<tr><td><button id="btnUnggah" class="btn-success">Unggah</button></td></tr>
</table>

</form></div>
<div id="logout"><a href=<?php echo "'"."logout.php"."'"; ?>"#" class="btn btn-info" >Logout</a></div>
</body>
</html>

<?php }else{

header('Location: index.php');

}?>