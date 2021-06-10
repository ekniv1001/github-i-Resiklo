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
            <?php foreach ($query as $post) { ?>
                <div class="row">
                    <form method="POST" class="col s12">
                        <div class="row">
                            <input type="text" hidden value='<?php echo $post['id'] ?>' name="id">
                            <div class="input-field col s12">
                                <i class="material-icons prefix green-text text-green lighten-1">title</i>
                                <input id="title" type="text" name="title" value="<?php echo $post['title'] ?>" class="validate">
                                <label for="title">Campaign Title</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix green-text text-green lighten-1">article</i>
                                <textarea id="content" name="content" class="materialize-textarea"><?php echo $post['content'] ?></textarea>
                                <label for="content">Content</label>
                            </div>
                        </div>
                        <div class="center">
                            <button name="update" class="waves-effect waves-light btn green lighten-1"><i class="medium material-icons right">save</i>Save</button>
                            <!-- <a href="" class="waves-effect waves-light btn-small green lighten-1"><i class="medium material-icons right">publish</i>Publish</a> -->
                        </div>
                    </form>
                <?php } ?>
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
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>

</body>

</html>