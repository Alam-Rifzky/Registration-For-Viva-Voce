<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Mahasiswa</title>
    <?php include 'links.php';?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <!-- Top Menu Items -->
                <?php session_start();$tipe=$_SESSION['jenjang'];include 'topnav.php';?>
            <!-- Navigator -->
                <?php include 'sidebar.php';?>            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!--container-->

                <?php

                include_once '../model/posts.php';
                $post= new postingan();

                if (isset($_GET['id'])) {
                  $datas = $post->selectSatuPost($_GET['id']);  

                //print_r($datas);
                  if (!empty($datas[0][3])) {
                    echo "<div class='row'>";
                    
                    echo "<div class='col-md-12'>";
                    echo $post->templateDenganImage($datas[0][0],$datas[0][1],'../post/'.$datas[0][3]);
                    echo "</div>";
                    echo "</div>";
                  }else{
                    echo $post->templateTanpaImage($datas[0][0],$datas[0][1]);
                  }

                  
                
                
                
                }
                


                ?>

                

                

                
                

                
                    

                    
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
               