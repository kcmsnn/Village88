<?php
include('process.php');
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
    <div class='container'>
    <?php
            $query = "SELECT * FROM quote;";
            $quotes_rows = fetch_all($query);
            
            if (!empty($quotes_rows) ) {
                foreach ($quotes_rows as $rows) { ?>
                    <section>
                    <h2>"<?= $rows['quote'];?>"</h2>


            <?php    $time = strtotime($rows['date_created']);
                    $myFormatForView = date("g:i A F d Y ", $time);?>
                    <h4>-<?= $rows['creator_name'] . ' at ' . $myFormatForView; ?></h4>                    
                    </section>
                    <hr>
            <?php } ?>
        <?php } ?>
    </div>    
</body>
</html>