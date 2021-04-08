<?php
    session_start();

    $input = $_POST['number'];
    $_SESSION['input'] = $input;


    if ($_SESSION['input'] == $_SESSION['random_number']) {
        $_SESSION['divclass'] = 'correct';
        $_SESSION['message'] = $_SESSION['input'] . ' was the number!';
    } else if ($_SESSION['input'] < $_SESSION['random_number']) {
        $_SESSION['divclass'] = 'highlow';      
        $_SESSION['message'] = 'Too Low!';
    } else if ($_SESSION['input'] > $_SESSION['random_number']) {
        $_SESSION['divclass'] = 'highlow';
        $_SESSION['message'] = 'Too High!';
    }

    header('Location: index.php');

?>
