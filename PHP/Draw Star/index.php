<?php

$arr = array(4, 6, 1, 3, 5, 7, 25);

function draw_stars($arr){    
    for ($i=0; $i < count($arr); $i++) { 
        for ($j=0; $j < $arr[$i]; $j++) { 
            echo '*';
        }
        echo "<br/>";
    }
}
$A = draw_stars($arr);
echo $A;

$x = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
function draw_stars1($x){    
    for ($i=0; $i < count($x); $i++) {         
        if(is_integer($x[$i])){
            for ($j=0; $j < $x[$i]; $j++) { 
                echo '*';
            }
        }else if (is_string($x[$i])){
            for ($j=0; $j < strlen($x[$i]); $j++) { 
                echo strtolower(substr($x[$i], 0, 1));
            }
        }
        echo "<br/>";
    }
}
$A = draw_stars1($x);
echo $A;

?>