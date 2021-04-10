<?php
	include("includes/db.php");

	if(isset($_GET['delete_cat'])){

	$delete_id = $_GET['delete_cat'];
	
	$delete_cat = "delete from kategori where kode_kategori='$delete_id'";
	$run_delete=mysqli_query($con, $delete_cat);
	if($run_delete){

		echo"<script>alert('Kategori telah dihapus!')</script>";
		echo"<script>window.open('view_cats.php?view_cats','_self')</script>";
		}
	}



	?>