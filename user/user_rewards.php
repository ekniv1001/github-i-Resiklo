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
    <?php
$active = "active";
    $qry = "SELECT * FROM tbl_rewards where status ='$active' ";
    $result = mysqli_query($conn, $qry);


    if (isset($_POST['claimbtn'])) {
        $reward_id = $_POST['reward_id'];
        $reward_quantity = $_POST['quantity'];
        $user_id = $_POST['user_id'];
        $avail_points = $_POST['reward_points'];
        $equiv_points = $_POST['equiv_points'];
        $total_points_needed = ((int)$reward_quantity) * ((int)$equiv_points);

        if ($reward_quantity <= 0) { ?>
            <script>
                alert("Please enter a valid quantity");
            </script>

            <?php

        } else {

            if ($avail_points < $total_points_needed) {
            ?>

                <script>
                    alert("Sorry Your balance points is not enough");
                </script>

            <?php
            } else {

                $remaining_point = ((int)$avail_points) - ((int)$total_points_needed);


            ?>

                <script>
                    const answer = confirm("Are you sure you want to claim this item?");
                    if (answer == true) {
                        window.location.href = '../services/action_claim.php?reward_quantity=<?php echo $reward_quantity; ?>&reward_id=<?php echo $reward_id; ?>&remaining_point=<?php echo $remaining_point; ?>&user_id=<?php echo $user_id; ?>';
                    }
                </script>


    <?php
            }
        }
    }

    ?>

<main><br>

    <div class="container">
        <div class="card-panel green lighten-1">
            <h2 class="white-text center">Available Rewards List</h2>
        </div>
        <h4 class="orange-text">My Point(s): <?php echo $row['points']; ?> </h4>
        <div class="divider"></div>
    </div>
    <div class="container">
        <!-- <div class="container"> -->
        <div class="row">
            <?php

            while ($show = mysqli_fetch_array($result)) {



            ?>

                <form method="POST" action="">
                    <div class="col s12 m6 l4">
                        <div class="medium card">
                            <div class="card-image">
                                <img src="../images/<?php echo $show['picture']; ?>" height=150px>
                            </div>
                            <div class="card-content">

                                <h5 class="green-text text-green-lighten-1"><strong><?php echo $show['reward_item']; ?></strong></h5>
                                <p class="orange-text"><strong>Points: <?php echo $show['equiv_points']; ?> </strong></p>
                            </div>
                            <div class="card-action center">
                                <input type="text" name="user_id" value="<?php echo isset($id) ? $id : '' ?>" hidden>
                                <input type="text" name="reward_points" value="<?php echo $row['points']; ?>" hidden>
                                <input type="text" name="equiv_points" value="<?php echo $show['equiv_points']; ?>" hidden>
                                <input type="text" name="reward_id" value="<?php echo $show['id_reward']; ?> " hidden>
                                <input class="green-text" type="number" name="quantity" value="<?php echo 0 ?>" style="text-align: center; font-size: 30px;">

                                <!-- <button type="submit" name="claimbtn"><a class="waves-effect waves-light btn ">Claim Now</a></button> -->


                                <button class="btn waves-effect waves-light" type="submit" name="claimbtn">claim now
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            <?php } ?>



            <!-- Modal Structure -->
            <!-- 
                <form action="" method="POST">
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h3 class="green-text">Available Point(s): <?php echo $row['points']; ?> </h3>
                            <div class="divider"></div>
                            <div class="container">
                                <h4 class="green-text text-green-lighten-1">Quantity:</h4><br>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="user_id" value="<?php echo isset($id) ? $id : '' ?>" hidden>
                                            <input type="text" name="reward_points" value="<?php echo $row['points']; ?>" hidden>
                                            <input type="text" name="equiv_points" value="<?php echo $equiv_points ?>" >
                                            <input type="text" name="reward_id" value="<?php echo $reward_id; ?>" >

                                            <input type="number" name="quantity" value="0" required>
                                        </div>
                                        <div class="col">

                                        </div>
                                        <div class="col">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="modal-footer">
                                <button class="btn waves-effect waves-light" type="submit" name="claimbtn">Claim
                                    <i class="material-icons right">done</i>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form> -->
</main>

<footer>
    <?php
    include '../components/footer.php';
    ?>
</footer>