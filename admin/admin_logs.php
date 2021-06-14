<?php
// include "../services/database_connection.php";
include "../services/action_posts.php";
include "session.php";
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
    <?php "sessionbody.php"; ?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>Logs</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php include '../components/admin_sidenav.php' ?>
    <div style="height: 50px;"></div>
    <main>
        <div class="container">
            <div class="card-panel teal lighten-2">
                <strong class="white-text">History</strong>
            </div>
            <table class="centered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Remarks</th>
                        <th>Quantity</th>
                        <th>Date</th>

                    </tr>
                </thead>

                <tbody>
                    <?php

                    $qry1 = "SELECT * FROM tbl_logs";
                    $result1 = mysqli_query($conn, $qry1);
                    while ($show = mysqli_fetch_array($result1)) {

                        if ($show['remarks'] == "received") {
                            $collector_id = $show['collector_id'];
                            $user_id = $show['user_id'];

                            $qry2 = "SELECT * FROM tbl_userinfo where id = '$collector_id'";
                            $result2 = mysqli_query($conn, $qry2);
                            while ($show2 = mysqli_fetch_array($result2)) { ?>
                                <tr>
                                    <td><?php echo $show2['first_name'] . ", " . $show2['last_name']; ?></td>
                                    <td><?php echo $show2['user_type']; ?></td>
                                    <td><?php echo $show['remarks']; ?></td>
                                    <td>quantity</td>
                                    <td><?php echo $show['log_date']; ?></td>

                                </tr>
                            <?php
                            }
                        } else {



                            $qry3 = "SELECT * FROM tbl_userinfo where id = '$user_id'";
                            $result3 = mysqli_query($conn, $qry3);
                            while ($show3 = mysqli_fetch_array($result3)) { ?>
                                <tr>
                                    <td><?php echo $show3['first_name'] . ", " . $show3['last_name']; ?></td>
                                    <td><?php echo $show3['user_type']; ?></td>
                                    <td><?php echo $show['remarks']; ?></td>
                                    <td><?php echo $show['log_date']; ?></td>

                                </tr>


                    <?php }
                        }
                    } ?>


                </tbody>
            </table>
        </div>
    </main>
    <div style="height: 200px;"></div>

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