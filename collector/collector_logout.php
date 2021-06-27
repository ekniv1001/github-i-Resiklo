<?php

Session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
header ('LOCATION:../index.php');
?>
