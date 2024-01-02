<?php

include 'connnection/config.php';

// use phpmailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// //Load Composer's autoloader
// require 'vendor/autoload.php';

// Validate data 
function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// function sendemail_verify($username, $email, $verify_token)
// {
//     //Create an instance; passing `true` enables exceptions
//     $mail = new PHPMailer(true);

//     //Server settings
//     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->Username   = 'andrianelemento41@gmail.com';                //SMTP username
//     $mail->Password   = 'Andrian1357';                               //SMTP password

//     $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
//     $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('elementoandrian11@gmail.com',$username);
//     $mail->addAddress($email);     //Add a recipient

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Email verification from Andrian';
   
//     $email_template = "
//         <h2>You have registered with d-drive</h2>
//         <h5>Verify your email address to login with the below given link</h5>
//         <br/><br/>
//         <a href='http://localhost/MULTIPLE_FILE_UPLOAD/verify-email.php?token=$verify_token'>Click me</a>";

//     $mail->Body    = $email_template;
//     $mail->send();
//      echo "<script>
//         alert('Message has been sent to', .$email);
//         window.location.href = 'login.php';
//         </script>";
// }


if (isset($_POST['submit'])) {

    $fname = validate_input($_POST['firstname']);
    $mname = validate_input($_POST['middlename']);
    $lname = validate_input($_POST['lastname']);
    $username = validate_input($_POST['username']);
    $email = validate_input($_POST['email']);
    $password = validate_input(md5($_POST['password']));
    $cpassword = validate_input(md5($_POST['cpassword']));
    $usertype = validate_input($_POST['usertype']);
    $verify_token = md5(rand());

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

                        $sql = "INSERT INTO `table_register_acc`(`firstname`, `middlename`, `lastname`, `username`, `email`, `password`, `profile_img`, `usertype`, `verify_token`) 
                        VALUES('$fname', '$mname', '$lname', '$username', '$email', '$password', '$fileName', '$usertype', '$verify_token')";
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $result = $conn->query($sql);
                        $username = "";
                        $email = "";
                        $_POST['password'] = "";
                        $_POST['cpassword'] = "";

                        if ($result) {
                            // sendemail_verify('$username', '$email', '$verify_token');
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