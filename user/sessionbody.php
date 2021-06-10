<?php  
include '../services/database_connection.php';
// fetch all the data in a row of specific ID Number
//after <body> icocode

$id=$_SESSION['id'];

$result=mysqli_query($conn,"SELECT * FROM tbl_userinfo where id ='$id'");
$row=mysqli_fetch_array($result);

// "== 1" that means may isang data in a ROW as RESULT
 if(mysqli_num_rows($result) == 1 ){
      $_SESSION['id']=$row['id'];
      } 
      ?>