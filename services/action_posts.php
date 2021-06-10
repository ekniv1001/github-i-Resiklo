<?php
include 'database_connection.php';



// get data and display
$sql = "SELECT * FROM tbl_posts";
$query = mysqli_query($conn, $sql);

// create new posts
if (isset($_REQUEST["publish"])) {
    $title = $_REQUEST["title"];
    $description = $_REQUEST["description"];
    $author = $_REQUEST["author"];
    $content = $_REQUEST["content"];

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




                $sql = "INSERT INTO tbl_posts (headerImg,title,description,author,content) VALUES ('$new_img_name','$title','$description','$author','$content')";
                mysqli_query($conn, $sql);

                header("Location: admin_campaign.php?info=published");
                exit();
            }
        }
    }
}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM tbl_posts WHERE id = $id";
    $query = mysqli_query($conn, $sql);
}

if (isset($_REQUEST['update'])) {
    $id = $_REQUEST['id'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];

    $sql = "UPDATE tbl_posts SET title = '$title', content = '$content' WHERE id = $id";
    mysqli_query($conn, $sql);

    header("Location: admin_campaign.php?info=updated");
    exit();
}

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM tbl_posts WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    header("Location: admin_campaign.php?info=deleted");
    exit();
}
