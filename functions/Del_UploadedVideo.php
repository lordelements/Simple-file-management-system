<?php 
  include '../connnection/config.php';
  if (isset($_GET['delvideo_id'])) {
      $file_id=$_GET['delvideo_id'];

      /* DELETE FILE ON FOLDER */
      $sql = mysqli_query($conn, "SELECT * FROM `table_videos` WHERE file_id= $file_id");
      $row = mysqli_fetch_assoc($sql);
      $folder_path = "../uploaded_Videofiles/" . $row['video_file'];
    
      unlink($folder_path);
      
      $sql = "DELETE FROM `table_videos` WHERE file_id= $file_id";
      $result = mysqli_query($conn,$sql);
      if ($result) {
       
         header("Location: ../uploadedVideoFiles_lists.php");
          $_SESSION['message'] = 'Your file is successfully uploaded';

      }else{
       
       header("Location: ../uploadedVideoFiles_lists.php");
        $_SESSION['message'] = 'File is not deleted.';
        
      }
     
  }
  $conn->close();
?>