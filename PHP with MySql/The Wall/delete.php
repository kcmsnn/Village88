<?php
require_once('new_connection.php');
session_start();
var_dump($_SESSION);
if ($_SESSION['user_id'] == $_SESSION['mUser_id']) {
    echo 'same ID';
}
?>