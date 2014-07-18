<?php
/*
    echo ' <from action ="index.php" method="post">
        <input type="text" name="username" />
        <input type ="text" name= "email" />
        <input type="submit" value="register!" />
             </from>';
    echo "<br ?>"
?>
*/


echo '<form action="index.php" method="post"
    enctype="multipart/form-data">
        <label for"photo">User photo:</label>
        <input type="file" name="photo"/>
        <input type="submit" value="Upload a photo " />
</form>';
echo "<br />";


if ($_server['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILE['photo']) && is_uploaded_file($_FILES['photo']['tmp_name']) &&
        $_FILES['photo']['error'] == UPLOAD_ERR_OK) {

        if ($_FILES['photo']['type'] == 'image/jpeg') {
            $tmp_img = $_FILES['photo']['tmp_name'];
            $image = imagecreatefromjpeg($tmp_img);
            header('Content-Type: image/jpeg');
            imagejpeg($image, '', 90);
            imagedestroy($image);
        }
        else {
            echo "Uploaded file was not a JPG image.";
        }

    }

    echo '<form action="test.php" method="post"
        enctype="multipart/form-data">
        <label for="photo">User Photo:</label>
        <input type="file" name="photo" />
        <input type="submit" value="Upload a Photo" />
        </form>';

    // session_start
    if(isset($_SESSION['username'])) {
        echo "Esti deja inregistart pentru  $_SESSION[username].";
    }
    else if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim($_POST['username']);
        if(!empty($username) && !empty(trim($_POST['email']))) {
            $uname = htmlentities($_POST['username']);
            $email = htmlentities($_POST['email']);
            $_SESSION[' username '] = $uname;
            echo "multumesc pentru inregistrare <br />",
                   "Username: $uname <br />",
                   "Email: $email <br ?>";
        }
        else {
            echo "Va rugam sa completati ambele campuri<br />";
        }
    }
}