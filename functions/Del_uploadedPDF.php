<?php
include '../connnection/config.php';
if (isset($_GET['delfile_id'])) {
    $file_id = $_GET['delfile_id'];

    $query = "DELETE FROM `table_pdffile` WHERE file_id= $file_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: ../uploadedPDFfiles.php");
        echo "<script>alert('Uploaded PDF file was deleted successfully.')</script>";
     
    } else {
        header("Location: ../uploadedPDFfiles.php");
        echo "<script>alert('File is not deleted.')</script>";
        
    }
}
$conn->close();
