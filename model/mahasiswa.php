<?php
include_once 'koneksi.php';
include_once 'sidang.php';

class mhs{
	
	var $npm;
	var $nama;
	var $jurusan;
	var $fakultas;
	var $email;
	var $no_telp;
	var $folder;
	var $files;

	public function setNPM($value){
		$this->npm=$value;
	}

	public function getNPM(){
		return $this->npm;
	}

	public function setNama($value){
		$this->nama=$value;
	}

	public function getNama(){
		return $this->nama;
	}

	public function setJurusan($value){
		$this->jurusan=$value;
	}

	public function getJurusan(){
		return $this->jurusan;
	}

	public function setFakultas($value){
		$this->fakultas=$value;
	}

	public function getFakultas(){
		return $this->fakultas;
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

	public function setFolder($value){
		$this->folder=$value;
	}

	public function getFolder(){
		return $this->folder;
	}

	public function selectSatuRecord($value){
		$query = "SELECT * FROM data_mhs where npm='$value'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			$this->setNPM($query_row['npm']);
			$this->setNama($query_row['nama']);
			$this->setJurusan($query_row['jurusan']);
			$this->setFakultas($query_row['fakultas']);
			$this->setEmail($query_row['email']);
			$this->setTelp($query_row['no_tlp']);
			}
		}
	}



	public function RecordsByNama($value){
		$query = "SELECT * FROM data_mhs where nama LIKE '%$value%'";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['fakultas'],$query_row['jurusan'],$query_row['email'],$query_row['no_tlp']));
			}
			return $datas;
		}
	}

	public function RecordsByNPM($value){
		$query = "SELECT * FROM data_mhs where npm LIKE '%$value%'";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['fakultas'],$query_row['jurusan'],$query_row['email'],$query_row['no_tlp']));
			}
			return $datas;
		}
	}

	public function RecordsByJurusan($jurusan){
		if ($jurusan=='D3'||$jurusan=='d3') {
			$query = "SELECT * FROM data_mhs WHERE jurusan LIKE '%D3%'";	
		}elseif ($jurusan=='S1'||$jurusan=='s1') {
			$query = "SELECT * FROM data_mhs WHERE jurusan NOT LIKE '%D3%'";
		}
		
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['fakultas'],$query_row['jurusan'],$query_row['email'],$query_row['no_tlp']));
			}
			return $datas;
		}
	}

	public function WaitListByNama($value){
		$query = "SELECT data_mhs.npm AS npm,nama,fakultas,jurusan,tanggal,no_tlp FROM data_mhs,waiting_list WHERE data_mhs.npm = waiting_list.npm AND data_mhs.nama LIKE '%$value%' ORDER BY tanggal DESC";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['fakultas'],$query_row['jurusan'],$query_row['tanggal'],$query_row['no_tlp']));
			}
			return $datas;
		}
	}

	public function WaitListByNPM($value){
		$query = "SELECT data_mhs.npm AS npm,nama,fakultas,jurusan,tanggal,no_tlp FROM data_mhs,waiting_list WHERE data_mhs.npm = waiting_list.npm AND data_mhs.npm LIKE '%$value%' ORDER BY tanggal DESC";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['fakultas'],$query_row['jurusan'],$query_row['tanggal'],$query_row['no_tlp']));
			}
			return $datas;
		}
	}


	public function hitungJumlah(){
		$query = "SELECT COUNT(npm) AS jumlah FROM data_mhs";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				return $query_row['jumlah'];
			}
		}
	}

	public function getAllRecords(){
		$query = "SELECT * FROM data_mhs";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['fakultas'],$query_row['jurusan'],$query_row['email'],$query_row['no_tlp']));
			}
			return $datas;
		}
	}

	public function getWaitingList(){
		$query = "SELECT data_mhs.npm AS npm,nama,fakultas,jurusan,tanggal,no_tlp FROM data_mhs,waiting_list WHERE data_mhs.npm=waiting_list.npm ORDER BY tanggal ASC";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['fakultas'],$query_row['jurusan'],$query_row['tanggal'],$query_row['no_tlp']));
			}
			return $datas;
		}
	}

	public function showToAdmin(){
		$query = "SELECT data_mhs.npm AS npm,nama,jurusan,tanggal,nomor FROM data_mhs,sidang WHERE data_mhs.npm=sidang.npm ORDER BY tanggal DESC";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				if (preg_match('/D3/', $query_row['jurusan'])) {
					array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['jurusan'],$query_row['tanggal'],'Kampus Kenari '));//.$query_row['nomor']));
				}else{
					$sidang = new sidang();
					$sidang->tentukanJadwal($query_row['nomor']);
					array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['jurusan'],$query_row['tanggal'],$sidang->getGedung() . ' / '.$sidang->getWaktu().' - '.$query_row['nomor']));
				}
			
			}
			return $datas;
		}
	}

	public function showToAdminByNPM($npm){
		$query = "SELECT data_mhs.npm AS npm,nama,jurusan,tanggal,nomor FROM data_mhs,sidang WHERE data_mhs.npm=sidang.npm AND data_mhs.npm='$npm'";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['jurusan'],$query_row['tanggal'],$query_row['nomor']));
			}
			return $datas;
		}
	}

	public function showToAdminByTanggal($tanggal){
		$query = "SELECT data_mhs.npm AS npm,nama,jurusan,tanggal,nomor FROM data_mhs,sidang WHERE data_mhs.npm=sidang.npm AND sidang.tanggal='$tanggal'";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['jurusan'],$query_row['tanggal'],$query_row['nomor']));
			}
			return $datas;
		}
	}

	public function cetakDataJadwal($tanggal,$jenjang){
		$query = "SELECT data_mhs.npm AS npm,nama,jurusan,tanggal,nomor FROM data_mhs,sidang WHERE data_mhs.npm=sidang.npm AND sidang.tanggal='$tanggal' AND sidang.jenjang LIKE '%$jenjang%'";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['jurusan'],$query_row['tanggal'],$query_row['nomor']));
			}
			return $datas;
		}
	}

	public function showToAdminByNama($nama){
		$query = "SELECT data_mhs.npm AS npm,nama,jurusan,tanggal,nomor FROM data_mhs,sidang WHERE data_mhs.npm=sidang.npm AND nama LIKE '%$nama%'";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
			array_push($datas,array($query_row['npm'],$query_row['nama'],$query_row['jurusan'],$query_row['tanggal'],$query_row['nomor']));
			}
			return $datas;
		}
	}

	public function insertData($npm,$nama,$fakultas,$jurusan,$email,$telp){
		if (!empty($npm)&&!empty($nama)&&!empty($fakultas)&&!empty($jurusan)&&!empty($email)&&!empty($telp)) {
			$query = "INSERT INTO data_mhs (npm,nama,fakultas,jurusan,email,no_tlp) VALUES('$npm','$nama','$fakultas','$jurusan','$email','$telp')";		
			if ($query_run=mysql_query($query)) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}	
	}

	public function hapusRecord($npm){
		$query = "DELETE FROM data_mhs WHERE npm='$npm'";		
		if ($query_run=mysql_query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function updateData($npm,$nama,$fak,$jur,$email,$telp){
		$query="UPDATE data_mhs SET nama='$nama',fakultas='$fak',jurusan='$jur',email='$email',no_tlp='$telp' WHERE npm='$npm'";
		if (mysql_query($query)){
				return "<script language='javascript'>alert('Data anda telah di ubah pada sistem kami');window.open('index.php');</script>";
			}else{
				return "<script language='javascript'>alert('Mohon maaf, ada kesalahan pada sistem harap melapor ke petugas');</script>";
			}
	}




	public function insertPointer($npm,$folder){
		$query ="INSERT INTO pointer (npm,folder) VALUES('$npm','$folder')";
		if ($query_run=mysql_query($query)) {
			return true;
		}else{
			return false;
		}
	}

	public function buatFolder($root,$npm){
			$filename = $root.'/'.$npm;
			if (!file_exists($filename)) {
				mkdir('../'.$root.'/'.$npm);
				$this->insertPointer($npm,$filename);
				$this->setFolder($filename);
			}
		}

	public function deleteData($npm){
			$filename = $root.'/'.$npm;
			if (!file_exists($filename)) {
				mkdir('../'.$root.'/'.$npm);
				$this->insertPointer($npm,$filename);
				$this->setFolder($filename);
			}
		}

	public function cekDir($path){
		if (is_file($path)) {
		 	echo "file";
		 } elseif (is_dir($path)) {
		 	echo "dir";
		 }
	}

	public function deleteFolderAndContent($dir){
		chmod($dir, 0755);
	if($dh = opendir($dir)){
    	while(($file = readdir($dh))!== false){
        	if(file_exists($dir.$file)) @unlink($dir.$file);
    	}
        closedir($dh);
        rmdir($dir);
        return true;
	}
	}


	}

	



?>