<?php
include 'database_connection.php';



// get data and display
$sql = "SELECT * FROM tbl_events";
$query = mysqli_query($conn, $sql);

// create new posts
if (isset($_REQUEST["eventbtn"])) {
    $event_title = $_REQUEST["event_title"];
    $event_content = $_REQUEST["event_content"];
    $event_date = $_REQUEST["event_date"];
    $event_time = $_REQUEST["event_time"];
    $event_setting = $_REQUEST["event_setting"];


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




                $sql = "INSERT INTO tbl_events (event_img,event_title,event_content,event_date,event_time,event_setting) VALUES ('$new_img_name','$event_title','$event_content','$event_date','$event_time', '$event_setting')";
                mysqli_query($conn, $sql);

                header("Location: admin_events.php?info=published");
                exit();
            }
        }
    }
}


if (isset($_REQUEST['event_id'])) {
    $event_id = $_REQUEST['event_id'];

    $sql = "SELECT * FROM tbl_events WHERE event_id = $event_id";
    $query = mysqli_query($conn, $sql);
}




if (isset($_REQUEST['update'])) {
    $event_id = $_REQUEST['event_id'];
    $event_title = $_REQUEST['event_title'];
    $event_content = $_REQUEST['event_content'];
    $event_date = $_REQUEST['event_date'];
    $event_time = $_REQUEST['event_time'];
    $event_setting = $_REQUEST['event_setting'];
    

    $sql = "UPDATE tbl_events SET event_title = '$event_title', event_content = '$event_content', event_date = '$event_date', event_time = '$event_time', event_setting = '$event_setting' WHERE event_id = $event_id";
    mysqli_query($conn, $sql);

    header("Location: admin_events.php?info=updated");
    exit();
}

if (isset($_REQUEST['delete'])) {
    $event_id = $_REQUEST['event_id'];

    $sql = "DELETE FROM tbl_events WHERE event_id = $event_id";
    $query = mysqli_query($conn, $sql);

    header("Location: admin_events.php?info=deleted");
    exit();
}
