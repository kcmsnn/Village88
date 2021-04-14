<?php
require_once('new_connection.php');
session_start();

if (isset($_POST['submit'])) {
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        user_register($_POST);
    } else if (isset($_POST['action']) && $_POST['action'] == 'login') {
        user_login($_POST);
    } else {
        session_destroy();
        header('location: index.php');
        die();
    }   
    if (isset($_POST['action']) && $_POST['action'] == 'post_message') {
        user_message($_POST);
    }   
    if (isset($_POST['action']) && $_POST['action'] == 'post_comment') {
        user_comment($_POST);
    }
}


function user_register($post){
    //First Name Validation 
    if (empty($post['first_name']) || strlen($post['first_name']) < 2) {
        $_SESSION['error'][] = 'First Name length should be atleast higher than 2!';
    } else {
        if (!preg_match("/^[a-zA-Z\s]+$/",$post['first_name'])) {
            $_SESSION['error'][] = 'First Name should not contain any numbers!';
        }
    }

    //Last Name Validation 
    if (empty($post['last_name']) || strlen($post['last_name']) < 2) {
        $_SESSION['error'][] = 'Last Name length should be atleast higher than 2!';
    } else {
        if (!preg_match("/^[a-zA-Z\s]+$/",$post['last_name'])) {
            $_SESSION['error'][] = 'Last Name should not contain any numbers!';
        }
    }
    //email Validation
    if (empty($post['email'])) {
        $_SESSION['error'][] = 'Email is Required!';
    } else {
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'][] = 'Please Enter a Valid Email!';
        }
    }
    //Password Validation
    if (empty($post['password']) || strlen($post['password']) < 8) {
        $_SESSION['error'][] = 'Password Length should be more than 8!';
    }else {
        //Password Confirmation
        if (empty($post['confirm_password']) || ($post['confirm_password'] !== $post['password'])) {
            $_SESSION['error'][] = 'Password and Confirm password does not match!';
        }
    }

    if ( $_SESSION['error'] > 0) {
        header('location: index.php');
        die();
    } else {
        $first_name =$post["first_name"];
        $last_name =$post["last_name"];
        $email = escape_this_string($post['email']);
        $password = escape_this_string($post['password']);
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted_password = md5($password . '' . $salt);
        
        $query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at)
                  VALUES('{$first_name}', '{$last_name}', '{$email}', '{$encrypted_password}', '{$salt}', NOW(), NOW())";                  
        $runscript = run_mysql_query($query);

        $_SESSION['success'] = "<p class='success'> You are now registered!</p>";
        
        header('location: index.php');
        die();
    }
}

function user_login($post){
    $email = escape_this_string($post['email']);
    $password = escape_this_string($post['password']);
    $query = "SELECT * FROM users WHERE users.email = '{$email}';";
    $users = fetch_all($query);
    if (!empty($users) ) {
        $encrypted_password = md5($password . '' . $users[0]['salt']);
        if($users[0]['password'] == $encrypted_password)
        {
            $_SESSION['first_name'] = $users[0]['first_name'];
            $_SESSION['user_id'] = $users[0]['user_id'];
            $_SESSION['logged_in'] = true;
            header('location: main.php');
            die();
        }
        else
        {
            $_SESSION['error'][] = 'Password is incorrect!';
        } 
    } else {
        $_SESSION['error'][] = 'Email is not valid!';
    }
    
}

function user_message($post){
    $id = $_SESSION['user_id'];
    $message = $_POST['message'];
    if (empty($_POST['message'])) {
        $_SESSION['message_error']= 'message should not be Empty!';
        header('Location: main.php'); 
    } else {
        unset($_SESSION['message_error']);
        $query = "INSERT INTO wall_messages (user_id, message, created_at, updated_at)
                  VALUES('{$id}', \"{$message}\", NOW(), NOW())";                  
        $runscript = run_mysql_query($query);
        header('Location: main.php'); 
    }
}

function user_comment($post){
    $user_id = $_SESSION['user_id'];
    $message_id = $_POST['message_id'];
    $comment = $_POST['comment'];
    if (empty($_POST['comment'])) {
        $_SESSION['comment_error']= 'comment should not be Empty!';
        //header('Location: main.php'); 
    } else {
        unset($_SESSION['comment_error']);
        $query = "INSERT INTO comments (users_id, messages_id, comment, created_at, updated_at)
                  VALUES('{$user_id}', '$message_id', \"{$comment}\", NOW(), NOW())";                  
        $runscript = run_mysql_query($query);  
        //header('Location: main.php'); 
        var_dump($_POST);
    }
}
?>