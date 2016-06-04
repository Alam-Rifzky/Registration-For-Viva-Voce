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
        <?php 
        include_once '../model/mahasiswa.php';
        $siswa=new mhs();
        
        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!--container-->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bagian Sidang - Jadwal Sidang
                        </h1>

                        <ol class="breadcrumb">
                            <li>
                                <!--<i class="fa fa-dashboard"></i>  <a href="cetak-data-mhs.php">Cetak Data Mahasiswa</a>-->
                            <form action="cetak-data-mhs.php" method="GET">    
                            <div class="form-inline">                                
                                <div class="checkbox-inline"><label><input type="checkbox" name="d3">D3</label></div>
                                <div class="checkbox-inline"><label><input type="checkbox" name="s1">S1</label></div>
                                <input type="text" class="form-control" name="tanggal" placeholder="Format:(2015-10-31)">
                                <button class="btn btn-primary">Cetak Jadwal Sidang</button>
                            </div>
                            </form>
                            </li>
                            
                        </ol>

                    </div>
                </div>
                <!-- /.row -->
                <form action=<?php echo "'".$_SERVER['SCRIPT_NAME']."'";?> method='GET'>
                <div class="form-group input-group">
                    <input type="text" class="form-control" placeholder="Search Students by name, ID or Date (2015-10-31) (yy-mm-dd)" name='id'>
                    <span class="input-group-btn"><button class="btn btn-default" ><i class="fa fa-search"></i></button></span>
                </div>   
                        <div>

                            <select name="pilihan">
                            <option value="nama" selected="">Nama</option>
                            <option value="npm">NPM</option>
                            <option value="tanggal">Tanggal</option>
                            </select>

                        </div>
                      </form>

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Data Mahasiswa</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th id='tulisanTengah'>NPM</th>
                                        <th id='tulisanTengah'>Nama</th>
                                        <th id='tulisanTengah'>Jurusan</th>
                                        <th id='tulisanTengah'>Tanggal Sidang</th>
                                        <th id='tulisanTengah'>Ruang &amp Waktu</th>
                                        <th id='tulisanTengah'>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 


                                    if (isset($_GET['pilihan'])&&$_GET['pilihan']=='npm'&&isset($_GET['id'])&&!empty($_GET['id'])) {
                                        $datas=$siswa->showToAdminByNPM($_GET['id']);
                                        
                                        
                                        for ($i=0; $i < count($datas) ; $i++) { 
                                            echo "<tr>";

                                            for ($j=0; $j < 5 ; $j++) { 
                                                echo "<td>".$datas[$i][$j]."</td>";
                                                
                                            }
                                            echo "<td><a id='tombol' href='jadwal-edit.php?val=".$datas[$i][0]."' class='btn btn-warning'>Edit/hapus</a>";
                                            echo "</tr>";
                                        }
                                    
                                    }elseif (isset($_GET['pilihan'])&&$_GET['pilihan']=='nama'&&isset($_GET['id'])&&!empty($_GET['id'])) {
                                        $datas=$siswa->showToAdminByNama($_GET['id']);
                                        
                                        for ($i=0; $i < count($datas) ; $i++) { 
                                            echo "<tr>";

                                            for ($j=0; $j < 5 ; $j++) { 
                                                echo "<td>".$datas[$i][$j]."</td>";
                                                
                                            }
                                            echo "<td><a id='tombol' href='jadwal-edit.php?val=".$datas[$i][0]."' class='btn btn-warning'>Edit/hapus</a>";
                                            echo "</tr>";
                                        }

                                    }elseif (isset($_GET['pilihan'])&&$_GET['pilihan']=='tanggal'&&isset($_GET['id'])&&!empty($_GET['id'])) {
                                        $datas=$siswa->showToAdminByTanggal($_GET['id']);

                                        for ($i=0; $i < count($datas) ; $i++) { 
                                            echo "<tr>";

                                            for ($j=0; $j < 5 ; $j++) { 
                                                echo "<td>".$datas[$i][$j]."</td>";   
                                            }

                                            echo "<td><a id='tombol' href='jadwal-edit.php?val=".$datas[$i][0]."' class='btn btn-warning'>Edit/hapus</a>";
                                            echo "</tr>";
                                        }

                                    }else{
                                        $datas=$siswa->showToAdmin();
                                        for ($i=0; $i < count($datas) ; $i++) { 
                                            echo "<tr>";

                                            for ($j=0; $j < 5 ; $j++) { 
                                                echo "<td>".$datas[$i][$j]."</td>";
                                                #echo "<td>".$datas[$i][1]."</td>";
                                                #echo "<td>".$datas[$i][2]."</td>";
                                                #echo "<td>".$datas[$i][3]."</td>";
                                                #echo "<td>".$datas[$i][4]."</td>";
                                                
                                                   
                                            }
                                            echo "<td><a id='tombol' href='jadwal-edit.php?val=".$datas[$i][0]."' class='btn btn-warning'>Edit/hapus</a>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                    
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
               