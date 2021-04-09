<?php
session_start();
$errors = array();
if (isset($_POST['email']) && $_POST['email'] !=null) {
    
}else {
    $email_errors[] = "Email should not be empty";
}

if (!empty($email_errors)) {
    $_SESSION['email_errors'] = $email_errors;
    header('Location: index.php');
}

if (isset($_POST['first_name']) && $_POST['first_name'] !=null) {
}else {
    $fname_errors[] = "First Name should not be empty";
}
if (is_numeric($_POST['first_name'])) {
    $fname_errors[] = "First Name should not contain numbers";
}
else {
}
if (!empty($fname_errors)) {
    $_SESSION['fname_errors'] = $fname_errors;
    header('Location: index.php');
}


if (isset($_POST['last_name']) && $_POST['last_name'] !=null) {
    //proceed
}else {
    $lname_errors[] = "Last Name should not be empty";
}

if (!empty($lname_errors)) {
    $_SESSION['lname_errors'] = $lname_errors;
    header('Location: index.php');
}
?>