<?php

$heads = 0;
$tails = 0;
echo "<h2><u>Starting the program</u></h2>";
for ($i=0; $i < 5000 ; $i++) { 
    $coinflip = rand(1,2);
    if($coinflip == 1){
        $heads++;
        echo "Attempt #" . $i . ": Throwing a coin... It's a head! ... Got " . $heads . " head(s) so far and " . $tails . " tail(s) so far<br/>";
    }else if($coinflip == 2){
        $tails++;
        echo "Attempt #" . $i . ": Throwing a coin... It's a Tail! ... Got " . $heads . " head(s) so far and " . $tails . " tail(s) so far<br/>";
    }
}
echo "<h2><u>Ending the program</u></h2>";
?>