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
      <p><a href="diagnosa.php"><button type="button" class="btn btn-primary btn-block active">DIAGNOSA PENYAKIT</button></a></p>
      <p><a href="daftarpenyakit.php"><button type="button" class="btn btn-primary btn-block">DAFTAR PENYAKIT</button></a></p>
      <p><a href="about.php"><button type="button" class="btn btn-primary btn-block">ABOUT</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <center><h2>DIAGNOSA PENYAKIT</h2></center>
        <form id="form1" name="form1" method="post" action="diagnosa.php">
              </form>
       <br>     
        <form id="form2" name="form2" method="post" action="diagnosa.php">
 			<?php 
  
                echo  "<br><label>Gejala</label><br>";
 			$tampil="select * from gejala";
			$query= mysqli_query($konek_db,$tampil);
                while($hasil=mysqli_fetch_array($query)){  
					echo "<input type='checkbox' value='".$hasil['gejala']."' name='gejala[]' /> ".$hasil['gejala']."<br>";
			}
                  
					?>      

        <br>
        <button type="submit" name ="submit" onclick="return checkDiagnosa()" class="btn btn-primary">CEK PENYAKIT</button><br><br>
            <div class="panel panel-info">
                <div class="panel-heading">HASIL DIAGNOSA</div>
                <div class="panel-body">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PENYAKIT</th>
							              <th>Nama Penyakit</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
         <?php			
        if(isset($_POST['submit'])){
            $gejala = $_POST['gejala'];
            $jumlah_dipilih = count($gejala);
           for($x=0;$x<$jumlah_dipilih;$x++){
                       $tampil ="select DISTINCT p.idpenyakit, p.namapenyakit from basispengetahuan b, penyakit p where b.gejala='$gejala[$x]' and p.namapenyakit=b.namapenyakit group by namapenyakit";
                       $result = mysqli_query($konek_db, $tampil);
                       $hasil  = mysqli_fetch_array($result);   
                    
                    }
                    if($hasil==null || $gejala==null){
                      echo "<script type='text/javascript'>alert('Hasil Tidak Ditemukan ');</script>
                        
                               
                               ";
                    }else{

                    
               echo "
                            <tr>  
        			              <td>".$x."</td>
                            <td>".$hasil['idpenyakit']."</td>
					                  <td>".$hasil['namapenyakit']."</td>  
                            <td><a href=\"hasildiagnosa.php?id=".$hasil['idpenyakit']."\"><i class='glyphicon glyphicon-search'></i></a></td>
        		          </tr>   
                               
                               ";
                    }
        }
    
                ?>
                    </table>
            </div>
                    </div>
                </div>
        </form>
             
    </div>
  </div>
</div> 
<footer class="container-fluid text-center">
  <p>Final Project SPK 2022</p>
</footer>
<script language="JavaScript" type="text/javascript">
function checkDiagnosa(){
    return confirm('Apakah sudah benar gejalanya?');
}

</script>

</body>
</html>
