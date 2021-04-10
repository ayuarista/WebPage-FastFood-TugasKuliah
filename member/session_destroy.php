 <?php
 session_start();

 session_destroy();

 echo "<script>window.open('menu.php','_SELF')</script>";

 ?>
