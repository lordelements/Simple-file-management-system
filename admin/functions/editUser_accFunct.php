<?php

include '../connnection/config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validate data 
// function validate_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }


// $user_id = $_GET['updateuser_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $usertype = $_POST['usertype'];

    $fileName = $_FILES['profile_img']['name'];
    $fileTmpName = $_FILES['profile_img']['tmp_name'];
    $fileSize = $_FILES['profile_img']['size'];
    $fileError = $_FILES['profile_img']['error'];
    $fileType = $_FILES['profile_img']['type'];

    $fileExt = explode(' ../uploaded_Profiles/', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileDestination = "../uploaded_Profiles/" . $fileName;
    // $fileDestination = "../uploaded_Profiles/" . $email ." ". $fileName;

    $allowed = array('jpg', 'jpeg', 'png');

    $query = "UPDATE `table_register_acc` SET `user_id`='$user_id', `username` ='$username', 
    `email` ='$email', `password` ='$password', `profile_img` ='$fileName' , `usertype` = '$usertype' WHERE `user_id`='$user_id'";
    move_uploaded_file($fileTmpName, $fileDestination);
    $result = $conn->query($query);

    if ($result) {
?>
        <script>
            alert('Your successfully upadated.');
            window.location.href = './registered_users.php';
        </script>
    <?php

    } else {
    ?>
        <script>
            alert('Oops! Something went wrong. Please try again later.');
            window.location.href = './registered_users.php';
        </script>
<?php
    }
}
