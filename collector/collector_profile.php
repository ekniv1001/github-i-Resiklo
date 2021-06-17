<?php include "collector_session.php";

include "collector_sessionbody.php";

 $user_id = isset($id) ? $id : '';


  
include '../services/database_connection.php';



 $qry1 = "SELECT * FROM tbl_userinfo where id = '$user_id'";
 $result1 = mysqli_query($conn, $qry1);
 while ($show = mysqli_fetch_array($result1)) {

$first_name = $show['first_name'];
$last_name = $show['last_name'];
$birthday = $show['birthday'];
$barangay = $show['barangay'];
$address = $show['address'];
$contact_number = $show['contact_number'];
$email = $show['email'];
$admin_id = $show['id'];
$photo = $show['photo'];
 }



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
    <link type="text/css" rel="stylesheet" href="../css/materialize.css" media="screen,projection" />
    <!-- Import fontawesome -->
    <script src="https://kit.fontawesome.com/621283ac00.js" crossorigin="anonymous"></script>

    <title>Collector Page</title>

</head>


<body>
    
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="user_home_view.php" class="brand-logo" style="font-weight: 600;">i-Resiklo</a>
                        <a href="#" data-target="mobile-ver" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                        <li style="font-weight: 600;"><a href="collector_home_view.php">Home</a></li>
                            <li style="font-weight: 600;"><a href="collector_profile.php">Profile</a></li>
                            <li style="font-weight: 600;"><a href="collector_myCollection.php">My Collection</a></li>
                            <li style="font-weight: 600;"><a href="collector_logout.php">Logout</a></li>
                            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
                            <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-ver">
        <li style="font-weight: 600;"><a href="collector_home_view.php">Home</a></li>
                            <li style="font-weight: 600;"><a href="collector_profile.php">Profile</a></li>
                            <li style="font-weight: 600;"><a href="collector_myCollection.php">My Collection</a></li>
                            <li style="font-weight: 600;"><a href="collector_logout.php">Logout</a></li>
                            <!-- <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li> -->
        </ul>
    </header>

    <main>
        <!-- <div class="container"> -->
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="../images/bg.jpg" >
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
                                                        <input disabled id="birthdate" type="text" value="<?php echo $birthday; ?>" name="birthday" class="datepicker" hidden value="" required>
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
                                                        <input disabled id="contact_number" value="<?php echo $contact_number; ?>" type="text" name="contact_number" class="validate" hidden value="" required>
                                                        <!-- <label for="contact_number">Contact Number</label>
                                                    </div>
                                                </div> -->
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix green-text text-green lighten-1">email</i>
                                                        <input disabled id="email" value="<?php echo $email; ?>" type="email" name="email" class="validate" value="" required>
                                                        <label for="email">Email</label>
                                                    </div>
                                                </div>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-action center">
                            <a href="collector_profile_update.php?user_id=<?php echo $user_id; ?>" class="waves-effect waves-light btn"><i class="material-icons right">edit</i>edit</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <footer>
        <?php
        include '../components/footer.php';
        ?>
    </footer>