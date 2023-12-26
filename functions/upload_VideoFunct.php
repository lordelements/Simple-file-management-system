<?php

include '../connnection/config.php';
if (isset($_POST['submit'])) {
    $video_title = $_POST['video_title'];

    $fileName = $_FILES['video_file']['name'];
    $fileTmpName = $_FILES['video_file']['tmp_name'];
    $fileSize = $_FILES['video_file']['size'];
    $fileError = $_FILES['video_file']['error'];
    $fileType = $_FILES['video_file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileDestination = "../uploaded_Videofiles/" . $fileName;

    $allowed = array('mp4', 'avi', '3gp', 'mov', 'mpeg');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5242880) {

                $sql = "INSERT INTO `table_videos`(`video_file`, `video_title`) VALUES('$fileName', '$video_title')";
                move_uploaded_file($fileTmpName, $fileDestination);
                $result = $conn->query($sql);

                echo "<script>
                alert('Your video is successfully uploaded');
                window.location.href=' ../uploadedVideoFiles_lists.php';
                </script>";

            } else {
                
                echo "<script>
                alert('Your file is too big!');
                window.location.href=' ../uploadedVideoFiles_lists.php';
                </script>";

            }
        } else {
            
            echo "<script>
            alert('Theres was an error uploading on your file!');
            window.location.href=' ../uploadedVideoFiles_lists.php';
            </script>";

        }
    } else {
        
        echo "<script>
        alert('Sorry, only mp4, avi, 3gp, mov, mpeg are allowed!');
        window.location.href=' ../uploadedVideoFiles_lists.php';
        </script>";

    }
}
$conn->close();
