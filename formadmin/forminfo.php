<?php 
$page='admin';
include_once '../sessioncheck/check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Admin - Bootstrap Admin Template</title>
    <?php include 'links.php';?>

</head>

<body>

    <script type="text/javascript">

    function resetUpdateData () {
        //alert('ok');
        $('#judul_lama').val("");
        $('#judul_baru').val("");
        $('#updateIsi').val("");
        //alert(isi);
    }

    function resetData () {
        //alert('ok');
        $('#judul_info').val("");
        $('#isi').val("");
        $('#gambar_post').text()="";
        //alert(isi);
    }

    </script>
  

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <!-- Top Menu Items -->
                <?php include 'topnav.php';?>
            <!-- Navigator -->
                <?php include 'sidebar.php';?>            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!--container-->
                <div class="well">
                    <div class="page-header">
                        <h1>Input Informasi</h1>
                    </div>

                    
    </div>
    <div>


                    <?php 
                include_once '../model/posts.php';

                $post=new postingan();
                
                if (isset($_GET['appid'])&&$_GET['appid']=='update') {
                    if (isset($_FILES['updateGambar']['name'])&&isset($_POST['updateJudulLama'])&&isset($_POST['updateIsi'])) {
                        @$namafile =$_FILES['updateGambar']['name'];
                        @$tmp_name = $_FILES['updateGambar']['tmp_name'];
                            if (!empty($namafile)) {
                                if ($post->updatePost($_POST['updateJudulLama'],$_POST['updateJudul'],$_POST['updateIsi'],$namafile,$tmp_name)) {
                                echo "<script language='javascript'>";
                                echo "alert('1: data berhasil diubah');";
                                echo "window.open('view-info.php')";
                                echo '</script>';
                                }
                            }else{

                                if ($post->updatePostTanpaGambar($_POST['updateJudulLama'],$_POST['updateJudul'],$_POST['updateIsi'])) {
                                echo "<script language='javascript'>";
                                echo "alert('2: data berhasil diubah');";
                                echo "window.open('view-info.php')";
                                echo '</script>';
                                }
                            
                        }
                        
                    }
                }
                
                if (isset($_FILES['gambar']['name'])||isset($_POST['judul'])&&isset($_POST['isi'])) {
                    $namafile =$_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];
                  $tanggal=date("Y-m-d");
                  $waktu=date("h:i:sa");
                if ($post->InsertNewPost($_SESSION['admin'],$_POST['judul'],$_POST['isi'],$tanggal,$waktu,$tmp_name,$namafile)) {
                echo "<script language='javascript'>";
                echo "alert('data berhasil dimasukkan');";
                echo '</script>';
                }else{
                  echo "<script language='javascript'>";
                echo "alert('data gagal dimasukkan');";
                echo '</script>';
                }
                
              }

              if (isset($_GET['appid'])&&isset($_GET['val'])&&$_GET['appid']=='update'&&!empty($_GET['val'])){
                  $konten=$post->selectSatuPost($_GET['val'])
                  ?>

                  <form enctype="multipart/form-data" action=<?php echo "'".$_SERVER['SCRIPT_NAME']."?appid=update'"; ?> method="POST">
                        
                        <div class="form-group col-sm-8">
                          <label for="judul_lama">Judul:</label>
                          <input type="text" class="form-control" id="judul_lama" name="updateJudulLama" value=<?php echo "'".$_GET['val']."'";?>>
                        </div>

                        <div class="form-group col-sm-8">
                          <label for="judul_info">Judul Baru:</label>
                          <input type="text" class="form-control" id="judul_baru" name="updateJudul" value=<?php echo "'".$_GET['val']."'";?>>
                        </div>                        
                        <div class="form-group col-sm-8">
                          <label for="isi">Isi:</label>
                          <textarea class="form-control" rows="5" id="updateIsi" name="updateIsi"><?php echo "".$konten[0][1]."";?></textarea>
                        </div>

                        <div class="form-group col-sm-8">
                        
                          <label for="gambar">Gambar:</label>
                          <input type="file" class="filestyle" data-buttonBefore="true" name="updateGambar" value=<?php echo "'".$_GET['val']."'";?>>
                        </div>
                        <div class="form-group col-sm-8">
                          <button class="btn btn-primary">Submit</button>
                          <a href="#" class="btn btn-warning" onclick="resetUpdateData()">Reset</a>


      
                        </div>
                        
                    </form>

                <?php 
              }else{

                ?>
      
                    <form enctype="multipart/form-data" action=<?php echo "'".$_SERVER['SCRIPT_NAME']."'"; ?> method="POST">
                      
                        <div class="form-group col-sm-8">
                          <label for="judul_info">Judul:</label>
                          <input type="text" class="form-control" id="judul_info" name="judul">
                        </div>                        
                        <div class="form-group col-sm-8">
                          <label for="isi">Isi:</label>
                          <textarea class="form-control" rows="5" id="isi" name="isi"></textarea>
                        </div>

                        <div class="form-group col-sm-8">
                        
                          <label for="gambar">Gambar:</label>
                          <input type="file" class="filestyle" id="gambar_post" data-buttonBefore="true" name="gambar">
                        </div>
                        <div class="form-group col-sm-8">
                          <button class="btn btn-primary">Submit</button>
                          <a href="#" class="btn btn-warning" onclick="resetData()">Reset</a>


      
                        </div>
                        
                    </form>

                <?php } ?>
                  </div>

                    </div>
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
</body>
</html>
               