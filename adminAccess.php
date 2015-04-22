<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/22/2015
 * Time: 1:35 AM
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('connect.php');
session_start();

$accessID = $_SESSION['AccessID'];

    if($accessID != ''){
        echo $accessID;
    }else{
        echo "invalid ID";
    }


?>