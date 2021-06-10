<?php
include '../services/database_connection.php';
$collector_id = $_GET['collector_id'];



$black = 0;
$qry3 = "SELECT SUM(num_bottles) as sum FROM tbl_summary WHERE collector_id = '$collector_id'";
$result3 = mysqli_query($conn, $qry3);
while ($show3 = mysqli_fetch_array($result3)) {

    $output2 = $show3['sum'];
}




$qry1 = "SELECT * FROM tbl_userinfo where id = '$collector_id'";
$result1 = mysqli_query($conn, $qry1);
while ($show = mysqli_fetch_array($result1)) {

    $first_name = $show['first_name'];
    $last_name = $show['last_name'];
    $points = $show['points'];
}





if (isset($_POST['updatebtn'])) {
    $add_points = $_POST['add_points'];


    if ($add_points <= 0 || $add_points > $output2) {
?>
        <script>
            alert("invalid number of bottles");
        </script>
    <?php




    } else {
        // $newpoints = ((int)$points) - ((int)$add_points);
        //  $sql = "UPDATE tbl_userinfo SET points = '$newpoints' where id = '$collector_id' ";
        //         $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $new_points = $add_points * -1;
        $date_added = date("Y-m-d H:i:s");
        $blank = 0;
        $received = "received";

        $sql = "INSERT INTO tbl_summary (collector_id, user_id, num_bottles, points_added, status, date_added) VALUES ('$collector_id', '$blank', '$new_points', '$blank', '$received', '$date_added' )";

        $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $user_id = 0;
        $received = "received";
        $sql = "INSERT INTO tbl_logs (user_id, collector_id,  log_date, remarks) VALUES ('$user_id', '$collector_id' , '$date_added' , '$received' )";
        $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    ?>
        <script>
            alert("Bottle successfully received");
            window.location.href = 'admin_search_collector.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection">
    <!-- Import fontawesome -->
    <script src="https://kit.fontawesome.com/621283ac00.js" crossorigin="anonymous"></script>

    <style type="text/css">
        header,
        main,
        footer {
            padding-left: 300px;
        }

        @media only screen and (max-width : 992px) {

            header,
            main,
            footer {
                padding-left: 0;
            }
        }
    </style>

    <title>Logs</title>

</head>

<body>

    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>Receive Bottles</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php include '../components/admin_sidenav.php' ?>

    <main>
        <div class="container">
            <h3 class="green-text">Confirm Collection</h3>
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
                                    <p class="flow-text"> Name: <?php echo $last_name . ", " . $first_name; ?></p>
                                </span>
                                <span class="green-text">

                                    <?php
                                    $qry2 = "SELECT SUM(num_bottles) as sum FROM tbl_summary where collector_id = '$collector_id'";
                                    $result2 = mysqli_query($conn, $qry2);
                                    while ($show2 = mysqli_fetch_array($result2)) {

                                        $output = $show2['sum'];
                                    }
                                    ?>

                                    <p class="flow-text">Pending: <?php echo $output; ?></p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>

            <form method="POST" action="">

                <h5 class="green-text center">Quantity of Plastic Bottle(s):</h5>
        </div>

        <div class="container">
            <div class="row">
                <div class="col s3"></div>
                <div class="input-field col s6">
                    <i class="material-icons prefix green-text text-green lighten-1">tag</i>
                    <input class="blue-text" id="add_points" type="number" name="add_points" style="text-align: center; font-size: 30px;" class="validate" value="<?php echo $add_points; ?>" required>
                    <label for="add_points">Enter Number of Plastic Bottles</label><br><br>
                    <div class="center">
                        <button class="btn waves-effect waves-light center" type="submit" name="updatebtn">confirm
                            <i class="material-icons right">done</i>
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
        <a href="admin_search_collector.php" class="btn-floating btn-large green">
            <i class="large material-icons">search</i>
        </a>
    </div>

    <footer class="page-footer green lighten-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">CENRO MALOLOS</h5>
                    <p class="grey-text text-lighten-4"></p>City Environment and Natural resources Office
                </div>
                <!-- <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © <?php echo date("Y"); ?> Copyright
                <a class="grey-text text-lighten-4 right" href="#!">Developed by: Gatchalian Mark & Mandawe Carlo</a>
            </div>
        </div>
    </footer>



    <!-- Materialize Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems, {
                accordion: true
            });
        });
    </script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>

</body>

</html>