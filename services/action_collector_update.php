<?php 

include 'database_connection.php';
$status = "add_points";
$date_added = date("Y-m-d H:i:s");
$user_id = $_GET['user_id'];
$total_points = $_GET['total_points'];
$collector_id = $_GET['collector_id'];
$num_bottles = $_GET['num_bottles'];


 $qry1 = "SELECT * FROM tbl_userinfo where id = '$user_id' ";
    $result1 = mysqli_query($conn, $qry1);
     while ($show = mysqli_fetch_array($result1)){
$points = $show['points'];
     }
$updated_points = ((int)$points) + ((int)$total_points);


$sql = "UPDATE tbl_userinfo SET points = '$updated_points' where id = '$user_id'";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$sql = "INSERT INTO tbl_summary (collector_id, user_id,  num_bottles, points_added, status,  date_added) VALUES ( '$collector_id', '$user_id', '$num_bottles', '$total_points' , '$status', '$date_added' ) ";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));


?>

<script>
	alert("points successfully added");
	window.location.href='../collector/collector_search.php';
</script>
<?php

 ?>