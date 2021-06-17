<?php

include '../services/database_connection.php';


$admin = "admin";
$qry1 = "SELECT * FROM tbl_userinfo where user_type = '$admin'";
$result1 = mysqli_query($conn, $qry1);
while ($show = mysqli_fetch_array($result1)) {
  $photo = $show['photo'];
  $first_name = $show['first_name'];
  $last_name = $show['last_name'];
}
?>

<ul id="slide-out" class="sidenav sidenav-fixed">
  <li>
    <div class="user-view">
      <div class="background">
        <img src="../images/pbg.jpg" class="responsive-img">
      </div>
      <a href="#user"><img class="circle" src="../images/<?php echo $photo; ?>"></a>
      <a href="#name"><span class="white-text name"><?php echo $first_name; ?> <?php echo $last_name; ?></span></a>
      <!-- <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a> -->
    </div>
  </li>

  <li><a href="admin_dashboard.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">dashboard</i>Dashboard</a></li>
  <li>
    <div class="divider"></div>
  </li>
  <ul class="collapsible collapsible-accordion">
    <li>
      <a class="collapsible-header waves-effect waves-green lighten-1 bold green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">manage_accounts</i>Profile<i class="material-icons right green-text text-green lighten-1">arrow_drop_down</i></a>
      <div class="collapsible-body ">
        <ul>
          <li><a href="admin_profile.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">description</i>Information</a></li>
          <!-- <li><a href="admin_oldpass.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">edit</i>Account</a></li> -->
          <!-- <li><a href="#!"><i class="material-icons">post_add</i>Programs</a></li> -->
        </ul>
      </div>
    </li>
  </ul>

  <ul class="collapsible collapsible-accordion">
    <li>
      <a class="collapsible-header waves-effect waves-green lighten-1 bold green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">post_add</i>Posts<i class="material-icons right green-text text-green lighten-1">arrow_drop_down</i></a>
      <div class="collapsible-body ">
        <ul>
          <li><a href="admin_campaign.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">campaign</i>IEC Campaign</a></li>
          <li><a href="admin_achievements.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">emoji_events</i>Achievements</a></li>
          <li><a href="admin_events.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">event</i>Events</a></li>
          <!-- <li><a href="#!"><i class="material-icons">post_add</i>Programs</a></li> -->
        </ul>
      </div>
    </li>
    <li>
      <a class="collapsible-header waves-effect waves-green lighten-1 bold green-text"><i class="material-icons green-text text-green lighten-1">settings_applications</i>Manage<i class="material-icons right green-text text-green lighten-1">arrow_drop_down</i></a>
      <div class="collapsible-body">
        <ul>
          <li><a href="admin_rewards.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">military_tech</i>Rewards</a></li>
          <li><a href="admin_recyclables.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">recycling</i>Recyclables</a></li>
          <!-- <li><a href="#!" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">date_range</i>Garbage Collection Schedule</a></li> -->
        </ul>
      </div>
    </li>
  </ul>
  <div class="divider"></div>

  <ul class="collapsible collapsible-accordion">
    <li>
      <a class="collapsible-header waves-effect waves-green lighten-1 bold green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">edit_note</i>Receive Bottles<i class="material-icons right green-text text-green lighten-1">arrow_drop_down</i></a>
      <div class="collapsible-body ">
        <ul>
          <li><a href="admin_search_collector.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">search</i>Search Collector</a></li>

          <!-- <li><a href="#!"><i class="material-icons">post_add</i>Programs</a></li> -->
        </ul>
      </div>
    </li>
  </ul>
  <li><a href="admin_assign_collector.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">assignment_ind</i>Assign Collector</a></li>
  <li><a href="admin_confirm_voucher.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">confirmation_number</i>Voucher</a></li>

  <!-- <li><a href="admin_receive.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">edit_note</i>Receive Bottles</a></li> -->
  <li><a href="admin_logs.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">history</i>Collected</a></li>
  <li>
    <div class="divider"></div>
  </li>
  <li><a href="../admin/logout.php" class="waves-effect waves-green lighten-1 green-text text-green lighten-1"><i class="material-icons green-text text-green lighten-1">logout</i>Logout</a></li>
</ul>