<?php
include "session.php";
// include "../services/database_connection.php";
include "../services/action_posts.php";



// $title         = !empty($_SESSION['old_request']['title'])        ? $_SESSION['old_request']['title']       : "";
// $description   = !empty($_SESSION['old_request']['description'])  ? $_SESSION['old_request']['description'] : "";
// $author        = !empty($_SESSION['old_request']['author'])       ? $_SESSION['old_request']['author']      : "";
// $content       = !empty($_SESSION['old_request']['content'])      ? $_SESSION['old_request']['content']     : "";

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

    <title>IEC Campaign</title>

</head>

<body>
    <?php "sessionbody.php"; ?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>IEC Campaign</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- fixed side-nav -->
    <?php include '../components/admin_sidenav.php' ?>

    <main><br>
        <div class="container">
            <div class="row">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>Upload<i class="material-icons">add</i></span>
                                <input id="file" type="file" name="fileToUpload"  onchange="return validate()">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Header Image" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix green-text text-green lighten-1">title</i>
                            <input id="title" type="text" name="title" class="validate" required>
                            <label for="title">Campaign Title</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix green-text text-green lighten-1">description</i>
                            <input id="title" type="text" name="description" class="validate" required>
                            <label for="title">Desciption</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix green-text text-green lighten-1">person</i>
                            <input id="title" type="text" name="author" class="validate" required>
                            <label for="title">Author</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix green-text text-green lighten-1">article</i>
                            <textarea id="content" name="content" class="materialize-textarea" required></textarea>
                            <label for="content">Content</label>
                        </div>
                    </div>
                    <div class="center">
                        <button name="publish" class="waves-effect waves-light btn-small green lighten-1"><i class="medium material-icons right">publish</i>Publish</button>
                        <!-- <a href="" class="waves-effect waves-light btn-small green lighten-1"><i class="medium material-icons right">publish</i>Publish</a> -->
                    </div>
                </form>
            </div>
        </div>

    </main>

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

    <script>
        function validate() {
            var filename = document.getElementById('file').value;
            var extension = filename.substr(filename.lastIndexOf('.') + 1).toLowerCase();
            //alert(extension);
            if (extension == 'jpg' || extension == 'gif') {
                return true;
            } else {              
                swal("Invalid File Format", "Oops! it seems like your image is not in \".jpg\",\".jpeg\",\".png\" format. Please select other file.", "error");
                return false;
            }
        }
    </script>


    <?php
    if (isset($_SESSION['status'])) {

    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                text: "<?php echo $_SESSION['status_message']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
            });
        </script>
    <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_message']);
        unset($_SESSION['status_code']);
    }
    ?>


    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>

</body>

</html>