<?php

$states = array('CA', 'WA', 'VA', 'UT', 'AZ');

echo "<select>\n";
for ($i=0; $i < count($states); $i++) { 
    echo "\t <option>" . $states[$i] . "</option>\n";
}
echo "</select>"; 

echo "<select>\n";
foreach ($states as $key => $value) {    
    echo "\t <option>" . $value . "</option>\n";
}
echo "</select>";

array_push($states,'NJ', 'NY', 'DE');
echo "<select>\n";
foreach ($states as $key => $value) {    
    echo "\t <option>" . $value . "</option>\n";
}
echo "</select>";
?>