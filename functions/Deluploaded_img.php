<?php 
   include '../connnection/config.php';
  if (isset($_GET['deleteid'])) {
      $id=$_GET['deleteid'];

      /* DELETE FILE ON FOLDER */
      $sql = mysqli_query($conn, "SELECT * FROM `upload_files` WHERE id= $id");
      $row = mysqli_fetch_assoc($sql);
      $folder_path = "../uploaded_Imagesfiles/" . $row['files'];
    
      unlink($folder_path);
  
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