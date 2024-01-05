<?php
include 'connnection/config.php';
// Opening a file using fopen()  
// function in read/write mode 

// $query = "SELECT * FROM table_pdffile ORDER BY file_id DESC";
// $result = mysqli_query($conn, $query);

// if ($result->num_rows > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {

//         $file_path = "./uploaded_PDFfiles/" . $row['pdf_file'];

//         $myfile = fopen($file_path, 'r')
//             or die("File does not exist!");

//         $pointer = fgets($myfile);
//         echo $pointer;
//         fclose($myfile);
//     }
// }

$file_id = filter_input(INPUT_GET, "file_id", FILTER_VALIDATE_INT);

  if (! $file_id)
       header("HTTP/1.1 400 Bad Request");

  $result = mysqli_query($conn, "SELECT * FROM table_pdffile WHERE file_id = ".$file_id);
  // $id is of type int here, so no sql injection possible

  if (! $result)
       header("HTTP/1.0 404 Not Found");

  $file = mysqli_fetch_assoc($result);

  // fetch original file extension or store it the database
  $extension = pathinfo($file["file_id"], PATHINFO_EXTENSION);

  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $file["file_id"] . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile("./uploaded_PDFfiles/$file_id.$extension");

