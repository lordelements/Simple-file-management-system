<?php
include 'connnection/config.php';
// Opening a file using fopen()  
// function in read/write mode 

$query = "SELECT * FROM table_pdffile ORDER BY file_id DESC";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $file_path = "uploaded_PDFfiles/" . $row['pdf_file'];

        $myfile = fopen($file_path, 'r+')
            or die("File does not exist!");

        $pointer = fgets($myfile);
        echo $pointer;
        fclose($myfile);
    }
}
