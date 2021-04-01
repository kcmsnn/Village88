<?php

$array_variable = array();
for ($i=0; $i <= 20000 ; $i++) { 
    if ($i%2==1) {
        array_push($array_variable,$i);
    }
}
var_dump($array_variable);
?>