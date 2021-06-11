<?php
include 'services/database_connection.php';



$first_name = "";
$last_name = "";
$address = "";
$contact_number = "";
$email = "";
$user_name = "";
$birthday = "";


if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = "user";
    $default_image = "defaultimg.png";
    $points = 0;
    $barangay = $_POST['barangay'];
    
    if ($password != $confirm_password) { ?>

        <script>
            alert("Password doesn't match.");
        </script>

        <?php
    } else {

        $query = "INSERT INTO tbl_userinfo (first_name, last_name, birthday, address, contact_number, email, user_name, password, user_type, photo, points, barangay ) VALUES ('$first_name', '$last_name', '$birthday', '$address', '$contact_number', '$email', '$user_name', '$password' , '$user_type', '$default_image' , '$points', '$barangay' )";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if ($result) {

        ?>

            <script>
                alert("Register successfully");
                window.location.href = 'index.php';
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


    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <script src="https://kit.fontawesome.com/621283ac00.js" crossorigin="anonymous"></script>

    <title>i-Resiklo</title>

</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1" role="navigation">
                <div class="nav-wrapper">
                    <!-- <a href="index.php" class="brand-logo center" style="font-weight: 600;">i-Resiklo</a> -->
                    <ul>
                        <li><a href="index.php"><i class="material-icons left">west</i>Back</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="green-text text-green lighten-4"><br>
                <h4><strong>Registration Form</strong></h4><br>
            </div>
            <div class="row">
                <!-- form -->
                <div class="col s12 m12 l6">
                    <div class="row">
                        <form action="" method="POST" class="col s12">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix green-text text-green lighten-1">account_circle</i>
                                    <input id="first_name" type="text" name="first_name" class="validate" value="<?php echo $first_name; ?>" required>
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" name="last_name" class="validate" value="<?php echo $last_name; ?>" required>
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix green-text text-green lighten-1">event</i>
                                    <input id="birthdate" type="text" name="birthday" tabindex="-1" class="datepicker" value="<?php echo $birthday; ?>" required>
                                    <label for="birthdate">Birthday</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix green-text text-green lighten-1">place</i>
                                    <select name="barangay" required="" >
                                        <option value="" disabled selected> <label for=""> Choose your Barangay</label></option>
                                        <option value="Anilao">Anilao</option>
                                        <option value="Atlag">Atlag</option>
                                        <option value="Babatnin">Babatnin</option>
                                        <option value="Bagna">Bagna</option>
                                        <option value="Bagong Bayan">Bagong Bayan</option>
                                        <option value="Balayong">Balayong</option>
                                        <option value="Balite">Balite</option>
                                        <option value="Bangkal">Bangkal</option>
                                        <option value="Barihan">Barihan</option>
                                        <option value="Bulihan">Bulihan</option>
                                        <option value="Bungahan">Bungahan</option>
                                        <option value="Caingin">Caingin</option>
                                        <option value="Calero">Calero</option>
                                        <option value="Caliligawan">Caliligawan</option>
                                        <option value="Canalate">Canalate</option>
                                        <option value="Caniogan">Caniogan</option>
                                        <option value="Catmon">Catmon</option>
                                        <option value="Cofradia">Cofradia</option>
                                        <option value="Dakila">Dakila</option>
                                        <option value="Guinhawa">Guinhawa</option>
                                        <option value="Ligas">Ligas</option>
                                        <option value="Liang">Liang</option>
                                        <option value="Longos">Longos</option>
                                        <option value="Look 1st">Look 1st</option>
                                        <option value="Look 2nd">Look 2nd</option>
                                        <option value="Lugam">Lugam</option>
                                        <option value="Mabolo">Mabolo</option>
                                        <option value="Mambog">Mambog</option>
                                        <option value="Masile">Masile</option>
                                        <option value="Matimbo">Matimbo</option>
                                        <option value="Mojon">Mojon</option>
                                        <option value="Namayan">Namayan</option>
                                        <option value="Niugan">Niugan</option>
                                        <option value="Pamarawan">Pamarawan</option>
                                        <option value="Panasahan">Panasahan</option>
                                        <option value="Pinagbakahan">Pinagbakahan</option>
                                        <option value="San Agustin">San Agustin</option>
                                        <option value="San Gabriel">San Gabriel</option>
                                        <option value="San Juan">San Juan</option>
                                        <option value="San Pablo">San Pablo</option>
                                        <option value="San Vicente (Poblacion)">San Vicente (Poblacion)</option>
                                        <option value="Santiago">Santiago</option>
                                        <option value="Santisima Trinidad">Santisima Trinidad</option>
                                        <option value="Santo Cristo">Santo Cristo</option>
                                        <option value="Santo Niño (Poblacion)">Santo Niño (Poblacion)</option>
                                        <option value="Santo Rosario (Poblacion)">Santo Rosario (Poblacion)</option>
                                        <option value="Santor">Santor</option>
                                        <option value="Sumapang Bata">Sumapang Bata</option>
                                        <option value="Sumapang Matanda">Sumapang Matanda</option>
                                        <option value="Taal">Taal</option>
                                        <option value="Tikay">Tikay</option>
                                    </select>
                                    <label>Select your Barangay</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix green-text text-green lighten-1">home</i>
                                    <input id="address" type="text" name="address" class="validate" value="<?php echo $address; ?>" required>
                                    <label for="address">Address (House No. Bldg. St. Purok)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix green-text text-green lighten-1">call</i>
                                    <input id="contact_number" type="text" name="contact_number" onkeypress="isInputNumber(event)" class="validate" value="<?php echo $contact_number; ?>" required>
                                    <label for="contact_number">Contact Number</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix green-text text-green lighten-1">email</i>
                                    <input id="email" type="email" name="email" class="validate" value="<?php echo $email; ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="section"></div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix green-text text-green lighten-1">account_circle</i>
                                    <input id="username" type="text" name="user_name" class="validate" value="<?php echo $user_name; ?>" required>
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
                            <div class="row">
                                <div class="input-field col s10">
                                    <i class="material-icons prefix green-text text-green lighten-1">password</i>
                                    <input id="confirm_password" type="password" name="confirm_password" class="validate" required>
                                    <label for="confirm_password">Confirmm Password</label>
                                </div><br><br>
                                <div class="col s2">
                                    <label>
                                        <input type="checkbox" onclick="showPass2()" class="filled-in" />
                                        <span>Show</span>
                                    </label>
                                </div>
                            </div>
                            <label for="termscons">By clicking Sign Up, you agree to our <a href=""><em>Terms, Data Policy</em></a>
                                and <a href=""><em>Cookies Policy</em></a>. You may receive SMS Notifications
                                from us and can opt out any time.</label>
                            <br><br>
                            <div class="center">
                                <button class="btn waves-effect waves-light btn-large green lighten-1" type="submit" name="submit">Sign Up
                                    <i class="material-icons right">person_add</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- logo -->
                <div class="row">
                    <div class="col s12 m12 l6 center">
                        <img src="images/logo.jpg" alt="" class="responsive-img">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php include 'components/footer.php' ?>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var select = document.querySelectorAll('select');
            var instances = M.FormSelect.init(select, {});
        });
    </script>
    <script type="text/javascript">
        function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }
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

    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
</body>

</html>