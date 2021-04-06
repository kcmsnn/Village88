
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
        <h3>Submitted Information:</h3>
        <table>
            <tr>
                <td>Your Name:</td>
                <td><?= $_POST['name']; ?></td>
            </tr>
            <tr>
                <td>Dojo Location:</td>
                <td><?= $_POST['location']; ?></td>
            </tr>
            <tr>
                <td>Favorite Language:</td>
                <td><?= $_POST['favorite']; ?></td>
            </tr>
            <tr>
                <td>Comment:</td>
                <td><?= $_POST['comment']; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>