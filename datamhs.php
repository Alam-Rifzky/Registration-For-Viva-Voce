<?php 
session_start();
if ($_SESSION['login']) {
?>

<title>Data Mahasiswa</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/daftarsidang/style.css">

<div id="judul" class="well">
<h2 style="text-align:center">Data Mahasiswa</h2>
<h3 style="text-align:center">Mahasiswa wajib mengisi form dibawah ini !</h3>
</div>

<form>
<table>
<tr><td>Nama :</td><td><input type="text" name="nama"></td></tr>
<tr><td>NPM :</td><td><input type="text" name="npm"></td></tr>
<tr><td>Fakultas :</td><td><select name="fakultas">
	<option>Ekonomi</option>
	<option>Ilmu Komputer</option>
	<option>Teknik Industri</option>
	<option>Sastra</option>
	<option>Teknik Sipil dan Perencanaan</option>
	<option>Psikologi</option>
<tr><td>Jurusan :</td><td><select name="jurusan">
	<option></option>
</select></td></tr>
<tr><td><label>Foto 3X4</label></td><td><input type="file" name="foto3x4"></td></tr>
<tr><td><label>Foto 4X6</label></td><td><input type="file" name="foto4x6"></td></tr>
<tr><td><button id="btnUnggah" class="btn-success">Save&Next</button></td></tr>

</table>
</form>
<div id="logout"><a href=<?php echo "'"."logout.php"."'"; ?>"#" class="btn btn-info">Logout</a></div>

<?php }else{

header('Location: index.php');

}?>