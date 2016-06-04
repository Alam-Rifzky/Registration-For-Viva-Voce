<?php
include_once '../model/dokumen.php';
$doc=new dokumen();
if (isset($_GET['f'])&&!empty($_GET['f'])) {
	switch ($_GET['f']) {
		case 'nilai-dp':
			$doc->downloadFile('nilaiDosenPembimbing.pdf');
			break;
		case 'lbr-isian-foto':
			$doc->downloadFile('isianFoto.pdf');
			break;
		case 'format-hardcover':
			$doc->downloadFile('formatHardcover.pdf');
			break;
		default:
			header('Location:index.php');
			break;
	}
}

?>