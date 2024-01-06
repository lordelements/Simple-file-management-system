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
    $newpass = validate_input(md5($_POST['password']));
    $cpassword = validate_input(md5($_POST['cpassword']));

    if ($newpass === $cpassword) {
        
        $sql = "SELECT * FROM table_register_acc WHERE password='$newpass'";
        $result = $conn->query($sql);

        if (!$result->num_rows > 0) {

            $sql = "UPDATE `table_register_acc` SET `user_id`='$user_id', `password`='$newpass'
             WHERE `user_id`='$user_id'";
            $result = $conn->query($sql);
            
            if ($result) {

                echo "<script>
                        alert('Your password has successfully updated.');
                        window.location.href='../users-profile.php';
                        </script>";
               
            }
            else {

                echo "<script>
                alert('Record was not updated.');
                window.location.href='../users-profile.php';
                </script>";
              
            }
           
        }
         else {

            echo "<script>
            alert('This password ". $newpass ." already exist.');
            window.location.href='../users-profile.php';
            </script>";
           
        }
    } 
    else {

        echo "<script>
        alert('Confirm password does not matched.');
        window.location.href='../users-profile.php';
        </script>";
    }
}