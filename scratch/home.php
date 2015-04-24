<html>
<head>
<title>Home Page</title>
</head>
<body>

<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('connect.php');
session_start();
?>


<?php 
function logout()
{ unset($_SESSION['login_user']);
  session_destroy();
//echo 'destroy';
  header("Location: http://localhost/testbank/login.html");
  
}
?>


<section class="loginContainer">

<?php if(isset($_SESSION['login_user'])){ ?>
<b><center><H1>WELCOME TO OUR BANK</CENTER></b></h1>
<div style="float:right">			
<form action="logout.php" method="POST">
	<input type="submit" class="logoutButton" value="LOG OUT" />
</form>
</div>	
<h5>
	welcome
	<?php    
        $str = strtoupper($_SESSION['login_user']);
	echo $str;  
	?>
</h5>

<?php
try {       
    $stmt = $conn->prepare('SELECT * FROM account WHERE CUSTOMER_ID = (SELECT CUSTOMER_ID FROM customer WHERE USERNAME = :username)');
    $stmt->bindParam(':username', $_SESSION['login_user']);
    $stmt->execute();
    echo 'Accounts Associated';
    echo "<br>";

    echo '<table cellspacing="10">';
    echo "<tr>";
    echo "<td>Account Type</td>";
    echo "<td>Account Number</td>";
    echo "<td>Balance</td>";
    echo "</tr>";
    $acc_num = array();
    $i=0;
    
    while($row = $stmt->fetch()) 
    {    
     echo "<tr>";
     
     echo "<td>";
     echo $row['ACCTYPE_ID'];
     echo "</td>";
     echo "<td>";
     $acc_num[]= $row['ACC_NUMBER']; 
     
     echo $row['ACC_NUMBER'];
     echo "</td>";
     echo "<td>";
     echo $row['ACC_BALANCE'];
     echo "</td>";
     echo "</tr>";
    }
    echo "</table>"; 
    echo " Transactions ";
    echo '<br>';
    foreach ($acc_num as $key => $value) 
    {   
       echo "Account Number ". $value."  ";
       transaction($value);
    } 
   /* echo "<table cellspacing='10'>";
    echo "<tr>";
    echo "<td>Mini Statement</td>";
    echo "<td>"*/
 /*   echo "Mini Statement   ";
    echo '<select name="transaction">';
    foreach ($acc_num as $key => $value) 
    {   echo "<option>";
        echo $value;
        echo "</option>";
    } 
    echo "</select>";*/
    /*echo "</td>";

    echo "<td>";*/
/*    echo "   ";
    echo '<input type="submit" value="View" onclick="trans.php">';*/
    /*echo "</td>";
    echo "</tr>";
    echo "</table>";*/ 
    
    /*{
     echo '<p>';
     echo 'No Accounts to Display';
     echo '</p>';
    }*/

}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
} 
}
?>


<?php
function transaction($acc_num)
{      
    
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bank";

try {
    $con = new PDO('mysql:host=localhost;dbname=bank', $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $stm = $con->prepare('SELECT * FROM transaction_history WHERE ACC_NO =:accnum');
    $stm->bindParam(':accnum', $acc_num);
    $stm->execute();
    
    if($r = $stm->fetch())
   {
    while($r = $stm->fetch()) 
    {     

     echo $r['TRANSACTION_ID']." ".$r['TRANS_DATE ']."  ".$r['TRANS_DESC '];
     echo "<br>";
    }
   }
 else{
     echo '<p>';
     echo 'No Transactions to Display';
     echo '</p>';
    }
 
} 
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
    

}
exit();
?>
</section>
</body>
</html>


