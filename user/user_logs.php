<?php
include "session.php";
include '../services/database_connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">


    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />
    <!-- Import fontawesome -->
    <script src="https://kit.fontawesome.com/621283ac00.js" crossorigin="anonymous"></script>

    <title>History</title>

</head>


<body>
 <?php
  include "sessionbody.php";
   ?> 
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="user_home_view.php" class="brand-logo" style="font-weight: 600;">i-Resiklo</a>
                        <a href="#" data-target="mobile-ver" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li style="font-weight: 600;"><a href="user_home_view.php">Home</a></li>
                            <li style="font-weight: 600;"><a href="user_profile.php">Profile</a></li>
                            <li style="font-weight: 600;"><a href="user_rewards.php">Rewards</a></li>
                            <li style="font-weight: 600;"><a href="user_points.php">My Points</a></li>
                            <li style="font-weight: 600;"><a href="user_voucher.php">Voucher</a></li>
                            <li style="font-weight: 600;"><a href="user_logs.php">History</a></li>
                            <li style="font-weight: 600;"><a href="../services/logout.php">Logout</a></li>
                            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
                            <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-ver">
            <li style="font-weight: 600;"><a href="user_home_view.php">Home</a></li>
            <li style="font-weight: 600;"><a href="user_profile.php">Profile</a></li>
            <li style="font-weight: 600;"><a href="user_rewards.php">Rewards</a></li>
            <li style="font-weight: 600;"><a href="user_points.php">My Points</a></li>
            <li style="font-weight: 600;"><a href="user_voucher.php">Voucher</a></li>
            <li style="font-weight: 600;"><a href="user_logs.php">History</a></li>
            <li style="font-weight: 600;"><a href="../services/logout.php">Logout</a></li>
            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
        </ul>
    </header>

    <main>
        <div class="container">
        <h2 class="green-text">Points and Rewards</h2>
        <div class="divider"></div><br>
            <div class="card-panel teal lighten-2">
                <strong class="white-text">RECEIVED POINTS</strong>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Collectors Name</th>
                        <th>Points Received</th>
                        <th>Date Received</th>
                    </tr>
                </thead>
                <tbody>


<?php 
$user_id = isset($id) ? $id : '';
$qry1 = "SELECT * FROM tbl_summary where user_id = '$user_id'";
          $result1 = mysqli_query($conn, $qry1);
          while ($show1 = mysqli_fetch_array($result1)) {
                $collector_id = $show1['collector_id'];


$qry2 = "SELECT * FROM tbl_userinfo where id = '$collector_id'";
          $result2 = mysqli_query($conn, $qry2);
          while ($show2 = mysqli_fetch_array($result2)) {



 ?>


                    <tr>
                        <td><?php echo $show2['last_name'].", ".$show2['first_name']; ?></td>



<?php } ?>

                        <td><?php echo $show1['points_added']; ?></td>
                        <td><?php echo $show1['date_added']; ?></td>
                    </tr>



<?php } ?>






                </tbody>










            </table>
<div style="height: 100px;"></div>
            <div class="card-panel teal lighten-2">
                <strong class="white-text">CLAIMED REWARDS</strong>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Reward Item</th>
                        <th>Quantity</th>
                        <th>Equivalent Points</th>
                        <th>Date Claimed</th>
                    </tr>
                </thead>
                <tbody>


<?php 

  $claim_status = "claimed";
          $qry1 = "SELECT * FROM tbl_claim where claim_status = '$claim_status' and claim_user_id = '$user_id'";
          $result1 = mysqli_query($conn, $qry1);
          while ($show1 = mysqli_fetch_array($result1)) {
            $reward_id = $show1['claim_reward_id'];


 $qry3 = "SELECT * FROM tbl_rewards where id_reward = '$reward_id'";
                $result3 = mysqli_query($conn, $qry3);
                while ($show3 = mysqli_fetch_array($result3)) {

 ?>
                    <tr>
                        <td><?php echo $show3['reward_item'];  ?></td>



                     <td><?php echo $show1['claim_quantity']; ?></td>



                        <td><?php echo (int)($show1['claim_quantity']) * (int)($show3['equiv_points']); ?></td>

<?php } ?>

                        <td><?php echo $show1['claim_date']; ?></td>
                    </tr>



<?php } ?>

                </tbody>
            </table>
        </div>
    </main>





    <div style="height: 200px;"></div>
    <footer>
        <?php
        include '../components/footer.php';
        ?>
    </footer>