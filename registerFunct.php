<?php

include 'connnection/config.php';

// Validate data 
function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {

    $fname = validate_input($_POST['firstname']);
    $mname = validate_input($_POST['middlename']);
    $lname = validate_input($_POST['lastname']);
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
    $fileDestination = "./uploaded_Profiles/" . $fileName;

    $allowed = array('jpg', 'jpeg', 'png');

    if ($password === $cpassword) {
        $sql = "SELECT * FROM table_register_acc WHERE email='$email'";
        $result = $conn->query($sql);

        if (!$result->num_rows > 0) {

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 5000000) {

                        $sql = "INSERT INTO `table_register_acc`(`firstname`, `middlename`, `lastname`, `username`, `email`, `password`, `profile_img`, `usertype`) 
                        VALUES('$fname', '$mname', '$lname', '$username', '$email', '$password', '$fileName', '$usertype')";
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $result = $conn->query($sql);
                        $username = "";
                        $email = "";
                        $_POST['password'] = "";
                        $_POST['cpassword'] = "";

                        if ($result) {
                        ?>
                            <script>
                                alert('Your successfully registered.');
                                window.location.href = 'register.php';
                            </script>
                        <?php
                        } else {

                        ?>
                            <script>
                                alert('Your not registered!');
                                window.location.href = 'register.php';
                            </script>
                        <?php

                        }
                    } else {

                        ?>
                        <script>
                            alert('Your file is too big!');
                            window.location.href = 'register.php';
                        </script>
                    <?php

                    }
                } else {

                    ?>
                    <script>
                        alert('Theres was an error uploading on your file!');
                        window.location.href = 'register.php';
                    </script>
                <?php

                }
            } else {

                ?>
                <script>
                    alert('Sorry, only JPG, JPEG, PNG are allowed!');
                    window.location.href = 'register.php';
                </script>
            <?php

            }
        } else {

            ?>
            <script>
                alert('Email already exist.');
                window.location.href = 'register.php';
            </script>
        <?php

        }
    } else {

        ?>
        <script>
            alert('Confirm password does not matched.');
            window.location.href = 'register.php';
        </script>
<?php

    }
}
$conn->close();
?>