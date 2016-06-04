
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Registrasi Mahasiswa</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
        <?php
        include '../model/mahasiswa.php';
        include '../model/dokumen.php';
        include '../model/login.php';
        $mhs = new mhs();
        $log= new login();
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
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Universitas Gunadarma -  <span class="red">Bagian Sidang</span></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="register-container container">
            <div class="row">
                <div class="register span6">
                    <form action=<?php echo "'".$_SERVER['SCRIPT_NAME']."'"; ?> method="POST">
                        <h2>REGISTRASI <span class="red"><strong>Mahasiswa</strong></span></h2>
                        <label for="npm">NPM</label>
                        <input type="text" id="npm" name="npm" placeholder="Masukkan NPM anda">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" id="namaLengkap" name="namaLengkap" placeholder="Masukkan nama anda">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" id="fakultas" name="fakultas" placeholder="Masukkan fakultas anda">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan anda">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Masukkan e-mail anda">
                        <label for="telepon">Telepon/Hp</label>
                        <input type="text" id="telepon" name="telepon" placeholder="Masukkan nomor telepon rumah atau handphone anda">
                        <label for="telepon">Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukkan username anda">
                        <label for="telepon">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan password anda">
                        <button type="submit">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>

</html>

