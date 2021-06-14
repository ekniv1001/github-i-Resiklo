<?php  

// di magoopen file unless maglogin
// before <body>  icocode

include '../services/database_connection.php';
session_start();
if(isset($_SESSION['id'])){
}
	else {

        $_SESSION['status'] = 'Error';
        $_SESSION['status_code'] = 'error';
        $_SESSION['status_message'] = 'You must be logged in before accessing this page.';
        header("Location: ../admin_login.php");
        exit();
    }

?>

