<?php
// include '../connnection/config.php';

$file = $_GET["pdf_file"]  . ".pdf";

header("Content-disposition: attachment; filename=" . urlencode($file));

$fb = fopen($file, "r");

while (!feof($fb)) {
    echo fread($fb, 8192);
    flush(); // This is essential for large downloads 
}

fclose($fb);
