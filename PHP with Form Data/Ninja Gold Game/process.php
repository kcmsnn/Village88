<?php

session_start();
$gold = 0;
$gamble = rand(0,4);
$log = '';
if($_POST['building'] == 'farm'){
    $gold += rand(10,20);
    $log = 'You entered a farm and earned ' . $gold . ' golds. ' . date("F d Y h:i a");
}else if($_POST['building'] == 'cave'){
    $gold += rand(5,10);
    $log = 'You entered a cave and earned ' . $gold . ' golds. ' . date("F d Y h:i a");
}else if($_POST['building'] == 'house'){
    $gold += rand(2,5);
    $log = 'You entered a house and earned ' . $gold . ' golds. ' . date("F d Y h:i a");
}else if($_POST['building'] == 'casino'){
    if ($gamble == 0) {
        $gold -= rand(0,50);
        $log = '<p class="lost">You entered a casino and lost ' . $gold . ' golds... Ouch.. ' . date("F d Y h:i a");
    }else{
        $gold += rand(0,50);
        $log = 'You entered a casino and earned ' . $gold . ' golds. ' . date("F d Y h:i a") . '</p>';

    }
}

$_SESSION['gold'] += $gold;
$_SESSION['log'][] = $log;
header('Location: index.php');
?>