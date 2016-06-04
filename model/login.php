<?php
include_once 'koneksi.php';
class login{
	
	var $id;
	var $username;
	var $password;

	public function setID($value){
		$this->id=$value;
	}

	public function getID(){
		return $this->id;
	}

	public function setUsername($value){
		$this->username=$value;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword($value){
		$this->password=$value;
	}

	public function getPassword(){
		return $this->password;
	}

	public function selectSatuData($atribut,$username){
		$query = "SELECT $atribut AS atribut FROM login where username='$username'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			return $query_row['atribut'];
			}
		}
	}

	public function aktifkanSesi($username){
		$this->setID($this->selectSatuData('id',$username));
	}

	public function inputNormal1($id,$value){
		
	}

	public function coba($value){
		return "ok";
	}

	public function tambahData($id,$username,$password){
		$password=md5($password);
		$query ="INSERT INTO login (id,username,password) VALUES('$id','$username','".$password."')";
		if ($query_run=mysql_query($query)){
			return true;
		}
	}

	public function hapusData($id){
		$query ="DELETE FROM login WHERE id='$id'";
		if ($query_run=mysql_query($query)){
			return true;
		}
	}

	public function message($str){
		return "<script language='javascript'>alert('".$str."');</script>";
	}

	public function gantiPassword($passbaru,$username){
		$passbaru=md5($passbaru);
		$query="UPDATE login SET password='$passbaru' WHERE username='$username'";
		if ($query_run=mysql_query($query)){
			return $this->message('Password Berhasil Diubah');
		}else{
			return $this->message('Kesalahan pada query data');
		}
	}
	
	public function auth($username,$password){
		$password=md5($password);
		$query = "SELECT id,username FROM login where username='$username' AND password='". mysql_real_escape_string($password)."'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				if (!empty($query_row['username'])&&!empty($query_row['id'])) {
					$this->setID($query_row['id']);
					$this->setUsername($query_row['username']);
					return true;
				}else{
					return false;
				}
			}
		}
	}

	public function isMahasiswa($id){
		$query = "SELECT nama FROM data_mhs WHERE npm='$id'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				if (!empty($query_row['nama'])) {
				return true;
				}else{
					return false;
				}	
			}
		}
	}

	public function isAdmin($id){
		$query = "SELECT nama FROM petugas WHERE nip='$id'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				if (!empty($query_row['nama'])) {
				return true;
				}else{
					return false;
				}	 
			}
		}
	}

}


?>