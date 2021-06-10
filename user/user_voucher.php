<?php include "session.php";



















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

  


    $user_id = $row['id'];
    $claim_status = "unclaimed";
    $qry = "SELECT * FROM tbl_claim where claim_user_id = '$user_id' and claim_status =  '$claim_status' ";
    $result = mysqli_query($conn, $qry);


    ?>

    <main>
        <div class="container">
            <h2 class="green-text">Available Voucher</h2>
        </div>
        <div class="container">
            <table class="centered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    while ($show = mysqli_fetch_array($result)) {
                        $reward_id = $show['claim_reward_id'];
                        $reward_quantity = $show['claim_quantity'];

                        $qry1 = "SELECT * FROM tbl_rewards where id_reward = '$reward_id'";
                        $result1 = mysqli_query($conn, $qry1);
                        while ($show1 = mysqli_fetch_array($result1)) {

                    ?>

                            <tr>

                                <td><img src="../images/<?php echo $show1['picture']; ?> " width=100px;></td>
                                <td><?php echo $show1['reward_item']; ?> </td>
                                <td><?php echo $reward_quantity; ?></td>

                                
                                    <td>

                                    <a href="user_claim.php?claim_id=<?php echo $show['claim_id']; ?>" class="waves-effect waves-light btn"><i class="material-icons right">send</i>show</a>
                                    </td>


                    
                            </tr>
                </tbody>

        <?php }
                    } ?>

            </table>
        </div>

    </main>
    <div style="height: 250px;"></div>
    <footer>
        <?php
        include '../components/footer.php';
        ?>
    </footer>