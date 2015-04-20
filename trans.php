<html>
<head>
<title>Home Page</title>
</head>
<body>

<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('connect.php');
include('home.php');
session_start();

?>
<section class="Statement">

<?php if(isset($_SESSION['login_user'])){ 

transaction(echo '<script type="text/javascript">ViewTransaction();</script>';);
?>


<script>
function ViewTransaction()
{    
    var e = document.getElementByName("transaction");
    var ac_no = e.options[e.selectedIndex].value;
    return ac_no;
}
</script>
</body>
</html>
