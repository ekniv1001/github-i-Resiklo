<?php 

include "session.php";
include "connection.php";


if(isset($_POST['claimbtn'])){
	$reward_quantity = $_POST['reward_quantity'];
	$balance = $_POST['user_balance'];
  $reward_id = $_POST['reward_id'];
    $user_id = $_POST['user_id'];
    $reward_amount = $_POST['reward_amount'];

$reward_total_amount = ((int)$reward_quantity) * ((int)$reward_amount);


    if($balance >= $reward_total_amount){
$user_remaining_balance = ($balance - $reward_total_amount); 
?>
<script>
 const answer = confirm("Are you sure you want to claim this item?");
if(answer == true){
window.location.href='claim_action.php?reward_id=<?php echo $reward_id; ?>&user_id=<?php echo $user_id; ?>&balance=<?php echo $user_remaining_balance; ?>';
}

</script>
<?php

}else{ ?>
<script>
	alert("sorry your points is not enough to claim this reward");
</script>

	<?php

}}





?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
include "sessionbody.php";  


 $user_id;

?>

<?php 
$user_balance = $row['balance'];
 ?>


<h1>user Balance: <?php echo $user_balance; ?></h1>



	<div class="container-fluid">



<a href="logout.php">logout</a>

<div class="row">
<div class="col-sm-3">
	
</div>
<div class="col-sm-6">
	<div class="well">

<table class="table table-bordered">
	<thead>
		<tr>
			<td scope="col">seq</td>
			<td scope="col">reward name</td>
			<td scope="col">reward info</td>
			<td scope="col">status</td>
		</tr>
	</thead>
	<tbody>

<?php 
$seq = 1;
 $qry2 = "SELECT * FROM claiming_reward where claim_user_id = '$user_id' "; 
  $result2 = mysqli_query($con, $qry2);
while($show2 = mysqli_fetch_array($result2)){ 

$reward_id = $show2['claim_reward_id'];

 $qry1 = "SELECT * FROM reward_list where reward_id = '$reward_id'"; 
  $result1 = mysqli_query($con, $qry1);
while($show1 = mysqli_fetch_array($result1)){ 

	?>

		<tr>
			<td><?php echo $seq++; ?></td>
		<td><?php echo $show1['reward_title']; ?></td>	
		<td><?php echo $show1['reward_info']; ?> </td>	
		<td><?php echo $show1['reward_amount']; ?> </td>	



		</tr>


<?php }
} ?>

	</tbody>
</table>
















	</div>
</div>


</div>




		<div class="row">
<?php 





 $qry = "SELECT * FROM reward_list"; 
  $result = mysqli_query($con, $qry);

while($show = mysqli_fetch_array($result)){ ?>



	<div class="col-sm-3">
		<div class="well">
			<p>Title: <label><?php echo $show['reward_title']; ?></p></label><br>
			<p>Info: <label><?php echo $show['reward_info']; ?></p></label><br>
			<p>Amount: <label><?php echo $show['reward_amount']; ?></p></label><br>
<form method="POST" action="">
	<input type="text" name="reward_id" value="<?php echo $show['reward_id']; ?>" hidden>
	<input type="text" name="user_id" value="<?php echo isset($user_id) ? $user_id :'' ?>" hidden>
	<input type="text" name="user_balance" value="<?php echo $user_balance; ?>" hidden>
	<input name="reward_amount" value="<?php echo $show['reward_amount'];?>" hidden>
 
<input type="number" name="reward_quantity" required="">

			<button type="submit" name="claimbtn">Claim</button>

</form>





	
	</div>
</div>












	<?php
  









}











?>




	</div>




















</div>

</body>
</html>