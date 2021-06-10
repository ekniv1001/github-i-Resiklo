<?php
include 'database_connection.php';

$claim_date = date("Y/m/d H:i:s");
$user_id = $_GET['user_id'];
$reward_id = $_GET['reward_id'];
$claim_status = "unclaimed";
$reward_quantity = $_GET['reward_quantity'];
$balance = $_GET['remaining_point'];
$sql = "INSERT INTO tbl_claim (claim_reward_id, claim_user_id , claim_date, claim_status , claim_quantity) VALUES ( '$reward_id', '$user_id', '$claim_date','$claim_status', '$reward_quantity' )";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));



$sql = "UPDATE tbl_userinfo SET points = '$balance' where id = '$user_id'";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));




if ($qry) { ?>
	<script>
		alert("reward Successfully claimed, Please go to the menro to received item reward");
		window.location.href = '../user/user_rewards.php';
	</script>

<?php

}





?>