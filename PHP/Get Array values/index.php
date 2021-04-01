<?php

$A = array(2,3,'hello');
function print_lists($A){    
    echo "<ul>\n";
    foreach ($A as $value) {
        echo "\t<li>" . $value . "</li>\n";
    }
    echo "</ul>";
}
$b = print_lists($A);

echo $b;

?>