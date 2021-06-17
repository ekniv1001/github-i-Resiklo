<?php
session_start();
include 'services/database_connection.php';

unset($_SESSION['old_request']);

if (isset($_POST['login'])) {

  $username = $_POST['user_name'];
  $password = $_POST['password'];
  $user = "user";


  $query = "SELECT  * from tbl_userinfo where user_name = '$username' and password = '$password' and user_type = '$user'";

  $run_admin = mysqli_query($conn, $query);
  $row_admin = mysqli_fetch_array($run_admin);

  if (mysqli_num_rows($run_admin) == 1) {
    // check if user is verified
    if (!empty($row_admin['email_verified_at'])) {
      session_start();
      $_SESSION['id'] = $row_admin['id'];
      header('location:user/user_home_view.php');
    } else {
      $_SESSION['status'] = 'Error';
      $_SESSION['status_code'] = 'error';
      $_SESSION['status_message'] = 'Invalid Username or Password Please try again.';
      header("Location: index.php");
      exit();
    }
  } else {

    $_SESSION['status'] = 'Error';
    $_SESSION['status_code'] = 'error';
    $_SESSION['status_message'] = 'Invalid Username or Password Please try again.';
    header("Location: index.php");
    exit();
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">


  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
  <!-- Import fontawesome -->
  <script src="https://kit.fontawesome.com/621283ac00.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
              <li style="font-weight: 600;"><a href="index.php">Home</a></li>
              <li style="font-weight: 600;"><a href="#about">About</a></li>
              <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li>
              <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <ul class="sidenav" id="mobile-ver">
      <li style="font-weight: 600;"><a href="index.php">Home</a></li>
      <li style="font-weight: 600;"><a href="#about">About</a></li>
      <li style="font-weight: 600;"><a href="#login" class="modal-trigger">Login</a></li>
    </ul>
  </header>

  <section class="slider">
    <ul class="slides">
      <li>
        <img class="responsive-img" src="images/bgc.jpg">
        <div class="caption left-align">
          <h1 class="bold">CENRO MALOLOS</h1>
          <h5 class="bold">City Environment and Natural Resources Office.</h5>
          <div style="height: 200px; width:200px" class="center">
            <img src="images/logo.png" alt="">
          </div>
        </div>
      </li>
    </ul>
  </section>

  <main>
    <div class="container center">
      <h2 class="bold green-text text-lighten-1 hr-line">What's New</h2>
    </div>
    <!-- <div class="container"> -->
    <div class="row">
      <!-- card section 1-->
      <div class="col s12 m4 l4 center align">
        <div class="card hoverable">
          <div class="card-image">
            <img src="images/clean.jpg">
            <span class="card-title green-text text-darken-1"> <strong>Achievements</strong></span>
          </div>
          <div class="card-content">
            <h5 class="light grey-text text-darken-1">View our Achievements and Milestone.</h5>
          </div>
          <div class="card-action">
            <a href="achievement.php">VIEW ACHIEVEMENTS</a>
          </div>
        </div>
      </div>

      <!-- card section 2-->
      <div class="col s12 m4 l4 center align">
        <div class="card hoverable">
          <div class="card-image">
            <img src="images/3planting.jpg">
            <span class="card-title green-text text-darken-1"> <strong>IEC Campaign</strong></span>
          </div>
          <div class="card-content">
            <h5 class="light grey-text text-darken-1">Read and Learn more about on how to care our Environment .</h5>
          </div>
          <div class="card-action">
            <a href="campaign.php">INFORMATION, EDUCATION AND COMMUNICATION CAMPAIGN</a>
          </div>
        </div>
      </div>

      <!-- card section 3-->
      <div class="col s12 m4 l4 center align">
        <div class="card hoverable">
          <div class="card-image">
            <img src="images/walis.jpg">
            <span class="card-title green-text text-darken-1"> <strong>Events</strong></span>
          </div>
          <div class="card-content">
            <h5 class="light grey-text text-darken-1">Joint and be more active in our upcoming events.
            </h5>
          </div>
          <div class="card-action">
            <a href="events.php">UPCOMING EVENTS</a>
            <!-- <a class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>button</a> -->
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>
  <br>

  <div class="container grey-text text-darken-1">
    <div class="divider"></div><br>
    <div class="section">
      <div class="row" id="about">
        <div class="col s12 m6 about-text">
          <div class="icon-block">
            <h3 class="center green-text text-lighten-2">Waste Segregation</h3>
            <p class="about light flow-text">Waste segregation is included in law because it is much easier to recycle. Effective segregation of wastes means that less waste goes to landfill which makes it cheaper and better for people and the environment</p>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="icon-block">
            <img class="responsive-img" src="images/bins.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container grey-text text-darken-1">
    <div class="divider"></div><br><br>
    <div class="section">
      <div class="row" id="about">
        <div class="col s12 m6">
          <div class="icon-block">
            <img class="responsive-img" src="images/3planting.jpg" alt="">
          </div>
        </div>
        <div class="col s12 m6 about-text">
          <div class="icon-block">
            <h3 class="center green-text text-lighten-2">Tree Planting</h3>
            <p class="about light flow-text">Trees contribute to their environment over long periods of time by providing oxygen, improving air quality, climate amelioration, conserving water, preserving soil, and supporting wildlife.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container grey-text text-darken-1">
    <div class="divider"></div>
    <div class="section">
      <div class="row" id="about">
        <div class="col s12 m6 about-text">
          <div class="icon-block">
            <h3 class="center green-text text-lighten-2">Reduce Reuse Recycle</h3>
            <p class="about light flow-text">We cannot stop waste production entirely, but everyone can make a significant contribution. Think before you bin! It saves energy and natural resources, helps to reduce pollution and reduces the need for landfill.</p>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="icon-block">
            <img class="responsive-img" src="images/recycle.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="divider"></div>
    <div class="section"></div>
  </div>

  <div class="row">
    <div class="container grey-text text-darken-1">
      <div class="header">
        <h3 class="green-text text-lighten-2">Mission</h3>
      </div>
      <p style="text-indent: 50px;" class="light flow-text">Promote Environmental protection and a balanced ecology by restoring, nurturing the environment, in order to ensure public health and awareness to preserve our mother nature in the coming future.</p>
    </div>
  </div>

  <div class="parallax-container">
    <div class="parallax">
      <img src="images/mission.jpg" alt="" class="responsive-img">
    </div>
  </div>

  <div class="row">
    <div class="container grey-text text-darken-1">
      <div class="header">
        <h3 class="green-text text-lighten-2">Vision</h3>
      </div>
      <p style="text-indent: 50px;" class="light flow-text">Malolos is a progressive highly urbanized city rich in natural resources, nurtured and supported by a citizenry with awareness of their right to a balanced Ecology, committed to nurture the environment which is our commitment to proper waste management protection. </p>
    </div>
  </div>

  <div class="parallax-container">
    <div class="parallax">
      <img src="images/env2.jpg" alt="" class="responsive-img">
    </div>
  </div>
  <div id="about" class="section-scrollspy"></div>
  <div class="row">
    <div class="container grey-text text-darken-1">
      <div class="header">
        <h3 class="green-text text-lighten-2">About</h3>
      </div>
      <p style="text-indent: 50px;" class="light flow-text">City Environment& Natural Resources Office (CENRO)
        Responsible for enforcing RA 9003 or Ecological Solid Waste Management Act of 2000” and facilitate the drawing up of a Solid Waste Management Plan.
        Supervise day to day SWM Program operation and maintenance of City of Malolos Ecological Farm (CMEF)</p>
    </div>
  </div>

  <div class="parallax-container">
        <div class="parallax">
            <img src="../images/linis.jpg" alt="" class="responsive-img">
        </div>
    </div>


  <br><br>

  <!-- Modal login Section -->
  <section>
    <div id="login" class="modal">
      <div class="modal-content center">
        <h5><strong>LOGIN</strong></h5>
        <i class="medium material-icons green-text text-green lighten-1">admin_panel_settings</i>
      </div>
      <div class="container">
        <div class="row">
          <form action="index.php" method="POST" class="col s12 ">
            <!-- <div class="row"> -->
            <div class="row">
              <div class="input-field col s10">
                <i class="material-icons prefix green-text text-green lighten-1">account_circle</i>
                <input id="username" type="text" name="user_name" class="validate" required>
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
              <div><br>
                <a href="forgot_password.php">Forgot Password</a>
              </div>
            </div><br>
            <div class="divider"></div>
            <div class="section"></div>
          </form>
          <div class="col s6">
            <label for="col_log"></strong><em> Click</em> here<strong></label>
            <a href="collector_login.php" id="col_log">Collector's Login</a>
          </div>
          <div class="col s6 right-align">
            <label for="register"> <strong>Don't have an account? <em>Click</em></strong></label>
            <a href="sign_up.php" id="register">Register</a>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Footer Section -->

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


    <!-- Materialize Scripts -->
    <script type="text/javascript" src="js/materialize.js"></script>
    <script type="text/javascript" src="js/init.js"></script>

</body>

</html>