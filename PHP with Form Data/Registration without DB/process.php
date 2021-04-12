<?php
session_start();
$errors = array();

if (isset($_POST['submit'])) {//Email Validation
    if (empty($_POST['email'])) {
        $_SESSION['error']['email'] = 'Email is Required!';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error']['email'] = 'Please Enter a Valid Email!';
            $_SESSION['old']['email'] = $_POST['email'];
        }else {
            unset($_SESSION['error']['email']);
            $_SESSION['old']['email'] = $_POST['email'];
        }
    }
    

    //First Name Validation 
    if (empty($_POST['first_name'])) {
        $_SESSION['error']['first_name'] = 'First Name is Required!';
    } else {
        if (!preg_match("/^[a-zA-Z\s]+$/",$_POST['first_name'])) {
            $_SESSION['error']['first_name'] = 'First Name should not contain any numbers!';
            unset($_SESSION['old']['first_name']);
        }else {
            unset($_SESSION['error']['first_name']);
            $_SESSION['old']['first_name'] = $_POST['first_name'];
        }
    }

    //Last Name Validation 
    if (empty($_POST['last_name'])) {
        $_SESSION['error']['last_name'] = 'Last Name is Required!';
    } else {
        if (!preg_match("/^[a-zA-Z\s]+$/",$_POST['last_name'])) {
            $_SESSION['error']['last_name'] = 'Last Name should not contain any numbers!';
            unset($_SESSION['old']['last_name']);
        }else {
            unset($_SESSION['error']['last_name']);
            $_SESSION['old']['last_name'] = $_POST['last_name'];
        }
    }

    //Password Validation
    if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
        $_SESSION['error']['password'] = 'Password Length should be more than 6!';
    } else {
            unset($_SESSION['error']['password']);
            $_SESSION['old']['password'] = $_POST['password'];
    }

    //Password Confirmation
    if (empty($_POST['confirm_password']) || ($_POST['confirm_password'] != $_SESSION['old']['password'])) {
        $_SESSION['error']['confirm_password'] = 'Password and Confirm password does not match!';
    } else {
            unset($_SESSION['error']['confirm_password']);
            $_SESSION['old']['confirm_password'] = $_POST['confirm_password'];
    }

    if (empty($_POST['birth_date'])) {
        $_SESSION['old']['birth_date'] = $_POST['birth_date'];
    } else {
        $birth_date = explode("-",$_POST['birth_date']);
        $_SESSION['old']['birth_year'] = $birth_date[0];
        $_SESSION['old']['birth_month'] = $birth_date[1];
        $_SESSION['old']['birth_date'] = $birth_date[2];
        
    }

    $file = $_FILES['profile_pic'];

    $file_name = $_FILES['profile_pic']['name'];
    $file_tmp_name = $_FILES['profile_pic']['tmp_name'];
    $file_size = $_FILES['profile_pic']['size'];
    $file_error = $_FILES['profile_pic']['error'];
    $file_type = $_FILES['profile_pic']['type'];

    $file_Ext = explode('.',$file_name);
    $file_Actual_Ext = strtolower(end($file_Ext));

    $allowed = array('jpg','jpeg','png');

    if (in_array($file_Actual_Ext,$allowed)) {
        if ($file_error === 0) {
            if ($file_size < 10000000000000) {
                $file_name_new = uniqid('',true).".".$file_Actual_Ext;
                $file_destination = 'uploads/'.$file_name_new;
                move_uploaded_file($file_tmp_name,$file_destination);
                header('Location: index.php?uploadsuccess');
            } else {
                $_SESSION['error']['profile_pic'] = 'Your file is to big!';
            }
        } else {
            $_SESSION['error']['profile_pic'] = 'There was an error uploading your file';
        }
    } else {
        $_SESSION['error']['profile_pic'] = 'You cannot upload this file type';
    }
    var_dump($_FILES);
    header('Location: index.php');
}
?>