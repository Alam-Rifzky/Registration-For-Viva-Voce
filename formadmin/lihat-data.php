<?php
include_once '../model/dokumen.php';
$doc = new dokumen();


if (isset($_GET['id'])&&isset($_GET['id'])&&$_GET['data']=='acc') {
	$doc->getAllDatas($_GET['id']);
	if (preg_match('/.pdf/', $doc->getDocAcc())) {
		$doc->bacaPDF('../'.$doc->getFolder().'/'.$doc->getDocAcc());
	}else{
		$doc->downloadFile('../'.$doc->getFolder().'/'.$doc->getDocAcc());
	}
	
}

if (isset($_GET['id'])&&isset($_GET['id'])&&$_GET['data']=='dospem') {
	$doc->getAllDatas($_GET['id']);
	//echo '../'.$doc->getFolder().'/'.$doc->getDocDospem();
	$doc->bacaPDF('../'.$doc->getFolder().'/'.$doc->getDocDospem());
}

if (isset($_GET['id'])&&isset($_GET['id'])&&$_GET['data']=='ijazah') {
	$doc->getAllDatas($_GET['id']);
	#echo '../'.$doc->getFolder().'/'.$doc->getDocAcc();
	$doc->bacaPDF('../'.$doc->getFolder().'/'.$doc->getDocIjazah());
}

if (isset($_GET['id'])&&isset($_GET['id'])&&$_GET['data']=='bebasKeuangan') {
	$doc->getAllDatas($_GET['id']);
	#echo '../'.$doc->getFolder().'/'.$doc->getDocAcc();
	$doc->bacaPDF('../'.$doc->getFolder().'/'.$doc->getDocBebasKeuangan());
}

if (isset($_GET['id'])&&isset($_GET['id'])&&$_GET['data']=='fotoKecil') {
	$doc->getAllDatas($_GET['id']);
	#echo '../'.$doc->getFolder().'/'.$doc->getDocAcc();
	if (preg_match('/.png/', $doc->getDocFotoKecil())) {
		$doc->openImage('../'.$doc->getFolder().'/'.$doc->getDocFotoKecil(),'image/png');
	}elseif (preg_match('/.jpg/', $doc->getDocFotoKecil())||preg_match('/.jpeg/', $doc->getDocFotoKecil())) {
		$doc->openImage('../'.$doc->getFolder().'/'.$doc->getDocFotoKecil(),'image/jpeg');
	}elseif (preg_match('/.gif/', $doc->getDocFotoKecil())) {
		$doc->openImage('../'.$doc->getFolder().'/'.$doc->getDocFotoKecil(),'image/gif');
	}	
}

if (isset($_GET['id'])&&isset($_GET['id'])&&$_GET['data']=='fotoBesar') {
	$doc->getAllDatas($_GET['id']);
	#echo '../'.$doc->getFolder().'/'.$doc->getDocAcc();
	if (preg_match('/.png/', $doc->getDocFotoBesar())) {
		$doc->openImage('../'.$doc->getFolder().'/'.$doc->getDocFotoBesar(),'image/png');
	}elseif (preg_match('/.jpg/', $doc->getDocFotoBesar())||preg_match('/.jpeg/', $doc->getDocFotoBesar())) {
		$doc->openImage('../'.$doc->getFolder().'/'.$doc->getDocFotoBesar(),'image/jpeg');
	}elseif (preg_match('/.gif/', $doc->getDocFotoBesar())) {
		$doc->openImage('../'.$doc->getFolder().'/'.$doc->getDocFotoBesar(),'image/gif');
	}	
}


?>