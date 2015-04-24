<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/19/2015
 * Time: 7:46 PM
 */

    if ($_GET['ip']):
        $ip = gethostbyname($_GET['ip']);
        echo($ip);
    endif;
?>