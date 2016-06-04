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
                <div class="well">
                    <div class="page-header">
                        <h1>Admin  - Ubah Password</h1>
                    </div>

                    <?php 

                    if (isset($_POST['judulEmail'])&&isset($_POST['keluhan'])) {
                      include_once '../model/petugas.php';
                      $petugas=new petugas();
                      $petugas->kirimKeluhan($_POST['judulEmail'],$_POST['keluhan']);
                    }

                    ?>
                    
    </div>
    <div>
                    <form action=<?php echo "'".$_SERVER['SCRIPT_NAME']."'";?> method='POST'>
                        <div class="form-group col-sm-8">
                          <label for="id_judul">Id Admin : <?php echo $_SESSION['admin'];?></label>
                          
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="judul_info">Judul:</label>
                          <input type="text" class="form-control" id="judul_info" name="judulEmail">
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="tanggal">Keluhan:</label>
                          <textarea class="form-control" name="keluhan"></textarea>
                          <span>keluhan tidak boleh lebih dari 70 karakter</span>
                        </div>
                        
                        <div class="form-group col-sm-8">
                          <button class="btn btn-primary">Submit</button>
                          
                        </div>
                        
                    </form>
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
               