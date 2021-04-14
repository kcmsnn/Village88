<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>The Wall</title>
</head>
<body>
<?php
    if (isset($_SESSION['error'])) {
        foreach ($_SESSION['error'] as $errors) {
            echo "<p class='error'>{$errors}</p>";
        }
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
?>
    <h2>Register</h2>
    <form action="process.php" method="post">
    <input type="hidden" name="action" value="register">
    First name: <input type="text" name="first_name" id="first_name"><br>
    Last name: <input type="text" name="last_name" id="last_name"><br>
    Email Address: <input type="text" name="email" id="email"><br>
    Password: <input type="password" name="password" id="password"><br>
    Confirm Password: <input type="password" name="confirm_password" id="confirm_password"><br>
    <input type="submit" value="submit" name="submit"><br>
    </form>
    <h2>Login</h2>
    <form action="process.php" method="post">
    <input type="hidden" name="action" value="login">
    Email Address: <input type="text" name="email" id="email"><br>
    Password: <input type="password" name="password" id="password"><br>
    <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>