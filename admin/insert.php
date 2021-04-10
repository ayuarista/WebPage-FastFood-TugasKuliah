 <!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sean McCannon">
    <title>MANAGE - LILLAH ADMIN CORNER</title> 
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../../lillah/styles/index_style.css">
    <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>

    
</head>
<body>
    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin_page.php"><font size="6" color="#c0c0c0">LILLAH</font><font size="2" color="#c0c0c0">.com</font></a>
            </div>

            <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="admin_page.php">Home</a></li>
                <li><a href="manage.php">Manage</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="customer.php">Customer</a></li>

   </ul>
    <ul class="nav navbar-nav navbar-right">
       <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>  <?php
         session_start();
      include("includes/db.php");
      $user = $_SESSION['email_admin'];

    $get_nama = "SELECT * FROM adminpusat where email_admin='$user'";

    $run_nama = mysqli_query ($con, $get_nama);

    $row_nama = mysqli_fetch_array($run_nama);

    $nama_pemesan = $row_nama['nama_admin'];

          echo "$nama_pemesan";

         ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    </div>
    </div>
    </nav>


    
    <!--.nav-collapse -->
    
    
 
   
        <div class="jumbotron">
        <div class="starter-template">
            <h1>WELCOME</h1>
            <p> Admin</p>
        </div>
        </div>       

    <div class="sidebar">
		<div class="row">
            <div class="col-sm-3"> 
                <div class="sidebar sidebar-fixed-right" role="menubar">	
			  <nav class="navbar navbar-inverse navbar-fixed-right" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="cabang.php"><font size="6" color="#c0c0c0">Manage</font></a>
            <div class="collapse navbar-collapse">
    </div>     
    </div><!--.nav-collapse -->
    </div>
	</nav>

	
	 <div class="container-fluid text-center">    
  <div class="row">
    <div class="col-sm-100 sidenav">
      <h2><p><a href="view.php">View Category & Product</a></p></h2>
      <h2><p><a href="insert.php">Insert Category & Product</a></p></h2>
    </div>
   
	</div>
	</div>
	</div>
	</div>
	<div class="col-sm-8 text-left"> 
      <h1>View Category and Product</h1>
      <center>
        <?php

include("includes/db.php");


?>

<!DOCTYPE html >

<html lang="">

 
     
     
    <div id="produkbox" style="margin-top:50px;">
      
 <form action="insert_product.php"   method="post" enctype="multipart/form-data">
   <table align="left" width="max-1000px" bgcolor="grey" border="2">
   <tr align="center">
       <td colspan="7"><h2>Insert New Post Here</h2></td>
   </tr>

    <tr>
       <td>Nama Produk</td>
       <td><input type="text" name="nama_produk"  ></td>
   </tr>


   <tr>
       <td>Gambar Produk</td>
       <td><input type="file" name="img_produk"></td>
   </tr>

    <tr>
       <td>Harga Produk</td>
       <td><input type="text" name="harga_produk" ></td>
   </tr>

    <tr>
       <td>Status Produk</td>
       <td><textarea name="status_produk" > </textarea></td>
   </tr>

    <tr>
       <td>Rasa Produk</td>
       <td><input type="text" name="rasa_produk"></td>
   </tr>

       <tr>
       <td>Kode Kategori</td>
       <td>
       <select name="kode_kategori">
       <option>Pilih Kategori</option>

       <?php
       $con = mysqli_connect ("localhost","root","","lillah");
if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
}
         $get_kategori = "SELECT * FROM kategori";
    
    $run_kategori = mysqli_query($con, $get_kategori);
    
    while ($row_kategori=mysqli_fetch_array($run_kategori)){
        
        $kode_kategori=$row_kategori['kode_kategori'];
        $nama_kategori=$row_kategori['nama_kategori'];
        
    echo "<option value='$kode_kategori'>$nama_kategori</option>" ;   
        
    }



       ?>
       </select>




       </td>
   </tr>

   <form action="insert_product.php" method="post" enctype="multipart/form-data">
   
   <tr align="center">
       <td colspan="6"><input type="submit" name="insert_post" value="Insert now"></td>
   </tr>

    
</table>
</form>
</div>
     
     </div>

    

  </body>  
</html>

<?php
  include "includes/db.php";

  

if (isset($_POST['insert_post'])) {
    
    $nama_produk = $_POST['nama_produk'];
    $kode_produk = $_POST['kode_produk'];
    $harga_produk = $_POST['harga_produk'];
    $rasa_produk = $_POST['rasa_produk'];
    $status_produk = $_POST['status_produk'];
    $kode_kategori = $_POST['kode_kategori'];

    $img_produk=$_FILES['img_produk']['name'];
    $img_produk_tmp=$_FILES['img_produk']['tmp_name'];

    move_uploaded_file($img_produk_tmp, "img_produk/$img_produk");

    $insert_produk = " Insert into produk (kode_produk,nama_produk,img_produk,harga_produk,status_produk,rasa_produk,kode_kategori) values ('$kode_produk','$nama_produk','$img_produk','$harga_produk',' $status_produk','$rasa_produk','$kode_kategori')";

$insert_pro = mysqli_query($con, $insert_produk);
if ($insert_pro) {
echo "<script>alert('Produk telah dimasukkan')</script>";
echo "<script>window.open('index.php?insert_product.php','_self')</script>";
}
  
}
  ?> 
    </div>

     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
    
      <footer>
      <div class="panel panel-default">
      <div class="bg-1">
      <div class="panel-heading">
      <div class="row">
   
</div>
</div>
</div>
<div class="bg-1">
<div class="panel-heading">
<div class="text-center">
Copyright www.lillah.com | 2016

</div>
</div>
</div>
</div>


    </footer>
        

    

    
</div></div></body>