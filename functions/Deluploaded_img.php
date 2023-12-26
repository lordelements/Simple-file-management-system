<?php 
   include '../connnection/config.php';
  if (isset($_GET['deleteid'])) {
      $id=$_GET['deleteid'];

      $sql = "DELETE FROM `upload_files` WHERE id= $id";
      $result = mysqli_query($conn,$sql);
      if ($result) {
          header("Location: ../uploadedImagesFiles_lists.php");
          echo "<script>alert('Deleted successfully.')</script>";
      }else{
       
        header("Location: ../uploadedImagesFiles_lists.php");
        echo "<script>alert('File is not deleted.')</script>";
      }
     
  }
  $conn->close();
?>