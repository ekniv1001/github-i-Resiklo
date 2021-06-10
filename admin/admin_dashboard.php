<?php
include "session.php";
include '../services/database_connection.php';


$user = "user";
$qry5 = "SELECT * FROM tbl_userinfo where user_type = '$user' ";
$result5 = mysqli_query($conn, $qry5);
$output5 = mysqli_num_rows($result5);



$claimed = "claimed";
$qry6 = "SELECT SUM(claim_quantity) as sum FROM tbl_claim where claim_status = '$claimed'";
$result6 = mysqli_query($conn, $qry6);
while ($show6 = mysqli_fetch_array($result6)) {

  $output6 = $show6['sum'];
}





$qry3 = "SELECT SUM(num_bottles) as sum FROM tbl_summary ";
$result3 = mysqli_query($conn, $qry3);
while ($show3 = mysqli_fetch_array($result3)) {

  $output2 = $show3['sum'];
}


$blank = 0;

$qry4 = "SELECT SUM(num_bottles) as sum FROM tbl_summary where user_id = '$blank' ";
$result4 = mysqli_query($conn, $qry4);
while ($show4 = mysqli_fetch_array($result4)) {

  $output3 = $show4['sum'] * -1;
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

  <title>Dashboard</title>

</head>

<body>

  <?php "sessionbody.php"; ?>

  <header>
    <!-- navbar content here  -->
    <div class="navbar-fixed">
      <nav class="green lighten-1 z-depth-0" role="navigation">
        <div class="container">
          <div class="nav-wrapper">
            <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>DASHBOARD</em></a>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <!-- fixed side-nav -->
  <?php include '../components/admin_sidenav.php' ?>

  <main><br>
    <div class="row">
      <div class="col s6 m3 center">
        <div class="card-panel amber">
          <strong class="white-text" style="font-size: 24px;">USERS</strong><br>
          <strong class="blue-text" style="font-size: 30px;"><?php echo $output5; ?></strong>
        </div>
      </div>
      <div class="col s6 m3 center">
        <div class="card-panel green">
          <strong class="white-text" style="font-size: 24px;">COLLECTED</strong><br>
          <strong class="orange-text" style="font-size: 30px;"><?php echo $output3; ?></strong>
        </div>
      </div>

      <div class="col s6 m3 center">
        <div class="card-panel teal">
          <strong class="white-text" style="font-size: 24px;">PENDING</strong><br>
          <strong class="red-text" style="font-size: 30px;"><?php echo $output2; ?></strong>
        </div>
      </div>

      <div class="col s6 m3 center">
        <div class="card-panel orange">
          <strong class="white-text" style="font-size: 24px;">CLAIMED</strong><br>
          <strong class="yellow-text" style="font-size: 30px;"><?php echo $output6; ?></strong>
        </div>
      </div>
    </div>
    <div style="height: 50px;"></div>
    <div class="row">
      <div class="col s12">
        <div class="card-panel teal lighten-2">
          <strong class="white-text">USER LIST</strong>
        </div>
        <table class="centered">
          <thead>
            <tr>
              <th>Name of User</th>
              <th>Baranggay</th>
              <th>Available Points</th>
            </tr>
          </thead>

          <tbody>

            <?php

            $user = "user";
            $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$user'";
            $result1 = mysqli_query($conn, $qry1);
            while ($show = mysqli_fetch_array($result1)) {
            ?>

              <tr>
                <td><?php echo $show['last_name'] . ", " . $show['first_name']; ?></td>
                <td><?php echo $show['barangay']; ?></td>
                <td><?php echo $show['points']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="col s12">
        <div class="card-panel teal lighten-2">
          <strong class="white-text">COLLECTOR LIST</strong>
        </div>
        <table class="centered">
          <thead>
            <tr>
              <th>Collectors Name</th>
              <th>Total Collection</th>
              <th class="red-text">Pending Collection</th>
            </tr>
          </thead>

          <?php

          $collector = "collector";
          $qry1 = "SELECT * FROM tbl_userinfo where user_type = '$collector'";
          $result1 = mysqli_query($conn, $qry1);
          while ($show = mysqli_fetch_array($result1)) {
            $collector_id = $show['id'];
          ?>

            <tbody>
              <tr>
                <td><?php echo $show['last_name'] . ", " . $show['first_name']; ?></td>

                <?php

                $qry7 = "SELECT SUM(num_bottles) as sum FROM tbl_summary where collector_id = '$collector_id' and user_id = 0 ";
                $result7 = mysqli_query($conn, $qry7);
                while ($show7 = mysqli_fetch_array($result7)) {

                  $output7 = $show7['sum'] * -1;
                ?>


                  <td><?php echo $output7; ?> </td>
                <?php } ?>



                <?php
                $qry2 = "SELECT SUM(num_bottles) as sum FROM tbl_summary where collector_id = '$collector_id'";
                $result2 = mysqli_query($conn, $qry2);
                while ($show2 = mysqli_fetch_array($result2)) {

                  $output = $show2['sum'];

                ?>
                  <td class="red-text"><?php echo $output; ?></td>
                <?php } ?>

              </tr>
            <?php  } ?>


            </tbody>
        </table>


      </div>
      <div style="height: 100px;"></div>

      
      <div class="col s12">
        <div class="card-panel teal lighten-2">
          <strong class="white-text">LIST OF CLAIMED REWARDS</strong>
        </div>
        <table class="centered">
          <thead>
            <tr>
              <th>User's Name</th>
              <th>Reward Item</th>
              <th>Quantity</th>
              <th>Date</th>

            </tr>
          </thead>
          <tbody>
          <?php

          $claim_status = "claimed";
          $qry1 = "SELECT * FROM tbl_claim where claim_status = '$claim_status'";
          $result1 = mysqli_query($conn, $qry1);
          while ($show1 = mysqli_fetch_array($result1)) {
            $user_id = $show1['claim_user_id'];
            $reward_id = $show1['claim_reward_id'];


            $qry2 = "SELECT * FROM tbl_userinfo where id = '$user_id'";
            $result2 = mysqli_query($conn, $qry2);
            while ($show2 = mysqli_fetch_array($result2)) {


          ?>


           
              <tr>
                <td><?php echo $show2['last_name'] . ", " . $show2['first_name']; ?></td>

                <?php

            }

                $qry3 = "SELECT * FROM tbl_rewards where id_reward = '$reward_id'";
                $result3 = mysqli_query($conn, $qry3);
                while ($show3 = mysqli_fetch_array($result3)) {

                ?>
                  <td><?php echo $show3['reward_item']; ?></td>
                <?php } ?>

              

                <td><?php echo $show1['claim_quantity']; ?> </td>
                <td><?php echo $show1['claim_date'];?></td>
              </tr>
            <?php  } ?>
            </tbody>
        </table>
      </div>
    </div>

    <br>
    <br>
  </main>
  <div style="height: 150px;"></div>

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
  <script type="text/javascript" src="../js/materialize.js"></script>
  <script type="text/javascript" src="../js/init.js"></script>

</body>

</html>