<?php

include '../services/database_connection.php';
$admin_id = $_GET['admin_id'];

$admin = "admin";
$qry1 = "SELECT * FROM tbl_userinfo where id = '$admin_id'";
$result1 = mysqli_query($conn, $qry1);
while ($show = mysqli_fetch_array($result1)) {

    $first_name = $show['first_name'];
    $last_name = $show['last_name'];
    $birthday = $show['birthday'];
    $barangay = $show['barangay'];
    $address = $show['address'];
    $contact_number = $show['contact_number'];
    $email = $show['email'];
    $photo = $show['photo'];
}


if (isset($_POST['updatebtn'])) {


    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];

    $img_name = $_FILES['profile_pic']['name'];
    $img_size = $_FILES['profile_pic']['size'];
    $tmp_name = $_FILES['profile_pic']['tmp_name'];
    $error = $_FILES['profile_pic']['error'];



    if ($error === 0) {
        if ($img_size > 12500000) {
            $em = "Sorry, your file is too large.";
            header("Location: seller_addproduct.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../images/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);


                $sql = "UPDATE tbl_userinfo SET email = '$email' , contact_number = '$contact_number' , photo = '$new_img_name' where id = '$admin_id'";
                $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                if ($qry) {
?>

                    <script>
                        alert("Profile successfully updated");
                        window.location.href = 'admin_profile.php';
                    </script>

<?php



                }
            }
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

    <title>Profile</title>

</head>

<body>
    <?php "sessionbody.php"; ?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>Profile</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- fixed side-nav -->
    <?php include '../components/admin_sidenav.php' ?>

    <main>
        <!-- <div class="container"> -->
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="../images/bg.jpg">
                            <span class="card-title"><strong>Personal Information</strong></span>
                            <!-- <a class="btn-floating halfway-fab waves-effect waves-light blue"><i class="large material-icons">edit</i></a> -->
                        </div>
                        <div class="card-content">
                            <div class="center">
                                <img src="../images/<?php echo $photo; ?>" alt="" class="responsive-img" style="height: 200px; width:auto">
                            </div>
                            <div class="divider"></div><br>
                            <div class="container">
                                <div class="row">
                                    <div class="col s12">
                                        <div class="row">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="file-field input-field">
                                                    <div class="btn">
                                                        <span>Photo</span>
                                                        <input type="file" name="profile_pic">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <i class="material-icons prefix green-text text-green lighten-1">account_circle</i>
                                                        <input disabled id="first_name" type="text" value="<?php echo $first_name; ?>" name="first_name" class="validate" value="" required>
                                                        <label for="first_name">First Name</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input disabled id="last_name" type="text" value="<?php echo $last_name; ?>" name="last_name" class="validate" value="" required>
                                                        <label for="last_name">Last Name</label>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix green-text text-green lighten-1">event</i> -->
                                                <input disabled id="birthdate" type="text" value="<?php echo $birthday; ?>" hidden name="birthday" class="datepicker" value="" required>
                                                <!-- <label for="birthdate">Birthday</label>
                                                    </div>
                                                </div> -->

                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix green-text text-green lighten-1">place</i>
                                                        <select disabled name="barangay" value="<?php echo $barangay; ?>" required>
                                                            <option value="" disabled selected> <label for=""> <?php echo $barangay; ?></label></option>
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
                                                        <input disabled id="address" value="<?php echo $address; ?>" type="text" name="address" class="validate" value="" required>
                                                        <label for="address">Address (House No. Bldg. St. Purok)</label>
                                                    </div>
                                                </div>
                                                <!-- <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix green-text text-green lighten-1">call</i> -->
                                                <input id="contact_number" value="<?php echo $contact_number; ?>" type="text" hidden name="contact_number" class="validate" onkeypress="isInputNumber(event)" required>
                                                <!-- <label for="contact_number">Contact Number</label>
                                                    </div>
                                                </div> -->
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix green-text text-green lighten-1">email</i>
                                                        <input id="email" value="<?php echo $email; ?>" type="email" name="email" class="validate" value="" required>
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action center">
                            <!-- <button type="submit" name="updatebtn">update</button> -->
                            <button class="btn waves-effect waves-light" type="submit" name="updatebtn">Save
                                <i class="material-icons right">save</i>
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
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

    <script type="text/javascript">
        function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }
    </script>

    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/init.js"></script>

</body>

</html>