<?php 
// PHP program to delete all 
// file from a folder 

// Folder path to be flushed 
$folder_path = "./uploaded_PDFfiles/";

// List of name of files inside 
// specified folder 
$files = glob($folder_path.'/*'); 
echo "<script>
alert('All PDF file on your folder is deleted successfully.');
window.location.href = 'uploadedPDFfiles.php';
</script>";

// Deleting all the files in the list 
foreach($files as $file) { 

	if(is_file($file)) 
	
		// Delete the given file 
		unlink($file); 
} 
?> 
