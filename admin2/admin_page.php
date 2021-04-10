 <!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sean McCannon">
    <title>WELCOME - Admin 2</title> 
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
                <li><a href="view.php">View</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="kurir.php">Kurir</a></li>

	 </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php
      include("includes/db.php");

         if(isset($_SESSION['email_admin'])){

          echo "Welcome:" . $_SESSION['email_admin'] ."";
         }
         else {
          echo "Welcome, Admin";
         }

         ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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

<div class="bg-2">
        <div class="row">
                
        <div class="col-sm-12" id="leftdiv">
            <h3> <p class="text-center"> LILLAH.com? </p> </h3>
            <p class="text-center"> Cinta adalah Emosi yang berasal dari kasih sayang yang kuat dan rasa tertarik terhadap suatu objek </p>
            <p class="text-center">         (dapat berupa apa saja seperti manusia, hewan, tumbuhan, alat-alat dan lain sebagainya) dengan </p>
            <p class="text-center">cenderung ingin berkorban, memiliki rasa empati, perhatian, kasih sayang, ingin membantu dan mau mengikuti </p>
            <p class="text-center">apapun  yang di inginkan oleh objek yang di cintainya. Sebenarnya cinta itu sulit untuk di definisikan karena</p>
            <p class="text-center">sifatnya subjektif jadi setiap individu dapat memiliki pemahaman yang berbeda mengani cinta, tergantung </p>
            <p class="text-center">bagaimana ia menghayati dan pengalaman yang di alaminya. </p>
            
        </div>
    </div>
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