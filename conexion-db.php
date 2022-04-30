<?php
    $user = "username";
    $pass = "password";
    $host = "host";
    $dbdb = "database";
    
$conn = new mysqli($host, $user, $pass, $dbdb);
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
