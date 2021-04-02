<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HTML Table</title>
<?php
$user_id = 1;
$users = array( 
    array('first_name' => 'Michael', 'last_name' => 'Choi'),
    array('first_name' => 'John', 'last_name' => 'Supsupin'),
    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
    array('first_name' => 'KB', 'last_name' => 'Tonel'), 
    array('first_name' => 'Kai', 'last_name' => 'Camson'),
    array('first_name' => 'John', 'last_name' => 'Supsupin'),
    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
    array('first_name' => 'KB', 'last_name' => 'Tonel'),
    array('first_name' => 'Michael', 'last_name' => 'Choi'),
    array('first_name' => 'John', 'last_name' => 'Supsupin'),
    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
    array('first_name' => 'KB', 'last_name' => 'Tonel'), 
    array('first_name' => 'Kai', 'last_name' => 'Camson'),
    array('first_name' => 'John', 'last_name' => 'Supsupin'),
    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
    array('first_name' => 'KB', 'last_name' => 'Tonel'),
    array('first_name' => 'Michael', 'last_name' => 'Choi'),
    array('first_name' => 'John', 'last_name' => 'Supsupin'),
    array('first_name' => 'Mark', 'last_name' => 'Guillen'),
    array('first_name' => 'KB', 'last_name' => 'Tonel') 
 );
 
?>
</head>
<body>
    <table>
    <tr>
        <thead>
            <td><h2>User #</h2></td>
            <td><h2>First Name</h2></td>
            <td><h2>Last Name</h2></td>
            <td><h2>Full Name</h2></td>
            <td><h2>Full Name in upper case</h2></td>
            <td><h2>Length of Full Name</h2></td>
        </thead>
    </tr>
<?php
    foreach($users as $user) { ?>
        <tr class = "color_<?= $user_id%5+1 ?>">
            <td><h2><?= $user_id++ ?></h2></td>
            <td><?= $user['first_name']?></td>
            <td><?= $user['last_name']?></td>
            <td><?= implode(' ', $user)?></td>
            <td><?= strtoupper(implode(' ', $user))?></td>
            <td><?= strlen(implode('', $user))?></td>
        </tr>
<?php    } ?>
    </table>
</body>
</html>