<?php
// include 'services/database_connection.php';
session_start();
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
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.9.0/dist/sweetalert2.all.min.js"></script> -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <title>i-Resiklo</title>

</head>

<body id="root">
  <header>
    <div class="navbar-fixed">
      <nav class="green lighten-1 z-depth-0" role="navigation">
        <div class="container">
          <div class="nav-wrapper">
            <a href="index.php" class="brand-logo" style="font-weight: 600;">i-Resiklo</a>
            <a href="#" data-target="mobile-ver" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li style="font-weight: 600;"><a href="index.php">Home</a></li>
              <!-- <li style="font-weight: 600;"><a href="sign_up.php">Signup</a></li> -->
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <ul class="sidenav" id="mobile-ver">
      <li style="font-weight: 600;"><a href="index.php">Home</a></li>
    </ul>
  </header>

<main>
    
                    <div class="valign-wrapper" style="width:100%; height:60vh;position: absolute;">
                        <div class="valign" style="width:100%;">
                            <div class="container">
                            <div class="row">
                                <div class="col s12 m6 offset-m3">
                                <form action="services/action_reset_code.php?&user=<?php echo $_REQUEST['user'];?>" method="post">
                                    <div class="card">
                                        <div class="card-content">
                                        <span class="card-title black-text">Code Verification</span>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input placeholder="Enter Reset Code" id="otp" name="otp" type="text" class="validate" value="<?php echo !empty($_SESSION['old_request']) ? $_SESSION['old_request']['otp']  : '' ; ?>">
                                                    <label for="otp" class="active">Reset Code:</label>
                                                </div>
                                            </div>
                                       
                                        </div>
                                        <div class="card-action">
                                        <input type="submit" class="btn" value="Submit">
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

</main>

    


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
    //   Swal.fire({
    //         title: "Error!",
    //         text: "Do you want to continue",
    //         icon: "error",
    //         confirmButtonText: "Cool"
    //       });
    </script>


        <?php
            if(isset($_SESSION['status']))
            {
            
        ?>
                <script>
                       swal({
                            title: "<?php echo $_SESSION['status'];?>",
                            text: "<?php echo $_SESSION['status_message'];?>",
                            icon: "<?php echo $_SESSION['status_code'];?>",
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