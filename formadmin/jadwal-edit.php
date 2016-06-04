<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Admin - Bootstrap Admin Template</title>
    <?php include 'links.php';?>

</head>

<body>

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

                <div class="row">
                        <div style="margin: 5px 0px 20px;" class="page-header">
                            <div class="row"><div class="col-md-8"><h1 style="text-align:center;">Bagian Sidang - Ubah Data Jadwal Sidang</h1></div></div>
                        </div>
                </div>
                <?php 
                include_once '../model/mahasiswa.php';
                include_once '../model/sidang.php';
                $sidang= new sidang();
                $siswa= new mhs();
                $siswa->selectSatuRecord($_GET['val']);
                $sidang->cariDataSidang($_GET['val']);
                if (isset($_GET['val'])&&!empty($_GET['val'])) {
                	
                	if (isset($_POST['ubah'])) {
                		if (isset($_POST['urutanBaru'])&&!empty($_POST['urutanBaru'])) {
                			echo $sidang->updateAntrianSidang($_GET['val'],$_POST['urutanBaru']);
                			echo "<script language='javascript'>window.location.href='formjdl.php';</script>";
                		}
                	}elseif (isset($_POST['hapus'])) {
                		echo $sidang->deleteDataSidang($_GET['val']);
                		echo "<script language='javascript'>window.location.href='formjdl.php';</script>";
                	}
                

                ?>  
					
                        

					<form enctype="multipart/form-data" action=<?php echo "'".$_SERVER['SCRIPT_NAME']."?val=".$_GET['val']."'"; ?> method="POST">
                        
						 <div class="form-group col-sm-8">
                          <label for="urutan_lama">Nama:</label>
                          <input type="text" class="form-control" id="urutan_lama" value=<?php echo "'".$siswa->getNama()."'";?>>
                        </div>

                         <div class="form-group col-sm-8">
                          <label for="urutan_lama">NPM:</label>
                          <input type="text" class="form-control" id="urutan_lama"  value=<?php echo "'".$_GET['val']."'";?>>
                        </div>

                        <div class="form-group col-sm-8">
                          <label for="urutan_lama">Urutan Lama:</label>
                          <input type="text" class="form-control" id="urutan_lama" name="urutan_lama" value=<?php echo "'".$sidang->getQueue()."'";?>>
                        </div>

                        <div class="form-group col-sm-8">
                          <label for="judul_info">Urutan Baru:</label>
                          <select name="urutanBaru" class="form-control">
                          <?php 
                          	for ($i=1; $i <= 40 ; $i++) { 
                          		echo "<option value='$i'>$i</option>";
                          	} 
                          ?>
                      </select>

                        </div>                        
                       

                        <div class="form-group col-sm-8">
                          <button class="btn btn-primary" name="ubah">Ubah</button>
                          <button class="btn btn-primary" name="hapus">Hapus</button>
                          
                        </div>
                        
                    </form>
                    <?php } ?>
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
</body>
</html>
               