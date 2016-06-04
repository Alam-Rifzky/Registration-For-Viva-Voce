<?php 
$page='admin';
include_once '../sessioncheck/check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Admin - View-Info</title>
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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Input Informasi
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Menu Utama</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Lihat Informasi
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Lihat Informasi</h2>
                        <div class="table-responsive">
                            

                                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Admin</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Tanggal</th>
                                        <th>Gambar</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    if (isset($_GET['delete'])) {
                                        if ($_GET['delete']=='ok') {
                                            echo "<script language='javascript'>";
                                            echo "alert('data berhasil dihapus');";
                                            echo '</script>'; 
                                        }
                                    }
                                    

                                    ?>
                                    <?php 
                                    include_once '../model/posts.php';
                                    $post=new postingan();
                                    $data= $post->showPosts();

                                    for ($i=0; $i < count($data); $i++) { 
                                        echo "<tr>";
                                        for ($j=0; $j < 5 ; $j++) { 
                                            echo "<td>".$data[$i][$j]."</td>";
                                        }
                                        
                                        echo "<td>";
                                        echo "<a href='forminfo.php?appid=update&val=".$data[$i][1]."' class='btn btn-warning'>Edit</a>";
                                        echo "<a href='proses.php?tipe=post&aksi=1&id=".$data[$i][1]."' class='btn btn-danger'>Hapus</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }

                                     ?>


                                    <!--<tr>
                                        <td>Pemgumuman untuk jenjang S1</td>
                                        <td>xx/xx/xxxx</td>
                                        <td>xx:xx:xx</td>
                                        <td>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                                        <td>picture</td>
                                        <td>
                                        
                                        <a href="#" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>-->
                                </tbody>
                            </table>

                            

                                </div>
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
               