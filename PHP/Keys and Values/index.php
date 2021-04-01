<?php


function keys_values(){

    $users['first_name'] = "Michael";
    $users['last_name'] = "Choi";

    echo "There are " . count($users) . " keys in this array:<br>";    
    foreach ($users as $key => $value) {
        echo $key . "<br/>";
    }
    foreach ($users as $key => $value) {
        echo "The value in the key '". $key . "' is '" . $value . "'.<br>";
    }

}
$A = keys_values();
echo $A;
?>