<?php
// session_start();
include '../connnection/config.php';
if (isset($_POST['submit'])) {
    $pdf_fileName = $_POST['pdf_fileName'];
    $fileName = $_FILES['pdf_file']['name'];
    $fileTmpName = $_FILES['pdf_file']['tmp_name'];
    $fileSize = $_FILES['pdf_file']['size'];
    $fileError = $_FILES['pdf_file']['error'];
    $fileType = $_FILES['pdf_file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileDestination = "../uploaded_PDFfiles/" . $fileName;

    $allowed = array('pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {

                $sql = "INSERT INTO `table_pdffile`( `pdf_fileName`, `pdf_file`) VALUES('$pdf_fileName', '$fileName')";        
                move_uploaded_file($fileTmpName, $fileDestination);
                $result = $conn->query($sql);
                
                ?>
                <script>
                    alert('Your file is successfully uploaded');
                    window.location.href='./uploadedPDFfiles.php';
                </script>
                <?php

            } else {
                
                ?>
                <script>
                    alert('Your file is too big!');
                    window.location.href='./uploadedPDFfiles.php';
                </script>
                <?php
                
            }
        } else {
           
            ?>
            <script>
                alert('Theres was an error uploading on your file!');
                window.location.href='./uploadedPDFfiles.php';
            </script>
            <?php
            
        }
    } else {
        
        ?>
        <script>
            alert('You cannot upload files of this types!');
            window.location.href='./uploadedPDFfiles.php';
        </script>
        <?php
        
    }
}
$conn->close();
