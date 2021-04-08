<?php
session_start(); 
if (empty($_SESSION)) { 
    $_SESSION['input'] = NULL;
    $_SESSION['random_number'] = rand(1,100);   
    $_SESSION['divclass'] = 'hide';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Great Number Game</title>
</head>
<body>
    <div class='container'>
        <h1>Welcome to he Great Number Game</h1>
        <h2>I am thinking of a number between 1 and 100 take a guess!</h2>
        <div class='<?= $_SESSION['divclass'] ?>'>
            <h3><?= $_SESSION['message'] ?></h3>
        </div>
        <form action="process.php" method="post">
            <input type="text" name="number" id="number">
            <input type="submit" value="submit">
        </form>


    </div>
</body>
</html>