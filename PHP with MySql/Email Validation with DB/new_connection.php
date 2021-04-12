<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); //set DB_PASS as 'root' if you're using mac
define('DB_DATABASE', 'test'); //make sure to set your database
//connect to database host
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
var_dump($connection);

//make sure connection is good or die
if($connection->connect_errno)
{
    die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
}


function fetch($query){
    global $connection;

    $result =  mysqli($connection,$query);
    $rows = array();

    foreach ($result as $row) {
        $rows[] = $row;
    }

    return $rows
}
?>