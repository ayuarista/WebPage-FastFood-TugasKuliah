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
    <link rel="stylesheet" type="text/css" href="../../lillah/styles/index_styles.css">
    <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>

  
<style >
  body {
    background: #2d2d30
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
</style>
   
    
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
    
    <div class="sidebar">
    <div class="row">
            <div class="col-sm-2"> 
                <div class="sidebar sidebar-fixed-right" role="menubar">  
        <nav class="navbar navbar-inverse navbar-fixed-right" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="manage.php"><font size="6" color="#c0c0c0">View</font></a>
            <div class="collapse navbar-collapse">
    </div>     
    </div><!--.nav-collapse -->
    </div>
  </nav>

  
   <div class="container-fluid text-center">    
  <div class="row">
    <div class="col-sm-100 sidenav">
      <h2><p><a href="view_cats.php">Category</a></p></h2>
      <h2><p><a href="view_product.php">Product</a></p></h2>
      <h2><p><a href="view_admin2.php">Admin 2</a></p></h2>
    </div>
   
  </div>
  </div>
  </div>
  </div>
  <div class="col-sm-4 text-left"> 

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
  padding:24px;
  text-align:left;
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
  color:#FFFFFF;
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
  padding:20px;
  text-align:left;
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
 

<table width="795" align="center" bgcolor="pink">

  <tr align="center">
    <td colspan="12"><h2>View All Admin2 Here</h2></td>
  </tr>
  <tr align="center" bgcolor="skyblue">
    <th>S.N</th>
    <th>Id Admin2</th>
    <th>Nama Admin2</th>
    <th>Alamat</th>
    <th>Email</th>
    <th>Admin Pusat</th>
    <th>Kode Cabang</th>
    <th>jangkauan</th>
    <th>nama kurir</th>
    <th>telepon kurir</th>
    <th>Pass admin2</th>
    <th>Delete</th>
  </tr>
  <?php
  include("includes/db.php");

  $get_a2= "SELECT * from admin2";
  $run_a2 = mysqli_query($con, $get_a2);

  $i= 0 ;

  while ($row_a2=mysqli_fetch_array($run_a2)){

    $a2_id = $row_a2['kode_admin2'];
    $a2_name = $row_a2['nama_admin2'];
    $a2_alamat= $row_a2['alamat_admin2'];
    $a2_email = $row_a2['email_admin2'];
    $a2_adminpusat = $row_a2['kode_admin'];
    $a2_kodecabang= $row_a2['kode_cabang'];
    $a2_jangkauan = $row_a2['jangkauan_admin2'];
    $a2_namakurir = $row_a2['nama_kurir'];
    $a2_teleponkurir = $row_a2['telepon_kurir'];
    $a2_passadmin2 = $row_a2['pass_admin2'];
    $i++;

  


  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $a2_id;?></td>
    <td><?php echo $a2_name;?></td>
    <td><?php echo $a2_alamat;?></td>
    <td><?php echo $a2_email;?></td>
    <td><?php echo $a2_adminpusat;?></td>
    <td><?php echo $a2_kodecabang;?></td>
    <td><?php echo $a2_jangkauan;?></td>
    <td><?php echo $a2_namakurir;?></td>
    <td><?php echo $a2_teleponkurir;?></td>
    <td><?php echo $a2_passadmin2;?></td>
    <td><a href="delete_c.php?delete_c=<?php echo $c_id;?>">Delete</a></td>
  </tr>
  <?php } ?>
  

<div class="col-sm-4"> 
                <div class="sidebar sidebar-fixed-right" role="menubar">  
        <nav class="navbar navbar-inverse navbar-fixed-right" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="insert_product.php"><font size="6" color="#c0c0c0">Insert</font></a>
            <div class="collapse navbar-collapse">

    </div>     
    </div><!--.nav-collapse -->
    </div>
  </nav>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   

    </body>
    

    
</html>