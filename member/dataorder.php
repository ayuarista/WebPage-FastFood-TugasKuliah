<?php 

session_start();
$con = mysqli_connect ("localhost","root","","lillah");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
}

//untukkategori


  
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}




?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sean McCannon">
    <title>LILLAH RESTAURANT</title> 
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../../lillah/styles/index_styles.css">
    <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>

    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="member_page.php"><font size="6" color="#c0c0c0">LILLAH</font><font size="2" color="#c0c0c0">.com</font></a>
            </div>

            <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="member_page.php">Home</a></li>
                <li><a href="menu.php">Daftar Menu</a></li>
                <li><a href="akun.php?my_profile">Akun</a></li>
                <li><a href="contact.php">Contact</a></li>

   </ul>
    <ul class="nav navbar-nav navbar-right">
  <form action="result.php" method="get" enctype="multipart/form-data" class="navbar-form navbar-left">
 
</form>
     <li><a href="akun.php"><span class="glyphicon glyphicon-user"></span>  <?php
      include("includes/db.php");
      $user = $_SESSION['email_pemesan'];

    $get_nama = "SELECT * FROM pemesan where email_pemesan='$user'";

    $run_nama = mysqli_query ($con, $get_nama);

    $row_nama = mysqli_fetch_array($run_nama);

    $nama_pemesan = $row_nama['nama_pemesan'];

          echo "$nama_pemesan";

         ?></a></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    </div>
    </div>
    </nav>


    </ul>
    </div><!--.nav-collapse -->
    </div>
    </nav>
 
    <div id="containercontact">

    <form action="dataorder.php" method="post" enctype="multipart/form-data">

  <table align="center" width="750">

    <tr align="center">
    <br><br>
        <td colspan="6"><h2> Masukkan Alamat pengiriman </h2> </td>
    </tr>


<tr>
        <td align="right">Alamat Pengantaran :</td>
        <td>
       <select name="alamat_order">
        <option>Pilih alamat pengantar</option>

       <?php
       $user = $_SESSION['email_pemesan'];

    $get_alamat = "SELECT * FROM pemesan where email_pemesan='$user'";

    $run_alamat = mysqli_query ($con, $get_alamat);

    $row_alamat = mysqli_fetch_array($run_alamat);

    $alamat_pemesan = $row_alamat['alamat_pemesan'];
   
          echo "<option>$alamat_pemesan</option>";
          ?>
          
     </select><td></td>

       </td>
    </tr>
         <td align="right">Kodepos :</td>
        <td>
       <select name="kodepos">
       <option>Pilih kodepos</option>

       <?php

         $get_kodepos = "SELECT * FROM kota";
    
    $run_kodepos = mysqli_query($con, $get_kodepos);
    
    while ($row_kota=mysqli_fetch_array($run_kodepos)) {
        
        $kodepos=$row_kota['kodepos'];
        $nama_kota=$row_kota['nama_kota'];
        $nama_daerah=$row_kota['nama_daerah'];

        
    echo "<option value='$kodepos'>$kodepos-$nama_kota,$nama_daerah</option>" ;   
        
    }

     ?>
       </select>

       </td>

   </tr>

    <tr>
        <td align="right">Keterangan tambahan :</td> 
        <td><input type="text" name="ket_order"> </td>
    </tr>

   <tr align="center">
      <td colspan="6"><input type="submit" name="insert_order" value="Lanjutkan" required="required"> </td>
    </tr>    
     

     
            
    </div>
        
       
     
<?php 

include "includes/db.php";

if(isset($_POST['insert_order'])) {
  
  $alamat_order = $_POST['alamat_order'];
  $ket_order = $_POST['ket_order'];
  $kodepos = $_POST['kodepos'];

$user = $_SESSION['email_pemesan'];
$get_p = "SELECT * FROM pemesan where email_pemesan='$user'";
$run_c = mysqli_query($con,$get_p);
$row_c = mysqli_fetch_array($run_c);
$c_id = $row_c['id_pemesan'];

  $ip= getIp();

  $tanggal_order = date("Y-m-d H:i:s");

  $get_adm = " SELECT * FROM kota where kodepos='$kodepos'";
  $run_adm = mysqli_query($con,$get_adm);
  $row_adm = mysqli_fetch_array($run_adm);
  $kode_admin = $row_adm['kode_admin'];
  

   $get_kurir = " SELECT * FROM admin2 where kode_admin2='$kode_admin'";
  $run_kurir = mysqli_query($con,$get_kurir);
  $row_kurir = mysqli_fetch_array($run_kurir);
  $nama_kurir = $row_kurir['nama_kurir'];


  $get_koor = " SELECT * FROM pesanan where id_pemesan='$c_id'";  
  $run_koor = mysqli_query($con,$get_koor);
  $row_koor = mysqli_fetch_array($run_koor);
  $kode_order = $row_koor['kode_order'];


echo $insert_detail ="INSERT into detailpengiriman (id_penerima,tanggalpengiriman,ket_pengiriman,nama_kurir,kode_order) values ('$c_id','$tanggal_order','$ket_order','$nama_kurir','$kode_order')";

  $run_detail = mysqli_query($con,$insert_detail);

echo "<script>alert('Produk telah dimasukkan')</script>";
echo "<script>window.open('cod.php','_self')</script>";


}



 ?>
</table></form></div>
   
     <br><br><br><br><br><br><br><br><br><br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
    
      <footer>
      <div class="panel panel-default" >
      <div class="bg-1">
      <div class="panel-heading">
      <div class="row" >
            <div class="col-sm-4 col-md-4">
            <div class="text-center">
    
     <h4>Menu</h4> 
    <h6><a href="#"> Main Menu </a></h6> 
    <h6><a href="#"> Side Menu </a></h6>
    <h6><a href="#"> Drink </a></h6> 
    <h6><a href="#">  Snack </a></h6>
  
      </div>
          </div>
          
          <div class="col-md-4">
             <div class="text-center">
    <h4>Tentang Kami </h4>
   <h6><a href="contact.html">  Profil </a> </h6>
   <h6><a href="contact.html">  FAQ </a> </h6>
   <h6><a href="contact.html">  Kontak </a></h6>
  </div>
          </div>

           <div class="col-md-4">
             <div class="text-center">
    <h4> Follow Us  </h4>
   <h6><a href="facebook.com"> Facebook</a> </h6>
   <h6><a href="twitter.com"> Twitter </a></h6>
   <h6><a href="instagram.com"> Instagram </a> </h6>
          </div>
    </div>
</div>
</div>
</div>
<div class="bg-1">
<div class="panel-heading" >
<div class="text-center">
Copyright www.lillah.com | 2016

</div>
</div>
</div>


    </footer>
        
</body>
    

    
</html>

