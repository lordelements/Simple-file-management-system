<?php
include '../connnection/config.php';
if (isset($_GET['deluser_id'])) {
    $user_id = $_GET['deluser_id'];

    $query = "DELETE FROM `table_register_acc` WHERE user_id= $user_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        
        ?>
        <script>
            alert('Registered account was deleted successfully.');
            window.location.href='registered_users.php';
        </script>
        <?php
        
    } else {
       
        ?>
        <script>
            alert('Registered account is not deleted.');
            window.location.href='registered_users.php';
        </script>
        <?php
        
    }
}
$conn->close();
