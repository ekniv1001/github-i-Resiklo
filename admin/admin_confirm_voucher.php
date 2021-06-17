<?php
include "../services/database_connection.php";
include "../services/action_event.php";
include "session.php";






if (isset($_POST['approvebtn'])) {
    $claim_id = $_POST['claim_id'];
?>
    <script>
        const answer = confirm("Do you want to approve this voucher request?");
        if (answer == true) {

            window.location.href = 'admin_confirm_voucher_action.php?claim_id=<?php echo $claim_id; ?>';
        }
    </script>

<?php





}



if (isset($_POST['claimedbtn'])) {
    $claim_id = $_POST['claim_id'];
?>
    <script>
        const answer = confirm("Please confirm to mark this item as claimed");
        if (answer == true) {

            window.location.href = 'admin_confirm_voucher_claimed.php?claim_id=<?php echo $claim_id; ?>';
        }
    </script>

<?php





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

    <title>Vouchers</title>

</head>

<body>
    <?php "sessionbody.php"; ?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="admin_events.php" class="brand-logo" style="font-weight: 600;"> <em>Voucher</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- fixed side-nav -->
    <?php include '../components/admin_sidenav.php' ?>


    <main>
        <div class="container">
            <h4 class="green-text">Voucher Approval</h4>
            <div class="divider"></div>
        </div>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Name:</th>
                        <th>Reward Item</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $claimed = "claimed";
                    $qry1 = "SELECT * FROM tbl_claim where claim_status != '$claimed' ";
                    $result = mysqli_query($conn, $qry1);

                    while ($show = mysqli_fetch_array($result)) {
                        $claim_user_id = $show['claim_user_id'];
                        $reward_id = $show['claim_reward_id'];
                    ?>

                        <?php


                        $qry2 = "SELECT * FROM tbl_userinfo where id = '$claim_user_id'";
                        $result2 = mysqli_query($conn, $qry2);
                        while ($show2 = mysqli_fetch_array($result2)) {


                        ?>
                            <tr>
                                <td><?php echo $show2['last_name'] . ", " . $show2['first_name']; ?>
                                    <?php echo $show2['address'] . ", " . $show2['barangay']; ?>


                                </td>


                            <?php } ?>

                            <?php


                            $qry3 = "SELECT * FROM tbl_rewards where id_reward = '$reward_id'";
                            $result3 = mysqli_query($conn, $qry3);
                            while ($show3 = mysqli_fetch_array($result3)) {


                            ?>



                                <td><?php echo $show3['reward_item']; ?></td>
                            <?php } ?>


                            <td><?php echo $show['claim_quantity']; ?></td>
                            <td><?php echo $show['claim_status']; ?></td>




                            <?php
                            if ($show['claim_status'] == "request") { ?>

                                <td>
                                    <form action="" method="POST">
                                        <input type="text" name="claim_id" value="<?php echo $show['claim_id']; ?>" hidden>
                                        <button class="btn waves-effect waves-light" type="submit" name="approvebtn">approve
                                            <i class="material-icons right">send</i>

                                        </button>

                                    </form>


                                </td>

                            <?php
                            } elseif ($show['claim_status'] == "unclaimed") { ?>
                                <td>
                                    <form action="" method="POST">
                                        <input type="text" name="claim_id" value="<?php echo $show['claim_id']; ?>" hidden>
                                        <button class="btn waves-effect waves-light" type="submit" name="claimedbtn">claimed
                                        <i class="material-icons right">done</i>
                                        </button>

                                    </form>


                                </td>


                            <?php
                            }

                            ?>


                            </tr>



                        <?php } ?>



                </tbody>
            </table>
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