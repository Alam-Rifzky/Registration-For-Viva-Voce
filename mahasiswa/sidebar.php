<div class="collapse navbar-collapse navbar-ex1-collapse">

                <?php 
                if ($tipe=='D3') {
                    
                

                ?>
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Beranda</a>
                    </li>
                    <li>
                        
                        <a href="javascript:;" data-toggle="collapse" data-target="#daftarSidang"><i class="fa fa-fw fa-table"></i> Daftar Sidang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="daftarSidang" class="collapse">
                            <li>
                                <a href="upload-files.php">Upload Berkas</a>
                            </li>
                            <li>
                                <a href="daftar-sidang.php">Periksa &amp Daftar </a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#informasi"><i class="fa fa-fw fa-arrows-v"></i> Download <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="informasi" class="collapse">
                            <li>
                                <a href="download-file.php?f=nilai-dp" target="_blank"> Nilai Dosen Pembimbing</a>
                            </li>
                            <li>
                                <a href="download-file.php?f=lbr-isian-foto"> Lembar Isian Photo</a>
                            </li>
                            <li>
                                <a href="download-file.php?f=isi-alumni-fak">Isian Alumni Fakultas</a>
                            </li>
                            <li>
                                <a href="download-file.php?f=stls">Isian Surat tanda Lulus Sementara</a>
                            </li>
                            <li>
                                <a href="download-file.php?f=format-hardcover">Format Hardcover</a>
                            </li>
                            <li>
                                <a href="#">Surat ACC</a>
                            </li>
                        </ul>
                    </li>
                      
                <?php
                }elseif ($tipe=='S1') {
                ?>

                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Beranda</a>
                    </li>
                    <li>
                        
                        <a href="javascript:;" data-toggle="collapse" data-target="#daftarSidang"><i class="fa fa-fw fa-table"></i> Daftar Sidang <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="daftarSidang" class="collapse">
                            <li>
                                <a href="upload-files.php">Upload Berkas</a>
                            </li>
                            <li>
                                <a href="daftar-sidang.php">Periksa &amp Daftar </a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#informasi"><i class="fa fa-fw fa-arrows-v"></i> Download <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="informasi" class="collapse">
                            <li>
                                <a href="download-file.php?f=nilai-dp"> Nilai Dosen Pembimbing</a>
                            </li>
                            <li>
                                <a href="download-file.php?f=lbr-isian-foto"> Lembar Isian Photo</a>
                            </li>                            
                            <li>
                                <a href="download-file.php?f=format-hardcover">Format Hardcover</a>
                            </li>
                            <li>
                                <a href="#">Surat ACC</a>
                            </li>
                            
                        </ul>
                    </li>

            <?php 
                }
            ?>
            </div>