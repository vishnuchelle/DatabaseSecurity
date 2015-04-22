<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/10/2015
 * Time: 1:13 AM
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('connect.php');
if(session_id()==='')
{
    session_start();
}
$empID = $_GET['e'];
$ePass = $_GET['p'];

    try{
        $stmt = $conn->prepare('SELECT PASSWORD,AccessID FROM bankadmin WHERE EMPLOYEE_ID = :empID');
        $stmt->bindParam(':empID', $empID);
        $stmt->execute();

        if($row = $stmt->fetch())
        {
            $retrievedPassword = $row['PASSWORD'];
            $_SESSION['AccessID']= $row['AccessID'];
            $_SESSION['empID']= $empID;
            if($ePass == $retrievedPassword){
                echo "true";
            }else{
                echo "Invalid Password";
            }
        }
        else
        {
            echo "Invalid Employee ID";

        }

    }catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }


?>