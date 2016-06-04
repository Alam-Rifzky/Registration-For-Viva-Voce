<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Mahasiswa</title>
    <?php include 'links.php';?>



<style type="text/css">

.ekstensii{
  text-align: center;
}

</style>
</head>

<body>


  <?php
session_start();
if ($_SESSION['login']) {
include '../model/mahasiswa.php';
include '../model/dokumen.php';
include '../model/login.php';
$sesi = new login();
$sesi->aktifkanSesi($_SESSION['login']);
$mahasiswa= new mhs();
$mahasiswa->selectSatuRecord($_SESSION['login']);
$doc= new dokumen();
$doc->define($_SESSION['login']);
$doc->setFolder($doc->getFolder().'/');


  function belumDaftar(){
      echo "<script language='javascript'>";
            echo "alert('Anda tidak memiliki folder pada sistem, silahkan hubungi petugas!');";
            echo '</script>';
  }
?>



    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <!-- Top Menu Items -->
                <?php include 'topnav.php';?>
            <!-- Navigator -->
                <?php $tipe=$_SESSION['jenjang']; include 'sidebar.php';?>            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!--container-->
                <div class="page-header">
                    <h1>Form Upload Files</h1>      
                </div>

                <?php
                
                if ($tipe=='D3') {
                    
                    if (isset($_FILES['d3-suratacc']['name'])&&!empty($_FILES['d3-suratacc']['name'])) {
                      $namafile =$_FILES['d3-suratacc']['name'];
                      $tmp_name = $_FILES['d3-suratacc']['tmp_name'];
                      
                        if($doc->cekFileDokumen($namafile)){
                          echo $doc->uploadFile($_SESSION['login'],'acc',$tmp_name,'../'.$doc->getFolder(),$namafile);
                        }else{
                          echo $doc->message('File harus berbentuk dokumen dalam format PDF (*.pdf)');
                        }

                    }

                    if (isset($_POST['d3-judulPenulisan'])&&!empty($_POST['d3-judulPenulisan'])) {
                      echo $doc->updateJudulPenulisan($_POST['d3-judulPenulisan'],$_SESSION['login']);
                    }
                    
                    if (isset($_POST['d3-dospem'])&&!empty($_POST['d3-dospem'])) {
                      echo $doc->updateNamaDospem($_POST['d3-dospem'],$_SESSION['login']);
                    }

                    if (isset($_FILES['d3-nilaidospem']['name'])&&!empty($_FILES['d3-nilaidospem']['name'])) {
                      $namafile = $_FILES['d3-nilaidospem']['name'];
                      $tmp_name = $_FILES['d3-nilaidospem']['tmp_name'];
                      
                      if($doc->cekFileDokumen($namafile)){
                        echo $doc->uploadFile($_SESSION['login'],'nilaiDospem',$tmp_name,'../'.$doc->getFolder(),$namafile);
                      }else{
                        echo $doc->message('File harus berbentuk dokumen dalam format PDF (*.pdf)');
                      }

                    }

                    if (isset($_FILES['d3-ijazah']['name'])&&!empty($_FILES['d3-ijazah']['name'])) {
                      $namafile = $_FILES['d3-ijazah']['name'];
                      $tmp_name = $_FILES['d3-ijazah']['tmp_name'];

                      if($doc->cekFileDokumen($namafile)){
                        echo $doc->uploadFile($_SESSION['login'],'ijz',$tmp_name,'../'.$doc->getFolder(),$namafile);
                      }else{
                        echo $doc->message('File harus berbentuk dokumen dalam format PDF (*.pdf)');
                      }

                    }
                    
                    if (isset($_FILES['d3-buktibk']['name'])&&!empty($_FILES['d3-buktibk']['name'])) {
                      $namafile = $_FILES['d3-buktibk']['name'];
                      $tmp_name = $_FILES['d3-buktibk']['tmp_name'];
                      
                      if($doc->cekFileDokumen($namafile)){
                        echo $doc->uploadFile($_SESSION['login'],'bebasKeuangan',$tmp_name,'../'.$doc->getFolder(),$namafile);
                      }else{
                        echo $doc->message('File harus berbentuk dokumen dalam format PDF (*.pdf)');
                      }

                    }

                    if (isset($_FILES['d3-foto3x4']['name'])&&!empty($_FILES['d3-foto3x4']['name'])) {
                      $namafile = $_FILES['d3-foto3x4']['name'];
                      $tmp_name = $_FILES['d3-foto3x4']['tmp_name'];
                      
                      if($doc->cekFileGambar($namafile)){
                        echo $doc->uploadFile($_SESSION['login'],'fotoKecil',$tmp_name,'../'.$doc->getFolder(),$namafile);                 
                      }else{
                        echo $doc->message('File harus berbentuk dokumen dalam format gambar (*.jpg atau *.png atau *.gif)');
                      }

                    }

                    if (isset($_FILES['d3-foto4x6']['name'])&&!empty($_FILES['d3-foto4x6']['name'])) {
                      $namafile = $_FILES['d3-foto4x6']['name'];
                      $tmp_name = $_FILES['d3-foto4x6']['tmp_name'];
                      
                      if($doc->cekFileGambar($namafile)){
                        echo $doc->uploadFile($_SESSION['login'],'fotoBesar',$tmp_name,'../'.$doc->getFolder(),$namafile);                  
                      }else{
                        echo $doc->message('File harus berbentuk dokumen dalam format gambar (*.jpg atau *.png atau *.gif)');
                      } 
                    }

                 ?>

                <form enctype="multipart/form-data" class="form-horizontal cmxform" id="form-daftar" action=<?php echo "'".$_SERVER['SCRIPT_NAME']."'"; ?> method="post">
                    
                        <div class="line line-dashed b-b line-lg pull-in"></div>

                        <div class="form-group col-sm-8">
                      <label for="">Judul Penulisan</label>
                        <input type="text" class="form-control" id="d3-judulPenulisan" name="d3-judulPenulisan" onkeyup="myTextFunction(this.id,document.getElementById('d3Penulisan').id)" >
                        </div>

                        <div class="form-group col-sm-8">
                      <label for="">Nama Dosen Pembimbing</label>
                        <input type="text" class="form-control" id="d3-dospem" name="d3-dospem" onkeyup="myTextFunction(this.id,document.getElementById('d3Pembimbing').id)">
                        </div>

                    
                    <div class="form-group col-sm-8">
                      <label for="">Masukan Dokumen Surat ACC</label>
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" id="d3-suratacc" name="d3-suratacc" onchange="myFunction(this.id,document.getElementById('d3-suratACC').id)">
                        <span>Masukan Dokumen minimal 2.5 MB</span>
                    </div>

                    <div class="form-group col-sm-8">
                      <label for="">Masukan Dokumen Nilai Dosen Pembimbing</label>
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" id="d3-nilaidospem" name="d3-nilaidospem" onchange="myFunction(this.id,document.getElementById('d3-myScore').id)">
                        <span>Masukan Dokumen minimal 2.5 MB</span>
                    </div>
                    
                    <div class="form-group col-sm-8">
                      <label for="">Masukan Dokumen Ijazah SMA</label>
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" id="d3-ijazah" name="d3-ijazah" onchange="myFunction(this.id,document.getElementById('d3-Certificate').id)">
                        <span>Masukan Dokumen minimal 2.5 MB</span>
                    </div>

                    <div class="form-group col-sm-8">
                      <label for="">Masukan Dokumen Bukti Bebas Keuangan</label>
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" id="d3-buktibk" name="d3-buktibk" onchange="myFunction(this.id,document.getElementById('d3-bbsKeuangan').id)">
                        <span >Masukan Dokumen minimal 2.5 MB</span>
                    </div>

                    <div class="form-group col-sm-8">
                      <label for="">Masukan Foto 3x4</label>
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" id="d3-foto3x4" name="d3-foto3x4" onchange="myFunction(this.id,document.getElementById('d3-myPic3x4').id)">
                        <span>Masukan Dokumen minimal 2.5 MB</span>
                    </div>

                    <div class="form-group col-sm-8">
                      <label for="">Masukan Foto 4x6</label>
                        <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" id="d3-foto4x6" name="d3-foto4x6" onchange="myFunction(this.id,document.getElementById('d3-myPic').id)">
                        <span class="help-block m-b-none">Masukan Dokumen minimal 2.5 MB</span>
                    </div>

                    <div class="form-group col-sm-8">
                        <a href='#' name="sd" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</a>
                    </div>



                    <!--start modal-->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">&times;</a>
          <h4 class="modal-title">Data Upload Sidang</h4>
        </div><!--end modal header-->
        <div class="modal-body">
          <table class='table'>
            <thead ><th colspan='3' style='text-align:center;'><?php echo $mahasiswa->getNama(); ?></th></thead>
            <tbody>
              <tr><td><label>Keterangan</label></td><td><label>Data</label></td><td><label>Ekstensi File</label></td></tr>
              <tr><td><label>Nama Pembimbing:</label></td><td colspan='2'><span id='d3Pembimbing'></span></td></tr>
              <tr><td><label>Judul Penulisan:</label></td><td colspan='2'><span id='d3Penulisan'></span></td></tr>
              <tr><td><label>Dokumen Surat ACC:</label></td><td><a id="d3-suratACC" href="" target='_blank'></a></td><td class="ekstensii">.pdf</td></tr>
              <tr><td><label>Dokumen Nilai Dosen Pembimbing:</label></td><td><a id="d3-myScore" href="" target='_blank'></a></td><td class="ekstensii">.pdf</td></tr>
              <tr><td><label>Dokumen Ijazah SMA:</label></td><td><a id="d3-Certificate" href="" target='_blank'></a></td><td class="ekstensii">.pdf</td></tr>
              <tr><td><label>Dokumen Bebas Keuangan:</label></td><td><a id="d3-bbsKeuangan" href="" target='_blank'></a></td><td class="ekstensii">.pdf</td></tr>
              <tr><td><label>Foto 3x4:</label></td><td><a id="d3-myPic3x4" href="" target='_blank'></a></td><td class="ekstensii">.jpeg/bmp</td></tr>
              <tr><td><label>Foto 4x6:</label></td><td><a id="d3-myPic" href="" target='_blank'></a></td><td class="ekstensii">.jpeg/bmp</td></tr>
              <tr><td colspan='3'><span>harap Cek link file anda sebelum di unggah, jika link tidak bisa di buka harap kembali di unggah dengan menekan tombol upload pada dokumen yang bersangkutan 
                dan perhatikan ekstensi file yang di bolehkan untuk di unggah</span></td></tr>
            </tbody>
          </table>
        </div><!--end modal body-->

        <div class="modal-footer">
          <div class='row'><div class='col-md-12'><p>Anda yakin dokumen sudah benar?</p></div></div>
          <button name='lengkap' class='btn btn-primary'>Ya</button>
          <a href='#' class="btn btn-warning" data-dismiss="modal">Tidak</a>
        </div><!--end modal footer-->
      </div><!--end modal content-->
      </form>
    </div><!--end modal dialog-->
  </div><!--end modal fade-->



                  </form>

                        
                      
                    
                    
        
                  

                
                </div>
                <!--end container-->
            
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>


    <script type="text/javascript">

    function myFunction(x,y){
    //console.log(y);
    var ex = x;
    var ye = y;
    var input = document.getElementById(ex);
    var fReader = new FileReader();
    fReader.readAsDataURL(input.files[0]);
      fReader.onloadend=function(event){
        var myImg = document.getElementById(ye);
        myImg.innerHTML = input.value;
        myImg.href = event.target.result;

      }
    }

    function myTextFunction(x,y){
      //console.log(y);
      var ex = x;
      var ye = y;
      var input = document.getElementById(ex);
      var output = document.getElementById(ye);

      output.innerHTML = input.value;
  
    }

    </script>
</body>
</html>
<?php
}elseif ($tipe=='S1') {

            if (isset($_FILES['s1-suratacc']['name'])&&!empty($_FILES['s1-suratacc']['name'])) {
                $namafile =$_FILES['s1-suratacc']['name'];
                $tmp_name = $_FILES['s1-suratacc']['tmp_name'];


                
                if($doc->cekFileDokumen($namafile)){
                  echo $doc->uploadFile($_SESSION['login'],'acc',$tmp_name,'../'.$doc->getFolder(),$namafile);
                }else{
                  echo $doc->message('File harus berbentuk dokumen dalam format PDF (*.pdf)');
                }

            }

            if (isset($_POST['s1-judulPenulisan'])&&!empty($_POST['s1-judulPenulisan'])) {
              echo $doc->updateJudulPenulisan($_POST['s1-judulPenulisan'],$_SESSION['login']);
            }
            
            if (isset($_POST['s1-dospem'])&&!empty($_POST['s1-dospem'])) {
              echo $doc->updateNamaDospem($_POST['s1-dospem'],$_SESSION['login']);
            }

            //@$namafile = $_FILES['s1-suratacc']['name'];
            if (isset($_FILES['s1-nilaidospem']['name'])&&!empty($_FILES['s1-nilaidospem']['name'])) {
                $namafile =$_FILES['s1-nilaidospem']['name'];
                $tmp_name = $_FILES['s1-nilaidospem']['tmp_name'];
                
                if($doc->cekFileDokumen($namafile)){
                  echo $doc->uploadFile($_SESSION['login'],'nilaiDospem',$tmp_name,'../'.$doc->getFolder(),$namafile);
                }else{
                  echo $doc->message('File harus berbentuk dokumen dalam format PDF (*.pdf)');
                }
            }

            //@$namafile2 = $_FILES['s1-nilaidospem']['name'];

            if (isset($_FILES['s1-foto4x6']['name'])&&!empty($_FILES['s1-foto4x6']['name'])) {
                $namafile =$_FILES['s1-foto4x6']['name'];
                $tmp_name = $_FILES['s1-foto4x6']['tmp_name'];
                
                if($doc->cekFileGambar($namafile)){
                  echo $doc->uploadFile($_SESSION['login'],'fotoBesar',$tmp_name,'../'.$doc->getFolder(),$namafile);
                }else{
                  echo $doc->message('File harus berbentuk dokumen dalam format gambar (*.jpg atau *.png atau *.gif)');
                }

            }

            //@$namafile3 = $_FILES['s1-foto4x6']['name'];
            


            #@$tmp_name = $_FILES['s1-suratacc']['tmp_name'];
            #@$tmp_name2 = $_FILES['s1-nilaidospem']['tmp_name'];
            #@$tmp_name3 = $_FILES['s1-foto4x6']['tmp_name'];
            
            /*
            if (isset($namafile)&&isset($namafile2)&&isset($namafile3)&&isset($namafile4)) {
              if(!empty($namafile)&&!empty($namafile2)&&!empty($namafile3)&&!empty($namafile4)){
              //$location = 'files/';


                if(move_uploaded_file($tmp_name, $doc->getFolder().'/'.$namafile)){
                  echo "<script language='javascript'>";
                        echo "alert('File-1 berhasil di upload');";
                        echo '</script>';
                }else{belumDaftar();}
                if(move_uploaded_file($tmp_name2, $doc->getFolder().'/'.$namafile2)){
                  echo "<script language='javascript'>";
                        echo "alert('File-2 berhasil di upload');";
                        echo '</script>';
                }else{belumDaftar();}
                if(move_uploaded_file($tmp_name3, $doc->getFolder().'/'.$namafile3)){
                  echo "<script language='javascript'>";
                        echo "alert('File-3 berhasil di upload');";
                        echo '</script>';
                }else{belumDaftar();}
                if(move_uploaded_file($tmp_name4, $doc->getFolder().'/'.$namafile4)){
                  echo "<script language='javascript'>";
                        echo "alert('File-4 berhasil di upload');";
                        echo '</script>';
                }else{belumDaftar();}

              }else{
                echo "input file!";
              }
            }
        */



?>

<form enctype="multipart/form-data" id="form-daftar" action=<?php echo "'".$_SERVER['SCRIPT_NAME']."'"; ?> method="post">
                    
                    
                        <div class="form-group col-sm-8">
                      <label for="">Judul Penulisan</label>
                        <input type="text" class="form-control" id='s1-judulPenulisan' name="s1-judulPenulisan" onkeyup="myTextFunction(this.id,document.getElementById('s1Penulisan').id)" >
                        </div>

                        <div class="form-group col-sm-8">
                      <label for="">Nama Dosen Pembimbing</label>
                        <input type="text" class="form-control" id="s1-dospem" name="s1-dospem" onkeyup="myTextFunction(this.id,document.getElementById('s1Pembimbing').id)">
                        </div>
                    
                    

                    
                    <div class="form-group col-sm-8">
                      <label for="acc">Masukan Dokumen Surat ACC</label>
                        <input id="acc" type="file" class="filestyle" id="s1-suratacc" name="s1-suratacc" onchange="myFunction(this.id,document.getElementById('s1-suratACC').id)">
                        <span >Masukan Dokumen minimal 2.5 MB</span>
                    </div>

                    <div class="form-group col-sm-8">
                      <label for="dospem">Masukan Dokumen Nilai Dosen Pembimbing</label>
                        <input id="dospem" type="file" class="filestyle" id="s1-nilaidospem" name="s1-nilaidospem" onchange="myFunction(this.id,document.getElementById('s1-myScore').id)">
                        <span>Masukan Dokumen minimal 2.5 MB</span>
                    </div>

                    <div class="form-group col-sm-8">
                      <label for="dospem">Masukan Foto 4x6</label>
                        <input type="file" class="filestyle" id="s1-foto4x6" name="s1-foto4x6" onchange="myFunction(this.id,document.getElementById('s1-myPic').id)">
                        <span>Masukan Dokumen minimal 2.5 MB</span>

                    </div>
                    

                    <div class="form-group col-sm-8">
                      <a href='#' type="submit" name="sd" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Submit</a>
                    </div>
              
                      </div>
                    </div>
                    </div>
        
    <!--start modal-->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">&times;</a>
          <h4 class="modal-title">Data Upload Sidang</h4>
        </div><!--end modal header-->
        <div class="modal-body">
          <table class='table'>
            <thead ><th colspan='3' style='text-align:center;'><?php echo $mahasiswa->getNama(); ?></th></thead>
            <tbody>
              <tr><td><label>Keterangan</label></td><td><label>Data</label></td><td><label>Ekstensi File</label></td></tr>
              <tr><td><label>Nama Pembimbing:</label></td><td colspan='2'><span id='s1Pembimbing'></span></td></tr>
              <tr><td><label>Judul Penulisan:</label></td><td colspan='2'><span id='s1Penulisan'></span></td></tr>
              <tr><td><label>Dokumen Surat ACC:</label></td><td><a id="s1-suratACC" href="" target='_blank'></a></td><td>.pdf</td></tr>
              <tr><td><label>Dokumen Nilai Dosen Pembimbing:</label></td><td><a id="s1-myScore" href="" target='_blank'></a></td><td>.pdf</td></tr>
              <tr><td><label>Foto 4x6:</label></td><td><a id="s1-myPic" href="" target='_blank'></a></td><td>.jpeg/bmp</td></tr>
              <tr><td colspan='3'><span>harap Cek link file anda sebelum di unggah, jika link tidak bisa di buka harap kembali di unggah dengan menekan tombol upload pada dokumen yang bersangkutan 
                dan perhatikan ekstensi file yang di bolehkan untuk di unggah</span></td></tr>
            </tbody>
          </table>
        </div><!--end modal body-->

        <div class="modal-footer">
          <div class='row'><div class='col-md-12'><p>Anda yakin dokumen sudah benar?</p></div></div>
          <button name='lengkap' class='btn btn-default'>Ya</button>
          <a href='#' class="btn btn-default" data-dismiss="modal">Tidak</a>
        </div><!--end modal footer-->
      </div><!--end modal content-->
      </form>
    </div><!--end modal dialog-->
  </div><!--end modal fade-->


                  </form>
                 
                </div>
                <!--end container-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    <script type="text/javascript">

    function myFunction(x,y){
    //console.log(y);
    var ex = x;
    var ye = y;
    var input = document.getElementById(ex);
    var fReader = new FileReader();
    fReader.readAsDataURL(input.files[0]);
      fReader.onloadend=function(event){
        var myImg = document.getElementById(ye);
        myImg.innerHTML = input.value;
        myImg.href = event.target.result;

      }
    }

    function myTextFunction(x,y){
      //console.log(y);
      var ex = x;
      var ye = y;
      var input = document.getElementById(ex);
      var output = document.getElementById(ye);

      output.innerHTML = input.value;
  
    }

    </script>
</body>
</html>

<?php } 

}else{
  header('Location: ../index.php');
}

?>                    

               