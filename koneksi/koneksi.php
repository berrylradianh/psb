<?php  

error_reporting(0);

$db_name 	= "psb";
$host		= "localhost";
$username	= "root";
$password	= "";

$conn 		= mysqli_connect($host,$username,$password,$db_name) or die("Database connection error!");


?>