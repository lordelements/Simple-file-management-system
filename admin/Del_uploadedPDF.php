<?php
include '../connnection/config.php';
if (isset($_GET['delfile_id'])) {
    $file_id = $_GET['delfile_id'];

    $query = "DELETE FROM `table_pdffile` WHERE file_id= $file_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        
        ?>
        <script>
            alert('Uploaded file was deleted successfully.');
            window.location.href='uploadedPDFfiles.php';
        </script>
        <?php
        
    } else {
       
        ?>
        <script>
            alert('File is not deleted.');
            window.location.href='uploadedPDFfiles.php';
        </script>
        <?php
        
    }
}
$conn->close();
