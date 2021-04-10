<?php 
$con = mysqli_connect ("localhost","root","","lillah");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
}

//untukkategori

function getkat() {
    
    global $con; 
    
    $get_kategori = "SELECT * FROM kategori";
    
    $run_kategori = mysqli_query($con, $get_kategori);
    
    while ($row_kategori=mysqli_fetch_array($run_kategori)){
        
        $kode_kategori=$row_kategori['kode_kategori'];
        $nama_kategori=$row_kategori['nama_kategori'];
        
    echo "<li><a href='menu.php?kategori=$kode_kategori'>$nama_kategori</a></li>" ;   
        
    }
}

function getpro() {

    if(!isset($_GET['kategori'])){


        global $con;
        $get_pro = "SELECT * FROM produk order by RAND() LIMIT 0,6";

        $run_pro = mysqli_query($con, $get_pro);

        while ($row_pro=mysqli_fetch_array($run_pro)) {
            $nama_pro = $row_pro['nama_produk'];
            $kode_pro = $row_pro['kode_produk'];
            $harga_pro = $row_pro['harga_produk'];
            $rasa_pro = $row_pro['rasa_produk'];
            $status_pro = $row_pro['status_produk'];
            $kode_kategori = $row_pro['kode_kategori'];
            $img_produk= $row_pro['img_produk'];
            $produk_keyword= $row_pro['produk_keyword'];

            echo "
            <div class='row' >
            <div class='col-sm-4 col-md-4'>
            <div id='produk'>
            <h3>$nama_pro</h3>
            <img src='adminarea/img_produk/$img_produk' class='img-rounded' alt='Cinque Terre' width='180px' height='180px' />
            <p><b>  Rp. $harga_pro </b> </p>
            <a href='details.php?kode_pro=$kode_pro' style='float:left;'> <button type='button' class='btn btn-default btn-sm'> Detail </button> </a>
            <a href='menu.php?kode_pro=$kode_pro'><button type='button' class='btn btn-default btn-sm'> Add to Cart </button> </a>

            

            </div>
            </div>

            ";

        }

    }
}


function getcatpro() {

    if(isset($_GET['kategori'])){

            $kode_kategori =$_GET['kategori'];

        global $con;

        $get_cat_pro = "SELECT * FROM produk WHERE kode_kategori='$kode_kategori' ";

        $run_cat_pro = mysqli_query($con, $get_cat_pro);

        while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)) {
            $nama_pro = $row_cat_pro['nama_produk'];
            $kode_pro = $row_cat_pro['kode_produk'];
            $harga_pro = $row_cat_pro['harga_produk'];
            $rasa_pro = $row_cat_pro['rasa_produk'];
            $status_pro = $row_cat_pro['status_produk'];
            $kode_kategori = $row_cat_pro['kode_kategori'];
            $img_produk= $row_cat_pro['img_produk'];
            $produk_keyword= $row_cat_pro['produk_keyword'];

            echo "
            <div class='row' >
            <div class='col-sm-4 col-md-4'>
            <div id='produk'>
            <h3>$nama_pro</h3>
            <img src='adminarea/img_produk/$img_produk' class='img-rounded' alt='Cinque Terre' width='180px' height='180px' />
            <p><b>  Rp. $harga_pro </b> </p>
            <a href='details.php?kode_pro=$kode_pro' style='float:left;'> <button type='button' class='btn btn-default btn-sm'> Detail </button> </a>
            <a href='menu.php?kode_pro=$kode_pro'><button type='button' class='btn btn-default btn-sm'> Add to Cart </button> </a>

            

            </div>
            </div>

            ";

        }

    }
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
 
    
    <div class="container" >
    <div class="row" >
            <div class="col-md-2 col-sm-2 col-xs"> 
             <p class="lead"><h2>Kategori</h2></p>  
                <div class="list-group">
      <ul class="kategori">
    <?php getkat(); ?>

      
              </ul>
    </div>




    </div>
          
           
    <div class="col-md-10 col-sm-10 col-xs-11">
     
     <div id="shopping_cart">
         <span style="float:right; font-size:18px; padding:5px; line-height:40px;">

         Welcome guest! <b style="color:yellow"> Shopping cart </b>- Total items: Total Price:<a href="cart.php"> Go to cart </a>



         </span>

     </div>


     <div id="produkbox">
   <?php 
   if (isset($_GET['search'])) {

    $search_query = $_GET['user_query'];

   $get_pro = "SELECT * FROM produk WHERE produk_keyword like '%$search_query%' ";

        $run_pro = mysqli_query($con, $get_pro);

        while ($row_pro=mysqli_fetch_array($run_pro)) {
            $nama_pro = $row_pro['nama_produk'];
            $kode_pro = $row_pro['kode_produk'];
            $harga_pro = $row_pro['harga_produk'];
            $rasa_pro = $row_pro['rasa_produk'];
            $status_pro = $row_pro['status_produk'];
            $kode_kategori = $row_pro['kode_kategori'];
            $img_produk= $row_pro['img_produk'];
            $produk_keyword= $row_pro['produk_keyword'];

            echo "
            <div class='row' >
            <div class='col-sm-4 col-md-4'>
            <div id='produk'>
            <h3>$nama_pro</h3>
            <img src='adminarea/img_produk/$img_produk' class='img-rounded' alt='Cinque Terre' width='180px' height='180px' />
            <p><b>  Rp. $harga_pro </b> </p>
            <a href='details.php?kode_pro=$kode_pro' style='float:left;'> <button type='button' class='btn btn-default btn-sm'> Detail </button> </a>
            <a href='menu.php?kode_pro=$kode_pro'><button type='button' class='btn btn-default btn-sm'> Add to Cart </button> </a>

            

            </div>
            </div>

            ";

        }
    }


   ?>
    
    </div>
        </div>
        </div>
        </div>
    

       
     

    <script src="https://ajax.googleapis.com/ajax/
                
    </div>  
        libs/jquery/1.11.3/jquery.min.js"></script>
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
