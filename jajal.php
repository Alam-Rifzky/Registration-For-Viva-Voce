<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
  <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
  <script src="mahasiswa/js/jquery.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
  <script src="css/bootstrap/js/bootstrap.min.js"></script>
  <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
</head>
<body>

  <?php

  if(isset($_POST['lengkap'])){
    echo "oke";
  }

  ?>

<div class="container">
  <h2>Modal Example</h2>
  <form enctype="multipart/form-data" action='jajal.php' method="POST">
    <input type="text" id='coba' onkeyup="myTextFunction(this.id,document.getElementById('namaPembimbing').id)">
    <input id="acc" type="file" class="filestyle"  name="s1-suratacc" onchange="myFunction(this.id,document.getElementById('suratACC').id)">
    <input id="nilaiDospem" type="file" class="filestyle"  name="s1-suratacc" onchange="myFunction(this.id,document.getElementById('myScore').id)">    
    <input id="foto4x6" type="file" class="filestyle"  name="s1-suratacc" onchange="myFunction(this.id,document.getElementById('myPic').id)">    

  <!-- Trigger the modal with a button -->
  <a href='#' class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">&times;</a>
          <h4 class="modal-title">Data Upload Sidang</h4>
        </div><!--end modal header-->
        <div class="modal-body">
          <table class='table'>
            <thead ><th colspan='3' style='text-align:center;'>Rifzky Alam</th></thead>
            <tbody>
              <tr><td><label>Keterangan</label></td><td><label>Data</label></td><td><label>Ekstensi File</label></td></tr>
              <tr><td><label>Nama Pembimbing:</label></td><td colspan='2'><span id='namaPembimbing'></span></td></tr>
              <tr><td><label>Judul Penulisan:</label></td><td colspan='2'>Tulisan</td></tr>
              <tr><td><label>Dokumen Surat ACC:</label></td><td><a id="suratACC" href="" target='_blank'></a></td><td>.pdf</td></tr>
              <tr><td><label>Dokumen Nilai Dosen Pembimbing:</label></td><td><a id="myScore" href="" target='_blank'></a></td><td>.pdf</td></tr>
              <tr><td><label>Foto 4x6:</label></td><td><a id="myPic" href="" target='_blank'></a></td><td>.jpeg/bmp</td></tr>
              <tr><td colspan='3'><span>harap Cek link file anda sebelum di unggah, jika link tidak bisa di buka harap kembali di unggah dengan menekan tombol upload pada dokumen yang bersangkutan 
                dan perhatikan ekstensi file yang di bolehkan untuk di unggah</span></td></tr>
            </tbody>
          </table>
        </div><!--end modal body-->

        <div class="modal-footer">
          <div class='row'><div class='col-md-12'><p>Anda yakin dokumen sudah benar?</p></div></div>
          <button name='lengkap' class='btn btn-default'>Ya</button>
          <a href='#' class="btn btn-default" data-dismiss="modal">Tidak</a>
        </div><!--end modal footer-->
      </div><!--end modal content-->
      </form>
    </div><!--end modal dialog-->
  </div><!--end modal fade-->
  
</div>







<div id="isi"><!--<img id="gambar" src="">--></div>

<script type="text/javascript">

function myFunction(x,y){
  //console.log(y);
  var ex = x;
  var ye = y;
  var input = document.getElementById(ex);
  var fReader = new FileReader();
  fReader.readAsDataURL(input.files[0]);
  fReader.onloadend=function(event){
    var myImg = document.getElementById(ye);
    myImg.innerHTML = input.value;
    myImg.href = event.target.result;

  }
}


function myTextFunction(x,y){
  //console.log(y);
  var ex = x;
  var ye = y;
  var input = document.getElementById(ex);
  var output = document.getElementById(ye);

  output.innerHTML = input.value;
  
}


</script>
</body>
</html>
