<?php
include 'connnection/config.php';
// PHP program to delete all 
if (isset($_GET['delallPDF_id'])) {

	$query = "DELETE * FROM `table_pdffile` WHERE file_id= $file_id";
	$result = mysqli_query($conn, $query);


	
	
	$folder_path = "./uploaded_PDFfiles/";

	// List of name of files inside 
	// specified folder 
	$files = glob($folder_path . '/*');
	echo "<script>
	alert('All PDF file on your folder is deleted successfully.');
	window.location.href = 'uploadedPDFfiles.php';
	</script>";

	// Deleting all the files in the list 
	foreach ($files as $file) {

		if (is_file($file))

			// Delete the given file 
			unlink($file);
	}
}
