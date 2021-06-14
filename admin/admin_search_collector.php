<?php
include '../services/database_connection.php';
include 'session.php';

$collector = "collector";

if (!isset($_GET['search'])) {

    $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$collector'";
    $result = mysqli_query($conn, $qry1);
} else {
    $search = $_GET['search'];

    if ($search == "") {

        $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$collector'";
        $result = mysqli_query($conn, $qry1);
    } else {

        $qry1 = "SELECT * FROM tbl_userinfo WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%' and user_type = '$collector' ";
        $result = mysqli_query($conn, $qry1);
    }
}




if (isset($_POST['search'])) {
    $search = $_POST['search'];
?>
    <script>
        window.location.href = 'admin_search_collector.php?search=<?php echo $search; ?>';
    </script>

<?php


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

    <title>Search Collector</title>

</head>

<body>
    <!-- <?php "sessionbody.php"; ?> -->
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>Search</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php include '../components/admin_sidenav.php' ?>

    <main>
        <div class="container center">
            <h3 class="green-text text-green-lighten-1">Search Collector</h3>
        </div>
        <!-- <div class="container"> -->
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
                        <th>Pending</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (mysqli_num_rows($result) == 0) { ?>


                        <tr>
                            <td><?php echo "No user found"; ?></td>
                            <td><?php echo "No user found"; ?></td>
                            <td><?php echo "No user found"; ?></td>
                            <td><?php echo "No user found"; ?></td>
                        </tr>
                    <?php
                    }

                    while ($show = mysqli_fetch_array($result)) {
                        $collector_id = $show['id'];
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



                                        <?php

                                        $qry7 = "SELECT SUM(num_bottles) as sum FROM tbl_summary where collector_id = '$collector_id' and user_id = 0 ";
                                        $result7 = mysqli_query($conn, $qry7);
                                        while ($show7 = mysqli_fetch_array($result7)) {


                                        ?>

                                            <p><strong>Total Collection: </strong><?php echo $show7['sum'] * -1; ?>

                                            <?php } ?>
                                    </label>
                                </div>
                            </td>




                            <?php
                            $qry2 = "SELECT SUM(num_bottles) as sum FROM tbl_summary where collector_id = '$collector_id'";
                            $result2 = mysqli_query($conn, $qry2);
                            while ($show2 = mysqli_fetch_array($result2)) {

                                $output = $show2['sum'];
                            }
                            ?>


                            <td>
                                <?php echo $output; ?>
                            </td>


                            <td>
                            <a href="admin_receive.php?collector_id=<?php echo $show['id']; ?>" class="waves-effect waves-light btn">receive</a>
                            </td>





                        </tr>

                    <?php } ?>



                </tbody>
            </table>
        </div>
        </form>
        </div>
        </div>
        <br><br>
        <div class="container center">
            <a href="admin_search_collector.php" class="btn waves-effect waves-light" type="submit" name="action">refresh
                <i class="material-icons left">refresh</i>
            </a>
        </div>
    </main>

    <div style="height: 300px;"></div>
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