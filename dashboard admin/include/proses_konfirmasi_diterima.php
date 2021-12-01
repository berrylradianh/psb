<?php
	error_reporting(0);

	$db_name 	= "psb";
	$host		= "localhost";
	$username	= "root";
	$password	= "";
	
	$conn 		= mysqli_connect($host,$username,$password,$db_name) or die("Database connection error!");
	
	
	$id_user = $_GET['id_user'];

	$query = "UPDATE detail_pendaftaran SET status_pendaftaran = 'DITERIMA' WHERE id_user = '$id_user'";

	mysqli_query($conn, $query);
	echo'<script> window.location="../index.php?page=7"; </script> ';
	
?>