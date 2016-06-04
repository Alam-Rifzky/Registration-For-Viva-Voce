<?php
include_once '../model/posts.php';
include_once '../model/sidang.php';

include_once '../model/mahasiswa.php';
include_once '../model/dokumen.php';
include_once '../model/login.php';


if (($_GET['tipe'])=='post'&&$_GET['aksi']=='1') {
	if (isset($_GET['id'])) {
		$post=new postingan();
		if ($post->deletePost($_GET['id'])) {
			header('location: view-info.php?delete=ok');
		}
	}
}

if (($_GET['tipe'])=='sidang'&&$_GET['aksi']=='1') {
	if (isset($_GET['id'])) {
		$sidang=new sidang();
		if ($sidang->deletePost($_GET['id'])) {
			header('location: view-info.php?delete=ok');
		}
	}
}

if (($_GET['tipe'])=='mahasiswa'&&$_GET['aksi']=='1') {
	if (isset($_GET['id'])) {

		$oten= new login();
		$dok = new dokumen();
		$siswa = new mhs();

		$dok->define($_GET['id']);

		if ($siswa->deleteFolderAndContent('../'.$dok->getFolder().'/')) {
		$oten->hapusData($_GET['id']);
		$siswa->hapusRecord($_GET['id']);
		$dok->hapusData($_GET['id']);
		header('location: formmhs.php');
		}


	}
}



?>