<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('connect.php');

session_start();

$CustomerID = trim($_SESSION['customerID']);
$sentPassword = $_GET['p'];

    try {
        $stmt = $conn->prepare('SELECT PASSWORD FROM customer WHERE CUSTOMER_ID = :customerID LIMIT 1');
        $stmt->bindParam(':customerID', $CustomerID);
        $stmt->execute();

        if($row = $stmt->fetch())
        {
            $retrievedPassword = $row['PASSWORD'];
            if($sentPassword == $retrievedPassword)
            {
                echo "true";
            }else{
                echo "false3";
            }
        }
        else
        {
            echo "false4";
        }
    }
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


?>



