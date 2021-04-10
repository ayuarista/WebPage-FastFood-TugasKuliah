<br>
<br>
<br>
<br>
<h2 style="text-align:center;"> Apakah anda yakin untuk menghapus akun ini?
<form action="" method="post">

<input type="submit" name="ya" value="ya"/>
<input type="submit" name="tidak" value="tidak"/>

</form>
</h2>

<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<?php
session_start();
include("../../lillah/admin/includes/db.php");

$user = $_SESSION['email_pemesan'];

if(isset($_POST['ya'])){

$delete_pemesan = "DELETE from PEMESAN where email_pemesan='$user'";
$run_pemesan = mysqli_query($con, $delete_pemesan);

echo "<script>alert('Akun anda telah terhapus')</script>";
echo "<script>window.open('../index.php','_SELF')</script>";
}

if(isset($_POST['tidak'])){


echo "<script>alert('Akun anda tidak terhapus')</script>";
echo "<script>window.open('akun.php','_SELF')</script>";
}

?>