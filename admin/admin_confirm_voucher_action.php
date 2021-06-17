<?php 

include "../services/database_connection.php";
$claim_id = $_GET['claim_id'];



$unclaimed = "unclaimed";
$query = "UPDATE tbl_claim set claim_status = '$unclaimed' where claim_id = '$claim_id' ";
 $result = mysqli_query($conn, $query);


if($result){
?>
<script>
	alert("Claim voucher request is successfully approved");
	window.location.href='admin_confirm_voucher.php';
</script>
<?php


}
 ?>
