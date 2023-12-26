<?php 

include '../connnection/config.php';

// Validate data 
function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fb_url = validate_input($_POST['facebook_url']);
    $twit_url = validate_input($_POST['twitter_url']);
    $insta_url = validate_input($_POST['intstagram_url']);
    $linkin_url = validate_input($_POST['linkedin_url']);

    $query = "INSERT INTO `table_register_acc` (`facebook_url`, `twitter_url`, `intstagram_url`, `linkedin_url`) 
    VALUES('$fb_url', '$twit_url', '$insta_url', '$linkin_url')";
    $result = $conn->query($query);


} 