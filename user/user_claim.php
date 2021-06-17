<?php include "session.php";
include "sessionbody.php";
$claim_id = $_GET['claim_id'];


if (isset($_POST['claimbtn'])) {

    $claimed = "claimed";
?>
    <script>
        const answer = confirm("Are you sure you want to mark this as claimed item?");
        if (answer == true) {
            window.location.href = '../services/action_voucher_claimed.php?claim_id=<?php echo $claim_id; ?>&user_id=<?php echo isset($id) ? $id : ''; ?>';
        } else {


        }
    </script>F

<?php
}



$qry = "SELECT * FROM tbl_claim where claim_id = '$claim_id'";
$result = mysqli_query($conn, $qry);
while ($show = mysqli_fetch_array($result)) {

    $claim_reward_id = $show['claim_reward_id'];
    $claim_quantity = $show['claim_quantity'];
}



$qry = "SELECT * FROM tbl_rewards where id_reward = '$claim_reward_id'";
$result = mysqli_query($conn, $qry);
while ($show = mysqli_fetch_array($result)) {

    $picture = $show['picture'];
    $reward_item = $show['reward_item'];
    $equiv_points = $show['equiv_points'];
}

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

    <title>User Page</title>

</head>


<body>
    <?php include "sessionbody.php"; ?>
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
            <h2 class="green-text">Claim your Rewards</h2>
            <div class="divider"></div>
            <div style="height: 50px;"></div>
            <!-- <div class="container"> -->
            <div class="row">
                <div class="col s3"></div>
                <div class="col s6">
                    <div class="card">
                        <div class="card-image">
                            <img class="responive-img" src="../images/<?php echo $picture; ?>">
                            <!-- <span class="card-title">Card Title</span> -->
                        </div>
                        <div class="divider"></div>
                        <div class="card-content center">
                            <div class="green-text" style="font-size: 20px;font-weight:600">
                                <p>Reward Item: <?php echo $reward_item; ?></p>
                                <p>Used Points: <?php echo $equiv_points * $claim_quantity; ?> </p>
                                <p>Quantity: <?php echo $claim_quantity; ?></p>
                            </div>
                        </div>
                        <form method="POST" action="">
                            <div class="card-action">
                                <label style="font-size: 16px;" for="">Please present this voucher to claim your reward item(s)</label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col s3"></div>
            </div>
        </div>
        </div>
    </main>

    <footer>
        <?php
        include '../components/footer.php';
        ?>
    </footer>