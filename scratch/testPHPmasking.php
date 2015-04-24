<?php
/**
 * Created by PhpStorm.
 * User: Vishnu Chelle
 * Date: 4/22/2015
 * Time: 10:40 PM
 */


$string='asdfbASDF1234';
echo $string."\n";
//echo preg_replace('/(?!^.?).(?!.{0}$)/', '*', $string);
//echo preg_replace('/([0-9]+)/', '*', $string);
echo substr_replace($string,'*****',0,5);
?>