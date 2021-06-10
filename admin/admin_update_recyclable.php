<?php
include "../services/database_connection.php";
include "../services/action_posts.php";
$matrix_id = $_GET['matrix_id'];

$qry = "SELECT * FROM tbl_matrix where id = '$matrix_id'";
$result = mysqli_query($conn, $qry);


while ($show = mysqli_fetch_array($result)) {
    $points = $show['points'];
}



if (isset($_POST['savebtn'])) {
    $points_equivalent = $_POST['points_equivalent'];

    if ($points_equivalent == $points) { ?>
        <script>
            alert("no changes hasbeen made");
        </script>

    <?php

    } elseif ($points_equivalent <= 0) {

    ?>
        <script>
            alert("invalid number");
        </script>

        <?php



    } else {

        $sql = "UPDATE tbl_matrix SET points = '$points_equivalent'  where id = '$matrix_id'";
        $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));



        if ($qry) {
        ?>
            <script>
                alert("updated successfully");
                window.location.href = 'admin_recyclables.php';
            </script>

<?php



        }
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

    <title>Recyclables</title>

</head>

<body>
<?php "sessionbody.php"; ?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>Recyclables</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- fixed side-nav -->
    <?php include '../components/admin_sidenav.php' ?>

    <main><br><br><br>
        <div class="container">
            <h4 class="green-text">Update Equivalent Points</h4>
            <div class="divider"></div>
            <div class="container">
                <div class="row">
                    <h5 class="green-text">Plastic Bottle</h5>


                    <div class="row">
                        <form class="col s12" method="POST" class="">
                            <div class="row">
                                <div class="col s6">
                                    <h5 class="green-text">Equivalent Points:</h5>
                                </div>
                                <div class="input-field col s6">
                                    <input name="points_equivalent" id="points_equivalent" type="number" class="validate" value="<?php echo $points; ?>">
                                    <label for="points_equivalent">Enter Number</label>
                                </div>
                            </div>
                            <div class="center">
                                <button class="btn waves-effect waves-light" type="submit" name="savebtn">Save
                                    <i class="material-icons right">save</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
    </main>

    <br><br><br><br><br><br>

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