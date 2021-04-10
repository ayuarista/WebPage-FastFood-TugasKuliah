<?php
session_start();
include("includes/db.php");
?>
 <!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sean McCannon">
    <title>This is Admin Panel</title> 
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
                <a class="navbar-brand" href="index.php"><font size="6" color="#c0c0c0">LILLAH</font><font size="2" color="#c0c0c0">.com</font></a>
            </div>

            <div class="collapse navbar-collapse">
          
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    </div>
    </div>
    </nav>


    
    <!--.nav-collapse -->

    <div class="col-sm-14">  
    <a href="index.php"><img src="../../lillah/images/banner.jpg" alt="lights" style="width:100%">  </a>

    <div class="bg-2">
        <div class="row">    
        <div class="col-sm-12">
        <div class="panel-heading"></div>
          <h1 class="text-center"> Admin Corner</h1>
          <div class="panel-footer"></div> 
        </div>
    </div>
            </div> 
    </div>



     <div class="login">
<h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>
<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
            <h2> <div class="text-center">Login</div></h2>
        <center><form action="login.php" method="POST" class="form-inline" role="form">
        <div class="form=group">
              <label for="email">Email  :</label>
                <input type="email" name="email" required="required"/>
                 <label for="name">Password  :</label>
        <input type="password" name="password" required="required" />
        <button type="submit" class="btn btn-primary btn-lg" name="login">Login</button></center>
                </div>
            </form>
            </div>
    
    <h1> </h1>
    <h1> </h1>
    <h1> </h1>
       
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
        
</body>
    

    
</html>

<?php



    
    if(isset($_POST['login'])){
            $email_admin= $_POST['email'];
            $password_admin= $_POST['password'];

    $sel_user = "SELECT* FROM adminpusat WHERE email_admin='$email_admin' AND pass_admin='$password_admin'";
    $run_user = mysqli_query($con, $sel_user);
    $check_user = mysqli_num_rows($run_user);
            
    if($check_user==0){
        echo "<script>alert('Password or Email is wrong, try again!')</script>";    

            }
        else {
            $_SESSION['email_admin']=$email_admin;
            echo "<script>window.open('admin_page.php?logged_in=You have successfully logged in!','_self')</script>";
                
            }
    }


?>