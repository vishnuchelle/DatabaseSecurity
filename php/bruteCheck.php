<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/21/2015
 * Time: 12:11 AM
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('connect.php');

session_start();

// Get timestamp of current time
$now = time();
//echo $now;
//echo "\n";
// All login attempts are counted from the past 1 hour.
$valid_attempts = $now - (60 * 60);
//echo $valid_attempts;
$CustomerID = $_SESSION['customerID'];
//$CustomerID = "username55535d4d00ba27";
//echo $CustomerID;

    try{
        $stmt = $conn->prepare('SELECT COUNT(*) FROM failed_atempts WHERE CUSTOMER_ID = :customerID AND TIME_STAMP > :validAtempts');
        $stmt->bindParam(':customerID', $CustomerID);
        $stmt->bindParam(':validAtempts', $valid_attempts);
        $stmt->execute();

//        $del->rowCount()
        // If there have been more than 5 failed login attempts
        if ($stmt->fetchColumn() > 5) {
            echo "false";
        } else {
            echo "true";
        }

//        if($row = $stmt->fetch()) {
//            $retrievedNumber = $row['TIME_STAMP'];
//            echo $retrievedNumber;
//        }else{
//            echo "false";
//        }


    }catch (PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }



?>