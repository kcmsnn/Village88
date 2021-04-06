
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Survey Form</title>
</head>
<body>
    <div class='container'>
        <form action="result.php" method="post">
        <table>
            <tr>
                <td><label for="name">Your Name:</label></td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td><label for="location">Dojo Location:</label></td>
                <td>
                    <select name="location" id="location">
                        <option value="NY">New York</option>
                        <option value="NJ">New Jersey</option>
                        <option value="PH">Philippines</option>                
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="favorite">Favorite Language:</label></td>
                <td>
                    <select name="favorite" id="favorite">
                        <option value="javascript">Javascript</option>
                        <option value="php">PHP</option>
                        <option value="csharp">C#</option>                
                    </select> 
                </td>
            </tr>
            <tr>
                <td colspan='2'><label for="comment">Comment (optional):</label></td>
            </tr>
            <tr>
                <td colspan='2'><textarea name="comment" id="comment" cols="40" rows="10"></textarea></td>
            </tr>
            <tr>
                <td colspan='2'><input type="submit" value="submit" class="submit"></td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html>