<?php 

include "../services/database_connection.php";
$claim_id = $_GET['claim_id'];



$claimed = "claimed";
$query = "UPDATE tbl_claim set claim_status = '$claimed' where claim_id = '$claim_id' ";
 $result = mysqli_query($conn, $query);


if($result){
?>
<script>
	alert("Item successfully marked as claimed");
	window.location.href='admin_confirm_voucher.php';
</script>
<?php


}
 ?>
