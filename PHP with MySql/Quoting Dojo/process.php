<?php
require_once('new_connection.php');
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $_SESSION['error']['name'] = 'Name is Required!';
    } else {
        if (!preg_match("/^[a-zA-Z\s]+$/",$_POST['name'])) {
            $_SESSION['error']['name'] = 'Name should not contain any numbers!';
            unset($_SESSION['old']['name']);
        }else {
            unset($_SESSION['error']['name']);
            $_SESSION['old']['name'] = $_POST['name'];  
            $name = $_POST['name'];       
        }
    }    
    if (empty($_POST['quotes'])) {
        $_SESSION['error']['quotes'] = 'Quotes should not be Empty!';
    } else {
        unset($_SESSION['error']['quotes']);
        $quote = $_POST['quotes'];
        $query = "INSERT INTO quote (creator_name, quote, date_created)
                  VALUES('$name', '$quote', NOW())";                  
        $runscript = run_mysql_query($query);
               
    }  

    header('Location: main.php'); 
}
?>