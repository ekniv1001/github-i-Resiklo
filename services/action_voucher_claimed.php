<?php 
include 'database_connection.php';
$claim_id = $_GET['claim_id'];
$user_id = $_GET['user_id'];
$claimed = "claimed";

$sql = "UPDATE tbl_claim SET claim_status = '$claimed' where claim_id = '$claim_id'";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$collector_id = 0;
  $date_added = date("Y-m-d H:i:s");
$sql = "INSERT INTO tbl_logs (user_id, collector_id, log_date, remarks) VALUES ('$user_id' , '$collector_id', '$date_added' , '$claimed') ";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));



?>
<script>
	alert("Voucher Successfully Redeem");
	window.location.href='../user/user_voucher.php';
</script>

<?

 ?>