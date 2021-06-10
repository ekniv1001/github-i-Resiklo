<?php
include "collector_session.php";
include '../services/database_connection.php';



$user = "user";

if (!isset($_GET['search'])) {

    $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$user'";
    $result1 = mysqli_query($conn, $qry1);
} else {
    $search = $_GET['search'];

    if ($search == "") {

        $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$user'";
        $result1 = mysqli_query($conn, $qry1);
    } else {

        $qry1 = "SELECT * FROM tbl_userinfo WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%' and user_type = '$user' ";
        $result1 = mysqli_query($conn, $qry1);
    }
}




if (isset($_POST['search'])) {
    $search = $_POST['search'];
?>
    <script>
        window.location.href = 'collector_search.php?search=<?php echo $search; ?>';
    </script>

<?php


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
        <div class="container center">
            <h3 class="green-text text-green-lighten-1">Search User</h3>
        </div>
        <div class="container">
            <div class="row">
                <form class="col s12" method="POST" action="">
                    <div class="row">
                        <div class="col s2"></div>
                        <div class="input-field col s7">
                            <i class="material-icons prefix green-text text-green lighten-1">search</i>
                            <input id="icon_prefix" type="text" name="search" class="validate">
                            <label for="icon_prefix">Search User</label>
                        </div><br>
                        <div class="col s3">
                            <button class="btn waves-effect waves-light" type="submit" name="action">find
                                <i class="material-icons left">search</i>
                            </button>
                        </div>
                    </div>
            </div>
            <div>
                <table class="centered highlight striped">
                    <thead>
                        <tr>
                            <th>Profile Picture</th>
                            <th>Information</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        if (mysqli_num_rows($result1) == 0) { ?>
                            <tr>
                                <td><?php echo "No user found"; ?></td>
                                <td><?php echo "No user found"; ?></td>
                                <td><?php echo "No user found"; ?></td>
                            </tr>
                        <?php
                        }
                        while ($show = mysqli_fetch_array($result1)) {
                        ?>


                            <tr>
                                <td hidden><?php echo $show['id']; ?></td>
                                <td><img src="../images/<?php echo $show['photo']; ?>" width="100px" width="150px"></td>
                                <td>
                                    <div class="row">
                                        <label>
                                            <p><strong>First Name: </strong></p><?php echo $show['first_name'] . "<br>"; ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label>
                                            <p><strong>Last Name: </strong><?php echo $show['last_name'] . "<br>"; ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label>
                                            <p><strong>Earned Points: </strong><?php echo $show['points'] . "<br>"; ?>
                                        </label>
                                    </div>
                                </td>
                                <td><a href="collector_update.php?user_id=<?php echo $show['id']; ?> " class="waves-effect waves-light btn"><i class="material-icons right">send</i>update</a></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
            </form>
        </div>
        </div>
    </main>
    <br>
    <div class="container center">
        <a href="collector_search.php" class="btn waves-effect waves-light" type="submit" name="action">refresh
            <i class="material-icons left">refresh</i>
        </a>
    </div>


    <div style="height: 300px;"></div>
    <footer>
        <?php
        include '../components/footer.php'
        ?>
    </footer>