<html>
<head>
    <title><?php 

            if (isset($_GET['appid'])&&$_GET['appid']=='register'){
                echo "Registrasi Mahasiswa";
            }else{
                echo "Update biodata";
            }
            ?>
    </title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

    #header{
        margin-top: 0px;
        background-color: darkslategrey;
    }
    #judul{
        text-align: center;
        color: white;
          font-family: cursive;
          font-size: 40px;
    }

    </style>
</head>

<body>

    <?php
    include '../model/mahasiswa.php';
        include '../model/dokumen.php';
        include '../model/login.php';
        $mhs = new mhs();
        $log= new login();
        
    ?>



<div class="wrapper">
<div id="header" class="page-header">
<div class="row">
<div class="col-md-12"><h1 id="judul">Biodata Sidang</h1></div>
</div>

</div>




<div class="container">

        <?php if (isset($_GET['appid'])&&$_GET['appid']=='register'){


            if (isset($_POST['npm'])&&isset($_POST['namaLengkap'])&&isset($_POST['fakultas'])&&isset($_POST['jurusan'])&&isset($_POST['email'])&&isset($_POST['telepon'])) {
          if ($mhs->insertData($_POST['npm'],$_POST['namaLengkap'],$_POST['fakultas'],$_POST['jurusan'],$_POST['email'],$_POST['telepon'])&&$log->tambahData($_POST['npm'],$_POST['username'],$_POST['password'])){
            $mhs->buatFolder('files',$_POST['npm']);
            echo "<script language='javascript'>";
            echo "alert('Data berhasil di input');";
            echo "window.location = '../index.php';";
            echo '</script>';
            }else{
            echo "<script language='javascript'>";
            echo "alert('Terjadi kesalahan pada sistem');";
            echo '</script>';
            }
        }



         ?>
            
        
    

        <form role="form" action=<?php echo "'".$_SERVER['SCRIPT_NAME']."?appid=register'"; ?> method="POST">
            
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" class="form-control" name="npm">
            </div>

            <div class="form-group">
                <label for="nama">NAMA</label>
                <input type="text" class="form-control" name="namaLengkap">
            </div>

            <div class="form-group">
                <label for="nama">FAKULTAS</label>
                <select class="form-control" name="fakultas">
                    <option selected>Pilih Fakultas Anda</option>
                    <option value="Ilmu Komputer dan Teknologi Informasi">Ilmu Komputer dan Teknologi Informasi</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Sipil dan Perencanaan">Teknik Sipil dan Perencanaan</option>
                    <option value="Psikologi">Psikologi</option>
                    <option value="Ilmu komunikasi">Ilmu Komunikasi</option>
                    <option value="Sastra">Sastra</option>
                    <option value="Kebidanan">Kebidanan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama">JURUSAN</label>
                <select class="form-control" name="jurusan">
                    <option selected>Pilih Jurusan Anda</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Sistem Komputer">Sistem Komputer</option>
                    <option value="D3 Managemen Informatika">Managemen Informatika</option>
                    <option value="D3 Teknik Komputer">Teknik Komputer</option>
                    <option value="Ekonomi Akuntansi">Ekonomi Akuntansi</option>
                    <option value="Ekonomi Managemen">Ekonomi Managemen</option>
                    <option value="Managemen Komputer">Managemen Komputer</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                    <option value="Psikologi">Psikologi</option>
                    <option value="Ilmu komunikasi">Ilmu Komunikasi</option>
                    <option value="Sastra Inggris">Sastra</option>
                    <option value="D3 Kebidanan">Kebidanan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama">EMAIL</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label for="nama">TELEPON</label>
                <input type="text" class="form-control" name="telepon">
            </div>

            <div class="form-group">
                <label for="nama">USERNAME</label>
                <input type="username" class="form-control" name="username">
            </div>

            <div class="form-group">
                <label for="nama">PASSWORD</label>
                <input type="password" class="form-control" name="password">
            </div>
        
        <div class="form-inline">
            <button class="btn btn-primary">Submit</button>
            <a href="../index.php" class="btn btn-primary">Cancel</a>
        </div>
        
        
        </form>
    <?php }elseif (isset($_GET['appid'])&&$_GET['appid']=='update') {
        session_start();
        $mhs->selectSatuRecord($_SESSION['login']);
        if (isset($_POST['namaLengkap'])&&isset($_POST['fakultas'])&&isset($_POST['jurusan'])&&isset($_POST['email'])&&isset($_POST['telepon'])) {
            echo $mhs->updateData($_SESSION['login'],$_POST['namaLengkap'],$_POST['fakultas'],$_POST['jurusan'],$_POST['email'],$_POST['telepon']);
            echo "<script language='javascript'>";
            echo "window.location = 'index.php';";
            echo '</script>';
        }



    ?>

    <form role="form" action=<?php echo "'".$_SERVER['SCRIPT_NAME']."?appid=update'"; ?> method="POST">
            <!--
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" class="form-control" name="npm" value=<?php echo "'".$mhs->getNPM()."'";?>>
            </div>
            -->
            <div class="form-group">
                <label for="namaLengkap">NAMA</label>
                <input type="text" class="form-control" name="namaLengkap" value=<?php echo "'".$mhs->getNama()."'";?>>
            </div>

            <div class="form-group">
                <label for="nama">FAKULTAS</label>
                <select class="form-control" name="fakultas">
                    <option value=<?php echo "'".$mhs->getFakultas()."'";?> selected><?php echo $mhs->getFakultas();?></option>
                    <option value="Ilmu Komputer dan Teknologi Informasi">Ilmu Komputer dan Teknologi Informasi</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Sipil dan Perencanaan">Teknik Sipil dan Perencanaan</option>
                    <option value="Psikologi">Psikologi</option>
                    <option value="Ilmu komunikasi">Ilmu Komunikasi</option>
                    <option value="Sastra">Sastra</option>
                    <option value="Kebidanan">Kebidanan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama">JURUSAN</label>
                <select class="form-control" name="jurusan">
                    <option value=<?php echo "'".$mhs->getJurusan()."'";?> selected><?php echo $mhs->getJurusan();?></option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Sistem Komputer">Sistem Komputer</option>
                    <option value="D3 Managemen Informatika">Managemen Informatika</option>
                    <option value="D3 Teknik Komputer">Teknik Komputer</option>
                    <option value="Ekonomi Akuntansi">Ekonomi Akuntansi</option>
                    <option value="Ekonomi Managemen">Ekonomi Managemen</option>
                    <option value="Managemen Komputer">Managemen Komputer</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Sipil">Teknik Sipil</option>
                    <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                    <option value="Psikologi">Psikologi</option>
                    <option value="Ilmu komunikasi">Ilmu Komunikasi</option>
                    <option value="Sastra Inggris">Sastra</option>
                    <option value="D3 Kebidanan">Kebidanan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama">EMAIL</label>
                <input type="email" class="form-control" name="email" value=<?php echo "'".$mhs->getEmail()."'";?>>
            </div>

            <div class="form-group">
                <label for="nama">TELEPON</label>
                <input type="text" class="form-control" name="telepon" value=<?php echo "'".$mhs->getTelp()."'";?>>
            </div>

            <!--

            <div class="form-group">
                <label for="nama">USERNAME</label>
                <input type="username" class="form-control" name="username">
            </div>

            <div class="form-group">
                <label for="nama">PASSWORD</label>
                <input type="password" class="form-control" name="password">
            </div>

            -->

            <div class="form-group">
               <button class="btn btn-primary">Submit</button> 
                <a href='index.php' class='btn btn-warning'>Back to Locker</a>
            </div>
        

        
        </form>

    <?php } ?>
  

</div>


  </div>
</body>
</html>