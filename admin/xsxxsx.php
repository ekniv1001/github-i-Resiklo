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

                $qry3 = "SELECT * FROM tbl_reward where id_reward = '$reward_id' ";
                $result3 = mysqli_query($conn, $qry3);
                while ($show3 = mysqli_fetch_array($result3)) {

                ?>
                  <td><?php echo $show3['reward_item']; ?></td>
                <?php } ?>

              

                <td>date</td>
              </tr>
            <?php  } ?>





            <main>
        <div class="container">
            <div class="card-panel teal lighten-2">
                <strong class="white-text">History</strong>
            </div>
            <table class="centered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Remarks</th>
                        <th>Quantity</th>
                        <th>Date</th>

                    </tr>
                </thead>

                <tbody>
                    <?php

                    $qry1 = "SELECT * FROM tbl_logs";
                    $result1 = mysqli_query($conn, $qry1);
                    while ($show = mysqli_fetch_array($result1)) {

                        if ($show['remarks'] == "received") {
                            $collector_id = $show['collector_id'];
                            $user_id = $show['user_id'];

                            $qry2 = "SELECT * FROM tbl_userinfo where id = '$collector_id'";
                            $result2 = mysqli_query($conn, $qry2);
                            while ($show2 = mysqli_fetch_array($result2)) { ?>
                                <tr>
                                    <td><?php echo $show2['first_name'] . ", " . $show2['last_name']; ?></td>
                                    <td><?php echo $show2['user_type']; ?></td>
                                    <td><?php echo $show['remarks']; ?></td>
                                    <td>quantity</td>
                                    <td><?php echo $show['log_date']; ?></td>

                                </tr>
                            <?php
                            }
                        } else {



                            $qry3 = "SELECT * FROM tbl_userinfo where id = '$user_id'";
                            $result3 = mysqli_query($conn, $qry3);
                            while ($show3 = mysqli_fetch_array($result3)) { ?>
                                <tr>
                                    <td><?php echo $show3['first_name'] . ", " . $show3['last_name']; ?></td>
                                    <td><?php echo $show3['user_type']; ?></td>
                                    <td><?php echo $show['remarks']; ?></td>
                                    <td><?php echo $show['log_date']; ?></td>

                                </tr>


                    <?php }
                        }
                    } ?>


                </tbody>
            </table>
        </div>
    </main>
   