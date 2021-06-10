<?php
include "collector_session.php";
include "collector_sessionbody.php";

  
include '../services/database_connection.php';

$blank = 0;
$collector_id = isset($id) ? $id : '';
 $qry4 = "SELECT SUM(num_bottles) as sum FROM tbl_summary where collector_id = '$collector_id' and user_id = '$blank' ";
$result4 = mysqli_query($conn, $qry4);

while ($show4 = mysqli_fetch_array($result4)) {

  $output3 = $show4['sum'] * -1;
}



$qry4 = "SELECT SUM(num_bottles) as sum FROM tbl_summary where collector_id = '$collector_id' and user_id != '$blank' ";
$result4 = mysqli_query($conn, $qry4);

while ($show4 = mysqli_fetch_array($result4)) {

  $output4 = $show4['sum'] - $output3;
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

    <title>Collector Page</title>

</head>

<body>
    <?php
    include "collector_sessionbody.php";

    ?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="collector_home_view.php" class="brand-logo" style="font-weight: 600;">i-Resiklo</a>
                        <a href="#" data-target="mobile-ver" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li style="font-weight: 600;"><a href="collector_home_view.php">Home</a></li>
                            <li style="font-weight: 600;"><a href="collector_profile.php">Profile</a></li>
                            <li style="font-weight: 600;"><a href="collector_myCollection.php">My Collection</a></li>
                            <li style="font-weight: 600;"><a href="collector_logout.php">Logout</a></li>
                            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
                            <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-ver">
            <li style="font-weight: 600;"><a href="collector_home_view.php">Home</a></li>
            <li style="font-weight: 600;"><a href="collector_profile.php">Profile</a></li>
            <li style="font-weight: 600;"><a href="collector_myCollection.php">My Collection</a></li>
            <li style="font-weight: 600;"><a href="collector_logout.php">Logout</a></li>
            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
        </ul>
    </header>

    <main>
        <div class="container">
            <h1 class="green-text text-green-lighten-1">My Collection</h1>
            <div class="container">
                <h3 class="green-text text-green-lighten-1">Total Collection</h3>
                <div class="container">
                    <div class="card-panel green lighten-1">
                        <h2 class="center blue-text text-blue"><?php echo $output3; ?></h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <h3 class="orange-text ">Pending</h3>
                <div class="container">
                    <div class="card-panel green lighten-1">
                        <h2 class="center red-text text-red"><?php echo $output4; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a href="collector_search.php" class="btn-floating btn-large green">
                <i class="large material-icons">search</i>
            </a>
        </div>
    </main>


    <footer>
        <?php
        include '../components/footer.php';
        ?>
    </footer>