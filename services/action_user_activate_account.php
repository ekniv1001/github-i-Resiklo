<?php 

include 'database_connection.php';
session_start();

$userId                             = $conn->real_escape_string($_REQUEST['userId'] ?? null);
$sql                                = "SELECT * FROM tbl_userinfo WHERE id='$userId'";

if ($result = $conn->query($sql)) {
    // fetch user and make it an object 
    $user = $result->fetch_object();

    //check $user is not empty
    if(!empty($user)){
        $timestamp                  = date("Y-m-d H:i:s");
        $updateSql                  = "UPDATE tbl_userinfo SET email_verified_at = '$timestamp'  where id = '$userId'";
        $qry                        = mysqli_query($conn, $updateSql) or die(mysqli_error($conn));

        $_SESSION['status']         = 'Success';
        $_SESSION['status_code']    = 'success';
        $_SESSION['status_message'] = 'Succesfully Activated!';
        header("Location: /");
        exit();
    }
    else{
        $_SESSION['status']         = 'Error';
        $_SESSION['status_code']    = 'error';
        $_SESSION['status_message'] = 'Whoops something went wrong!';
        header("Location: /");
        exit();
    }

    $result->free_result();
}
$conn->close();
header("Location: /");
exit();

?>