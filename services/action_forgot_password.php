<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

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
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            $url = "https://";   
        else  
            $url = "http://";   
        $url.= $_SERVER['HTTP_HOST'];
        // $linkTo                     = "http://iresiklo.test/reset_code.php?&user=".$user->email."&id=".$user->id."";
        $linkTo                     = "".$url."/reset_code.php?&user=".$user->email."&id=".$user->id."";
        $updateSql                  = "UPDATE tbl_userinfo SET otp = '$otp'  where id = '$user->id'";
        $qry                        = mysqli_query($conn, $updateSql) or die(mysqli_error($conn));

        $mail = new PHPMailer(true);

        try {
            //Server settings
            include 'mail_credentials.php';
            //Recipients
            $mail->addAddress($user->email);               
            //Content
            $mail->isHTML(true);                                  
            $mail->Subject          = 'Password Reset';
            $template               = file_get_contents("../includes/forgot_password_email_notification.php");
            $template               = str_replace("{{OTP}}", $otp , $template);
            $template               = str_replace("{{linkToIResiklo}}", $linkTo , $template);
            $mail->Body              = $template;
            // $mail->AltBody          = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            
            $_SESSION['status']         = 'Success';
            $_SESSION['status_code']    = 'success';
            $_SESSION['status_message'] = 'We sent a password reset code to your email!';
            
            unset($_SESSION['old_request']);
            // header("Location: /reset_code.php?&user=".$user->email."&id=".$user->id."");
            header("Location: /");
            exit();
            // echo "<script>
            //     window.location.href='/reset_code.php?&user=".$encryptedUserEmail."'
            // </script>";
        } catch (Exception $e) {
                $_SESSION['status']         = 'Error';
                $_SESSION['status_code']    = 'error';
                $_SESSION['status_message'] = 'Oops! Something went wrong!';
                $_SESSION['old_request']    = $_POST;
                header("Location: /forgot_password.php");
              exit();
        }
       
        // header("Location: /reset_code.php?&user=".$encryptedUserEmail."");
        // exit();
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