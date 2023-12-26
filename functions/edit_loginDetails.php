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
    $user_id = $_POST['user_id'];
    $fname = validate_input($_POST['firstname']);
    $mname = validate_input($_POST['middlename']);
    $lname = validate_input($_POST['lastname']);
    $username = validate_input($_POST['username']);
    $email = validate_input($_POST['email']);
    $password = validate_input(md5($_POST['password']));
    $cpassword = validate_input(md5($_POST['cpassword']));
    $usertype = validate_input($_POST['usertype']);

    // $fileName = validate_input($_POST['profile_img']);
    // $fileName = $_FILES['profile_img']['name'];
    // $fileTmpName = $_FILES['profile_img']['tmp_name'];
    // $fileSize = $_FILES['profile_img']['size'];
    // $fileError = $_FILES['profile_img']['error'];
    // $fileType = $_FILES['profile_img']['type'];

    // $fileExt = explode(' ../uploaded_Profiles/', $fileName);
    // $fileActualExt = strtolower(end($fileExt));
    // $fileDestination = "../uploaded_Profiles/" . $fileName;

    // $allowed = array('jpg', 'jpeg', 'png');


    if ($password === $cpassword) {
        $sql = "SELECT * FROM table_register_acc WHERE email='$email'";
        $result = $conn->query($sql);

        if (!$result->num_rows > 0) {

            $query = "UPDATE `table_register_acc` SET `user_id`='$user_id',
            `firstname`='$fname',`middlename`='$mname',
            `lastname`='$lname',`username`='$username',
            `email` ='$email',`password` ='$password', `usertype`='$usertype' WHERE `user_id`='$user_id'";
            $result = $conn->query($query);

            var_dump($result);

            // if (in_array($fileActualExt, $allowed)) {
            //     if ($fileError === 0) {
            //         if ($fileSize < 5000000) {

            //             $query = "UPDATE `table_register_acc` SET `user_id`='$user_id',
            //             `firstname`='$fname',`middlename`='$mname',
            //             `lastname`='$lname',`username`='$username',
            //             `email` ='$email',`password` ='$password', `usertype`='$usertype' WHERE `user_id`='$user_id'";
            //             move_uploaded_file($fileTmpName, $fileDestination);
            //             $result = $conn->query($query);

            //             var_dump($result);

            //             if ($result) {

            //                 $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
            //                         Your file is successfully updated.
            //                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //                         </div>';
            //                 header('Location: ../users-profile.php');
            //             }
            //         } 
            //         else {

            //             $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
            //             Your file is too big!
            //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //             </div>';
            //             header('Location: ../users-profile.php');
            //         }
            //     }
            //      else {

            //         $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
            //         Theres was an error uploading on your file!
            //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //         </div>';
            //         header('Location: ../users-profile.php');
            //     }
            // }
            //  else {

            //     $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
            //     Sorry, only JPG, JPEG, PNG are allowed!
            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //     </div>';
            //     header('Location: ../users-profile.php');
            // }
        }
         else {

            $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
            Email already exist.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header('Location: ../users-profile.php');
        }
    } 
    else {

        $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
        Confirm password does not matched.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header('Location: ../users-profile.php');
    }
}
