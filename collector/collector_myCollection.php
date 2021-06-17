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





if (isset($_POST['filterbtn'])) {

    $search = $_POST['barangay'];

?>

    <script>
        window.location.href = 'collector_myCollection.php?search=<?php echo $search; ?>';
    </script>
<?php

}





if (!isset($_GET['search'])) {

    $user = "user";
    $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$user' ";
    $result1 = mysqli_query($conn, $qry1);
} else {
    $search = $_GET['search'];

    $user = "user";
    $qry1 = "SELECT * FROM tbl_userinfo where barangay LIKE '$search' and user_type = '$user' ";
    $result1 = mysqli_query($conn, $qry1);
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

    $collector_id =  isset($id) ? $id : '';;

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
            <h3 class="green-text"><strong>My Collection</strong></h3>
            <div class="divider"></div><br>
            <div class="row">
                <div class="col s12 m6 center">
                    <div class="card-panel cyan">
                        <strong class="white-text" style="font-size: 24px;">COLLECTED</strong><br>
                        <strong class="orange-text" style="font-size: 30px;"><?php echo $output3; ?></strong>
                    </div>
                </div>
                <div class="col s12 m6 center">
                    <div class="card-panel orange">
                        <strong class="white-text" style="font-size: 24px;">PENDING</strong><br>
                        <strong class="red-text" style="font-size: 30px;"><?php echo $output4; ?></strong>
                    </div>
                </div>
            </div>
            <!-- <div class="divider"></div> <br> -->
        </div>

        <!-- <div style="height: 20px;"></div> -->
        <div class="container">
            <div class="col s12">
                <div class="card-panel blue lighten-4">
                    <div class="row">
                        <div class="col s6"><br>
                            <strong>LIST OF USERS</strong>
                        </div>
                        <div class="col s6">
                            <form action="" method="POST">
                                <select name="barangay" required="">
                                    <option value="" disabled selected> <label for="">Select Barangay</label></option>
                                    <option value="Anilao">Anilao</option>
                                    <option value="Atlag">Atlag</option>
                                    <option value="Babatnin">Babatnin</option>
                                    <option value="Bagna">Bagna</option>
                                    <option value="Bagong Bayan">Bagong Bayan</option>
                                    <option value="Balayong">Balayong</option>
                                    <option value="Balite">Balite</option>
                                    <option value="Bangkal">Bangkal</option>
                                    <option value="Barihan">Barihan</option>
                                    <option value="Bulihan">Bulihan</option>
                                    <option value="Bungahan">Bungahan</option>
                                    <option value="Caingin">Caingin</option>
                                    <option value="Calero">Calero</option>
                                    <option value="Caliligawan">Caliligawan</option>
                                    <option value="Canalate">Canalate</option>
                                    <option value="Caniogan">Caniogan</option>
                                    <option value="Catmon">Catmon</option>
                                    <option value="Cofradia">Cofradia</option>
                                    <option value="Dakila">Dakila</option>
                                    <option value="Guinhawa">Guinhawa</option>
                                    <option value="Ligas">Ligas</option>
                                    <option value="Liang">Liang</option>
                                    <option value="Longos">Longos</option>
                                    <option value="Look 1st">Look 1st</option>
                                    <option value="Look 2nd">Look 2nd</option>
                                    <option value="Lugam">Lugam</option>
                                    <option value="Mabolo">Mabolo</option>
                                    <option value="Mambog">Mambog</option>
                                    <option value="Masile">Masile</option>
                                    <option value="Matimbo">Matimbo</option>
                                    <option value="Mojon">Mojon</option>
                                    <option value="Namayan">Namayan</option>
                                    <option value="Niugan">Niugan</option>
                                    <option value="Pamarawan">Pamarawan</option>
                                    <option value="Panasahan">Panasahan</option>
                                    <option value="Pinagbakahan">Pinagbakahan</option>
                                    <option value="San Agustin">San Agustin</option>
                                    <option value="San Gabriel">San Gabriel</option>
                                    <option value="San Juan">San Juan</option>
                                    <option value="San Pablo">San Pablo</option>
                                    <option value="San Vicente (Poblacion)">San Vicente (Poblacion)</option>
                                    <option value="Santiago">Santiago</option>
                                    <option value="Santisima Trinidad">Santisima Trinidad</option>
                                    <option value="Santo Cristo">Santo Cristo</option>
                                    <option value="Santo Niño (Poblacion)">Santo Niño (Poblacion)</option>
                                    <option value="Santo Rosario (Poblacion)">Santo Rosario (Poblacion)</option>
                                    <option value="Santor">Santor</option>
                                    <option value="Sumapang Bata">Sumapang Bata</option>
                                    <option value="Sumapang Matanda">Sumapang Matanda</option>
                                    <option value="Taal">Taal</option>
                                    <option value="Tikay">Tikay</option>
                                </select>
                                <label>Select Barangay</label>
                                <button class="btn waves-effect waves-light" type="submit" name="filterbtn">Search
                                    <i class="material-icons right">search</i>
                                </button>
                                <a href="collector_myCollection.php" class="waves-effect waves-light btn"><i class="material-icons">autorenew</i></a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <table class="centered">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Barangay</th>
                        <th>Address</th>
                    </tr>
                </thead>

                <tbody>

                    <?php


                    while ($show = mysqli_fetch_array($result1)) {

                    ?>







                        <tr>
                            <td><img src="../images/<?php echo $show['photo']; ?>" width="100px;"></td>
                            <td><?php echo $show['last_name'] . ", " . $show['first_name']; ?></td>
                            <td><?php echo $show['barangay']; ?></td>
                            <td><?php echo $show['address']; ?></td>
                        </tr>


                    <?php } ?>


                </tbody>
            </table>

        </div>

        <div style="height: 60px;"></div>
        <div class="container">
            <div class="col s12">
                <div class="card-panel cyan darken-1">
                    <strong class="white-text">COLLECTION HISTORY</strong>
                </div>
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $blank = 0;
                        $qry1 = "SELECT * FROM tbl_summary where collector_id = '$collector_id' and user_id != '$blank' ";
                        $result1 = mysqli_query($conn, $qry1);
                        while ($show = mysqli_fetch_array($result1)) {
                            $user_id = $show['user_id'];




                            $qry3 = "SELECT * FROM tbl_userinfo where id = '$user_id' ";
                            $result3 = mysqli_query($conn, $qry3);
                            while ($show3 = mysqli_fetch_array($result3)) {


                        ?>




                                <tr>
                                    <td><?php echo $show3['last_name'] . ", " . $show3['first_name']; ?></td>
                                    <td><?php echo $show3['address']; ?> </td>


                                <?php } ?>


                                <td><?php echo $show['num_bottles']; ?></td>
                                <td><?php echo $show['date_added']; ?></td>
                                </tr>


                            <?php } ?>



                    </tbody>






                </table>

            </div>
        </div>

        <div style="height: 60px;"></div>
        <div class="container">
            <div class="col s12">
                <div class="card-panel teal lighten-2">
                    <strong class="white-text">SENT POINTS HISTORY</strong>
                </div>
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Points</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>



                        <?php
                        $blank = 0;
                        $qry1 = "SELECT * FROM tbl_summary where collector_id = '$collector_id' and user_id != '$blank' ";
                        $result1 = mysqli_query($conn, $qry1);
                        while ($show = mysqli_fetch_array($result1)) {
                            $user_id = $show['user_id'];




                            $qry3 = "SELECT * FROM tbl_userinfo where id = '$user_id' ";
                            $result3 = mysqli_query($conn, $qry3);
                            while ($show3 = mysqli_fetch_array($result3)) {


                        ?>




                                <tr>
                                    <td><?php echo $show3['last_name'] . ", " . $show3['first_name']; ?></td>
                                    <td><?php echo $show3['address']; ?> </td>


                                <?php } ?>


                                <td><?php echo $show['points_added']; ?></td>
                                <td><?php echo $show['date_added']; ?></td>
                                </tr>


                            <?php } ?>


















                    </tbody>
                </table>

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