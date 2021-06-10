<?php  

// di magoopen file unless maglogin
// before <body>  icocode

include '../services/database_connection.php';
session_start();
if(isset($_SESSION['id'])){
}
	else {

		echo"<script> 
	alert('Login First before entering the Page.')
		window.location='../collector_login.php';</script>";
	}

?>

