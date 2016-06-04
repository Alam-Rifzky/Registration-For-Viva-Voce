<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bagian Sidang - Daftar Sidang</title>
    <?php include 'links.php';?>

    <style type="text/css">

    #tableHeader{
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
                include_once '../model/dokumen.php';
                include_once '../model/sidang.php';
                include_once '../model/mahasiswa.php';
                $siswa = new mhs();
                $siswa->selectSatuRecord($_SESSION['login']);
                $sidang= new sidang();
                
                $dokumen=new dokumen();
                


                if ($tipe=='D3') {
                    
                    if (isset($_POST['lengkapz'])) {
                        
                         echo $sidang->insertDataSidangD3($_SESSION['login']);
                                                       
                           
                    }

                    $sidang->cariJadwal($_SESSION['login']);
                    if (!empty($sidang->getQueue())) {
                        echo "

                    <div class='page-header' style='margin: 5px 0 20px;'>
                    <div class='row'><div class='col-md-12'><h1>Jadwal Sidang</h1></div></div>
                    </div>

                    <div class='container'>
                    <div class='row'><div class='col-md-4'><span>Jadwal sidang untuk mahasiswa: ".$siswa->getNama()."</span></div></div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <table class='table table-bordered'>
                               <thead>
                                  <tr class='active'>
                                    <th id='tableHeader'>Gedung Sidang</th>
                                    <th id='tableHeader'>Waktu</th>
                                    <th id='tableHeader'>Urutan</th>                    
                                  </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Kampus Kenari</td>
                                        <td>".$sidang->getTglSidang()."</td>
                                        <td>".$sidang->getQueue()."</td>
                                    </tr>   
                                    
                                </tbody>

                            </table>
                            <div class='row'><div class='col-md-12'>
                            <table class='table table-bordered'>
                            <thead><th id='tableHeader'>Informasi Dari Admin</th></thead>
                            <tbody><tr><td>Mahasiswa harus datang ke loket sidang PI dengan membawa persyaratan-persyaratan yang sudah di upload dan form isian yang sudah di download (form isian dilengkapi terlebih dahulu) untuk menukarkan jadwal sidang PI sementara</td></tr> </tbody>
                            </table></div></div>
                            <a href='cetak-jadwal-sidang.php?npm=".$_SESSION['login']."' target='_blank' class='btn btn-primary'>Cetak Jadwal Sidang</a>
                            
                        </div>
                    </div>

                    </div>
                    ";
                    }else{

                    

                    $dokumen->ambilDataValidD3($_SESSION['login']);
                    
                    //echo $sidang->getQueue();
                    echo "

                    <div class='page-header' style='margin: 5px 0 20px;'>
                    <div class='row'><div class='col-md-12'><h1>Form Daftar Sidang</h1></div></div>
                    </div>

                    <div class='container'>

                    <div class='row'>
                        <div class='col-md-8'>
                            <table class='table table-bordered'>
                               <thead>
                                  <tr class='info'>
                                    <th id='tableHeader'>Jenis Dokumen</th>
                                    <th id='tableHeader'>Keterangan</th>                    
                                  </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Surat ACC</td>
                                        <td>".$dokumen->getDocAcc()."</td>
                                    </tr>   
                                    <tr>
                                        <td>Nilai Dosen Pembimbing</td>
                                        <td>".$dokumen->getDocDospem()."</td>
                                    </tr>

                                    <tr>
                                        <td>Bebas Keuangan</td>
                                        <td>".$dokumen->getDocBebasKeuangan()."</td>
                                    </tr>

                                    <tr>
                                        <td>Ijazah</td>
                                        <td>".$dokumen->getDocIjazah()."</td>
                                    </tr>

                                    <tr>
                                        <td>Foto 3x4</td>
                                        <td>".$dokumen->getDocFotoKecil()."</td>
                                    </tr> 

                                    <tr>
                                        <td>Foto 4x6</td>
                                        <td>".$dokumen->getDocFotoBesar()."</td>
                                    </tr>   


                                    <tr>
                                        <td>Judul Penulisan</td>
                                        <td>".$dokumen->getJudulPenulisan()."</td>
                                    </tr>   

                                    <tr>
                                        <td>Nama Dosen Pembimbing</td>
                                        <td>".$dokumen->getNamaDospem()."</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    ";
                    if (!empty($dokumen->getDocAcc())&&!empty($dokumen->getDocDospem())&&!empty($dokumen->getDocFotoBesar())&&!empty($dokumen->getJudulPenulisan())&&!empty($dokumen->getNamaDospem())) {
                        echo "
                        <div class='row'>
                            <div class='col-md-8'>
                                <form action='daftar-sidang.php' method='POST'>
                                <button class='btn btn-primary' name='lengkapz'>Daftar Sidang</button>
                                </form>
                            </div>
                        </div>
                        </div>
                        ";
                    }else{
                        echo "
                        <div class='row'><div class='col-md-8'><span>Dokumen anda belum lengkap..</span></div></div>
                        <div class='row'>
                            <div class='col-md-8'>
                                <a class='btn btn-danger' href='upload-files.php'>Klik disini untuk melengkapi</a>
                            </div>
                        </div>
                        </div>
                        ";
                        
                    }
                     
                }


                }elseif ($tipe=='S1') {

                    if (isset($_POST['lengkapz'])) {
                        

                        if (preg_match('/D3/', $siswa->getJurusan())) {
                            
                            echo $sidang->insertDataSidangD3($_SESSION['login']);
                                                       
                            }else{
                            
                            echo $sidang->insertData($_SESSION['login']);
                            
                            }
                    }

                    $sidang->cariJadwal($_SESSION['login']);
                    if (!empty($sidang->getQueue())) {
                        echo "

                    <div class='page-header' style='margin: 5px 0 20px;'>
                    <div class='row'><div class='col-md-12'><h1>Jadwal Sidang</h1></div></div>
                    </div>

                    <div class='container'>
                    <div class='row'><div class='col-md-4'><span>Jadwal sidang untuk mahasiswa: ".$siswa->getNama()."</span></div></div>
                    <div class='row'>
                        <div class='col-md-8'>

                            <table class='table table-bordered'>
                               <thead>
                                  <tr class='active'>
                                    <th id='tableHeader'>Gedung Sidang</th>
                                    <th id='tableHeader'>Waktu</th>
                                    <th id='tableHeader'>Urutan</th>                    
                                  </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>".$sidang->getGedung()."</td>
                                        <td>".$sidang->getWaktu()."</td>
                                        <td>".$sidang->getQueue()."</td>
                                    </tr>   
                                    
                                </tbody>

                            </table>
                            <div class='row'><div class='col-md-12'>
                            <table class='table table-bordered'>
                            <thead><th id='tableHeader'>Informasi Dari Admin</th></thead>
                            <tbody><tr><td>Mahasiswa harus datang ke loket sidang PI dengan membawa persyaratan-persyaratan yang sudah di upload dan form isian yang sudah di download (form isian dilengkapi terlebih dahulu) untuk menukarkan jadwal sidang PI sementara</td></tr> </tbody>
                            </table></div></div>
                            <a href='cetak-jadwal-sidang.php?npm=".$_SESSION['login']."' target='_blank' class='btn btn-primary'>Cetak Jadwal Sidang</a>
                            
                        </div>
                    </div>

                    </div>
                    ";
                    }else{

                    

                    $dokumen->ambilDataValidS1($_SESSION['login']);
                    
                    echo $sidang->getQueue();
                    echo "

                    <div class='page-header' style='margin: 5px 0 20px;'>
                    <div class='row'><div class='col-md-12'><h1>Form Daftar Sidang</h1></div></div>
                    </div>

                    <div class='container'>

                    <div class='row'>
                        <div class='col-md-8'>
                            <table class='table table-bordered'>
                               <thead>
                                  <tr class='info'>
                                    <th id='tableHeader'>Jenis Dokumen</th>
                                    <th id='tableHeader'>Keterangan</th>                    
                                  </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Surat ACC</td>
                                        <td>".$dokumen->getDocAcc()."</td>
                                    </tr>   
                                    <tr>
                                        <td>Nilai Dosen Pembimbing</td>
                                        <td>".$dokumen->getDocDospem()."</td>
                                    </tr>

                                    <tr>
                                        <td>Foto 4x6</td>
                                        <td>".$dokumen->getDocFotoBesar()."</td>
                                    </tr>

                                    <tr>
                                        <td>Judul Penulisan</td>
                                        <td>".$dokumen->getJudulPenulisan()."</td>
                                    </tr>   

                                    <tr>
                                        <td>Nama Dosen Pembimbing</td>
                                        <td>".$dokumen->getNamaDospem()."</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    ";
                    if (!empty($dokumen->getDocAcc())&&!empty($dokumen->getDocDospem())&&!empty($dokumen->getDocFotoBesar())&&!empty($dokumen->getJudulPenulisan())&&!empty($dokumen->getNamaDospem())) {
                        echo "
                        <div class='row'>
                            <div class='col-md-8'>
                                <form action='daftar-sidang.php' method='POST'>
                                <button class='btn btn-primary' name='lengkapz'>Daftar Sidang</button>
                                </form>
                            </div>
                        </div>
                        </div>
                        ";
                    }else{
                        echo "
                        <div class='row'><div class='col-md-8'><span>Dokumen anda belum lengkap..</span></div></div>
                        <div class='row'>
                            <div class='col-md-8'>
                                <a class='btn btn-danger' href='upload-files.php'>Klik disini untuk melengkapi</a>
                            </div>
                        </div>
                        </div>
                        ";
                        
                    }
                     
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
               