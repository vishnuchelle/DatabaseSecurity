<?php
include('connect.php');
session_start();
//random();
//$interval = 30;
//while(srand(floor(time() / $interval))){
//   random();}
//
//
//function random() {

//$interval = 30; // Interval in seconds
//srand(floor(time() / $interval)); 
//echo "random number"." ".rand(1000, 9999);

//    $_SESSION['CUSTOMER_ID']='1000980861';

    $c_id= trim($_SESSION['customerID']);

    if($c_id != null)
    {
        try {

             $auth = rand(100000, 999999);
//             echo $auth;
             //$stmt = $conn->prepare("INSERT INTO  auth_number(CUSTOMER_ID,AUTH_NUMBER) VALUES(?,?)");
             $stmt = $conn->prepare('UPDATE auth_number set AUTH_NUMBER=:auth_num WHERE CUSTOMER_ID=:cust_id');
             $stmt->bindParam(':auth_num', $auth );
             $stmt->bindParam(':cust_id', $c_id);
//             echo $c_id;
            $stmt->execute();
            echo $auth;

        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();

        }
    }else{
        echo "Customer ID is null";
    }
//}
?>
