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
    <title>Quotes</title>
</head>
<body>
    <h1>Welcome to Quoting Dojo!</h1>
    <form action="process.php" method="post">
    <table>
        <tr>
            <td><label for="name">Your Name:</label></td>
            <td><input type="text" name="name" id="name"></td>
            <?php
            if (isset($_SESSION['name_error'])) {?>                    
            <td><?= $_SESSION['name_error'];?></td>
            <?php   }?>
        </tr>
        <tr>
            <td><label for="quotes">Your Quote:</label></td>
            <td><textarea name="quotes" id="quotes" cols="40" rows="10"></textarea></td>            
            <?php
            if (isset($_SESSION['quotes_error'])) {?>                    
            <td><?= $_SESSION['quotes_error'];?></td>
            <?php   }?>
            
        </tr> 
        <tr>
            <td colspan=2> <input type="submit" value="Add quotes" name="submit"> <button><a href = 'main.php'>Skip  to quotes</a></button></td>
        </tr>  
    </table>     
    </form>
</body>
</html>