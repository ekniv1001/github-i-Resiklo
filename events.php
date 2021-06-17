<?php
// include "../services/database_connection.php";
include "services/action_event.php";
//include "session.php";
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

    <title>Events</title>

</head>

<body>

    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;">i-Resiklo</a>
                        <a href="#" data-target="mobile-ver" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li style="font-weight: 600;"><a href="index.php"><i class="material-icons left">home</i>Home</a></li>
                            <!-- <li style="font-weight: 600;"><a href="#about">About</a></li> -->
                            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
                            <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-ver">
            <li style="font-weight: 600;"><a href="index.php">Home</a></li>
            <!-- <li style="font-weight: 600;"><a href="#about">About</a></li> -->
            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
        </ul>

        <!-- fixed side-nav -->



        <main>
            <br>

            <div class="container">
                <div class="green-text center">
                    <h2><strong><em>"See our latest Upcoming Events on how to care our environment"</em></strong></h2>
                </div>
                <br><br>
                <div class="row">
                    <div class="divider"></div>
                    <?php foreach ($query as $event) { ?>
                        <div class="col s12">
                            <div class="divider"></div>

                            <div class="green lighten-5">
                                <h2 style="padding: 0 10px;" class="header"><?php echo $event['event_title']; ?></h2>
                                <div class="divider"></div>
                                <div style="padding: 10px;">
                                    <h5 class="header">Event Date: <?php echo $event['event_date']; ?></h5>
                                    <h6 class="header">Event Time: <?php echo $event['event_time']; ?></h6>
                                    <h6 class="header">Venue: <?php echo $event['event_setting']; ?></h6>
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
                                                <a href="event_view.php?event_id=<?php echo $event['event_id']; ?>" class="white-text">Read More<i class="material-icons">navigate_next</i></a>
                                            </div>
                                        </div>
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