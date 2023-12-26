<?php
include '../connnection/config.php';
if (isset($_GET['deldocsfile'])) {
    $docsfile_id = $_GET['deldocsfile'];

    $query = "DELETE FROM `table_documents` WHERE docsfile_id= $docsfile_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        
        ?>
        <script>
            alert('Uploaded documents was deleted successfully.');
            window.location.href='uploadedDOCSFiles_lists.php';
        </script>
        <?php
        
    } else {
       
        ?>
        <script>
            alert('Documents is not deleted.');
            window.location.href='uploadedDOCSFiles_lists.php';
        </script>
        <?php
        
    }
}
$conn->close();
