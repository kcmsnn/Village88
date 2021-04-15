<?php
session_start();
 
if (isset($_POST['submit'])) {
    unset($_SESSION['data']);
    $file = $_FILES['upload_csv'];

    $file_name = $_FILES['upload_csv']['name'];
    $file_tmp_name = $_FILES['upload_csv']['tmp_name'];
    $file_size = $_FILES['upload_csv']['size'];
    $file_error = $_FILES['upload_csv']['error'];
    $file_type = $_FILES['upload_csv']['type'];

    $file_Ext = explode('.',$file_name);
    $file_Actual_Ext = strtolower(end($file_Ext));

    $allowed = array('csv');

    if (in_array($file_Actual_Ext,$allowed)) {
        if ($file_error === 0) {
                $file_name_new = uniqid('',true).".".$file_Actual_Ext;
                $file_destination = 'uploads/'.$file_name_new;
                move_uploaded_file($file_tmp_name,$file_destination);
                $_SESSION['uploaded'] = TRUE;                
                $_SESSION['file_name'] = $file_name_new;
                header("location: index.php");
        } else {
            $_SESSION['error']['upload_csv'] = 'There was an error uploading your file';
        }
    } else {
        $_SESSION['error']['upload_csv'] = 'You cannot upload this file type';
    }
    unset($_POST['submit']);
}
?>