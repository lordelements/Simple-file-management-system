<?php
include '../connnection/config.php';

$PDF_file = $_GET['file'] .".pdf";   

// header("Content-Disposition: attachment; filename=" . urldecode($file));

// $fb = fopen($file, "r");

// while (!feof($fb)) {
//   echo fread($fb, 8192);
//   flush();
// }
// fclose($fb);


if (isset($_GET['DownloadPDF'])) {
    $file_id = $_GET['DownloadPDF'];

    $query = "SELECT `pdf_fileName`, `pdf_file` FROM `table_pdffile` WHERE file_id = '$file_id'";
    $result = mysqli_query($conn, $query);

    // $file = '../uploaded_PDFfiles/.pdf';
    $PDF_file = $fileName;  // YOUR File name retrive from database

    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $PDF_file .'"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
   
   
}

