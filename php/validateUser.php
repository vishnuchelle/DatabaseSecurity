
<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include('connect.php');
    if(session_id()==='')
    {
        session_start();
    }
    $userName = $_GET['userName'];
        try {
            $stmt = $conn->prepare('SELECT CUSTOMER_ID FROM customer WHERE USERNAME = :userName');
            $stmt->bindParam(':userName', $userName);
            $stmt->execute();

            if($row = $stmt->fetch())
            {
                 $_SESSION['customerID']= $row['CUSTOMER_ID'];
                 echo "true";
//                 header( 'Location: http://localhost/testbank/secureLogin.html') ;
                 /*echo "logged in succesfully";
                 echo "<a href='home.html'>";
                 echo "click here to go to home page";
                 echo "</a>";*/
            }
           else
            {
//                header( 'Location: http://localhost/testbank/login.html' ) ;
                echo "false";
//                echo "<a href='login.html'>";
//                echo "click here to go to login page";
//                echo "</a>";
            }

        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

//$stmt_close();
//$conn_close();

?>



