
 <form action="" method="post" enctype="multipart/form-data">

  <table align="center">
    <tr align="center">
        <td colspan="6"><h2> Ubah Password </h2> </td>
    </tr>

    <td align="right"><b>Enter Password Sekarang: </b>
    <input type="password" name="pass_sekarang"> </td>
</tr>
<br>
<tr>
    <td align="right"> <b>Enter Password Baru: </b> 
    <input type="password" name="pass_baru"> </td> 
</tr>
<br>
<tr>
     <td align="right"><b>Enter Password Baru lagi: </b> <input type="password" name="pass_baru_lagi"></td>
</tr>
 <br>

<tr align="center">
     <td  colspan="8"><input type="submit" name="ubah_pass" value="Ubah Password"></td>
</tr>

</table>
</form>
<br></br>
<br></br>
<br></br>
<br></br>

<?php
session_start();
$con = mysqli_connect("localhost","root","","lillah");
   if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error(); }

    if (isset($_POST['ubah_pass'])){

      $user = $_SESSION['email_pemesan'];

      $pass_sekarang = $_POST['pass_sekarang'];
      $pass_baru = $_POST['pass_baru'];
      $pass_baru_lagi = $_POST ['pass_baru_lagi'];

      $sel_pass = "SELECT * FROM PEMESAN where pass_pemesan='$pass_sekarang' AND email_pemesan='$user'";

      $run_pass = mysqli_query($con, $sel_pass);

      $check_pass = mysqli_num_rows ($run_pass);

      if ($check_pass==0)
      {
        echo "<script>alert('Password Salah')</script>";
        exit();
      }

      if($pass_baru!=$pass_baru_lagi){

        echo "<script>alert('Password tidak sama')</script>"; 
      }
      else {
        $update_pass= "UPDATE PEMESAN SET pass_pemesan='$pass_baru'";

        $run_update = mysqli_query($con, $update_pass);

        echo "<script>alert('Password Telah Diubah')</script>";

         echo "<script>window.open('akun.php','_SELF')</script>";
      }



    }
  
  ?>