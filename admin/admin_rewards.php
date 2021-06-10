<?php
include "../services/database_connection.php";

include "session.php";





if (isset($_POST['inactivebtn'])) {
    $reward_id = $_POST['reward_id'];

    $inactive = "inactive";
    $sql = "UPDATE tbl_rewards SET status = '$inactive' where id_reward = '$reward_id' ";
    $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($qry) { ?>
        <script>
            alert("reward Successfully unposted");
        </script>

    <?php

    }
}



if (isset($_POST['activebtn'])) {
    $reward_id = $_POST['reward_id'];

    $active = "active";
    $sql = "UPDATE tbl_rewards SET status = '$active' where id_reward = '$reward_id' ";
    $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($qry) { ?>
        <script>
            alert("reward Successfully posted");
        </script>

        <?php

    }
}










if (isset($_POST['savebtn'])) {



    $reward_item = $_POST['reward_item'];
    $equiv_points = $_POST['equiv_points'];
    $status = $_POST['status'];

    $img_name = $_FILES['picture']['name'];
    $img_size = $_FILES['picture']['size'];
    $tmp_name = $_FILES['picture']['tmp_name'];
    $error = $_FILES['picture']['error'];



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

                $sql = "INSERT INTO tbl_rewards (picture, reward_item, equiv_points, status) VALUES ('$new_img_name', '$reward_item', '$equiv_points', '$status') ";
                $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                if ($qry) {
        ?>

                    <script>
                        alert("Reward Successfully added");
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

    <title>Rewards</title>

</head>

<body>
    <?php include "sessionbody.php"; ?>
    <header>
        <div class="navbar-fixed">
            <nav class="green lighten-1 z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo" style="font-weight: 600;"> <em>Rewards</em></a>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- fixed side-nav -->
    <?php include '../components/admin_sidenav.php' ?>


    <main><br>
        <div class="container">
            <div class="row">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="file-field input-field col s6">
                            <div class="btn">
                                <span>Upload<i class="material-icons">add</i></span>
                                <input type="file" name="picture">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Reward Image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix green-text text-green lighten-1">title</i>
                            <input id="title" type="text" name="reward_item" class="validate" required="">
                            <label for="title">Reward Item Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix green-text text-green lighten-1">description</i>
                            <input id="title" type="number" name="equiv_points" class="validate">
                            <label for="title">Equivalent Points</label>
                        </div>
                    </div>
                    <input type="text" name="status" value="active">
                    <div class="center">
                        <button type="submit" name="savebtn" class="waves-effect waves-light btn-small green lighten-1"><i class="medium material-icons right">save</i>Save</button>
                        <!-- <a href="" class="waves-effect waves-light btn-small green lighten-1"><i class="medium material-icons right">publish</i>Publish</a> -->
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="container"> -->
        <div class="row">
            <div class="col s12">
                <div class="card-panel teal lighten-2">
                    <strong>Reward List</strong>
                </div>
                <table class="centered">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Item Name</th>
                            <th>Points</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $qry = "SELECT * FROM tbl_rewards";
                        $result = mysqli_query($conn, $qry);
                        while ($show = mysqli_fetch_array($result)) {
                        ?>

                            <tr>
                                <td><img src="../images/<?php echo $show['picture']; ?>" width="100px "></td>
                                <td><?php echo $show['reward_item']; ?></td>
                                <td><?php echo $show['equiv_points']; ?></td>
                                <td><a href="admin_edit_reward.php?reward_id=<?php echo $show['id_reward']; ?>" class="waves-effect waves-light btn"><i class="material-icons right">edit</i>edit</a>
                                
                                <form action="" method="POST">
                                    <input type="text" name="reward_id" value="<?php echo $show['id_reward']; ?>" hidden>
                                    <?php
                                    if ($show['status'] == "active") { ?>
                                        <!-- <input type="text" name="reward_id" value="<?php echo $show['id_reward']; ?>" hidden> -->
                                        <button class="btn waves-effect waves-light red" type="submit" name="inactivebtn">inactive</button>


                                    <?php
                                    } else { ?>
                                        <!-- <input type="text" name="reward_id" value="<?php echo $show['id_reward']; ?>" hidden> -->
                                        <button class="btn waves-effect waves-light blue" type="submit" name="activebtn">active</button>

                                    <?php

                                    }


                                    ?>

                                    </form>
                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>

    </main>


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