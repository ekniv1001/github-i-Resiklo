<?php 

include '../services/database_connection.php';
$admin = "admin";
 $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$admin'";
 $result1 = mysqli_query($conn, $qry1);
 while ($show = mysqli_fetch_array($result1)) {
 $oldpassword = $show['password'];
}
  


if(isset($_POST['confirmbtn'])){
    $password = $_POST['password'];


if($oldpassword == $password){

    ?>
<script>
    alert("Password correct");
window.location.href='admin_edit_acc.php';
</script>
    <?php
}else{

    ?>
<script>

     alert("Password Incorrect");
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
    <!-- <?php "sessionbody.php"; ?> -->
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>Account</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php include '../components/admin_sidenav.php' ?>

    <main><br><br>
        <div class="container center">
            <h3 class="green-text text-green-lighten-1">Confirm Password</h3>
        </div>
        <form method="POST" action="">
        <div class="container">
            <div style="height: 200px; background-color:#e6ffee;">
                <div class="container">
                    <div class="row"><br><br>
                        <div class="input-field col s10">
                            <i class="material-icons prefix green-text text-green lighten-1">lock</i>
                            <input id="password" type="password" name="password" class="validate" required>
                            <label for="password">Current Password</label>
                        </div><br><br>
                        <div class="col s2">
                            <label>
                                <input type="checkbox" onclick="showPass()" class="filled-in" />
                                <span>Show</span>
                            </label>
                        </div>
                    </div>
                    <div class="center">
                       <button class="btn waves-effect waves-light" type="submit" name="confirmbtn">confirm
                            <i class="material-icons right">send</i>
                        </button>

</form>

                  
                    </div>
                </div>
            </div>
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

    <script>
        function showPass() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showPass2() {
            var x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>

</body>

</html>