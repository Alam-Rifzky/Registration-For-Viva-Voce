<?php
include_once 'koneksi.php';
class petugas{
	
	var $nip;
	var $nama;
	var $telp;
	var $email;


	public function setNIP($value){
		$this->nip=$value;
	}

	public function getNIP(){
		return $this->nip;
	}

	public function setNama($value){
		$this->nama=$value;
	}

	public function getNama(){
		return $this->nama;
	}

	public function setEmail($value){
		$this->email=$value;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setTelp($value){
		$this->no_telp=$value;
	}

	public function getTelp(){
		return $this->no_telp;
	}

	public function kirimKeluhan($judul,$keluhan){
		$email_tujuan="rifzky.mail@gmail.com";
		
		mail($email_tujuan,$judul,$keluhan);
	}
	
	public function message($str){
		return "<script language='javascript'>alert('".$str."');</script>";
	}




}



?>