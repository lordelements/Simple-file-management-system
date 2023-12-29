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
    $uname = validate_input($_POST['username']);
    $email = validate_input($_POST['email']);
    // $password = validate_input(md5($_POST['password']));
    // $cpassword = validate_input(md5($_POST['cpassword']));
    $usertype = validate_input($_POST['usertype']);

    // if ($password === $cpassword) {
    //     $sql = "SELECT * FROM table_register_acc WHERE email='$email'";
    //     $result = $conn->query($sql);

        if (!$result->num_rows > 0) {

            $query = "UPDATE `table_register_acc` SET `user_id`='$user_id', `firstname`='$fname',`middlename`='$mname',
            `lastname`='$lname', `email` ='$email', `usertype`='$usertype' WHERE `user_id`='$user_id'";
            $result = $conn->query($query);
            
            if ($result) {

                // $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
                //          Record is successfully updated.
                //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //         </div>';

                echo "<script>alert('Record is successfully updated.');</script>";        
                header('Location: ../users-profile.php');
            }
            else {
                
                // $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
                //         Record was not updated.
                //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                //         </div>';
                // header('Location: ../users-profile.php');
                
                echo "<script>alert('Record was not updated.');</script>";        
                header('Location: ../users-profile.php');
            }
           
        }
         else {

            // $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
            // Email already exist.
            // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            // </div>';
            // header('Location: ../users-profile.php');

            echo "<script>alert(' Email already exist..');</script>";        
            header('Location: ../users-profile.php');
        }
    } 
//     else {

//         $_SESSION["alert_msg"] = '<div class="alert alert-success alert-dismissible fade show col-md-12 mb-3" role="alert">
//         Confirm password does not matched.
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//         </div>';
//         header('Location: ../users-profile.php');
//     }
// }