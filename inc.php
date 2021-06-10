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

    <title>i-Resiklo</title>

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
                            <li style="font-weight: 600;"><a href="index.php">Home</a></li>
                            <li style="font-weight: 600;"><a href="#about">About</a></li>
                            <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li>
                            <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
                        </ul>
                    </div>
                </div>
        </div>
        </nav>

        <ul class="sidenav" id="mobile-ver">
            <li style="font-weight: 600;"><a href="index.php">Home</a></li>
            <li style="font-weight: 600;"><a href="#about">About</a></li>
            <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li>
            <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li>
        </ul>
    </header>

    <section class="slider">
        <ul class="slides">
            <li>
                <img class="responsive-img" src="images/env2.jpg">
                <div class="caption left-align">
                    <h1 class="bold">CENRO Malolos</h1>
                    <h5 class="bold">City Environment and Natural Resources Office.</h5>
                </div>
            </li>
        </ul>
    </section>
    
<div class="container">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-image">
            <img src="images/bg.jpg">
            <span class="card-title"><strong>Personal Information</strong></span>
            <!-- <a class="btn-floating halfway-fab waves-effect waves-light blue"><i class="large material-icons">edit</i></a> -->
          </div>
          <div class="card-content">
            <div class="center">
              <img src="images/defaultimg.png" alt="" class="responsive-img" style="height: 200px;">
            </div>
            <div class="divider"></div>
            <div class="green-text">
              <h5>Name:</h5>
              <h5>Birthday:</h5>
              <h5>Contact No:</h5>
              <h5>Email:</h5>
              <h5>Address:</h5>
            </div>
          </div>
          <div class="card-action center">
          <a <a class="waves-effect waves-light btn"><i class="material-icons right">edit</i>edit</a>
        </div>
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
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/init.js"></script>

</body>

</html>