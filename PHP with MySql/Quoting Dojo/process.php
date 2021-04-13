<?php
require_once('new_connection.php');
session_start();

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $_SESSION['name_error'] = 'Name is Required!';
        header('Location: index.php'); 
    } else {
        if (!preg_match("/^[a-zA-Z\s]+$/",$_POST['name'])) {
            $_SESSION['name_error'] = 'Name should not contain any numbers!';
            unset($_SESSION['old']['name']);
            header('Location: index.php'); 
        }else {
            unset($_SESSION['name_error']);
            $_SESSION['old']['name'] = $_POST['name'];  
            $name = $_POST['name'];       
        }
    }    
    if (empty($_POST['quotes'])) {
        $_SESSION['quotes_error']= 'Quotes should not be Empty!';
        header('Location: index.php'); 
    } else {
        unset($_SESSION['quotes_error']);
        $quote = $_POST['quotes'];
        $query = "INSERT INTO quote (creator_name, quote, date_created)
                  VALUES('$name', '$quote', NOW())";                  
        $runscript = run_mysql_query($query);        
        header('Location: main.php'); 
               
    }  
}
?>