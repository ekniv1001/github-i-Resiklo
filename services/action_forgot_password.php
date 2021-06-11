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
    // encrypting email of the user to pass in request
    $ciphering                  = "AES-128-CTR";
    $iv_length                  = openssl_cipher_iv_length($ciphering);
    $options                    = 0;
    $encryption_iv              = '1234567891011121';
    $encryption_key             = 'iresiklo';
    $encryptedUserEmail         = openssl_encrypt($user->email, $ciphering,$encryption_key, $options, $encryption_iv);
    $linkTo                     = "http://iresiklo.test/reset_code.php?&user=".$encryptedUserEmail."";

    //check $user is not empty
    if(!empty($user)){
        $updateSql                  = "UPDATE tbl_userinfo SET otp = '$otp'  where id = '$user->id'";
        $qry                        = mysqli_query($conn, $updateSql) or die(mysqli_error($conn));

        $mail = new PHPMailer(true);

        try {
            //Server settings
            include 'mail_credentials.php';
            //Recipients
            $mail->addAddress('danielenacis@gmail.com');               
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
            $_SESSION['status_message'] = 'We sent an reset code to your email!';
            
            unset($_SESSION['old_request']);
            header("Location: /reset_code.php?&user=".$encryptedUserEmail."");
            exit();
            // echo "<script>
            //     window.location.href='/reset_code.php?&user=".$encryptedUserEmail."'
            // </script>";
        } catch (Exception $e) {
                $_SESSION['status']         = 'Error';
                $_SESSION['status_code']    = 'error';
                $_SESSION['status_message'] = 'Whoops Something went wrong!';
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