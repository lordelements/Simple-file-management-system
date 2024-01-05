<?php

include '../connnection/config.php';

if (isset($_POST['submit'])) {
    $titleFile = $_POST['title_file'];
    $file = $_FILES['files'];

    $fileName = $_FILES['files']['name'];
    $fileTmpName = $_FILES['files']['tmp_name'];
    $fileSize = $_FILES['files']['size'];
    $fileError = $_FILES['files']['error'];
    $fileType = $_FILES['files']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileDestination = "../uploaded_Imagesfiles/" . $fileName;

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {

                $sql = "INSERT INTO `upload_files`(`files`, `title_file`) VALUES('$fileName', '$titleFile')";
                move_uploaded_file($fileTmpName, $fileDestination);
                $result = $conn->query($sql);

                // echo "<script>
                // alert('Your file is successfully uploaded');
                //  window.location.href='../uploadedImagesFiles_lists.php';
                // </script>";

                $_SESSION['status'] = "Good job";
                $_SESSION['status_text'] = "Your file is successfully uploaded.";
                $_SESSION['status_code'] = "success";
                header('Location: ../uploadedImagesFiles_lists.php');


            } else {
                // echo "<script>
                // alert('Your file is too big!');
                //  window.location.href='../uploadedImagesFiles_lists.php';
                // </script>";
                
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = "Hoops! Your file is too big!";
                $_SESSION['status_code'] = "error";
                header('Location: ../uploadedImagesFiles_lists.php');
                
            }
        } else {
            // echo "<script>
            //     alert('Theres was an error uploading on your file!');
            //      window.location.href='../uploadedImagesFiles_lists.php';
            //     </script>";
                
                $_SESSION['status'] = "Error";
                $_SESSION['status_text'] = "Theres was an error uploading on your file!";
                $_SESSION['status_code'] = "error";
                header('Location: ../uploadedImagesFiles_lists.php');
                
        }
    } else {
        // echo "<script>
        // alert('Sorry, only JPG, JPEG, PNG are allowed!');
        //  window.location.href='../uploadedImagesFiles_lists.php';
        // </script>";
        
        $_SESSION['status'] = "Warning";
        $_SESSION['status_text'] = "Sorry, only JPG, JPEG, PNG are allowed!.";
        $_SESSION['status_code'] = "warning";
        header('Location: ../uploadedImagesFiles_lists.php');
        
    }
}
$conn->close();
