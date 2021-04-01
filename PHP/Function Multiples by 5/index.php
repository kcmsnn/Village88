<?php

$A = array(2,4,10,16);
function multiply($arr)
{
    $new_arr = array();
    foreach ($arr as $value) {
        array_push($new_arr,$value*= 5);
    }
    return $new_arr;
}
$B = multiply($A);
var_dump($B); 
echo '<br/>';
function multiply1($arr,$multiplier)
{
    $new_arr = array();
    foreach ($arr as $value) {
        array_push($new_arr,$value*= $multiplier);
    }
    return $new_arr;
}
$B = multiply1($A, 2);  
var_dump($B);
?>