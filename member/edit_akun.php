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
    
  
  <form action="" method="post" enctype="multipart/form-data">

  <table align="center" width="750">
    <tr align="center">
        <td colspan="6"><h2> Update Akun </h2> </td>
    </tr>

    <tr>
        <td align="right"><b>Nama :</b></td>
        <td><input type="text" name="nama_pemesan" value="<?php echo "$nama"; ?>" required /></td>
    </tr>

     <tr>
        <td align="right"><b>Email :</b></td>
        <td><input type="text" name="email_pemesan" value="<?php echo "$email"; ?>" required/></td>
    </tr>

    <tr>
        <td align="right"><b> Password:</b></td>
        <td><input type="password" name="pass_pemesan" value="<?php echo "$password"; ?>" required/></td>
    </tr>

      <tr>
        <td align="right"><b>No telepon/Hp:</b></td>
        <td><input type="text" name="notelp_pemesan" value="<?php echo "$notelp"; ?>" required/></td>
    </tr>

      <tr>
        <td align="right"><b>Alamat Pemesan:</b></td>
        <td><input type="text" name="alamat_pemesan" value="<?php echo "$alamat";  ?>"required/> </td>
    </tr>

      <tr>
         <td align="right"><b>Kodepos</b></td>
        <td>
       <select name="kodepos" >
       <option><?php echo "$kodepos"; ?></option>
       <option>Pilih kodepos</option>

       <?php
         $get_kodepos = "SELECT * FROM kota";
    
    $run_kodepos = mysqli_query($con, $get_kodepos);
    
    while ($row_kota=mysqli_fetch_array($run_kodepos)){
        
        $kodepos=$row_kota['kodepos'];
        $nama_kota=$row_kota['nama_kota'];
        $nama_daerah=$row_kota['nama_daerah'];

        
    echo "<option value='$kodepos'>$kodepos-$nama_kota,$nama_daerah</option>" ;   
        
    }



       ?>
       </select>

       </td>
   </tr>

   <tr align="center">
      <td colspan="6"><input type="submit" name="update" value="Update Account" /> </td>
    </tr>







   </table>
   </form>
   <br></br>
   <br></br>
   <br></br>

 

<?php 
include"includes/db.php";

if(isset($_POST['kodepos'])){

  $ip= getIp();
  
  $id_pemesan = $p_id;
  $nama_pemesan = $_POST['nama_pemesan'];
  $notelp_pemesan = $_POST['notelp_pemesan'];
  $alamat_pemesan = $_POST['alamat_pemesan'];
  $email_pemesan = $_POST['email_pemesan'];
  $pass_pemesan = $_POST['pass_pemesan'];
  $kodepos = $_POST['kodepos'];

  $update_pemesan ="UPDATE pemesan SET ip_pemesan='$ip',nama_pemesan='$nama_pemesan',notelp_pemesan='$notelp_pemesan',alamat_pemesan='$alamat_pemesan',email_pemesan='$email_pemesan',pass_pemesan='$pass_pemesan',kodepos='$kodepos' WHERE id_pemesan='$id_pemesan'";

  $run_update = mysqli_query($con, $update_pemesan);

  if($run_update){

    echo "<script>('Update Sukses')</script>";
    echo "<script>window.open('akun.php','_SELF')</script>";
  }
}

 ?>

