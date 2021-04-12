<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration without DB</title>
</head>
<body>
    <div class='container'>
        <form action="process.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="first_name">First Name:</label></td>
                <td><input type="text" name="first_name" id="first_name"></td>
            </tr>
            <tr>
                <td><label for="last_name">Last Name:</label></td>
                <td><input type="text" name="last_name" id="last_name"></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td><label for="confirm_password">Confirm Password:</label></td>
                <td><input type="password" name="confirm_password" id="confirm_password"></td>
            </tr>
            <tr>
                <td><label for="birth_date"> Birth Date:</label></td>
                <td><input type="date" name="birth_date" id="birth_date"></td>
            </tr>
            <tr>
                <td><label for="profile_pic"> Profile Picture:</label></td>
                <td><input type="file" name="profile_pic" id="profile_pic"></td>
            </tr>
            <tr>
                <td colspan='2'><input type="submit" value="submit" name="submit"></td>
            </tr>   
        </table>
        </form>        
        <table>
        <?php
                if (isset($_SESSION['error'])) {
                    foreach ($_SESSION['error'] as $errors) { ?>
                        <tr>
                            <td><?= $errors;?></td>
                    </tr>
            <?php   }?>
        <?php   } else {?>    
                    <tr>
                            <td>Thanks for submitting your information</td>
                    </tr>    
                    
            <?php   }?>    
        </table>

    </div>
</body>
</html>