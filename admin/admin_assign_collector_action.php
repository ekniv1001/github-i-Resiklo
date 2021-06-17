<?php

include '../services/database_connection.php';
 
$user_id = $_GET['user_id'];

$collector = "collector"; 
   $sql = "UPDATE tbl_userinfo SET user_type = '$collector'  where id = '$user_id'";
        $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>
<script>
	alert("User successfully assigned as Collector");
	window.location.href='admin_assign_collector.php';
</script>

<?php

 ?>