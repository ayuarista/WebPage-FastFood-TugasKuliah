
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
    background: #2d2d30;
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
                <li><a href="view.php">View</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="kurir.php">Kurir</a></li>
   </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php
      include("includes/db.php");

         if(isset($_SESSION['email_admin'])){

          echo "Welcome:" . $_SESSION['email_admin'] ."";
         }
         else {
          echo "Welcome, Admin";
         }

         ?></a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    </div>
    </div>
    </nav>


    
    <!--.nav-collapse -->
    
    
 
    <div class="sidebar">
    <div class="row">
            <div class="col-sm-4"> 
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
      <h2><p><a href="view_kurir.php">view</a></p></h2>
      <h2><p><a href="insert_kurir.php">insert</a></p></h2>
    </div>
 
  </div>
  </div>
  </div>
  </div>
  <div class="col-sm-6 text-left"> 


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
  background: blue;
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

<?php

include("includes/db.php");
?>
 
    <div id="produkbox" style="margin-top:50px;">
      
 <form action="insert_kurir.php"   method="post" enctype="multipart/form-data">
   <table align="left" width="max-1000px" bgcolor="grey" border="2">
   <tr align="center">
       <td colspan="7"><h2>Insert Kurir</h2></td>
   </tr>

     <tr>
       <td>Nama Kurir</td>
       <td><input type="text" name="nama_admin2"  ></td>
   </tr>

    <tr>
       <td>notelp kurir</td>
       <td><input type="text" name="notelp_kurir"></td>
   </tr>

     <tr>
       <td>Alamat Kurir</td>
       <td><input type="text" name="alamat_admin2"  ></td>
   </tr>

      <tr>
       <td>Admin 2</td>
       <td>
       <select name="admin2">
       <option>Pilih </option>

       <?php
    include("includes/db.php");

         $get_adp = "SELECT * FROM admin2";
    
    $run_adp = mysqli_query($con, $get_adp);
    
    while ($row_adp=mysqli_fetch_array($run_adp)){
        
        $kode_adp=$row_adp['kode_admin2'];
        $nama_adp=$row_adp['nama_admin2'];
        
    echo "<option value='$kode_adp'>$nama_adp</option>" ;   
        
    }



       ?>
       </select>

       </td>
   </tr>
  


<td>jangkauan</td>
       <td>
       <select name="jangkauan[]" multiple="multiple">
       <option>Pilih jangkauan</option>

       <?php
    include("includes/db.php");

         $get_jangkauan = "SELECT * FROM kota";
    
    $run_jangkauan = mysqli_query($con, $get_jangkauan);
    
    while ($row_jangkauan=mysqli_fetch_array($run_jangkauan)){
        
        $kodepos=$row_jangkauan['kodepos'];
        $nama_daerah=$row_jangkauan['nama_daerah'];
        
    echo "<option value='$kodepos'>$kodepos,$nama_daerah</option>" ;   
        
    }



       ?>
       </select>

       </td>
   </tr>

       


   <form action="insert_kurir.php" method="post" enctype="multipart/form-data">
   
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

$values = $_POST['jangkauan'];
foreach ($values as $a) {
  echo $a;
}

?>

<?php
  include "includes/db.php";

  

if (isset($_POST['insert_post'])) {
    
    $nama_kurir = $_POST['nama_kurir'];
    $notelp_kurir = $_POST['notelp_kurir'];
    $alamat_kurir = $_POST['alamat_kurir'];
    $admin2 = $_POST['admin2'];
    $jangkauan = $_POST['jangkauan'];

    $insert_kurir = " Insert into kurir (jangkauan_kurir,nama_kurir,notelp_kurir,alamat_kurir,,kode_admin2,) values ('$jangkauan','$nama_kurir','$notelp_kurir','$alamat_kurir','$admin2')";

$insert_kurir = mysqli_query($con, $insert_kurir);
if ($insert_kurir) {
echo "<script>alert('Admin telah dimasukkan')</script>";
echo "<script>window.open('view_kurir.php?insert_kurir','_self')</script>";
}
  
}
  ?>


  </table></form>

  </div></div>

  <div class="col-sm-4"> 
                <div class="sidebar sidebar-fixed-right" role="menubar">  
        <nav class="navbar navbar-inverse navbar-fixed-right" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="view_kurir.php"><font size="6" color="#c0c0c0">View</font></a>
            <div class="collapse navbar-collapse">

    </div>     
    </div><!--.nav-collapse -->
    </div>
  </nav></body></html>
