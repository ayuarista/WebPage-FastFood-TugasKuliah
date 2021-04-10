<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();

$con = mysqli_connect ("localhost","root","","lillah");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
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
  $check_harga = "SELECT * FROM produk WHERE kode_produk='$kode_prod'";
  $run_check_harga = mysqli_query ($con, $check_harga);
   $row_harga = mysqli_fetch_array($run_check_harga);
  $harga_beli = $row_adm['harga_produk'];



  if(mysqli_num_rows($run_check_pro)>0) {
    echo "uvuvuvuvuvu";
  }
  else {
   $insert_pro = "INSERT into detailorder(ip_detail,produk_detail,harga_beli) values ('$ip','$kode_pro','$harga_beli')";
     $insert_pes = "INSERT into detailpesanan(ip_detail,harga_beli,produk_detail) values ('$ip','$harga_beli','$kode_pro')";

  $run_pro = mysqli_query ($con, $insert_pro);
  $run_pes = mysqli_query ($con, $insert_pes);

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

    <div class="col-md-12 col-sm-12 col-xs-11">
     
     <? cart(); ?>


     <div id="shopping_cart">
         <span style="float:right; font-size:18px; padding:5px; line-height:40px;">

         <?php
         error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
         if(isset($_SESSION['email_pemesan'])){

          echo "<b> Welcome:</b>" . $_SESSION['email_pemesan'] ."";
         }
         else {
          echo "<b> Welcome Guest</b>";
         }

         ?>


         <b style="color:#000066"> Shopping cart </b>- Total items: <?php total_item() ?> Total Price:<?php total_harga() ?><a href="menu.php"> Back To Menu </a>

         </span>

     </div>


<style >
@import url(http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  align:center;
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  align:center;
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:5px;
  text-align:center;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  border-top: 1px solid #22262e;
  border-bottom: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  align:center;
  background:#FFFFFF;
  padding:1px;
  text-align:center;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
</style>

     <?php echo $ip=getIp();?>
       <?php  getcart(); ?>

     <div id="produkbox">

    <FORM action="" method="post" enctype="multipart/form-data">
      
      <table align="center" width="700px">
        <tr align="center">
        <td colspan="5"><h2>Shopping Cart</h2> </td>
        </tr>

        <tr align="center">
          <th>Hapus</th>
          <th>Produk</th>
          <th>Quantity</th>
          <th>Total Price</th>

        </tr>

  <?php 
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
    
  
  ?>

<tr align="center">
<td><input type="checkbox" name="remove[]" value="<?php echo $kode_produk;?>"/></td>
<td> <?php echo $nama_produk;?>  <br> 
<img src="img_produk/<?php echo $img_produk;?>" width="60" height="60"/> </td>
<td><input type="text" size="6" name="qty" value="<?php echo $_SESSION['qty'] ?>" /> </td>

<?php
if(isset($_POST['update_cart'])){

  $qty = $_POST['qty'];
  $update_qty ="UPDATE detailorder SET qty='$qty'";

  $run_qty = mysqli_query($con,$update_qty);

  $_SESSION['qty']=$qty;

  $total=$total*$qty;

}
?>


<td> <?php echo $single_price; ?> </td>
</tr>

<td> <?php $totalakhir = $total+$onkir; ?> </td>
<?php } } ?>

<tr align="right">
<td colspan="1"> <b>Ongkir: <?php echo $onkir; ?> </b> </td>
<td colspan="2"> <b>Sub Total: <?php echo $total; ?> </b> </td>
<td colspan="2"> <b> Total akhir : <?php echo $totalakhir; ?> </td>

</tr>

<tr align="center">
  <td colspan="1"><input type="submit" name="update_cart" value="Update Cart"/></td>
  <td colspan="2"><a href="menu.php" style='text-decoration:none; color=black;'><button type='button' >Lanjutkan Belanja</button></a></td>
  <td colspan="2"><a href="pesanan.php" style='text-decoration:none; color=black;'><button type='button' >Checkout</button></a></td>
</tr>

</table>
      
    </FORM>

<?php



    $ip= getIp();

    if(isset($_POST['update_cart'])){
        foreach ($_POST['remove'] as $remove_id) {
         
         $delete_produk= "DELETE FROM detailorder WHERE produk_detail='$remove_id' AND ip_detail='$ip'";

        $run_delete = mysqli_query($con,$delete_produk);

        if($run_delete){

          echo "<script>window.open('cart.php','_self')</script>";
        }

        }


    }

    if (isset($_POST['continue'])) {

      echo "<script>window.open('menu.php','_self')</script>";
    }

?>
    
    </div>
        </div>
        </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/</div>  
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
</div>


    </footer>
       

  </body>  
</html>
