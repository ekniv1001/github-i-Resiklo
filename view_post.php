<?php
include "services/database_connection.php";
include "services/action_posts.php";
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
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <!-- Import fontawesome -->
    <script src="https://kit.fontawesome.com/621283ac00.js" crossorigin="anonymous"></script>

    <title>i-Resiklo-Landing-Page</title>

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
                            <!-- <li style="font-weight: 600;"><a href="#about">About</a></li>
                            <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
                            <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-ver">
            <li style="font-weight: 600;"><a href="index.php">Home</a></li>
            <!-- <li style="font-weight: 600;"><a href="#about">About</a></li>
            <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
        </ul>
    </header>

    <!-- fixed side-nav -->
    <main>
        <div class="container">
            <div class="green-text left">
                <h3><strong><em>Welcome to our Information Education and Cammunication Campaign</em></strong></h3>
            </div>
        </div>

        <div class="container">
            <?php foreach ($query as $post) { ?>

                <div class="row">

                    <div class="col s12">
                        <div class="card">
                            <div class="card-image">
                                <img src="uploads/<?php echo $post['headerImg']; ?>">
                                <!-- <span class="card-title">Card Title</span> -->
                            </div>
                            <div class="card-content">
                                <h1><em><?php echo $post['title']; ?></em></h1>
                                <!-- <p><em>Description:</em> <strong> <?php echo $post['description']; ?></strong></p> -->
                                <p class="flow-text"><?php echo $post['content']; ?></p>
                                <div class="divider"></div>
                                <div class="section">
                                    <p><em>Author:</em> <strong> <?php echo $post['author']; ?></strong></p>
                                    <p><em>Published:</em> <strong> <?php echo $post['date_created']; ?></strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="divider"></div><br>
            <div class="row">
                <div class="col">
                    <a href="admin_editPost.php?id=<?php echo $post['id'] ?>" class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Edit Post</a>
                </div>
                <form method="POST">
                    <input type="text" hidden name="id" value="<?php echo $post['id']; ?>">
                    <button name="delete" class="waves-effect waves-light btn red lighten-1"><i class="medium material-icons right">delete</i>Delete Post</button>
                </form> -->
        </div>
        </div>
    </main>
    <!-- Modal login Section -->
    <section>
        <div id="login" class="modal">
            <div class="modal-content center">
                <h5>LOGIN</h5>
                <i class="medium material-icons green-text text-green lighten-1">admin_panel_settings</i>
            </div>
            <div class="container">
                <div class="row">
                    <form action="" method="POST" class="col s12 ">
                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix green-text text-green lighten-1">account_circle</i>
                                    <input id="username" type="text" name="user_name" class="validate">
                                    <label for="username">Username</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix green-text text-green lighten-1">lock</i>
                                    <input id="password" type="password" name="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="center">
                                <button class="btn waves-effect waves-light green lighten-1" type="submit" name="login">Login
                                    <i class="material-icons right">login</i>
                                </button>
                            </div><br>
                            <div class="divider"></div>
                            <div class="section"></div>
                    </form>
                    <div class="col s6">
                        <!-- <a href="">Forgot Password</a> -->
                    </div>
                    <div class="col s6 right-align">
                        <label for="register"> <strong>Don't have an account? <em>Click</em></strong></label>
                        <a href="sign_up.php" id="register">Register</a>
                    </div>
                </div>
            </div>
        </div>
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
        <script type="text/javascript" src="js/materialize.js"></script>
        <script type="text/javascript" src="js/init.js"></script>

</body>

</html>