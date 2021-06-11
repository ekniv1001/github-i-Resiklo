<?php
include 'database_connection.php';

session_start();
unset($_SESSION['old_request']);
$email                              = $conn->real_escape_string($_POST['email']);
$sql                                = "SELECT * FROM tbl_userinfo WHERE email='$email'";

if ($result = $conn -> query($sql)) {
    // fetch user and make it an object 
    $user = $result->fetch_object();
    // creating one time password (random 6 characters)
    $otp  = substr(md5(microtime()),rand(0,26),6);
    //check $user is not empty
    if(!empty($user)){
        $updateSql                  = "UPDATE tbl_userinfo SET otp = '$otp'  where id = '$user->id'";
        $qry                        = mysqli_query($conn, $updateSql) or die(mysqli_error($conn));

        // $_SESSION['status']         = 'Error';
        // $_SESSION['status_code']    = 'error';
        // $_SESSION['status_message'] = 'Invalid Email';
        header("Location: /");
        exit();
    }
    else{
        $_SESSION['status']         = 'Error';
        $_SESSION['status_code']    = 'error';
        $_SESSION['status_message'] = 'Invalid Email';
        $_SESSION['old_request']    = $_POST;
        header("Location: /forgot_password.php");
        exit();
    }

    $result->free_result();
}
$conn->close();
exit();
?>