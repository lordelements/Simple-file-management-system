<?php
include 'connnection/config.php';
session_start();
session_destroy();
unset($_SESSION['email']);
unset($_SESSION['usertype']);
?>
    <script>
        alert('You logout successfully.');
        window.location.href = 'login.php';
    </script>
<?php
$conn->close();
