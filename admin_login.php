<?php
session_start();
include 'services/database_connection.php';


if (isset($_POST['login'])) {

    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $admin = "admin";


    $query = "SELECT  * from tbl_userinfo where user_name = '$username' and password = '$password' and user_type = '$admin'";

    $run_admin = mysqli_query($conn, $query);
    $row_admin = mysqli_fetch_array($run_admin);

    if (mysqli_num_rows($run_admin) == 1) {
        session_start();
        $_SESSION['id'] = $row_admin['id'];
        header('location:admin/admin_dashboard.php');
    } else {

        $_SESSION['status'] = 'Error';
        $_SESSION['status_code'] = 'error';
        $_SESSION['status_message'] = 'Invalid Username or Password Please try again.';
        header("Location: admin_login.php");
        exit();
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection">
    <!-- Import fontawesome -->
    <script src="https://kit.fontawesome.com/621283ac00.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <title>i-Resiklo</title>
</head>

<body>
    <main>
        <div class="row">
            <div class="col s12 l6">
                <div class="center-align"><br><br><br><br><br><br><br><br>
                    <h1 class=" green-text text-green lighten-">CENRO MALOLOS</h1>
                    <h6 class=" green-text text-green lighten-">City Environment and Natural Resources Office</h6>
                </div>
            </div>
            <form action="" method="POST">
                <div class="col s12 l6">
                    <div class="container center"><br><br><br><br><br>
                        <i class="medium material-icons green-text text-green lighten-1">admin_panel_settings</i>
                        <h6 class="green-text text-green lighten-1"><strong>ADMIN LOGIN</strong></h6>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix green-text text-green lighten-1">account_circle</i>
                                <input id="username" type="text" name="user_name" class="validate">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s10">
                                <i class="material-icons prefix green-text text-green lighten-1">lock</i>
                                <input id="password" type="password" name="password" class="validate" required>
                                <label for="password">Password</label>
                            </div><br><br>
                            <div class="col s2">
                                <label>
                                    <input type="checkbox" onclick="showPass()" class="filled-in" />
                                    <span>Show</span>
                                </label>
                            </div>
                        </div>
                        <div class="center">
                            <button class="btn waves-effect waves-light green lighten-1" type="submit" name="login">Login
                                <i class="material-icons right">login</i>
                            </button>
                        </div>
                        <div><br>
                            <a href="forgot_password.php">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <br><br><br><br><br>
    <footer>
        <?php include('components/footer.php'); ?>
    </footer>
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
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/init.js"></script>

</body>


</html>