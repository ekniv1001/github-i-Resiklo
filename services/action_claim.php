<?php
include 'database_connection.php';

$claim_date = date("Y/m/d H:i:s");
$user_id = $_GET['user_id'];
$reward_id = $_GET['reward_id'];
$claim_status = "request";
$reward_quantity = $_GET['reward_quantity'];
$balance = $_GET['remaining_point'];
$sql = "INSERT INTO tbl_claim (claim_reward_id, claim_user_id , claim_date, claim_status , claim_quantity) VALUES ( '$reward_id', '$user_id', '$claim_date','$claim_status', '$reward_quantity' )";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));



$sql = "UPDATE tbl_userinfo SET points = '$balance' where id = '$user_id'";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));


 $qry = "SELECT * FROM tbl_rewards where id_reward ='$reward_id' ";
    $result = mysqli_query($conn, $qry);
    while ($show = mysqli_fetch_array($result)) {
$reward_stock = $show['reward_stock'];
    }


$new_stock = (int)($reward_stock) - (int)($reward_quantity);

$sql = "UPDATE tbl_rewards SET reward_stock = '$new_stock' where id_reward = '$reward_id' ";
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));





if ($qry) { ?>
	<script>
		alert("Voucher request successful, Please wait for the Admin to approve your request before claiming your reward(s)");
		window.location.href = '../user/user_rewards.php';
	</script>

<?php

}





?>