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
                <?php include 'topnav.php';?>
            <!-- Navigator -->

                <?php
                @session_start();
                $tipe=$_SESSION['jenjang']; 
                include 'sidebar.php';
                ?>            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <?php 
                include_once '../model/posts.php';
                $post=new postingan();
                $data=$post->showPostsForHome();

                for ($i=0; $i <count($data) ; $i++) { 
                    if ($i%2==0) {
                        echo "<div class='row'>";
                        echo "<div class='col-md-6'>";
                        echo $post->templateIndex($data[$i][0],$data[$i][1],'../post/logo.jpg','lihat-post.php?id='.$data[$i][0]);
                        echo "</div>";
                    }else{

                        echo "<div class='col-md-6'>";
                        echo $post->templateIndex($data[$i][0],$data[$i][1],'../post/logo.jpg','lihat-post.php?id='.$data[$i][0]);
                        echo "</div>";
                        echo "</div>";
                    }
         
                }




                ?>
                <!--container-->
                



                
                

               
                    

                    
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
               