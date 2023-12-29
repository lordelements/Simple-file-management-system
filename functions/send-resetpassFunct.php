<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
require './connnection/config.php';

if(isset($_POST['submit']) && $_POST['email'])
{
    include "db.php";
    
    $email = $_POST['email'];

    $result = mysqli_query($conn,"SELECT * FROM  `table_register_acc` WHERE email='" . $email . "'");

    $row= mysqli_fetch_array($result);

  if($row)
  {
    
     $token = md5($email).rand(10,9999);

     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );

    $expDate = date("Y-m-d H:i:s",$expFormat);

    $update = mysqli_query($conn,"UPDATE `table_register_acc` set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $email . "'");

    $link = "<a href='http://localhost/MULTIPLE_FILE_UPLOAD/forgot-pass.php?key=".$email."&token=".$token."'>Click To Reset password</a>";

    require_once('phpmail/PHPMailerAutoload.php');

    $mail = new PHPMailer();

    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "andrianelemento41@gmail.com";
    // GMAIL password
    $mail->Password = "Andrian1357";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='andrianelemento41@gmail.com';
    $mail->FromName='your_name';
    $mail->AddAddress('reciever_email_id', 'reciever_name');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "<script>
                Check Your Email and Click on the link sent to your email
            </script>";
            header("Location: ./login.php");
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "<script>
    Invalid Email Address. Go back
            </script>";
            header("Location: ./login.php");
  }
}
?>