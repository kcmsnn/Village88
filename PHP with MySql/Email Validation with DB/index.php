<?php
require('validate_process.php');
in
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Validation</title>
</head>
<body>
    <div class='container'>
        <form action="validate_process.php" method="post">
        <table>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td colspan='2'><input type="submit" value="submit" name="submit"></td>
            </tr>   
        </table>
        </form>        
    </div>
</body>
</html>