<?php
include_once 'koneksi.php';
class postingan{

	var $idPetugas;
	var $judul;
	var $isi;
	var $tglPosting;
	var $gambar;
	var $folder='../post/';

	public function setIdPetugas($value){
		$this->idPetugas=$value;
	}

	public function getIdPetugas(){
		return $this->idPetugas;
	}

	public function setJudul($value){
		$this->judul=$value;
	}

	public function getJudul(){
		return $this->judul;
	}

	public function setIsi($value){
		$this->isi=$value;
	}

	public function getIsi(){
		return $this->isi;
	}

	public function setTglPosting($value){
		$this->tglPosting=$value;
	}

	public function getTglPosting(){
		return $this->tglPosting;
	}

	public function setGambar($value){
		$this->gambar=$value;
	}

	public function getGambar(){
		return $this->gambar;
	}

	public function selectSatuPost($judul){
		$query = "SELECT judul,isi,tgl_posting,gambar FROM info WHERE judul='$judul'";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				$this->setJudul($query_row['judul']);
				$this->setIsi($query_row['isi']);
				$this->setTglPosting($query_row['tgl_posting']);
				$this->setGambar($query_row['gambar']);
				array_push($datas,array($query_row['judul'],$query_row['isi'],$query_row['tgl_posting'],$query_row['gambar']));
			}
			return $datas;
		}
	}

	public function selectSatuPost2($judul){
		$query = "SELECT judul,isi,tgl_posting,gambar FROM info WHERE judul='$judul'";
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				$this->setJudul($query_row['judul']);
				$this->setIsi($query_row['isi']);
				$this->setTglPosting($query_row['tgl_posting']);
				$this->setGambar($query_row['gambar']);
			}
		}
	}

	public function showPosts(){			
		$query = "SELECT id_petugas,judul,isi,tgl_posting,gambar FROM info";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				array_push($datas,array($query_row['id_petugas'],$query_row['judul'],$query_row['isi'],$query_row['tgl_posting'],$query_row['gambar']));
			}
			return $datas;
		}
	}	

	public function showPostsForHome(){			
		$query = "SELECT judul,isi FROM info ORDER BY tgl_posting DESC";
		$datas= array();
		if ($query_run=mysql_query($query)){
			while ($query_row=mysql_fetch_assoc($query_run)) {
				array_push($datas,array($query_row['judul'],$query_row['isi']));
			}
			return $datas;
		}
	}

	

	public function templateIndex($judul,$isi,$gambar,$linkz){
		if (strlen($isi)>150) {
			$isi=substr($isi,0, 150).'...';
		}

		$myTemplate="
		<div class='row'>
                <div class='col-md-12'>
                    
                <div class='thumbnail'>
                	<img src='".$gambar."' alt='../post/image.jpg'>

                	<div class='caption'>
                		<h3>".$judul."</h3>
                		<p>".$isi."</p>
                		<p><a href='".$linkz."' class='btn btn-primary' role='button'>Selengkapnya</a></p>
                	</div>
                </div>      
                         
                </div>
                </div>

		";
		return $myTemplate;
	}


	public function templateTanpaImage($judul,$isi){
		$myTemplate="

		<div class='row'>
                <div class='container'>
                    <div class='page-header'>
                        <h1>".$judul."</h1>      
                    </div>
                    <div class='row'>
                    <p>".
                     $isi   
                    ."</p>

                    </div>
                          
                         
                </div>
                </div>

		";
		return $myTemplate;
	}

	public function templateDenganImage($judul,$isi,$gambar){
		$myTemplate="

		<div class='row'>
                <div class='col-md-12'>
                    
                <div class='thumbnail'>
                	<img src='".$gambar."' alt='../post/image.jpg'>

                	<div class='caption'>
                		<h3>".$judul."</h3>
                		<p>".$isi."</p>
                		
                	</div>
                </div>      
                         
                </div>
                </div>

		";
		return $myTemplate;
	}



	public function InsertNewPost($id_petugas,$judul,$isi,$tglPost,$waktu,$tmp_name,$fileName){
		if (!empty($id_petugas)&&!empty($isi)&&!empty($tglPost)){
			$query = "INSERT INTO info (id_petugas,judul,isi,tgl_posting,waktu,gambar) VALUES('$id_petugas','$judul','$isi','$tglPost','$waktu','$fileName')";		
			
			
			if ($query_run=mysql_query($query)) {
				move_uploaded_file($tmp_name, $this->folder.$fileName);
				return true;
			}else{
				return false;
			}
			
			
		}
	}

	public function uploadFile($npm,$tipe,$tmp_name,$fileName){
		if(move_uploaded_file($tmp_name, $folder.$fileName)){
			return $this->updateFile($this->tentukanData($tipe),$fileName,$npm);
		}else{
			return "<script language='javascript'>alert('File gagal di upload ke folder, bila mengalami kesulitan harap melapor ke petugas');</script>";
		}
	
	}

	public function deletePost($judul){
		$query = "DELETE FROM info WHERE judul='$judul'";
		$this->selectSatuPost2($judul);
		if ($query_run=mysql_query($query)) {
				unlink($this->folder.$this->getGambar());
				return true;
			}else{
				return false;
			}
	}



	public function updatePost($judul,$judul_baru,$isi,$gambar,$tmpGambar){
		$query = "UPDATE info SET judul='$judul_baru', isi='$isi', gambar='$gambar' WHERE judul='$judul'";
		$this->selectSatuPost2($judul);
		if ($query_run=mysql_query($query)) {
				@unlink($this->folder.$this->getGambar());
				@move_uploaded_file($tmpGambar, $this->folder.$gambar);
				return true;
			}else{
				return false;
			}
	}

	public function updatePostTanpaGambar($judul,$judul_baru,$isi){
		$query = "UPDATE info SET judul='$judul_baru', isi='$isi' WHERE judul='$judul'";
		if ($query_run=mysql_query($query)) {
				return true;
			}else{
				return false;
			}
	}


}


?>