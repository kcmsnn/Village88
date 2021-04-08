<?php

session_start();
$gold = 0;
$log = array();

$gamble = rand(0,4);
if($_POST['building'] == 'farm'){
    $gold = rand(10,20);
    $log['building'] = $_POST['building'];
    $log['earn'] = $gold;    
    $log['datetime'] = date("F d Y h:i a");      
    $log['color'] = 'green';
}else if($_POST['building'] == 'cave'){
    $gold = rand(5,10);
    $log['building'] = $_POST['building'];
    $log['earn'] = $gold;    
    $log['datetime'] = date("F d Y h:i a");      
    $log['color'] = 'green';
}else if($_POST['building'] == 'house'){
    $gold = rand(2,5);
    $log['building'] = $_POST['building'];
    $log['earn'] = $gold;    
    $log['datetime'] = date("F d Y h:i a");      
    $log['color'] = 'green';
}else if($_POST['building'] == 'casino'){
    if ($gamble == 0) {
        $gold = rand(0,50);
        $log['building'] = $_POST['building'];
        $log['earn'] -= $gold;    
        $log['datetime'] = date("F d Y h:i a");
        $log['color'] = 'red';
    }else{
        $gold = rand(0,50);
        $log['building'] = $_POST['building'];
        $log['earn'] = $gold;    
        $log['datetime'] = date("F d Y h:i a");        
        $log['color'] = 'green';
    }
}

$_SESSION['log'][] = $log;
$_SESSION['total_gold'] += $log['earn'];
header('Location: index.php');
?>