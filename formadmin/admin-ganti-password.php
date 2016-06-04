<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Admin - Bootstrap Admin Template</title>
    <?php include 'links.php';?>

</head>

<body>

    <script type="text/javascript">

    function resetData () {
        //alert('ok');
        $('#passwordYangLama').val("");
        $('#passwordYangBaru').val("");
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
                        <h1>Admin  - Ubah Password</h1>
                    </div>

                    <?php 

                    if (isset($_POST['passwordLama'])&&isset($_POST['passwordBaru'])) {
                      include_once '../model/login.php';
                      $log= new login();
                      if ($log->auth($_SESSION['admin'],$_POST['passwordLama'])){
                        echo $log->gantiPassword($_POST['passwordBaru'],$_SESSION['admin']);
                        #echo "oke";
                      }else{
                        echo $log->message('Password anda Salah!');
                      }
                    }

                    ?>
                    
    </div>
    <div>
                    <form action=<?php echo "'".$_SERVER['SCRIPT_NAME']."'";?> method='POST'>
                        <div class="form-group col-sm-8">
                          <label for="id_judul">Id Admin : <?php echo $_SESSION['admin'];?></label>
                          
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="judul_info">Password Lama:</label>
                          <input type="password" class="form-control" id="passwordYangLama" name="passwordLama">
                        </div>
                        <div class="form-group col-sm-8">
                          <label for="tanggal">Password Baru:</label>
                          <input type="password" class="form-control" id="passwordYangBaru" name="passwordBaru">
                        </div>
                        
                        <div class="form-group col-sm-8">
                          <button class="btn btn-primary">Submit</button>
                          <a href="#" class="btn btn-primary" onclick='resetData()'>Reset</a>
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
               