<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

include 'database_connection.php';

session_start();


$userId                             = $conn->real_escape_string($_REQUEST['userId'] ?? null);
$sql                                = "SELECT * FROM tbl_userinfo WHERE id='$userId'";


if ($result = $conn->query($sql)) {
    // fetch user and make it an object 
    $user = $result->fetch_object();

    //check $user is not empty
    if(!empty($user)){
        
        // return var_dump($user);
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            $url = "https://";   
        else  
            $url = "http://";   
            
        $url.= $_SERVER['HTTP_HOST'];

        $linkTo                     = "".$url."/services/action_user_activate_account.php?&userId=".$user->id."";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            include 'mail_credentials.php';
            //Recipients
            $mail->addAddress($user->email);               
            //Content
            $mail->isHTML(true);                                  
            $mail->Subject          = 'Account Activation';
            $template               = file_get_contents("../includes/user_verify_email_notification.php");
            $template               = str_replace("{{linkToIResiklo}}", $linkTo , $template);
            $mail->Body             = $template;
            $mail->send();
            
            $_SESSION['status']         = 'Success';
            $_SESSION['status_code']    = 'success';
            $_SESSION['status_message'] = 'Please Check your email to activate your account.';
            
            // return var_dump('success');
            header("Location: /");
            exit();
        } catch (Exception $e) {
                $_SESSION['status']         = 'Email Notification';
                $_SESSION['status_code']    = 'error';
                $_SESSION['status_message'] = 'Whoops Something went wrong!';
                // return var_dump('error sa email');
                header("Location: /");
              exit();
        }
       
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
exit();


?>