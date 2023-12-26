<?php

include '../connnection/config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST['user_id'];
    $fileName = $_FILES['profile_img']['name'];
    $fileTmpName = $_FILES['profile_img']['tmp_name'];
    $fileSize = $_FILES['profile_img']['size'];
    $fileError = $_FILES['profile_img']['error'];
    $fileType = $_FILES['profile_img']['type'];

    $fileExt = explode(' ../uploaded_Profiles/', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileDestination = "../uploaded_Profiles/" . $fileName;

    $allowed = array('jpg', 'jpeg', 'png');

    $query = "UPDATE `table_register_acc` SET `user_id`='$user_id', `profile_img`='$fileName' WHERE `user_id`='$user_id'";
    move_uploaded_file($fileTmpName, $fileDestination);
    $result = $conn->query($query);

    if ($result) {
    ?>
        <script>
            alert('Your successfully upadated.');
            window.location.href = '../users-profile.php';
        </script>
    <?php

    } else {
    ?>
        <script>
            alert('Oops! Something went wrong. Please try again later.');
            window.location.href = '../users-profile.php';
        </script>
<?php
    }
}
