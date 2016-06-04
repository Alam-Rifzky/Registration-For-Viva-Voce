<?php 
$page='admin';
include_once '../sessioncheck/check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SB Admin - Bootstrap Admin Template</title>
    <?php include 'links.php';?>

    <style type="text/css">

    #tombol{
        margin-right: 7px;
    margin-left: 7px;
    }

    .table-header{
        text-align: center;
    }

    </style>
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
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-header">
                            Forms
                        </h1>
                    </div>
                </div><!--row-->
                <!-- /.row -->

                <form action=<?php echo "'".$_SERVER['SCRIPT_NAME']."'";?> method='GET'>
                <div class="form-group input-group">
                    <input type="text" class="form-control" placeholder="Search Students" name='id'>
                    <span class="input-group-btn"><button class="btn btn-default" ><i class="fa fa-search"></i></button></span>
                </div>   
                        <div>

                            <select name="pilihan">
                            <option value="nama" selected="">Nama</option>
                            <option value="npm">NPM</option>
                            </select>

                        </div>
                      </form>
                            

        <div id="cumi" class="row">


                <?php
                include_once '../model/mahasiswa.php';

                $pelajar = new mhs();
                $records= $pelajar->getWaitingList();
                ?>

                <div class="col-lg-12">
                        <h2>Data Mahasiswa</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="table-header">NPM</th>
                                        <th class="table-header">Nama</th>
                                        <th class="table-header">Fakultas</th>
                                        <th class="table-header">Jurusan</th>
                                        <th class="table-header">Tgl Daftar</th>
                                        <th class="table-header">No. Tlp</th>
                                        <th class="table-header">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (isset($_GET['pilihan'])&&$_GET['pilihan']=='npm'&&isset($_GET['id'])&&!empty($_GET['id'])) {
                                        $datas=$pelajar->WaitListByNPM($_GET['id']);
                                        
                                        
                                        for ($i=0; $i < count($datas) ; $i++) { 
                                            echo "<tr>";

                                            for ($j=0; $j < 6 ; $j++) { 
                                                echo "<td>".$datas[$i][$j]."</td>";
                                                
                                            }
                                            echo "<td><a id='tombol' href='#' class='btn btn-warning'>Cek Kelengkapan</a>";
                                            echo "</tr>";
                                        }
                                    }elseif (isset($_GET['pilihan'])&&$_GET['pilihan']=='nama'&&isset($_GET['id'])&&!empty($_GET['id'])) {
                                         $datas=$pelajar->WaitListByNama($_GET['id']);
                                        
                                        for ($i=0; $i < count($datas); $i++) { 
                                            echo "<tr>";

                                            for ($j=0; $j < 6 ; $j++) { 
                                                echo "<td>".$datas[$i][$j]."</td>";
                                                
                                            }
                                            echo "<td><a id='tombol' href='#' class='btn btn-warning'>Cek Kelengkapan</a>";
                                            echo "</tr>";
                                        }

                                    }else{
                                        for ($i=0; $i < count($records); $i++) { 
                                            echo "<tr>";
                                            for ($atr=0; $atr < 6 ; $atr++) { 
                                                echo "<td>".$records[$i][$atr]."</td>";
                                            }
                                            echo "<td><a id='tombol' href='verifikasi.php?id=".$records[$i][0]."' class='btn btn-warning'>Cek Kelengkapan</a>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div><!--table-responsive-->
                </div><!--col-lg-6-->
        </div><!--cumi-->

        






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
               