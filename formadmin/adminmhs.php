<?php 
session_start();
if ($_SESSION['login']) {
?>

<title>Data Mahasiswa</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/daftarsidang/style.css">

<div id="judul" class="well"><h2>Data Mahasiswa</h2>

<?php
echo date("l");
echo ",";
echo date("Y/m/d") ;
?>

</div>
<form>
<table>

<tr><td><input type="text" name="cari" size="15" maxlength="255"></td></tr>	
<tr><td><select name="pilihan">
<option value="Nama" selected="">Nama</option>
<option value="NPM">NPM</option>
</select></td></tr>	
<tr><td><button id="btnCari" class="btn-success">Cari</button></td></tr>


</table>
</form>
<div id="logout"><a href=<?php echo "'"."logout.php"."'"; ?>"#" class="btn btn-info">Logout</a></div>

<?php }else{

header('Location: index.php');

}?>