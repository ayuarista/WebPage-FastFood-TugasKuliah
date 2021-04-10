<?php 

session_start();
  
if(!isset($_SESSION['email_pemesan'])){
 echo "<script>alert('You are not login yet')</script>";
        echo "<script>window.open('../login.php','_self')</script>";
}
else {
?>

<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

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

            echo "
            <div class='row' >
            <div class='col-sm-4 col-md-4'>
            <div id='produk'>
            <h3>$nama_pro</h3>
            <img src='../../lillah/admin/img_produk/$img_produk' class='img-rounded' alt='Cinque Terre' width='180px' height='180px' />
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
            <img src='../admin/img_produk/$img_produk' class='img-rounded' alt='Cinque Terre' width='180px' height='180px' />
            <p><b>  Rp. $harga_pro </b> </p>
            <a href='details.php?kode_pro=$kode_pro' style='float:left;'> <button type='button' class='btn btn-default btn-sm'> Detail </button> </a>
            <a href='menu.php?detailorder=$kode_pro'><button type='button' class='btn btn-default btn-sm'> Add to Cart </button> </a>

            

            </div>
            </div>

            ";

        }

    }
}
   
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}




function getcart() {
if (isset($_GET['detailorder'])) {

  global $con;

  $ip = getIp();
  $kode_pro = $_GET['detailorder'];

  $check_pro = "SELECT * FROM detailorder WHERE ip_detail='$ip' AND produk_detail='$kode_pro'";
  $run_check_pro = mysqli_query ($con, $check_pro);

   $harga_lama = $_GET['produk'];
  $check_harga = "SELECT * FROM produk WHERE kode_produk='$kode_pro'";
  $run_check_harga = mysqli_query ($con, $check_harga);
   $row_harga = mysqli_fetch_array($run_check_harga);
  $harga_beli = $row_harga['harga_produk'];


  if(mysqli_num_rows($run_check_pro)>0) {
    
  }
  else {

      $ip= getIp();

  $tanggal_order = date("Y-m-d H:i:s");

    $user = $_SESSION['email_pemesan'];
$get_p = "SELECT * FROM pemesan where email_pemesan='$user'";
$run_c = mysqli_query($con,$get_p);
$row_c = mysqli_fetch_array($run_c);
$c_id = $row_c['id_pemesan'];

$get_kp = " SELECT * FROM pemesan where id_pemesan='$c_id'";
$run_kp = mysqli_query($con,$get_kp);
  $row_kp = mysqli_fetch_array($run_kp);
  $kodepos = $row_kp['kodepos'];
  $alamat_order = $row_kp['alamat_pemesan'];


  $get_adm = " SELECT * FROM kota where kodepos='$kodepos'";
  $run_adm = mysqli_query($con,$get_adm);
  $row_adm = mysqli_fetch_array($run_adm);
  $kode_admin = $row_adm['kode_admin'];

  $insert_pesanan ="INSERT into pesanan (tanggal_order,alamat_order,total_biaya,id_pemesan,kode_admin,kodepos) values ('$tanggal_order','$alamat_order','$harga_beli','$c_id','$kode_admin','$kodepos')";

   $run_pemesan = mysqli_query($con,$insert_pesanan);

  $get_kodeorder = " SELECT * FROM pesanan where id_pemesan='$c_id'";
  $run_kodeorder = mysqli_query($con,$get_kodeorder);
  $row_kodeorder= mysqli_fetch_array($run_kodeorder);
  $kode_order = $row_kodeorder['kode_order'];

  $insert_pro = "INSERT into detailorder (ip_detail,produk_detail,harga_beli,kode_order) values ('$ip','$kode_pro','$harga_beli','$kode_order')";

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
    $nama_produk = $pp_price['nama_produk'];
    $img_produk = $pp_price['img_produk'];

    $single_price = $pp_price['harga_produk'];

    $values = array_sum($harga_produk);

    $total += $values;
    $onkir =10000;
    
  }
}
 
if(isset($_POST['update_cart'])){

  $qty = $_POST['qty'];

  
  $update_qty ="UPDATE detailorder SET qty='$qty' ";

  $run_qty = mysqli_query($con,$update_qty);

  $_SESSION['qty']=$qty;

  $total=$single_price*$qty;

   $subtotal += $total;



 
}


  $user = $_SESSION['email_pemesan'];
$get_p = "SELECT * FROM pemesan where email_pemesan='$user'";
$run_c = mysqli_query($con,$get_p);
$row_c = mysqli_fetch_array($run_c);
$c_id = $row_c['id_pemesan'];

 $totalakhir = $total+$onkir; 
 echo "$totalakhir";

$update_total ="UPDATE pesanan SET total_biaya='$totalakhir' where id_pemesan='$c_id'";
$run_total = mysqli_query($con,$update_total);


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
    <link rel="stylesheet" type="text/css" href="../../lillah/styles/index_style.css">
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
       <div class="row">
          <div class="col-md-2"> 
            <div class="sidebar sidebar-fixed-center" role="menubar">    
              <nav class="navbar navbar-inverse navbar-fixed-right" role="navigation">
                <div class="container">
                <div class="navbar-header">
                <a class="navbar-brand" href="menu.php"><font size="6" color="#c0c0c0">Kategori</font></a>
                <div class="collapse navbar-collapse">
                </div>     
                </div><!--.nav-collapse -->
                </div>
              </nav>


                <div class="list-group">
                  <ul class="kategori">
                  <?php getkat(); ?>
                  </ul>
               </div>
             </div>
          </div>

      <div class="col-md-10"> 
          <center><? cart(); ?></center>
     <div id="shopping_cart">
         <span style="float:right; font-size:18px; padding:5px; line-height:40px;">

          <b style="color:#000066"> Shopping cart </b>- Total items: <?php total_item() ?> Total Price:<?php total_harga() ?><a href="cart.php"> Go to cart </a>
         </span>

     </div>

     <?php echo $ip=getIp();?>
       <?php  getcart(); ?>





     <div id="produkbox">
     <?php getpro(); ?>
      <?php getcatpro(); ?>
    
    </div>
        </div>
        </div>
        </div>
    

       <br></br>
       <br></br>

     
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
    <h6><a href="menu/main_menu.php"> Main Menu </a></h6> 
    <h6><a href="menu/side_menu.php"> Side Menu </a></h6>
    <h6><a href="menu/drink.php"> Drink </a></h6> 
    <h6><a href="menu/snack.php">  Snack </a></h6>
  
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

    </footer>
        
</body>
    

    
</html>

<?php }?>
