<html>
<head>
<title>Login Page</title>
</head>
<body>

<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

       $servername = "localhost";
       $username = "root";
       $password = "root";
       $dbname = "bank";
try {
    $conn = new PDO('mysql:host=localhost;dbname=bank', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
     
    $stmt = $conn->prepare('SELECT USERNAME FROM customer WHERE USERNAME = :username AND PASSWORD =:password');
    $stmt->bindParam(':username', $_POST['suname']);
    $stmt->bindParam(':password', $_POST['spassword']);
    $stmt->execute();
   
    if($row = $stmt->fetch()) 
    {
         echo "logged in succesfully";
         echo "<a href='../scratch/home.html'>";
         echo "click here to go to home page";
         echo "</a>";
    }
   else
    {
        echo "invalid username try again";
        echo "<a href='../login.html'>";
        echo "click here to go to login page";
        echo "</a>";
     } 

} 
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>

</body>
</html>


