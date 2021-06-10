<?php
include "collector_session.php";
include '../services/database_connection.php';

$user_id = $_GET['user_id'];


$qry1 = "SELECT * FROM tbl_userinfo where id = '$user_id'";
$result1 = mysqli_query($conn, $qry1);

while ($show = mysqli_fetch_array($result1)) {
    $first_name = $show['first_name'];
    $last_name = $show['last_name'];
    $balance = $show['points'];
}


$add_points = 0;



$qry1 = "SELECT * FROM tbl_matrix";
$result1 = mysqli_query($conn, $qry1);
while ($show = mysqli_fetch_array($result1)) {
    $points = $show['points'];
}




if (isset($_POST['updatebtn'])) {
    $add_points = $_POST['add_points'];
    $total_points = ((int)$add_points) * ((int)$points);
$collector_id = $_POST['collector_id'];



    if ($add_points <= 0) { ?>
        <script>
            alert("invalid number");
        </script>

    <?php
    } else {


    ?>
        <script>
            const answer = confirm("Are you sure you want to add <?php echo $add_points ?>  plastic bottle for the total of <?php echo $total_points; ?> points?");
            if (answer == true) {

                window.location.href = '../services/action_collector_update.php?num_bottles=<?php echo $add_points; ?>&user_id=<?php echo  $user_id; ?>&total_points=<?php echo $total_points; ?>&collector_id=<?php echo $collector_id; ?>';

            }
        </script>

<?php


    }
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
            <h3 class="green-text">Points Update</h3>
            <div class="divider"></div>
            <!-- <div class="container"> -->
            <div class="container">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <div class="card-panel grey lighten-5 z-depth-1">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <img src="../images/defaultimg.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                            </div>
                            <div class="col s5 center">
                                <span class="green-text">
                                    <p class="flow-text"><?php echo $first_name . ", " . $last_name; ?> </p>
                                </span>
                                <span class="green-text">
                                    <p class="flow-text">Earned Points: <?php echo $balance; ?></p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>

            <form method="POST" action="">

                <h5 class="green-text center"> Quantity of Plastic Bottle(s):</h5>
                <input type="text" value="<?php echo isset($id) ? $id : ''  ?>" name="collector_id" hidden>
        </div>

        <div class="container">
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <i class="material-icons prefix green-text text-green lighten-1">tag</i>
                   
                    <input class="blue-text" id="add_points" type="number" name="add_points" style="text-align: center; font-size: 30px;" class="validate" required="" value="<?php echo $add_points; ?>">
                    <label for="add_points">Enter Number of Plastic Bottles</label><br><br>
                    <div class="center">
                        <button class="btn waves-effect waves-light center" type="submit" name="updatebtn">update
                            <i class="material-icons right">save</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        </form>


        </div>
        </div>
    </main>
    <div class="fixed-action-btn">
        <a href="collector_search.php" class="btn-floating btn-large green">
            <i class="large material-icons">search</i>
        </a>
    </div>
    <br><br><br><br>
    <footer>
        <?php
        include '../components/footer.php';
        ?>
    </footer>