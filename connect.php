<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bank";

try {
    $conn = new PDO('mysql:host=localhost;dbname=bank', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    } 
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
