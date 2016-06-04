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
                        <div style="margin: 10px 0px 20px;" class="page-header">
                            <div class="row"><div class="col-md-8"><h1 style="text-align:center;">Bagian Sidang - Pengecekan Data</h1></div></div>
                        </div>
                    </div>

                <?php 
                include_once '../model/mahasiswa.php';
                include_once '../model/sidang.php';
                include_once '../model/dokumen.php';
                $sidang= new sidang();
                $siswa= new mhs();
                $doc=new dokumen();




                if (isset($_GET['id'])) {
                    $siswa->selectSatuRecord($_GET['id']);
                    if (isset($_POST['lengkapi'])) {
                        if (isset($_POST['kelengkapan'])&&$_POST['kelengkapan']=='lengkap') {
                            
                            if (preg_match('/D3/', $siswa->getJurusan())) {
                            echo $sidang->insertDataSidangD3($_GET['id']);
                            echo $sidang->deleteDataWaitingList($_GET['id']);
                            
                            echo "<script language='javascript'>";
                            echo "window.location = 'formjdl.php';";
                            echo '</script>';                            
                            }else{
                            echo $sidang->insertData($_GET['id']);
                            echo $sidang->deleteDataWaitingList($_GET['id']);
                            
                            echo "<script language='javascript'>";
                            echo "window.location = 'formjdl.php';";
                            echo '</script>';
                            }


                        }elseif (isset($_POST['kelengkapan'])&&$_POST['kelengkapan']=='belum_lengkap') {
                            if (!empty($_POST['notif'])) {
                                echo $sidang->updateDataWaitingList($_GET['id'],$_POST['notif']);
                            }else{
                                echo $doc->message('harap isi kolom notifikasi untuk mahasiswa');
                            }
                            
                        }
                    }

                    $doc->ambilDataValidD3($_GET['id']);

                ?>  
                    

                    <div class="row">
                        <div class="col-md-4">
                            <img src=<?php echo "'../files/".$_GET['id']."/".$doc->getDocFotoBesar()."'"; ?> class="img-responsive" >
                        </div>
                        <div class="col-md-8">
                            <table class='table table-bordered'>
                               <thead>
                                  <tr class='active'>
                                    <th id='tableHeader' style="text-align:center;">Data Mahasiswa</th>                    
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $siswa->getNama(); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $siswa->getFakultas(); ?></td>
                                    </tr>      
                                    <tr>
                                        <td><?php echo $siswa->getJurusan(); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $siswa->getTelp(); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $siswa->getEmail(); ?></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $doc->getNamaDospem(); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $doc->getJudulPenulisan(); ?></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>    
                    </div>

                        
                    <div class="row"><div class="col-md-12"><hr></div></div>
                    

                    <div class="row">

                        <div class="col-md-12">
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
                                    <td><a href=<?php echo "'lihat-data.php?id=".$_GET['id']."&data=acc'";?> target="_blank">
                                        <?php echo $doc->getDocAcc(); ?>
                                        </a>
                                    </td>
                                    </tr>   
                                    <tr>
                                        <td>Nilai Dosen Pembimbing</td>
                                        <td>
                                            <a href=<?php echo "'lihat-data.php?id=".$_GET['id']."&data=dospem'";?> target="_blank">
                                            <?php echo $doc->getDocDospem(); ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bebas Keuangan</td>
                                        <td>
                                            <a href=<?php echo "'lihat-data.php?id=".$_GET['id']."&data=bebasKeuangan'";?> target="_blank">
                                                <?php echo $doc->getDocBebasKeuangan(); ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ijazah</td>
                                        <td>
                                            <a href=<?php echo "'lihat-data.php?id=".$_GET['id']."&data=ijazah'";?> target="_blank">
                                                <?php echo $doc->getDocIjazah(); ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                    <td>Foto 3x4</td>
                                    <td>
                                        <a href=<?php echo "'lihat-data.php?id=".$_GET['id']."&data=fotoKecil'";?> target="_blank">
                                        <?php echo $doc->getDocFotoKecil(); ?>
                                        </a>
                                    </td>
                                    </tr> 

                                    <tr>
                                        <td>Foto 4x6</td>
                                        <td>
                                            <a href=<?php echo "'lihat-data.php?id=".$_GET['id']."&data=fotoBesar'";?> target="_blank">
                                                <?php echo $doc->getDocFotoBesar(); ?>
                                            </a>
                                        </td>
                                    </tr>   
                                        <form action=<?php echo "'".$_SERVER['SCRIPT_NAME']."?id=".$_GET['id']."'"; ?> method="POST">
                                    <tr>
                                        <td colspan="2">
                                             <div class="col-md-6">
                                                <select id="kelengkapan" class="form-control" name="kelengkapan">
                                                <option value="" selected>--Harap isi kelengkapan data--</option>
                                                <option value="belum_lengkap">Belum Lengkap</option>
                                                <option value="lengkap">Lengkap</option>
                                                </select>
                                            </div>

                                        </td>
                                    </tr>   
                                        
                                    <tr>
                                        
                                        <td colspan="2"><textarea class="form-control" name="notif" placeholder="Pesan Kelengkapan"><?php echo $sidang->cariDataKetWaitList($_GET['id']); ?></textarea></td>
                                        
                                    </tr>
                                    <tr>
                                        <td colspan="2"><button class="btn btn-primary form-control" name="lengkapi">submit</button></td>
                                        
                                    </tr>   
                                        </form>
                                </tbody>

                            </table>
                        </div>

                    </div>
                    </div>
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
               