<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/20/2015
 * Time: 1:03 AM
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('connect.php');

session_start();

$CustomerID = trim($_SESSION['customerID']);
$secNumber = $_GET['sN'];

try{

    $stmt = $conn->prepare('SELECT AUTH_NUMBER FROM auth_number WHERE CUSTOMER_ID = :customerID LIMIT 1');
    $stmt->bindParam(':customerID', $CustomerID);
    $stmt->execute();

    if($row = $stmt->fetch()) {
        $retrievedNumber = $row['AUTH_NUMBER'];
        if ($secNumber == $retrievedNumber) {
            echo "true";
        } else {
            echo "false";
        }
    }else{
        echo "false";
    }

}catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>