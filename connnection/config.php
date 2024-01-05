<?php
     $server = "localhost";
     $username = "root";
     $password = "24681357";
     $db_name = "E_drive";

     $conn = mysqli_connect($server, $username, $password, $db_name);

     if (!$conn) {
         die("<script>alert('Connection Failed.')</script>");
     }
     
