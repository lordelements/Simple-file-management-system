<?php

include 'connnection/config.php';

// Validate data 
function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = validate_input($_POST['username']);
    $password = validate_input(md5($_POST['password']));

    $query = "SELECT * FROM table_register_acc WHERE username='$username' AND password='$password' LIMIT 1";
    $user = $conn->query($query);

    if (mysqli_num_rows($user) == 1) {

        $rows  = mysqli_fetch_assoc($user);
        $_SESSION['username'] = $rows['username'];
        $_SESSION['password'] = $rows['password'];

        if ($rows['usertype'] == 'admin') {
            $_SESSION['user'] = $rows;
            ?>
                <script>
                    alert('Welcome to Admin Dashboard');
                    window.location.href = 'admin/index.php';
                </script>
            <?php
        }
        if ($rows['usertype'] == 'user') {
            $_SESSION['user'] = $rows;
        ?>
            <script>
                alert('Welcome to user dashboard');
                window.location.href = 'index.php';
            </script>
        <?php
        }
    } else {
       
        ?>
        <script>
            alert('Username or Password is Wrong!');
            window.location.href = 'login.php';
        </script>
        <?php
    }
}
$conn->close();