<?php
// include "../services/database_connection.php";
include "../services/action_event.php";
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

    <title>Achievements</title>

</head>

<body>
    <?php "sessionbody.php"; ?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="admin_events.php" class="brand-logo" style="font-weight: 600;"> <em>Events</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- fixed side-nav -->
    <?php include '../components/admin_sidenav.php' ?>


    <main>
        <br>
        <div class="container">
            <a href="admin_event_create.php" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Post Upcoming Event</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="divider"></div>
                <?php foreach ($query as $event) { ?>
                    <div class="col s12">
                        <div class="divider"></div>
                        <h2 class="header"><?php echo $event['event_title']; ?></h2>               
                        <h5 class="header">Event Date: <?php echo $event['event_date']; ?></h5>
                        <div class="card horizontal small">
                            <div class="card-image">
                                <img src="../uploads/<?php echo $event['event_img']; ?>">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content">
                                    <p class="flow-text"><?php echo $event['event_content']; ?></p>
                                </div>
                                <p><em>Published:</em> <strong> <?php echo $event['date_created']; ?></strong></p>
                                <div class="card-action teal">
                                    <a href="admin_events.php" class="white-text">Read More<i class="material-icons">navigate_next</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>



    <footer class="page-footer green lighten-1">
        <div class="container">
            <div class="row">
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