<?php
session_start();
// process.php
// include connection page
require_once('new_connection.php');
// Add validations here to make sure information is correct
// if validations pass, we insert the records into the database


if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
    $_SESSION['error']['email'] = 'Email is Required!';
    $_SESSION['color'] = 'red';
    } else {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error']['email'] = 'Please Enter a Valid Email!';
        $_SESSION['color'] = 'red';
    }else {
        unset($_SESSION['error']['email']);
        $_SESSION['color'] = 'green';
        $_SESSION['email_input'] = $_POST['email'];
        $email = $_POST['email'];
        
        $query = "INSERT INTO email (email, date_validated)
                  VALUES('$email',NOW())";                  
        $runscript = run_mysql_query($query);
    }
}
header('Location: index.php');
}



?>