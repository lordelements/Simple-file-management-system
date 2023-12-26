<?php

include '../connnection/config.php';

if (isset($_GET['openPDFfile_id'])) {
    $file_id = $_GET['openPDFfile_id'];

    $query = "SELECT `pdf_fileName`, `pdf_file` FROM `table_pdffile` WHERE file_id = '$file_id'";
    $result = mysqli_query($conn, $query);

    $file = '../uploaded_PDFfiles/.pdf';
    $PDF_file = "../uploaded_PDFfiles/" . $fileName; // YOUR File name retrive from database

    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $PDF_file . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    @readfile($file);
   
   
}
