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

    <title>User Page</title>

</head>


<body>
    <?php include "sessionbody.php";?>
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
            <li style="font-weight: 600;"><a href="../services/logout.php">Logout</a></li>
            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
        </ul>
    </header>

<main>
    <div class="container">
        <h2 class="green-text">Available Points:</h2>
        <div class="container">
            <div class="container"><br><br>
                <div class="card-paner orange lighten-2">
                    <h2 class="center white-text"><?php echo $row['points']; ?></h2>
                </div>
            </div>
        </div>
    </div>
</main>
<div style="height: 200px;"></div>
<footer>
    <?php
    include '../components/footer.php';
    ?>
</footer>