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