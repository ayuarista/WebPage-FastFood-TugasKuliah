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
    



<div id="produkbox">

    <FORM action="" method="post" enctype="multipart/form-data">
      
      <table align="center" width="1000px">
        <tr align="center">
        <td colspan="5"><h2>My Orders</h2> </td>
        </tr>

<?php 
  $total = 0;

global $con;

$ip= getIp();

$sel_price = "SELECT * FROM detailorder where ip_detail='$ip'";

$run_price = mysqli_query ($con, $sel_price);
while ($p_price=mysqli_fetch_array($run_price))
{ $kode_produk = $p_price['produk_detail'];
  $harga_produk= " SELECT * FROM produk where kode_produk='$kode_produk'" ;

  $run_pro_price = mysqli_query ($con,$harga_produk);
  while ($pp_price = mysqli_fetch_array($run_pro_price)) {
    
    $harga_produk = array($pp_price['harga_produk']);
    $nama_produk = $pp_price['nama_produk'];
    $img_produk = $pp_price['img_produk'];

    $single_price = $pp_price['harga_produk'];

  
  ?>
<td><h3> <?php echo $nama_produk;?></h3>
<img src="img_produk/<?php echo $img_produk;?>" width="180px" height="180px"/>
<p><b> <?php echo $single_price; ?> </b></p>
<a href='details.php?kode_pro=$kode_pro' style='float:left;'> <button type='button' class='btn btn-default btn-sm'> Detail </button> </a>
            <a href='menu.php?detailorder=$kode_pro'><button type='button' class='btn btn-default btn-sm'> Add to Cart </button> </a></td>


<?php } } ?>

        <tr></tr>
</table>
<br><br><br>
        <table align="center" width="700px">
        <tr align="center">
          <th>Tanggal</th>
          <th>Status</th>
          <th>Total</th>
        </tr>
<tr>
<th></th>
<th></th>
<th>
  <?php 
  $total = 0;

global $con;

$ip= getIp();

$sel_price = "SELECT * FROM detailorder where ip_detail='$ip'";

$run_price = mysqli_query ($con, $sel_price);
while ($p_price=mysqli_fetch_array($run_price))
{ $kode_produk = $p_price['produk_detail'];
  $harga_produk= " SELECT * FROM produk where kode_produk='$kode_produk'" ;

  $run_pro_price = mysqli_query ($con,$harga_produk);

  while ($pp_price = mysqli_fetch_array($run_pro_price)) {
    
    $harga_produk = array($pp_price['harga_produk']);
    $nama_produk = $pp_price['nama_produk'];
    $img_produk = $pp_price['img_produk'];

    $single_price = $pp_price['harga_produk'];

    $values = array_sum($harga_produk);

    $total += $values;
    $onkir =10000;

    
    
  }
}
$sub=$total+$onkir;
echo "$sub";
  ?>

</th>
</tr>


</table>
      
    </FORM>

<?php


