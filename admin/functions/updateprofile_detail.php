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
    $email = validate_input($_POST['email']);
    $usertype = validate_input($_POST['usertype']);


        $sql = "SELECT * FROM table_register_acc WHERE email='$email'";
        $result = $conn->query($sql);
   
        if (!$result->num_rows > 0) {

            $query = "UPDATE `table_register_acc` SET `user_id`='$user_id', `firstname`='$fname',`middlename`='$mname',
            `lastname`='$lname', `email` ='$email', `usertype`='$usertype' WHERE `user_id`='$user_id'";
            $result = $conn->query($query);
            
            if ($result) {

                echo "<script>
                        alert('Record is successfully updated.');
                        window.location.href='./users-profile.php';
                    </script>";   

            }
            else {

                echo "<script>
                        alert('Record was not updated.');
                        window.location.href='./users-profile.php';
                    </script>";

            }
           
        }
         else {

            echo "<script>
                        alert('Email already exist.');
                        window.location.href='./users-profile.php';
                 </script>";

        }
    } 
