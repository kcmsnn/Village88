<?php

$numbers = array(1,2,5,10,255,3);
$sum=0;
$avg=0;
    for ($i=0; $i < count($numbers) ; $i++) { 
    $sum = $sum + $numbers[$i];
    }
    $avg = $sum / count($numbers);
    echo($avg)
?>