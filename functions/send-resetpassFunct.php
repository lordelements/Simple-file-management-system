<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
require '../connnection/config.php';

if (isset($_POST['submit']) && $_POST['email']) {

  $email = $_POST['email'];

  $result = mysqli_query($conn, "SELECT * FROM  `table_register_acc` WHERE email='" . $email . "'");

  $row = mysqli_fetch_array($result);

  if ($row) {

    $token = md5($email) . rand(10, 9999);

    $expFormat = mktime(
      date("H"),
      date("i"),
      date("s"),
      date("m"),
      date("d") + 1,
      date("Y")
    );

    $expDate = date("Y-m-d H:i:s", $expFormat);

    $update = mysqli_query($conn, "UPDATE `table_register_acc` set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $email . "'");

    $link = "<a href='http://localhost/MULTIPLE_FILE_UPLOAD/forgot-pass.php?key=" . $email . "&token=" . $token . "'>Click To Reset password</a>";

    require_once('../PHPMailer/PHPMailerAutoload.php');

    $mail = new PHPMailer();

    // enable SMTP authentication
    $mail->CharSet    =  "utf-8";   
    $mail->isSMTP();
    $mail->Host       = 'localhost';
    $mail->SMTPAuth   = true;   
    $mail->Port       = 465; // set the SMTP port for the GMAIL server
    $mail->SMTPSecure = "ssl";
     // $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
   
    // GMAIL username && password
    $mail->Username = 'andrianelemento41@gmail.com';
    $mail->Password = 'password';
    $mail->FromName = 'Andrian';
    // $mail->setFrom('andrianelemento08@gmail.com', 'Mailer');
    $mail->AddAddress($_POST["email"]);

    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password ' . $link . '';
    
    if (!$mail->Send()) {

      ?>
      <script>
        alert("<?php echo "Message could not be sent. Mailer Error: - >" . $mail->ErrorInfo ?>");
      </script>
      <?php
   
    } else {

      ?>
          <script>
            alert("<?php echo "Check Your Email and Click on the link sent to your " . $email ?>");
            // window.location.replace('../forgot-pass.php');
          </script>
    <?php

    }
  } else {
    echo "<script>
    Invalid Email Address. Go back
            </script>";
    header("Location: ../login.php");
  }
  
}
