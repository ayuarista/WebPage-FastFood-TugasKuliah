 <!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sean McCannon">
    <title> - LILLAH ADMIN CORNER</title> 
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
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    </div>
    </div>
    </nav>


    
    <!--.nav-collapse -->
    

    <div class="sidebar">
		<div class="row">
            <div class="col-sm-3"> 
                <div class="sidebar sidebar-fixed-right" role="menubar">	
			  <nav class="navbar navbar-inverse navbar-fixed-right" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="kurir.php"><font size="6" color="#c0c0c0">Kurir</font></a>
            <div class="collapse navbar-collapse">
    </div>     
    </div><!--.nav-collapse -->
    </div>
	</nav>

	
	 <div class="container-fluid text-center">    
  <div class="row">
    <div class="col-sm-100 sidenav">
      <h2><p><a href="Profile.php">Profile</a></p></h2>
      <h2><p><a href="edit.php">Edit</a></p></h2>
      <h2><p><a href="setting.php">Setting</a></p></h2>
    </div>
   
	</div>
	</div>
	</div>
	</div>
	
<div class="col-sm-8 text-left"> 
      <?php
   $con = mysqli_connect("localhost","root","","lillah");
   if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
}

    $user = $_SESSION['email_admin'];

    $get_admin = "SELECT * FROM adminpusat where email_admin='$user'";

    $run_admin = mysqli_query ($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);
    $id = $row_admin ['kode_admin'];
    $nama = $row_admin['nama_admin'];
    $notelp = $row_admin['notelp_admin'];
    $alamat= $row_admin['alamat_admin'];
    $email= $row_admin['email_admin'];
    $password = $row_admin['pass_admin'];



?> 
  <form action="" method="post" enctype="multipart/form-data">

  <table align="center" width="750">
    <tr align="center">
        <td colspan="6"><h2> Edit Akun </h2> </td>
    </tr>

    <tr>
        <td align="right"><b>Nama :</b></td>
        <td><input type="text" name="nama_admin" value="<?php echo "$nama"; ?>" required /></td>
    </tr>

     <tr>
        <td align="right"><b>Email :</b></td>
        <td><input type="text" name="email_admin" value="<?php echo "$email"; ?>" required/></td>
    </tr>

    <tr>
        <td align="right"><b> Password:</b></td>
        <td><input type="password" name="pass_admin" value="<?php echo "$password"; ?>" required/></td>
    </tr>

      <tr>
        <td align="right"><b>No telepon/Hp:</b></td>
        <td><input type="text" name="notelp_admin" value="<?php echo "$notelp"; ?>" required/></td>
    </tr>

      <tr>
        <td align="right"><b>Alamat Pemesan:</b></td>
        <td><input type="text" name="alamat_admin" value="<?php echo "$alamat";  ?>"required/> </td>
    </tr>

   <tr align="center">
      <td colspan="6"><input type="submit" name="update" value="Update Account" /> </td>
    </tr>


   </table>
   </form>


<?php 
include"includes/db.php";

if(isset($_POST['kode_admin'])){

  $id_pemesan = $_POST['kode_admin'];
  $nama_pemesan = $_POST['nama_pemesan'];
  $notelp_pemesan = $_POST['notelp_pemesan'];
  $alamat_pemesan = $_POST['alamat_pemesan'];
  $email_pemesan = $_POST['email_pemesan'];
  $pass_pemesan = $_POST['pass_pemesan'];

  $update_admin ="UPDATE adminpusat SET nama_admin='$nama_admin',notelp_adminpemesan='$notelp_admin',alamat_admin='$alamat_admin',email_admin='$email_admin',pass_admin='$pass_admin' WHERE kode_admin='$id_admin'";

  $run_update = mysqli_query($con, $update_admin);

  if($run_update){

    echo "<script>('Update Sukses')</script>";
    echo "<script>window.open('profile.php','_SELF')</script>";
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