<?php

$score = rand(50,100);
echo "<h1> Your score is: " . $score . "</h1>";
if ($score < 70) {
    echo "<h2> Your grade is: D. </h2>";
}else if ($score < 80 && $score >= 70) {
    echo "<h2> Your grade is: C. </h2>";
}else if ($score < 90 && $score >= 80) {
    echo "<h2> Your grade is: B. </h2>";
}else if ($score < 100 && $score >= 90) {
    echo "<h2> Your grade is: A. </h2>";
}

?>