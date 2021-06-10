<?php
include "../services/database_connection.php";
include "../services/action_posts.php";
$reward_id = $_GET['reward_id'];
include "session.php";





if (isset($_POST['savebtn'])) {
    $reward_item = $_POST['reward_item'];
    $equiv_points = $_POST['equiv_points'];

    $img_name = $_FILES['picture']['name'];
    $img_size = $_FILES['picture']['size'];
    $tmp_name = $_FILES['picture']['tmp_name'];
    $error = $_FILES['picture']['error'];



    if ($img_name == "") {


        $sql = "UPDATE tbl_rewards SET reward_item = '$reward_item' , equiv_points = '$equiv_points' 
where id_reward = '$reward_id' ";
        $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));


?>

        <script>
            alert("reward successfully updated");
            window.location.href = 'admin_rewards.php';
        </script>

        <?php






    } else {




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







                    $sql = "UPDATE tbl_rewards SET picture = '$new_img_name' , reward_item = '$reward_item' , equiv_points = '$equiv_points' where id_reward = '$reward_id' ";
                    $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    if ($qry) { ?>

                        <script>
                            alert("reward successfully updated");
                            window.location.href = 'admin_rewards.php';
                        </script>

<?php



                    }
                }
            }
        }
    }
}











$qry = "SELECT * FROM tbl_rewards where id_reward = '$reward_id'";
$result = mysqli_query($conn, $qry);
while ($show = mysqli_fetch_array($result)) {
    $picture = $show['picture'];
    $reward_item = $show['reward_item'];
    $equiv_points = $show['equiv_points'];
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

    <title>IEC Campaign</title>

</head>

<body>
    <?php "sessionbody.php"; ?>
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
    <main>
        <div class="container">
            <h4 class="green-text">Update Rewards</h4>
            <div class="container">
                <div class="row">



                    <form class="col s12" method="POST" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="item_name" type="text" name="reward_item" class="validate" value="<?php echo $reward_item; ?>" required>
                                <label for="item_name">Item Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="points" type="number" name="equiv_points" class="validate" value="<?php echo $equiv_points; ?>">
                                <label for="points">Points</label>
                            </div>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Image</span>
                                <input type="file" name="picture">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <div class="center">
                            <button class="btn waves-effect waves-light" type="submit" name="savebtn">Save
                                <i class="material-icons right">save</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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