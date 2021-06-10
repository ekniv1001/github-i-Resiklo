<?php
include 'database_connection.php';



// get data and display
$sql = "SELECT * FROM tbl_achievments";
$query = mysqli_query($conn, $sql);

// create new posts
if (isset($_REQUEST["achievbtn"])) {
    $achieve_title = $_REQUEST["achieve_title"];
    //$description = $_REQUEST["description"];
    //$author = $_REQUEST["author"];
    $achieve_content = $_REQUEST["achieve_content"];

    //product image POST
    $img_name = $_FILES['fileToUpload']['name'];
    $img_size = $_FILES['fileToUpload']['size'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $error =    $_FILES['fileToUpload']['error'];
    //end of product image POSt


    if ($error === 0) {
        if ($img_size > 12500000) {
?>
            <script>
                alert("Sorry Your File is Too Big");
            </script>

<?php
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);




                $sql = "INSERT INTO tbl_achievments (headerimg,achieve_title,achieve_content) VALUES ('$new_img_name','$achieve_title','$achieve_content')";
                mysqli_query($conn, $sql);

                header("Location: admin_achievements.php?info=published");
                exit();
            }
        }
    }
}


if (isset($_REQUEST['achieve_id'])) {
    $achieve_id = $_REQUEST['achieve_id'];

    $sql = "SELECT * FROM tbl_achievments WHERE achieve_id = $achieve_id";
    $query = mysqli_query($conn, $sql);
}




if (isset($_REQUEST['update'])) {
    $achieve_id = $_REQUEST['achieve_id'];
    $achieve_title = $_REQUEST['achieve_title'];
    $achieve_content = $_REQUEST['achieve_content'];

    $sql = "UPDATE tbl_achievments SET achieve_title = '$achieve_title', achieve_content = '$achieve_content' WHERE achieve_id = $achieve_id";
    mysqli_query($conn, $sql);

    header("Location: admin_achievements.php?info=updated");
    exit();
}

if (isset($_REQUEST['delete'])) {
    $achieve_id = $_REQUEST['achieve_id'];

    $sql = "DELETE FROM tbl_achievments WHERE achieve_id = $achieve_id";
    $query = mysqli_query($conn, $sql);

    header("Location: admin_achievements.php?info=deleted");
    exit();
}
