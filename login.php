 <?php 
session_start();
include("includes/db.php");

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
              <img src='admin/img_produk/$img_produk' class='img-rounded' alt='Cinque Terre' width='180px' height='180px' />
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
      echo "uvuvuvuvuvu";
  $kode_pro = $_GET['detailorder'];
  $check_pro = "SELECT * FROM detailorder WHERE ip_detail='$ip' AND produk_detail='$kode_pro'";
  $run_check_pro = mysqli_query ($con, $check_pro);

  if(mysqli_num_rows($run_check_pro)>0) {
    echo "uvuvuvuvuvu";
  }
  else {
  $insert_pro = "insert into detailorder (ip_detail,produk_detail) values ('$ip','$kode_pro')";
  $run_pro = mysqli_query ($con, $insert_pro);

  echo "<script>window.open('menu.php','_self')</script>";

  }
}
}

function total_item() {

if(isset($_GET['detailorder'])){

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

    while ($p_price=mysqli_fetch_array($run_price)){ 
      $kode_produk = $p_price['produk_detail'];
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
    <title>Lillah Restaurant</title> 
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="styles/login_style.css">
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

    <style>
    @import url(http://fonts.googleapis.com/css?family=Open+Sans);
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

body { 
  width: 100%;
  height:100%;
  font-family: 'Open Sans', sans-serif;
  background: #092756;
  background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
  background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
  background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
.login { 
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -150px 0 0 -150px;
  width:300px;
  height:300px;
}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

input { 
  width: 100%; 
  margin-bottom: 10px; 
  background: rgba(0,0,0,0.3);
  border: none;
  outline: none;
  padding: 10px;
  font-size: 13px;
  color: #fff;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
  border: 1px solid rgba(0,0,0,0.3);
  border-radius: 4px;
  box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
  -webkit-transition: box-shadow .5s ease;
  -moz-transition: box-shadow .5s ease;
  -o-transition: box-shadow .5s ease;
  -ms-transition: box-shadow .5s ease;
  transition: box-shadow .5s ease;
}
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
</style>

  <div class="starter-template">
    <div class="text-center"></div>
      <div class="login">
        <h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
        <h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
          <h1>Member Login</h1>
          <form method="post">
              <input type="text" name="email" placeholder="Email" required="required" />
              <input type="password" name="password" placeholder="Password" required="required" />
              <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
              <h6 style="float: center; padding:15px;"><a href="sign_up.php" style="text-decoration:none;"> <font size="3" color="#3399ff">Belum Punya akun? Register disini</font> </a> </h6>
          </form>

    <?php

    if(isset($_POST['login'])){

      $email_pemesan=$_POST['email'];
      $pass_pemesan=$_POST['password'];

      $sel_pemesan = "SELECT * FROM pemesan WHERE email_pemesan='$email_pemesan' AND  pass_pemesan='$pass_pemesan'";

      $run_pemesan = mysqli_query($con,$sel_pemesan);
      $check_pemesan = mysqli_num_rows($run_pemesan);

      if($check_pemesan==0){
        echo "<script>alert('Password/Email salah')</script>";
        exit();

      }

      $ip= getIp();

      $sel_cart = "SELECT * FROM detailorder where ip_detail='$ip'";

      $run_cart = mysqli_query($con,$sel_cart);
      $check_cart = mysqli_num_rows($run_cart);

      if ($check_pemesan>0 AND $check_cart==0){
        $_SESSION['email_pemesan']=$email_pemesan;

        echo "<script>alert('Login Sukses')</script>";
        echo "<script>window.open('member/member_page.php','_self')</script>";

      }
      else {
        $_SESSION['email_pemesan']=$email_pemesan;
        echo "<script>alert('Login Sukses Silahkan Lanjut Pembelian')</script>";
        echo "<script>window.open('member/menu.php','_self')</script>";
      }
        }
    ?>
           
  </body>
    
</html>
