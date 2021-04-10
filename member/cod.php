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

    <br>
<br>
<br>
<br>


<h2 style="text-align:center;"> Pesanan Anda Telah Diproses, Tunggu -+ 30 Menit </h2>
<h3 style="text-align:center;"> <a href="member_page.php"> Klik disini untuk kembali ke halaman utama </a> </h3>
        
     

     
            
    </div>
        
       
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
