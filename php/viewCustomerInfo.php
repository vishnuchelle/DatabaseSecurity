<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/23/2015
 * Time: 12:10 AM
 */

    include('connect.php');
    session_start();
    $access = $_SESSION['AccessID'];
    $userName = $_GET['userName'];
    try{

        $stmt = $conn->prepare('SELECT * FROM customer WHERE USERNAME = :userName');
        $stmt->bindParam(':userName', $userName);
        $stmt->execute();

        if($row = $stmt->fetch())
        {
            $Customer_ID = $row['CUSTOMER_ID'];
            $fName = $row['C_FIRSTNAME'];
            $lName = $row['C_LASTNAME'];
            $mName = $row['C_MIDDLENAME'];
            $address = $row['C_ADDRESS1'];
            $city = $row['C_CITY'];
            $zip = $row['C_ZIP'];
            $state = $row['C_STATE'];
            $email = $row['C_EMAIL'];
            $phoneNumber = $row['C_PHONENUMBER'];
            $branchCode = $row['BRANCH_CODE'];
//            echo $lName . $state . "\n";
//            echo json_encode($row);
            $Customer = array("CustomerID" => $Customer_ID, "FirstName" => $fName, "LastName" => $lName,
                "MiddleName" => $mName, "Address" => $address, "PhoneNumber" => $phoneNumber, "BranchCode" => $branchCode,
                "Zip" => $zip, "State" => $state, "Email" => $email, "City" => $city);

        }else{
            echo "false";
        }

        switch ($access){
            case "1":
                //Return all the Customer Info
                //No Redaction
                echo json_encode($Customer);
                break;
            case "2":
                //Partial Redaction

                if(strlen($phoneNumber)>4){
                    $Customer['PhoneNumber'] = substr_replace($phoneNumber,"* * * - * * * - ",0,strlen($phoneNumber)-4);
                }
                if($email != ''){
                    $Customer['Email'] = "* * * * * * * *";
                }

                echo json_encode($Customer);
                break;
            case "3":
                ////Partial Redaction and Full Redaction
                if(strlen($fName)>4){
                    $Customer['FirstName'] = substr_replace($fName,"* * * * * *",0,strlen($fName)-4);
                }
                if(strlen($lName)>4){
                    $Customer['LastName'] = substr_replace($lName,"* * * * * *",0,strlen($lName)-4);
                }
                if(strlen($phoneNumber)>4){
                    $Customer['PhoneNumber'] = substr_replace($phoneNumber,"* * * - * * * - ",0,strlen($phoneNumber)-4);
                }
                if($email != ''){
                    $Customer['Email'] = "* * * * * * * *";
                }

                echo json_encode($Customer);

                break;

        }

    }catch (PDOException $e){
        echo 'ERROR:' . $e->getMessage();
    }

?>