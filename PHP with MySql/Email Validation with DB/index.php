<?php
include('validate_process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Email Validation</title>
</head>
<body>
    <div class='container'>
        <form action="validate_process.php" method="post">
        <table>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td colspan='2'><input type="submit" value="submit" name="submit"></td>
            </tr>   
        </table>
        </form> 
        
        <?php
            if (isset($_SESSION['color'])) { ?>
                <div class='<?=$_SESSION['color']?>'>
                <?php
                    if ($_SESSION['color'] == 'red') { ?>
                        <p><?= $_SESSION['error']['email'] ?></p>
                <?php   } else { ?>
                        <p>The email address you entered (<?= $_SESSION['email_input'];?>) is a valid email address! thank you!</p>                
                <?php   } ?>       
                </div>
        <?php   } ?>
        <h2>Email Address Entered:</h2>
        <table>
        <?php
            $query = "SELECT * FROM email;";
            $email_rows = fetch_all($query);
            
            if (!empty($email_rows) ) {
                foreach ($email_rows as $rows) { 
                    $time = strtotime($rows['date_validated']);
                    $myFormatForView = date("m/d/y g:i A", $time);?>
                <tr>
                    <td><?= $rows['email'] . ' ' . $myFormatForView;?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </table>
    </div>
</body>
</html>