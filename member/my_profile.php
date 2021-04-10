<?php
session_start();
   $con = mysqli_connect("localhost","root","","lillah");
   if (mysqli_connect_errno()) {
    echo "Koneksi Gagal" . mysqli_connect_error();
}

    $user = $_SESSION['email_pemesan'];

    $get_pemesan = "SELECT * FROM pemesan where email_pemesan='$user'";

    $run_pemesan = mysqli_query ($con, $get_pemesan);

    $row_pemesan = mysqli_fetch_array($run_pemesan);
    $p_id = $row_pemesan ['id_pemesan'];
    $nama = $row_pemesan['nama_pemesan'];
    $notelp = $row_pemesan['notelp_pemesan'];
    $alamat= $row_pemesan['alamat_pemesan'];
    $email= $row_pemesan['email_pemesan'];
    $password = $row_pemesan['pass_pemesan'];
    $kodepos = $row_pemesan['kodepos'];



?>


<!DOCTYPE html >



<body>
    
 

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
      <tr>
         <td><b>Kodepos : </b><?php echo "$kodepos"; ?></td>
        </tr>
      
   </table>

   <br></br>
   <br></br>

<br></br>
<br></br>
<br></br>



   </body>

 