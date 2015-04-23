<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/22/2015
 * Time: 9:49 PM
 */

include('connect.php');
session_start();

$userName = $_GET['u'];
$branchCode = $_GET['b'];
$accType = $_GET['at'];
$bal = $_GET['bal'];

$accPrefix = "ACC".$branchCode.$accType;
//echo $accPrefix;
$accNumber = uniqid($accPrefix);

try {
    $stmt = $conn->prepare('SELECT CUSTOMER_ID FROM customer WHERE USERNAME = :userName AND BRANCH_CODE = :branchCode ');
    $stmt->bindParam(':userName', $userName);
    $stmt->bindParam(':branchCode', $branchCode);
    $stmt->execute();

    if($row = $stmt->fetch())
    {
        $_SESSION['customerID'] = $row['CUSTOMER_ID'];

        $stmt1 = $conn->prepare("INSERT INTO ACCOUNT (BRANCH_CODE, ACC_NUMBER, CUSTOMER_ID, ACCTYPE_ID, ACC_BALANCE) VALUES (:branchCode, :accNumber, :customerID, :accType, :accBalance)");
        $stmt1->bindParam(':branchCode', $branchCode);
        $stmt1->bindParam(':accNumber', $accNumber);
        $stmt1->bindParam(':customerID', $_SESSION['customerID']);
        $stmt1->bindParam(':accType', $accType);
        $stmt1->bindParam(':accBalance', $bal);
        $stmt1->execute();

        echo "true";

    }
    else
    {
        echo "false";

    }

}catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

?>