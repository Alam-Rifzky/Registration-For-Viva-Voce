<?php
session_start();
if ($_SESSION['login']) {

@$namafile = $_FILES['suratacc']['name'];
@$namafile2 = $_FILES['nilaidospem']['name'];

@$tmp_name = $_FILES['suratacc']['tmp_name'];
@$tmp_name2 = $_FILES['nilaidospem']['tmp_name'];


if (isset($namafile)&&isset($namafile2)) {
	if(!empty($namafile)&&!empty($namafile2)){
	$location = 'files/';
		if(move_uploaded_file($tmp_name, $location.$namafile)){echo "file berhasil di upload";}
		if(move_uploaded_file($tmp_name2, $location.$namafile2)){echo "file2 berhasil di upload";}
		

}else{
	echo "input file!";
	}
}

?>
<html>
<head>
	<title>Pendaftaran Sidang PI S1</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/daftarsidang/style.css">
</head>
<body>
	<div id="judul" class="well"><h2 style="text-align:center">Pendaftaran Sidang PI Untuk S1</h2></div>
<div id="form">
	<form action="daftar-sidang-s1.php" method="POST" enctype="multipart/form-data">
		<div id="judulForm"><h2>Unggah Berkas</h2></div>
<table>
<tr><td>Surat ACC :</td><td><input type="file" name="suratacc"></td></tr>
<tr><td>Nilai Dosen Pembimbing :</td><td><input type="file" name="nilaidospem"></td></tr>
<tr><td><button id="btnUnggah" class="btn-success">Unggah</button></td></tr>
</table>

</form></div>
<div id="logout"><a href=<?php echo "'"."logout.php"."'"; ?>"#" class="btn btn-info">Logout</a></div>
</body>
</html>

<?php }else{

header('Location: index.php');

}?>