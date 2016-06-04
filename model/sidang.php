<?php
include_once 'koneksi.php';


class sidang
{

	var $tgl='2015-10-31';
	var $urutan;
	var $tgl_sidang;
	var $waktu;
	var $gedung;
	var $waiting_list_status;

	public function setQueue($value){
		$this->urutan=$value;
	}

	public function getQueue(){
		return $this->urutan;
	}

	public function setWaktu($value){
		$this->waktu=$value;
	}

	public function getWaktu(){
		return $this->waktu;
	}

	public function setGedung($value){
		$this->gedung=$value;
	}

	public function getGedung(){
		return $this->gedung;
	}

	public function setTglSidang($value){
		$this->tgl_sidang=$value;
	}

	public function getTglSidang(){
		return $this->tgl_sidang;
	}

	public function cariDataWaitingList($npm){
		$query="SELECT npm FROM waiting_list WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				if (!empty($query_row['npm'])) {
					return 'available';
				}else{
					return 'empty';
				}
			}
		}
	}

	public function cariDataKetWaitList($npm){
		$query="SELECT keterangan FROM waiting_list WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				return $query_row['keterangan'];
			}
		}
	}

	public function cariJadwal($npm){
		$query="SELECT nomor,tanggal FROM sidang WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				if (!empty($query_row['nomor'])&&!empty($query_row['tanggal'])) {
					$this->tentukanJadwal($query_row['nomor']);
					$this->setTglSidang($query_row['tanggal']);
					return true;
				}else{
					return false;
				}
			
			}
		}
	}

	public function cariDataSidang($npm){
		$query="SELECT nomor,tanggal FROM sidang WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				if (!empty($query_row['nomor'])&&!empty($query_row['tanggal'])) {
					$this->setQueue($query_row['nomor']);
					$this->setTglSidang($query_row['tanggal']);
					return true;
				}else{
					return false;
				}
			
			}
		}
	}

	public function cariKeteranganWaitingList($npm){
		$query="SELECT keterangan FROM waiting_list WHERE npm='$npm'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				if (!empty($query_row['keterangan'])) {
					return $query_row['keterangan'];
				}else{
					return '';
				}
			
			}
		}
	}


	public function tentukanJadwal($urutan){
		$nomor = intval($urutan);
		if ($nomor<=5) {
			$this->setQueue($nomor);
			$this->setWaktu('Pagi');
			$this->setGedung('Gedung D4 Lt.4 Ruangan: A');
		}elseif ($nomor<=10) {
			$this->setQueue($nomor-5);
			$this->setWaktu('Pagi');
			$this->setGedung('Gedung D4 Lt.4 Ruangan: B');
		}elseif ($nomor<=15) {
			$this->setQueue($nomor-10);
			$this->setWaktu('Pagi');
			$this->setGedung('Gedung D4 Lt.4 Ruangan: C');
		}elseif ($nomor<=20) {
			$this->setQueue($nomor-15);
			$this->setWaktu('Pagi');
			$this->setGedung('Gedung D4 Lt.4 Ruangan: D');
		}elseif ($nomor<=25) {
			$this->setQueue($nomor-20);
			$this->setWaktu('Siang');
			$this->setGedung('Gedung D4 Lt.4 Ruangan: A');
		}elseif ($nomor<=30) {
			$this->setQueue($nomor-25);
			$this->setWaktu('Siang');
			$this->setGedung('Gedung D4 Lt.4 Ruangan: B');
		}elseif ($nomor<=35) {
			$this->setQueue($nomor-30);
			$this->setWaktu('Siang');
			$this->setGedung('Gedung D4 Lt.4 Ruangan: C');
		}elseif ($nomor<=40) {
			$this->setQueue($nomor-35);
			$this->setWaktu('Pagi');
			$this->setGedung('Gedung D4 Lt.4 Ruangan: D');
		}else{
			$this->setWaktu('kesalahan pada sistem');
			$this->setGedung('kesalahan pada sistem');
		}
	}

	public function insertData($npm){
		//date format yy-mm-dd
		#INSERT INTO sidang VALUES('2015-12-31','16111197')
		if (!$this->cariJadwal($npm)) {
			$datas=$this->generateIdSidang('S1');
			$query ="INSERT INTO sidang (nomor,tanggal,npm,jenjang) VALUES('".$datas[0]."','".$datas[1]."','$npm','S1')";//"INSERT INTO sidang(nomor,tanggal,npm) VALUES('".$datas[0]."',".$datas[1]."','$npm')";
			if ($query_run=mysql_query($query)){
				return "<script language='javascript'>alert('Terimakasih, Anda telah mendaftar sidang untuk tanggal: " .$datas[1]. "');</script>";
			}else{
				return "<script language='javascript'>alert('Mohon maaf, ada kesalahan pada sistem harap melapor ke petugas');</script>";
			}	
		}else{
				return "<script language='javascript'>alert('Mohon maaf, Anda sudah terdaftar di sistem kami');</script>";
		}	
	}

public function insertDataSidangD3($npm){
		if (!$this->cariJadwal($npm)) {
			$datas=$this->generateIdSidang('D3');
			$query ="INSERT INTO sidang (nomor,tanggal,npm,jenjang) VALUES('".$datas[0]."','".$datas[1]."','$npm','D3')";//"INSERT INTO sidang(nomor,tanggal,npm) VALUES('".$datas[0]."',".$datas[1]."','$npm')";
			if ($query_run=mysql_query($query)){
				return "<script language='javascript'>alert('Terimakasih, Anda telah mendaftar sidang untuk tanggal: " .$datas[1]. "');</script>";
			}else{
				return "<script language='javascript'>alert('Mohon maaf, ada kesalahan pada sistem harap melapor ke petugas');</script>";
			}	
		}else{
				return "<script language='javascript'>alert('Mohon maaf, Anda sudah terdaftar di sistem kami');</script>";
		}	
	}



	public function insertDataWaitingList($npm){
		//date format yy-mm-dd

		#INSERT INTO sidang VALUES('2015-12-31','16111197')
		if (!$this->cariDataWaitingList($npm)=='available') {
			$query ="INSERT INTO waiting_list (npm,tanggal) VALUES('$npm','".date("Y-m-d")."')";			
			if ($query_run=mysql_query($query)){
				return "<script language='javascript'>alert('Terimakasih, Anda telah masuk ke daftar tunggu untuk jadwal sidang, lakukan verifikasi dokumen ke loket sidang.');</script>";
			}else{
				return "<script language='javascript'>alert('Mohon maaf, ada kesalahan pada sistem harap melapor ke petugas');</script>";
			}	
		}else{
			return "<script language='javascript'>alert('Mohon maaf, Anda sudah terdaftar di sistem kami');</script>";
		}
		
	}

	public function updateDataWaitingList($npm,$notif){
		$query ="UPDATE waiting_list SET keterangan='$notif' WHERE npm='$npm'";			
			if ($query_run=mysql_query($query)){
				return "<script language='javascript'>alert('Notifikasi telah dikirim kepada ".$npm."');</script>";
			}else{
				return "<script language='javascript'>alert('Mohon maaf, ada kesalahan pada sistem harap melapor ke Programmer bersangkutan');</script>";
			}
	}

	public function updateAntrianSidang($npm,$antrian){
		$query ="UPDATE sidang SET nomor='$antrian' WHERE npm='$npm'";			
			if ($query_run=mysql_query($query)){
				return "<script language='javascript'>alert('Antrian sidang ".$npm." telah dirubah');</script>";
			}else{
				return "<script language='javascript'>alert('Mohon maaf, ada kesalahan pada sistem harap melapor ke Programmer bersangkutan');</script>";
			}
	}

	public function deleteDataWaitingList($npm){
		$query ="DELETE FROM waiting_list WHERE npm='$npm'";			
			if ($query_run=mysql_query($query)){
				return "<script language='javascript'>alert('data ".$npm." telah dihapus dari waiting list!');</script>";
			}else{
				return "<script language='javascript'>alert('Mohon maaf, ada kesalahan pada sistem harap melapor ke Programmer bersangkutan');</script>";
			}
	}

	public function deleteDataSidang($npm){
		$query ="DELETE FROM sidang WHERE npm='$npm'";			
			if ($query_run=mysql_query($query)){
				return "<script language='javascript'>alert('data ".$npm." telah dihapus dari daftar sidang!');</script>";
			}else{
				return "<script language='javascript'>alert('Mohon maaf, ada kesalahan pada sistem harap melapor ke Programmer bersangkutan');</script>";
			}
	}



	function cariJumlahMhs($tipe){
		if (!$tipe=='') {
			$query ="SELECT COUNT(npm) AS JUMLAH FROM sidang WHERE jenjang='$tipe'";
			if ($query_run=mysql_query($query)){
				while ($query_row=mysql_fetch_assoc($query_run)) {
					return $query_row['JUMLAH'];
				}
			}
		}else{
			$query ="SELECT COUNT(npm) AS JUMLAH FROM sidang";
			if ($query_run=mysql_query($query)){
				while ($query_row=mysql_fetch_assoc($query_run)) {
					return $query_row['JUMLAH'];
				}
			}
		
		}
	}



	function generateIdSidang($tipe){
		$datas=array();
		if ($tipe=='D3') {
			$hitung= $this->cariJumlahMhs('D3');
		
			if ($hitung<70) {
				$id=$hitung+1;
			}else{
				$id=($hitung-(70*(intval($hitung/70))))+1;
			}

			$date = strtotime("+".intval($hitung/70)." day", strtotime($this->tgl));
			$tanggalHasil= date("Y-m-d", $date);
			array_push($datas,$id,$tanggalHasil);
			return $datas;

		}else{

			$hitung= $this->cariJumlahMhs('S1');
		
			if ($hitung<25) {
				$id=$hitung+1;
			}else{
				$id=($hitung-(25*(intval($hitung/25))))+1;
			}

			$date = strtotime("+".intval($hitung/25)." day", strtotime($this->tgl));
			$tanggalHasil= date("Y-m-d", $date);
			array_push($datas,$id,$tanggalHasil);
			return $datas;
		
		}
	
	}




}




?>