<?php 

include '../services/database_connection.php';


$admin = "admin";
 $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$admin'";
 $result1 = mysqli_query($conn, $qry1);
 while ($show = mysqli_fetch_array($result1)) {

$user_name = $show['user_name'];
}



if(isset($_POST['savebtn'])){
$password = $_POST['password'];
$user_name = $_POST['user_name'];
$confirm_password = $_POST['confirm_password'];


if($password == $confirm_password){

    $sql = "UPDATE tbl_userinfo SET user_name = '$user_name' , password = '$password' ";
                $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<script>
      alert("username and password updated succesfully");
      window.location.href='admin_dashboard.php';
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

    <main>
        <form action="" method="POST">
        <div class="container center">
            <h3 class="green-text text-green-lighten-1">Edit Account</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="input-field col s10">
                    <i class="material-icons prefix green-text text-green lighten-1">account_circle</i>
                    <input id="username" type="text" name="user_name" class="validate" value="<?php echo $user_name; ?>" required>
                    <label for="username">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10">
                    <i class="material-icons prefix green-text text-green lighten-1">lock</i>
                    <input id="password" type="password" name="password" class="validate" required>
                    <label for="password">New Password</label>
                </div><br><br>
                <div class="col s2">
                    <label>
                        <input type="checkbox" onclick="showPass()" class="filled-in" />
                        <span>Show</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10">
                    <i class="material-icons prefix green-text text-green lighten-1">password</i>
                    <input id="confirm_password" type="password" name="confirm_password" class="validate" required>
                    <label for="confirm_password">Re-type Password</label>
                </div><br><br>
                <div class="col s2">
                    <label>
                        <input type="checkbox" onclick="showPass2()" class="filled-in" />
                        <span>Show</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="center">
            <button class="btn waves-effect waves-light" type="submit" name="savebtn">save
                <i class="material-icons right">save</i>
            </button>
        </div>
</form>
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