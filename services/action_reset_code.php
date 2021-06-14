<?php
include 'database_connection.php';

session_start();

unset($_SESSION['old_request']);
$email                              = $conn->real_escape_string($_REQUEST['user']);
$userid                              = $conn->real_escape_string($_REQUEST['id']);
$sql                                = "SELECT * FROM tbl_userinfo WHERE email='$email' AND id ='$userid'";
// return var_dump($_POST);
if ($result = $conn -> query($sql)) {
    // fetch user and make it an object 
    $user = $result->fetch_object();
    //check $user is not empty
    if(!empty($user)){

        if($_POST['otp'] == $user->otp)
        {
            // $updateSql                  = "UPDATE tbl_userinfo SET otp = null  where id = '$user->id'";
            // $qry                        = mysqli_query($conn, $updateSql) or die(mysqli_error($conn));
            $_SESSION['status']         = 'Success';
            $_SESSION['status_code']    = 'success';
            $_SESSION['status_message'] = 'Reset Code Verified! You may now reset your password';
            $_SESSION['old_request']    = $_POST;
            unset($_SESSION['old_request']);
            header("Location: /new_password.php?&user=".$_REQUEST['user']."&id=".$_REQUEST['id']."");
            exit();
        }
        else
        {
            $_SESSION['status']         = 'Error';
            $_SESSION['status_code']    = 'error';
            $_SESSION['status_message'] = 'Oops! Invalid Reset Code!';
            $_SESSION['old_request']    = $_POST;
           
            header("Location: /reset_code.php?&user=".$_REQUEST['user']."&id=".$_REQUEST['id']."");
            exit();
        }
       

    }
    else{
        $_SESSION['status']         = 'Error';
        $_SESSION['status_code']    = 'error';
        $_SESSION['status_message'] = 'Oops! Something Went Wrong!';
        $_SESSION['old_request']    = $_POST;
        header("Location: /reset_code.php?&user=".$_REQUEST['user']."&id=".$_REQUEST['id']."");
        exit();
    }

    $result->free_result();
}
$conn->close();
exit();
?>