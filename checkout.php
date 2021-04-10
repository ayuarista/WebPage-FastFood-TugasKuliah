<?php 
session_start();
$con = mysqli_connect ("localhost","root","","lillah");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
}

//untukkategori


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

            echo "
            <div class='row' >
            <div class='col-sm-4 col-md-4'>
            <div id='produk'>
            <h3>$nama_pro</h3>
            <img src='adminarea/img_produk/$img_produk' class='img-rounded' alt='Cinque Terre' width='180px' height='180px' />
            <p><b> Harga: Rp. $harga_pro </b> </p>
            <a href='details.php?kode_pro=$kode_pro' style='float:left;'> <button type='button' class='btn btn-default btn-sm'> Detail </button> </a>
            <a href='menu.php?detailorder=$kode_pro'><button type='button' class='btn btn-default btn-sm'> Add to Cart </button> </a>

            

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

            echo "
            <div class='row' >
            <div class='col-sm-4 col-md-4'>
            <div id='produk'>
            <h3>$nama_pro</h3>
            <img src='adminarea/img_produk/$img_produk' class='img-rounded' alt='Cinque Terre' width='180px' height='180px' />
            <p><b>  Rp. $harga_pro </b> </p>
            <a href='details.php?kode_pro=$kode_pro' style='float:left;'> <button type='button' class='btn btn-default btn-sm'> Detail </button> </a>
            <a href='menu.php?detailorder=$kode_pro'><button type='button' class='btn btn-default btn-sm'> Add to Cart </button> </a>

            

            </div>
            </div>

            ";

        }

    }
}
   




function getcart() {
if (isset($_GET['detailorder'])) {

  global $con;

  $ip = getIp();
 echo "uvuvuvuvuvu";
  $kode_pro = $_GET['detailorder'];

  $check_pro = "SELECT * FROM detailorder WHERE ip_detail='$ip' AND produk_detail='$kode_pro'";
  $run_check_pro = mysqli_query ($con, $check_pro);


  $harga_lama = $_GET['produk'];
  $check_harga = "SELECT * FROM produk WHERE kode_produk='$kode_pro'";
  $run_check_harga = mysqli_query ($con, $check_harga);
   $row_harga = mysqli_fetch_array($run_check_harga);
  $harga_beli = $row_adm['harga_produk'];

  if(mysqli_num_rows($run_check_pro)>0) {
    echo "uvuvuvuvuvu";
  }
  else {
   echo $insert_pro = "INSERT into detailorder(ip_detail,produk_detail,harga_beli) values ('$ip','$kode_pro','$harga_beli')";


  $run_pro = mysqli_query ($con, $insert_pro);

  echo "<script>window.open('menu.php','_self')</script>";

  }


}

}

function total_item() {

if(isset($_GET['detailorder']))
{

global $con;

$ip = getIp();
$get_item= "SELECT * FROM detailorder where ip_detail='$ip'";

$run_items = mysqli_query ($con,$get_item);

$count_items = mysqli_num_rows ($run_items);
}

else {
global $con;
  $ip = getIp();
$get_item= "SELECT * FROM detailorder where ip_detail='$ip'";

$run_items = mysqli_query ($con,$get_item);

$count_items = mysqli_num_rows ($run_items);
}

echo $count_items;
}

function total_harga(){
  $total = 0;

global $con;

$ip= getIp();

$sel_price = "SELECT * FROM detailorder where ip_detail='$ip'";

$run_price = mysqli_query ($con, $sel_price);
while ($p_price=mysqli_fetch_array($run_price))
{ $kode_produk = $p_price['produk_detail'];
  $harga_produk= " SELECT * FROM produk where kode_produk='$kode_produk'" ;

  $run_pro_price = mysqli_query ($con,$harga_produk);
  while ($pp_price = mysqli_fetch_array($run_pro_price)) {
    
    $harga_produk = array($pp_price['harga_produk']);
    $values = array_sum($harga_produk);

    $total +=$values;


  }



}

echo $total;


}


?>

 <!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sean McCannon">
    <title>AKUN - LILLAH RESTAURANT</title> 
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../../lillah/styles/menustyles.css">
    <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>

    
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
                <a class="navbar-brand" href="index.php"><font size="6" color="#c0c0c0">LILLAH</font><font size="2" color="#c0c0c0">.com</font></a>
            </div>

            <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="index.php">Home</a></li>
                <li><a href="menu.php">Daftar Menu</a></li>
                <li><a href="login.php">Akun</a></li>
                <li><a href="contact.php">Contact</a></li>

             </ul>
              </ul>
                  <ul class="nav navbar-nav navbar-right">
                  <li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  </ul>

              </div>
        </div>
    </nav>

    </ul>
    </div><!--.nav-collapse -->
    </div>
    </nav>
 
    
    <div class="container" >
    



    </div>
          
           
    <div class="col-md-10 col-sm-10 col-xs-11">
     
     <? cart(); ?>


     <div id="shopping_cart">
         <span style="float:right; font-size:18px; padding:5px; line-height:40px;">

          <?php
         if(isset($_SESSION['email_pemesan'])){

          echo "<b> Welcome:</b>" . $_SESSION['email_pemesan'] ."";
         }
         else {
          echo "<b> Welcome Guest</b>";
         }

         ?>

          <b style="color:yellow"> Shopping cart </b>- Total items: <?php total_item() ?> Total Price:<?php total_harga() ?><a href="cart.php"> Go to cart </a>



         </span>

     </div>

     <?php echo $ip=getIp();?>
       <?php  getcart(); ?>

     <div id="produkbox">

        <?php
        if(!isset($_SESSION['email_pemesan'])){

          include("login.php");
        }
        else {
          include("pesanan.php");
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
