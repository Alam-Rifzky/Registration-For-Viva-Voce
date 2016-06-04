<?php
include_once 'koneksi.php';
class dokumen{
	var $npm;
	var $folder;
	var $doc_acc;
	var $doc_dospem;
	var $doc_ijazah;
	var $doc_bebasKeuangan;
	var $doc_fotoKecil;
	var $doc_fotoBesar;
	var $namaDospem;
	var $judulPenulisan;

	public function setNPM($value){
		$this->npm=$value;
	}

	public function getNPM(){
		return $this->npm;
	}

	public function setFolder($value){
		$this->folder=$value;
	}

	public function getFolder(){
		return $this->folder;
	}

	public function setDocAcc($value){
		$this->doc_acc=$value;
	}

	public function getDocAcc(){
		return $this->doc_acc;
	}

	public function setDocDospem($value){
		$this->doc_dospem=$value;
	}

	public function getDocDospem(){
		return $this->doc_dospem;
	}

	public function setDocIjazah($value){
		$this->doc_ijazah=$value;
	}

	public function getDocIjazah(){
		return $this->doc_ijazah;
	}

	public function setDocBebasKeuangan($value){
		$this->doc_bebasKeuangan=$value;
	}

	public function getDocBebasKeuangan(){
		return $this->doc_bebasKeuangan;
	}

	public function setDocFotoKecil($value){
		$this->doc_fotoKecil=$value;
	}

	public function getDocFotoKecil(){
		return $this->doc_fotoKecil;
	}

	public function setDocFotoBesar($value){
		$this->doc_fotoBesar=$value;
	}

	public function getDocFotoBesar(){
		return $this->doc_fotoBesar;
	}


	public function setNamaDospem($value){
		$this->namaDospem=$value;
	}

	public function getNamaDospem(){
		return $this->namaDospem;
	}


	public function setJudulPenulisan($value){
		$this->judulPenulisan=$value;
	}

	public function getJudulPenulisan(){
		return $this->judulPenulisan;
	}

	public function define($npm){
		$query="SELECT folder FROM pointer WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			//$this->setNPM($query_row['npm']);
			$this->setFolder($query_row['folder']);
			//$this->setFiles($query_row['file']);
			}
		}
	}

	public function getAllDatas($npm){
		$query="SELECT * FROM pointer WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			$this->setFolder($query_row['folder']);	
			$this->setDocAcc($query_row['surat_acc']);
			$this->setDocDospem($query_row['nilai_dospem']);
			$this->setDocIjazah($query_row['ijazah']);
			$this->setDocBebasKeuangan($query_row['bukti_bk']);
			$this->setDocFotoKecil($query_row['foto_3x4']);
			$this->setDocFotoBesar($query_row['foto_4x6']);
			$this->setNamaDospem($query_row['nama_dospem']);
			$this->setJudulPenulisan($query_row['judul_penulisan']);
			}
		}
	}

	public function ambilDataValidD3($npm){
		$query="SELECT surat_acc,nilai_dospem,ijazah,bukti_bk,foto_3x4,foto_4x6,nama_dospem,judul_penulisan FROM pointer WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			//$this->setNPM($query_row['npm']);
			$this->setDocAcc($query_row['surat_acc']);
			$this->setDocDospem($query_row['nilai_dospem']);
			$this->setDocIjazah($query_row['ijazah']);
			$this->setDocBebasKeuangan($query_row['bukti_bk']);
			$this->setDocFotoKecil($query_row['foto_3x4']);
			$this->setDocFotoBesar($query_row['foto_4x6']);
			$this->setNamaDospem($query_row['nama_dospem']);
			$this->setJudulPenulisan($query_row['judul_penulisan']);
			//$this->setFiles($query_row['file']);
			}
		}
	}

	public function ambilDataValidS1($npm){
		$query="SELECT surat_acc,nilai_dospem,foto_4x6,nama_dospem,judul_penulisan FROM pointer WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			//$this->setNPM($query_row['npm']);
			$this->setDocAcc($query_row['surat_acc']);
			$this->setDocDospem($query_row['nilai_dospem']);
			$this->setDocFotoBesar($query_row['foto_4x6']);
			//$this->setFiles($query_row['file']);
			$this->setNamaDospem($query_row['nama_dospem']);
			$this->setJudulPenulisan($query_row['judul_penulisan']);

			}
		}
	}

/*
				$this->setDocAcc($query_row['surat_acc']);
				$this->setDocDospem($query_row['nilai_dospem']);
				$this->setDocFotoBesar($query_row['foto_4x6']);
				*/

	function tentukanData($value){
		if ($value=='acc') {
			return "surat_acc";
		}elseif ($value=='nilaiDospem') {
			return "nilai_dospem";
		}elseif ($value=='bebasKeuangan') {
			return "bukti_bk";
		}elseif ($value=='ijz') {
			return "ijazah";
		}elseif ($value=='fotoKecil') {
			return "foto_3x4";
		}elseif ($value=='fotoBesar') {
			return "foto_4x6";
		}
	}

	function updateNamaDospem($value,$npm){
		$query="UPDATE pointer SET nama_dospem = '$value' WHERE npm ='$npm'";
		if ($query_run=mysql_query($query)) {
			return "<script language='javascript'>alert('data Dosen Pembimbing telah di ubah');</script>";
		}else{
			return "<script language='javascript'>alert('data gagal di ubah, bila mengalami kesulitan harap melapor ke petugas');</script>";
		}
		
	}

	public function hapusData($npm){
		$query ="DELETE FROM pointer WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			return true;
		}
	}

	function updateJudulPenulisan($value,$npm){
		$query="UPDATE pointer SET judul_penulisan = '$value' WHERE npm ='$npm'";
		if ($query_run=mysql_query($query)) {
			return "<script language='javascript'>alert('Judul Penulisan Anda telah di set');</script>";
		}else{
			return "<script language='javascript'>alert('Judul Penulisan gagal di set, bila mengalami kesulitan harap melapor ke petugas');</script>";
		}
		
	}

	function updateFile($atribut,$value,$npm){
		$query="UPDATE pointer SET $atribut = '$value' WHERE npm ='$npm'";
		if ($query_run=mysql_query($query)) {
			return "<script language='javascript'>alert('File berhasil di upload');</script>";
		}else{
			return "<script language='javascript'>alert('File gagal di upload ke database, bila mengalami kesulitan harap melapor ke petugas');</script>";
		}
		
	}

	public function uploadFile($npm,$tipe,$tmp_name,$folder,$fileName){

		if(move_uploaded_file($tmp_name, $folder.$fileName)){
			return $this->updateFile($this->tentukanData($tipe),$fileName,$npm);
		}else{
			return "<script language='javascript'>alert('File gagal di upload ke folder, bila mengalami kesulitan harap melapor ke petugas');</script>";
		}
	
	}

	public function message($str){
		return "<script language='javascript'>alert('".$str."');</script>";
	}

	public function cekFileGambar($fileName){
		$allowed = array('gif','jpg','png');
		$ext= pathinfo($fileName,PATHINFO_EXTENSION);
		if (in_array($ext, $allowed)) {
			return true;
		}else{
			return false;
		}
	}

	public function cekFileDokumen($fileName){
		$allowed = array('pdf');
		$ext= pathinfo($fileName,PATHINFO_EXTENSION);
		if (in_array($ext, $allowed)) {
			return true;
		}else{
			return false;
		}
	}

	public function downloadFile($path){
		header("Content-disposition:attachment;filename=$path");
		readfile($path);
	}

	public function openImage($path,$type){
		header("Content-type:".$type);
		readfile($path);
	}

	public function bacaPDF($path){
		header("Content-type:application/pdf");
		header("Content-disposition:inline;filename=$path");
		header("Content-Transfer-Encoding:binary");
		header("Content-Length:".filesize($path));
		header("Accept-Ranges: bytes");
		readfile($path);
	}


}



?>