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

  <table align="center" width="750" height="">
        <td colspan="6"><h2> My Profile </h2> </td>
    </tr>
    <tr>
        <td><b>Nama : </b><?php echo "$nama"; ?></td>
        
    </tr>

     <tr>
        <td><b>Email : </b><?php echo "$email"; ?></td>
    </tr>
      <tr>
        <td><b>No telepon/Hp: </b><?php echo "$notelp"; ?></td>
    </tr>
      <tr>
        <td><b>Alamat Pemesan: </b><?php echo "$alamat";  ?></td>
    </tr>
  </table>

 
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