<?php

$sample = array( 135, 2.4, 2.67, 1.23, 332, 2, 1.02);
function get_Min_Max($sample){    
    $output['max'] = $sample[0];
    $output['min'] = $sample[0];
    for ($i=0; $i < count($sample); $i++) { 
        if($sample[$i] > $output['max']){
            $output['max'] = $sample[$i];
        }else if($sample[$i] < $output['min']){
            $output['min'] = $sample[$i];
        }
    }
    return $output;
}
$A = get_Min_Max($sample);
var_dump($A);


?>