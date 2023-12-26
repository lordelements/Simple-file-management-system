<?php

include '../connnection/config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validate data 
function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_GET['edituser_id'];   
    $username = validate_input($_POST['username']);
    $email = validate_input($_POST['email']);
    $password = validate_input(md5($_POST['password']));
    $cpassword = validate_input(md5($_POST['cpassword']));
    $usertype = validate_input($_POST['usertype']);

    $fileName = $_FILES['profile_img']['name'];
    $fileTmpName = $_FILES['profile_img']['tmp_name'];
    $fileSize = $_FILES['profile_img']['size'];
    $fileError = $_FILES['profile_img']['error'];
    $fileType = $_FILES['profile_img']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileDestination = "../uploaded_Profiles/" . $fileName;

    $allowed = array('jpg', 'jpeg', 'png');
 
    $query ="UPDATE `table_register_acc` set user_id = $user_id,
    username ='$username' ,email ='$email',
    password ='$password', fileName ='$fileName' ,usertype = '$usertype'
    WHERE user_id = $user_id";
    move_uploaded_file($fileTmpName, $fileDestination);
    $result = $conn->query($query);

      if ($result){
        ?>
        <script>
            alert('Your successfully upadated.');
            window.location.href = './registered_users.php';
        </script>
        <?php
       
     }
     else {
        ?>
        <script>
            alert('Oops! Something went wrong. Please try again later.');
            window.location.href = './registered_users.php';
        </script>
        <?php
     }
}

