<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
  include('koneksi.php');
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
       <p><a href="index.php"><button type="button" class="btn btn-primary btn-block">BERANDA</button></a></p>
      <p><a href="diagnosa.php"><button type="button" class="btn btn-primary btn-block">DIAGNOSA PENYAKIT</button></a></p>
      <p><a href="daftarpenyakit.php"><button type="button" class="btn btn-primary btn-block active">DAFTAR PENYAKIT</button></a></p>
      <p><a href="about.php"><button type="button" class="btn btn-primary btn-block">ABOUT</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h2 class="text-center">DAFTAR MACAM-MACAM PENYAKIT JANTUNG</h2>
    	<br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Penyakit</th>
							              <th>Nama Penyakit</th>
                            <th>Obat-obatan</th>
                            <!--<th>Jenis Tanaman</th>-->
                            <th>Detail</th>
                        </tr>
                    </thead>
                     <?php
                        $queri="Select * From penyakit";
                        $hasil=mysqli_query ($konek_db,$queri);   
                        $id = 0;
                        while ($data = mysqli_fetch_array ($hasil)){  
                              $id++; 
                              echo "      
                                      <tr>  
                                      <td>".$id."</td>
                                      <td>".$data[0]."</td>  
                                      <td>".$data[1]."</td> 
                                      <td>".$data[2]."</td>   
                                            <td><a href=\"detailpenyakit.php?id=".$data[0]."\"><i class='glyphicon glyphicon-search'></i></a></td>
                                    </tr>   
                                  ";      
                              }                   
                      ?>  
                  </table><br><br><br><br><br>
            </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Final Project SPK 2022</p>
</footer>

</body>
</html>
