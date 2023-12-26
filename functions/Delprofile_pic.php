<?php 
   include './connnection/config.php';
  if (isset($_GET['delprofile_pic'])) {
      $user_id=$_GET['delprofile_pic'];
      
      $username = $_SESSION["username"];
      $sql = "DELETE profile_img FROM `table_register_acc` WHERE `user_id`= $user_id";
      $result = mysqli_query($conn,$sql);
      if ($result) {
          
          header("Location: ../users-profile.php");
          echo "<script>alert('Your profile picture was deleted successfully.')</script>";
      }else{
       
        header("Location: ../users-profile.php");
        echo "<script>alert('Your profile picture was not deleted.')</script>";
      }
     
  }
  $conn->close();
?>