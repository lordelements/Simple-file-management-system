<?php
// session_start();
include '../connnection/config.php';
if (isset($_POST['submit'])) {
    $docs_filetitle = $_POST['docs_title'];

    $fileName = $_FILES['docs_file']['name'];
    $fileTmpName = $_FILES['docs_file']['tmp_name'];
    $fileSize = $_FILES['docs_file']['size'];
    $fileError = $_FILES['docs_file']['error'];
    $fileType = $_FILES['docs_file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileDestination = "../uploaded_Docs_files/" . $fileName;

    $allowed = array('docx');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {

                $sql = "INSERT INTO `table_documents`(`docs_title`, `docs_file`) VALUES('$docs_filetitle', '$fileName')";        
                move_uploaded_file($fileTmpName, $fileDestination);
                $result = $conn->query($sql);
                
                ?>
                <script>
                    alert('Your file is successfully uploaded');
                    window.location.href='./uploadedDOCSFiles_lists.php';
                </script>
                <?php

            } else {
                
                ?>
                <script>
                    alert('Your file is too big!');
                    window.location.href='./uploadedDOCSFiles_lists.php';
                </script>
                <?php
                
            }
        } else {
           
            ?>
            <script>
                alert('Theres was an error uploading on your file!');
                window.location.href='./uploadedDOCSFiles_lists.php';
            </script>
            <?php
            
        }
    } else {
        
        ?>
        <script>
            alert('You cannot upload files of this types!');
            window.location.href='./uploadedDOCSFiles_lists.php';
        </script>
        <?php
        
    }
}
$conn->close();
