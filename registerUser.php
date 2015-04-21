<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/20/2015
 * Time: 7:38 PM
 */
include('connect.php');
session_start();

$user = $_GET['user'];

$userDetails = json_decode($user, true);

// Returns: array()
//var_dump($userDetails);

$customerID = uniqid($userDetails['userName']);

try {
    $stmt = $conn->prepare("INSERT INTO CUSTOMER (CUSTOMER_ID, USERNAME, PASSWORD, TRAN_PASSWORD, C_FIRSTNAME, C_LASTNAME, C_MIDDLENAME, C_ADDRESS1, C_ADDRESS2, C_CITY, C_ZIP, C_STATE, C_EMAIL, C_PHONENUMBER, BRANCH_CODE) VALUES (:customerID, :userName, :password, :transPassword, :firstName, :middleName, :lastName, :address1, :address2, :city, :zip, :state, :email, :phoneNumber, :branchNumber)");
//    $stmt->bindParam(':customerID', $userDetails['']);
//    $temp = "1010105004";
    $stmt->bindParam(':customerID', $customerID);
    $stmt->bindParam(':userName', $userDetails['userName']);
    $stmt->bindParam(':password', $userDetails['password']);
    $stmt->bindParam(':transPassword', $userDetails['transPassword']);
    $stmt->bindParam(':firstName', $userDetails['firstName']);
    $stmt->bindParam(':middleName', $userDetails['middleName']);
    $stmt->bindParam(':lastName', $userDetails['lastName']);
    $stmt->bindParam(':address1', $userDetails['address1']);
    $stmt->bindParam(':address2', $userDetails['address2']);
    $stmt->bindParam(':city', $userDetails['city']);
    $stmt->bindParam(':zip', $userDetails['zip']);
    $stmt->bindParam(':state', $userDetails['state']);
    $stmt->bindParam(':email', $userDetails['email']);
    $stmt->bindParam(':phoneNumber', $userDetails['phoneNumber']);
    $stmt->bindParam(':branchNumber', $userDetails['branchCode']);
    $stmt->execute();

    echo "true";

}catch (PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
}

?>