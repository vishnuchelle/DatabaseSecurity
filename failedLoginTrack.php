<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/20/2015
 * Time: 1:45 AM
 */

include('connect.php');
session_start();

$c_id= trim($_SESSION['customerID']);

if($c_id != null)
{
    try {
        $now = time();
        $stmt = $conn->prepare("INSERT INTO FAILED_ATEMPTS (CUSTOMER_ID, TIME_STAMP) VALUES ('$c_id', '$now')");
        $stmt->execute();

    }catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();

    }
}else{
    echo "Customer ID is null";
}

?>